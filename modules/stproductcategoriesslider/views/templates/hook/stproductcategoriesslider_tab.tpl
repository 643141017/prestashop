{*
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
*}

<!-- MODULE Product categories slider -->
{if isset($product_categories) && count($product_categories)}
{if isset($homeverybottom) && $homeverybottom}<div class="wide_container {if $hide_mob} hidden-xs {/if} block"><div class="container">{/if}
<div id="pc_slider_block_{$hook_hash}" class="{if !isset($homeverybottom) || !$homeverybottom} block {/if} section {if $hide_mob} hidden-xs {/if}">
<h3 id="pc_slider_tabs_{$hook_hash}" class="pc_slider_tabs title_block clearfix {if $display_as_grid==1} display_as_grid {elseif $display_as_grid==2} display_as_simple {/if}  {if $title_position} title_block_center {/if}">
    {foreach $product_categories as $p_c}<a href="#carousel_stproductcategoriessldier_{$hook_hash}_{$p_c.id_category}"  rel="nofollow" title="{$p_c.name|escape:'htmlall':'UTF-8'}">{$p_c.name|escape:'htmlall':'UTF-8'}</a>{/foreach}
</h3>
<div id="pc_slider_tabs_contents_{$hook_hash}">
{foreach $product_categories as $p_c}
    <div id="carousel_stproductcategoriessldier_{$hook_hash}_{$p_c.id_category}" class="carousel_stproductcategoriessldier carousel_content">
    <section class="product_categories_slider_block products_block">
        {if isset($p_c.products) AND $p_c.products}
        {if !$display_as_grid}
        <div id="product_categories-itemslider_{$hook_hash}_{$p_c.id_category}" class="products_slider">
        	{include file="$tpl_dir./product-slider.tpl" products=$p_c.products }
    	</div>
        <script type="text/javascript">
        //<![CDATA[
        {literal}
        jQuery(function($) {
            var owl = $("#product_categories-itemslider_{/literal}{$hook_hash}_{$p_c.id_category}{literal} .slides");
            owl.owlCarousel({
                {/literal}
                autoPlay: {if $pro_cate_slideshow}{$pro_cate_s_speed|default:5000}{else}false{/if},
                slideSpeed: {$pro_cate_a_speed},
                stopOnHover: {if $pro_cate_pause_on_hover}true{else}false{/if},
                lazyLoad: {if $lazy_load}true{else}false{/if},
                scrollPerPage: {if $pro_cate_move}true{else}false{/if},
                rewindNav: {if $rewind_nav}true{else}false{/if},
                afterInit: productsSliderAfterInit,
                {if isset($column_slider) && $column_slider}
                singleItem : true,
                navigation: true,
                pagination: false,
                {else}
                navigation: {if $direction_nav}true{else}false{/if},
                pagination: {if $control_nav}true{else}false{/if},
                {literal}
                itemsCustom : [
                    {/literal}
                    {if $sttheme.responsive && !$sttheme.version_switching}
                    {if $sttheme.responsive_max==2}{literal}[1420, {/literal}{$pro_per_xl}{literal}],{/literal}{/if}
                    {if $sttheme.responsive_max>=1}{literal}[1180, {/literal}{$pro_per_lg}{literal}],{/literal}{/if}
                    {literal}
                    [972, {/literal}{$pro_per_md}{literal}],
                    [748, {/literal}{$pro_per_sm}{literal}],
                    [460, {/literal}{$pro_per_xs}{literal}],
                    [0, {/literal}{$pro_per_xxs}{literal}]
                    {/literal}{else}{literal}
                    [0, {/literal}{if $sttheme.responsive_max==2}{$pro_per_xl}{elseif $sttheme.responsive_max==1}{$pro_per_lg}{else}{$pro_per_md}{/if}{literal}]
                    {/literal}
                    {/if}
                    {literal} 
                ]
                {/literal}
                {/if}
                {literal} 
            });
        });
        {/literal} 
        //]]>
        </script>
        {elseif $display_as_grid==2}
            {include file="$tpl_dir./product-list-simple.tpl" products=$p_c.products for_f='pro_cate' id='stproductcategoriesslider_grid'}
        {else}
            {include file="$tpl_dir./product-list.tpl" products=$p_c.products class='stproductcategoriesslider_grid' for_f='pro_cate' id='stproductcategoriesslider_grid'}
        {/if}
    	{else}
    		<p class="warning">{l s='No products' mod='stproductcategoriesslider'}</p>
    	{/if}
    </section>
    </div>
{/foreach}
</div>

<script type="text/javascript">
//<![CDATA[
{literal}
jQuery(function($) {
    $("#pc_slider_tabs_{/literal}{$hook_hash}{literal} a").click(function() {
        $("#pc_slider_tabs_{/literal}{$hook_hash}{literal} a").removeClass("selected");
        $(this).addClass("selected");
        var id_content = $(this).attr("href");
        $(id_content).siblings().hide().end().show();
        return false;        
    });
    $("#pc_slider_tabs_{/literal}{$hook_hash}{literal} a:eq(0)").trigger('click'); 
});
{/literal} 
//]]>
</script>

</div>
{if isset($homeverybottom) && $homeverybottom}</div></div>{/if}
{/if}
<!-- /MODULE Product categories slider -->