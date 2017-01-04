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
<div class="st-menu" id="side_viewed">
	<div class="divscroll">
		<div class="wrapperscroll">
			<div class="st-menu-header">
				<h3 class="st-menu-title">{l s='Recently Viewed' mod='blockviewed_mod'}</h3>
		    	<a href="javascript:;" class="close_right_side" title="{l s='Close' mod='blockviewed_mod'}"><i class="icon-angle-double-right icon-0x"></i></a>
			</div>
			<div id="viewed_box">
				<!-- Block Viewed products -->
				<div id="viewed-products_block_side" class="block">
					{if isset($productsViewedObj) && count($productsViewedObj)}
					<div class="products-block">
						<ul class="pro_big_list">
							{foreach from=$productsViewedObj item=viewedProduct name=myLoop}
								<li class="pro_big_box clearfix{if $smarty.foreach.myLoop.last} last_item{elseif $smarty.foreach.myLoop.first} first_item{else} item{/if}">
									<a
									class="pro_big_top products-block-image" 
									href="{$viewedProduct->product_link|escape:'html':'UTF-8'}" 
									title="{l s='More about %s' mod='blockviewed_mod' sprintf=[$viewedProduct->name|escape:'html':'UTF-8']}" >
										<img class="replace-2x img-responsive" 
										src="{if isset($viewedProduct->id_image) && $viewedProduct->id_image}{$link->getImageLink($viewedProduct->link_rewrite, $viewedProduct->cover, 'home_default')}{else}{$img_prod_dir}{$lang_iso}-default-home_default.jpg{/if}" 
										alt="{$viewedProduct->legend|escape:'html':'UTF-8'}" 
										width="{$smarty.capture.home_default_width}" height="{$smarty.capture.home_default_height}" />
									</a>
									<div class="pro_big_bottom product-content">
										<p class="s_title_block nohidden">
											<a class="product-name" 
											href="{$viewedProduct->product_link|escape:'html':'UTF-8'}" 
											title="{l s='More about %s' mod='blockviewed_mod' sprintf=[$viewedProduct->name|escape:'html':'UTF-8']}">
												{$viewedProduct->name|truncate:40:'...'|escape:'html':'UTF-8'}
											</a>
										</p>
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
	</div>
</div>