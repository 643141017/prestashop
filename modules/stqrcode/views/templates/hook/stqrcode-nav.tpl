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
<div id="qrcode-top" class="top_bar_item dropdown_wrap">
	<div class="dropdown_tri dropdown_tri_in header_item">
        <i class="icon-qrcode"></i>{l s='QR code' mod='stqrcode'}
    </div>
	<div class="dropdown_list">
		<a href="{$image_link}" class="qrcode_link" target="_blank" rel="nofollow" title="{l s='QR code' mod='stqrcode'}">
			{if $load_on_hover}
			<i class="icon-spin5 animate-spin icon-1x"></i>
			{else}
			<img src="{$image_link}" width="{$size}" height="{$size}" />
			{/if}
		</a>
	</div>
</div>