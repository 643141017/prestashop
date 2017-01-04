<?php
class SearchController extends SearchControllerCore
{
    public function initContent()
    {
        $query = Tools::replaceAccentedChars(urldecode(Tools::getValue('q')));
        if ($this->ajax_search)
        {
            $image = new Image();
            $searchResults = Search::find((int)(Tools::getValue('id_lang')), $query, 1, 10, 'position', 'desc', true);
            foreach ($searchResults as &$product)
            {
                $product['product_link'] = $this->context->link->getProductLink($product['id_product'], $product['prewrite'], $product['crewrite']);
                $imageID = $image->getCover($product['id_product']);
                if(isset($imageID['id_image']))
                    $product['pthumb'] = $this->context->link->getImageLink($product['prewrite'], (int)$product['id_product'].'-'.$imageID['id_image'], 'small_default');
                else
                    $product['pthumb'] = _THEME_PROD_DIR_.$this->context->language->iso_code."-default-small_default.jpg";
            }
            die(Tools::jsonEncode($searchResults));
        }
        parent::initContent();
    }
}