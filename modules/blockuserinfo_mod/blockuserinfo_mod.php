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

class BlockUserInfo_mod extends Module
{
    private $_html = '';
    public $fields_form;
    public $fields_value;
    public $validation_errors = array();

	public function __construct()
	{
		$this->name = 'blockuserinfo_mod';
		$this->tab = 'front_office_features';
		$this->version = '0.3.2';
		$this->author = 'SUNNYTOO.COM';
		$this->need_instance = 0;
		$this->bootstrap     = true;

		parent::__construct();

		$this->displayName = $this->l('User info block mod');
		$this->description = $this->l('Adds a block that displays information about the customer.');
		$this->ps_versions_compliancy = array('min' => '1.6', 'max' => _PS_VERSION_);
	}

	public function install()
	{
		return (parent::install() 
			&& $this->registerHook('displayNav') 
			&& $this->registerHook('displayHeader')
			&& Configuration::updateValue('ST_USERINFO_DROPDOWN', 0)
			&& Configuration::updateValue('ST_SHOW_WELCOME_MSG', 0)
			&& Configuration::updateValue('ST_SHOW_USER_INFO_ICONS', 0)
		);
	}
	public function getContent()
	{
	    $this->initFieldsForm();
		if (isset($_POST['saveblockuserinfo_mod']))
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
                    'type' => 'switch',
                    'label' => $this->l('Simple style:'),
                    'name' => 'userinfo_dropdown',
                    'is_bool' => true,
                    'default_value' => 1,
                    'values' => array(
                        array(
                            'id' => 'userinfo_dropdown_on',
                            'value' => 1,
                            'label' => $this->l('Yes')),
                        array(
                            'id' => 'userinfo_dropdown_off',
                            'value' => 0,
                            'label' => $this->l('No')),
                    ),
                    'validation' => 'isBool',
                    'desc' => $this->l('Use a drop down list to display links.'),
                ), 
                array(
					'type' => 'switch',
					'label' => $this->l('Show Welcome Message on mobile:'),
					'name' => 'show_welcome_msg',
                    'default_value' => 0,
					'is_bool' => true,
					'values' => array(
						array(
							'id' => 'show_welcome_msg_on',
							'value' => 1,
							'label' => $this->l('Yes')),
						array(
							'id' => 'show_welcome_msg_off',
							'value' => 0,
							'label' => $this->l('No')),
					),
                    'validation' => 'isBool',
                    'desc' => $this->l('Screen width less than 768px.'),
				),
                array(
					'type' => 'switch',
					'label' => $this->l('Show icons:'),
					'name' => 'show_user_info_icons',
                    'default_value' => 0,
					'is_bool' => true,
					'values' => array(
						array(
							'id' => 'show_user_info_icons_on',
							'value' => 1,
							'label' => $this->l('Yes')),
						array(
							'id' => 'show_user_info_icons_off',
							'value' => 0,
							'label' => $this->l('No')),
					),
                    'validation' => 'isBool',
                    'desc' => $this->l('Screen width less than 768px.'),
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
		$helper->submit_action = 'saveblockuserinfo_mod';
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
            'userinfo_dropdown' => Configuration::get('ST_USERINFO_DROPDOWN'),
            'show_welcome_msg' => Configuration::get('ST_SHOW_WELCOME_MSG'),
            'show_user_info_icons' => Configuration::get('ST_SHOW_USER_INFO_ICONS'),
        );
        return $fields_values;
    }
	/**
	* Returns module content for header
	*
	* @param array $params Parameters
	* @return string Content
	*/
	public function hookDisplayTop($params)
	{
		$this->smarty->assign(array(
			'userinfo_dropdown' => Configuration::get('ST_USERINFO_DROPDOWN'),
			'show_welcome_msg' => Configuration::get('ST_SHOW_WELCOME_MSG'),
			'show_user_info_icons' => Configuration::get('ST_SHOW_USER_INFO_ICONS'),
		));
		return $this->display(__FILE__, 'nav.tpl');
	}

	public function hookDisplayNav($params)
	{
		return $this->hookDisplayTop($params);
	}
	public function hookDisplayNavLeft($params)
	{
		$this->smarty->assign('userinfo_navleft', true);
		return $this->hookDisplayTop($params);
	}
	public function hookDisplayHeaderLeft($params)
	{
		$this->smarty->assign('userinfo_navleft', true);
		return $this->hookDisplayTop($params);
	}
	public function hookDisplayHeaderBottom($params)
	{			
		return $this->hookDisplayTop($params);
	}
}