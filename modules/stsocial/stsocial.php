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

class StSocial extends Module
{
    private $_html = '';
    public $fields_form;
    public $fields_value;
    public static $wide_map = array(
        array('id'=>'1', 'name'=>'1/12'),
        array('id'=>'2', 'name'=>'2/12'),
        array('id'=>'2-4', 'name'=>'2.4/12'),
        array('id'=>'4', 'name'=>'4/12'),
        array('id'=>'5', 'name'=>'5/12'),
        array('id'=>'6', 'name'=>'6/12'),
        array('id'=>'7', 'name'=>'7/12'),
        array('id'=>'8', 'name'=>'8/12'),
        array('id'=>'9', 'name'=>'9/12'),
        array('id'=>'10', 'name'=>'10/12'),
        array('id'=>'11', 'name'=>'11/12'),
        array('id'=>'12', 'name'=>'12/12'),
    );
    public static $socials = array('facebook','twitter','rss','youtube','pinterest','google','wordpress','drupal','vimeo','flickr','digg','eaby','amazon','instagram','linkedin','blogger','tumblr','vkontakte','skype');
	public function __construct()
	{
		$this->name          = 'stsocial';
		$this->tab           = 'front_office_features';
		$this->version       = '1.2';
		$this->author        = 'SUNNYTOO.COM';
		$this->need_instance = 0;
        $this->bootstrap     = true;
		
		parent::__construct();
		
		$this->displayName = $this->l('Social networking block');
		$this->description = $this->l('Allows you to add information about your brand\'s social networking sites.');
	}

	public function install()
	{
	    $defaultLanguage = new Language((int)(Configuration::get('PS_LANG_DEFAULT')));
		if (!parent::install() 
			|| !$this->registerHook('displayHeader')
			|| !$this->registerHook('displayFullWidthTop')
            || !Configuration::updateValue('ST_SOCIAL_COLOR', '#ffffff')
            || !Configuration::updateValue('ST_SOCIAL_HOVER_COLOR', '#ffffff')
            || !Configuration::updateValue('ST_SOCIAL_BG', '#cccccc')
            || !Configuration::updateValue('ST_SOCIAL_HOVER_BG', '#666666')
            || !Configuration::updateValue('ST_SOCIAL_WIDE_ON_FOOTER', 3)
            || !Configuration::updateValue('ST_SOCIAL_FACEBOOK', array((int)$defaultLanguage->id => 'http://www.facebook.com/prestashop'))
            || !Configuration::updateValue('ST_SOCIAL_TWITTER', array((int)$defaultLanguage->id => 'http://www.twitter.com/prestashop'))
            || !Configuration::updateValue('ST_SOCIAL_RSS', '')
            || !Configuration::updateValue('ST_SOCIAL_YOUTUBE', array((int)$defaultLanguage->id => 'http://www.youtube.com/prestashop'))
            || !Configuration::updateValue('ST_SOCIAL_PINTEREST', array((int)$defaultLanguage->id => 'http://www.pinterest.com/prestashop'))
            || !Configuration::updateValue('ST_SOCIAL_GOOGLE', '')
            || !Configuration::updateValue('ST_SOCIAL_WORDPRESS', '')
            || !Configuration::updateValue('ST_SOCIAL_DRUPAL', '')
            || !Configuration::updateValue('ST_SOCIAL_VIMEO', '')
            || !Configuration::updateValue('ST_SOCIAL_FLICKR', '')
            || !Configuration::updateValue('ST_SOCIAL_DIGG', '')
            || !Configuration::updateValue('ST_SOCIAL_EBAY', '')
            || !Configuration::updateValue('ST_SOCIAL_AMAZON', '')
            || !Configuration::updateValue('ST_SOCIAL_INSTAGRAM', '') 
            || !Configuration::updateValue('ST_SOCIAL_LINKEDIN', '')
            || !Configuration::updateValue('ST_SOCIAL_BLOGGER', '')
            || !Configuration::updateValue('ST_SOCIAL_TUMBLR', '')
            || !Configuration::updateValue('ST_SOCIAL_VKONTAKTE', '')
            || !Configuration::updateValue('ST_SOCIAL_SKYPE', '')
            || !Configuration::updateValue('ST_SOCIAL_NEW_WINDOW', '')
            )
			return false;
		$this->clearSocialCache();
		return true;
	}
	
