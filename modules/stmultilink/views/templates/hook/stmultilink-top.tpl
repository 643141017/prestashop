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

<!-- Block stlinkgroups top module -->
{foreach $link_groups as $link_group}
    <div id="multilink_{$link_group.id_st_multi_link_group}" class="stlinkgroups_top dropdown_wrap {if $link_group@first}first-item{/if} {if $link_group.hide_on_mobile} hidden-xs {/if} top_bar_item">
        <div class="dropdown_tri {if is_array($link_group['links']) && count($link_group['links'])} dropdown_tri_in {/if} header_item">
        {if $link_group.url}
            <a href="{$link_group.url|escape:'html'}" title="{$link_group.name|escape:'htmlall':'UTF-8'}" {if isset($link_group.nofollow) && $link_group.nofollow} rel="nofollow" {/if} {if isset($link_group.new_window) && $link_group.new_window} target="_blank" {/if}>
        {/if}
        {if $link_group.icon_class}<i class="{$link_group.icon_class}"></i>{/if}{$link_group.name|escape:'htmlall':'UTF-8'}
        {if $link_group.url}
            </a>
        {/if}
        </div>
        {if is_array($link_group['links']) && count($link_group['links'])}
        <div class="dropdown_list">
            <ul class="dropdown_list_ul custom_links_list">
    		{foreach $link_group['links'] as $link}
    			<li>
            		<a href="{$link.url|escape:'html'}" title="{$link.title|escape:html:'UTF-8'}" {if isset($link.nofollow) && $link.nofollow} rel="nofollow" {/if} {if $link.new_window} target="_blank" {/if}>
                        {if $link.icon_class}<i class="{$link.icon_class}"></i>{/if}{$link.label|escape:html:'UTF-8'}
            		</a>
    			</li>
    		{/foreach}
    		</ul>
        </div>
        {/if}
    </div>
{/foreach}
<!-- /Block stlinkgroups top module -->