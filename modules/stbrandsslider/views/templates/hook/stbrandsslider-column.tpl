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
<aside id="brands_slider-column-{$hook_hash}" class="brands_slider-column block column_block">
    <h3 class="title_block"><span>{l s='Brands' mod='stbrandsslider'}</span></h3>
    <div id="brands-itemslider-column-{$hook_hash}" class="brands-itemslider-column products_slider block_content">
        <div class="slides owl-navigation-tr">
            {foreach $brands as $brand}
                {if $brand@first || $brand@index is div by $brand_slider_items}
                <div class="slides_list">
                {/if}
                    <a href="{$link->getmanufacturerLink($brand.id_manufacturer, $brand.link_rewrite)}" class="brands_slider_item">
                        <img src="{$img_manu_dir}{$brand.id_manufacturer|escape:'htmlall':'UTF-8'}-manufacturer_default.jpg" alt="{$brand.name|escape:html:'UTF-8'}" width="{$manufacturerSize.width}" height="{$manufacturerSize.height}" class="replace-2x img-responsive" />
                    </a>
                {if $brand@last || $brand@iteration is div by $brand_slider_items}
                </div>
                {/if}
            {/foreach}
        </div>
    </div>
</aside>

<script type="text/javascript">
//<![CDATA[
{literal}
jQuery(function($) {
    var owl = $("#brands-itemslider-column-{/literal}{$hook_hash}{literal} .slides");
    owl.owlCarousel({
        {/literal}
        autoPlay: {if $brand_slider_slideshow}{$brand_slider_s_speed|default:5000}{else}false{/if},
        slideSpeed: {$brand_slider_a_speed},
        stopOnHover: {if $brand_slider_pause_on_hover}true{else}false{/if},
        lazyLoad: {if $lazy_load}true{else}false{/if},
        scrollPerPage: {if $brand_slider_move}1{else}false{/if},
        rewindNav: {if $brand_slider_rewind_nav}true{else}false{/if},
        singleItem : true,
        navigation: true,
        pagination: false
        {literal} 
    });
});
{/literal} 
//]]>
</script>
{/if}
<!-- /Block brands slider module -->