<?php /* Smarty version Smarty-3.1.19, created on 2017-01-04 17:58:25
         compiled from "D:\WWW\prestashop16110\modules\stcompare\views\templates\hook\stcompare.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14266586cc741cbc2f2-53404187%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2cb174068fd11739816e4755439d25799f1ea763' => 
    array (
      0 => 'D:\\WWW\\prestashop16110\\modules\\stcompare\\views\\templates\\hook\\stcompare.tpl',
      1 => 1482908692,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14266586cc741cbc2f2-53404187',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'comparator_max_item' => 0,
    'link' => 0,
    'compared_products' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_586cc741ccfb72_08736518',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_586cc741ccfb72_08736518')) {function content_586cc741ccfb72_08736518($_smarty_tpl) {?>
<!-- MODULE st compare -->
<?php if ($_smarty_tpl->tpl_vars['comparator_max_item']->value) {?>
<section id="rightbar_compare" class="rightbar_wrap">
    <a id="rightbar-product_compare" class="rightbar_tri icon_wrap" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getPageLink('products-comparison'), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo smartyTranslate(array('s'=>"Compare Products",'mod'=>'stcompare'),$_smarty_tpl);?>
">
        <i class="icon-adjust icon_btn icon-0x"></i>
        <span class="icon_text"><?php echo smartyTranslate(array('s'=>'Compare','mod'=>'stcompare'),$_smarty_tpl);?>
</span>
        <span class="compare_quantity amount_circle <?php if (!count($_smarty_tpl->tpl_vars['compared_products']->value)) {?> simple_hidden <?php }?><?php if (count($_smarty_tpl->tpl_vars['compared_products']->value)>9) {?> dozens <?php }?>"><?php echo count($_smarty_tpl->tpl_vars['compared_products']->value);?>
</span>
    </a>
</section>
<?php $_smarty_tpl->smarty->_tag_stack[] = array('addJsDefL', array('name'=>'stcompare_remove')); $_block_repeat=true; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'stcompare_remove'), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
<?php echo smartyTranslate(array('s'=>'Remove','mod'=>'stcompare','js'=>1),$_smarty_tpl);?>
<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo $_smarty_tpl->smarty->registered_plugins['block']['addJsDefL'][0][0]->addJsDefL(array('name'=>'stcompare_remove'), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

<?php }?>
<!-- /MODULE st compare --><?php }} ?>
