<?php

if (!defined('_PS_VERSION_'))
	exit;

function upgrade_module_1_1_0($object)
{
    $result = true;

    $result &= Configuration::updateValue('STSN_PRO_SHADOW_EFFECT', 0);
    $result &= Configuration::updateValue('STSN_PRO_H_SHADOW', 0);
    $result &= Configuration::updateValue('STSN_PRO_V_SHADOW', 0);
    $result &= Configuration::updateValue('STSN_PRO_SHADOW_BLUR', 4);
    $result &= Configuration::updateValue('STSN_PRO_SHADOW_COLOR', '#000000');
    $result &= Configuration::updateValue('STSN_PRO_SHADOW_OPACITY', 0.1);
    $result &= Configuration::updateValue('STSN_PRO_LIST_DISPLAY_BRAND_NAME', 0);
    $result &= Configuration::updateValue('STSN_PRODUCT_TABS', 0);
    $result &= Configuration::updateValue('STSN_MENU_TITLE', 0);
    $result &= Configuration::updateValue('STSN_FLYOUT_WISHLIST', 0);
    $result &= Configuration::updateValue('STSN_FLYOUT_QUICKVIEW', 0);
    $result &= Configuration::updateValue('STSN_FLYOUT_COMPARISON', 0);

    $sticky_option = Configuration::get('STSN_STICKY_OPTION');
    $menu_bg_color = Configuration::get('STSN_MENU_BG_COLOR');
    $header_bg_color = Configuration::get('STSN_HEADER_BG_COLOR');

    if($sticky_option==1 || $sticky_option==3){
        $result &= Configuration::updateValue('STSN_STICKY_BG', ($menu_bg_color ? $menu_bg_color : ''));
    }
    elseif ($sticky_option==2 || $sticky_option==4) {
        $result &= Configuration::updateValue('STSN_STICKY_BG', ($header_bg_color ? $header_bg_color : ''));
    }
    else{
        $result &= Configuration::updateValue('STSN_STICKY_BG', '#ffffff');
    }
    
    $result &= Configuration::updateValue('STSN_STICKY_OPACITY', 0.95);
    $result &= Configuration::updateValue('STSN_TRANSPARENT_HEADER_BG', ($header_bg_color ? $header_bg_color : ''));
    $result &= Configuration::updateValue('STSN_TRANSPARENT_HEADER_OPACITY', 0.4);
        
    foreach(Shop::getCompleteListOfShopsID() AS $id_shop)
    {
        $cssFile = _PS_MODULE_DIR_ . $object->name . '/views/css/customer-s'.(int)$id_shop.'.css';
        @unlink($cssFile);    
    }

	return $result;
}
