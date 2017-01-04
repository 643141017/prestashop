<?php /* Smarty version Smarty-3.1.19, created on 2017-01-04 17:58:27
         compiled from "D:\WWW\prestashop16110\modules\stbanner\views\templates\hook\stbanner-column.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19470586cc74329a6f7-42300901%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '97c6b0ca5cb7bf1185ea768cc5702cf654dcf0e8' => 
    array (
      0 => 'D:\\WWW\\prestashop16110\\modules\\stbanner\\views\\templates\\hook\\stbanner-column.tpl',
      1 => 1482908692,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19470586cc74329a6f7-42300901',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'columns_data' => 0,
    'column' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_586cc7432c5678_49782274',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_586cc7432c5678_49782274')) {function content_586cc7432c5678_49782274($_smarty_tpl) {?><!-- MODULE st banner column -->
<?php if (isset($_smarty_tpl->tpl_vars['columns_data']->value)) {?>
    <div class="row">
        <?php  $_smarty_tpl->tpl_vars['column'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['column']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['columns_data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['column']->key => $_smarty_tpl->tpl_vars['column']->value) {
$_smarty_tpl->tpl_vars['column']->_loop = true;
?>
            <?php if ((isset($_smarty_tpl->tpl_vars['column']->value['columns'])&&count($_smarty_tpl->tpl_vars['column']->value['columns']))||(isset($_smarty_tpl->tpl_vars['column']->value['banners'])&&count($_smarty_tpl->tpl_vars['column']->value['banners']))) {?>
                <div id="banner_box_<?php echo $_smarty_tpl->tpl_vars['column']->value['id_st_banner_group'];?>
" class="col-sm-<?php echo $_smarty_tpl->tpl_vars['column']->value['width'];?>
 banner_col <?php if (isset($_smarty_tpl->tpl_vars['column']->value['banner_b'])&&$_smarty_tpl->tpl_vars['column']->value['banner_b']) {?> banner_b<?php }?> <?php if ($_smarty_tpl->tpl_vars['column']->value['hide_on_mobile']) {?> hidden-xs <?php }?>" data-height="<?php echo $_smarty_tpl->tpl_vars['column']->value['height'];?>
" >
                    <?php if (isset($_smarty_tpl->tpl_vars['column']->value['banners'])&&count($_smarty_tpl->tpl_vars['column']->value['banners'])) {?>
                        <?php echo $_smarty_tpl->getSubTemplate ("./stbanner-block.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array('banner_data'=>$_smarty_tpl->tpl_vars['column']->value['banners'][0],'banner_height'=>$_smarty_tpl->tpl_vars['column']->value['height_px']), 0);?>

                    <?php } else { ?>
                        <?php echo $_smarty_tpl->getSubTemplate ("./stbanner-column.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array('columns_data'=>$_smarty_tpl->tpl_vars['column']->value['columns']), 0);?>

                    <?php }?>
                </div>
            <?php }?>
        <?php } ?>        
    </div>
<?php }?>
<!--/ MODULE st banner column--><?php }} ?>
