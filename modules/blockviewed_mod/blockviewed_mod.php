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

class BlockViewed_mod extends Module
{
    private $_html = '';
    public $fields_form;
    public $fields_value;
    public $validation_errors = array();
    private $_prefix_st = 'ST_VIEWED_';
    private $_prefix_stsn = 'STSN_';

	public function __construct()
	{
		$this->name = 'blockviewed_mod';
		$this->tab = 'front_office_features';
		$this->version = '1.2.3';
		$this->author = 'SUNNYTOO.COM';
		$this->need_instance = 0;

		$this->bootstrap = true;
		parent::__construct();	

		$this->displayName = $this->l('Viewed products block mod');
		$this->description = $this->l('Adds a block displaying recently viewed products.');
		$this->ps_versions_compliancy = array('min' => '1.6', 'max' => _PS_VERSION_);
	}

	public function install()
	{
		$success = parent::install() 
		&& $this->registerHook('displayHeader') 
		&& $this->registerHook('displayRightBar') 
		&& $this->registerHook('displaySideBarRight') 
		&& Configuration::updateValue($this->_prefix_st.'VIEWED_NBR', 4)
        && Configuration::updateValue($this->_prefix_st.'SLIDESHOW', 0)
        && Configuration::updateValue($this->_prefix_st.'S_SPEED', 7000)
        && Configuration::updateValue($this->_prefix_st.'A_SPEED', 400)
        && Configuration::updateValue($this->_prefix_st.'PAUSE_ON_HOVER', 1)
        && Configuration::updateValue($this->_prefix_st.'REWIND_NAV', 0)
        && Configuration::updateValue($this->_prefix_st.'LAZY', 1)
        && Configuration::updateValue($this->_prefix_st.'MOVE', 0)
        && Configuration::updateValue($this->_prefix_st.'HIDE_MOB', 0)
        && Configuration::updateValue($this->_prefix_st.'AW_DISPLAY', 1)
        && Configuration::updateValue($this->_prefix_stsn.'VIEWED_PRO_PER_XL', 5)
        && Configuration::updateValue($this->_prefix_stsn.'VIEWED_PRO_PER_LG', 4)
        && Configuration::updateValue($this->_prefix_stsn.'VIEWED_PRO_PER_MD', 4)
        && Configuration::updateValue($this->_prefix_stsn.'VIEWED_PRO_PER_SM', 3)
        && Configuration::updateValue($this->_prefix_stsn.'VIEWED_PRO_PER_XS', 2)
        && Configuration::updateValue($this->_prefix_stsn.'VIEWED_PRO_PER_XXS', 1)
        && Configuration::updateValue($this->_prefix_st.'TITLE', 0)
        && Configuration::updateValue($this->_prefix_st.'DIRECTION_NAV', 1)
        && Configuration::updateValue($this->_prefix_st.'CONTROL_NAV', 0);
		return $success;
	}

	public function getContent()
	{
		$this->initFieldsForm();
		if (isset($_POST['saveblockviewed_mod']))
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
                $this->_html .= $this->displayConfirmation($this->l('Settings updated')); 
        }
        
