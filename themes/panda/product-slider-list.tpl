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
<div class="slides owl-navigation-tr">
{foreach $products as $product}
    {if $product@first || $product@index is div by $slider_items}
    <div class="slides_list">
    {/if}
        <div class="pro_column_box clearfix">
            <a href="{$product.link|escape:'html'}" title="{$product.name|escape:html:'UTF-8'}" class="pro_column_left">
    		<img src="{$link->getImageLink($product.link_rewrite, $product.id_image, 'small_default')}" alt="{$product.name|escape:html:'UTF-8'}" height="{$smallSize.height}" width="{$smallSize.width}" class="replace-2x img-responsive" />
    		</a>
    		<div class="pro_column_right">
    			<p class="s_title_block nohidden"><a href="{$product.link|escape:'html'}" title="{$product.name|escape:html:'UTF-8'}">{$product.name|truncate:50:'...'|escape:html:'UTF-8'}</a></p>
                {if $product.show_price AND !isset($restricted_country_mode) AND !$PS_CATALOG_MODE}
                    <span class="price">
                    {if !$priceDisplay}{convertPrice price=$product.price}
                    {else}
                    {convertPrice price=$product.price_tax_exc}
                    {/if}
                    </span>
                    {if isset($product.reduction) && $product.reduction}<span class="old_price">{convertPrice price=$product.price_without_reduction}</span>{/if}
                {/if}
    		</div>
        </div>
    {if $product@last || $product@iteration is div by $slider_items}
    </div>
    {/if}
{/foreach}
</div>