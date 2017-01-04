<?php /* Smarty version Smarty-3.1.19, created on 2017-01-04 17:58:27
         compiled from "D:\WWW\prestashop16110\modules\stspecialslider\views\templates\hook\stspecialslider-footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6938586cc74380cf70-39417755%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '14f337131cccc0bed90c85b458eba6ccdb6afea5' => 
    array (
      0 => 'D:\\WWW\\prestashop16110\\modules\\stspecialslider\\views\\templates\\hook\\stspecialslider-footer.tpl',
      1 => 1482908693,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6938586cc74380cf70-39417755',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'aw_display' => 0,
    'products' => 0,
    'hook_hash' => 0,
    'product' => 0,
    'link' => 0,
    'smallSize' => 0,
    'restricted_country_mode' => 0,
    'PS_CATALOG_MODE' => 0,
    'priceDisplay' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_586cc74385b175_51609411',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_586cc74385b175_51609411')) {function content_586cc74385b175_51609411($_smarty_tpl) {?>

<!-- MODULE special slider -->
<?php if ($_smarty_tpl->tpl_vars['aw_display']->value||(isset($_smarty_tpl->tpl_vars['products']->value)&&$_smarty_tpl->tpl_vars['products']->value)) {?>
<section id="special_products_footer_<?php echo $_smarty_tpl->tpl_vars['hook_hash']->value;?>
" class="special_products_footer block col-xs-12 col-sm-3 col-md-3">
    <a href="javascript:;" class="opener visible-xs">&nbsp;</a>
    <h4 class="title_block"><?php echo smartyTranslate(array('s'=>'Specials','mod'=>'stspecialslider'),$_smarty_tpl);?>
</h4>
    <div class="footer_block_content">
    <?php if (is_array($_smarty_tpl->tpl_vars['products']->value)&&count($_smarty_tpl->tpl_vars['products']->value)) {?>
    <ul class="pro_column_list">
        <?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
?>
        <li class="clearfix">
            <div class="pro_column_left">
            <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['link'], ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
">
			<img src="<?php echo $_smarty_tpl->tpl_vars['link']->value->getImageLink($_smarty_tpl->tpl_vars['product']->value['link_rewrite'],$_smarty_tpl->tpl_vars['product']->value['id_image'],'small_default');?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
" height="<?php echo $_smarty_tpl->tpl_vars['smallSize']->value['height'];?>
" width="<?php echo $_smarty_tpl->tpl_vars['smallSize']->value['width'];?>
" />
			</a>
            </div>
			<div class="pro_column_right">
				<h4 class="s_title_block nohidden"><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['link'], ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
"><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['truncate'][0][0]->smarty_modifier_truncate($_smarty_tpl->tpl_vars['product']->value['name'],50,'...'), ENT_QUOTES, 'UTF-8', true);?>
</a></h4>
                <?php if ($_smarty_tpl->tpl_vars['product']->value['show_price']&&!isset($_smarty_tpl->tpl_vars['restricted_country_mode']->value)&&!$_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value) {?>
                    <span class="price">
                    <?php if (!$_smarty_tpl->tpl_vars['priceDisplay']->value) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['product']->value['price']),$_smarty_tpl);?>

                    <?php } else { ?>
                    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['product']->value['price_tax_exc']),$_smarty_tpl);?>

                    <?php }?>
                    </span>
                    <?php if (isset($_smarty_tpl->tpl_vars['product']->value['reduction'])&&$_smarty_tpl->tpl_vars['product']->value['reduction']) {?><span class="old_price"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['product']->value['price_without_reduction']),$_smarty_tpl);?>
</span><?php }?>
                <?php }?>
            </div>
        </li>
        <?php } ?>
    </ul>
    <?php } else { ?>
		<p class="warning"><?php echo smartyTranslate(array('s'=>'No Special products','mod'=>'stspecialslider'),$_smarty_tpl);?>
</p>
    <?php }?>
    </div>
</section>
<?php }?>
<!-- /MODULE special slider  --><?php }} ?>
