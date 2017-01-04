<?php /* Smarty version Smarty-3.1.19, created on 2017-01-04 17:45:16
         compiled from "D:\WWW\prestashop16110\modules\steasytabs\views\templates\admin\steasytabs.tpl" */ ?>
<?php /*%%SmartyHeaderCode:31230586cc42ca8d976-46797225%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ad698b05bb8ed0a9745e43a1dc8d59dd4533c603' => 
    array (
      0 => 'D:\\WWW\\prestashop16110\\modules\\steasytabs\\views\\templates\\admin\\steasytabs.tpl',
      1 => 1483512380,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '31230586cc42ca8d976-46797225',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'languages' => 0,
    'steasytabs' => 0,
    'link' => 0,
    'ad' => 0,
    'iso_tiny_mce' => 0,
    'default_form_language' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_586cc42cb02c73_05571349',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_586cc42cb02c73_05571349')) {function content_586cc42cb02c73_05571349($_smarty_tpl) {?>
<div id="st_easytabs" class="panel product-tab">
<input type="hidden" name="submitted_tabs[]" value="ModuleSteasytabs" />
<h3><?php echo smartyTranslate(array('s'=>'Product Extra Tabs','mod'=>'steasytabs'),$_smarty_tpl);?>
</h3>
<?php echo $_smarty_tpl->getSubTemplate ("controllers/products/multishop/check_fields.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('product_tab'=>"ModuleSteasytabs"), 0);?>

    <div class="form-group">
		<label class="control-label col-lg-3">
            <?php echo $_smarty_tpl->getSubTemplate ("controllers/products/multishop/checkbox.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('field'=>"easytabs_title",'type'=>"default",'multilang'=>"true"), 0);?>

			<span class="label-tooltip" data-toggle="tooltip"
				title="<?php echo smartyTranslate(array('s'=>'Invalid characters: <>;=#{}'),$_smarty_tpl);?>
">
				<?php echo smartyTranslate(array('s'=>'Title:','mod'=>'steasytabs'),$_smarty_tpl);?>

			</span>
        </label>
        <div class="col-lg-8">
			<?php echo $_smarty_tpl->getSubTemplate ("controllers/products/input_text_lang.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('languages'=>$_smarty_tpl->tpl_vars['languages']->value,'input_name'=>'easytabs_title','input_value'=>$_smarty_tpl->tpl_vars['steasytabs']->value->title,'maxchar'=>70), 0);?>

		</div>
    </div>
    <div class="form-group">        
		<label class="control-label col-lg-3">
			<?php echo $_smarty_tpl->getSubTemplate ("controllers/products/multishop/checkbox.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('field'=>"easytabs_content",'type'=>"tinymce",'multilang'=>"true"), 0);?>

            <span class="label-tooltip" data-toggle="tooltip"
				title="<?php echo smartyTranslate(array('s'=>'Invalid characters: <>;=#{}'),$_smarty_tpl);?>
">
			<?php echo smartyTranslate(array('s'=>'Content:','mod'=>'steasytabs'),$_smarty_tpl);?>

            </span>
		</label>
        <div class="col-lg-9">
			<?php echo $_smarty_tpl->getSubTemplate ("controllers/products/textarea_lang.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('languages'=>$_smarty_tpl->tpl_vars['languages']->value,'input_name'=>'easytabs_content','class'=>"autoload_rte",'input_value'=>$_smarty_tpl->tpl_vars['steasytabs']->value->content), 0);?>

		</div>
    </div>
   	<div class="form-group">
		<label class="control-label col-lg-3">
            <?php echo $_smarty_tpl->getSubTemplate ("controllers/products/multishop/checkbox.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array('field'=>"easytabs_active",'type'=>"radio",'onclick'=>''), 0);?>

		<?php echo smartyTranslate(array('s'=>'Active:','mod'=>'steasytabs'),$_smarty_tpl);?>

        </label>
		<div class="col-lg-9 ">
    		<span class="switch prestashop-switch fixed-width-lg">
    		<input type="radio" <?php if ($_smarty_tpl->tpl_vars['steasytabs']->value->active) {?>checked="checked"<?php }?> value="1" id="easytabs_active_on" name="easytabs_active">
    		<label for="easytabs_active_on"><?php echo smartyTranslate(array('s'=>'Yes','mod'=>'steasytabs'),$_smarty_tpl);?>
</label>
    		<input type="radio" <?php if (!$_smarty_tpl->tpl_vars['steasytabs']->value->active) {?>checked="checked"<?php }?> value="0" id="easytabs_active_off" name="easytabs_active">
    		<label for="easytabs_active_off"><?php echo smartyTranslate(array('s'=>'No','mod'=>'steasytabs'),$_smarty_tpl);?>
</label>
    		<a class="slide-button btn"></a>
    		</span>												
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
    if(!display_multishop_checkboxes)
    {
        ad = '<?php echo $_smarty_tpl->tpl_vars['ad']->value;?>
';
        iso = '<?php echo $_smarty_tpl->tpl_vars['iso_tiny_mce']->value;?>
';
    }
    hideOtherLanguage(<?php echo $_smarty_tpl->tpl_vars['default_form_language']->value;?>
);
</script>

<script type="text/javascript">
    
     tabs_manager.onLoad("ModuleSteasytabs", function(){
        tinySetup({
			editor_selector :"autoload_rte"
		});
    });    
    
</script>

<script type="text/javascript">

$(document).ready(function($){ 

    ProductMultishop.checkAllModuleSteasytabs = function()
    {
         $.each(languages, function(k, v)
        	{
        		ProductMultishop.checkField($('input[name=\'multishop_check[easytabs_title]['+v.id_lang+']\']').prop('checked'), 'easytabs_title_'+v.id_lang);
        		ProductMultishop.checkField($('input[name=\'multishop_check[easytabs_content]['+v.id_lang+']\']').prop('checked'), 'easytabs_content_'+v.id_lang, 'tinymce');
        	});
        ProductMultishop.checkField($('input[name=\'multishop_check[easytabs_active]\']').prop('checked'), 'easytabs_active');   
    }

	if(display_multishop_checkboxes)
    {
        ProductMultishop.checkAllModuleSteasytabs();
    }
});

</script>
<?php }} ?>
