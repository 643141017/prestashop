<!-- MODULE st banner column -->
{if isset($columns_data)}
    <div class="row">
        {foreach $columns_data as $column}
            {if ( isset($column['columns']) && count($column['columns']) ) || ( isset($column['banners']) && count($column['banners']) )}
                <div id="banner_box_{$column['id_st_banner_group']}" class="col-sm-{$column['width']} banner_col {if isset($column['banner_b']) && $column['banner_b']} banner_b{/if} {if $column['hide_on_mobile']} hidden-xs {/if}" data-height="{$column['height']}" >
                    {if isset($column['banners']) && count($column['banners'])}
                        {include file="./stbanner-block.tpl" banner_data=$column['banners'][0] banner_height=$column['height_px']}
                    {else}
                        {include file="./stbanner-column.tpl" columns_data=$column['columns']}
                    {/if}
                </div>
            {/if}
        {/foreach}        
    </div>
{/if}
<!--/ MODULE st banner column-->