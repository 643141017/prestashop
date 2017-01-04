<?php /* Smarty version Smarty-3.1.19, created on 2017-01-04 17:45:14
         compiled from "D:\WWW\prestashop16110\behind\themes\default\template\helpers\list\list_action_default.tpl" */ ?>
<?php /*%%SmartyHeaderCode:28241586cc42a3dabf2-92149199%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7803fd86c2c96043d861271016bdac6b5839f69d' => 
    array (
      0 => 'D:\\WWW\\prestashop16110\\behind\\themes\\default\\template\\helpers\\list\\list_action_default.tpl',
      1 => 1480062784,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '28241586cc42a3dabf2-92149199',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'href' => 0,
    'action' => 0,
    'name' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_586cc42a3e6775_74484674',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_586cc42a3e6775_74484674')) {function content_586cc42a3e6775_74484674($_smarty_tpl) {?>
<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['href']->value, ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
"<?php if (isset($_smarty_tpl->tpl_vars['name']->value)) {?> name="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['name']->value, ENT_QUOTES, 'UTF-8', true);?>
"<?php }?> class="default">
	<i class="icon-asterisk"></i> <?php echo $_smarty_tpl->tpl_vars['action']->value;?>

</a><?php }} ?>
