<?php /* Smarty version Smarty-3.1.19, created on 2017-01-04 17:45:06
         compiled from "D:\WWW\prestashop16110\behind\themes\default\template\helpers\list\list_action_edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10572586cc422dd56f4-69459814%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b1aa11ed2ddaf839e6a45c41ab83f561529564d8' => 
    array (
      0 => 'D:\\WWW\\prestashop16110\\behind\\themes\\default\\template\\helpers\\list\\list_action_edit.tpl',
      1 => 1480062784,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10572586cc422dd56f4-69459814',
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
  'unifunc' => 'content_586cc422ddd3f6_73098821',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_586cc422ddd3f6_73098821')) {function content_586cc422ddd3f6_73098821($_smarty_tpl) {?>
<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['href']->value, ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['action']->value, ENT_QUOTES, 'UTF-8', true);?>
" class="edit">
	<i class="icon-pencil"></i> <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['action']->value, ENT_QUOTES, 'UTF-8', true);?>

</a><?php }} ?>
