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
{if $aw_display || (isset($productsViewedObj) && count($productsViewedObj))}
{if isset($homeverybottom) && $homeverybottom}<div class="wide_container {if $hide_mob} hidden-xs {/if}"><div class="container">{/if}
<section id="viewed-products_block_center" class="page-product-box blockviewed products_block block section {if $hide_mob} hidden-xs {/if}">
	<h3 class="title_block {if $title_position} title_block_center {/if}"><span>{l s='Recently Viewed' mod='blockviewed_mod'}</span></h3>
	<div id="viewed-itemslider" class="viewed-itemslider products_slider">  
	{if isset($productsViewedObj) && count($productsViewedObj)}
        {assign var='pc_direction_nav' value=Configuration::get('STSN_PC_DIRECTION_NAV')}
		<div class="slides remove_after_init {if $direction_nav>1} owl-navigation-lr {if $direction_nav==4} owl-navigation-circle {else} owl-navigation-rectangle {/if} {elseif $direction_nav==1} owl-navigation-tr{/if}">
    	{foreach from=$productsViewedObj item=viewedProduct name=myLoop}
    		<div class="ajax_block_product {if $smarty.foreach.myLoop.last} last_item{elseif $smarty.foreach.myLoop.first} first_item{else} item{/if}">
                <div class="pro_first_box">
                    <a href="{$viewedProduct->product_link|escape:'html':'UTF-8'}" title="{l s='More about %s' mod='blockviewed_mod' sprintf=[$viewedProduct->name|escape:'html':'UTF-8']}" class="product_image"><img src="{if isset($viewedProduct->id_image) && $viewedProduct->id_image}{$link->getImageLink($viewedProduct->link_rewrite, $viewedProduct->cover, 'home_default')}{else}{$img_prod_dir}{$lang_iso}-default-home_default.jpg{/if}" alt="{l s='More about %s' mod='blockviewed_mod' sprintf=[$viewedProduct->name|escape:'html':'UTF-8']}" class="replace-2x img-responsive front-image" width="{$homeSize.width}" height="{$homeSize.height}" />{if isset($viewedProduct->new) && $viewedProduct->new == 1}<span class="new"><i>{l s='New' mod='blockviewed_mod'}</i></span>{/if}{if isset($viewedProduct->on_sale) && $viewedProduct->on_sale && isset($viewedProduct->show_price) && $viewedProduct->show_price && !$PS_CATALOG_MODE}<span class="on_sale"><i>{l s='Sale' mod='blockviewed_mod'}</i></span>{/if}</a>
                </div>
                <div class="pro_second_box">
                {if isset($sttheme.length_of_product_name) && $sttheme.length_of_product_name==1}
                    {assign var="length_of_product_name" value=70}
                {else}
                    {assign var="length_of_product_name" value=35}
                {/if}
    			<p class="s_title_block {if isset($sttheme.length_of_product_name) && $sttheme.length_of_product_name} nohidden {/if}"><a href="{$viewedProduct->product_link|escape:'html':'UTF-8'}" title="{$viewedProduct->name|escape:'html':'UTF-8'}">{if isset($sttheme.length_of_product_name) && $sttheme.length_of_product_name==2}{$viewedProduct->name|escape:'html':'UTF-8'}{else}{$viewedProduct->name|escape:'html':'UTF-8'|truncate:$length_of_product_name:'...'}{/if}</a></p>
            </div>
		</div>
		{/foreach}
	</div>
	<script type="text/javascript">
    //<![CDATA[
    {literal}
    jQuery(function($) { 
        var owl = $("#viewed-itemslider .slides");
        owl.owlCarousel({
            {/literal}
            autoPlay: {if $slider_slideshow}{$slider_s_speed|default:5000}{else}false{/if},
            slideSpeed: {$slider_a_speed},
            stopOnHover: {if $slider_pause_on_hover}true{else}false{/if},
            lazyLoad: {if $lazy_load}true{else}false{/if},
            scrollPerPage: {if $slider_move}true{else}false{/if},
            rewindNav: {if $rewind_nav}true{else}false{/if},
            afterInit: productsSliderAfterInit,
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
        });
    });
    {/literal} 
    //]]>
    </script>
	{else}
        <p class="warning">{l s='No viewed products' mod='blockviewed_mod'}</p>
	{/if}
</section>
{if isset($homeverybottom) && $homeverybottom}</div></div>{/if}
{/if}