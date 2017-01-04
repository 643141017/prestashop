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

class StPageBannerClass extends ObjectModel
{
	/** @var integer id*/
	public $id;
	/** @var integer */
	public $active;
	/** @var integer */
	public $position;
	/** @var string banner image*/
	public $image_multi_lang;
	/** @var integer */
	public $width;
	/** @var integer */
	public $height;
	/** @var string banner description*/
	public $description;
	/** @var string */
    public $description_color;
	/** @var string */
    public $text_position;
	/** @var integer */
    public $text_align;
	/** @var integer */
    public $hide_text_on_mobile;

	public $id_shop;
    public $item_k;
    public $item_v;

	/** @var boolen */
	public $hide_on_mobile;
	/** @var boolen */
	public $hover_effect;
	/** @var integer */
	public $banner_height;
	/** @var string */
    public $btn_color;
	/** @var string */
    public $btn_bg;
	/** @var string */
    public $btn_hover_color;
	/** @var string */
    public $btn_hover_bg;
	/**
	 * @see ObjectModel::$definition
	 */
	public static $definition = array(
		'table'     => 'st_page_banner',
		'primary'   => 'id_st_page_banner',
		'multilang' => true,
		'fields'    => array(
			'active'              => array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
			'position'            => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),		
			'description_color'   => array('type' => self::TYPE_STRING, 'size' => 7),	
			'text_position'       => array('type' => self::TYPE_STRING),
			'text_align'          => array('type' => self::TYPE_INT),
			'hide_text_on_mobile' => array('type' => self::TYPE_INT, 'validate' => 'isBool'),
			'id_shop'             => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt', 'required' => true),
			'item_k'              => array('type' => self::TYPE_INT, 'validate' => 'isUnsignedInt'),
			'item_v'              => array('type' => self::TYPE_STRING, 'size' => 255, 'validate' => 'isGenericName'),
			'hide_on_mobile'      => array('type' => self::TYPE_BOOL, 'validate' => 'isBool'),
			'hover_effect'        => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
			'banner_height'        => array('type' => self::TYPE_INT, 'validate' => 'isunsignedInt'),
			'btn_color'       => array('type' => self::TYPE_STRING, 'size' => 7),
			'btn_bg'          => array('type' => self::TYPE_STRING, 'size' => 7),
			'btn_hover_color' => array('type' => self::TYPE_STRING, 'size' => 7),
			'btn_hover_bg'    => array('type' => self::TYPE_STRING, 'size' => 7),
			// Lang fields
			'description'         => array('type' => self::TYPE_HTML, 'lang' => true, 'validate' => 'isCleanHtml'),
			'image_multi_lang'    => array('type' => self::TYPE_STRING, 'lang' => true, 'validate' => 'isAnything', 'size' => 255),
			'width'               => array('type' => self::TYPE_INT, 'lang' => true, 'validate' => 'isunsignedInt'),	
			'height'              => array('type' => self::TYPE_INT, 'lang' => true, 'validate' => 'isunsignedInt'),	
		),
	);
    public function delete()
    {            
        if(isset($this->image_multi_lang) && count($this->image_multi_lang))
            foreach($this->image_multi_lang as $v)
                if ($v && file_exists(_PS_ROOT_DIR_.$v))
    	           @unlink(_PS_ROOT_DIR_.$v);
                   
		$res = parent::delete();
        if ($res)
            StPageBannerFontClass::deleteBySlider($this->id);
        return $res;
    }
    
	public static function getAll($identify=0, $type=0, $id_lang, $active=0)
	{
        if (!$id_lang)
			$id_lang = Context::getContext()->language->id;
        $where = '';
        if ($type == 12 && $identify)
        {
            $where = ' AND (sms.`item_v`="0"';
            $product = new Product(Tools::getValue('id_product'));
            if ($product->id_manufacturer)
                $where .= ' OR sms.`item_v`="4_'.(int)$product->id_manufacturer.'"';
            if($cates = $product->getCategories())
            {
                foreach($cates AS &$cate)
                    $cate = '"1_'.(int)$cate.'"';
                $where .= ' OR sms.`item_v` IN('.implode(',',$cates).')';
            }
            $where .= ')';
        }
        elseif ($identify)
            $where = ' AND sms.`item_v`="'.$identify.'"';

		$result = Db::getInstance()->executeS('
			SELECT sms.*, smsl.*
			FROM `'._DB_PREFIX_.'st_page_banner` sms
			LEFT JOIN `'._DB_PREFIX_.'st_page_banner_lang` smsl ON (sms.`id_st_page_banner` = smsl.`id_st_page_banner`)
			WHERE smsl.`id_lang` = '.(int)$id_lang.($active ? ' AND sms.`active`=1 ' : '').		
			($type ? ' AND sms.`item_k`='.(int)$type : '').	
			$where.	
            ' '.Shop::addSqlRestrictionOnLang('sms').'
            ORDER BY sms.`position`
            ');
		if(is_array($result) && count($result))
	        foreach($result AS &$rs)
	            self::fetchMediaServer($rs);
        return $result;
	}

	public function copyFromPost()
	{
		/* Classical fields */
		foreach ($_POST AS $key => $value)
			if (key_exists($key, $this) AND $key != 'id_'.$this->table)
				$this->{$key} = $value;

		/* Multilingual fields */
		if (sizeof($this->fieldsValidateLang))
		{
			$languages = Language::getLanguages(false);
			foreach ($languages AS $language)
				foreach ($this->fieldsValidateLang AS $field => $validation)
					if (isset($_POST[$field.'_'.(int)($language['id_lang'])]))
						$this->{$field}[(int)($language['id_lang'])] = $_POST[$field.'_'.(int)($language['id_lang'])];
		}
	}
    public function checkPosition()
    {
        $check = Db::getInstance()->getValue('
			SELECT count(0)
			FROM `'._DB_PREFIX_.'st_page_banner` 
			WHERE `position`='.(int)$this->position.($this->id ? ' AND `id_st_page_banner`!='.$this->id : '')
		);
        if($check)
            return Db::getInstance()->getValue('
    			SELECT `position`+1
    			FROM `'._DB_PREFIX_.'st_page_banner` 
                ORDER BY `position` DESC'
    		);
        return $this->position;
    }
    public static function fetchMediaServer(&$banner)
    {
        $fields = array('image_multi_lang');
        if (is_string($banner) && $banner)
        {
            if (strpos($banner, '/upload/') === false && strpos($banner, '/modules/') === false)
                $banner = _THEME_PROD_PIC_DIR_.$banner;
            $banner = context::getContext()->link->protocol_content.Tools::getMediaServer($banner).$banner;
            return $banner;
        }
        foreach($fields AS $field)
        {
            if (is_array($banner) && isset($banner[$field]) && $banner[$field])
            {
                if (strpos($banner[$field], '/upload/') === false && strpos($banner[$field], '/modules/') === false )
                    $banner[$field] = _THEME_PROD_PIC_DIR_.$banner[$field];
                $banner[$field] = context::getContext()->link->protocol_content.Tools::getMediaServer($banner[$field]).$banner[$field];
            }
        }
    }
    
	public static function getCustomCss()
	{
		return  Db::getInstance()->executeS('
			SELECT `id_st_page_banner`, `description_color`, `btn_color`, `btn_bg`, `btn_hover_color`, `btn_hover_bg`
			FROM `'._DB_PREFIX_.'st_page_banner` 
			WHERE `active` = 1 and (`description_color`!="" or `btn_color`!="" or `btn_bg`!="" or `btn_hover_color`!="" or `btn_hover_bg`!="")'
        );
	}
}