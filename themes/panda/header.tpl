{*
* 2007-2014 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2014 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*}
<!DOCTYPE HTML>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="{if isset($language_code)}{$language_code|escape:'html':'UTF-8'}{else}{$lang_iso|escape:'html':'UTF-8'}{/if}"><![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8 ie7" lang="{if isset($language_code)}{$language_code|escape:'html':'UTF-8'}{else}{$lang_iso|escape:'html':'UTF-8'}{/if}"><![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9 ie8" lang="{if isset($language_code)}{$language_code|escape:'html':'UTF-8'}{else}{$lang_iso|escape:'html':'UTF-8'}{/if}"><![endif]-->
<!--[if gt IE 8]> <html class="no-js ie9" lang="{if isset($language_code)}{$language_code|escape:'html':'UTF-8'}{else}{$lang_iso|escape:'html':'UTF-8'}{/if}"><![endif]-->
<html lang="{if isset($language_code)}{$language_code|escape:'html':'UTF-8'}{else}{$lang_iso|escape:'html':'UTF-8'}{/if}">
	<head>
		<meta charset="utf-8" />
		<title>{$meta_title|escape:'html':'UTF-8'}</title>
{if isset($meta_description) AND $meta_description}
		<meta name="description" content="{$meta_description|escape:'html':'UTF-8'}" />
{/if}
{if isset($meta_keywords) AND $meta_keywords}
		<meta name="keywords" content="{$meta_keywords|escape:'html':'UTF-8'}" />
{/if}
		<meta name="robots" content="{if isset($nobots)}no{/if}index,{if isset($nofollow) && $nofollow}no{/if}follow" />
		{if isset($sttheme.responsive) && $sttheme.responsive && (!$sttheme.enabled_version_swithing || $sttheme.version_switching==0)}
		<meta name="viewport" content="width=device-width, minimum-scale=0.25, maximum-scale=1.6, initial-scale=1.0" />
        {/if}
		<meta name="apple-mobile-web-app-capable" content="yes" />
		<link rel="icon" type="image/vnd.microsoft.icon" href="{$favicon_url}?{$img_update_time}" />
		<link rel="shortcut icon" type="image/x-icon" href="{$favicon_url}?{$img_update_time}" />
		{if isset($sttheme.icon_iphone_57) && $sttheme.icon_iphone_57}
        <link rel="apple-touch-icon" sizes="57x57" href="{$sttheme.icon_iphone_57}" />
        {/if}
        {if isset($sttheme.icon_iphone_72) && $sttheme.icon_iphone_72}
        <link rel="apple-touch-icon" sizes="72x72" href="{$sttheme.icon_iphone_72}" />
        {/if}
        {if isset($sttheme.icon_iphone_114) && $sttheme.icon_iphone_114}
        <link rel="apple-touch-icon" sizes="114x114" href="{$sttheme.icon_iphone_114}" />
        {/if}
        {if isset($sttheme.icon_iphone_144) && $sttheme.icon_iphone_144}
        <link rel="apple-touch-icon" sizes="144x144" href="{$sttheme.icon_iphone_144}" />
        {/if}
{if isset($css_files)}
	{foreach from=$css_files key=css_uri item=media}
		<link rel="stylesheet" href="{$css_uri|escape:'html':'UTF-8'}" type="text/css" media="{$media|escape:'html':'UTF-8'}" />
	{/foreach}
{/if}
{if isset($sttheme.custom_css) && count($sttheme.custom_css)}
	{foreach $sttheme.custom_css as $css_uri}
	<link href="{$css_uri}" rel="stylesheet" type="text/css" media="{$sttheme.custom_css_media}" />
	{/foreach}
{/if}
{if isset($js_defer) && !$js_defer && isset($js_files) && isset($js_def)}
	{$js_def}
	{foreach from=$js_files item=js_uri}
	<script type="text/javascript" src="{$js_uri|escape:'html':'UTF-8'}"></script>
	{/foreach}
{/if}
{if isset($sttheme.custom_js) && $sttheme.custom_js}
	<script type="text/javascript" src="{$sttheme.custom_js}"></script>
{/if}
		{$HOOK_HEADER}
	</head>
	<body{if isset($page_name)} id="{$page_name|escape:'html':'UTF-8'}"{/if} class="{if isset($page_name)}{$page_name|escape:'html':'UTF-8'}{/if}{if isset($body_classes) && $body_classes|@count} {implode value=$body_classes separator=' '}{/if}{if $hide_left_column} hide-left-column{/if}{if $hide_right_column} hide-right-column{/if}{if isset($content_only) && $content_only} content_only{/if} lang_{$lang_iso} 
	{foreach $languages as $language}
		{if $language.iso_code == $lang_iso && $language.is_rtl}
			is_rtl
		{/if}
	{/foreach}
	{if $sttheme.is_mobile_device} mobile_device {/if}">
	{if !isset($content_only) || !$content_only}
		{if isset($restricted_country_mode) && $restricted_country_mode}
			<div id="restricted-country">
				<p>{l s='You cannot place a new order from your country.'}{if isset($geolocation_country) && $geolocation_country} <span class="bold">{$geolocation_country|escape:'html':'UTF-8'}</span>{/if}</p>
			</div>
		{/if}
		<!--[if lt IE 9]>
		<p class="alert alert-warning">Please upgrade to Internet Explorer version 9 or download Firefox, Opera, Safari or Chrome.</p>
		<![endif]-->
		<div id="st-container" class="st-container st-effect-{(int)Configuration::get('STSN_SIDEBAR_TRANSITION')}">
			<div class="st-pusher">
				<div class="st-content"><!-- this is the wrapper for the content -->
					<div class="st-content-inner">
		<div id="body_wrapper">
			{if isset($sttheme.boxstyle) && $sttheme.boxstyle==2}<div id="page_wrapper">{/if}
			<div class="header-container {if $sttheme.transparent_header} transparent-header {/if}">
				<header id="header">
					{capture name="displayBanner"}{hook h="displayBanner"}{/capture}
					{if isset($smarty.capture.displayBanner) && $smarty.capture.displayBanner|trim}
					<div class="banner">
							{$smarty.capture.displayBanner}
					</div>
					{/if}
					{if (isset($HOOK_NAV_LEFT) && $HOOK_NAV_LEFT|trim) || (isset($HOOK_NAV_RIGHT) && $HOOK_NAV_RIGHT|trim)}
					<div id="top_bar" class="nav {Configuration::get('STSN_HEADER_TOPBAR_SEP_TYPE')|default:'vertical-s'}" >
						<div class="wide_container">
							<div class="container">
								<div class="row">
									<div class="col-xs-12 col-sm-12">
										<nav id="nav_left" class="clearfix">{$HOOK_NAV_LEFT}</nav>
										<nav id="nav_right" class="clearfix">{$HOOK_NAV_RIGHT}</nav>
									</div>
								</div>
							</div>					
						</div>
					</div>
					{/if}
					<div id="header_primary" class="animated fast">
						<div class="wide_container">
							<div class="container">
								<div id="header_primary_row" class="row">
									<div id="header_left" class="col-sm-12 col-md-{if !isset($sttheme.logo_position) || !$sttheme.logo_position}{$sttheme.logo_width}{else}{(12-$sttheme.logo_width)/2|intval}{/if} clearfix">
										{if !isset($sttheme.logo_position) || !$sttheme.logo_position}
											<a id="logo_left" href="{if isset($force_ssl) && $force_ssl}{$base_dir_ssl}{else}{$base_dir}{/if}" title="{$shop_name|escape:'html':'UTF-8'}">
												<img class="logo replace-2x" src="{$logo_url}" {if isset($sttheme.retina_logo) && $sttheme.retina_logo} data-2x="{$link->getMediaLink("`$smarty.const._MODULE_DIR_`stthemeeditor/`$sttheme.retina_logo|escape:'html':'UTF-8'`")}"{/if} alt="{$shop_name|escape:'html':'UTF-8'}"{if isset($sttheme.st_logo_image_width) && $sttheme.st_logo_image_width} width="{$sttheme.st_logo_image_width}"{/if}{if isset($sttheme.st_logo_image_height) && $sttheme.st_logo_image_height} height="{$sttheme.st_logo_image_height}"{/if}/>
											</a>
										{/if}
										{if isset($HOOK_HEADER_LEFT) && $HOOK_HEADER_LEFT|trim}
											{$HOOK_HEADER_LEFT}
										{/if}
									</div>
									{if isset($sttheme.logo_position) && $sttheme.logo_position}
										<div id="header_center" class="col-sm-12 col-md-{$sttheme.logo_width}">
											<a id="logo_center" href="{if isset($force_ssl) && $force_ssl}{$base_dir_ssl}{else}{$base_dir}{/if}" title="{$shop_name|escape:'html':'UTF-8'}">
												<img class="logo replace-2x" src="{$logo_url}" {if isset($sttheme.retina_logo) && $sttheme.retina_logo} data-2x="{$link->getMediaLink("`$smarty.const._MODULE_DIR_`stthemeeditor/`$sttheme.retina_logo|escape:'html':'UTF-8'`")}"{/if} alt="{$shop_name|escape:'html':'UTF-8'}"{if isset($sttheme.st_logo_image_width) && $sttheme.st_logo_image_width} width="{$sttheme.st_logo_image_width}"{/if}{if isset($sttheme.st_logo_image_height) && $sttheme.st_logo_image_height} height="{$sttheme.st_logo_image_height}"{/if}/>
											</a>
										</div>
									{/if}
									<div id="header_right" class="col-sm-12 col-md-{if isset($sttheme.logo_position) && $sttheme.logo_position}{(12-$sttheme.logo_width)/2|ceil}{else}{12-$sttheme.logo_width}{/if}">
										<div id="header_top" class="row">
											{if (isset($HOOK_HEADER_TOP_LEFT) && $HOOK_HEADER_TOP_LEFT|trim) && (!isset($sttheme.logo_position) || !$sttheme.logo_position)}
											<div id="header_top_left" class="col-sm-12 col-md-5">
												{$HOOK_HEADER_TOP_LEFT}
											</div>
											{/if}
											<div id="header_top_right" class="col-sm-12 col-md-{if (isset($sttheme.logo_position) && $sttheme.logo_position) || (!isset($HOOK_HEADER_TOP_LEFT) || !$HOOK_HEADER_TOP_LEFT|trim)}12{else}7{/if} clearfix">
												{$HOOK_TOP}
											</div>
										</div>
										{if (!isset($sttheme.logo_position) || !$sttheme.logo_position) && isset($HOOK_HEADER_BOTTOM) && $HOOK_HEADER_BOTTOM|trim}
										<div id="header_bottom" class="clearfix">
												{$HOOK_HEADER_BOTTOM}
										</div>
										{/if}
									</div>
								</div>
							</div>
						</div>
					</div>
		            {if isset($HOOK_MAIN_EMNU) && $HOOK_MAIN_EMNU}
		            <section id="top_extra">
		                {$HOOK_MAIN_EMNU}
		            </section>
		            {/if}
		            {if (isset($HOOK_MOBILE_BAR) && $HOOK_MOBILE_BAR) || (isset($HOOK_MOBILE_BAR_LEFT) && $HOOK_MOBILE_BAR_LEFT) || (isset($HOOK_MOBILE_BAR_RIGHT) && $HOOK_MOBILE_BAR_RIGHT)}
		            <section id="mobile_bar">
		            	<div class="container">
		                	<div id="mobile_bar_container" class="clearfix">
		                		<div id="mobile_bar_left">{if isset($HOOK_MOBILE_BAR_LEFT) && $HOOK_MOBILE_BAR_LEFT}{$HOOK_MOBILE_BAR_LEFT}{/if}</div>
		                		<div id="mobile_bar_right">{if isset($HOOK_MOBILE_BAR_RIGHT) && $HOOK_MOBILE_BAR_RIGHT}{$HOOK_MOBILE_BAR_RIGHT}{/if}</div>
		                		<div id="mobile_bar_center">{if isset($HOOK_MOBILE_BAR) && $HOOK_MOBILE_BAR}{$HOOK_MOBILE_BAR}{/if}</div>
		                	</div>
		                </div>
		            </section>
		            {/if}
				</header>
			</div>
			{if isset($HOOK_FULL_WIDTH_HOME_TOP) && $HOOK_FULL_WIDTH_HOME_TOP}
                {$HOOK_FULL_WIDTH_HOME_TOP}
            {/if}
            <!-- Breadcrumb -->         
            {if $page_name != 'index' 
            && $page_name != 'pagenotfound'
            && $page_name != 'module-stblog-default'
            }
            <div id="breadcrumb_wrapper" class="{if isset($sttheme.breadcrumb_width) && $sttheme.breadcrumb_width} wide_container {/if}"><div class="container"><div class="row">
                <div class="col-xs-12 clearfix">
                	{include file="$tpl_dir./breadcrumb.tpl"}
                </div>
            </div></div></div>
            {/if}
			<!--/ Breadcrumb -->
			<div class="columns-container">
				<div id="columns" class="container">
					{capture name="displayTopColumn"}{hook h="displayTopColumn"}{/capture}
					{if isset($smarty.capture.displayTopColumn) && $smarty.capture.displayTopColumn|trim}
					<div id="slider_row" class="row">
						<div id="top_column" class="clearfix col-xs-12 col-sm-12">{$smarty.capture.displayTopColumn}</div>
					</div>
					{/if}
					<div class="row">
						{if isset($left_column_size) && !empty($left_column_size)}
						<div id="left_column" class="column col-xxs-8 col-xs-6 col-sm-{$left_column_size|intval}">{$HOOK_LEFT_COLUMN}</div>
						{/if}
						{if isset($left_column_size) && isset($right_column_size)}{assign var='cols' value=(12 - $left_column_size - $right_column_size)}{else}{assign var='cols' value=12}{/if}
						<div id="center_column" class="center_column col-xs-12 col-sm-{$cols|intval}">
	{/if}