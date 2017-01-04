<?php /* Smarty version Smarty-3.1.19, created on 2017-01-04 17:58:25
         compiled from "D:\WWW\prestashop16110\modules\stblog\views\templates\hook\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16727586cc7411e6bf9-54264352%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '081ad1add089f514b405503d461877ad94a566ee' => 
    array (
      0 => 'D:\\WWW\\prestashop16110\\modules\\stblog\\views\\templates\\hook\\header.tpl',
      1 => 1482908692,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16727586cc7411e6bf9-54264352',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ss_slideshow' => 0,
    'ss_s_speed' => 0,
    'ss_a_speed' => 0,
    'ss_pause' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_586cc7411f65f9_19286156',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_586cc7411f65f9_19286156')) {function content_586cc7411f65f9_19286156($_smarty_tpl) {?>
<script type="text/javascript">
// <![CDATA[

blog_flexslider_options = {
	
    autoPlay : <?php if ($_smarty_tpl->tpl_vars['ss_slideshow']->value) {?><?php echo (($tmp = @$_smarty_tpl->tpl_vars['ss_s_speed']->value)===null||$tmp==='' ? 5000 : $tmp);?>
<?php } else { ?>false<?php }?>,
    slideSpeed: <?php if (!$_smarty_tpl->tpl_vars['ss_a_speed']->value) {?>0<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['ss_a_speed']->value;?>
<?php }?>,
    stopOnHover: <?php if ($_smarty_tpl->tpl_vars['ss_pause']->value) {?>true<?php } else { ?>false<?php }?>,
    
};
//]]>
</script>
<?php }} ?>
