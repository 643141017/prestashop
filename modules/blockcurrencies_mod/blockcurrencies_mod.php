<?php
/*
* 2007-2014 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2014 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/

if (!defined('_PS_VERSION_'))
	exit;

class BlockCurrencies_mod extends Module
{
    private $_html = '';
    public $fields_form;
    public $fields_value;
    public $validation_errors = array();
    
	public function __construct()
	{
		$this->name = 'blockcurrencies_mod';
		$this->tab = 'front_office_features';
		$this->version = '0.3.2';
		$this->author = 'SUNNYTOO.COM';
		$this->need_instance = 0;
		$this->bootstrap     = true;

		parent::__construct();

		$this->displayName = $this->l('Currency block mod');
		$this->description = $this->l('Adds a block allowing customers to choose their preferred shopping currency.');
		$this->ps_versions_compliancy = array('min' => '1.6', 'max' => _PS_VERSION_);
	}

	public function install()
	{
		return parent::install() && $this->registerHook('displayNavLeft') && Configuration::updateValue('ST_CURRENCIES_LABEL', 0);
	}
	public function getContent()
	{
	    $this->initFieldsForm();
		if (isset($_POST['saveblockcurrencies_mod']))
		{
            foreach($this->fields_form as $form)
                foreach($form['form']['input'] as $field)
                    if(isset($field['validation']))
                    {
                        $errors = array();       
                        $value = Tools::getValue($field['name']);
                        if (isset($field['required']) && $field['required'] && $value==false && (string)$value != '0')
        						$errors[] = sprintf(Tools::displayError('Field "%s" is required.'), $field['label']);
                        elseif($value)
                        {
        					if (!Validate::$field['validation']($value))
        						$errors[] = sprintf(Tools::displayError('Field "%s" is invalid.'), $field['label']);
                        }
        				// Set default value
        				if ($value === false && isset($field['default_value']))
        					$value = $field['default_value'];
                        
                        if($field['name']=='limit' && $value>20)
                             $value=20;
                        
                        if(count($errors))
                        {
                            $this->validation_errors = array_merge($this->validation_errors, $errors);
                        }
                        elseif($value==false)
                        {
                            switch($field['validation'])
                            {
                                case 'isUnsignedId':
                                case 'isUnsignedInt':
                                case 'isInt':
                                case 'isBool':
                                    $value = 0;
                                break;
                                default:
                                    $value = '';
                                break;
                            }
                            Configuration::updateValue('ST_'.strtoupper($field['name']), $value);
                        }
                        else
                            Configuration::updateValue('ST_'.strtoupper($field['name']), $value);
                    }
            
            if(count($this->validation_errors))
                $this->_html .= $this->displayError(implode('<br/>',$this->validation_errors));
            else 
                $this->_html .= $this->displayConfirmation($this->l('Settings updated'));
        }

		$helper = $this->initForm();
		return $this->_html.$helper->generateForm($this->fields_form);
	}

    protected function initFieldsForm()
    {
		$this->fields_form[0]['form'] = array(
			'legend' => array(
				'title' => $this->displayName,
                'icon' => 'icon-cogs'
			),
            'input' => array(
                array(
                    'type' => 'radio',
                    'label' => $this->l('Currencies label:'),
                    'name' => 'currencies_label',
                    'default_value' => 1,
                    'values' => array(
                        array(
                            'id' => 'currencies_label_both',
                            'value' => 0,
                            'label' => $this->l('Sign + code')),
                        array(
                            'id' => 'currencies_label_name',
                            'value' => 1,
                            'label' => $this->l('Code')),
                        array(
                            'id' => 'currencies_label_flag',
                            'value' => 2,
                            'label' => $this->l('Sign')),
                    ),
                    'validation' => 'isUnsignedInt',
                ),
			),
			'submit' => array(
				'title' => $this->l('   Save   ')
			)
		);
        
    }
    protected function initForm()
	{
	    $helper = new HelperForm();
		$helper->show_toolbar = false;
		$helper->table =  $this->table;
        $helper->module = $this;
		$lang = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
		$helper->default_form_language = $lang->id;
		$helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ? Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;

		$helper->identifier = $this->identifier;
		$helper->submit_action = 'saveblockcurrencies_mod';
		$helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		$helper->tpl_vars = array(
			'fields_value' => $this->getConfigFieldsValues(),
			'languages' => $this->context->controller->getLanguages(),
			'id_language' => $this->context->language->id
		);
		return $helper;
	}

    private function getConfigFieldsValues()
    {
        $fields_values = array(
            'currencies_label' => Configuration::get('ST_CURRENCIES_LABEL'),
        );
        return $fields_values;
    }

	protected function _prepareHook($params)
	{
		if (Configuration::get('PS_CATALOG_MODE'))
			return false;

		if (!Currency::isMultiCurrencyActivated())
			return false;

		$this->smarty->assign(array(
			'blockcurrencies_sign' => $this->context->currency->sign,
			'display_sign' => Configuration::get('ST_CURRENCIES_LABEL'),
		));
	
		return true;
	}

	/**
	* Returns module content for header
	*
	* @param array $params Parameters
	* @return string Content
	*/
	public function hookDisplayTop($params)
	{
		if ($this->_prepareHook($params))
			return $this->display(__FILE__, 'blockcurrencies.tpl');
	}

	public function hookDisplayNav($params)
	{
			return $this->hookDisplayTop($params);
	}
	public function hookDisplayNavLeft($params)
	{
			return $this->hookDisplayTop($params);
	}
    public function hookDisplayFooterBottomRight($params)
    {
		return $this->hookDisplayTop($params);
    }
	public function hookDisplayFooterBottomLeft($params)
	{			
		return $this->hookDisplayTop($params);
	}
	public function hookDisplayHeaderLeft($params)
	{
		return $this->hookDisplayTop($params);
	}
	public function hookDisplayHeaderBottom($params)
	{			
		return $this->hookDisplayTop($params);
	}
}


