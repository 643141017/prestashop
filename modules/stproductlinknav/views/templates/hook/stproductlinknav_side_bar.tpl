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
<!-- MODULE St Product Link Nav  -->
{if $nav_products['prev'] || $nav_products['next']}
	{foreach $nav_products as $nav => $nav_product}
		{if $nav_product}
			<div class="product_link_nav rightbar_wrap">
			    {assign var='product_link' value=$link->getProductLink($nav_product.id_product, $nav_product.link_rewrite, $nav_product.category, $nav_product.ean13)} 
			    <a id="rightbar-product_link_nav_{$nav}" class="rightbar_tri icon_wrap" href="{$product_link|escape:'html':'UTF-8'}" title="{if $nav=='prev'}{l s='Previous product' mod='stproductlinknav'}{/if}{if $nav=='next'}{l s='Next product' mod='stproductlinknav'}{/if}"><i class="icon-{if $nav=='prev'}left{/if}{if $nav=='next'}right{/if} icon-0x"></i><span class="icon_text">{if $nav=='prev'}{l s='Prev' mod='stproductlinknav'}{/if}{if $nav=='next'}{l s='Next' mod='stproductlinknav'}{/if}</span></a>
			</div>
		{/if}
	{/foreach}
{/if}
<!-- /MODULE St Product Link Nav -->