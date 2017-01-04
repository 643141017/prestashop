<?php /* Smarty version Smarty-3.1.19, created on 2017-01-04 17:58:25
         compiled from "D:\WWW\prestashop16110\modules\staddthisbutton\views\templates\hook\staddthisbutton-header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1092586cc7412159f9-51518929%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e18331d78d66c7588c82e3b552b71ad41eaf0800' => 
    array (
      0 => 'D:\\WWW\\prestashop16110\\modules\\staddthisbutton\\views\\templates\\hook\\staddthisbutton-header.tpl',
      1 => 1482908692,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1092586cc7412159f9-51518929',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'shop_name' => 0,
    'page_name' => 0,
    'meta_title' => 0,
    'meta_description' => 0,
    'id_lang' => 0,
    'product' => 0,
    'cover' => 0,
    'link' => 0,
    'blog' => 0,
    'galleries' => 0,
    'gallery' => 0,
    'fb_image_link' => 0,
    'logo_url' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_586cc74126f773_72174170',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_586cc74126f773_72174170')) {function content_586cc74126f773_72174170($_smarty_tpl) {?>
<!-- AddThis Header BEGIN -->
<meta property="og:site_name" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['shop_name']->value, ENT_QUOTES, 'UTF-8', true);?>
" />
<meta property="og:url" content="http://<?php echo $_SERVER['HTTP_HOST'];?>
<?php echo $_SERVER['REQUEST_URI'];?>
" />
<?php if ($_smarty_tpl->tpl_vars['page_name']->value=='product') {?>
<meta property="og:type" content="product" />
<meta property="og:title" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['meta_title']->value, ENT_QUOTES, 'UTF-8', true);?>
" />
<meta property="og:description" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['meta_description']->value, ENT_QUOTES, 'UTF-8', true);?>
" />
<meta property="og:image" content="<?php echo $_smarty_tpl->tpl_vars['link']->value->getImageLink($_smarty_tpl->tpl_vars['product']->value->link_rewrite[$_smarty_tpl->tpl_vars['id_lang']->value],$_smarty_tpl->tpl_vars['cover']->value['id_image'],'thickbox_default');?>
" />
<?php } elseif ($_smarty_tpl->tpl_vars['page_name']->value=='module-stblog-article') {?>
<meta property="og:type" content="article" />
<meta property="og:title" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['meta_title']->value, ENT_QUOTES, 'UTF-8', true);?>
" />
<meta property="og:description" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['meta_description']->value, ENT_QUOTES, 'UTF-8', true);?>
" />
<?php if ($_smarty_tpl->tpl_vars['blog']->value->type==1&&isset($_smarty_tpl->tpl_vars['cover']->value)) {?>
    <meta property="og:image" content="<?php echo $_smarty_tpl->tpl_vars['cover']->value['links']['large'];?>
" />
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['blog']->value->type==2&&isset($_smarty_tpl->tpl_vars['galleries']->value)&&count($_smarty_tpl->tpl_vars['galleries']->value)) {?>
    <?php  $_smarty_tpl->tpl_vars['gallery'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['gallery']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['galleries']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['gallery']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['gallery']->key => $_smarty_tpl->tpl_vars['gallery']->value) {
$_smarty_tpl->tpl_vars['gallery']->_loop = true;
 $_smarty_tpl->tpl_vars['gallery']->index++;
 $_smarty_tpl->tpl_vars['gallery']->first = $_smarty_tpl->tpl_vars['gallery']->index === 0;
?>
        <?php if ($_smarty_tpl->tpl_vars['gallery']->first) {?><meta property="og:image" content="<?php echo $_smarty_tpl->tpl_vars['gallery']->value['links']['large'];?>
" /><?php }?>
    <?php } ?>
<?php } elseif ($_smarty_tpl->tpl_vars['blog']->value->type==2&&isset($_smarty_tpl->tpl_vars['cover']->value)) {?>
    <meta property="og:image" content="<?php echo $_smarty_tpl->tpl_vars['cover']->value['links']['large'];?>
" />
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['blog']->value->type==3&&$_smarty_tpl->tpl_vars['blog']->value->video) {?>
<?php } elseif ($_smarty_tpl->tpl_vars['blog']->value->type==3&&isset($_smarty_tpl->tpl_vars['cover']->value)) {?>
    <meta property="og:image" content="<?php echo $_smarty_tpl->tpl_vars['cover']->value['links']['large'];?>
" />
<?php }?>
<?php } else { ?>
<meta property="og:type" content="website" />
<meta property="og:title" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['meta_title']->value, ENT_QUOTES, 'UTF-8', true);?>
" />
<meta property="og:description" content="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['meta_description']->value, ENT_QUOTES, 'UTF-8', true);?>
" />
<?php if (isset($_smarty_tpl->tpl_vars['fb_image_link']->value)&&$_smarty_tpl->tpl_vars['fb_image_link']->value) {?>
<meta property="og:image" content="<?php echo $_smarty_tpl->tpl_vars['fb_image_link']->value;?>
" />
<?php } elseif (isset($_smarty_tpl->tpl_vars['logo_url']->value)&&$_smarty_tpl->tpl_vars['logo_url']->value) {?>
<meta property="og:image" content="<?php echo $_smarty_tpl->tpl_vars['logo_url']->value;?>
" />
<?php }?>
<?php }?>

<!-- AddThis Header END --><?php }} ?>
