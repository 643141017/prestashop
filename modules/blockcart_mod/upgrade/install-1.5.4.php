<?php

if (!defined('_PS_VERSION_'))
	exit;

function upgrade_module_1_5_4($object)
{
    $result = true;

    $result &= $object->registerHook('displayMobileBar');
    
	return $result;
}
