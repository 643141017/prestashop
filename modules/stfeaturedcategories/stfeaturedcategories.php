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
    
require (dirname(__FILE__).'/StFeaturedCategoriesClass.php');

class StFeaturedCategories extends Module
{
    protected static $cache_featured_categories = false;
	private $_html = '';
    public $fields_list;
    public $fields_form;
    private $_baseUrl;
    private $spacer_size = '5';
    public $validation_errors = array();
    public  $fields_form_setting;
    private $_hooks = array();
	
	public function __construct()
	{
		$this->name          = 'stfeaturedcategories';
		$this->tab           = 'front_office_features';
		$this->version       = '1.4.7';
		$this->author        = 'SUNNYTOO.COM';
		$this->need_instance = 0;
		$this->bootstrap 	 = true;
		parent::__construct();
        
        $this->initHookArray();

		$this->displayName   = $this->l('Featured categories');
		$this->description   = $this->l('Display featured categories on your homepage.');
	}
    
    private function initHookArray()
    {
        $this->_hooks = array(
            'Hooks' => array(
                array(
        			'id' => 'displayHome',
        			'val' => '1',
        			'name' => $this->l('displayHome')
        		),
        		array(
        			'id' => 'displayHomeTop',
        			'val' => '1',
        			'name' => $this->l('displayHomeTop')
        		),
                array(
        			'id' => 'displayHomeBottom',
        			'val' => '1',
        			'name' => $this->l('displayHomeBottom')
        		),
                array(
                    'id' => 'displayTopColumn',
                    'val' => '1',
                    'name' => $this->l('displayTopColumn')
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
                    'id' => 'displayFullWidthTop',
                    'val' => '1',
                    'name' => $this->l('displayFullWidthTop')
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
	    $res = $this->installDB() &&
            parent::install() &&
            $this->registerHook('actionCategoryAdd') &&
			$this->registerHook('actionCategoryDelete') &&
			$this->registerHook('actionCategoryUpdate') &&
			$this->registerHook('displayHome') &&
            Configuration::updateValue('ST_PRO_CATE_F_C_GRID', 0) &&
            Configuration::updateValue('STSN_FEATURED_CATE_PER_XL', 5) &&
            Configuration::updateValue('STSN_FEATURED_CATE_PER_LG', 4) &&
            Configuration::updateValue('STSN_FEATURED_CATE_PER_MD', 4) &&
            Configuration::updateValue('STSN_FEATURED_CATE_PER_SM', 3) &&
            Configuration::updateValue('STSN_FEATURED_CATE_PER_XS', 3) &&
            Configuration::updateValue('STSN_FEATURED_CATE_PER_XXS', 2) &&

            Configuration::updateValue('ST_PRO_CATE_F_C_SLIDESHOW', 0) &&
            Configuration::updateValue('ST_PRO_CATE_F_C_S_SPEED', 7000) &&
            Configuration::updateValue('ST_PRO_CATE_F_C_A_SPEED', 400) &&
            Configuration::updateValue('ST_PRO_CATE_F_C_PAUSE_ON_HOVER', 1) &&
            Configuration::updateValue('ST_PRO_CATE_F_C_REWIND_NAV', 0) &&
            Configuration::updateValue('ST_PRO_CATE_F_C_LAZY', 1) &&
            Configuration::updateValue('ST_PRO_CATE_F_C_MOVE', 0) &&
            Configuration::updateValue('ST_PRO_CATE_F_C_HIDE_MOB', 0) &&     
            Configuration::updateValue('ST_PRO_CATE_F_C_AW_DISPLAY', 1) &&
            Configuration::updateValue('ST_PRO_CATE_F_C_TITLE', 0) &&
            Configuration::updateValue('ST_PRO_CATE_F_C_DIRECTION_NAV', 1) &&
            Configuration::updateValue('ST_PRO_CATE_F_C_CONTROL_NAV', 0);
            
		$this->clearstfeaturedcategoryCache();
		return $res;
	}

	public function installDb()
	{
		$return = true;
		$return &= Db::getInstance()->execute('
			CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'st_featured_category` (
				`id_st_featured_category` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
				`id_parent` int(10) NOT NULL DEFAULT 0,
                `level_depth` tinyint(3) unsigned NOT NULL DEFAULT 0,   
				`id_shop` int(10) unsigned NOT NULL,
                `id_category` int(10) unsigned NOT NULL DEFAULT 0,
                `position` int(10) unsigned NOT NULL DEFAULT 0,
                `txt_color` varchar(7) DEFAULT NULL,
                `txt_color_over` varchar(7) DEFAULT NULL,
                `active` tinyint(1) unsigned NOT NULL DEFAULT 1,
                `auto_sub` tinyint(1) unsigned NOT NULL DEFAULT 0,
    			`cover` varchar(255) DEFAULT NULL,
				PRIMARY KEY (`id_st_featured_category`)
			) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8 ;');
		
		return $return;
	}

	public function uninstall()
	{
		if (!parent::uninstall() ||
			!$this->uninstallDB())
			return false;
        $this->clearstfeaturedcategoryCache();
		return true;
	}

	private function uninstallDb()
	{
		$this->clearstfeaturedcategoryCache();
        return Db::getInstance()->execute('DROP TABLE IF EXISTS `'._DB_PREFIX_.'st_featured_category`');
	}
           
	public function getContent()
	{
    	$id_st_featured_category = (int)Tools::getValue('id_st_featured_category');
		if (isset($_POST['savestfeaturedcategory']) || isset($_POST['savestfeaturedcategoryAndStay']))
        {
            if($id_st_featured_category)
            {
                $category = new StFeaturedCategoriesClass($id_st_featured_category);
                $id_category_old = $category->id_category;
            }
			else
				$category = new StFeaturedCategoriesClass();
            
            $error = array();
            if (!Tools::getValue('id_category'))
                 $error[] = $this->displayError($this->l('Top category is required.'));
            
            $category->id_shop = (int)Shop::getContextShopID();
            
            if (!$category->id_shop)
                $error[] = $this->displayError($this->l('Action denied, please select a store.'));
            
            if (!count($error))
            {                
        		$category->copyFromPost();
        		$category->id_parent = 0;
                $category->level_depth = 0; 

                if ($category->validateFields(false) && $category->validateFieldsLang(false))
                {
                    if($category->position==0)
                        $category->position = StFeaturedCategoriesClass::getMaximumPosition(0);
                    if($category->save())
                    {
                        $category->clearPosition();
                        $this->clearstfeaturedcategoryCache();
                        if(isset($_POST['savestfeaturedcategoryAndStay']) || Tools::getValue('fr') == 'view')
                        {
                            $rd_str = isset($_POST['savestfeaturedcategoryAndStay']) && Tools::getValue('fr') == 'view' ? 'fr=view&update' : (isset($_POST['savestfeaturedcategoryAndStay']) ? 'update' : 'view');
                            Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&id_st_featured_category='.$category->id.'&conf='.($id_st_featured_category?4:3).'&'.$rd_str.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));
                        }    
                        else
                            $this->_html .= $this->displayConfirmation($this->l('Featured category').' '.($id_st_featured_category ? $this->l('updated') : $this->l('added')));
                    }
                    else
                        $this->_html .= $this->displayError($this->l('An error occurred during Featured category').' '.($id_st_featured_category ? $this->l('updating') : $this->l('creation')));
                }
            }
			else
				$this->_html .= count($error) ? implode('',$error) : $this->displayError($this->l('Invalid value for field(s).'));
        }
        if (isset($_POST['savesettingstfeaturedcategories']))
		{
		    $this->initSettingForm();
            
            foreach($this->fields_form_setting as $form)
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
                            Configuration::updateValue('ST_PRO_CATE_F_C_'.strtoupper($field['name']), $value);
                        }
                        else
                            Configuration::updateValue('ST_PRO_CATE_F_C_'.strtoupper($field['name']), $value);
                    }

            $name = $this->fields_form_setting[1]['form']['input']['dropdownlistgroup']['name'];
            foreach ($this->fields_form_setting[1]['form']['input']['dropdownlistgroup']['values']['medias'] as $v)
                Configuration::updateValue('STSN_'.strtoupper($name.'_'.$v), (int)Tools::getValue($name.'_'.$v));

            if(count($this->validation_errors))
                $this->_html .= $this->displayError(implode('<br/>',$this->validation_errors));
            else 
            {
                $this->saveHook();
                $this->clearstfeaturedcategoryCache();
                $this->_html .= $this->displayConfirmation($this->l('Settings updated'));
            }
            $helper = $this->initFormSetting();
			return $this->_html.$helper->generateForm($this->fields_form_setting);
		}
        if (Tools::isSubmit('way') && Tools::isSubmit('id_st_featured_category') && Tools::isSubmit('position'))
		{
		    $category = new StFeaturedCategoriesClass((int)$id_st_featured_category);
            if($category->id && $category->updatePosition((int)Tools::getValue('way'), (int)Tools::getValue('position')))
            {
                $this->clearstfeaturedcategoryCache();
			    Tools::redirectAdmin(AdminController::$currentIndex.'&token='.Tools::getAdminTokenLite('AdminModules'));                
            }
            else
                $this->_html .= $this->displayError($this->l('Failed to update the position.'));
		}
        if (Tools::getValue('action') == 'updatePositions')
        {
            $this->processUpdatePositions();
        }
        if (Tools::isSubmit('addstfeaturedcategories'))
		{
            $helper = $this->_displayForm(); 
            $this->_html .= $helper->generateForm($this->fields_form);
			return $this->_html;
		}
        elseif (Tools::isSubmit('addsubstfeaturedcategories'))
		{
            if(!Tools::getValue('id_parent'))
                Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));
            $helper = $this->initCategoryForm(); 
            $this->_html .= $helper->generateForm($this->fields_form);
			return $this->_html;
		}
        elseif (Tools::isSubmit('updatestfeaturedcategories'))
        {
    		$category = new StFeaturedCategoriesClass((int)$id_st_featured_category);
            if(!Validate::isLoadedObject($category) || $category->id_shop!=(int)Shop::getContextShopID())
                Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));
               
            if($category->id_parent)
            {
                $helper = $this->initCategoryForm(); 
                $this->_html .= $helper->generateForm($this->fields_form);
            }
            elseif(!$category->id_parent)
            {
                $helper = $this->_displayForm(); 
                $this->_html .= $helper->generateForm($this->fields_form);
            }
			return $this->_html; 
        }
        else if (Tools::isSubmit('deletestfeaturedcategories'))
		{
    		$category = new StFeaturedCategoriesClass((int)$id_st_featured_category);
            if(Validate::isLoadedObject($category))
            {                    
                $category->delete();
                $category->clearPosition();
                $this->clearstfeaturedcategoryCache();
                
                if($category->id_parent)
                    Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&id_st_featured_category='.$category->id_parent.'&view'.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));
            }
            Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));
		}
        elseif (Tools::isSubmit('statusstfeaturedcategories'))
		{
            $category = new StFeaturedCategoriesClass($id_st_featured_category);
            if (Validate::isLoadedObject($category))
            {
                $category->troggleStatus();
                $this->clearstfeaturedcategoryCache();
            }
            if($category->id_parent)
                Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&id_st_featured_category='.$category->id_parent.'&view'.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));
            Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));
		}
        elseif (Tools::isSubmit('settingstfeaturedcategories'))
		{
		    $this->initSettingForm();
            $helper = $this->initFormSetting();
            
			return $this->_html.$helper->generateForm($this->fields_form_setting);
		}
        else
        {
            $this->_html .= '<script type="text/javascript">var currentIndex="'.AdminController::$currentIndex.'&configure='.$this->name.'";</script>';
            $helper = $this->initList();
            $list = StFeaturedCategoriesClass::getSub(0);
			return $this->_html.$helper->generateList($list, $this->fields_list);
        }
            
	}
    
    public function initSettingForm()
    {
		$this->fields_form_setting[0]['form'] = array(
			'legend' => array(
				'title' => $this->l('Settings'),
                'icon' => 'icon-cogs'
			),
			'input' => array(
                array(
                    'type' => 'radio',
                    'label' => $this->l('How to display categories:'),
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
                    ),
                    'validation' => 'isBool',
                ), 
                array(
                    'type' => 'switch',
                    'label' => $this->l('Always display this block:'),
                    'name' => 'aw_display',
                    'default_value' => 1,
                    'is_bool' => true,
                    'values' => array(
                        array(
                            'id' => 'aw_display_on',
                            'value' => 1,
                            'label' => $this->l('Yes')),
                        array(
                            'id' => 'aw_display_off',
                            'value' => 0,
                            'label' => $this->l('No')),
                    ),
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
					'type' => 'html',
                    'id' => 'a_cancel',
					'label' => '',
					'name' => '<a class="btn btn-default btn-block fixed-width-md" href="'.AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'"><i class="icon-arrow-left"></i> Back to list</a>',                  
				),
			),
            'submit' => array(
				'title' => $this->l('Save'),
			),
		);

        $this->fields_form_setting[1]['form'] = array(
            'legend' => array(
                'title' => $this->l('Slider'),
                'icon'  => 'icon-cogs'
            ),
            'input' => array(
                'dropdownlistgroup' => array(
                    'type' => 'dropdownlistgroup',
                    'label' => $this->l('Items per row:'),
                    'name' => 'featured_cate_per',
                    'values' => array(
                            'maximum' => 10,
                            'medias' => array('xl','lg','md','sm','xs','xxs'),
                        ),
                ), 
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
                    'label' => $this->l('Show pagination:'),
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
                array(
                    'type' => 'html',
                    'id' => 'a_cancel',
                    'label' => '',
                    'name' => '<a class="btn btn-default btn-block fixed-width-md" href="'.AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'"><i class="icon-arrow-left"></i> Back to list</a>',                  
                ),
            ),
            'submit' => array(
                'title' => $this->l('   Save all   '),
            ),
        );
        
        $this->fields_form_setting[2]['form'] = array(
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
            $this->fields_form_setting[2]['form']['input'][] = array(
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
    
    protected function initFormSetting()
	{
	    $helper = new HelperForm();
		$helper->show_toolbar = false;
        $helper->module = $this;
		$helper->table =  $this->table;
		$lang = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
		$helper->default_form_language = $lang->id;
		$helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ? Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;

		$helper->identifier = $this->identifier;
		$helper->submit_action = 'savesettingstfeaturedcategories';
		$helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		$helper->tpl_vars = array(
			'fields_value' => $this->getConfigFieldsValues(),
			'languages' => $this->context->controller->getLanguages(),
			'id_language' => $this->context->language->id
		);

		return $helper;
	}

	private function _displayForm()
    {
        $id_lang = $this->context->language->id;
        $category_arr = array();
		$this->getCategoryOption($category_arr, Category::getRootCategory()->id, (int)$id_lang, (int)Shop::getContextShopID(),true);
		$this->fields_form[0]['form'] = array(
			'legend' => array(
				'title' => $this->l('Top category'),
                'icon' => 'icon-cogs'
			),
			'input' => array(
                array(
					'type' => 'select',
					'label' => $this->l('Category:'),
					'name' => 'id_category',
                    'required' => true,
					'options' => array(
						'query' => $category_arr,
						'id' => 'id',
						'name' => 'name'
					),
				),
				array(
					'type' => 'switch',
					'label' => $this->l('Status:'),
					'name' => 'active',
					'is_bool' => true,
                    'default_value' => 1,
					'values' => array(
						array(
							'id' => 'active_on',
							'value' => 1,
							'label' => $this->l('Enabled')
						),
						array(
							'id' => 'active_off',
							'value' => 0,
							'label' => $this->l('Disabled')
						)
					),
				),
                /*array(
					'type' => 'text',
					'label' => $this->l('Position:'),
					'name' => 'position',
                    'default_value' => 0,
                    'class' => 'fixed-width-sm'                 
				),*/
                array(
					'type' => 'hidden',
					'name' => 'fr',
                    'default_value' => Tools::getValue('fr'),
				),
			),
            'buttons' => array(
                array(
                    'type' => 'submit',
                    'title'=> $this->l(' Save '),
                    'icon' => 'process-icon-save',
                    'class'=> 'pull-right'
                ),
            ),
			'submit' => array(
				'title' => $this->l('Save and stay'),
                'stay' => true
			),
		);
        
        $this->fields_form[0]['form']['input'][] = array(
			'type' => 'html',
            'id' => 'a_cancel',
			'label' => '',
			'name' => '<a class="btn btn-default btn-block fixed-width-md" href="'.AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'"><i class="icon-arrow-left"></i> Back to list</a>',                  
		);
        
        $id_st_featured_category = (int)Tools::getValue('id_st_featured_category');
        if($id_st_featured_category)
            $category = new StFeaturedCategoriesClass((int)$id_st_featured_category);
        else
            $category = new StFeaturedCategoriesClass();
        if(Validate::isLoadedObject($category))
        {
            $this->fields_form[0]['form']['input'][] = array('type' => 'hidden', 'name' => 'id_st_featured_category');
        }
        
        $helper = new HelperForm();
		$helper->show_toolbar = false;
		$helper->table =  $this->table;
		$lang = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
		$helper->default_form_language = $lang->id;
		$helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ? Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;

		$helper->identifier = $this->identifier;
		$helper->submit_action = 'savestfeaturedcategory';
		$helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		$helper->tpl_vars = array(
			'fields_value' => $this->getFieldsValueSt($category),
			'languages' => $this->context->controller->getLanguages(),
			'id_language' => $this->context->language->id
		);
		return $helper;
    }

    private function getCategoryOption(&$category_arr, $id_category = 1, $id_lang = false, $id_shop = false, $recursive = true)
	{
		$id_lang = $id_lang ? (int)$id_lang : (int)Context::getContext()->language->id;
		$category = new Category((int)$id_category, (int)$id_lang, (int)$id_shop);

		if (is_null($category->id))
			return;

		if ($recursive)
		{
			$children = Category::getChildren((int)$id_category, (int)$id_lang, true, (int)$id_shop);
			$spacer = str_repeat('&nbsp;', $this->spacer_size * (int)$category->level_depth);
		}

		$shop = (object) Shop::getShop((int)$category->getShopID());
		$category_arr[] = array('id'=>(int)$category->id,'name'=>(isset($spacer) ? $spacer : '').$category->name.' ('.$shop->name.')');

		if (isset($children) && is_array($children) && count($children))
			foreach ($children as $child)
			{
				$this->getCategoryOption($category_arr, (int)$child['id_category'], (int)$id_lang, (int)$child['id_shop'],$recursive);
			}
	}
    
    protected function initList()
	{
		$this->fields_list = array(
			'name' => array(
				'title' => $this->l('Category name'),
				'class' => 'fixed-width-xxl',
				'type' => 'text',
                'search' => false,
                'orderby' => false
			),
			'position' => array(
				'title' => $this->l('Position'),
				'class' => 'fixed-width-xxl',
				'position' => 'position',
                'search' => false,
                'orderby' => false
			),
            'active' => array(
    			'title' => $this->l('Status'), 
                'class' => 'fixed-width-xxl',
                'active' => 'status',
    			'align' => 'center',
                'type' => 'bool',
                'search' => false,
                'orderby' => false
            ),
		);

		if (Shop::isFeatureActive())
			$this->fields_list['id_shop'] = array(
                'title' => $this->l('ID Shop'), 
                'align' => 'center', 
                'class' => 'fixed-width-sm',
                'type' => 'int',
                'search' => false,
                'orderby' => false
            );

		$helper = new HelperList();
        $helper->shopLinkType = '';
		$helper->simple_header = false;
		$helper->identifier = 'id_st_featured_category';
		$helper->actions = array('edit', 'delete');
		$helper->show_toolbar = true;
		$helper->toolbar_btn['new'] =  array(
			'href' => AdminController::$currentIndex.'&configure='.$this->name.'&add'.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'),
			'desc' => $this->l('Add new')
		);
        $helper->toolbar_btn['edit'] =  array(
			'href' => AdminController::$currentIndex.'&configure='.$this->name.'&setting'.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'),
			'desc' => $this->l('Setting'),
		);
		$helper->title = $this->displayName;
		$helper->table = $this->name;
        $helper->orderBy = 'position';
		$helper->orderWay = 'ASC';
        $helper->position_identifier = 'id_st_featured_category';
        
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		$helper->currentIndex = AdminController::$currentIndex.'&configure='.$this->name;
		return $helper;
	}
    public function deleteFeaturedCategories($id_category)
    {
        if ($id_category)
        {
            $cats = Db::getInstance('
            SELECT `id_st_featured_category` FROM '._DB_PREFIX_.'st_featured_category
            WHERE `id_category` = '.(int)$id_category.'
            ');
            foreach($cats AS $cat)
            {
                $obj = new StFeaturedCategoriesClass($cat['id_st_featured_category']);
                $obj->delete();
            }
        }
    }

	public function hookActionCategoryDelete($params)
	{
	    if(isset($params['category']))
	       $this->deleteFeaturedCategories($params['category']->id);
		$this->clearstfeaturedcategoryCache();
	}
    
    public function hookActionCategoryAdd($params)
	{
		$this->clearstfeaturedcategoryCache();
	}
    
	public function hookActionCategoryUpdate($params)
	{
		$this->clearstfeaturedcategoryCache();
	}
    
    public function hookDisplayHomeTop($params)
    {
        return $this->hookDisplayHome($params, $this->getHookHash(__FUNCTION__));
    }
    public function hookDisplayHomeBottom($params)
    {
        return $this->hookDisplayHome($params, $this->getHookHash(__FUNCTION__));
    }

    public function hookDisplayTopColumn($params)
    {
        return $this->hookDisplayHome($params, $this->getHookHash(__FUNCTION__));
    }    
    public function hookDisplayBottomColumn($params)
    {
        return $this->hookDisplayHome($params, $this->getHookHash(__FUNCTION__));
    }    

    public function hookDisplayFullWidthTop($params)
    {
        if(Dispatcher::getInstance()->getController()!='index')
            return false;
        
        $this->smarty->assign('homeverybottom', true);
        return $this->hookDisplayHome($params, $this->getHookHash(__FUNCTION__));
    }
    public function hookDisplayFullWidthBottom($params)
    {
        if(Dispatcher::getInstance()->getController()!='index')
            return false;

        $this->smarty->assign('homeverybottom', true);
        return $this->hookDisplayHome($params, $this->getHookHash(__FUNCTION__));
    }
    
    public function hookDisplayHomeTertiaryLeft($params)
    {
        return $this->hookDisplayHome($params, $this->getHookHash(__FUNCTION__));
    }
    public function hookDisplayHomeTertiaryRight($params)
    {
        return $this->hookDisplayHome($params, $this->getHookHash(__FUNCTION__));
    }

    private function _prepareHook($location= null)
    {
        if (!empty(self::$cache_featured_categories))
            $featured_categories = self::$cache_featured_categories;
        else
        {
            $featured_categories = StFeaturedCategoriesClass::getAll();
            self::$cache_featured_categories = $featured_categories;
        }
        
        if(!$featured_categories)
            return false;
		$this->smarty->assign(array(
            'featured_categories'   => $featured_categories,
            'categorySize'          => Image::getSize(ImageType::getFormatedName('category')),
            'homeSize'            => Image::getSize(ImageType::getFormatedName('home')),
            'pro_per_xl'            => (int)Configuration::get('STSN_FEATURED_CATE_PER_XL'),
            'pro_per_lg'            => (int)Configuration::get('STSN_FEATURED_CATE_PER_LG'),
            'pro_per_md'            => (int)Configuration::get('STSN_FEATURED_CATE_PER_MD'),
            'pro_per_sm'            => (int)Configuration::get('STSN_FEATURED_CATE_PER_SM'),
            'pro_per_xs'            => (int)Configuration::get('STSN_FEATURED_CATE_PER_XS'),
            'pro_per_xxs'           => (int)Configuration::get('STSN_FEATURED_CATE_PER_XXS'),
            
            
            'slider_slideshow'      => Configuration::get('ST_PRO_CATE_F_C_SLIDESHOW'),
            'slider_s_speed'        => Configuration::get('ST_PRO_CATE_F_C_S_SPEED'),
            'slider_a_speed'        => Configuration::get('ST_PRO_CATE_F_C_A_SPEED'),
            'slider_pause_on_hover' => Configuration::get('ST_PRO_CATE_F_C_PAUSE_ON_HOVER'),
            'rewind_nav'            => Configuration::get('ST_PRO_CATE_F_C_REWIND_NAV'),
            'lazy_load'             => Configuration::get('ST_PRO_CATE_F_C_LAZY'),
            'slider_move'           => Configuration::get('ST_PRO_CATE_F_C_MOVE'),
            'hide_mob'              => Configuration::get('ST_PRO_CATE_F_C_HIDE_MOB'),
            'aw_display'            => Configuration::get('ST_PRO_CATE_F_C_AW_DISPLAY'),
            'display_as_grid'       => Configuration::get('ST_PRO_CATE_F_C_GRID'),
            'title_position'        => Configuration::get('ST_PRO_CATE_F_C_TITLE'),
            'direction_nav'         => Configuration::get('ST_PRO_CATE_F_C_DIRECTION_NAV'),
            'control_nav'           => Configuration::get('ST_PRO_CATE_F_C_CONTROL_NAV'),
        ));
        return true;
    }
    
	public function hookDisplayHome($params, $hook_hash = '')
	{
	    if (!$this->isCached('stfeaturedcategories.tpl', $this->getCacheId($hook_hash)))
    	    if(!$this->_prepareHook())
                return false;
        if (!$hook_hash)
            $hook_hash = $this->getHookHash(__FUNCTION__);
        $this->smarty->assign(array(
            'hook_hash' => $hook_hash
        ));
		return $this->display(__FILE__, 'stfeaturedcategories.tpl', $this->getCacheId($hook_hash));
	}
    
    private function clearstfeaturedcategoryCache()
    {
        foreach($this->_hooks AS $key => $values)
        {
            foreach($values AS $value)
            {
                if (!isset($value['id']) || !$value['id'])
                    continue;
                $this->_clearCache('stfeaturedcategories.tpl',$this->getHookHash('hook'.ucfirst($value['id'])));
            }
        }
    }
    
	public function hookDisplayHomeSecondaryRight($params)
	{
        return $this->hookDisplayHome($params, $this->getHookHash(__FUNCTION__)); 
    }
    

	/**
	 * Return the list of fields value
	 *
	 * @param object $obj Object
	 * @return array
	 */
	public function getFieldsValueSt($obj,$fields_form="fields_form")
	{
		foreach ($this->$fields_form as $fieldset)
			if (isset($fieldset['form']['input']))
				foreach ($fieldset['form']['input'] as $input)
					if (!isset($this->fields_value[$input['name']]))
						if (isset($input['type']) && $input['type'] == 'shop')
						{
							if ($obj->id)
							{
								$result = Shop::getShopById((int)$obj->id, $this->identifier, $this->table);
								foreach ($result as $row)
									$this->fields_value['shop'][$row['id_'.$input['type']]][] = $row['id_shop'];
							}
						}
						elseif (isset($input['lang']) && $input['lang'])
							foreach (Language::getLanguages(false) as $language)
							{
								$fieldValue = $this->getFieldValueSt($obj, $input['name'], $language['id_lang']);
								if (empty($fieldValue))
								{
									if (isset($input['default_value']) && is_array($input['default_value']) && isset($input['default_value'][$language['id_lang']]))
										$fieldValue = $input['default_value'][$language['id_lang']];
									elseif (isset($input['default_value']))
										$fieldValue = $input['default_value'];
								}
								$this->fields_value[$input['name']][$language['id_lang']] = $fieldValue;
							}
						else
						{
							$fieldValue = $this->getFieldValueSt($obj, $input['name']);
							if ($fieldValue===false && isset($input['default_value']))
								$fieldValue = $input['default_value'];
							$this->fields_value[$input['name']] = $fieldValue;
						}

		return $this->fields_value;
	}
    
	/**
	 * Return field value if possible (both classical and multilingual fields)
	 *
	 * Case 1 : Return value if present in $_POST / $_GET
	 * Case 2 : Return object value
	 *
	 * @param object $obj Object
	 * @param string $key Field name
	 * @param integer $id_lang Language id (optional)
	 * @return string
	 */
	public function getFieldValueSt($obj, $key, $id_lang = null)
	{
		if ($id_lang)
			$default_value = ($obj->id && isset($obj->{$key}[$id_lang])) ? $obj->{$key}[$id_lang] : false;
		else
			$default_value = isset($obj->{$key}) ? $obj->{$key} : false;

		return Tools::getValue($key.($id_lang ? '_'.$id_lang : ''), $default_value);
	}
    private function getConfigFieldsValues()
    {
        $fields_values = array(
            'featured_cate_per_xl'  => Configuration::get('STSN_FEATURED_CATE_PER_XL'),
            'featured_cate_per_lg'  => Configuration::get('STSN_FEATURED_CATE_PER_LG'),
            'featured_cate_per_md'  => Configuration::get('STSN_FEATURED_CATE_PER_MD'),
            'featured_cate_per_sm'  => Configuration::get('STSN_FEATURED_CATE_PER_SM'),
            'featured_cate_per_xs'  => Configuration::get('STSN_FEATURED_CATE_PER_XS'),
            'featured_cate_per_xxs' => Configuration::get('STSN_FEATURED_CATE_PER_XXS'),
            
            'grid'                  => Configuration::get('ST_PRO_CATE_F_C_GRID'),
            'slideshow'             => Configuration::get('ST_PRO_CATE_F_C_SLIDESHOW'),
            's_speed'               => Configuration::get('ST_PRO_CATE_F_C_S_SPEED'),
            'a_speed'               => Configuration::get('ST_PRO_CATE_F_C_A_SPEED'),
            'pause_on_hover'        => Configuration::get('ST_PRO_CATE_F_C_PAUSE_ON_HOVER'),
            'rewind_nav'            => Configuration::get('ST_PRO_CATE_F_C_REWIND_NAV'),
            'lazy'                  => Configuration::get('ST_PRO_CATE_F_C_LAZY'),
            'move'                  => Configuration::get('ST_PRO_CATE_F_C_MOVE'),
            'hide_mob'              => Configuration::get('ST_PRO_CATE_F_C_HIDE_MOB'),
            'aw_display'            => Configuration::get('ST_PRO_CATE_F_C_AW_DISPLAY'),
            
            'title'                 => Configuration::get('ST_PRO_CATE_F_C_TITLE'),
            'direction_nav'         => Configuration::get('ST_PRO_CATE_F_C_DIRECTION_NAV'),
            'control_nav'           => Configuration::get('ST_PRO_CATE_F_C_CONTROL_NAV'),
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
    
    public function processUpdatePositions()
	{
		if (Tools::getValue('action') == 'updatePositions' && Tools::getValue('ajax'))
		{
			$way = (int)(Tools::getValue('way'));
			$id = (int)(Tools::getValue('id'));
			$positions = Tools::getValue('st_featured_category');
            $msg = '';
			if (is_array($positions))
				foreach ($positions as $position => $value)
				{
					$pos = explode('_', $value);

					if ((isset($pos[2])) && ((int)$pos[2] === $id))
					{
						if ($object = new StFeaturedCategoriesClass((int)$pos[2]))
							if (isset($position) && $object->updatePosition($way, $position))
								$msg = 'ok position '.(int)$position.' for ID '.(int)$pos[2]."\r\n";	
							else
								$msg = '{"hasError" : true, "errors" : "Can not update position"}';
						else
							$msg = '{"hasError" : true, "errors" : "This object ('.(int)$id.') can t be loaded"}';

						break;
					}
				}
                die($msg);
		}
	}
    
    public function getHookHash($func='')
    {
        if (!$func)
            return '';
        return substr(md5($func), 0, 10);
    }
}
