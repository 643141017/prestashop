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
    
include_once(dirname(__FILE__).'/StBlogRelatedArticlesClass.php');

class StBlogRelatedArticles extends Module
{
    private $_html = '';
    public $fields_form;
    public $fields_value;
    private $_prefix_st = 'ST_B_RELATED_';
    private $_prefix_stsn = 'STSN_B_';
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
        5 => array('id' =>5 , 'name' => 'Position: Asc'),
        6 => array('id' =>6 , 'name' => 'Position ID: Desc'),
        7 => array('id' =>7 , 'name' => 'Blog ID: Asc'),
        8 => array('id' =>8 , 'name' => 'Blog ID: Desc'),
    );
	function __construct()
	{
		$this->name           = 'stblogrelatedarticles';
		$this->tab            = 'front_office_features';
		$this->version        = '1.0';
		$this->author         = 'SUNNYTOO.COM';
		$this->need_instance  = 0;
		$this->bootstrap 	  = true;
		parent::__construct();
        
        Shop::addTableAssociation('st_blog', array('type' => 'shop'));

		$this->displayName = $this->l('Blog Module - Related articles');
		$this->description = $this->l('Add related articles on blog artice pages.');
	}

	function install()
	{
		if (!parent::install()
			|| !$this->installDB()
			|| !$this->registerHook('actionObjectStBlogClassAddAfter')
			|| !$this->registerHook('actionObjectStBlogClassUpdateAfter')
			|| !$this->registerHook('actionObjectStBlogClassDeleteAfter')
            || !$this->registerHook('actionAdminStBlogFormModifier')
            || !$this->registerHook('displayStBlogArticleFooter')
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

            || !Configuration::updateValue($this->_prefix_stsn.'RELATED_PRO_PER_XL', 4)
            || !Configuration::updateValue($this->_prefix_stsn.'RELATED_PRO_PER_LG', 3)
            || !Configuration::updateValue($this->_prefix_stsn.'RELATED_PRO_PER_MD', 3)
            || !Configuration::updateValue($this->_prefix_stsn.'RELATED_PRO_PER_SM', 2)
            || !Configuration::updateValue($this->_prefix_stsn.'RELATED_PRO_PER_XS', 2)
            || !Configuration::updateValue($this->_prefix_stsn.'RELATED_PRO_PER_XXS', 1)

            || !Configuration::updateValue($this->_prefix_st.'TITLE', 0)
            || !Configuration::updateValue($this->_prefix_st.'DIRECTION_NAV', 1)
            || !Configuration::updateValue($this->_prefix_st.'CONTROL_NAV', 0)
        )
			return false;
		$this->_clearCache('stblogrelatedarticles.tpl');
		return true;
	}
    private function installDB()
	{
		$return = (bool)Db::getInstance()->execute('
			CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'st_blog_related_articles` (                 
              `id_st_blog_1` int(10) unsigned NOT NULL DEFAULT 0,         
              `id_st_blog_2` int(10) unsigned NOT NULL DEFAULT 0,
			  PRIMARY KEY (`id_st_blog_1`,`id_st_blog_2`)
			) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8 ;');
            
		return $return;
	}
	private function uninstallDB()
	{
		return Db::getInstance()->execute('DROP TABLE IF EXISTS `'._DB_PREFIX_.'st_blog_related_articles`');
	}	
	public function uninstall()
	{
		$this->_clearCache('stblogrelatedarticles.tpl');
		if (!parent::uninstall() ||
			!$this->uninstallDB())
			return false;
		return true;
	}
        
    public function getContent()
	{
	    $this->initFieldsForm();
        if (Tools::getValue('act') == 'gsbra' && Tools::getValue('ajax')==1)
        {
            if(!$q = Tools::getValue('q'))
                die;
            if(!$id_st_blog = Tools::getValue('id_st_blog'))
                die;
            
            $excludeIds = Tools::getValue('excludeIds');
            $result = Db::getInstance()->executeS('
			SELECT b.`id_st_blog`,bl.`name`
			FROM `'._DB_PREFIX_.'st_blog` b
            LEFT JOIN `'._DB_PREFIX_.'st_blog_lang` bl
            ON (b.`id_st_blog` = bl.`id_st_blog`
            AND bl.`id_lang`='.(int)$this->context->language->id.')
            '.Shop::addSqlAssociation('st_blog', 'b').'
			WHERE bl.`name` LIKE \'%'.pSQL($q).'%\'
            AND b.`active` = 1
            AND b.`id_st_blog` != '.(int)$id_st_blog.'
            '.($excludeIds ? 'AND b.`id_st_blog` NOT IN('.$excludeIds.')' : '').'
    		');
            foreach ($result AS $value)
		      echo trim($value['name']).'|'.(int)($value['id_st_blog'])."\n";
            die;
        }
		if (isset($_POST['savestblogrelatedarticles']))
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
		        $this->_clearCache('stblogrelatedarticles.tpl');
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
					'label' => $this->l('Automatically generate related articles(using tags):'),
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
					'label' => $this->l('Define the number of articles to be displayed:'),
					'name' => 'nbr',
                    'default_value' => 8,
                    'required' => true,
                    'desc' => $this->l('Define the number of articles that you would like to display on homepage (default: 8).'),
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
                    'desc' => $this->l('Screen width less than 768px'),
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
					'label' => $this->l('Define the number of articles to be displayed:'),
					'name' => 'nbr_col',
                    'default_value' => 8,
                    'required' => true,
                    'desc' => $this->l('Define the number of articles that you would like to display on homepage (default: 8).'),
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
		$helper->submit_action = 'savestblogrelatedarticles';
		$helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		$helper->tpl_vars = array(
			'fields_value' => $this->getConfigFieldsValues(),
			'languages' => $this->context->controller->getLanguages(),
			'id_language' => $this->context->language->id
		);
		return $helper;
	}
    public function hookActionAdminStBlogFormModifier($params)
    {
        if(!$id_st_blog = Tools::getValue('id_st_blog'))
            return false;
        $fields_form['form'] = array(
			'legend' => array(
				'title' => 'Related articles',
                'icon' => 'icon-cogs'
			),
			'input' => array(
                'relatedarticles' => array(
					'type' => 'text',
					'label' => $this->l('Related articles:'),
					'name' => 'relatedarticles',
                    'autocomplete' => false,
                    'class' => 'fixed-width-xxl',
                    'desc' => $this->l('Begin typing the first letters of the artilce name, then select the article from the drop-down list.'),
				),
			),
			'buttons' => array(
                array(
    				'title' => $this->l('Save all'),
                    'class' => 'btn btn-default pull-right',
                    'icon'  => 'process-icon-save',
    				'type' => 'submit'
                )
			),
			'submit' => array(
				'title' => $this->l('Save and stay'),
				'stay' => true
			),
		);
        
        $js = '<script type="text/javascript">var m_token = "'.Tools::getAdminTokenLite('AdminModules').'";</script>';
        $html = '';
        foreach(StBlogRelatedArticlesClass::getRelatedArticlesLight((int)$this->context->language->id,(int)$id_st_blog) AS $value)
        {
            $html .= '<li>'.$value['name'].'
            <a href="javascript:;" class="del_relatedarticles"><img src="../img/admin/delete.gif" /></a>
            <input type="hidden" name="id_relatedarticles[]" value="'.$value['id_st_blog_2'].'" /></li>';
        }
        
        $fields_form['form']['input']['relatedarticles']['desc'] .= '<br>'.$js.$this->l('Current articles')
                .': <ul id="curr_relatedarticles">'.$html.'</ul>';
        
        $this->context->controller->addJS($this->_path. 'views/js/admin.js');
        $gallery = array_pop($params['fields']);
        $params['fields'][] = $fields_form;
        $params['fields'][] = $gallery;
        $params['fields_value']['relatedarticles'] = '';
        
    }
    private function _prepareHook($col=0, $id_product = 0)
    {            
        $ext = $col ? '_COL' : '';
        $nbr = Configuration::get($this->_prefix_st.'NBR'.$ext);
        ($nbr===false && $col) && $nbr = Configuration::get($this->_prefix_st.'NBR');
        
        if(!$nbr)
            return false;
        
        $id_st_blog = Tools::getValue('id_blog');
        if (!$id_st_blog && !$id_product)
            return false;
        
        $order_by = 'id_st_bog';
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
                $order_by = 'position';
                $order_way = 'ASC';
            break;
            case 6:
                $order_by = 'position';
                $order_way = 'DESC';
            break;
            case 7:
                $order_by = 'id_st_bog';
                $order_way = 'ASC';
            break;
            case 8:
                $order_by = 'id_st_blog';
                $order_way = 'DESC';
            break;
            default:
            break;
        }
        
        $id_st_blog_array = array();
        if ($id_product > 0)
        {
            $result = Db::getInstance()->executeS('
            SELECT `id_st_blog` FROM '._DB_PREFIX_.'st_blog_product_link
            WHERE `id_product` = '.(int)$id_product.'
            ');
            foreach($result AS $value)
                $id_st_blog_array[] = $value['id_st_blog'];
        }
        elseif( $id_st_blog && Configuration::get($this->_prefix_st.'BY_TAG') )
		{
            $result = Db::getInstance()->executeS('
            SELECT DISTINCT `id_st_blog` 
            FROM '._DB_PREFIX_.'st_blog_tag_map tm 
            LEFT JOIN '._DB_PREFIX_.'st_blog_tag t
            ON t.`id_st_blog_tag`=tm.`id_st_blog_tag`
            WHERE `id_lang` = '.(int)$this->context->language->id.'
            AND `id_st_blog` != '.(int)$id_st_blog.' 
            AND `name` IN(
            SELECT `name` FROM '._DB_PREFIX_.'st_blog_tag t1 
            LEFT JOIN '._DB_PREFIX_.'st_blog_tag_map tm1 
            ON t1.`id_st_blog_tag` = tm1.`id_st_blog_tag` 
            WHERE id_st_blog = '.(int)$id_st_blog.')
            ');
            foreach($result AS $value)
                $id_st_blog_array[] = $value['id_st_blog'];
		}
        
        if ($id_st_blog)
        {
            $result = Db::getInstance()->executeS('
            SELECT `id_st_blog_2` FROM '._DB_PREFIX_.'st_blog_related_articles
            WHERE `id_st_blog_1` = '.(int)$id_st_blog.'
            ');
            
            foreach($result AS $value)
                $id_st_blog_array[] = $value['id_st_blog_2'];    
        }
        
        if (!count($id_st_blog_array))
            return false;
            
        $id_st_blog_array = array_unique($id_st_blog_array);
        
        include_once(_PS_MODULE_DIR_.'stblog/classes/StBlogClass.php');
        include_once(_PS_MODULE_DIR_.'stblog/classes/StBlogImageClass.php');
        
        $sql = new DbQuery();
		$sql->select(
			'b.*, st_blog_shop.*, bl.`content_short`, bl.`link_rewrite`, bl.`name`, bl.`video`'
		);

		$sql->from('st_blog', 'b');
		$sql->join(Shop::addSqlAssociation('st_blog', 'b'));
		$sql->leftJoin('st_blog_lang', 'bl', '
			b.`id_st_blog` = bl.`id_st_blog`
			AND bl.`id_lang` = '.(int)$this->context->language->id
		);
		$sql->where('st_blog_shop.`active` = 1 AND b.`id_st_blog` IN ('.implode(',', $id_st_blog_array).')');

		$sql->groupBy('st_blog_shop.`id_st_blog`');

		$sql->orderBy($order_by && $order_way ? 'b.'.$order_by.' '.$order_way : 'b.`date_add` DESC');
		$sql->limit($nbr);
        
		$result = Db::getInstance(_PS_USE_SQL_SLAVE_)->executeS($sql);

		if (!$result)
			return false;

		$articles = StBlogClass::getBlogsDetials((int)$this->context->language->id, $result);
        
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
			'blogs' => $articles,
            'imageSize' => StBlogImageClass::$imageTypeDef,
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
    public function hookDisplayStBlogRightColumn($params)
	{
        return $this->hookDisplayStBlogLeftColumn($params);
	}
	public function hookDisplayStBlogLeftColumn($params)
	{
        if(!(Tools::getValue('fc') == 'module' && Tools::getValue('module')=='stblog' && Dispatcher::getInstance()->getController() == 'article' 
            && ($id_st_blog = (int)Tools::getValue('id_blog'))))
                return false;
        if(!$this->_prepareHook(1))
            return false;
        $this->smarty->assign(array(
            'column_slider'         => true,
        ));
		return $this->display(__FILE__, 'stblogrelatedarticles.tpl');
	}
    public function hookDisplayLeftColumn($params)
	{
	    if(Dispatcher::getInstance()->getController() != 'product' || !($id_product = Tools::getValue('id_product')))
            return false;
        
        if(!$this->_prepareHook(1, $id_product))
                return false;

        $this->smarty->assign(array(
            'column_slider'         => true,
        ));
		return $this->display(__FILE__, 'stblogrelatedarticles.tpl'); 
	}
    public function hookDisplayRightColumn($params)
    {
        return $this->hookDisplayLeftColumn($params);
    }
    public function hookDisplayStBlogArticleFooter($params)
    {
        $module_name = Validate::isModuleName(Tools::getValue('module')) ? Tools::getValue('module') : '';
        if(!(Tools::getValue('fc') == 'module' && $module_name=='stblog' && Dispatcher::getInstance()->getController() == 'article' 
            && ($id_st_blog = (int)Tools::getValue('id_blog'))))
                return false;
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
		return $this->display(__FILE__, 'stblogrelatedarticles.tpl');
    }
    public function hookDisplayFooterProduct($params)
    {
        if(Dispatcher::getInstance()->getController() != 'product' || !($id_product = Tools::getValue('id_product')))
            return false;
        
        if(!$this->_prepareHook(1, $id_product))
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
        return $this->display(__FILE__, 'stblogrelatedarticles.tpl');    
    }
    public function hookDisplayProductSecondaryColumn($params)
	{
        return $this->hookDisplayLeftColumn($params);
	}
    /*public function hookProductTab($params)
	{
	   if(Dispatcher::getInstance()->getController() != 'product' || !($id_product = Tools::getValue('id_product')))
            return false;
    }
    public function hookProductTabContent($params)
	{
	   if(Dispatcher::getInstance()->getController() != 'product' || !($id_product = Tools::getValue('id_product')))
            return false;
    }*/
	public function hookActionObjectStBlogClassUpdateAfter($params)
	{        
        if (Tools::getValue('ajax') == 1)
            return false;
        if(!$id_st_blog = $params['object']->id)
            return false;
        
        StBlogRelatedArticlesClass::deleteRelatedArticles($id_st_blog);
		if ($related_articles = Tools::getValue('id_relatedarticles'))
		{
			$related_articles = array_unique($related_articles);
            if (in_array($id_st_blog, $related_articles))
                unset($related_articles[array_search($id_st_blog, $related_articles)]);
			if (count($related_articles))
				StBlogRelatedArticlesClass::saveRelatedArticles($id_st_blog, $related_articles);
		}    
		$this->_clearCache('stblogrelatedarticles.tpl');
        return ;
	}
    
    public function hookActionObjectStBlogClassAddAfter($params)
	{
	    $this->hookActionObjectStBlogClassUpdateAfter($params);
	}

	public function hookActionObjectStBlogClassDeleteAfter($params)
	{
	    if (Tools::getValue('ajax') == 1)
            return false;
        if(!$params['object']->id)
            StBlogRelatedArticlesClass::deleteRelatedArticles($params['object']->id);
		$this->_clearCache('stblogrelatedarticles.tpl');
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