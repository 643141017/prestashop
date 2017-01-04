<?php /* Smarty version Smarty-3.1.19, created on 2017-01-04 17:58:27
         compiled from "D:\WWW\prestashop16110\themes\panda\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:23591586cc743a10973-83004978%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1818f1e5dd6a0fcbe88541e0677a9ff9d2c82774' => 
    array (
      0 => 'D:\\WWW\\prestashop16110\\themes\\panda\\header.tpl',
      1 => 1482908691,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '23591586cc743a10973-83004978',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'language_code' => 0,
    'lang_iso' => 0,
    'meta_title' => 0,
    'meta_description' => 0,
    'meta_keywords' => 0,
    'nobots' => 0,
    'nofollow' => 0,
    'sttheme' => 0,
    'favicon_url' => 0,
    'img_update_time' => 0,
    'css_files' => 0,
    'css_uri' => 0,
    'media' => 0,
    'js_defer' => 0,
    'js_files' => 0,
    'js_def' => 0,
    'js_uri' => 0,
    'HOOK_HEADER' => 0,
    'page_name' => 0,
    'body_classes' => 0,
    'hide_left_column' => 0,
    'hide_right_column' => 0,
    'content_only' => 0,
    'languages' => 0,
    'language' => 0,
    'restricted_country_mode' => 0,
    'geolocation_country' => 0,
    'HOOK_NAV_LEFT' => 0,
    'HOOK_NAV_RIGHT' => 0,
    'force_ssl' => 0,
    'base_dir_ssl' => 0,
    'base_dir' => 0,
    'shop_name' => 0,
    'logo_url' => 0,
    'link' => 0,
    'HOOK_HEADER_LEFT' => 0,
    'HOOK_HEADER_TOP_LEFT' => 0,
    'HOOK_TOP' => 0,
    'HOOK_HEADER_BOTTOM' => 0,
    'HOOK_MAIN_EMNU' => 0,
    'HOOK_MOBILE_BAR' => 0,
    'HOOK_MOBILE_BAR_LEFT' => 0,
    'HOOK_MOBILE_BAR_RIGHT' => 0,
    'HOOK_FULL_WIDTH_HOME_TOP' => 0,
    'left_column_size' => 0,
    'HOOK_LEFT_COLUMN' => 0,
    'right_column_size' => 0,
    'cols' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_586cc743c2ba72_40689972',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_586cc743c2ba72_40689972')) {function content_586cc743c2ba72_40689972($_smarty_tpl) {?><?php if (!is_callable('smarty_function_implode')) include 'D:\\WWW\\prestashop16110\\tools\\smarty\\plugins\\function.implode.php';
?>
<!DOCTYPE HTML>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="<?php if (isset($_smarty_tpl->tpl_vars['language_code']->value)) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['language_code']->value, ENT_QUOTES, 'UTF-8', true);?>
<?php } else { ?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['lang_iso']->value, ENT_QUOTES, 'UTF-8', true);?>
<?php }?>"><![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8 ie7" lang="<?php if (isset($_smarty_tpl->tpl_vars['language_code']->value)) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['language_code']->value, ENT_QUOTES, 'UTF-8', true);?>
<?php } else { ?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['lang_iso']->value, ENT_QUOTES, 'UTF-8', true);?>
<?php }?>"><![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9 ie8" lang="<?php if (isset($_smarty_tpl->tpl_vars['language_code']->value)) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['language_code']->value, ENT_QUOTES, 'UTF-8', true);?>
<?php } else { ?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['lang_iso']->value, ENT_QUOTES, 'UTF-8', true);?>
<?php }?>"><![endif]-->
<!--[if gt IE 8]> <html class="no-js ie9" lang="<?php if (isset($_smarty_tpl->tpl_vars['language_code']->value)) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['language_code']->value, ENT_QUOTES, 'UTF-8', true);?>
<?php } else { ?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['lang_iso']->value, ENT_QUOTES, 'UTF-8', true);?>
<?php }?>"><![endif]-->
<html lang="<?php if (isset($_smarty_tpl->tpl_vars['language_code']->value)) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['language_code']->value, ENT_QUOTES, 'UTF-8', true);?>
<?php } else { ?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['lang_iso']->value, ENT_QUOTES, 'UTF-8', true);?>
<?php }?>">
	<head>
		<meta charset="utf-8" />
		<title><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['meta_title']->value, ENT_QUOTES, 'UTF-8', true);?>
</title>
<?php if (isset($_smarty_tpl->tpl_vars['meta_description']->value)&&$_smarty_tpl->tpl_vars['meta_description']->value) {?>
		<meta name="description" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['meta_description']->value, ENT_QUOTES, 'UTF-8', true);?>
" />
<?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['meta_keywords']->value)&&$_smarty_tpl->tpl_vars['meta_keywords']->value) {?>
		<meta name="keywords" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['meta_keywords']->value, ENT_QUOTES, 'UTF-8', true);?>
" />
<?php }?>
		<meta name="robots" content="<?php if (isset($_smarty_tpl->tpl_vars['nobots']->value)) {?>no<?php }?>index,<?php if (isset($_smarty_tpl->tpl_vars['nofollow']->value)&&$_smarty_tpl->tpl_vars['nofollow']->value) {?>no<?php }?>follow" />
		<?php if (isset($_smarty_tpl->tpl_vars['sttheme']->value['responsive'])&&$_smarty_tpl->tpl_vars['sttheme']->value['responsive']&&(!$_smarty_tpl->tpl_vars['sttheme']->value['enabled_version_swithing']||$_smarty_tpl->tpl_vars['sttheme']->value['version_switching']==0)) {?>
		<meta name="viewport" content="width=device-width, minimum-scale=0.25, maximum-scale=1.6, initial-scale=1.0" />
        <?php }?>
		<meta name="apple-mobile-web-app-capable" content="yes" />
		<link rel="icon" type="image/vnd.microsoft.icon" href="<?php echo $_smarty_tpl->tpl_vars['favicon_url']->value;?>
?<?php echo $_smarty_tpl->tpl_vars['img_update_time']->value;?>
" />
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo $_smarty_tpl->tpl_vars['favicon_url']->value;?>
?<?php echo $_smarty_tpl->tpl_vars['img_update_time']->value;?>
" />
		<?php if (isset($_smarty_tpl->tpl_vars['sttheme']->value['icon_iphone_57'])&&$_smarty_tpl->tpl_vars['sttheme']->value['icon_iphone_57']) {?>
        <link rel="apple-touch-icon" sizes="57x57" href="<?php echo $_smarty_tpl->tpl_vars['sttheme']->value['icon_iphone_57'];?>
" />
        <?php }?>
        <?php if (isset($_smarty_tpl->tpl_vars['sttheme']->value['icon_iphone_72'])&&$_smarty_tpl->tpl_vars['sttheme']->value['icon_iphone_72']) {?>
        <link rel="apple-touch-icon" sizes="72x72" href="<?php echo $_smarty_tpl->tpl_vars['sttheme']->value['icon_iphone_72'];?>
" />
        <?php }?>
        <?php if (isset($_smarty_tpl->tpl_vars['sttheme']->value['icon_iphone_114'])&&$_smarty_tpl->tpl_vars['sttheme']->value['icon_iphone_114']) {?>
        <link rel="apple-touch-icon" sizes="114x114" href="<?php echo $_smarty_tpl->tpl_vars['sttheme']->value['icon_iphone_114'];?>
" />
        <?php }?>
        <?php if (isset($_smarty_tpl->tpl_vars['sttheme']->value['icon_iphone_144'])&&$_smarty_tpl->tpl_vars['sttheme']->value['icon_iphone_144']) {?>
        <link rel="apple-touch-icon" sizes="144x144" href="<?php echo $_smarty_tpl->tpl_vars['sttheme']->value['icon_iphone_144'];?>
" />
        <?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['css_files']->value)) {?>
	<?php  $_smarty_tpl->tpl_vars['media'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['media']->_loop = false;
 $_smarty_tpl->tpl_vars['css_uri'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['css_files']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['media']->key => $_smarty_tpl->tpl_vars['media']->value) {
$_smarty_tpl->tpl_vars['media']->_loop = true;
 $_smarty_tpl->tpl_vars['css_uri']->value = $_smarty_tpl->tpl_vars['media']->key;
?>
		<link rel="stylesheet" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['css_uri']->value, ENT_QUOTES, 'UTF-8', true);?>
" type="text/css" media="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['media']->value, ENT_QUOTES, 'UTF-8', true);?>
" />
	<?php } ?>
<?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['sttheme']->value['custom_css'])&&count($_smarty_tpl->tpl_vars['sttheme']->value['custom_css'])) {?>
	<?php  $_smarty_tpl->tpl_vars['css_uri'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['css_uri']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['sttheme']->value['custom_css']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['css_uri']->key => $_smarty_tpl->tpl_vars['css_uri']->value) {
$_smarty_tpl->tpl_vars['css_uri']->_loop = true;
?>
	<link href="<?php echo $_smarty_tpl->tpl_vars['css_uri']->value;?>
" rel="stylesheet" type="text/css" media="<?php echo $_smarty_tpl->tpl_vars['sttheme']->value['custom_css_media'];?>
" />
	<?php } ?>
<?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['js_defer']->value)&&!$_smarty_tpl->tpl_vars['js_defer']->value&&isset($_smarty_tpl->tpl_vars['js_files']->value)&&isset($_smarty_tpl->tpl_vars['js_def']->value)) {?>
	<?php echo $_smarty_tpl->tpl_vars['js_def']->value;?>

	<?php  $_smarty_tpl->tpl_vars['js_uri'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['js_uri']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['js_files']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['js_uri']->key => $_smarty_tpl->tpl_vars['js_uri']->value) {
$_smarty_tpl->tpl_vars['js_uri']->_loop = true;
?>
	<script type="text/javascript" src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['js_uri']->value, ENT_QUOTES, 'UTF-8', true);?>
"></script>
	<?php } ?>
<?php }?>
<?php if (isset($_smarty_tpl->tpl_vars['sttheme']->value['custom_js'])&&$_smarty_tpl->tpl_vars['sttheme']->value['custom_js']) {?>
	<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['sttheme']->value['custom_js'];?>
"></script>
<?php }?>
		<?php echo $_smarty_tpl->tpl_vars['HOOK_HEADER']->value;?>

	</head>
	<body<?php if (isset($_smarty_tpl->tpl_vars['page_name']->value)) {?> id="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page_name']->value, ENT_QUOTES, 'UTF-8', true);?>
"<?php }?> class="<?php if (isset($_smarty_tpl->tpl_vars['page_name']->value)) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['page_name']->value, ENT_QUOTES, 'UTF-8', true);?>
<?php }?><?php if (isset($_smarty_tpl->tpl_vars['body_classes']->value)&&count($_smarty_tpl->tpl_vars['body_classes']->value)) {?> <?php echo smarty_function_implode(array('value'=>$_smarty_tpl->tpl_vars['body_classes']->value,'separator'=>' '),$_smarty_tpl);?>
<?php }?><?php if ($_smarty_tpl->tpl_vars['hide_left_column']->value) {?> hide-left-column<?php }?><?php if ($_smarty_tpl->tpl_vars['hide_right_column']->value) {?> hide-right-column<?php }?><?php if (isset($_smarty_tpl->tpl_vars['content_only']->value)&&$_smarty_tpl->tpl_vars['content_only']->value) {?> content_only<?php }?> lang_<?php echo $_smarty_tpl->tpl_vars['lang_iso']->value;?>
 
	<?php  $_smarty_tpl->tpl_vars['language'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['language']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['languages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['language']->key => $_smarty_tpl->tpl_vars['language']->value) {
$_smarty_tpl->tpl_vars['language']->_loop = true;
?>
		<?php if ($_smarty_tpl->tpl_vars['language']->value['iso_code']==$_smarty_tpl->tpl_vars['lang_iso']->value&&$_smarty_tpl->tpl_vars['language']->value['is_rtl']) {?>
			is_rtl
		<?php }?>
	<?php } ?>
	<?php if ($_smarty_tpl->tpl_vars['sttheme']->value['is_mobile_device']) {?> mobile_device <?php }?>">
	<?php if (!isset($_smarty_tpl->tpl_vars['content_only']->value)||!$_smarty_tpl->tpl_vars['content_only']->value) {?>
		<?php if (isset($_smarty_tpl->tpl_vars['restricted_country_mode']->value)&&$_smarty_tpl->tpl_vars['restricted_country_mode']->value) {?>
			<div id="restricted-country">
				<p><?php echo smartyTranslate(array('s'=>'You cannot place a new order from your country.'),$_smarty_tpl);?>
<?php if (isset($_smarty_tpl->tpl_vars['geolocation_country']->value)&&$_smarty_tpl->tpl_vars['geolocation_country']->value) {?> <span class="bold"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['geolocation_country']->value, ENT_QUOTES, 'UTF-8', true);?>
</span><?php }?></p>
			</div>
		<?php }?>
		<!--[if lt IE 9]>
		<p class="alert alert-warning">Please upgrade to Internet Explorer version 9 or download Firefox, Opera, Safari or Chrome.</p>
		<![endif]-->
		<div id="st-container" class="st-container st-effect-<?php echo (int)Configuration::get('STSN_SIDEBAR_TRANSITION');?>
">
			<div class="st-pusher">
				<div class="st-content"><!-- this is the wrapper for the content -->
					<div class="st-content-inner">
		<div id="body_wrapper">
			<?php if (isset($_smarty_tpl->tpl_vars['sttheme']->value['boxstyle'])&&$_smarty_tpl->tpl_vars['sttheme']->value['boxstyle']==2) {?><div id="page_wrapper"><?php }?>
			<div class="header-container <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['transparent_header']) {?> transparent-header <?php }?>">
				<header id="header">
					<?php $_smarty_tpl->_capture_stack[0][] = array("displayBanner", null, null); ob_start(); ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"displayBanner"),$_smarty_tpl);?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
					<?php if (isset(Smarty::$_smarty_vars['capture']['displayBanner'])&&trim(Smarty::$_smarty_vars['capture']['displayBanner'])) {?>
					<div class="banner">
							<?php echo Smarty::$_smarty_vars['capture']['displayBanner'];?>

					</div>
					<?php }?>
					<?php if ((isset($_smarty_tpl->tpl_vars['HOOK_NAV_LEFT']->value)&&trim($_smarty_tpl->tpl_vars['HOOK_NAV_LEFT']->value))||(isset($_smarty_tpl->tpl_vars['HOOK_NAV_RIGHT']->value)&&trim($_smarty_tpl->tpl_vars['HOOK_NAV_RIGHT']->value))) {?>
					<div id="top_bar" class="nav <?php echo (($tmp = @Configuration::get('STSN_HEADER_TOPBAR_SEP_TYPE'))===null||$tmp==='' ? 'vertical-s' : $tmp);?>
" >
						<div class="wide_container">
							<div class="container">
								<div class="row">
									<div class="col-xs-12 col-sm-12">
										<nav id="nav_left" class="clearfix"><?php echo $_smarty_tpl->tpl_vars['HOOK_NAV_LEFT']->value;?>
</nav>
										<nav id="nav_right" class="clearfix"><?php echo $_smarty_tpl->tpl_vars['HOOK_NAV_RIGHT']->value;?>
</nav>
									</div>
								</div>
							</div>					
						</div>
					</div>
					<?php }?>
					<div id="header_primary" class="animated fast">
						<div class="wide_container">
							<div class="container">
								<div id="header_primary_row" class="row">
									<div id="header_left" class="col-sm-12 col-md-<?php if (!isset($_smarty_tpl->tpl_vars['sttheme']->value['logo_position'])||!$_smarty_tpl->tpl_vars['sttheme']->value['logo_position']) {?><?php echo $_smarty_tpl->tpl_vars['sttheme']->value['logo_width'];?>
<?php } else { ?><?php echo (12-$_smarty_tpl->tpl_vars['sttheme']->value['logo_width'])/intval(2);?>
<?php }?> clearfix">
										<?php if (!isset($_smarty_tpl->tpl_vars['sttheme']->value['logo_position'])||!$_smarty_tpl->tpl_vars['sttheme']->value['logo_position']) {?>
											<a id="logo_left" href="<?php if (isset($_smarty_tpl->tpl_vars['force_ssl']->value)&&$_smarty_tpl->tpl_vars['force_ssl']->value) {?><?php echo $_smarty_tpl->tpl_vars['base_dir_ssl']->value;?>
<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
<?php }?>" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shop_name']->value, ENT_QUOTES, 'UTF-8', true);?>
">
												<img class="logo replace-2x" src="<?php echo $_smarty_tpl->tpl_vars['logo_url']->value;?>
" <?php if (isset($_smarty_tpl->tpl_vars['sttheme']->value['retina_logo'])&&$_smarty_tpl->tpl_vars['sttheme']->value['retina_logo']) {?> data-2x="<?php echo $_smarty_tpl->tpl_vars['link']->value->getMediaLink(((string)@constant('_MODULE_DIR_'))."stthemeeditor/".((string)htmlspecialchars($_smarty_tpl->tpl_vars['sttheme']->value['retina_logo'], ENT_QUOTES, 'UTF-8', true)));?>
"<?php }?> alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shop_name']->value, ENT_QUOTES, 'UTF-8', true);?>
"<?php if (isset($_smarty_tpl->tpl_vars['sttheme']->value['st_logo_image_width'])&&$_smarty_tpl->tpl_vars['sttheme']->value['st_logo_image_width']) {?> width="<?php echo $_smarty_tpl->tpl_vars['sttheme']->value['st_logo_image_width'];?>
"<?php }?><?php if (isset($_smarty_tpl->tpl_vars['sttheme']->value['st_logo_image_height'])&&$_smarty_tpl->tpl_vars['sttheme']->value['st_logo_image_height']) {?> height="<?php echo $_smarty_tpl->tpl_vars['sttheme']->value['st_logo_image_height'];?>
"<?php }?>/>
											</a>
										<?php }?>
										<?php if (isset($_smarty_tpl->tpl_vars['HOOK_HEADER_LEFT']->value)&&trim($_smarty_tpl->tpl_vars['HOOK_HEADER_LEFT']->value)) {?>
											<?php echo $_smarty_tpl->tpl_vars['HOOK_HEADER_LEFT']->value;?>

										<?php }?>
									</div>
									<?php if (isset($_smarty_tpl->tpl_vars['sttheme']->value['logo_position'])&&$_smarty_tpl->tpl_vars['sttheme']->value['logo_position']) {?>
										<div id="header_center" class="col-sm-12 col-md-<?php echo $_smarty_tpl->tpl_vars['sttheme']->value['logo_width'];?>
">
											<a id="logo_center" href="<?php if (isset($_smarty_tpl->tpl_vars['force_ssl']->value)&&$_smarty_tpl->tpl_vars['force_ssl']->value) {?><?php echo $_smarty_tpl->tpl_vars['base_dir_ssl']->value;?>
<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['base_dir']->value;?>
<?php }?>" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shop_name']->value, ENT_QUOTES, 'UTF-8', true);?>
">
												<img class="logo replace-2x" src="<?php echo $_smarty_tpl->tpl_vars['logo_url']->value;?>
" <?php if (isset($_smarty_tpl->tpl_vars['sttheme']->value['retina_logo'])&&$_smarty_tpl->tpl_vars['sttheme']->value['retina_logo']) {?> data-2x="<?php echo $_smarty_tpl->tpl_vars['link']->value->getMediaLink(((string)@constant('_MODULE_DIR_'))."stthemeeditor/".((string)htmlspecialchars($_smarty_tpl->tpl_vars['sttheme']->value['retina_logo'], ENT_QUOTES, 'UTF-8', true)));?>
"<?php }?> alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shop_name']->value, ENT_QUOTES, 'UTF-8', true);?>
"<?php if (isset($_smarty_tpl->tpl_vars['sttheme']->value['st_logo_image_width'])&&$_smarty_tpl->tpl_vars['sttheme']->value['st_logo_image_width']) {?> width="<?php echo $_smarty_tpl->tpl_vars['sttheme']->value['st_logo_image_width'];?>
"<?php }?><?php if (isset($_smarty_tpl->tpl_vars['sttheme']->value['st_logo_image_height'])&&$_smarty_tpl->tpl_vars['sttheme']->value['st_logo_image_height']) {?> height="<?php echo $_smarty_tpl->tpl_vars['sttheme']->value['st_logo_image_height'];?>
"<?php }?>/>
											</a>
										</div>
									<?php }?>
									<div id="header_right" class="col-sm-12 col-md-<?php if (isset($_smarty_tpl->tpl_vars['sttheme']->value['logo_position'])&&$_smarty_tpl->tpl_vars['sttheme']->value['logo_position']) {?><?php echo (12-$_smarty_tpl->tpl_vars['sttheme']->value['logo_width'])/ceil(2);?>
<?php } else { ?><?php echo 12-$_smarty_tpl->tpl_vars['sttheme']->value['logo_width'];?>
<?php }?>">
										<div id="header_top" class="row">
											<?php if ((isset($_smarty_tpl->tpl_vars['HOOK_HEADER_TOP_LEFT']->value)&&trim($_smarty_tpl->tpl_vars['HOOK_HEADER_TOP_LEFT']->value))&&(!isset($_smarty_tpl->tpl_vars['sttheme']->value['logo_position'])||!$_smarty_tpl->tpl_vars['sttheme']->value['logo_position'])) {?>
											<div id="header_top_left" class="col-sm-12 col-md-5">
												<?php echo $_smarty_tpl->tpl_vars['HOOK_HEADER_TOP_LEFT']->value;?>

											</div>
											<?php }?>
											<div id="header_top_right" class="col-sm-12 col-md-<?php if ((isset($_smarty_tpl->tpl_vars['sttheme']->value['logo_position'])&&$_smarty_tpl->tpl_vars['sttheme']->value['logo_position'])||(!isset($_smarty_tpl->tpl_vars['HOOK_HEADER_TOP_LEFT']->value)||!trim($_smarty_tpl->tpl_vars['HOOK_HEADER_TOP_LEFT']->value))) {?>12<?php } else { ?>7<?php }?> clearfix">
												<?php echo $_smarty_tpl->tpl_vars['HOOK_TOP']->value;?>

											</div>
										</div>
										<?php if ((!isset($_smarty_tpl->tpl_vars['sttheme']->value['logo_position'])||!$_smarty_tpl->tpl_vars['sttheme']->value['logo_position'])&&isset($_smarty_tpl->tpl_vars['HOOK_HEADER_BOTTOM']->value)&&trim($_smarty_tpl->tpl_vars['HOOK_HEADER_BOTTOM']->value)) {?>
										<div id="header_bottom" class="clearfix">
												<?php echo $_smarty_tpl->tpl_vars['HOOK_HEADER_BOTTOM']->value;?>

										</div>
										<?php }?>
									</div>
								</div>
							</div>
						</div>
					</div>
		            <?php if (isset($_smarty_tpl->tpl_vars['HOOK_MAIN_EMNU']->value)&&$_smarty_tpl->tpl_vars['HOOK_MAIN_EMNU']->value) {?>
		            <section id="top_extra">
		                <?php echo $_smarty_tpl->tpl_vars['HOOK_MAIN_EMNU']->value;?>

		            </section>
		            <?php }?>
		            <?php if ((isset($_smarty_tpl->tpl_vars['HOOK_MOBILE_BAR']->value)&&$_smarty_tpl->tpl_vars['HOOK_MOBILE_BAR']->value)||(isset($_smarty_tpl->tpl_vars['HOOK_MOBILE_BAR_LEFT']->value)&&$_smarty_tpl->tpl_vars['HOOK_MOBILE_BAR_LEFT']->value)||(isset($_smarty_tpl->tpl_vars['HOOK_MOBILE_BAR_RIGHT']->value)&&$_smarty_tpl->tpl_vars['HOOK_MOBILE_BAR_RIGHT']->value)) {?>
		            <section id="mobile_bar">
		            	<div class="container">
		                	<div id="mobile_bar_container" class="clearfix">
		                		<div id="mobile_bar_left"><?php if (isset($_smarty_tpl->tpl_vars['HOOK_MOBILE_BAR_LEFT']->value)&&$_smarty_tpl->tpl_vars['HOOK_MOBILE_BAR_LEFT']->value) {?><?php echo $_smarty_tpl->tpl_vars['HOOK_MOBILE_BAR_LEFT']->value;?>
<?php }?></div>
		                		<div id="mobile_bar_right"><?php if (isset($_smarty_tpl->tpl_vars['HOOK_MOBILE_BAR_RIGHT']->value)&&$_smarty_tpl->tpl_vars['HOOK_MOBILE_BAR_RIGHT']->value) {?><?php echo $_smarty_tpl->tpl_vars['HOOK_MOBILE_BAR_RIGHT']->value;?>
<?php }?></div>
		                		<div id="mobile_bar_center"><?php if (isset($_smarty_tpl->tpl_vars['HOOK_MOBILE_BAR']->value)&&$_smarty_tpl->tpl_vars['HOOK_MOBILE_BAR']->value) {?><?php echo $_smarty_tpl->tpl_vars['HOOK_MOBILE_BAR']->value;?>
<?php }?></div>
		                	</div>
		                </div>
		            </section>
		            <?php }?>
				</header>
			</div>
			<?php if (isset($_smarty_tpl->tpl_vars['HOOK_FULL_WIDTH_HOME_TOP']->value)&&$_smarty_tpl->tpl_vars['HOOK_FULL_WIDTH_HOME_TOP']->value) {?>
                <?php echo $_smarty_tpl->tpl_vars['HOOK_FULL_WIDTH_HOME_TOP']->value;?>

            <?php }?>
            <!-- Breadcrumb -->         
            <?php if ($_smarty_tpl->tpl_vars['page_name']->value!='index'&&$_smarty_tpl->tpl_vars['page_name']->value!='pagenotfound'&&$_smarty_tpl->tpl_vars['page_name']->value!='module-stblog-default') {?>
            <div id="breadcrumb_wrapper" class="<?php if (isset($_smarty_tpl->tpl_vars['sttheme']->value['breadcrumb_width'])&&$_smarty_tpl->tpl_vars['sttheme']->value['breadcrumb_width']) {?> wide_container <?php }?>"><div class="container"><div class="row">
                <div class="col-xs-12 clearfix">
                	<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_dir']->value)."./breadcrumb.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

                </div>
            </div></div></div>
            <?php }?>
			<!--/ Breadcrumb -->
			<div class="columns-container">
				<div id="columns" class="container">
					<?php $_smarty_tpl->_capture_stack[0][] = array("displayTopColumn", null, null); ob_start(); ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"displayTopColumn"),$_smarty_tpl);?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
					<?php if (isset(Smarty::$_smarty_vars['capture']['displayTopColumn'])&&trim(Smarty::$_smarty_vars['capture']['displayTopColumn'])) {?>
					<div id="slider_row" class="row">
						<div id="top_column" class="clearfix col-xs-12 col-sm-12"><?php echo Smarty::$_smarty_vars['capture']['displayTopColumn'];?>
</div>
					</div>
					<?php }?>
					<div class="row">
						<?php if (isset($_smarty_tpl->tpl_vars['left_column_size']->value)&&!empty($_smarty_tpl->tpl_vars['left_column_size']->value)) {?>
						<div id="left_column" class="column col-xxs-8 col-xs-6 col-sm-<?php echo intval($_smarty_tpl->tpl_vars['left_column_size']->value);?>
"><?php echo $_smarty_tpl->tpl_vars['HOOK_LEFT_COLUMN']->value;?>
</div>
						<?php }?>
						<?php if (isset($_smarty_tpl->tpl_vars['left_column_size']->value)&&isset($_smarty_tpl->tpl_vars['right_column_size']->value)) {?><?php $_smarty_tpl->tpl_vars['cols'] = new Smarty_variable((12-$_smarty_tpl->tpl_vars['left_column_size']->value-$_smarty_tpl->tpl_vars['right_column_size']->value), null, 0);?><?php } else { ?><?php $_smarty_tpl->tpl_vars['cols'] = new Smarty_variable(12, null, 0);?><?php }?>
						<div id="center_column" class="center_column col-xs-12 col-sm-<?php echo intval($_smarty_tpl->tpl_vars['cols']->value);?>
">
	<?php }?><?php }} ?>
