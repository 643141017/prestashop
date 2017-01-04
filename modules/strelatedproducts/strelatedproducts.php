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
    
include_once(dirname(__FILE__).'/StRelatedProductsClass.php');

class StRelatedProducts extends Module
{
    private $_html = '';
    public $fields_form;
    public $fields_value;
    private $_prefix_st = 'ST_RELATED_';
    private $_prefix_stsn = 'STSN_';
    public $validation_errors = array();
    public static $items = array(
		array('id' => 2, 'name' => '2'),
		array('id' => 3, 'name' => '3'),
		array('id' => 4, 'name' => '4'),
		array('id' => 5, 'name' => '5'),
		array('id' => 6, 'name' => '6'),
    );
    public static $sort_by = array(
        0 => array('id' =>0 , 'name' => 'Random'),
        1 => array('id' =>1 , 'name' => 'Date add: Desc'),
        2 => array('id' =>2 , 'name' => 'Date add: Asc'),
        3 => array('id' =>3 , 'name' => 'Date update: Desc'),
        4 => array('id' =>4 , 'name' => 'Date update: Asc'),
        5 => array('id' =>5 , 'name' => 'Price: Lowest first'),
        6 => array('id' =>6 , 'name' => 'Price: Highest first'),
        7 => array('id' =>7 , 'name' => 'Product ID: Asc'),
        8 => array('id' =>8 , 'name' => 'Product ID: Desc'),
    );
	function __construct()
	{
		$this->name           = 'strelatedproducts';
		$this->tab            = 'front_office_features';
		$this->version        = '1.3.6';
		$this->author         = 'SUNNYTOO.COM';
		$this->need_instance  = 0;
		$this->bootstrap 	  = true;
		parent::__construct();

		$this->displayName = $this->l('Related products');
		$this->description = $this->l('Add related products on product pages.');
	}

	function install()
	{
		if (!parent::install() 
			|| !$this->installDB()
			|| !$this->registerHook('actionProductUpdate')
			|| !$this->registerHook('actionProductUpdate')
			|| !$this->registerHook('actionProductDelete')
            || !$this->registerHook('displayProductSecondaryColumn')
            || !$this->registerHook('displayAdminProductsExtra')
            || !Configuration::updateValue($this->_prefix_st.'BY_TAG', 1)
            || !Configuration::updateValue($this->_prefix_st.'NBR', 8)
            || !Configuration::updateValue($this->_prefix_st.'SLIDESHOW', 0)
            || !Configuration::updateValue($this->_prefix_st.'S_SPEED', 7000)
            || !Configuration::updateValue($this->_prefix_st.'A_SPEED', 400)
            || !Configuration::updateValue($this->_prefix_st.'PAUSE_ON_HOVER', 1)
            || !Configuration::updateValue($this->_prefix_st.'REWIND_NAV', 0)
            || !Configuration::updateValue($this->_prefix_st.'LAZY', 1)
            || !Configuration::updateValue($this->_prefix_st.'MOVE', 0)
            || !Configuration::updateValue($this->_prefix_st.'NBR_COL', 8) 
            || !Configuration::updateValue($this->_prefix_st.'SLIDESHOW_COL', 0)
            || !Configuration::updateValue($this->_prefix_st.'S_SPEED_COL', 7000)
            || !Configuration::updateValue($this->_prefix_st.'A_SPEED_COL', 400)
            || !Configuration::updateValue($this->_prefix_st.'PAUSE_ON_HOVER_COL', 1)
            || !Configuration::updateValue($this->_prefix_st.'REWIND_NAV_COL', 1)
            || !Configuration::updateValue($this->_prefix_st.'LAZY_COL', 0)
            || !Configuration::updateValue($this->_prefix_st.'MOVE_COL', 0)
            || !Configuration::updateValue($this->_prefix_st.'ITEMS_COL', 1)
            || !Configuration::updateValue($this->_prefix_st.'SOBY', 1)
            || !Configuration::updateValue($this->_prefix_st.'SOBY_COL', 1)
            || !Configuration::updateValue($this->_prefix_st.'HIDE_MOB', 0)
            || !Configuration::updateValue($this->_prefix_st.'HIDE_MOB_COL', 0)

            || !Configuration::updateValue($this->_prefix_stsn.'RELATED_PRO_PER_XL', 6)
            || !Configuration::updateValue($this->_prefix_stsn.'RELATED_PRO_PER_LG', 5)
            || !Configuration::updateValue($this->_prefix_stsn.'RELATED_PRO_PER_MD', 4)
            || !Configuration::updateValue($this->_prefix_stsn.'RELATED_PRO_PER_SM', 3)
            || !Configuration::updateValue($this->_prefix_stsn.'RELATED_PRO_PER_XS', 2)
            || !Configuration::updateValue($this->_prefix_stsn.'RELATED_PRO_PER_XXS', 1)

            || !Configuration::updateValue($this->_prefix_st.'TITLE', 0)
            || !Configuration::updateValue($this->_prefix_st.'DIRECTION_NAV', 1)
            || !Configuration::updateValue($this->_prefix_st.'CONTROL_NAV', 0)
        )
			return false;
		$this->_clearCache('strelatedproducts.tpl');
		return true;
	}
    private function installDB()
	{
		$return = (bool)Db::getInstance()->execute('
			CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'st_related_products` (                 
              `id_product_1` int(10) unsigned NOT NULL DEFAULT 0,         
              `id_product_2` int(10) unsigned NOT NULL DEFAULT 0,
			  PRIMARY KEY (`id_product_1`,`id_product_2`)
			) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8 ;');
            
		return $return;
	}
	private function uninstallDB()
	{
		return Db::getInstance()->execute('DROP TABLE IF EXISTS `'._DB_PREFIX_.'st_related_products`');
	}	
	public function uninstall()
	{
		$this->_clearCache('strelatedproducts.tpl');
		if (!parent::uninstall() ||
			!$this->uninstallDB())
			return false;
		return true;
	}
        
