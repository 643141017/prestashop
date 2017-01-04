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

include_once dirname(__FILE__).'/StPageBannerClass.php';
include_once dirname(__FILE__).'/StPageBannerFontClass.php';

class StPageBanner extends Module
{
    protected static $access_rights = 0775;
    public static $_type = array(
        1 => 'Category',
        //2 => 'Product',
        3 => 'CMS page',
        4 => 'Manufacturer',
        5 => 'Supplier',
        6 => 'Cms category',
        //7 => 'Icon',
        8 => 'Blog category',
        9 => 'Blog',
        10 => 'Page',
        11 => 'All',
        12 => 'Product',
    );
    public static $text_position = array(
        array('id' =>'center' , 'name' => 'Middle'),
        array('id' =>'bottom' , 'name' => 'Bottom'),
        array('id' =>'top' , 'name' => 'Top'),
    );
    public  $fields_list;
    public  $fields_value;
    public  $fields_form;
    public  $fields_form_banner;
	private $_html = '';
	private $spacer_size = '5';
    public $stblog_status = true;

    private $googleFonts;
        
	public function __construct()
	{
		$this->name          = 'stpagebanner';
		$this->tab           = 'front_office_features';
		$this->version       = '1.6.9';
		$this->author        = 'SUNNYTOO.COM';
		$this->need_instance = 0;
        $this->bootstrap     = true;

		parent::__construct();
        
        $this->googleFonts = include_once(dirname(__FILE__).'/googlefonts.php');
        
		$this->displayName   = $this->l('Page banner');
		$this->description   = $this->l('This module was made to add a banner for each page.');

        if(!Module::isInstalled('stblog') || !Module::isEnabled('stblog'))
            $this->stblog_status = false;
        if($this->stblog_status)
        {
            require_once (_PS_MODULE_DIR_.'stblog/classes/StBlogClass.php');
            require_once (_PS_MODULE_DIR_.'stblog/classes/StBlogCategory.php');
        }
	}
            
	public function install()
	{
		$res = parent::install() &&
			$this->installDB() &&
            $this->registerHook('displayHeader') &&
			$this->registerHook('displayAnywhere') &&
            $this->registerHook('actionObjectCategoryDeleteAfter') &&
            $this->registerHook('actionObjectCmsDeleteAfter') &&
            $this->registerHook('actionObjectSupplierDeleteAfter') &&
            $this->registerHook('actionObjectManufacturerDeleteAfter') &&
            $this->registerHook('actionShopDataDuplication') &&
            $this->registerHook('displayFullWidthTop');
 
        $this->clearBannerCache();
        return $res;
	}
	
