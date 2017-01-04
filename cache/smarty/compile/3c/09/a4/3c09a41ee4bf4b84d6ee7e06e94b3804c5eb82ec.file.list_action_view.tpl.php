<?php /* Smarty version Smarty-3.1.19, created on 2017-01-04 18:07:53
         compiled from "D:\WWW\prestashop16110\behind\themes\default\template\helpers\list\list_action_view.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2296586cc9792159f9-13151151%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3c09a41ee4bf4b84d6ee7e06e94b3804c5eb82ec' => 
    array (
      0 => 'D:\\WWW\\prestashop16110\\behind\\themes\\default\\template\\helpers\\list\\list_action_view.tpl',
      1 => 1480062784,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2296586cc9792159f9-13151151',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'href' => 0,
    'action' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_586cc979221578_45332505',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_586cc979221578_45332505')) {function content_586cc979221578_45332505($_smarty_tpl) {?>
<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['href']->value, ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['action']->value, ENT_QUOTES, 'UTF-8', true);?>
" >
	<i class="icon-search-plus"></i> <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['action']->value, ENT_QUOTES, 'UTF-8', true);?>

</a><?php }} ?>
