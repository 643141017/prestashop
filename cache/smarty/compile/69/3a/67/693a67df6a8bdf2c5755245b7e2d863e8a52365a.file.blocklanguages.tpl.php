<?php /* Smarty version Smarty-3.1.19, created on 2017-01-04 17:58:26
         compiled from "D:\WWW\prestashop16110\modules\blocklanguages_mod\views\templates\hook\blocklanguages.tpl" */ ?>
<?php /*%%SmartyHeaderCode:27089586cc742b6c3f7-75643144%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '693a67df6a8bdf2c5755245b7e2d863e8a52365a' => 
    array (
      0 => 'D:\\WWW\\prestashop16110\\modules\\blocklanguages_mod\\views\\templates\\hook\\blocklanguages.tpl',
      1 => 1482908691,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '27089586cc742b6c3f7-75643144',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'languages' => 0,
    'language' => 0,
    'lang_iso' => 0,
    'display_flags' => 0,
    'img_lang_dir' => 0,
    'indice_lang' => 0,
    'lang_rewrite_urls' => 0,
    'link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_586cc742baea73_90772750',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_586cc742baea73_90772750')) {function content_586cc742baea73_90772750($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_regex_replace')) include 'D:\\WWW\\prestashop16110\\tools\\smarty\\plugins\\modifier.regex_replace.php';
?>
<!-- Block languages module -->
<div id="languages-block-top-mod" class="languages-block top_bar_item dropdown_wrap">
	<?php  $_smarty_tpl->tpl_vars['language'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['language']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['languages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['language']->key => $_smarty_tpl->tpl_vars['language']->value) {
$_smarty_tpl->tpl_vars['language']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['language']->key;
?>
		<?php if ($_smarty_tpl->tpl_vars['language']->value['iso_code']==$_smarty_tpl->tpl_vars['lang_iso']->value) {?>
			<div class="dropdown_tri <?php if (count($_smarty_tpl->tpl_vars['languages']->value)>1) {?> dropdown_tri_in <?php }?> header_item">
	            <?php if ($_smarty_tpl->tpl_vars['display_flags']->value!=1) {?><img src="<?php echo $_smarty_tpl->tpl_vars['img_lang_dir']->value;?>
<?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];?>
.jpg" alt="<?php echo $_smarty_tpl->tpl_vars['language']->value['iso_code'];?>
" width="16" height="11" class="mar_r4" /><?php }?><?php if ($_smarty_tpl->tpl_vars['display_flags']->value!=2) {?><?php echo smarty_modifier_regex_replace($_smarty_tpl->tpl_vars['language']->value['name'],"/\s\(.*\)"."$"."/",'');?>
<?php }?>
		    </div>
		<?php }?>
	<?php } ?>
	<?php if (count($_smarty_tpl->tpl_vars['languages']->value)>1) {?>
	<div class="dropdown_list">
		<ul id="first-languages" class="languages-block_ul dropdown_list_ul">
			<?php  $_smarty_tpl->tpl_vars['language'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['language']->_loop = false;
 $_smarty_tpl->tpl_vars['k'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['languages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['language']->key => $_smarty_tpl->tpl_vars['language']->value) {
$_smarty_tpl->tpl_vars['language']->_loop = true;
 $_smarty_tpl->tpl_vars['k']->value = $_smarty_tpl->tpl_vars['language']->key;
?>
        		<?php if ($_smarty_tpl->tpl_vars['language']->value['iso_code']!=$_smarty_tpl->tpl_vars['lang_iso']->value) {?>
				<li>
					<?php $_smarty_tpl->tpl_vars['indice_lang'] = new Smarty_variable($_smarty_tpl->tpl_vars['language']->value['id_lang'], null, 0);?>
					<?php if (isset($_smarty_tpl->tpl_vars['lang_rewrite_urls']->value[$_smarty_tpl->tpl_vars['indice_lang']->value])) {?>
						<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['lang_rewrite_urls']->value[$_smarty_tpl->tpl_vars['indice_lang']->value], ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo $_smarty_tpl->tpl_vars['language']->value['name'];?>
" rel="nofollow">
					<?php } else { ?>
						<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getLanguageLink($_smarty_tpl->tpl_vars['language']->value['id_lang']), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo $_smarty_tpl->tpl_vars['language']->value['name'];?>
" rel="nofollow">
					<?php }?>
					    <?php if ($_smarty_tpl->tpl_vars['display_flags']->value!=1) {?><img src="<?php echo $_smarty_tpl->tpl_vars['img_lang_dir']->value;?>
<?php echo $_smarty_tpl->tpl_vars['language']->value['id_lang'];?>
.jpg" alt="<?php echo $_smarty_tpl->tpl_vars['language']->value['iso_code'];?>
" width="16" height="11" class="mar_r4" /><?php }?><?php if ($_smarty_tpl->tpl_vars['display_flags']->value!=2) {?><?php echo smarty_modifier_regex_replace($_smarty_tpl->tpl_vars['language']->value['name'],"/\s\(.*\)"."$"."/",'');?>
<?php }?>
					</a>
				</li>
				<?php }?>
			<?php } ?>
		</ul>
	</div>
	<?php }?>
</div>
<!-- /Block languages module --><?php }} ?>
