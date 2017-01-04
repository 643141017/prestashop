<?php /* Smarty version Smarty-3.1.19, created on 2017-01-04 17:58:25
         compiled from "D:\WWW\prestashop16110\modules\blockcart_mod\views\templates\hook\blockcart-rightbar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5739586cc741cdf571-07217941%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6c1d73199bec054e93c62ac2af3ad6dba24ebecd' => 
    array (
      0 => 'D:\\WWW\\prestashop16110\\modules\\blockcart_mod\\views\\templates\\hook\\blockcart-rightbar.tpl',
      1 => 1482908691,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5739586cc741cdf571-07217941',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'order_process' => 0,
    'link' => 0,
    'cart_qties' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_586cc741cf2df5_93420147',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_586cc741cf2df5_93420147')) {function content_586cc741cf2df5_93420147($_smarty_tpl) {?>
<!-- /MODULE Rightbar cart -->
<div id="rightbar_cart" class="rightbar_wrap">
    <a id="rightbar-shopping_cart" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink($_smarty_tpl->tpl_vars['order_process']->value,true), ENT_QUOTES, 'UTF-8', true);?>
" class="rightbar_tri icon_wrap" title="<?php echo smartyTranslate(array('s'=>'View my shopping cart','mod'=>'blockcart_mod'),$_smarty_tpl);?>
">
        <i class="icon-glyph icon_btn icon-0x"></i>
        <span class="icon_text"><?php echo smartyTranslate(array('s'=>'Cart','mod'=>'blockcart_mod'),$_smarty_tpl);?>
</span>
        <span class="ajax_cart_quantity amount_circle <?php if ($_smarty_tpl->tpl_vars['cart_qties']->value==0) {?> simple_hidden <?php }?><?php if ($_smarty_tpl->tpl_vars['cart_qties']->value>9) {?> dozens <?php }?>"><?php echo $_smarty_tpl->tpl_vars['cart_qties']->value;?>
</span>
    </a>
</div>
<!-- /MODULE Rightbar cart --><?php }} ?>