	/**
	 * Creates tables
	 */
	public function installDB()
	{
		/* Banners */
		$return = (bool)Db::getInstance()->execute('
			CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'st_page_banner` (
				`id_st_page_banner` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
                `active` tinyint(1) unsigned NOT NULL DEFAULT 1, 
                `position` int(10) unsigned NOT NULL DEFAULT 0,
                `description_color` varchar(7) DEFAULT NULL,
                `hide_text_on_mobile` tinyint(1) unsigned NOT NULL DEFAULT 0,
                `text_position` varchar(32) DEFAULT NULL,
                `text_align` tinyint(1) unsigned NOT NULL DEFAULT 2,
                `id_shop` int(10) unsigned NOT NULL,      
                `item_k` tinyint(2) unsigned NOT NULL DEFAULT 0,  
                `item_v` varchar(255) DEFAULT NULL,  
                `hover_effect` tinyint(2) unsigned NOT NULL DEFAULT 0, 
                `hide_on_mobile` tinyint(1) unsigned NOT NULL DEFAULT 0,  
                `banner_height` int(10) unsigned NOT NULL DEFAULT 0,
                `btn_color` varchar(7) DEFAULT NULL,
                `btn_bg` varchar(7) DEFAULT NULL,
                `btn_hover_color` varchar(7) DEFAULT NULL,
                `btn_hover_bg` varchar(7) DEFAULT NULL,
				PRIMARY KEY (`id_st_page_banner`)
			) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8 ;');
		
		/* Banners lang configuration */
		$return &= Db::getInstance()->execute('
			CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'st_page_banner_lang` (
				`id_st_page_banner` int(10) UNSIGNED NOT NULL,
				`id_lang` int(10) unsigned NOT NULL ,
                `description` text,
                `image_multi_lang` varchar(255) DEFAULT NULL,
                `width` int(10) unsigned NOT NULL DEFAULT 0,
                `height` int(10) unsigned NOT NULL DEFAULT 0,
				PRIMARY KEY (`id_st_page_banner`, `id_lang`)
			) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8 ;');
            
        $return &= Db::getInstance()->execute('
            CREATE TABLE IF NOT EXISTS `'._DB_PREFIX_.'st_page_banner_font` (
                `id_st_page_banner` int(10) unsigned NOT NULL,
                `font_name` varchar(255) NOT NULL
            ) ENGINE='._MYSQL_ENGINE_.' DEFAULT CHARSET=utf8 ;');

		return $return;
	}
    
	public function uninstall()
	{
	    $this->clearBannerCache();
		// Delete configuration
		return $this->deleteTables() &&
			parent::uninstall();
	}

	/**
	 * deletes tables
	 */
	public function deleteTables()
	{
		return Db::getInstance()->execute('DROP TABLE IF EXISTS `'._DB_PREFIX_.'st_page_banner`,`'._DB_PREFIX_.'st_page_banner_lang`,`'._DB_PREFIX_.'st_page_banner_font`');
	}

    private function _checkImageDir()
    {
        $result = '';
        if (!file_exists(_PS_UPLOAD_DIR_.$this->name))
        {
            $success = @mkdir(_PS_UPLOAD_DIR_.$this->name, self::$access_rights, true)
						|| @chmod(_PS_UPLOAD_DIR_.$this->name, self::$access_rights);
            if(!$success)
                $this->_html .= $this->displayError('"'._PS_UPLOAD_DIR_.$this->name.'" '.$this->l('An error occurred during new folder creation'));
        }

        if (!is_writable(_PS_UPLOAD_DIR_))
            $this->_html .= $this->displayError('"'._PS_UPLOAD_DIR_.$this->name.'" '.$this->l('directory isn\'t writable.'));
        
        return $result;
    }

	public function getContent()
	{
        $check_result = $this->_checkImageDir();
        $this->context->controller->addCSS(($this->_path).'views/css/admin.css');
        $this->context->controller->addJS(($this->_path).'views/js/admin.js');
        
        $this->_html .= '<script type="text/javascript">var googleFontsString=\''.Tools::jsonEncode($this->googleFonts).'\';</script>';
        
        $id_st_page_banner = (int)Tools::getValue('id_st_page_banner');
	    
	    if ((Tools::isSubmit('bannerstatusstpagebanner')))
        {
            $banner = new StPageBannerClass((int)$id_st_page_banner);
            if($banner->id && $banner->toggleStatus())
            {
                //$this->_html .= $this->displayConfirmation($this->l('The status has been updated successfully.'));  
                $this->clearBannerCache();
			    Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));
            }
            else
                $this->_html .= $this->displayError($this->l('An error occurred while updating the status.'));
        }
		if (isset($_POST['savestpagebanner']) || isset($_POST['savestpagebannerAndStay']))
		{
            if ($id_st_page_banner)
				$banner = new StPageBannerClass((int)$id_st_page_banner);
			else
				$banner = new StPageBannerClass();
            /**/
            
            $error = array();

            $item = Tools::getValue('links');
            if($item)
            {
                $item_arr = explode('_',$item);
                if(count($item_arr)!=2)
                {
                    $this->_html .= $this->displayError($this->l('"Pages" error'));
                     return;
                }
                $banner->item_k = $item_arr[0];
                if ($banner->item_k == 12)
                    $banner->item_v = Tools::getValue('filter','0');
                else
                    $banner->item_v = $item_arr[1];
            }
            else
            {
                $error[] = $this->displayError($this->l('The field "Pages" is required'));
            }

            $banner->id_shop = (int)Shop::getContextShopID();
            
            $languages = Language::getLanguages(false);
            $default_lang = (int)Configuration::get('PS_LANG_DEFAULT');
            if (!Tools::isSubmit('has_image_'.$default_lang) && (!isset($_FILES['image_multi_lang_'.$default_lang]) || empty($_FILES['image_multi_lang_'.$default_lang]['tmp_name'])))
			{
                $defaultLanguage = new Language($default_lang);
			    $error[] = $this->displayError($this->l('Image is required at least in ').$defaultLanguage->name);
			}
            else
            {
			    $banner->copyFromPost();

                $res = $this->stUploadImage('image_multi_lang_'.$default_lang);
                if(count($res['error']))
                    $error = array_merge($error,$res['error']);
                elseif($res['image'])
                {
                    $banner->image_multi_lang[$default_lang] = $res['image'];
                    $banner->width[$default_lang] = $res['width'];
                    $banner->height[$default_lang] = $res['height'];
                }
                elseif(!Tools::isSubmit('has_image_'.$default_lang) && !$res['image'])
                {
                    $defaultLanguage = new Language($default_lang);
                    $error[] = $this->displayError($this->l('Image is required at least in ').$defaultLanguage->name);
                }
                
                if($banner->image_multi_lang[$default_lang])
                {
                    foreach ($languages as $lang)
                    {
                        if($lang['id_lang']==$default_lang)
                            continue;
                        $res = $this->stUploadImage('image_multi_lang_'.$lang['id_lang']);
                        if(count($res['error']))
                            $error = array_merge($error,$res['error']);
                        elseif($res['image'])
                        {
                            $banner->image_multi_lang[$lang['id_lang']] = $res['image'];
                            $banner->width[$lang['id_lang']] = $res['width'];
                            $banner->height[$lang['id_lang']] = $res['height'];
                        }
                        elseif(!Tools::isSubmit('has_image_'.$lang['id_lang']) && !$res['image'])
                        {
                            $banner->image_multi_lang[$lang['id_lang']] = $banner->image_multi_lang[$default_lang];
                            $banner->width[$lang['id_lang']] = $banner->width[$default_lang];
                            $banner->height[$lang['id_lang']] = $banner->height[$default_lang];
                        }
                    }
                }
            }
                        
			if (!count($error) && $banner->validateFields(false) && $banner->validateFieldsLang(false))
            {
                /*position*/
                $banner->position = $banner->checkPosition();
                if($banner->save())
                {
                    $jon = trim(Tools::getValue('google_font_name'),'¤');
                    StPageBannerFontClass::deleteBySlider($banner->id);
                    $jon_arr = array_unique(explode('¤', $jon));
                    if (count($jon_arr))
                        StPageBannerFontClass::changeSliderFont($banner->id, $jon_arr);

                    $this->clearBannerCache();
                    //$this->_html .= $this->displayConfirmation($this->l('Banner').' '.($id_st_page_banner ? $this->l('updated') : $this->l('added')));
			        if(isset($_POST['savestpagebannerAndStay']))
                        Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&id_st_page_banner='.$banner->id.'&conf='.($id_st_page_banner?4:3).'&update'.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));    
                    else
                        Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));
                }
                else
                    $this->_html .= $this->displayError($this->l('An error occurred during banner').' '.($id_st_page_banner ? $this->l('updating') : $this->l('creation')));
            }
            else
                $this->_html .= count($error) ? implode('',$error) : $this->displayError($this->l('Invalid value for field(s).'));
        }
        if(Tools::isSubmit('addstpagebanner') || (Tools::isSubmit('updatestpagebanner') && $id_st_page_banner))
        {
            $helper = $this->initForm();
            return $this->_html.$helper->generateForm($this->fields_form_banner);
        }
		else if (Tools::isSubmit('deletestpagebanner') && $id_st_page_banner)
		{
			$banner = new StPageBannerClass($id_st_page_banner);
            $banner->delete();
            $this->clearBannerCache();
			Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));
		}
		else
		{
			$helper = $this->initList();
			return $this->_html.$helper->generateList(StPageBannerClass::getAll(0, 0, (int)$this->context->language->id, 0), $this->fields_list);
		}
	}
     protected function stUploadImage($item)
    {
        $result = array(
            'error' => array(),
            'image' => '',
        );
        if (isset($_FILES[$item]) && isset($_FILES[$item]['tmp_name']) && !empty($_FILES[$item]['tmp_name']))
		{
			$type = strtolower(substr(strrchr($_FILES[$item]['name'], '.'), 1));
			$imagesize = array();
			$imagesize = @getimagesize($_FILES[$item]['tmp_name']);
			if (!empty($imagesize) &&
				in_array(strtolower(substr(strrchr($imagesize['mime'], '/'), 1)), array('jpg', 'gif', 'jpeg', 'png')) &&
				in_array($type, array('jpg', 'gif', 'jpeg', 'png')))
			{
				$this->_checkEnv();
				$temp_name = tempnam(_PS_TMP_IMG_DIR_, 'PS');
				$salt = sha1(microtime());
                $c_name = Tools::encrypt($_FILES[$item]['name'].$salt);
				if ($upload_error = ImageManager::validateUpload($_FILES[$item]))
					$result['error'][] = $upload_error;
				elseif (!$temp_name || !move_uploaded_file($_FILES[$item]['tmp_name'], $temp_name))
					$result['error'][] = $this->l('An error occurred during move image.');
				else{
				   $infos = getimagesize($temp_name);
                   if(!ImageManager::resize($temp_name, _PS_UPLOAD_DIR_.$this->name.'/'.$c_name.'.'.$type, null, null, $type))
				       $result['error'][] = $this->l('An error occurred during the image upload.');
				} 
				if (isset($temp_name))
					@unlink($temp_name);
                    
                if(!count($result['error']))
                {
                    $result['image'] = $this->name.'/'.$c_name.'.'.$type;
                    $result['width'] = $imagesize[0];
                    $result['height'] = $imagesize[1];
                }
                return $result;
			}
        }
        else
            return $result;
    }
    
    private function _checkEnv()
    {
        $file = _PS_UPLOAD_DIR_.'.htaccess';
        if (!file_exists($file))
            return true;
        if (!is_writeable($file))
            return false;
        $content = 'deny from all'."\r\n".'<Files ~ "(?i)^.*\.(jpg|jpeg|gif|png|bmp|tiff|svg|pdf)$">'."\r\n".'order deny,allow'."\r\n".'allow from all'."\r\n".'</Files>';
        return @file_put_contents($file, $content);
    }

    public function createLinks($icon=true)
    {
        $id_lang = $this->context->language->id;
        $category_arr = array();
        $this->getCategoryOption($category_arr, Category::getRootCategory()->id, (int)$id_lang, (int)Shop::getContextShopID(),true);
        
        $supplier_arr = array();
        $suppliers = Supplier::getSuppliers(false, $id_lang);
        foreach ($suppliers as $supplier)
            $supplier_arr[] = array('id'=>'5_'.$supplier['id_supplier'],'name'=>$supplier['name']);
            
        $manufacturer_arr = array();
        $manufacturers = Manufacturer::getManufacturers(false, $id_lang);
        foreach ($manufacturers as $manufacturer)
            $manufacturer_arr[] = array('id'=>'4_'.$manufacturer['id_manufacturer'],'name'=>$manufacturer['name']);
  
        $cms_arr = array();
        $this->getCMSOptions($cms_arr, 0, 1, $id_lang);
        
        $blog_category_arr = array();
        if($this->stblog_status)
        {
            $blog_categories = StBlogCategory::getCategories(0,$id_lang,true);
            $this->getBlogCategoryOption($blog_category_arr,$blog_categories);
        }
        
        $links = array(
            array('name'=>$this->l('Product'),'query'=>array(array('id'=>'12_0','name'=>$this->l('Product page')))),
            array('name'=>$this->l('Category'),'query'=>$category_arr),
            array('name'=>$this->l('Informations'),'query'=>$this->getInformationLinks()),
            array('name'=>$this->l('My account'),'query'=>$this->getMyAccountLinks()),
            array('name'=>$this->l('CMS'),'query'=>$cms_arr),
            array('name'=>$this->l('Supplier'),'query'=>$supplier_arr),
            array('name'=>$this->l('Manufacturer'),'query'=>$manufacturer_arr),
            array('name'=>$this->l('Blog'),'query'=>$blog_category_arr),
        );
        return $links;
    }
    
    public function createSubLinks()
    {
        $id_lang = $this->context->language->id;
        $category_arr = array();
        $this->getCategoryOption($category_arr, Category::getRootCategory()->id, (int)$id_lang, (int)Shop::getContextShopID(),true);
            
        $manufacturer_arr = array();
        $manufacturers = Manufacturer::getManufacturers(false, $id_lang);
        foreach ($manufacturers as $manufacturer)
            $manufacturer_arr[] = array('id'=>'4_'.$manufacturer['id_manufacturer'],'name'=>$manufacturer['name']);
  
        $cms_arr = array();
        $this->getCMSOptions($cms_arr, 0, 1, $id_lang);
        
        $links = array(
            array('name'=>$this->l('Category'),'query'=>$category_arr),
            array('name'=>$this->l('Manufacturer'),'query'=>$manufacturer_arr),
        );
        return $links;
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
        $category_arr[] = array('id'=>'1_'.(int)$category->id,'name'=>(isset($spacer) ? $spacer : '').$category->name.' ('.$shop->name.')');

        if (isset($children) && is_array($children) && count($children))
            foreach ($children as $child)
            {
                $this->getCategoryOption($category_arr, (int)$child['id_category'], (int)$id_lang, (int)$child['id_shop'],$recursive);
            }
    }
    private function getBlogCategoryOption(&$blog_category_arr, $blog_categories)
    {
        $module = new StPageBanner();
        foreach($blog_categories as $category)
        {
            $spacer = str_repeat('&nbsp;', $this->spacer_size * (int)$category['level_depth']);
            if($category['id_parent']==0 && $category['is_root_category'])
                $name = $module->l('Blog');
            else
                $name = $category['name'].$module->l(' (Category)');
                            
            $blog_category_arr[] = array('id'=>'8_'.(int)$category['id_st_blog_category'],'name'=>(isset($spacer) ? $spacer : '').$name);
            
            foreach($this->getBlogPage((int)$category['id_st_blog_category']) AS $blog)
            {
                $blog_category_arr[] = array('id'=>'9_'.(int)$blog['id_st_blog'],'name'=>(isset($spacer) ? $spacer.str_repeat('&nbsp;', $this->spacer_size) : '').$blog['name']);
            }
            
            if(isset($category['child']) && is_array($category['child']) && count($category['child']))
            {
                $this->getBlogCategoryOption($blog_category_arr, $category['child']);
            }
        }
    }
    private function getBlogPage($id_blog_category=0, $id_shop=false, $id_lang=false)
    {
        return StBlogClass::getCategoryBlogs($id_blog_category);
    }
    private function getCMSOptions(&$cms_arr, $parent = 0, $depth = 1, $id_lang = false)
    {
        $id_lang = $id_lang ? (int)$id_lang : (int)Context::getContext()->language->id;

        $categories = $this->getCMSCategories(false, (int)$parent, (int)$id_lang);
        $pages = $this->getCMSPages((int)$parent, false, (int)$id_lang);

        $spacer = str_repeat('&nbsp;', $this->spacer_size * (int)$depth);

        foreach ($categories as $category)
        {
            $cms_arr[] = array('id'=>'6_'.$category['id_cms_category'],'name'=>$spacer.$category['name']);
            $this->getCMSOptions($cms_arr, $category['id_cms_category'], (int)$depth + 1, (int)$id_lang);
        }

        foreach ($pages as $page)
            $cms_arr[] = array('id'=>'3_'.$page['id_cms'],'name'=>$spacer.$page['meta_title']);
    }

    private function getCMSCategories($recursive = false, $parent = 1, $id_lang = false)
    {
        $id_lang = $id_lang ? (int)$id_lang : (int)Context::getContext()->language->id;

        if ($recursive === false)
        {
            if(version_compare(_PS_VERSION_, '1.6.0.12', '>='))
                $sql = 'SELECT bcp.`id_cms_category`, bcp.`id_parent`, bcp.`level_depth`, bcp.`active`, bcp.`position`, cl.`name`, cl.`link_rewrite`
                FROM `'._DB_PREFIX_.'cms_category` bcp
                INNER JOIN `'._DB_PREFIX_.'cms_category_shop` cs
                ON (bcp.`id_cms_category` = cs.`id_cms_category`)
                INNER JOIN `'._DB_PREFIX_.'cms_category_lang` cl
                ON (bcp.`id_cms_category` = cl.`id_cms_category`)
                WHERE cl.`id_lang` = '.(int)$id_lang.'
                AND cs.`id_shop` = '.(int)$id_shop.'
                AND cl.`id_shop` = '.(int)$id_shop.'
                AND bcp.`id_parent` = '.(int)$parent;
            else
                $sql = 'SELECT bcp.`id_cms_category`, bcp.`id_parent`, bcp.`level_depth`, bcp.`active`, bcp.`position`, cl.`name`, cl.`link_rewrite`
                FROM `'._DB_PREFIX_.'cms_category` bcp
                INNER JOIN `'._DB_PREFIX_.'cms_category_lang` cl
                ON (bcp.`id_cms_category` = cl.`id_cms_category`)
                WHERE cl.`id_lang` = '.(int)$id_lang.'
                AND bcp.`id_parent` = '.(int)$parent;

            return Db::getInstance()->executeS($sql);
        }
        else
        {
            if(version_compare(_PS_VERSION_, '1.6.0.12', '>='))
                $sql = 'SELECT bcp.`id_cms_category`, bcp.`id_parent`, bcp.`level_depth`, bcp.`active`, bcp.`position`, cl.`name`, cl.`link_rewrite`
                FROM `'._DB_PREFIX_.'cms_category` bcp
                INNER JOIN `'._DB_PREFIX_.'cms_category_shop` cs
                ON (bcp.`id_cms_category` = cs.`id_cms_category`)
                INNER JOIN `'._DB_PREFIX_.'cms_category_lang` cl
                ON (bcp.`id_cms_category` = cl.`id_cms_category`)
                WHERE cl.`id_lang` = '.(int)$id_lang.'
                AND cs.`id_shop` = '.(int)$id_shop.'
                AND cl.`id_shop` = '.(int)$id_shop.'
                AND bcp.`id_parent` = '.(int)$parent;
            else
                $sql = 'SELECT bcp.`id_cms_category`, bcp.`id_parent`, bcp.`level_depth`, bcp.`active`, bcp.`position`, cl.`name`, cl.`link_rewrite`
                FROM `'._DB_PREFIX_.'cms_category` bcp
                INNER JOIN `'._DB_PREFIX_.'cms_category_lang` cl
                ON (bcp.`id_cms_category` = cl.`id_cms_category`)
                WHERE cl.`id_lang` = '.(int)$id_lang.'
                AND bcp.`id_parent` = '.(int)$parent;

            $results = Db::getInstance()->executeS($sql);
            foreach ($results as $result)
            {
                $sub_categories = $this->getCMSCategories(true, $result['id_cms_category'], (int)$id_lang);
                if ($sub_categories && count($sub_categories) > 0)
                    $result['sub_categories'] = $sub_categories;
                $categories[] = $result;
            }

            return isset($categories) ? $categories : false;
        }

    }

    private function getCMSPages($id_cms_category, $id_shop = false, $id_lang = false)
    {
        $id_shop = ($id_shop !== false) ? (int)$id_shop : (int)Context::getContext()->shop->id;
        $id_lang = $id_lang ? (int)$id_lang : (int)Context::getContext()->language->id;

        $sql = 'SELECT c.`id_cms`, cl.`meta_title`, cl.`link_rewrite`
            FROM `'._DB_PREFIX_.'cms` c
            INNER JOIN `'._DB_PREFIX_.'cms_shop` cs
            ON (c.`id_cms` = cs.`id_cms`)
            INNER JOIN `'._DB_PREFIX_.'cms_lang` cl
            ON (c.`id_cms` = cl.`id_cms`)
            WHERE c.`id_cms_category` = '.(int)$id_cms_category.'
            AND cs.`id_shop` = '.(int)$id_shop.
            (version_compare(_PS_VERSION_, '1.6.0.12', '>=') ? ' AND cl.`id_shop` = '.(int)$id_shop : '' ).' 
            AND cl.`id_lang` = '.(int)$id_lang.'
            AND c.`active` = 1
            ORDER BY `position`';

        return Db::getInstance()->executeS($sql);
    }

	protected function initForm()
	{        
        $id_st_page_banner = (int)Tools::getValue('id_st_page_banner');
        $banner = new StPageBannerClass($id_st_page_banner);
        
        $google_font_name_html = $google_font_name =  $google_font_link = '';
        if(Validate::isLoadedObject($banner)){
            $jon_arr = StPageBannerFontClass::getBySlider($banner->id);
            if(is_array($jon_arr) && count($jon_arr))
                foreach ($jon_arr as $key => $value) {
                    $google_font_name_html .= '<li id="#'.str_replace(' ', '_', strtolower($value['font_name'])).'_li" class="form-control-static"><button type="button" class="delGoogleFont btn btn-default" name="'.$value['font_name'].'"><i class="icon-remove text-danger"></i></button>&nbsp;<span style="'.$this->fontstyles($value['font_name']).'">style="'.$this->fontstyles($value['font_name']).'"</span></li>';

                    $google_font_name .= $value['font_name'].'¤';

                    $google_font_link .= '<link id="'.str_replace(' ', '_', strtolower($value['font_name'])).'_link" rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family='.str_replace(' ', '+', $value['font_name']).'" />';
                }
        }

		$this->fields_form_banner[0]['form'] = array(
			'legend' => array(
				'title' => $this->l('Page banner'),
                'icon' => 'icon-cogs'
			),
			'input' => array(
                'links' => array(
                    'type' => 'select',
                    'label' => $this->l('Page:'),
                    'name' => 'links',
                    'class' => 'fixed-width-xxl',
                    'required' => true,
                    'options' => array(
                        'optiongroup' => array (
                            'query' => $this->createLinks(),
                            'label' => 'name'
                        ),
                        'options' => array (
                            'query' => 'query',
                            'id' => 'id',
                            'name' => 'name'
                        ),
                        'default' => array(
                            'value' => '11_1',
                            'label' => $this->l('All'),
                        ),
                    )
                ),
                array(
					'type' => 'select',
        			'label' => $this->l('Specify a category or a manufacturer:'),
        			'name' => 'filter',
                    'options' => array(
                        'optiongroup' => array (
							'query' => $this->createSubLinks(),
							'label' => 'name'
						),
						'options' => array (
							'query' => 'query',
							'id' => 'id',
							'name' => 'name'
						),
						'default' => array(
							'value' => '0',
							'label' => $this->l('All')
						),
        			),
                    'desc' => $this->l('Only for prodcut page.'),
				),
                array(
                    'type' => 'text',
                    'label' => $this->l('Height:'),
                    'name' => 'banner_height',
                    'default_value' => 200,
                    'required' => true,
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                    'desc' => array(
                            $this->l('The value of this field is userd to equal the height of banners.'),
                            $this->l('If you do not know how to get the value, just set it to 0.'),
                        ),
                ),
                array(
                    'type' => 'radio',
                    'label' => $this->l('Hover effect:'),
                    'name' => 'hover_effect',
                    'default_value' => 0,
                    'values' => array(
                        array(
                            'id' => 'hover_effect_0',
                            'value' => 0,
                            'label' => $this->l('None')
                        ),
                        array(
                            'id' => 'hover_effect_1',
                            'value' => 1,
                            'label' => $this->l('Fade & scale')
                        ),
                        array(
                            'id' => 'hover_effect_2',
                            'value' => 2,
                            'label' => $this->l('White line')
                        ),
                        array(
                            'id' => 'hover_effect_3',
                            'value' => 3,
                            'label' => $this->l('White block')
                        ),
                        array(
                            'id' => 'hover_effect_4',
                            'value' => 4,
                            'label' => $this->l('Fade')
                        ),
                    ),
                ),
                array(
                    'type' => 'switch',
                    'label' => $this->l('Hide on mobile:'),
                    'name' => 'hide_on_mobile',
                    'default_value' => 0,
                    'is_bool' => true,
                    'values' => array(
                        array(
                            'id' => 'hide_on_mobile_on',
                            'value' => 1,
                            'label' => $this->l('Yes')),
                        array(
                            'id' => 'hide_on_mobile_off',
                            'value' => 0,
                            'label' => $this->l('No')),
                    ),
                    'desc' => $this->l('Screen width less than 768px.'),
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
        $this->fields_form_banner[1]['form'] = array(
            'legend' => array(
                'title' => $this->l('Add caption'),
                'icon'  => 'icon-cogs'
            ),
            'input' => array(
                 array(
                    'type' => 'textarea',
                    'label' => $this->l('Caption:'),
                    'lang' => true,
                    'name' => 'description',
                    'cols' => 40,
                    'rows' => 10,
                    'autoload_rte' => true,
                    'desc' => '<p>Format your entry with some basic HTML. Click <span style="color:#ff8230;">Flash</span> button to use predefined templates.</p>
                    <strong>Headings</strong>
                    <p>Headings are defined with the &lt;h1&gt; to &lt;h6&gt; tags.</p>
                    <ul>
                        <li>&lt;h2&gt;Big Heading 1&lt;/h2&gt;</li>
                        <li>&lt;h5&gt;Samll Heading 1&lt;/h5&gt;</li>
                    </ul>
                    <strong>Buttons</strong>
                    <p>You can click the <span style="color:#ff8230;">Flash</span> button in the toolbar of text editor to add buttons.</p>
                    <ul>
                        <li>&lt;a href="#" class="btn btn-small"&gt;Small Button&lt;/a&gt;</li>
                        <li>&lt;a href="#" class="btn btn-default"&gt;Button&lt;/a&gt;</li>
                        <li>&lt;a href="#" class="btn btn-medium"&gt;Medium Button&lt;/a&gt;</li>
                        <li>&lt;a href="#" class="btn btn-large"&gt;Large Button&lt;/a&gt;</li>
                    </ul>
                    <strong>Usefull class names</strong>
                    <ul>
                    <li>closer: &lt;h2 class="closer"&gt;Sample&lt;/h2&gt;</li>
                    <li>spacer: &lt;div class="spacer"&gt;Sample&lt;/div&gt;</li>
                    <li>width_50 to width_90: &lt;div class="width_70"&gt;Sample&lt;/div&gt;</li>
                    <li>center_width_50 to center_width_90: &lt;div class="center_width_80"&gt;Sample&lt;/div&gt;</li>
                    <li>fs_sm fs_md fs_lg fs_xl fs_xxl fs_xxxl fs_xxxxl: &lt;p class="fs_lg"&gt;Sample&lt;/p&gt;</li>
                    <li>icon_line: &lt;div class="icon_line_wrap"&gt;&lt;div class="icon_line"&gt;Sample&lt;/div&gt;&lt;/div&gt;</li>
                    <li>line, line_white, line_black: &lt;p class="line_white"&gt;Sample&lt;/p&gt;</li>
                    <li>&lt;p class="uppercase"&gt;SAMPLE&lt;/p&gt;</li>
                    <li>color_000,color_333,color_444,color_666,color_999,color_ccc,color_fff: <span style="color:#999">&lt;p class="color_999"&gt;Sample&lt;/p&gt;</span></li>
                    </ul>
                    <div class="alert alert-info"><a href="javascript:;" onclick="$(\'#how_to_use_gf\').toggle();return false;">'.$this->l('How to use google fonts? Click here.').'</a>'.
                        '<div id="how_to_use_gf" style="display:none;"><img src="'.$this->_path.'views/img/how_to_use_gf.jpg" /></div></div>',
                ),
                array(
                    'type' => 'select',
                    'label' => $this->l('Google fonts:'),
                    'name' => 'google_font_select',
                    'onchange' => 'handle_font_change(this);',
                    'class' => 'fontOptions',
                    'options' => array(
                        'query' => $this->fontOptions(),
                        'id' => 'id',
                        'name' => 'name',
                        'default' => array(
                            'value' => 0,
                            'label' => $this->l('Use default'),
                        ),
                    ),
                ),
                'font_text'=>array(
                    'type' => 'select',
                    'label' => $this->l('Font weight:'),
                    'onchange' => 'handle_font_style(this);',
                    'class' => 'fontOptions',
                    'name' => 'google_font_weight',
                    'options' => array(
                        'query' => array(),
                        'id' => 'id',
                        'name' => 'name',
                    ),
                    'validation' => 'isAnything',
                    'desc' => '<p>'.$this->l('Once a font has been added, you can use it everywhere without adding it again.').'</p><a id="add_google_font" class="btn btn-default btn-block fixed-width-md" href="javascript:;">Add</a><br/><p id="google_font_example" class="fontshow">Example Title</p><ul id="curr_google_font_name">'.$google_font_name_html.'</ul>'.$google_font_link,
                ),
                array(
                    'type' => 'hidden',
                    'name' => 'google_font_name',
                    'default_value' => '',
                ),
                array(
                    'type' => 'color',
                    'label' => $this->l('Caption color:'),
                    'name' => 'description_color',
                    'size' => 33,
                ),
                array(
                    'type' => 'select',
                    'label' => $this->l('Position:'),
                    'name' => 'text_position',
                    'options' => array(
                        'query' => self::$text_position,
                        'id' => 'id',
                        'name' => 'name',
                    ),
                ), 
                array(
                    'type' => 'switch',
                    'label' => $this->l('Hide caption on mobile:'),
                    'name' => 'hide_text_on_mobile',
                    'default_value' => 0,
                    'is_bool' => true,
                    'values' => array(
                        array(
                            'id' => 'hide_text_on_mobile_on',
                            'value' => 1,
                            'label' => $this->l('Yes')),
                        array(
                            'id' => 'hide_text_on_mobile_off',
                            'value' => 0,
                            'label' => $this->l('No')),
                    ),
                    'desc' => $this->l('Screen width less than 768px.'),
                ),
                array(
                    'type' => 'radio',
                    'label' => $this->l('Alignment:'),
                    'name' => 'text_align',
                    'default_value' => 2,
                    'values' => array(
                        array(
                            'id' => 'text_align_left',
                            'value' => 1,
                            'label' => $this->l('Left')),
                        array(
                            'id' => 'text_align_center',
                            'value' => 2,
                            'label' => $this->l('Center')),
                        array(
                            'id' => 'text_align_right',
                            'value' => 3,
                            'label' => $this->l('Right')),
                    ),
                ),
                array(
                    'type' => 'color',
                    'label' => $this->l('Button color:'),
                    'name' => 'btn_color',
                    'size' => 33,
                ),
                array(
                    'type' => 'color',
                    'label' => $this->l('Button background color:'),
                    'name' => 'btn_bg',
                    'size' => 33,
                ),
                array(
                    'type' => 'color',
                    'label' => $this->l('Button hover color:'),
                    'name' => 'btn_hover_color',
                    'size' => 33,
                ),
                array(
                    'type' => 'color',
                    'label' => $this->l('Button hover background color:'),
                    'name' => 'btn_hover_bg',
                    'size' => 33,
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

        $languages = Language::getLanguages(true);            
        $default_lang = (int)Configuration::get('PS_LANG_DEFAULT');
        foreach ($languages as $lang)
        {
            $this->fields_form_banner[0]['form']['input']['image_multi_lang_'.$lang['id_lang']] = array(
                    'type' => 'file',
					'label' => $this->l('Image').' - '.$lang['name'].($default_lang == $lang['id_lang'] ? '('.$this->l('default language').')' : '').':',
					'name' => 'image_multi_lang_'.$lang['id_lang'],
                    'required'  => ($default_lang == $lang['id_lang']),
                );
        }
        if($banner->id)
        {
            $this->fields_form_banner[0]['form']['input'][] = array('type' => 'hidden', 'name' => 'id_st_page_banner');
             foreach ($languages as $lang)
                if($banner->image_multi_lang[$lang['id_lang']])
                {
                    StPageBannerClass::fetchMediaServer($banner->image_multi_lang[$lang['id_lang']]);
                    $this->fields_form_banner[0]['form']['input'][] = array('type' => 'hidden', 'name' => 'has_image_'.$lang['id_lang'], 'default_value'=>1);
                    $this->fields_form_banner[0]['form']['input']['image_multi_lang_'.$lang['id_lang']]['required'] = false;
                    $this->fields_form_banner[0]['form']['input']['image_multi_lang_'.$lang['id_lang']]['image'] = '<img src="'.$banner->image_multi_lang[$lang['id_lang']].'" width="200"/>';
                }
        }
            
        $this->fields_form_banner[0]['form']['input'][] = array(
			'type' => 'html',
            'id' => 'a_cancel_0',
			'label' => '',
			'name' => '<a class="btn btn-default btn-block fixed-width-md" href="'.AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'"><i class="icon-arrow-left"></i> Back to list</a>',                  
		);
        
        $this->fields_form_banner[1]['form']['input'][] = array(
			'type' => 'html',
            'id' => 'a_cancel_1',
			'label' => '',
			'name' => '<a class="btn btn-default btn-block fixed-width-md" href="'.AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'"><i class="icon-arrow-left"></i> Back to list</a>',                  
		);
        
        $helper = new HelperForm();
		$helper->show_toolbar = false;
        $helper->module = $this;
		$helper->table =  $this->table;
		$lang = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
		$helper->default_form_language = $lang->id;
		$helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ? Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;

		$helper->identifier = $this->identifier;
		$helper->submit_action = 'savestpagebanner';
		$helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		$helper->tpl_vars = array(
			'fields_value' => $this->getFieldsValueSt($banner,"fields_form_banner"),
			'languages' => $this->context->controller->getLanguages(),
			'id_language' => $this->context->language->id
		);        

        $helper->tpl_vars['fields_value']['google_font_name'] = $google_font_name;
        if(Validate::isLoadedObject($banner))
        {
            if ($banner->item_k == 12)
            {
                $helper->tpl_vars['fields_value']['links'] = $banner->item_k.'_0';
                $helper->tpl_vars['fields_value']['filter'] = $banner->item_v;
            }
            else
                $helper->tpl_vars['fields_value']['links'] = $banner->item_k.'_'.$banner->item_v;
        }

		return $helper;
	}

    public function getMyAccountLinks()
    {
        return array(
            'my-account' => array('id'=>'10_my-account', 'name'=>$this->l('My account'), 'title'=>$this->l('Manage my customer account')),
            'order-follow' => array('id'=>'10_history', 'name'=>$this->l('My orders'), 'title'=>$this->l('My orders')),
            'order-follow' => array('id'=>'10_order-follow', 'name'=>$this->l('My merchandise returns'), 'title'=>$this->l('My returns')),
            'order-slip' => array('id'=>'10_order-slip', 'name'=>$this->l('My credit slips'), 'title'=>$this->l('My credit slips')),
            'addresses' => array('id'=>'10_addresses', 'name'=>$this->l('My addresses'), 'title'=>$this->l('My addresses')),
            'identity' => array('id'=>'10_identity', 'name'=>$this->l('My personal info'), 'title'=>$this->l('Manage my personal information')),
            'discount' => array('id'=>'10_discount', 'name'=>$this->l('My vouchers'), 'title'=>$this->l('My vouchers')),
        );
    }
    
    public function getInformationLinks()
    {
        return array(
            'prices-drop' => array('id'=>'10_prices-drop', 'name'=>$this->l('Specials'), 'title'=>$this->l('Specials')),
            'new-products' => array('id'=>'10_new-products', 'name'=>$this->l('New products'), 'title'=>$this->l('New products')),
            'best-sales' => array('id'=>'10_best-sales', 'name'=>$this->l('Top sellers'), 'title'=>$this->l('Top sellers')),
            'stores' => array('id'=>'10_stores', 'name'=>$this->l('Our stores'), 'title'=>$this->l('Our stores')),
            'contact' => array('id'=>'10_contact', 'name'=>$this->l('Contact us'), 'title'=>$this->l('Contact us')),
            'sitemap' => array('id'=>'10_sitemap', 'name'=>$this->l('Sitemap'), 'title'=>$this->l('Sitemap')),
            'manufacturer' => array('id'=>'10_manufacturer', 'name'=>$this->l('Manufacturers'), 'title'=>$this->l('Manufacturers')),
            'supplier' => array('id'=>'10_supplier', 'name'=>$this->l('Suppliers'), 'title'=>$this->l('Suppliers')),
        );
    }

    public static function showBannerImage($value,$row)
    {
        return $value ? '<img src="'.$value.'" width="200" />' : '-';
    }


    public static function displayType($value, $row)
    {
        return self::$_type[$value];
    }


    public static function displayTitle($value, $row)
    {
        $id_lang = (int)Context::getContext()->language->id;
        $id_shop = (int)Shop::getContextShopID();
        
        switch($row['item_k'])
        {
            case 0:
                $module = new StPageBanner(); 
                return $module->l('All');
            break;
            case 1:
                $category = new Category((int)$row['item_v'],$id_lang);
                if(Validate::isLoadedObject($category))
                    return $category->name;
            break;
            case 3:
                $cms = CMS::getLinks((int)$id_lang, array((int)$row['item_v']));
                if (count($cms))
                    return $cms[0]['meta_title'];
            break;
            case 4:
                $manufacturer = new Manufacturer((int)$row['item_v'], (int)$id_lang);
                if ($manufacturer->id)
                    return $manufacturer->name;
            break;
            case 5:
                $supplier = new Supplier((int)$row['item_v'], (int)$id_lang);
                if ($supplier->id)
                    return $supplier->name;
            break;
            case 6:
                $category = new CMSCategory((int)$row['item_v'], (int)$id_lang);
                if ($category->id)
                    return $category->name;
            break;
            case 8:
                if(Module::isInstalled('stblog') && Module::isEnabled('stblog'))
                {
                    $category = new StBlogCategory((int)$row['item_v'],$id_lang);
                    if(Validate::isLoadedObject($category))
                        if ($category->is_root_category)
                        {
                            $module = new StPageBanner();
                            return $module->l('Blog');
                        }
                        else
                            return $category->name;
                }
            break;
            case 9:
                if(Module::isInstalled('stblog') && Module::isEnabled('stblog'))
                {
                    $rs = StBlogClass::getBlogInfo((int)$row['item_v'], 'name');
                    return $rs['name'];
                }          
            break;
            case 10:
                $module = new StPageBanner(); 
                $information = $module->getInformationLinks();
                $myAccount = $module->getMyAccountLinks();  
                
                if(array_key_exists($row['item_v'],$information))
                    return $information[$row['item_v']]['name'];
                if(array_key_exists($row['item_v'],$myAccount))
                    return $myAccount[$row['item_v']]['name'];
            break;
            case 12:
                $module = new StPageBanner();
                if (strpos($row['item_v'],'_'))
                {
                    list($type, $id) = explode('_', $row['item_v']);
                    if ($type && $id)
                    {
                        if ($type == 1)
                        {
                            $category = new Category((int)$id,$id_lang);
                            if(Validate::isLoadedObject($category))
                                return $category->name.'('.$module->l('Category').')';
                        }
                        if ($type == 4)
                        {
                            $manufacturer = new Manufacturer((int)$id, (int)$id_lang);
                            if ($manufacturer->id)
                                return $manufacturer->name.'('.$module->l('Manufacturer').')';
                        }
                    }    
                }
                return $module->l('All');
            break;
        }
        return false;
    }

	protected function initList()
	{
		$this->fields_list = array(
			'id_st_page_banner' => array(
				'title' => $this->l('Id'),
				'class' => 'fixed-width-md',
				'type' => 'text',
                'search' => false,
                'orderby' => false
			),
            'item_k' => array(
                'title' => $this->l('Type'),
                'type' => 'text',
                'callback' => 'displayType',
                'callback_object' => 'StPageBanner',
                'search' => false,
                'orderby' => false,
                'class' => 'fixed-width-xl'
            ),
            'item_v' => array(
                'title' => $this->l('Page'),
                'type' => 'text',
                'callback' => 'displayTitle',
                'callback_object' => 'StPageBanner',
                'search' => false,
                'orderby' => false,
                'class' => 'fixed-width-xl',
            ),
            'image_multi_lang' => array(
				'title' => $this->l('Image'),
				'type' => 'text',
				'callback' => 'showBannerImage',
				'callback_object' => 'StPageBanner',
                'class' => 'fixed-width-xxl',
                'search' => false,
                'orderby' => false
            ),
            'active' => array(
                'title' => $this->l('Status'),
                'align' => 'center',
                'active' => 'bannerstatus',
                'type' => 'bool',
                'class' => 'fixed-width-xl',
                'search' => false,
                'orderby' => false 
            ),
		);

		$helper = new HelperList();
		$helper->shopLinkType = '';
		$helper->simple_header = false;
		$helper->identifier = 'id_st_page_banner';
		$helper->actions = array('edit', 'delete');
		$helper->show_toolbar = true;
		$helper->imageType = 'jpg';
		$helper->toolbar_btn['new'] =  array(
			'href' => AdminController::$currentIndex.'&configure='.$this->name.'&addstpagebanner&token='.Tools::getAdminTokenLite('AdminModules'),
			'desc' => $this->l('Add')
		);


        $helper->title = $this->l('Page banner');
		$helper->table = $this->name;
		$helper->orderBy = 'position';
		$helper->orderWay = 'ASC';
	    $helper->position_identifier = 'id_st_page_banner';
        
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		$helper->currentIndex = AdminController::$currentIndex.'&configure='.$this->name;
		return $helper;
	}
    private function _prepareHook($identify,$type=1)
    {
        $banners = StPageBannerClass::getAll($identify, $type, $this->context->language->id, 1);
        if(!is_array($banners) || !count($banners))
               return false;

	    $this->smarty->assign(array(
            'banners' => $banners,
        ));
        return true;
    }
    public function hookDisplayHeader($params)
    {
        // $this->context->controller->addCSS(($this->_path).'views/css/stpagebanner.css');
        
        $data = StPageBannerFontClass::getAll(1);
        if(is_array($data) && count($data))
        {
            $slide_font = array();
            foreach ($data as $value) {
                $slide_font[] = $value['font_name'];
            }

            $slide_font = array_unique($slide_font); 
            $font_latin_support = Configuration::get('STSN_FONT_LATIN_SUPPORT');
            $font_cyrillic_support = Configuration::get('STSN_FONT_CYRILLIC_SUPPORT');
            $font_vietnamese = Configuration::get('STSN_FONT_VIETNAMESE');
            $font_greek_support = Configuration::get('STSN_FONT_GREEK_SUPPORT');
            $font_support = ($font_latin_support || $font_cyrillic_support || $font_vietnamese || $font_greek_support) ? '&subset=' : '';
            $font_latin_support && $font_support .= 'latin,latin-ext,';
            $font_cyrillic_support && $font_support .= 'cyrillic,cyrillic-ext,';
            $font_vietnamese && $font_support .= 'vietnamese,';
            $font_greek_support && $font_support .= 'greek,greek-ext,';
            if(is_array($slide_font) && count($slide_font))
                foreach($slide_font as $x)
                {
                    if(!$x)
                        continue;
                    $this->context->controller->addCSS($this->context->link->protocol_content."fonts.googleapis.com/css?family=".str_replace(' ', '+', $x).($font_support ? rtrim($font_support,',') : ''));
                }
        }     

        if (!$this->isCached('header.tpl', $this->getCacheId()))
        {
            $custom_css_arr = StPageBannerClass::getCustomCss();
            if (is_array($custom_css_arr) && count($custom_css_arr)) {
                $custom_css = '';
                foreach ($custom_css_arr as $v) {
                    $classname = '.st_page_banner_block_'.$v['id_st_page_banner'].' ';

                    $v['description_color'] && $custom_css .= $classname.'.style_content,
                    a'.$classname.', 
                    '.$classname.'.style_content a{color:'.$v['description_color'].';}
                    '.$classname.'.icon_line:after, '.$classname.'.icon_line:before{background-color:'.$v['description_color'].';}
                    '.$classname.'.line, '.$classname.'.btn{border-color:'.$v['description_color'].';}';

                    if($v['btn_color'])
                        $custom_css .= $classname.'.style_content .btn{color:'.$v['btn_color'].';}';
                    if($v['btn_color'] && !$v['btn_bg'])
                        $custom_css .= $classname.'.style_content .btn{border-color:'.$v['btn_color'].';}';
                    if($v['btn_bg'])
                        $custom_css .= $classname.'.style_content .btn{background-color:'.$v['btn_bg'].';border-color:'.$v['btn_bg'].';}';
                    if($v['btn_hover_color'])
                        $custom_css .= $classname.'.style_content .btn:hover{color:'.$v['btn_hover_color'].';}';
                    if ($v['btn_hover_bg']) {
                        $custom_css .= $classname.'.style_content .btn:hover{border-color:'.$v['btn_hover_bg'].';}';
                        $btn_fill_animation = (int)Configuration::get('STSN_BTN_FILL_ANIMATION');
                        switch ($btn_fill_animation) {
                            case 1:
                                $custom_css .= $classname.'.style_content .btn:hover{-webkit-box-shadow: inset 0 100px 0 0 '.$v['btn_hover_bg'].'; box-shadow: inset 0 100px 0 0 '.$v['btn_hover_bg'].';background-color:transparent;}';
                                break;
                            case 2:
                                $custom_css .= $classname.'.style_content .btn:hover{-webkit-box-shadow: inset 0 -100px 0 0 '.$v['btn_hover_bg'].'; box-shadow: inset 0 -100px 0 0 '.$v['btn_hover_bg'].';background-color:transparent;}';
                                break;
                            case 3:
                                $custom_css .= $classname.'.style_content .btn:hover{-webkit-box-shadow: inset 300px 0 0 0 '.$v['btn_hover_bg'].'; box-shadow: inset 300px 0 0 0 '.$v['btn_hover_bg'].';background-color:transparent;}';
                                break;
                            case 4:
                                $custom_css .= $classname.'.style_content .btn:hover{-webkit-box-shadow: inset -300px 0 0 0 '.$v['btn_hover_bg'].'; box-shadow: inset -300px 0 0 0 '.$v['btn_hover_bg'].';background-color:transparent;}';
                                break;
                            default:
                                $custom_css .= $classname.'.style_content .btn:hover{-webkit-box-shadow: none; box-shadow: none;background-color: '.$v['btn_hover_bg'].';}';
                                break;
                        }
                    }
                }
                if($custom_css)
                    $this->smarty->assign('custom_css', preg_replace('/\s\s+/', ' ', $custom_css));
            }
        }
        return $this->display(__FILE__, 'header.tpl', $this->getCacheId());
    }
    public function hookDisplayFullWidthTop($params)
    {
        $page_name = Context::getContext()->smarty->getTemplateVars('page_name');

        $information = $this->getInformationLinks();
        $myAccount = $this->getMyAccountLinks();  
        
        $res = '';
        if($page_name =='product' )
        {
            if($id = (int)Tools::getValue('id_product'))
            {
                if ($this->isCached('stpagebanner.tpl', $this->stGetCacheId($id,12)) || $this->_prepareHook($id,12))
                    $res = $this->display(__FILE__, 'stpagebanner.tpl', $this->stGetCacheId($id,12));
            }
        }
        elseif($page_name =='category' )
        {
            if($id = (int)Tools::getValue('id_category'))
            {
                if ($this->isCached('stpagebanner.tpl', $this->stGetCacheId($id,1)) || $this->_prepareHook($id,1))
                    $res = $this->display(__FILE__, 'stpagebanner.tpl', $this->stGetCacheId($id,1));
            }
        }
        elseif($page_name=='manufacturer')
        {
            if($id = (int)Tools::getValue('id_manufacturer'))
            {
                if ($this->isCached('stpagebanner.tpl', $this->stGetCacheId($id,4)) || $this->_prepareHook($id,4))
                    $res = $this->display(__FILE__, 'stpagebanner.tpl', $this->stGetCacheId($id,4));
            }
        }
        elseif($page_name=='supplier')
        {
            if($id = (int)Tools::getValue('id_supplier'))
            {
                if ($this->isCached('stpagebanner.tpl', $this->stGetCacheId($id,5)) || $this->_prepareHook($id,5))
                    $res = $this->display(__FILE__, 'stpagebanner.tpl', $this->stGetCacheId($id,5));
            }
        }
        elseif($page_name=='cms')
        {
            if ($id = (int)Tools::getValue('id_cms'))
            {
                if ($this->isCached('stpagebanner.tpl', $this->stGetCacheId($id,3)) || $this->_prepareHook($id,3))
                    $res = $this->display(__FILE__, 'stpagebanner.tpl', $this->stGetCacheId($id,3));
            }
            else if ($id = (int)Tools::getValue('id_cms_category'))
            {
                if ($this->isCached('stpagebanner.tpl', $this->stGetCacheId($id,6)) || $this->_prepareHook($id,6))
                    $res = $this->display(__FILE__, 'stpagebanner.tpl', $this->stGetCacheId($id,6));
            }
        }
        elseif($page_name=='module-stblog-category')
        {
            if($id = (int)Tools::getValue('blog_id_category'))
            {
                if ($this->isCached('stpagebanner.tpl', $this->stGetCacheId($id,8)) || $this->_prepareHook($id,8))
                    $res = $this->display(__FILE__, 'stpagebanner.tpl', $this->stGetCacheId($id,8));
            }
        }
        elseif($page_name=='module-stblog-article')
        {
            if($id = (int)Tools::getValue('id_blog'))
            {
                if ($this->isCached('stpagebanner.tpl', $this->stGetCacheId($id,9)) || $this->_prepareHook($id,9))
                    $res = $this->display(__FILE__, 'stpagebanner.tpl', $this->stGetCacheId($id,9));
            }
        }
        elseif(array_key_exists($page_name,$information) || array_key_exists($page_name,$myAccount))
        {
            if ($this->isCached('stpagebanner.tpl', $this->stGetCacheId($page_name,10)) || $this->_prepareHook($page_name,10))
                $res = $this->display(__FILE__, 'stpagebanner.tpl', $this->stGetCacheId($page_name,10));
        }
        if(!$res && $page_name != 'index' && $page_name != 'pagenotfound' && $page_name != 'module-stblog-default')
        {
            if ($this->isCached('stpagebanner.tpl', $this->stGetCacheId(1, 11)) || $this->_prepareHook(1, 11))
                $res = $this->display(__FILE__, 'stpagebanner.tpl', $this->stGetCacheId(1, 11));
        }
        return $res ? $res : false;
    }
	public function hookDisplayAnywhere($params)
	{
	    if(!isset($params['caller']) || $params['caller']!=$this->name)
            return false;
        return false;
    }
    public function hookActionObjectCategoryDeleteAfter($params)
    {
        $this->clearBannerCache();
    }
    
    public function hookActionObjectCmsDeleteAfter($params)
    {
        $this->clearBannerCache();
    }
    
    public function hookActionObjectSupplierDeleteAfter($params)
    {
        $this->clearBannerCache();
    }   

    public function hookActionObjectManufacturerDeleteAfter($params)
    {
        $this->clearBannerCache();
    }

    
	public function hookActionShopDataDuplication($params)
	{
        //return $this->sampleData($params['new_id_shop']);
    }

	protected function stGetCacheId($key,$type,$name = null)
	{
		$cache_id = parent::getCacheId($name);
		return $cache_id.'_'.$key.'_'.$type;
	}
	private function clearBannerCache()
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
        

    public function fontOptions() {
        $google = array();
        foreach($this->googleFonts as $v)
            $google[] = array('id'=>$v['family'],'name'=>$v['family']);
        return $google;
    }
    
    public function fontstyles($font_name = null)
    {
        $style = '';
        if (!$font_name)
            return $style;
        
        $name = $variant = '';
        if (strpos($font_name, ':') !== false)
            list($name, $variant) = explode(':', $font_name);
        else
            $name = $font_name;
        
        $style .= 'font-family:\''.$name.'\';';
        
        if ($variant == 'regular')
            $style .= 'font-weight:400;';
        elseif ($variant)
        {
            if (preg_match('/(\d+)/iS', $variant, $math))
            {
                if (!isset($math[1]))
                    $math[1] = '400';
                $style .= 'font-weight:'.$math[1].';';
            }
            if (preg_match('/([^\d]+)/iS', $variant, $math))
            {
                if (!isset($math[1]))
                    $math[1] = 'normal';
                $style .= 'font-style:'.$math[1].';';
            }
        }
        return $style;
    }
    
}