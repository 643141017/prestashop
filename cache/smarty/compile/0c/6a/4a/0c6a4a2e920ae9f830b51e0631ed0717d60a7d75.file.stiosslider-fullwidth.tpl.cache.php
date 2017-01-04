<?php /* Smarty version Smarty-3.1.19, created on 2017-01-04 17:58:26
         compiled from "D:\WWW\prestashop16110\modules\stiosslider\views\templates\hook\stiosslider-fullwidth.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20318586cc7422fc170-89685924%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0c6a4a2e920ae9f830b51e0631ed0717d60a7d75' => 
    array (
      0 => 'D:\\WWW\\prestashop16110\\modules\\stiosslider\\views\\templates\\hook\\stiosslider-fullwidth.tpl',
      1 => 1482908692,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20318586cc7422fc170-89685924',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'slide' => 0,
    'banner' => 0,
    'is_full_width' => 0,
    'css_lr' => 0,
    'selectorsBlock' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_586cc7423dabf0_98342268',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_586cc7423dabf0_98342268')) {function content_586cc7423dabf0_98342268($_smarty_tpl) {?><?php if (isset($_smarty_tpl->tpl_vars['slide']->value['slide'])&&count($_smarty_tpl->tpl_vars['slide']->value['slide'])) {?>
<?php if ($_smarty_tpl->tpl_vars['slide']->value['location']==14) {?><div class="iosslider_wide_container wide_container iosslider_wide_container <?php if ($_smarty_tpl->tpl_vars['slide']->value['hide_on_mobile']) {?> hidden-xs <?php }?> "><div class="container"><?php }?>
<div id="iosSlider_<?php echo $_smarty_tpl->tpl_vars['slide']->value['id_st_iosslider_group'];?>
" class="iosSlider fullwidth_default block <?php if ($_smarty_tpl->tpl_vars['slide']->value['location']!=14&&$_smarty_tpl->tpl_vars['slide']->value['hide_on_mobile']) {?> hidden-xs <?php }?> ">
    <div class="slider clearfix">
        <?php $_smarty_tpl->tpl_vars["selectorsBlock"] = new Smarty_variable('', null, 0);?>
        <?php  $_smarty_tpl->tpl_vars['banner'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['banner']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['slide']->value['slide']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['banner']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['banner']->key => $_smarty_tpl->tpl_vars['banner']->value) {
$_smarty_tpl->tpl_vars['banner']->_loop = true;
 $_smarty_tpl->tpl_vars['banner']->index++;
?>
            <div id="iosSliderBanner_<?php echo $_smarty_tpl->tpl_vars['banner']->value['id_st_iosslider'];?>
" style="height:<?php if ($_smarty_tpl->tpl_vars['slide']->value['height']) {?><?php echo $_smarty_tpl->tpl_vars['slide']->value['height'];?>
<?php } else { ?>500<?php }?>px;" class="iosSliderBanner_<?php echo $_smarty_tpl->tpl_vars['banner']->value['id_st_iosslider'];?>
 iosSlideritem">
                <div class="iosSliderBanner_image"  style="background-image:url('<?php echo $_smarty_tpl->tpl_vars['banner']->value['image_multi_lang'];?>
');"></div>
                <?php if ($_smarty_tpl->tpl_vars['banner']->value['description']||($_smarty_tpl->tpl_vars['banner']->value['url']&&$_smarty_tpl->tpl_vars['banner']->value['button'])) {?>
                <div class="<?php if (isset($_smarty_tpl->tpl_vars['is_full_width']->value)&&$_smarty_tpl->tpl_vars['is_full_width']->value) {?> container <?php } else { ?> container_flex <?php }?>">
                    <?php if ($_smarty_tpl->tpl_vars['banner']->value['text_position']=='center_center'||$_smarty_tpl->tpl_vars['banner']->value['text_position']=='center_bottom'||$_smarty_tpl->tpl_vars['banner']->value['text_position']=='center_top') {?>
                        <?php $_smarty_tpl->tpl_vars["css_lr"] = new Smarty_variable(floor((100-$_smarty_tpl->tpl_vars['banner']->value['text_width'])/2), null, 0);?>
                    <?php } else { ?>
                        <?php $_smarty_tpl->tpl_vars["css_lr"] = new Smarty_variable(0, null, 0);?>
                    <?php }?>
                    <div class="iosSlider_text animated iosSlider_<?php echo (($tmp = @$_smarty_tpl->tpl_vars['banner']->value['text_position'])===null||$tmp==='' ? 'left_center' : $tmp);?>
 <?php if ($_smarty_tpl->tpl_vars['banner']->value['text_align']==2) {?> text-center <?php } elseif ($_smarty_tpl->tpl_vars['banner']->value['text_align']==3) {?> text-right <?php } else { ?> text-left <?php }?> <?php if ($_smarty_tpl->tpl_vars['banner']->value['hide_text_on_mobile']) {?> hidden-xs <?php }?>" style="<?php if ($_smarty_tpl->tpl_vars['banner']->value['text_width']>0&&$_smarty_tpl->tpl_vars['banner']->value['text_width']<=80) {?>width:<?php echo $_smarty_tpl->tpl_vars['banner']->value['text_width'];?>
%;<?php }?><?php if ($_smarty_tpl->tpl_vars['css_lr']->value) {?>left:<?php echo $_smarty_tpl->tpl_vars['css_lr']->value;?>
%;right:<?php echo $_smarty_tpl->tpl_vars['css_lr']->value;?>
%;<?php }?>" data-animate="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['banner']->value['text_animation_name'])===null||$tmp==='' ? 'fadeIn' : $tmp);?>
">
						<?php if ($_smarty_tpl->tpl_vars['banner']->value['description']) {?><div class="iosSlider_text_con style_content clearfix"><?php echo $_smarty_tpl->tpl_vars['banner']->value['description'];?>
</div><?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['banner']->value['url']) {?>
                            <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['banner']->value['url'], ENT_QUOTES, 'UTF-8', true);?>
" target="<?php if ($_smarty_tpl->tpl_vars['banner']->value['new_window']) {?>_blank<?php } else { ?>_self<?php }?>" title="<?php ob_start();?><?php echo smartyTranslate(array('s'=>'Details','mod'=>'stiosslider'),$_smarty_tpl);?>
<?php $_tmp10=ob_get_clean();?><?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['banner']->value['button'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? $_tmp10 : $tmp);?>
" class="btn btn-medium iosslider_btn"><?php ob_start();?><?php echo smartyTranslate(array('s'=>'Details','mod'=>'stiosslider'),$_smarty_tpl);?>
<?php $_tmp11=ob_get_clean();?><?php echo (($tmp = @htmlspecialchars($_smarty_tpl->tpl_vars['banner']->value['button'], ENT_QUOTES, 'UTF-8', true))===null||$tmp==='' ? $_tmp11 : $tmp);?>
</a>
                        <?php }?>
                    </div>
                </div>
                <?php }?>
			</div>
            <?php if (!$_smarty_tpl->tpl_vars['banner']->index) {?>
                <?php $_smarty_tpl->tpl_vars['selectorsBlock'] = new Smarty_variable(($_smarty_tpl->tpl_vars['selectorsBlock']->value).('<a class="selectoritem first selected" href="javascript:;"><span></span></a>'), null, 0);?>
            <?php } else { ?>
                <?php $_smarty_tpl->tpl_vars['selectorsBlock'] = new Smarty_variable(($_smarty_tpl->tpl_vars['selectorsBlock']->value).('<a class="selectoritem" href="javascript:;"><span></span></a>'), null, 0);?>
            <?php }?>
        <?php } ?>
    </div>
    <?php if ($_smarty_tpl->tpl_vars['slide']->value['prev_next']) {?>
	<div id="iosSliderPrev_<?php echo $_smarty_tpl->tpl_vars['slide']->value['id_st_iosslider_group'];?>
" class="iosSlider_prev <?php if ($_smarty_tpl->tpl_vars['slide']->value['prev_next']==2||$_smarty_tpl->tpl_vars['slide']->value['prev_next']==4) {?> hidden-xs <?php }?> <?php if ($_smarty_tpl->tpl_vars['slide']->value['prev_next']==3||$_smarty_tpl->tpl_vars['slide']->value['prev_next']==4) {?> showonhover <?php }?> <?php if ($_smarty_tpl->tpl_vars['slide']->value['prev_next_style']==1) {?> ios_pn_rectangle <?php } elseif ($_smarty_tpl->tpl_vars['slide']->value['prev_next_style']==2) {?> ios_pn_circle <?php }?>"><i class="icon-left-open-3"></i></div>
	<div id="iosSliderNext_<?php echo $_smarty_tpl->tpl_vars['slide']->value['id_st_iosslider_group'];?>
" class="iosSlider_next <?php if ($_smarty_tpl->tpl_vars['slide']->value['prev_next']==2||$_smarty_tpl->tpl_vars['slide']->value['prev_next']==4) {?> hidden-xs <?php }?> <?php if ($_smarty_tpl->tpl_vars['slide']->value['prev_next']==3||$_smarty_tpl->tpl_vars['slide']->value['prev_next']==4) {?> showonhover <?php }?> <?php if ($_smarty_tpl->tpl_vars['slide']->value['prev_next_style']==1) {?> ios_pn_rectangle <?php } elseif ($_smarty_tpl->tpl_vars['slide']->value['prev_next_style']==2) {?> ios_pn_circle <?php }?>"><i class="icon-right-open-3"></i></div>
    <?php }?>
    <?php if ($_smarty_tpl->tpl_vars['slide']->value['pag_nav']) {?>
	<div id="iosSlider_selectors_<?php echo $_smarty_tpl->tpl_vars['slide']->value['id_st_iosslider_group'];?>
" class="iosSlider_selectors iosSlider_selectors_<?php if ($_smarty_tpl->tpl_vars['slide']->value['pag_nav']==1||$_smarty_tpl->tpl_vars['slide']->value['pag_nav']==2) {?>round<?php } elseif ($_smarty_tpl->tpl_vars['slide']->value['pag_nav']==2||$_smarty_tpl->tpl_vars['slide']->value['pag_nav']==4) {?>square<?php }?> <?php if ($_smarty_tpl->tpl_vars['slide']->value['pag_nav']==2||$_smarty_tpl->tpl_vars['slide']->value['pag_nav']==4) {?> hidden-xs <?php }?>">
		<?php echo $_smarty_tpl->tpl_vars['selectorsBlock']->value;?>

	</div>
    <?php }?>
    <div class="css3loader css3loader-3"></div>
</div>

<?php if ($_smarty_tpl->tpl_vars['slide']->value['location']==14) {?></div></div><?php }?>
<script type="text/javascript">
//<![CDATA[

    jQuery(function($){
		$('#iosSlider_<?php echo $_smarty_tpl->tpl_vars['slide']->value['id_st_iosslider_group'];?>
').iosSlider({
			
            desktopClickDrag: <?php if ($_smarty_tpl->tpl_vars['slide']->value['desktopClickDrag']) {?>true<?php } else { ?>false<?php }?>,
            infiniteSlider: <?php if ($_smarty_tpl->tpl_vars['slide']->value['infiniteSlider']) {?>true<?php } else { ?>false<?php }?>,
			scrollbar: <?php if ($_smarty_tpl->tpl_vars['slide']->value['scrollbar']) {?>true<?php } else { ?>false<?php }?>,
			autoSlide: <?php if ($_smarty_tpl->tpl_vars['slide']->value['auto_advance']) {?>true<?php } else { ?>false<?php }?>,
			autoSlideTimer: <?php echo (($tmp = @$_smarty_tpl->tpl_vars['slide']->value['time'])===null||$tmp==='' ? 5000 : $tmp);?>
,
			autoSlideTransTimer: <?php echo (($tmp = @$_smarty_tpl->tpl_vars['slide']->value['trans_period'])===null||$tmp==='' ? 750 : $tmp);?>
,
			autoSlideHoverPause: <?php if ($_smarty_tpl->tpl_vars['slide']->value['pause']) {?>true<?php } else { ?>false<?php }?>,
            <?php if ($_smarty_tpl->tpl_vars['slide']->value['prev_next']) {?>
            
			navNextSelector: $('#iosSliderNext_<?php echo $_smarty_tpl->tpl_vars['slide']->value['id_st_iosslider_group'];?>
'),
			navPrevSelector: $('#iosSliderPrev_<?php echo $_smarty_tpl->tpl_vars['slide']->value['id_st_iosslider_group'];?>
'),
            
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['slide']->value['pag_nav']) {?>
            navSlideSelector: '#iosSlider_selectors_<?php echo $_smarty_tpl->tpl_vars['slide']->value['id_st_iosslider_group'];?>
 .selectoritem',
            <?php }?>
            
			onSliderLoaded: sliderLoaded_<?php echo $_smarty_tpl->tpl_vars['slide']->value['id_st_iosslider_group'];?>
,
			onSlideChange: slideChange_<?php echo $_smarty_tpl->tpl_vars['slide']->value['id_st_iosslider_group'];?>
,
			snapToChildren: true
		});
	});
    function slideChange_<?php echo $_smarty_tpl->tpl_vars['slide']->value['id_st_iosslider_group'];?>
(args) {
        $(args.sliderContainerObject).find('.iosSlideritem').removeClass('current');
        $(args.currentSlideObject).addClass('current');
        
        var slide_height = $(args.currentSlideObject).outerHeight();
        $(args.sliderContainerObject).css('min-height',slide_height);
        $(args.sliderContainerObject).css('height','auto');
       
        $(args.sliderContainerObject).find('.iosSlider_text').each(function(){
            $(this).removeClass($(this).attr('data-animate'));
        });
        $(args.currentSlideObject).find('.iosSlider_text').addClass($(args.currentSlideObject).find('.iosSlider_text').attr('data-animate'));
        
        <?php if ($_smarty_tpl->tpl_vars['slide']->value['pag_nav']) {?>
		$('#iosSlider_selectors_<?php echo $_smarty_tpl->tpl_vars['slide']->value['id_st_iosslider_group'];?>
 .selectoritem').removeClass('selected');
		$('#iosSlider_selectors_<?php echo $_smarty_tpl->tpl_vars['slide']->value['id_st_iosslider_group'];?>
 .selectoritem:eq(' + (args.currentSlideNumber - 1) + ')').addClass('selected');
        <?php }?>
	}
    	
	function sliderLoaded_<?php echo $_smarty_tpl->tpl_vars['slide']->value['id_st_iosslider_group'];?>
(args) {
        $(args.sliderContainerObject).find('.css3loader').fadeOut();
        $(args.currentSlideObject).addClass('current');
        
        var slide_height = $(args.currentSlideObject).outerHeight();
        $(args.sliderContainerObject).css('min-height',slide_height);
        $(args.sliderContainerObject).css('height','auto');
        
        $(args.sliderContainerObject).find('.iosSlider_center_center,.iosSlider_left_center,.iosSlider_right_center').each(function(){
            $(this).css('margin-bottom',-($(this).outerHeight()/2).toFixed(3)); 
        });
        
        $(args.sliderContainerObject).find('.iosSlider_selectors,.iosSlider_prev,.iosSlider_next').fadeIn();

        $(args.currentSlideObject).find('.iosSlider_text').addClass($(args.currentSlideObject).find('.iosSlider_text').attr('data-animate'));
	}
 
//]]>
</script>
<?php }?><?php }} ?>
