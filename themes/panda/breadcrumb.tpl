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

<!-- Breadcrumb -->
{if isset($smarty.capture.path)}{assign var='path' value=$smarty.capture.path}{/if}
<section class="breadcrumb"  xmlns:v="http://rdf.data-vocabulary.org/#">
    <ul itemprop="breadcrumb">
	<li typeof="v:Breadcrumb"><a class="home" href="{$base_dir}" title="{l s='Return to Home'}" rel="v:url" property="v:title">{l s='Home'}</a></li>{if isset($path) AND $path}<li class="navigation-pipe"{if isset($category) && isset($category->id_category) && $category->id_category == 1} style="display:none;"{/if}>{$navigationPipe}</li>
		{if !$path|strpos:'li>' !== false}
			<li typeof="v:Breadcrumb" class="navigation_page">{$path}</li>
		{else}
			{$path}
		{/if}
	{/if}
    </ul>
</section>
{if isset($smarty.get.search_query) && isset($smarty.get.results) && $smarty.get.results > 1 && isset($smarty.server.HTTP_REFERER)}
<div id="search_return" class="pull-right hidden-xs">
	{capture}{if isset($smarty.get.HTTP_REFERER) && $smarty.get.HTTP_REFERER}{$smarty.get.HTTP_REFERER}{elseif isset($smarty.server.HTTP_REFERER) && $smarty.server.HTTP_REFERER}{$smarty.server.HTTP_REFERER}{/if}{/capture}
	<a href="{$smarty.capture.default|escape:'html':'UTF-8'|secureReferrer|regex_replace:'/[\?|&]content_only=1/':''}" name="back" rel="nofollow">
		<i class="icon-left-open-3"></i> {l s='Back to Search results for "%s" (%d other results)' sprintf=[$smarty.get.search_query,$smarty.get.results]}
	</a>
</div>
{/if}
<!-- /Breadcrumb -->