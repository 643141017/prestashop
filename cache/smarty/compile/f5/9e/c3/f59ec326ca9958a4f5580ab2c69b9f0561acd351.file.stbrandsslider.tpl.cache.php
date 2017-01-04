<?php /* Smarty version Smarty-3.1.19, created on 2017-01-04 17:58:27
         compiled from "D:\WWW\prestashop16110\modules\stbrandsslider\views\templates\hook\stbrandsslider.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13765586cc7435421f5-33233801%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f59ec326ca9958a4f5580ab2c69b9f0561acd351' => 
    array (
      0 => 'D:\\WWW\\prestashop16110\\modules\\stbrandsslider\\views\\templates\\hook\\stbrandsslider.tpl',
      1 => 1482908692,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13765586cc7435421f5-33233801',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'brands' => 0,
    'homeverybottom' => 0,
    'hook_hash' => 0,
    'display_title' => 0,
    'link' => 0,
    'direction_nav' => 0,
    'brand' => 0,
    'img_manu_dir' => 0,
    'manufacturerSize' => 0,
    'brand_slider_slideshow' => 0,
    'brand_slider_s_speed' => 0,
    'brand_slider_a_speed' => 0,
    'brand_slider_pause_on_hover' => 0,
    'lazy_load' => 0,
    'brand_slider_move' => 0,
    'brand_slider_rewind_nav' => 0,
    'control_nav' => 0,
    'sttheme' => 0,
    'pro_per_xl' => 0,
    'pro_per_lg' => 0,
    'pro_per_md' => 0,
    'pro_per_sm' => 0,
    'pro_per_xs' => 0,
    'pro_per_xxs' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_586cc7435cad75_04114270',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_586cc7435cad75_04114270')) {function content_586cc7435cad75_04114270($_smarty_tpl) {?>
<!-- Block brands slider module -->
<?php if (isset($_smarty_tpl->tpl_vars['brands']->value)&&count($_smarty_tpl->tpl_vars['brands']->value)) {?>
<?php if (isset($_smarty_tpl->tpl_vars['homeverybottom']->value)&&$_smarty_tpl->tpl_vars['homeverybottom']->value) {?><div class="wide_container"><div class="container"><?php }?>
<section id="brands_slider_<?php echo $_smarty_tpl->tpl_vars['hook_hash']->value;?>
" class="brands_slider block section">
    <?php if ($_smarty_tpl->tpl_vars['display_title']->value) {?>
        <h3 class="title_block  <?php if ($_smarty_tpl->tpl_vars['display_title']->value==2) {?> title_block_center <?php }?>"><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('manufacturer'), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'Product Brands','mod'=>'stbrandsslider'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'Product Brands','mod'=>'stbrandsslider'),$_smarty_tpl);?>
</a></h3>
    <?php }?>
    <div id="brands-itemslider-<?php echo $_smarty_tpl->tpl_vars['hook_hash']->value;?>
" class="brands-itemslider products_slider">
        <div class="slides <?php if ($_smarty_tpl->tpl_vars['direction_nav']->value>1||!$_smarty_tpl->tpl_vars['display_title']->value) {?> owl-navigation-lr <?php if ($_smarty_tpl->tpl_vars['direction_nav']->value==4) {?> owl-navigation-circle <?php } else { ?> owl-navigation-rectangle <?php }?> <?php } elseif ($_smarty_tpl->tpl_vars['direction_nav']->value==1) {?> owl-navigation-tr<?php }?>">
        	<?php  $_smarty_tpl->tpl_vars['brand'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['brand']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['brands']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['brand']->key => $_smarty_tpl->tpl_vars['brand']->value) {
$_smarty_tpl->tpl_vars['brand']->_loop = true;
?>
            <div class="brands_slider_wrap">
            	<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getmanufacturerLink($_smarty_tpl->tpl_vars['brand']->value['id_manufacturer'],$_smarty_tpl->tpl_vars['brand']->value['link_rewrite']);?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['brand']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
" class="brands_slider_item">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['img_manu_dir']->value;?>
<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['brand']->value['id_manufacturer'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
-manufacturer_default.jpg" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['brand']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
" width="<?php echo $_smarty_tpl->tpl_vars['manufacturerSize']->value['width'];?>
" height="<?php echo $_smarty_tpl->tpl_vars['manufacturerSize']->value['height'];?>
" class="replace-2x img-responsive" />
                </a>
            </div>
            <?php } ?>
        </div>
    </div>
</section>

<script type="text/javascript">
//<![CDATA[

jQuery(function($) {
    var owl = $("#brands-itemslider-<?php echo $_smarty_tpl->tpl_vars['hook_hash']->value;?>
 .slides");
    owl.owlCarousel({
        
        autoPlay: <?php if ($_smarty_tpl->tpl_vars['brand_slider_slideshow']->value) {?><?php echo (($tmp = @$_smarty_tpl->tpl_vars['brand_slider_s_speed']->value)===null||$tmp==='' ? 5000 : $tmp);?>
<?php } else { ?>false<?php }?>,
        slideSpeed: <?php echo $_smarty_tpl->tpl_vars['brand_slider_a_speed']->value;?>
,
        stopOnHover: <?php if ($_smarty_tpl->tpl_vars['brand_slider_pause_on_hover']->value) {?>true<?php } else { ?>false<?php }?>,
        lazyLoad: <?php if ($_smarty_tpl->tpl_vars['lazy_load']->value) {?>true<?php } else { ?>false<?php }?>,
        scrollPerPage: <?php if ($_smarty_tpl->tpl_vars['brand_slider_move']->value) {?>1<?php } else { ?>false<?php }?>,
        rewindNav: <?php if ($_smarty_tpl->tpl_vars['brand_slider_rewind_nav']->value) {?>true<?php } else { ?>false<?php }?>,
        navigation: <?php if ($_smarty_tpl->tpl_vars['direction_nav']->value) {?>true<?php } else { ?>false<?php }?>,
        pagination: <?php if ($_smarty_tpl->tpl_vars['control_nav']->value) {?>true<?php } else { ?>false<?php }?>,
        
        itemsCustom : [
            
            <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['responsive']&&!$_smarty_tpl->tpl_vars['sttheme']->value['version_switching']) {?>
            <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['responsive_max']==2) {?>[1420, <?php echo $_smarty_tpl->tpl_vars['pro_per_xl']->value;?>
],<?php }?>
            <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['responsive_max']>=1) {?>[1180, <?php echo $_smarty_tpl->tpl_vars['pro_per_lg']->value;?>
],<?php }?>
            
            [972, <?php echo $_smarty_tpl->tpl_vars['pro_per_md']->value;?>
],
            [748, <?php echo $_smarty_tpl->tpl_vars['pro_per_sm']->value;?>
],
            [460, <?php echo $_smarty_tpl->tpl_vars['pro_per_xs']->value;?>
],
            [0, <?php echo $_smarty_tpl->tpl_vars['pro_per_xxs']->value;?>
]
            <?php } else { ?>
            [0, <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['responsive_max']==2) {?><?php echo $_smarty_tpl->tpl_vars['pro_per_xl']->value;?>
<?php } elseif ($_smarty_tpl->tpl_vars['sttheme']->value['responsive_max']==1) {?><?php echo $_smarty_tpl->tpl_vars['pro_per_lg']->value;?>
<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['pro_per_md']->value;?>
<?php }?>]
            
            <?php }?>
             
        ]
    });
});
 
//]]>
</script>
<?php if (isset($_smarty_tpl->tpl_vars['homeverybottom']->value)&&$_smarty_tpl->tpl_vars['homeverybottom']->value) {?></div></div><?php }?>
<?php }?>
<!-- /Block brands slider module --><?php }} ?>
