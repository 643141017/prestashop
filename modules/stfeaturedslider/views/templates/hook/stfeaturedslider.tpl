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

<!-- MODULE Featured Products slider -->
{capture name="column_slider"}{if isset($column_slider) && $column_slider}_column{/if}{/capture}
{if isset($homeverybottom) && $homeverybottom}<div class="wide_container {if $hide_mob} hidden-xs {/if} block"><div class="container">{/if}
<section id="featured_products_sldier_block_center_{$hook_hash}{$smarty.capture.column_slider}" class="featured_products_sldier_block_center{$smarty.capture.column_slider} {if !isset($homeverybottom) || !$homeverybottom} block {/if} {if isset($column_slider) && $column_slider} column_block {/if} products_block section {if $hide_mob} hidden-xs {/if} {if $display_as_grid==1} display_as_grid {elseif $display_as_grid==2} display_as_simple {/if}" >
	<h3 class="title_block {if (!isset($column_slider) || !$column_slider) && $title_position} title_block_center {/if}"><span>{l s='Featured Products' mod='stfeaturedslider'}</span></h3>
	{if isset($products) AND $products}
    {if !$display_as_grid || ($display_as_grid && isset($column_slider) && $column_slider)}
    <div id="featured-itemslider_{$hook_hash}{$smarty.capture.column_slider}" class="featured-itemslider{$smarty.capture.column_slider} products_slider block_content">
    	{if isset($column_slider) && $column_slider}
    	{include file="$tpl_dir./product-slider-list.tpl"}
        {else}
    	{include file="$tpl_dir./product-slider.tpl"}
        {/if}
	</div>
    
    <script type="text/javascript">
    //<![CDATA[
    {literal}
    jQuery(function($) { 
        var owl = $("#featured-itemslider_{/literal}{$hook_hash}{$smarty.capture.column_slider}{literal} .slides");
        owl.owlCarousel({
            {/literal}
            autoPlay: {if $slider_slideshow}{$slider_s_speed|default:5000}{else}false{/if},
            slideSpeed: {$slider_a_speed},
            stopOnHover: {if $slider_pause_on_hover}true{else}false{/if},
            lazyLoad: {if $lazy_load}true{else}false{/if},
            scrollPerPage: {if $slider_move}true{else}false{/if},
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
        {include file="$tpl_dir./product-list-simple.tpl" products=$products for_f='featured' id='homefeatured_grid'}
    {else}
        {include file="$tpl_dir./product-list.tpl" products=$products class='homefeatured_grid' for_f='featured' id='homefeatured_grid'}
    {/if}
	{else}
		<p class="warning">{l s='No featrued products' mod='stfeaturedslider'}</p>
	{/if}
</section>
{if isset($homeverybottom) && $homeverybottom}</div></div>{/if}
<!-- /MODULE Featured Products slider -->