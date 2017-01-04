<?php /* Smarty version Smarty-3.1.19, created on 2017-01-04 17:58:27
         compiled from "D:\WWW\prestashop16110\themes\panda\footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20180586cc743cdf572-55871844%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2d81dd1bbfddf56c1330fffa7cd2eb831f868ebd' => 
    array (
      0 => 'D:\\WWW\\prestashop16110\\themes\\panda\\footer.tpl',
      1 => 1482908691,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20180586cc743cdf572-55871844',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'content_only' => 0,
    'right_column_size' => 0,
    'HOOK_RIGHT_COLUMN' => 0,
    'HOOK_BOTTOM_COLUMN' => 0,
    'HOOK_FULL_WIDTH_HOME_BOTTOM' => 0,
    'HOOK_FOOTER_PRIMARY' => 0,
    'HOOK_FOOTER' => 0,
    'HOOK_FOOTER_TERTIARY' => 0,
    'copyright_text' => 0,
    'HOOK_FOOTER_BOTTOM_LEFT' => 0,
    'HOOK_FOOTER_BOTTOM_RIGHT' => 0,
    'sttheme' => 0,
    'HOOK_SIDE_BAR_RIGHT' => 0,
    'left_column_size' => 0,
    'rightbar_nbr' => 0,
    'HOOK_RIGHT_BAR' => 0,
    'rightbar_columns_nbr' => 0,
    'HOOK_LEFT_BAR' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_586cc743db62f6_31367645',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_586cc743db62f6_31367645')) {function content_586cc743db62f6_31367645($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include 'D:\\WWW\\prestashop16110\\tools\\smarty\\plugins\\modifier.replace.php';
?>
<?php if (!isset($_smarty_tpl->tpl_vars['content_only']->value)||!$_smarty_tpl->tpl_vars['content_only']->value) {?>
					</div><!-- #center_column -->
					<?php if (isset($_smarty_tpl->tpl_vars['right_column_size']->value)&&!empty($_smarty_tpl->tpl_vars['right_column_size']->value)) {?>
						<div id="right_column" class="col-xxs-8 col-xs-6 col-sm-<?php echo intval($_smarty_tpl->tpl_vars['right_column_size']->value);?>
 column"><?php echo $_smarty_tpl->tpl_vars['HOOK_RIGHT_COLUMN']->value;?>
</div>
					<?php }?>
					</div><!-- .row -->
					<?php if (isset($_smarty_tpl->tpl_vars['HOOK_BOTTOM_COLUMN']->value)&&trim($_smarty_tpl->tpl_vars['HOOK_BOTTOM_COLUMN']->value)) {?>
						<div id="bottom_row" class="row">
							<div id="bottom_column" class="col-xs-12 col-sm-12"><?php echo $_smarty_tpl->tpl_vars['HOOK_BOTTOM_COLUMN']->value;?>
</div>
						</div>
	            	<?php }?>
				</div><!-- #columns -->
			</div><!-- .columns-container -->
			<?php if (isset($_smarty_tpl->tpl_vars['HOOK_FULL_WIDTH_HOME_BOTTOM']->value)&&$_smarty_tpl->tpl_vars['HOOK_FULL_WIDTH_HOME_BOTTOM']->value) {?>
                <?php echo $_smarty_tpl->tpl_vars['HOOK_FULL_WIDTH_HOME_BOTTOM']->value;?>

            <?php }?>
			<!-- Footer -->
			<footer id="footer" class="footer-container">
				<?php if (isset($_smarty_tpl->tpl_vars['HOOK_FOOTER_PRIMARY']->value)&&trim($_smarty_tpl->tpl_vars['HOOK_FOOTER_PRIMARY']->value)) {?>
	            <section id="footer-primary">
					<div class="wide_container">
			            <div class="container">
			                <div class="row">
			                    <?php echo $_smarty_tpl->tpl_vars['HOOK_FOOTER_PRIMARY']->value;?>

			                </div>
						</div>
		            </div>
	            </section>
	            <?php }?>
	            <?php if (isset($_smarty_tpl->tpl_vars['HOOK_FOOTER']->value)&&trim($_smarty_tpl->tpl_vars['HOOK_FOOTER']->value)) {?>
	            <section id="footer-secondary">
					<div class="wide_container">
						<div class="container">
			                <div class="row">
							    <?php echo $_smarty_tpl->tpl_vars['HOOK_FOOTER']->value;?>

			                </div>
						</div>
		            </div>
	            </section>
	            <?php }?>
	            <?php if (isset($_smarty_tpl->tpl_vars['HOOK_FOOTER_TERTIARY']->value)&&trim($_smarty_tpl->tpl_vars['HOOK_FOOTER_TERTIARY']->value)) {?>
	            <section id="footer-tertiary">
					<div class="wide_container">
						<div class="container">
			                <div class="row">
							    <?php echo $_smarty_tpl->tpl_vars['HOOK_FOOTER_TERTIARY']->value;?>

			                </div>
						</div>
		            </div>
	            </section>
	            <?php }?>
	            <?php if ((isset($_smarty_tpl->tpl_vars['copyright_text']->value)&&$_smarty_tpl->tpl_vars['copyright_text']->value)||(isset($_smarty_tpl->tpl_vars['HOOK_FOOTER_BOTTOM_LEFT']->value)&&trim($_smarty_tpl->tpl_vars['HOOK_FOOTER_BOTTOM_LEFT']->value))||(isset($_smarty_tpl->tpl_vars['HOOK_FOOTER_BOTTOM_RIGHT']->value)&&trim($_smarty_tpl->tpl_vars['HOOK_FOOTER_BOTTOM_RIGHT']->value))||(isset($_smarty_tpl->tpl_vars['sttheme']->value['footer_img_src'])&&$_smarty_tpl->tpl_vars['sttheme']->value['footer_img_src'])||(isset($_smarty_tpl->tpl_vars['sttheme']->value['responsive'])&&$_smarty_tpl->tpl_vars['sttheme']->value['responsive']&&isset($_smarty_tpl->tpl_vars['sttheme']->value['enabled_version_swithing'])&&$_smarty_tpl->tpl_vars['sttheme']->value['enabled_version_swithing'])) {?>
	            <div id="footer-bottom">
					<div class="wide_container">
		    			<div class="container">
		                    <div class="row">
		                        <div class="col-xs-12 col-sm-12 clearfix">
			                        <aside id="footer_bottom_left"><?php if (isset($_smarty_tpl->tpl_vars['sttheme']->value['copyright_text'])) {?><?php echo $_smarty_tpl->tpl_vars['sttheme']->value['copyright_text'];?>
<?php }?>
	            					<?php if (isset($_smarty_tpl->tpl_vars['HOOK_FOOTER_BOTTOM_LEFT']->value)&&trim($_smarty_tpl->tpl_vars['HOOK_FOOTER_BOTTOM_LEFT']->value)) {?>
	            						<?php echo $_smarty_tpl->tpl_vars['HOOK_FOOTER_BOTTOM_LEFT']->value;?>

	            					<?php }?>  
	            					</aside>       
			                        <aside id="footer_bottom_right">
			                        	<?php if (isset($_smarty_tpl->tpl_vars['sttheme']->value['footer_img_src'])&&$_smarty_tpl->tpl_vars['sttheme']->value['footer_img_src']) {?>    
				                            <img src="<?php echo $_smarty_tpl->tpl_vars['sttheme']->value['footer_img_src'];?>
" alt="<?php echo smartyTranslate(array('s'=>'Payment methods'),$_smarty_tpl);?>
" />
				                        <?php }?>
			                            <?php if (isset($_smarty_tpl->tpl_vars['HOOK_FOOTER_BOTTOM_RIGHT']->value)&&trim($_smarty_tpl->tpl_vars['HOOK_FOOTER_BOTTOM_RIGHT']->value)) {?>
		            						<?php echo $_smarty_tpl->tpl_vars['HOOK_FOOTER_BOTTOM_RIGHT']->value;?>

		            					<?php }?>
			                        </aside>
		                        </div>
		                    </div>
		                    <?php if (isset($_smarty_tpl->tpl_vars['sttheme']->value['responsive'])&&$_smarty_tpl->tpl_vars['sttheme']->value['responsive']&&isset($_smarty_tpl->tpl_vars['sttheme']->value['enabled_version_swithing'])&&$_smarty_tpl->tpl_vars['sttheme']->value['enabled_version_swithing']) {?>
		                    <div id="version_switching" class="text-center">
	                            <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['version_switching']==0) {?><a href="javascript:;" rel="nofollow" class="version_switching vs_desktop <?php if (!$_smarty_tpl->tpl_vars['sttheme']->value['version_switching']) {?> active <?php }?>" title="<?php echo smartyTranslate(array('s'=>'Switch to desktop Version'),$_smarty_tpl);?>
"><i class="icon-monitor icon-mar-lr2"></i><?php echo smartyTranslate(array('s'=>'Switch to desktop Version'),$_smarty_tpl);?>
</a><?php }?>
	                            <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['version_switching']==1) {?><a href="javascript:;" rel="nofollow" class="version_switching vs_mobile <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['version_switching']) {?> active <?php }?>" title="<?php echo smartyTranslate(array('s'=>'Switch to mobile Version'),$_smarty_tpl);?>
"><i class="icon-mobile icon-mar-lr2"></i><?php echo smartyTranslate(array('s'=>'Switch to mobile Version'),$_smarty_tpl);?>
</a><?php }?>
		                    </div>
		                    <?php }?>
		                </div>
		            </div>
	            </div>
	            <?php }?>
			</footer><!-- #footer -->
			<?php if (isset($_smarty_tpl->tpl_vars['sttheme']->value['boxstyle'])&&$_smarty_tpl->tpl_vars['sttheme']->value['boxstyle']==2) {?></div><?php }?><!-- #page_wrapper -->
		</div><!-- #body_wrapper -->
					<div id="st-content-inner-after" data-version="<?php echo smarty_modifier_replace(@constant('_PS_VERSION_'),'.','-');?>
<?php if (isset($_smarty_tpl->tpl_vars['sttheme']->value['theme_version'])) {?>-<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['sttheme']->value['theme_version'],'.','-');?>
<?php }?>"></div>
					</div><!-- /st-content-inner -->
				</div><!-- /st-content -->
				<div id="st-pusher-after"></div>
			</div><!-- /st-pusher -->
			<?php if (isset($_smarty_tpl->tpl_vars['HOOK_SIDE_BAR_RIGHT']->value)&&trim($_smarty_tpl->tpl_vars['HOOK_SIDE_BAR_RIGHT']->value)) {?>
				<?php echo $_smarty_tpl->tpl_vars['HOOK_SIDE_BAR_RIGHT']->value;?>

			<?php }?>
			
			<?php $_smarty_tpl->tpl_vars["rightbar_nbr"] = new Smarty_variable(0, null, 0);?>
			<?php if (isset($_smarty_tpl->tpl_vars['left_column_size']->value)&&$_smarty_tpl->tpl_vars['left_column_size']->value) {?><?php $_smarty_tpl->tpl_vars["rightbar_nbr"] = new Smarty_variable($_smarty_tpl->tpl_vars['rightbar_nbr']->value+1, null, 0);?><?php }?>
			<?php if (isset($_smarty_tpl->tpl_vars['right_column_size']->value)&&$_smarty_tpl->tpl_vars['right_column_size']->value) {?><?php $_smarty_tpl->tpl_vars["rightbar_nbr"] = new Smarty_variable($_smarty_tpl->tpl_vars['rightbar_nbr']->value+1, null, 0);?><?php }?>
			<?php $_smarty_tpl->tpl_vars["rightbar_columns_nbr"] = new Smarty_variable($_smarty_tpl->tpl_vars['rightbar_nbr']->value, null, 0);?>
			<?php if (isset($_smarty_tpl->tpl_vars['HOOK_RIGHT_BAR']->value)) {?><?php $_smarty_tpl->tpl_vars["rightbar_nbr"] = new Smarty_variable($_smarty_tpl->tpl_vars['rightbar_nbr']->value+substr_count($_smarty_tpl->tpl_vars['HOOK_RIGHT_BAR']->value,'rightbar_wrap'), null, 0);?><?php }?>
			
			<div id="rightbar" class="rightbar_<?php echo $_smarty_tpl->tpl_vars['rightbar_nbr']->value;?>
 rightbar_columns_<?php echo $_smarty_tpl->tpl_vars['rightbar_columns_nbr']->value;?>
">
				<?php if (isset($_smarty_tpl->tpl_vars['left_column_size']->value)&&!empty($_smarty_tpl->tpl_vars['left_column_size']->value)) {?>
			    <div id="switch_left_column_wrap" class="rightbar_wrap">
			        <a href="javascript:;" id="switch_left_column" data-column="left_column" class="rightbar_tri icon_wrap" title="<?php echo smartyTranslate(array('s'=>"Display left column"),$_smarty_tpl);?>
"><i class="icon-columns icon-0x"></i><span class="icon_text"><?php echo smartyTranslate(array('s'=>"Left"),$_smarty_tpl);?>
</span></a>   
			    </div>
			    <?php }?>
				<?php if (isset($_smarty_tpl->tpl_vars['HOOK_RIGHT_BAR']->value)) {?>
					<?php echo $_smarty_tpl->tpl_vars['HOOK_RIGHT_BAR']->value;?>

				<?php }?>
			    <?php if (isset($_smarty_tpl->tpl_vars['right_column_size']->value)&&!empty($_smarty_tpl->tpl_vars['right_column_size']->value)) {?>
			    <div id="switch_right_column_wrap" class="rightbar_wrap">
			        <a href="javascript:;" id="switch_right_column" data-column="right_column" class="rightbar_tri icon_wrap" title="<?php echo smartyTranslate(array('s'=>"Display right column"),$_smarty_tpl);?>
"><i class="icon-columns icon-0x"></i><span class="icon_text"><?php echo smartyTranslate(array('s'=>"Right"),$_smarty_tpl);?>
</span></a>   
			    </div>
			    <?php }?>
			</div>
			<?php if (isset($_smarty_tpl->tpl_vars['HOOK_LEFT_BAR']->value)) {?>
				<div id="leftbar">
					<?php echo $_smarty_tpl->tpl_vars['HOOK_LEFT_BAR']->value;?>

				</div>
			<?php }?>
		</div><!-- /st-container -->
<?php }?>
<?php echo $_smarty_tpl->getSubTemplate (((string)$_smarty_tpl->tpl_vars['tpl_dir']->value)."./global.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <?php if (isset($_smarty_tpl->tpl_vars['sttheme']->value['tracking_code'])&&$_smarty_tpl->tpl_vars['sttheme']->value['tracking_code']) {?><?php echo $_smarty_tpl->tpl_vars['sttheme']->value['tracking_code'];?>
<?php }?>
	</body>
</html><?php }} ?>
