<?php /* Smarty version Smarty-3.1.19, created on 2017-01-04 18:00:12
         compiled from "D:\WWW\prestashop16110\modules\stthemeeditor\views\templates\hook\pro_thumbs_items_custom.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5835586cc7ac8c0a74-48799690%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e53331c181a8405d97c94e067ac2f4f9f49713c1' => 
    array (
      0 => 'D:\\WWW\\prestashop16110\\modules\\stthemeeditor\\views\\templates\\hook\\pro_thumbs_items_custom.tpl',
      1 => 1482908693,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5835586cc7ac8c0a74-48799690',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'st_responsive' => 0,
    'st_version_switching' => 0,
    'responsive_max' => 0,
    'pro_per_xl' => 0,
    'pro_per_lg' => 0,
    'pro_per_md' => 0,
    'pro_per_sm' => 0,
    'pro_per_xs' => 0,
    'pro_per_xxs' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_586cc7ac8ef879_98020713',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_586cc7ac8ef879_98020713')) {function content_586cc7ac8ef879_98020713($_smarty_tpl) {?>
<script type="text/javascript">
//<![CDATA[

if(pro_thumbs_items_custom)
    pro_thumbs_items_custom = [
        
        <?php if ($_smarty_tpl->tpl_vars['st_responsive']->value&&!$_smarty_tpl->tpl_vars['st_version_switching']->value) {?>
        <?php if ($_smarty_tpl->tpl_vars['responsive_max']->value==2) {?>[1420, <?php echo $_smarty_tpl->tpl_vars['pro_per_xl']->value;?>
],<?php }?>
        <?php if ($_smarty_tpl->tpl_vars['responsive_max']->value>=1) {?>[1180, <?php echo $_smarty_tpl->tpl_vars['pro_per_lg']->value;?>
],<?php }?>
        
        [972, <?php echo $_smarty_tpl->tpl_vars['pro_per_md']->value;?>
],
        [748, <?php echo $_smarty_tpl->tpl_vars['pro_per_sm']->value;?>
],
        [460, <?php echo $_smarty_tpl->tpl_vars['pro_per_xs']->value;?>
],
        [0, <?php echo $_smarty_tpl->tpl_vars['pro_per_xxs']->value;?>
]
        <?php } else { ?>
        [0, <?php if ($_smarty_tpl->tpl_vars['responsive_max']->value==2) {?><?php echo $_smarty_tpl->tpl_vars['pro_per_xl']->value;?>
<?php } elseif ($_smarty_tpl->tpl_vars['responsive_max']->value==1) {?><?php echo $_smarty_tpl->tpl_vars['pro_per_lg']->value;?>
<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['pro_per_md']->value;?>
<?php }?>]
        <?php }?>
    ];
 
//]]>
</script><?php }} ?>
