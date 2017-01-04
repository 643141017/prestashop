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
<!-- Home top -->
{if isset($HOOK_HOME_TOP) && $HOOK_HOME_TOP|trim}{$HOOK_HOME_TOP}{/if}
<!-- / Home top -->
{if isset($HOOK_HOME_TAB_CONTENT) && $HOOK_HOME_TAB_CONTENT|trim}
    {if isset($HOOK_HOME_TAB) && $HOOK_HOME_TAB|trim}
        <h3 id="home-page-tabs" class="title_block clearfix ">
            {$HOOK_HOME_TAB}
        </h3>
    {/if}
    <div class="tab-content">{$HOOK_HOME_TAB_CONTENT}</div>
{/if}
<!-- Home -->
{if $HOOK_HOME|trim}{$HOOK_HOME}{/if}
<!-- / Home -->
<!-- Home tertiaray -->
{if (isset($HOOK_HOME_TERTIARY_LEFT) && $HOOK_HOME_TERTIARY_LEFT) || (isset($HOOK_HOME_TERTIARY_RIGHT) && $HOOK_HOME_TERTIARY_RIGHT) || (isset($HOOK_HOME_FIRST_QUARTER) && $HOOK_HOME_FIRST_QUARTER) || (isset($HOOK_HOME_SECOND_QUARTER) && $HOOK_HOME_SECOND_QUARTER) || (isset($HOOK_HOME_THIRD_QUARTER) && $HOOK_HOME_THIRD_QUARTER) || (isset($HOOK_HOME_FOURTH_QUARTER) && $HOOK_HOME_FOURTH_QUARTER)}
<div class="row">
    <div id="home_tertiary_left" class="col-xs-12 col-sm-6">
        {$HOOK_HOME_TERTIARY_LEFT}
        {if (isset($HOOK_HOME_FIRST_QUARTER) && $HOOK_HOME_FIRST_QUARTER) || (isset($HOOK_HOME_SECOND_QUARTER) && $HOOK_HOME_SECOND_QUARTER)}
        <div class="row">
            <div id="home_first_quarter" class="col-xxs-12 col-xs-6 col-sm-6">
                {$HOOK_HOME_FIRST_QUARTER}
            </div>
            <div id="home_second_quarter" class="col-xxs-12 col-xs-6 col-sm-6">
                {$HOOK_HOME_SECOND_QUARTER}
            </div>
        </div>
        {/if}
    </div>
    <div id="home_tertiary_right" class="col-xs-12 col-sm-6 col-md-6">
        {$HOOK_HOME_TERTIARY_RIGHT}
        {if (isset($HOOK_HOME_THIRD_QUARTER) && $HOOK_HOME_THIRD_QUARTER) || (isset($HOOK_HOME_FOURTH_QUARTER) && $HOOK_HOME_FOURTH_QUARTER)}
        <div class="row">
            <div id="home_third_quarter" class="col-xxs-12 col-xs-6 col-sm-6">
                {$HOOK_HOME_THIRD_QUARTER}
            </div>
            <div id="home_fourth_quarter" class="col-xxs-12 col-xs-6 col-sm-6">
                {$HOOK_HOME_FOURTH_QUARTER}
            </div>
        </div>
        {/if}
    </div>
</div>
{/if}
<!-- / Home tertiaray -->
<!-- Home secondary -->
{if (isset($HOOK_HOME_SECONDARY_LEFT) && $HOOK_HOME_SECONDARY_LEFT|trim) || (isset($HOOK_HOME_SECONDARY_RIGHT) && $HOOK_HOME_SECONDARY_RIGHT|trim)}
<div class="row">
    {if isset($HOOK_HOME_SECONDARY_LEFT) && $HOOK_HOME_SECONDARY_LEFT|trim}
    <div id="home_secondary_left" class="col-sm-3 hidden-xs">
        {$HOOK_HOME_SECONDARY_LEFT}
    </div>
    {/if}
    <div id="home_secondary_right" class="{if !isset($HOOK_HOME_SECONDARY_LEFT) || !$HOOK_HOME_SECONDARY_LEFT|trim} col-xs-12 col-md-12 {else} col-xs-12 col-sm-9  {/if}">
        {$HOOK_HOME_SECONDARY_RIGHT}
    </div>
</div>
{/if}
<!-- / Home secondary -->
<!-- Home bottom -->
{if isset($HOOK_HOME_BOTTOM) && $HOOK_HOME_BOTTOM|trim}{$HOOK_HOME_BOTTOM}{/if}
<!-- / Home bottom -->
