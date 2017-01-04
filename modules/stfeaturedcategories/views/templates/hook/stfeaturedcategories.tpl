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
<!-- Featured categories -->
{if $aw_display || (isset($featured_categories) && $featured_categories)}
{if isset($homeverybottom) && $homeverybottom}<div id="featured_categories_outer_{$hook_hash}" class="wide_container {if $hide_mob} hidden-xs {/if}"><div class="container">{/if}
<section id="featured_categories_inner_{$hook_hash}" class="block products_block section {if $hide_mob} hidden-xs {/if} {if isset($display_as_grid) && $display_as_grid} display_as_grid {/if}">
    <h3 class="title_block {if $title_position} title_block_center {/if}"><span>{l s='Featured categories' mod='stfeaturedcategories'}</span></h3>
    {if isset($featured_categories) && is_array($featured_categories) && count($featured_categories)}
        {if !isset($display_as_grid) || !$display_as_grid}
        <div id="featured_categories_slider_{$hook_hash}" class="products_slider">
            <div class="slides {if $direction_nav>1} owl-navigation-lr {if $direction_nav==4} owl-navigation-circle {else} owl-navigation-rectangle {/if} {elseif $direction_nav==1} owl-navigation-tr{/if}">
                {foreach $featured_categories as $category}
                <div class="featured_categories_item item">
                    <a href="{$link->getCategoryLink($category.id_category, $category.link_rewrite)|escape:'htmlall':'UTF-8'}" title="{$category.name|escape:'htmlall':'UTF-8'}" class="fc_cat_image">
                    {if $category.id_image}
                        <img {if $lazy_load} data-src="{$link->getCatImageLink($category.link_rewrite, $category.id_image, 'category_default')|escape:'html'}" {else} src="{$link->getCatImageLink($category.link_rewrite, $category.id_image, 'category_default')|escape:'html'}" {/if} alt="{$category.name|escape:'htmlall':'UTF-8'}" width="{$categorySize.width}" height="{$categorySize.height}" class="replace-2x img-responsive {if $lazy_load} lazyOwl {/if}" />
                    {else}
                        <img src="{$img_cat_dir}{$lang_iso}-default-category_default.jpg" alt="" width="{$categorySize.width}" height="{$categorySize.height}" class="replace-2x img-responsive" />
                    {/if}
                    </a>
                    <div class="fc_cat_name"><p class="s_title_block"><a href="{$link->getCategoryLink($category.id_category, $category.link_rewrite)|escape:'htmlall':'UTF-8'}" title="{$category.name|escape:'htmlall':'UTF-8'}">{$category.name|truncate:35:'...'|escape:'htmlall':'UTF-8'}</a></p></div>
                </div>
                {/foreach}
            </div>
        </div>
        
        <script type="text/javascript">
        //<![CDATA[
        {literal}
        jQuery(function($) { 
            var owl = $("#featured_categories_slider{/literal}_{$hook_hash}{literal} .slides");
            owl.owlCarousel({
                {/literal}
                autoPlay: {if $slider_slideshow}{$slider_s_speed|default:5000}{else}false{/if},
                slideSpeed: {$slider_a_speed},
                stopOnHover: {if $slider_pause_on_hover}true{else}false{/if},
                navigation: {if $direction_nav}true{else}false{/if},
                pagination: {if $control_nav}true{else}false{/if},
                lazyLoad: {if $lazy_load}true{else}false{/if},
                scrollPerPage: {if $slider_move}true{else}false{/if},
                rewindNav: {if $rewind_nav}true{else}false{/if},
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
            });
        });
        {/literal} 
        //]]>
        </script>
        {else}
            <ul class="featured_categories_list row">
            {foreach $featured_categories as $category}
                <li class="col-lg-{(12/$pro_per_lg)|replace:'.':'-'} col-md-{(12/$pro_per_md)|replace:'.':'-'} col-sm-{(12/$pro_per_sm)|replace:'.':'-'} col-xs-{(12/$pro_per_xs)|replace:'.':'-'} col-xxs-{(12/$pro_per_xxs)|replace:'.':'-'}  {if $category@iteration%$pro_per_lg == 1} first-item-of-desktop-line{/if}{if $category@iteration%$pro_per_md == 1} first-item-of-line{/if}{if $category@iteration%$pro_per_sm == 1} first-item-of-tablet-line{/if}{if $category@iteration%$pro_per_xs == 1} first-item-of-mobile-line{/if}{if $category@iteration%$pro_per_xxs == 1} first-item-of-portrait-line{/if}">
                    <a href="{$link->getCategoryLink($category.id_category, $category.link_rewrite)|escape:'htmlall':'UTF-8'}" title="{$category.name|escape:'htmlall':'UTF-8'}" class="fc_cat_image">
                    {if $category.id_image}
                        <img src="{$link->getCatImageLink($category.link_rewrite, $category.id_image, 'category_default')|escape:'html'}" alt="{$category.name|escape:'htmlall':'UTF-8'}" width="{$categorySize.width}" height="{$categorySize.height}" class="replace-2x img-responsive" />
                    {else}
                        <img src="{$img_cat_dir}{$lang_iso}-default-category_default.jpg" alt="" width="{$categorySize.width}" height="{$categorySize.height}" class="replace-2x img-responsive" />
                    {/if}
                    </a>
                    <p class="fc_cat_name s_title_block"><a href="{$link->getCategoryLink($category.id_category, $category.link_rewrite)|escape:'htmlall':'UTF-8'}" title="{$category.name|escape:'htmlall':'UTF-8'}">{$category.name|truncate:35:'...'|escape:'htmlall':'UTF-8'}</a></p>
                </li>
            {/foreach}
            </ul>
        {/if}
    {else}
        <p class="warning">{l s='No featured categories' mod='stfeaturedcategories'}</p>
    {/if}
</section>
{if isset($homeverybottom) && $homeverybottom}</div></div>{/if}
{/if}
<!--/ Featured categories -->