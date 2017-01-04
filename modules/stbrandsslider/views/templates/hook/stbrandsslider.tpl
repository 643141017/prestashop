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
<!-- Block brands slider module -->
{if isset($brands) && count($brands)}
{if isset($homeverybottom) && $homeverybottom}<div class="wide_container"><div class="container">{/if}
<section id="brands_slider_{$hook_hash}" class="brands_slider block section">
    {if $display_title}
        <h3 class="title_block  {if $display_title==2} title_block_center {/if}"><a href="{$link->getPageLink('manufacturer')|escape:'html':'UTF-8'}" title="{l s='Product Brands' mod='stbrandsslider'}">{l s='Product Brands' mod='stbrandsslider'}</a></h3>
    {/if}
    <div id="brands-itemslider-{$hook_hash}" class="brands-itemslider products_slider">
        <div class="slides {if $direction_nav>1 || !$display_title} owl-navigation-lr {if $direction_nav==4} owl-navigation-circle {else} owl-navigation-rectangle {/if} {elseif $direction_nav==1} owl-navigation-tr{/if}">
        	{foreach $brands as $brand}
            <div class="brands_slider_wrap">
            	<a href="{$link->getmanufacturerLink($brand.id_manufacturer, $brand.link_rewrite)}" title="{$brand.name|escape:html:'UTF-8'}" class="brands_slider_item">
                    <img src="{$img_manu_dir}{$brand.id_manufacturer|escape:'htmlall':'UTF-8'}-manufacturer_default.jpg" alt="{$brand.name|escape:html:'UTF-8'}" width="{$manufacturerSize.width}" height="{$manufacturerSize.height}" class="replace-2x img-responsive" />
                </a>
            </div>
            {/foreach}
        </div>
    </div>
</section>

<script type="text/javascript">
//<![CDATA[
{literal}
jQuery(function($) {
    var owl = $("#brands-itemslider-{/literal}{$hook_hash}{literal} .slides");
    owl.owlCarousel({
        {/literal}
        autoPlay: {if $brand_slider_slideshow}{$brand_slider_s_speed|default:5000}{else}false{/if},
        slideSpeed: {$brand_slider_a_speed},
        stopOnHover: {if $brand_slider_pause_on_hover}true{else}false{/if},
        lazyLoad: {if $lazy_load}true{else}false{/if},
        scrollPerPage: {if $brand_slider_move}1{else}false{/if},
        rewindNav: {if $brand_slider_rewind_nav}true{else}false{/if},
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
    });
});
{/literal} 
//]]>
</script>
{if isset($homeverybottom) && $homeverybottom}</div></div>{/if}
{/if}
<!-- /Block brands slider module -->