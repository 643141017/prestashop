<?php /* Smarty version Smarty-3.1.19, created on 2017-01-04 18:00:12
         compiled from "D:\WWW\prestashop16110\modules\stproductlinknav\views\templates\hook\stproductlinknav.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16040586cc7ac9030f4-95808343%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '30ac5c809c59ffe44c8af6ea3d4511ad71afc663' => 
    array (
      0 => 'D:\\WWW\\prestashop16110\\modules\\stproductlinknav\\views\\templates\\hook\\stproductlinknav.tpl',
      1 => 1482908693,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16040586cc7ac9030f4-95808343',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'nav_products' => 0,
    'nav_product' => 0,
    'link' => 0,
    'nav' => 0,
    'product_link' => 0,
    'mediumSize' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_586cc7ac939bf6_52175164',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_586cc7ac939bf6_52175164')) {function content_586cc7ac939bf6_52175164($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['nav_products']->value['prev']||$_smarty_tpl->tpl_vars['nav_products']->value['next']) {?>
	<section id="product_link_nav_wrap">
	<?php  $_smarty_tpl->tpl_vars['nav_product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['nav_product']->_loop = false;
 $_smarty_tpl->tpl_vars['nav'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['nav_products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['nav_product']->key => $_smarty_tpl->tpl_vars['nav_product']->value) {
$_smarty_tpl->tpl_vars['nav_product']->_loop = true;
 $_smarty_tpl->tpl_vars['nav']->value = $_smarty_tpl->tpl_vars['nav_product']->key;
?>
		<?php if ($_smarty_tpl->tpl_vars['nav_product']->value) {?>
			<div class="product_link_nav with_preview">
			    <?php $_smarty_tpl->tpl_vars['product_link'] = new Smarty_variable($_smarty_tpl->tpl_vars['link']->value->getProductLink($_smarty_tpl->tpl_vars['nav_product']->value['id_product'],$_smarty_tpl->tpl_vars['nav_product']->value['link_rewrite'],$_smarty_tpl->tpl_vars['nav_product']->value['category'],$_smarty_tpl->tpl_vars['nav_product']->value['ean13']), null, 0);?> 
			    <a id="product_link_nav_<?php echo $_smarty_tpl->tpl_vars['nav']->value;?>
" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product_link']->value, ENT_QUOTES, 'UTF-8', true);?>
"><i class="icon-<?php if ($_smarty_tpl->tpl_vars['nav']->value=='prev') {?>left<?php }?><?php if ($_smarty_tpl->tpl_vars['nav']->value=='next') {?>right<?php }?>-open-3"></i>
				    <div class="product_link_nav_preview">
				        <img src="<?php echo $_smarty_tpl->tpl_vars['link']->value->getImageLink($_smarty_tpl->tpl_vars['nav_product']->value['link_rewrite'],(($_smarty_tpl->tpl_vars['nav_product']->value['id_product']).('-')).($_smarty_tpl->tpl_vars['nav_product']->value['id_image']),'medium_default');?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['nav_product']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
" width="<?php echo $_smarty_tpl->tpl_vars['mediumSize']->value['width'];?>
" height="<?php echo $_smarty_tpl->tpl_vars['mediumSize']->value['height'];?>
"/>
				    </div>
			    </a>
			</div>
		<?php }?>
	<?php } ?>
	</section>
<?php }?><?php }} ?>
