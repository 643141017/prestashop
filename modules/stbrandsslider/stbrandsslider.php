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

include_once(dirname(__FILE__).'/StBrandsSliderClass.php');
class StBrandsSlider extends Module
{
    private $_html = '';
    public $fields_form;
    public $fields_value;
    private $_prefix_st = 'BRANDS_';
    private $_prefix_stsn = 'STSN_';
    public $validation_errors = array();
    public static $sort_by = array(
        1 => array('id' =>1 , 'name' => 'Product Name: A to Z'),
        2 => array('id' =>2 , 'name' => 'Product Name: Z to A'),
        3 => array('id' =>3 , 'name' => 'Random'),
    );
    public static $items = array(
		array('id' => 1, 'name' => '1'),
		array('id' => 2, 'name' => '2'),
		array('id' => 3, 'name' => '3'),
		array('id' => 4, 'name' => '4'),
		array('id' => 5, 'name' => '5'),
		array('id' => 6, 'name' => '6'),
    );
    private $_hooks = array();
	public function __construct()
	{
		$this->name          = 'stbrandsslider';
		$this->tab           = 'front_office_features';
		$this->version       = '1.3.4';
		$this->author        = 'SUNNYTOO.COM';
		$this->need_instance = 0;
		$this->bootstrap 	 = true;
		parent::__construct();
        
        $this->initHookArray();
		
		$this->displayName = $this->l('Brands Slider');
		$this->description = $this->l('Brands slider on your home page.');
	}
    
    private function initHookArray()
    {
        $this->_hooks = array(
            'Hooks' => array(
                array(
        			'id' => 'displayFullWidthTop',
        			'val' => '1',
        			'name' => $this->l('displayFullWidthTop')
        		),
                array(
                    'id' => 'displayTopColumn',
                    'val' => '1',
                    'name' => $this->l('displayTopColumn')
                ),
        		array(
        			'id' => 'displayHomeTop',
        			'val' => '1',
        			'name' => $this->l('displayHomeTop')
        		),
                array(
        			'id' => 'displayHome',
        			'val' => '1',
        			'name' => $this->l('displayHome')
        		),
        		array(
        			'id' => 'displayHomeTertiaryLeft',
        			'val' => '1',
        			'name' => $this->l('displayHomeTertiaryLeft')
        		),
        		array(
        			'id' => 'displayHomeTertiaryRight',
        			'val' => '1',
        			'name' => $this->l('displayHomeTertiaryRight')
        		),
        		array(
        			'id' => 'displayHomeSecondaryRight',
        			'val' => '1',
        			'name' => $this->l('displayHomeSecondaryRight')
        		),
                array(
        			'id' => 'displayHomeBottom',
        			'val' => '1',
        			'name' => $this->l('displayHomeBottom')
        		),
        		array(
        			'id' => 'displayBottomColumn',
        			'val' => '1',
        			'name' => $this->l('displayBottomColumn')
        		),
                array(
        			'id' => 'displayFullWidthBottom',
        			'val' => '1',
        			'name' => $this->l('displayFullWidthBottom')
        		),
                array(
        			'id' => 'displayProductSecondaryColumn',
        			'val' => '1',
        			'name' => $this->l('displayProductSecondaryColumn')
        		),
				array(
        			'id' => 'displayCategoryFooter',
        			'val' => '1',
        			'name' => $this->l('displayCategoryFooter')
        		),
				array(
        			'id' => 'displayFooterProduct',
        			'val' => '1',
        			'name' => $this->l('displayFooterProduct')
        		)
            ),
            'Column' => array(
                array(
        			'id' => 'displayLeftColumn',
        			'val' => '1',
        			'name' => $this->l('displayLeftColumn')
        		),
        		array(
        			'id' => 'displayRightColumn',
        			'val' => '1',
        			'name' => $this->l('displayRightColumn')
        		)
            )
        );
    }
    
