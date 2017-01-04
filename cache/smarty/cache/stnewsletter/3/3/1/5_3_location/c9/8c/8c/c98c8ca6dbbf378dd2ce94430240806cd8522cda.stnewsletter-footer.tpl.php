<?php /*%%SmartyHeaderCode:22568586cc7438ef875-99029683%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c98c8ca6dbbf378dd2ce94430240806cd8522cda' => 
    array (
      0 => 'D:\\WWW\\prestashop16110\\modules\\stnewsletter\\views\\templates\\hook\\stnewsletter-footer.tpl',
      1 => 1482908692,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '22568586cc7438ef875-99029683',
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_586cc8aaa2fd77_51389617',
  'has_nocache_code' => false,
  'cache_lifetime' => 31536000,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_586cc8aaa2fd77_51389617')) {function content_586cc8aaa2fd77_51389617($_smarty_tpl) {?><!-- Block Newsletter module-->
    		<section id="st_news_letter_1" class="st_news_letter_1  block col-xs-12 col-sm-3">
		    		    <a href="javascript:;" class="opener visible-xs">&nbsp;</a>
			<h3 class="title_block">Newsletter</h3>
						<div class="footer_block_content  ">
				<div class="st_news_letter_box">
            	<div class="st_news_letter_content style_content"><label>Sign up today for free and be the first to get notified on our new updates, discounts and special Offers.</label></div>            	            	<div class="alert alert-danger hidden"></div>
                <div class="alert alert-success hidden"></div>
            	<form action="http://test.prestashop16110.com/modules/stnewsletter/stnewsletter-ajax.php" method="post" class="st_news_letter_form">
					<div class="form-group st_news_letter_form_inner" >
						<input class="inputNew form-control st_news_letter_input" type="text" name="email" size="18" value="" placeholder="Your e-mail" />
		                <button type="submit" name="submitStNewsletter" class="btn btn-medium st_news_letter_submit">
		                    Go!
		                </button>
						<input type="hidden" name="action" value="0" />
					</div>
				</form>
								</div>
			</div>
		</section>
    <!-- /Block Newsletter module-->

<?php }} ?>
