<?php /*%%SmartyHeaderCode:7155586cc7416ebe70-98222359%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9c2d8cf96421da8b22573e619fa3aeb73f6395b6' => 
    array (
      0 => 'D:\\WWW\\prestashop16110\\modules\\blocksearch_mod\\views\\templates\\hook\\blocksearch-top.tpl',
      1 => 1482908691,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7155586cc7416ebe70-98222359',
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_586cc8aa2d8ef4_67822315',
  'has_nocache_code' => false,
  'cache_lifetime' => 31536000,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_586cc8aa2d8ef4_67822315')) {function content_586cc8aa2d8ef4_67822315($_smarty_tpl) {?><!-- Block search module TOP -->
<div id="search_block_top" class=" top_bar_item clearfix">
	<form id="searchbox" method="get" action="http://test.prestashop16110.com/zh/search" >
		<div id="searchbox_inner" class="clearfix">
			<input type="hidden" name="controller" value="search" />
			<input type="hidden" name="orderby" value="position" />
			<input type="hidden" name="orderway" value="desc" />
			<input class="search_query form-control" type="text" id="search_query_top" name="search_query" placeholder="Search here" value="" autocomplete="off" />
			<button type="submit" name="submit_search" class="button-search">
				<i class="icon-search-1 icon-large"></i>
			</button>
			<div class="hidden" class="more_prod_string">More products »</div>
		</div>
	</form>
    <script type="text/javascript">
    // <![CDATA[
    
    jQuery(function($){
        $('#searchbox').submit(function(){
            var search_query_top_val = $.trim($('#search_query_top').val());
            if(search_query_top_val=='' || search_query_top_val==$.trim($('#search_query_top').attr('placeholder')))
            {
                $('#search_query_top').focusout();
                return false;
            }
            return true;
        });
        if(!isPlaceholer())
        {
            $('#search_query_top').focusin(function(){
                if ($(this).val()==$(this).attr('placeholder'))
                    $(this).val('');
            }).focusout(function(){
                if ($(this).val()=='')
                    $(this).val($(this).attr('placeholder'));
            });
        }
    });
    
    //]]>
    </script>
</div>
<!-- /Block search module TOP --><?php }} ?>
