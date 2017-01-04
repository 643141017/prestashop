<?php
class IndexController extends IndexControllerCore
{
    /**
     * Assign template vars related to page content
     * @see FrontController::initContent()
     */
    public function initContent()
    {
        parent::initContent();
        
        $this->context->smarty->assign(array(
            'HOOK_HOME_SECONDARY_LEFT' => Hook::exec('displayHomeSecondaryLeft'),
            'HOOK_HOME_SECONDARY_RIGHT' => Hook::exec('displayHomeSecondaryRight'),  
            'HOOK_HOME_TOP' => Hook::exec('displayHomeTop'),
            'HOOK_HOME_BOTTOM' => Hook::exec('displayHomeBottom'),
            'HOOK_HOME_TERTIARY_LEFT' => Hook::exec('displayHomeTertiaryLeft'),
            'HOOK_HOME_TERTIARY_RIGHT' => Hook::exec('displayHomeTertiaryRight'),
            'HOOK_HOME_FIRST_QUARTER' => Hook::exec('displayHomeFirstQuarter'),
            'HOOK_HOME_SECOND_QUARTER' => Hook::exec('displayHomeSecondQuarter'),
            'HOOK_HOME_THIRD_QUARTER' => Hook::exec('displayHomeThirdQuarter'),
            'HOOK_HOME_FOURTH_QUARTER' => Hook::exec('displayHomeFourthQuarter'),
        ));
    }
}