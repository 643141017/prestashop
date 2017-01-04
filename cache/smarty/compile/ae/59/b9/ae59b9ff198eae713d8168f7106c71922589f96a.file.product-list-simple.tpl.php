<?php /* Smarty version Smarty-3.1.19, created on 2017-01-04 17:58:27
         compiled from "D:\WWW\prestashop16110\themes\panda\product-list-simple.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14096586cc743083479-60042806%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ae59b9ff198eae713d8168f7106c71922589f96a' => 
    array (
      0 => 'D:\\WWW\\prestashop16110\\themes\\panda\\product-list-simple.tpl',
      1 => 1482908691,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14096586cc743083479-60042806',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'products' => 0,
    'for_f' => 0,
    'product' => 0,
    'link' => 0,
    'mediumSize' => 0,
    'restricted_country_mode' => 0,
    'PS_CATALOG_MODE' => 0,
    'priceDisplay' => 0,
    'discount_percentage' => 0,
    'st_display_add_to_cart' => 0,
    'add_prod_display' => 0,
    'static_token' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_586cc74315a1f8_41914032',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_586cc74315a1f8_41914032')) {function content_586cc74315a1f8_41914032($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include 'D:\\WWW\\prestashop16110\\tools\\smarty\\plugins\\modifier.replace.php';
?>
<?php if (isset($_smarty_tpl->tpl_vars['products']->value)&&$_smarty_tpl->tpl_vars['products']->value) {?>
    <?php $_smarty_tpl->tpl_vars['discount_percentage'] = new Smarty_variable(Configuration::get('STSN_DISCOUNT_PERCENTAGE'), null, 0);?>
    <?php $_smarty_tpl->tpl_vars['st_display_add_to_cart'] = new Smarty_variable(Configuration::get('STSN_DISPLAY_ADD_TO_CART'), null, 0);?>
    <?php $_smarty_tpl->_capture_stack[0][] = array("nbItemsPerLineLarge", null, null); ob_start(); ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayAnywhere','function'=>'getProductsPerRow','for_w'=>$_smarty_tpl->tpl_vars['for_f']->value,'devices'=>'xl','mod'=>'stthemeeditor','caller'=>'stthemeeditor'),$_smarty_tpl);?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
    <?php $_smarty_tpl->_capture_stack[0][] = array("nbItemsPerLineDesktop", null, null); ob_start(); ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayAnywhere','function'=>'getProductsPerRow','for_w'=>$_smarty_tpl->tpl_vars['for_f']->value,'devices'=>'lg','mod'=>'stthemeeditor','caller'=>'stthemeeditor'),$_smarty_tpl);?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
    <?php $_smarty_tpl->_capture_stack[0][] = array("nbItemsPerLine", null, null); ob_start(); ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayAnywhere','function'=>'getProductsPerRow','for_w'=>$_smarty_tpl->tpl_vars['for_f']->value,'devices'=>'md','mod'=>'stthemeeditor','caller'=>'stthemeeditor'),$_smarty_tpl);?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
    <?php $_smarty_tpl->_capture_stack[0][] = array("nbItemsPerLineTablet", null, null); ob_start(); ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayAnywhere','function'=>'getProductsPerRow','for_w'=>$_smarty_tpl->tpl_vars['for_f']->value,'devices'=>'sm','mod'=>'stthemeeditor','caller'=>'stthemeeditor'),$_smarty_tpl);?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
    <?php $_smarty_tpl->_capture_stack[0][] = array("nbItemsPerLineMobile", null, null); ob_start(); ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayAnywhere','function'=>'getProductsPerRow','for_w'=>$_smarty_tpl->tpl_vars['for_f']->value,'devices'=>'xs','mod'=>'stthemeeditor','caller'=>'stthemeeditor'),$_smarty_tpl);?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
    <?php $_smarty_tpl->_capture_stack[0][] = array("nbItemsPerLinePortrait", null, null); ob_start(); ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayAnywhere','function'=>'getProductsPerRow','for_w'=>$_smarty_tpl->tpl_vars['for_f']->value,'devices'=>'xxs','mod'=>'stthemeeditor','caller'=>'stthemeeditor'),$_smarty_tpl);?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
    <ul class="pro_itemlist row">
    <?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['product']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
 $_smarty_tpl->tpl_vars['product']->iteration++;
?>
        <li class="ajax_block_product col-xl-<?php echo smarty_modifier_replace((12/Smarty::$_smarty_vars['capture']['nbItemsPerLineLarge']),'.','-');?>
  col-lg-<?php echo smarty_modifier_replace((12/Smarty::$_smarty_vars['capture']['nbItemsPerLineDesktop']),'.','-');?>
 col-md-<?php echo smarty_modifier_replace((12/Smarty::$_smarty_vars['capture']['nbItemsPerLine']),'.','-');?>
 col-sm-<?php echo smarty_modifier_replace((12/Smarty::$_smarty_vars['capture']['nbItemsPerLineTablet']),'.','-');?>
 col-xs-<?php echo smarty_modifier_replace((12/Smarty::$_smarty_vars['capture']['nbItemsPerLineMobile']),'.','-');?>
 col-xxs-<?php echo smarty_modifier_replace((12/Smarty::$_smarty_vars['capture']['nbItemsPerLinePortrait']),'.','-');?>
  <?php if ($_smarty_tpl->tpl_vars['product']->iteration%Smarty::$_smarty_vars['capture']['nbItemsPerLineLarge']==1) {?> first-item-of-large-line<?php }?> <?php if ($_smarty_tpl->tpl_vars['product']->iteration%Smarty::$_smarty_vars['capture']['nbItemsPerLineDesktop']==1) {?> first-item-of-desktop-line<?php }?><?php if ($_smarty_tpl->tpl_vars['product']->iteration%Smarty::$_smarty_vars['capture']['nbItemsPerLine']==1) {?> first-item-of-line<?php }?><?php if ($_smarty_tpl->tpl_vars['product']->iteration%Smarty::$_smarty_vars['capture']['nbItemsPerLineTablet']==1) {?> first-item-of-tablet-line<?php }?><?php if ($_smarty_tpl->tpl_vars['product']->iteration%Smarty::$_smarty_vars['capture']['nbItemsPerLineMobile']==1) {?> first-item-of-mobile-line<?php }?><?php if ($_smarty_tpl->tpl_vars['product']->iteration%Smarty::$_smarty_vars['capture']['nbItemsPerLinePortrait']==1) {?> first-item-of-portrait-line<?php }?>">
            <div class="itemlist_left">
                <a class="product_image" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['link'], ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
"><img class="replace-2x img-responsive" src="<?php echo $_smarty_tpl->tpl_vars['link']->value->getImageLink($_smarty_tpl->tpl_vars['product']->value['link_rewrite'],$_smarty_tpl->tpl_vars['product']->value['id_image'],'medium_default');?>
" height="<?php echo $_smarty_tpl->tpl_vars['mediumSize']->value['height'];?>
" width="<?php echo $_smarty_tpl->tpl_vars['mediumSize']->value['width'];?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
" /></a>
            </div>
            <div class="itemlist_right">
                <p class="s_title_block"><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['link'], ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
"><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['truncate'][0][0]->smarty_modifier_truncate($_smarty_tpl->tpl_vars['product']->value['name'],40,'...'), ENT_QUOTES, 'UTF-8', true);?>
</a></p>
                <?php if ($_smarty_tpl->tpl_vars['product']->value['show_price']&&!isset($_smarty_tpl->tpl_vars['restricted_country_mode']->value)&&!$_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value) {?>
                    <div class="price_container mar_b10">
                        <span class="price">
                        <?php if (!$_smarty_tpl->tpl_vars['priceDisplay']->value) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['product']->value['price']),$_smarty_tpl);?>

                        <?php } else { ?>
                        <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['product']->value['price_tax_exc']),$_smarty_tpl);?>

                        <?php }?>
                        </span>
                        <?php if (isset($_smarty_tpl->tpl_vars['product']->value['reduction'])&&$_smarty_tpl->tpl_vars['product']->value['reduction']) {?>
                            <span class="old_price"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['product']->value['price_without_reduction']),$_smarty_tpl);?>
</span>
                            <?php if (isset($_smarty_tpl->tpl_vars['discount_percentage']->value)&&$_smarty_tpl->tpl_vars['discount_percentage']->value) {?>
                            <span class="sale_percentage">
                                -<?php if ($_smarty_tpl->tpl_vars['product']->value['specific_prices']['reduction_type']=='percentage') {?><?php echo $_smarty_tpl->tpl_vars['product']->value['specific_prices']['reduction']*floatval(100);?>
%<?php } elseif ($_smarty_tpl->tpl_vars['product']->value['specific_prices']['reduction_type']=='amount') {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['product']->value['price_without_reduction']-floatval($_smarty_tpl->tpl_vars['product']->value['price'])),$_smarty_tpl);?>
<?php }?>
                            </span>
                            <?php }?>
                        <?php }?>
                    </div>
                <?php } else { ?>
                    <!--<div style="height:21px;"></div>-->
                <?php }?>  
                <?php if ($_smarty_tpl->tpl_vars['st_display_add_to_cart']->value!=3) {?>
                <div class="itemlist_action">
                    <?php if (($_smarty_tpl->tpl_vars['product']->value['id_product_attribute']==0||(isset($_smarty_tpl->tpl_vars['add_prod_display']->value)&&($_smarty_tpl->tpl_vars['add_prod_display']->value==1)))&&$_smarty_tpl->tpl_vars['product']->value['available_for_order']&&!isset($_smarty_tpl->tpl_vars['restricted_country_mode']->value)&&$_smarty_tpl->tpl_vars['product']->value['minimal_quantity']<=1&&$_smarty_tpl->tpl_vars['product']->value['customizable']!=2&&!$_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value) {?>          
                        <?php if (($_smarty_tpl->tpl_vars['product']->value['quantity']>0||$_smarty_tpl->tpl_vars['product']->value['allow_oosp'])) {?>
                        <a class="ajax_add_to_cart_button btn btn_default" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('cart'), ENT_QUOTES, 'UTF-8', true);?>
?qty=1&amp;id_product=<?php echo $_smarty_tpl->tpl_vars['product']->value['id_product'];?>
&amp;token=<?php echo $_smarty_tpl->tpl_vars['static_token']->value;?>
&amp;add" rel="nofollow" title="<?php echo smartyTranslate(array('s'=>'Add to Cart'),$_smarty_tpl);?>
" data-id-product="<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product']);?>
" ><i class="icon-glyph icon_btn icon-large"></i><span><?php echo smartyTranslate(array('s'=>'Add to Cart'),$_smarty_tpl);?>
</span></a>
                        <?php } else { ?>
                        <a class="view_button btn_default" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['link'], ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'View'),$_smarty_tpl);?>
" rel="nofollow"><i class="icon-eye-2 icon_btn icon-large"></i><span><?php echo smartyTranslate(array('s'=>'View'),$_smarty_tpl);?>
</span></a>
                        <?php }?>
                    <?php } else { ?>
                        <!--<div style="height:23px;"></div>-->
                    <?php }?>
                </div>
                <?php }?>
            </div>
        </li>
    <?php } ?>
    </ul>
<?php } else { ?>
    <p class="warning"><?php echo smartyTranslate(array('s'=>'No products'),$_smarty_tpl);?>
</p>
<?php }?><?php }} ?>
