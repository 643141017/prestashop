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

class StQrCode extends Module
{
    private $_html = '';
    public $fields_form;
    public $fields_value;
    private $validation_errors = array();
    private $qr_api_url = '//chart.apis.google.com/chart?';
	public function __construct()
	{
		$this->name          = 'stqrcode';
		$this->tab           = 'front_office_features';
		$this->version       = '1.0';
		$this->author        = 'SUNNYTOO.COM';
		$this->need_instance = 0;
		$this->bootstrap 	 = true;
		parent::__construct();
        
        $this->displayName = $this->l('QR code');
        $this->description = $this->l('Add QR code to your site.');
        
	}

	public function install()
	{
		if (!parent::install()
            || !$this->registerHook('displayHeader')
            || !$this->registerHook('displayRightBar')
            || !$this->registerHook('displaySideBarRight')
            || !Configuration::updateValue('ST_QR_SIZE', 150)
            || !Configuration::updateValue('ST_QR_MARGIN', 2)
            || !Configuration::updateValue('ST_QR_LOAD', 1)
        )
			return false;
		return true;
	}
    
    public function getContent()
	{
	    $this->initFieldsForm();
		if (isset($_POST['savestqrcode']))
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
                            Configuration::updateValue('ST_QR_'.strtoupper($field['name']), $value);
                        }
                        else
                            Configuration::updateValue('ST_QR_'.strtoupper($field['name']), $value);
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
					'type' => 'text',
					'label' => $this->l('QR image size:'),
					'name' => 'size',
                    'default_value' => 150,
                    'required' => true,
                    'desc' => $this->l('The size of QR image, default is 150.'),
                    'validation' => 'isUnsignedInt',
                    'class' => 'fixed-width-sm'
				),
                array(
					'type' => 'text',
					'label' => $this->l('Margin:'),
					'name' => 'margin',
                    'default_value' => 2,
                    'required' => true,
                    'desc' => $this->l('The width of the white border around the data portion of the code, the range is 0-40 ,default is 2.'),
                    'validation' => 'isUnsignedInt',
                    'class' => 'fixed-width-sm'
				),
                array(
					'type' => 'switch',
					'label' => $this->l('Dynamically load QR code:'),
					'name' => 'load',
					'is_bool' => true,
                    'default_value' => 1,
					'values' => array(
						array(
							'id' => 'load_on',
							'value' => 1,
							'label' => $this->l('Yes')),
						array(
							'id' => 'load_off',
							'value' => 0,
							'label' => $this->l('No')),
					),
                    'validation' => 'isBool',
				)
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
		$helper->submit_action = 'savestqrcode';
		$helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		$helper->tpl_vars = array(
			'fields_value' => $this->getConfigFieldsValues(),
			'languages' => $this->context->controller->getLanguages(),
			'id_language' => $this->context->language->id
		);
		return $helper;
	}
    
    private function _generateQR()
    {
        $chs = Configuration::get('ST_QR_SIZE') ? Configuration::get('ST_QR_SIZE') : 150;
        $margin = (int)Configuration::get('ST_QR_MARGIN');
        $load = (int)Configuration::get('ST_QR_LOAD');
        $image_link = $this->qr_api_url.'chs='.$chs.'x'.$chs.'&cht=qr&chld=L|'.$margin.'&chl='.urlencode(Tools::getProtocol(Tools::usingSecureMode()).$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']); 
        
        $this->smarty->assign(array(
            'load_on_hover' => $load,
            'size' => $chs,
            'image_link' => $image_link
        ));
        return true;        
    }
    
    public function hookDisplayHeader($params)
    {
        $this->context->controller->addJS(($this->_path).'views/js/stqrcode.js');
    }
    
    private function getConfigFieldsValues()
    {
        $fields_values = array(
            'size' => Configuration::get('ST_QR_SIZE'),
            'margin' => Configuration::get('ST_QR_MARGIN'),
            'load' => Configuration::get('ST_QR_LOAD'),
        );
        
        return $fields_values;
    }

    public function hookDisplayRightBar($params)
    {
        return $this->display(__FILE__, 'stqrcode.tpl');
    }
    
    public function hookDisplaySideBarRight($params)
    {
        $this->_generateQR();
        return $this->display(__FILE__, 'stqrcode-side.tpl');
    }
    public function hookDisplayNav($params)
    {
        $this->_generateQR();
        return $this->display(__FILE__, 'stqrcode-nav.tpl');
    }
    public function hookDisplayNavLeft($params)
    {
        return $this->hookDisplayNav($params);
    }
}