/*
* 2007-2014 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2014 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/
//global variables
var responsiveflag = false;
var window_width;
var verifMailREGEX = /^([\w+-]+(?:\.[\w+-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/;
var menu_container_top=0;
if(typeof(sticky_option) == 'undefined')
	sticky_option = 0;

$(document).ready(function(){
    window_width = $(window).width();
	$('#to_top_btn').click(function() {
    	$('body,html').animate({
    		scrollTop: 0
    	}, 'fast');
		return false;
    }); 
    to_top_wrap_master($(window).scrollTop() > 300);
	highdpiInit();
	// responsiveResize();
	// $(window).resize(responsiveResize);
	/*if (navigator.userAgent.match(/Android/i))
	{
		var viewport = document.querySelector('meta[name="viewport"]');
		viewport.setAttribute('content', 'initial-scale=1.0,maximum-scale=1.0,user-scalable=0,width=device-width,height=device-height');
		window.scrollTo(0, 1);
	}*/
	// blockHover();
	if (typeof quickView !== 'undefined' && quickView)
		quick_view();
	dropDown();

	if (typeof page_name != 'undefined' && !in_array(page_name, ['index', 'product']))
	{
		bindGrid();

 		$(document).on('change', '.selectProductSort', function(e){
			if (typeof request != 'undefined' && request)
				var requestSortProducts = request;
 			var splitData = $(this).val().split(':');
 			var url = '';
			if (typeof requestSortProducts != 'undefined' && requestSortProducts)
			{
				url += requestSortProducts ;
				if (typeof splitData[0] !== 'undefined' && splitData[0])
				{
					url += ( requestSortProducts.indexOf('?') < 0 ? '?' : '&') + 'orderby=' + splitData[0] + (splitData[1] ? '&orderway=' + splitData[1] : '');
					if (typeof splitData[1] !== 'undefined' && splitData[1])
						url += '&orderway=' + splitData[1];
				}
				document.location.href = url;
			}
    	});

		$(document).on('change', 'select[name="n"]', function(){
			$(this.form).submit();
		});

		$(document).on('change', 'select[name="currency_payment"]', function(){
			setCurrency($(this).val());
		});
	}

	$(document).on('change', 'select[name="manufacturer_list"], select[name="supplier_list"]', function(){
		if (this.value != '')
			location.href = this.value;
	});

	$(document).on('click', '.back', function(e){
		e.preventDefault();
		history.back();
	});

	jQuery.curCSS = jQuery.css;
	if (!!$.prototype.cluetip)
		$('a.cluetip').cluetip({
			local:true,
			cursor: 'pointer',
			dropShadow: false,
			dropShadowSteps: 0,
			showTitle: false,
			tracking: true,
			sticky: false,
			mouseOutClose: true,
			fx: {
		    	open:       'fadeIn',
		    	openSpeed:  'fast'
			}
		}).css('opacity', 0.8);

	if (!!$.prototype.fancybox)
		$.extend($.fancybox.defaults.tpl, {
			closeBtn : '<a title="' + FancyboxI18nClose + '" class="fancybox-item fancybox-close" href="javascript:;"></a>',
			next     : '<a title="' + FancyboxI18nNext + '" class="fancybox-nav fancybox-next" href="javascript:;"><span></span></a>',
			prev     : '<a title="' + FancyboxI18nPrev + '" class="fancybox-nav fancybox-prev" href="javascript:;"><span></span></a>'
		});
	$('#st-pusher-after,.close_right_side,.side_continue,#st-content-inner-after').click(function(){
		resetSlidebar();
	});
	/*
	if($('body').hasClass('animation_enabled'))
		$('.st_animate').waypoint(function () {
		        var animation = $(this).data('animation');
		        animation = animation ? animation : 'fadeInUp';
		        $(this).addClass('animated').addClass(animation);
	    	},{
		        triggerOnce: true,
		        offset: '60%'
	    });
	*/
    if(sticky_option && $('#'+(sticky_option==2 ? 'header_primary' : 'st_mega_menu_container')).size())
    {
        menu_container_top = $('#'+(sticky_option==2 ? 'header_primary' : 'st_mega_menu_container')).offset().top;
        sticky_menu();
    }
    $('#footer .opener,.product_accordion .opener').click(function(){
        $(this).parent().toggleClass('open');
        return false;
    }); 
    $('#switch_left_column,#switch_right_column').click(function(){
        var column = $(this).attr('data-column');
        var that_left_column = $('#'+column);
        if(!that_left_column.size())
        {
            $(this).hide();
            return false;
        }
        var opened = $('#'+column).hasClass('opened');
        //
    	resetSlidebar();
        
        if(!opened){
	        $('#'+column).addClass('opened');
	        $(this).addClass('active');
	        $('.st-container').addClass('open_column');
        }
        return false;
    });
    $('.version_switching').click(function(){
        $.getJSON(baseDir+'modules/stthemeeditor/stthemeeditor-ajax.php?action=version_switching&vs='+($(this).hasClass('vs_desktop') ? 1 : 0)+'&_ts='+new Date().getTime(),
            function(json){
                if(json.r)
                    window.location.reload(true);
            }
        ); 
        return false;
    });
    // Close Alert messages
	$(".alert.alert-danger").on('click', this, function(e){
		if (e.offsetX >= 16 && e.offsetX <= 39 && e.offsetY >= 16 && e.offsetY <= 34)
			$(this).fadeOut();
	});
});