    public function getContent()
	{
	    $this->initFieldsForm();
		if (isset($_POST['savestrelatedproducts']))
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
                            Configuration::updateValue($this->_prefix_st.strtoupper($field['name']), $value);
                        }
                        else
                            Configuration::updateValue($this->_prefix_st.strtoupper($field['name']), $value);
                    }
            
            $name = $this->fields_form[1]['form']['input']['dropdownlistgroup']['name'];
            foreach ($this->fields_form[1]['form']['input']['dropdownlistgroup']['values']['medias'] as $v)
                Configuration::updateValue($this->_prefix_stsn.strtoupper($name.'_'.$v), (int)Tools::getValue($name.'_'.$v));

            if(count($this->validation_errors))
                $this->_html .= $this->displayError(implode('<br/>',$this->validation_errors));
            else 
            {
		        $this->_clearCache('strelatedproducts.tpl');
                $this->_html .= $this->displayConfirmation($this->l('Settings updated'));  
            }    
        }
		$helper = $this->initForm();
		return $this->_html.$helper->generateForm($this->fields_form);
	}

    public function initFieldsForm()
    {
		$this->fields_form[0]['form'] = array(
			'legend' => array(
				'title' => $this->l('General settings'),
                'icon' => 'icon-cogs'
			),
			'input' => array(
                array(
					'type' => 'switch',
					'label' => $this->l('Automatically generate related products(using tags):'),
					'name' => 'by_tag',
					'is_bool' => true,
                    'default_value' => 1,
					'values' => array(
						array(
							'id' => 'by_tag_on',
							'value' => 1,
							'label' => $this->l('Yes')),
						array(
							'id' => 'by_tag_off',
							'value' => 0,
							'label' => $this->l('No')),
					),
                    'validation' => 'isBool',
				), 
			),
			'submit' => array(
				'title' => $this->l('   Save all  ')
			),
		);
            
		$this->fields_form[1]['form'] = array(
			'legend' => array(
				'title' => $this->l('Sldie settings'),
                'icon' => 'icon-cogs'
			),
			'input' => array(
                array(
					'type' => 'text',
					'label' => $this->l('Define the number of products to be displayed:'),
					'name' => 'nbr',
                    'default_value' => 8,
                    'required' => true,
                    'validation' => 'isUnsignedInt',
                    'class' => 'fixed-width-sm'
				),
                'dropdownlistgroup' => array(
                    'type' => 'dropdownlistgroup',
                    'label' => $this->l('The number of columns:'),
                    'name' => 'related_pro_per',
                    'values' => array(
                            'maximum' => 10,
                            'medias' => array('xl','lg','md','sm','xs','xxs'),
                        ),
                ), 
                array(
					'type' => 'select',
        			'label' => $this->l('Sort by:'),
        			'name' => 'soby',
                    'options' => array(
        				'query' => self::$sort_by,
        				'id' => 'id',
        				'name' => 'name',
        			),
                    'validation' => 'isUnsignedInt',
				), 
                array(
					'type' => 'switch',
					'label' => $this->l('Autoplay:'),
					'name' => 'slideshow',
					'is_bool' => true,
                    'default_value' => 0,
					'values' => array(
						array(
							'id' => 'slideshow_on',
							'value' => 1,
							'label' => $this->l('Yes')),
						array(
							'id' => 'slideshow_off',
							'value' => 0,
							'label' => $this->l('No')),
					),
                    'validation' => 'isBool',
				), 
                array(
					'type' => 'text',
					'label' => $this->l('Time:'),
					'name' => 's_speed',
                    'default_value' => 7000,
                    'required' => true,
                    'desc' => $this->l('The period, in milliseconds, between the end of a transition effect and the start of the next one.'),
                    'validation' => 'isUnsignedInt',
                    'class' => 'fixed-width-sm'
				),
                array(
					'type' => 'text',
					'label' => $this->l('Transition period:'),
					'name' => 'a_speed',
                    'default_value' => 400,
                    'required' => true,
                    'desc' => $this->l('The period, in milliseconds, of the transition effect.'),
                    'validation' => 'isUnsignedInt',
                    'class' => 'fixed-width-sm'
				),
                array(
					'type' => 'switch',
					'label' => $this->l('Pause On Hover:'),
					'name' => 'pause_on_hover',
                    'default_value' => 1,
					'is_bool' => true,
					'values' => array(
						array(
							'id' => 'pause_on_hover_on',
							'value' => 1,
							'label' => $this->l('Yes')),
						array(
							'id' => 'pause_on_hover_off',
							'value' => 0,
							'label' => $this->l('No')),
					),
                    'validation' => 'isBool',
				),
                array(
                    'type' => 'switch',
                    'label' => $this->l('Rewind to first after the last slide:'),
                    'name' => 'rewind_nav',
                    'default_value' => 1,
                    'is_bool' => true,
                    'values' => array(
                        array(
                            'id' => 'rewind_nav_on',
                            'value' => 1,
                            'label' => $this->l('Yes')),
                        array(
                            'id' => 'rewind_nav_off',
                            'value' => 0,
                            'label' => $this->l('No')),
                    ),
                    'validation' => 'isBool',
                ),
                array(
					'type' => 'switch',
					'label' => $this->l('Lazy load:'),
					'name' => 'lazy',
                    'default_value' => 1,
					'is_bool' => true,
					'values' => array(
						array(
							'id' => 'lazy_on',
							'value' => 1,
							'label' => $this->l('Yes')),
						array(
							'id' => 'lazy_off',
							'value' => 0,
							'label' => $this->l('No')),
					),
                    'validation' => 'isBool',
                    'desc' => $this->l('Delays loading of images. Images outside of viewport won\'t be loaded before user scrolls to them. Great for mobile devices to speed up page loadings.'),
				),
                array(
                    'type' => 'radio',
                    'label' => $this->l('Scroll:'),
                    'name' => 'move',
                    'default_value' => 0,
                    'values' => array(
                        array(
                            'id' => 'move_on',
                            'value' => 1,
                            'label' => $this->l('Scroll per page')),
                        array(
                            'id' => 'move_off',
                            'value' => 0,
                            'label' => $this->l('Scroll per item')),
                    ),
                    'validation' => 'isBool',
                ),
                array(
					'type' => 'switch',
					'label' => $this->l('Hide on mobile:'),
					'name' => 'hide_mob',
                    'default_value' => 0,
					'is_bool' => true,
					'values' => array(
						array(
							'id' => 'hide_mob_on',
							'value' => 1,
							'label' => $this->l('Yes')),
						array(
							'id' => 'hide_mob_off',
							'value' => 0,
							'label' => $this->l('No')),
					),
                    'desc' => $this->l('Screen width less than 768px.'),
                    'validation' => 'isBool',
				),
                array(
                    'type' => 'radio',
                    'label' => $this->l('Title text align:'),
                    'name' => 'title',
                    'default_value' => 0,
                    'values' => array(
                        array(
                            'id' => 'left',
                            'value' => 0,
                            'label' => $this->l('Left')),
                        array(
                            'id' => 'center',
                            'value' => 1,
                            'label' => $this->l('Center')),
                    ),
                    'validation' => 'isBool',
                ),
                array(
                    'type' => 'radio',
                    'label' => $this->l('Display "next" and "prev" buttons:'),
                    'name' => 'direction_nav',
                    'default_value' => 0,
                    'values' => array(
                        array(
                            'id' => 'none',
                            'value' => 0,
                            'label' => $this->l('None')),
                        array(
                            'id' => 'top-right',
                            'value' => 1,
                            'label' => $this->l('Top right-hand side')),
                        array(
                            'id' => 'square',
                            'value' => 3,
                            'label' => $this->l('Square')),
                        array(
                            'id' => 'circle',
                            'value' => 4,
                            'label' => $this->l('Circle')),
                    ),
                    'validation' => 'isUnsignedInt',
                ),
                array(
                    'type' => 'switch',
                    'label' => $this->l('Show navigation:'),
                    'name' => 'control_nav',
                    'default_value' => 1,
                    'is_bool' => true,
                    'values' => array(
                        array(
                            'id' => 'control_nav_on',
                            'value' => 1,
                            'label' => $this->l('Yes')),
                        array(
                            'id' => 'control_nav_off',
                            'value' => 0,
                            'label' => $this->l('No')),
                    ),
                    'validation' => 'isBool',
                ),
			),
			'submit' => array(
				'title' => $this->l('   Save all  '),
			)
		);
        $this->fields_form[2]['form'] = array(
			'legend' => array(
				'title' => $this->l('Column Slide Settings'),
                'icon' => 'icon-cogs'
			),
			'input' => array(
                array(
					'type' => 'text',
					'label' => $this->l('Define the number of products to be displayed:'),
					'name' => 'nbr_col',
                    'default_value' => 8,
                    'required' => true,
                    'validation' => 'isUnsignedInt',
                    'class' => 'fixed-width-sm'
				),
                array(
					'type' => 'select',
        			'label' => $this->l('The number of columns:'),
        			'name' => 'items_col',
                    'options' => array(
        				'query' => self::$items,
        				'id' => 'id',
        				'name' => 'name',
        			),
                    'validation' => 'isUnsignedInt',
				), 
                array(
					'type' => 'select',
        			'label' => $this->l('Sort by:'),
        			'name' => 'soby_col',
                    'options' => array(
        				'query' => self::$sort_by,
        				'id' => 'id',
        				'name' => 'name',
        			),
                    'validation' => 'isUnsignedInt',
				), 
                array(
					'type' => 'switch',
					'label' => $this->l('Autoplay:'),
					'name' => 'slideshow_col',
					'is_bool' => true,
                    'default_value' => 0,
					'values' => array(
						array(
							'id' => 'slideshow_col_on',
							'value' => 1,
							'label' => $this->l('Yes')),
						array(
							'id' => 'slideshow_col_off',
							'value' => 0,
							'label' => $this->l('No')),
					),
                    'validation' => 'isBool',
				), 
                array(
					'type' => 'text',
					'label' => $this->l('Time:'),
					'name' => 's_speed_col',
                    'default_value' => 7000,
                    'required' => true,
                    'desc' => $this->l('The period, in milliseconds, between the end of a transition effect and the start of the next one.'),
                    'validation' => 'isUnsignedInt',
                    'class' => 'fixed-width-sm'
				),
                array(
					'type' => 'text',
					'label' => $this->l('Transition period:'),
					'name' => 'a_speed_col',
                    'default_value' => 400,
                    'required' => true,
                    'desc' => $this->l('The period, in milliseconds, of the transition effect.'),
                    'validation' => 'isUnsignedInt',
                    'class' => 'fixed-width-sm'
				),
                array(
					'type' => 'switch',
					'label' => $this->l('Pause On Hover:'),
					'name' => 'pause_on_hover_col',
                    'default_value' => 1,
					'is_bool' => true,
					'values' => array(
						array(
							'id' => 'pause_on_hover_on',
							'value' => 1,
							'label' => $this->l('Yes')),
						array(
							'id' => 'pause_on_hover_off',
							'value' => 0,
							'label' => $this->l('No')),
					),
                    'validation' => 'isBool',
				),
                array(
                    'type' => 'switch',
                    'label' => $this->l('Rewind to first after the last slide:'),
                    'name' => 'rewind_nav_col',
                    'default_value' => 1,
                    'is_bool' => true,
                    'values' => array(
                        array(
                            'id' => 'rewind_nav_col_on',
                            'value' => 1,
                            'label' => $this->l('Yes')),
                        array(
                            'id' => 'rewind_nav_col_off',
                            'value' => 0,
                            'label' => $this->l('No')),
                    ),
                    'validation' => 'isBool',
                ),
                array(
                    'type' => 'switch',
                    'label' => $this->l('Lazy load:'),
                    'name' => 'lazy_col',
                    'default_value' => 1,
                    'is_bool' => true,
                    'values' => array(
                        array(
                            'id' => 'lazy_col_on',
                            'value' => 1,
                            'label' => $this->l('Yes')),
                        array(
                            'id' => 'lazy_col_off',
                            'value' => 0,
                            'label' => $this->l('No')),
                    ),
                    'validation' => 'isBool',
                    'desc' => $this->l('Delays loading of images. Images outside of viewport won\'t be loaded before user scrolls to them. Great for mobile devices to speed up page loadings.'),
                ),
                array(
					'type' => 'hidden',
					'name' => 'move_col',
                    'default_value' => 1,
                    'validation' => 'isBool',
				),
                array(
					'type' => 'switch',
					'label' => $this->l('Hide on mobile:'),
					'name' => 'hide_mob_col',
                    'default_value' => 0,
					'is_bool' => true,
					'values' => array(
						array(
							'id' => 'hide_mob_col_on',
							'value' => 1,
							'label' => $this->l('Yes')),
						array(
							'id' => 'hide_mob_col_off',
							'value' => 0,
							'label' => $this->l('No')),
					),
                    'desc' => array(
                        $this->l('Screen width less than 768px.'),
                        $this->l('Only for this module in left column or right column.'),
                    ),
                    'validation' => 'isBool',
				),
			),
			'submit' => array(
				'title' => $this->l('   Save all  '),
			)
		);
    }
    protected function initForm()
	{
	    $helper = new HelperForm();
		$helper->show_toolbar = false;
        $helper->module = $this;
		$helper->table =  $this->table;
        $helper->module = $this;
		$lang = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
		$helper->default_form_language = $lang->id;
		$helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ? Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;

		$helper->identifier = $this->identifier;
		$helper->submit_action = 'savestrelatedproducts';
		$helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		$helper->tpl_vars = array(
			'fields_value' => $this->getConfigFieldsValues(),
			'languages' => $this->context->controller->getLanguages(),
			'id_language' => $this->context->language->id
		);
		return $helper;
	}
    public function hookDisplayAdminProductsExtra($params)
    {
        
        $id_product = (int)Tools::getValue('id_product');
        $nbr_by_tags = 0;
        
        if($id_product)
		{
            if( Configuration::get($this->_prefix_st.'BY_TAG') )
                $nbr_by_tags = Db::getInstance()->getValue('SELECT COUNT(DISTINCT(t.`id_product`))
														FROM `'._DB_PREFIX_.'product_tag` t
				                                        LEFT JOIN `'._DB_PREFIX_.'product` p ON (p.`id_product`= t.`id_product`)
				                                        '.Shop::addSqlAssociation('product', 'p').'
														WHERE t.`id_product`!='.$id_product.'
														AND t.`id_tag` IN (SELECT `id_tag`
																		 FROM `'._DB_PREFIX_.'product_tag`
																		 WHERE `id_product`='.$id_product.')');

            $related_products = StRelatedProductsClass::getRelatedProductsLight($this->context->language->id, $id_product);
            $this->smarty->assign(array(
                'st_related_products' => $related_products,
            ));
		}
        $this->smarty->assign(array(
            'nbr_by_tags' => $nbr_by_tags,
        ));
        
        return $this->display(__FILE__, 'views/templates/admin/strelatedproducts.tpl'); 
    }
    public function hookDisplayAnywhere($params)
	{
	    if(!isset($params['caller']) || $params['caller']!=$this->name)
            return false;
	    if(isset($params['function']) && method_exists($this,$params['function']))
            return call_user_func(array($this,$params['function']));
    }
    private function _prepareHook($col=0)
    {
        if( Dispatcher::getInstance()->getController() != 'product' )
            return false;
            
        $id_product = (int)Tools::getValue('id_product');
		if (!$id_product)
			return false;
            
        $ext = $col ? '_COL' : '';
        $nbr = Configuration::get($this->_prefix_st.'NBR'.$ext);
        ($nbr===false && $col) && $nbr = Configuration::get($this->_prefix_st.'NBR');
        
        if(!$nbr)
            return false;
        
        $order_by = '';
        $order_way = 'DESC';
        $soby = (int)Configuration::get($this->_prefix_st.'SOBY'.$ext);
        switch($soby)
        {
            case 1:
                $order_by = 'date_add';
                $order_way = 'DESC';
            break;
            case 2:
                $order_by = 'date_add';
                $order_way = 'ASC';
            break;
            case 3:
                $order_by = 'date_upd';
                $order_way = 'DESC';
            break;
            case 4:
                $order_by = 'date_upd';
                $order_way = 'ASC';
            break;
            case 5:
                $order_by = 'price';
                $order_way = 'ASC';
            break;
            case 6:
                $order_by = 'price';
                $order_way = 'DESC';
            break;
            case 7:
                $order_by = 'id_product';
                $order_way = 'ASC';
            break;
            case 8:
                $order_by = 'id_product';
                $order_way = 'DESC';
            break;
            default:
            break;
        }
        if ($order_by == 'id_product' || $order_by == 'price' || $order_by == 'date_add'  || $order_by == 'date_upd')
			$order_by_prefix = 'p';
		else if ($order_by == 'name')
			$order_by_prefix = 'pl';
                
        $related_products_ids = StRelatedProductsClass::getRelatedProducts($id_product);
        if(!is_array($related_products_ids))
            $related_products_ids = array();
        
        if( Configuration::get($this->_prefix_st.'BY_TAG') )
		{
			$related_products_by_tags = Db::getInstance()->executeS('SELECT DISTINCT(t.`id_product`)
														FROM `'._DB_PREFIX_.'product_tag` t
				                                        LEFT JOIN `'._DB_PREFIX_.'product` p ON (p.`id_product`= t.`id_product`)
				                                        '.Shop::addSqlAssociation('product', 'p').'
														WHERE t.`id_product`!='.$id_product.'
														AND t.`id_tag` IN (SELECT `id_tag`
																		 FROM `'._DB_PREFIX_.'product_tag`
																		 WHERE `id_product`='.$id_product.')
                                                        ORDER BY '.($order_by ? 'p.'.pSQL($order_by).' '.pSQL($order_way) : 'RAND()').'
                                                        LIMIT '.$nbr);
                                                                         
            if(is_array($related_products_by_tags) && count($related_products_by_tags))
                foreach($related_products_by_tags as $v)
                    if(count($related_products_ids)<$nbr && !in_array($v['id_product'], $related_products_ids))
                        $related_products_ids[] = $v['id_product'];
		}
		
        if(!is_array($related_products_ids) || !count($related_products_ids))
            return false;
            
        $context = Context::getContext();
        $id_lang = $this->context->language->id;
        
		$groups = FrontController::getCurrentCustomerGroups();
		$sql_groups = (count($groups) ? 'IN ('.implode(',', $groups).')' : '= 1');

		$sql = new DbQuery();
		$sql->select(
			'p.*, product_shop.*, stock.out_of_stock, IFNULL(stock.quantity, 0) as quantity, pl.`description`, pl.`description_short`, pl.`link_rewrite`, pl.`meta_description`,
			pl.`meta_keywords`, pl.`meta_title`, pl.`name`, pl.`available_now`, pl.`available_later`, MAX(image_shop.`id_image`) id_image, il.`legend`, m.`name` AS manufacturer_name,
			product_shop.`date_add` > "'.date('Y-m-d', strtotime('-'.(Configuration::get('PS_NB_DAYS_NEW_PRODUCT') ? (int)Configuration::get('PS_NB_DAYS_NEW_PRODUCT') : 20).' DAY')).'" as new'
		);

		$sql->from('product', 'p');
		$sql->join(Shop::addSqlAssociation('product', 'p'));
		$sql->leftJoin('product_lang', 'pl', '
			p.`id_product` = pl.`id_product`
			AND pl.`id_lang` = '.(int)$id_lang.Shop::addSqlRestrictionOnLang('pl')
		);
		$sql->leftJoin('image', 'i', 'i.`id_product` = p.`id_product`');
		$sql->join(Shop::addSqlAssociation('image', 'i', false, 'image_shop.cover=1'));
		$sql->leftJoin('image_lang', 'il', 'i.`id_image` = il.`id_image` AND il.`id_lang` = '.(int)$id_lang);
		$sql->leftJoin('manufacturer', 'm', 'm.`id_manufacturer` = p.`id_manufacturer`');

		$sql->where('product_shop.`active` = 1');
		$sql->where('product_shop.`visibility` IN ("both", "catalog")');
		$sql->where('p.`id_product` IN ('.implode(',', $related_products_ids).')');
		if (Group::isFeatureActive())
			$sql->where('p.`id_product` IN (
				SELECT cp.`id_product`
				FROM `'._DB_PREFIX_.'category_group` cg
				LEFT JOIN `'._DB_PREFIX_.'category_product` cp ON (cp.`id_category` = cg.`id_category`)
				WHERE cg.`id_group` '.$sql_groups.'
			)');
		$sql->groupBy('product_shop.id_product');

		$sql->orderBy( $order_by ? ((isset($order_by_prefix) ? pSQL($order_by_prefix).'.' : '').'`'.pSQL($order_by).'` '.pSQL($order_way)) : 'RAND()');

		if (Combination::isFeatureActive())
		{
			$sql->select('MAX(product_attribute_shop.id_product_attribute) id_product_attribute');
			$sql->leftOuterJoin('product_attribute', 'pa', 'p.`id_product` = pa.`id_product`');
			$sql->join(Shop::addSqlAssociation('product_attribute', 'pa', false, 'product_attribute_shop.default_on = 1'));
		}
		$sql->join(Product::sqlStock('p', Combination::isFeatureActive() ? 'product_attribute_shop' : 0));

		$result = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);

		if ($order_by == 'price')
			Tools::orderbyPrice($result, $order_way);

		if (!$result)
			return false;

        $products = Product::getProductsProperties($id_lang, $result);
        
		// 2014 08 05
		foreach ($products as &$value) {
			if($value['date_add'] > date('Y-m-d', strtotime('-'.(Configuration::get('PS_NB_DAYS_NEW_PRODUCT') ? (int)Configuration::get('PS_NB_DAYS_NEW_PRODUCT') : 20).' DAY')))
				$value['new'] = 1;
			else
				$value['new'] = 0;
		}
		// 2014 08 05
		
        $homeSize = Image::getSize(ImageType::getFormatedName('home'));
        
        if(is_array($products) && count($products))
        {
            $module_stthemeeditor = Module::getInstanceByName('stthemeeditor');
			if ($module_stthemeeditor && $module_stthemeeditor->id)
				$id_module_stthemeeditor = $module_stthemeeditor->id;
                    
            $module_sthoverimage = Module::getInstanceByName('sthoverimage');
            if ($module_sthoverimage && $module_sthoverimage->id)
                $id_module_sthoverimage = $module_sthoverimage->id;
                
            foreach($products as &$product)
            {
                if(isset($id_module_stthemeeditor))
                {
                    $product['pro_a_wishlist'] = Hook::exec('displayAnywhere', array('function'=>'getAddToWhishlistButton','id_product'=>$product['id_product'],'show_icon'=>0,'caller'=>'stthemeeditor'), $id_module_stthemeeditor);
                    $product['pro_rating_average'] = Hook::exec('displayAnywhere', array('function'=>'getProductRatingAverage','id_product'=>$product['id_product'],'caller'=>'stthemeeditor'), $id_module_stthemeeditor);
                }
                if(isset($id_module_sthoverimage))
                {
                    $product['hover_image'] = Hook::exec('displayAnywhere', array('function'=>'getHoverImage','id_product'=>$product['id_product'],'product_link_rewrite'=>$product['link_rewrite'],'product_name'=>$product['name'],'home_default_height'=>$homeSize['height'],'home_default_width'=>$homeSize['width'],'caller'=>'sthoverimage'), $id_module_sthoverimage);
                }
            }
        }
		/*
        if (!$newProducts)
			return false;
		*/
        
        
        $slideshow = Configuration::get($this->_prefix_st.'SLIDESHOW'.$ext);
        
        $s_speed = Configuration::get($this->_prefix_st.'S_SPEED'.$ext);
        
        $a_speed = Configuration::get($this->_prefix_st.'A_SPEED'.$ext);
        
        $pause_on_hover = Configuration::get($this->_prefix_st.'PAUSE_ON_HOVER'.$ext);

        $rewind_nav = Configuration::get($this->_prefix_st.'REWIND_NAV'.$ext);
        
        $loop = Configuration::get($this->_prefix_st.'LOOP'.$ext);
        
        $move = Configuration::get($this->_prefix_st.'MOVE'.$ext);
        
        $items = Configuration::get($this->_prefix_st.'ITEMS_COL');
        
        $hide_mob = Configuration::get($this->_prefix_st.'HIDE_MOB'.$ext);

        $lazy_load      = Configuration::get($this->_prefix_st.'LAZY'.$ext);
        
        $this->smarty->assign(array(
			'products' => $products,
			'add_prod_display' => Configuration::get('PS_ATTRIBUTE_CATEGORY_DISPLAY'),
			'homeSize' => $homeSize,
			'mediumSize' => Image::getSize(ImageType::getFormatedName('medium')),
			'smallSize' => Image::getSize(ImageType::getFormatedName('small')),
            'slider_slideshow' => $slideshow,
            'slider_s_speed' => $s_speed,
            'slider_a_speed' => $a_speed,
            'slider_pause_on_hover' => $pause_on_hover,
            'rewind_nav' => $rewind_nav,
            'slider_loop' => $loop,
            'slider_move' => $move,
            'slider_items' => $items,
			'hide_mob' => (int)$hide_mob,
            'lazy_load'             => $lazy_load,
            'title_position'        => Configuration::get($this->_prefix_st.'TITLE'),
            'direction_nav'         => Configuration::get($this->_prefix_st.'DIRECTION_NAV'),
            'control_nav'           => Configuration::get($this->_prefix_st.'CONTROL_NAV'),
		));
        return true;
    }
    
    
	public function hookDisplayLeftColumn($params)
	{
	    if(!$this->_prepareHook(1))
            return false;
        $this->smarty->assign(array(
            'column_slider'         => true,
        ));
		return $this->display(__FILE__, 'strelatedproducts.tpl');
	}
	public function hookDisplayRightColumn($params)
    {
        return $this->hookDisplayLeftColumn($params);
    }
	public function hookDisplayProductSecondaryColumn($params)
	{
        return $this->hookDisplayLeftColumn($params);
	}
    public function hookDisplayFooterProduct($params)
	{
	    if(!$this->_prepareHook(0))
            return false;
        $this->smarty->assign(array(
            'column_slider'         => false,

            'pro_per_xl'       => (int)Configuration::get($this->_prefix_stsn.'RELATED_PRO_PER_XL'),
            'pro_per_lg'       => (int)Configuration::get($this->_prefix_stsn.'RELATED_PRO_PER_LG'),
            'pro_per_md'       => (int)Configuration::get($this->_prefix_stsn.'RELATED_PRO_PER_MD'),
            'pro_per_sm'       => (int)Configuration::get($this->_prefix_stsn.'RELATED_PRO_PER_SM'),
            'pro_per_xs'       => (int)Configuration::get($this->_prefix_stsn.'RELATED_PRO_PER_XS'),
            'pro_per_xxs'       => (int)Configuration::get($this->_prefix_stsn.'RELATED_PRO_PER_XXS'),
        ));
		return $this->display(__FILE__, 'strelatedproducts.tpl');
	}

	public function hookActionProductUpdate($params)
	{        
        if (Tools::getValue('ajax') == 1)
            return false;
        if (!Tools::getValue('submitted_tabs') || !in_array('ModuleStrelatedproducts', Tools::getValue('submitted_tabs')))
            return false;
        
		$id_product = (int)Tools::getValue('id_product');
        StRelatedProductsClass::deleteRelatedProducts($id_product);
		if ($related_products = Tools::getValue('inputRelatedProducts'))
		{
			$related_products_id = array_unique(explode('-', $related_products));
			if (count($related_products_id))
			{
				array_pop($related_products_id);
				StRelatedProductsClass::saveRelatedProducts($id_product, $related_products_id);
			}
		}    
		$this->_clearCache('strelatedproducts.tpl');
        return ;
	}
    
    public function hookActionProductAdd($params)
	{
        return $this->hookActionProductUpdate($params);
	}

	public function hookActionProductDelete($params)
	{
	    if (Tools::getValue('ajax') == 1)
            return false;
        if($params['product']->id)
            StRelatedProductsClass::deleteRelatedProducts($params['product']->id);
		$this->_clearCache('strelatedproducts.tpl');
        return;
	}
    
    private function getConfigFieldsValues()
    {
        $fields_values = array(
            'by_tag'             => Configuration::get($this->_prefix_st.'BY_TAG'),
            
            'nbr'                => Configuration::get($this->_prefix_st.'NBR'),
            'slideshow'          => Configuration::get($this->_prefix_st.'SLIDESHOW'),
            's_speed'            => Configuration::get($this->_prefix_st.'S_SPEED'),
            'a_speed'            => Configuration::get($this->_prefix_st.'A_SPEED'),
            'pause_on_hover'     => Configuration::get($this->_prefix_st.'PAUSE_ON_HOVER'),
            'rewind_nav'         => Configuration::get($this->_prefix_st.'REWIND_NAV'),
            'lazy'               => Configuration::get($this->_prefix_st.'LAZY'),
            'move'               => Configuration::get($this->_prefix_st.'MOVE'),
            'soby'               => Configuration::get($this->_prefix_st.'SOBY'),
            'hide_mob'           => Configuration::get($this->_prefix_st.'HIDE_MOB'),
            
            'nbr_col'            => Configuration::get($this->_prefix_st.'NBR_COL'),
            'slideshow_col'      => Configuration::get($this->_prefix_st.'SLIDESHOW_COL'),
            's_speed_col'        => Configuration::get($this->_prefix_st.'S_SPEED_COL'),
            'a_speed_col'        => Configuration::get($this->_prefix_st.'A_SPEED_COL'),
            'pause_on_hover_col' => Configuration::get($this->_prefix_st.'PAUSE_ON_HOVER_COL'),
            'rewind_nav_col'     => Configuration::get($this->_prefix_st.'REWIND_NAV_COL'),
            'lazy_col'           => Configuration::get($this->_prefix_st.'LAZY_COL'),
            'move_col'           => Configuration::get($this->_prefix_st.'MOVE_COL'),
            'items_col'          => Configuration::get($this->_prefix_st.'ITEMS_COL'),
            'soby_col'           => Configuration::get($this->_prefix_st.'SOBY_COL'),
            'hide_mob_col'       => Configuration::get($this->_prefix_st.'HIDE_MOB_COL'),
            'title'              => Configuration::get($this->_prefix_st.'TITLE'),
            'direction_nav'      => Configuration::get($this->_prefix_st.'DIRECTION_NAV'),
            'control_nav'        => Configuration::get($this->_prefix_st.'CONTROL_NAV'),

            'related_pro_per_xl'     => Configuration::get($this->_prefix_stsn.'RELATED_PRO_PER_XL'),
            'related_pro_per_lg'     => Configuration::get($this->_prefix_stsn.'RELATED_PRO_PER_LG'),
            'related_pro_per_md'     => Configuration::get($this->_prefix_stsn.'RELATED_PRO_PER_MD'),
            'related_pro_per_sm'     => Configuration::get($this->_prefix_stsn.'RELATED_PRO_PER_SM'),
            'related_pro_per_xs'     => Configuration::get($this->_prefix_stsn.'RELATED_PRO_PER_XS'),
            'related_pro_per_xxs'    => Configuration::get($this->_prefix_stsn.'RELATED_PRO_PER_XXS'),
        );
        return $fields_values;
    }
}