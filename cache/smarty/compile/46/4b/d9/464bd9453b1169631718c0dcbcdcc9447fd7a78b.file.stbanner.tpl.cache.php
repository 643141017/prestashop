<?php /* Smarty version Smarty-3.1.19, created on 2017-01-04 17:58:27
         compiled from "D:\WWW\prestashop16110\modules\stbanner\views\templates\hook\stbanner.tpl" */ ?>
<?php /*%%SmartyHeaderCode:521586cc743250372-70052159%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '464bd9453b1169631718c0dcbcdcc9447fd7a78b' => 
    array (
      0 => 'D:\\WWW\\prestashop16110\\modules\\stbanner\\views\\templates\\hook\\stbanner.tpl',
      1 => 1482908692,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '521586cc743250372-70052159',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'groups' => 0,
    'is_full_width' => 0,
    'group' => 0,
    'is_column' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_586cc74328acf3_53710705',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_586cc74328acf3_53710705')) {function content_586cc74328acf3_53710705($_smarty_tpl) {?><!-- MODULE st banner -->
<?php if (isset($_smarty_tpl->tpl_vars['groups']->value)) {?>
    <?php  $_smarty_tpl->tpl_vars['group'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['group']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['groups']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['group']->key => $_smarty_tpl->tpl_vars['group']->value) {
$_smarty_tpl->tpl_vars['group']->_loop = true;
?>
        <?php if ($_smarty_tpl->tpl_vars['is_full_width']->value) {?><div id="banner_container_<?php echo $_smarty_tpl->tpl_vars['group']->value['id_st_banner_group'];?>
" class="banner_container full_container <?php if ($_smarty_tpl->tpl_vars['group']->value['hide_on_mobile']) {?> hidden-xs <?php }?> block"><div class="container"><?php }?>
            <div id="st_banner_<?php echo $_smarty_tpl->tpl_vars['group']->value['id_st_banner_group'];?>
" class="st_banner_row <?php if (!$_smarty_tpl->tpl_vars['is_full_width']->value) {?> block <?php }?> <?php if ($_smarty_tpl->tpl_vars['group']->value['hide_on_mobile']) {?> hidden-xs <?php }?><?php if ($_smarty_tpl->tpl_vars['group']->value['hover_effect']) {?> hover_effect_<?php echo $_smarty_tpl->tpl_vars['group']->value['hover_effect'];?>
 <?php }?> <?php if (isset($_smarty_tpl->tpl_vars['is_column']->value)&&$_smarty_tpl->tpl_vars['is_column']->value) {?> column_block <?php }?>">
                <?php if (isset($_smarty_tpl->tpl_vars['group']->value['banners'])&&count($_smarty_tpl->tpl_vars['group']->value['banners'])) {?>
                    <div class="row block_content">
                        <div id="banner_box_<?php echo $_smarty_tpl->tpl_vars['group']->value['id_st_banner_group'];?>
" class="col-sm-12 banner_col" data-height="100">
                            <?php echo $_smarty_tpl->getSubTemplate ("./stbanner-block.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array('banner_data'=>$_smarty_tpl->tpl_vars['group']->value['banners'][0],'banner_height'=>$_smarty_tpl->tpl_vars['group']->value['height']), 0);?>

                        </div>
                    </div>
                <?php } elseif (isset($_smarty_tpl->tpl_vars['group']->value['columns'])) {?>
                    <?php echo $_smarty_tpl->getSubTemplate ("./stbanner-column.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array('columns_data'=>$_smarty_tpl->tpl_vars['group']->value['columns']), 0);?>

                <?php }?>
            </div>
        <?php if ($_smarty_tpl->tpl_vars['is_full_width']->value) {?></div></div><?php }?>
    <?php } ?>
<?php }?>
<!--/ MODULE st banner --><?php }} ?>
