<?php

if (!defined('_PS_VERSION_'))
	exit;

function upgrade_module_1_1_6($object)
{
    $result = true;

    $field = Db::getInstance()->executeS('Describe `'._DB_PREFIX_.'st_parallax_group` `background_style`');  
   
    if(is_array($field) && count($field))
        return $result;

    if (!Db::getInstance()->Execute('ALTER TABLE `'._DB_PREFIX_.'st_parallax_group` 
        ADD `background_style` tinyint(1) unsigned NOT NULL DEFAULT 0,
        ADD `mpfour` varchar(255) DEFAULT NULL,
        ADD `webm` varchar(255) DEFAULT NULL,
        ADD `ogg` varchar(255) DEFAULT NULL,
        ADD `youtube` varchar(255) DEFAULT NULL,
        ADD `loop` tinyint(1) unsigned NOT NULL DEFAULT 1, 
        ADD `muted` tinyint(1) unsigned NOT NULL DEFAULT 0,
        ADD `play` tinyint(1) unsigned NOT NULL DEFAULT 1, 
        ADD `youtube_loop` tinyint(1) unsigned NOT NULL DEFAULT 1, 
        ADD `youtube_muted` tinyint(1) unsigned NOT NULL DEFAULT 0,
        ADD `youtube_play` tinyint(1) unsigned NOT NULL DEFAULT 1, 
        ADD `controls` tinyint(1) unsigned NOT NULL DEFAULT 0, 
        ADD `start_time` int(10) unsigned NOT NULL DEFAULT 0, 
        ADD `stop_time` int(10) unsigned NOT NULL DEFAULT 0'
        ))
		$result = false;
	
	return $result;
}