		$helper = $this->initForm();
		return $this->_html.$helper->generateForm($this->fields_form);
	}

	private function _prepareHook($params)
    {
    	$productsViewed = (isset($params['cookie']->viewed) && !empty($params['cookie']->viewed)) ? array_slice(array_reverse(explode(',', $params['cookie']->viewed)), 0, Configuration::get($this->_prefix_st.'VIEWED_NBR')) : array();

		if (count($productsViewed))
		{
			$defaultCover = Language::getIsoById($params['cookie']->id_lang).'-default';

			$productIds = implode(',', array_map('intval', $productsViewed));
			$productsImages = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS('
			SELECT MAX(image_shop.id_image) id_image, p.id_product, p.on_sale, p.show_price, il.legend, product_shop.active, pl.name, pl.description_short, pl.link_rewrite, cl.link_rewrite AS category_rewrite,
				DATEDIFF(product_shop.`date_add`, DATE_SUB(NOW(),
					INTERVAL '.(Validate::isUnsignedInt(Configuration::get('PS_NB_DAYS_NEW_PRODUCT')) ? Configuration::get('PS_NB_DAYS_NEW_PRODUCT') : 20).'
						DAY)) > 0 AS new
			FROM '._DB_PREFIX_.'product p
			'.Shop::addSqlAssociation('product', 'p').'
			LEFT JOIN '._DB_PREFIX_.'product_lang pl ON (pl.id_product = p.id_product'.Shop::addSqlRestrictionOnLang('pl').')
			LEFT JOIN '._DB_PREFIX_.'image i ON (i.id_product = p.id_product)'.
			Shop::addSqlAssociation('image', 'i', false, 'image_shop.cover=1').'
            LEFT JOIN '._DB_PREFIX_.'image_lang il ON (il.id_image = image_shop.id_image AND il.id_lang = '.(int)($params['cookie']->id_lang).')
			LEFT JOIN '._DB_PREFIX_.'category_lang cl ON (cl.id_category = product_shop.id_category_default'.Shop::addSqlRestrictionOnLang('cl').')
			WHERE p.id_product IN ('.$productIds.')
			AND pl.id_lang = '.(int)($params['cookie']->id_lang).'
			AND cl.id_lang = '.(int)($params['cookie']->id_lang).'
			GROUP BY product_shop.id_product'
			);

			$productsImagesArray = array();
			foreach ($productsImages as $pi)
				$productsImagesArray[$pi['id_product']] = $pi;

			$productsViewedObj = array();
			foreach ($productsViewed as $productViewed)
			{
				$obj = (object)'Product';
				if (!isset($productsImagesArray[$productViewed]) || (!$obj->active = $productsImagesArray[$productViewed]['active']))
					continue;
				else
				{
					$obj->id = (int)($productsImagesArray[$productViewed]['id_product']);
					$obj->id_image = (int)$productsImagesArray[$productViewed]['id_image'];
					$obj->cover = (int)($productsImagesArray[$productViewed]['id_product']).'-'.(int)($productsImagesArray[$productViewed]['id_image']);
					$obj->legend = $productsImagesArray[$productViewed]['legend'];
					$obj->name = $productsImagesArray[$productViewed]['name'];
					$obj->description_short = $productsImagesArray[$productViewed]['description_short'];
					$obj->link_rewrite = $productsImagesArray[$productViewed]['link_rewrite'];
					$obj->category_rewrite = $productsImagesArray[$productViewed]['category_rewrite'];
					$obj->new = $productsImagesArray[$productViewed]['new'];
					$obj->on_sale = $productsImagesArray[$productViewed]['on_sale'];
					$obj->show_price = $productsImagesArray[$productViewed]['show_price'];
					// $obj is not a real product so it cannot be used as argument for getProductLink()
					$obj->product_link = $this->context->link->getProductLink($obj->id, $obj->link_rewrite, $obj->category_rewrite);

					if (!isset($obj->cover) || !$productsImagesArray[$productViewed]['id_image'])
					{
						$obj->cover = $defaultCover;
						$obj->legend = '';
					}
					$productsViewedObj[] = $obj;
				}
			}

			if (!count($productsViewedObj))
				return;

			$this->smarty->assign(array(
				'productsViewedObj' => $productsViewedObj,
			));
			return true;
		}
		else
			return false;
    }

	public function hookRightColumn($params)
	{
		if(!$this->_prepareHook($params))
			return false;
		return $this->display(__FILE__, 'blockviewed.tpl');
	}

	public function hookLeftColumn($params)
	{
		return $this->hookRightColumn($params);
	}
	public function hookDisplayRightBar($params)
    {
    	$productsViewed = (isset($params['cookie']->viewed) && !empty($params['cookie']->viewed)) ? array_slice(array_reverse(explode(',', $params['cookie']->viewed)), 0, Configuration::get($this->_prefix_st.'VIEWED_NBR')) : array();

		$this->smarty->assign(array(
			'products_viewed_nbr' => count($productsViewed),
		));
        return $this->display(__FILE__, 'blockviewed-bar.tpl');
    }
    
    public function hookDisplaySideBarRight($params)
    {
		$this->_prepareHook($params);

        return $this->display(__FILE__, 'blockviewed-side.tpl');
    }
    public function hookDisplayNav($params)
    {
		$this->_prepareHook($params);
		
        return $this->display(__FILE__, 'blockviewed-nav.tpl');
    }
    public function hookDisplayNavLeft($params)
    {
        return $this->hookDisplayNav($params);
    }
	/*public function hookFooter($params)
	{
		return $this->hookRightColumn($params);
	}*/
	public function hookDisplayCategoryHeader($params)
    {
		$this->_prepareHook($params);

        $this->smarty->assign(array(
			'homeSize'              => Image::getSize(ImageType::getFormatedName('home')),
			'slider_slideshow'      => Configuration::get($this->_prefix_st.'SLIDESHOW'),
			'slider_s_speed'        => Configuration::get($this->_prefix_st.'S_SPEED'),
			'slider_a_speed'        => Configuration::get($this->_prefix_st.'A_SPEED'),
			'slider_pause_on_hover' => Configuration::get($this->_prefix_st.'PAUSE_ON_HOVER'),
			'rewind_nav'            => Configuration::get($this->_prefix_st.'REWIND_NAV'),
			'lazy_load'             => Configuration::get($this->_prefix_st.'LAZY'),
			'slider_move'           => Configuration::get($this->_prefix_st.'MOVE'),
			'hide_mob'              => Configuration::get($this->_prefix_st.'HIDE_MOB'),
			'aw_display'            => Configuration::get($this->_prefix_st.'AW_DISPLAY'),
			'title_position'        => Configuration::get($this->_prefix_st.'TITLE'),
			'direction_nav'         => Configuration::get($this->_prefix_st.'DIRECTION_NAV'),
			'control_nav'           => Configuration::get($this->_prefix_st.'CONTROL_NAV'),
			
			'pro_per_xl'            => (int)Configuration::get($this->_prefix_stsn.'VIEWED_PRO_PER_XL'),
			'pro_per_lg'            => (int)Configuration::get($this->_prefix_stsn.'VIEWED_PRO_PER_LG'),
			'pro_per_md'            => (int)Configuration::get($this->_prefix_stsn.'VIEWED_PRO_PER_MD'),
			'pro_per_sm'            => (int)Configuration::get($this->_prefix_stsn.'VIEWED_PRO_PER_SM'),
			'pro_per_xs'            => (int)Configuration::get($this->_prefix_stsn.'VIEWED_PRO_PER_XS'),
			'pro_per_xxs'           => (int)Configuration::get($this->_prefix_stsn.'VIEWED_PRO_PER_XXS'),
		));
		return $this->display(__FILE__, 'blockviewed-slider.tpl');
    }
    public function hookDisplayCategoryFooter($params)
    {
        return $this->hookDisplayCategoryHeader($params);
    }
    public function hookDisplayFooterProduct($params)
    {
        return $this->hookDisplayCategoryHeader($params);
    }
    public function hookDisplayFullWidthTop($params)
    {
    	$this->smarty->assign('homeverybottom',true);
        return $this->hookDisplayCategoryHeader($params);
    }
    public function hookDisplayFullWidthBottom($params)
    {    	
    	$this->smarty->assign('homeverybottom',true);
        return $this->hookDisplayCategoryHeader($params);
    }
    public function hookDisplayHomeTop($params)
    {
        return $this->hookDisplayCategoryHeader($params);
    }
    public function hookDisplayHomeBottom($params)
    {
        return $this->hookDisplayCategoryHeader($params);
    }
    
    public function hookDisplayBottomColumn($params)
    {
        return $this->hookDisplayCategoryHeader($params);
    }

    public function hookDisplayHomeTertiaryLeft($params)
    {
        return $this->hookDisplayCategoryHeader($params);
    }
    public function hookDisplayHomeTertiaryRight($params)
    {
        return $this->hookDisplayCategoryHeader($params);
    }
    
	public function hookDisplayHome($params)
	{
        return $this->hookDisplayCategoryHeader($params);
	}
	public function hookDisplayHeader($params)
	{
		$id_product = (int)Tools::getValue('id_product');
		$productsViewed = (isset($params['cookie']->viewed) && !empty($params['cookie']->viewed)) ? array_slice(array_reverse(explode(',', $params['cookie']->viewed)), 0, Configuration::get($this->_prefix_st.'VIEWED_NBR')) : array();

		if ($id_product && !in_array($id_product, $productsViewed))
		{
			$product = new Product((int)$id_product);
			if ($product->checkAccess((int)$this->context->customer->id))
			{
				if (isset($params['cookie']->viewed) && !empty($params['cookie']->viewed))
					$params['cookie']->viewed .= ','.(int)$id_product;
				else
					$params['cookie']->viewed = (int)$id_product;
			}
		}
		$this->context->controller->addJS($this->_path.'views/js/blockviewed.js');
	}
	public function initFieldsForm()
    {
        $this->fields_form[0]['form'] = array(
            'legend' => array(
                'title' => $this->l('Settings'),
                'icon'  => 'icon-cogs'
            ),
            'input' => array(
                array(
                    'type' => 'text',
                    'label' => $this->l('Define the number of products to be displayed:'),
                    'name' => 'viewed_nbr',
                    'default_value' => 4,
                    'required' => true,
                    'desc' => $this->l('Define the number of products displayed in this block.'),
                    'validation' => 'isUnsignedInt',
                    'class' => 'fixed-width-sm'
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
        );
        $this->fields_form[1]['form'] = array(
            'legend' => array(
                'title' => $this->l('Slide on homepage'),
                'icon'  => 'icon-cogs'
            ),
            'input' => array(
                'dropdownlistgroup' => array(
                    'type' => 'dropdownlistgroup',
                    'label' => $this->l('The number of columns:'),
                    'name' => 'viewed_pro_per',
                    'values' => array(
                            'maximum' => 10,
                            'medias' => array('xl','lg','md','sm','xs','xxs'),
                        ),
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
            'buttons' => array(
                array(
                    'type' => 'submit',
                    'title'=> $this->l(' Save '),
                    'icon' => 'process-icon-save',
                    'class'=> 'pull-right'
                ),
            ),
		);
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
		$helper->submit_action = 'saveblockviewed_mod';
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
            'slideshow'          => Configuration::get($this->_prefix_st.'SLIDESHOW'),
            's_speed'            => Configuration::get($this->_prefix_st.'S_SPEED'),
            'a_speed'            => Configuration::get($this->_prefix_st.'A_SPEED'),
            'pause_on_hover'     => Configuration::get($this->_prefix_st.'PAUSE_ON_HOVER'),
            'rewind_nav'         => Configuration::get($this->_prefix_st.'REWIND_NAV'),
            'lazy'               => Configuration::get($this->_prefix_st.'LAZY'),
            'move'               => Configuration::get($this->_prefix_st.'MOVE'),
            'hide_mob'           => Configuration::get($this->_prefix_st.'HIDE_MOB'),
            'aw_display'         => Configuration::get($this->_prefix_st.'AW_DISPLAY'),

            'viewed_pro_per_xl'  => Configuration::get($this->_prefix_stsn.'VIEWED_PRO_PER_XL'),
            'viewed_pro_per_lg'  => Configuration::get($this->_prefix_stsn.'VIEWED_PRO_PER_LG'),
            'viewed_pro_per_md'  => Configuration::get($this->_prefix_stsn.'VIEWED_PRO_PER_MD'),
            'viewed_pro_per_sm'  => Configuration::get($this->_prefix_stsn.'VIEWED_PRO_PER_SM'),
            'viewed_pro_per_xs'  => Configuration::get($this->_prefix_stsn.'VIEWED_PRO_PER_XS'),
            'viewed_pro_per_xxs' => Configuration::get($this->_prefix_stsn.'VIEWED_PRO_PER_XXS'),
            'viewed_nbr'         => Configuration::get($this->_prefix_st.'VIEWED_NBR'),
            'title'              => Configuration::get($this->_prefix_st.'TITLE'),
            'direction_nav'      => Configuration::get($this->_prefix_st.'DIRECTION_NAV'),
            'control_nav'        => Configuration::get($this->_prefix_st.'CONTROL_NAV'),
        );
        
        return $fields_values;
    }
}
