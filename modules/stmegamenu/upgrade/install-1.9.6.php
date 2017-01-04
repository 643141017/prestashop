<?php

if (!defined('_PS_VERSION_'))
	exit;

function upgrade_module_1_9_6($object)
{
    $result = true;

    $result &= $object->registerHook('displayMobileBarLeft');
    $result &= $object->unregisterHook('displayRightBar');
    $result &= $object->unregisterHook('displayMobileBar');
    
	return $result;
}
