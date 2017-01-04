<?php /* Smarty version Smarty-3.1.19, created on 2017-01-04 17:58:27
         compiled from "D:\WWW\prestashop16110\modules\stbanner\views\templates\hook\stbanner-block.tpl" */ ?>
<?php /*%%SmartyHeaderCode:22063586cc7432d5073-02875270%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6c7637572e7f4c45097173ce8c6aeb18b45a6eaf' => 
    array (
      0 => 'D:\\WWW\\prestashop16110\\modules\\stbanner\\views\\templates\\hook\\stbanner-block.tpl',
      1 => 1482908692,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '22063586cc7432d5073-02875270',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'banner_data' => 0,
    'banner_height' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_586cc743313872_77610321',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_586cc743313872_77610321')) {function content_586cc743313872_77610321($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['banner_data']->value['url']) {?>
    <a id="st_banner_block_<?php echo $_smarty_tpl->tpl_vars['banner_data']->value['id_st_banner'];?>
" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['banner_data']->value['url'], ENT_QUOTES, 'UTF-8', true);?>
" class="st_banner_block_<?php echo $_smarty_tpl->tpl_vars['banner_data']->value['id_st_banner'];?>
 st_banner_block" target="<?php if ($_smarty_tpl->tpl_vars['banner_data']->value['new_window']) {?>_blank<?php } else { ?>_self<?php }?>" title="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['banner_data']->value['title'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" style="height:<?php echo $_smarty_tpl->tpl_vars['banner_height']->value;?>
px;">
<?php } else { ?>
    <div id="st_banner_block_<?php echo $_smarty_tpl->tpl_vars['banner_data']->value['id_st_banner'];?>
" class="st_banner_block_<?php echo $_smarty_tpl->tpl_vars['banner_data']->value['id_st_banner'];?>
 st_banner_block" style="height:<?php echo $_smarty_tpl->tpl_vars['banner_height']->value;?>
px;">
<?php }?>
    <div class="st_banner_image" style="<?php if (isset($_smarty_tpl->tpl_vars['banner_data']->value['image_multi_lang'])&&$_smarty_tpl->tpl_vars['banner_data']->value['image_multi_lang']) {?>background-image:url(<?php echo $_smarty_tpl->tpl_vars['banner_data']->value['image_multi_lang'];?>
);<?php }?><?php if (isset($_smarty_tpl->tpl_vars['banner_data']->value['bg_color'])&&$_smarty_tpl->tpl_vars['banner_data']->value['bg_color']) {?>background-color:<?php echo $_smarty_tpl->tpl_vars['banner_data']->value['bg_color'];?>
;<?php }?>"></div>
<?php if ($_smarty_tpl->tpl_vars['banner_data']->value['description']) {?>
    <div class="banner_text text_table_wrap <?php if ($_smarty_tpl->tpl_vars['banner_data']->value['hide_text_on_mobile']) {?> hidden-xs <?php }?>">
        <div class="text_table">
            <div class="text_td style_content <?php if ($_smarty_tpl->tpl_vars['banner_data']->value['text_align']==1) {?> text-left <?php } elseif ($_smarty_tpl->tpl_vars['banner_data']->value['text_align']==3) {?> text-right <?php } else { ?> text-center <?php }?> banner_text_<?php echo (($tmp = @$_smarty_tpl->tpl_vars['banner_data']->value['text_position'])===null||$tmp==='' ? 'center' : $tmp);?>
">
                <?php if ($_smarty_tpl->tpl_vars['banner_data']->value['description']) {?><?php echo $_smarty_tpl->tpl_vars['banner_data']->value['description'];?>
<?php }?>
            </div>
        </div>
    </div>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['banner_data']->value['url']) {?>
    </a>
<?php } else { ?>
    </div>
<?php }?><?php }} ?>
