{if $nav_products['prev'] || $nav_products['next']}
	<section id="product_link_nav_wrap">
	{foreach $nav_products as $nav => $nav_product}
		{if $nav_product}
			<div class="product_link_nav with_preview">
			    {assign var='product_link' value=$link->getProductLink($nav_product.id_product, $nav_product.link_rewrite, $nav_product.category, $nav_product.ean13)} 
			    <a id="product_link_nav_{$nav}" href="{$product_link|escape:'html':'UTF-8'}"><i class="icon-{if $nav=='prev'}left{/if}{if $nav=='next'}right{/if}-open-3"></i>
				    <div class="product_link_nav_preview">
				        <img src="{$link->getImageLink($nav_product.link_rewrite, $nav_product.id_product|cat:'-'|cat:$nav_product.id_image, 'medium_default')}" alt="{$nav_product.name|escape:html:'UTF-8'}" width="{$mediumSize.width}" height="{$mediumSize.height}"/>
				    </div>
			    </a>
			</div>
		{/if}
	{/foreach}
	</section>
{/if}