$(window).scroll(function() {
    to_top_wrap_master($(this).scrollTop() > 300);
    sticky_menu();
});
$(window).resize(function() {
    window_width = $(window).width();
    if(sticky_option)
        sticky_menu();
});
function sticky_menu()
{    
    if(!$.isNumeric(menu_container_top) || !sticky_option)
        return false;
        
    if(window_width<992)
    {
        $((sticky_option==2 || sticky_option==4) ? '#header_primary' : '#st_mega_menu_container,#search_block_main_menu').removeClass('sticky fadeInDownLarge');
        $('.header-container').removeClass('has_sticky');
        return false;
    }
    var c_window_scroll_top = $(window).scrollTop();
    var header_container_dom = $('.header-container');
    if (c_window_scroll_top > menu_container_top && !header_container_dom.hasClass('has_sticky')){
        $((sticky_option==2 || sticky_option==4) ? '#header_primary' : '#st_mega_menu_container,#search_block_main_menu').addClass('sticky '+(sticky_option==3 || sticky_option==4 ? 'fadeInDownLarge' : ''));
        header_container_dom.addClass('has_sticky');
    } 
    else if(c_window_scroll_top < menu_container_top && header_container_dom.hasClass('has_sticky')){
        $((sticky_option==2 || sticky_option==4) ? '#header_primary' : '#st_mega_menu_container,#search_block_main_menu').removeClass('sticky fadeInDownLarge');
        header_container_dom.removeClass('has_sticky');    	
    }
    return false;
}

function to_top_wrap_master($statu)
{
    if($statu)
        $('#to_top_wrap .icon_wrap').removeClass('disabled');
    else
       $('#to_top_wrap .icon_wrap').addClass('disabled'); 
}
function highdpiInit()
{
	if(typeof st_retina !== 'undefined' && st_retina && isRetina())
	{
		var els = $("img.replace-2x").get();
		var img = new Array();
		for(var i = 0; i < els.length; i++)
		{
			var src = els[i].src;
			if(!src)
				continue;
			if (els[i].getAttribute('data-2x')) 
				src_2x = els[i].getAttribute('data-2x');
			else
				src_2x = src.replace(/\/(\d+)\-(\w+)\_default([\.\/])/i, "/$1-$2_default_2x$3");

			if(src_2x==src)
				continue;
			
			img[i] = new Image();
			img[i].setAttribute('title',i);
			img[i].setAttribute('rel',src_2x);
			img[i].onload = (function() {
				if (this.height != 0)
					els[this.getAttribute('title')].src = this.getAttribute('rel');
			});
			img[i].src = src_2x;
		}
	}
}
var isRetina = function(){
    var root = (typeof exports === 'undefined' ? window : exports);
    var mediaQuery = '(-webkit-min-device-pixel-ratio: 1.5), (min--moz-device-pixel-ratio: 1.5), (-o-min-device-pixel-ratio: 3/2), (min-resolution: 1.5dppx)';

    if (root.devicePixelRatio > 1) {
        return true;
    }

    if (root.matchMedia && root.matchMedia(mediaQuery).matches) {
        return true;
    }

    return false;
};


