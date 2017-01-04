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
{if !isset($content_only) || !$content_only}
					</div><!-- #center_column -->
					{if isset($right_column_size) && !empty($right_column_size)}
						<div id="right_column" class="col-xxs-8 col-xs-6 col-sm-{$right_column_size|intval} column">{$HOOK_RIGHT_COLUMN}</div>
					{/if}
					</div><!-- .row -->
					{if isset($HOOK_BOTTOM_COLUMN) && $HOOK_BOTTOM_COLUMN|trim}
						<div id="bottom_row" class="row">
							<div id="bottom_column" class="col-xs-12 col-sm-12">{$HOOK_BOTTOM_COLUMN}</div>
						</div>
	            	{/if}
				</div><!-- #columns -->
			</div><!-- .columns-container -->
			{if isset($HOOK_FULL_WIDTH_HOME_BOTTOM) && $HOOK_FULL_WIDTH_HOME_BOTTOM}
                {$HOOK_FULL_WIDTH_HOME_BOTTOM}
            {/if}
			<!-- Footer -->
			<footer id="footer" class="footer-container">
				{if isset($HOOK_FOOTER_PRIMARY) && $HOOK_FOOTER_PRIMARY|trim}
	            <section id="footer-primary">
					<div class="wide_container">
			            <div class="container">
			                <div class="row">
			                    {$HOOK_FOOTER_PRIMARY}
			                </div>
						</div>
		            </div>
	            </section>
	            {/if}
	            {if isset($HOOK_FOOTER) && $HOOK_FOOTER|trim}
	            <section id="footer-secondary">
					<div class="wide_container">
						<div class="container">
			                <div class="row">
							    {$HOOK_FOOTER}
			                </div>
						</div>
		            </div>
	            </section>
	            {/if}
	            {if isset($HOOK_FOOTER_TERTIARY) && $HOOK_FOOTER_TERTIARY|trim}
	            <section id="footer-tertiary">
					<div class="wide_container">
						<div class="container">
			                <div class="row">
							    {$HOOK_FOOTER_TERTIARY}
			                </div>
						</div>
		            </div>
	            </section>
	            {/if}
	            {if (isset($copyright_text) && $copyright_text) 
	            || (isset($HOOK_FOOTER_BOTTOM_LEFT) && $HOOK_FOOTER_BOTTOM_LEFT|trim) 
	            || (isset($HOOK_FOOTER_BOTTOM_RIGHT) && $HOOK_FOOTER_BOTTOM_RIGHT|trim) 
	            || (isset($sttheme.footer_img_src) && $sttheme.footer_img_src) 
	            || (isset($sttheme.responsive) && $sttheme.responsive && isset($sttheme.enabled_version_swithing) && $sttheme.enabled_version_swithing)}
	            <div id="footer-bottom">
					<div class="wide_container">
		    			<div class="container">
		                    <div class="row">
		                        <div class="col-xs-12 col-sm-12 clearfix">
			                        <aside id="footer_bottom_left">{if isset($sttheme.copyright_text)}{$sttheme.copyright_text}{/if}
	            					{if isset($HOOK_FOOTER_BOTTOM_LEFT) && $HOOK_FOOTER_BOTTOM_LEFT|trim}
	            						{$HOOK_FOOTER_BOTTOM_LEFT}
	            					{/if}  
	            					</aside>       
			                        <aside id="footer_bottom_right">
			                        	{if isset($sttheme.footer_img_src) && $sttheme.footer_img_src}    
				                            <img src="{$sttheme.footer_img_src}" alt="{l s='Payment methods'}" />
				                        {/if}
			                            {if isset($HOOK_FOOTER_BOTTOM_RIGHT) && $HOOK_FOOTER_BOTTOM_RIGHT|trim}
		            						{$HOOK_FOOTER_BOTTOM_RIGHT}
		            					{/if}
			                        </aside>
		                        </div>
		                    </div>
		                    {if isset($sttheme.responsive) && $sttheme.responsive && isset($sttheme.enabled_version_swithing) && $sttheme.enabled_version_swithing}
		                    <div id="version_switching" class="text-center">
	                            {if $sttheme.version_switching==0}<a href="javascript:;" rel="nofollow" class="version_switching vs_desktop {if !$sttheme.version_switching} active {/if}" title="{l s='Switch to desktop Version'}"><i class="icon-monitor icon-mar-lr2"></i>{l s='Switch to desktop Version'}</a>{/if}
	                            {if $sttheme.version_switching==1}<a href="javascript:;" rel="nofollow" class="version_switching vs_mobile {if $sttheme.version_switching} active {/if}" title="{l s='Switch to mobile Version'}"><i class="icon-mobile icon-mar-lr2"></i>{l s='Switch to mobile Version'}</a>{/if}
		                    </div>
		                    {/if}
		                </div>
		            </div>
	            </div>
	            {/if}
			</footer><!-- #footer -->
			{if isset($sttheme.boxstyle) && $sttheme.boxstyle==2}</div>{/if}<!-- #page_wrapper -->
		</div><!-- #body_wrapper -->
					<div id="st-content-inner-after" data-version="{$smarty.const._PS_VERSION_|replace:'.':'-'}{if isset($sttheme.theme_version)}-{$sttheme.theme_version|replace:'.':'-'}{/if}"></div>
					</div><!-- /st-content-inner -->
				</div><!-- /st-content -->
				<div id="st-pusher-after"></div>
			</div><!-- /st-pusher -->
			{if isset($HOOK_SIDE_BAR_RIGHT) && $HOOK_SIDE_BAR_RIGHT|trim}
				{$HOOK_SIDE_BAR_RIGHT}
			{/if}
			
			{assign var="rightbar_nbr" value=0}
			{if isset($left_column_size) && $left_column_size}{assign var="rightbar_nbr" value=$rightbar_nbr+1}{/if}
			{if isset($right_column_size) && $right_column_size}{assign var="rightbar_nbr" value=$rightbar_nbr+1}{/if}
			{assign var="rightbar_columns_nbr" value=$rightbar_nbr}
			{if isset($HOOK_RIGHT_BAR)}{assign var="rightbar_nbr" value=$rightbar_nbr+substr_count($HOOK_RIGHT_BAR,'rightbar_wrap')}{/if}
			
			<div id="rightbar" class="rightbar_{$rightbar_nbr} rightbar_columns_{$rightbar_columns_nbr}">
				{if isset($left_column_size) && !empty($left_column_size)}
			    <div id="switch_left_column_wrap" class="rightbar_wrap">
			        <a href="javascript:;" id="switch_left_column" data-column="left_column" class="rightbar_tri icon_wrap" title="{l s="Display left column"}"><i class="icon-columns icon-0x"></i><span class="icon_text">{l s="Left"}</span></a>   
			    </div>
			    {/if}
				{if isset($HOOK_RIGHT_BAR)}
					{$HOOK_RIGHT_BAR}
				{/if}
			    {if isset($right_column_size) && !empty($right_column_size)}
			    <div id="switch_right_column_wrap" class="rightbar_wrap">
			        <a href="javascript:;" id="switch_right_column" data-column="right_column" class="rightbar_tri icon_wrap" title="{l s="Display right column"}"><i class="icon-columns icon-0x"></i><span class="icon_text">{l s="Right"}</span></a>   
			    </div>
			    {/if}
			</div>
			{if isset($HOOK_LEFT_BAR)}
				<div id="leftbar">
					{$HOOK_LEFT_BAR}
				</div>
			{/if}
		</div><!-- /st-container -->
{/if}
{include file="$tpl_dir./global.tpl"}
    {if isset($sttheme.tracking_code) && $sttheme.tracking_code}{$sttheme.tracking_code}{/if}
	</body>
</html>