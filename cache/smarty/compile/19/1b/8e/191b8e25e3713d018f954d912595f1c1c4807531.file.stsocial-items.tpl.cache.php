<?php /* Smarty version Smarty-3.1.19, created on 2017-01-04 17:58:26
         compiled from "D:\WWW\prestashop16110\modules\stsocial\views\templates\hook\stsocial-items.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19797586cc7424b57f4-64959435%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '191b8e25e3713d018f954d912595f1c1c4807531' => 
    array (
      0 => 'D:\\WWW\\prestashop16110\\modules\\stsocial\\views\\templates\\hook\\stsocial-items.tpl',
      1 => 1482908693,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19797586cc7424b57f4-64959435',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'social_new_window' => 0,
    'facebook_url' => 0,
    'twitter_url' => 0,
    'rss_url' => 0,
    'youtube_url' => 0,
    'pinterest_url' => 0,
    'google_url' => 0,
    'wordpress_url' => 0,
    'drupal_url' => 0,
    'vimeo_url' => 0,
    'flickr_url' => 0,
    'digg_url' => 0,
    'eaby_url' => 0,
    'amazon_url' => 0,
    'instagram_url' => 0,
    'linkedin_url' => 0,
    'blogger_url' => 0,
    'tumblr_url' => 0,
    'vkontakte_url' => 0,
    'skype_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_586cc742578cf7_23733953',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_586cc742578cf7_23733953')) {function content_586cc742578cf7_23733953($_smarty_tpl) {?>
<!-- MODULE st social  -->
<?php $_smarty_tpl->_capture_stack[0][] = array("social_target", null, null); ob_start(); ?><?php if ((!isset($_smarty_tpl->tpl_vars['social_new_window']->value)||$_smarty_tpl->tpl_vars['social_new_window']->value)) {?> target="_blank" <?php }?><?php list($_capture_buffer, $_capture_assign, $_capture_append) = array_pop($_smarty_tpl->_capture_stack[0]);
if (!empty($_capture_buffer)) {
 if (isset($_capture_assign)) $_smarty_tpl->assign($_capture_assign, ob_get_contents());
 if (isset( $_capture_append)) $_smarty_tpl->append( $_capture_append, ob_get_contents());
 Smarty::$_smarty_vars['capture'][$_capture_buffer]=ob_get_clean();
} else $_smarty_tpl->capture_error();?>

<?php if ($_smarty_tpl->tpl_vars['facebook_url']->value!='') {?><li class="top_bar_item"><a class="header_item" id="stsocial_facebook" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['facebook_url']->value, ENT_QUOTES, 'UTF-8', true);?>
" rel="nofollow" title="<?php echo smartyTranslate(array('s'=>'Facebook','mod'=>'stsocial'),$_smarty_tpl);?>
" <?php echo Smarty::$_smarty_vars['capture']['social_target'];?>
><i class="icon-facebook icon-large"></i></a></li><?php }?>
<?php if ($_smarty_tpl->tpl_vars['twitter_url']->value!='') {?><li class="top_bar_item"><a class="header_item" id="stsocial_twitter" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['twitter_url']->value, ENT_QUOTES, 'UTF-8', true);?>
" rel="nofollow" title="<?php echo smartyTranslate(array('s'=>'Twitter','mod'=>'stsocial'),$_smarty_tpl);?>
" <?php echo Smarty::$_smarty_vars['capture']['social_target'];?>
><i class="icon-twitter  icon-large"></i></a></li><?php }?>
<?php if ($_smarty_tpl->tpl_vars['rss_url']->value!='') {?><li class="top_bar_item"><a class="header_item" id="stsocial_rss" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['rss_url']->value, ENT_QUOTES, 'UTF-8', true);?>
" rel="nofollow" title="<?php echo smartyTranslate(array('s'=>'RSS','mod'=>'stsocial'),$_smarty_tpl);?>
" <?php echo Smarty::$_smarty_vars['capture']['social_target'];?>
><i class="icon-rss icon-large"></i></a></li><?php }?>
<?php if ($_smarty_tpl->tpl_vars['youtube_url']->value!='') {?><li class="top_bar_item"><a class="header_item" id="stsocial_youtube" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['youtube_url']->value, ENT_QUOTES, 'UTF-8', true);?>
" rel="nofollow" title="<?php echo smartyTranslate(array('s'=>'Youtube','mod'=>'stsocial'),$_smarty_tpl);?>
" <?php echo Smarty::$_smarty_vars['capture']['social_target'];?>
><i class="icon-youtube icon-large"></i></a></li><?php }?>
<?php if ($_smarty_tpl->tpl_vars['pinterest_url']->value!='') {?><li class="top_bar_item"><a class="header_item" id="stsocial_pinterest" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['pinterest_url']->value, ENT_QUOTES, 'UTF-8', true);?>
" rel="nofollow" title="<?php echo smartyTranslate(array('s'=>'Pinterest','mod'=>'stsocial'),$_smarty_tpl);?>
" <?php echo Smarty::$_smarty_vars['capture']['social_target'];?>
><i class="icon-pinterest icon-large"></i></a></li><?php }?>
<?php if ($_smarty_tpl->tpl_vars['google_url']->value!='') {?><li class="top_bar_item"><a class="header_item" id="stsocial_google" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['google_url']->value, ENT_QUOTES, 'UTF-8', true);?>
" rel="nofollow" title="<?php echo smartyTranslate(array('s'=>'Google','mod'=>'stsocial'),$_smarty_tpl);?>
" <?php echo Smarty::$_smarty_vars['capture']['social_target'];?>
><i class="icon-gplus icon-large"></i></a></li><?php }?>
<?php if ($_smarty_tpl->tpl_vars['wordpress_url']->value!='') {?><li class="top_bar_item"><a class="header_item" id="stsocial_wordpress" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['wordpress_url']->value, ENT_QUOTES, 'UTF-8', true);?>
" rel="nofollow" title="<?php echo smartyTranslate(array('s'=>'Wordpress','mod'=>'stsocial'),$_smarty_tpl);?>
" <?php echo Smarty::$_smarty_vars['capture']['social_target'];?>
><i class="icon-wordpress icon-large"></i></a></li><?php }?>
<?php if ($_smarty_tpl->tpl_vars['drupal_url']->value!='') {?><li class="top_bar_item"><a class="header_item" id="stsocial_drupal" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['drupal_url']->value, ENT_QUOTES, 'UTF-8', true);?>
" rel="nofollow" title="<?php echo smartyTranslate(array('s'=>'Drupal','mod'=>'stsocial'),$_smarty_tpl);?>
" <?php echo Smarty::$_smarty_vars['capture']['social_target'];?>
><i class="icon-drupal icon-large"></i></a></li><?php }?>
<?php if ($_smarty_tpl->tpl_vars['vimeo_url']->value!='') {?><li class="top_bar_item"><a class="header_item" id="stsocial_vimeo" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['vimeo_url']->value, ENT_QUOTES, 'UTF-8', true);?>
" rel="nofollow" title="<?php echo smartyTranslate(array('s'=>'Vimeo','mod'=>'stsocial'),$_smarty_tpl);?>
" <?php echo Smarty::$_smarty_vars['capture']['social_target'];?>
><i class="icon-vimeo icon-large"></i></a></li><?php }?>
<?php if ($_smarty_tpl->tpl_vars['flickr_url']->value!='') {?><li class="top_bar_item"><a class="header_item" id="stsocial_flickr" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['flickr_url']->value, ENT_QUOTES, 'UTF-8', true);?>
" rel="nofollow" title="<?php echo smartyTranslate(array('s'=>'Flickr','mod'=>'stsocial'),$_smarty_tpl);?>
" <?php echo Smarty::$_smarty_vars['capture']['social_target'];?>
><i class="icon-flickr icon-large"></i></a></li><?php }?>
<?php if ($_smarty_tpl->tpl_vars['digg_url']->value!='') {?><li class="top_bar_item"><a class="header_item" id="stsocial_digg" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['digg_url']->value, ENT_QUOTES, 'UTF-8', true);?>
" rel="nofollow" title="<?php echo smartyTranslate(array('s'=>'Digg','mod'=>'stsocial'),$_smarty_tpl);?>
" <?php echo Smarty::$_smarty_vars['capture']['social_target'];?>
><i class="icon-digg icon-large"></i></a></li><?php }?>
<?php if ($_smarty_tpl->tpl_vars['eaby_url']->value!='') {?><li class="top_bar_item"><a class="header_item" id="stsocial_ebay" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['eaby_url']->value, ENT_QUOTES, 'UTF-8', true);?>
" rel="nofollow" title="<?php echo smartyTranslate(array('s'=>'Ebay','mod'=>'stsocial'),$_smarty_tpl);?>
" <?php echo Smarty::$_smarty_vars['capture']['social_target'];?>
><i class="icon-ebay icon-large"></i></a></li><?php }?>
<?php if ($_smarty_tpl->tpl_vars['amazon_url']->value!='') {?><li class="top_bar_item"><a class="header_item" id="stsocial_amazon" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['amazon_url']->value, ENT_QUOTES, 'UTF-8', true);?>
" rel="nofollow" title="<?php echo smartyTranslate(array('s'=>'Amazon','mod'=>'stsocial'),$_smarty_tpl);?>
" <?php echo Smarty::$_smarty_vars['capture']['social_target'];?>
><i class="icon-amazon icon-large"></i></a></li><?php }?>
<?php if ($_smarty_tpl->tpl_vars['instagram_url']->value!='') {?><li class="top_bar_item"><a class="header_item" id="stsocial_instagram" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['instagram_url']->value, ENT_QUOTES, 'UTF-8', true);?>
" rel="nofollow" title="<?php echo smartyTranslate(array('s'=>'Instagram','mod'=>'stsocial'),$_smarty_tpl);?>
" <?php echo Smarty::$_smarty_vars['capture']['social_target'];?>
><i class="icon-instagram icon-large"></i></a></li><?php }?>
<?php if ($_smarty_tpl->tpl_vars['linkedin_url']->value!='') {?><li class="top_bar_item"><a class="header_item" id="stsocial_linkedin" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['linkedin_url']->value, ENT_QUOTES, 'UTF-8', true);?>
" rel="nofollow" title="<?php echo smartyTranslate(array('s'=>'LinkedIn','mod'=>'stsocial'),$_smarty_tpl);?>
" <?php echo Smarty::$_smarty_vars['capture']['social_target'];?>
><i class="icon-linkedin icon-large"></i></a></li><?php }?>
<?php if ($_smarty_tpl->tpl_vars['blogger_url']->value!='') {?><li class="top_bar_item"><a class="header_item" id="stsocial_blogger" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['blogger_url']->value, ENT_QUOTES, 'UTF-8', true);?>
" rel="nofollow" title="<?php echo smartyTranslate(array('s'=>'Blogger','mod'=>'stsocial'),$_smarty_tpl);?>
" <?php echo Smarty::$_smarty_vars['capture']['social_target'];?>
><i class="icon-blogger icon-large"></i></a></li><?php }?>
<?php if ($_smarty_tpl->tpl_vars['tumblr_url']->value!='') {?><li class="top_bar_item"><a class="header_item" id="stsocial_tumblr" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['tumblr_url']->value, ENT_QUOTES, 'UTF-8', true);?>
" rel="nofollow" title="<?php echo smartyTranslate(array('s'=>'Tumblr','mod'=>'stsocial'),$_smarty_tpl);?>
" <?php echo Smarty::$_smarty_vars['capture']['social_target'];?>
><i class="icon-tumblr icon-large"></i></a></li><?php }?>
<?php if ($_smarty_tpl->tpl_vars['vkontakte_url']->value!='') {?><li class="top_bar_item"><a class="header_item" id="stsocial_vkontakte" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['vkontakte_url']->value, ENT_QUOTES, 'UTF-8', true);?>
" rel="nofollow" title="<?php echo smartyTranslate(array('s'=>'Vkontakte','mod'=>'stsocial'),$_smarty_tpl);?>
" <?php echo Smarty::$_smarty_vars['capture']['social_target'];?>
><i class="icon-vk icon-large"></i></a></li><?php }?>
<?php if ($_smarty_tpl->tpl_vars['skype_url']->value!='') {?><li class="top_bar_item"><a class="header_item" id="stsocial_skype" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['skype_url']->value, ENT_QUOTES, 'UTF-8', true);?>
" rel="nofollow" title="<?php echo smartyTranslate(array('s'=>'Skype','mod'=>'stsocial'),$_smarty_tpl);?>
" <?php echo Smarty::$_smarty_vars['capture']['social_target'];?>
><i class="icon-skype icon-large"></i></a></li><?php }?>
<?php }} ?>
