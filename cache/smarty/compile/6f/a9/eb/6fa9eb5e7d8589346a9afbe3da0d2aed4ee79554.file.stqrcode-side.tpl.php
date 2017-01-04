<?php /* Smarty version Smarty-3.1.19, created on 2017-01-04 17:58:26
         compiled from "D:\WWW\prestashop16110\modules\stqrcode\views\templates\hook\stqrcode-side.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1042586cc742175777-80342265%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6fa9eb5e7d8589346a9afbe3da0d2aed4ee79554' => 
    array (
      0 => 'D:\\WWW\\prestashop16110\\modules\\stqrcode\\views\\templates\\hook\\stqrcode-side.tpl',
      1 => 1482908693,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1042586cc742175777-80342265',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'image_link' => 0,
    'load_on_hover' => 0,
    'size' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_586cc7421812f2_52143739',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_586cc7421812f2_52143739')) {function content_586cc7421812f2_52143739($_smarty_tpl) {?>
<div class="st-menu" id="side_qrcode">
	<div class="divscroll">
		<div class="wrapperscroll">
			<div class="st-menu-header">
				<h3 class="st-menu-title"><?php echo smartyTranslate(array('s'=>'QR code','mod'=>'stqrcode'),$_smarty_tpl);?>
</h3>
		    	<a href="javascript:;" class="close_right_side" title="<?php echo smartyTranslate(array('s'=>'Close','mod'=>'stqrcode'),$_smarty_tpl);?>
"><i class="icon-angle-double-right icon-0x"></i></a>
			</div>
			<div id="qrcode_box">
				<a href="<?php echo $_smarty_tpl->tpl_vars['image_link']->value;?>
" class="qrcode_link" target="_blank" rel="nofollow" title="<?php echo smartyTranslate(array('s'=>'QR code','mod'=>'stqrcode'),$_smarty_tpl);?>
">
					<?php if ($_smarty_tpl->tpl_vars['load_on_hover']->value) {?>
					<i class="icon-spin5 animate-spin icon-1x"></i>
					<?php } else { ?>
					<img src="<?php echo $_smarty_tpl->tpl_vars['image_link']->value;?>
" width="<?php echo $_smarty_tpl->tpl_vars['size']->value;?>
" height="<?php echo $_smarty_tpl->tpl_vars['size']->value;?>
" />
					<?php }?>
				</a>
			</div>
		</div>
	</div>
</div><?php }} ?>
