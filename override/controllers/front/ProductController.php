<?php
class ProductController extends ProductControllerCore
{
    /*
    * module: stoverride
    * date: 2016-12-28 15:05:50
    * version: 1.0
    */
    public function initContent()
    {
        parent::initContent();
        if(Configuration::get('STSN_PRODUCT_SECONDARY'))
            $this->context->smarty->assign(array(   
                'HOOK_PRODUCT_SECONDARY_COLUMN' => Hook::exec('displayProductSecondaryColumn'),     
            ));
    }
}
