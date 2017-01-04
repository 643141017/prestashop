<?php /* Smarty version Smarty-3.1.19, created on 2017-01-04 17:58:25
         compiled from "D:\WWW\prestashop16110\modules\stmultilink\views\templates\hook\stmultilink-footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:24238586cc741b50e75-67713906%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '24a3b9140134000fd58ad9fbfbfe042ce80e6b78' => 
    array (
      0 => 'D:\\WWW\\prestashop16110\\modules\\stmultilink\\views\\templates\\hook\\stmultilink-footer.tpl',
      1 => 1482908692,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '24238586cc741b50e75-67713906',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'link_groups' => 0,
    'link_group' => 0,
    'link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_586cc741b8f670_31026725',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_586cc741b8f670_31026725')) {function content_586cc741b8f670_31026725($_smarty_tpl) {?>

<!-- Block stlinkgroups footer module -->
<?php  $_smarty_tpl->tpl_vars['link_group'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['link_group']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['link_groups']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['link_group']->key => $_smarty_tpl->tpl_vars['link_group']->value) {
$_smarty_tpl->tpl_vars['link_group']->_loop = true;
?>
<section id="multilink_<?php echo $_smarty_tpl->tpl_vars['link_group']->value['id_st_multi_link_group'];?>
" class="stlinkgroups_links_footer col-xs-12 col-sm-<?php if ($_smarty_tpl->tpl_vars['link_group']->value['span']) {?><?php echo $_smarty_tpl->tpl_vars['link_group']->value['span'];?>
<?php } else { ?>3<?php }?> block <?php if ($_smarty_tpl->tpl_vars['link_group']->value['hide_on_mobile']) {?> hidden-xs <?php }?>">
    <a href="javascript:;" class="opener visible-xs">&nbsp;</a>
    <h3 class="title_block">
        <?php if ($_smarty_tpl->tpl_vars['link_group']->value['url']) {?><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link_group']->value['url'], ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['link_group']->value['name'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" <?php if (isset($_smarty_tpl->tpl_vars['link_group']->value['nofollow'])&&$_smarty_tpl->tpl_vars['link_group']->value['nofollow']) {?> rel="nofollow" <?php }?> <?php if (isset($_smarty_tpl->tpl_vars['link_group']->value['new_window'])&&$_smarty_tpl->tpl_vars['link_group']->value['new_window']) {?> target="_blank" <?php }?>><?php }?>
        <?php if ($_smarty_tpl->tpl_vars['link_group']->value['icon_class']) {?><i class="<?php echo $_smarty_tpl->tpl_vars['link_group']->value['icon_class'];?>
 icon-mar-r4"></i><?php }?><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['link_group']->value['name'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>

        <?php if ($_smarty_tpl->tpl_vars['link_group']->value['url']) {?></a><?php }?>
    </h3>
    <ul class="footer_block_content bullet custom_links_list">
    <?php if ($_smarty_tpl->tpl_vars['link_group']->value['links']) {?>
    <?php  $_smarty_tpl->tpl_vars['link'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['link']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['link_group']->value['links']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['link']->key => $_smarty_tpl->tpl_vars['link']->value) {
$_smarty_tpl->tpl_vars['link']->_loop = true;
?>
    	<li>
    		<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value['url'], ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['link']->value['title'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" <?php if (isset($_smarty_tpl->tpl_vars['link']->value['nofollow'])&&$_smarty_tpl->tpl_vars['link']->value['nofollow']) {?> rel="nofollow" <?php }?> <?php if ($_smarty_tpl->tpl_vars['link']->value['new_window']) {?> target="_blank" <?php }?>>
                <?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['link']->value['label'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>

    		</a>
    	</li>
    <?php } ?>
    <?php }?>
    </ul>
</section>
<?php } ?>
<!-- /Block stlinkgroups footer module --><?php }} ?>
