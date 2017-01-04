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

include_once(dirname(__FILE__).'/StProductCategoriesSliderClass.php');
class StProductCategoriesSlider extends Module
{
    protected static $cache_product_categories = array();
    public  $fields_list;
    public  $fields_form;
    public  $fields_value;
    public $validation_errors = array();
    public  $fields_form_setting;
    
    private $_prefix_st = 'ST_PRO_CATE_';
    private $_prefix_stsn = 'STSN_';
    
	private $_html = '';
	private $spacer_size = '5';
    public static $sort_by = array(
        1 => array('id' =>1 , 'name' => 'Product position DESC', 'orderBy'=>'position', 'orderWay'=>'DESC' ),
        2 => array('id' =>2 , 'name' => 'Product position ASC', 'orderBy'=>'position', 'orderWay'=>'ASC'),
        3 => array('id' =>3 , 'name' => 'Product Name: A to Z', 'orderBy'=>'name', 'orderWay'=>'ASC'),
        4 => array('id' =>4 , 'name' => 'Product Name: Z to A', 'orderBy'=>'name', 'orderWay'=>'DESC'),
        5 => array('id' =>5 , 'name' => 'Price: Lowest first', 'orderBy'=>'price', 'orderWay'=>'ASC'),
        6 => array('id' =>6 , 'name' => 'Price: Highest first', 'orderBy'=>'price', 'orderWay'=>'DESC'),
    );
        
    public static $items = array(
		array('id' => 2, 'name' => '2'),
		array('id' => 3, 'name' => '3'),
		array('id' => 4, 'name' => '4'),
		array('id' => 5, 'name' => '5'),
		array('id' => 6, 'name' => '6'),
    );
    private $_hooks = array();
	function __construct()
	{
		$this->name           = 'stproductcategoriesslider';
		$this->tab            = 'front_office_features';
		$this->version        = '1.5.7';
		$this->author         = 'SUNNYTOO.COM';
		$this->need_instance  = 0;
        $this->bootstrap      = true;

		parent::__construct();
        
        $this->initHookArray();

		$this->displayName = $this->l('Product slider for each category');
		$this->description = $this->l('Product slider for each category.');
	}
    
    private function initHookArray()
    {
        $this->_hooks = array(
                array(
        			'id' => 'displayFullWidthTop',
        			'val' => '512',
        			'name' => $this->l('FullWidthTop')
        		),
                array(
        			'id' => 'displayTopColumn',
        			'val' => '65536',
        			'name' => $this->l('TopColumn')
        		),
        		array(
        			'id' => 'displayHomeTop',
        			'val' => '2',
        			'name' => $this->l('HomeTop')
        		),
                array(
        			'id' => 'displayHome',
        			'val' => '1',
        			'name' => $this->l('Home')
        		),
        		array(
        			'id' => 'displayHomeTertiaryLeft',
        			'val' => '64',
        			'name' => $this->l('HomeTertiaryLeft')
        		),
        		array(
        			'id' => 'displayHomeTertiaryRight',
        			'val' => '128',
        			'name' => $this->l('HomeTertiaryRight')
        		),
        		array(
        			'id' => 'displayHomeSecondaryLeft',
        			'val' => '16',
        			'name' => $this->l('HomeSecondaryLeft')
        		),
        		array(
        			'id' => 'displayHomeSecondaryRight',
        			'val' => '32',
        			'name' => $this->l('HomeSecondaryRight')
        		),
                array(
        			'id' => 'displayHomeBottom',
        			'val' => '4',
        			'name' => $this->l('HomeBottom')
        		),
        		array(
        			'id' => 'displayBottomColumn',
        			'val' => '8',
        			'name' => $this->l('BottomColumn')
        		),
                array(
        			'id' => 'displayFullWidthBottom',
        			'val' => '256',
        			'name' => $this->l('FullWidthBottom')
        		),
                array(
        			'id' => 'displayProductSecondaryColumn',
        			'val' => '1024',
        			'name' => $this->l('ProductSecondaryColumn')
        		),
                array(
        			'id' => 'displayLeftColumn',
        			'val' => '2048',
        			'name' => $this->l('LeftColumn')
        		),
        		array(
        			'id' => 'displayRightColumn',
        			'val' => '4096',
        			'name' => $this->l('RightColumn')
        		),
        		array(
        			'id' => 'displayFooterPrimary',
        			'val' => '16384',
        			'name' => $this->l('FooterTop')
        		),
                array(
        			'id' => 'displayFooter',
        			'val' => '8192',
        			'name' => $this->l('Footer')
        		),
                array(
        			'id' => 'displayFooterTertiary',
        			'val' => '32768',
        			'name' => $this->l('FooterSecondary')
        		)
        );
    }

