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

class StBlogRecentArticles extends Module
{
    private $_html = '';
    public $fields_form;
    public $fields_value;
    public $validation_errors = array();
    public static $per_nbr = array(
		array('id' => 2, 'name' => '2'),
		array('id' => 3, 'name' => '3'),
		array('id' => 4, 'name' => '4'),
    );
    public static $sort_by = array(
        1 => array('id' =>1 , 'name' => 'Date add: Desc'),
        2 => array('id' =>2 , 'name' => 'Date add: Asc'),
        3 => array('id' =>3 , 'name' => 'Date update: Desc'),
        4 => array('id' =>4 , 'name' => 'Date update: Asc'),
        5 => array('id' =>5 , 'name' => 'Blog ID: Desc'),
        6 => array('id' =>6 , 'name' => 'Blog ID: Asc'),
        7 => array('id' =>7 , 'name' => 'Position: Desc'),
        8 => array('id' =>8 , 'name' => 'Position: Asc'),
    );
	public function __construct()
	{
		$this->name          = 'stblogrecentarticles';
		$this->tab           = 'front_office_features';
		$this->version       = '1.0';
		$this->author        = 'SUNNYTOO.COM';
		$this->need_instance = 0;
		$this->bootstrap 	 = true;
		parent::__construct();
		
        $this->displayName = $this->l('Blog Module - Recent articles');
        $this->description = $this->l('Display rencent articles on your store.');
	}

	public function install()
	{
		if (!parent::install() 
			|| !$this->registerHook('displayStBlogHome')
			|| !Configuration::updateValue('ST_B_COL_RECENT_A_NBR', 4)
			|| !Configuration::updateValue('ST_B_FOOTER_RECENT_A_NBR', 3)

            || !Configuration::updateValue('ST_B_BLOG_RECENT_A_GRID', 0)
            || !Configuration::updateValue('ST_B_HOME_RECENT_A_GRID', 0)

            || !Configuration::updateValue('ST_B_BLOG_RECENT_A_NBR', 4)
            || !Configuration::updateValue('ST_B_HOME_RECENT_A_NBR', 4)
            || !Configuration::updateValue('ST_B_BLOG_RECENT_A_SORTBY', 8)
            || !Configuration::updateValue('ST_B_HOME_RECENT_A_SORTBY', 8)

            || !Configuration::updateValue('ST_B_RECENT_A_SLIDESHOW',0)
            || !Configuration::updateValue('ST_B_RECENT_A_S_SPEED',7000)
            || !Configuration::updateValue('ST_B_RECENT_A_A_SPEED',400)
            || !Configuration::updateValue('ST_B_RECENT_A_PAUSE_ON_HOVER',1)
            || !Configuration::updateValue('ST_B_RECENT_A_REWIND_NAV',1)
            || !Configuration::updateValue('ST_B_RECENT_A_LAZY',0)
            || !Configuration::updateValue('ST_B_RECENT_A_MOVE',0)

            || !Configuration::updateValue('STSN_B_HOME_RECENT_A_PRO_PER_XL', 5)
            || !Configuration::updateValue('STSN_B_HOME_RECENT_A_PRO_PER_LG', 4)
            || !Configuration::updateValue('STSN_B_HOME_RECENT_A_PRO_PER_MD', 4)
            || !Configuration::updateValue('STSN_B_HOME_RECENT_A_PRO_PER_SM', 3)
            || !Configuration::updateValue('STSN_B_HOME_RECENT_A_PRO_PER_XS', 2)
            || !Configuration::updateValue('STSN_B_HOME_RECENT_A_PRO_PER_XXS', 1)

            || !Configuration::updateValue('STSN_B_BLOG_RECENT_A_PRO_PER_XL', 4)
            || !Configuration::updateValue('STSN_B_BLOG_RECENT_A_PRO_PER_LG', 3)
            || !Configuration::updateValue('STSN_B_BLOG_RECENT_A_PRO_PER_MD', 3)
            || !Configuration::updateValue('STSN_B_BLOG_RECENT_A_PRO_PER_SM', 2)
            || !Configuration::updateValue('STSN_B_BLOG_RECENT_A_PRO_PER_XS', 2)
            || !Configuration::updateValue('STSN_B_BLOG_RECENT_A_PRO_PER_XXS', 1)

            || !Configuration::updateValue('ST_B_BLOG_RECENT_A_TITLE', 0)
            || !Configuration::updateValue('ST_B_HOME_RECENT_A_TITLE', 0)
            || !Configuration::updateValue('ST_B_BLOG_RECENT_A_DIRECTION_NAV', 1)
            || !Configuration::updateValue('ST_B_HOME_RECENT_A_DIRECTION_NAV', 1)
            || !Configuration::updateValue('ST_B_BLOG_RECENT_A_CONTROL_NAV', 0)
            || !Configuration::updateValue('ST_B_HOME_RECENT_A_CONTROL_NAV', 0)
        )
			return false;
		return true;
	}

