<?php /*%%SmartyHeaderCode:16537586cc7422d5075-01050055%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '04aff24c59631a3a9e3c97d4c3e6df8370c498df' => 
    array (
      0 => 'D:\\WWW\\prestashop16110\\modules\\stiosslider\\views\\templates\\hook\\stiosslider.tpl',
      1 => 1482908692,
      2 => 'file',
    ),
    '0c6a4a2e920ae9f830b51e0631ed0717d60a7d75' => 
    array (
      0 => 'D:\\WWW\\prestashop16110\\modules\\stiosslider\\views\\templates\\hook\\stiosslider-fullwidth.tpl',
      1 => 1482908692,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16537586cc7422d5075-01050055',
  'variables' => 
  array (
    'slide_group' => 0,
    'google_font_links' => 0,
    'slide' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_586cc7423ea5f9_89038586',
  'cache_lifetime' => 31536000,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_586cc7423ea5f9_89038586')) {function content_586cc7423ea5f9_89038586($_smarty_tpl) {?><!-- MODULE stiossldier -->
                            <div id="iosSlider_1" class="iosSlider fullwidth_default block  ">
    <div class="slider clearfix">
                            <div id="iosSliderBanner_1" style="height:600px;" class="iosSliderBanner_1 iosSlideritem">
                <div class="iosSliderBanner_image"  style="background-image:url('http://test.prestashop16110.com/modules/stiosslider/views/img/sample_1.jpg');"></div>
                                <div class=" container_flex ">
                                                                                    <div class="iosSlider_text animated iosSlider_center_center  text-center  " style="width:80%;left:10%;right:10%;" data-animate="fadeInUp">
						<div class="iosSlider_text_con style_content clearfix"><h2 class="closer" style="font-family:Vollkorn;">CREATIVE THEME</h2><div class="spacer"> </div><p class="center_width_60 color_ccc">Panda theme is a modern, clean and professional Prestashop theme, it comes with a lot of useful features. Panda theme is fully responsive, it looks stunning on all types of screens and devices.</p><div class="spacer"> </div><h4 class="icon_line icon_line_big" style="font-family:Vollkorn;">MODERN &amp; CLEAN</h4><div class="spacer"> </div><div><a class="btn btn-medium last" title="By this theme" href="#">BY THIS THEME</a></div></div>                                            </div>
                </div>
                			</div>
                                                            <div id="iosSliderBanner_2" style="height:600px;" class="iosSliderBanner_2 iosSlideritem">
                <div class="iosSliderBanner_image"  style="background-image:url('http://test.prestashop16110.com/modules/stiosslider/views/img/sample_2.jpg');"></div>
                                <div class=" container_flex ">
                                                                                    <div class="iosSlider_text animated iosSlider_center_center  text-center  " style="width:60%;left:20%;right:20%;" data-animate="flipInY">
						<div class="iosSlider_text_con style_content clearfix"><h2 class="closer" style="font-family:Vollkorn;">CHECK OUT</h2><h2 class="closer" style="font-family:Vollkorn;">OUR NEW BRANDS</h2><h6>Here you will find our brands that offer the latest in fashion</h6></div>                                            </div>
                </div>
                			</div>
                                                    </div>
    	<div id="iosSliderPrev_1" class="iosSlider_prev  hidden-xs   showonhover  "><i class="icon-left-open-3"></i></div>
	<div id="iosSliderNext_1" class="iosSlider_next  hidden-xs   showonhover  "><i class="icon-right-open-3"></i></div>
        	<div id="iosSlider_selectors_1" class="iosSlider_selectors iosSlider_selectors_round ">
		<a class="selectoritem first selected" href="javascript:;"><span></span></a><a class="selectoritem" href="javascript:;"><span></span></a>
	</div>
        <div class="css3loader css3loader-3"></div>
</div>

<script type="text/javascript">
//<![CDATA[

    jQuery(function($){
		$('#iosSlider_1').iosSlider({
			
            desktopClickDrag: false,
            infiniteSlider: true,
			scrollbar: false,
			autoSlide: true,
			autoSlideTimer: 7000,
			autoSlideTransTimer: 400,
			autoSlideHoverPause: true,
                        
			navNextSelector: $('#iosSliderNext_1'),
			navPrevSelector: $('#iosSliderPrev_1'),
            
                                    navSlideSelector: '#iosSlider_selectors_1 .selectoritem',
                        
			onSliderLoaded: sliderLoaded_1,
			onSlideChange: slideChange_1,
			snapToChildren: true
		});
	});
    function slideChange_1(args) {
        $(args.sliderContainerObject).find('.iosSlideritem').removeClass('current');
        $(args.currentSlideObject).addClass('current');
        
        var slide_height = $(args.currentSlideObject).outerHeight();
        $(args.sliderContainerObject).css('min-height',slide_height);
        $(args.sliderContainerObject).css('height','auto');
       
        $(args.sliderContainerObject).find('.iosSlider_text').each(function(){
            $(this).removeClass($(this).attr('data-animate'));
        });
        $(args.currentSlideObject).find('.iosSlider_text').addClass($(args.currentSlideObject).find('.iosSlider_text').attr('data-animate'));
        
        		$('#iosSlider_selectors_1 .selectoritem').removeClass('selected');
		$('#iosSlider_selectors_1 .selectoritem:eq(' + (args.currentSlideNumber - 1) + ')').addClass('selected');
        	}
    	
	function sliderLoaded_1(args) {
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

            <!--/ MODULE stiossldier --><?php }} ?>
