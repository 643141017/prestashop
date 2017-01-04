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
<!-- AddThis Header BEGIN -->
<meta property="og:site_name" content="{$shop_name|escape:'html':'UTF-8'}" />
<meta property="og:url" content="http://{$smarty.server.HTTP_HOST}{$smarty.server.REQUEST_URI}" />
{if $page_name=='product'}
<meta property="og:type" content="product" />
<meta property="og:title" content="{$meta_title|escape:'html':'UTF-8'}" />
<meta property="og:description" content="{$meta_description|escape:html:'UTF-8'}" />
<meta property="og:image" content="{$link->getImageLink($product->link_rewrite[$id_lang], $cover.id_image, 'thickbox_default')}" />
{elseif $page_name=='module-stblog-article'}
<meta property="og:type" content="article" />
<meta property="og:title" content="{$meta_title|escape:'html':'UTF-8'}" />
<meta property="og:description" content="{$meta_description|escape:html:'UTF-8'}" />
{if $blog->type==1 && isset($cover)}
    <meta property="og:image" content="{$cover.links.large}" />
{/if}
{if $blog->type==2 && isset($galleries) && $galleries|count}
    {foreach $galleries as $gallery}
        {if $gallery@first}<meta property="og:image" content="{$gallery.links.large}" />{/if}
    {/foreach}
{elseif $blog->type==2 && isset($cover)}
    <meta property="og:image" content="{$cover.links.large}" />
{/if}
{if $blog->type==3 && $blog->video}
{elseif $blog->type==3 && isset($cover)}
    <meta property="og:image" content="{$cover.links.large}" />
{/if}
{else}
<meta property="og:type" content="website" />
<meta property="og:title" content="{$meta_title|escape:'html':'UTF-8'}" />
<meta property="og:description" content="{$meta_description|escape:html:'UTF-8'}" />
{if isset($fb_image_link) && $fb_image_link}
<meta property="og:image" content="{$fb_image_link}" />
{elseif isset($logo_url) && $logo_url}
<meta property="og:image" content="{$logo_url}" />
{/if}
{/if}

<!-- AddThis Header END -->