// Used to compensante Chrome/Safari bug (they don't care about scroll bar for width)
function scrollCompensate()
{
    var inner = document.createElement('p');
    inner.style.width = "100%";
    inner.style.height = "200px";

    var outer = document.createElement('div');
    outer.style.position = "absolute";
    outer.style.top = "0px";
    outer.style.left = "0px";
    outer.style.visibility = "hidden";
    outer.style.width = "200px";
    outer.style.height = "150px";
    outer.style.overflow = "hidden";
    outer.appendChild(inner);

    document.body.appendChild(outer);
    var w1 = inner.offsetWidth;
    outer.style.overflow = 'scroll';
    var w2 = inner.offsetWidth;
    if (w1 == w2) w2 = outer.clientWidth;

    document.body.removeChild(outer);

    return (w1 - w2);
}

function responsiveResize()
{
	compensante = scrollCompensate();
	if (($(window).width()+scrollCompensate()) <= 767 && responsiveflag == false)
	{
		// accordion('enable');
	    // accordionFooter('enable');
		responsiveflag = true;	
	}
	else if (($(window).width()+scrollCompensate()) >= 768)
	{
		// accordion('disable');
		// accordionFooter('disable');
	    responsiveflag = false;
	}
	blockHover();
}

function blockHover(status)
{
	var screenLg = $('body').find('.container').width() == 1170;

	if ($('.product_list').is('.grid'))
		if (screenLg)
			$('.product_list .button-container').hide();
		else
			$('.product_list .button-container').show();

	$(document).off('mouseenter').on('mouseenter', '.product_list.grid li.ajax_block_product .product-container', function(e){
		if (screenLg)
		{
			var pcHeight = $(this).parent().outerHeight();
			var pcPHeight = $(this).parent().find('.button-container').outerHeight() + $(this).parent().find('.comments_note').outerHeight() + $(this).parent().find('.functional-buttons').outerHeight();
			$(this).parent().addClass('hovered').css({'height':pcHeight + pcPHeight, 'margin-bottom':pcPHeight * (-1)});
			$(this).find('.button-container').show();
		}
	});

	$(document).off('mouseleave').on('mouseleave', '.product_list.grid li.ajax_block_product .product-container', function(e){
		if (screenLg)
		{
			$(this).parent().removeClass('hovered').css({'height':'auto', 'margin-bottom':'0'});
			$(this).find('.button-container').hide();
		}
	});
}

function quick_view()
{
	$(document).on('click', '.quick-view:visible, .quick-view-mobile:visible', function(e)
	{
		quickViewCaller = this;
		
		e.preventDefault();
		var url = this.rel;
		var anchor = '';

		if (url.indexOf('#') != -1)
		{
			anchor = url.substring(url.indexOf('#'), url.length);
			url = url.substring(0, url.indexOf('#'));
		}

		if (url.indexOf('?') != -1)
			url += '&';
		else
			url += '?';

		if (!!$.prototype.fancybox)
			$.fancybox({
				'padding':  0,
				'width':    1087,
				'height':   610,
				'type':     'iframe',
				'href':     url + 'content_only=1' + anchor
			});
	});
}

