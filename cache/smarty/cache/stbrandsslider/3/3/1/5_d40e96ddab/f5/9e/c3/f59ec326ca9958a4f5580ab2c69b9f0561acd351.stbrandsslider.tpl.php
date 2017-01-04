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
  'unifunc' => 'content_586cc7435d68f3_33806133',
  'cache_lifetime' => 31536000,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_586cc7435d68f3_33806133')) {function content_586cc7435d68f3_33806133($_smarty_tpl) {?><!-- Block brands slider module -->
<section id="brands_slider_d40e96ddab" class="brands_slider block section">
        <div id="brands-itemslider-d40e96ddab" class="brands-itemslider products_slider">
        <div class="slides  owl-navigation-lr  owl-navigation-rectangle  ">
        	            <div class="brands_slider_wrap">
            	<a href="http://test.prestashop16110.com/zh/1_fashion-manufacturer" title="Fashion Manufacturer" class="brands_slider_item">
                    <img src="http://test.prestashop16110.com/img/m/1-manufacturer_default.jpg" alt="Fashion Manufacturer" width="169" height="104" class="replace-2x img-responsive" />
                </a>
            </div>
                    </div>
    </div>
</section>

<script type="text/javascript">
//<![CDATA[

jQuery(function($) {
    var owl = $("#brands-itemslider-d40e96ddab .slides");
    owl.owlCarousel({
        
        autoPlay: false,
        slideSpeed: 400,
        stopOnHover: true,
        lazyLoad: true,
        scrollPerPage: false,
        rewindNav: false,
        navigation: true,
        pagination: false,
        
        itemsCustom : [
            
                                    [1180, 7],            
            [972, 6],
            [748, 5],
            [460, 3],
            [0, 2]
                         
        ]
    });
});
 
//]]>
</script>
<!-- /Block brands slider module --><?php }} ?>