	function install()
	{
		if (!parent::install() 
            || !$this->installDB()
			|| !$this->registerHook('addproduct')
			|| !$this->registerHook('updateproduct')
			|| !$this->registerHook('deleteproduct')
            || !$this->registerHook('displayAnywhere')
            || !$this->registerHook('actionCategoryDelete')
            || !$this->registerHook('actionObjectCategoryDeleteAfter')
            || !Configuration::updateValue($this->_prefix_st.'TABS', 0)
            || !Configuration::updateValue($this->_prefix_st.'RANDOM', 0)
            || !Configuration::updateValue($this->_prefix_st.'SLIDESHOW', 0)
            || !Configuration::updateValue($this->_prefix_st.'S_SPEED', 7000)
            || !Configuration::updateValue($this->_prefix_st.'A_SPEED', 400)
            || !Configuration::updateValue($this->_prefix_st.'PAUSE_ON_HOVER', 1)
            || !Configuration::updateValue($this->_prefix_st.'REWIND_NAV', 0)
            || !Configuration::updateValue($this->_prefix_st.'LAZY', 1)
            || !Configuration::updateValue($this->_prefix_st.'MOVE', 0)
            || !Configuration::updateValue($this->_prefix_st.'SLIDESHOW_COL', 0)
            || !Configuration::updateValue($this->_prefix_st.'S_SPEED_COL', 7000)
            || !Configuration::updateValue($this->_prefix_st.'A_SPEED_COL', 400)
            || !Configuration::updateValue($this->_prefix_st.'PAUSE_ON_HOVER_COL', 1)
            || !Configuration::updateValue($this->_prefix_st.'REWIND_NAV_COL', 1)
            || !Configuration::updateValue($this->_prefix_st.'LAZY_COL', 0)
            || !Configuration::updateValue($this->_prefix_st.'MOVE_COL', 0)
            || !Configuration::updateValue($this->_prefix_st.'ITEMS_COL', 4)
            || !Configuration::updateValue($this->_prefix_st.'HIDE_MOB', 0)
            || !Configuration::updateValue($this->_prefix_st.'HIDE_MOB_COL', 0)
            || !Configuration::updateValue($this->_prefix_st.'DISPLAY_SD', 0)
            || !Configuration::updateValue($this->_prefix_st.'GRID', 0)
            || !Configuration::updateValue($this->_prefix_stsn.'PRO_CATE_PRO_PER_XL', 5)
            || !Configuration::updateValue($this->_prefix_stsn.'PRO_CATE_PRO_PER_LG', 4)
            || !Configuration::updateValue($this->_prefix_stsn.'PRO_CATE_PRO_PER_MD', 4)
            || !Configuration::updateValue($this->_prefix_stsn.'PRO_CATE_PRO_PER_SM', 3)
            || !Configuration::updateValue($this->_prefix_stsn.'PRO_CATE_PRO_PER_XS', 2)
            || !Configuration::updateValue($this->_prefix_stsn.'PRO_CATE_PRO_PER_XXS', 1)
            || !Configuration::updateValue($this->_prefix_st.'TITLE', 0)
            || !Configuration::updateValue($this->_prefix_st.'DIRECTION_NAV', 1)
            || !Configuration::updateValue($this->_prefix_st.'CONTROL_NAV', 0)
        )
			return false;
        $res = $this->installExtraHook();
        $this->clearProductCategoriesSliderCache();
		return $res;
	}
    public function installExtraHook()
    {
        foreach($this->_hooks AS $value)
            if (!$this->registerHook($value['id']))
                return false;
        return true;
    }
	public function installDB()
	{
		$return = (bool)Db::getInstance()->execute('
			CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'st_product_categories_slider` (
				`id_st_product_categories_slider` INT UNSIGNED NOT NULL AUTO_INCREMENT,
                `id_category` int(10) unsigned NOT NULL DEFAULT 0,
                `id_shop` int(10) unsigned NOT NULL,    
                `product_nbr` int(10) unsigned NOT NULL DEFAULT 0, 
                `product_order` int(10) unsigned NOT NULL DEFAULT 0, 
                `active` tinyint(1) unsigned NOT NULL DEFAULT 1, 
                `position` int(10) unsigned NOT NULL DEFAULT 0,
                `display_on` int(10) unsigned NOT NULL DEFAULT 1,
				PRIMARY KEY (`id_st_product_categories_slider`)
			) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8 ;');
		
		return $return;
	}

	public function uninstall()
	{
        $this->clearProductCategoriesSliderCache();
		// Delete configuration
		return $this->uninstallDB() && parent::uninstall();
	}

	public function uninstallDB()
	{
		return Db::getInstance()->execute('DROP TABLE IF EXISTS `'._DB_PREFIX_.'st_product_categories_slider`');
	}
    
