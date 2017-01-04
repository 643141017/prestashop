<?php /* Smarty version Smarty-3.1.19, created on 2017-01-04 17:58:27
         compiled from "D:\WWW\prestashop16110\modules\stnewsletter\views\templates\hook\stnewsletter-footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:22568586cc7438ef875-99029683%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c98c8ca6dbbf378dd2ce94430240806cd8522cda' => 
    array (
      0 => 'D:\\WWW\\prestashop16110\\modules\\stnewsletter\\views\\templates\\hook\\stnewsletter-footer.tpl',
      1 => 1482908692,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '22568586cc7438ef875-99029683',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'news_letter_array' => 0,
    'ec' => 0,
    'base_uri' => 0,
    'value' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_586cc74392e076_99357981',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_586cc74392e076_99357981')) {function content_586cc74392e076_99357981($_smarty_tpl) {?>
<!-- Block Newsletter module-->
<?php if (isset($_smarty_tpl->tpl_vars['news_letter_array']->value)&&count($_smarty_tpl->tpl_vars['news_letter_array']->value)>0) {?>
    <?php  $_smarty_tpl->tpl_vars['ec'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ec']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['news_letter_array']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ec']->key => $_smarty_tpl->tpl_vars['ec']->value) {
$_smarty_tpl->tpl_vars['ec']->_loop = true;
?>
		<section id="st_news_letter_<?php echo $_smarty_tpl->tpl_vars['ec']->value['id_st_news_letter'];?>
" class="st_news_letter_<?php echo $_smarty_tpl->tpl_vars['ec']->value['id_st_news_letter'];?>
 <?php if ($_smarty_tpl->tpl_vars['ec']->value['hide_on_mobile']) {?> hidden-xs<?php }?> block col-xs-12 col-sm-<?php if ($_smarty_tpl->tpl_vars['ec']->value['span']) {?><?php echo $_smarty_tpl->tpl_vars['ec']->value['span'];?>
<?php } else { ?>3<?php }?>">
		    <?php if ($_smarty_tpl->tpl_vars['ec']->value['span']&&$_smarty_tpl->tpl_vars['ec']->value['span']!=12) {?>
		    <a href="javascript:;" class="opener visible-xs">&nbsp;</a>
			<h3 class="title_block"><?php echo smartyTranslate(array('s'=>'Newsletter','mod'=>'stnewsletter'),$_smarty_tpl);?>
</h3>
			<?php }?>
			<div class="footer_block_content <?php if ($_smarty_tpl->tpl_vars['ec']->value['span']&&$_smarty_tpl->tpl_vars['ec']->value['span']==12) {?>keep_open<?php }?> <?php if ($_smarty_tpl->tpl_vars['ec']->value['text_align']==2) {?> text-center <?php } elseif ($_smarty_tpl->tpl_vars['ec']->value['text_align']==3) {?> text-right <?php }?>">
				<div class="st_news_letter_box">
            	<?php if ($_smarty_tpl->tpl_vars['ec']->value['content']) {?><div class="st_news_letter_content style_content"><?php echo stripslashes($_smarty_tpl->tpl_vars['ec']->value['content']);?>
</div><?php }?>
            	<?php if ($_smarty_tpl->tpl_vars['ec']->value['show_newsletter']) {?>
            	<div class="alert alert-danger hidden"></div>
                <div class="alert alert-success hidden"></div>
            	<form action="<?php echo $_smarty_tpl->tpl_vars['base_uri']->value;?>
modules/stnewsletter/stnewsletter-ajax.php" method="post" class="st_news_letter_form">
					<div class="form-group st_news_letter_form_inner" >
						<input class="inputNew form-control st_news_letter_input" type="text" name="email" size="18" value="<?php if (isset($_smarty_tpl->tpl_vars['value']->value)&&$_smarty_tpl->tpl_vars['value']->value) {?><?php echo $_smarty_tpl->tpl_vars['value']->value;?>
<?php }?>" placeholder="<?php echo smartyTranslate(array('s'=>'Your e-mail','mod'=>'stnewsletter'),$_smarty_tpl);?>
" />
		                <button type="submit" name="submitStNewsletter" class="btn btn-medium st_news_letter_submit">
		                    <?php echo smartyTranslate(array('s'=>'Go!','mod'=>'stnewsletter'),$_smarty_tpl);?>

		                </button>
						<input type="hidden" name="action" value="0" />
					</div>
				</form>
				<?php }?>
				</div>
			</div>
		</section>
    <?php } ?>
<?php }?>
<!-- /Block Newsletter module-->

<?php $_smarty_tpl->smarty->_tag_stack[] = array('addJsDefL', array('name'=>'wrongemailaddress_stnewsletter')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'wrongemailaddress_stnewsletter'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php echo smartyTranslate(array('s'=>'Invalid email address.','mod'=>'stnewsletter','js'=>1),$_smarty_tpl);?>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'wrongemailaddress_stnewsletter'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php }} ?>
