<?php

if (!defined('_PS_VERSION_'))
	exit;

function upgrade_module_1_7_6($object)
{
	$result = true;
    
    $field = Db::getInstance()->executeS('Describe `'._DB_PREFIX_.'st_banner` `bg_color`');  
      
    if(!is_array($field) || !count($field))
        if (!Db::getInstance()->Execute('ALTER TABLE `'._DB_PREFIX_.'st_banner` ADD `bg_color` varchar(7) DEFAULT NULL'))
    		$result &= false;
            
    return $result;
}
