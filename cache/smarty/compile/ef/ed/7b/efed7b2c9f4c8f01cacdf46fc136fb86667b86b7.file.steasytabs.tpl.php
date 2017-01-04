<?php /* Smarty version Smarty-3.1.19, created on 2017-01-04 18:00:11
         compiled from "D:\WWW\prestashop16110\modules\steasytabs\views\templates\hook\steasytabs.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12988586cc7abc81976-99927596%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'efed7b2c9f4c8f01cacdf46fc136fb86667b86b7' => 
    array (
      0 => 'D:\\WWW\\prestashop16110\\modules\\steasytabs\\views\\templates\\hook\\steasytabs.tpl',
      1 => 1482908692,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12988586cc7abc81976-99927596',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tabsContent' => 0,
    'tc' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_586cc7abc8d4f2_64325802',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_586cc7abc8d4f2_64325802')) {function content_586cc7abc8d4f2_64325802($_smarty_tpl) {?>

<!-- Block extra tabs -->
<?php  $_smarty_tpl->tpl_vars['tc'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tc']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tabsContent']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['tc']->key => $_smarty_tpl->tpl_vars['tc']->value) {
$_smarty_tpl->tpl_vars['tc']->_loop = true;
?>
<div id="idTab31<?php echo $_smarty_tpl->tpl_vars['tc']->value['id_st_easy_tabs'];?>
" class="product_accordion block_hidden_only_for_screen">
    <a href="javascript:;" class="opener">&nbsp;</a>
    <div class="product_accordion_title">
        <?php echo $_smarty_tpl->tpl_vars['tc']->value['title'];?>

    </div>
	<div class="pa_content steasytabs_content">
	   <?php echo $_smarty_tpl->tpl_vars['tc']->value['content'];?>

	</div>
</div>
<?php } ?>
<!-- /Block extra tabs --><?php }} ?>
