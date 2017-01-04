<?php /* Smarty version Smarty-3.1.19, created on 2017-01-04 17:58:25
         compiled from "D:\WWW\prestashop16110\modules\blocktags_mod\views\templates\hook\blocktags-footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6108586cc741c43175-71647319%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ff117cec3dfc7eedf9feaacd99918e0e1fccec33' => 
    array (
      0 => 'D:\\WWW\\prestashop16110\\modules\\blocktags_mod\\views\\templates\\hook\\blocktags-footer.tpl',
      1 => 1482908691,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6108586cc741c43175-71647319',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'blocktags_wide_on_footer' => 0,
    'tags' => 0,
    'tag' => 0,
    'link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_586cc741c6a276_37571538',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_586cc741c6a276_37571538')) {function content_586cc741c6a276_37571538($_smarty_tpl) {?>

<!-- Block tags module -->
<section id="tags_block_left" class="block tags_block col-xs-12 col-sm-<?php if ($_smarty_tpl->tpl_vars['blocktags_wide_on_footer']->value) {?><?php echo $_smarty_tpl->tpl_vars['blocktags_wide_on_footer']->value;?>
<?php } else { ?>3<?php }?>">
    <a href="javascript:;" class="opener visible-xs">&nbsp;</a>
	<h3 class="title_block"><?php echo smartyTranslate(array('s'=>'Popular tags','mod'=>'blocktags_mod'),$_smarty_tpl);?>
</h3>
	<div class="footer_block_content">
		<?php if (isset($_smarty_tpl->tpl_vars['tags']->value)&&is_array($_smarty_tpl->tpl_vars['tags']->value)&&count($_smarty_tpl->tpl_vars['tags']->value)) {?>
			<?php  $_smarty_tpl->tpl_vars['tag'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tag']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['tags']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['tag']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['tag']->iteration=0;
 $_smarty_tpl->tpl_vars['tag']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['tag']->key => $_smarty_tpl->tpl_vars['tag']->value) {
$_smarty_tpl->tpl_vars['tag']->_loop = true;
 $_smarty_tpl->tpl_vars['tag']->iteration++;
 $_smarty_tpl->tpl_vars['tag']->index++;
 $_smarty_tpl->tpl_vars['tag']->first = $_smarty_tpl->tpl_vars['tag']->index === 0;
 $_smarty_tpl->tpl_vars['tag']->last = $_smarty_tpl->tpl_vars['tag']->iteration === $_smarty_tpl->tpl_vars['tag']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['myLoop']['first'] = $_smarty_tpl->tpl_vars['tag']->first;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['myLoop']['last'] = $_smarty_tpl->tpl_vars['tag']->last;
?>
				<a 
				class="<?php echo $_smarty_tpl->tpl_vars['tag']->value['class'];?>
 <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['myLoop']['last']) {?>last_item<?php } elseif ($_smarty_tpl->getVariable('smarty')->value['foreach']['myLoop']['first']) {?>first_item<?php } else { ?>item<?php }?>"
				href="<?php ob_start();?><?php echo urlencode($_smarty_tpl->tpl_vars['tag']->value['name']);?>
<?php $_tmp7=ob_get_clean();?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('search',true,null,"tag=".$_tmp7), ENT_QUOTES, 'UTF-8', true);?>
" 
				title="<?php echo smartyTranslate(array('s'=>'More about','mod'=>'blocktags_mod'),$_smarty_tpl);?>
 <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['tag']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
" 
				>
					<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['tag']->value['name'], ENT_QUOTES, 'UTF-8', true);?>

				</a>
			<?php } ?>
		<?php } else { ?>
			<?php echo smartyTranslate(array('s'=>'No tags specified yet','mod'=>'blocktags_mod'),$_smarty_tpl);?>

		<?php }?>
	</div>
</section>
<!-- /Block tags module -->
<?php }} ?>
