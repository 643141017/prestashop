<?php /* Smarty version Smarty-3.1.19, created on 2017-01-04 17:58:26
         compiled from "D:\WWW\prestashop16110\themes\panda\product-slider.tpl" */ ?>
<?php /*%%SmartyHeaderCode:28763586cc74279baf0-71552547%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b87a1606b81a69dad033014e2200111cdc5df003' => 
    array (
      0 => 'D:\\WWW\\prestashop16110\\themes\\panda\\product-slider.tpl',
      1 => 1482908691,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '28763586cc74279baf0-71552547',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'direction_nav' => 0,
    'products' => 0,
    'new_sticker' => 0,
    'product' => 0,
    'sale_sticker' => 0,
    'PS_CATALOG_MODE' => 0,
    'restricted_country_mode' => 0,
    'discount_percentage' => 0,
    'link' => 0,
    'lazy_load' => 0,
    'pro_image' => 0,
    'add_prod_display' => 0,
    'static_token' => 0,
    'flyout_comparison' => 0,
    'comparator_max_item' => 0,
    'flyout_quickview' => 0,
    'quick_view' => 0,
    'st_display_add_to_cart' => 0,
    'fly_i' => 0,
    'flyout_wishlist' => 0,
    'flyout_buttons' => 0,
    'flyout_buttons_on_mobile' => 0,
    'sttheme' => 0,
    'length_of_product_name' => 0,
    'priceDisplay' => 0,
    'display_sd' => 0,
    'st_yotpo_sart' => 0,
    'st_yotpoAppkey' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_586cc7429c65f4_20592793',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_586cc7429c65f4_20592793')) {function content_586cc7429c65f4_20592793($_smarty_tpl) {?>
<?php $_smarty_tpl->_capture_stack[0][] = array("home_default_width", null, null); ob_start(); ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['getWidthSize'][0][0]->getWidth(array('type'=>'home_default'),$_smarty_tpl);?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<?php $_smarty_tpl->_capture_stack[0][] = array("home_default_height", null, null); ob_start(); ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['getHeightSize'][0][0]->getHeight(array('type'=>'home_default'),$_smarty_tpl);?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<?php $_smarty_tpl->_capture_stack[0][] = array("small_default_width", null, null); ob_start(); ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['getWidthSize'][0][0]->getWidth(array('type'=>'small_default'),$_smarty_tpl);?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<?php $_smarty_tpl->_capture_stack[0][] = array("small_default_height", null, null); ob_start(); ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['getHeightSize'][0][0]->getHeight(array('type'=>'small_default'),$_smarty_tpl);?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<?php $_smarty_tpl->tpl_vars['st_yotpo_sart'] = new Smarty_variable(Configuration::get('STSN_YOTPO_SART'), null, 0);?>
<?php $_smarty_tpl->tpl_vars['st_yotpoAppkey'] = new Smarty_variable(Configuration::get('yotpo_app_key'), null, 0);?>
<?php $_smarty_tpl->_capture_stack[0][] = array("st_yotpoDomain", null, null); ob_start(); ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayAnywhere','function'=>"getYotpoDomain",'mod'=>'stthemeeditor','caller'=>'stthemeeditor'),$_smarty_tpl);?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<?php $_smarty_tpl->_capture_stack[0][] = array("st_yotpoLanguage", null, null); ob_start(); ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayAnywhere','function'=>"getYotpoLanguage",'mod'=>'stthemeeditor','caller'=>'stthemeeditor'),$_smarty_tpl);?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<?php $_smarty_tpl->tpl_vars['st_display_add_to_cart'] = new Smarty_variable(Configuration::get('STSN_DISPLAY_ADD_TO_CART'), null, 0);?>
<?php $_smarty_tpl->tpl_vars['flyout_wishlist'] = new Smarty_variable(Configuration::get('STSN_FLYOUT_WISHLIST'), null, 0);?>
<?php $_smarty_tpl->tpl_vars['flyout_quickview'] = new Smarty_variable(Configuration::get('STSN_FLYOUT_QUICKVIEW'), null, 0);?>
<?php $_smarty_tpl->tpl_vars['flyout_comparison'] = new Smarty_variable(Configuration::get('STSN_FLYOUT_COMPARISON'), null, 0);?>    
<?php $_smarty_tpl->tpl_vars['discount_percentage'] = new Smarty_variable(Configuration::get('STSN_DISCOUNT_PERCENTAGE'), null, 0);?>
<?php $_smarty_tpl->tpl_vars['flyout_buttons'] = new Smarty_variable(Configuration::get('STSN_FLYOUT_BUTTONS'), null, 0);?>
<?php $_smarty_tpl->tpl_vars['flyout_buttons_on_mobile'] = new Smarty_variable(Configuration::get('STSN_FLYOUT_BUTTONS_ON_MOBILE'), null, 0);?>
<?php $_smarty_tpl->tpl_vars['new_sticker'] = new Smarty_variable(Configuration::get('STSN_NEW_STYLE'), null, 0);?>
<?php $_smarty_tpl->tpl_vars['sale_sticker'] = new Smarty_variable(Configuration::get('STSN_SALE_STYLE'), null, 0);?>
<div class="slides remove_after_init <?php if ($_smarty_tpl->tpl_vars['direction_nav']->value>1) {?> owl-navigation-lr <?php if ($_smarty_tpl->tpl_vars['direction_nav']->value==4) {?> owl-navigation-circle <?php } else { ?> owl-navigation-rectangle <?php }?> <?php } elseif ($_smarty_tpl->tpl_vars['direction_nav']->value==1) {?> owl-navigation-tr<?php }?>">
<?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['product']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['product']->iteration=0;
 $_smarty_tpl->tpl_vars['product']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
 $_smarty_tpl->tpl_vars['product']->iteration++;
 $_smarty_tpl->tpl_vars['product']->index++;
 $_smarty_tpl->tpl_vars['product']->first = $_smarty_tpl->tpl_vars['product']->index === 0;
 $_smarty_tpl->tpl_vars['product']->last = $_smarty_tpl->tpl_vars['product']->iteration === $_smarty_tpl->tpl_vars['product']->total;
?>
	<div class="ajax_block_product <?php if ($_smarty_tpl->tpl_vars['product']->first) {?>first_item<?php } elseif ($_smarty_tpl->tpl_vars['product']->last) {?>last_item<?php }?> item">
        <?php $_smarty_tpl->_capture_stack[0][] = array("new_on_sale", null, null); ob_start(); ?>
            <?php if ($_smarty_tpl->tpl_vars['new_sticker']->value!=2&&isset($_smarty_tpl->tpl_vars['product']->value['new'])&&$_smarty_tpl->tpl_vars['product']->value['new']==1) {?><span class="new"><i><?php echo smartyTranslate(array('s'=>'New'),$_smarty_tpl);?>
</i></span><?php }?><?php if ($_smarty_tpl->tpl_vars['sale_sticker']->value!=2&&isset($_smarty_tpl->tpl_vars['product']->value['on_sale'])&&$_smarty_tpl->tpl_vars['product']->value['on_sale']&&isset($_smarty_tpl->tpl_vars['product']->value['show_price'])&&$_smarty_tpl->tpl_vars['product']->value['show_price']&&!$_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value) {?><span class="on_sale"><i><?php echo smartyTranslate(array('s'=>'Sale'),$_smarty_tpl);?>
</i></span><?php }?><?php if ($_smarty_tpl->tpl_vars['product']->value['show_price']&&!isset($_smarty_tpl->tpl_vars['restricted_country_mode']->value)&&!$_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value) {?><?php if (isset($_smarty_tpl->tpl_vars['product']->value['specific_prices'])&&$_smarty_tpl->tpl_vars['product']->value['specific_prices']&&isset($_smarty_tpl->tpl_vars['product']->value['specific_prices']['reduction'])&&$_smarty_tpl->tpl_vars['product']->value['specific_prices']['reduction']>0&&isset($_smarty_tpl->tpl_vars['discount_percentage']->value)&&$_smarty_tpl->tpl_vars['discount_percentage']->value>1) {?><span class="sale_percentage_sticker"><?php if ($_smarty_tpl->tpl_vars['product']->value['specific_prices']&&$_smarty_tpl->tpl_vars['product']->value['specific_prices']['reduction_type']=='percentage') {?><?php echo $_smarty_tpl->tpl_vars['product']->value['specific_prices']['reduction']*floatval(100);?>
%<?php if ($_smarty_tpl->tpl_vars['discount_percentage']->value==2) {?><br/><?php } else { ?> <?php }?><?php echo smartyTranslate(array('s'=>'Off'),$_smarty_tpl);?>
<?php } elseif ($_smarty_tpl->tpl_vars['product']->value['specific_prices']&&$_smarty_tpl->tpl_vars['product']->value['specific_prices']['reduction_type']=='amount'&&floatval($_smarty_tpl->tpl_vars['product']->value['specific_prices']['reduction'])!=0) {?><?php echo smartyTranslate(array('s'=>'Save'),$_smarty_tpl);?>
<?php if ($_smarty_tpl->tpl_vars['discount_percentage']->value==2) {?><br/><?php } else { ?> <?php }?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['product']->value['price_without_reduction']-floatval($_smarty_tpl->tpl_vars['product']->value['price'])),$_smarty_tpl);?>
<?php }?></span><?php }?><?php }?>
        <?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
        <?php $_smarty_tpl->tpl_vars['pro_image'] = new Smarty_variable($_smarty_tpl->tpl_vars['link']->value->getImageLink($_smarty_tpl->tpl_vars['product']->value['link_rewrite'],$_smarty_tpl->tpl_vars['product']->value['id_image'],'home_default'), null, 0);?> 
        <div class="pro_first_box">
            <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['link'], ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
" class="product_image"><img <?php if ($_smarty_tpl->tpl_vars['lazy_load']->value) {?> data-src="<?php echo $_smarty_tpl->tpl_vars['pro_image']->value;?>
" <?php } else { ?> src="<?php echo $_smarty_tpl->tpl_vars['pro_image']->value;?>
" <?php }?> width="<?php echo Smarty::$_smarty_vars['capture']['home_default_width'];?>
" height="<?php echo Smarty::$_smarty_vars['capture']['home_default_height'];?>
" alt="<?php if (!empty($_smarty_tpl->tpl_vars['product']->value['legend'])) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['legend'], ENT_QUOTES, 'UTF-8', true);?>
<?php } else { ?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
<?php }?>" class="replace-2x img-responsive front-image <?php if ($_smarty_tpl->tpl_vars['lazy_load']->value) {?> lazyOwl <?php }?>" /><?php if (isset($_smarty_tpl->tpl_vars['product']->value['hover_image'])&&$_smarty_tpl->tpl_vars['product']->value['hover_image']) {?><?php echo $_smarty_tpl->tpl_vars['product']->value['hover_image'];?>
<?php }?><?php echo Smarty::$_smarty_vars['capture']['new_on_sale'];?>
</a>
            <?php $_smarty_tpl->_capture_stack[0][] = array("pro_a_cart", null, null); ob_start(); ?>
                <?php if (($_smarty_tpl->tpl_vars['product']->value['id_product_attribute']==0||(isset($_smarty_tpl->tpl_vars['add_prod_display']->value)&&($_smarty_tpl->tpl_vars['add_prod_display']->value==1)))&&$_smarty_tpl->tpl_vars['product']->value['available_for_order']&&!isset($_smarty_tpl->tpl_vars['restricted_country_mode']->value)&&$_smarty_tpl->tpl_vars['product']->value['minimal_quantity']<=1&&$_smarty_tpl->tpl_vars['product']->value['customizable']!=2&&!$_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value) {?>          
                    <?php if ((!isset($_smarty_tpl->tpl_vars['product']->value['customization_required'])||!$_smarty_tpl->tpl_vars['product']->value['customization_required'])&&($_smarty_tpl->tpl_vars['product']->value['allow_oosp']||$_smarty_tpl->tpl_vars['product']->value['quantity']>0)) {?>
					  <a class="ajax_add_to_cart_button btn btn-default" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('cart'), ENT_QUOTES, 'UTF-8', true);?>
?qty=1&amp;id_product=<?php echo $_smarty_tpl->tpl_vars['product']->value['id_product'];?>
&amp;token=<?php echo $_smarty_tpl->tpl_vars['static_token']->value;?>
&amp;add" rel="nofollow" title="<?php echo smartyTranslate(array('s'=>'Add to cart'),$_smarty_tpl);?>
" data-id-product="<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product']);?>
"><div><i class="icon-glyph icon_btn icon-small icon-mar-lr2"></i><span><?php echo smartyTranslate(array('s'=>'Add to cart'),$_smarty_tpl);?>
</span></div></a>
					<?php } else { ?>
                        <a class="view_button btn btn-default" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['link'], ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'View'),$_smarty_tpl);?>
" rel="nofollow"><div><i class="icon-eye-2 icon_btn icon-small icon-mar-lr2"></i><span><?php if ((isset($_smarty_tpl->tpl_vars['product']->value['customization_required'])&&$_smarty_tpl->tpl_vars['product']->value['customization_required'])) {?><?php echo smartyTranslate(array('s'=>'Customize'),$_smarty_tpl);?>
<?php } else { ?><?php echo smartyTranslate(array('s'=>'More'),$_smarty_tpl);?>
<?php }?></span></div></a>
					<?php }?>
				<?php } else { ?>
				<?php }?>
            <?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
            <?php $_smarty_tpl->_capture_stack[0][] = array("pro_a_compare", null, null); ob_start(); ?>
                <?php if (!$_smarty_tpl->tpl_vars['flyout_comparison']->value&&isset($_smarty_tpl->tpl_vars['comparator_max_item']->value)&&$_smarty_tpl->tpl_vars['comparator_max_item']->value) {?>
                    <a class="add_to_compare" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['link'], ENT_QUOTES, 'UTF-8', true);?>
" data-id-product="<?php echo $_smarty_tpl->tpl_vars['product']->value['id_product'];?>
" rel="nofollow" data-product-cover="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getImageLink($_smarty_tpl->tpl_vars['product']->value['link_rewrite'],$_smarty_tpl->tpl_vars['product']->value['id_image'],'small_default'), ENT_QUOTES, 'UTF-8', true);?>
" data-product-name="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
" data-product-cover-width="<?php echo Smarty::$_smarty_vars['capture']['small_default_width'];?>
" data-product-cover-height="<?php echo Smarty::$_smarty_vars['capture']['small_default_height'];?>
"><div><i class="icon-adjust icon_btn icon-small icon-mar-lr2"></i><span><?php echo smartyTranslate(array('s'=>'Add to compare'),$_smarty_tpl);?>
</span></div></a>
    			<?php }?>
            <?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
            <?php $_smarty_tpl->_capture_stack[0][] = array("pro_quick_view", null, null); ob_start(); ?>
                <?php if (!$_smarty_tpl->tpl_vars['flyout_quickview']->value&&isset($_smarty_tpl->tpl_vars['quick_view']->value)&&$_smarty_tpl->tpl_vars['quick_view']->value) {?>
                    <a class="quick-view" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['link'], ENT_QUOTES, 'UTF-8', true);?>
" rel="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['link'], ENT_QUOTES, 'UTF-8', true);?>
"><div><i class="icon-search-1 icon_btn icon-small icon-mar-lr2"></i><span><?php echo smartyTranslate(array('s'=>'Quick view'),$_smarty_tpl);?>
</span></div></a>
                <?php }?>
            <?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
            <?php $_smarty_tpl->tpl_vars["fly_i"] = new Smarty_variable(0, null, 0);?>
            <?php if (!$_smarty_tpl->tpl_vars['st_display_add_to_cart']->value&&trim(Smarty::$_smarty_vars['capture']['pro_a_cart'])) {?><?php $_smarty_tpl->tpl_vars["fly_i"] = new Smarty_variable($_smarty_tpl->tpl_vars['fly_i']->value+1, null, 0);?><?php }?>
            <?php if (trim(Smarty::$_smarty_vars['capture']['pro_a_compare'])) {?><?php $_smarty_tpl->tpl_vars["fly_i"] = new Smarty_variable($_smarty_tpl->tpl_vars['fly_i']->value+1, null, 0);?><?php }?>
            <?php if (trim(Smarty::$_smarty_vars['capture']['pro_quick_view'])) {?><?php $_smarty_tpl->tpl_vars["fly_i"] = new Smarty_variable($_smarty_tpl->tpl_vars['fly_i']->value+1, null, 0);?><?php }?>
            <?php if (!$_smarty_tpl->tpl_vars['flyout_wishlist']->value&&isset($_smarty_tpl->tpl_vars['product']->value['pro_a_wishlist'])&&$_smarty_tpl->tpl_vars['product']->value['pro_a_wishlist']) {?><?php $_smarty_tpl->tpl_vars["fly_i"] = new Smarty_variable($_smarty_tpl->tpl_vars['fly_i']->value+1, null, 0);?><?php }?>
            
            <div class="hover_fly <?php if ($_smarty_tpl->tpl_vars['flyout_buttons']->value) {?>hover_fly_static<?php }?> <?php if ($_smarty_tpl->tpl_vars['flyout_buttons_on_mobile']->value==1) {?> mobile_hover_fly_show <?php } elseif ($_smarty_tpl->tpl_vars['flyout_buttons_on_mobile']->value==2) {?> mobile_hover_fly_cart <?php } else { ?> mobile_hover_fly_hide <?php }?> fly_<?php echo $_smarty_tpl->tpl_vars['fly_i']->value;?>
 <?php if (trim(Smarty::$_smarty_vars['capture']['pro_quick_view'])) {?> has_quick_view <?php }?> clearfix">
                <?php if (!$_smarty_tpl->tpl_vars['st_display_add_to_cart']->value) {?><?php echo Smarty::$_smarty_vars['capture']['pro_a_cart'];?>
<?php }?>
                <?php echo Smarty::$_smarty_vars['capture']['pro_quick_view'];?>

                <?php echo Smarty::$_smarty_vars['capture']['pro_a_compare'];?>

                <?php if (!$_smarty_tpl->tpl_vars['flyout_wishlist']->value&&isset($_smarty_tpl->tpl_vars['product']->value['pro_a_wishlist'])&&$_smarty_tpl->tpl_vars['product']->value['pro_a_wishlist']) {?><?php echo $_smarty_tpl->tpl_vars['product']->value['pro_a_wishlist'];?>
<?php }?>   
            </div>
        </div>
        <div class="pro_second_box">
        <?php if (isset($_smarty_tpl->tpl_vars['sttheme']->value['length_of_product_name'])&&$_smarty_tpl->tpl_vars['sttheme']->value['length_of_product_name']==1) {?>
            <?php $_smarty_tpl->tpl_vars["length_of_product_name"] = new Smarty_variable(70, null, 0);?>
        <?php } else { ?>
            <?php $_smarty_tpl->tpl_vars["length_of_product_name"] = new Smarty_variable(35, null, 0);?>
        <?php }?>
		<p class="s_title_block <?php if (isset($_smarty_tpl->tpl_vars['sttheme']->value['length_of_product_name'])&&$_smarty_tpl->tpl_vars['sttheme']->value['length_of_product_name']) {?> nohidden <?php }?>"><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['link'], ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
"><?php if (isset($_smarty_tpl->tpl_vars['sttheme']->value['length_of_product_name'])&&$_smarty_tpl->tpl_vars['sttheme']->value['length_of_product_name']==2) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
<?php } else { ?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['truncate'][0][0]->smarty_modifier_truncate($_smarty_tpl->tpl_vars['product']->value['name'],$_smarty_tpl->tpl_vars['length_of_product_name']->value,'...'), ENT_QUOTES, 'UTF-8', true);?>
<?php }?></a></p>
        <?php if ($_smarty_tpl->tpl_vars['product']->value['show_price']&&!isset($_smarty_tpl->tpl_vars['restricted_country_mode']->value)&&!$_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value) {?>
            <div class="price_container">
                <span class="price">
                <?php if (!$_smarty_tpl->tpl_vars['priceDisplay']->value) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['product']->value['price']),$_smarty_tpl);?>

                <?php } else { ?>
                <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['product']->value['price_tax_exc']),$_smarty_tpl);?>

                <?php }?>
                </span>
                <?php if (isset($_smarty_tpl->tpl_vars['product']->value['specific_prices'])&&$_smarty_tpl->tpl_vars['product']->value['specific_prices']&&isset($_smarty_tpl->tpl_vars['product']->value['specific_prices']['reduction'])&&$_smarty_tpl->tpl_vars['product']->value['specific_prices']['reduction']>0) {?>
                    <span class="old_price"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['product']->value['price_without_reduction']),$_smarty_tpl);?>
</span>
                    <?php if (isset($_smarty_tpl->tpl_vars['discount_percentage']->value)&&$_smarty_tpl->tpl_vars['discount_percentage']->value==1) {?>
                    <span class="sale_percentage">
                        -<?php if ($_smarty_tpl->tpl_vars['product']->value['specific_prices']&&$_smarty_tpl->tpl_vars['product']->value['specific_prices']['reduction_type']=='percentage') {?><?php echo $_smarty_tpl->tpl_vars['product']->value['specific_prices']['reduction']*floatval(100);?>
%<?php } elseif ($_smarty_tpl->tpl_vars['product']->value['specific_prices']&&$_smarty_tpl->tpl_vars['product']->value['specific_prices']['reduction_type']=='amount'&&floatval($_smarty_tpl->tpl_vars['product']->value['specific_prices']['reduction'])!=0) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['product']->value['price_without_reduction']-floatval($_smarty_tpl->tpl_vars['product']->value['price'])),$_smarty_tpl);?>
<?php }?>
                    </span>
                    <?php }?>
                <?php }?>
            </div>
        <?php } else { ?>
            <!--<div style="height:21px;"></div>-->
        <?php }?>
        <?php if (isset($_smarty_tpl->tpl_vars['display_sd']->value)&&$_smarty_tpl->tpl_vars['display_sd']->value) {?><p class="product_desc"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['truncate'][0][0]->smarty_modifier_truncate(strip_tags($_smarty_tpl->tpl_vars['product']->value['description_short']),120,'...');?>
</p><?php }?>
        <?php if (isset($_smarty_tpl->tpl_vars['product']->value['pro_rating_average'])&&$_smarty_tpl->tpl_vars['product']->value['pro_rating_average']) {?><?php echo $_smarty_tpl->tpl_vars['product']->value['pro_rating_average'];?>
<?php }?>   
        <?php if ($_smarty_tpl->tpl_vars['st_yotpo_sart']->value&&$_smarty_tpl->tpl_vars['st_yotpoAppkey']->value&&Smarty::$_smarty_vars['capture']['st_yotpoDomain']&&Smarty::$_smarty_vars['capture']['st_yotpoLanguage']) {?>
            <div class="yotpo bottomLine"
            data-appkey="<?php echo $_smarty_tpl->tpl_vars['st_yotpoAppkey']->value;?>
"
            data-domain="<?php echo Smarty::$_smarty_vars['capture']['st_yotpoDomain'];?>
"
            data-product-id="<?php echo $_smarty_tpl->tpl_vars['product']->value['id_product'];?>
"
            data-product-models=""
            data-name="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
"
            data-url="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['link'], ENT_QUOTES, 'UTF-8', true);?>
"
            data-image-url="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['pro_image']->value, ENT_QUOTES, 'UTF-8', true);?>
"
            data-description="<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['truncate'][0][0]->smarty_modifier_truncate(strip_tags($_smarty_tpl->tpl_vars['product']->value['description_short']),360,'...');?>
"
            data-lang="<?php echo htmlspecialchars(Smarty::$_smarty_vars['capture']['st_yotpoLanguage'], ENT_QUOTES, 'UTF-8', true);?>
"
            data-bread-crumbs="">
            </div>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['st_display_add_to_cart']->value==1||$_smarty_tpl->tpl_vars['st_display_add_to_cart']->value==2) {?>
        <div class="act_box <?php if ($_smarty_tpl->tpl_vars['st_display_add_to_cart']->value==1) {?> display_when_hover <?php } elseif ($_smarty_tpl->tpl_vars['st_display_add_to_cart']->value==2) {?> display_normal <?php }?>">
            <?php echo Smarty::$_smarty_vars['capture']['pro_a_cart'];?>

        </div>
        <?php }?>
        </div>
	</div>
<?php } ?>
</div><?php }} ?>
