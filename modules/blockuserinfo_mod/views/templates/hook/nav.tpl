<!-- Block user information module NAV  -->
{if $is_logged}
	{if isset($userinfo_navleft) && $userinfo_navleft}
		{if isset($sttheme.welcome_logged) && trim($sttheme.welcome_logged)}{if $sttheme.welcome_link}<a href="{$sttheme.welcome_link}" class="welcome top_bar_item {if !isset($show_welcome_msg) || !$show_welcome_msg} hidden_extra_small {/if}" rel="nofollow">{else}<span class="welcome top_bar_item {if !isset($show_welcome_msg) || !$show_welcome_msg} hidden_extra_small {/if}">{/if}<span class="header_item">{$sttheme.welcome_logged}</span>{if $sttheme.welcome_link}</a>{else}</span>{/if}{/if}
		{if $userinfo_dropdown}
			<div class="userinfo_mod_top dropdown_wrap top_bar_item">
		        <div class="dropdown_tri dropdown_tri_in header_item">
		            <a href="{$link->getPageLink('my-account', true)|escape:'html':'UTF-8'}" title="{l s='View my customer account' mod='blockuserinfo_mod'}" rel="nofollow">
		        		{if $show_user_info_icons}<i class="icon-user-1 icon-mar-lr2 icon-large"></i>{/if}{$cookie->customer_firstname} {$cookie->customer_lastname}
		            </a>
		        </div>
		        <div class="dropdown_list">
            		<ul class="dropdown_list_ul custom_links_list">
            			<li><a href="{$link->getPageLink('my-account', true)|escape:'html':'UTF-8'}" title="{l s='View my customer account' mod='blockuserinfo_mod'}" rel="nofollow">{l s='My Account' mod='blockuserinfo_mod'}</a></li>
						<li><a href="{$link->getPageLink('index', true, NULL, "mylogout")|escape:'html':'UTF-8'}" rel="nofollow" title="{l s='Log me out' mod='blockuserinfo_mod'}">{l s='Sign out' mod='blockuserinfo_mod'}</a></li>
		    		</ul>
		        </div>
		    </div>
		{else}
			<a href="{$link->getPageLink('my-account', true)|escape:'html':'UTF-8'}" title="{l s='View my customer account' mod='blockuserinfo_mod'}" class="account top_bar_item" rel="nofollow"><span class="header_item">{if $show_user_info_icons}<i class="icon-user-1 icon-mar-lr2 icon-large"></i>{/if}{$cookie->customer_firstname} {$cookie->customer_lastname}</span></a>
			<a href="{$link->getPageLink('my-account', true)|escape:'html':'UTF-8'}" title="{l s='View my customer account' mod='blockuserinfo_mod'}" class="my_account_link top_bar_item" rel="nofollow"><span class="header_item">{l s='My Account' mod='blockuserinfo_mod'}</span></a>
			<a class="logout top_bar_item" href="{$link->getPageLink('index', true, NULL, "mylogout")|escape:'html':'UTF-8'}" rel="nofollow" title="{l s='Log me out' mod='blockuserinfo_mod'}">
				<span class="header_item">{if $show_user_info_icons}<i class="icon-logout icon-large"></i>{/if}{l s='Sign out' mod='blockuserinfo_mod'}</span>
			</a>
		{/if}
	{else}
		{if $userinfo_dropdown}
			<div class="userinfo_mod_top dropdown_wrap top_bar_item">
		        <div class="dropdown_tri dropdown_tri_in header_item">
		            <a href="{$link->getPageLink('my-account', true)|escape:'html':'UTF-8'}" title="{l s='View my customer account' mod='blockuserinfo_mod'}" rel="nofollow">
		        		{if $show_user_info_icons}<i class="icon-user-1 icon-mar-lr2 icon-large"></i>{/if}{$cookie->customer_firstname} {$cookie->customer_lastname}
		            </a>
		        </div>
		        <div class="dropdown_list">
            		<ul class="dropdown_list_ul custom_links_list">
            			<li><a href="{$link->getPageLink('my-account', true)|escape:'html':'UTF-8'}" title="{l s='View my customer account' mod='blockuserinfo_mod'}" rel="nofollow">{l s='My Account' mod='blockuserinfo_mod'}</a></li>
						<li><a href="{$link->getPageLink('index', true, NULL, "mylogout")|escape:'html':'UTF-8'}" rel="nofollow" title="{l s='Log me out' mod='blockuserinfo_mod'}">{l s='Sign out' mod='blockuserinfo_mod'}</a></li>
		    		</ul>
		        </div>
		    </div>
		{else}
			<a class="logout top_bar_item" href="{$link->getPageLink('index', true, NULL, "mylogout")|escape:'html':'UTF-8'}" rel="nofollow" title="{l s='Log me out' mod='blockuserinfo_mod'}">
				<span class="header_item">{if $show_user_info_icons}<i class="icon-logout icon-large"></i>{/if}{l s='Sign out' mod='blockuserinfo_mod'}</span>
			</a>
			<a href="{$link->getPageLink('my-account', true)|escape:'html':'UTF-8'}" title="{l s='View my customer account' mod='blockuserinfo_mod'}" class="my_account_link top_bar_item" rel="nofollow"><span class="header_item">{l s='My Account' mod='blockuserinfo_mod'}</span></a>
			<a href="{$link->getPageLink('my-account', true)|escape:'html':'UTF-8'}" title="{l s='View my customer account' mod='blockuserinfo_mod'}" class="account top_bar_item" rel="nofollow"><span class="header_item">{if $show_user_info_icons}<i class="icon-user-1 icon-mar-lr2 icon-large"></i>{/if}{$cookie->customer_firstname} {$cookie->customer_lastname}</span></a>
		{/if}
		{if isset($sttheme.welcome_logged) && trim($sttheme.welcome_logged)}{if $sttheme.welcome_link}<a href="{$sttheme.welcome_link}" class="welcome top_bar_item {if !isset($show_welcome_msg) || !$show_welcome_msg} hidden_extra_small {/if}" rel="nofollow">{else}<span class="welcome top_bar_item {if !isset($show_welcome_msg) || !$show_welcome_msg} hidden_extra_small {/if}">{/if}<span class="header_item">{$sttheme.welcome_logged}</span>{if $sttheme.welcome_link}</a>{else}</span>{/if}{/if}
	{/if}
{else}
	{if isset($userinfo_navleft) && $userinfo_navleft}
		{if isset($sttheme.welcome) && trim($sttheme.welcome)}{if $sttheme.welcome_link}<a href="{$sttheme.welcome_link}" class="welcome top_bar_item {if !isset($show_welcome_msg) || !$show_welcome_msg} hidden_extra_small {/if}" rel="nofollow">{else}<span class="welcome top_bar_item {if !isset($show_welcome_msg) || !$show_welcome_msg} hidden_extra_small {/if}">{/if}<span class="header_item">{$sttheme.welcome}</span>{if $sttheme.welcome_link}</a>{else}</span>{/if}{/if}
		<a class="login top_bar_item" href="{$link->getPageLink('my-account', true)|escape:'html':'UTF-8'}" rel="nofollow" title="{l s='Log in to your customer account' mod='blockuserinfo_mod'}">
			<span class="header_item">{if $show_user_info_icons}<i class="icon-user-1 icon-mar-lr2 icon-large"></i>{/if}{l s='Login' mod='blockuserinfo_mod'}</span>
		</a>
	{else}
		<a class="login top_bar_item" href="{$link->getPageLink('my-account', true)|escape:'html':'UTF-8'}" rel="nofollow" title="{l s='Log in to your customer account' mod='blockuserinfo_mod'}">
			<span class="header_item">{if $show_user_info_icons}<i class="icon-user-1 icon-mar-lr2 icon-large"></i>{/if}{l s='Login' mod='blockuserinfo_mod'}</span>
		</a>
		{if isset($sttheme.welcome) && trim($sttheme.welcome)}{if $sttheme.welcome_link}<a href="{$sttheme.welcome_link}" class="welcome top_bar_item {if !isset($show_welcome_msg) || !$show_welcome_msg} hidden_extra_small {/if}" rel="nofollow">{else}<span class="welcome top_bar_item {if !isset($show_welcome_msg) || !$show_welcome_msg} hidden_extra_small {/if}">{/if}<span class="header_item">{$sttheme.welcome}</span>{if $sttheme.welcome_link}</a>{else}</span>{/if}{/if}
	{/if}
{/if}
<!-- /Block usmodule NAV -->
