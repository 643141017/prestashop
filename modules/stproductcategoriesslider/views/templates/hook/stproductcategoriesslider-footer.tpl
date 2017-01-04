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

<!-- MODULE Product categories slider -->
{if isset($product_categories) && count($product_categories)}
    {foreach $product_categories as $p_c}
        <section id="product_categories_footer_{$hook_hash}" class="product_categories_footer block col-xs-12 col-sm-3 col-md-3">
            <a href="javascript:;" class="opener visible-xs">&nbsp;</a>
            <h4 class="title_block"><a href="{$link->getCategoryLink($p_c.id_category, $p_c.link_rewrite)|escape:'html'}" title="{$p_c.name|escape:'htmlall':'UTF-8'}">{$p_c.name|escape:'htmlall':'UTF-8'}</a></h4>
            <div class="footer_block_content">
            {if isset($p_c.products) && is_array($p_c.products) && $p_c.products|count}
            <ul class="pro_column_list">
                {foreach $p_c.products as $product}
                <li class="clearfix">
                    <div class="pro_column_left">
                    <a href="{$product.link|escape:'html'}" title="{$product.name|escape:html:'UTF-8'}">
        			<img src="{$link->getImageLink($product.link_rewrite, $product.id_image, 'small_default')}" alt="{$product.name|escape:html:'UTF-8'}" height="{$smallSize.height}" width="{$smallSize.width}" />
        			</a>
                    </div>
        			<div class="pro_column_right">
        				<h4 class="s_title_block nohidden"><a href="{$product.link|escape:'html'}" title="{$product.name|escape:html:'UTF-8'}">{$product.name|truncate:50:'...'|escape:html:'UTF-8'}</a></h4>
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
                </li>
                {/foreach}
            </ul>
            {else}
                <p>{l s='No products' mod='stproductcategoriesslider'}</p>
            {/if}
            </div>
        </section>
    {/foreach}
{/if}
<!-- /MODULE Product categories slider -->