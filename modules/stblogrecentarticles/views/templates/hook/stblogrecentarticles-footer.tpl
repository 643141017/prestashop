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
<!-- St Blog recent articles -->
<section id="st_blog_recent_article-footer" class="block col-xs-12 col-sm-3 col-md-3">
    <a href="javascript:;" class="opener visible-xs">&nbsp;</a>
    <h4 class="title_block">{l s='Recent articles' mod='stblogrecentarticles'}</h4>
    <div class="footer_block_content">
    {if is_array($blogs) && $blogs|count}
    <ul class="pro_column_list">
        {foreach $blogs as $blog}
        <li class="clearfix">
            <div class="pro_column_left">
            <a href="{$link->getModuleLink('stblog', 'article',['id_blog'=>$blog['id_st_blog'],'rewrite'=>$blog['link_rewrite']])|escape:'html'}" title="{$blog.name|escape:'htmlall':'UTF-8'}">
                <img src="{$blog.cover.links.thumb}" alt="{$blog.name|escape:'htmlall':'UTF-8'}" width="{$imageSize[1]['thumb'][0]}" height="{$imageSize[1]['thumb'][1]}" />
			</a>
            </div>
			<div class="pro_column_right">
				<p class="s_title_block nohidden"><a href="{$link->getModuleLink('stblog', 'article',['id_blog'=>$blog['id_st_blog'],'rewrite'=>$blog['link_rewrite']])|escape:'html'}" title="{$blog.name|escape:'htmlall':'UTF-8'}">{$blog.name|truncate:50:'...'|escape:html:'UTF-8'}</a></p><span class="date-add">{dateFormat date=$blog.date_add full=0}</span>
            </div>
        </li>
        {/foreach}
    </ul>
    {else}
        <p class="warning">{l s='No new posts' mod='stblogrecentarticles'}</p>
    {/if}
    </div>
</section>
<!-- /St Blog recent articles  -->