    public function getContent()
	{
	    if(!Module::isInstalled('stblog'))
            $this->_html .= $this->displayConfirmation($this->l('Please, install Blog module first.'));
	    if(!Module::isEnabled('stblog'))
            $this->_html .= $this->displayConfirmation($this->l('Please, enable Blog module first.'));
            
	    $this->initFieldsForm();
		if (isset($_POST['savestblogrecentarticles']))
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
                            Configuration::updateValue('ST_B_'.strtoupper($field['name']), $value);
                        }
                        else
                            Configuration::updateValue('ST_B_'.strtoupper($field['name']), $value);
                    }
            
            $name = $this->fields_form[0]['form']['input']['dropdownlistgroup']['name'];
            foreach ($this->fields_form[0]['form']['input']['dropdownlistgroup']['values']['medias'] as $v)
                Configuration::updateValue('STSN_B_'.strtoupper($name.'_'.$v), (int)Tools::getValue($name.'_'.$v));

            $name = $this->fields_form[1]['form']['input']['dropdownlistgroup']['name'];
            foreach ($this->fields_form[1]['form']['input']['dropdownlistgroup']['values']['medias'] as $v)
                Configuration::updateValue('STSN_B_'.strtoupper($name.'_'.$v), (int)Tools::getValue($name.'_'.$v));

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
                'title' => $this->l('Blog homepage'),
                'icon' => 'icon-cogs'
            ),
            'input' => array(
                array(
                    'type' => 'radio',
                    'label' => $this->l('How to display:'),
                    'name' => 'blog_recent_a_grid',
                    'default_value' => 0,
                    'values' => array(
                        array(
                            'id' => 'blog_grid_slider',
                            'value' => 0,
                            'label' => $this->l('Slider')),
                        array(
                            'id' => 'blog_grid_medium',
                            'value' => 1,
                            'label' => $this->l('Slider(Information on the right hand side)')),
                        array(
                            'id' => 'blog_grid_samll',
                            'value' => 2,
                            'label' => $this->l('Grid')),
                    ),
                    'validation' => 'isUnsignedInt',
                ), 
                array(
                    'type' => 'text',
                    'label' => $this->l('Blog homepage:'),
                    'name' => 'blog_recent_a_nbr',
                    'desc' => $this->l('Define the number of recent articles to be displayed in blog homepage.'),
                    'validation' => 'isUnsignedInt',
                    'class' => 'fixed-width-sm'
                ),
                'dropdownlistgroup' => array(
                    'type' => 'dropdownlistgroup',
                    'label' => $this->l('The number of columns:'),
                    'name' => 'blog_recent_a_pro_per',
                    'values' => array(
                            'maximum' => 10,
                            'medias' => array('xl','lg','md','sm','xs','xxs'),
                        ),
                ), 
                array(
                    'type' => 'radio',
                    'label' => $this->l('Title text align:'),
                    'name' => 'blog_recent_a_title',
                    'default_value' => 0,
                    'values' => array(
                        array(
                            'id' => 'blog_left',
                            'value' => 0,
                            'label' => $this->l('Left')),
                        array(
                            'id' => 'blog_center',
                            'value' => 1,
                            'label' => $this->l('Center')),
                    ),
                    'validation' => 'isBool',
                ),
                array(
                    'type' => 'select',
                    'label' => $this->l('Sort by:'),
                    'name' => 'blog_recent_a_sortby',
                    'options' => array(
                        'query' => self::$sort_by,
                        'id' => 'id',
                        'name' => 'name',
                    ),
                    'validation' => 'isUnsignedInt',
                ),

                array(
                    'type' => 'radio',
                    'label' => $this->l('Display "next" and "prev" buttons:'),
                    'name' => 'blog_recent_a_direction_nav',
                    'default_value' => 0,
                    'values' => array(
                        array(
                            'id' => 'blog_none',
                            'value' => 0,
                            'label' => $this->l('None')),
                        array(
                            'id' => 'blog_top-right',
                            'value' => 1,
                            'label' => $this->l('Top right-hand side')),
                        array(
                            'id' => 'blog_square',
                            'value' => 3,
                            'label' => $this->l('Square')),
                        array(
                            'id' => 'blog_circle',
                            'value' => 4,
                            'label' => $this->l('Circle')),
                    ),
                    'validation' => 'isUnsignedInt',
                ),
                array(
                    'type' => 'switch',
                    'label' => $this->l('Show pagination:'),
                    'name' => 'blog_recent_a_control_nav',
                    'default_value' => 1,
                    'is_bool' => true,
                    'values' => array(
                        array(
                            'id' => 'blog_control_nav_on',
                            'value' => 1,
                            'label' => $this->l('Yes')),
                        array(
                            'id' => 'blog_control_nav_off',
                            'value' => 0,
                            'label' => $this->l('No')),
                    ),
                    'validation' => 'isBool',
                ),
            ),
            'submit' => array(
                'title' => $this->l('   Save all   ')
            )
        );
        $this->fields_form[1]['form'] = array(
            'legend' => array(
                'title' => $this->l('Homepage'),
                'icon' => 'icon-cogs'
            ),
            'input' => array(
                array(
                    'type' => 'radio',
                    'label' => $this->l('How to display:'),
                    'name' => 'home_recent_a_grid',
                    'default_value' => 0,
                    'values' => array(
                        array(
                            'id' => 'home_grid_slider',
                            'value' => 0,
                            'label' => $this->l('Slider')),
                        array(
                            'id' => 'home_grid_medium',
                            'value' => 1,
                            'label' => $this->l('Slider(Information on the right hand side)')),
                        array(
                            'id' => 'home_grid_samll',
                            'value' => 2,
                            'label' => $this->l('Grid')),
                    ),
                    'validation' => 'isUnsignedInt',
                ), 
                array(
                    'type' => 'text',
                    'label' => $this->l('Store homepage'),
                    'name' => 'home_recent_a_nbr',
                    'desc' => $this->l('Define the number of recent articles to be displayed in store homepage.'),
                    'validation' => 'isUnsignedInt',
                    'class' => 'fixed-width-sm'
                ),
                'dropdownlistgroup' => array(
                    'type' => 'dropdownlistgroup',
                    'label' => $this->l('The number of columns:'),
                    'name' => 'home_recent_a_pro_per',
                    'values' => array(
                            'maximum' => 10,
                            'medias' => array('xl','lg','md','sm','xs','xxs'),
                        ),
                ), 
                array(
                    'type' => 'radio',
                    'label' => $this->l('Title text align:'),
                    'name' => 'home_recent_a_title',
                    'default_value' => 0,
                    'values' => array(
                        array(
                            'id' => 'home_left',
                            'value' => 0,
                            'label' => $this->l('Left')),
                        array(
                            'id' => 'home_center',
                            'value' => 1,
                            'label' => $this->l('Center')),
                    ),
                    'validation' => 'isBool',
                ),
                array(
                    'type' => 'select',
                    'label' => $this->l('Sort by:'),
                    'name' => 'home_recent_a_sortby',
                    'options' => array(
                        'query' => self::$sort_by,
                        'id' => 'id',
                        'name' => 'name',
                    ),
                    'validation' => 'isUnsignedInt',
                ),
                array(
                    'type' => 'radio',
                    'label' => $this->l('Display "next" and "prev" buttons:'),
                    'name' => 'home_recent_a_direction_nav',
                    'default_value' => 0,
                    'values' => array(
                        array(
                            'id' => 'home_none',
                            'value' => 0,
                            'label' => $this->l('None')),
                        array(
                            'id' => 'home_top-right',
                            'value' => 1,
                            'label' => $this->l('Top right-hand side')),
                        array(
                            'id' => 'home_square',
                            'value' => 3,
                            'label' => $this->l('Square')),
                        array(
                            'id' => 'home_circle',
                            'value' => 4,
                            'label' => $this->l('Circle')),
                    ),
                    'validation' => 'isUnsignedInt',
                ),
                array(
                    'type' => 'switch',
                    'label' => $this->l('Show pagination:'),
                    'name' => 'home_recent_a_control_nav',
                    'default_value' => 1,
                    'is_bool' => true,
                    'values' => array(
                        array(
                            'id' => 'home_control_nav_on',
                            'value' => 1,
                            'label' => $this->l('Yes')),
                        array(
                            'id' => 'home_control_nav_off',
                            'value' => 0,
                            'label' => $this->l('No')),
                    ),
                    'validation' => 'isBool',
                ),
            ),
            'submit' => array(
                'title' => $this->l('   Save all   ')
            )
        );

        $this->fields_form[2]['form'] = array(
            'legend' => array(
                'title' => $this->l('Slider settings'),
                'icon' => 'icon-cogs'
            ),
            'input' => array(
                array(
                    'type' => 'switch',
                    'label' => $this->l('Autoplay:'),
                    'name' => 'recent_a_slideshow',
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
                    'name' => 'recent_a_s_speed',
                    'default_value' => 7000,
                    'required' => true,
                    'desc' => $this->l('The period, in milliseconds, between the end of a transition effect and the start of the next one.'),
                    'validation' => 'isUnsignedInt',
                    'class' => 'fixed-width-sm'
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Transition period:'),
                    'name' => 'recent_a_a_speed',
                    'default_value' => 400,
                    'required' => true,
                    'desc' => $this->l('The period, in milliseconds, of the transition effect.'),
                    'validation' => 'isUnsignedInt',
                    'class' => 'fixed-width-sm'
                ),
                array(
                    'type' => 'switch',
                    'label' => $this->l('Pause On Hover:'),
                    'name' => 'recent_a_pause_on_hover',
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
                    'name' => 'recent_a_rewind_nav',
                    'default_value' => 1,
                    'is_bool' => true,
                    'values' => array(
                        array(
                            'id' => 'recent_a_rewind_nav_on',
                            'value' => 1,
                            'label' => $this->l('Yes')),
                        array(
                            'id' => 'recent_a_rewind_nav_off',
                            'value' => 0,
                            'label' => $this->l('No')),
                    ),
                    'validation' => 'isBool',
                ),
                
                array(
                    'type' => 'switch',
                    'label' => $this->l('Lazy load:'),
                    'name' => 'recent_a_lazy',
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
                    'name' => 'recent_a_move',
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
            ),
            'submit' => array(
                'title' => $this->l('   Save all   ')
            )
        );
        
        $this->fields_form[3]['form'] = array(
            'legend' => array(
                'title' => $this->l('Others'),
                'icon' => 'icon-cogs'
            ),
            'input' => array(
                array(
                    'type' => 'text',
                    'label' => $this->l('Left/right column:'),
                    'name' => 'col_recent_a_nbr',
                    'desc' => $this->l('Define the number of recent articles to be displayed in left/right column.'),
                    'validation' => 'isUnsignedInt',
                    'class' => 'fixed-width-sm'
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Footer:'),
                    'name' => 'footer_recent_a_nbr',
                    'desc' => $this->l('Define the number of recent articles to be displayed in footer.'),
                    'validation' => 'isUnsignedInt',
                    'class' => 'fixed-width-sm'
                ),
            ),
            'submit' => array(
                'title' => $this->l('   Save all   ')
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
		$helper->submit_action = 'savestblogrecentarticles';
		$helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		$helper->tpl_vars = array(
			'fields_value' => $this->getConfigFieldsValues(),
			'languages' => $this->context->controller->getLanguages(),
			'id_language' => $this->context->language->id
		);
		return $helper;
	}

    private function _prepareHook($ext='')
    {
        include_once(_PS_MODULE_DIR_.'stblog/classes/StBlogClass.php');
        include_once(_PS_MODULE_DIR_.'stblog/classes/StBlogImageClass.php');
        
        $ext = $ext ? strtoupper($ext) : '';
        $nbr = Configuration::get('ST_B_'.$ext.'_RECENT_A_NBR');
        if(!$nbr)
            $nbr = 4;
            
        $order_by = 'id_st_blog';
        $order_way = 'DESC';
        $soby = (int)Configuration::get('ST_B_'.(($ext=='HOME') ? 'HOME' : 'BLOG').'_RECENT_A_SORTBY');
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
                $order_by = 'id_st_blog';
                $order_way = 'DESC';
            break;
            case 6:
                $order_by = 'id_st_blog';
                $order_way = 'ASC';
            break;
            case 7:
                $order_by = 'position';
                $order_way = 'DESC';
            break;
            case 8:
                $order_by = 'position';
                $order_way = 'ASC';
            break;
        }
        
        $blogs = StBlogClass::getRecentArticles((int)($this->context->language->id), (int)$nbr, null, $order_by, $order_way);
        /*
        if(!$blogs)
            return false;
        */
		$this->smarty->assign(array(
            'blogs' => $blogs,
            'imageSize' => StBlogImageClass::$imageTypeDef,
            'display_viewcount' => Configuration::get('ST_BLOG_DISPLAY_VIEWCOUNT'),

            'slider_slideshow'      => Configuration::get('ST_B_RECENT_A_SLIDESHOW'),
            'slider_s_speed'        => Configuration::get('ST_B_RECENT_A_S_SPEED'),
            'slider_a_speed'        => Configuration::get('ST_B_RECENT_A_A_SPEED'),
            'slider_pause_on_hover' => Configuration::get('ST_B_RECENT_A_PAUSE_ON_HOVER'),
            'rewind_nav'            => Configuration::get('ST_B_RECENT_A_REWIND_NAV'),
            'lazy_load'             => Configuration::get('ST_B_RECENT_A_LAZY'),
            'slider_move'           => Configuration::get('ST_B_RECENT_A_MOVE'),
        ));
        return true;
    }
    
	public function hookDisplayLeftColumn($params)
	{
	    if(!Module::isInstalled('stblog') || !Module::isEnabled('stblog'))
            return false;
            
        if(!$this->_prepareHook('col'))    
            return false; 
            
		return $this->display(__FILE__, 'stblogrecentarticles-column.tpl');
	}
	public function hookDisplayRightColumn($params)
	{
        return $this->hookDisplayLeftColumn($params); 
	}
	public function hookDisplayStBlogRightColumn($params)
	{
        return $this->hookDisplayLeftColumn($params); 
	}
	public function hookDisplayStBlogLeftColumn($params)
	{
        return $this->hookDisplayLeftColumn($params); 
	}
    public function hookDisplayStBlogHome($params)
    {
	    if(!Module::isInstalled('stblog') || !Module::isEnabled('stblog'))
            return false;
            
        if(!$this->_prepareHook('blog'))    
            return false; 
        
        $this->smarty->assign(array(
            'display_as_grid'       => Configuration::get('ST_B_BLOG_RECENT_A_GRID'),
            'title_position'        => Configuration::get('ST_B_BLOG_RECENT_A_TITLE'),
            'direction_nav'         => Configuration::get('ST_B_BLOG_RECENT_A_DIRECTION_NAV'),
            'control_nav'           => Configuration::get('ST_B_BLOG_RECENT_A_CONTROL_NAV'),

            'pro_per_xl'            => (int)Configuration::get('STSN_B_BLOG_RECENT_A_PRO_PER_XL'),
            'pro_per_lg'            => (int)Configuration::get('STSN_B_BLOG_RECENT_A_PRO_PER_LG'),
            'pro_per_md'            => (int)Configuration::get('STSN_B_BLOG_RECENT_A_PRO_PER_MD'),
            'pro_per_sm'            => (int)Configuration::get('STSN_B_BLOG_RECENT_A_PRO_PER_SM'),
            'pro_per_xs'            => (int)Configuration::get('STSN_B_BLOG_RECENT_A_PRO_PER_XS'),
            'pro_per_xxs'           => (int)Configuration::get('STSN_B_BLOG_RECENT_A_PRO_PER_XXS'),
        ));
            
        return $this->display(__FILE__, 'stblogrecentarticles-home.tpl'); 
    }
    public function hookDisplayStBlogHomeTop($params)
    {
        return $this->hookDisplayStBlogHome($params); 
    }
    public function hookDisplayStBlogHomeBottom($params)
    {
        return $this->hookDisplayStBlogHome($params); 
    }
    public function hookDisplayHome($params,$flag=0)
    {
	    if(!Module::isInstalled('stblog') || !Module::isEnabled('stblog'))
            return false;
              
        if(!$this->_prepareHook('home'))    
            return false; 
        
        $this->smarty->assign(array(
            'homeverybottom'         => ($flag==2 ? true : false),

            'display_as_grid'       => Configuration::get('ST_B_HOME_RECENT_A_GRID'),
            'title_position'        => Configuration::get('ST_B_HOME_RECENT_A_TITLE'),
            'direction_nav'         => Configuration::get('ST_B_HOME_RECENT_A_DIRECTION_NAV'),
            'control_nav'           => Configuration::get('ST_B_HOME_RECENT_A_CONTROL_NAV'),

            'pro_per_xl'            => (int)Configuration::get('STSN_B_HOME_RECENT_A_PRO_PER_XL'),
            'pro_per_lg'            => (int)Configuration::get('STSN_B_HOME_RECENT_A_PRO_PER_LG'),
            'pro_per_md'            => (int)Configuration::get('STSN_B_HOME_RECENT_A_PRO_PER_MD'),
            'pro_per_sm'            => (int)Configuration::get('STSN_B_HOME_RECENT_A_PRO_PER_SM'),
            'pro_per_xs'            => (int)Configuration::get('STSN_B_HOME_RECENT_A_PRO_PER_XS'),
            'pro_per_xxs'           => (int)Configuration::get('STSN_B_HOME_RECENT_A_PRO_PER_XXS'),
        ));
            
		return $this->display(__FILE__, 'stblogrecentarticles-home.tpl'); 
    }
    public function hookDisplayHomeTop($params)
    {
        return $this->hookDisplayHome($params); 
    }
    public function hookDisplayHomeBottom($params)
    {
        return $this->hookDisplayHome($params); 
    }

    public function hookDisplayFullWidthTop($params)
    {
        if(Dispatcher::getInstance()->getController()!='index')
            return false;

        return $this->hookDisplayHome($params,2);
    }
    public function hookDisplayFullWidthBottom($params)
    {
        if(Dispatcher::getInstance()->getController()!='index')
            return false;

        return $this->hookDisplayHome($params,2);
    }

    public function hookDisplayFooter($params)
    {
	    if(!Module::isInstalled('stblog') || !Module::isEnabled('stblog'))
            return false;
              
        if(!$this->_prepareHook('footer'))    
            return false;    
            
		return $this->display(__FILE__, 'stblogrecentarticles-footer.tpl');
    }
    public function hookDisplayFooterPrimary($params)
    {
        return $this->hookDisplayFooter($params);         
    }
    public function hookDisplayFooterTertiary($params)
    {
        return $this->hookDisplayFooter($params);         
    }
    private function getConfigFieldsValues()
    {
        $fields_values = array(
            'col_recent_a_nbr'    => Configuration::get('ST_B_COL_RECENT_A_NBR'),
            'footer_recent_a_nbr' => Configuration::get('ST_B_FOOTER_RECENT_A_NBR'),
            
            'blog_recent_a_grid'       => Configuration::get('ST_B_BLOG_RECENT_A_GRID'),
            'home_recent_a_grid'       => Configuration::get('ST_B_HOME_RECENT_A_GRID'),


            'blog_recent_a_nbr'       => Configuration::get('ST_B_BLOG_RECENT_A_NBR'),
            'home_recent_a_nbr'       => Configuration::get('ST_B_HOME_RECENT_A_NBR'),
            'blog_recent_a_sortby'    => Configuration::get('ST_B_BLOG_RECENT_A_SORTBY'),
            'home_recent_a_sortby'    => Configuration::get('ST_B_HOME_RECENT_A_SORTBY'),
            
            'recent_a_slideshow'      => Configuration::get('ST_B_RECENT_A_SLIDESHOW'),
            'recent_a_s_speed'        => Configuration::get('ST_B_RECENT_A_S_SPEED'),
            'recent_a_a_speed'        => Configuration::get('ST_B_RECENT_A_A_SPEED'),
            'recent_a_pause_on_hover' => Configuration::get('ST_B_RECENT_A_PAUSE_ON_HOVER'),
            'recent_a_rewind_nav'     => Configuration::get('ST_B_RECENT_A_REWIND_NAV'),
            'recent_a_lazy'           => Configuration::get('ST_B_RECENT_A_LAZY'),
            'recent_a_move'           => Configuration::get('ST_B_RECENT_A_MOVE'),

            'blog_recent_a_pro_per_xl'     => Configuration::get('STSN_B_BLOG_RECENT_A_PRO_PER_XL'),
            'blog_recent_a_pro_per_lg'     => Configuration::get('STSN_B_BLOG_RECENT_A_PRO_PER_LG'),
            'blog_recent_a_pro_per_md'     => Configuration::get('STSN_B_BLOG_RECENT_A_PRO_PER_MD'),
            'blog_recent_a_pro_per_sm'     => Configuration::get('STSN_B_BLOG_RECENT_A_PRO_PER_SM'),
            'blog_recent_a_pro_per_xs'     => Configuration::get('STSN_B_BLOG_RECENT_A_PRO_PER_XS'),
            'blog_recent_a_pro_per_xxs'    => Configuration::get('STSN_B_BLOG_RECENT_A_PRO_PER_XXS'),

            'home_recent_a_pro_per_xl'     => Configuration::get('STSN_B_HOME_RECENT_A_PRO_PER_XL'),
            'home_recent_a_pro_per_lg'     => Configuration::get('STSN_B_HOME_RECENT_A_PRO_PER_LG'),
            'home_recent_a_pro_per_md'     => Configuration::get('STSN_B_HOME_RECENT_A_PRO_PER_MD'),
            'home_recent_a_pro_per_sm'     => Configuration::get('STSN_B_HOME_RECENT_A_PRO_PER_SM'),
            'home_recent_a_pro_per_xs'     => Configuration::get('STSN_B_HOME_RECENT_A_PRO_PER_XS'),
            'home_recent_a_pro_per_xxs'    => Configuration::get('STSN_B_HOME_RECENT_A_PRO_PER_XXS'),

            'blog_recent_a_title'          => Configuration::get('ST_B_BLOG_RECENT_A_TITLE'),
            'blog_recent_a_direction_nav'  => Configuration::get('ST_B_BLOG_RECENT_A_DIRECTION_NAV'),
            'blog_recent_a_control_nav'    => Configuration::get('ST_B_BLOG_RECENT_A_CONTROL_NAV'),

            'home_recent_a_title'          => Configuration::get('ST_B_HOME_RECENT_A_TITLE'),
            'home_recent_a_direction_nav'  => Configuration::get('ST_B_HOME_RECENT_A_DIRECTION_NAV'),
            'home_recent_a_control_nav'    => Configuration::get('ST_B_HOME_RECENT_A_CONTROL_NAV'),
        );
        return $fields_values;
    }
    public function hookDisplayHomeSecondaryRight($params)
    {
        return $this->hookDisplayHome($params); 
    }

    public function hookDisplayHomeTertiaryLeft($params)
    {
        return $this->hookDisplayHome($params); 
    }

    public function hookDisplayHomeTertiaryRight($params)
    {
        return $this->hookDisplayHome($params); 
    }
}