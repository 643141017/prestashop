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
<!-- MODULE st compare -->
{if $comparator_max_item}
	<nav class="st-menu" id="side_products_compared">
		<div class="divscroll">
			<div class="wrapperscroll">
				<div class="st-menu-header">
					<h3 class="st-menu-title">{l s='Product Comparison' mod='stcompare'}</h3>
			    	<a href="javascript:;" class="close_right_side" title="{l s='Close' mod='stcompare'}"><i class="icon-angle-double-right icon-0x"></i></a>
				</div>
				<div id="stcompare_content">
					<ul id="products_compared_list" class="pro_column_list">
						{if isset($products) && is_array($products)&& count($products)}
							{assign var='taxes_behavior' value=false}
							{if $use_taxes && (!$priceDisplay  || $priceDisplay == 2)}
								{assign var='taxes_behavior' value=true}
							{/if}
							{foreach from=$products item=product name=for_products}
								<li id="products_compared_{$product->id}" class="pro_column_box clearfix">
				        			{assign var='products_compared_link' value=$product->getLink()} 
									<a href="{$products_compared_link|escape:'html':'UTF-8'}" title="{$product->name|escape:'html':'UTF-8'}" class="pro_column_left products-block-image">
										<img src="{$link->getImageLink($product->link_rewrite, $product->id_image, 'small_default')|escape:'html':'UTF-8'}" width="{$smallSize.width}" height="{$smallSize.height}" alt="{$product->name|escape:html:'UTF-8'}" title="{$product->name|escape:html:'UTF-8'}" class="replace-2x img-responsive" />
									</a>
									<div class="pro_column_right">
										<p class="s_title_block nohidden">
					                        <a class="stcompare-product-name" href="{$products_compared_link|escape:'html':'UTF-8'}" title="{$product->name|escape:'html':'UTF-8'}">
					                            {$product->name|truncate:45:'...'|escape:'html':'UTF-8'}
					                        </a>
					                    </p>
					                    <a class="stcompare_remove" href="javascript:;" title="{l s='Remove'}" data-id-product="{$product->id}">
											<i class="icon-cancel"></i>
										</a>
									</div>
								</li>
							{/foreach}
						{/if}
					</ul>
					<p id="stcompare_no_products" class=" alert alert-warning {if count($compared_products)} unvisible{/if}">{l s='There are no products selected for comparison.' mod='stcompare'}</p>
					<div id="stcompare_btns" class="row">
						<div class="col-xs-6">
							<span class="side_continue btn btn-default btn-bootstrap" title="{l s='Close' mod='stcompare'}">
								{l s='Close' mod='stcompare'}
							</span>
						</div>
						<div class="col-xs-6">
							<a id="button_order_cart" class="btn btn-default btn-bootstrap" href="{$link->getPageLink('products-comparison')|escape:'html'}" title="{l s='Compare Products' mod='stcompare'}" rel="nofollow">{l s='Compare' mod='stcompare'}</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</nav>
{/if}
<!-- /MODULE st compare -->