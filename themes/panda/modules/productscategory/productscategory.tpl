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
{if count($categoryProducts) > 0 && $categoryProducts !== false}
{capture name="home_default_width"}{getWidthSize type='home_default'}{/capture}
{capture name="home_default_height"}{getHeightSize type='home_default'}{/capture}
{assign var='discount_percentage' value=Configuration::get('STSN_DISCOUNT_PERCENTAGE')}
{assign var='new_sticker' value=Configuration::get('STSN_NEW_STYLE')}
{assign var='sale_sticker' value=Configuration::get('STSN_SALE_STYLE')}
{assign var='st_display_add_to_cart' value=Configuration::get('STSN_DISPLAY_ADD_TO_CART')}
{assign var='flyout_buttons' value=Configuration::get('STSN_FLYOUT_BUTTONS')}
{assign var='flyout_buttons_on_mobile' value=Configuration::get('STSN_FLYOUT_BUTTONS_ON_MOBILE')}
<section id="productscategory-products_block_center" class="page-product-box blockproductscategory products_block block section">
	<h3 class="title_block {if Configuration::get('STSN_PC_TITLE')} title_block_center {/if}"><span>{$categoryProducts|@count} {l s='Other products in the same category' mod='productscategory'}</span></h3>
	<div id="productscategory-itemslider" class="products_slider">  
        {assign var='pc_direction_nav' value=Configuration::get('STSN_PC_DIRECTION_NAV')}
		<div class="slides remove_after_init {if $pc_direction_nav>1} owl-navigation-lr {if $pc_direction_nav==4} owl-navigation-circle {else} owl-navigation-rectangle {/if} {elseif $pc_direction_nav==1} owl-navigation-tr{/if}">
        {foreach $categoryProducts as $product}
    		<div class="ajax_block_product {if $product@first}first_item{elseif $product@last}last_item{else}item{/if}">
                {capture name="new_on_sale"}
                    {if $new_sticker!=2 && isset($product.new) && $product.new == 1}<span class="new"><i>{l s='New' mod='productscategory'}</i></span>{/if}{if $sale_sticker!=2 && isset($product.on_sale) && $product.on_sale && isset($product.show_price) && $product.show_price && !$PS_CATALOG_MODE}<span class="on_sale"><i>{l s='Sale' mod='productscategory'}</i></span>{/if}{if $product.show_price AND !isset($restricted_country_mode) AND !$PS_CATALOG_MODE}{if isset($product.specific_prices) && $product.specific_prices && isset($product.specific_prices.reduction) && $product.specific_prices.reduction > 0 && isset($discount_percentage) && $discount_percentage>1}<span class="sale_percentage_sticker">{if $product.specific_prices && $product.specific_prices.reduction_type=='percentage'}{$product.specific_prices.reduction*100|floatval}%{if $discount_percentage==2}<br/>{else} {/if}{l s='Off' mod='productscategory'}{elseif $product.specific_prices && $product.specific_prices.reduction_type=='amount' && $product.specific_prices.reduction|floatval !=0}{l s='Save' mod='productscategory'}{if $discount_percentage==2}<br/>{else} {/if}{convertPrice price=$product.price_without_reduction-$product.price|floatval}{/if}</span>{/if}{/if}
                {/capture}
                {capture name="pro_link"}{$link->getProductLink($product.id_product, $product.link_rewrite, $product.category, $product.ean13)}{/capture}
                {capture name="pro_a_cart"}
                    {if !$PS_CATALOG_MODE && ($product.allow_oosp || $product.quantity > 0)}
                        <a class="ajax_add_to_cart_button btn btn-default" href="{$link->getPageLink('cart', true, NULL, "qty=1&amp;id_product={$product.id_product|intval}&amp;token={$static_token}&amp;add")|escape:'html':'UTF-8'}" rel="nofollow" title="{l s='Add to cart' mod='productscategory'}" data-id-product="{$product.id_product|intval}"><div><i class="icon-glyph icon_btn icon-small icon-mar-lr2"></i><span>{l s='Add to cart' mod='productscategory'}</span></div></a>
                    {/if}
                {/capture}
                <div class="pro_first_box">
                    <a href="{$smarty.capture.pro_link}" title="{$product.name|escape:html:'UTF-8'}" class="product_image"><img src="{$link->getImageLink($product.link_rewrite, $product.id_image, 'home_default')}" alt="{$product.name|escape:html:'UTF-8'}" class="replace-2x img-responsive front-image" width="{$smarty.capture.home_default_width}" height="{$smarty.capture.home_default_height}" />{$smarty.capture.new_on_sale}</a>
                    {assign var="fly_i" value=0}
                    {if !$st_display_add_to_cart && trim($smarty.capture.pro_a_cart)}{assign var="fly_i" value=$fly_i+1}{/if}
                    <div class="hover_fly {if $flyout_buttons}hover_fly_static{/if} {if $flyout_buttons_on_mobile==1} mobile_hover_fly_show {elseif $flyout_buttons_on_mobile==2} mobile_hover_fly_cart {else} mobile_hover_fly_hide {/if} fly_{$fly_i} clearfix">
                        {if !$st_display_add_to_cart}{$smarty.capture.pro_a_cart}{/if}
                    </div>
                </div>
                <div class="pro_second_box">
                {if isset($sttheme.length_of_product_name) && $sttheme.length_of_product_name==1}
                    {assign var="length_of_product_name" value=70}
                {else}
                    {assign var="length_of_product_name" value=35}
                {/if}
    			<p itemprop="name" class="s_title_block {if isset($sttheme.length_of_product_name) && $sttheme.length_of_product_name} nohidden {/if}"><a href="{$smarty.capture.pro_link}" title="{$product.name|escape:'html':'UTF-8'}">{if isset($sttheme.length_of_product_name) && $sttheme.length_of_product_name==2}{$product.name|escape:'html':'UTF-8'}{else}{$product.name|escape:'html':'UTF-8'|truncate:$length_of_product_name:'...'}{/if}</a></p>
                {if $ProdDisplayPrice && $product.show_price == 1 && !isset($restricted_country_mode) && !$PS_CATALOG_MODE}
				<div class="price_container">
					<span class="price">{convertPrice price=$product.displayed_price}</span>
                    {if isset($product.specific_prices) && $product.specific_prices
                    && ($product.displayed_price|number_format:2 !== $product.price_without_reduction|number_format:2)}
                        <span class="old-price">{displayWtPrice p=$product.price_without_reduction}</span>
                		{if isset($discount_percentage) && $discount_percentage==1}
                            {if $product.specific_prices && $product.specific_prices.reduction_type=='percentage'}<span class="sale_percentage">-{$product.specific_prices.reduction*100|floatval}%</span>{elseif $product.specific_prices && $product.specific_prices.reduction_type=='amount' && $product.specific_prices.reduction|floatval !=0}<span class="sale_percentage">-{if !$priceDisplay}{convertPrice price=$product.price_without_reduction-$product.price|floatval}</span>{else}{convertPrice price=$product.price_without_reduction-$product.displayed_price|floatval}{/if}{/if}
                        {/if}
                    {/if}
				</div>
				{else}
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
    {hook h='displayAnywhere' function="getCarouselJavascript" identify='productscategory' mod='stthemeeditor' caller='stthemeeditor'}
</section>
{/if}