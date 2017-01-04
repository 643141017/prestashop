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

class StCompare extends Module
{
    private $_html = '';
    public $fields_form;
	public function __construct()
	{
		$this->name          = 'stcompare';
		$this->tab           = 'front_office_features';
		$this->version       = '1.0';
		$this->author        = 'SUNNYTOO.COM';
		$this->need_instance = 0;
		
        $this->bootstrap = true;
		parent::__construct();
		
		$this->displayName   = $this->l('Products Comparison');
		$this->description   = $this->l('Ajax add to compare.');
	}

	public function install()
	{
		if (!parent::install() ||
			!$this->registerHook('displayRightBar') ||
			!$this->registerHook('displaySideBarRight') ||
			!$this->registerHook('header') ||
			!$this->registerHook('productActions')
        )
			return false;
		return true;
	}
	public function hookDisplayRightBar($params)
	{
		if (!Configuration::get('PS_COMPARATOR_MAX_ITEM'))
            return false;

        if(Dispatcher::getInstance()->getController()=='productscomparison')
            return false;
        
        return $this->display(__FILE__, 'stcompare.tpl');
	}

	public function hookDisplaySideBarRight($params)
	{
		if (!Configuration::get('PS_COMPARATOR_MAX_ITEM'))
            return false;

        if(Dispatcher::getInstance()->getController()=='productscomparison')
            return false;

        $productsCompared = array();
		if (isset($params['cookie']->id_compare))
			$productsCompared = CompareProduct::getCompareProducts($params['cookie']->id_compare);

		if (count($productsCompared))
        {
            $listProducts = array();

			foreach ($productsCompared as $k => &$id)
			{
				$curProduct = new Product((int)$id, true, (int)($params['cookie']->id_lang));
				if (!Validate::isLoadedObject($curProduct) || !$curProduct->active || !$curProduct->isAssociatedToShop())
				{
					if (isset($params['cookie']->id_compare))
						CompareProduct::removeCompareProduct($params['cookie']->id_compare, $id);
					unset($ids[$k]);
					continue;
				}

				$cover = Product::getCover((int)$id);

				$curProduct->id_image = Tools::htmlentitiesUTF8(Product::defineProductImage(array('id_image' => $cover['id_image'], 'id_product' => $id), (int)($params['cookie']->id_lang)));
				$listProducts[] = $curProduct;
			}

			if (count($listProducts) > 0)
			{
				$this->context->smarty->assign(array(
					'products' => $listProducts,
					'smallSize' => Image::getSize(ImageType::getFormatedName('small')),
				));
			}
        }
        return $this->display(__FILE__, 'stcompare-side.tpl');
	}

    public function hookHeader()
    {
		if (!Configuration::get('PS_COMPARATOR_MAX_ITEM'))
            return false;
		$this->context->controller->addJS(($this->_path).'views/js/stcompare.js');
        return false;
    }
	public function hookProductActions($params)
	{
	    $comparator_max_item = Configuration::get('PS_COMPARATOR_MAX_ITEM');
		if (!$comparator_max_item)
            return false;
        $id_product = (int)Tools::getValue('id_product');
        if(!$id_product)
            return false;
        $product = new Product((int)$id_product, false, $this->context->language->id);
        if (!Validate::isLoadedObject($product) || !$product->active || !$product->isAssociatedToShop())
            return false;
        
        $image = Product::getCover((int)$product->id);
		$this->smarty->assign(array(
            'product' => $product,
            'product_cover' => (int)$image['id_image'],
            'product_link' => $product->getLink(),
            'comparator_max_item' => $comparator_max_item,
			'smallSize' => Image::getSize(ImageType::getFormatedName('small')),
        ));
		return $this->display(__FILE__, 'stcompare-extra.tpl');
	}

    public function hookDisplayLeftColumnProduct($params)
    {
        return $this->hookProductActions($params);
    }
    
    public function hookDisplayProductSecondaryColumn($params)
    {
        return $this->hookProductActions($params);
    }
}