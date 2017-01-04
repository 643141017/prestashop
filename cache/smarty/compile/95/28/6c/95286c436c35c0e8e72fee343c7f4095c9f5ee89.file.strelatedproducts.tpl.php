<?php /* Smarty version Smarty-3.1.19, created on 2017-01-04 17:45:16
         compiled from "D:\WWW\prestashop16110\modules\strelatedproducts\views\templates\admin\strelatedproducts.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13823586cc42c526c72-85307080%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '95286c436c35c0e8e72fee343c7f4095c9f5ee89' => 
    array (
      0 => 'D:\\WWW\\prestashop16110\\modules\\strelatedproducts\\views\\templates\\admin\\strelatedproducts.tpl',
      1 => 1483511003,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13823586cc42c526c72-85307080',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'nbr_by_tags' => 0,
    'st_related_products' => 0,
    'relatedProduct' => 0,
    'link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_586cc42c5b74f7_01210698',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_586cc42c5b74f7_01210698')) {function content_586cc42c5b74f7_01210698($_smarty_tpl) {?>
<div id="st_related_products" class="panel product-tab">
<input type="hidden" name="submitted_tabs[]" value="ModuleStrelatedproducts" />
<h3><?php echo smartyTranslate(array('s'=>'Related products','mod'=>'strelatedproducts'),$_smarty_tpl);?>
</h3>
<?php if ($_smarty_tpl->tpl_vars['nbr_by_tags']->value) {?>
<div class="alert alert-info" style="display:block;min-height:0;">
    <?php if ($_smarty_tpl->tpl_vars['nbr_by_tags']->value==1) {?>
	<?php echo smartyTranslate(array('s'=>'%d product is connected via tags.','sprintf'=>$_smarty_tpl->tpl_vars['nbr_by_tags']->value,'mod'=>'strelatedproducts'),$_smarty_tpl);?>

    <?php } else { ?>
	<?php echo smartyTranslate(array('s'=>'%d products are connected via tags.','sprintf'=>$_smarty_tpl->tpl_vars['nbr_by_tags']->value,'mod'=>'strelatedproducts'),$_smarty_tpl);?>

    <?php }?>
</div>
<?php }?>
    <div class="form-group">
        <label class="control-label col-lg-3">
            <span><?php echo smartyTranslate(array('s'=>'Related product:','mod'=>'strelatedproducts'),$_smarty_tpl);?>
</span>
        </label>
        <div class="col-lg-8">
            <input type="hidden" name="inputRelatedProducts" id="inputRelatedProducts" value="<?php  $_smarty_tpl->tpl_vars['relatedProduct'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['relatedProduct']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['st_related_products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['relatedProduct']->key => $_smarty_tpl->tpl_vars['relatedProduct']->value) {
$_smarty_tpl->tpl_vars['relatedProduct']->_loop = true;
?><?php echo $_smarty_tpl->tpl_vars['relatedProduct']->value['id_product'];?>
-<?php } ?>" />
			<input type="hidden" name="nameRelatedProducts" id="nameRelatedProducts" value="<?php  $_smarty_tpl->tpl_vars['relatedProduct'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['relatedProduct']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['st_related_products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['relatedProduct']->key => $_smarty_tpl->tpl_vars['relatedProduct']->value) {
$_smarty_tpl->tpl_vars['relatedProduct']->_loop = true;
?><?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['relatedProduct']->value['name'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
¤<?php } ?>" />
            
			<div id="ajax_choose_product">
				<p class="help-block">
					<input type="text" value="" id="st_related_product_autocomplete_input" />
					<?php echo smartyTranslate(array('s'=>'Begin typing the first letters of the product name, then select the product from the drop-down list.','mod'=>'strelatedproducts'),$_smarty_tpl);?>

				</p>
				<p class="help-block"><?php echo smartyTranslate(array('s'=>'(Do not forget to save the product afterward)','mod'=>'strelatedproducts'),$_smarty_tpl);?>
</p>
			</div>
			<div id="divRelatedProducts">
				
                <?php if (isset($_smarty_tpl->tpl_vars['st_related_products']->value)&&count($_smarty_tpl->tpl_vars['st_related_products']->value)) {?>
                <?php  $_smarty_tpl->tpl_vars['relatedProduct'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['relatedProduct']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['st_related_products']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['relatedProduct']->key => $_smarty_tpl->tpl_vars['relatedProduct']->value) {
$_smarty_tpl->tpl_vars['relatedProduct']->_loop = true;
?>
					<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['relatedProduct']->value['name'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
<?php if (!empty($_smarty_tpl->tpl_vars['relatedProduct']->value['reference'])) {?><?php echo $_smarty_tpl->tpl_vars['relatedProduct']->value['reference'];?>
<?php }?>
					<span class="delRelatedProduct" name="<?php echo $_smarty_tpl->tpl_vars['relatedProduct']->value['id_product'];?>
" style="cursor: pointer;">
						<img src="../img/admin/delete.gif" class="middle" alt="" />
					</span><br />
				<?php } ?>
                <?php }?>
			</div>
        </div>
    </div>
    <div class="panel-footer">
		<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getAdminLink('AdminProducts');?>
" class="btn btn-default"><i class="process-icon-cancel"></i> <?php echo smartyTranslate(array('s'=>'Cancel'),$_smarty_tpl);?>
</a>
		<button type="submit" name="submitAddproduct" class="btn btn-default pull-right"><i class="process-icon-save"></i> <?php echo smartyTranslate(array('s'=>'Save'),$_smarty_tpl);?>
</button>
		<button type="submit" name="submitAddproductAndStay" class="btn btn-default pull-right"><i class="process-icon-save"></i> <?php echo smartyTranslate(array('s'=>'Save and stay'),$_smarty_tpl);?>
</button>
	</div>
</div>
<script type="text/javascript">

var product_tabs_ModuleStrelatedproducts = new function(){
	var self = this;

	this.initRelatedProductsAutocomplete = function (){
		$('#st_related_product_autocomplete_input')
			.autocomplete('ajax_products_list.php', {
				minChars: 1,
				autoFill: true,
				max:20,
				matchContains: true,
				mustMatch:true,
				scroll:false,
				cacheLength:0,
				formatItem: function(item) {
					return item[1]+' - '+item[0];
				}
			}).result(self.addRelatedProduct);
		$('#st_related_product_autocomplete_input').setOptions({
			extraParams: {
				excludeIds : self.getRelatedProductsIds()
			}
		});
	};

	this.getRelatedProductsIds = function()
	{
		if (!$('#inputRelatedProducts').val())
			return '-1';
		var ids = id_product + ',';
		ids += $('#inputRelatedProducts').val().replace(/\-/g,',').replace(/\,$/,'');
		ids = ids.replace(/\,$/,'');

		return ids;
	};

	this.addRelatedProduct = function(event, data, formatted)
	{
		if (data == null)
			return false;
		var productId = data[1];
		var productName = data[0];

		var $divRelatedProducts = $('#divRelatedProducts');
		var $inputRelatedProducts = $('#inputRelatedProducts');
		var $nameRelatedProducts = $('#nameRelatedProducts');

		/* delete product from select + add product line to the div, input_name, input_ids elements */
		$divRelatedProducts.html($divRelatedProducts.html() + productName + ' <span class="delRelatedProduct" name="' + productId + '" style="cursor: pointer;"><img src="../img/admin/delete.gif" /></span><br />');
		$nameRelatedProducts.val($nameRelatedProducts.val() + productName + '¤');
		$inputRelatedProducts.val($inputRelatedProducts.val() + productId + '-');
		$('#st_related_product_autocomplete_input').val('');
		$('#st_related_product_autocomplete_input').setOptions({
			extraParams: {excludeIds : self.getRelatedProductsIds()}
		});
	};

	this.delRelatedProduct = function(id)
	{
		var div = getE('divRelatedProducts');
		var input = getE('inputRelatedProducts');
		var name = getE('nameRelatedProducts');

		// Cut hidden fields in array
		var inputCut = input.value.split('-');
		var nameCut = name.value.split('¤');

		if (inputCut.length != nameCut.length)
			return jAlert('Bad size');

		// Reset all hidden fields
		input.value = '';
		name.value = '';
		div.innerHTML = '';
		for (i in inputCut)
		{
			// If empty, error, next
			if (!inputCut[i] || !nameCut[i])
				continue ;

			// Add to hidden fields no selected products OR add to select field selected product
			if (inputCut[i] != id)
			{
				input.value += inputCut[i] + '-';
				name.value += nameCut[i] + '¤';
				div.innerHTML += nameCut[i] + ' <span class="delRelatedProduct" name="' + inputCut[i] + '" style="cursor: pointer;"><img src="../img/admin/delete.gif" /></span><br />';
			}
            /*
			else
				$('#selectRelatedProducts').append('<option selected="selected" value="' + inputCut[i] + '-' + nameCut[i] + '">' + inputCut[i] + ' - ' + nameCut[i] + '</option>');
            */
		}

		$('#st_related_product_autocomplete_input').setOptions({
			extraParams: {excludeIds : self.getRelatedProductsIds()}
		});
	};
	this.onReady = function(){
		self.initRelatedProductsAutocomplete();
		$('#divRelatedProducts').delegate('.delRelatedProduct', 'click', function(){
			self.delRelatedProduct($(this).attr('name'));
		});
	};
}
jQuery(document).ready(function($){
    product_tabs_ModuleStrelatedproducts.onReady();
});

</script>
<?php }} ?>
