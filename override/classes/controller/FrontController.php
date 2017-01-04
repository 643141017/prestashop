<?php
class FrontController extends FrontControllerCore
{
    /*
    * module: stoverride
    * date: 2016-12-28 15:05:50
    * version: 1.0
    */
    public function initContent()
    {
        parent::initContent();
            
        $this->context->smarty->assign(array(
            'HOOK_HEADER_LEFT' => Hook::exec('displayHeaderLeft'),
            'HOOK_HEADER_TOP_LEFT' => Hook::exec('displayHeaderTopLeft'),
            'HOOK_HEADER_BOTTOM' => Hook::exec('displayHeaderBottom'),
            'HOOK_MAIN_EMNU' => Hook::exec('displayMainMenu'),
            'HOOK_FOOTER_PRIMARY' => Hook::exec('displayFooterPrimary'),
            'HOOK_FOOTER_TERTIARY' => Hook::exec('displayFooterTertiary'),
            'HOOK_FOOTER_BOTTOM_LEFT' => Hook::exec('displayFooterBottomLeft'),
            'HOOK_FOOTER_BOTTOM_RIGHT' => Hook::exec('displayFooterBottomRight'),
            'HOOK_RIGHT_BAR' => Hook::exec('displayRightBar'),
            'HOOK_LEFT_BAR' => Hook::exec('displayLeftBar'),
            'HOOK_SIDE_BAR_RIGHT' => Hook::exec('displaySideBarRight'),
            'HOOK_BOTTOM_COLUMN' => Hook::exec('displayBottomColumn'),
            'HOOK_FULL_WIDTH_HOME_TOP' => Hook::exec('displayFullWidthTop'),
            'HOOK_FULL_WIDTH_HOME_BOTTOM' => Hook::exec('displayFullWidthBottom'),
            'HOOK_NAV_LEFT' => Hook::exec('displayNavLeft'),
            'HOOK_NAV_RIGHT' => Hook::exec('displayNav'),
            'HOOK_MOBILE_BAR' => Hook::exec('displayMobileBar'),
            'HOOK_MOBILE_BAR_RIGHT' => Hook::exec('displayMobileBarRight'),
            'HOOK_MOBILE_BAR_LEFT' => Hook::exec('displayMobileBarLeft'),
            'isIntalledBlockWishlist'=> (Module::isInstalled('blockwishlist') && Module::isEnabled('blockwishlist')),
        ));
        
        $this->addJqueryPlugin('hoverIntent');
    }
}