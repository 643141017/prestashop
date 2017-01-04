<?php /* Smarty version Smarty-3.1.19, created on 2017-01-04 18:00:11
         compiled from "D:\WWW\prestashop16110\themes\panda\modules\productscategory\productscategory.tpl" */ ?>
<?php /*%%SmartyHeaderCode:28755586cc7ab7ab4f4-63238011%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9313c2e6a7c05feb04b8cd31009b4e3e2a5d8747' => 
    array (
      0 => 'D:\\WWW\\prestashop16110\\themes\\panda\\modules\\productscategory\\productscategory.tpl',
      1 => 1482908691,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '28755586cc7ab7ab4f4-63238011',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'categoryProducts' => 0,
    'pc_direction_nav' => 0,
    'new_sticker' => 0,
    'product' => 0,
    'sale_sticker' => 0,
    'PS_CATALOG_MODE' => 0,
    'restricted_country_mode' => 0,
    'discount_percentage' => 0,
    'link' => 0,
    'static_token' => 0,
    'st_display_add_to_cart' => 0,
    'fly_i' => 0,
    'flyout_buttons' => 0,
    'flyout_buttons_on_mobile' => 0,
    'sttheme' => 0,
    'length_of_product_name' => 0,
    'ProdDisplayPrice' => 0,
    'priceDisplay' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_586cc7ab93da79_41521986',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_586cc7ab93da79_41521986')) {function content_586cc7ab93da79_41521986($_smarty_tpl) {?>
<?php if (count($_smarty_tpl->tpl_vars['categoryProducts']->value)>0&&$_smarty_tpl->tpl_vars['categoryProducts']->value!==false) {?>
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
<?php $_smarty_tpl->tpl_vars['discount_percentage'] = new Smarty_variable(Configuration::get('STSN_DISCOUNT_PERCENTAGE'), null, 0);?>
<?php $_smarty_tpl->tpl_vars['new_sticker'] = new Smarty_variable(Configuration::get('STSN_NEW_STYLE'), null, 0);?>
<?php $_smarty_tpl->tpl_vars['sale_sticker'] = new Smarty_variable(Configuration::get('STSN_SALE_STYLE'), null, 0);?>
<?php $_smarty_tpl->tpl_vars['st_display_add_to_cart'] = new Smarty_variable(Configuration::get('STSN_DISPLAY_ADD_TO_CART'), null, 0);?>
<?php $_smarty_tpl->tpl_vars['flyout_buttons'] = new Smarty_variable(Configuration::get('STSN_FLYOUT_BUTTONS'), null, 0);?>
<?php $_smarty_tpl->tpl_vars['flyout_buttons_on_mobile'] = new Smarty_variable(Configuration::get('STSN_FLYOUT_BUTTONS_ON_MOBILE'), null, 0);?>
<section id="productscategory-products_block_center" class="page-product-box blockproductscategory products_block block section">
	<h3 class="title_block <?php if (Configuration::get('STSN_PC_TITLE')) {?> title_block_center <?php }?>"><span><?php echo count($_smarty_tpl->tpl_vars['categoryProducts']->value);?>
 <?php echo smartyTranslate(array('s'=>'Other products in the same category','mod'=>'productscategory'),$_smarty_tpl);?>
</span></h3>
	<div id="productscategory-itemslider" class="products_slider">  
        <?php $_smarty_tpl->tpl_vars['pc_direction_nav'] = new Smarty_variable(Configuration::get('STSN_PC_DIRECTION_NAV'), null, 0);?>
		<div class="slides remove_after_init <?php if ($_smarty_tpl->tpl_vars['pc_direction_nav']->value>1) {?> owl-navigation-lr <?php if ($_smarty_tpl->tpl_vars['pc_direction_nav']->value==4) {?> owl-navigation-circle <?php } else { ?> owl-navigation-rectangle <?php }?> <?php } elseif ($_smarty_tpl->tpl_vars['pc_direction_nav']->value==1) {?> owl-navigation-tr<?php }?>">
        <?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['categoryProducts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
    		<div class="ajax_block_product <?php if ($_smarty_tpl->tpl_vars['product']->first) {?>first_item<?php } elseif ($_smarty_tpl->tpl_vars['product']->last) {?>last_item<?php } else { ?>item<?php }?>">
                <?php $_smarty_tpl->_capture_stack[0][] = array("new_on_sale", null, null); ob_start(); ?>
                    <?php if ($_smarty_tpl->tpl_vars['new_sticker']->value!=2&&isset($_smarty_tpl->tpl_vars['product']->value['new'])&&$_smarty_tpl->tpl_vars['product']->value['new']==1) {?><span class="new"><i><?php echo smartyTranslate(array('s'=>'New','mod'=>'productscategory'),$_smarty_tpl);?>
</i></span><?php }?><?php if ($_smarty_tpl->tpl_vars['sale_sticker']->value!=2&&isset($_smarty_tpl->tpl_vars['product']->value['on_sale'])&&$_smarty_tpl->tpl_vars['product']->value['on_sale']&&isset($_smarty_tpl->tpl_vars['product']->value['show_price'])&&$_smarty_tpl->tpl_vars['product']->value['show_price']&&!$_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value) {?><span class="on_sale"><i><?php echo smartyTranslate(array('s'=>'Sale','mod'=>'productscategory'),$_smarty_tpl);?>
</i></span><?php }?><?php if ($_smarty_tpl->tpl_vars['product']->value['show_price']&&!isset($_smarty_tpl->tpl_vars['restricted_country_mode']->value)&&!$_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value) {?><?php if (isset($_smarty_tpl->tpl_vars['product']->value['specific_prices'])&&$_smarty_tpl->tpl_vars['product']->value['specific_prices']&&isset($_smarty_tpl->tpl_vars['product']->value['specific_prices']['reduction'])&&$_smarty_tpl->tpl_vars['product']->value['specific_prices']['reduction']>0&&isset($_smarty_tpl->tpl_vars['discount_percentage']->value)&&$_smarty_tpl->tpl_vars['discount_percentage']->value>1) {?><span class="sale_percentage_sticker"><?php if ($_smarty_tpl->tpl_vars['product']->value['specific_prices']&&$_smarty_tpl->tpl_vars['product']->value['specific_prices']['reduction_type']=='percentage') {?><?php echo $_smarty_tpl->tpl_vars['product']->value['specific_prices']['reduction']*floatval(100);?>
%<?php if ($_smarty_tpl->tpl_vars['discount_percentage']->value==2) {?><br/><?php } else { ?> <?php }?><?php echo smartyTranslate(array('s'=>'Off','mod'=>'productscategory'),$_smarty_tpl);?>
<?php } elseif ($_smarty_tpl->tpl_vars['product']->value['specific_prices']&&$_smarty_tpl->tpl_vars['product']->value['specific_prices']['reduction_type']=='amount'&&floatval($_smarty_tpl->tpl_vars['product']->value['specific_prices']['reduction'])!=0) {?><?php echo smartyTranslate(array('s'=>'Save','mod'=>'productscategory'),$_smarty_tpl);?>
<?php if ($_smarty_tpl->tpl_vars['discount_percentage']->value==2) {?><br/><?php } else { ?> <?php }?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['product']->value['price_without_reduction']-floatval($_smarty_tpl->tpl_vars['product']->value['price'])),$_smarty_tpl);?>
<?php }?></span><?php }?><?php }?>
                <?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
                <?php $_smarty_tpl->_capture_stack[0][] = array("pro_link", null, null); ob_start(); ?><?php echo $_smarty_tpl->tpl_vars['link']->value->getProductLink($_smarty_tpl->tpl_vars['product']->value['id_product'],$_smarty_tpl->tpl_vars['product']->value['link_rewrite'],$_smarty_tpl->tpl_vars['product']->value['category'],$_smarty_tpl->tpl_vars['product']->value['ean13']);?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
                <?php $_smarty_tpl->_capture_stack[0][] = array("pro_a_cart", null, null); ob_start(); ?>
                    <?php if (!$_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value&&($_smarty_tpl->tpl_vars['product']->value['allow_oosp']||$_smarty_tpl->tpl_vars['product']->value['quantity']>0)) {?>
                        <a class="ajax_add_to_cart_button btn btn-default" href="<?php ob_start();?><?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product']);?>
<?php $_tmp1=ob_get_clean();?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('cart',true,null,"qty=1&amp;id_product=".$_tmp1."&amp;token=".((string)$_smarty_tpl->tpl_vars['static_token']->value)."&amp;add"), ENT_QUOTES, 'UTF-8', true);?>
" rel="nofollow" title="<?php echo smartyTranslate(array('s'=>'Add to cart','mod'=>'productscategory'),$_smarty_tpl);?>
" data-id-product="<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product']);?>
"><div><i class="icon-glyph icon_btn icon-small icon-mar-lr2"></i><span><?php echo smartyTranslate(array('s'=>'Add to cart','mod'=>'productscategory'),$_smarty_tpl);?>
</span></div></a>
                    <?php }?>
                <?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
                <div class="pro_first_box">
                    <a href="<?php echo Smarty::$_smarty_vars['capture']['pro_link'];?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
" class="product_image"><img src="<?php echo $_smarty_tpl->tpl_vars['link']->value->getImageLink($_smarty_tpl->tpl_vars['product']->value['link_rewrite'],$_smarty_tpl->tpl_vars['product']->value['id_image'],'home_default');?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
" class="replace-2x img-responsive front-image" width="<?php echo Smarty::$_smarty_vars['capture']['home_default_width'];?>
" height="<?php echo Smarty::$_smarty_vars['capture']['home_default_height'];?>
" /><?php echo Smarty::$_smarty_vars['capture']['new_on_sale'];?>
</a>
                    <?php $_smarty_tpl->tpl_vars["fly_i"] = new Smarty_variable(0, null, 0);?>
                    <?php if (!$_smarty_tpl->tpl_vars['st_display_add_to_cart']->value&&trim(Smarty::$_smarty_vars['capture']['pro_a_cart'])) {?><?php $_smarty_tpl->tpl_vars["fly_i"] = new Smarty_variable($_smarty_tpl->tpl_vars['fly_i']->value+1, null, 0);?><?php }?>
                    <div class="hover_fly <?php if ($_smarty_tpl->tpl_vars['flyout_buttons']->value) {?>hover_fly_static<?php }?> <?php if ($_smarty_tpl->tpl_vars['flyout_buttons_on_mobile']->value==1) {?> mobile_hover_fly_show <?php } elseif ($_smarty_tpl->tpl_vars['flyout_buttons_on_mobile']->value==2) {?> mobile_hover_fly_cart <?php } else { ?> mobile_hover_fly_hide <?php }?> fly_<?php echo $_smarty_tpl->tpl_vars['fly_i']->value;?>
 clearfix">
                        <?php if (!$_smarty_tpl->tpl_vars['st_display_add_to_cart']->value) {?><?php echo Smarty::$_smarty_vars['capture']['pro_a_cart'];?>
<?php }?>
                    </div>
                </div>
                <div class="pro_second_box">
                <?php if (isset($_smarty_tpl->tpl_vars['sttheme']->value['length_of_product_name'])&&$_smarty_tpl->tpl_vars['sttheme']->value['length_of_product_name']==1) {?>
                    <?php $_smarty_tpl->tpl_vars["length_of_product_name"] = new Smarty_variable(70, null, 0);?>
                <?php } else { ?>
                    <?php $_smarty_tpl->tpl_vars["length_of_product_name"] = new Smarty_variable(35, null, 0);?>
                <?php }?>
    			<p itemprop="name" class="s_title_block <?php if (isset($_smarty_tpl->tpl_vars['sttheme']->value['length_of_product_name'])&&$_smarty_tpl->tpl_vars['sttheme']->value['length_of_product_name']) {?> nohidden <?php }?>"><a href="<?php echo Smarty::$_smarty_vars['capture']['pro_link'];?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
"><?php if (isset($_smarty_tpl->tpl_vars['sttheme']->value['length_of_product_name'])&&$_smarty_tpl->tpl_vars['sttheme']->value['length_of_product_name']==2) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
<?php } else { ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['truncate'][0][0]->smarty_modifier_truncate(htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8', true),$_smarty_tpl->tpl_vars['length_of_product_name']->value,'...');?>
<?php }?></a></p>
                <?php if ($_smarty_tpl->tpl_vars['ProdDisplayPrice']->value&&$_smarty_tpl->tpl_vars['product']->value['show_price']==1&&!isset($_smarty_tpl->tpl_vars['restricted_country_mode']->value)&&!$_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value) {?>
				<div class="price_container">
					<span class="price"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['product']->value['displayed_price']),$_smarty_tpl);?>
</span>
                    <?php if (isset($_smarty_tpl->tpl_vars['product']->value['specific_prices'])&&$_smarty_tpl->tpl_vars['product']->value['specific_prices']&&(number_format($_smarty_tpl->tpl_vars['product']->value['displayed_price'],2)!==number_format($_smarty_tpl->tpl_vars['product']->value['price_without_reduction'],2))) {?>
                        <span class="old-price"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayWtPrice'][0][0]->displayWtPrice(array('p'=>$_smarty_tpl->tpl_vars['product']->value['price_without_reduction']),$_smarty_tpl);?>
</span>
                		<?php if (isset($_smarty_tpl->tpl_vars['discount_percentage']->value)&&$_smarty_tpl->tpl_vars['discount_percentage']->value==1) {?>
                            <?php if ($_smarty_tpl->tpl_vars['product']->value['specific_prices']&&$_smarty_tpl->tpl_vars['product']->value['specific_prices']['reduction_type']=='percentage') {?><span class="sale_percentage">-<?php echo $_smarty_tpl->tpl_vars['product']->value['specific_prices']['reduction']*floatval(100);?>
%</span><?php } elseif ($_smarty_tpl->tpl_vars['product']->value['specific_prices']&&$_smarty_tpl->tpl_vars['product']->value['specific_prices']['reduction_type']=='amount'&&floatval($_smarty_tpl->tpl_vars['product']->value['specific_prices']['reduction'])!=0) {?><span class="sale_percentage">-<?php if (!$_smarty_tpl->tpl_vars['priceDisplay']->value) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['product']->value['price_without_reduction']-floatval($_smarty_tpl->tpl_vars['product']->value['price'])),$_smarty_tpl);?>
</span><?php } else { ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['product']->value['price_without_reduction']-floatval($_smarty_tpl->tpl_vars['product']->value['displayed_price'])),$_smarty_tpl);?>
<?php }?><?php }?>
                        <?php }?>
                    <?php }?>
				</div>
				<?php } else { ?>
				<?php }?>  
                <?php if ($_smarty_tpl->tpl_vars['st_display_add_to_cart']->value==1||$_smarty_tpl->tpl_vars['st_display_add_to_cart']->value==2) {?>
                <div class="act_box <?php if ($_smarty_tpl->tpl_vars['st_display_add_to_cart']->value==1) {?> display_when_hover <?php } elseif ($_smarty_tpl->tpl_vars['st_display_add_to_cart']->value==2) {?> display_normal <?php }?>">
                    <?php echo Smarty::$_smarty_vars['capture']['pro_a_cart'];?>

                </div>
                <?php }?>
                </div>
    		</div>
		<?php } ?>
		</div>
    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayAnywhere','function'=>"getCarouselJavascript",'identify'=>'productscategory','mod'=>'stthemeeditor','caller'=>'stthemeeditor'),$_smarty_tpl);?>

</section>
<?php }?><?php }} ?>
