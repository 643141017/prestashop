<?php /* Smarty version Smarty-3.1.19, created on 2017-01-04 17:58:25
         compiled from "D:\WWW\prestashop16110\modules\stmegamenu\views\templates\hook\stmobilemenu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1652586cc741f11d79-31697828%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '09444d8f853c030d2d438483856b874818134849' => 
    array (
      0 => 'D:\\WWW\\prestashop16110\\modules\\stmegamenu\\views\\templates\\hook\\stmobilemenu.tpl',
      1 => 1482908692,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1652586cc741f11d79-31697828',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_586cc741f15bf9_51877637',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_586cc741f15bf9_51877637')) {function content_586cc741f15bf9_51877637($_smarty_tpl) {?>
<!-- MODULE st megamenu -->
<div class="st-menu st-menu-right" id="side_stmobilemenu">
	<div class="divscroll">
		<div class="wrapperscroll">
			<div class="st-menu-header">
				<h3 class="st-menu-title"><?php echo smartyTranslate(array('s'=>'Menu','mod'=>'stmegamenu'),$_smarty_tpl);?>
</h3>
		    	<a href="javascript:;" class="close_right_side" title="<?php echo smartyTranslate(array('s'=>'Close','mod'=>'stmegamenu'),$_smarty_tpl);?>
"><i class="icon-angle-double-left icon-0x"></i></a>
			</div>
			<div id="st_mobile_menu" class="stmobilemenu_box">
				<?php echo $_smarty_tpl->getSubTemplate ("./stmobilemenu-ul.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>

			</div>
		</div>
	</div>
</div>
<!-- /MODULE st megamenu --><?php }} ?>
