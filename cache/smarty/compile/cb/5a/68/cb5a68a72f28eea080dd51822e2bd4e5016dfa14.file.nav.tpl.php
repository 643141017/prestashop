<?php /* Smarty version Smarty-3.1.19, created on 2017-01-04 17:58:26
         compiled from "D:\WWW\prestashop16110\modules\blockuserinfo_mod\views\templates\hook\nav.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14135586cc742c71f77-37614739%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cb5a68a72f28eea080dd51822e2bd4e5016dfa14' => 
    array (
      0 => 'D:\\WWW\\prestashop16110\\modules\\blockuserinfo_mod\\views\\templates\\hook\\nav.tpl',
      1 => 1482908691,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14135586cc742c71f77-37614739',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'is_logged' => 0,
    'userinfo_navleft' => 0,
    'sttheme' => 0,
    'show_welcome_msg' => 0,
    'userinfo_dropdown' => 0,
    'link' => 0,
    'show_user_info_icons' => 0,
    'cookie' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_586cc742d6bf70_05574081',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_586cc742d6bf70_05574081')) {function content_586cc742d6bf70_05574081($_smarty_tpl) {?><!-- Block user information module NAV  -->
<?php if ($_smarty_tpl->tpl_vars['is_logged']->value) {?>
	<?php if (isset($_smarty_tpl->tpl_vars['userinfo_navleft']->value)&&$_smarty_tpl->tpl_vars['userinfo_navleft']->value) {?>
		<?php if (isset($_smarty_tpl->tpl_vars['sttheme']->value['welcome_logged'])&&trim($_smarty_tpl->tpl_vars['sttheme']->value['welcome_logged'])) {?><?php if ($_smarty_tpl->tpl_vars['sttheme']->value['welcome_link']) {?><a href="<?php echo $_smarty_tpl->tpl_vars['sttheme']->value['welcome_link'];?>
" class="welcome top_bar_item <?php if (!isset($_smarty_tpl->tpl_vars['show_welcome_msg']->value)||!$_smarty_tpl->tpl_vars['show_welcome_msg']->value) {?> hidden_extra_small <?php }?>" rel="nofollow"><?php } else { ?><span class="welcome top_bar_item <?php if (!isset($_smarty_tpl->tpl_vars['show_welcome_msg']->value)||!$_smarty_tpl->tpl_vars['show_welcome_msg']->value) {?> hidden_extra_small <?php }?>"><?php }?><span class="header_item"><?php echo $_smarty_tpl->tpl_vars['sttheme']->value['welcome_logged'];?>
</span><?php if ($_smarty_tpl->tpl_vars['sttheme']->value['welcome_link']) {?></a><?php } else { ?></span><?php }?><?php }?>
		<?php if ($_smarty_tpl->tpl_vars['userinfo_dropdown']->value) {?>
			<div class="userinfo_mod_top dropdown_wrap top_bar_item">
		        <div class="dropdown_tri dropdown_tri_in header_item">
		            <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('my-account',true), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'View my customer account','mod'=>'blockuserinfo_mod'),$_smarty_tpl);?>
" rel="nofollow">
		        		<?php if ($_smarty_tpl->tpl_vars['show_user_info_icons']->value) {?><i class="icon-user-1 icon-mar-lr2 icon-large"></i><?php }?><?php echo $_smarty_tpl->tpl_vars['cookie']->value->customer_firstname;?>
 <?php echo $_smarty_tpl->tpl_vars['cookie']->value->customer_lastname;?>

		            </a>
		        </div>
		        <div class="dropdown_list">
            		<ul class="dropdown_list_ul custom_links_list">
            			<li><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('my-account',true), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'View my customer account','mod'=>'blockuserinfo_mod'),$_smarty_tpl);?>
" rel="nofollow"><?php echo smartyTranslate(array('s'=>'My Account','mod'=>'blockuserinfo_mod'),$_smarty_tpl);?>
</a></li>
						<li><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('index',true,null,"mylogout"), ENT_QUOTES, 'UTF-8', true);?>
" rel="nofollow" title="<?php echo smartyTranslate(array('s'=>'Log me out','mod'=>'blockuserinfo_mod'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'Sign out','mod'=>'blockuserinfo_mod'),$_smarty_tpl);?>
</a></li>
		    		</ul>
		        </div>
		    </div>
		<?php } else { ?>
			<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('my-account',true), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'View my customer account','mod'=>'blockuserinfo_mod'),$_smarty_tpl);?>
" class="account top_bar_item" rel="nofollow"><span class="header_item"><?php if ($_smarty_tpl->tpl_vars['show_user_info_icons']->value) {?><i class="icon-user-1 icon-mar-lr2 icon-large"></i><?php }?><?php echo $_smarty_tpl->tpl_vars['cookie']->value->customer_firstname;?>
 <?php echo $_smarty_tpl->tpl_vars['cookie']->value->customer_lastname;?>
</span></a>
			<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('my-account',true), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'View my customer account','mod'=>'blockuserinfo_mod'),$_smarty_tpl);?>
" class="my_account_link top_bar_item" rel="nofollow"><span class="header_item"><?php echo smartyTranslate(array('s'=>'My Account','mod'=>'blockuserinfo_mod'),$_smarty_tpl);?>
</span></a>
			<a class="logout top_bar_item" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('index',true,null,"mylogout"), ENT_QUOTES, 'UTF-8', true);?>
" rel="nofollow" title="<?php echo smartyTranslate(array('s'=>'Log me out','mod'=>'blockuserinfo_mod'),$_smarty_tpl);?>
">
				<span class="header_item"><?php if ($_smarty_tpl->tpl_vars['show_user_info_icons']->value) {?><i class="icon-logout icon-large"></i><?php }?><?php echo smartyTranslate(array('s'=>'Sign out','mod'=>'blockuserinfo_mod'),$_smarty_tpl);?>
</span>
			</a>
		<?php }?>
	<?php } else { ?>
		<?php if ($_smarty_tpl->tpl_vars['userinfo_dropdown']->value) {?>
			<div class="userinfo_mod_top dropdown_wrap top_bar_item">
		        <div class="dropdown_tri dropdown_tri_in header_item">
		            <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('my-account',true), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'View my customer account','mod'=>'blockuserinfo_mod'),$_smarty_tpl);?>
" rel="nofollow">
		        		<?php if ($_smarty_tpl->tpl_vars['show_user_info_icons']->value) {?><i class="icon-user-1 icon-mar-lr2 icon-large"></i><?php }?><?php echo $_smarty_tpl->tpl_vars['cookie']->value->customer_firstname;?>
 <?php echo $_smarty_tpl->tpl_vars['cookie']->value->customer_lastname;?>

		            </a>
		        </div>
		        <div class="dropdown_list">
            		<ul class="dropdown_list_ul custom_links_list">
            			<li><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('my-account',true), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'View my customer account','mod'=>'blockuserinfo_mod'),$_smarty_tpl);?>
" rel="nofollow"><?php echo smartyTranslate(array('s'=>'My Account','mod'=>'blockuserinfo_mod'),$_smarty_tpl);?>
</a></li>
						<li><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('index',true,null,"mylogout"), ENT_QUOTES, 'UTF-8', true);?>
" rel="nofollow" title="<?php echo smartyTranslate(array('s'=>'Log me out','mod'=>'blockuserinfo_mod'),$_smarty_tpl);?>
"><?php echo smartyTranslate(array('s'=>'Sign out','mod'=>'blockuserinfo_mod'),$_smarty_tpl);?>
</a></li>
		    		</ul>
		        </div>
		    </div>
		<?php } else { ?>
			<a class="logout top_bar_item" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('index',true,null,"mylogout"), ENT_QUOTES, 'UTF-8', true);?>
" rel="nofollow" title="<?php echo smartyTranslate(array('s'=>'Log me out','mod'=>'blockuserinfo_mod'),$_smarty_tpl);?>
">
				<span class="header_item"><?php if ($_smarty_tpl->tpl_vars['show_user_info_icons']->value) {?><i class="icon-logout icon-large"></i><?php }?><?php echo smartyTranslate(array('s'=>'Sign out','mod'=>'blockuserinfo_mod'),$_smarty_tpl);?>
</span>
			</a>
			<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('my-account',true), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'View my customer account','mod'=>'blockuserinfo_mod'),$_smarty_tpl);?>
" class="my_account_link top_bar_item" rel="nofollow"><span class="header_item"><?php echo smartyTranslate(array('s'=>'My Account','mod'=>'blockuserinfo_mod'),$_smarty_tpl);?>
</span></a>
			<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('my-account',true), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'View my customer account','mod'=>'blockuserinfo_mod'),$_smarty_tpl);?>
" class="account top_bar_item" rel="nofollow"><span class="header_item"><?php if ($_smarty_tpl->tpl_vars['show_user_info_icons']->value) {?><i class="icon-user-1 icon-mar-lr2 icon-large"></i><?php }?><?php echo $_smarty_tpl->tpl_vars['cookie']->value->customer_firstname;?>
 <?php echo $_smarty_tpl->tpl_vars['cookie']->value->customer_lastname;?>
</span></a>
		<?php }?>
		<?php if (isset($_smarty_tpl->tpl_vars['sttheme']->value['welcome_logged'])&&trim($_smarty_tpl->tpl_vars['sttheme']->value['welcome_logged'])) {?><?php if ($_smarty_tpl->tpl_vars['sttheme']->value['welcome_link']) {?><a href="<?php echo $_smarty_tpl->tpl_vars['sttheme']->value['welcome_link'];?>
" class="welcome top_bar_item <?php if (!isset($_smarty_tpl->tpl_vars['show_welcome_msg']->value)||!$_smarty_tpl->tpl_vars['show_welcome_msg']->value) {?> hidden_extra_small <?php }?>" rel="nofollow"><?php } else { ?><span class="welcome top_bar_item <?php if (!isset($_smarty_tpl->tpl_vars['show_welcome_msg']->value)||!$_smarty_tpl->tpl_vars['show_welcome_msg']->value) {?> hidden_extra_small <?php }?>"><?php }?><span class="header_item"><?php echo $_smarty_tpl->tpl_vars['sttheme']->value['welcome_logged'];?>
</span><?php if ($_smarty_tpl->tpl_vars['sttheme']->value['welcome_link']) {?></a><?php } else { ?></span><?php }?><?php }?>
	<?php }?>
<?php } else { ?>
	<?php if (isset($_smarty_tpl->tpl_vars['userinfo_navleft']->value)&&$_smarty_tpl->tpl_vars['userinfo_navleft']->value) {?>
		<?php if (isset($_smarty_tpl->tpl_vars['sttheme']->value['welcome'])&&trim($_smarty_tpl->tpl_vars['sttheme']->value['welcome'])) {?><?php if ($_smarty_tpl->tpl_vars['sttheme']->value['welcome_link']) {?><a href="<?php echo $_smarty_tpl->tpl_vars['sttheme']->value['welcome_link'];?>
" class="welcome top_bar_item <?php if (!isset($_smarty_tpl->tpl_vars['show_welcome_msg']->value)||!$_smarty_tpl->tpl_vars['show_welcome_msg']->value) {?> hidden_extra_small <?php }?>" rel="nofollow"><?php } else { ?><span class="welcome top_bar_item <?php if (!isset($_smarty_tpl->tpl_vars['show_welcome_msg']->value)||!$_smarty_tpl->tpl_vars['show_welcome_msg']->value) {?> hidden_extra_small <?php }?>"><?php }?><span class="header_item"><?php echo $_smarty_tpl->tpl_vars['sttheme']->value['welcome'];?>
</span><?php if ($_smarty_tpl->tpl_vars['sttheme']->value['welcome_link']) {?></a><?php } else { ?></span><?php }?><?php }?>
		<a class="login top_bar_item" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('my-account',true), ENT_QUOTES, 'UTF-8', true);?>
" rel="nofollow" title="<?php echo smartyTranslate(array('s'=>'Log in to your customer account','mod'=>'blockuserinfo_mod'),$_smarty_tpl);?>
">
			<span class="header_item"><?php if ($_smarty_tpl->tpl_vars['show_user_info_icons']->value) {?><i class="icon-user-1 icon-mar-lr2 icon-large"></i><?php }?><?php echo smartyTranslate(array('s'=>'Login','mod'=>'blockuserinfo_mod'),$_smarty_tpl);?>
</span>
		</a>
	<?php } else { ?>
		<a class="login top_bar_item" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('my-account',true), ENT_QUOTES, 'UTF-8', true);?>
" rel="nofollow" title="<?php echo smartyTranslate(array('s'=>'Log in to your customer account','mod'=>'blockuserinfo_mod'),$_smarty_tpl);?>
">
			<span class="header_item"><?php if ($_smarty_tpl->tpl_vars['show_user_info_icons']->value) {?><i class="icon-user-1 icon-mar-lr2 icon-large"></i><?php }?><?php echo smartyTranslate(array('s'=>'Login','mod'=>'blockuserinfo_mod'),$_smarty_tpl);?>
</span>
		</a>
		<?php if (isset($_smarty_tpl->tpl_vars['sttheme']->value['welcome'])&&trim($_smarty_tpl->tpl_vars['sttheme']->value['welcome'])) {?><?php if ($_smarty_tpl->tpl_vars['sttheme']->value['welcome_link']) {?><a href="<?php echo $_smarty_tpl->tpl_vars['sttheme']->value['welcome_link'];?>
" class="welcome top_bar_item <?php if (!isset($_smarty_tpl->tpl_vars['show_welcome_msg']->value)||!$_smarty_tpl->tpl_vars['show_welcome_msg']->value) {?> hidden_extra_small <?php }?>" rel="nofollow"><?php } else { ?><span class="welcome top_bar_item <?php if (!isset($_smarty_tpl->tpl_vars['show_welcome_msg']->value)||!$_smarty_tpl->tpl_vars['show_welcome_msg']->value) {?> hidden_extra_small <?php }?>"><?php }?><span class="header_item"><?php echo $_smarty_tpl->tpl_vars['sttheme']->value['welcome'];?>
</span><?php if ($_smarty_tpl->tpl_vars['sttheme']->value['welcome_link']) {?></a><?php } else { ?></span><?php }?><?php }?>
	<?php }?>
<?php }?>
<!-- /Block usmodule NAV -->
<?php }} ?>
