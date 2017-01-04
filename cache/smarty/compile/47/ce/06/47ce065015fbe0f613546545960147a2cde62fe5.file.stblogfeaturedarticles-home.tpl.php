<?php /* Smarty version Smarty-3.1.19, created on 2017-01-04 17:58:27
         compiled from "D:\WWW\prestashop16110\modules\stblogfeaturedarticles\views\templates\hook\stblogfeaturedarticles-home.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13372586cc7433c7376-24668676%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '47ce065015fbe0f613546545960147a2cde62fe5' => 
    array (
      0 => 'D:\\WWW\\prestashop16110\\modules\\stblogfeaturedarticles\\views\\templates\\hook\\stblogfeaturedarticles-home.tpl',
      1 => 1482908692,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13372586cc7433c7376-24668676',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'homeverybottom' => 0,
    'title_position' => 0,
    'blogs' => 0,
    'display_as_grid' => 0,
    'direction_nav' => 0,
    'blog' => 0,
    'lazy_load' => 0,
    'imageSize' => 0,
    'display_viewcount' => 0,
    'slider_slideshow' => 0,
    'slider_s_speed' => 0,
    'slider_a_speed' => 0,
    'slider_pause_on_hover' => 0,
    'slider_move' => 0,
    'rewind_nav' => 0,
    'column_slider' => 0,
    'control_nav' => 0,
    'sttheme' => 0,
    'pro_per_xl' => 0,
    'pro_per_lg' => 0,
    'pro_per_md' => 0,
    'pro_per_sm' => 0,
    'pro_per_xs' => 0,
    'pro_per_xxs' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_586cc7434f7e71_47704568',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_586cc7434f7e71_47704568')) {function content_586cc7434f7e71_47704568($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include 'D:\\WWW\\prestashop16110\\tools\\smarty\\plugins\\modifier.replace.php';
?>
<!-- St Blog featured articles -->
<?php if (isset($_smarty_tpl->tpl_vars['homeverybottom']->value)&&$_smarty_tpl->tpl_vars['homeverybottom']->value) {?><div class="wide_container"><div class="container"><?php }?>
<section id="st_blog_featured_article" class="block section">
	<h3 class="title_block <?php if ($_smarty_tpl->tpl_vars['title_position']->value) {?> title_block_center <?php }?>"><span><?php echo smartyTranslate(array('s'=>'Featured articles','mod'=>'stblogfeaturedarticles'),$_smarty_tpl);?>
</span></h3>
    <?php if (is_array($_smarty_tpl->tpl_vars['blogs']->value)&&count($_smarty_tpl->tpl_vars['blogs']->value)) {?>
    <?php if ($_smarty_tpl->tpl_vars['display_as_grid']->value==0||$_smarty_tpl->tpl_vars['display_as_grid']->value==1) {?>
    <div id="featured_article_slider" class="products_slider">
	<div class="slides <?php if ($_smarty_tpl->tpl_vars['direction_nav']->value>1) {?> owl-navigation-lr <?php if ($_smarty_tpl->tpl_vars['direction_nav']->value==4) {?> owl-navigation-circle <?php } else { ?> owl-navigation-rectangle <?php }?> <?php } elseif ($_smarty_tpl->tpl_vars['direction_nav']->value==1) {?> owl-navigation-tr<?php }?>">
	<?php  $_smarty_tpl->tpl_vars['blog'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['blog']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['blogs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['blog']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['blog']->iteration=0;
 $_smarty_tpl->tpl_vars['blog']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['blog']->key => $_smarty_tpl->tpl_vars['blog']->value) {
$_smarty_tpl->tpl_vars['blog']->_loop = true;
 $_smarty_tpl->tpl_vars['blog']->iteration++;
 $_smarty_tpl->tpl_vars['blog']->index++;
 $_smarty_tpl->tpl_vars['blog']->first = $_smarty_tpl->tpl_vars['blog']->index === 0;
 $_smarty_tpl->tpl_vars['blog']->last = $_smarty_tpl->tpl_vars['blog']->iteration === $_smarty_tpl->tpl_vars['blog']->total;
?>
        <div class="block_blog <?php if ($_smarty_tpl->tpl_vars['blog']->first) {?>first_item<?php } elseif ($_smarty_tpl->tpl_vars['blog']->last) {?>last_item<?php }?> <?php if ($_smarty_tpl->tpl_vars['display_as_grid']->value==1) {?>blog_medium_list<?php }?>">
            <div class="blog_image">
                <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['blog']->value['link'], ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['blog']->value['name'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
">
                <img <?php if ($_smarty_tpl->tpl_vars['lazy_load']->value) {?> data-src="<?php echo $_smarty_tpl->tpl_vars['blog']->value['cover']['links']['medium'];?>
" <?php } else { ?> src="<?php echo $_smarty_tpl->tpl_vars['blog']->value['cover']['links']['medium'];?>
" <?php }?> alt="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['blog']->value['name'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" width="<?php echo $_smarty_tpl->tpl_vars['imageSize']->value[1]['medium'][0];?>
" height="<?php echo $_smarty_tpl->tpl_vars['imageSize']->value[1]['medium'][1];?>
" class="hover_effect <?php if ($_smarty_tpl->tpl_vars['lazy_load']->value) {?> lazyOwl <?php }?>" />
                <?php if ($_smarty_tpl->tpl_vars['blog']->value['type']==2) {?>
                    <span class="icon_wrap"><i class="icon-camera-2 icon-1x"></i></span>
                <?php } elseif ($_smarty_tpl->tpl_vars['blog']->value['type']==3) {?>
                    <span class="icon_wrap"><i class="icon-video icon-1x"></i></span>
                <?php }?>
                </a>
            </div>
            <p class="s_title_block"><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['blog']->value['link'], ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['blog']->value['name'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['truncate'][0][0]->smarty_modifier_truncate(mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['blog']->value['name'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8'),70,'...');?>
</a></p>

            <?php if ($_smarty_tpl->tpl_vars['display_as_grid']->value==1) {?>
                <?php if ($_smarty_tpl->tpl_vars['blog']->value['content_short']) {?><p class="blok_blog_short_content"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['truncate'][0][0]->smarty_modifier_truncate(strip_tags($_smarty_tpl->tpl_vars['blog']->value['content_short']),240,'...');?>
<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['blog']->value['link'], ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'Read More','mod'=>'stblogfeaturedarticles'),$_smarty_tpl);?>
" class="go"><?php echo smartyTranslate(array('s'=>'Read More','mod'=>'stblogfeaturedarticles'),$_smarty_tpl);?>
</a></p><?php }?>
                <div class="blog_info">
                    <span class="date-add"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['dateFormat'][0][0]->dateFormat(array('date'=>$_smarty_tpl->tpl_vars['blog']->value['date_add'],'full'=>0),$_smarty_tpl);?>
</span>
                    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayAnywhere','function'=>"getCommentNumber",'id_blog'=>$_smarty_tpl->tpl_vars['blog']->value['id_st_blog'],'link_rewrite'=>$_smarty_tpl->tpl_vars['blog']->value['link_rewrite'],'mod'=>'stblogcomments','caller'=>'stblogcomments'),$_smarty_tpl);?>

                    <?php if ($_smarty_tpl->tpl_vars['display_viewcount']->value) {?><span><i class="icon-eye-2 icon-mar-lr2"></i><?php echo $_smarty_tpl->tpl_vars['blog']->value['counter'];?>
</span><?php }?>
                </div>
            <?php } else { ?>
                <?php if ($_smarty_tpl->tpl_vars['blog']->value['content_short']) {?><p class="blok_blog_short_content"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['truncate'][0][0]->smarty_modifier_truncate(strip_tags($_smarty_tpl->tpl_vars['blog']->value['content_short']),120,'...');?>
</p><?php }?>
                <div class="blog_read_more">
                    <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['blog']->value['link'], ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['blog']->value['name'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" class="btn btn-default"><?php echo smartyTranslate(array('s'=>'Read more','mod'=>'stblogfeaturedarticles'),$_smarty_tpl);?>
</a>
                </div>
            <?php }?>
        </div>
    <?php } ?>
    </div>
    </div>

    <script type="text/javascript">
    //<![CDATA[
    
    jQuery(function($) { 
        var owl = $("#featured_article_slider .slides");
        owl.owlCarousel({
            
            autoPlay: <?php if ($_smarty_tpl->tpl_vars['slider_slideshow']->value) {?><?php echo (($tmp = @$_smarty_tpl->tpl_vars['slider_s_speed']->value)===null||$tmp==='' ? 5000 : $tmp);?>
<?php } else { ?>false<?php }?>,
            slideSpeed: <?php echo $_smarty_tpl->tpl_vars['slider_a_speed']->value;?>
,
            stopOnHover: <?php if ($_smarty_tpl->tpl_vars['slider_pause_on_hover']->value) {?>true<?php } else { ?>false<?php }?>,
            lazyLoad: <?php if ($_smarty_tpl->tpl_vars['lazy_load']->value) {?>true<?php } else { ?>false<?php }?>,
            scrollPerPage: <?php if ($_smarty_tpl->tpl_vars['slider_move']->value) {?>true<?php } else { ?>false<?php }?>,
            rewindNav: <?php if ($_smarty_tpl->tpl_vars['rewind_nav']->value) {?>true<?php } else { ?>false<?php }?>,
            <?php if (isset($_smarty_tpl->tpl_vars['column_slider']->value)&&$_smarty_tpl->tpl_vars['column_slider']->value) {?>
            singleItem : true,
            navigation: true,
            pagination: false,
            <?php } else { ?>
            navigation: <?php if ($_smarty_tpl->tpl_vars['direction_nav']->value) {?>true<?php } else { ?>false<?php }?>,
            pagination: <?php if ($_smarty_tpl->tpl_vars['control_nav']->value) {?>true<?php } else { ?>false<?php }?>,
            
            itemsCustom : [
                
                <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['responsive']&&!$_smarty_tpl->tpl_vars['sttheme']->value['version_switching']) {?>
                <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['responsive_max']==2) {?>[1420, <?php echo $_smarty_tpl->tpl_vars['pro_per_xl']->value;?>
],<?php }?>
                <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['responsive_max']>=1) {?>[1180, <?php echo $_smarty_tpl->tpl_vars['pro_per_lg']->value;?>
],<?php }?>
                
                [972, <?php echo $_smarty_tpl->tpl_vars['pro_per_md']->value;?>
],
                [748, <?php echo $_smarty_tpl->tpl_vars['pro_per_sm']->value;?>
],
                [460, <?php echo $_smarty_tpl->tpl_vars['pro_per_xs']->value;?>
],
                [0, <?php echo $_smarty_tpl->tpl_vars['pro_per_xxs']->value;?>
]
                <?php } else { ?>
                [0, <?php if ($_smarty_tpl->tpl_vars['sttheme']->value['responsive_max']==2) {?><?php echo $_smarty_tpl->tpl_vars['pro_per_xl']->value;?>
<?php } elseif ($_smarty_tpl->tpl_vars['sttheme']->value['responsive_max']==1) {?><?php echo $_smarty_tpl->tpl_vars['pro_per_lg']->value;?>
<?php } else { ?><?php echo $_smarty_tpl->tpl_vars['pro_per_md']->value;?>
<?php }?>]
                
                <?php }?>
                 
            ]
            
            <?php }?>
             
        });
    });
     
    //]]>
    </script>
    <?php } else { ?>
        <ul class="row blog_row_list">
        <?php  $_smarty_tpl->tpl_vars['blog'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['blog']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['blogs']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['blog']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['blog']->iteration=0;
 $_smarty_tpl->tpl_vars['blog']->index=-1;
foreach ($_from as $_smarty_tpl->tpl_vars['blog']->key => $_smarty_tpl->tpl_vars['blog']->value) {
$_smarty_tpl->tpl_vars['blog']->_loop = true;
 $_smarty_tpl->tpl_vars['blog']->iteration++;
 $_smarty_tpl->tpl_vars['blog']->index++;
 $_smarty_tpl->tpl_vars['blog']->first = $_smarty_tpl->tpl_vars['blog']->index === 0;
 $_smarty_tpl->tpl_vars['blog']->last = $_smarty_tpl->tpl_vars['blog']->iteration === $_smarty_tpl->tpl_vars['blog']->total;
?>
            <li class="col-lg-<?php echo smarty_modifier_replace((12/$_smarty_tpl->tpl_vars['pro_per_lg']->value),'.','-');?>
 col-md-<?php echo smarty_modifier_replace((12/$_smarty_tpl->tpl_vars['pro_per_md']->value),'.','-');?>
 col-sm-<?php echo smarty_modifier_replace((12/$_smarty_tpl->tpl_vars['pro_per_sm']->value),'.','-');?>
 col-xs-<?php echo smarty_modifier_replace((12/$_smarty_tpl->tpl_vars['pro_per_xs']->value),'.','-');?>
 col-xxs-<?php echo smarty_modifier_replace((12/$_smarty_tpl->tpl_vars['pro_per_xxs']->value),'.','-');?>
  <?php if ($_smarty_tpl->tpl_vars['blog']->iteration%$_smarty_tpl->tpl_vars['pro_per_lg']->value==1) {?> first-item-of-desktop-line<?php }?><?php if ($_smarty_tpl->tpl_vars['blog']->iteration%$_smarty_tpl->tpl_vars['pro_per_md']->value==1) {?> first-item-of-line<?php }?><?php if ($_smarty_tpl->tpl_vars['blog']->iteration%$_smarty_tpl->tpl_vars['pro_per_sm']->value==1) {?> first-item-of-tablet-line<?php }?><?php if ($_smarty_tpl->tpl_vars['blog']->iteration%$_smarty_tpl->tpl_vars['pro_per_xs']->value==1) {?> first-item-of-mobile-line<?php }?><?php if ($_smarty_tpl->tpl_vars['blog']->iteration%$_smarty_tpl->tpl_vars['pro_per_xxs']->value==1) {?> first-item-of-portrait-line<?php }?> clearfix">
                <div class="blog_image">
                    <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['blog']->value['link'], ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['blog']->value['name'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['blog']->value['cover']['links']['small'];?>
" alt="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['blog']->value['name'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
" width="<?php echo $_smarty_tpl->tpl_vars['imageSize']->value[1]['small'][0];?>
" height="<?php echo $_smarty_tpl->tpl_vars['imageSize']->value[1]['small'][1];?>
" class="hover_effect" />
                    <?php if ($_smarty_tpl->tpl_vars['blog']->value['type']==2) {?>
                        <span class="icon_wrap"><i class="icon-camera-2 icon-1x"></i></span>
                    <?php } elseif ($_smarty_tpl->tpl_vars['blog']->value['type']==3) {?>
                        <span class="icon_wrap"><i class="icon-video icon-1x"></i></span>
                    <?php }?>                 
                    </a>
                </div>
                <p class="s_title_block"><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['blog']->value['link'], ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['blog']->value['name'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['truncate'][0][0]->smarty_modifier_truncate(mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['blog']->value['name'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8'),70,'...');?>
</a></p>
                <?php if ($_smarty_tpl->tpl_vars['blog']->value['content_short']) {?><p class="blok_blog_short_content"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['truncate'][0][0]->smarty_modifier_truncate(strip_tags($_smarty_tpl->tpl_vars['blog']->value['content_short']),120,'...');?>
<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['blog']->value['link'], ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>'Read More','mod'=>'stblogfeaturedarticles'),$_smarty_tpl);?>
" class="go"><?php echo smartyTranslate(array('s'=>'Read More','mod'=>'stblogfeaturedarticles'),$_smarty_tpl);?>
</a></p><?php }?>
                <div class="blog_info">
                    <span class="date-add"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['dateFormat'][0][0]->dateFormat(array('date'=>$_smarty_tpl->tpl_vars['blog']->value['date_add'],'full'=>0),$_smarty_tpl);?>
</span>
                    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['hook'][0][0]->smartyHook(array('h'=>'displayAnywhere','function'=>"getCommentNumber",'id_blog'=>$_smarty_tpl->tpl_vars['blog']->value['id_st_blog'],'link_rewrite'=>$_smarty_tpl->tpl_vars['blog']->value['link_rewrite'],'mod'=>'stblogcomments','caller'=>'stblogcomments'),$_smarty_tpl);?>

                    <?php if ($_smarty_tpl->tpl_vars['display_viewcount']->value) {?><span><i class="icon-eye-2 icon-mar-lr2"></i><?php echo $_smarty_tpl->tpl_vars['blog']->value['counter'];?>
</span><?php }?>
                </div>
            </li>
        <?php } ?>
        </ul>
    <?php }?>
    <?php } else { ?>
        <p class="warning"><?php echo smartyTranslate(array('s'=>'No featured articles','mod'=>'stblogfeaturedarticles'),$_smarty_tpl);?>
</p>
    <?php }?>
</section>
<?php if (isset($_smarty_tpl->tpl_vars['homeverybottom']->value)&&$_smarty_tpl->tpl_vars['homeverybottom']->value) {?></div></div><?php }?>
<!-- /St Blog featured articles  --><?php }} ?>
