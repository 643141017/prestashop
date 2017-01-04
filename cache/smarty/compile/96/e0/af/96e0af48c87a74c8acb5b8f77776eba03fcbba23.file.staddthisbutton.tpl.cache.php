<?php /* Smarty version Smarty-3.1.19, created on 2017-01-04 18:00:11
         compiled from "D:\WWW\prestashop16110\modules\staddthisbutton\views\templates\hook\staddthisbutton.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1678586cc7abb68575-58554146%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '96e0af48c87a74c8acb5b8f77776eba03fcbba23' => 
    array (
      0 => 'D:\\WWW\\prestashop16110\\modules\\staddthisbutton\\views\\templates\\hook\\staddthisbutton.tpl',
      1 => 1482908692,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1678586cc7abb68575-58554146',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'addthis_style' => 0,
    'addthis_customizing' => 0,
    'value' => 0,
    'addthis_extra_attr' => 0,
    'addthis_show_more' => 0,
    'addthis_pubid' => 0,
    'addthis_style_one' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_586cc7abbdd870_37153339',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_586cc7abbdd870_37153339')) {function content_586cc7abbdd870_37153339($_smarty_tpl) {?>
<!-- AddThis Button BEGIN -->
<?php if ($_smarty_tpl->tpl_vars['addthis_style']->value==1) {?>
<div class="addthis_toolbox addthis_default_style addthis_32x32_style mar_b1">
<?php if (count($_smarty_tpl->tpl_vars['addthis_customizing']->value)) {?>
<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['addthis_customizing']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
?>
<a class="addthis_button_<?php echo $_smarty_tpl->tpl_vars['value']->value;?>
" <?php if (is_array($_smarty_tpl->tpl_vars['addthis_extra_attr']->value)&&count($_smarty_tpl->tpl_vars['addthis_extra_attr']->value)&&key_exists($_smarty_tpl->tpl_vars['value']->value,$_smarty_tpl->tpl_vars['addthis_extra_attr']->value)) {?><?php echo $_smarty_tpl->tpl_vars['addthis_extra_attr']->value[$_smarty_tpl->tpl_vars['value']->value];?>
<?php }?>></a>
<?php } ?>
<?php if ($_smarty_tpl->tpl_vars['addthis_show_more']->value==1) {?>
<a class="addthis_button_compact"></a>
<a class="addthis_counter addthis_bubble_style"></a>
<?php }?>
<?php } else { ?>
<a class="addthis_button_preferred_1"></a>
<a class="addthis_button_preferred_2"></a>
<a class="addthis_button_preferred_3"></a>
<a class="addthis_button_preferred_4"></a>
<a class="addthis_button_compact"></a>
<a class="addthis_counter addthis_bubble_style"></a>
<?php }?>
</div>
<?php if ($_smarty_tpl->tpl_vars['addthis_pubid']->value) {?><script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script><?php }?>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=<?php if ($_smarty_tpl->tpl_vars['addthis_pubid']->value) {?><?php echo $_smarty_tpl->tpl_vars['addthis_pubid']->value;?>
<?php } else { ?>xa-516bd7ed3463ec2b<?php }?>"></script>
<?php } elseif ($_smarty_tpl->tpl_vars['addthis_style']->value==2) {?>
<div class="addthis_toolbox addthis_default_style mar_b1">
<?php if (count($_smarty_tpl->tpl_vars['addthis_customizing']->value)) {?>
<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['addthis_customizing']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
?>
<a class="addthis_button_<?php echo $_smarty_tpl->tpl_vars['value']->value;?>
" <?php if (is_array($_smarty_tpl->tpl_vars['addthis_extra_attr']->value)&&count($_smarty_tpl->tpl_vars['addthis_extra_attr']->value)&&key_exists($_smarty_tpl->tpl_vars['value']->value,$_smarty_tpl->tpl_vars['addthis_extra_attr']->value)) {?><?php echo $_smarty_tpl->tpl_vars['addthis_extra_attr']->value[$_smarty_tpl->tpl_vars['value']->value];?>
<?php }?>></a>
<?php } ?>
<?php if ($_smarty_tpl->tpl_vars['addthis_show_more']->value==1) {?>
<a class="addthis_button_compact"></a>
<a class="addthis_counter addthis_bubble_style"></a>
<?php }?>
<?php } else { ?>
<a class="addthis_button_preferred_1"></a>
<a class="addthis_button_preferred_2"></a>
<a class="addthis_button_preferred_3"></a>
<a class="addthis_button_preferred_4"></a>
<a class="addthis_button_compact"></a>
<a class="addthis_counter addthis_bubble_style"></a>
<?php }?>
</div>
<?php if ($_smarty_tpl->tpl_vars['addthis_pubid']->value) {?><script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script><?php }?>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=<?php if ($_smarty_tpl->tpl_vars['addthis_pubid']->value) {?><?php echo $_smarty_tpl->tpl_vars['addthis_pubid']->value;?>
<?php } else { ?>xa-516bd80c570f2e87<?php }?>"></script>
<?php } elseif ($_smarty_tpl->tpl_vars['addthis_style']->value==3) {?>
<a class="addthis_button mar_b1" href="http://www.addthis.com/bookmark.php?v=300&amp;pubid=<?php if ($_smarty_tpl->tpl_vars['addthis_pubid']->value) {?><?php echo $_smarty_tpl->tpl_vars['addthis_pubid']->value;?>
<?php } else { ?>xa-516bd81b706fd972<?php }?>"><img src="http://s7.addthis.com/static/btn/v2/lg-share-en.gif" width="125" height="16" alt="Bookmark and Share" style="border:0"/></a>
<?php if ($_smarty_tpl->tpl_vars['addthis_pubid']->value) {?><script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script><?php }?>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=<?php if ($_smarty_tpl->tpl_vars['addthis_pubid']->value) {?><?php echo $_smarty_tpl->tpl_vars['addthis_pubid']->value;?>
<?php } else { ?>xa-516bd81b706fd972<?php }?>"></script>
<?php } else { ?>
<div class="addthis_toolbox addthis_default_style mar_b1">
<?php if (count($_smarty_tpl->tpl_vars['addthis_style_one']->value)) {?>
<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['addthis_style_one']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
?>
<?php if ($_smarty_tpl->tpl_vars['value']->value=='facebook_like') {?>
<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
<?php } elseif ($_smarty_tpl->tpl_vars['value']->value=='facebook_share') {?>
<a class="addthis_button_facebook_share" fb:share:layout="button_count"></a>
<?php } elseif ($_smarty_tpl->tpl_vars['value']->value=='google_google_plusone') {?>
<a class="addthis_button_google_plusone" g:plusone:size="medium"></a>
<?php } elseif ($_smarty_tpl->tpl_vars['value']->value=='google_google_plusone_badge') {?>
<a class="addthis_button_google_plusone_badge" g:plusone:size="small"></a>
<?php } elseif ($_smarty_tpl->tpl_vars['value']->value=='pinterest_share') {?>
<a class="addthis_button_pinterest_pinit" pi:pinit:layout="horizontal" pi:pinit:url="http://www.addthis.com/features/pinterest" pi:pinit:media="http://www.addthis.com/cms-content/images/features/pinterest-lg.png"></a>
<?php } else { ?>
<a class="addthis_button_<?php echo $_smarty_tpl->tpl_vars['value']->value;?>
" <?php if (is_array($_smarty_tpl->tpl_vars['addthis_extra_attr']->value)&&count($_smarty_tpl->tpl_vars['addthis_extra_attr']->value)&&key_exists($_smarty_tpl->tpl_vars['value']->value,$_smarty_tpl->tpl_vars['addthis_extra_attr']->value)) {?><?php echo $_smarty_tpl->tpl_vars['addthis_extra_attr']->value[$_smarty_tpl->tpl_vars['value']->value];?>
<?php }?>></a>
<?php }?>
<?php } ?>
<?php if ($_smarty_tpl->tpl_vars['addthis_show_more']->value==1) {?>
<a class="addthis_counter addthis_pill_style"></a>
<?php }?>
<?php } else { ?>
<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
<a class="addthis_button_tweet"></a>
<a class="addthis_button_pinterest_pinit"></a>
<a class="addthis_counter addthis_pill_style"></a>
<?php }?>
</div>
<?php if ($_smarty_tpl->tpl_vars['addthis_pubid']->value) {?><script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script><?php }?>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=<?php if ($_smarty_tpl->tpl_vars['addthis_pubid']->value) {?><?php echo $_smarty_tpl->tpl_vars['addthis_pubid']->value;?>
<?php } else { ?>xa-516bd96831c30839<?php }?>"></script>
<?php }?>
<!-- AddThis Button END --><?php }} ?>
