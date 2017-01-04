<?php /* Smarty version Smarty-3.1.19, created on 2017-01-04 17:58:24
         compiled from "D:\WWW\prestashop16110\modules\stthemeeditor\views\templates\hook\stthemeeditor-header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1375586cc7409c65f6-99499954%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '048c95eb194c8238323239b410fa8e8c118a03ad' => 
    array (
      0 => 'D:\\WWW\\prestashop16110\\modules\\stthemeeditor\\views\\templates\\hook\\stthemeeditor-header.tpl',
      1 => 1482908693,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1375586cc7409c65f6-99499954',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'sttheme' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_586cc7409f53f6_03585250',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_586cc7409f53f6_03585250')) {function content_586cc7409f53f6_03585250($_smarty_tpl) {?>
<?php if (isset($_smarty_tpl->tpl_vars['sttheme']->value['version_switching'])&&$_smarty_tpl->tpl_vars['sttheme']->value['version_switching']==1) {?>
<style type="text/css">body{min-width:<?php if ($_smarty_tpl->tpl_vars['sttheme']->value['responsive_max']==2) {?>1440<?php } elseif ($_smarty_tpl->tpl_vars['sttheme']->value['responsive_max']==1) {?>1200<?php } else { ?>992<?php }?>px;}</style>
<?php }?>
<?php }} ?>