	public function uninstall()
	{
		$this->clearSocialCache();
		$ret = true;
        foreach(self::$socials AS $social)
            $ret &= Configuration::deleteByName('ST_SOCIAL_'.strtoupper($social));  
		return parent::uninstall() && $ret;
	}

                
    public function getContent()
	{
		if (isset($_POST['savestsocial']))
		{
		    $ret = true;
            $languages = Language::getLanguages(false);
            $defaultLanguage = new Language((int)(Configuration::get('PS_LANG_DEFAULT')));
            foreach(self::$socials AS $social)
            {
                $data = array();
                foreach($languages AS $language)
                    $data[$language['id_lang']] = Tools::getValue(strtolower($social).'_url_'.$language['id_lang']) ? Tools::getValue(strtolower($social).'_url_'.$language['id_lang']) : Tools::getValue(strtolower($social).'_url_'.$defaultLanguage->id);
                $ret &= Configuration::updateValue('ST_SOCIAL_'.strtoupper($social), $data);
            }
            
            $ret &= Configuration::updateValue('ST_SOCIAL_COLOR', Tools::getValue('social_color'))
            && Configuration::updateValue('ST_SOCIAL_HOVER_COLOR', Tools::getValue('social_hover_color'))
            && Configuration::updateValue('ST_SOCIAL_BG', Tools::getValue('social_bg'))
            && Configuration::updateValue('ST_SOCIAL_HOVER_BG', Tools::getValue('social_hover_bg'))
            && Configuration::updateValue('ST_SOCIAL_WIDE_ON_FOOTER', Tools::getValue('social_wide_on_footer'))
            && Configuration::updateValue('ST_SOCIAL_NEW_WINDOW', (int)Tools::getValue('new_window'));
            
            if (!$ret)
                $this->_html .= $this->displayError($this->l('Cannot update settings'));
            else
                $this->_html .= $this->displayConfirmation($this->l('Settings updated'));
            	
			$this->clearSocialCache();          
        }
		$helper = $this->initForm();
		return $this->_html.$helper->generateForm($this->fields_form);
	}
    protected function initForm()
	{
		$default_lang = (int)Configuration::get('PS_LANG_DEFAULT');

		$this->fields_form[0]['form'] = array(
			'legend' => array(
				'title' => $this->displayName,
                'icon' => 'icon-cogs' 
			),
			'input' => array(
				 array(
					'type' => 'color',
					'label' => $this->l('Icon text color:'),
					'name' => 'social_color',
					'class' => 'color',
					'size' => 20,
			     ),
				 array(
					'type' => 'color',
					'label' => $this->l('Icon hover color:'),
					'name' => 'social_hover_color',
					'class' => 'color',
					'size' => 20,
			     ),
				 array(
					'type' => 'color',
					'label' => $this->l('Icon background:'),
					'name' => 'social_bg',
					'class' => 'color',
					'size' => 20,
			     ),
				 array(
					'type' => 'color',
					'label' => $this->l('Icon hover background:'),
					'name' => 'social_hover_bg',
					'class' => 'color',
					'size' => 20,
			     ),
                array(
                    'type' => 'select',
                    'label' => $this->l('Wide on footer:'),
                    'name' => 'social_wide_on_footer',
                    'options' => array(
                        'query' => self::$wide_map,
                        'id' => 'id',
                        'name' => 'name',
                        'default' => array(
                            'value' => 3,
                            'label' => '3/12',
                        ),
                    ),
                    'validation' => 'isGenericName',
                ),
                array(
					'type' => 'switch',
					'label' => $this->l('Open in a new window:'),
					'name' => 'new_window',
					'is_bool' => true,
                    'default_value' => 1,
					'values' => array(
						array(
							'id' => 'new_window_on',
							'value' => 1,
							'label' => $this->l('Yes')),
						array(
							'id' => 'new_window_off',
							'value' => 0,
							'label' => $this->l('No')),
					),
				), 
                array(
					'type' => 'text',
					'label' => $this->l('Your Facebook Link:'),
					'name' => 'facebook_url',
                    'lang' => true,
				),
                array(
					'type' => 'text',
					'label' => $this->l('Your Twitter Link:'),
					'name' => 'twitter_url',
                    'lang' => true,
				),
                array(
					'type' => 'text',
					'label' => $this->l('Your RSS Link:'),
					'name' => 'rss_url',
                    'lang' => true,
				),
                array(
					'type' => 'text',
					'label' => $this->l('Your Youtube Link:'),
					'name' => 'youtube_url',
                    'lang' => true,
				),
                array(
					'type' => 'text',
					'label' => $this->l('Your Pinterest Link:'),
					'name' => 'pinterest_url',
                    'lang' => true,
				),
                array(
					'type' => 'text',
					'label' => $this->l('Your Google Link:'),
					'name' => 'google_url',
                    'lang' => true,
				),
                array(
					'type' => 'text',
					'label' => $this->l('Your Wordpress Link:'),
					'name' => 'wordpress_url',
                    'lang' => true,
				),
                array(
					'type' => 'text',
					'label' => $this->l('Your Drupal Link:'),
					'name' => 'drupal_url',
                    'lang' => true,
				),
                array(
					'type' => 'text',
					'label' => $this->l('Your Vimeo Link:'),
					'name' => 'vimeo_url',
                    'lang' => true,
				),
                array(
					'type' => 'text',
					'label' => $this->l('Your Flickr Link:'),
					'name' => 'flickr_url',
                    'lang' => true,
				),
                array(
					'type' => 'text',
					'label' => $this->l('Your Digg Link:'),
					'name' => 'digg_url',
                    'lang' => true,
				),
                array(
					'type' => 'text',
					'label' => $this->l('Your Ebay Link:'),
					'name' => 'eaby_url',
                    'lang' => true,
				),
                array(
					'type' => 'text',
					'label' => $this->l('Your Amazon Link:'),
					'name' => 'amazon_url',
                    'lang' => true,
				),
                array(
					'type' => 'text',
					'label' => $this->l('Your Instagram Link:'),
					'name' => 'instagram_url',
                    'lang' => true,
				),
                array(
					'type' => 'text',
					'label' => $this->l('Your LinkedIn Link:'),
					'name' => 'linkedin_url',
                    'lang' => true,
				),
                array(
					'type' => 'text',
					'label' => $this->l('Your Blogger Link:'),
					'name' => 'blogger_url',
                    'lang' => true,
				),
                array(
					'type' => 'text',
					'label' => $this->l('Your Tumblr Link:'),
					'name' => 'tumblr_url',
                    'lang' => true,
				),
                array(
					'type' => 'text',
					'label' => $this->l('Your Vkontakte Link:'),
					'name' => 'vkontakte_url',
                    'lang' => true,
				),
                array(
					'type' => 'text',
					'label' => $this->l('Your Skype Link:'),
					'name' => 'skype_url',
                    'lang' => true,
				),
			),
			'submit' => array(
				'title' => $this->l('   Save   '),
			)
		);
        
        $helper = new HelperForm();
		$helper->show_toolbar = false;
		$helper->table =  $this->table;
		$lang = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
		$helper->default_form_language = $lang->id;
		$helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ? Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;

		$helper->identifier = $this->identifier;
		$helper->submit_action = 'savestsocial';
		$helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		$helper->tpl_vars = array(
			'fields_value' => $this->getConfigFieldsValues(),
			'languages' => $this->context->controller->getLanguages(),
			'id_language' => $this->context->language->id
		);
		return $helper;
	}
    public function hookDisplayHeader()
    {
		if (!$this->isCached('header.tpl', $this->stGetCacheId()))
        {
        	$custom_css = '';
        	if(Configuration::get('ST_SOCIAL_COLOR'))
        		$custom_css .= '.stsocial_list li a{color:'.Configuration::get('ST_SOCIAL_COLOR').';}';
        	if(Configuration::get('ST_SOCIAL_HOVER_COLOR'))
        		$custom_css .= '.stsocial_list li a:hover{color:'.Configuration::get('ST_SOCIAL_HOVER_COLOR').';}';
        	if(Configuration::get('ST_SOCIAL_BG'))
        		$custom_css .= '.stsocial_list li a{background-color:'.Configuration::get('ST_SOCIAL_BG').';}.stsocial_list_footer_bottom .icon-large{font-size:1.166em;}';
        	if(Configuration::get('ST_SOCIAL_HOVER_BG'))
        		$custom_css .= '.stsocial_list li a:hover{background-color:'.Configuration::get('ST_SOCIAL_HOVER_BG').';}.stsocial_list_footer_bottom .icon-large{font-size:1.166em;}';
            if($custom_css)
                $this->smarty->assign('custom_css', preg_replace('/\s\s+/', ' ', $custom_css));
        }
        return $this->display(__FILE__, 'header.tpl', $this->stGetCacheId());
    }
    

