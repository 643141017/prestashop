jQuery(function($){
    $("#rightbar_qrcode_btn").click(function(){
        sidebarRight('qrcode');
        var qr_link = $('#qrcode_box .qrcode_link');
        if(qr_link.find('img').size()==0)
        {
            $('<img/>', {
                src: qr_link.attr('href')
            })
            .load(function() {
                qr_link.find('i').replaceWith($(this));
            });
        }
        return false;
    });
    $('#qrcode-top').die('hover').hover(function(){
        $(this).addClass('open');
        var qr_link = $(this).find('.qrcode_link');
        if(qr_link.find('img').size()==0)
        {
            $('<img/>', {
                src: qr_link.attr('href')
            })
            .load(function() {
                qr_link.find('i').replaceWith($(this));
            });
        }
    },function(){
        $(this).removeClass('open');
    });
});