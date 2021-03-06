{if isset($slide['slide']) && count($slide['slide'])}
<div class = 'sliderContainer block'>
<div id="iosSlider_{$slide.id_st_iosslider_group}" class="iosSlider fullscreen_default {if $slide['hide_on_mobile']} hidden-xs {/if} ">
    <div class="slider clearfix">
        {assign var="selectorsBlock" value=""}
        {if $slide.height}
            {assign var="slideheight" value=$slide.height}
        {else}
            {assign var="slideheight" value=500}
        {/if}
        {foreach $slide['slide'] as $banner}
            <div id="iosSliderBanner_{$banner.id_st_iosslider}" style="height:{$slideheight}px;" class="iosSliderBanner_{$banner.id_st_iosslider} iosSlideritem">
                <div class="iosSliderBanner_image"  style="background-image:url('{$banner.image_multi_lang}');"></div>
                {if $banner.description || ($banner.url && $banner.button)}
                <div class="{if isset($is_full_width) && $is_full_width} container {else} container_flex {/if}">
                    {if $banner.text_position=='center_center' || $banner.text_position=='center_bottom' || $banner.text_position=='center_top'}
                        {assign var="css_lr" value=floor((100-$banner.text_width)/2)}
                    {else}
                        {assign var="css_lr" value=0}
                    {/if}
                    <div class="iosSlider_text animated iosSlider_{$banner.text_position|default:'left_center'} {if $banner.text_align==2} text-center {elseif $banner.text_align==3} text-right {else} text-left {/if} {if $banner.hide_text_on_mobile} hidden-xs {/if}" style="{if $banner.text_width>0 && $banner.text_width<=80}width:{$banner.text_width}%;{/if}{if $css_lr}left:{$css_lr}%;right:{$css_lr}%;{/if}" data-animate="{$banner.text_animation_name|default:'fadeIn'}">
						{if $banner.description}<div class="iosSlider_text_con style_content clearfix">{$banner.description}</div>{/if}
                        {if $banner.url}
                            <a href="{$banner.url|escape:'html'}" target="{if $banner.new_window}_blank{else}_self{/if}" title="{$banner.button|escape:'html':'UTF-8'|default:"{l s='Details' mod='stiosslider'}"}" class="btn btn-medium iosslider_btn">{$banner.button|escape:'html':'UTF-8'|default:"{l s='Details' mod='stiosslider'}"}</a>
                        {/if}
                    </div>
                </div>
                {/if}
			</div>
            {if !$banner@index}
                {$selectorsBlock = $selectorsBlock|cat:'<a class="selectoritem first selected" href="javascript:;"><span></span></a>'}
            {else}
                {$selectorsBlock = $selectorsBlock|cat:'<a class="selectoritem" href="javascript:;"><span></span></a>'}
            {/if}
        {/foreach}
    </div>
    {if $slide.prev_next}
	<div id="iosSliderPrev_{$slide.id_st_iosslider_group}" class="iosSlider_prev {if $slide.prev_next==2 || $slide.prev_next==4} hidden-xs {/if} {if $slide.prev_next==3 || $slide.prev_next==4} showonhover {/if} {if $slide.prev_next_style==1} ios_pn_rectangle {elseif $slide.prev_next_style==2} ios_pn_circle {/if}"><i class="icon-left-open-3"></i></div>
	<div id="iosSliderNext_{$slide.id_st_iosslider_group}" class="iosSlider_next {if $slide.prev_next==2 || $slide.prev_next==4} hidden-xs {/if} {if $slide.prev_next==3 || $slide.prev_next==4} showonhover {/if} {if $slide.prev_next_style==1} ios_pn_rectangle {elseif $slide.prev_next_style==2} ios_pn_circle {/if}"><i class="icon-right-open-3"></i></div>
    {/if}
    {if $slide.pag_nav}
	<div id="iosSlider_selectors_{$slide.id_st_iosslider_group}" class="iosSlider_selectors iosSlider_selectors_{if $slide.pag_nav==1 || $slide.pag_nav==2}round{else if $slide.pag_nav==2 || $slide.pag_nav==4}square{/if} {if $slide.pag_nav==2 || $slide.pag_nav==4} hidden-xs {/if}">
		{$selectorsBlock}
	</div>
    {/if}
    <div class="css3loader css3loader-3"></div>