    private function _prepareHook()
    {
        $this->smarty->assign(array(
			'social_new_window' => Configuration::get('ST_SOCIAL_NEW_WINDOW'),
            'social_wide_on_footer' => Configuration::get('ST_SOCIAL_WIDE_ON_FOOTER'),
		));
        $socails = array();
        foreach(self::$socials AS $social)
            $socails[strtolower($social).'_url'] = Configuration::get('ST_SOCIAL_'.strtoupper($social), $this->context->language->id);
        $this->smarty->assign($socails);
        return true;
    }
    
    public function hookDisplayFooter($params)
    {
		if (!$this->isCached('stsocial.tpl', $this->stGetCacheId('stsocial')))
            $this->_prepareHook();
		return $this->display(__FILE__, 'stsocial.tpl', $this->stGetCacheId('stsocial'));
    }
    
    public function hookDisplayFooterTertiary($params)
    {
        return $this->hookDisplayFooter($params);
    }
    
    public function hookDisplayFooterPrimary($params)
    {
        return $this->hookDisplayFooter($params);
    }

	public function hookDisplayLeftColumn($params)
	{
		if (!$this->isCached('stsocial-column.tpl', $this->stGetCacheId('stsocial-column')))
            $this->_prepareHook();
		return $this->display(__FILE__, 'stsocial-column.tpl', $this->stGetCacheId('stsocial-column'));
	}
	public function hookDisplayRightColumn($params)
	{
	   return $this->hookDisplayLeftColumn($params);
	}
	public function hookDisplayStBlogLeftColumn($params)
	{
	   return $this->hookDisplayLeftColumn($params);
	}
	public function hookDisplayStBlogRightColumn($params)
	{
	   return $this->hookDisplayLeftColumn($params);
	}
	public function hookDisplayTopBar($params)
	{
		if (!$this->isCached('stsocial-simple.tpl', $this->stGetCacheId('stsocial-simple')))
            $this->_prepareHook();
		return $this->display(__FILE__, 'stsocial-simple.tpl', $this->stGetCacheId('stsocial-simple'));
	}
	public function hookDisplayNav($params)
	{
        return $this->hookDisplayTopBar($params);
	}
	public function hookDisplayNavLeft($params)
	{
        return $this->hookDisplayTopBar($params);
	}
	public function hookDisplayFooterBottomRight($params)
	{
		if (!$this->isCached('stsocial-footer-bottom.tpl', $this->stGetCacheId('stsocial-footer-bottom')))
            $this->_prepareHook();
		return $this->display(__FILE__, 'stsocial-footer-bottom.tpl', $this->stGetCacheId('stsocial-footer-bottom'));
	}
	public function hookDisplayFooterBottomLeft($params)
	{
	   return $this->hookDisplayFooterBottomRight($params);
	}
	public function hookDisplayHome($params)
	{
		if (!$this->isCached('stsocial-home.tpl', $this->stGetCacheId('stsocial-home')))
            $this->_prepareHook();
		return $this->display(__FILE__, 'stsocial-home.tpl', $this->stGetCacheId('stsocial-home'));
	}
    
