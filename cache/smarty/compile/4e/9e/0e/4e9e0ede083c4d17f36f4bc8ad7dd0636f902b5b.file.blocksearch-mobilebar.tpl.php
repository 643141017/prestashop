<?php /* Smarty version Smarty-3.1.19, created on 2017-01-04 17:58:26
         compiled from "D:\WWW\prestashop16110\modules\blocksearch_mod\views\templates\hook\blocksearch-mobilebar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:29860586cc742d7f7f7-20545189%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4e9e0ede083c4d17f36f4bc8ad7dd0636f902b5b' => 
    array (
      0 => 'D:\\WWW\\prestashop16110\\modules\\blocksearch_mod\\views\\templates\\hook\\blocksearch-mobilebar.tpl',
      1 => 1482908691,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '29860586cc742d7f7f7-20545189',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'link' => 0,
    'search_query' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_586cc742d8f1f9_98911726',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_586cc742d8f1f9_98911726')) {function content_586cc742d8f1f9_98911726($_smarty_tpl) {?>
<!-- Block search module TOP -->
<div id="search_block_mobile_bar">
	<form id="searchbox_mobile_bar" method="get" action="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('search',true), ENT_QUOTES, 'UTF-8', true);?>
" >
		<input type="hidden" name="controller" value="search" />
		<input type="hidden" name="orderby" value="position" />
		<input type="hidden" name="orderway" value="desc" />
		<input class="search_query form-control" type="text" id="search_query_mobile_bar" name="search_query" placeholder="<?php echo smartyTranslate(array('s'=>'Search here','mod'=>'blocksearch_mod'),$_smarty_tpl);?>
" value="<?php echo stripslashes(mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['search_query']->value, ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8'));?>
" />
		<button type="submit" name="submit_search" class="button-search">
			<i class="icon-search-1 icon-0x"></i>
		</button>
	</form><script type="text/javascript">
    // <![CDATA[
    
    jQuery(function($){
        $('#searchbox_mobile_bar').submit(function(){
            var search_query_mobile_bar_val = $.trim($('#search_query_mobile_bar').val());
            if(search_query_mobile_bar_val=='' || search_query_mobile_bar_val==$.trim($('#search_query_mobile_bar').attr('placeholder')))
            {
                $('#search_query_mobile_bar').focusout();
                return false;
            }
            return true;
        });
    });
    
    //]]>
    </script>
</div>
<!-- /Block search module TOP --><?php }} ?>
