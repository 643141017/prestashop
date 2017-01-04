jQuery(function($){
    var stmenu_down_timer;
    function megaHoverOver(){
        $(this).addClass('current');
        if($(this).find('.stmenu_sub').children().size())
        {
		    var stmenu_sub_dom = $(this).find(".stmenu_sub");
            stmenu_sub_dom.stop();
            stmenu_down_timer = setTimeout(function(){
                stmenu_sub_dom.fadeIn('fast',function(){
    		      stmenu_sub_dom.css('overflow','visible');
    		    });
            },100);
        }
	}
    function megaHoverOut(){ 
        clearTimeout(stmenu_down_timer);
        $(this).removeClass('current');
        $(this).find(".stmenu_sub").stop().hide(); 
    }
    $(".ml_level_0").hoverIntent({    
		 sensitivity: 7, 
		 interval: 0, 
		 over: megaHoverOver,
		 timeout: 0,
		 out: megaHoverOut
	});
    
    $('#st_mobile_menu .mo_mu_level_0,#st_mega_menu_column_mobile .mo_mu_level_0').accordion();

    if(('ontouchstart' in document.documentElement || window.navigator.msMaxTouchPoints))
    {
        $(".ma_level_0").click(function(e){
            var ml_level_0 = $(this).parent();
            if(ml_level_0.find('.stmenu_sub').children().size())
            {
                if(!ml_level_0.hasClass('ma_touched'))
                {
                    $(".ml_level_0").removeClass('ma_touched');
                    ml_level_0.addClass('ma_touched');
                    return false;
                }
                else
                    ml_level_0.removeClass('ma_touched');
            }
        });
        $('.stmenu_sub .has_children').click(function(e){
            if(!$(this).hasClass('item_touched'))
            {
                $(".stmenu_sub .menu_touched").removeClass('item_touched');
                $(this).addClass('item_touched');
                return false;
            }
            else
                $(this).removeClass('item_touched');
        });
    }

    $("#rightbar_menu_tri,#mobile_bar_menu_tri").click(function(){
        sidebarRight('stmobilemenu');
        return false;
    });
});