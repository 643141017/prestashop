<ul class="st_mega_menu clearfix mu_level_0">
	{foreach $stmenu as $mm}
		<li id="st_menu_{$mm.id_st_mega_menu}" class="ml_level_0 m_alignment_{$mm.alignment}">
			<a id="st_ma_{$mm.id_st_mega_menu}" href="{if $mm.m_link}{$mm.m_link|escape:'html':'UTF-8'}{else}javascript:;{/if}" class="ma_level_0{if isset($mm.column) && count($mm.column)} is_parent{/if}{if $mm.m_icon} ma_icon{/if}"{if !$menu_title} title="{$mm.m_title|escape:'html':'UTF-8'}"{/if}{if $mm.nofollow} rel="nofollow"{/if}>{if $mm.m_icon}{$mm.m_icon}{else}{if $mm.icon_class}<i class="{$mm.icon_class}"></i>{/if}{$mm.m_name|escape:'html':'UTF-8'}{/if}{if $mm.cate_label}<span class="cate_label">{$mm.cate_label}</span>{/if}</a>
			{if isset($mm.column) && count($mm.column)}
				{if $mm.is_mega}
				<div class="stmenu_sub style_wide col-md-{($mm.width*10/10)|replace:'.':'-'}">
					<div class="row m_column_row">
					{assign var='t_width_tpl' value=0}
					{foreach $mm.column as $column}
						{if isset($column.children) && count($column.children)}
						{assign var="t_width_tpl" value=$t_width_tpl+$column.width}
						{if $t_width_tpl>$mm.t_width}
							{assign var="t_width_tpl" value=$column.width}
							</div><div class="row m_column_row">
						{/if}
						<div id="st_menu_column_{$column.id_st_mega_column}" class="col-md-{($column.width*10/10)|replace:'.':'-'}">
							{foreach $column.children as $block}
								{if $block.item_t==1}
									{if $block.subtype==2  && isset($block.children)}
										<div id="st_menu_block_{$block.id_st_mega_menu}">
    										{if $block.show_cate_img}
							                    {include file="./stmegamenu-cate-img.tpl" menu_cate=$block.children nofollow=$block.nofollow}
    										{/if}
    										<ul class="mu_level_1">
												<li class="ml_level_1">
													<a id="st_ma_{$block.id_st_mega_menu}" href="{$block.children.link|escape:'html':'UTF-8'}"{if !$menu_title} title="{$block.children.name|escape:'html':'UTF-8'}"{/if}{if $block.nofollow} rel="nofollow"{/if} class="ma_level_1 ma_item">{$block.children.name|escape:'html':'UTF-8'}{if $block.cate_label}<span class="cate_label">{$block.cate_label}</span>{/if}</a>
													{if isset($block.children.children) && is_array($block.children.children) && count($block.children.children)}
														<ul class="mu_level_2">
    													{foreach $block.children.children as $product}
														<li class="ml_level_2"><a href="{$product.link|escape:'html':'UTF-8'}"{if !$menu_title} title="{$product.name|escape:'html':'UTF-8'}"{/if}{if $block.nofollow} rel="nofollow"{/if} class="ma_level_2 ma_item">{$product.name|truncate:30:'...'|escape:'html':'UTF-8'}</a></li>
    													{/foreach}
														</ul>	
													{/if}
												</li>
											</ul>	
										</div>
									{elseif $block.subtype==0  && isset($block.children.children) && count($block.children.children)}
										<div id="st_menu_block_{$block.id_st_mega_menu}">
										<div class="row">
										{foreach $block.children.children as $menu}
	    									<div class="col-md-{((12/$block.items_md)*10/10)|replace:'.':'-'}">
	    										{if $block.show_cate_img}
								                    {include file="./stmegamenu-cate-img.tpl" menu_cate=$menu nofollow=$block.nofollow}
	    										{/if}
	    										<ul class="mu_level_1">
													<li class="ml_level_1">
														<a href="{$menu.link|escape:'html':'UTF-8'}"{if !$menu_title} title="{$menu.name|escape:'html':'UTF-8'}"{/if}{if $block.nofollow} rel="nofollow"{/if} class="ma_level_1 ma_item">{$menu.name|escape:'html':'UTF-8'}</a>
														{if isset($menu.children) && is_array($menu.children) && count($menu.children)}
	    													{include file="./stmegamenu-category.tpl" nofollow=$block.nofollow menus=$menu.children m_level=2}
														{/if}
													</li>
												</ul>	
	    									</div>
	    									{if $menu@iteration%$block.items_md==0 && !$menu@last}
	    									</div><div class="row">
	    									{/if}
    									{/foreach}
										</div>
										</div>
    								{elseif $block.subtype==1 || $block.subtype==3}
										<div id="st_menu_block_{$block.id_st_mega_menu}">
											{if $block.show_cate_img}
							                    {include file="./stmegamenu-cate-img.tpl" menu_cate=$block.children nofollow=$block.nofollow}
    										{/if}
											<ul class="mu_level_1">
												<li class="ml_level_1">
													<a id="st_ma_{$block.id_st_mega_menu}" href="{$block.children.link|escape:'html':'UTF-8'}"{if !$menu_title} title="{$block.children.name|escape:'html':'UTF-8'}"{/if}{if $block.nofollow} rel="nofollow"{/if} class="ma_level_1 ma_item">{$block.children.name|escape:'html':'UTF-8'}{if $block.cate_label}<span class="cate_label">{$block.cate_label}</span>{/if}</a>
													{if $block.subtype==1 && isset($block.children.children) && is_array($block.children.children) && count($block.children.children)}
    													{include file="./stmegamenu-category.tpl" nofollow=$block.nofollow menus=$block.children.children m_level=2}
													{/if}
												</li>
											</ul>	
										</div>
									{/if}
								{elseif $block.item_t==2 && isset($block.children) && count($block.children)}
									<div id="st_menu_block_{$block.id_st_mega_menu}" class="row">
									{foreach $block.children as $product}
    									<div class="col-md-{((12/$block.items_md)*10/10)|replace:'.':'-'}">
    										<div class="pro_first_box">
    											<a class="product_img_link"	href="{$link->getProductLink($product->id, $product->link_rewrite, $product->category)|escape:'html':'UTF-8'}" title="{$product->name|escape:'html':'UTF-8'}" itemprop="url"{if $block.nofollow} rel="nofollow"{/if}>
													<img class="replace-2x img-responsive" src="{$link->getImageLink($product->link_rewrite, $product->id_image, 'home_default')|escape:'html':'UTF-8'}" alt="{if !empty($product->legend)}{$product->legend|escape:'html':'UTF-8'}{else}{$product->name|escape:'html':'UTF-8'}{/if}" title="{if !empty($product->legend)}{$product->legend|escape:'html':'UTF-8'}{else}{$product->name|escape:'html':'UTF-8'}{/if}" {if isset($homeSize)} width="{$homeSize.width}" height="{$homeSize.height}"{/if} itemprop="image" />
													{if $new_sticker!=2 && $product->is_new}<span class="new"><i>{l s='New' mod='stmegamenu'}</i></span>{/if}
													{if $sale_sticker!=2 && !$PS_CATALOG_MODE && isset($product->on_sale) && $product->on_sale && isset($product->show_price) && $product->show_price}<span class="on_sale"><i>{l s='Sale' mod='stmegamenu'}</i></span>{/if}
												</a>
    										</div>
    										<div class="pro_second_box">
												<p class="s_title_block">
												<a class="product-name" href="{$link->getProductLink($product->id, $product->link_rewrite, $product->category)|escape:'html':'UTF-8'}" title="{$product->name|escape:'html':'UTF-8'}" itemprop="url"{if $block.nofollow} rel="nofollow"{/if}>
													{$product->name|truncate:45:'...'|escape:'html':'UTF-8'}
												</a>
												</p>
												<div class="price_container" >
													{if isset($product->show_price) && $product->show_price && !isset($restricted_country_mode) && !$PS_CATALOG_MODE}<span class="price product-price">{convertPrice price=$product->displayed_price}</span>
								                    {/if}
												</div>
    										</div>
    									</div>
									{/foreach}
									</div>
								{elseif $block.item_t==3 && isset($block.children) && count($block.children)}
									<div id="st_menu_block_{$block.id_st_mega_menu}" class="row">
									{foreach $block.children as $brand}
    									<div class="col-md-{((12/$block.items_md)*10/10)|replace:'.':'-'}">
											<a href="{$link->getmanufacturerLink($brand.id_manufacturer, $brand.link_rewrite)}"{if !$menu_title} title="{$brand.name|escape:html:'UTF-8'}"{/if}{if $block.nofollow} rel="nofollow"{/if} class="st_menu_brand">
							                    <img src="{$img_manu_dir}{$brand.id_manufacturer|escape:'htmlall':'UTF-8'}-manufacturer_default.jpg" alt="{$brand.name|escape:html:'UTF-8'}" width="{$manufacturerSize.width}" height="{$manufacturerSize.height}" class="replace-2x img-responsive" />
							                </a>
    									</div>
									{/foreach}
									</div>
								{elseif $block.item_t==4}
									<div id="st_menu_block_{$block.id_st_mega_menu}">
										<ul class="mu_level_1">
											<li class="ml_level_1">
												<a id="st_ma_{$block.id_st_mega_menu}" href="{$block.m_link|escape:'html':'UTF-8'}"{if !$menu_title} title="{$block.m_title|escape:'html':'UTF-8'}"{/if}{if $block.nofollow} rel="nofollow"{/if} class="ma_level_1 ma_item">{$block.m_name|escape:'html':'UTF-8'}{if $block.cate_label}<span class="cate_label">{$block.cate_label}</span>{/if}</a>
												{if isset($block.children) && is_array($block.children) && count($block.children)}
													<ul class="mu_level_2">
    												{foreach $block.children as $menu}
    													{include file="./stmegamenu-link.tpl" nofollow=$block.nofollow menus=$menu m_level=2}
	    											{/foreach}
													</ul>
												{/if}
											</li>
										</ul>	
									</div>
								{elseif $block.item_t==5 && $block.html}
									<div id="st_menu_block_{$block.id_st_mega_menu}" class="style_content">
										{$block.html}
									</div>
								{/if}
							{/foreach}
						</div>
						{/if}
					{/foreach}
					</div>
				</div>
				{else}
					<ul id="st_menu_multi_level_{$mm.id_st_mega_menu}" class="stmenu_sub stmenu_multi_level">
					{foreach $mm.column as $column}
						{if isset($column.children) && count($column.children)}
							{foreach $column.children as $block}
								{if $block.item_t==1}
									{if $block.subtype==2  && isset($block.children) && count($block.children)}
										{if isset($block.children.children) && is_array($block.children.children) && count($block.children.children)}
											{foreach $block.children.children as $product}
											<li class="ml_level_1"><a href="{$product.link|escape:'html':'UTF-8'}"{if !$menu_title} title="{$product.name|escape:'html':'UTF-8'}"{/if}{if $block.nofollow} rel="nofollow"{/if} class="ma_level_1 ma_item">{$product.name|truncate:30:'...'|escape:'html':'UTF-8'}</a></li>
											{/foreach}
										{/if}
									{elseif $block.subtype==0  && isset($block.children.children) && count($block.children.children)}
										{foreach $block.children.children as $menu} 
											<li class="ml_level_1">
												{assign var='has_children' value=(isset($menu.children) && is_array($menu.children) && count($menu.children))}
												<a href="{$menu.link|escape:'html':'UTF-8'}"{if !$menu_title} title="{$menu.name|escape:'html':'UTF-8'}"{/if}{if $block.nofollow} rel="nofollow"{/if} class="ma_level_1 ma_item {if $has_children} has_children {/if}">{$menu.name|escape:'html':'UTF-8'}{if $has_children}<span class="is_parent_icon"><b class="is_parent_icon_h"></b><b class="is_parent_icon_v"></b></span>{/if}</a>
												{if $has_children}
													{include file="./stmegamenu-category.tpl" nofollow=$block.nofollow menus=$menu.children m_level=2}
												{/if}
											</li>
    									{/foreach}
    								{elseif $block.subtype==1 || $block.subtype==3}
    									<li class="ml_level_1">
											{assign var='has_children' value=(isset($block.children.children) && count($block.children.children))}
											<a id="st_ma_{$block.id_st_mega_menu}" href="{$block.children.link|escape:'html':'UTF-8'}"{if !$menu_title} title="{$block.children.name|escape:'html':'UTF-8'}"{/if}{if $block.nofollow} rel="nofollow"{/if} class="ma_level_1 ma_item {if $has_children} has_children {/if}">{$block.children.name|escape:'html':'UTF-8'}{if $has_children}<span class="is_parent_icon"><b class="is_parent_icon_h"></b><b class="is_parent_icon_v"></b></span>{/if}{if $block.cate_label}<span class="cate_label">{$block.cate_label}</span>{/if}</a>
	    									{if $has_children}
												{include file="./stmegamenu-category.tpl" nofollow=$block.nofollow menus=$block.children.children m_level=2}
    										{/if}
										</li>
									{/if}
								{elseif $block.item_t==4}
									<li class="ml_level_1">
										{assign var='has_children' value=(isset($block.children) && is_array($block.children) && count($block.children))}
										<a id="st_ma_{$block.id_st_mega_menu}" href="{$block.m_link|escape:'html':'UTF-8'}"{if !$menu_title} title="{$block.m_title|escape:'html':'UTF-8'}"{/if}{if $block.nofollow} rel="nofollow"{/if} class="ma_level_1 ma_item {if $has_children} has_children {/if}">{$block.m_name|escape:'html':'UTF-8'}{if $has_children}<span class="is_parent_icon"><b class="is_parent_icon_h"></b><b class="is_parent_icon_v"></b></span>{/if}{if $block.cate_label}<span class="cate_label">{$block.cate_label}</span>{/if}</a>
										{if $has_children}
											{foreach $block.children as $menu}
												<ul class="mu_level_2">
												{include file="./stmegamenu-link.tpl" nofollow=$block.nofollow menus=$menu m_level=2}
												</ul>
											{/foreach}
										{/if}
									</li>
								{elseif $block.item_t==5 && $block.html}
									<li class="ml_level_1">
    									<div id="st_menu_block_{$block.id_st_mega_menu}" class="style_content">
    										{$block.html}
    									</div>
									</li>
								{else}
									
								{/if}
							{/foreach}
						{/if}
					{/foreach}
					</ul>
				{/if}
			{/if}
		</li>
	{/foreach}
</ul>