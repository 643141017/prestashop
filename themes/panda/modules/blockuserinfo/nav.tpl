<!-- Block user information module NAV  -->
{if $is_logged}
	<a href="{$link->getPageLink('my-account', true)|escape:'html':'UTF-8'}" title="{l s='View my customer account' mod='blockuserinfo'}" class="account top_bar_item" rel="nofollow"><span class="header_item">{$cookie->customer_firstname} {$cookie->customer_lastname}</span></a>
{/if}
{if $is_logged}
	<a class="logout top_bar_item" href="{$link->getPageLink('index', true, NULL, "mylogout")|escape:'html':'UTF-8'}" rel="nofollow" title="{l s='Log me out' mod='blockuserinfo'}">
		<span class="header_item">{l s='Sign out' mod='blockuserinfo'}</span>
	</a>
{else}
	<a class="login top_bar_item" href="{$link->getPageLink('my-account', true)|escape:'html':'UTF-8'}" rel="nofollow" title="{l s='Log in to your customer account' mod='blockuserinfo'}">
		<span class="header_item">{l s='Sign in' mod='blockuserinfo'}</span>
	</a>
{/if}
<!-- /Block usmodule NAV -->