</div>
</div>
<script type="text/javascript">
//<![CDATA[
{literal}
    jQuery(function($){
		$('#iosSlider_{/literal}{$slide.id_st_iosslider_group}{literal}').find('.iosSlideritem').height(jQuery(window).height()>{/literal}{$slideheight}{literal} ? jQuery(window).height() : {/literal}{$slideheight}{literal}).end().iosSlider({
			{/literal}
            desktopClickDrag: {if $slide.desktopClickDrag}true{else}false{/if},
            infiniteSlider: {if $slide.infiniteSlider}true{else}false{/if},
			scrollbar: {if $slide.scrollbar}true{else}false{/if},
			autoSlide: {if $slide.auto_advance}true{else}false{/if},
			autoSlideTimer: {$slide.time|default:5000},
			autoSlideTransTimer: {$slide.trans_period|default:750},
			autoSlideHoverPause: {if $slide.pause}true{else}false{/if},
            {if $slide.prev_next}
            {literal}
			navNextSelector: $('#iosSliderNext_{/literal}{$slide.id_st_iosslider_group}{literal}'),
			navPrevSelector: $('#iosSliderPrev_{/literal}{$slide.id_st_iosslider_group}{literal}'),
            {/literal}
            {/if}
            {if $slide.pag_nav}
            navSlideSelector: '#iosSlider_selectors_{$slide.id_st_iosslider_group} .selectoritem',
            {/if}
            {literal}
			onSliderLoaded: sliderLoaded_{/literal}{$slide.id_st_iosslider_group}{literal},
			onSlideChange: slideChange_{/literal}{$slide.id_st_iosslider_group}{literal},
			snapToChildren: true
		});
	});
    if(!$('body').hasClass('mobile_device'))
    {
        $(window).scroll(function() {
            $('#iosSlider_{/literal}{$slide.id_st_iosslider_group}{literal}').css({
                'top' : window.pageYOffset/2
            });
            $('#iosSlider_{/literal}{$slide.id_st_iosslider_group}{literal} .iosSlider_text_con').css({
                'opacity' : 1/window.pageYOffset*100
            });
        });
    }
    function slideChange_{/literal}{$slide.id_st_iosslider_group}{literal}(args) {
        $(args.sliderContainerObject).find('.iosSlideritem').removeClass('current');
        $(args.currentSlideObject).addClass('current');
        
        var slide_height = $(args.currentSlideObject).outerHeight();
        $(args.sliderContainerObject).css('min-height',slide_height);
        $(args.sliderContainerObject).css('height','auto');
       
        $(args.sliderContainerObject).find('.iosSlider_text').each(function(){
            $(this).removeClass($(this).attr('data-animate'));
        });
        $(args.currentSlideObject).find('.iosSlider_text').addClass($(args.currentSlideObject).find('.iosSlider_text').attr('data-animate'));
        
        {/literal}{if $slide.pag_nav}{literal}
		$('#iosSlider_selectors_{/literal}{$slide.id_st_iosslider_group}{literal} .selectoritem').removeClass('selected');
		$('#iosSlider_selectors_{/literal}{$slide.id_st_iosslider_group}{literal} .selectoritem:eq(' + (args.currentSlideNumber - 1) + ')').addClass('selected');
        {/literal}{/if}{literal}
	}
    	
	function sliderLoaded_{/literal}{$slide.id_st_iosslider_group}{literal}(args) {
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

        if($('#header .banner #iosSlider_{/literal}{$slide.id_st_iosslider_group}{literal}').size() && typeof(sticky_option)!='undefined' && typeof(menu_container_top)!='undefined' && $('#'+(sticky_option==2 ? 'header_primary' : 'st_mega_menu_container')).size())
            menu_container_top = $('#'+(sticky_option==2 ? 'header_primary' : 'st_mega_menu_container')).offset().top;
	}
{/literal} 
//]]>
</script>
{/if}