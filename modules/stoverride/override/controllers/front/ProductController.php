<?php

class ProductController extends ProductControllerCore
{
    public function initContent()
    {
        parent::initContent();
        if(Configuration::get('STSN_PRODUCT_SECONDARY'))
            $this->context->smarty->assign(array(   
                'HOOK_PRODUCT_SECONDARY_COLUMN' => Hook::exec('displayProductSecondaryColumn'),     
            ));
    }
}

