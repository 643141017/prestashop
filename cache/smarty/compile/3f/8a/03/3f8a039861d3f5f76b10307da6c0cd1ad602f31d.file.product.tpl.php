<?php /* Smarty version Smarty-3.1.19, created on 2017-01-04 18:00:11
         compiled from "D:\WWW\prestashop16110\themes\panda\product.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4677586cc7abd4cb74-72892992%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3f8a039861d3f5f76b10307da6c0cd1ad602f31d' => 
    array (
      0 => 'D:\\WWW\\prestashop16110\\themes\\panda\\product.tpl',
      1 => 1482908691,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4677586cc7abd4cb74-72892992',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'errors' => 0,
    'priceDisplayPrecision' => 0,
    'priceDisplay' => 0,
    'product' => 0,
    'sttheme' => 0,
    'enable_google_rich_snippets' => 0,
    'adminActionDisplay' => 0,
    'confirmation' => 0,
    'product_big_image' => 0,
    'new_sticker' => 0,
    'sale_sticker' => 0,
    'PS_CATALOG_MODE' => 0,
    'restricted_country_mode' => 0,
    'discount_percentage' => 0,
    'productPriceWithoutReduction' => 0,
    'productPrice' => 0,
    'have_image' => 0,
    'thumbs_direction_nav' => 0,
    'images' => 0,
    'image' => 0,
    'enable_zoom' => 0,
    'enable_thickbox' => 0,
    'content_only' => 0,
    'imageIds' => 0,
    'link' => 0,
    'cover' => 0,
    'imageTitle' => 0,
    'largeSize' => 0,
    'img_prod_dir' => 0,
    'lang_iso' => 0,
    'features' => 0,
    'HOOK_PRODUCT_TAB' => 0,
    'attachments' => 0,
    'cookie' => 0,
    'tag' => 0,
    'feature' => 0,
    'attachment' => 0,
    'customizationFormTarget' => 0,
    'customizationFields' => 0,
    'field' => 0,
    'key' => 0,
    'pictures' => 0,
    'pic_dir' => 0,
    'img_dir' => 0,
    'customizationField' => 0,
    'textFields' => 0,
    'img_ps_dir' => 0,
    'HOOK_PRODUCT_TAB_CONTENT' => 0,
    'product_secondary' => 0,
    'HOOK_EXTRA_RIGHT' => 0,
    'display_pro_reference' => 0,
    'groups' => 0,
    'display_pro_condition' => 0,
    'packItems' => 0,
    'packItem' => 0,
    'static_token' => 0,
    'tax_enabled' => 0,
    'display_tax_label' => 0,
    'currency' => 0,
    'group_reduction' => 0,
    'ecotax_tax_exc' => 0,
    'ecotax_tax_inc' => 0,
    'unit_price' => 0,
    'group' => 0,
    'id_attribute_group' => 0,
    'groupName' => 0,
    'id_attribute' => 0,
    'group_attribute' => 0,
    'col_img_dir' => 0,
    'colors' => 0,
    'img_color_exists' => 0,
    'img_col_dir' => 0,
    'default_colorpicker' => 0,
    'display_qties' => 0,
    'PS_STOCK_MANAGEMENT' => 0,
    'allow_oosp' => 0,
    'last_qties' => 0,
    'HOOK_PRODUCT_OOS' => 0,
    'quantityBackup' => 0,
    'show_brand_logo' => 0,
    'product_manufacturer' => 0,
    'img_manu_dir' => 0,
    'HOOK_PRODUCT_ACTIONS' => 0,
    'HOOK_EXTRA_LEFT' => 0,
    'product_tabs' => 0,
    'HOOK_PRODUCT_SECONDARY_COLUMN' => 0,
    'quantity_discounts' => 0,
    'display_discount_price' => 0,
    'quantity_discount' => 0,
    'discountPrice' => 0,
    'qtyProductPrice' => 0,
    'accessories' => 0,
    'ac_direction_nav' => 0,
    'accessory' => 0,
    'accessoryLink' => 0,
    'homeSize' => 0,
    'flyout_comparison' => 0,
    'comparator_max_item' => 0,
    'flyout_wishlist' => 0,
    'flyout_quickview' => 0,
    'quick_view' => 0,
    'st_display_add_to_cart' => 0,
    'fly_i' => 0,
    'flyout_buttons' => 0,
    'flyout_buttons_on_mobile' => 0,
    'length_of_product_name' => 0,
    'HOOK_PRODUCT_FOOTER' => 0,
    'base_dir' => 0,
    'attribute_anchor_separator' => 0,
    'attributesCombinations' => 0,
    'currencySign' => 0,
    'currencyRate' => 0,
    'currencyFormat' => 0,
    'currencyBlank' => 0,
    'combinations' => 0,
    'combinationImages' => 0,
    'ecotaxTax_rate' => 0,
    'jqZoomEnabled' => 0,
    'no_tax' => 0,
    'customer_group_without_tax' => 0,
    'tax_rate' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_586cc7ac853475_97316273',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_586cc7ac853475_97316273')) {function content_586cc7ac853475_97316273($_smarty_tpl) {?><?php if (!is_callable('smarty_function_cycle')) include 'D:\\WWW\\prestashop16110\\tools\\smarty\\plugins\\function.cycle.php';
if (!is_callable('smarty_function_counter')) include 'D:\\WWW\\prestashop16110\\tools\\smarty\\plugins\\function.counter.php';
if (!is_callable('smarty_function_math')) include 'D:\\WWW\\prestashop16110\\tools\\smarty\\plugins\\function.math.php';
if (!is_callable('smarty_modifier_date_format')) include 'D:\\WWW\\prestashop16110\\tools\\smarty\\plugins\\modifier.date_format.php';
?>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_dir']->value)."./errors.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<?php if (count($_smarty_tpl->tpl_vars['errors']->value)==0) {?>
	<?php if (!isset($_smarty_tpl->tpl_vars['priceDisplayPrecision']->value)) {?>
		<?php $_smarty_tpl->tpl_vars['priceDisplayPrecision'] = new Smarty_variable(2, null, 0);?>
	<?php }?>
	<?php if (!$_smarty_tpl->tpl_vars['priceDisplay']->value||$_smarty_tpl->tpl_vars['priceDisplay']->value==2) {?>
		<?php $_smarty_tpl->tpl_vars['productPrice'] = new Smarty_variable($_smarty_tpl->tpl_vars['product']->value->getPrice(true,@constant('NULL'),$_smarty_tpl->tpl_vars['priceDisplayPrecision']->value), null, 0);?>
		<?php $_smarty_tpl->tpl_vars['productPriceWithoutReduction'] = new Smarty_variable($_smarty_tpl->tpl_vars['product']->value->getPriceWithoutReduct(false,@constant('NULL'),$_smarty_tpl->tpl_vars['priceDisplayPrecision']->value), null, 0);?>
	<?php } elseif ($_smarty_tpl->tpl_vars['priceDisplay']->value==1) {?>
		<?php $_smarty_tpl->tpl_vars['productPrice'] = new Smarty_variable($_smarty_tpl->tpl_vars['product']->value->getPrice(false,@constant('NULL'),$_smarty_tpl->tpl_vars['priceDisplayPrecision']->value), null, 0);?>
		<?php $_smarty_tpl->tpl_vars['productPriceWithoutReduction'] = new Smarty_variable($_smarty_tpl->tpl_vars['product']->value->getPriceWithoutReduct(true,@constant('NULL'),$_smarty_tpl->tpl_vars['priceDisplayPrecision']->value), null, 0);?>
	<?php }?>

	<?php $_smarty_tpl->tpl_vars['product_tabs'] = new Smarty_variable(Configuration::get('STSN_PRODUCT_TABS'), null, 0);?>
	<?php $_smarty_tpl->tpl_vars['show_brand_logo'] = new Smarty_variable(Configuration::get('STSN_SHOW_BRAND_LOGO'), null, 0);?>
	<?php $_smarty_tpl->tpl_vars['product_big_image'] = new Smarty_variable(Configuration::get('STSN_PRODUCT_BIG_IMAGE'), null, 0);?>
	<?php $_smarty_tpl->tpl_vars['discount_percentage'] = new Smarty_variable(Configuration::get('STSN_DISCOUNT_PERCENTAGE'), null, 0);?>
	<?php $_smarty_tpl->tpl_vars['enable_zoom'] = new Smarty_variable(Configuration::get('STSN_ENABLE_ZOOM'), null, 0);?>
	<?php $_smarty_tpl->tpl_vars['enable_thickbox'] = new Smarty_variable(Configuration::get('STSN_ENABLE_THICKBOX'), null, 0);?>
	<?php $_smarty_tpl->tpl_vars['thumbs_direction_nav'] = new Smarty_variable(Configuration::get('STSN_THUMBS_DIRECTION_NAV'), null, 0);?>
	<?php $_smarty_tpl->tpl_vars['product_secondary'] = new Smarty_variable(Configuration::get('STSN_PRODUCT_SECONDARY'), null, 0);?>
	<?php $_smarty_tpl->_capture_stack[0][] = array("big_default_width", null, null); ob_start(); ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['getWidthSize'][0][0]->getWidth(array('type'=>'big_default'),$_smarty_tpl);?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
	<?php $_smarty_tpl->_capture_stack[0][] = array("big_default_height", null, null); ob_start(); ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['getHeightSize'][0][0]->getHeight(array('type'=>'big_default'),$_smarty_tpl);?>
<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
	<?php $_smarty_tpl->tpl_vars['new_sticker'] = new Smarty_variable(Configuration::get('STSN_NEW_STYLE'), null, 0);?>
	<?php $_smarty_tpl->tpl_vars['sale_sticker'] = new Smarty_variable(Configuration::get('STSN_SALE_STYLE'), null, 0);?>
	<?php $_smarty_tpl->tpl_vars['display_pro_condition'] = new Smarty_variable(Configuration::get('STSN_DISPLAY_PRO_CONDITION'), null, 0);?>
	<?php $_smarty_tpl->tpl_vars['display_pro_reference'] = new Smarty_variable(Configuration::get('STSN_DISPLAY_PRO_REFERENCE'), null, 0);?>
	<?php $_smarty_tpl->tpl_vars['enable_google_rich_snippets'] = new Smarty_variable((!isset($_smarty_tpl->tpl_vars['sttheme']->value['google_rich_snippets'])||(isset($_smarty_tpl->tpl_vars['sttheme']->value['google_rich_snippets'])&&$_smarty_tpl->tpl_vars['sttheme']->value['google_rich_snippets'])), null, 0);?>
	<?php if ($_smarty_tpl->tpl_vars['enable_google_rich_snippets']->value) {?><div itemscope itemtype="http://schema.org/Product"><?php }?>
	<div class="primary_block row">
		<?php if (isset($_smarty_tpl->tpl_vars['adminActionDisplay']->value)&&$_smarty_tpl->tpl_vars['adminActionDisplay']->value) {?>
			<div id="admin-action">
				<p><?php echo smartyTranslate(array('s'=>'This product is not visible to your customers.'),$_smarty_tpl);?>

					<input type="hidden" id="admin-action-product-id" value="<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
" />
					<input type="submit" value="<?php echo smartyTranslate(array('s'=>'Publish'),$_smarty_tpl);?>
" name="publish_button" class="exclusive" />
					<input type="submit" value="<?php echo smartyTranslate(array('s'=>'Back'),$_smarty_tpl);?>
" name="lnk_view" class="exclusive" />
				</p>
				<p id="admin-action-result"></p>
			</div>
		<?php }?>
		<?php if (isset($_smarty_tpl->tpl_vars['confirmation']->value)&&$_smarty_tpl->tpl_vars['confirmation']->value) {?>
			<p class="confirmation">
				<?php echo $_smarty_tpl->tpl_vars['confirmation']->value;?>

			</p>
		<?php }?>
		<!-- left infos-->
		<div class="pb-left-column col-xs-12 <?php if (isset($_smarty_tpl->tpl_vars['product_big_image']->value)&&$_smarty_tpl->tpl_vars['product_big_image']->value) {?> col-sm-6 <?php } else { ?> col-sm-4 <?php }?>">
			<!-- product img-->
			<div id="image-block" class="clearfix">
				<?php $_smarty_tpl->_capture_stack[0][] = array("sale_reduction", null, null); ob_start(); ?>
		            <?php if ($_smarty_tpl->tpl_vars['new_sticker']->value!=2&&$_smarty_tpl->tpl_vars['product']->value->new) {?><span class="new"><i><?php echo smartyTranslate(array('s'=>'New'),$_smarty_tpl);?>
</i></span><?php }?>
		            <?php if ($_smarty_tpl->tpl_vars['sale_sticker']->value!=2&&$_smarty_tpl->tpl_vars['product']->value->show_price&&!$_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value&&$_smarty_tpl->tpl_vars['product']->value->on_sale) {?><span class="on_sale"><i><?php echo smartyTranslate(array('s'=>'Sale'),$_smarty_tpl);?>
</i></span><?php }?>
		            <?php if ($_smarty_tpl->tpl_vars['product']->value->show_price&&!isset($_smarty_tpl->tpl_vars['restricted_country_mode']->value)&&!$_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value&&isset($_smarty_tpl->tpl_vars['discount_percentage']->value)&&$_smarty_tpl->tpl_vars['discount_percentage']->value>1) {?>
						<div id="reduction_percent" <?php if (!$_smarty_tpl->tpl_vars['product']->value->specificPrice||$_smarty_tpl->tpl_vars['product']->value->specificPrice['reduction_type']!='percentage') {?> style="display:none;"<?php }?>>
							<span class="sale_percentage_sticker" id="reduction_percent_display">
								<?php if ($_smarty_tpl->tpl_vars['product']->value->specificPrice&&$_smarty_tpl->tpl_vars['product']->value->specificPrice['reduction_type']=='percentage') {?><?php echo $_smarty_tpl->tpl_vars['product']->value->specificPrice['reduction']*100;?>
%<?php if ($_smarty_tpl->tpl_vars['discount_percentage']->value==2) {?><br/><?php } else { ?> <?php }?><?php echo smartyTranslate(array('s'=>'Off'),$_smarty_tpl);?>
<?php }?>
							</span>
						</div>
						<div id="reduction_amount" <?php if (!$_smarty_tpl->tpl_vars['product']->value->specificPrice||$_smarty_tpl->tpl_vars['product']->value->specificPrice['reduction_type']!='amount'||floatval($_smarty_tpl->tpl_vars['product']->value->specificPrice['reduction'])==0) {?> style="display:none"<?php }?>>
							<span class="sale_percentage_sticker" id="reduction_amount_display" >
							<?php if ($_smarty_tpl->tpl_vars['product']->value->specificPrice&&$_smarty_tpl->tpl_vars['product']->value->specificPrice['reduction_type']=='amount'&&floatval($_smarty_tpl->tpl_vars['product']->value->specificPrice['reduction'])!=0) {?>
								<?php echo smartyTranslate(array('s'=>'Save'),$_smarty_tpl);?>
<?php if ($_smarty_tpl->tpl_vars['discount_percentage']->value==2) {?><br/><?php } else { ?> <?php }?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['productPriceWithoutReduction']->value-floatval($_smarty_tpl->tpl_vars['productPrice']->value)),$_smarty_tpl);?>

							<?php }?>
							</span>
						</div>
					<?php }?>
		        <?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

				<?php if ($_smarty_tpl->tpl_vars['have_image']->value) {?>
					<div id="view_full_size">
						<div id="bigpic_list_frame" class="owl-carousel owl-navigation-lr <?php if ($_smarty_tpl->tpl_vars['thumbs_direction_nav']->value==4) {?> owl-navigation-circle <?php } else { ?> owl-navigation-rectangle <?php }?>">
						<?php  $_smarty_tpl->tpl_vars['image'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['image']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['images']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['image']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['image']->key => $_smarty_tpl->tpl_vars['image']->value) {
$_smarty_tpl->tpl_vars['image']->_loop = true;
 $_smarty_tpl->tpl_vars['image']->index++;
?>
							<?php $_smarty_tpl->tpl_vars['imageIds'] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['product']->value->id)."-".((string)$_smarty_tpl->tpl_vars['image']->value['id_image']), null, 0);?>
							<?php if (!empty($_smarty_tpl->tpl_vars['image']->value['legend'])) {?>
								<?php $_smarty_tpl->tpl_vars['imageTitle'] = new Smarty_variable(htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['legend'], ENT_QUOTES, 'UTF-8', true), null, 0);?>
							<?php } else { ?>
								<?php $_smarty_tpl->tpl_vars['imageTitle'] = new Smarty_variable(htmlspecialchars($_smarty_tpl->tpl_vars['product']->value->name, ENT_QUOTES, 'UTF-8', true), null, 0);?>
							<?php }?>
							<div class="item">
								<div id="bigpic_<?php echo $_smarty_tpl->tpl_vars['image']->value['id_image'];?>
" class="<?php if ($_smarty_tpl->tpl_vars['enable_zoom']->value) {?> easyzoom <?php }?> <?php if ($_smarty_tpl->tpl_vars['enable_zoom']->value==2) {?> disable_easyzoom_on_mobile <?php }?> bigpic_item easyzoom--overlay">
									<a href="<?php if (($_smarty_tpl->tpl_vars['enable_zoom']->value||$_smarty_tpl->tpl_vars['enable_thickbox']->value)&&(!$_smarty_tpl->tpl_vars['content_only']->value||($_smarty_tpl->tpl_vars['content_only']->value&&$_smarty_tpl->tpl_vars['enable_zoom']->value))) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getImageLink($_smarty_tpl->tpl_vars['product']->value->link_rewrite,$_smarty_tpl->tpl_vars['imageIds']->value,'thickbox_default'), ENT_QUOTES, 'UTF-8', true);?>
<?php } else { ?>javascript:;<?php }?>" <?php if ($_smarty_tpl->tpl_vars['enable_thickbox']->value) {?> data-fancybox-group="other-views" class="fancybox<?php if ($_smarty_tpl->tpl_vars['image']->value['id_image']==$_smarty_tpl->tpl_vars['cover']->value['id_image']) {?> shown<?php }?>" <?php }?> title="<?php echo $_smarty_tpl->tpl_vars['imageTitle']->value;?>
" itemprop="url">
										<img class="img-responsive" <?php if (isset($_smarty_tpl->tpl_vars['product_big_image']->value)&&$_smarty_tpl->tpl_vars['product_big_image']->value) {?> src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getImageLink($_smarty_tpl->tpl_vars['product']->value->link_rewrite,$_smarty_tpl->tpl_vars['imageIds']->value,'big_default'), ENT_QUOTES, 'UTF-8', true);?>
" height="<?php echo Smarty::$_smarty_vars['capture']['big_default_height'];?>
" width="<?php echo Smarty::$_smarty_vars['capture']['big_default_width'];?>
" <?php } else { ?> src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getImageLink($_smarty_tpl->tpl_vars['product']->value->link_rewrite,$_smarty_tpl->tpl_vars['imageIds']->value,'large_default'), ENT_QUOTES, 'UTF-8', true);?>
" height="<?php echo $_smarty_tpl->tpl_vars['largeSize']->value['height'];?>
" width="<?php echo $_smarty_tpl->tpl_vars['largeSize']->value['width'];?>
" <?php }?> title="<?php echo $_smarty_tpl->tpl_vars['imageTitle']->value;?>
" itemprop="image" />
										<?php if (!$_smarty_tpl->tpl_vars['content_only']->value&&!$_smarty_tpl->tpl_vars['enable_zoom']->value&&$_smarty_tpl->tpl_vars['enable_thickbox']->value) {?><span class="span_link no-print"><i class="icon-resize-full icon-0x"></i></span><?php }?>
									</a>
								</div>
								<?php if (!$_smarty_tpl->tpl_vars['content_only']->value&&$_smarty_tpl->tpl_vars['enable_thickbox']->value&&$_smarty_tpl->tpl_vars['enable_zoom']->value) {?>
									<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getImageLink($_smarty_tpl->tpl_vars['product']->value->link_rewrite,$_smarty_tpl->tpl_vars['imageIds']->value,'thickbox_default'), ENT_QUOTES, 'UTF-8', true);?>
" data-fancybox-group="other-views" class="span_link no-print<?php if ($_smarty_tpl->tpl_vars['image']->value['id_image']==$_smarty_tpl->tpl_vars['cover']->value['id_image']) {?> shown<?php }?>" title="<?php echo smartyTranslate(array('s'=>'View larger'),$_smarty_tpl);?>
"><i class="icon-resize-full icon-0x"></i></a>
								<?php }?>
							</div>
						<?php } ?>
						</div>
						<?php echo Smarty::$_smarty_vars['capture']['sale_reduction'];?>

					</div>
				<?php } else { ?>
					<div id="view_full_size">
						<img itemprop="image" <?php if (isset($_smarty_tpl->tpl_vars['product_big_image']->value)&&$_smarty_tpl->tpl_vars['product_big_image']->value) {?> src="<?php echo $_smarty_tpl->tpl_vars['img_prod_dir']->value;?>
<?php echo $_smarty_tpl->tpl_vars['lang_iso']->value;?>
-default-big_default.jpg" height="<?php echo Smarty::$_smarty_vars['capture']['big_default_height'];?>
" width="<?php echo Smarty::$_smarty_vars['capture']['big_default_width'];?>
" <?php } else { ?> src="<?php echo $_smarty_tpl->tpl_vars['img_prod_dir']->value;?>
<?php echo $_smarty_tpl->tpl_vars['lang_iso']->value;?>
-default-large_default.jpg" width="<?php echo $_smarty_tpl->tpl_vars['largeSize']->value['width'];?>
" height="<?php echo $_smarty_tpl->tpl_vars['largeSize']->value['height'];?>
" <?php }?> id="bigpic" alt="" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value->name, ENT_QUOTES, 'UTF-8', true);?>
" />
						<?php echo Smarty::$_smarty_vars['capture']['sale_reduction'];?>

					</div>
				<?php }?>
			</div> <!-- end image-block -->
			<?php if (isset($_smarty_tpl->tpl_vars['images']->value)&&count($_smarty_tpl->tpl_vars['images']->value)>0) {?>
				<!-- thumbnails -->
				<div id="views_block" class="clearfix <?php if (isset($_smarty_tpl->tpl_vars['images']->value)&&count($_smarty_tpl->tpl_vars['images']->value)<2) {?>hidden<?php }?>">
					<div id="thumbs_list" class="products_slider">
						<div id="thumbs_list_frame" class="owl-carousel owl-navigation-lr <?php if ($_smarty_tpl->tpl_vars['thumbs_direction_nav']->value==4) {?> owl-navigation-circle <?php } else { ?> owl-navigation-rectangle <?php }?>">
						<?php if (isset($_smarty_tpl->tpl_vars['images']->value)) {?>
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
							<?php  $_smarty_tpl->tpl_vars['image'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['image']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['images']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['image']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['image']->key => $_smarty_tpl->tpl_vars['image']->value) {
$_smarty_tpl->tpl_vars['image']->_loop = true;
 $_smarty_tpl->tpl_vars['image']->index++;
?>
								<?php $_smarty_tpl->tpl_vars['imageIds'] = new Smarty_variable(((string)$_smarty_tpl->tpl_vars['product']->value->id)."-".((string)$_smarty_tpl->tpl_vars['image']->value['id_image']), null, 0);?>
								<?php if (!empty($_smarty_tpl->tpl_vars['image']->value['legend'])) {?>
									<?php $_smarty_tpl->tpl_vars['imageTitle'] = new Smarty_variable(htmlspecialchars($_smarty_tpl->tpl_vars['image']->value['legend'], ENT_QUOTES, 'UTF-8', true), null, 0);?>
								<?php } else { ?>
									<?php $_smarty_tpl->tpl_vars['imageTitle'] = new Smarty_variable(htmlspecialchars($_smarty_tpl->tpl_vars['product']->value->name, ENT_QUOTES, 'UTF-8', true), null, 0);?>
								<?php }?>
								<div id="thumbnail_<?php echo $_smarty_tpl->tpl_vars['image']->value['id_image'];?>
" data-item-nbr="<?php echo $_smarty_tpl->tpl_vars['image']->index;?>
" class="item">
									<a href="javascript:;" title="<?php echo $_smarty_tpl->tpl_vars['imageTitle']->value;?>
">
										<img class="img-responsive" id="thumb_<?php echo $_smarty_tpl->tpl_vars['image']->value['id_image'];?>
" src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getImageLink($_smarty_tpl->tpl_vars['product']->value->link_rewrite,$_smarty_tpl->tpl_vars['imageIds']->value,'small_default'), ENT_QUOTES, 'UTF-8', true);?>
" alt="<?php echo $_smarty_tpl->tpl_vars['imageTitle']->value;?>
" title="<?php echo $_smarty_tpl->tpl_vars['imageTitle']->value;?>
" height="<?php echo Smarty::$_smarty_vars['capture']['small_default_height'];?>
" width="<?php echo Smarty::$_smarty_vars['capture']['small_default_width'];?>
" itemprop="image" />
									</a>
								</div>
							<?php } ?>
						<?php }?>
						</div>

					</div> <!-- end thumbs_list -->
				</div> <!-- end views-block -->
		         <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayAnywhere','function'=>"getProThumbsItemsCustom",'mod'=>'stthemeeditor','caller'=>'stthemeeditor'),$_smarty_tpl);?>

				<!-- end thumbnails -->
			<?php }?>
			<?php if (isset($_smarty_tpl->tpl_vars['images']->value)&&count($_smarty_tpl->tpl_vars['images']->value)>1) {?>
				<p class="resetimg clear no-print">
					<span id="wrapResetImages" style="display: none;">
						<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getProductLink($_smarty_tpl->tpl_vars['product']->value), ENT_QUOTES, 'UTF-8', true);?>
" data-id="resetImages">
							<i class="icon-repeat"></i>
							<?php echo smartyTranslate(array('s'=>'Display all pictures'),$_smarty_tpl);?>

						</a>
					</span>
				</p>
			<?php }?>
		</div> <!-- end pb-left-column -->
		<!-- end left infos-->

		<?php $_smarty_tpl->_capture_stack[0][] = array("product_tabs", null, null); ob_start(); ?>
		<?php if ((isset($_smarty_tpl->tpl_vars['product']->value)&&$_smarty_tpl->tpl_vars['product']->value->description)||(isset($_smarty_tpl->tpl_vars['features']->value)&&$_smarty_tpl->tpl_vars['features']->value)||(isset($_smarty_tpl->tpl_vars['HOOK_PRODUCT_TAB']->value)&&$_smarty_tpl->tpl_vars['HOOK_PRODUCT_TAB']->value)||(isset($_smarty_tpl->tpl_vars['attachments']->value)&&$_smarty_tpl->tpl_vars['attachments']->value)||isset($_smarty_tpl->tpl_vars['product']->value)&&$_smarty_tpl->tpl_vars['product']->value->customizable) {?>
		<div id="more_info_block">
			<ul id="more_info_tabs" class="idTabs common_tabs li_fl clearfix">
				<?php if (isset($_smarty_tpl->tpl_vars['product']->value)&&$_smarty_tpl->tpl_vars['product']->value->description) {?><li><a id="more_info_tab_more_info" href="#idTab1"><?php echo smartyTranslate(array('s'=>'More info'),$_smarty_tpl);?>
</a></li><?php }?>
			    <?php if (isset($_smarty_tpl->tpl_vars['sttheme']->value['display_pro_tags'])&&$_smarty_tpl->tpl_vars['sttheme']->value['display_pro_tags']==1&&isset($_smarty_tpl->tpl_vars['product']->value->tags[$_smarty_tpl->tpl_vars['cookie']->value->id_lang])&&count($_smarty_tpl->tpl_vars['product']->value->tags[$_smarty_tpl->tpl_vars['cookie']->value->id_lang])) {?><li><a id="more_info_tab_tags" href="#idTab211"><?php echo smartyTranslate(array('s'=>'Tags'),$_smarty_tpl);?>
</a></li><?php }?>
				<?php if (isset($_smarty_tpl->tpl_vars['features']->value)&&$_smarty_tpl->tpl_vars['features']->value) {?><li><a id="more_info_tab_data_sheet" href="#idTab2"><?php echo smartyTranslate(array('s'=>'Data sheet'),$_smarty_tpl);?>
</a></li><?php }?>
				<?php if (isset($_smarty_tpl->tpl_vars['attachments']->value)&&$_smarty_tpl->tpl_vars['attachments']->value) {?><li><a id="more_info_tab_attachments" href="#idTab9"><?php echo smartyTranslate(array('s'=>'Download'),$_smarty_tpl);?>
</a></li><?php }?>
				<?php if (isset($_smarty_tpl->tpl_vars['product']->value)&&$_smarty_tpl->tpl_vars['product']->value->customizable) {?><li><a href="#idTab10"><?php echo smartyTranslate(array('s'=>'Product customization'),$_smarty_tpl);?>
</a></li><?php }?>
				<?php echo $_smarty_tpl->tpl_vars['HOOK_PRODUCT_TAB']->value;?>

			</ul>

			<div id="more_info_sheets" class="sheets align_justify">
				<?php if (isset($_smarty_tpl->tpl_vars['product']->value)&&$_smarty_tpl->tpl_vars['product']->value->description) {?>
				<div id="idTab1" class="rte product_accordion open">
					<!-- full description -->
			        <a href="javascript:;" class="opener">&nbsp;</a>
			        <div class="product_accordion_title">
			            <?php echo smartyTranslate(array('s'=>'More info'),$_smarty_tpl);?>

			        </div>
			        <div class="pa_content">
			            <div class="rte"><?php echo $_smarty_tpl->tpl_vars['product']->value->description;?>
</div>
			        </div>
			    </div>
				<?php }?>

				<?php if (isset($_smarty_tpl->tpl_vars['sttheme']->value['display_pro_tags'])&&$_smarty_tpl->tpl_vars['sttheme']->value['display_pro_tags']==1&&isset($_smarty_tpl->tpl_vars['product']->value->tags[$_smarty_tpl->tpl_vars['cookie']->value->id_lang])&&count($_smarty_tpl->tpl_vars['product']->value->tags[$_smarty_tpl->tpl_vars['cookie']->value->id_lang])) {?>
				    <div id="idTab211" class="product_accordion block_hidden_only_for_screen">
						<!-- product's features -->
				        <a href="javascript:;" class="opener">&nbsp;</a>
				        <div class="product_accordion_title">
				            <?php echo smartyTranslate(array('s'=>'Tags'),$_smarty_tpl);?>

				        </div>
				        <div class="pa_content">
				        <?php  $_smarty_tpl->tpl_vars['tag'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tag']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['product']->value->tags[$_smarty_tpl->tpl_vars['cookie']->value->id_lang]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['tag']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['tag']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['tag']->key => $_smarty_tpl->tpl_vars['tag']->value) {
$_smarty_tpl->tpl_vars['tag']->_loop = true;
 $_smarty_tpl->tpl_vars['tag']->iteration++;
 $_smarty_tpl->tpl_vars['tag']->last = $_smarty_tpl->tpl_vars['tag']->iteration === $_smarty_tpl->tpl_vars['tag']->total;
?>
				            <a href="<?php ob_start();?><?php echo urlencode($_smarty_tpl->tpl_vars['tag']->value);?>
<?php $_tmp3=ob_get_clean();?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('search',true,null,"tag=".$_tmp3), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'More about'),$_smarty_tpl);?>
 <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['tag']->value, ENT_QUOTES, 'UTF-8', true);?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['tag']->value, ENT_QUOTES, 'UTF-8', true);?>
</a><?php if (!$_smarty_tpl->tpl_vars['tag']->last) {?>, <?php }?>
				        <?php } ?>
				        </div>
				    </div>
				<?php }?>

				<?php if (isset($_smarty_tpl->tpl_vars['features']->value)&&$_smarty_tpl->tpl_vars['features']->value) {?>
				    <div id="idTab2" class="product_accordion block_hidden_only_for_screen">
						<!-- product's features -->
				        <a href="javascript:;" class="opener">&nbsp;</a>
				        <div class="product_accordion_title">
				            <?php echo smartyTranslate(array('s'=>'Data sheet'),$_smarty_tpl);?>

				        </div>
						<div class="pa_content">
							<table class="table-data-sheet table-bordered">
								<?php  $_smarty_tpl->tpl_vars['feature'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['feature']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['features']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['feature']->key => $_smarty_tpl->tpl_vars['feature']->value) {
$_smarty_tpl->tpl_vars['feature']->_loop = true;
?>
								<tr class="<?php echo smarty_function_cycle(array('values'=>"odd,even"),$_smarty_tpl);?>
">
									<?php if (isset($_smarty_tpl->tpl_vars['feature']->value['value'])) {?>
									<td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['feature']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</td>
									<td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['feature']->value['value'], ENT_QUOTES, 'UTF-8', true);?>
</td>
									<?php }?>
								</tr>
								<?php } ?>
							</table>
						</div>
				    </div>
				<?php }?>

				<?php if (isset($_smarty_tpl->tpl_vars['attachments']->value)&&$_smarty_tpl->tpl_vars['attachments']->value) {?>
				    <div id="idTab9" class="product_accordion block_hidden_only_for_screen">
				        <a href="javascript:;" class="opener">&nbsp;</a>
				        <div class="product_accordion_title">
				            <?php echo smartyTranslate(array('s'=>'Download'),$_smarty_tpl);?>

				        </div>
						<div class="pa_content">
							<?php  $_smarty_tpl->tpl_vars['attachment'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['attachment']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['attachments']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['attachment']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['attachment']->iteration=0;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['attachements']['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars['attachment']->key => $_smarty_tpl->tpl_vars['attachment']->value) {
$_smarty_tpl->tpl_vars['attachment']->_loop = true;
 $_smarty_tpl->tpl_vars['attachment']->iteration++;
 $_smarty_tpl->tpl_vars['attachment']->last = $_smarty_tpl->tpl_vars['attachment']->iteration === $_smarty_tpl->tpl_vars['attachment']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['attachements']['iteration']++;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['attachements']['last'] = $_smarty_tpl->tpl_vars['attachment']->last;
?>
								<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['attachements']['iteration']%3==1) {?><div class="row"><?php }?>
									<div class="col-lg-4">
										<h4><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('attachment',true,null,"id_attachment=".((string)$_smarty_tpl->tpl_vars['attachment']->value['id_attachment'])), ENT_QUOTES, 'UTF-8', true);?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['attachment']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</a></h4>
										<p class="text-muted"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['attachment']->value['description'], ENT_QUOTES, 'UTF-8', true);?>
</p>
										<a class="btn btn-default btn-block" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('attachment',true,null,"id_attachment=".((string)$_smarty_tpl->tpl_vars['attachment']->value['id_attachment'])), ENT_QUOTES, 'UTF-8', true);?>
">
											<i class="icon-download"></i>
											<?php echo smartyTranslate(array('s'=>"Download"),$_smarty_tpl);?>
 (<?php echo Tools::formatBytes($_smarty_tpl->tpl_vars['attachment']->value['file_size'],2);?>
)
										</a>
										<hr />
									</div>
								<?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['attachements']['iteration']%3==0||$_smarty_tpl->getVariable('smarty')->value['foreach']['attachements']['last']) {?></div><?php }?>
							<?php } ?>
						</div>
				    </div>
				<?php }?>

			<?php if (isset($_smarty_tpl->tpl_vars['product']->value)&&$_smarty_tpl->tpl_vars['product']->value->customizable) {?>
			<!--Customization -->
			<div id="idTab10" class="customization_block product_accordion block_hidden_only_for_screen">
	            <a href="javascript:;" class="opener">&nbsp;</a>
	            <div class="product_accordion_title">
	                <?php echo smartyTranslate(array('s'=>'Product customization'),$_smarty_tpl);?>

	            </div>
	            <div class="pa_content">
				<!-- Customizable products -->
				<form method="post" action="<?php echo $_smarty_tpl->tpl_vars['customizationFormTarget']->value;?>
" enctype="multipart/form-data" id="customizationForm" class="clearfix">
					<p class="infoCustomizable">
						<?php echo smartyTranslate(array('s'=>'After saving your customized product, remember to add it to your cart.'),$_smarty_tpl);?>

						<?php if ($_smarty_tpl->tpl_vars['product']->value->uploadable_files) {?>
						<br />
						<?php echo smartyTranslate(array('s'=>'Allowed file formats are: GIF, JPG, PNG'),$_smarty_tpl);?>
<?php }?>
					</p>
					<?php if (intval($_smarty_tpl->tpl_vars['product']->value->uploadable_files)) {?>
						<div class="customizableProductsFile">
							<h5 class="product-heading-h5"><?php echo smartyTranslate(array('s'=>'Pictures'),$_smarty_tpl);?>
</h5>
							<ul id="uploadable_files" class="clearfix">
								<?php echo smarty_function_counter(array('start'=>0,'assign'=>'customizationField'),$_smarty_tpl);?>

								<?php  $_smarty_tpl->tpl_vars['field'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['field']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['customizationFields']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['field']->key => $_smarty_tpl->tpl_vars['field']->value) {
$_smarty_tpl->tpl_vars['field']->_loop = true;
?>
									<?php if ($_smarty_tpl->tpl_vars['field']->value['type']==0) {?>
										<li class="customizationUploadLine<?php if ($_smarty_tpl->tpl_vars['field']->value['required']) {?> required<?php }?>"><?php $_smarty_tpl->tpl_vars['key'] = new Smarty_variable(((('pictures_').($_smarty_tpl->tpl_vars['product']->value->id)).('_')).($_smarty_tpl->tpl_vars['field']->value['id_customization_field']), null, 0);?>
											<?php if (isset($_smarty_tpl->tpl_vars['pictures']->value[$_smarty_tpl->tpl_vars['key']->value])) {?>
												<div class="customizationUploadBrowse">
													<img src="<?php echo $_smarty_tpl->tpl_vars['pic_dir']->value;?>
<?php echo $_smarty_tpl->tpl_vars['pictures']->value[$_smarty_tpl->tpl_vars['key']->value];?>
_small" alt="" />
														<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getProductDeletePictureLink($_smarty_tpl->tpl_vars['product']->value,$_smarty_tpl->tpl_vars['field']->value['id_customization_field']), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'Delete'),$_smarty_tpl);?>
" >
															<img src="<?php echo $_smarty_tpl->tpl_vars['img_dir']->value;?>
icon/delete.gif" alt="<?php echo smartyTranslate(array('s'=>'Delete'),$_smarty_tpl);?>
" class="customization_delete_icon" width="11" height="13" />
														</a>
												</div>
											<?php }?>
											<div class="customizationUploadBrowse form-group">
												<label class="customizationUploadBrowseDescription">
													<?php if (!empty($_smarty_tpl->tpl_vars['field']->value['name'])) {?>
														<?php echo $_smarty_tpl->tpl_vars['field']->value['name'];?>

													<?php } else { ?>
														<?php echo smartyTranslate(array('s'=>'Please select an image file from your computer'),$_smarty_tpl);?>

													<?php }?>
													<?php if ($_smarty_tpl->tpl_vars['field']->value['required']) {?><sup>*</sup><?php }?>
												</label>
												<input type="file" name="file<?php echo $_smarty_tpl->tpl_vars['field']->value['id_customization_field'];?>
" id="img<?php echo $_smarty_tpl->tpl_vars['customizationField']->value;?>
" class="form-control customization_block_input <?php if (isset($_smarty_tpl->tpl_vars['pictures']->value[$_smarty_tpl->tpl_vars['key']->value])) {?>filled<?php }?>" />
											</div>
										</li>
										<?php echo smarty_function_counter(array(),$_smarty_tpl);?>

									<?php }?>
								<?php } ?>
							</ul>
						</div>
					<?php }?>
					<?php if (intval($_smarty_tpl->tpl_vars['product']->value->text_fields)) {?>
						<div class="customizableProductsText">
							<h5 class="product-heading-h5"><?php echo smartyTranslate(array('s'=>'Text'),$_smarty_tpl);?>
</h5>
							<ul id="text_fields">
							<?php echo smarty_function_counter(array('start'=>0,'assign'=>'customizationField'),$_smarty_tpl);?>

							<?php  $_smarty_tpl->tpl_vars['field'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['field']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['customizationFields']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['field']->key => $_smarty_tpl->tpl_vars['field']->value) {
$_smarty_tpl->tpl_vars['field']->_loop = true;
?>
								<?php if ($_smarty_tpl->tpl_vars['field']->value['type']==1) {?>
									<li class="customizationUploadLine<?php if ($_smarty_tpl->tpl_vars['field']->value['required']) {?> required<?php }?>">
										<label for ="textField<?php echo $_smarty_tpl->tpl_vars['customizationField']->value;?>
">
											<?php $_smarty_tpl->tpl_vars['key'] = new Smarty_variable(((('textFields_').($_smarty_tpl->tpl_vars['product']->value->id)).('_')).($_smarty_tpl->tpl_vars['field']->value['id_customization_field']), null, 0);?>
											<?php if (!empty($_smarty_tpl->tpl_vars['field']->value['name'])) {?>
												<?php echo $_smarty_tpl->tpl_vars['field']->value['name'];?>

											<?php }?>
											<?php if ($_smarty_tpl->tpl_vars['field']->value['required']) {?><sup>*</sup><?php }?>
										</label>
										<textarea name="textField<?php echo $_smarty_tpl->tpl_vars['field']->value['id_customization_field'];?>
" class="form-control customization_block_input" id="textField<?php echo $_smarty_tpl->tpl_vars['customizationField']->value;?>
" rows="3" cols="20"><?php if (isset($_smarty_tpl->tpl_vars['textFields']->value[$_smarty_tpl->tpl_vars['key']->value])) {?><?php echo stripslashes($_smarty_tpl->tpl_vars['textFields']->value[$_smarty_tpl->tpl_vars['key']->value]);?>
<?php }?></textarea>
									</li>
									<?php echo smarty_function_counter(array(),$_smarty_tpl);?>

								<?php }?>
							<?php } ?>
							</ul>
						</div>
					<?php }?>
					<p id="customizedDatas">
						<input type="hidden" name="quantityBackup" id="quantityBackup" value="" />
						<input type="hidden" name="submitCustomizedDatas" value="1" />
						<button class="button btn btn-default button button-small" name="saveCustomization">
							<span><?php echo smartyTranslate(array('s'=>'Save'),$_smarty_tpl);?>
</span>
						</button>
						<span id="ajax-loader" class="unvisible">
							<img src="<?php echo $_smarty_tpl->tpl_vars['img_ps_dir']->value;?>
loader.gif" alt="loader" />
						</span>
					</p>
				</form>
				<p class="clear required"><sup>*</sup> <?php echo smartyTranslate(array('s'=>'required fields'),$_smarty_tpl);?>
</p>
				</div>
			</div>
			<!--end Customization -->
			<?php }?>

			<?php if (isset($_smarty_tpl->tpl_vars['HOOK_PRODUCT_TAB_CONTENT']->value)&&$_smarty_tpl->tpl_vars['HOOK_PRODUCT_TAB_CONTENT']->value) {?><?php echo $_smarty_tpl->tpl_vars['HOOK_PRODUCT_TAB_CONTENT']->value;?>
<?php }?>
			</div>
		</div>
		<?php }?>
		<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

		<!-- center infos -->
		<div class="pb-center-column col-xs-12 <?php if (isset($_smarty_tpl->tpl_vars['product_big_image']->value)&&$_smarty_tpl->tpl_vars['product_big_image']->value) {?> col-sm-6 <?php } else { ?> <?php if ($_smarty_tpl->tpl_vars['product_secondary']->value&&!$_smarty_tpl->tpl_vars['content_only']->value) {?> <?php if ($_smarty_tpl->tpl_vars['product_secondary']->value==2) {?> col-sm-8 col-md-5 <?php } else { ?> col-sm-5 <?php }?> <?php } else { ?> col-sm-8 <?php }?> <?php }?>">
			<?php $_smarty_tpl->_capture_stack[0][] = array("rightbar_productlinknav", null, null); ob_start(); ?>
				<?php if (!$_smarty_tpl->tpl_vars['content_only']->value) {?>
					<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayAnywhere','mod'=>'stproductlinknav','caller'=>'stproductlinknav'),$_smarty_tpl);?>

				<?php }?>
			<?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
			<div id="product_name_wrap" class="<?php if (trim(Smarty::$_smarty_vars['capture']['rightbar_productlinknav'])) {?> has_productlinknav <?php }?>">
				<h1 <?php if ($_smarty_tpl->tpl_vars['enable_google_rich_snippets']->value) {?>itemprop="name"<?php }?> class="heading "><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</h1>
				<?php echo Smarty::$_smarty_vars['capture']['rightbar_productlinknav'];?>

			</div>
			<?php if (isset($_smarty_tpl->tpl_vars['HOOK_EXTRA_RIGHT']->value)&&$_smarty_tpl->tpl_vars['HOOK_EXTRA_RIGHT']->value) {?><?php echo $_smarty_tpl->tpl_vars['HOOK_EXTRA_RIGHT']->value;?>
<?php }?>
			<div class="product_meta_wrap clearfix"> 
				<?php if ($_smarty_tpl->tpl_vars['product']->value->online_only) {?>
				<p id="online_only_wrap" class="product_meta">
					<label class="product_meta_label"><?php echo smartyTranslate(array('s'=>'Option:'),$_smarty_tpl);?>
 </label>
					<span class="online_only"><?php echo smartyTranslate(array('s'=>'Online only'),$_smarty_tpl);?>
</span>
				</p>
				<?php }?>
				<p id="product_reference" class="<?php if (!$_smarty_tpl->tpl_vars['display_pro_reference']->value||empty($_smarty_tpl->tpl_vars['product']->value->reference)||!$_smarty_tpl->tpl_vars['product']->value->reference) {?> unvisible <?php }?> product_meta">
					<label class="product_meta_label"><?php echo smartyTranslate(array('s'=>'Reference:'),$_smarty_tpl);?>
 </label>
					<span class="editable"<?php if ($_smarty_tpl->tpl_vars['enable_google_rich_snippets']->value) {?> itemprop="sku"<?php }?>><?php if (!isset($_smarty_tpl->tpl_vars['groups']->value)) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value->reference, ENT_QUOTES, 'UTF-8', true);?>
<?php }?></span>
				</p>
				<?php if (!$_smarty_tpl->tpl_vars['product']->value->is_virtual&&$_smarty_tpl->tpl_vars['product']->value->condition) {?>
				<p id="product_condition" class="<?php if (!$_smarty_tpl->tpl_vars['display_pro_condition']->value) {?> unvisible <?php }?> product_meta">
					<label class="product_meta_label"><?php echo smartyTranslate(array('s'=>'Condition:'),$_smarty_tpl);?>
 </label>
					<?php if ($_smarty_tpl->tpl_vars['product']->value->condition=='new') {?>
						<link itemprop="itemCondition" href="http://schema.org/NewCondition"/>
						<span class="editable"><?php echo smartyTranslate(array('s'=>'New product'),$_smarty_tpl);?>
</span>
					<?php } elseif ($_smarty_tpl->tpl_vars['product']->value->condition=='used') {?>
						<link itemprop="itemCondition" href="http://schema.org/UsedCondition"/>
						<span class="editable"><?php echo smartyTranslate(array('s'=>'Used'),$_smarty_tpl);?>
</span>
					<?php } elseif ($_smarty_tpl->tpl_vars['product']->value->condition=='refurbished') {?>
						<link itemprop="itemCondition" href="http://schema.org/RefurbishedCondition"/>
						<span class="editable"><?php echo smartyTranslate(array('s'=>'Refurbished'),$_smarty_tpl);?>
</span>
					<?php }?>
				</p>
				<?php }?>
            </div>
			<?php if ($_smarty_tpl->tpl_vars['product']->value->description_short||count($_smarty_tpl->tpl_vars['packItems']->value)>0) {?>
				<div id="short_description_block">
					<?php if ($_smarty_tpl->tpl_vars['product']->value->description_short) {?>
						<div id="short_description_content" class="rte align_justify" <?php if ($_smarty_tpl->tpl_vars['enable_google_rich_snippets']->value) {?>itemprop="description"<?php }?>><?php echo $_smarty_tpl->tpl_vars['product']->value->description_short;?>
</div>
					<?php }?>

					<?php if ($_smarty_tpl->tpl_vars['product']->value->description) {?>
						<p class="buttons_bottom_block">
							<a href="javascript:{}" class="button">
								<?php echo smartyTranslate(array('s'=>'More details'),$_smarty_tpl);?>

							</a>
						</p>
					<?php }?>
					<!--<?php if (count($_smarty_tpl->tpl_vars['packItems']->value)>0) {?>
						<div class="short_description_pack">
						<h3><?php echo smartyTranslate(array('s'=>'Pack content'),$_smarty_tpl);?>
</h3>
							<?php  $_smarty_tpl->tpl_vars['packItem'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['packItem']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['packItems']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['packItem']->key => $_smarty_tpl->tpl_vars['packItem']->value) {
$_smarty_tpl->tpl_vars['packItem']->_loop = true;
?>

							<div class="pack_content">
								<?php echo $_smarty_tpl->tpl_vars['packItem']->value['pack_quantity'];?>
 x <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getProductLink($_smarty_tpl->tpl_vars['packItem']->value['id_product'],$_smarty_tpl->tpl_vars['packItem']->value['link_rewrite'],$_smarty_tpl->tpl_vars['packItem']->value['category']), ENT_QUOTES, 'UTF-8', true);?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['packItem']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</a>
								<p><?php echo $_smarty_tpl->tpl_vars['packItem']->value['description_short'];?>
</p>
							</div>
							<?php } ?>
						</div>
					<?php }?>-->
				</div> <!-- end short_description_block -->
			<?php }?>

			<?php if (($_smarty_tpl->tpl_vars['product']->value->show_price&&!isset($_smarty_tpl->tpl_vars['restricted_country_mode']->value))||isset($_smarty_tpl->tpl_vars['groups']->value)||$_smarty_tpl->tpl_vars['product']->value->reference) {?>
			<!-- add to cart form-->
			<form id="buy_block"<?php if ($_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value&&!isset($_smarty_tpl->tpl_vars['groups']->value)&&$_smarty_tpl->tpl_vars['product']->value->quantity>0) {?> class="hidden"<?php }?> action="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('cart'), ENT_QUOTES, 'UTF-8', true);?>
" method="post">
				<!-- hidden datas -->
				<p class="hidden">
					<input type="hidden" name="token" value="<?php echo $_smarty_tpl->tpl_vars['static_token']->value;?>
" />
					<input type="hidden" name="id_product" value="<?php echo intval($_smarty_tpl->tpl_vars['product']->value->id);?>
" id="product_page_product_id" />
					<input type="hidden" name="add" value="1" />
					<input type="hidden" name="id_product_attribute" id="idCombination" value="" />
				</p>
				<div class="box-info-product">
					<div class="content_prices clearfix">
						<?php if ($_smarty_tpl->tpl_vars['product']->value->show_price&&!isset($_smarty_tpl->tpl_vars['restricted_country_mode']->value)&&!$_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value) {?>
							<!-- prices -->
							<div class="price_box clearfix">
								<p class="our_price_display pull-left" <?php if ($_smarty_tpl->tpl_vars['enable_google_rich_snippets']->value) {?>itemprop="offers" itemscope itemtype="http://schema.org/Offer"<?php }?>><?php if ($_smarty_tpl->tpl_vars['enable_google_rich_snippets']->value) {?><?php if ($_smarty_tpl->tpl_vars['product']->value->quantity>0) {?><link itemprop="availability" href="http://schema.org/InStock"/><?php }?><?php }?><?php if ($_smarty_tpl->tpl_vars['priceDisplay']->value>=0&&$_smarty_tpl->tpl_vars['priceDisplay']->value<=2) {?><span id="our_price_display" <?php if ($_smarty_tpl->tpl_vars['enable_google_rich_snippets']->value) {?>itemprop="price"<?php }?>><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['productPrice']->value),$_smarty_tpl);?>
</span><?php if ($_smarty_tpl->tpl_vars['tax_enabled']->value&&((isset($_smarty_tpl->tpl_vars['display_tax_label']->value)&&$_smarty_tpl->tpl_vars['display_tax_label']->value==1)||!isset($_smarty_tpl->tpl_vars['display_tax_label']->value))&&(isset($_smarty_tpl->tpl_vars['sttheme']->value['display_tax_label'])&&$_smarty_tpl->tpl_vars['sttheme']->value['display_tax_label'])) {?><span class="product_tax_label"><?php if ($_smarty_tpl->tpl_vars['priceDisplay']->value==1) {?><?php echo smartyTranslate(array('s'=>'tax excl.'),$_smarty_tpl);?>
<?php } else { ?><?php echo smartyTranslate(array('s'=>'tax incl.'),$_smarty_tpl);?>
<?php }?></span><?php }?><?php if ($_smarty_tpl->tpl_vars['enable_google_rich_snippets']->value) {?><meta itemprop="priceCurrency" content="<?php echo $_smarty_tpl->tpl_vars['currency']->value->iso_code;?>
" /><?php }?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"displayProductPriceBlock",'product'=>$_smarty_tpl->tpl_vars['product']->value,'type'=>"price"),$_smarty_tpl);?>
<?php }?></p>
								<?php if ($_smarty_tpl->tpl_vars['priceDisplay']->value==2) {?>
									<span id="pretaxe_price" class="pull-left"><span id="pretaxe_price_display"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['product']->value->getPrice(false,@constant('NULL'))),$_smarty_tpl);?>
</span><?php echo smartyTranslate(array('s'=>'tax excl.'),$_smarty_tpl);?>
</span>
								<?php }?>
								<p id="old_price" class="<?php if ((!$_smarty_tpl->tpl_vars['product']->value->specificPrice||!$_smarty_tpl->tpl_vars['product']->value->specificPrice['reduction'])&&$_smarty_tpl->tpl_vars['group_reduction']->value==0) {?> hidden<?php }?> pull-left"><?php if ($_smarty_tpl->tpl_vars['priceDisplay']->value>=0&&$_smarty_tpl->tpl_vars['priceDisplay']->value<=2) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"displayProductPriceBlock",'product'=>$_smarty_tpl->tpl_vars['product']->value,'type'=>"old_price"),$_smarty_tpl);?>
<span id="old_price_display"><?php if ($_smarty_tpl->tpl_vars['productPriceWithoutReduction']->value>$_smarty_tpl->tpl_vars['productPrice']->value) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['productPriceWithoutReduction']->value),$_smarty_tpl);?>
<?php }?></span><?php if ($_smarty_tpl->tpl_vars['tax_enabled']->value&&((isset($_smarty_tpl->tpl_vars['display_tax_label']->value)&&$_smarty_tpl->tpl_vars['display_tax_label']->value==1)||!isset($_smarty_tpl->tpl_vars['display_tax_label']->value))&&(isset($_smarty_tpl->tpl_vars['sttheme']->value['display_tax_label'])&&$_smarty_tpl->tpl_vars['sttheme']->value['display_tax_label'])) {?><span class="product_tax_label"><?php if ($_smarty_tpl->tpl_vars['priceDisplay']->value==1) {?><?php echo smartyTranslate(array('s'=>'tax excl.'),$_smarty_tpl);?>
<?php } else { ?><?php echo smartyTranslate(array('s'=>'tax incl.'),$_smarty_tpl);?>
<?php }?></span><?php }?><?php }?></p>
								<?php if (!isset($_smarty_tpl->tpl_vars['discount_percentage']->value)||(isset($_smarty_tpl->tpl_vars['discount_percentage']->value)&&$_smarty_tpl->tpl_vars['discount_percentage']->value==1)) {?>
								<p id="reduction_percent" <?php if (!$_smarty_tpl->tpl_vars['product']->value->specificPrice||$_smarty_tpl->tpl_vars['product']->value->specificPrice['reduction_type']!='percentage') {?> style="display:none;"<?php }?> class="pull-left"><span id="reduction_percent_display" class="sale_percentage"><?php if ($_smarty_tpl->tpl_vars['product']->value->specificPrice&&$_smarty_tpl->tpl_vars['product']->value->specificPrice['reduction_type']=='percentage') {?>-<?php echo $_smarty_tpl->tpl_vars['product']->value->specificPrice['reduction']*100;?>
%<?php }?></span></p>
								<p id="reduction_amount" <?php if (!$_smarty_tpl->tpl_vars['product']->value->specificPrice||$_smarty_tpl->tpl_vars['product']->value->specificPrice['reduction_type']!='amount'||floatval($_smarty_tpl->tpl_vars['product']->value->specificPrice['reduction'])==0) {?> style="display:none"<?php }?> class="pull-left"><span id="reduction_amount_display"  class="sale_percentage"><?php if ($_smarty_tpl->tpl_vars['product']->value->specificPrice&&$_smarty_tpl->tpl_vars['product']->value->specificPrice['reduction_type']=='amount'&&intval($_smarty_tpl->tpl_vars['product']->value->specificPrice['reduction'])!=0) {?>-<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['productPriceWithoutReduction']->value-floatval($_smarty_tpl->tpl_vars['productPrice']->value)),$_smarty_tpl);?>
<?php }?></span></p>
								<?php }?>
							</div> <!-- end prices -->
							<?php if (count($_smarty_tpl->tpl_vars['packItems']->value)&&$_smarty_tpl->tpl_vars['productPrice']->value<$_smarty_tpl->tpl_vars['product']->value->getNoPackPrice()) {?>
								<div class="pack_price mar_t4"><?php echo smartyTranslate(array('s'=>'Instead of'),$_smarty_tpl);?>
 <span style="text-decoration: line-through;"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['product']->value->getNoPackPrice()),$_smarty_tpl);?>
</span></div>
							<?php }?>
							<?php if ($_smarty_tpl->tpl_vars['product']->value->ecotax!=0) {?>
								<div class="price-ecotax mar_t4"><?php echo smartyTranslate(array('s'=>'Including'),$_smarty_tpl);?>
 <span id="ecotax_price_display"><?php if ($_smarty_tpl->tpl_vars['priceDisplay']->value==2) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convertAndFormatPrice'][0][0]->convertAndFormatPrice($_smarty_tpl->tpl_vars['ecotax_tax_exc']->value);?>
<?php } else { ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['convertAndFormatPrice'][0][0]->convertAndFormatPrice($_smarty_tpl->tpl_vars['ecotax_tax_inc']->value);?>
<?php }?></span> <?php echo smartyTranslate(array('s'=>'for green tax'),$_smarty_tpl);?>

									<?php if ($_smarty_tpl->tpl_vars['product']->value->specificPrice&&$_smarty_tpl->tpl_vars['product']->value->specificPrice['reduction']) {?>
									<br /><?php echo smartyTranslate(array('s'=>'(not impacted by the discount)'),$_smarty_tpl);?>

									<?php }?>
								</div>
							<?php }?>
							<?php if (!empty($_smarty_tpl->tpl_vars['product']->value->unity)&&$_smarty_tpl->tpl_vars['product']->value->unit_price_ratio>0.000000) {?>
								<?php echo smarty_function_math(array('equation'=>"pprice / punit_price",'pprice'=>$_smarty_tpl->tpl_vars['productPrice']->value,'punit_price'=>$_smarty_tpl->tpl_vars['product']->value->unit_price_ratio,'assign'=>'unit_price'),$_smarty_tpl);?>

								<div class="unit-price mar_t4"><span id="unit_price_display"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['unit_price']->value),$_smarty_tpl);?>
</span> <?php echo smartyTranslate(array('s'=>'per'),$_smarty_tpl);?>
 <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value->unity, ENT_QUOTES, 'UTF-8', true);?>
</div>
								<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"displayProductPriceBlock",'product'=>$_smarty_tpl->tpl_vars['product']->value,'type'=>"unit_price"),$_smarty_tpl);?>

							<?php }?>
						<?php }?> 
						<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"displayProductPriceBlock",'product'=>$_smarty_tpl->tpl_vars['product']->value,'type'=>"weight"),$_smarty_tpl);?>

					</div> <!-- end content_prices -->
					<div class="product_attributes clearfix">
						<?php if (isset($_smarty_tpl->tpl_vars['groups']->value)) {?>
							<!-- attributes -->
							<div id="attributes">
								<div class="clearfix"></div>
								<?php  $_smarty_tpl->tpl_vars['group'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['group']->_loop = false;
 $_smarty_tpl->tpl_vars['id_attribute_group'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['groups']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['group']->key => $_smarty_tpl->tpl_vars['group']->value) {
$_smarty_tpl->tpl_vars['group']->_loop = true;
 $_smarty_tpl->tpl_vars['id_attribute_group']->value = $_smarty_tpl->tpl_vars['group']->key;
?>
									<?php if (count($_smarty_tpl->tpl_vars['group']->value['attributes'])) {?>
										<fieldset class="attribute_fieldset">
											<label class="attribute_label" <?php if ($_smarty_tpl->tpl_vars['group']->value['group_type']!='color'&&$_smarty_tpl->tpl_vars['group']->value['group_type']!='radio') {?>for="group_<?php echo intval($_smarty_tpl->tpl_vars['id_attribute_group']->value);?>
"<?php }?>><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['group']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
&nbsp;</label>
											<?php $_smarty_tpl->tpl_vars["groupName"] = new Smarty_variable("group_".((string)$_smarty_tpl->tpl_vars['id_attribute_group']->value), null, 0);?>
											<div class="attribute_list">
												<?php if (($_smarty_tpl->tpl_vars['group']->value['group_type']=='select')) {?>
													<select name="<?php echo $_smarty_tpl->tpl_vars['groupName']->value;?>
" id="group_<?php echo intval($_smarty_tpl->tpl_vars['id_attribute_group']->value);?>
" class="form-control attribute_select no-print">
														<?php  $_smarty_tpl->tpl_vars['group_attribute'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['group_attribute']->_loop = false;
 $_smarty_tpl->tpl_vars['id_attribute'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['group']->value['attributes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['group_attribute']->key => $_smarty_tpl->tpl_vars['group_attribute']->value) {
$_smarty_tpl->tpl_vars['group_attribute']->_loop = true;
 $_smarty_tpl->tpl_vars['id_attribute']->value = $_smarty_tpl->tpl_vars['group_attribute']->key;
?>
															<option value="<?php echo intval($_smarty_tpl->tpl_vars['id_attribute']->value);?>
"<?php if ((isset($_GET[$_smarty_tpl->tpl_vars['groupName']->value])&&intval($_GET[$_smarty_tpl->tpl_vars['groupName']->value])==$_smarty_tpl->tpl_vars['id_attribute']->value)||$_smarty_tpl->tpl_vars['group']->value['default']==$_smarty_tpl->tpl_vars['id_attribute']->value) {?> selected="selected"<?php }?> title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['group_attribute']->value, ENT_QUOTES, 'UTF-8', true);?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['group_attribute']->value, ENT_QUOTES, 'UTF-8', true);?>
</option>
														<?php } ?>
													</select>
												<?php } elseif (($_smarty_tpl->tpl_vars['group']->value['group_type']=='color')) {?>
													<ul id="color_to_pick_list" class="clearfix">
														<?php $_smarty_tpl->tpl_vars["default_colorpicker"] = new Smarty_variable('', null, 0);?>
														<?php  $_smarty_tpl->tpl_vars['group_attribute'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['group_attribute']->_loop = false;
 $_smarty_tpl->tpl_vars['id_attribute'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['group']->value['attributes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['group_attribute']->key => $_smarty_tpl->tpl_vars['group_attribute']->value) {
$_smarty_tpl->tpl_vars['group_attribute']->_loop = true;
 $_smarty_tpl->tpl_vars['id_attribute']->value = $_smarty_tpl->tpl_vars['group_attribute']->key;
?>
															<?php $_smarty_tpl->tpl_vars['img_color_exists'] = new Smarty_variable(file_exists((($_smarty_tpl->tpl_vars['col_img_dir']->value).($_smarty_tpl->tpl_vars['id_attribute']->value)).('.jpg')), null, 0);?>
															<li<?php if ($_smarty_tpl->tpl_vars['group']->value['default']==$_smarty_tpl->tpl_vars['id_attribute']->value) {?> class="selected"<?php }?>>
																<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getProductLink($_smarty_tpl->tpl_vars['product']->value), ENT_QUOTES, 'UTF-8', true);?>
" id="color_<?php echo intval($_smarty_tpl->tpl_vars['id_attribute']->value);?>
" name="<?php if (isset($_smarty_tpl->tpl_vars['colors']->value[$_smarty_tpl->tpl_vars['id_attribute']->value]['value'])) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['colors']->value[$_smarty_tpl->tpl_vars['id_attribute']->value]['name'], ENT_QUOTES, 'UTF-8', true);?>
<?php }?>" class="color_pick<?php if (($_smarty_tpl->tpl_vars['group']->value['default']==$_smarty_tpl->tpl_vars['id_attribute']->value)) {?> selected<?php }?>"<?php if (!$_smarty_tpl->tpl_vars['img_color_exists']->value&&isset($_smarty_tpl->tpl_vars['colors']->value[$_smarty_tpl->tpl_vars['id_attribute']->value]['value'])&&$_smarty_tpl->tpl_vars['colors']->value[$_smarty_tpl->tpl_vars['id_attribute']->value]['value']) {?> style="background: <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['colors']->value[$_smarty_tpl->tpl_vars['id_attribute']->value]['value'], ENT_QUOTES, 'UTF-8', true);?>
;"<?php }?> title="<?php if (isset($_smarty_tpl->tpl_vars['colors']->value[$_smarty_tpl->tpl_vars['id_attribute']->value]['value'])) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['colors']->value[$_smarty_tpl->tpl_vars['id_attribute']->value]['name'], ENT_QUOTES, 'UTF-8', true);?>
<?php }?>">
																	<?php if ($_smarty_tpl->tpl_vars['img_color_exists']->value) {?>
																		<img src="<?php echo $_smarty_tpl->tpl_vars['img_col_dir']->value;?>
<?php echo intval($_smarty_tpl->tpl_vars['id_attribute']->value);?>
.jpg" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['colors']->value[$_smarty_tpl->tpl_vars['id_attribute']->value]['name'], ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['colors']->value[$_smarty_tpl->tpl_vars['id_attribute']->value]['name'], ENT_QUOTES, 'UTF-8', true);?>
" width="20" height="20" />
																	<?php }?>
																</a>
															</li>
															<?php if (($_smarty_tpl->tpl_vars['group']->value['default']==$_smarty_tpl->tpl_vars['id_attribute']->value)) {?>
																<?php $_smarty_tpl->tpl_vars['default_colorpicker'] = new Smarty_variable($_smarty_tpl->tpl_vars['id_attribute']->value, null, 0);?>
															<?php }?>
														<?php } ?>
													</ul>
													<input type="hidden" class="color_pick_hidden" name="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['groupName']->value, ENT_QUOTES, 'UTF-8', true);?>
" value="<?php echo intval($_smarty_tpl->tpl_vars['default_colorpicker']->value);?>
" />
												<?php } elseif (($_smarty_tpl->tpl_vars['group']->value['group_type']=='radio')) {?>
													<ul>
														<?php  $_smarty_tpl->tpl_vars['group_attribute'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['group_attribute']->_loop = false;
 $_smarty_tpl->tpl_vars['id_attribute'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['group']->value['attributes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['group_attribute']->key => $_smarty_tpl->tpl_vars['group_attribute']->value) {
$_smarty_tpl->tpl_vars['group_attribute']->_loop = true;
 $_smarty_tpl->tpl_vars['id_attribute']->value = $_smarty_tpl->tpl_vars['group_attribute']->key;
?>
															<li>
																<input type="radio" class="attribute_radio" name="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['groupName']->value, ENT_QUOTES, 'UTF-8', true);?>
" value="<?php echo $_smarty_tpl->tpl_vars['id_attribute']->value;?>
" <?php if (($_smarty_tpl->tpl_vars['group']->value['default']==$_smarty_tpl->tpl_vars['id_attribute']->value)) {?> checked="checked"<?php }?> />
																<span class="radio_label"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['group_attribute']->value, ENT_QUOTES, 'UTF-8', true);?>
</span>
															</li>
														<?php } ?>
													</ul>
												<?php }?>
											</div> <!-- end attribute_list -->
										</fieldset>
									<?php }?>
								<?php } ?>
							</div> <!-- end attributes -->
						<?php }?>



						<?php if (($_smarty_tpl->tpl_vars['display_qties']->value==1&&!$_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value&&$_smarty_tpl->tpl_vars['PS_STOCK_MANAGEMENT']->value&&$_smarty_tpl->tpl_vars['product']->value->available_for_order)) {?>
							<!-- number of item in stock -->
							<div id="pQuantityAvailable"<?php if ($_smarty_tpl->tpl_vars['product']->value->quantity<=0) {?> style="display: none;"<?php }?>>
								<span id="quantityAvailable"><?php echo intval($_smarty_tpl->tpl_vars['product']->value->quantity);?>
</span>
								<span <?php if ($_smarty_tpl->tpl_vars['product']->value->quantity>1) {?> style="display: none;"<?php }?> id="quantityAvailableTxt"><?php echo smartyTranslate(array('s'=>'Item'),$_smarty_tpl);?>
</span>
								<span <?php if ($_smarty_tpl->tpl_vars['product']->value->quantity==1) {?> style="display: none;"<?php }?> id="quantityAvailableTxtMultiple"><?php echo smartyTranslate(array('s'=>'Items'),$_smarty_tpl);?>
</span>
							</div>
						<?php }?>
						<!-- availability or doesntExist -->
						<div id="availability_statut"<?php if (!$_smarty_tpl->tpl_vars['PS_STOCK_MANAGEMENT']->value||($_smarty_tpl->tpl_vars['product']->value->quantity<=0&&!$_smarty_tpl->tpl_vars['product']->value->available_later&&$_smarty_tpl->tpl_vars['allow_oosp']->value)||($_smarty_tpl->tpl_vars['product']->value->quantity>0&&!$_smarty_tpl->tpl_vars['product']->value->available_now)||!$_smarty_tpl->tpl_vars['product']->value->available_for_order||$_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value) {?> style="display: none;"<?php }?>>
							
							<span id="availability_value" class="<?php if ($_smarty_tpl->tpl_vars['product']->value->quantity<=0&&!$_smarty_tpl->tpl_vars['allow_oosp']->value) {?> st-label-danger<?php } elseif ($_smarty_tpl->tpl_vars['product']->value->quantity<=0) {?> st-label-warning<?php } else { ?> st-label-success<?php }?>"><?php if ($_smarty_tpl->tpl_vars['product']->value->quantity<=0) {?><?php if ($_smarty_tpl->tpl_vars['PS_STOCK_MANAGEMENT']->value&&$_smarty_tpl->tpl_vars['allow_oosp']->value) {?><?php echo $_smarty_tpl->tpl_vars['product']->value->available_later;?>
<?php } else { ?><?php echo smartyTranslate(array('s'=>'This product is no longer in stock'),$_smarty_tpl);?>
<?php }?><?php } elseif ($_smarty_tpl->tpl_vars['PS_STOCK_MANAGEMENT']->value) {?><?php echo $_smarty_tpl->tpl_vars['product']->value->available_now;?>
<?php }?></span>
						</div>
						<?php if ($_smarty_tpl->tpl_vars['PS_STOCK_MANAGEMENT']->value) {?>
							<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>"displayProductDeliveryTime",'product'=>$_smarty_tpl->tpl_vars['product']->value),$_smarty_tpl);?>

							<div class="warning_inline mar_t4" id="last_quantities"<?php if (($_smarty_tpl->tpl_vars['product']->value->quantity>$_smarty_tpl->tpl_vars['last_qties']->value||$_smarty_tpl->tpl_vars['product']->value->quantity<=0)||$_smarty_tpl->tpl_vars['allow_oosp']->value||!$_smarty_tpl->tpl_vars['product']->value->available_for_order||$_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value) {?> style="display: none"<?php }?> ><?php echo smartyTranslate(array('s'=>'Warning: Last items in stock!'),$_smarty_tpl);?>
</div>
						<?php }?>
						<div id="availability_date"<?php if (($_smarty_tpl->tpl_vars['product']->value->quantity>0)||!$_smarty_tpl->tpl_vars['product']->value->available_for_order||$_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value||!isset($_smarty_tpl->tpl_vars['product']->value->available_date)||$_smarty_tpl->tpl_vars['product']->value->available_date<smarty_modifier_date_format(time(),'%Y-%m-%d')) {?> style="display: none;"<?php }?>>
							<span id="availability_date_label"><?php echo smartyTranslate(array('s'=>'Availability date:'),$_smarty_tpl);?>
</span>
							<span id="availability_date_value"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['dateFormat'][0][0]->dateFormat(array('date'=>$_smarty_tpl->tpl_vars['product']->value->available_date,'full'=>false),$_smarty_tpl);?>
</span>
						</div>
						<!-- Out of stock hook -->
						<div id="oosHook"<?php if ($_smarty_tpl->tpl_vars['product']->value->quantity>0) {?> style="display: none;"<?php }?>>
							<?php echo $_smarty_tpl->tpl_vars['HOOK_PRODUCT_OOS']->value;?>

						</div>
						

					</div> <!-- end product_attributes -->

					<div class="box-cart-bottom">
						<!-- quantity wanted -->
						<div class="qt_cart_box clearfix <?php if ((!$_smarty_tpl->tpl_vars['allow_oosp']->value&&$_smarty_tpl->tpl_vars['product']->value->quantity<=0)||!$_smarty_tpl->tpl_vars['product']->value->available_for_order||(isset($_smarty_tpl->tpl_vars['restricted_country_mode']->value)&&$_smarty_tpl->tpl_vars['restricted_country_mode']->value)||$_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value) {?> hidden <?php }?> ">
							<?php if (!$_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value) {?>
							<p id="quantity_wanted_p"<?php if ((!$_smarty_tpl->tpl_vars['allow_oosp']->value&&$_smarty_tpl->tpl_vars['product']->value->quantity<=0)||!$_smarty_tpl->tpl_vars['product']->value->available_for_order||$_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value) {?> style="display: none;"<?php }?>>
								<span class="quantity_input_wrap clearfix">
									<a href="#" data-field-qty="qty" class="product_quantity_down">-</a>
									<input type="text" name="qty" id="quantity_wanted" class="text" value="<?php if (isset($_smarty_tpl->tpl_vars['quantityBackup']->value)) {?><?php echo intval($_smarty_tpl->tpl_vars['quantityBackup']->value);?>
<?php } else { ?><?php if ($_smarty_tpl->tpl_vars['product']->value->minimal_quantity>1) {?><?php echo $_smarty_tpl->tpl_vars['product']->value->minimal_quantity;?>
<?php } else { ?>1<?php }?><?php }?>" />
									<a href="#" data-field-qty="qty" class="product_quantity_up">+</a>
								</span>
							</p>
							<?php }?>

							<div id="add_to_cart_wrap" class="<?php if ((!$_smarty_tpl->tpl_vars['allow_oosp']->value&&$_smarty_tpl->tpl_vars['product']->value->quantity<=0)||!$_smarty_tpl->tpl_vars['product']->value->available_for_order||(isset($_smarty_tpl->tpl_vars['restricted_country_mode']->value)&&$_smarty_tpl->tpl_vars['restricted_country_mode']->value)||$_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value) {?> unvisible <?php }?>">
								<p id="add_to_cart" class="buttons_bottom_block no-print">
									<button type="submit" name="Submit" class="btn btn-medium btn_primary exclusive">
										<span><?php if ($_smarty_tpl->tpl_vars['content_only']->value&&(isset($_smarty_tpl->tpl_vars['product']->value->customization_required)&&$_smarty_tpl->tpl_vars['product']->value->customization_required)) {?><?php echo smartyTranslate(array('s'=>'Customize'),$_smarty_tpl);?>
<?php } else { ?><?php echo smartyTranslate(array('s'=>'Add to cart'),$_smarty_tpl);?>
<?php }?></span>
									</button>
								</p>
							</div>	
						</div>
						<!-- minimal quantity wanted -->
						<p id="minimal_quantity_wanted_p"<?php if ($_smarty_tpl->tpl_vars['product']->value->minimal_quantity<=1||!$_smarty_tpl->tpl_vars['product']->value->available_for_order||$_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value) {?> style="display: none;"<?php }?>>
							<?php echo smartyTranslate(array('s'=>'The minimum purchase order quantity for the product is'),$_smarty_tpl);?>
 <b id="minimal_quantity_label"><?php echo $_smarty_tpl->tpl_vars['product']->value->minimal_quantity;?>
</b>
						</p>

						<?php if (($_smarty_tpl->tpl_vars['show_brand_logo']->value>1&&$_smarty_tpl->tpl_vars['product_manufacturer']->value->id_manufacturer)||(isset($_smarty_tpl->tpl_vars['sttheme']->value['display_pro_tags'])&&$_smarty_tpl->tpl_vars['sttheme']->value['display_pro_tags']>1&&isset($_smarty_tpl->tpl_vars['product']->value->tags[$_smarty_tpl->tpl_vars['cookie']->value->id_lang])&&count($_smarty_tpl->tpl_vars['product']->value->tags[$_smarty_tpl->tpl_vars['cookie']->value->id_lang]))) {?>
						<div class="product_extra_info_wrap"> 
							<?php if ($_smarty_tpl->tpl_vars['show_brand_logo']->value>1&&$_smarty_tpl->tpl_vars['product_manufacturer']->value->id_manufacturer) {?>
							<p id="product_manufacturer_info" class="product_extra_info clearfix">
								<span class="product_extra_info_label"><?php echo smartyTranslate(array('s'=>'Brand:'),$_smarty_tpl);?>
 </span>
					            <a <?php if ($_smarty_tpl->tpl_vars['enable_google_rich_snippets']->value) {?> itemprop="brand" itemscope="" itemtype="http://schema.org/Organization" <?php }?> href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getmanufacturerLink($_smarty_tpl->tpl_vars['product_manufacturer']->value->id_manufacturer,$_smarty_tpl->tpl_vars['product_manufacturer']->value->link_rewrite);?>
" title="<?php echo smartyTranslate(array('s'=>'All products of this manufacturer'),$_smarty_tpl);?>
">
					                <?php if ($_smarty_tpl->tpl_vars['enable_google_rich_snippets']->value) {?><meta itemprop="name" content="<?php echo $_smarty_tpl->tpl_vars['product_manufacturer']->value->name;?>
" /><?php }?>
					                <?php if ($_smarty_tpl->tpl_vars['show_brand_logo']->value==2) {?>
					                	<?php echo $_smarty_tpl->tpl_vars['product_manufacturer']->value->name;?>

					                <?php } else { ?>
					                	<img <?php if ($_smarty_tpl->tpl_vars['enable_google_rich_snippets']->value) {?> itemprop="image" <?php }?> alt="<?php echo $_smarty_tpl->tpl_vars['product_manufacturer']->value->name;?>
" class="replace-2x" src="<?php echo $_smarty_tpl->tpl_vars['img_manu_dir']->value;?>
<?php echo $_smarty_tpl->tpl_vars['product_manufacturer']->value->id_manufacturer;?>
-manufacturer_default.jpg" />
					                <?php }?>
					            </a>
				            </p>
					        <?php }?>
					        <?php if (isset($_smarty_tpl->tpl_vars['sttheme']->value['display_pro_tags'])&&$_smarty_tpl->tpl_vars['sttheme']->value['display_pro_tags']==2&&isset($_smarty_tpl->tpl_vars['product']->value->tags[$_smarty_tpl->tpl_vars['cookie']->value->id_lang])&&count($_smarty_tpl->tpl_vars['product']->value->tags[$_smarty_tpl->tpl_vars['cookie']->value->id_lang])) {?>
				            <p id="tag_box_bottom_of_desc" class="product_extra_info clearfix">
								<span class="product_extra_info_label"><?php echo smartyTranslate(array('s'=>'Tags:'),$_smarty_tpl);?>
 </span>
				                <?php  $_smarty_tpl->tpl_vars['tag'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['tag']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['product']->value->tags[$_smarty_tpl->tpl_vars['cookie']->value->id_lang]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['tag']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['tag']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['tag']->key => $_smarty_tpl->tpl_vars['tag']->value) {
$_smarty_tpl->tpl_vars['tag']->_loop = true;
 $_smarty_tpl->tpl_vars['tag']->iteration++;
 $_smarty_tpl->tpl_vars['tag']->last = $_smarty_tpl->tpl_vars['tag']->iteration === $_smarty_tpl->tpl_vars['tag']->total;
?>
				                    <a href="<?php ob_start();?><?php echo urlencode($_smarty_tpl->tpl_vars['tag']->value);?>
<?php $_tmp4=ob_get_clean();?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('search',true,null,"tag=".$_tmp4), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'More about'),$_smarty_tpl);?>
 <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['tag']->value, ENT_QUOTES, 'UTF-8', true);?>
"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['tag']->value, ENT_QUOTES, 'UTF-8', true);?>
</a><?php if (!$_smarty_tpl->tpl_vars['tag']->last) {?>, <?php }?>
				                <?php } ?>
				            </p>
				            <?php }?>
			            </div>
			            <?php }?>
					</div> <!-- end box-cart-bottom -->
				</div> <!-- end box-info-product -->
			</form>
			<?php }?>
			<?php if (isset($_smarty_tpl->tpl_vars['HOOK_PRODUCT_ACTIONS']->value)&&trim($_smarty_tpl->tpl_vars['HOOK_PRODUCT_ACTIONS']->value)) {?>
            <div id="product_actions_wrap" class="clearfix">
				<?php echo $_smarty_tpl->tpl_vars['HOOK_PRODUCT_ACTIONS']->value;?>

            </div>
            <?php }?>
            <?php if (!$_smarty_tpl->tpl_vars['content_only']->value&&trim($_smarty_tpl->tpl_vars['HOOK_EXTRA_LEFT']->value)) {?>
				<!-- usefull links-->
				<ul id="usefull_link_block" class="clearfix no-print">
					<?php if ($_smarty_tpl->tpl_vars['HOOK_EXTRA_LEFT']->value) {?><?php echo $_smarty_tpl->tpl_vars['HOOK_EXTRA_LEFT']->value;?>
<?php }?>
				</ul>
			<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['product_tabs']->value) {?><div id="right_more_info_block"><?php echo Smarty::$_smarty_vars['capture']['product_tabs'];?>
</div><?php }?>
		</div>
		<!-- end center infos-->
		<!-- pb-right-column-->
		<?php if ($_smarty_tpl->tpl_vars['product_secondary']->value&&!$_smarty_tpl->tpl_vars['content_only']->value&&!(isset($_smarty_tpl->tpl_vars['product_big_image']->value)&&$_smarty_tpl->tpl_vars['product_big_image']->value)) {?>
			<div class="pb-right-column col-xs-12 <?php if ($_smarty_tpl->tpl_vars['product_secondary']->value==2) {?> hidden-sm col-md-3 <?php } else { ?> col-sm-3 <?php }?>">
				<?php if ($_smarty_tpl->tpl_vars['show_brand_logo']->value==1&&$_smarty_tpl->tpl_vars['product_manufacturer']->value->id_manufacturer) {?>
		            <a id="product_manufacturer_logo" <?php if ($_smarty_tpl->tpl_vars['enable_google_rich_snippets']->value) {?> itemprop="brand" itemscope="" itemtype="http://schema.org/Organization" <?php }?> href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getmanufacturerLink($_smarty_tpl->tpl_vars['product_manufacturer']->value->id_manufacturer,$_smarty_tpl->tpl_vars['product_manufacturer']->value->link_rewrite);?>
" title="<?php echo smartyTranslate(array('s'=>'All products of this manufacturer'),$_smarty_tpl);?>
">
		                <?php if ($_smarty_tpl->tpl_vars['enable_google_rich_snippets']->value) {?><meta itemprop="name" content="<?php echo $_smarty_tpl->tpl_vars['product_manufacturer']->value->name;?>
" /><?php }?>
		                <img <?php if ($_smarty_tpl->tpl_vars['enable_google_rich_snippets']->value) {?> itemprop="image" <?php }?> alt="<?php echo $_smarty_tpl->tpl_vars['product_manufacturer']->value->name;?>
" class="replace-2x" src="<?php echo $_smarty_tpl->tpl_vars['img_manu_dir']->value;?>
<?php echo $_smarty_tpl->tpl_vars['product_manufacturer']->value->id_manufacturer;?>
-manufacturer_default.jpg" />
		            </a>
		        <?php }?>
				<?php echo $_smarty_tpl->tpl_vars['HOOK_PRODUCT_SECONDARY_COLUMN']->value;?>

			</div> 
		<?php }?>
	</div> <!-- end primary_block -->
	<?php if (!$_smarty_tpl->tpl_vars['content_only']->value) {?>
		<?php if ((isset($_smarty_tpl->tpl_vars['quantity_discounts']->value)&&count($_smarty_tpl->tpl_vars['quantity_discounts']->value)>0)) {?>
			<!-- quantity discount -->
			<section class="page-product-box">
				<h3 class="page-product-heading"><?php echo smartyTranslate(array('s'=>'Volume discounts'),$_smarty_tpl);?>
</h3>
				<div id="quantityDiscount">
					<table class="std table-product-discounts">
						<thead>
							<tr>
								<th><?php echo smartyTranslate(array('s'=>'Quantity'),$_smarty_tpl);?>
</th>
								<th><?php if ($_smarty_tpl->tpl_vars['display_discount_price']->value) {?><?php echo smartyTranslate(array('s'=>'Price'),$_smarty_tpl);?>
<?php } else { ?><?php echo smartyTranslate(array('s'=>'Discount'),$_smarty_tpl);?>
<?php }?></th>
								<th><?php echo smartyTranslate(array('s'=>'You Save'),$_smarty_tpl);?>
</th>
							</tr>
						</thead>
						<tbody>
							<?php  $_smarty_tpl->tpl_vars['quantity_discount'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['quantity_discount']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['quantity_discounts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['quantity_discount']->key => $_smarty_tpl->tpl_vars['quantity_discount']->value) {
$_smarty_tpl->tpl_vars['quantity_discount']->_loop = true;
?>
							<tr id="quantityDiscount_<?php echo $_smarty_tpl->tpl_vars['quantity_discount']->value['id_product_attribute'];?>
" class="quantityDiscount_<?php echo $_smarty_tpl->tpl_vars['quantity_discount']->value['id_product_attribute'];?>
" data-discount-type="<?php echo $_smarty_tpl->tpl_vars['quantity_discount']->value['reduction_type'];?>
" data-discount="<?php echo floatval($_smarty_tpl->tpl_vars['quantity_discount']->value['real_value']);?>
" data-discount-quantity="<?php echo intval($_smarty_tpl->tpl_vars['quantity_discount']->value['quantity']);?>
">
								<td>
									<?php echo intval($_smarty_tpl->tpl_vars['quantity_discount']->value['quantity']);?>

								</td>
								<td>
									<?php if ($_smarty_tpl->tpl_vars['quantity_discount']->value['price']>=0||$_smarty_tpl->tpl_vars['quantity_discount']->value['reduction_type']=='amount') {?>
										<?php if ($_smarty_tpl->tpl_vars['display_discount_price']->value) {?>
											<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['productPrice']->value-floatval($_smarty_tpl->tpl_vars['quantity_discount']->value['real_value'])),$_smarty_tpl);?>

										<?php } else { ?>
											<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>floatval($_smarty_tpl->tpl_vars['quantity_discount']->value['real_value'])),$_smarty_tpl);?>

										<?php }?>
									<?php } else { ?>
										<?php if ($_smarty_tpl->tpl_vars['display_discount_price']->value) {?>
											<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['productPrice']->value-floatval(($_smarty_tpl->tpl_vars['productPrice']->value*$_smarty_tpl->tpl_vars['quantity_discount']->value['reduction']))),$_smarty_tpl);?>

										<?php } else { ?>
											<?php echo floatval($_smarty_tpl->tpl_vars['quantity_discount']->value['real_value']);?>
%
										<?php }?>
									<?php }?>
								</td>
								<td>
									<span><?php echo smartyTranslate(array('s'=>'Up to'),$_smarty_tpl);?>
</span>
									<?php if ($_smarty_tpl->tpl_vars['quantity_discount']->value['price']>=0||$_smarty_tpl->tpl_vars['quantity_discount']->value['reduction_type']=='amount') {?>
										<?php $_smarty_tpl->tpl_vars['discountPrice'] = new Smarty_variable($_smarty_tpl->tpl_vars['productPrice']->value-floatval($_smarty_tpl->tpl_vars['quantity_discount']->value['real_value']), null, 0);?>
									<?php } else { ?>
										<?php $_smarty_tpl->tpl_vars['discountPrice'] = new Smarty_variable($_smarty_tpl->tpl_vars['productPrice']->value-floatval(($_smarty_tpl->tpl_vars['productPrice']->value*$_smarty_tpl->tpl_vars['quantity_discount']->value['reduction'])), null, 0);?>
									<?php }?>
									<?php $_smarty_tpl->tpl_vars['discountPrice'] = new Smarty_variable($_smarty_tpl->tpl_vars['discountPrice']->value*$_smarty_tpl->tpl_vars['quantity_discount']->value['quantity'], null, 0);?>
									<?php $_smarty_tpl->tpl_vars['qtyProductPrice'] = new Smarty_variable($_smarty_tpl->tpl_vars['productPrice']->value*$_smarty_tpl->tpl_vars['quantity_discount']->value['quantity'], null, 0);?>
									<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['qtyProductPrice']->value-$_smarty_tpl->tpl_vars['discountPrice']->value),$_smarty_tpl);?>

								</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</section>
		<?php }?>


		<?php if (isset($_smarty_tpl->tpl_vars['packItems']->value)&&count($_smarty_tpl->tpl_vars['packItems']->value)>0) {?>
		<section id="blockpack" class="block section">
			<h4 class="title_block"><span><?php echo smartyTranslate(array('s'=>'Pack content'),$_smarty_tpl);?>
</span></h4>
			<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_dir']->value)."./product-list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('products'=>$_smarty_tpl->tpl_vars['packItems']->value,'for_f'=>'packitems'), 0);?>

		</section>
		<?php }?>
		
		<!--HOOK_PRODUCT_TAB -->
		<?php if (!$_smarty_tpl->tpl_vars['product_tabs']->value) {?><div id="bottom_more_info_block" class="mar_b2"><?php echo Smarty::$_smarty_vars['capture']['product_tabs'];?>
</div><?php }?>
		<!--end HOOK_PRODUCT_TAB -->

		<?php if (isset($_smarty_tpl->tpl_vars['accessories']->value)&&$_smarty_tpl->tpl_vars['accessories']->value) {?>
		<?php $_smarty_tpl->tpl_vars['ac_direction_nav'] = new Smarty_variable(Configuration::get('STSN_AC_DIRECTION_NAV'), null, 0);?>
		<?php $_smarty_tpl->tpl_vars['flyout_buttons'] = new Smarty_variable(Configuration::get('STSN_FLYOUT_BUTTONS'), null, 0);?>
		<?php $_smarty_tpl->tpl_vars['st_display_add_to_cart'] = new Smarty_variable(Configuration::get('STSN_DISPLAY_ADD_TO_CART'), null, 0);?>
		<?php $_smarty_tpl->tpl_vars['flyout_wishlist'] = new Smarty_variable(Configuration::get('STSN_FLYOUT_WISHLIST'), null, 0);?>
		<?php $_smarty_tpl->tpl_vars['flyout_quickview'] = new Smarty_variable(Configuration::get('STSN_FLYOUT_QUICKVIEW'), null, 0);?>
		<?php $_smarty_tpl->tpl_vars['flyout_comparison'] = new Smarty_variable(Configuration::get('STSN_FLYOUT_COMPARISON'), null, 0);?>  
		<?php $_smarty_tpl->tpl_vars['flyout_buttons_on_mobile'] = new Smarty_variable(Configuration::get('STSN_FLYOUT_BUTTONS_ON_MOBILE'), null, 0);?>
			<!--Accessories -->
			<section id="accessories_block" class="products_block block section">
		    	<h4 class="title_block <?php if (Configuration::get('STSN_AC_TITLE')) {?> title_block_center <?php }?>"><span><?php echo smartyTranslate(array('s'=>'Accessories'),$_smarty_tpl);?>
</span></h4>
		        <div id="accessories-itemslider" class="products_slider"> 
					<div class="slides remove_after_init <?php if ($_smarty_tpl->tpl_vars['ac_direction_nav']->value>1) {?> owl-navigation-lr <?php if ($_smarty_tpl->tpl_vars['ac_direction_nav']->value==4) {?> owl-navigation-circle <?php } else { ?> owl-navigation-rectangle <?php }?> <?php } elseif ($_smarty_tpl->tpl_vars['ac_direction_nav']->value==1) {?> owl-navigation-tr<?php }?>">
						<?php  $_smarty_tpl->tpl_vars['accessory'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['accessory']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['accessories']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['accessory']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['accessory']->iteration=0;
 $_smarty_tpl->tpl_vars['accessory']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['accessory']->key => $_smarty_tpl->tpl_vars['accessory']->value) {
$_smarty_tpl->tpl_vars['accessory']->_loop = true;
 $_smarty_tpl->tpl_vars['accessory']->iteration++;
 $_smarty_tpl->tpl_vars['accessory']->index++;
 $_smarty_tpl->tpl_vars['accessory']->first = $_smarty_tpl->tpl_vars['accessory']->index === 0;
 $_smarty_tpl->tpl_vars['accessory']->last = $_smarty_tpl->tpl_vars['accessory']->iteration === $_smarty_tpl->tpl_vars['accessory']->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['accessories_list']['first'] = $_smarty_tpl->tpl_vars['accessory']->first;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']['accessories_list']['last'] = $_smarty_tpl->tpl_vars['accessory']->last;
?>
							<?php if (($_smarty_tpl->tpl_vars['accessory']->value['allow_oosp']||$_smarty_tpl->tpl_vars['accessory']->value['quantity_all_versions']>0||$_smarty_tpl->tpl_vars['accessory']->value['quantity']>0)&&$_smarty_tpl->tpl_vars['accessory']->value['available_for_order']&&!isset($_smarty_tpl->tpl_vars['restricted_country_mode']->value)) {?>
								<?php $_smarty_tpl->tpl_vars['accessoryLink'] = new Smarty_variable($_smarty_tpl->tpl_vars['link']->value->getProductLink($_smarty_tpl->tpl_vars['accessory']->value['id_product'],$_smarty_tpl->tpl_vars['accessory']->value['link_rewrite'],$_smarty_tpl->tpl_vars['accessory']->value['category']), null, 0);?>
								<?php $_smarty_tpl->_capture_stack[0][] = array("new_on_sale", null, null); ob_start(); ?>
					                <?php if ($_smarty_tpl->tpl_vars['new_sticker']->value!=2&&isset($_smarty_tpl->tpl_vars['accessory']->value['new'])&&$_smarty_tpl->tpl_vars['accessory']->value['new']==1) {?><span class="new"><i><?php echo smartyTranslate(array('s'=>'New'),$_smarty_tpl);?>
</i></span><?php }?><?php if ($_smarty_tpl->tpl_vars['sale_sticker']->value!=2&&isset($_smarty_tpl->tpl_vars['accessory']->value['on_sale'])&&$_smarty_tpl->tpl_vars['accessory']->value['on_sale']&&isset($_smarty_tpl->tpl_vars['accessory']->value['show_price'])&&$_smarty_tpl->tpl_vars['accessory']->value['show_price']&&!$_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value) {?><span class="on_sale"><i><?php echo smartyTranslate(array('s'=>'Sale'),$_smarty_tpl);?>
</i></span><?php }?>
					            <?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
								<div class="ajax_block_product product_accessories_description <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['accessories_list']['first']) {?> first_item<?php } elseif ($_smarty_tpl->getVariable('smarty')->value['foreach']['accessories_list']['last']) {?> last_item<?php } else { ?> item<?php }?>">
			                        <div class="pro_first_box">
			                            <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['accessoryLink']->value, ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['accessory']->value['legend'], ENT_QUOTES, 'UTF-8', true);?>
" class="product-image product_image">
											<img class="replace-2x img-responsive front-image" src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getImageLink($_smarty_tpl->tpl_vars['accessory']->value['link_rewrite'],$_smarty_tpl->tpl_vars['accessory']->value['id_image'],'home_default'), ENT_QUOTES, 'UTF-8', true);?>
" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['accessory']->value['legend'], ENT_QUOTES, 'UTF-8', true);?>
" width="<?php echo $_smarty_tpl->tpl_vars['homeSize']->value['width'];?>
" height="<?php echo $_smarty_tpl->tpl_vars['homeSize']->value['height'];?>
" />
											<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayAnywhere','function'=>'getHoverImage','id_product'=>$_smarty_tpl->tpl_vars['accessory']->value['id_product'],'product_link_rewrite'=>$_smarty_tpl->tpl_vars['accessory']->value['link_rewrite'],'home_default_height'=>$_smarty_tpl->tpl_vars['homeSize']->value['height'],'home_default_width'=>$_smarty_tpl->tpl_vars['homeSize']->value['width'],'product_name'=>$_smarty_tpl->tpl_vars['accessory']->value['name'],'mod'=>'sthoverimage','caller'=>'sthoverimage'),$_smarty_tpl);?>
<?php echo Smarty::$_smarty_vars['capture']['new_on_sale'];?>


											<?php if ((!$_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value&&((isset($_smarty_tpl->tpl_vars['accessory']->value['show_price'])&&$_smarty_tpl->tpl_vars['accessory']->value['show_price'])||(isset($_smarty_tpl->tpl_vars['accessory']->value['available_for_order'])&&$_smarty_tpl->tpl_vars['accessory']->value['available_for_order'])))) {?>
												<?php if (isset($_smarty_tpl->tpl_vars['accessory']->value['show_price'])&&$_smarty_tpl->tpl_vars['accessory']->value['show_price']&&!isset($_smarty_tpl->tpl_vars['restricted_country_mode']->value)) {?>
													<?php if ($_smarty_tpl->tpl_vars['discount_percentage']->value>1&&isset($_smarty_tpl->tpl_vars['accessory']->value['specific_prices'])&&$_smarty_tpl->tpl_vars['accessory']->value['specific_prices']&&isset($_smarty_tpl->tpl_vars['accessory']->value['specific_prices']['reduction'])&&$_smarty_tpl->tpl_vars['accessory']->value['specific_prices']['reduction']>0) {?>
							                            <?php if ($_smarty_tpl->tpl_vars['accessory']->value['specific_prices']&&$_smarty_tpl->tpl_vars['accessory']->value['specific_prices']['reduction_type']=='percentage') {?>
							                            	<span class="sale_percentage_sticker">
														        <?php echo $_smarty_tpl->tpl_vars['accessory']->value['specific_prices']['reduction']*floatval(100);?>
%<?php if ($_smarty_tpl->tpl_vars['discount_percentage']->value==2) {?><br/><?php } else { ?> <?php }?><?php echo smartyTranslate(array('s'=>'Off'),$_smarty_tpl);?>

															</span>
							                            <?php } elseif ($_smarty_tpl->tpl_vars['accessory']->value['specific_prices']&&$_smarty_tpl->tpl_vars['accessory']->value['specific_prices']['reduction_type']=='amount'&&floatval($_smarty_tpl->tpl_vars['accessory']->value['specific_prices']['reduction'])!=0) {?>
							                            	<span class="sale_percentage_sticker">
							                            		<?php echo smartyTranslate(array('s'=>'Save'),$_smarty_tpl);?>
<?php if ($_smarty_tpl->tpl_vars['discount_percentage']->value==2) {?><br/><?php } else { ?> <?php }?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['accessory']->value['price_without_reduction']-floatval($_smarty_tpl->tpl_vars['accessory']->value['price'])),$_smarty_tpl);?>

							                            	</span>
							                            <?php }?>
							                        <?php }?>
						                        <?php }?>
						                    <?php }?>
										</a>
										<?php $_smarty_tpl->_capture_stack[0][] = array("pro_a_cart", null, null); ob_start(); ?>
											<?php if (!$_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value&&($_smarty_tpl->tpl_vars['accessory']->value['allow_oosp']||$_smarty_tpl->tpl_vars['accessory']->value['quantity']>0)) {?>
										  		<a class="exclusive ajax_add_to_cart_button" href="<?php ob_start();?><?php echo intval($_smarty_tpl->tpl_vars['accessory']->value['id_product']);?>
<?php $_tmp5=ob_get_clean();?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('cart',true,null,"qty=1&amp;id_product=".$_tmp5."&amp;token=".((string)$_smarty_tpl->tpl_vars['static_token']->value)."&amp;add"), ENT_QUOTES, 'UTF-8', true);?>
" data-id-product="<?php echo intval($_smarty_tpl->tpl_vars['accessory']->value['id_product']);?>
" title="<?php echo smartyTranslate(array('s'=>'Add to cart'),$_smarty_tpl);?>
" rel="nofollow"><div><i class="icon-basket icon-small icon-mar-lr2"></i><span><?php echo smartyTranslate(array('s'=>'Add to cart'),$_smarty_tpl);?>
</span></div></a>
											<?php } else { ?>
					                            <a class="button exclusive view_button" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['accessoryLink']->value, ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'View'),$_smarty_tpl);?>
" rel="nofollow"><div><i class="icon-eye-2 icon-small icon-mar-lr2"></i><span><?php echo smartyTranslate(array('s'=>'View'),$_smarty_tpl);?>
</span></div></a>
											<?php }?>
						                <?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
						                <?php $_smarty_tpl->_capture_stack[0][] = array("pro_a_compare", null, null); ob_start(); ?>
						                    <?php if (!$_smarty_tpl->tpl_vars['flyout_comparison']->value&&isset($_smarty_tpl->tpl_vars['comparator_max_item']->value)&&$_smarty_tpl->tpl_vars['comparator_max_item']->value) {?>
						                        <a class="add_to_compare" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['accessoryLink']->value, ENT_QUOTES, 'UTF-8', true);?>
" data-id-product="<?php echo $_smarty_tpl->tpl_vars['accessory']->value['id_product'];?>
" rel="nofollow" data-product-cover="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getImageLink($_smarty_tpl->tpl_vars['accessory']->value['link_rewrite'],$_smarty_tpl->tpl_vars['accessory']->value['id_image'],'thumb_default'), ENT_QUOTES, 'UTF-8', true);?>
" data-product-name="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['accessory']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
"><div><i class="icon-adjust icon-small icon-mar-lr2"></i><span><?php echo smartyTranslate(array('s'=>'Add to compare'),$_smarty_tpl);?>
</span></div></a>
						        			<?php }?>
						                <?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
			                            <?php $_smarty_tpl->_capture_stack[0][] = array("pro_a_wishlist", null, null); ob_start(); ?>
			                                <?php if (!$_smarty_tpl->tpl_vars['flyout_wishlist']->value) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayAnywhere','function'=>"getAddToWhishlistButton",'id_product'=>$_smarty_tpl->tpl_vars['accessory']->value['id_product'],'show_icon'=>0,'mod'=>'stthemeeditor','caller'=>'stthemeeditor'),$_smarty_tpl);?>
<?php }?>
			                            <?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
			                            <?php $_smarty_tpl->_capture_stack[0][] = array("pro_quick_view", null, null); ob_start(); ?>
						                    <?php if (!$_smarty_tpl->tpl_vars['flyout_quickview']->value&&isset($_smarty_tpl->tpl_vars['quick_view']->value)&&$_smarty_tpl->tpl_vars['quick_view']->value) {?>
						                        <a class="quick-view" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['accessoryLink']->value, ENT_QUOTES, 'UTF-8', true);?>
" rel="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['accessoryLink']->value, ENT_QUOTES, 'UTF-8', true);?>
"><div><i class="icon-search-1 icon-small icon-mar-lr2"></i><span><?php echo smartyTranslate(array('s'=>'Quick view'),$_smarty_tpl);?>
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
                            			<?php if (trim(Smarty::$_smarty_vars['capture']['pro_a_wishlist'])) {?><?php $_smarty_tpl->tpl_vars["fly_i"] = new Smarty_variable($_smarty_tpl->tpl_vars['fly_i']->value+1, null, 0);?><?php }?>
            							<?php if (trim(Smarty::$_smarty_vars['capture']['pro_quick_view'])) {?><?php $_smarty_tpl->tpl_vars["fly_i"] = new Smarty_variable($_smarty_tpl->tpl_vars['fly_i']->value+1, null, 0);?><?php }?>
						                <div class="hover_fly <?php if ($_smarty_tpl->tpl_vars['flyout_buttons']->value) {?>hover_fly_static<?php }?> <?php if ($_smarty_tpl->tpl_vars['flyout_buttons_on_mobile']->value==1) {?> mobile_hover_fly_show <?php } elseif ($_smarty_tpl->tpl_vars['flyout_buttons_on_mobile']->value==2) {?> mobile_hover_fly_cart <?php } else { ?> mobile_hover_fly_hide <?php }?> fly_<?php echo $_smarty_tpl->tpl_vars['fly_i']->value;?>
 <?php if (trim(Smarty::$_smarty_vars['capture']['pro_quick_view'])) {?> has_quick_view <?php }?> clearfix">
						                    <?php if (!$_smarty_tpl->tpl_vars['st_display_add_to_cart']->value) {?><?php echo Smarty::$_smarty_vars['capture']['pro_a_cart'];?>
<?php }?>
                							<?php echo Smarty::$_smarty_vars['capture']['pro_quick_view'];?>

						                    <?php echo Smarty::$_smarty_vars['capture']['pro_a_compare'];?>

                                			<?php echo Smarty::$_smarty_vars['capture']['pro_a_wishlist'];?>
 
						                </div>
						            </div>
						            <div class="pro_second_box">
						            <?php if (isset($_smarty_tpl->tpl_vars['sttheme']->value['length_of_product_name'])&&$_smarty_tpl->tpl_vars['sttheme']->value['length_of_product_name']==1) {?>
						                <?php $_smarty_tpl->tpl_vars["length_of_product_name"] = new Smarty_variable(70, null, 0);?>
						            <?php } else { ?>
						                <?php $_smarty_tpl->tpl_vars["length_of_product_name"] = new Smarty_variable(35, null, 0);?>
						            <?php }?>
									<p itemprop="name" class="s_title_block <?php if (isset($_smarty_tpl->tpl_vars['sttheme']->value['length_of_product_name'])&&$_smarty_tpl->tpl_vars['sttheme']->value['length_of_product_name']) {?> nohidden <?php }?>"><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['accessoryLink']->value, ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['accessory']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
"><?php if (isset($_smarty_tpl->tpl_vars['sttheme']->value['length_of_product_name'])&&$_smarty_tpl->tpl_vars['sttheme']->value['length_of_product_name']==2) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['accessory']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
<?php } else { ?><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['truncate'][0][0]->smarty_modifier_truncate($_smarty_tpl->tpl_vars['accessory']->value['name'],$_smarty_tpl->tpl_vars['length_of_product_name']->value,'...'), ENT_QUOTES, 'UTF-8', true);?>
<?php }?></a></p>
									<?php if (((isset($_smarty_tpl->tpl_vars['accessory']->value['show_price'])&&$_smarty_tpl->tpl_vars['accessory']->value['show_price'])||(isset($_smarty_tpl->tpl_vars['accessory']->value['available_for_order'])&&$_smarty_tpl->tpl_vars['accessory']->value['available_for_order']))&&!isset($_smarty_tpl->tpl_vars['restricted_country_mode']->value)&&!$_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value) {?>
						                <div class="price_container">
						                    <span class="price product-price">
						                    <?php if ($_smarty_tpl->tpl_vars['priceDisplay']->value!=1) {?>
											<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayWtPrice'][0][0]->displayWtPrice(array('p'=>$_smarty_tpl->tpl_vars['accessory']->value['price']),$_smarty_tpl);?>
<?php } else { ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayWtPrice'][0][0]->displayWtPrice(array('p'=>$_smarty_tpl->tpl_vars['accessory']->value['price_tax_exc']),$_smarty_tpl);?>

											<?php }?>
						                    </span>
						                    <?php if (isset($_smarty_tpl->tpl_vars['accessory']->value['specific_prices'])&&$_smarty_tpl->tpl_vars['accessory']->value['specific_prices']&&isset($_smarty_tpl->tpl_vars['accessory']->value['specific_prices']['reduction'])&&$_smarty_tpl->tpl_vars['accessory']->value['specific_prices']['reduction']>0) {?>
						                    <span class="old-price product-price"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['displayWtPrice'][0][0]->displayWtPrice(array('p'=>$_smarty_tpl->tpl_vars['accessory']->value['price_without_reduction']),$_smarty_tpl);?>
</span>
						                    <?php }?>
						                    <?php if ($_smarty_tpl->tpl_vars['discount_percentage']->value==1) {?>
						                        <?php if ($_smarty_tpl->tpl_vars['accessory']->value['specific_prices']&&$_smarty_tpl->tpl_vars['accessory']->value['specific_prices']['reduction_type']=='percentage') {?>
						                        	<span class="sale_percentage">
													    -<?php echo $_smarty_tpl->tpl_vars['accessory']->value['specific_prices']['reduction']*floatval(100);?>
%
													</span>
						                        <?php } elseif ($_smarty_tpl->tpl_vars['accessory']->value['specific_prices']&&$_smarty_tpl->tpl_vars['accessory']->value['specific_prices']['reduction_type']=='amount'&&floatval($_smarty_tpl->tpl_vars['accessory']->value['specific_prices']['reduction'])!=0) {?>
						                        	<?php if (!$_smarty_tpl->tpl_vars['priceDisplay']->value) {?>
						                        	<span class="sale_percentage">
													    -<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['accessory']->value['price_without_reduction']-floatval($_smarty_tpl->tpl_vars['accessory']->value['price'])),$_smarty_tpl);?>

													</span>
						                        	<?php } else { ?>
						                        	<span class="sale_percentage">
													    -<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['accessory']->value['price_without_reduction']-floatval($_smarty_tpl->tpl_vars['accessory']->value['price_tax_exc'])),$_smarty_tpl);?>

													</span>
						                        	<?php }?>
						                        <?php }?>
					                        <?php }?>
						                </div>
						            <?php }?>
						            <?php if ($_smarty_tpl->tpl_vars['st_display_add_to_cart']->value==1||$_smarty_tpl->tpl_vars['st_display_add_to_cart']->value==2) {?>
							        <div class="act_box <?php if ($_smarty_tpl->tpl_vars['st_display_add_to_cart']->value==1) {?> display_when_hover <?php } elseif ($_smarty_tpl->tpl_vars['st_display_add_to_cart']->value==2) {?> display_normal <?php }?>">
							            <?php echo Smarty::$_smarty_vars['capture']['pro_a_cart'];?>

							        </div>
							        <?php }?>
						            </div>
								</div>
							<?php }?>
						<?php } ?>
					</div>
		         <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayAnywhere','function'=>"getCarouselJavascript",'identify'=>'accessories','mod'=>'stthemeeditor','caller'=>'stthemeeditor'),$_smarty_tpl);?>

			</section>
			<!--end Accessories -->
		<?php }?>
		
		<?php if (isset($_smarty_tpl->tpl_vars['HOOK_PRODUCT_FOOTER']->value)&&$_smarty_tpl->tpl_vars['HOOK_PRODUCT_FOOTER']->value) {?><?php echo $_smarty_tpl->tpl_vars['HOOK_PRODUCT_FOOTER']->value;?>
<?php }?>
		
	<?php }?>
</div> <!-- itemscope product wrapper -->
<?php if (isset($_GET['ad'])&&$_GET['ad']) {?><?php $_smarty_tpl->smarty->_tag_stack[] = array('addJsDefL', array('name'=>'ad')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'ad'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php echo htmlspecialchars(($_smarty_tpl->tpl_vars['base_dir']->value).($_GET['ad']), ENT_QUOTES, 'UTF-8', true);?>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'ad'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php }?><?php if (isset($_GET['adtoken'])&&$_GET['adtoken']) {?><?php $_smarty_tpl->smarty->_tag_stack[] = array('addJsDefL', array('name'=>'adtoken')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'adtoken'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php echo htmlspecialchars($_GET['adtoken'], ENT_QUOTES, 'UTF-8', true);?>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'adtoken'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php }?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('allowBuyWhenOutOfStock'=>$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['boolval'][0][0]->boolval($_smarty_tpl->tpl_vars['allow_oosp']->value)),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('availableNowValue'=>preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['product']->value->available_now)),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('availableLaterValue'=>preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['product']->value->available_later)),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('attribute_anchor_separator'=>preg_replace("%(?<!\\\\)'%", "\'",$_smarty_tpl->tpl_vars['attribute_anchor_separator']->value)),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('attributesCombinations'=>$_smarty_tpl->tpl_vars['attributesCombinations']->value),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('currencySign'=>html_entity_decode($_smarty_tpl->tpl_vars['currencySign']->value,2,"UTF-8")),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('currencyRate'=>floatval($_smarty_tpl->tpl_vars['currencyRate']->value)),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('currencyFormat'=>intval($_smarty_tpl->tpl_vars['currencyFormat']->value)),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('currencyBlank'=>intval($_smarty_tpl->tpl_vars['currencyBlank']->value)),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('currentDate'=>smarty_modifier_date_format(time(),'%Y-%m-%d %H:%M:%S')),$_smarty_tpl);?>
<?php if (isset($_smarty_tpl->tpl_vars['combinations']->value)&&$_smarty_tpl->tpl_vars['combinations']->value) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('combinations'=>$_smarty_tpl->tpl_vars['combinations']->value),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('combinationsFromController'=>$_smarty_tpl->tpl_vars['combinations']->value),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('displayDiscountPrice'=>$_smarty_tpl->tpl_vars['display_discount_price']->value),$_smarty_tpl);?>
<?php $_smarty_tpl->smarty->_tag_stack[] = array('addJsDefL', array('name'=>'upToTxt')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'upToTxt'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php echo smartyTranslate(array('s'=>'Up to','js'=>1),$_smarty_tpl);?>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'upToTxt'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php }?><?php if (isset($_smarty_tpl->tpl_vars['combinationImages']->value)&&$_smarty_tpl->tpl_vars['combinationImages']->value) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('combinationImages'=>$_smarty_tpl->tpl_vars['combinationImages']->value),$_smarty_tpl);?>
<?php }?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('customizationFields'=>$_smarty_tpl->tpl_vars['customizationFields']->value),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('default_eco_tax'=>floatval($_smarty_tpl->tpl_vars['product']->value->ecotax)),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('displayPrice'=>intval($_smarty_tpl->tpl_vars['priceDisplay']->value)),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('ecotaxTax_rate'=>floatval($_smarty_tpl->tpl_vars['ecotaxTax_rate']->value)),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('group_reduction'=>$_smarty_tpl->tpl_vars['group_reduction']->value),$_smarty_tpl);?>
<?php if (isset($_smarty_tpl->tpl_vars['cover']->value['id_image_only'])) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('idDefaultImage'=>intval($_smarty_tpl->tpl_vars['cover']->value['id_image_only'])),$_smarty_tpl);?>
<?php } else { ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('idDefaultImage'=>0),$_smarty_tpl);?>
<?php }?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('img_ps_dir'=>$_smarty_tpl->tpl_vars['img_ps_dir']->value),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('img_prod_dir'=>$_smarty_tpl->tpl_vars['img_prod_dir']->value),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('id_product'=>intval($_smarty_tpl->tpl_vars['product']->value->id)),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('jqZoomEnabled'=>$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['boolval'][0][0]->boolval($_smarty_tpl->tpl_vars['jqZoomEnabled']->value)),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('maxQuantityToAllowDisplayOfLastQuantityMessage'=>intval($_smarty_tpl->tpl_vars['last_qties']->value)),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('minimalQuantity'=>intval($_smarty_tpl->tpl_vars['product']->value->minimal_quantity)),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('noTaxForThisProduct'=>$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['boolval'][0][0]->boolval($_smarty_tpl->tpl_vars['no_tax']->value)),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('customerGroupWithoutTax'=>$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['boolval'][0][0]->boolval($_smarty_tpl->tpl_vars['customer_group_without_tax']->value)),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('oosHookJsCodeFunctions'=>Array()),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('productHasAttributes'=>$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['boolval'][0][0]->boolval(isset($_smarty_tpl->tpl_vars['groups']->value))),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('productPriceTaxExcluded'=>floatval(((($tmp = @$_smarty_tpl->tpl_vars['product']->value->getPriceWithoutReduct(true))===null||$tmp==='' ? 'null' : $tmp)-$_smarty_tpl->tpl_vars['product']->value->ecotax))),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('productBasePriceTaxExcluded'=>floatval(($_smarty_tpl->tpl_vars['product']->value->base_price-$_smarty_tpl->tpl_vars['product']->value->ecotax))),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('productBasePriceTaxExcl'=>(floatval($_smarty_tpl->tpl_vars['product']->value->base_price))),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('productReference'=>htmlspecialchars($_smarty_tpl->tpl_vars['product']->value->reference, ENT_QUOTES, 'UTF-8', true)),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('productAvailableForOrder'=>$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['boolval'][0][0]->boolval($_smarty_tpl->tpl_vars['product']->value->available_for_order)),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('productPriceWithoutReduction'=>floatval($_smarty_tpl->tpl_vars['productPriceWithoutReduction']->value)),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('productPrice'=>floatval($_smarty_tpl->tpl_vars['productPrice']->value)),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('productUnitPriceRatio'=>floatval($_smarty_tpl->tpl_vars['product']->value->unit_price_ratio)),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('productShowPrice'=>$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['boolval'][0][0]->boolval((!$_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value&&$_smarty_tpl->tpl_vars['product']->value->show_price))),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('PS_CATALOG_MODE'=>$_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value),$_smarty_tpl);?>
<?php if ($_smarty_tpl->tpl_vars['product']->value->specificPrice&&count($_smarty_tpl->tpl_vars['product']->value->specificPrice)) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('product_specific_price'=>$_smarty_tpl->tpl_vars['product']->value->specificPrice),$_smarty_tpl);?>
<?php } else { ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('product_specific_price'=>array()),$_smarty_tpl);?>
<?php }?><?php if ($_smarty_tpl->tpl_vars['display_qties']->value==1&&$_smarty_tpl->tpl_vars['product']->value->quantity) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('quantityAvailable'=>$_smarty_tpl->tpl_vars['product']->value->quantity),$_smarty_tpl);?>
<?php } else { ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('quantityAvailable'=>0),$_smarty_tpl);?>
<?php }?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('quantitiesDisplayAllowed'=>$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['boolval'][0][0]->boolval($_smarty_tpl->tpl_vars['display_qties']->value)),$_smarty_tpl);?>
<?php if ($_smarty_tpl->tpl_vars['product']->value->specificPrice&&$_smarty_tpl->tpl_vars['product']->value->specificPrice['reduction']&&$_smarty_tpl->tpl_vars['product']->value->specificPrice['reduction_type']=='percentage') {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('reduction_percent'=>$_smarty_tpl->tpl_vars['product']->value->specificPrice['reduction']*floatval(100)),$_smarty_tpl);?>
<?php } else { ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('reduction_percent'=>0),$_smarty_tpl);?>
<?php }?><?php if ($_smarty_tpl->tpl_vars['product']->value->specificPrice&&$_smarty_tpl->tpl_vars['product']->value->specificPrice['reduction']&&$_smarty_tpl->tpl_vars['product']->value->specificPrice['reduction_type']=='amount') {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('reduction_price'=>floatval($_smarty_tpl->tpl_vars['product']->value->specificPrice['reduction'])),$_smarty_tpl);?>
<?php } else { ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('reduction_price'=>0),$_smarty_tpl);?>
<?php }?><?php if ($_smarty_tpl->tpl_vars['product']->value->specificPrice&&$_smarty_tpl->tpl_vars['product']->value->specificPrice['price']) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('specific_price'=>floatval($_smarty_tpl->tpl_vars['product']->value->specificPrice['price'])),$_smarty_tpl);?>
<?php } else { ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('specific_price'=>0),$_smarty_tpl);?>
<?php }?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('specific_currency'=>$_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['boolval'][0][0]->boolval(($_smarty_tpl->tpl_vars['product']->value->specificPrice&&$_smarty_tpl->tpl_vars['product']->value->specificPrice['id_currency']))),$_smarty_tpl);?>
 <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('stock_management'=>intval($_smarty_tpl->tpl_vars['PS_STOCK_MANAGEMENT']->value)),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('taxRate'=>floatval($_smarty_tpl->tpl_vars['tax_rate']->value)),$_smarty_tpl);?>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['addJsDef'][0][0]->addJsDef(array('discount_percentage'=>floatval($_smarty_tpl->tpl_vars['discount_percentage']->value)),$_smarty_tpl);?>
<?php $_smarty_tpl->smarty->_tag_stack[] = array('addJsDefL', array('name'=>'doesntExist')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'doesntExist'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php echo smartyTranslate(array('s'=>'This combination does not exist for this product. Please select another combination.','js'=>1),$_smarty_tpl);?>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'doesntExist'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php $_smarty_tpl->smarty->_tag_stack[] = array('addJsDefL', array('name'=>'doesntExistNoMore')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'doesntExistNoMore'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php echo smartyTranslate(array('s'=>'This product is no longer in stock','js'=>1),$_smarty_tpl);?>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'doesntExistNoMore'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php $_smarty_tpl->smarty->_tag_stack[] = array('addJsDefL', array('name'=>'doesntExistNoMoreBut')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'doesntExistNoMoreBut'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php echo smartyTranslate(array('s'=>'with those attributes but is available with others.','js'=>1),$_smarty_tpl);?>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'doesntExistNoMoreBut'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php $_smarty_tpl->smarty->_tag_stack[] = array('addJsDefL', array('name'=>'fieldRequired')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'fieldRequired'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php echo smartyTranslate(array('s'=>'Please fill in all the required fields before saving your customization.','js'=>1),$_smarty_tpl);?>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'fieldRequired'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php $_smarty_tpl->smarty->_tag_stack[] = array('addJsDefL', array('name'=>'uploading_in_progress')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'uploading_in_progress'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php echo smartyTranslate(array('s'=>'Uploading in progress, please be patient.','js'=>1),$_smarty_tpl);?>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'uploading_in_progress'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php $_smarty_tpl->smarty->_tag_stack[] = array('addJsDefL', array('name'=>'product_fileDefaultHtml')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'product_fileDefaultHtml'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php echo smartyTranslate(array('s'=>'No file selected','js'=>1),$_smarty_tpl);?>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'product_fileDefaultHtml'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php $_smarty_tpl->smarty->_tag_stack[] = array('addJsDefL', array('name'=>'product_fileButtonHtml')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'product_fileButtonHtml'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php echo smartyTranslate(array('s'=>'Choose File','js'=>1),$_smarty_tpl);?>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'product_fileButtonHtml'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php $_smarty_tpl->smarty->_tag_stack[] = array('addJsDefL', array('name'=>'discount_percentage_save')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'discount_percentage_save'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php echo smartyTranslate(array('s'=>'Save','js'=>1),$_smarty_tpl);?>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'discount_percentage_save'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php $_smarty_tpl->smarty->_tag_stack[] = array('addJsDefL', array('name'=>'discount_percentage_off')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'discount_percentage_off'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php echo smartyTranslate(array('s'=>'Off','js'=>1),$_smarty_tpl);?>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'discount_percentage_off'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

<?php }?>
<?php }} ?>
