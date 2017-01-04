<?php /* Smarty version Smarty-3.1.19, created on 2017-01-04 17:58:26
         compiled from "D:\WWW\prestashop16110\modules\steasycontent\views\templates\hook\steasycontent.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7999586cc742424f75-31033966%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '16aeef1a7dfa5150a8f850665dfcbbbaa24faab2' => 
    array (
      0 => 'D:\\WWW\\prestashop16110\\modules\\steasycontent\\views\\templates\\hook\\steasycontent.tpl',
      1 => 1482908692,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7999586cc742424f75-31033966',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'easy_content' => 0,
    'is_full_width' => 0,
    'ec' => 0,
    'is_inline_content' => 0,
    'is_column' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_586cc74247ae76_22672280',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_586cc74247ae76_22672280')) {function content_586cc74247ae76_22672280($_smarty_tpl) {?>
<!-- MODULE st easy content -->
<?php if (count($_smarty_tpl->tpl_vars['easy_content']->value)>0) {?>
    <?php  $_smarty_tpl->tpl_vars['ec'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ec']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['easy_content']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ec']->key => $_smarty_tpl->tpl_vars['ec']->value) {
$_smarty_tpl->tpl_vars['ec']->_loop = true;
?>
        <?php if (isset($_smarty_tpl->tpl_vars['is_full_width']->value)&&$_smarty_tpl->tpl_vars['is_full_width']->value) {?><div id="easycontent_container_<?php echo $_smarty_tpl->tpl_vars['ec']->value['id_st_easy_content'];?>
" class="easycontent_container full_container <?php if ($_smarty_tpl->tpl_vars['ec']->value['hide_on_mobile']) {?>hidden-xs<?php }?> <?php if (!isset($_smarty_tpl->tpl_vars['is_inline_content']->value)) {?>block<?php }?>"><div class="container"><div class="row"><div class="col-xs-12 col-sm-12"><?php }?>
            <aside id="easycontent_<?php echo $_smarty_tpl->tpl_vars['ec']->value['id_st_easy_content'];?>
" class="easycontent_<?php echo $_smarty_tpl->tpl_vars['ec']->value['id_st_easy_content'];?>
 <?php if ($_smarty_tpl->tpl_vars['ec']->value['hide_on_mobile']) {?>hidden-xs<?php }?> <?php if (!isset($_smarty_tpl->tpl_vars['is_inline_content']->value)&&(!isset($_smarty_tpl->tpl_vars['is_full_width']->value)||!$_smarty_tpl->tpl_vars['is_full_width']->value)) {?>block<?php }?> easycontent <?php if (isset($_smarty_tpl->tpl_vars['is_column']->value)&&$_smarty_tpl->tpl_vars['is_column']->value) {?> column_block <?php }?>">
                <?php if ($_smarty_tpl->tpl_vars['ec']->value['title']) {?>
                <h3 class="title_block">
                    <?php if ($_smarty_tpl->tpl_vars['ec']->value['url']) {?><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ec']->value['url'], ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ec']->value['title'], ENT_QUOTES, 'UTF-8', true);?>
"><?php } else { ?><span><?php }?>
                    <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['ec']->value['title'], ENT_QUOTES, 'UTF-8', true);?>

                    <?php if ($_smarty_tpl->tpl_vars['ec']->value['url']) {?></a><?php } else { ?></span><?php }?>
                </h3>
                <?php }?>
            	<div class="style_content <?php if ($_smarty_tpl->tpl_vars['ec']->value['text_align']==2) {?> text-center <?php } elseif ($_smarty_tpl->tpl_vars['ec']->value['text_align']==3) {?> text-right <?php }?> <?php if ($_smarty_tpl->tpl_vars['ec']->value['width']) {?> center_width_<?php echo $_smarty_tpl->tpl_vars['ec']->value['width'];?>
 <?php }?> block_content">
                    <?php echo stripslashes($_smarty_tpl->tpl_vars['ec']->value['text']);?>

            	</div>
            </aside>
        <?php if (isset($_smarty_tpl->tpl_vars['is_full_width']->value)&&$_smarty_tpl->tpl_vars['is_full_width']->value) {?></div></div></div></div><?php }?>
    <?php } ?>
<?php }?>
<!-- MODULE st easy content --><?php }} ?>