function bindGrid()
{
	var view = $.totalStorage('display');
	if(!view && $('ul.product_list').length==1)
	{
		var default_view = $.trim($('ul.product_list').attr('data-default-view'));
		if(default_view=='grid')view='grid';
		if(default_view=='list')view='list';
	}

	if (view && view != 'grid')
		display(view);
	else
		$('.content_sortPagiBar .display').find('li.grid').addClass('selected');
	
	$(document).on('click', '.content_sortPagiBar .display .grid', function(e){
		e.preventDefault();
		display('grid');
	});

	$(document).on('click', '.content_sortPagiBar .display .list', function(e){
		e.preventDefault();
		display('list');
	});
}

function display(view)
{
	if (view == 'list')
	{
		var classnames = $('ul.product_list').removeClass('grid row').addClass('list').attr('data-classnames');
		$('.product_list > li').removeClass(classnames).addClass('col-xs-12 clearfix');
		
		$('.content_sortPagiBar .display').find('li.list').addClass('selected');
		$('.content_sortPagiBar .display').find('li.grid').removeClass('selected');
		$.totalStorage('display', 'list');
	}
	else 
	{
		var classnames = $('ul.product_list').removeClass('list').addClass('grid row').attr('data-classnames');
		$('.product_list > li').removeClass('col-xs-12 clearfix').addClass(classnames);
		
		$('.content_sortPagiBar .display').find('li.grid').addClass('selected');
		$('.content_sortPagiBar .display').find('li.list').removeClass('selected');
		$.totalStorage('display', 'grid');
	}	
}


function accordionFooter(status)
{
	if(status == 'enable')
	{
		$('#footer .footer-block h4').on('click', function(){
			$(this).toggleClass('active').parent().find('.toggle-footer').stop().slideToggle('medium');
		})
		$('#footer').addClass('accordion').find('.toggle-footer').slideUp('fast');
	}
	else
	{
		$('.footer-block h4').removeClass('active').off().parent().find('.toggle-footer').removeAttr('style').slideDown('fast');
		$('#footer').removeClass('accordion');
	}
}

function accordion(status)
{
	leftColumnBlocks = $('#left_column');
	if(status == 'enable')
	{
		var accordion_selector = '#right_column .block .title_block, #left_column .block .title_block, #left_column #newsletter_block_left h4,' +
								'#left_column .shopping_cart > a:first-child, #right_column .shopping_cart > a:first-child';

		$(accordion_selector).on('click', function(e){
			$(this).toggleClass('active').parent().find('.block_content').stop().slideToggle('medium');
		});
		$('#right_column, #left_column').addClass('accordion').find('.block .block_content').slideUp('fast');
		if (typeof(ajaxCart) !== 'undefined')
			ajaxCart.collapse();
	}
	else
	{
		$('#right_column .block .title_block, #left_column .block .title_block, #left_column #newsletter_block_left h4').removeClass('active').off().parent().find('.block_content').removeAttr('style').slideDown('fast');
		$('#left_column, #right_column').removeClass('accordion');
	}
}

function dropDown() 
{
	$('.dropdown_wrap').hover(function(){
		$(this).addClass('open');
    },function(){
        $(this).removeClass('open');
    });
}

function isPlaceholer(){
    var input = document.createElement('input');
    return "placeholder" in input;
} 
var resetSlidebar = function(){
	$('.st-container').removeClass('open_products_compared open_products_cart open_stmobilemenu open_qrcode open_search open_viewed open_column');
	$('#left_column,#right_column').removeClass('opened');
    $('#switch_left_column,#switch_right_column').removeClass('active');
	// $('body').removeClass('side_bar_opened');
	return false;
};
var sidebarRight = function(id){
	var st_container_dom = $('.st-container');
	if(st_container_dom.hasClass('open_'+id))
		resetSlidebar();
	else
	{
		resetSlidebar();
		$('.st-container').addClass('open_'+id);
		if(!st_is_mobile_device)
			$('#side_'+id+' .divscroll').perfectScrollbar();
	}
	// $('body').addClass('side_bar_opened');
	return false;
};
function productsSliderAfterInit(el){
	el.removeClass('remove_after_init');
}