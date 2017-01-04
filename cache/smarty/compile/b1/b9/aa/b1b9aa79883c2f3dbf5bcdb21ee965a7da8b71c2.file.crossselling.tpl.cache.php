<?php /* Smarty version Smarty-3.1.19, created on 2017-01-04 18:00:11
         compiled from "D:\WWW\prestashop16110\themes\panda\modules\crossselling\crossselling.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19856586cc7ab9a71f6-94460656%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b1b9aa79883c2f3dbf5bcdb21ee965a7da8b71c2' => 
    array (
      0 => 'D:\\WWW\\prestashop16110\\themes\\panda\\modules\\crossselling\\crossselling.tpl',
      1 => 1482908691,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19856586cc7ab9a71f6-94460656',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'orderProducts' => 0,
    'page_name' => 0,
    'cs_direction_nav' => 0,
    'new_sticker' => 0,
    'product' => 0,
    'sale_sticker' => 0,
    'PS_CATALOG_MODE' => 0,
    'static_token' => 0,
    'link' => 0,
    'st_display_add_to_cart' => 0,
    'fly_i' => 0,
    'flyout_buttons' => 0,
    'flyout_buttons_on_mobile' => 0,
    'sttheme' => 0,
    'length_of_product_name' => 0,
    'crossDisplayPrice' => 0,
    'restricted_country_mode' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_586cc7aba81df9_24234331',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_586cc7aba81df9_24234331')) {function content_586cc7aba81df9_24234331($_smarty_tpl) {?>
<?php if (isset($_smarty_tpl->tpl_vars['orderProducts']->value)&&count($_smarty_tpl->tpl_vars['orderProducts']->value)) {?>
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
<?php $_smarty_tpl->tpl_vars['new_sticker'] = new Smarty_variable(Configuration::get('STSN_NEW_STYLE'), null, 0);?>
<?php $_smarty_tpl->tpl_vars['sale_sticker'] = new Smarty_variable(Configuration::get('STSN_SALE_STYLE'), null, 0);?>
<?php $_smarty_tpl->tpl_vars['st_display_add_to_cart'] = new Smarty_variable(Configuration::get('STSN_DISPLAY_ADD_TO_CART'), null, 0);?>
<?php $_smarty_tpl->tpl_vars['flyout_buttons'] = new Smarty_variable(Configuration::get('STSN_FLYOUT_BUTTONS'), null, 0);?>
<?php $_smarty_tpl->tpl_vars['flyout_buttons_on_mobile'] = new Smarty_variable(Configuration::get('STSN_FLYOUT_BUTTONS_ON_MOBILE'), null, 0);?>
<section id="crossselling-products_block_center" class="block products_block section">
    <h3 class="title_block <?php if (Configuration::get('STSN_CS_TITLE')) {?> title_block_center <?php }?>">
        <span>
        <?php if ($_smarty_tpl->tpl_vars['page_name']->value=='product') {?>
            <?php echo smartyTranslate(array('s'=>'Customers who bought this product also bought:','mod'=>'crossselling'),$_smarty_tpl);?>

        <?php } else { ?>
            <?php echo smartyTranslate(array('s'=>'We recommend','mod'=>'crossselling'),$_smarty_tpl);?>

        <?php }?>
        </span>
    </h3>
    <?php $_smarty_tpl->tpl_vars['cs_direction_nav'] = new Smarty_variable(Configuration::get('STSN_CS_DIRECTION_NAV'), null, 0);?>
	<div id="crossselling-itemslider" class="products_slider">
            <div class="slides remove_after_init <?php if ($_smarty_tpl->tpl_vars['cs_direction_nav']->value>1) {?> owl-navigation-lr <?php if ($_smarty_tpl->tpl_vars['cs_direction_nav']->value==4) {?> owl-navigation-circle <?php } else { ?> owl-navigation-rectangle <?php }?> <?php } elseif ($_smarty_tpl->tpl_vars['cs_direction_nav']->value==1) {?> owl-navigation-tr<?php }?>">
                <?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['orderProducts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
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
                            <?php if ($_smarty_tpl->tpl_vars['new_sticker']->value!=2&&isset($_smarty_tpl->tpl_vars['product']->value['new'])&&$_smarty_tpl->tpl_vars['product']->value['new']==1) {?><span class="new"><i><?php echo smartyTranslate(array('s'=>'New','mod'=>'crossselling'),$_smarty_tpl);?>
</i></span><?php }?><?php if ($_smarty_tpl->tpl_vars['sale_sticker']->value!=2&&isset($_smarty_tpl->tpl_vars['product']->value['on_sale'])&&$_smarty_tpl->tpl_vars['product']->value['on_sale']&&isset($_smarty_tpl->tpl_vars['product']->value['show_price'])&&$_smarty_tpl->tpl_vars['product']->value['show_price']&&!$_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value) {?><span class="on_sale"><i><?php echo smartyTranslate(array('s'=>'Sale','mod'=>'crossselling'),$_smarty_tpl);?>
</i></span><?php }?>
                        <?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
                        <?php $_smarty_tpl->_capture_stack[0][] = array("pro_a_cart", null, null); ob_start(); ?>
                            <?php if (!$_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value&&($_smarty_tpl->tpl_vars['product']->value['allow_oosp']||$_smarty_tpl->tpl_vars['product']->value['quantity']>0)) {?>
                                <a class="ajax_add_to_cart_button btn btn-default" href="<?php ob_start();?><?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product']);?>
<?php $_tmp2=ob_get_clean();?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('cart',true,null,"qty=1&amp;id_product=".$_tmp2."&amp;token=".((string)$_smarty_tpl->tpl_vars['static_token']->value)."&amp;add"), ENT_QUOTES, 'UTF-8', true);?>
" rel="nofollow" title="<?php echo smartyTranslate(array('s'=>'Add to cart','mod'=>'crossselling'),$_smarty_tpl);?>
" data-id-product="<?php echo intval($_smarty_tpl->tpl_vars['product']->value['id_product']);?>
"><div><i class="icon-glyph icon_btn icon-small icon-mar-lr2"></i><span><?php echo smartyTranslate(array('s'=>'Add to cart','mod'=>'crossselling'),$_smarty_tpl);?>
</span></div></a>
                            <?php }?>
                        <?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
                        <div class="pro_first_box" itemprop="isRelatedTo" itemscope itemtype="http://schema.org/Product">
                            <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['link'], ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
" class="product_image"><img itemprop="image" src="<?php echo $_smarty_tpl->tpl_vars['product']->value['image'];?>
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
                        <p itemprop="name" class="s_title_block <?php if (isset($_smarty_tpl->tpl_vars['sttheme']->value['length_of_product_name'])&&$_smarty_tpl->tpl_vars['sttheme']->value['length_of_product_name']) {?> nohidden <?php }?>"><a itemprop="url" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['link'], ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
"><?php if (isset($_smarty_tpl->tpl_vars['sttheme']->value['length_of_product_name'])&&$_smarty_tpl->tpl_vars['sttheme']->value['length_of_product_name']==2) {?><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<?php } else { ?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['truncate'][0][0]->smarty_modifier_truncate(mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8'),$_smarty_tpl->tpl_vars['length_of_product_name']->value,'...');?>
<?php }?></a></p>
                        <?php if ($_smarty_tpl->tpl_vars['crossDisplayPrice']->value&&$_smarty_tpl->tpl_vars['product']->value['show_price']==1&&!isset($_smarty_tpl->tpl_vars['restricted_country_mode']->value)&&!$_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value) {?>
                            <div class="price_container">
                                <span class="price"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['product']->value['displayed_price']),$_smarty_tpl);?>
</span>
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
            </div>
    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayAnywhere','function'=>"getCarouselJavascript",'identify'=>'crossselling','mod'=>'stthemeeditor','caller'=>'stthemeeditor'),$_smarty_tpl);?>

</section>
<?php }?>
<?php }} ?>
