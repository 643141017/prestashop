<?php

if (!defined('_PS_VERSION_'))
	exit;

function upgrade_module_0_3_2($object)
{
    $result = true;
    
    $result &= Configuration::updateValue('ST_SHOW_WELCOME_MSG', 0);
    $result &= Configuration::updateValue('ST_SHOW_USER_INFO_ICONS', 0);
        
	return $result;
}
