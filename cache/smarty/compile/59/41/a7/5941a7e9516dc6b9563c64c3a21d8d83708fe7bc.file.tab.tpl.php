<?php /* Smarty version Smarty-3.1.19, created on 2017-01-04 18:00:11
         compiled from "D:\WWW\prestashop16110\modules\steasytabs\views\templates\hook\tab.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16047586cc7abc46ff4-34876272%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5941a7e9516dc6b9563c64c3a21d8d83708fe7bc' => 
    array (
      0 => 'D:\\WWW\\prestashop16110\\modules\\steasytabs\\views\\templates\\hook\\tab.tpl',
      1 => 1482908692,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16047586cc7abc46ff4-34876272',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'tabsHeader' => 0,
    'th' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_586cc7abc52b79_68812488',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_586cc7abc52b79_68812488')) {function content_586cc7abc52b79_68812488($_smarty_tpl) {?>
<?php  $_smarty_tpl->tpl_vars['th'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['th']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tabsHeader']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['th']->key => $_smarty_tpl->tpl_vars['th']->value) {
$_smarty_tpl->tpl_vars['th']->_loop = true;
?>
<li><a href="#idTab31<?php echo $_smarty_tpl->tpl_vars['th']->value['id_st_easy_tabs'];?>
" id="st_easy_tab_<?php echo $_smarty_tpl->tpl_vars['th']->value['id_st_easy_tabs'];?>
"><?php if ($_smarty_tpl->tpl_vars['th']->value['title']) {?><?php echo $_smarty_tpl->tpl_vars['th']->value['title'];?>
<?php } else { ?><?php echo smartyTranslate(array('s'=>'Custom tab','mod'=>'steasytabs'),$_smarty_tpl);?>
<?php }?></a></li>
<?php } ?><?php }} ?>
