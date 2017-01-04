<?php /* Smarty version Smarty-3.1.19, created on 2017-01-04 17:58:25
         compiled from "D:\WWW\prestashop16110\modules\stmegamenu\views\templates\hook\stmegamenu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8368586cc741793df9-14915243%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b764df34f17a567328a9c8d1768a46b944120684' => 
    array (
      0 => 'D:\\WWW\\prestashop16110\\modules\\stmegamenu\\views\\templates\\hook\\stmegamenu.tpl',
      1 => 1482908692,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8368586cc741793df9-14915243',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'stmenu' => 0,
    'megamenu_width' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_586cc7417a7675_00705586',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_586cc7417a7675_00705586')) {function content_586cc7417a7675_00705586($_smarty_tpl) {?>
<?php if (isset($_smarty_tpl->tpl_vars['stmenu']->value)&&is_array($_smarty_tpl->tpl_vars['stmenu']->value)&&count($_smarty_tpl->tpl_vars['stmenu']->value)) {?>
<!-- Menu -->
<?php if (!isset($_smarty_tpl->tpl_vars['megamenu_width']->value)||!$_smarty_tpl->tpl_vars['megamenu_width']->value) {?>
<div class="wide_container boxed_megamenu">
<?php }?>
<div id="st_mega_menu_container" class="animated fast">
	<div class="container">
		<nav id="st_mega_menu_wrap" role="navigation">
	    	<?php echo $_smarty_tpl->getSubTemplate ("./stmegamenu-ul.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>

		</nav>
	</div>
</div>
<?php if (!isset($_smarty_tpl->tpl_vars['megamenu_width']->value)||!$_smarty_tpl->tpl_vars['megamenu_width']->value) {?>
</div>
<?php }?>
<!--/ Menu -->
<?php }?><?php }} ?>
