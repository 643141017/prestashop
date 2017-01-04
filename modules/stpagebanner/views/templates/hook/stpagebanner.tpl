<!-- MODULE st banner -->
{if isset($banners)}
    {foreach $banners as $banner}
        <div id="page_banner_container_{$banner.id_st_page_banner}" class="banner_container full_container {if $banner['hide_on_mobile']} hidden-xs {/if}">
            <div id="st_page_banner_{$banner.id_st_page_banner}" class="st_banner_row {if $banner['hide_on_mobile']} hidden-xs {/if}{if $banner['hover_effect']} hover_effect_{$banner['hover_effect']} {/if}">
                <div class="row">
                    <div id="page_banner_box_{$banner['id_st_page_banner']}" class="col-sm-12 banner_col">
                        <div id="st_page_banner_block_{$banner['id_st_page_banner']}" class="st_page_banner_block_{$banner['id_st_page_banner']} st_banner_block" style="height:{$banner['banner_height']}px;">
                        <div class="st_banner_image" style="background-image:url({$banner['image_multi_lang']});"></div>
                        {if $banner['description']}
                            <div class="banner_text text_table_wrap {if $banner.hide_text_on_mobile} hidden-xs {/if}">
                                <div class="text_table">
                                    <div class="text_td style_content {if $banner.text_align==1} text-left {elseif $banner.text_align==3} text-right {else} text-center {/if} banner_text_{$banner.text_position|default:'center'}">
                                        {if $banner['description']}{$banner['description']}{/if}
                                    </div>
                                </div>
                            </div>
                        {/if}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    {/foreach}
{/if}
<!--/ MODULE st banner -->