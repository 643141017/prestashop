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
<!-- Block currencies module -->
<div id="currencies_block_top_mod" class="dropdown_wrap top_bar_item">
    <div class="dropdown_tri {if count($currencies) > 1} dropdown_tri_in {/if} header_item">
        {if $display_sign!=1}{$blockcurrencies_sign}&nbsp;{/if}{if $display_sign!=2}{foreach from=$currencies key=k item=f_currency}{if $cookie->id_currency == $f_currency.id_currency}{$f_currency.iso_code}{/if}{/foreach}{/if}
    </div>
    {if count($currencies) > 1}
	<div class="dropdown_list">
	    <form id="setCurrency" action="{$request_uri}" method="post">
	        <ul class="dropdown_list_ul">
				{foreach from=$currencies key=k item=f_currency}
	            {if $cookie->id_currency != $f_currency.id_currency}
					<li>
						<a href="javascript:setCurrency({$f_currency.id_currency});" title="{$f_currency.name}" rel="nofollow">{if $display_sign!=1}{$f_currency.sign}&nbsp;{/if}{if $display_sign!=2}{$f_currency.iso_code}{/if}</a>
					</li>
	            {/if}
				{/foreach}
			</ul>
			<input type="hidden" name="id_currency" id="id_currency" value=""/>
			<input type="hidden" name="SubmitCurrency" value="" />
		</form>
    </div>
    {/if}
</div>
<!-- /Block currencies module -->