	public function hookDisplayHomeTop($params)
	{
	   return $this->hookDisplayHome($params);
	}
    
	public function hookDisplayHomeBottom($params)
	{
	   return $this->hookDisplayHome($params);
	}

    public function hookDisplayBottomColumn($params)
    {
    	if(Dispatcher::getInstance()->getController()!='index')
            return false;
		return $this->hookDisplayHome($params);
    }

    public function hookDisplayTopColumn($params)
    {
    	if(Dispatcher::getInstance()->getController()!='index')
            return false;
		return $this->hookDisplayHome($params);
    }

    public function hookDisplayFullWidthTop($params)
    {
    	if(Dispatcher::getInstance()->getController()!='index')
            return false;
		return $this->hookDisplayHome($params);
    }
    public function hookDisplayFullWidthBottom($params)
    {
    	if(Dispatcher::getInstance()->getController()!='index')
            return false;
		return $this->hookDisplayHome($params);
    }
    
	public function hookDisplayHomeSecondaryLeft($params)
	{
	   return $this->hookDisplayHome($params);
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

    public function hookDisplayHomeFirstQuarter($params)
    {
        return $this->hookDisplayLeftColumn($params);
    }
    public function hookDisplayHomeSecondQuarter($params)
    {
        return $this->hookDisplayLeftColumn($params);
    }
    public function hookDisplayHomeThirdQuarter($params)
    {
        return $this->hookDisplayLeftColumn($params);
    }
    public function hookDisplayHomeFourthQuarter($params)
    {
        return $this->hookDisplayLeftColumn($params);
    }
    private function getConfigFieldsValues()
    {
        $fields_values = array();
        $fields_values['social_color'] = Configuration::get('ST_SOCIAL_COLOR');
        $fields_values['social_hover_color'] = Configuration::get('ST_SOCIAL_HOVER_COLOR');
        $fields_values['social_bg'] = Configuration::get('ST_SOCIAL_BG');
        $fields_values['social_hover_bg'] = Configuration::get('ST_SOCIAL_HOVER_BG');
        $fields_values['social_wide_on_footer'] = Configuration::get('ST_SOCIAL_WIDE_ON_FOOTER');
        $fields_values['new_window'] = Configuration::get('ST_SOCIAL_NEW_WINDOW');
        
        $languages = Language::getLanguages(false);    
		foreach ($languages as $language)
            foreach(self::$socials AS $social)
                $fields_values[strtolower($social).'_url'][$language['id_lang']] = Configuration::get('ST_SOCIAL_'.strtoupper($social), $language['id_lang']);
        return $fields_values;
    }

	private function clearSocialCache()
	{
		$this->_clearCache('*');  
	}
    
    protected function stGetCacheId($key='')
	{
		$cache_id = parent::getCacheId();
		return $cache_id.'_'.$key;
	}
}