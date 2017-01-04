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
{capture name="home_default_width"}{getWidthSize type='home_default'}{/capture}
{capture name="home_default_height"}{getHeightSize type='home_default'}{/capture}
{capture name="small_default_width"}{getWidthSize type='small_default'}{/capture}
{capture name="small_default_height"}{getHeightSize type='small_default'}{/capture}
{assign var='st_yotpo_sart' value=Configuration::get('STSN_YOTPO_SART')}
{assign var='st_yotpoAppkey' value=Configuration::get('yotpo_app_key')}
{capture name="st_yotpoDomain"}{hook h='displayAnywhere' function="getYotpoDomain" mod='stthemeeditor' caller='stthemeeditor'}{/capture}
{capture name="st_yotpoLanguage"}{hook h='displayAnywhere' function="getYotpoLanguage" mod='stthemeeditor' caller='stthemeeditor'}{/capture}
{assign var='st_display_add_to_cart' value=Configuration::get('STSN_DISPLAY_ADD_TO_CART')}
{assign var='flyout_wishlist' value=Configuration::get('STSN_FLYOUT_WISHLIST')}
{assign var='flyout_quickview' value=Configuration::get('STSN_FLYOUT_QUICKVIEW')}
{assign var='flyout_comparison' value=Configuration::get('STSN_FLYOUT_COMPARISON')}    
{assign var='discount_percentage' value=Configuration::get('STSN_DISCOUNT_PERCENTAGE')}
{assign var='flyout_buttons' value=Configuration::get('STSN_FLYOUT_BUTTONS')}
{assign var='flyout_buttons_on_mobile' value=Configuration::get('STSN_FLYOUT_BUTTONS_ON_MOBILE')}
{assign var='new_sticker' value=Configuration::get('STSN_NEW_STYLE')}
{assign var='sale_sticker' value=Configuration::get('STSN_SALE_STYLE')}
<div class="slides remove_after_init {if $direction_nav>1} owl-navigation-lr {if $direction_nav==4} owl-navigation-circle {else} owl-navigation-rectangle {/if} {elseif $direction_nav==1} owl-navigation-tr{/if}">
{foreach $products as $product}
	<div class="ajax_block_product {if $product@first}first_item{elseif $product@last}last_item{/if} item">
        {capture name="new_on_sale"}
            {if $new_sticker!=2 && isset($product.new) && $product.new == 1}<span class="new"><i>{l s='New'}</i></span>{/if}{if $sale_sticker!=2 && isset($product.on_sale) && $product.on_sale && isset($product.show_price) && $product.show_price && !$PS_CATALOG_MODE}<span class="on_sale"><i>{l s='Sale'}</i></span>{/if}{if $product.show_price AND !isset($restricted_country_mode) AND !$PS_CATALOG_MODE}{if isset($product.specific_prices) && $product.specific_prices && isset($product.specific_prices.reduction) && $product.specific_prices.reduction > 0 && isset($discount_percentage) && $discount_percentage>1}<span class="sale_percentage_sticker">{if $product.specific_prices && $product.specific_prices.reduction_type=='percentage'}{$product.specific_prices.reduction*100|floatval}%{if $discount_percentage==2}<br/>{else} {/if}{l s='Off'}{elseif $product.specific_prices && $product.specific_prices.reduction_type=='amount' && $product.specific_prices.reduction|floatval !=0}{l s='Save'}{if $discount_percentage==2}<br/>{else} {/if}{convertPrice price=$product.price_without_reduction-$product.price|floatval}{/if}</span>{/if}{/if}
        {/capture}
        {assign var='pro_image' value=$link->getImageLink($product.link_rewrite, $product.id_image, 'home_default')} 
        <div class="pro_first_box">
            <a href="{$product.link|escape:'html':'UTF-8'}" title="{$product.name|escape:html:'UTF-8'}" class="product_image"><img {if $lazy_load} data-src="{$pro_image}" {else} src="{$pro_image}" {/if} width="{$smarty.capture.home_default_width}" height="{$smarty.capture.home_default_height}" alt="{if !empty($product.legend)}{$product.legend|escape:'html':'UTF-8'}{else}{$product.name|escape:'html':'UTF-8'}{/if}" class="replace-2x img-responsive front-image {if $lazy_load} lazyOwl {/if}" />{if isset($product['hover_image']) && $product['hover_image']}{$product.hover_image}{/if}{$smarty.capture.new_on_sale}</a>
            {capture name="pro_a_cart"}
                {if ($product.id_product_attribute == 0 OR (isset($add_prod_display) AND ($add_prod_display == 1))) AND $product.available_for_order AND !isset($restricted_country_mode) AND $product.minimal_quantity <= 1 AND $product.customizable != 2 AND !$PS_CATALOG_MODE}          
                    {if (!isset($product.customization_required) || !$product.customization_required) && ($product.allow_oosp || $product.quantity > 0)}
					  <a class="ajax_add_to_cart_button btn btn-default" href="{$link->getPageLink('cart')|escape:'html'}?qty=1&amp;id_product={$product.id_product}&amp;token={$static_token}&amp;add" rel="nofollow" title="{l s='Add to cart'}" data-id-product="{$product.id_product|intval}"><div><i class="icon-glyph icon_btn icon-small icon-mar-lr2"></i><span>{l s='Add to cart'}</span></div></a>
					{else}
                        <a class="view_button btn btn-default" href="{$product.link|escape:'html'}" title="{l s='View'}" rel="nofollow"><div><i class="icon-eye-2 icon_btn icon-small icon-mar-lr2"></i><span>{if (isset($product.customization_required) && $product.customization_required)}{l s='Customize'}{else}{l s='More'}{/if}</span></div></a>
					{/if}
				{else}
				{/if}
            {/capture}
            {capture name="pro_a_compare"}
                {if !$flyout_comparison && isset($comparator_max_item) && $comparator_max_item}
                    <a class="add_to_compare" href="{$product.link|escape:'html':'UTF-8'}" data-id-product="{$product.id_product}" rel="nofollow" data-product-cover="{$link->getImageLink($product.link_rewrite, $product.id_image, 'small_default')|escape:'html':'UTF-8'}" data-product-name="{$product.name|escape:'html':'UTF-8'}" data-product-cover-width="{$smarty.capture.small_default_width}" data-product-cover-height="{$smarty.capture.small_default_height}"><div><i class="icon-adjust icon_btn icon-small icon-mar-lr2"></i><span>{l s='Add to compare'}</span></div></a>
    			{/if}
            {/capture}
            {capture name="pro_quick_view"}
                {if !$flyout_quickview && isset($quick_view) && $quick_view}
                    <a class="quick-view" href="{$product.link|escape:'html':'UTF-8'}" rel="{$product.link|escape:'html':'UTF-8'}"><div><i class="icon-search-1 icon_btn icon-small icon-mar-lr2"></i><span>{l s='Quick view'}</span></div></a>
                {/if}
            {/capture}
            {assign var="fly_i" value=0}
            {if !$st_display_add_to_cart && trim($smarty.capture.pro_a_cart)}{assign var="fly_i" value=$fly_i+1}{/if}
            {if trim($smarty.capture.pro_a_compare)}{assign var="fly_i" value=$fly_i+1}{/if}
            {if trim($smarty.capture.pro_quick_view)}{assign var="fly_i" value=$fly_i+1}{/if}
            {if !$flyout_wishlist && isset($product['pro_a_wishlist']) && $product['pro_a_wishlist']}{assign var="fly_i" value=$fly_i+1}{/if}
            
            <div class="hover_fly {if $flyout_buttons}hover_fly_static{/if} {if $flyout_buttons_on_mobile==1} mobile_hover_fly_show {elseif $flyout_buttons_on_mobile==2} mobile_hover_fly_cart {else} mobile_hover_fly_hide {/if} fly_{$fly_i} {if trim($smarty.capture.pro_quick_view)} has_quick_view {/if} clearfix">
                {if !$st_display_add_to_cart}{$smarty.capture.pro_a_cart}{/if}
                {$smarty.capture.pro_quick_view}
                {$smarty.capture.pro_a_compare}
                {if !$flyout_wishlist && isset($product['pro_a_wishlist']) && $product['pro_a_wishlist']}{$product.pro_a_wishlist}{/if}   
            </div>
        </div>
        <div class="pro_second_box">
        {if isset($sttheme.length_of_product_name) && $sttheme.length_of_product_name==1}
            {assign var="length_of_product_name" value=70}
        {else}
            {assign var="length_of_product_name" value=35}
        {/if}
		<p class="s_title_block {if isset($sttheme.length_of_product_name) && $sttheme.length_of_product_name} nohidden {/if}"><a href="{$product.link|escape:'html':'UTF-8'}" title="{$product.name|escape:'html':'UTF-8'}">{if isset($sttheme.length_of_product_name) && $sttheme.length_of_product_name==2}{$product.name|escape:'html':'UTF-8'}{else}{$product.name|truncate:$length_of_product_name:'...'|escape:'html':'UTF-8'}{/if}</a></p>
        {if $product.show_price AND !isset($restricted_country_mode) AND !$PS_CATALOG_MODE}
            <div class="price_container">
                <span class="price">
                {if !$priceDisplay}{convertPrice price=$product.price}
                {else}
                {convertPrice price=$product.price_tax_exc}
                {/if}
                </span>
                {if isset($product.specific_prices) && $product.specific_prices && isset($product.specific_prices.reduction) && $product.specific_prices.reduction > 0}
                    <span class="old_price">{convertPrice price=$product.price_without_reduction}</span>
                    {if isset($discount_percentage) && $discount_percentage==1}
                    <span class="sale_percentage">
                        -{if $product.specific_prices && $product.specific_prices.reduction_type=='percentage'}{$product.specific_prices.reduction*100|floatval}%{elseif $product.specific_prices && $product.specific_prices.reduction_type=='amount' && $product.specific_prices.reduction|floatval !=0}{convertPrice price=$product.price_without_reduction-$product.price|floatval}{/if}
                    </span>
                    {/if}
                {/if}
            </div>
        {else}
            <!--<div style="height:21px;"></div>-->
        {/if}
        {if isset($display_sd) && $display_sd}<p class="product_desc">{$product.description_short|strip_tags:'UTF-8'|truncate:120:'...'}</p>{/if}
        {if isset($product['pro_rating_average']) && $product['pro_rating_average']}{$product.pro_rating_average}{/if}   
        {if $st_yotpo_sart && $st_yotpoAppkey && $smarty.capture.st_yotpoDomain && $smarty.capture.st_yotpoLanguage}
            <div class="yotpo bottomLine"
            data-appkey="{$st_yotpoAppkey}"
            data-domain="{$smarty.capture.st_yotpoDomain}"
            data-product-id="{$product.id_product}"
            data-product-models=""
            data-name="{$product.name|escape:'html':'UTF-8'}"
            data-url="{$product.link|escape:'html':'UTF-8'}"
            data-image-url="{$pro_image|escape:'html':'UTF-8'}"
            data-description="{$product.description_short|strip_tags:'UTF-8'|truncate:360:'...'}"
            data-lang="{$smarty.capture.st_yotpoLanguage|escape:'html':'UTF-8'}"
            data-bread-crumbs="">
            </div>
        {/if}
        {if $st_display_add_to_cart==1 || $st_display_add_to_cart==2}
        <div class="act_box {if $st_display_add_to_cart==1} display_when_hover {elseif $st_display_add_to_cart==2} display_normal {/if}">
            {$smarty.capture.pro_a_cart}
        </div>
        {/if}
        </div>
	</div>
{/foreach}
</div>