    public function getContent()
	{
	    $this->context->controller->addCSS($this->_path. 'views/css/admin.css');
		$id_st_product_categories_slider = (int)Tools::getValue('id_st_product_categories_slider');
		if (isset($_POST['savestproductcategoriesslider']) || isset($_POST['savestproductcategoriessliderAndStay']))
		{
            $error = array();
            
			if ($id_st_product_categories_slider)
				$product_categories_slider = new StProductCategoriesSliderClass((int)$id_st_product_categories_slider);
			else
				$product_categories_slider = new StProductCategoriesSliderClass();
                
			$product_categories_slider->copyFromPost();
            $display_on = 0;
            foreach($this->_hooks as $v)
                $display_on += (int)Tools::getValue('display_on_'.$v['id']);
              
            if(!$display_on)
                $error[] = $this->displayError($this->l('The field "Display on" is required'));
                
            $product_categories_slider->display_on = $display_on;
            $product_categories_slider->id_shop = (int)Shop::getContextShopID();
            
            $defaultLanguage = new Language((int)(Configuration::get('PS_LANG_DEFAULT')));
            if(!$product_categories_slider->id_category)
                $error[] = $this->displayError($this->l('The field "Category" is required'));

			if (!count($error) && $product_categories_slider->validateFields(false) && $product_categories_slider->validateFieldsLang(false))
            {
                /*position*/
                $product_categories_slider->position = $product_categories_slider->checkPostion();
                if($product_categories_slider->save())
                {
                    $this->clearProductCategoriesSliderCache();
                    if(isset($_POST['savestproductcategoriessliderAndStay']))
                        Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&id_st_product_categories_slider='.$product_categories_slider->id.'&conf='.($id_st_product_categories_slider?4:3).'&update'.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));    
                    else
                        $this->_html .= $this->displayConfirmation($this->l('Product categories slider').' '.($id_st_product_categories_slider ? $this->l('updated') : $this->l('added')));
                        
                }
                else
                    $this->_html .= $this->displayError($this->l('An error occurred during Product categories slider').' '.($id_st_product_categories_slider ? $this->l('updating') : $this->l('creation')));
            }
			else
				$this->_html .= count($error) ? implode('',$error) : $this->displayError($this->l('Invalid value for field(s).'));
		}
	    if (Tools::isSubmit('statusstproductcategoriesslider'))
        {
            $product_categories_slider = new StProductCategoriesSliderClass((int)$id_st_product_categories_slider);
            if($product_categories_slider->id && $product_categories_slider->toggleStatus())
            {
                //$this->_html .= $this->displayConfirmation($this->l('The status has been updated successfully.'));  
                $this->clearProductCategoriesSliderCache();
                Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));
            }
            else
                $this->_html .= $this->displayError($this->l('An error occurred while updating the status.'));
        }
        if (Tools::isSubmit('way') && Tools::isSubmit('id_st_product_categories_slider') && (Tools::isSubmit('position')))
		{
		    $prduct_categories = new StProductCategoriesSliderClass((int)$id_st_product_categories_slider);
            if($prduct_categories->id && $prduct_categories->updatePosition((int)Tools::getValue('way'), (int)Tools::getValue('position')))
            {
                //$this->_html .= $this->displayConfirmation($this->l('The status has been updated successfully.'));
                $this->clearProductCategoriesSliderCache();
                Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));    
            }
            else
                $this->_html .= $this->displayError($this->l('Failed to update the position.'));
		}
        if (Tools::getValue('action') == 'updatePositions')
        {
            $this->processUpdatePositions();
        }
		if (isset($_POST['savesettingstproductcategoriesslider']) || isset($_POST['savesettingstproductcategoriessliderAndStay']))
        {
		    $this->initFieldsForm();
            $_GET['settingstproductcategoriesslider'] = 1;
            
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
                            Configuration::updateValue($this->_prefix_st.strtoupper($field['name']), $value);
                        }
                        else
                            Configuration::updateValue($this->_prefix_st.strtoupper($field['name']), $value);
                    }

            $name = $this->fields_form_setting[0]['form']['input']['dropdownlistgroup']['name'];
            foreach ($this->fields_form_setting[0]['form']['input']['dropdownlistgroup']['values']['medias'] as $v)
                Configuration::updateValue($this->_prefix_stsn.strtoupper($name.'_'.$v), (int)Tools::getValue($name.'_'.$v));

            if(count($this->validation_errors))
                $this->_html .= $this->displayError(implode('<br/>',$this->validation_errors));
            else 
            {
                $this->clearProductCategoriesSliderCache();
                if(isset($_POST['savesettingstproductcategoriessliderAndStay']))
                    Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&conf=4&setting'.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules')); 
                else
                    $this->_html .= $this->displayConfirmation($this->l('Settings updated'));
            }
                
        }
		
		if (Tools::isSubmit('updatestproductcategoriesslider') || Tools::isSubmit('addstproductcategoriesslider'))
		{
			$helper = $this->initForm();
			return $this->_html.$helper->generateForm($this->fields_form);
		}
		if (Tools::isSubmit('settingstproductcategoriesslider'))
		{
		    $this->initFieldsForm();
			$helper = $this->initFormSetting();
            
			return $this->_html.$helper->generateForm($this->fields_form_setting);
		}
		else if (Tools::isSubmit('deletestproductcategoriesslider'))
		{
			$product_categories_slider = new StProductCategoriesSliderClass((int)$id_st_product_categories_slider);
			if ($product_categories_slider->id)
                $product_categories_slider->delete();
            
            $this->clearProductCategoriesSliderCache();
                
			Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));
		}
		else
		{
			$helper = $this->initList();
            $this->_html .= '<script type="text/javascript">var currentIndex="'.AdminController::$currentIndex.'&configure='.$this->name.'";</script>';
			return $this->_html.$helper->generateList(StProductCategoriesSliderClass::getListContent(), $this->fields_list);
		}
	}

    public static function getCategories()
    {
        $module = new StProductCategoriesSlider();
        $root_category = Category::getRootCategory();
        $category_arr = array();
        $module->getCategoryOption($category_arr,$root_category->id);
        return $category_arr;
    }
    private function getCategoryOption(&$category_arr,$id_category = 1, $id_lang = false, $id_shop = false, $recursive = true,$selected_id_category=0)
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
		$category_arr[] = array(
            'id' => $category->id,
            'name' => (isset($spacer) ? $spacer : '').$category->name.' ('.$shop->name.')',
        );
        
		if (isset($children) && count($children))
			foreach ($children as $child)
			{
				$this->getCategoryOption($category_arr,(int)$child['id_category'], (int)$id_lang, (int)$child['id_shop'],$recursive,$selected_id_category);
			}
	}
    public static function getSortBy()
    {
        $sort_by = self::$sort_by;
        if(Configuration::get('PS_CATALOG_MODE'))
            unset($sort_by['5'],$sort_by['6']);                
        return $sort_by;
    }
	protected function initForm()
	{
		$this->fields_form[0]['form'] = array(
			'legend' => array(
				'title' => $this->l('Product categories sldier'),
                'icon' => 'icon-cogs'
			),
			'input' => array(
				array(
					'type' => 'select',
					'label' => $this->l('Category:'),
					'name' => 'id_category',
                    'required' => true,
					'options' => array(
						'query' => $this->getCategories(),
        				'id' => 'id',
        				'name' => 'name',
						'default' => array(
							'value' => 0,
							'label' => $this->l('please select')
						)
					),
				),
				array(
					'type' => 'checkbox',
					'label' => $this->l('Display on:'),
					'name' => 'display_on',
                    'required' => true,
					'values' => array(
						'query' => $this->_hooks,
        				'id' => 'id',
        				'name' => 'name',
					),
				),
                array(
					'type' => 'text',
					'label' => $this->l('Define the number of products to be displayed:'),
					'name' => 'product_nbr',
                    'default_value' => 8,
                    'required' => true,
                    'class' => 'fixed-width-sm'
				),
                'sort_by' => array(
                    'type' => 'select',
					'label' => $this->l('Sort by:'),
					'name' => 'product_order',
                    'required' => true,
					'options' => array(
						'query' => $this->getSortBy(),
        				'id' => 'id',
        				'name' => 'name',
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
                array(
					'type' => 'text',
					'label' => $this->l('Position:'),
					'name' => 'position',
                    'default_value' => 0,
                    'class' => 'fixed-width-sm'                    
				),
                array(
					'type' => 'html',
                    'id' => 'a_cancel',
					'label' => '',
					'name' => '<a class="btn btn-default btn-block fixed-width-md" href="'.AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'"><i class="icon-arrow-left"></i> Back to list</a>',                  
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
        
        $id_st_product_categories_slider = (int)Tools::getValue('id_st_product_categories_slider');
		$product_categories_slider = new StProductCategoriesSliderClass($id_st_product_categories_slider);
        if($product_categories_slider->id)
            $this->fields_form[0]['form']['input'][] = array('type' => 'hidden', 'name' => 'id_st_product_categories_slider');
        
        if(Configuration::get($this->_prefix_st.'RANDOM'))
            unset($this->fields_form[0]['form']['input']['sort_by']);
        
        $helper = new HelperForm();
		$helper->show_toolbar = false;
		$helper->table =  $this->table;
		$lang = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
		$helper->default_form_language = $lang->id;
		$helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ? Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;

		$helper->identifier = $this->identifier;
		$helper->submit_action = 'savestproductcategoriesslider';
		$helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		$helper->tpl_vars = array(
			'fields_value' => $this->getFieldsValueSt($product_categories_slider),
			'languages' => $this->context->controller->getLanguages(),
			'id_language' => $this->context->language->id
		);       

        foreach($this->_hooks as $v)
            $helper->tpl_vars['fields_value']['display_on_'.$v['id']] = (int)$v['val']&(int)$product_categories_slider->display_on; 

		return $helper;
	}
    
    public function initFieldsForm()
    {
        $this->fields_form_setting[0]['form'] = array(
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
                    'type' => 'switch',
                    'label' => $this->l('Tab:'),
                    'name' => 'tabs',
                    'is_bool' => true,
                    'default_value' => 1,
                    'values' => array(
                        array(
                            'id' => 'tabs_on',
                            'value' => 1,
                            'label' => $this->l('Yes')),
                        array(
                            'id' => 'tabs_off',
                            'value' => 0,
                            'label' => $this->l('No')),
                    ),
                    'validation' => 'isBool',
                ), 
                array(
                    'type' => 'switch',
                    'label' => $this->l('Showing random products on your homepage:'),
                    'name' => 'random',
                    'is_bool' => true,
                    'default_value' => 0,
                    'values' => array(
                        array(
                            'id' => 'random_on',
                            'value' => 1,
                            'label' => $this->l('Yes')),
                        array(
                            'id' => 'random_off',
                            'value' => 0,
                            'label' => $this->l('No')),
                    ),
                    'validation' => 'isBool',
                ), 
                'dropdownlistgroup' => array(
                    'type' => 'dropdownlistgroup',
                    'label' => $this->l('The number of columns:'),
                    'name' => 'pro_cate_pro_per',
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
		$this->fields_form_setting[1]['form'] = array(
			'legend' => array(
				'title' => $this->l('Slider on homepage'),
                'icon' => 'icon-cogs'
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
                array(
					'type' => 'html',
                    'id' => 'a_cancel',
					'label' => '',
					'name' => '<a class="btn btn-default btn-block fixed-width-md" href="'.AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'"><i class="icon-arrow-left"></i> Back to list</a>',                  
				),
			),
            'buttons' => array(
                array(
                    'type' => 'submit',
                    'title'=> $this->l(' Save all '),
                    'icon' => 'process-icon-save',
                    'class'=> 'pull-right'
                ),
            ),
			'submit' => array(
				'title' => $this->l('Save and stay'),
                'stay' => true
			),
		);

		$this->fields_form_setting[2]['form'] = array(
			'legend' => array(
				'title' => $this->l('Slide on sidebar/X quarter'),
                'icon' => 'icon-cogs'
			),
			'input' => array(
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
							'id' => 'pause_on_hover_col_on',
							'value' => 1,
							'label' => $this->l('Yes')),
						array(
							'id' => 'pause_on_hover_col_off',
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
				),
                array(
					'type' => 'html',
                    'id' => 'a_cancel',
					'label' => '',
					'name' => '<a class="btn btn-default btn-block fixed-width-md" href="'.AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'"><i class="icon-arrow-left"></i> Back to list</a>',                  
				),
			),
            'buttons' => array(
                array(
                    'type' => 'submit',
                    'title'=> $this->l(' Save all '),
                    'icon' => 'process-icon-save',
                    'class'=> 'pull-right'
                ),
            ),
			'submit' => array(
				'title' => $this->l('Save and stay'),
                'stay' => true
			),
		);
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
		$helper->submit_action = 'savesettingstproductcategoriesslider';
		$helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		$helper->tpl_vars = array(
			'fields_value' => $this->getConfigFieldsValues(),
			'languages' => $this->context->controller->getLanguages(),
			'id_language' => $this->context->language->id
		);
		return $helper;
	}
    public static function displayCategory($value, $row)
	{
        if(!$value)
            return '-';
        $id_lang = (int)Context::getContext()->language->id;
        $category = new Category((int)$value,$id_lang);
        if($category->id)
            return $category->name;
		return '';
	}
	protected function initList()
	{
		$this->fields_list = array(
			'id_st_product_categories_slider' => array(
				'title' => $this->l('Id'),
				'width' => 120,
				'type' => 'text',
                'search' => false,
                'orderby' => false
			),
			'id_category' => array(
				'title' => $this->l('Category'),
				'width' => 140,
				'type' => 'text',
				'callback' => 'displayCategory',
				'callback_object' => 'StProductCategoriesSlider',
                'search' => false,
                'orderby' => false
			),
            'position' => array(
				'title' => $this->l('Position'),
				'width' => 40,
				'position' => 'position',
				'align' => 'left',
                'search' => false,
                'orderby' => false
            ),
            'active' => array(
				'title' => $this->l('Status'),
				'align' => 'center',
				'active' => 'status',
				'type' => 'bool',
				'width' => 25,
                'search' => false,
                'orderby' => false
            ),
		);

		if (Shop::isFeatureActive())
			$this->fields_list['id_shop'] = array(
                'title' => $this->l('ID Shop'), 
                'align' => 'center', 
                'width' => 25, 
                'type' => 'int',
                'search' => false,
                'orderby' => false
                );

		$helper = new HelperList();
		$helper->shopLinkType = '';
		$helper->simple_header = false;
		$helper->identifier = 'id_st_product_categories_slider';
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
	    $helper->position_identifier = 'id_st_product_categories_slider';
        
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		$helper->currentIndex = AdminController::$currentIndex.'&configure='.$this->name;
		return $helper;
	}
    public function hookDisplayHomeTop($params)
    {
        return $this->hookDisplayHome($params, $this->getDisplayOn(__FUNCTION__));
    }
    public function hookDisplayHomeBottom($params)
    {
        return $this->hookDisplayHome($params, $this->getDisplayOn(__FUNCTION__));
    }
	public function hookDisplayHome($params,$display_on=0,$flag=0)
	{
	    if (!$display_on)
            $display_on = $this->getDisplayOn(__FUNCTION__);
        $random = Configuration::get($this->_prefix_st.'RANDOM');
        if(Configuration::get($this->_prefix_st.'TABS'))
        {
            if(Configuration::get($this->_prefix_st.'GRID') || $random)
            {
                if(!$this->_prepareHook(0, $display_on))
                    return false;
                $this->smarty->assign(array(
                    'column_slider'         => false,
                    'homeverybottom'         => ($flag==2 ? true : false),
                    'pro_per_xl'       => (int)Configuration::get($this->_prefix_stsn.'PRO_CATE_PRO_PER_XL'),
                    'pro_per_lg'       => (int)Configuration::get($this->_prefix_stsn.'PRO_CATE_PRO_PER_LG'),
                    'pro_per_md'       => (int)Configuration::get($this->_prefix_stsn.'PRO_CATE_PRO_PER_MD'),
                    'pro_per_sm'       => (int)Configuration::get($this->_prefix_stsn.'PRO_CATE_PRO_PER_SM'),
                    'pro_per_xs'       => (int)Configuration::get($this->_prefix_stsn.'PRO_CATE_PRO_PER_XS'),
                    'pro_per_xxs'       => (int)Configuration::get($this->_prefix_stsn.'PRO_CATE_PRO_PER_XXS'),
                ));
                return $this->display(__FILE__, 'stproductcategoriesslider_tab.tpl');
            }
            else
            {
                if (!$this->isCached('stproductcategoriesslider_tab.tpl', $this->stGetCacheId($display_on)))
            	{
                    if(!$this->_prepareHook(0, $display_on))
                        return false;
                    $this->smarty->assign(array(
                        'column_slider'         => false,
                        'homeverybottom'         => ($flag==2 ? true : false),
                        'pro_per_xl'       => (int)Configuration::get($this->_prefix_stsn.'PRO_CATE_PRO_PER_XL'),
                        'pro_per_lg'       => (int)Configuration::get($this->_prefix_stsn.'PRO_CATE_PRO_PER_LG'),
                        'pro_per_md'       => (int)Configuration::get($this->_prefix_stsn.'PRO_CATE_PRO_PER_MD'),
                        'pro_per_sm'       => (int)Configuration::get($this->_prefix_stsn.'PRO_CATE_PRO_PER_SM'),
                        'pro_per_xs'       => (int)Configuration::get($this->_prefix_stsn.'PRO_CATE_PRO_PER_XS'),
                        'pro_per_xxs'       => (int)Configuration::get($this->_prefix_stsn.'PRO_CATE_PRO_PER_XXS'),
                    ));
                }
        		return $this->display(__FILE__, 'stproductcategoriesslider_tab.tpl', $this->stGetCacheId($display_on));
            }
            return false;
        }
        else
        {
            if(Configuration::get($this->_prefix_st.'GRID') || $random)
            {
                if(!$this->_prepareHook(0, $display_on))
                    return false;
                $this->smarty->assign(array(
                    'column_slider'         => false,
                    'homeverybottom'         => ($flag==2 ? true : false),
                    'pro_per_xl'       => (int)Configuration::get($this->_prefix_stsn.'PRO_CATE_PRO_PER_XL'),
                    'pro_per_lg'       => (int)Configuration::get($this->_prefix_stsn.'PRO_CATE_PRO_PER_LG'),
                    'pro_per_md'       => (int)Configuration::get($this->_prefix_stsn.'PRO_CATE_PRO_PER_MD'),
                    'pro_per_sm'       => (int)Configuration::get($this->_prefix_stsn.'PRO_CATE_PRO_PER_SM'),
                    'pro_per_xs'       => (int)Configuration::get($this->_prefix_stsn.'PRO_CATE_PRO_PER_XS'),
                    'pro_per_xxs'       => (int)Configuration::get($this->_prefix_stsn.'PRO_CATE_PRO_PER_XXS'),
                ));
                return $this->display(__FILE__, 'stproductcategoriesslider.tpl');
            }else{
                if(!$this->isCached('stproductcategoriesslider.tpl', $this->stGetCacheId($display_on)))
                {
                    if(!$this->_prepareHook(0, $display_on))
                        return false;
                    $this->smarty->assign(array(
                        'column_slider'         => false,
                        'homeverybottom'         => ($flag==2 ? true : false),
                        'pro_per_xl'       => (int)Configuration::get($this->_prefix_stsn.'PRO_CATE_PRO_PER_XL'),
                        'pro_per_lg'       => (int)Configuration::get($this->_prefix_stsn.'PRO_CATE_PRO_PER_LG'),
                        'pro_per_md'       => (int)Configuration::get($this->_prefix_stsn.'PRO_CATE_PRO_PER_MD'),
                        'pro_per_sm'       => (int)Configuration::get($this->_prefix_stsn.'PRO_CATE_PRO_PER_SM'),
                        'pro_per_xs'       => (int)Configuration::get($this->_prefix_stsn.'PRO_CATE_PRO_PER_XS'),
                        'pro_per_xxs'       => (int)Configuration::get($this->_prefix_stsn.'PRO_CATE_PRO_PER_XXS'),
                    ));
                }
                return $this->display(__FILE__, 'stproductcategoriesslider.tpl', $this->stGetCacheId($display_on));
            }
            return false;
        }
	}
    public function hookDisplayTopColumn($params)
    {
        return $this->hookDisplayHome($params, $this->getDisplayOn(__FUNCTION__) ,2);
    }
    public function hookDisplayBottomColumn($params)
    {
        return $this->hookDisplayHome($params, $this->getDisplayOn(__FUNCTION__) ,2);
    }
    public function hookDisplayFullWidthTop($params)
    {
        if(Dispatcher::getInstance()->getController()!='index')
            return false;

        return $this->hookDisplayHome($params, $this->getDisplayOn(__FUNCTION__) ,2);
    }
    public function hookDisplayFullWidthBottom($params)
    {
        if(Dispatcher::getInstance()->getController()!='index')
            return false;

        return $this->hookDisplayHome($params, $this->getDisplayOn(__FUNCTION__) ,2);
    }
    
    public function hookDisplayHomeTertiaryLeft($params)
    {
        return $this->hookDisplayHome($params, $this->getDisplayOn(__FUNCTION__));
    }
    public function hookDisplayHomeTertiaryRight($params)
    {
        return $this->hookDisplayHome($params, $this->getDisplayOn(__FUNCTION__));
    }
    
	public function hookDisplayAnywhere($params)
	{
	    if(!isset($params['caller']) || $params['caller']!=$this->name)
            return false;
	    if(isset($params['function']) && method_exists($this,$params['function']))
            return call_user_func(array($this,$params['function']));
    }
    
	public function hookDisplayLeftColumn($params, $display_on=0)
	{
	    if (!$display_on)
            $display_on = $this->getDisplayOn(__FUNCTION__);
	    if (!$this->isCached('stproductcategoriesslider.tpl', $this->stGetCacheId($display_on)))
    	{
            if(!$this->_prepareHook(1,$display_on))
                return false;
            $this->smarty->assign(array(
                'column_slider'         => true,
            ));
        }
		return $this->display(__FILE__, 'stproductcategoriesslider.tpl', $this->stGetCacheId($display_on));
	}
	public function hookDisplayRightColumn($params)
    {
        return $this->hookDisplayLeftColumn($params, $this->getDisplayOn(__FUNCTION__));
    }
    
    public function hookDisplayHomeSecondaryLeft($params)
    {
        return $this->hookDisplayLeftColumn($params, $this->getDisplayOn(__FUNCTION__));
    }
	public function hookDisplayHomeSecondaryRight($params)
    {
        $this->smarty->assign(array(
            'is_homepage_secondary_left' => true,
        ));
        return $this->hookDisplayHome($params, $this->getDisplayOn(__FUNCTION__)); 
    }
    
	public function hookDisplayProductSecondaryColumn($params)
	{
        return $this->hookDisplayLeftColumn($params, $this->getDisplayOn(__FUNCTION__));
	}
    
    private function _prepareHook($col=0,$display_on=0)
    {
        $homeSize = Image::getSize(ImageType::getFormatedName('home'));
        
        $ext = $col ? '_COL' : '';
        
        $key = $display_on ? (int)$display_on : 0;
        if (!$display_on)
            return false;
        if (isset(self::$cache_product_categories[$key]) && self::$cache_product_categories[$key])
            $categories = self::$cache_product_categories[$key];
        else
        {
            $categories = StProductCategoriesSliderClass::getListContent(1,$display_on);
            self::$cache_product_categories[$key] = $categories;
        }
               
        if(!is_array($categories) || !count($categories))     
            return false;
        $product_categories = array(); 
        
        $module_stthemeeditor = Module::getInstanceByName('stthemeeditor');
		if ($module_stthemeeditor && $module_stthemeeditor->id)
			$id_module_stthemeeditor = $module_stthemeeditor->id;
                    
        $module_sthoverimage = Module::getInstanceByName('sthoverimage');
        if ($module_sthoverimage && $module_sthoverimage->id)
            $id_module_sthoverimage = $module_sthoverimage->id;
            
	    $random = Configuration::get($this->_prefix_st.'RANDOM');
        foreach($categories as $v)
        {
            $order_by = $random ? null : (isset(self::$sort_by[$v['product_order']]) ? self::$sort_by[$v['product_order']]['orderBy'] : null);
            $order_way = $random ? null : (isset(self::$sort_by[$v['product_order']]) ? self::$sort_by[$v['product_order']]['orderWay'] : null);
            
    		$category = new Category((int)$v['id_category'], (int)$this->context->language->id);
            $products = $category->getProducts($this->context->language->id, 1, (int)$v['product_nbr'], $order_by, $order_way, false, true, (bool)$random, (int)$v['product_nbr']);
            
            if(is_array($products) && count($products))
            {
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
            
            $product_categories[] = array(
                'id_category' => $category->id,
                'link_rewrite' => $category->link_rewrite,
                'name'  => $category->name,'description'  => $category->description,
                'products' => $products,
            );
        }
        
        
        $slideshow = Configuration::get($this->_prefix_st.'SLIDESHOW'.$ext);
        
        $s_speed = Configuration::get($this->_prefix_st.'S_SPEED'.$ext);
        
        $a_speed = Configuration::get($this->_prefix_st.'A_SPEED'.$ext);
        
        $pause_on_hover = Configuration::get($this->_prefix_st.'PAUSE_ON_HOVER'.$ext);

        $rewind_nav = Configuration::get($this->_prefix_st.'REWIND_NAV'.$ext);
        
        $loop = Configuration::get($this->_prefix_st.'LOOP'.$ext);
        
        $move = Configuration::get($this->_prefix_st.'MOVE'.$ext);
        
        $items = Configuration::get($this->_prefix_st.'ITEMS_COL');
        
        $hide_mob = Configuration::get($this->_prefix_st.'HIDE_MOB'.$ext);

        $display_sd = Configuration::get($this->_prefix_st.'DISPLAY_SD');

        $lazy_load      = Configuration::get($this->_prefix_st.'LAZY'.$ext);
                
        $this->smarty->assign(array(
            'product_categories'      => $product_categories,
            'add_prod_display'        => Configuration::get('PS_ATTRIBUTE_CATEGORY_DISPLAY'),
            'homeSize'                => $homeSize,
            'mediumSize'              => Image::getSize(ImageType::getFormatedName('medium')),
            'smallSize'               => Image::getSize(ImageType::getFormatedName('small')),
            'pro_cate_slideshow'      => $slideshow,
            'pro_cate_s_speed'        => $s_speed,
            'pro_cate_a_speed'        => $a_speed,
            'pro_cate_pause_on_hover' => $pause_on_hover,
            'rewind_nav'              => $rewind_nav,
            'pro_cate_loop'           => $loop,
            'pro_cate_move'           => $move,
            'slider_items'            => $items,
            'hide_mob'                => (int)$hide_mob,
            'display_sd'              => (int)$display_sd,
            'lazy_load'               => $lazy_load,
            'display_as_grid'         => Configuration::get($this->_prefix_st.'GRID'),
            'title_position'          => Configuration::get($this->_prefix_st.'TITLE'),
            'direction_nav'           => Configuration::get($this->_prefix_st.'DIRECTION_NAV'),
            'control_nav'             => Configuration::get($this->_prefix_st.'CONTROL_NAV'),
            
            'hook_hash'               => $display_on,
        ));
        return true;
    }
    
    
    public function hookDisplayFooter($params, $display_on=0)
    {
        if (!$display_on)
            $display_on = $this->getDisplayOn(__FUNCTION__);
        if (!$display_on)
            return false;
	    if (!$this->isCached('stproductcategoriesslider-footer.tpl', $this->getCacheId()))
	    {
	        $key = 'FOT';
            if (isset(self::$cache_product_categories[$key]) && self::$cache_product_categories[$key])
                $categories = self::$cache_product_categories[$key];
            else
            {
                $categories = StProductCategoriesSliderClass::getListContent(1, $display_on);
                self::$cache_product_categories[$key] = $categories;    
            }
              
            if(!is_array($categories) || !count($categories))     
                return false;
            $product_categories = array(); 
                
            foreach($categories as $v)
            {
        		$category = new Category((int)$v['id_category'], (int)$this->context->language->id);
                $products = $category->getProducts($this->context->language->id, 1, (int)$v['product_nbr'], self::$sort_by[$v['product_order']]['orderBy'], self::$sort_by[$v['product_order']]['orderWay']);
                
                $product_categories[] = array(
                    'id_category' => $category->id,
                    'link_rewrite' => $category->link_rewrite,
                    'name'  => $category->name,
                    'products' => $products,
                );
            }
            
            $this->smarty->assign(array(
                'product_categories'=>$product_categories,
    			'add_prod_display' => Configuration::get('PS_ATTRIBUTE_CATEGORY_DISPLAY'),
                'smallSize' => Image::getSize(ImageType::getFormatedName('small')),
                'hook_hash' => $display_on,
    		));
	    }
		return $this->display(__FILE__, 'stproductcategoriesslider-footer.tpl', $this->getCacheId());
    }
    public function hookDisplayFooterPrimary($params)
    {
        return $this->hookDisplayFooter($params, $this->getDisplayOn(__FUNCTION__));
    }
    public function hookDisplayFooterTertiary($params)
    {
        return $this->hookDisplayFooter($params, $this->getDisplayOn(__FUNCTION__));        
    }
    
    public function hookActionObjectCategoryDeleteAfter($params)
    {
        $this->clearProductCategoriesSliderCache();
        
        if(!$params['object']->id)
            return ;
        $res = StProductCategoriesSliderClass::deleteByCategoryId($params['object']->id);
        return $res;
    }
	public function hookActionCategoryDelete($params)
	{
		return $this->hookActionObjectCategoryDeleteAfter($params);
	}
    public function hookActionObjectCategoryUpdateAfter($params)
    {
    }
    
    public function hookAddProduct($params)
	{
        $this->clearProductCategoriesSliderCache();
	}

	public function hookUpdateProduct($params)
	{
        $this->clearProductCategoriesSliderCache();
	}

	public function hookDeleteProduct($params)
	{
        $this->clearProductCategoriesSliderCache();
    }
    
	protected function stGetCacheId($key,$name = null)
	{
		$cache_id = parent::getCacheId($name);
		return $cache_id.'_'.$key;
	}
	private function clearProductCategoriesSliderCache()
	{
		$this->_clearCache('*');
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
            'tabs'               => Configuration::get($this->_prefix_st.'TABS'),
            'random'             => Configuration::get($this->_prefix_st.'RANDOM'),
            'slideshow'          => Configuration::get($this->_prefix_st.'SLIDESHOW'),
            's_speed'            => Configuration::get($this->_prefix_st.'S_SPEED'),
            'a_speed'            => Configuration::get($this->_prefix_st.'A_SPEED'),
            'pause_on_hover'     => Configuration::get($this->_prefix_st.'PAUSE_ON_HOVER'),
            'rewind_nav'         => Configuration::get($this->_prefix_st.'REWIND_NAV'),
            'lazy'               => Configuration::get($this->_prefix_st.'LAZY'),
            'move'               => Configuration::get($this->_prefix_st.'MOVE'),
            'hide_mob'           => Configuration::get($this->_prefix_st.'HIDE_MOB'),
            'display_sd'         => Configuration::get($this->_prefix_st.'DISPLAY_SD'),
            'grid'               => Configuration::get($this->_prefix_st.'GRID'),
            
            'slideshow_col'      => Configuration::get($this->_prefix_st.'SLIDESHOW_COL'),
            's_speed_col'        => Configuration::get($this->_prefix_st.'S_SPEED_COL'),
            'a_speed_col'        => Configuration::get($this->_prefix_st.'A_SPEED_COL'),
            'pause_on_hover_col' => Configuration::get($this->_prefix_st.'PAUSE_ON_HOVER_COL'),
            'rewind_nav_col'     => Configuration::get($this->_prefix_st.'REWIND_NAV_COL'),
            'lazy_col'           => Configuration::get($this->_prefix_st.'LAZY_COL'),
            'move_col'           => Configuration::get($this->_prefix_st.'MOVE_COL'),
            'items_col'          => Configuration::get($this->_prefix_st.'ITEMS_COL'),
            'hide_mob_col'       => Configuration::get($this->_prefix_st.'HIDE_MOB_COL'),    
            'title'              => Configuration::get($this->_prefix_st.'TITLE'),
            'direction_nav'      => Configuration::get($this->_prefix_st.'DIRECTION_NAV'),
            'control_nav'        => Configuration::get($this->_prefix_st.'CONTROL_NAV'),
            
            'pro_cate_pro_per_lg'    => Configuration::get($this->_prefix_stsn.'PRO_CATE_PRO_PER_LG'),
            'pro_cate_pro_per_xl'    => Configuration::get($this->_prefix_stsn.'PRO_CATE_PRO_PER_XL'),
            'pro_cate_pro_per_md'    => Configuration::get($this->_prefix_stsn.'PRO_CATE_PRO_PER_MD'),
            'pro_cate_pro_per_sm'    => Configuration::get($this->_prefix_stsn.'PRO_CATE_PRO_PER_SM'),
            'pro_cate_pro_per_xs'    => Configuration::get($this->_prefix_stsn.'PRO_CATE_PRO_PER_XS'),
            'pro_cate_pro_per_xxs'   => Configuration::get($this->_prefix_stsn.'PRO_CATE_PRO_PER_XXS'),
        );
        
        return $fields_values;
    }
    
    private function getDisplayOn($func = '')
    {
        $ret = 0;
        if (!$func)
            return $ret;
        foreach($this->_hooks AS $value)
            if ('hook'.strtolower($value['id']) == strtolower($func))
                return (int)$value['val'];
        return $ret;
    }
    
    public function processUpdatePositions()
	{
		if (Tools::getValue('action') == 'updatePositions' && Tools::getValue('ajax'))
		{
			$way = (int)(Tools::getValue('way'));
			$id = (int)(Tools::getValue('id'));
			$positions = Tools::getValue('st_product_categories_slider');
            $msg = '';
			if (is_array($positions))
				foreach ($positions as $position => $value)
				{
					$pos = explode('_', $value);

					if ((isset($pos[2])) && ((int)$pos[2] === $id))
					{
						if ($object = new StProductCategoriesSliderClass((int)$pos[2]))
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
}