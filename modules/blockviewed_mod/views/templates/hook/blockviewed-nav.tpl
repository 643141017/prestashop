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
<div id="viewed-top" class="top_bar_item dropdown_wrap">
	<div class="dropdown_tri dropdown_tri_in header_item">
        <i class="icon-history"></i>{l s='Recently Viewed' mod='blockviewed_mod'}
    </div>
	<div class="dropdown_list">
		{capture name="cart_default_width"}{getWidthSize type='cart_default'}{/capture}
		{capture name="cart_default_height"}{getHeightSize type='cart_default'}{/capture}
		<!-- Block Viewed products -->
		<div id="viewed-products_block_nav">
			{if isset($productsViewedObj) && count($productsViewedObj)}
			<div class="products-block">
				<ul class="pro_column_list">
					{foreach from=$productsViewedObj item=viewedProduct name=myLoop}
						<li class="pro_column_box clearfix{if $smarty.foreach.myLoop.last} last_item{elseif $smarty.foreach.myLoop.first} first_item{else} item{/if}">
							<a
							class="pro_column_left products-block-image" 
							href="{$viewedProduct->product_link|escape:'html':'UTF-8'}" 
							title="{l s='More about %s' mod='blockviewed_mod' sprintf=[$viewedProduct->name|escape:'html':'UTF-8']}" >
								<img class="replace-2x img-responsive" 
								src="{if isset($viewedProduct->id_image) && $viewedProduct->id_image}{$link->getImageLink($viewedProduct->link_rewrite, $viewedProduct->cover, 'cart_default')}{else}{$img_prod_dir}{$lang_iso}-default-cart_default.jpg{/if}" 
								alt="{$viewedProduct->legend|escape:'html':'UTF-8'}" 
								width="{$smarty.capture.cart_default_width}" height="{$smarty.capture.cart_default_height}" />
							</a>
							<div class="pro_column_right product-content">
								<p class="s_title_block nohidden">
									<a class="product-name" 
									href="{$viewedProduct->product_link|escape:'html':'UTF-8'}" 
									title="{l s='More about %s' mod='blockviewed_mod' sprintf=[$viewedProduct->name|escape:'html':'UTF-8']}">
										{$viewedProduct->name|truncate:25:'...'|escape:'html':'UTF-8'}
									</a>
								</p>
								<p class="product-description">{$viewedProduct->description_short|strip_tags:'UTF-8'|truncate:40}</p>
							</div>
						</li>
					{/foreach}
				</ul>
			</div>
			{else}
				<div class="viewed_products_no_products alert alert-warning">
					{l s='No products' mod='blockviewed_mod'}
				</div>
			{/if}
		</div>
	</div>
</div>