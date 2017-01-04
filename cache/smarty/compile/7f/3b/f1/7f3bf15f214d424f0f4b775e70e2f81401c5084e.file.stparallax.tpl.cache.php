<?php /* Smarty version Smarty-3.1.19, created on 2017-01-04 17:58:26
         compiled from "D:\WWW\prestashop16110\modules\stparallax\views\templates\hook\stparallax.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16632586cc742a241f3-56141002%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7f3bf15f214d424f0f4b775e70e2f81401c5084e' => 
    array (
      0 => 'D:\\WWW\\prestashop16110\\modules\\stparallax\\views\\templates\\hook\\stparallax.tpl',
      1 => 1482908693,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16632586cc742a241f3-56141002',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'slide_group' => 0,
    'slide' => 0,
    'banner' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_586cc742ab0bf9_18663375',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_586cc742ab0bf9_18663375')) {function content_586cc742ab0bf9_18663375($_smarty_tpl) {?><!-- MODULE stparallax -->
<?php if (isset($_smarty_tpl->tpl_vars['slide_group']->value)) {?>
    <?php  $_smarty_tpl->tpl_vars['slide'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['slide']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['slide_group']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['slide']->key => $_smarty_tpl->tpl_vars['slide']->value) {
$_smarty_tpl->tpl_vars['slide']->_loop = true;
?>
        <?php if (isset($_smarty_tpl->tpl_vars['slide']->value['slide'])&&count($_smarty_tpl->tpl_vars['slide']->value['slide'])) {?>
        <div id="parallax_box_<?php echo $_smarty_tpl->tpl_vars['slide']->value['id_st_parallax_group'];?>
" class="owl_carousel_wrap parallax_box full_container block <?php if ($_smarty_tpl->tpl_vars['slide']->value['bg_img']) {?> parallax_box_img <?php }?> <?php if ($_smarty_tpl->tpl_vars['slide']->value['hide_on_mobile']) {?> hidden-xs <?php }?> <?php if (isset($_smarty_tpl->tpl_vars['slide']->value['background_style'])&&$_smarty_tpl->tpl_vars['slide']->value['background_style']) {?> parallax_video_box <?php }?>" >
            <?php if (isset($_smarty_tpl->tpl_vars['slide']->value['background_style'])&&$_smarty_tpl->tpl_vars['slide']->value['background_style']) {?>
            <div class="parallax_video_wrap <?php if ($_smarty_tpl->tpl_vars['slide']->value['play']) {?> play_when_in_viewport<?php }?>">
                <?php if ($_smarty_tpl->tpl_vars['slide']->value['background_style']==1) {?>
                    <video autoplay <?php if ($_smarty_tpl->tpl_vars['slide']->value['loop']) {?> loop<?php }?><?php if ($_smarty_tpl->tpl_vars['slide']->value['muted']) {?> muted<?php }?> class="parallax_video">
                      <?php if ($_smarty_tpl->tpl_vars['slide']->value['mpfour']) {?><source src="<?php echo $_smarty_tpl->tpl_vars['slide']->value['mpfour'];?>
" type="video/mp4"><?php }?>
                      <?php if ($_smarty_tpl->tpl_vars['slide']->value['webm']) {?><source src="<?php echo $_smarty_tpl->tpl_vars['slide']->value['webm'];?>
" type="video/webm"><?php }?>
                      <?php if ($_smarty_tpl->tpl_vars['slide']->value['ogg']) {?><source src="<?php echo $_smarty_tpl->tpl_vars['slide']->value['ogg'];?>
" type="video/ogg"><?php }?>
                    </video>
                    <?php if ($_smarty_tpl->tpl_vars['slide']->value['play']) {?>
                        <span class="parallax_video_play" data-play-or-pause=""><i></i></span>
                    <?php }?>
                <?php } elseif ($_smarty_tpl->tpl_vars['slide']->value['background_style']==2) {?>
                <?php }?>
            </div>
            <?php }?>
            <div class="container">
            <?php if ($_smarty_tpl->tpl_vars['slide']->value['title']) {?><h3 class="parallax_heading"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['slide']->value['title'], ENT_QUOTES, 'UTF-8', true);?>
</h3><?php }?>
            <div id="owl-parallax-<?php echo $_smarty_tpl->tpl_vars['slide']->value['id_st_parallax_group'];?>
" class="<?php if (count($_smarty_tpl->tpl_vars['slide']->value['slide'])>1) {?> owl-carousel owl-theme owl-navigation-lr <?php if ($_smarty_tpl->tpl_vars['slide']->value['prev_next']==2) {?> owl-navigation-rectangle <?php } elseif ($_smarty_tpl->tpl_vars['slide']->value['prev_next']==3) {?> owl-navigation-circle <?php }?><?php }?>">
                <?php  $_smarty_tpl->tpl_vars['banner'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['banner']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['slide']->value['slide']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['banner']->key => $_smarty_tpl->tpl_vars['banner']->value) {
$_smarty_tpl->tpl_vars['banner']->_loop = true;
?>
                    <?php if ($_smarty_tpl->tpl_vars['banner']->value['description']) {?>
                        <div id="parallax_text_con_<?php echo $_smarty_tpl->tpl_vars['banner']->value['id_st_parallax'];?>
" class="container parallax_text_con parallax_text_con_<?php echo $_smarty_tpl->tpl_vars['banner']->value['id_st_parallax'];?>
">
                            <div class="style_content <?php if ($_smarty_tpl->tpl_vars['banner']->value['text_align']==2) {?> text-center <?php } elseif ($_smarty_tpl->tpl_vars['banner']->value['text_align']==3) {?> text-right <?php } else { ?> text-left <?php }?> <?php if ($_smarty_tpl->tpl_vars['banner']->value['width']) {?> center_width_<?php echo $_smarty_tpl->tpl_vars['banner']->value['width'];?>
 <?php }?>">
                                <?php echo $_smarty_tpl->tpl_vars['banner']->value['description'];?>

                            </div>
                        </div>
                    <?php }?>
                <?php } ?>
            </div>
            </div>
        </div>
        <script type="text/javascript">
        //<![CDATA[
        
            jQuery(function($){
                <?php if ($_smarty_tpl->tpl_vars['slide']->value['bg_img']) {?>
                $('#parallax_box_<?php echo $_smarty_tpl->tpl_vars['slide']->value['id_st_parallax_group'];?>
').parallax("50%", <?php echo floatval($_smarty_tpl->tpl_vars['slide']->value['speed']);?>
);
                <?php }?>

                <?php if (count($_smarty_tpl->tpl_vars['slide']->value['slide'])>1) {?>
                $("#owl-parallax-<?php echo $_smarty_tpl->tpl_vars['slide']->value['id_st_parallax_group'];?>
").owlCarousel({
                    
                    autoPlay : <?php if ($_smarty_tpl->tpl_vars['slide']->value['auto_advance']) {?><?php echo (($tmp = @$_smarty_tpl->tpl_vars['slide']->value['time'])===null||$tmp==='' ? 5000 : $tmp);?>
<?php } else { ?>false<?php }?>,
                    navigation: <?php if ($_smarty_tpl->tpl_vars['slide']->value['prev_next']) {?>true<?php } else { ?>false<?php }?>,
                    pagination: <?php if ($_smarty_tpl->tpl_vars['slide']->value['pag_nav']) {?>true<?php } else { ?>false<?php }?>,
                    paginationSpeed : 1000,
                    goToFirstSpeed : 2000,
                    singleItem : true,
                    autoHeight : <?php if ($_smarty_tpl->tpl_vars['slide']->value['autoHeight']) {?>true<?php } else { ?>false<?php }?>,
                    slideSpeed: <?php echo (($tmp = @$_smarty_tpl->tpl_vars['slide']->value['trans_period'])===null||$tmp==='' ? 200 : $tmp);?>
,
                    stopOnHover: <?php if ($_smarty_tpl->tpl_vars['slide']->value['pause']) {?>true<?php } else { ?>false<?php }?>,
                    mouseDrag: <?php if ($_smarty_tpl->tpl_vars['slide']->value['desktopClickDrag']) {?>true<?php } else { ?>false<?php }?>,
                    transitionStyle:"fade"
                    
                });
                <?php }?>
            });
         
        //]]>
        </script>
        <?php }?>
    <?php } ?>
<?php }?>
<!--/ MODULE stparallax --><?php }} ?>
