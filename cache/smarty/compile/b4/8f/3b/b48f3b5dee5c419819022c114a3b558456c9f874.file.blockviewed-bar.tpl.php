<?php /* Smarty version Smarty-3.1.19, created on 2017-01-04 17:58:25
         compiled from "D:\WWW\prestashop16110\modules\blockviewed_mod\views\templates\hook\blockviewed-bar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9825586cc741d121f2-00564374%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b48f3b5dee5c419819022c114a3b558456c9f874' => 
    array (
      0 => 'D:\\WWW\\prestashop16110\\modules\\blockviewed_mod\\views\\templates\\hook\\blockviewed-bar.tpl',
      1 => 1482908692,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9825586cc741d121f2-00564374',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'products_viewed_nbr' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_586cc741d19ef5_31780195',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_586cc741d19ef5_31780195')) {function content_586cc741d19ef5_31780195($_smarty_tpl) {?>
<!-- /MODULE viewed products -->
<div id="rightbar_viewed" class="rightbar_wrap">
    <a id="rightbar_viewed_btn" href="javascript:;" class="rightbar_tri icon_wrap" title="<?php echo smartyTranslate(array('s'=>'Recently Viewed','mod'=>'blockviewed_mod'),$_smarty_tpl);?>
">
        <i class="icon-history icon-0x"></i>
        <span class="icon_text"><?php echo smartyTranslate(array('s'=>'Viewed','mod'=>'blockviewed_mod'),$_smarty_tpl);?>
</span>
        <span class="products_viewed_nbr amount_circle <?php if ($_smarty_tpl->tpl_vars['products_viewed_nbr']->value>9) {?> dozens <?php }?>"><?php echo $_smarty_tpl->tpl_vars['products_viewed_nbr']->value;?>
</span>
    </a>
</div>
<!-- /MODULE viewed products --><?php }} ?>
