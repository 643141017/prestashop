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

class BlockTags_mod extends Module
{
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
	function __construct()
	{
		$this->name = 'blocktags_mod';
		$this->tab = 'front_office_features';
		$this->version = '1.2.2';
		$this->author = 'SUNNYTOO.COM';
		$this->need_instance = 0;

		$this->bootstrap = true;
		parent::__construct();	

		$this->displayName = $this->l('Tags block mod');
		$this->description = $this->l('Adds a block containing your product tags.');
		$this->ps_versions_compliancy = array('min' => '1.6', 'max' => _PS_VERSION_);
	}

	function install()
	{
		$success = (parent::install() 
			&& Configuration::updateValue('BLOCKTAGS_NBR', 6) 
			&& Configuration::updateValue('BLOCKTAGS_MAX_LEVEL', 3)
			&& Configuration::updateValue('BLOCKTAGS_WIDE_ON_FOOTER', '2-4')
			&& $this->registerHook('displayFooterTertiary')
		);
		return $success;
	}

	public function getContent()
        {
                $output = '';
                $errors = array();
                if (Tools::isSubmit('submitBlockTags'))
                {
                        $tagsNbr = Tools::getValue('BLOCKTAGS_NBR');
                        if (!strlen($tagsNbr))
                                $errors[] = $this->l('Please complete the "Displayed tags" field.');
                        elseif (!Validate::isInt($tagsNbr) || (int)($tagsNbr) <= 0)
                                $errors[] = $this->l('Invalid number.');

                        $tagsLevels = Tools::getValue('BLOCKTAGS_MAX_LEVEL');
                        if (!strlen($tagsLevels))
                                $errors[] = $this->l('Please complete the "Tags levels" field.');
                        elseif (!Validate::isInt($tagsLevels) || (int)($tagsLevels) <= 0)
                                $errors[] = $this->l('Invalid value for "Tags levels". Choose a positive integer number.');

                        $tagsWide = Tools::getValue('BLOCKTAGS_WIDE_ON_FOOTER');                            

                        if (count($errors))
                                $output = $this->displayError(implode('<br />', $errors));
                        else
                        {
                                Configuration::updateValue('BLOCKTAGS_NBR', (int)$tagsNbr);
                                Configuration::updateValue('BLOCKTAGS_MAX_LEVEL', (int)$tagsLevels);
                                Configuration::updateValue('BLOCKTAGS_WIDE_ON_FOOTER', $tagsWide);

                                $output = $this->displayConfirmation($this->l('Settings updated'));
                        }
                }
                return $output.$this->renderForm();
        }
    private function _prepareHook()
    {
		$tags = Tag::getMainTags((int)($this->context->language->id), (int)(Configuration::get('BLOCKTAGS_NBR')));
		
		$max = -1;
		$min = -1;
		foreach ($tags as $tag)
		{
			if ($tag['times'] > $max)
				$max = $tag['times'];
			if ($tag['times'] < $min || $min == -1)
				$min = $tag['times'];
		}
		
		if ($min == $max)
			$coef = $max;
		else
		{
			$coef = (Configuration::get('BLOCKTAGS_MAX_LEVEL') - 1) / ($max - $min);
		}
		
		if (sizeof($tags))
		{
			foreach ($tags AS &$tag)
				$tag['class'] = 'tag_level'.(int)(($tag['times'] - $min) * $coef + 1);
		}
		$this->smarty->assign(array(
			'tags' => $tags,
			'blocktags_wide_on_footer' => Configuration::get('BLOCKTAGS_WIDE_ON_FOOTER'),
		));

		return true;
    }
	/**
	* Returns module content for left column
	*
	* @param array $params Parameters
	* @return string Content
	*
	*/
	function hookLeftColumn($params)
	{
		if(!$this->_prepareHook())
            return false;

		return $this->display(__FILE__, 'blocktags.tpl');
	}

	function hookRightColumn($params)
	{
		return $this->hookLeftColumn($params);
	}
	
	public function hookDisplayFooterPrimary($params)
	{
		return $this->hookDisplayFooter($params);
	}

	public function hookDisplayFooter($params)
	{
		if(!$this->_prepareHook())
            return false;
		return $this->display(__FILE__, 'blocktags-footer.tpl');
	}

	public function hookDisplayFooterTertiary($params)
	{
		return $this->hookDisplayFooter($params);		
	}
	public function renderForm()
	{
		$fields_form = array(
			'form' => array(
				'legend' => array(
					'title' => $this->l('Settings'),
					'icon' => 'icon-cogs'
				),
				'input' => array(
					array(
						'type' => 'text',
						'label' => $this->l('Displayed tags'),
						'name' => 'BLOCKTAGS_NBR',
						'class' => 'fixed-width-xs',
						'desc' => $this->l('Set the number of tags you would like to see displayed in this block. (default: 10)')
                        ),
                    array(
                            'type' => 'text',
                            'label' => $this->l('Tags levels'),
                            'name' => 'BLOCKTAGS_MAX_LEVEL',
                            'class' => 'fixed-width-xs',
                            'desc' => $this->l('Set the number of different tags levels you would like to use. (default: 3)')
                    ),
	                array(
	                    'type' => 'select',
	                    'label' => $this->l('Wide on footer:'),
	                    'name' => 'BLOCKTAGS_WIDE_ON_FOOTER',
	                    'options' => array(
	                        'query' => self::$wide_map,
	                        'id' => 'id',
	                        'name' => 'name',
	                        'default' => array(
	                            'value' => 3,
	                            'label' => '3/12',
	                        ),
	                    ),
	                ),
				),
				'submit' => array(
					'title' => $this->l('Save'),
				)
			),
		);
			
		$helper = new HelperForm();
		$helper->show_toolbar = false;
		$helper->table =  $this->table;
		$lang = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
		$helper->default_form_language = $lang->id;
		$helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ? Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;
		$helper->identifier = $this->identifier;
		$helper->submit_action = 'submitBlockTags';
		$helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		$helper->tpl_vars = array(
			'fields_value' => $this->getConfigFieldsValues(),
			'languages' => $this->context->controller->getLanguages(),
			'id_language' => $this->context->language->id
		);

		return $helper->generateForm(array($fields_form));
	}
	
	public function getConfigFieldsValues()
	{		
		return array(
			'BLOCKTAGS_NBR' => Tools::getValue('BLOCKTAGS_NBR', (int)Configuration::get('BLOCKTAGS_NBR')),
			'BLOCKTAGS_MAX_LEVEL' => Tools::getValue('BLOCKTAGS_MAX_LEVEL', (int)Configuration::get('BLOCKTAGS_MAX_LEVEL')),
			'BLOCKTAGS_WIDE_ON_FOOTER' => Tools::getValue('BLOCKTAGS_WIDE_ON_FOOTER', Configuration::get('BLOCKTAGS_WIDE_ON_FOOTER')),
		);
	}

}
