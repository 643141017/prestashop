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

{if $page_name == 'category' || $page_name == 'prices-drop' || $page_name == 'best-sales' || $page_name == 'manufacturer' || $page_name == 'supplier' || $page_name == 'new-products' || $page_name == 'search'}
{if isset($HOOK_RIGHT_COLUMN) || isset($HOOK_LEFT_COLUMN) }
	{assign var='st_columns_nbr' value=1}
	{if isset($HOOK_LEFT_COLUMN) && $HOOK_LEFT_COLUMN|trim}{$st_columns_nbr=$st_columns_nbr+1}{/if}
	{if isset($HOOK_RIGHT_COLUMN) && $HOOK_RIGHT_COLUMN|trim}{$st_columns_nbr=$st_columns_nbr+1}{/if}
	{hook h='displayAnywhere' function='setColumnsNbr' columns_nbr=$st_columns_nbr page_name=$page_name mod='stthemeeditor' caller='stthemeeditor'}
	{capture name="st_columns_nbr"}{$st_columns_nbr}{/capture}
{/if}
{/if}

{if isset($products) && $products}
	{capture name="home_default_width"}{getWidthSize type='home_default'}{/capture}
	{capture name="home_default_height"}{getHeightSize type='home_default'}{/capture}
	{capture name="small_default_width"}{getWidthSize type='small_default'}{/capture}
	{capture name="small_default_height"}{getHeightSize type='small_default'}{/capture}
	{capture name="display_sd"}{if isset($display_sd) && $display_sd} display_sd {elseif !isset($display_sd) && Configuration::get('STSN_SHOW_SHORT_DESC_ON_GRID')} display_sd {/if}{/capture} 
	{*define number of products per line in other page for desktop*}

	{assign var='for_w' value='category'}
	{if isset($for_f) && $for_f}
		{$for_w=$for_f}
	{/if}

	{capture name="display_color_list"}{if $for_w!='category' || !Configuration::get('STSN_DISPLAY_COLOR_LIST')} hidden {/if}{/capture}

	{capture name="nbItemsPerLineLarge"}{hook h='displayAnywhere' function='getProductsPerRow' for_w=$for_w devices='xl' mod='stthemeeditor' caller='stthemeeditor'}{/capture}
	{capture name="nbItemsPerLineDesktop"}{hook h='displayAnywhere' function='getProductsPerRow' for_w=$for_w devices='lg' mod='stthemeeditor' caller='stthemeeditor'}{/capture}
	{capture name="nbItemsPerLine"}{hook h='displayAnywhere' function='getProductsPerRow' for_w=$for_w devices='md' mod='stthemeeditor' caller='stthemeeditor'}{/capture}
	{capture name="nbItemsPerLineTablet"}{hook h='displayAnywhere' function='getProductsPerRow' for_w=$for_w devices='sm' mod='stthemeeditor' caller='stthemeeditor'}{/capture}
	{capture name="nbItemsPerLineMobile"}{hook h='displayAnywhere' function='getProductsPerRow' for_w=$for_w devices='xs' mod='stthemeeditor' caller='stthemeeditor'}{/capture}
	{capture name="nbItemsPerLinePortrait"}{hook h='displayAnywhere' function='getProductsPerRow' for_w=$for_w devices='xxs' mod='stthemeeditor' caller='stthemeeditor'}{/capture}

	{*define numbers of product per line in other page for tablet*}

	{assign var='nbLi' value=$products|@count}
	{assign var='nbLiNext' value=($nbLi+1)}
	{math equation="nbLi/nbItemsPerLineLarge" nbLi=$nbLi nbItemsPerLineLarge=$smarty.capture.nbItemsPerLineLarge assign=nbLinesLarge}
	{math equation="nbLi/nbItemsPerLineDesktop" nbLi=$nbLi nbItemsPerLineDesktop=$smarty.capture.nbItemsPerLineDesktop assign=nbLinesDesktop}
	{math equation="nbLi/nbItemsPerLine" nbLi=$nbLi nbItemsPerLine=$smarty.capture.nbItemsPerLine assign=nbLines}
	{math equation="nbLi/nbItemsPerLineTablet" nbLi=$nbLi nbItemsPerLineTablet=$smarty.capture.nbItemsPerLineTablet assign=nbLinesTablet}
	{math equation="nbLi/nbItemsPerLineMobile" nbLi=$nbLi nbItemsPerLineMobile=$smarty.capture.nbItemsPerLineMobile assign=nbLinesMobile}
	{math equation="nbLi/nbItemsPerLinePortrait" nbLi=$nbLi nbItemsPerLinePortrait=$smarty.capture.nbItemsPerLinePortrait assign=nbLinesPortrait}

	{capture name="isInstalledWishlist"}{hook h='displayAnywhere' function="isInstalledWishlist" mod='stthemeeditor' caller='stthemeeditor'}{/capture}
	{assign var='length_of_product_name' value=Configuration::get('STSN_LENGTH_OF_PRODUCT_NAME')}
	{assign var='discount_percentage' value=Configuration::get('STSN_DISCOUNT_PERCENTAGE')}
	{assign var='sold_out_style' value=Configuration::get('STSN_SOLD_OUT')}
	{assign var='st_yotpo_sart' value=Configuration::get('STSN_YOTPO_SART')}
	{assign var='st_yotpoAppkey' value=Configuration::get('yotpo_app_key')}
	{capture name="st_yotpoDomain"}{hook h='displayAnywhere' function="getYotpoDomain" mod='stthemeeditor' caller='stthemeeditor'}{/capture}
	{capture name="st_yotpoLanguage"}{hook h='displayAnywhere' function="getYotpoLanguage" mod='stthemeeditor' caller='stthemeeditor'}{/capture}
	{assign var='st_big_next' value=Configuration::get('STSN_BIG_NEXT')}
	{assign var='st_display_add_to_cart' value=Configuration::get('STSN_DISPLAY_ADD_TO_CART')}
	{assign var='flyout_wishlist' value=Configuration::get('STSN_FLYOUT_WISHLIST')}
	{assign var='flyout_quickview' value=Configuration::get('STSN_FLYOUT_QUICKVIEW')}
	{assign var='flyout_comparison' value=Configuration::get('STSN_FLYOUT_COMPARISON')}  
	{assign var='flyout_buttons' value=Configuration::get('STSN_FLYOUT_BUTTONS')}
	{assign var='flyout_buttons_on_mobile' value=Configuration::get('STSN_FLYOUT_BUTTONS_ON_MOBILE')}
	{assign var='new_sticker' value=Configuration::get('STSN_NEW_STYLE')}
	{assign var='sale_sticker' value=Configuration::get('STSN_SALE_STYLE')}
	{assign var='pro_list_display_brand_name' value=Configuration::get('STSN_PRO_LIST_DISPLAY_BRAND_NAME')}
	<!-- Products list -->
	<ul{if isset($id) && $id} id="{$id}"{/if} class="product_list grid row{if isset($class) && $class} {$class}{/if}" data-classnames="col-xl-{(12/$smarty.capture.nbItemsPerLineLarge)|replace:'.':'-'} col-lg-{(12/$smarty.capture.nbItemsPerLineDesktop)|replace:'.':'-'} col-md-{(12/$smarty.capture.nbItemsPerLine)|replace:'.':'-'} col-sm-{(12/$smarty.capture.nbItemsPerLineTablet)|replace:'.':'-'} col-xs-{(12/$smarty.capture.nbItemsPerLineMobile)|replace:'.':'-'} col-xxs-{(12/$smarty.capture.nbItemsPerLinePortrait)|replace:'.':'-'}" data-default-view="{if $for_w=='category'}{if Configuration::get('STSN_PRODUCT_VIEW')=='list_view'} list {else} grid {/if}{/if}">
	{foreach from=$products item=product name=products}
		{math equation="(total%perLine)" total=$smarty.foreach.products.total perLine=$smarty.capture.nbItemsPerLineLarge assign=totModuloLarge}
		{math equation="(total%perLine)" total=$smarty.foreach.products.total perLine=$smarty.capture.nbItemsPerLineDesktop assign=totModuloDesktop}
		{math equation="(total%perLine)" total=$smarty.foreach.products.total perLine=$smarty.capture.nbItemsPerLine assign=totModulo}
		{math equation="(total%perLine)" total=$smarty.foreach.products.total perLine=$smarty.capture.nbItemsPerLineTablet assign=totModuloTablet}
		{math equation="(total%perLine)" total=$smarty.foreach.products.total perLine=$smarty.capture.nbItemsPerLineMobile assign=totModuloMobile}
		{math equation="(total%perLine)" total=$smarty.foreach.products.total perLine=$smarty.capture.nbItemsPerLinePortrait assign=totModuloPortrait}
		{if $totModuloLarge == 0}{assign var='totModuloLarge' value=$smarty.capture.nbItemsPerLineLarge}{/if}
		{if $totModuloDesktop == 0}{assign var='totModuloDesktop' value=$smarty.capture.nbItemsPerLineDesktop}{/if}
		{if $totModulo == 0}{assign var='totModulo' value=$smarty.capture.nbItemsPerLine}{/if}
		{if $totModuloTablet == 0}{assign var='totModuloTablet' value=$smarty.capture.nbItemsPerLineTablet}{/if}
		{if $totModuloMobile == 0}{assign var='totModuloMobile' value=$smarty.capture.nbItemsPerLineMobile}{/if}
		{if $totModuloPortrait == 0}{assign var='totModuloPortrait' value=$smarty.capture.nbItemsPerLinePortrait}{/if}
		<li class="ajax_block_product col-xl-{(12/$smarty.capture.nbItemsPerLineLarge)|replace:'.':'-'} col-lg-{(12/$smarty.capture.nbItemsPerLineDesktop)|replace:'.':'-'} col-md-{(12/$smarty.capture.nbItemsPerLine)|replace:'.':'-'} col-sm-{(12/$smarty.capture.nbItemsPerLineTablet)|replace:'.':'-'} col-xs-{(12/$smarty.capture.nbItemsPerLineMobile)|replace:'.':'-'} col-xxs-{(12/$smarty.capture.nbItemsPerLinePortrait)|replace:'.':'-'}
		{if $smarty.foreach.products.iteration%$smarty.capture.nbItemsPerLineLarge == 0} last-item-of-large-line{elseif $smarty.foreach.products.iteration%$smarty.capture.nbItemsPerLineLarge == 1} first-item-of-large-line{/if}{if $smarty.foreach.products.iteration > ($smarty.foreach.products.total - $totModuloLarge)} last-large-line{/if}{if $smarty.foreach.products.index < $smarty.capture.nbItemsPerLineLarge} first-large-line{/if}
		{if $smarty.foreach.products.iteration%$smarty.capture.nbItemsPerLineDesktop == 0} last-item-of-desktop-line{elseif $smarty.foreach.products.iteration%$smarty.capture.nbItemsPerLineDesktop == 1} first-item-of-desktop-line{/if}{if $smarty.foreach.products.iteration > ($smarty.foreach.products.total - $totModuloDesktop)} last-desktop-line{/if}{if $smarty.foreach.products.index < $smarty.capture.nbItemsPerLineDesktop} first-desktop-line{/if}
		{if $smarty.foreach.products.iteration%$smarty.capture.nbItemsPerLine == 0} last-in-line{elseif $smarty.foreach.products.iteration%$smarty.capture.nbItemsPerLine == 1} first-in-line{/if}{if $smarty.foreach.products.iteration > ($smarty.foreach.products.total - $totModulo)} last-line{/if}{if $smarty.foreach.products.index < $smarty.capture.nbItemsPerLine} first-line{/if}
		{if $smarty.foreach.products.iteration%$smarty.capture.nbItemsPerLineTablet == 0} last-item-of-tablet-line{elseif $smarty.foreach.products.iteration%$smarty.capture.nbItemsPerLineTablet == 1} first-item-of-tablet-line{/if}{if $smarty.foreach.products.iteration > ($smarty.foreach.products.total - $totModuloTablet)} last-tablet-line{/if}{if $smarty.foreach.products.index < $smarty.capture.nbItemsPerLineTablet} first-tablet-line{/if}
		{if $smarty.foreach.products.iteration%$smarty.capture.nbItemsPerLineMobile == 0} last-item-of-mobile-line{elseif $smarty.foreach.products.iteration%$smarty.capture.nbItemsPerLineMobile == 1} first-item-of-mobile-line{/if}{if $smarty.foreach.products.iteration > ($smarty.foreach.products.total - $totModuloMobile)} last-mobile-line{/if}{if $smarty.foreach.products.index < $smarty.capture.nbItemsPerLineMobile} first-mobile-line{/if}
		{if $smarty.foreach.products.iteration%$smarty.capture.nbItemsPerLinePortrait == 0} last-item-of-portrait-line{elseif $smarty.foreach.products.iteration%$smarty.capture.nbItemsPerLinePortrait == 1} first-item-of-portrait-line{/if}{if $smarty.foreach.products.iteration > ($smarty.foreach.products.total - $totModuloPortrait)} last-portrait-line{/if}{if $smarty.foreach.products.index < $smarty.capture.nbItemsPerLinePortrait} first-portrait-line{/if}">
			<div class="product-container" itemscope itemtype="http://schema.org/Product">
            	{assign var='pro_image' value=$link->getImageLink($product.link_rewrite, $product.id_image, 'home_default')} 
				<div class="pro_first_box">
					<a class="product_img_link"	href="{$product.link|escape:'html':'UTF-8'}" title="{$product.name|escape:'html':'UTF-8'}" itemprop="url">
						<img class="replace-2x img-responsive front-image" src="{$pro_image|escape:'html':'UTF-8'}" alt="{if !empty($product.legend)}{$product.legend|escape:'html':'UTF-8'}{else}{$product.name|escape:'html':'UTF-8'}{/if}" title="{if !empty($product.legend)}{$product.legend|escape:'html':'UTF-8'}{else}{$product.name|escape:'html':'UTF-8'}{/if}" width="{$smarty.capture.home_default_width}" height="{$smarty.capture.home_default_height}" itemprop="image" />
						{if $for_w!='hometab'}{hook h='displayAnywhere' function='getHoverImage' id_product=$product.id_product product_link_rewrite=$product.link_rewrite home_default_height=$smarty.capture.home_default_height home_default_width=$smarty.capture.home_default_width product_name=$product.name mod='sthoverimage' caller='sthoverimage'}{/if}
						{if $new_sticker!=2 && isset($product.new) && $product.new == 1}<span class="new"><i>{l s='New'}</i></span>{/if}{if $sale_sticker!=2 && isset($product.on_sale) && $product.on_sale && isset($product.show_price) && $product.show_price && !$PS_CATALOG_MODE}<span class="on_sale"><i>{l s='Sale'}</i></span>{/if}						
	                    {if (!$PS_CATALOG_MODE && ((isset($product.show_price) && $product.show_price) || (isset($product.available_for_order) && $product.available_for_order)))}
							{if isset($product.show_price) && $product.show_price && !isset($restricted_country_mode)}
								{if $discount_percentage>1 && isset($product.specific_prices) && $product.specific_prices && isset($product.specific_prices.reduction) && $product.specific_prices.reduction > 0}
		                            {if $product.specific_prices && $product.specific_prices.reduction_type=='percentage'}
		                            	<span class="sale_percentage_sticker">
									        {$product.specific_prices.reduction*100|floatval}%{if $discount_percentage==2}<br/>{else} {/if}{l s='Off'}
										</span>
		                            {elseif $product.specific_prices && $product.specific_prices.reduction_type=='amount' && $product.specific_prices.reduction|floatval !=0}
		                            	<span class="sale_percentage_sticker">
		                            		{l s='Save'}{if $discount_percentage==2}<br/>{else} {/if}{convertPrice price=$product.price_without_reduction-$product.price|floatval}
		                            	</span>
		                            {/if}
		                        {/if}
	                        {/if}
	                    {/if}

	                    {if ($for_w=='category' && $sold_out_style>0 && !$PS_CATALOG_MODE && $PS_STOCK_MANAGEMENT && ((isset($product.show_price) && $product.show_price) || (isset($product.available_for_order) && $product.available_for_order)))}
							{if isset($product.available_for_order) && $product.available_for_order && !isset($restricted_country_mode)}
								{if ($product.allow_oosp || $product.quantity > 0)}
									{if $product.quantity <= 0}{if $product.allow_oosp}{else}<span class="sold_out">{l s='- Sold out -'}</span>{/if}{/if}
								{elseif (isset($product.quantity_all_versions) && $product.quantity_all_versions > 0)}
								{else}
									<span class="sold_out">{l s='- Sold out -'}</span>
								{/if}
							{/if}
						{/if}
					</a>
	                {capture name="pro_a_cart"}
						{if ($product.id_product_attribute == 0 || (isset($add_prod_display) && ($add_prod_display == 1))) && $product.available_for_order && !isset($restricted_country_mode) && $product.customizable != 2 && !$PS_CATALOG_MODE}
	    					{if (!isset($product.customization_required) || !$product.customization_required) && ($product.allow_oosp || $product.quantity > 0)}
	        					{capture}add=1&amp;id_product={$product.id_product|intval}{if isset($static_token)}&amp;token={$static_token}{/if}{/capture}
								<a class="ajax_add_to_cart_button btn btn-default" href="{$link->getPageLink('cart', true, NULL, $smarty.capture.default, false)|escape:'html':'UTF-8'}" rel="nofollow" title="{l s='Add to cart'}" data-id-product="{$product.id_product|intval}" data-minimal_quantity="{if isset($product.product_attribute_minimal_quantity) && $product.product_attribute_minimal_quantity > 1}{$product.product_attribute_minimal_quantity|intval}{else}{$product.minimal_quantity|intval}{/if}"><div><i class="icon-glyph icon-small icon_btn icon-mar-lr2"></i><span>{l s='Add to cart'}</span></div></a>					
	    					{else}
	                            <a class="view_button btn btn-default" href="{$product.link|escape:'html':'UTF-8'}" title="{l s='View'}" rel="nofollow"><div><i class="icon-eye-2 icon-small icon_btn icon-mar-lr2"></i><span>{l s='View'}</span></div></a>
	    					{/if}
	    				{/if}
	                {/capture}
	                {capture name="pro_a_compare"}
	                    {if !$flyout_comparison && isset($comparator_max_item) && $comparator_max_item}
							<a class="add_to_compare" href="{$product.link|escape:'html':'UTF-8'}" data-id-product="{$product.id_product}" rel="nofollow" data-product-cover="{$link->getImageLink($product.link_rewrite, $product.id_image, 'small_default')|escape:'html':'UTF-8'}" data-product-name="{$product.name|escape:'html':'UTF-8'}" data-product-cover-width="{$smarty.capture.small_default_width}" data-product-cover-height="{$smarty.capture.small_default_height}"><div><i class="icon-adjust icon-small icon_btn icon-mar-lr2"></i><span>{l s='Add to compare'}</span></div></a>
	        			{/if} 
	                {/capture}
	                {capture name="pro_a_wishlist"}
	                    {if !$flyout_wishlist && $smarty.capture.isInstalledWishlist}
	                    	<a class="addToWishlist wishlistProd_{$product.id_product}" href="#" data-pid="{$product.id_product}" onclick="WishlistCart('wishlist_block_list', 'add', '{$product.id_product}', false, 1,this); return false;"><div><i class="icon-heart-empty-1 icon-small icon_btn icon-mar-lr2"></i><span>{l s='Add to Wishlist'}</span></div></a>
	                    {/if}
	                {/capture}
	                {capture name="pro_quick_view"}
	                    {if !$flyout_quickview && isset($quick_view) && $quick_view}
	                        <a class="quick-view" href="{$product.link|escape:'html':'UTF-8'}" rel="{$product.link|escape:'html':'UTF-8'}"><div><i class="icon-search-1 icon-small icon_btn icon-mar-lr2"></i><span>{l s='Quick view'}</span></div></a>
	                    {/if}
	                {/capture}
	                {assign var="fly_i" value=0}
	                {if !$st_display_add_to_cart && trim($smarty.capture.pro_a_cart)}{assign var="fly_i" value=$fly_i+1}{/if}
	                {if trim($smarty.capture.pro_a_compare)}{assign var="fly_i" value=$fly_i+1}{/if}
	                {if trim($smarty.capture.pro_a_wishlist)}{assign var="fly_i" value=$fly_i+1}{/if}
	                {if trim($smarty.capture.pro_quick_view)}{assign var="fly_i" value=$fly_i+1}{/if}
	                <div class="hover_fly {if $flyout_buttons} hover_fly_static{/if} {if $flyout_buttons_on_mobile==1} mobile_hover_fly_show {elseif $flyout_buttons_on_mobile==2} mobile_hover_fly_cart {else} mobile_hover_fly_hide {/if} fly_{$fly_i} {if trim($smarty.capture.pro_quick_view)} has_quick_view {/if} clearfix">
	                    {if !$st_display_add_to_cart}{$smarty.capture.pro_a_cart}{/if}
	                    {$smarty.capture.pro_quick_view}
	                    {$smarty.capture.pro_a_compare}
	                    {$smarty.capture.pro_a_wishlist}
	                </div>
				</div>
	        	<div class="pro_second_box">
	        		<h5 itemprop="name" class="s_title_block {if $length_of_product_name} nohidden{/if}">{if isset($product.pack_quantity) && $product.pack_quantity}{$product.pack_quantity|intval|cat:' x '}{/if}<a class="product-name" href="{$product.link|escape:'html':'UTF-8'}" title="{$product.name|escape:'html':'UTF-8'}" itemprop="url" >{if $length_of_product_name==2}{$product.name|escape:'htmlall':'UTF-8'}{elseif $length_of_product_name==1}{$product.name|escape:'htmlall':'UTF-8'|truncate:75:'...'}{else}{$product.name|escape:'htmlall':'UTF-8'|truncate:35:'...'}{/if}</a></h5>
	        		{if $pro_list_display_brand_name && $product.id_manufacturer}<p class="pro_list_manufacturer">{$product.manufacturer_name|truncate:60:'...'|escape:'html':'UTF-8'}</p>{/if}
					{if (!$PS_CATALOG_MODE && ((isset($product.show_price) && $product.show_price) || (isset($product.available_for_order) && $product.available_for_order)))}
					<div class="price_container" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
						{if isset($product.show_price) && $product.show_price && !isset($restricted_country_mode)}<span itemprop="price" class="price product-price">{if !$priceDisplay}{convertPrice price=$product.price}{else}{convertPrice price=$product.price_tax_exc}{/if}</span>
						<meta itemprop="priceCurrency" content="{$currency->iso_code}" />
	                    {if isset($product.specific_prices) && $product.specific_prices && isset($product.specific_prices.reduction) && $product.specific_prices.reduction > 0}
	                    	{hook h="displayProductPriceBlock" product=$product type="old_price"}
	                        <span class="old-price product-price">{displayWtPrice p=$product.price_without_reduction}</span>
	                        {hook h="displayProductPriceBlock" id_product=$product.id_product type="old_price"}
	                        {if $discount_percentage==1}
		                        {if $product.specific_prices && $product.specific_prices.reduction_type=='percentage'}
		                        	<span class="sale_percentage">
									    -{$product.specific_prices.reduction*100|floatval}%
									</span>
		                        {elseif $product.specific_prices && $product.specific_prices.reduction_type=='amount' && $product.specific_prices.reduction|floatval !=0}
		                        	{if !$priceDisplay}
		                        	<span class="sale_percentage">
									    -{convertPrice price=$product.price_without_reduction-$product.price|floatval}
									</span>
		                        	{else}
		                        	<span class="sale_percentage">
									    -{convertPrice price=$product.price_without_reduction-$product.price_tax_exc|floatval}
									</span>
		                        	{/if}
		                        {/if}
	                        {/if}
	                    {/if}
	                    {if $PS_STOCK_MANAGEMENT && isset($product.available_for_order) && $product.available_for_order && !isset($restricted_country_mode)}
							{if ($product.allow_oosp || $product.quantity > 0)}
								<link itemprop="availability" href="http://schema.org/InStock" />
							{elseif (isset($product.quantity_all_versions) && $product.quantity_all_versions > 0)}
								<link itemprop="availability" href="http://schema.org/LimitedAvailability" />

							{else}
								<link itemprop="availability" href="http://schema.org/OutOfStock" />
							{/if}
						{/if}
	                    {hook h="displayProductPriceBlock" product=$product type="price"}
						{hook h="displayProductPriceBlock" product=$product type="unit_price"}
	                    {/if}
					</div>
				    {if isset($product.online_only) && $product.online_only}<div class="mar_b6 product_online_only_flags"><span class="online_only sm_lable">{l s='Online only'}</span></div>{/if}
					{/if}					
					{if isset($product.on_sale) && $product.on_sale && isset($product.show_price) && $product.show_price && !$PS_CATALOG_MODE}
					{elseif isset($product.reduction) && $product.reduction && isset($product.show_price) && $product.show_price && !$PS_CATALOG_MODE}
						<div class="mar_b6 product_discount_flags"><span class="discount sm_lable">{l s='Reduced price!'}</span></div>
					{/if}
					{if (!$PS_CATALOG_MODE && $PS_STOCK_MANAGEMENT && ((isset($product.show_price) && $product.show_price) || (isset($product.available_for_order) && $product.available_for_order)))}
						{if isset($product.available_for_order) && $product.available_for_order && !isset($restricted_country_mode)}
							<div class="availability product_stock_info mar_b6">
								{if ($product.allow_oosp || $product.quantity > 0)}
									<span class="{if $product.quantity <= 0 && !$product.allow_oosp}out-of-stock{else}available-now{/if} hidden sm_lable">
										{if $product.quantity <= 0}{if $product.allow_oosp}{if isset($product.available_later) && $product.available_later}{$product.available_later}{else}{l s='In Stock'}{/if}{else}{if $sold_out_style==0}{l s='Out of stock'}{/if}{/if}{else}{if isset($product.available_now) && $product.available_now}{$product.available_now}{else}{l s='In Stock'}{/if}{/if}
									</span>
								{elseif (isset($product.quantity_all_versions) && $product.quantity_all_versions > 0)}
									<span class="available-dif sm_lable">
										{l s='Product available with different options'}
									</span>
								{else}
									<span class="out-of-stock sm_lable{if $sold_out_style>0} hidden{/if}">
										{l s='Out of stock'}
									</span>
								{/if}
							</div>
						{/if}
					{/if}
					{if isset($product.color_list)}
						<div class="color-list-container {$smarty.capture.display_color_list}">{$product.color_list}</div>
					{/if}
	                {if $for_w!='hometab'}{hook h='displayAnywhere' function="getProductRatingAverage" id_product=$product.id_product mod='stthemeeditor' caller='stthemeeditor'}{/if}
	                {if isset($st_yotpo_sart) && $st_yotpo_sart && isset($st_yotpoAppkey) && $st_yotpoAppkey && $smarty.capture.st_yotpoDomain && $smarty.capture.st_yotpoLanguage}
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
	                {if $for_w=='category'}{hook h='displayAnywhere' function="getProductAttributes" id_product=$product.id_product mod='stthemeeditor' caller='stthemeeditor'}{/if}
	                {hook h="displayProductDeliveryTime" product=$product}
	                {hook h="displayProductPriceBlock" product=$product type="weight"}
	                <p class="product-desc {$smarty.capture.display_sd} " itemprop="description">{$product.description_short|strip_tags:'UTF-8'|truncate:360:'...'}</p>
	                <div class="act_box {if $st_display_add_to_cart==1} display_when_hover {elseif $st_display_add_to_cart==2} display_normal {/if}">
	                    {if $st_display_add_to_cart!=3}{$smarty.capture.pro_a_cart}{/if}
	                    <div class="act_box_inner">
	                    {$smarty.capture.pro_a_compare}
	                    {$smarty.capture.pro_a_wishlist}
	                    {if trim($smarty.capture.pro_quick_view)}
	                        {$smarty.capture.pro_quick_view}
	                    {/if}
	                    </div>
	                </div>
	        	</div>
	        </div>
		</li>
	{/foreach}
		{if $st_big_next && $for_w=="category" && $start!=$stop}
			<li class="col-lg-{(12/$smarty.capture.nbItemsPerLineDesktop)|replace:'.':'-'} col-md-{(12/$smarty.capture.nbItemsPerLine)|replace:'.':'-'} col-sm-{(12/$smarty.capture.nbItemsPerLineTablet)|replace:'.':'-'} col-xs-{(12/$smarty.capture.nbItemsPerLineMobile)|replace:'.':'-'} col-xxs-{(12/$smarty.capture.nbItemsPerLinePortrait)|replace:'.':'-'}
			{if $nbLiNext%$smarty.capture.nbItemsPerLineDesktop == 0} last-item-of-desktop-line{elseif $nbLiNext%$smarty.capture.nbItemsPerLineDesktop == 1} first-item-of-desktop-line{/if}{if $nbLiNext > ($nbLi - $totModuloDesktop)} last-desktop-line{/if}{if $nbLi < $smarty.capture.nbItemsPerLineDesktop} first-desktop-line{/if}
			{if $nbLiNext%$smarty.capture.nbItemsPerLine == 0} last-in-line{elseif $nbLiNext%$smarty.capture.nbItemsPerLine == 1} first-in-line{/if}{if $nbLiNext > ($nbLi - $totModulo)} last-line{/if}{if $nbLi < $smarty.capture.nbItemsPerLine} first-line{/if}
			{if $nbLiNext%$smarty.capture.nbItemsPerLineTablet == 0} last-item-of-tablet-line{elseif $nbLiNext%$smarty.capture.nbItemsPerLineTablet == 1} first-item-of-tablet-line{/if}{if $nbLiNext > ($nbLi - $totModuloTablet)} last-tablet-line{/if}{if $nbLi < $smarty.capture.nbItemsPerLineTablet} first-tablet-line{/if}
			{if $nbLiNext%$smarty.capture.nbItemsPerLineMobile == 0} last-item-of-mobile-line{elseif $nbLiNext%$smarty.capture.nbItemsPerLineMobile == 1} first-item-of-mobile-line{/if}{if $nbLiNext > ($nbLi - $totModuloMobile)} last-mobile-line{/if}{if $nbLi < $smarty.capture.nbItemsPerLineMobile} first-mobile-line{/if}
			{if $nbLiNext%$smarty.capture.nbItemsPerLinePortrait == 0} last-item-of-portrait-line{elseif $nbLiNext%$smarty.capture.nbItemsPerLinePortrait == 1} first-item-of-portrait-line{/if}{if $nbLiNext > ($nbLi - $totModuloPortrait)} last-portrait-line{/if}{if $nbLi < $smarty.capture.nbItemsPerLinePortrait} first-portrait-line{/if} big_page_next_wrap">
				{if $pages_nb > 1 && $p != $pages_nb}
					{assign var='p_next' value=$p+1}
					{if !isset($current_url)}
						{assign var='requestPage' value=$link->getPaginationLink('category', $category, false, false, true, false) scope=parent}
					{else}
						{assign var='requestPage' value=$current_url scope=parent}
					{/if}
					<div id="big_page_next" class="product-container">
						<a rel="nofollow" href="{$link->goPage($requestPage, $p_next)}" title="{l s='Next'}">
							<img src="{$img_prod_dir}{$lang_iso}-default-home_default.jpg" alt="{l s='Next'}" title="{l s='Next'}" width="{$smarty.capture.home_default_width}" height="{$smarty.capture.home_default_height}" />
							<div class="text_table_wrap">
						        <div class="text_table">
						            <div class="text_td text-center">
						                <div>{l s='Next'}</div>
						                <i class="icon-right"></i>
						            </div>
						        </div>
						    </div>
						</a>
					</div>
				{/if}
			</li>
		{/if}
	</ul>
{addJsDefL name=min_item}{l s='Please select at least one product' js=1}{/addJsDefL}
{addJsDefL name=max_item}{l s='You cannot add more than %d product(s) to the product comparison' sprintf=$comparator_max_item js=1}{/addJsDefL}
{/if}