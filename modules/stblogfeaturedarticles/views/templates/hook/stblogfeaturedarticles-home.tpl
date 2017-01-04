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
<!-- St Blog featured articles -->
{if isset($homeverybottom) && $homeverybottom}<div class="wide_container"><div class="container">{/if}
<section id="st_blog_featured_article" class="block section">
	<h3 class="title_block {if $title_position} title_block_center {/if}"><span>{l s='Featured articles' mod='stblogfeaturedarticles'}</span></h3>
    {if is_array($blogs) && $blogs|count}
    {if $display_as_grid==0 || $display_as_grid==1 }
    <div id="featured_article_slider" class="products_slider">
	<div class="slides {if $direction_nav>1} owl-navigation-lr {if $direction_nav==4} owl-navigation-circle {else} owl-navigation-rectangle {/if} {elseif $direction_nav==1} owl-navigation-tr{/if}">
	{foreach $blogs as $blog}
        <div class="block_blog {if $blog@first}first_item{elseif $blog@last}last_item{/if} {if $display_as_grid==1}blog_medium_list{/if}">
            <div class="blog_image">
                <a href="{$blog.link|escape:'html'}" title="{$blog.name|escape:'htmlall':'UTF-8'}">
                <img {if $lazy_load} data-src="{$blog.cover.links.medium}" {else} src="{$blog.cover.links.medium}" {/if} alt="{$blog.name|escape:'htmlall':'UTF-8'}" width="{$imageSize[1]['medium'][0]}" height="{$imageSize[1]['medium'][1]}" class="hover_effect {if $lazy_load} lazyOwl {/if}" />
                {if $blog.type==2}
                    <span class="icon_wrap"><i class="icon-camera-2 icon-1x"></i></span>
                {elseif $blog.type==3}
                    <span class="icon_wrap"><i class="icon-video icon-1x"></i></span>
                {/if}
                </a>
            </div>
            <p class="s_title_block"><a href="{$blog.link|escape:'html'}" title="{$blog.name|escape:'htmlall':'UTF-8'}">{$blog.name|escape:'htmlall':'UTF-8'|truncate:70:'...'}</a></p>

            {if $display_as_grid==1 }
                {if $blog.content_short}<p class="blok_blog_short_content">{$blog.content_short|strip_tags:'UTF-8'|truncate:240:'...'}<a href="{$blog.link|escape:'html'}" title="{l s='Read More' mod='stblogfeaturedarticles'}" class="go">{l s='Read More' mod='stblogfeaturedarticles'}</a></p>{/if}
                <div class="blog_info">
                    <span class="date-add">{dateFormat date=$blog.date_add full=0}</span>
                    {hook h='displayAnywhere' function="getCommentNumber" id_blog=$blog.id_st_blog link_rewrite=$blog.link_rewrite mod='stblogcomments' caller='stblogcomments'}
                    {if $display_viewcount}<span><i class="icon-eye-2 icon-mar-lr2"></i>{$blog.counter}</span>{/if}
                </div>
            {else}
                {if $blog.content_short}<p class="blok_blog_short_content">{$blog.content_short|strip_tags:'UTF-8'|truncate:120:'...'}</p>{/if}
                <div class="blog_read_more">
                    <a href="{$blog.link|escape:'html'}" title="{$blog.name|escape:'htmlall':'UTF-8'}" class="btn btn-default">{l s='Read more' mod='stblogfeaturedarticles'}</a>
                </div>
            {/if}
        </div>
    {/foreach}
    </div>
    </div>

    <script type="text/javascript">
    //<![CDATA[
    {literal}
    jQuery(function($) { 
        var owl = $("#featured_article_slider .slides");
        owl.owlCarousel({
            {/literal}
            autoPlay: {if $slider_slideshow}{$slider_s_speed|default:5000}{else}false{/if},
            slideSpeed: {$slider_a_speed},
            stopOnHover: {if $slider_pause_on_hover}true{else}false{/if},
            lazyLoad: {if $lazy_load}true{else}false{/if},
            scrollPerPage: {if $slider_move}true{else}false{/if},
            rewindNav: {if $rewind_nav}true{else}false{/if},
            {if isset($column_slider) && $column_slider}
            singleItem : true,
            navigation: true,
            pagination: false,
            {else}
            navigation: {if $direction_nav}true{else}false{/if},
            pagination: {if $control_nav}true{else}false{/if},
            {literal}
            itemsCustom : [
                {/literal}
                {if $sttheme.responsive && !$sttheme.version_switching}
                {if $sttheme.responsive_max==2}{literal}[1420, {/literal}{$pro_per_xl}{literal}],{/literal}{/if}
                {if $sttheme.responsive_max>=1}{literal}[1180, {/literal}{$pro_per_lg}{literal}],{/literal}{/if}
                {literal}
                [972, {/literal}{$pro_per_md}{literal}],
                [748, {/literal}{$pro_per_sm}{literal}],
                [460, {/literal}{$pro_per_xs}{literal}],
                [0, {/literal}{$pro_per_xxs}{literal}]
                {/literal}{else}{literal}
                [0, {/literal}{if $sttheme.responsive_max==2}{$pro_per_xl}{elseif $sttheme.responsive_max==1}{$pro_per_lg}{else}{$pro_per_md}{/if}{literal}]
                {/literal}
                {/if}
                {literal} 
            ]
            {/literal}
            {/if}
            {literal} 
        });
    });
    {/literal} 
    //]]>
    </script>
    {else}
        <ul class="row blog_row_list">
        {foreach $blogs as $blog}
            <li class="col-lg-{(12/$pro_per_lg)|replace:'.':'-'} col-md-{(12/$pro_per_md)|replace:'.':'-'} col-sm-{(12/$pro_per_sm)|replace:'.':'-'} col-xs-{(12/$pro_per_xs)|replace:'.':'-'} col-xxs-{(12/$pro_per_xxs)|replace:'.':'-'}  {if $blog@iteration%$pro_per_lg == 1} first-item-of-desktop-line{/if}{if $blog@iteration%$pro_per_md == 1} first-item-of-line{/if}{if $blog@iteration%$pro_per_sm == 1} first-item-of-tablet-line{/if}{if $blog@iteration%$pro_per_xs == 1} first-item-of-mobile-line{/if}{if $blog@iteration%$pro_per_xxs == 1} first-item-of-portrait-line{/if} clearfix">
                <div class="blog_image">
                    <a href="{$blog.link|escape:'html'}" title="{$blog.name|escape:'htmlall':'UTF-8'}">
                    <img src="{$blog.cover.links.small}" alt="{$blog.name|escape:'htmlall':'UTF-8'}" width="{$imageSize[1]['small'][0]}" height="{$imageSize[1]['small'][1]}" class="hover_effect" />
                    {if $blog.type==2}
                        <span class="icon_wrap"><i class="icon-camera-2 icon-1x"></i></span>
                    {elseif $blog.type==3}
                        <span class="icon_wrap"><i class="icon-video icon-1x"></i></span>
                    {/if}                 
                    </a>
                </div>
                <p class="s_title_block"><a href="{$blog.link|escape:'html'}" title="{$blog.name|escape:'htmlall':'UTF-8'}">{$blog.name|escape:'htmlall':'UTF-8'|truncate:70:'...'}</a></p>
                {if $blog.content_short}<p class="blok_blog_short_content">{$blog.content_short|strip_tags:'UTF-8'|truncate:120:'...'}<a href="{$blog.link|escape:'html'}" title="{l s='Read More' mod='stblogfeaturedarticles'}" class="go">{l s='Read More' mod='stblogfeaturedarticles'}</a></p>{/if}
                <div class="blog_info">
                    <span class="date-add">{dateFormat date=$blog.date_add full=0}</span>
                    {hook h='displayAnywhere' function="getCommentNumber" id_blog=$blog.id_st_blog link_rewrite=$blog.link_rewrite mod='stblogcomments' caller='stblogcomments'}
                    {if $display_viewcount}<span><i class="icon-eye-2 icon-mar-lr2"></i>{$blog.counter}</span>{/if}
                </div>
            </li>
        {/foreach}
        </ul>
    {/if}
    {else}
        <p class="warning">{l s='No featured articles' mod='stblogfeaturedarticles'}</p>
    {/if}
</section>
{if isset($homeverybottom) && $homeverybottom}</div></div>{/if}
<!-- /St Blog featured articles  -->