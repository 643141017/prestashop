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
{capture name=path}<a href="{$link->getPageLink('my-account', true)|escape:'html':'UTF-8'}">{l s='My account'}</a><span class="navigation-pipe">{$navigationPipe}</span><span class="navigation_page">{l s='My vouchers'}</span>{/capture}

<h1 class="page-heading">
	{l s='My vouchers'}
</h1>

{if isset($cart_rules) && count($cart_rules) && $nb_cart_rules}
	<table class="discount table table-bordered footab resp_table">
		<thead>
			<tr>
				<th data-sort-ignore="true" class="discount_code first_item">{l s='Code'}</th>
				<th data-sort-ignore="true" class="discount_description item">{l s='Description'}</th>
				<th class="discount_quantity item">{l s='Quantity'}</th>
				<th data-sort-ignore="true" data-hide="phone,tablet" class="discount_value item">{l s='Value'}*</th>
				<th data-hide="phone,tablet" class="discount_minimum item">{l s='Minimum'}</th>
				<th data-sort-ignore="true" data-hide="phone,tablet" class="discount_cumulative item">{l s='Cumulative'}</th>
				<th data-hide="phone" class="discount_expiration_date last_item">{l s='Expiration date'}</th>
			</tr>
		</thead>
		<tbody>
			{foreach from=$cart_rules item=discountDetail name=myLoop}
				<tr class="{if $smarty.foreach.myLoop.first}first_item{elseif $smarty.foreach.myLoop.last}last_item{else}item{/if} {if $smarty.foreach.myLoop.index % 2}alternate_item{/if}">
					<td class="discount_code" data-title="{l s='Code'}">
						<div class="mobile_table_content">{$discountDetail.code}</div>
					</td>
					<td class="discount_description" data-title="{l s='Description'}">
						<div class="mobile_table_content">{$discountDetail.name}</div>
					</td>
					<td data-value="{$discountDetail.quantity_for_user}" class="discount_quantity" data-title="{l s='Quantity'}">
						<div class="mobile_table_content">{$discountDetail.quantity_for_user}</div>
					</td>
					<td class="discount_value" data-title="{l s='Value'}">
						<div class="mobile_table_content">
						{if $discountDetail.id_discount_type == 1}
							{$discountDetail.value|escape:'html':'UTF-8'}%
						{elseif $discountDetail.id_discount_type == 2}
							{convertPrice price=$discountDetail.value} ({if $discountDetail.reduction_tax == 1}{l s='Tax included'}{else}{l s='Tax excluded'}{/if})
						{elseif $discountDetail.id_discount_type == 3}
							{l s='Free shipping'}
						{else}
							-
						{/if}
						</div>
					</td>
					<td class="discount_minimum" data-value="{if $discountDetail.minimal == 0}0{else}{$discountDetail.minimal}{/if}" data-title="{l s='Minimum'}">
						<div class="mobile_table_content">
						{if $discountDetail.minimal == 0}
							{l s='None'}
						{else}
							{convertPrice price=$discountDetail.minimal}
						{/if}
						</div>
					</td>
					<td class="discount_cumulative" data-title="{l s='Cumulative'}">
						<div class="mobile_table_content">
						{if $discountDetail.cumulable == 1}
							<i class="icon-ok icon"></i> {l s='Yes'}
						{else}
							<i class="icon-remove icon"></i> {l s='No'}
						{/if}
						</div>
					</td>
					<td class="discount_expiration_date" data-value="{$discountDetail.date_to|regex_replace:"/[\-\:\ ]/":""}" data-title="{l s='Expiration date'}">
						<div class="mobile_table_content">
						{dateFormat date=$discountDetail.date_to}
						</div>
					</td>
				</tr>
			{/foreach}
		</tbody>
	</table>
{else}
	<p class="alert alert-warning">{l s='You do not have any vouchers.'}</p>
{/if}

<ul class="footer_links clearfix">
    <li class="pull-left">
        <a href="{$link->getPageLink('my-account', true)|escape:'html':'UTF-8'}" title="{l s='Back to Your Account'}" rel="nofollow">
            <i class="icon-left icon-mar-lr2"></i>{l s='Back to Your Account'}
        </a>
    </li>
    <li class="pull-right">
        <a href="{$base_dir}" title="{l s='Home'}" rel="nofollow">
            <i class="icon-home icon-mar-lr2"></i>{l s='Home'}
        </a>
    </li>
</ul>