    private function saveHook()
    {
        foreach($this->_hooks AS $key => $values)
        {
            if (!$key)
                continue;
            foreach($values AS $value)
            {
                $id_hook = Hook::getIdByName($value['id']);
                
                if (Tools::getValue($key.'_'.$value['id']))
                {
                    if ($id_hook && Hook::getModulesFromHook($id_hook, $this->id))
                        continue;
                    if (!$this->isHookableOn($value['id']))
                        $this->validation_errors[] = $this->l('This module cannot be transplanted to '.$value['id'].'.');
                    else
                        $rs = $this->registerHook($value['id'], Shop::getContextListShopID());
                }
                else
                {
                    if($id_hook && Hook::getModulesFromHook($id_hook, $this->id))
                    {
                        $this->unregisterHook($id_hook, Shop::getContextListShopID());
                        $this->unregisterExceptions($id_hook, Shop::getContextListShopID());
                    } 
                }
            }
        }
        // clear module cache to apply new data.
        Cache::clean('hook_module_list');
    }

	public function install()
	{
		if (!parent::install() 
            || !$this->installDB()
            || !$this->initData()
			|| !$this->registerHook('displayHomeBottom')
			|| !$this->registerHook('actionObjectManufacturerDeleteAfter')
			|| !$this->registerHook('actionObjectManufacturerUpdateAfter')
            || !Configuration::updateValue($this->_prefix_st.'SLIDER_NBR', 10)
            || !Configuration::updateValue($this->_prefix_st.'SLIDER_ORDER', 1)

            || !Configuration::updateValue($this->_prefix_stsn.'BRANDS_PRO_PER_XL', 8)
            || !Configuration::updateValue($this->_prefix_stsn.'BRANDS_PRO_PER_LG', 7)
            || !Configuration::updateValue($this->_prefix_stsn.'BRANDS_PRO_PER_MD', 6)
            || !Configuration::updateValue($this->_prefix_stsn.'BRANDS_PRO_PER_SM', 5)
            || !Configuration::updateValue($this->_prefix_stsn.'BRANDS_PRO_PER_XS', 3)
            || !Configuration::updateValue($this->_prefix_stsn.'BRANDS_PRO_PER_XXS', 2)
            || !Configuration::updateValue($this->_prefix_st.'SLIDER_SLIDESHOW', 0)
            || !Configuration::updateValue($this->_prefix_st.'SLIDER_S_SPEED', 7000)
            || !Configuration::updateValue($this->_prefix_st.'SLIDER_A_SPEED', 400)
            || !Configuration::updateValue($this->_prefix_st.'SLIDER_PAUSE_ON_HOVER', 1)
            || !Configuration::updateValue($this->_prefix_st.'SLIDER_REWIND_NAV', 0)
            || !Configuration::updateValue($this->_prefix_st.'SLIDER_LAZY', 1)
            || !Configuration::updateValue($this->_prefix_st.'SLIDER_MOVE', 0)

            || !Configuration::updateValue($this->_prefix_st.'S_ITEMS_COL', 2)
            || !Configuration::updateValue($this->_prefix_st.'S_SLIDESHOW_COL', 0)
            || !Configuration::updateValue($this->_prefix_st.'S_S_SPEED_COL', 7000)
            || !Configuration::updateValue($this->_prefix_st.'S_A_SPEED_COL', 400)
            || !Configuration::updateValue($this->_prefix_st.'S_PAUSE_ON_HOVER_COL', 1)
            || !Configuration::updateValue($this->_prefix_st.'S_REWIND_NAV_COL', 1)
            || !Configuration::updateValue($this->_prefix_st.'S_LAZY_COL', 0)
            || !Configuration::updateValue($this->_prefix_st.'SLIDER_DISPLAY_TITLE', 0)
            || !Configuration::updateValue($this->_prefix_st.'SLIDER_TITLE', 0)
            || !Configuration::updateValue($this->_prefix_st.'SLIDER_DIRECTION_NAV', 1)
            || !Configuration::updateValue($this->_prefix_st.'SLIDER_CONTROL_NAV', 0))
			return false;
        $this->clearBrandsSliderCache();
		return true;
	}
	public function uninstall()
	{
        $this->clearBrandsSliderCache();
		if (!parent::uninstall() 
            || !$this->uninstallDB()
        )
			return false;
		return true;
	}
    private function installDB()
	{
		return Db::getInstance()->execute('
			CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'st_brands_slider` (
                 `id_manufacturer` int(10) NOT NULL,  
                 `id_shop` int(11) NOT NULL,                   
                PRIMARY KEY (`id_manufacturer`,`id_shop`),    
                KEY `id_shop` (`id_shop`)       
			) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8 ;');
	}
	private function uninstallDB()
	{
		return Db::getInstance()->execute('DROP TABLE IF EXISTS `'._DB_PREFIX_.'st_brands_slider`');
	}  
    private function initData()
    {
        $res = true;
        $manufacturers = Manufacturer::getManufacturers(false, (int)$this->context->language->id);
        if (is_array($manufacturers) && count($manufacturers))
        {
            foreach($manufacturers as $k => $v)
                if($k<10)
                    $res &= Db::getInstance()->insert('st_brands_slider', array(
        					'id_manufacturer' => (int)$v['id_manufacturer'],
        					'id_shop' => (int)$this->context->shop->id,
        				));
                else
                    break;
        }
        return $res;
    }
    public function getContent()
	{
	    $this->context->controller->addJS($this->_path. 'views/js/admin.js');
	    $this->initFieldsForm();
        if (Tools::getValue('act') == 'gmfb' && Tools::getValue('ajax')==1)
        {
            if(!$q = Tools::getValue('q'))
                die;
            $excludeIds = Tools::getValue('excludeIds');
            $result = Db::getInstance()->executeS('
			SELECT m.`id_manufacturer`,m.`name`
			FROM `'._DB_PREFIX_.'manufacturer` m
            LEFT JOIN `'._DB_PREFIX_.'manufacturer_shop` ms
            ON m.`id_manufacturer` = ms.`id_manufacturer`
			WHERE `name` LIKE \'%'.pSQL($q).'%\'
            AND id_shop = '.(int)Shop::getContextShopID().'
            AND `active` = 1
            '.($excludeIds ? 'AND m.`id_manufacturer` NOT IN('.$excludeIds.')' : '').'
    		');
            foreach ($result AS $value)
		      echo trim($value['name']).'|'.(int)($value['id_manufacturer'])."\n";
            die;
        }
		if (isset($_POST['savestbrandsslider']))
		{
		    StBrandsSliderClass::deleteByShop((int)$this->context->shop->id);
            $res = true;
            if($id_manufacturer = Tools::getValue('id_manufacturer'))
                foreach($id_manufacturer AS $value)
                {
                  $res &= Db::getInstance()->insert('st_brands_slider', array(
        					'id_manufacturer' => (int)$value,
        					'id_shop' => (int)$this->context->shop->id,
        				));  
                }
                    
            if($res)
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
                
                $this->saveHook();

                if(count($this->validation_errors))
                    $this->_html .= $this->displayError(implode('<br/>',$this->validation_errors));
                else 
                    $this->_html .= $this->displayConfirmation($this->l('Settings updated'));
            }
            else
                $this->_html .= $this->displayError($this->l('Cannot update settings'));
                
            $this->clearBrandsSliderCache();            
        }
		$helper = $this->initForm();                    
		return $this->_html.$helper->generateForm($this->fields_form);
	}

