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
<!-- /MODULE Rightbar cart -->
{if !$PS_CATALOG_MODE}
<nav class="st-menu" id="side_products_cart">
	<div class="divscroll">
		<div class="wrapperscroll">
			<div class="st-menu-header">
				<h3 class="st-menu-title">{l s='Shopping cart' mod='blockcart_mod'}</h3>
		    	<a href="javascript:;" class="close_right_side" title="{l s='Close' mod='blockcart_mod'}"><i class="icon-angle-double-right icon-0x"></i></a>
			</div>
			<div id="side_cart_block" class="cart_block exclusive">
				<div class="block_content">
					<div class="cart_block_list{if isset($blockcart_top) && !$blockcart_top}{if isset($colapseExpandStatus) && $colapseExpandStatus eq 'expanded' || !$ajax_allowed || !isset($colapseExpandStatus)} expanded{else} collapsed unvisible{/if}{/if}">
						{if $products}
							<dl class="products">
								{foreach from=$products item='product' name='myLoop'}
									{assign var='productId' value=$product.id_product}
									{assign var='productAttributeId' value=$product.id_product_attribute}
									<dt data-id="cart_block_product_{$product.id_product}_{if $product.id_product_attribute}{$product.id_product_attribute}{else}0{/if}_{if $product.id_address_delivery}{$product.id_address_delivery}{else}0{/if}" class="clearfix {if $smarty.foreach.myLoop.first}first_item{elseif $smarty.foreach.myLoop.last}last_item{else}item{/if}">
										<a class="cart-images" href="{$link->getProductLink($product.id_product, $product.link_rewrite, $product.category)|escape:'html':'UTF-8'}" title="{$product.name|escape:'html':'UTF-8'}"><img src="{$link->getImageLink($product.link_rewrite, $product.id_image, 'cart_default')}" width="{$cartSize.width}" height="{$cartSize.height}" alt="{$product.name|escape:'html':'UTF-8'}" /></a>

										<span class="quantity-formated"><span class="quantity">{$product.cart_quantity}</span>x</span><a class="cart_block_product_name" href="{$link->getProductLink($product, $product.link_rewrite, $product.category, null, null, $product.id_shop, $product.id_product_attribute)|escape:'html':'UTF-8'}" title="{$product.name|escape:'html':'UTF-8'}">{$product.name|truncate:25:'...'|escape:'html':'UTF-8'}</a>
										<span class="remove_link">
											{if !isset($customizedDatas.$productId.$productAttributeId) && (!isset($product.is_gift) || !$product.is_gift)}
												<a class="ajax_cart_block_remove_link" href="{$link->getPageLink('cart', true, NULL, 'delete=1&amp;id_product={$product.id_product}&amp;ipa={$product.id_product_attribute}&amp;id_address_delivery={$product.id_address_delivery}&amp;token={$static_token}', true)|escape:'html':'UTF-8'}" rel="nofollow" title="{l s='remove this product from my cart' mod='blockcart_mod'}"><i class="icon-cancel icon-small"></i></a>
											{/if}
										</span>
										<span class="price">
											{if !isset($product.is_gift) || !$product.is_gift}
												{if $priceDisplay == $smarty.const.PS_TAX_EXC}{displayWtPrice p="`$product.total`"}{else}{displayWtPrice p="`$product.total_wt`"}{/if}
											{else}
												{l s='Free!' mod='blockcart_mod'}
											{/if}
										</span>
										{if isset($product.attributes_small)}
											<div class="product-atributes">
												<a href="{$link->getProductLink($product, $product.link_rewrite, $product.category, null, null, $product.id_shop, $product.id_product_attribute)|escape:'html':'UTF-8'}" title="{l s='Product detail' mod='blockcart_mod'}">{$product.attributes_small}</a>
											</div>
										{/if}
									</dt>
									{if isset($product.attributes_small)}
										<dd data-id="cart_block_combination_of_{$product.id_product}{if $product.id_product_attribute}_{$product.id_product_attribute}{/if}_{$product.id_address_delivery|intval}" class="{if $smarty.foreach.myLoop.first}first_item{elseif $smarty.foreach.myLoop.last}last_item{else}item{/if}">
									{/if}
									<!-- Customizable datas -->
									{if isset($customizedDatas.$productId.$productAttributeId[$product.id_address_delivery])}
										{if !isset($product.attributes_small)}
											<dd data-id="cart_block_combination_of_{$product.id_product}_{if $product.id_product_attribute}{$product.id_product_attribute}{else}0{/if}_{if $product.id_address_delivery}{$product.id_address_delivery}{else}0{/if}" class="{if $smarty.foreach.myLoop.first}first_item{elseif $smarty.foreach.myLoop.last}last_item{else}item{/if}">
										{/if}
										<ul class="cart_block_customizations" data-id="customization_{$productId}_{$productAttributeId}">
											{foreach from=$customizedDatas.$productId.$productAttributeId[$product.id_address_delivery] key='id_customization' item='customization' name='customizations'}
												<li name="customization">
													<div data-id="deleteCustomizableProduct_{$id_customization|intval}_{$product.id_product|intval}_{$product.id_product_attribute|intval}_{$product.id_address_delivery|intval}" class="deleteCustomizableProduct">
														<a class="ajax_cart_block_remove_link" href="{$link->getPageLink("cart", true, NULL, "delete=1&amp;id_product={$product.id_product|intval}&amp;ipa={$product.id_product_attribute|intval}&amp;id_customization={$id_customization}&amp;token={$static_token}", true)|escape:"html":"UTF-8"}" rel="nofollow">&nbsp;</a>
													</div>
													{if isset($customization.datas.$CUSTOMIZE_TEXTFIELD.0)}
														{$customization.datas.$CUSTOMIZE_TEXTFIELD.0.value|replace:"<br />":" "|truncate:28:'...'|escape:'html':'UTF-8'}
													{else}
														{l s='Customization #%d:' sprintf=$id_customization|intval mod='blockcart_mod'}
													{/if}
												</li>
											{/foreach}
										</ul>
										{if !isset($product.attributes_small)}</dd>{/if}
									{/if}
									{if isset($product.attributes_small)}</dd>{/if}
								{/foreach}
							</dl>
						{/if}
						<p class="cart_block_no_products{if $products} unvisible{/if} alert alert-warning">
							{l s='No products' mod='blockcart_mod'}
						</p>
						{if $discounts|@count > 0}
							<table class="vouchers"{if $discounts|@count == 0} style="display:none;"{/if}>
								{foreach from=$discounts item=discount}
									{if $discount.value_real > 0}
										<tr class="bloc_cart_voucher" data-id="bloc_cart_voucher_{$discount.id_discount}">
											<td class="quantity" width="10%">1x</td>
											<td class="name" title="{$discount.description}" width="60%">
												{$discount.name|truncate:18:'...'|escape:'html':'UTF-8'}
											</td>
											<td class="price">
												-{if $priceDisplay == 1}{convertPrice price=$discount.value_tax_exc}{else}{convertPrice price=$discount.value_real}{/if}
											</td>
											<td class="delete">
												{if strlen($discount.code)}
													<a class="delete_voucher hidden" href="{$link->getPageLink("$order_process", true)}?deleteDiscount={$discount.id_discount}" title="{l s='Delete' mod='blockcart_mod'}" rel="nofollow">
														<i class="icon-cancel icon-small"></i>
													</a>
												{/if}
											</td>
										</tr>
									{/if}
								{/foreach}
							</table>
						{/if}
						<div class="cart-prices {if !$products} unvisible{/if}">
							<div class="cart-prices-line first-line">
								<span class="price cart_block_shipping_cost ajax_cart_shipping_cost">
									{if $shipping_cost_float == 0}
										{l s='Free shipping!' mod='blockcart_mod'}
									{else}
										{$shipping_cost}
									{/if}
								</span>
								<span>
									{l s='Shipping' mod='blockcart_mod'}
								</span>
							</div>
							{if $show_wrapping}
								<div class="cart-prices-line">
									{assign var='cart_flag' value='Cart::ONLY_WRAPPING'|constant}
									<span class="price cart_block_wrapping_cost">
										{if $priceDisplay == 1}
											{convertPrice price=$cart->getOrderTotal(false, $cart_flag)}{else}{convertPrice price=$cart->getOrderTotal(true, $cart_flag)}
										{/if}
									</span>
									<span>
										{l s='Wrapping' mod='blockcart_mod'}
									</span>
							   </div>
							{/if}
							{if $show_tax && isset($tax_cost)}
								<div class="cart-prices-line">
									<span class="price cart_block_tax_cost ajax_cart_tax_cost">{$tax_cost}</span>
									<span>{l s='Tax' mod='blockcart_mod'}</span>
								</div>
							{/if}
							<div class="cart-prices-line last-line">
								<span class="price cart_block_total ajax_block_cart_total">{$total}</span>
								<span>{l s='Total' mod='blockcart_mod'}</span>
							</div>
							{if $use_taxes && $display_tax_label == 1 && $show_tax}
								<p>
								{if $priceDisplay == 0}
									{l s='Prices are tax included' mod='blockcart_mod'}
								{elseif $priceDisplay == 1}
									{l s='Prices are tax excluded' mod='blockcart_mod'}
								{/if}
								</p>
							{/if}
						</div>
						<div class="cart-buttons{if !$products} unvisible{/if} row">
							<div class="col-xs-6">
								<span class="side_continue btn btn-default btn-bootstrap" title="{l s='Close' mod='blockcart_mod'}">
									{l s='Close' mod='blockcart_mod'}
								</span>
							</div>
							<div class="col-xs-6">
								<a id="button_order_cart" class="btn btn-default btn-bootstrap" href="{$link->getPageLink("$order_process", true)|escape:"html":"UTF-8"}" title="{l s='Check out' mod='blockcart_mod'}" rel="nofollow">{l s='Check out' mod='blockcart_mod'}</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</nav>
{/if}
<!-- /MODULE Rightbar cart -->