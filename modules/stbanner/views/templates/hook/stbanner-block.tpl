{if $banner_data['url']}
    <a id="st_banner_block_{$banner_data['id_st_banner']}" href="{$banner_data['url']|escape:'html'}" class="st_banner_block_{$banner_data['id_st_banner']} st_banner_block" target="{if $banner_data['new_window']}_blank{else}_self{/if}" title="{$banner_data['title']|escape:'htmlall':'UTF-8'}" style="height:{$banner_height}px;">
{else}
    <div id="st_banner_block_{$banner_data['id_st_banner']}" class="st_banner_block_{$banner_data['id_st_banner']} st_banner_block" style="height:{$banner_height}px;">
{/if}
    <div class="st_banner_image" style="{if isset($banner_data['image_multi_lang']) && $banner_data['image_multi_lang']}background-image:url({$banner_data['image_multi_lang']});{/if}{if isset($banner_data['bg_color']) && $banner_data['bg_color']}background-color:{$banner_data['bg_color']};{/if}"></div>
{if $banner_data['description']}
    <div class="banner_text text_table_wrap {if $banner_data.hide_text_on_mobile} hidden-xs {/if}">
        <div class="text_table">
            <div class="text_td style_content {if $banner_data.text_align==1} text-left {elseif $banner_data.text_align==3} text-right {else} text-center {/if} banner_text_{$banner_data.text_position|default:'center'}">
                {if $banner_data['description']}{$banner_data['description']}{/if}
            </div>
        </div>
    </div>
{/if}
{if $banner_data['url']}
    </a>
{else}
    </div>
{/if}