    public function initFieldsForm()
    {
		$this->fields_form[0]['form'] = array(
			'legend' => array(
				'title' => $this->displayName,
                'icon' => 'icon-cogs'
			),
			'input' => array(
                array(
					'type' => 'text',
					'label' => $this->l('Define the number of brands to be displayed:'),
					'name' => 'slider_nbr',
                    'required' => true,
                    'desc' => $this->l('Define the number of brands that you would like to display on homepage (default: 8).'),
                    'validation' => 'isUnsignedInt',
                    'class' => 'fixed-width-sm'
				),
                array(
                    'type' => 'select',
    				'label' => $this->l('Sort order:'),
    				'name' => 'slider_order',
    				'options' => array(
    					'query' => self::$sort_by,
        				'id' => 'id',
        				'name' => 'name',
    				),
                    'validation' => 'isUnsignedInt',
                    //'desc' => $this->l('If you choose "RANDOM" smarty cache will be disabled'),
                ),
                'manufacturers' => array(
					'type' => 'text',
					'label' => $this->l('Brands/Manufacturers:'),
					'name' => 'manufacturers',
                    'autocomplete' => false,
                    'class' => 'fixed-width-xxl',
                    'desc' => '',
				),
			),
			'submit' => array(
				'title' => $this->l('   Save all  ')
			),
		);
        $this->fields_form[1]['form'] = array(
			'legend' => array(
				'title' => $this->l('Slider on homepage'),
			),
			'input' => array(
                'dropdownlistgroup' => array(
                    'type' => 'dropdownlistgroup',
                    'label' => $this->l('The number of columns:'),
                    'name' => $this->_prefix_st.'pro_per',
                    'values' => array(
                            'maximum' => 10,
                            'medias' => array('xl','lg','md','sm','xs','xxs'),
                        ),
                ), 
                array(
					'type' => 'switch',
					'label' => $this->l('Autoplay:'),
					'name' => 'slider_slideshow',
					'is_bool' => true,
                    'default_value' => 1,
					'values' => array(
						array(
							'id' => 'slide_on',
							'value' => 1,
							'label' => $this->l('Yes')),
						array(
							'id' => 'slide_off',
							'value' => 0,
							'label' => $this->l('No')),
					),
                    'validation' => 'isBool',
				), 
                array(
					'type' => 'text',
					'label' => $this->l('Time:'),
					'name' => 'slider_s_speed',
                    'default_value' => 7000,
                    'desc' => $this->l('The period, in milliseconds, between the end of a transition effect and the start of the next one.'),
                    'validation' => 'isUnsignedInt',
                    'class' => 'fixed-width-sm'
				),
                array(
					'type' => 'text',
					'label' => $this->l('Transition period:'),
					'name' => 'slider_a_speed',
                    'default_value' => 400,
                    'desc' => $this->l('The period, in milliseconds, of the transition effect.'),
                    'validation' => 'isUnsignedInt',
                    'class' => 'fixed-width-sm'
				),
                array(
					'type' => 'switch',
					'label' => $this->l('Pause On Hover:'),
					'name' => 'slider_pause_on_hover',
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
                    'name' => 'slider_rewind_nav',
                    'default_value' => 1,

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
                    'name' => 'slider_lazy',
                    'default_value' => 1,
                    'is_bool' => true,
                    'values' => array(
                        array(
                            'id' => 'slider_lazy_on',
                            'value' => 1,
                            'label' => $this->l('Yes')),
                        array(
                            'id' => 'slider_lazy_off',
                            'value' => 0,
                            'label' => $this->l('No')),
                    ),
                    'validation' => 'isBool',
                    'desc' => $this->l('Delays loading of images. Images outside of viewport won\'t be loaded before user scrolls to them. Great for mobile devices to speed up page loadings.'),
                ),
                array(
                    'type' => 'radio',
                    'label' => $this->l('Display title:'),
                    'name' => 'slider_display_title',
                    'default_value' => 0,
                    'values' => array(
                        array(
                            'id' => 'none',
                            'value' => 0,
                            'label' => $this->l('None')),
                        array(
                            'id' => 'left',
                            'value' => 1,
                            'label' => $this->l('Left')),
                        array(
                            'id' => 'center',
                            'value' => 2,
                            'label' => $this->l('Center')),
                    ),
                    'validation' => 'isUnsignedInt',
                ),
                array(
                    'type' => 'radio',
                    'label' => $this->l('Display "next" and "prev" buttons:'),
                    'name' => 'slider_direction_nav',
                    'default_value' => 0,
                    'values' => array(
                        array(
                            'id' => 'none',
                            'value' => 0,
                            'label' => $this->l('NO')),
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
                    'name' => 'slider_control_nav',
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
				'title' => $this->l('   Save all  ')
			),
		);
        $this->fields_form[2]['form'] = array(
			'legend' => array(
				'title' => $this->l('Slide on left column/right column'),
			),
			'input' => array(
                array(
					'type' => 'select',
        			'label' => $this->l('The number of columns:'),
        			'name' => 's_items_col',
                    'options' => array(
        				'query' => self::$items,
        				'id' => 'id',
        				'name' => 'name',
        			),
                    'validation' => 'isUnsignedInt',
                    'class' => 'fixed-width-sm'
				), 
                array(
					'type' => 'switch',
					'label' => $this->l('Autoplay:'),
					'name' => 's_slideshow_col',
					'is_bool' => true,
                    'default_value' => 1,
					'values' => array(
						array(
							'id' => 'slide_on',
							'value' => 1,
							'label' => $this->l('Yes')),
						array(
							'id' => 'slide_off',
							'value' => 0,
							'label' => $this->l('No')),
					),
                    'validation' => 'isBool',
				), 
                array(
					'type' => 'text',
					'label' => $this->l('Time:'),
					'name' => 's_s_speed_col',
                    'default_value' => 7000,
                    'desc' => $this->l('The period, in milliseconds, between the end of a transition effect and the start of the next one.'),
                    'validation' => 'isUnsignedInt',
                    'class' => 'fixed-width-sm'
				),
                array(
					'type' => 'text',
					'label' => $this->l('Transition period:'),
					'name' => 's_a_speed_col',
                    'default_value' => 400,
                    'desc' => $this->l('The period, in milliseconds, of the transition effect.'),
                    'validation' => 'isUnsignedInt',
                    'class' => 'fixed-width-sm'
				),
                array(
					'type' => 'switch',
					'label' => $this->l('Pause On Hover:'),
					'name' => 's_pause_on_hover_col',
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
                    'name' => 's_rewind_nav_col',
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
                    'name' => 's_lazy_col',
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
			),
			'submit' => array(
				'title' => $this->l('   Save all  ')
			),
		);
        
        $this->fields_form[3]['form'] = array(
			'legend' => array(
				'title' => $this->l('Hook manager'),
                'icon' => 'icon-cogs'
			),
            'description' => $this->l('Check the hook that you would like this module to display on.').'<br/><a href="'.$this->_path.'views/img/hook_into_hint.jpg" target="_blank" >'.$this->l('Click here to see hook position').'</a>.',
			'input' => array(
			),
			'submit' => array(
				'title' => $this->l('   Save all  ')
			),
		);
        foreach($this->_hooks AS $key => $values)
        {
            if (!is_array($values) || !count($values))
                continue;
            $this->fields_form[3]['form']['input'][] = array(
					'type' => 'checkbox',
					'label' => $this->l($key),
					'name' => $key,
					'lang' => true,
					'values' => array(
						'query' => $values,
						'id' => 'id',
						'name' => 'name'
					)
				);
        }
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
		$helper->submit_action = 'savestbrandsslider';
		$helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		$helper->tpl_vars = array(
			'fields_value' => $this->getConfigFieldsValues(),
			'languages' => $this->context->controller->getLanguages(),
			'id_language' => $this->context->language->id
		);
		return $helper;
	}
	public function hookDisplayHome($params, $hook_hash = '', $flag=0)
	{
	    if (!$hook_hash)
            $hook_hash = $this->getHookHash(__FUNCTION__);
		if (Configuration::get($this->_prefix_st.'SLIDER_ORDER')==3 || !$this->isCached('stbrandsslider.tpl', $this->stGetCacheId($hook_hash)))
            $this->_prepareHook(0);
        $this->smarty->assign(array(
            'homeverybottom'         => ($flag==2 ? true : false),
            'hook_hash'              => $hook_hash
        ));
        if(Configuration::get($this->_prefix_st.'SLIDER_ORDER')==3)
            return $this->display(__FILE__, 'stbrandsslider.tpl');
        else
		    return $this->display(__FILE__, 'stbrandsslider.tpl', $this->stGetCacheId($hook_hash));
	}
    public function hookDisplayHomeBottom($params)
    {
        return $this->hookDisplayHome($params, $this->getHookHash(__FUNCTION__));
    }
    public function hookDisplayHomeTop($params)
    {
        return $this->hookDisplayHome($params, $this->getHookHash(__FUNCTION__));
    }
    public function hookDisplayTopColumn($params)
    {
        return $this->hookDisplayHome($params, $this->getHookHash(__FUNCTION__) ,2);
    }
    public function hookDisplayBottomColumn($params)
    {
        return $this->hookDisplayHome($params, $this->getHookHash(__FUNCTION__) ,2);
    }
    public function hookDisplayFullWidthTop($params)
    {
        if(Dispatcher::getInstance()->getController()!='index')
            return false;

        return $this->hookDisplayHome($params, $this->getHookHash(__FUNCTION__) ,2);
    }
    public function hookDisplayFullWidthBottom($params)
    {
        if(Dispatcher::getInstance()->getController()!='index')
            return false;

        return $this->hookDisplayHome($params, $this->getHookHash(__FUNCTION__) ,2);
    }
    public function hookDisplayHomeTertiaryLeft($params)
    {
        return $this->hookDisplayHome($params, $this->getHookHash(__FUNCTION__));
    }
    public function hookDisplayHomeTertiaryRight($params)
    {
        return $this->hookDisplayHome($params, $this->getHookHash(__FUNCTION__));
    }
    

    public function hookDisplayHomeSecondaryRight($params)
    {
        return $this->hookDisplayLeftColumn($params, $this->getHookHash(__FUNCTION__));
    }
    public function hookDisplayRightColumn($params)
    {
        return $this->hookDisplayLeftColumn($params, $this->getHookHash(__FUNCTION__));
    }
    public function hookDisplayLeftColumn($params, $hook_hash = '')
    {
        if (!$hook_hash)
            $hook_hash = $this->getHookHash(__FUNCTION__);
		if (Configuration::get($this->_prefix_st.'SLIDER_ORDER')==3 || !$this->isCached('stbrandsslider-column.tpl', $this->stGetCacheId($hook_hash)))
            $this->_prepareHook(1);
        $this->smarty->assign(array(
            'hook_hash' => $hook_hash
        ));
        if(Configuration::get($this->_prefix_st.'SLIDER_ORDER')==3)
            return $this->display(__FILE__, 'stbrandsslider-column.tpl');
        else
		    return $this->display(__FILE__, 'stbrandsslider-column.tpl', $this->stGetCacheId($hook_hash));
    }
	public function hookDisplayProductSecondaryColumn($params)
	{
        return $this->hookDisplayLeftColumn($params, $this->getHookHash(__FUNCTION__));
	}
    
    public function hookDisplayCategoryFooter($params)
    {
        return $this->hookDisplayHome($params, $this->getHookHash(__FUNCTION__));
    }
    
    public function hookDisplayFooterProduct($params)
    {
        return $this->hookDisplayHome($params, $this->getHookHash(__FUNCTION__));
    }
    
    private function _prepareHook($col=0)
    {
        $brands = $this->getManufacturers(Configuration::get($this->_prefix_st.'SLIDER_NBR'), $this->context->shop->id,$this->context->language->id);

        $pre = $col ? 'S' : 'SLIDER';
        $ext = $col ? '_COL' : '';

		$this->smarty->assign(array(
            'brands'                      => $brands,
            'manufacturerSize'            => Image::getSize(ImageType::getFormatedName('manufacturer')),
            
            'brand_slider_slideshow'      => Configuration::get($this->_prefix_st.''.$pre.'_SLIDESHOW'.$ext),
            'brand_slider_s_speed'        => Configuration::get($this->_prefix_st.''.$pre.'_S_SPEED'.$ext),
            'brand_slider_a_speed'        => Configuration::get($this->_prefix_st.''.$pre.'_A_SPEED'.$ext),
            'brand_slider_pause_on_hover' => Configuration::get($this->_prefix_st.''.$pre.'_PAUSE_ON_HOVER'.$ext),
            'brand_slider_rewind_nav'     => Configuration::get($this->_prefix_st.''.$pre.'_REWIND_NAV'.$ext),
            'brand_slider_loop'           => Configuration::get($this->_prefix_st.''.$pre.'_LOOP'.$ext),
            
            'brand_slider_move'           => Configuration::get($this->_prefix_st.'SLIDER_MOVE'),
            'brand_slider_items'          => Configuration::get($this->_prefix_st.'S_ITEMS_COL'),
            
            'lazy_load'                   => Configuration::get($this->_prefix_st.''.$pre.'_LAZY'.$ext),
            
            'pro_per_xl'                  => (int)Configuration::get($this->_prefix_stsn.'BRANDS_PRO_PER_XL'),
            'pro_per_lg'                  => (int)Configuration::get($this->_prefix_stsn.'BRANDS_PRO_PER_LG'),
            'pro_per_md'                  => (int)Configuration::get($this->_prefix_stsn.'BRANDS_PRO_PER_MD'),
            'pro_per_sm'                  => (int)Configuration::get($this->_prefix_stsn.'BRANDS_PRO_PER_SM'),
            'pro_per_xs'                  => (int)Configuration::get($this->_prefix_stsn.'BRANDS_PRO_PER_XS'),
            'pro_per_xxs'                 => (int)Configuration::get($this->_prefix_stsn.'BRANDS_PRO_PER_XXS'),
            'display_title'               => Configuration::get($this->_prefix_st.'SLIDER_DISPLAY_TITLE'),
            'direction_nav'               => Configuration::get($this->_prefix_st.'SLIDER_DIRECTION_NAV'),
            'control_nav'                 => Configuration::get($this->_prefix_st.'SLIDER_CONTROL_NAV'),
        ));
    }
    public function hookActionObjectManufacturerDeleteAfter($params)
    {
        $this->clearBrandsSliderCache();
    }
    public function hookActionObjectManufacturerUpdateAfter($params)
    {
        $this->clearBrandsSliderCache();
    }
	private function clearBrandsSliderCache()
	{
        $this->_clearCache('*');
	}
    
    protected function stGetCacheId($key,$name = null)
    {
        $cache_id = parent::getCacheId($name);
        return $cache_id.'_'.$key;
    }

	public function getManufacturers($nbr, $id_shop , $id_lang = 0 )
	{
		if (!$id_lang)
			$id_lang = (int)Configuration::get('PS_LANG_DEFAULT');
		if (!$id_shop)
			$id_shop = (int)$this->context->shop->id;

		$sql = 'SELECT m.*, ml.`description`, ml.`short_description`
			FROM `'._DB_PREFIX_.'st_brands_slider` sbs
            LEFT JOIN `'._DB_PREFIX_.'manufacturer` m ON m.`id_manufacturer` = sbs.`id_manufacturer` 
			LEFT JOIN `'._DB_PREFIX_.'manufacturer_lang` ml ON (
				m.`id_manufacturer` = ml.`id_manufacturer`
				AND ml.`id_lang` = '.(int)$id_lang.'
			)
			'.Shop::addSqlAssociation('manufacturer', 'm');
			$sql .= ' WHERE sbs.`id_shop` = '.$id_shop.' AND m.`active` = 1 
            GROUP BY m.id_manufacturer ';
            switch(Configuration::get($this->_prefix_st.'SLIDER_ORDER'))
            {
                case 1:
                    $sql .= ' ORDER BY m.`name` ASC ';
                break;
                case 2:
                    $sql .= ' ORDER BY m.`name` DESC ';
                break;
                case 3:
                    $sql .= ' ORDER BY RAND() ';
                break;
                default:
                    $sql .= ' ORDER BY m.`name` ASC ';
                break;
            }
            $sql .= ($nbr ? ' LIMIT '.$nbr : '');

		$manufacturers = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);
		if ($manufacturers === false)
			return false;

		$total_manufacturers = count($manufacturers);
		$rewrite_settings = (int)Configuration::get('PS_REWRITING_SETTINGS');

		for ($i = 0; $i < $total_manufacturers; $i++)
			if ($rewrite_settings)
				$manufacturers[$i]['link_rewrite'] = Tools::link_rewrite($manufacturers[$i]['name']);
			else
				$manufacturers[$i]['link_rewrite'] = 0;
		return $manufacturers;
	}
    private function getConfigFieldsValues()
    {
        $fields_values = array(
            'slider_nbr'            => Configuration::get($this->_prefix_st.'SLIDER_NBR'),
            'slider_order'          => Configuration::get($this->_prefix_st.'SLIDER_ORDER'),
            
            'slider_slideshow'      => Configuration::get($this->_prefix_st.'SLIDER_SLIDESHOW'),
            'slider_s_speed'        => Configuration::get($this->_prefix_st.'SLIDER_S_SPEED'),
            'slider_a_speed'        => Configuration::get($this->_prefix_st.'SLIDER_A_SPEED'),
            'slider_pause_on_hover' => Configuration::get($this->_prefix_st.'SLIDER_PAUSE_ON_HOVER'),
            'slider_rewind_nav'     => Configuration::get($this->_prefix_st.'SLIDER_REWIND_NAV'),
            'slider_lazy'           => Configuration::get($this->_prefix_st.'SLIDER_LAZY'),
            
            'slider_move'           => Configuration::get($this->_prefix_st.'SLIDER_MOVE'),
            
            's_slideshow_col'       => Configuration::get($this->_prefix_st.'S_SLIDESHOW_COL'),
            's_s_speed_col'         => Configuration::get($this->_prefix_st.'S_S_SPEED_COL'),
            's_a_speed_col'         => Configuration::get($this->_prefix_st.'S_A_SPEED_COL'),
            's_pause_on_hover_col'  => Configuration::get($this->_prefix_st.'S_PAUSE_ON_HOVER_COL'),
            's_rewind_nav_col'      => Configuration::get($this->_prefix_st.'S_REWIND_NAV_COL'),
            's_lazy_col'            => Configuration::get($this->_prefix_st.'S_LAZY_COL'),
            's_items_col'           => Configuration::get($this->_prefix_st.'S_ITEMS_COL'),  
            'slider_display_title'                 => Configuration::get($this->_prefix_st.'SLIDER_DISPLAY_TITLE'),
            'slider_title'                 => Configuration::get($this->_prefix_st.'SLIDER_TITLE'),
            'slider_direction_nav'         => Configuration::get($this->_prefix_st.'SLIDER_DIRECTION_NAV'),
            'slider_control_nav'           => Configuration::get($this->_prefix_st.'SLIDER_CONTROL_NAV'),
            
            $this->_prefix_st.'pro_per_xl'         => Configuration::get($this->_prefix_stsn.'BRANDS_PRO_PER_XL'),
            $this->_prefix_st.'pro_per_lg'         => Configuration::get($this->_prefix_stsn.'BRANDS_PRO_PER_LG'),
            $this->_prefix_st.'pro_per_md'         => Configuration::get($this->_prefix_stsn.'BRANDS_PRO_PER_MD'),
            $this->_prefix_st.'pro_per_sm'         => Configuration::get($this->_prefix_stsn.'BRANDS_PRO_PER_SM'),
            $this->_prefix_st.'pro_per_xs'         => Configuration::get($this->_prefix_stsn.'BRANDS_PRO_PER_XS'),
            $this->_prefix_st.'pro_per_xxs'        => Configuration::get($this->_prefix_stsn.'BRANDS_PRO_PER_XXS'),
            
            'manufacturers'     => '',
        ); 
        
        $manufacturers_html = '';
        foreach(StBrandsSliderClass::getByShop((int)$this->context->shop->id) AS $value)
        {
            $manufacturers_html .= '<li>'.Manufacturer::getNameById($value['id_manufacturer']).'
            <a href="javascript:;" class="del_manufacturer"><img src="../img/admin/delete.gif" /></a>
            <input type="hidden" name="id_manufacturer[]" value="'.$value['id_manufacturer'].'" /></li>';
        }
        
        $this->fields_form[0]['form']['input']['manufacturers']['desc'] = $this->l('Current manufacturers')
                .': <ul id="curr_manufacturers">'.$manufacturers_html.'</ul>';
                
        foreach($this->_hooks AS $key => $values)
        {
            if (!$key)
                continue;
            foreach($values AS $value)
            {
                $fields_values[$key.'_'.$value['id']] = 0;
                if($id_hook = Hook::getIdByName($value['id']))
                    if(Hook::getModulesFromHook($id_hook, $this->id))
                        $fields_values[$key.'_'.$value['id']] = 1;
            }
        }
        
        return $fields_values;
    }
    public function getHookHash($func='')
    {
        if (!$func)
            return '';
        return substr(md5($func), 0, 10);
    }
}