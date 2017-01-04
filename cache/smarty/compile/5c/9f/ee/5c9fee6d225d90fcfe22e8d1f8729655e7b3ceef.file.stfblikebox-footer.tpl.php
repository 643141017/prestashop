<?php /* Smarty version Smarty-3.1.19, created on 2017-01-04 17:58:27
         compiled from "D:\WWW\prestashop16110\modules\stfblikebox\views\templates\hook\stfblikebox-footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9803586cc74389d7f5-78276246%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5c9fee6d225d90fcfe22e8d1f8729655e7b3ceef' => 
    array (
      0 => 'D:\\WWW\\prestashop16110\\modules\\stfblikebox\\views\\templates\\hook\\stfblikebox-footer.tpl',
      1 => 1482908692,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9803586cc74389d7f5-78276246',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'st_fb_lb_wide_on_footer' => 0,
    'st_lb_url' => 0,
    'st_lb_height' => 0,
    'st_lb_face' => 0,
    'st_lb_stream' => 0,
    'st_lb_header' => 0,
    'st_lb_connections' => 0,
    'st_lb_colorscheme' => 0,
    'st_lb_locale' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_586cc7438c0a73_67796388',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_586cc7438c0a73_67796388')) {function content_586cc7438c0a73_67796388($_smarty_tpl) {?>
<!-- MODULE st facebook like box  -->
<section id="facebook_like_box_footer" class="col-xs-12 col-sm-<?php if ($_smarty_tpl->tpl_vars['st_fb_lb_wide_on_footer']->value) {?><?php echo $_smarty_tpl->tpl_vars['st_fb_lb_wide_on_footer']->value;?>
<?php } else { ?>3<?php }?> block">
    <a href="javascript:;" class="opener visible-xs">&nbsp;</a>
    <h4 class="title_block"><?php echo smartyTranslate(array('s'=>'Facebook','mod'=>'stfblikebox'),$_smarty_tpl);?>
</h4>
    <div class="footer_block_content fb_like_box_warp">
        <div class="fb-like-box" data-href="http://www.facebook.com/<?php echo $_smarty_tpl->tpl_vars['st_lb_url']->value;?>
" data-width="" <?php if ($_smarty_tpl->tpl_vars['st_lb_height']->value) {?>data-height="<?php echo $_smarty_tpl->tpl_vars['st_lb_height']->value;?>
"<?php }?> data-show-faces="<?php if ($_smarty_tpl->tpl_vars['st_lb_face']->value) {?>true<?php } else { ?>false<?php }?>" data-stream="<?php if ($_smarty_tpl->tpl_vars['st_lb_stream']->value) {?>true<?php } else { ?>false<?php }?>"  data-header="<?php if ($_smarty_tpl->tpl_vars['st_lb_header']->value) {?>true<?php } else { ?>false<?php }?>" <?php if ($_smarty_tpl->tpl_vars['st_lb_connections']->value) {?>connections=<?php echo $_smarty_tpl->tpl_vars['st_lb_connections']->value;?>
<?php }?>  data-show-border="false" data-colorscheme="<?php if (isset($_smarty_tpl->tpl_vars['st_lb_colorscheme']->value)) {?><?php echo $_smarty_tpl->tpl_vars['st_lb_colorscheme']->value;?>
<?php } else { ?>light<?php }?>"></div>
        <div id="fb-root"></div>
        <script>
        //<![CDATA[
        
        (function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/<?php echo $_smarty_tpl->tpl_vars['st_lb_locale']->value;?>
/all.js#xfbml=1";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
         
        //]]>
        </script>
    </div>
</section>
<!-- /MODULE st facebook like box --><?php }} ?>
