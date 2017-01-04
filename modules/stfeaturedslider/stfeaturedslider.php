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

class StFeaturedSlider extends Module
{
    protected static $cache_featured_products = array();
	private $_html = '';
    public $fields_form;
    public $fields_value;
    private $_prefix_st = 'HOME_FEATURED_S_';
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
        1 => array('id' =>1 , 'name' => 'Product Name: A to Z'),
        2 => array('id' =>2 , 'name' => 'Product Name: Z to A'),
        3 => array('id' =>3 , 'name' => 'Price: Lowest first'),
        4 => array('id' =>4 , 'name' => 'Price: Highest first'),
        5 => array('id' =>5 , 'name' => 'Product ID: Asc'),
        6 => array('id' =>6 , 'name' => 'Product ID: Desc'),
        7 => array('id' =>7 , 'name' => 'Random'),
        8 => array('id' =>8 , 'name' => 'Position: Asc'),
        9 => array('id' =>9 , 'name' => 'Position: Desc'),
        10 => array('id' =>10 , 'name' => 'Date update: Asc'),
        11 => array('id' =>11 , 'name' => 'Date update: Desc'),
        12 => array('id' =>12 , 'name' => 'Date add: Asc'),
        13 => array('id' =>13 , 'name' => 'Date add: Desc'),
    );
    private $_hooks = array();
	function __construct()
	{
		$this->name = 'stfeaturedslider';
		$this->tab = 'front_office_features';
		$this->version = '1.4.1';
		$this->author = 'SUNNYTOO.COM';
		$this->need_instance = 0;
        $this->bootstrap = true;

		parent::__construct();
        
        $this->initHookArray();

		$this->displayName = $this->l('Featured products slider');
		$this->description = $this->l('Displays featured products on homepage.');
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
        			'id' => 'displayHomeFirstQuarter',
        			'val' => '1',
        			'name' => $this->l('displayHomeFirstQuarter')
        		),
        		array(
        			'id' => 'displayHomeSecondQuarter',
        			'val' => '1',
        			'name' => $this->l('displayHomeSecondQuarter')
        		),
        		array(
        			'id' => 'displayHomeThirdQuarter',
        			'val' => '1',
        			'name' => $this->l('displayHomeThirdQuarter')
        		),
        		array(
        			'id' => 'displayHomeFourthQuarter',
        			'val' => '1',
        			'name' => $this->l('displayHomeFourthQuarter')
        		),
        		array(
        			'id' => 'displayHomeSecondaryLeft',
        			'val' => '1',
        			'name' => $this->l('displayHomeSecondaryLeft')
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
        		),
                array(
        			'id' => 'displayStBlogLeftColumn',
        			'val' => '1',
        			'name' => $this->l('displayStBlogLeftColumn')
        		),
        		array(
        			'id' => 'displayStBlogRightColumn',
        			'val' => '1',
        			'name' => $this->l('displayStBlogRightColumn')
        		)
            ),
            'Footer' => array(
        		array(
        			'id' => 'displayFooterPrimary',
        			'val' => '1',
        			'name' => $this->l('displayFooterPrimary')
        		),
                array(
        			'id' => 'displayFooter',
        			'val' => '1',
        			'name' => $this->l('displayFooter')
        		),
                array(
        			'id' => 'displayFooterTertiary',
        			'val' => '1',
        			'name' => $this->l('displayFooterTertiary')
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

	function install()
	{
		if (!Configuration::updateValue($this->_prefix_st.'NBR_MOD', 6) 
            || !Configuration::updateValue($this->_prefix_st.'CAT', (int)Context::getContext()->shop->getCategory())
            || !parent::install() 
			|| !$this->registerHook('addproduct')
			|| !$this->registerHook('updateproduct')
			|| !$this->registerHook('deleteproduct')
            || !$this->registerHook('displayHomeSecondaryRight')
            || !Configuration::updateValue($this->_prefix_st.'SLIDESHOW', 0)
            || !Configuration::updateValue($this->_prefix_st.'S_SPEED', 7000)
            || !Configuration::updateValue($this->_prefix_st.'A_SPEED', 400)
            || !Configuration::updateValue($this->_prefix_st.'PAUSE', 1)
            || !Configuration::updateValue($this->_prefix_st.'REWIND_NAV', 0)
            || !Configuration::updateValue($this->_prefix_st.'LAZY', 1)
            || !Configuration::updateValue($this->_prefix_st.'MOVE', 0)
            || !Configuration::updateValue($this->_prefix_st.'SOBY', 6)
            || !Configuration::updateValue($this->_prefix_st.'NBR_MOD_COL', 8) 
            || !Configuration::updateValue($this->_prefix_st.'SLIDESHOW_COL', 0)
            || !Configuration::updateValue($this->_prefix_st.'S_SPEED_COL', 7000)
            || !Configuration::updateValue($this->_prefix_st.'A_SPEED_COL', 400)
            || !Configuration::updateValue($this->_prefix_st.'PAUSE_COL', 1)
            || !Configuration::updateValue($this->_prefix_st.'REWIND_NAV_COL', 1)
            || !Configuration::updateValue($this->_prefix_st.'LAZY_COL', 0)
            || !Configuration::updateValue($this->_prefix_st.'MOVE_COL', 0)
            || !Configuration::updateValue($this->_prefix_st.'ITEMS_COL', 4)
            || !Configuration::updateValue($this->_prefix_st.'SOBY_COL', 6)
            || !Configuration::updateValue($this->_prefix_st.'HIDE_MOB', 0)
            || !Configuration::updateValue($this->_prefix_st.'HIDE_MOB_COL', 0)
            || !Configuration::updateValue($this->_prefix_st.'NBR_FOT', 3) 
            || !Configuration::updateValue($this->_prefix_st.'SOBY_FOT', 1)
            || !Configuration::updateValue($this->_prefix_st.'DISPLAY_SD', 0)
            || !Configuration::updateValue($this->_prefix_st.'GRID', 2)
            || !Configuration::updateValue($this->_prefix_stsn.'FEATURED_PRO_PER_XL', 4)
            || !Configuration::updateValue($this->_prefix_stsn.'FEATURED_PRO_PER_LG', 3)
            || !Configuration::updateValue($this->_prefix_stsn.'FEATURED_PRO_PER_MD', 3)
            || !Configuration::updateValue($this->_prefix_stsn.'FEATURED_PRO_PER_SM', 2)
            || !Configuration::updateValue($this->_prefix_stsn.'FEATURED_PRO_PER_XS', 2)
            || !Configuration::updateValue($this->_prefix_stsn.'FEATURED_PRO_PER_XXS', 1)
            || !Configuration::updateValue($this->_prefix_st.'TITLE', 0)
            || !Configuration::updateValue($this->_prefix_st.'DIRECTION_NAV', 1)
            || !Configuration::updateValue($this->_prefix_st.'CONTROL_NAV', 0)
        )
			return false;
		$this->clearSliderCache();
		return true;
	}
    public function uninstall()
	{
		$this->clearSliderCache();
		return parent::uninstall();
	}
    public function getContent()
	{
	    $this->initFieldsForm();
		if (isset($_POST['savestfeaturedslider']))
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
            {
		        $this->clearSliderCache();
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
                'title' => $this->l('General'),
                'icon'  => 'icon-cogs'
            ),
            'input' => array(
                array(
                    'type' => 'text',
                    'label' => $this->l('Category from which to pick products to be displayed'),
                    'name' => 'cat',
                    'class' => 'fixed-width-xs',
                    'desc' => $this->l('Choose the category ID of the products that you would like to display on homepage (default: 2 for "Home").'),
                    'validation' => 'isUnsignedInt',
                ),
            ),
            'submit' => array(
                'title' => $this->l('   Save all   ')
            ),
        );
		$this->fields_form[1]['form'] = array(
            'legend' => array(
                'title' => $this->l('Settings'),
                'icon'  => 'icon-cogs'
            ),
            'input' => array(
                array(
                    'type' => 'radio',
                    'label' => $this->l('How to display products:'),
                    'name' => 'grid',
                    'default_value' => 0,
                    'values' => array(
                        array(
                            'id' => 'grid_slider',
                            'value' => 0,
                            'label' => $this->l('Slider')),
                        array(
                            'id' => 'grid_grid',
                            'value' => 1,
                            'label' => $this->l('Grid view')),
                        array(
                            'id' => 'grid_samll',
                            'value' => 2,
                            'label' => $this->l('Simple layout')),
                    ),
                    'validation' => 'isUnsignedInt',
                ), 
                array(
                    'type' => 'text',
                    'label' => $this->l('Define the number of products to be displayed:'),
                    'name' => 'nbr_mod',
                    'default_value' => 8,
                    'desc' => array(
                        $this->l('To add products to your homepage, simply add them to the "home" category.'),
                    ),
                    'validation' => 'isUnsignedInt',
                    'class' => 'fixed-width-sm'
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
                'dropdownlistgroup' => array(
                    'type' => 'dropdownlistgroup',
                    'label' => $this->l('The number of columns:'),
                    'name' => 'featured_pro_per',
                    'values' => array(
                            'maximum' => 10,
                            'medias' => array('xl','lg','md','sm','xs','xxs'),
                        ),
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
            ),
        );
        $this->fields_form[2]['form'] = array(
			'legend' => array(
				'title' => $this->l('Slide on homepage'),
                'icon'  => 'icon-cogs'
			),
			'input' => array(
                array(
					'type' => 'switch',
					'label' => $this->l('Autoplay:'),
					'name' => 'slideshow',
					'is_bool' => true,
                    'default_value' => 1,
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
                    'desc' => $this->l('The period, in milliseconds, between the end of a transition effect and the start of the next one.'),
                    'validation' => 'isUnsignedInt',
                    'class' => 'fixed-width-sm'
				),
                array(
					'type' => 'text',
					'label' => $this->l('Transition period:'),
					'name' => 'a_speed',
                    'default_value' => 400,
                    'desc' => $this->l('The period, in milliseconds, of the transition effect.'),
                    'validation' => 'isUnsignedInt',
                    'class' => 'fixed-width-sm'
				),
                array(
                    'type' => 'switch',
                    'label' => $this->l('Pause On Hover:'),
                    'name' => 'pause',
                    'default_value' => 1,
                    'is_bool' => true,
                    'values' => array(
                        array(
                            'id' => 'pause_on',
                            'value' => 1,
                            'label' => $this->l('Yes')),
                        array(
                            'id' => 'pause_off',
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
					'type' => 'switch',
					'label' => $this->l('Display product short description'),
					'name' => 'display_sd',
                    'default_value' => 0,
					'is_bool' => true,
					'values' => array(
						array(
							'id' => 'display_sd_on',
							'value' => 1,
							'label' => $this->l('Yes')),
						array(
							'id' => 'display_sd_off',
							'value' => 0,
							'label' => $this->l('No')),
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
				'title' => $this->l('   Save all   ')
			),
		);
        
		$this->fields_form[3]['form'] = array(
			'legend' => array(
				'title' => $this->l('Slide on sidebar/X quarter'),
                'icon' => 'icon-cogs'
			),
			'input' => array(
                array(
					'type' => 'text',
					'label' => $this->l('Define the number of products to be displayed:'),
					'name' => 'nbr_mod_col',
                    'default_value' => 8,
                    'desc' => array(
                        $this->l('To add products to your homepage, simply add them to the "home" category.'),
                    ),
                    'validation' => 'isUnsignedInt',
                    'class' => 'fixed-width-sm'
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
					'type' => 'switch',
					'label' => $this->l('Autoplay:'),
					'name' => 'slideshow_col',
					'is_bool' => true,
                    'default_value' => 1,
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
                    'desc' => $this->l('The period, in milliseconds, between the end of a transition effect and the start of the next one.'),
                    'validation' => 'isUnsignedInt',
                    'class' => 'fixed-width-sm'
				),
                array(
					'type' => 'text',
					'label' => $this->l('Transition period:'),
					'name' => 'a_speed_col',
                    'default_value' => 400,
                    'desc' => $this->l('The period, in milliseconds, of the transition effect.'),
                    'validation' => 'isUnsignedInt',
                    'class' => 'fixed-width-sm'
				),
                array(
                    'type' => 'switch',
                    'label' => $this->l('Pause On Hover:'),
                    'name' => 'pause_col',
                    'default_value' => 1,
                    'is_bool' => true,
                    'values' => array(
                        array(
                            'id' => 'pause_col_on',
                            'value' => 1,
                            'label' => $this->l('Yes')),
                        array(
                            'id' => 'pause_col_off',
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
                    'desc' => $this->l('Screen width less than 768px.'),
                    'validation' => 'isBool',
				)
			),
			'submit' => array(
				'title' => $this->l('   Save all   ')
			),
		);
        $this->fields_form[4]['form'] = array(
			'legend' => array(
				'title' => $this->l('Slide on footer'),
                'icon' => 'icon-cogs'
			),
			'input' => array(
                array(
					'type' => 'text',
					'label' => $this->l('Define the number of products to be displayed:'),
					'name' => 'nbr_fot',
                    'default_value' => 4,
                    'required' => true,
                    'validation' => 'isUnsignedInt',
                    'class' => 'fixed-width-sm'
				),
                array(
					'type' => 'select',
        			'label' => $this->l('Sort by:'),
        			'name' => 'soby_fot',
                    'options' => array(
        				'query' => self::$sort_by,
        				'id' => 'id',
        				'name' => 'name',
        			),
                    'validation' => 'isUnsignedInt',
				), 
			),
			'submit' => array(
				'title' => $this->l('   Save all  ')
			),
		);
        
        $this->fields_form[5]['form'] = array(
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
            $this->fields_form[5]['form']['input'][] = array(
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
		$lang = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
		$helper->default_form_language = $lang->id;
		$helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ? Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;

		$helper->identifier = $this->identifier;
		$helper->submit_action = 'savestfeaturedslider';
		$helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		$helper->tpl_vars = array(
			'fields_value' => $this->getConfigFieldsValues(),
			'languages' => $this->context->controller->getLanguages(),
			'id_language' => $this->context->language->id
		);
		return $helper;
	}
    public function hookDisplayHomeTop($params)
    {
        return $this->hookDisplayHome($params, $this->getHookHash(__FUNCTION__));
    }
    public function hookDisplayHomeBottom($params)
    {
        return $this->hookDisplayHome($params, $this->getHookHash(__FUNCTION__));
    }    
    public function hookDisplayHome($params, $hook_hash = '', $flag=0)
    {
        if (!$hook_hash)
            $hook_hash = $this->getHookHash(__FUNCTION__);
        if (Configuration::get($this->_prefix_st.'GRID') || !$this->isCached('stfeaturedslider.tpl', $this->stGetCacheId($hook_hash)))
        {
            if(!$this->_prepareHook(0))
                return false;
            
            $this->smarty->assign(array(
                'column_slider'         => false,
                'homeverybottom'         => ($flag==2 ? true : false),
                'hook_hash'              => $hook_hash,
                'pro_per_xl'       => (int)Configuration::get($this->_prefix_stsn.'FEATURED_PRO_PER_XL'),
                'pro_per_lg'       => (int)Configuration::get($this->_prefix_stsn.'FEATURED_PRO_PER_LG'),
                'pro_per_md'       => (int)Configuration::get($this->_prefix_stsn.'FEATURED_PRO_PER_MD'),
                'pro_per_sm'       => (int)Configuration::get($this->_prefix_stsn.'FEATURED_PRO_PER_SM'),
                'pro_per_xs'       => (int)Configuration::get($this->_prefix_stsn.'FEATURED_PRO_PER_XS'),
                'pro_per_xxs'       => (int)Configuration::get($this->_prefix_stsn.'FEATURED_PRO_PER_XXS'),
            ));
        }

        return $this->display(__FILE__, 'stfeaturedslider.tpl', Configuration::get($this->_prefix_st.'GRID') ? NULL : $this->stGetCacheId($hook_hash));
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
 
	public function hookDisplayLeftColumn($params, $hook_hash = '')
	{
	    if (!$hook_hash)
            $hook_hash = $this->getHookHash(__FUNCTION__);
	    if (!$this->isCached('stfeaturedslider.tpl', $this->stGetCacheId($hook_hash)))
    	{
            if(!$this->_prepareHook(1))
                return false;
            
            $this->smarty->assign(array(
                'column_slider'         => true,
                'homeverybottom'        => false,
                'hook_hash'             => $hook_hash
            ));
        }
		return $this->display(__FILE__, 'stfeaturedslider.tpl', $this->stGetCacheId($hook_hash));
	}
	public function hookDisplayRightColumn($params)
    {
        return $this->hookDisplayLeftColumn($params, $this->getHookHash(__FUNCTION__));
    }
    
	public function hookDisplayHomeSecondaryLeft($params)
	{
        return $this->hookDisplayLeftColumn($params, $this->getHookHash(__FUNCTION__));
    }
    
	public function hookDisplayHomeSecondaryRight($params)
    {
        $this->smarty->assign(array(
            'is_homepage_secondary_left' => true,
        ));
        return $this->hookDisplayHome($params, $this->getHookHash(__FUNCTION__)); 
    }
	public function hookDisplayProductSecondaryColumn($params)
	{
        return $this->hookDisplayLeftColumn($params, $this->getHookHash(__FUNCTION__));
	}
	public function hookDisplayStBlogLeftColumn($params)
	{
	    if(!Module::isInstalled('stblog') || !Module::isEnabled('stblog'))
            return false;
        return $this->hookDisplayLeftColumn($params, $this->getHookHash(__FUNCTION__));
	}
	public function hookDisplayStBlogRightColumn($params)
	{
	    if(!Module::isInstalled('stblog') || !Module::isEnabled('stblog'))
            return false;
        return $this->hookDisplayLeftColumn($params, $this->getHookHash(__FUNCTION__));
	}
    private function _prepareHook($col=0)
    {
        $ext = $col ? '_COL' : '';
        $nbr = Configuration::get($this->_prefix_st.'NBR_MOD'.$ext);
        ($nbr===false && $col) && $nbr = Configuration::get($this->_prefix_st.'NBR_MOD');
        
        if(!$nbr)
            return false;
            
        $nb = $random_number_products = (int)$nbr;
        
        $order_by = 'id_product';
        $order_way = 'DESC';
        $random = false;
        
        $soby = (int)Configuration::get($this->_prefix_st.'SOBY'.$ext);
        (!$soby && $col) && $soby = (int)Configuration::get($this->_prefix_st.'SOBY');
        switch($soby)
        {
            case 1:
                $order_by = 'name';
                $order_way = 'ASC';
            break;
            case 2:
                $order_by = 'name';
                $order_way = 'DESC';
            break;
            case 3:
                $order_by = 'price';
                $order_way = 'ASC';
            break;
            case 4:
                $order_by = 'price';
                $order_way = 'DESC';
            break;
            case 5:
                $order_by = 'id_product';
                $order_way = 'ASC';
            break;
            case 7:
                $order_by = null;
                $order_way = null;
                $random = true;
            break;
            case 8:
                $order_by = 'position';
                $order_way = 'ASC';
            break;
            case 9:
                $order_by = 'position';
                $order_way = 'DESC';
            break;
            case 10:
                $order_by = 'date_upd';
                $order_way = 'ASC';
            break;
            case 11:
                $order_by = 'date_upd';
                $order_way = 'DESC';
            break;
            case 12:
                $order_by = 'date_add';
                $order_way = 'ASC';
            break;
            case 13:
                $order_by = 'date_add';
                $order_way = 'DESC';
            break;
            default:
            break;
        }
        
        $homeSize = Image::getSize(ImageType::getFormatedName('home'));
        
        $key = $col ? $col : 0;
        if (isset(self::$cache_featured_products[$key]) && self::$cache_featured_products[$key])
            $products = self::$cache_featured_products[$key];
        else
        {
            $featured_category_id = (int)Configuration::get($this->_prefix_st.'CAT');
            if(!$featured_category_id)
                $featured_category_id = (int)Context::getContext()->shop->getCategory();
            $category = new Category($featured_category_id, (int)Context::getContext()->language->id);
    		$products = $category->getProducts((int)Context::getContext()->language->id, 1, ($nb ? $nb : 10), $order_by, $order_way, false, true, $random, $random_number_products);

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

            self::$cache_featured_products[$key] = $products;
        }
        
        /*
        if(!$products)
            return false;
		*/
        
        
        $slideshow      = Configuration::get($this->_prefix_st.'SLIDESHOW'.$ext);
        
        $s_speed        = Configuration::get($this->_prefix_st.'S_SPEED'.$ext);
        
        $a_speed        = Configuration::get($this->_prefix_st.'A_SPEED'.$ext);
        
        $pause_on_hover = Configuration::get($this->_prefix_st.'PAUSE'.$ext);

        $rewind_nav     = Configuration::get($this->_prefix_st.'REWIND_NAV'.$ext);
        
        $lazy_load      = Configuration::get($this->_prefix_st.'LAZY'.$ext);        
        
        $move           = Configuration::get($this->_prefix_st.'MOVE'.$ext);
        
        $items          = Configuration::get($this->_prefix_st.'ITEMS_COL');
        
        $hide_mob       = Configuration::get($this->_prefix_st.'HIDE_MOB'.$ext);
        
        $display_sd     = Configuration::get($this->_prefix_st.'DISPLAY_SD');

        $this->smarty->assign(array(
            'products'              => $products,
            'add_prod_display'      => Configuration::get('PS_ATTRIBUTE_CATEGORY_DISPLAY'),
            'homeSize'              => $homeSize,
            'mediumSize'            => Image::getSize(ImageType::getFormatedName('medium')),
            'smallSize'             => Image::getSize(ImageType::getFormatedName('small')),
            'slider_slideshow'      => $slideshow,
            'slider_s_speed'        => $s_speed,
            'slider_a_speed'        => $a_speed,
            'slider_pause_on_hover' => $pause_on_hover,
            'rewind_nav'            => $rewind_nav,
            'lazy_load'             => $lazy_load,
            'slider_move'           => $move,
            'slider_items'          => $items,
            'hide_mob'              => (int)$hide_mob,
            'display_sd'            => (int)$display_sd,
            'display_as_grid'       => Configuration::get($this->_prefix_st.'GRID'),
            'title_position'        => Configuration::get($this->_prefix_st.'TITLE'),
            'direction_nav'         => Configuration::get($this->_prefix_st.'DIRECTION_NAV'),
            'control_nav'           => Configuration::get($this->_prefix_st.'CONTROL_NAV'),
		));
        return true;
    }
    
    public function _prepareHookFooter()
    {
        $nbr = Configuration::get($this->_prefix_st.'NBR_FOT');
        $nbr = $nbr ? (int)$nbr : 4;
            
        $nb = $random_number_products = (int)$nbr;
        
        $order_by = 'id_product';
        $order_way = 'DESC';
        $random = false;
        
        $soby = (int)Configuration::get($this->_prefix_st.'SOBY_FOT');
        switch($soby)
        {
            case 1:
                $order_by = 'name';
                $order_way = 'ASC';
            break;
            case 2:
                $order_by = 'name';
                $order_way = 'DESC';
            break;
            case 3:
                $order_by = 'price';
                $order_way = 'ASC';
            break;
            case 4:
                $order_by = 'price';
                $order_way = 'DESC';
            break;
            case 5:
                $order_by = 'id_product';
                $order_way = 'ASC';
            break;
            case 7:
                $order_by = null;
                $order_way = null;
                $random = true;
            break;
            case 8:
                $order_by = 'position';
                $order_way = 'ASC';
            break;
            case 8:
                $order_by = 'position';
                $order_way = 'DESC';
            break;
            default:
            break;
        }
        
        $key = 'FOT';
        if (isset(self::$cache_featured_products[$key]) && self::$cache_featured_products[$key])
            $products = self::$cache_featured_products[$key];
        else
        {
            $featured_category_id = (int)Configuration::get($this->_prefix_st.'CAT');
            if(!$featured_category_id)
                $featured_category_id = (int)Context::getContext()->shop->getCategory();
            $category = new Category($featured_category_id, (int)Context::getContext()->language->id);
            $products = $category->getProducts((int)Context::getContext()->language->id, 1, ($nb ? $nb : 10), $order_by, $order_way, false, true, $random, $random_number_products);
            self::$cache_featured_products[$key] = $products;
        }
        
        $this->smarty->assign(array(
            'products' => $products,
            'add_prod_display' => Configuration::get('PS_ATTRIBUTE_CATEGORY_DISPLAY'),
            'smallSize' => Image::getSize(ImageType::getFormatedName('small')),
        ));
        return true;
    }

    public function hookDisplayHomeFirstQuarter($params)
    {
        return $this->hookDisplayLeftColumn($params, $this->getHookHash(__FUNCTION__));
    }
    public function hookDisplayHomeSecondQuarter($params)
    {
        return $this->hookDisplayLeftColumn($params, $this->getHookHash(__FUNCTION__));
    }
    public function hookDisplayHomeThirdQuarter($params)
    {
        return $this->hookDisplayLeftColumn($params, $this->getHookHash(__FUNCTION__));
    }
    public function hookDisplayHomeFourthQuarter($params)
    {
        return $this->hookDisplayLeftColumn($params, $this->getHookHash(__FUNCTION__));
    }
    public function hookDisplayFooter($params, $hook_hash = '')
    {
        if (!$hook_hash)
            $hook_hash = $this->getHookHash(__FUNCTION__);
	    if (!$this->isCached('stfeaturedslider-footer.tpl', $this->stGetCacheId($hook_hash)))
	    {
            if(!$this->_prepareHookFooter())
                return false;
            $this->smarty->assign(array(
                'hook_hash' => $hook_hash
            )); 
	    }
		return $this->display(__FILE__, 'stfeaturedslider-footer.tpl', $this->stGetCacheId($hook_hash));
    }
    public function hookDisplayFooterPrimary($params)
    {
        return $this->hookDisplayFooter($params, $this->getHookHash(__FUNCTION__));
    }
    public function hookDisplayFooterTertiary($params)
    {
        return $this->hookDisplayFooter($params, $this->getHookHash(__FUNCTION__));        
    }
    public function hookAddProduct($params)
	{
		$this->clearSliderCache();
	}

	public function hookUpdateProduct($params)
	{
		$this->clearSliderCache();
	}

	public function hookDeleteProduct($params)
	{
		$this->clearSliderCache();
	}
	private function clearSliderCache()
	{
		$this->_clearCache('*');
    }
	protected function stGetCacheId($key,$name = null)
	{
		$cache_id = parent::getCacheId($name);
		return $cache_id.'_'.$key;
	}
    private function getConfigFieldsValues()
    {
        $fields_values = array(
            'cat' => Configuration::get($this->_prefix_st.'CAT'),
            
            'nbr_mod'          => Configuration::get($this->_prefix_st.'NBR_MOD'),
            'slideshow'        => Configuration::get($this->_prefix_st.'SLIDESHOW'),
            's_speed'          => Configuration::get($this->_prefix_st.'S_SPEED'),
            'a_speed'          => Configuration::get($this->_prefix_st.'A_SPEED'),
            'pause'            => Configuration::get($this->_prefix_st.'PAUSE'),
            'rewind_nav'       => Configuration::get($this->_prefix_st.'REWIND_NAV'),
            'lazy'             => Configuration::get($this->_prefix_st.'LAZY'),
            'move'             => Configuration::get($this->_prefix_st.'MOVE'),
            'soby'             => Configuration::get($this->_prefix_st.'SOBY'),
            'hide_mob'         => Configuration::get($this->_prefix_st.'HIDE_MOB'),
            'display_sd'       => Configuration::get($this->_prefix_st.'DISPLAY_SD'),
            'grid'             => Configuration::get($this->_prefix_st.'GRID'),
            
            'nbr_mod_col'      => Configuration::get($this->_prefix_st.'NBR_MOD_COL'),
            'slideshow_col'    => Configuration::get($this->_prefix_st.'SLIDESHOW_COL'),
            's_speed_col'      => Configuration::get($this->_prefix_st.'S_SPEED_COL'),
            'a_speed_col'      => Configuration::get($this->_prefix_st.'A_SPEED_COL'),
            'pause_col'        => Configuration::get($this->_prefix_st.'PAUSE_COL'),
            'rewind_nav_col'   => Configuration::get($this->_prefix_st.'REWIND_NAV_COL'),
            'lazy_col'         => Configuration::get($this->_prefix_st.'LAZY_COL'),
            'move_col'         => Configuration::get($this->_prefix_st.'MOVE_COL'),
            'items_col'        => Configuration::get($this->_prefix_st.'ITEMS_COL'),
            'soby_col'         => Configuration::get($this->_prefix_st.'SOBY_COL'),
            'hide_mob_col'     => Configuration::get($this->_prefix_st.'HIDE_MOB_COL'),
            
            'nbr_fot'          => Configuration::get($this->_prefix_st.'NBR_FOT'),
            'soby_fot'         => Configuration::get($this->_prefix_st.'SOBY_FOT'),    
            'title'            => Configuration::get($this->_prefix_st.'TITLE'),
            'direction_nav'    => Configuration::get($this->_prefix_st.'DIRECTION_NAV'),
            'control_nav'      => Configuration::get($this->_prefix_st.'CONTROL_NAV'),

            'featured_pro_per_lg'  => Configuration::get($this->_prefix_stsn.'FEATURED_PRO_PER_LG'),
            'featured_pro_per_xl'  => Configuration::get($this->_prefix_stsn.'FEATURED_PRO_PER_XL'),
            'featured_pro_per_md'  => Configuration::get($this->_prefix_stsn.'FEATURED_PRO_PER_MD'),
            'featured_pro_per_sm'  => Configuration::get($this->_prefix_stsn.'FEATURED_PRO_PER_SM'),
            'featured_pro_per_xs'  => Configuration::get($this->_prefix_stsn.'FEATURED_PRO_PER_XS'),
            'featured_pro_per_xxs' => Configuration::get($this->_prefix_stsn.'FEATURED_PRO_PER_XXS'), 
        );
        
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