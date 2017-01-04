<div class="col-xs-12 col-sm-6 banner_col">
    <div id="banner_box_{$banners[0]['id_st_banner']}" class="banner_box banner_box_0">
        {if isset($banners[0]) && isset($banners[0]['image_multi_lang']) && $banners[0]['image_multi_lang']}
            {include file="./stbanner-box.tpl" banner_data=$banners[0]}
        {/if}
    </div>
</div>
<div class="col-xs-12 col-sm-6 banner_col">
    <div class="row">
        <div class="col-xs-12 col-sm-12 banner_col">
            <div id="banner_box_{$banners[1]['id_st_banner']}" class="banner_box banner_box_1">
                {if isset($banners[1]) && isset($banners[1]['image_multi_lang']) && $banners[1]['image_multi_lang']}
                    {include file="./stbanner-box.tpl" banner_data=$banners[1]}
                {/if}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xxs-12 col-xs-6 col-sm-6 banner_col">
            <div id="banner_box_{$banners[2]['id_st_banner']}" class="banner_box banner_box_2">
                {if isset($banners[2]) && isset($banners[2]['image_multi_lang']) && $banners[2]['image_multi_lang']}
                    {include file="./stbanner-box.tpl" banner_data=$banners[2]}
                {/if}                
            </div>
        </div>
        <div class="col-xxs-12 col-xs-6 col-sm-6 banner_col">
            <div id="banner_box_{$banners[3]['id_st_banner']}" class="banner_box banner_box_3">
                {if isset($banners[3]) && isset($banners[3]['image_multi_lang']) && $banners[3]['image_multi_lang']}
                    {include file="./stbanner-box.tpl" banner_data=$banners[3]}
                {/if}                
            </div>
        </div>
    </div>
</div>