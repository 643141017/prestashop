<?php /* Smarty version Smarty-3.1.19, created on 2017-01-04 17:58:26
         compiled from "D:\WWW\prestashop16110\modules\stfeaturedslider\views\templates\hook\stfeaturedslider.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4051586cc742f21777-04198471%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f6c53e661a04130dad432b86ce5aaadabd103472' => 
    array (
      0 => 'D:\\WWW\\prestashop16110\\modules\\stfeaturedslider\\views\\templates\\hook\\stfeaturedslider.tpl',
      1 => 1482908692,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4051586cc742f21777-04198471',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'column_slider' => 0,
    'homeverybottom' => 0,
    'hide_mob' => 0,
    'hook_hash' => 0,
    'display_as_grid' => 0,
    'title_position' => 0,
    'products' => 0,
    'slider_slideshow' => 0,
    'slider_s_speed' => 0,
    'slider_a_speed' => 0,
    'slider_pause_on_hover' => 0,
    'lazy_load' => 0,
    'slider_move' => 0,
    'rewind_nav' => 0,
    'direction_nav' => 0,
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
  'unifunc' => 'content_586cc7430778f6_87275374',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_586cc7430778f6_87275374')) {function content_586cc7430778f6_87275374($_smarty_tpl) {?>

<!-- MODULE Featured Products slider -->
<?php $_smarty_tpl->_capture_stack[0][] = array("column_slider", null, null); ob_start(); ?><?php if (isset($_smarty_tpl->tpl_vars['column_slider']->value)&&$_smarty_tpl->tpl_vars['column_slider']->value) {?>_column<?php }?><?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>
<?php if (isset($_smarty_tpl->tpl_vars['homeverybottom']->value)&&$_smarty_tpl->tpl_vars['homeverybottom']->value) {?><div class="wide_container <?php if ($_smarty_tpl->tpl_vars['hide_mob']->value) {?> hidden-xs <?php }?> block"><div class="container"><?php }?>
<section id="featured_products_sldier_block_center_<?php echo $_smarty_tpl->tpl_vars['hook_hash']->value;?>
<?php echo Smarty::$_smarty_vars['capture']['column_slider'];?>
" class="featured_products_sldier_block_center<?php echo Smarty::$_smarty_vars['capture']['column_slider'];?>
 <?php if (!isset($_smarty_tpl->tpl_vars['homeverybottom']->value)||!$_smarty_tpl->tpl_vars['homeverybottom']->value) {?> block <?php }?> <?php if (isset($_smarty_tpl->tpl_vars['column_slider']->value)&&$_smarty_tpl->tpl_vars['column_slider']->value) {?> column_block <?php }?> products_block section <?php if ($_smarty_tpl->tpl_vars['hide_mob']->value) {?> hidden-xs <?php }?> <?php if ($_smarty_tpl->tpl_vars['display_as_grid']->value==1) {?> display_as_grid <?php } elseif ($_smarty_tpl->tpl_vars['display_as_grid']->value==2) {?> display_as_simple <?php }?>" >
	<h3 class="title_block <?php if ((!isset($_smarty_tpl->tpl_vars['column_slider']->value)||!$_smarty_tpl->tpl_vars['column_slider']->value)&&$_smarty_tpl->tpl_vars['title_position']->value) {?> title_block_center <?php }?>"><span><?php echo smartyTranslate(array('s'=>'Featured Products','mod'=>'stfeaturedslider'),$_smarty_tpl);?>
</span></h3>
	<?php if (isset($_smarty_tpl->tpl_vars['products']->value)&&$_smarty_tpl->tpl_vars['products']->value) {?>
    <?php if (!$_smarty_tpl->tpl_vars['display_as_grid']->value||($_smarty_tpl->tpl_vars['display_as_grid']->value&&isset($_smarty_tpl->tpl_vars['column_slider']->value)&&$_smarty_tpl->tpl_vars['column_slider']->value)) {?>
    <div id="featured-itemslider_<?php echo $_smarty_tpl->tpl_vars['hook_hash']->value;?>
<?php echo Smarty::$_smarty_vars['capture']['column_slider'];?>
" class="featured-itemslider<?php echo Smarty::$_smarty_vars['capture']['column_slider'];?>
 products_slider block_content">
    	<?php if (isset($_smarty_tpl->tpl_vars['column_slider']->value)&&$_smarty_tpl->tpl_vars['column_slider']->value) {?>
    	<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_dir']->value)."./product-slider-list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        <?php } else { ?>
    	<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_dir']->value)."./product-slider.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        <?php }?>
	</div>
    
    <script type="text/javascript">
    //<![CDATA[
    
    jQuery(function($) { 
        var owl = $("#featured-itemslider_<?php echo $_smarty_tpl->tpl_vars['hook_hash']->value;?>
<?php echo Smarty::$_smarty_vars['capture']['column_slider'];?>
 .slides");
        owl.owlCarousel({
            
            autoPlay: <?php if ($_smarty_tpl->tpl_vars['slider_slideshow']->value) {?><?php echo (($tmp = @$_smarty_tpl->tpl_vars['slider_s_speed']->value)===null||$tmp==='' ? 5000 : $tmp);?>
<?php } else { ?>false<?php }?>,
            slideSpeed: <?php echo $_smarty_tpl->tpl_vars['slider_a_speed']->value;?>
,
            stopOnHover: <?php if ($_smarty_tpl->tpl_vars['slider_pause_on_hover']->value) {?>true<?php } else { ?>false<?php }?>,
            lazyLoad: <?php if ($_smarty_tpl->tpl_vars['lazy_load']->value) {?>true<?php } else { ?>false<?php }?>,
            scrollPerPage: <?php if ($_smarty_tpl->tpl_vars['slider_move']->value) {?>true<?php } else { ?>false<?php }?>,
            rewindNav: <?php if ($_smarty_tpl->tpl_vars['rewind_nav']->value) {?>true<?php } else { ?>false<?php }?>,
            afterInit: productsSliderAfterInit,
            <?php if (isset($_smarty_tpl->tpl_vars['column_slider']->value)&&$_smarty_tpl->tpl_vars['column_slider']->value) {?>
            singleItem : true,
            navigation: true,
            pagination: false,
            <?php } else { ?>
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
            
            <?php }?>
             
        });
    });
     
    //]]>
    </script>
    <?php } elseif ($_smarty_tpl->tpl_vars['display_as_grid']->value==2) {?>
        <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_dir']->value)."./product-list-simple.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('products'=>$_smarty_tpl->tpl_vars['products']->value,'for_f'=>'featured','id'=>'homefeatured_grid'), 0);?>

    <?php } else { ?>
        <?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_dir']->value)."./product-list.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('products'=>$_smarty_tpl->tpl_vars['products']->value,'class'=>'homefeatured_grid','for_f'=>'featured','id'=>'homefeatured_grid'), 0);?>

    <?php }?>
	<?php } else { ?>
		<p class="warning"><?php echo smartyTranslate(array('s'=>'No featrued products','mod'=>'stfeaturedslider'),$_smarty_tpl);?>
</p>
	<?php }?>
</section>
<?php if (isset($_smarty_tpl->tpl_vars['homeverybottom']->value)&&$_smarty_tpl->tpl_vars['homeverybottom']->value) {?></div></div><?php }?>
<!-- /MODULE Featured Products slider --><?php }} ?>
