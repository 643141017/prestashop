<?php /* Smarty version Smarty-3.1.19, created on 2017-01-04 17:58:26
         compiled from "D:\WWW\prestashop16110\modules\blockcart_mod\views\templates\hook\blockcart-mobilebar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:21005586cc742d9ad75-60511697%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e802f8956c0ba0d322bcf8d61340f56567efd53f' => 
    array (
      0 => 'D:\\WWW\\prestashop16110\\modules\\blockcart_mod\\views\\templates\\hook\\blockcart-mobilebar.tpl',
      1 => 1482908691,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21005586cc742d9ad75-60511697',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'cart_qties' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_586cc742da2a76_00698219',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_586cc742da2a76_00698219')) {function content_586cc742da2a76_00698219($_smarty_tpl) {?>
<!-- /MODULE mobile cart -->
<a id="mobile_bar_cart_tri" class="mobile_bar_tri" href="javascript:;" rel="nofollow">
	<div class="ajax_cart_bag">
		<span class="ajax_cart_quantity amount_circle <?php if ($_smarty_tpl->tpl_vars['cart_qties']->value>9) {?> dozens <?php }?>"><?php echo $_smarty_tpl->tpl_vars['cart_qties']->value;?>
</span>
		<span class="ajax_cart_bg_handle"></span>
	</div>
	<span class="mobile_bar_tri_text"><?php echo smartyTranslate(array('s'=>'Cart','mod'=>'blockcart_mod'),$_smarty_tpl);?>
</span>
</a>
<!-- /MODULE mobile cart --><?php }} ?>
