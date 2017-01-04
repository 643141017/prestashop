<?php /* Smarty version Smarty-3.1.19, created on 2017-01-04 17:58:25
         compiled from "D:\WWW\prestashop16110\modules\stmegamenu\views\templates\hook\stmegamenu-ul.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15145586cc7417b31f9-19267982%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '13e70481bdda50321dc5013fbb27f0ea8026dea1' => 
    array (
      0 => 'D:\\WWW\\prestashop16110\\modules\\stmegamenu\\views\\templates\\hook\\stmegamenu-ul.tpl',
      1 => 1482908692,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15145586cc7417b31f9-19267982',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'stmenu' => 0,
    'mm' => 0,
    'menu_title' => 0,
    'column' => 0,
    't_width_tpl' => 0,
    'block' => 0,
    'product' => 0,
    'menu' => 0,
    'link' => 0,
    'homeSize' => 0,
    'new_sticker' => 0,
    'sale_sticker' => 0,
    'PS_CATALOG_MODE' => 0,
    'restricted_country_mode' => 0,
    'brand' => 0,
    'img_manu_dir' => 0,
    'manufacturerSize' => 0,
    'has_children' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_586cc741a3f777_79908942',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_586cc741a3f777_79908942')) {function content_586cc741a3f777_79908942($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_replace')) include 'D:\\WWW\\prestashop16110\\tools\\smarty\\plugins\\modifier.replace.php';
?><ul class="st_mega_menu clearfix mu_level_0">
	<?php  $_smarty_tpl->tpl_vars['mm'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['mm']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['stmenu']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['mm']->key => $_smarty_tpl->tpl_vars['mm']->value) {
$_smarty_tpl->tpl_vars['mm']->_loop = true;
?>
		<li id="st_menu_<?php echo $_smarty_tpl->tpl_vars['mm']->value['id_st_mega_menu'];?>
" class="ml_level_0 m_alignment_<?php echo $_smarty_tpl->tpl_vars['mm']->value['alignment'];?>
">
			<a id="st_ma_<?php echo $_smarty_tpl->tpl_vars['mm']->value['id_st_mega_menu'];?>
" href="<?php if ($_smarty_tpl->tpl_vars['mm']->value['m_link']) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['mm']->value['m_link'], ENT_QUOTES, 'UTF-8', true);?>
<?php } else { ?>javascript:;<?php }?>" class="ma_level_0<?php if (isset($_smarty_tpl->tpl_vars['mm']->value['column'])&&count($_smarty_tpl->tpl_vars['mm']->value['column'])) {?> is_parent<?php }?><?php if ($_smarty_tpl->tpl_vars['mm']->value['m_icon']) {?> ma_icon<?php }?>"<?php if (!$_smarty_tpl->tpl_vars['menu_title']->value) {?> title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['mm']->value['m_title'], ENT_QUOTES, 'UTF-8', true);?>
"<?php }?><?php if ($_smarty_tpl->tpl_vars['mm']->value['nofollow']) {?> rel="nofollow"<?php }?>><?php if ($_smarty_tpl->tpl_vars['mm']->value['m_icon']) {?><?php echo $_smarty_tpl->tpl_vars['mm']->value['m_icon'];?>
<?php } else { ?><?php if ($_smarty_tpl->tpl_vars['mm']->value['icon_class']) {?><i class="<?php echo $_smarty_tpl->tpl_vars['mm']->value['icon_class'];?>
"></i><?php }?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['mm']->value['m_name'], ENT_QUOTES, 'UTF-8', true);?>
<?php }?><?php if ($_smarty_tpl->tpl_vars['mm']->value['cate_label']) {?><span class="cate_label"><?php echo $_smarty_tpl->tpl_vars['mm']->value['cate_label'];?>
</span><?php }?></a>
			<?php if (isset($_smarty_tpl->tpl_vars['mm']->value['column'])&&count($_smarty_tpl->tpl_vars['mm']->value['column'])) {?>
				<?php if ($_smarty_tpl->tpl_vars['mm']->value['is_mega']) {?>
				<div class="stmenu_sub style_wide col-md-<?php echo smarty_modifier_replace(($_smarty_tpl->tpl_vars['mm']->value['width']*10/10),'.','-');?>
">
					<div class="row m_column_row">
					<?php $_smarty_tpl->tpl_vars['t_width_tpl'] = new Smarty_variable(0, null, 0);?>
					<?php  $_smarty_tpl->tpl_vars['column'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['column']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['mm']->value['column']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['column']->key => $_smarty_tpl->tpl_vars['column']->value) {
$_smarty_tpl->tpl_vars['column']->_loop = true;
?>
						<?php if (isset($_smarty_tpl->tpl_vars['column']->value['children'])&&count($_smarty_tpl->tpl_vars['column']->value['children'])) {?>
						<?php $_smarty_tpl->tpl_vars["t_width_tpl"] = new Smarty_variable($_smarty_tpl->tpl_vars['t_width_tpl']->value+$_smarty_tpl->tpl_vars['column']->value['width'], null, 0);?>
						<?php if ($_smarty_tpl->tpl_vars['t_width_tpl']->value>$_smarty_tpl->tpl_vars['mm']->value['t_width']) {?>
							<?php $_smarty_tpl->tpl_vars["t_width_tpl"] = new Smarty_variable($_smarty_tpl->tpl_vars['column']->value['width'], null, 0);?>
							</div><div class="row m_column_row">
						<?php }?>
						<div id="st_menu_column_<?php echo $_smarty_tpl->tpl_vars['column']->value['id_st_mega_column'];?>
" class="col-md-<?php echo smarty_modifier_replace(($_smarty_tpl->tpl_vars['column']->value['width']*10/10),'.','-');?>
">
							<?php  $_smarty_tpl->tpl_vars['block'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['block']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['column']->value['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['block']->key => $_smarty_tpl->tpl_vars['block']->value) {
$_smarty_tpl->tpl_vars['block']->_loop = true;
?>
								<?php if ($_smarty_tpl->tpl_vars['block']->value['item_t']==1) {?>
									<?php if ($_smarty_tpl->tpl_vars['block']->value['subtype']==2&&isset($_smarty_tpl->tpl_vars['block']->value['children'])) {?>
										<div id="st_menu_block_<?php echo $_smarty_tpl->tpl_vars['block']->value['id_st_mega_menu'];?>
">
    										<?php if ($_smarty_tpl->tpl_vars['block']->value['show_cate_img']) {?>
							                    <?php echo $_smarty_tpl->getSubTemplate ("./stmegamenu-cate-img.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array('menu_cate'=>$_smarty_tpl->tpl_vars['block']->value['children'],'nofollow'=>$_smarty_tpl->tpl_vars['block']->value['nofollow']), 0);?>

    										<?php }?>
    										<ul class="mu_level_1">
												<li class="ml_level_1">
													<a id="st_ma_<?php echo $_smarty_tpl->tpl_vars['block']->value['id_st_mega_menu'];?>
" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['children']['link'], ENT_QUOTES, 'UTF-8', true);?>
"<?php if (!$_smarty_tpl->tpl_vars['menu_title']->value) {?> title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['children']['name'], ENT_QUOTES, 'UTF-8', true);?>
"<?php }?><?php if ($_smarty_tpl->tpl_vars['block']->value['nofollow']) {?> rel="nofollow"<?php }?> class="ma_level_1 ma_item"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['children']['name'], ENT_QUOTES, 'UTF-8', true);?>
<?php if ($_smarty_tpl->tpl_vars['block']->value['cate_label']) {?><span class="cate_label"><?php echo $_smarty_tpl->tpl_vars['block']->value['cate_label'];?>
</span><?php }?></a>
													<?php if (isset($_smarty_tpl->tpl_vars['block']->value['children']['children'])&&is_array($_smarty_tpl->tpl_vars['block']->value['children']['children'])&&count($_smarty_tpl->tpl_vars['block']->value['children']['children'])) {?>
														<ul class="mu_level_2">
    													<?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['block']->value['children']['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
?>
														<li class="ml_level_2"><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['link'], ENT_QUOTES, 'UTF-8', true);?>
"<?php if (!$_smarty_tpl->tpl_vars['menu_title']->value) {?> title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
"<?php }?><?php if ($_smarty_tpl->tpl_vars['block']->value['nofollow']) {?> rel="nofollow"<?php }?> class="ma_level_2 ma_item"><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['truncate'][0][0]->smarty_modifier_truncate($_smarty_tpl->tpl_vars['product']->value['name'],30,'...'), ENT_QUOTES, 'UTF-8', true);?>
</a></li>
    													<?php } ?>
														</ul>	
													<?php }?>
												</li>
											</ul>	
										</div>
									<?php } elseif ($_smarty_tpl->tpl_vars['block']->value['subtype']==0&&isset($_smarty_tpl->tpl_vars['block']->value['children']['children'])&&count($_smarty_tpl->tpl_vars['block']->value['children']['children'])) {?>
										<div id="st_menu_block_<?php echo $_smarty_tpl->tpl_vars['block']->value['id_st_mega_menu'];?>
">
										<div class="row">
										<?php  $_smarty_tpl->tpl_vars['menu'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['menu']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['block']->value['children']['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['menu']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['menu']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['menu']->key => $_smarty_tpl->tpl_vars['menu']->value) {
$_smarty_tpl->tpl_vars['menu']->_loop = true;
 $_smarty_tpl->tpl_vars['menu']->iteration++;
 $_smarty_tpl->tpl_vars['menu']->last = $_smarty_tpl->tpl_vars['menu']->iteration === $_smarty_tpl->tpl_vars['menu']->total;
?>
	    									<div class="col-md-<?php echo smarty_modifier_replace(((12/$_smarty_tpl->tpl_vars['block']->value['items_md'])*10/10),'.','-');?>
">
	    										<?php if ($_smarty_tpl->tpl_vars['block']->value['show_cate_img']) {?>
								                    <?php echo $_smarty_tpl->getSubTemplate ("./stmegamenu-cate-img.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array('menu_cate'=>$_smarty_tpl->tpl_vars['menu']->value,'nofollow'=>$_smarty_tpl->tpl_vars['block']->value['nofollow']), 0);?>

	    										<?php }?>
	    										<ul class="mu_level_1">
													<li class="ml_level_1">
														<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['menu']->value['link'], ENT_QUOTES, 'UTF-8', true);?>
"<?php if (!$_smarty_tpl->tpl_vars['menu_title']->value) {?> title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['menu']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
"<?php }?><?php if ($_smarty_tpl->tpl_vars['block']->value['nofollow']) {?> rel="nofollow"<?php }?> class="ma_level_1 ma_item"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['menu']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
</a>
														<?php if (isset($_smarty_tpl->tpl_vars['menu']->value['children'])&&is_array($_smarty_tpl->tpl_vars['menu']->value['children'])&&count($_smarty_tpl->tpl_vars['menu']->value['children'])) {?>
	    													<?php echo $_smarty_tpl->getSubTemplate ("./stmegamenu-category.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array('nofollow'=>$_smarty_tpl->tpl_vars['block']->value['nofollow'],'menus'=>$_smarty_tpl->tpl_vars['menu']->value['children'],'m_level'=>2), 0);?>

														<?php }?>
													</li>
												</ul>	
	    									</div>
	    									<?php if ($_smarty_tpl->tpl_vars['menu']->iteration%$_smarty_tpl->tpl_vars['block']->value['items_md']==0&&!$_smarty_tpl->tpl_vars['menu']->last) {?>
	    									</div><div class="row">
	    									<?php }?>
    									<?php } ?>
										</div>
										</div>
    								<?php } elseif ($_smarty_tpl->tpl_vars['block']->value['subtype']==1||$_smarty_tpl->tpl_vars['block']->value['subtype']==3) {?>
										<div id="st_menu_block_<?php echo $_smarty_tpl->tpl_vars['block']->value['id_st_mega_menu'];?>
">
											<?php if ($_smarty_tpl->tpl_vars['block']->value['show_cate_img']) {?>
							                    <?php echo $_smarty_tpl->getSubTemplate ("./stmegamenu-cate-img.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array('menu_cate'=>$_smarty_tpl->tpl_vars['block']->value['children'],'nofollow'=>$_smarty_tpl->tpl_vars['block']->value['nofollow']), 0);?>

    										<?php }?>
											<ul class="mu_level_1">
												<li class="ml_level_1">
													<a id="st_ma_<?php echo $_smarty_tpl->tpl_vars['block']->value['id_st_mega_menu'];?>
" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['children']['link'], ENT_QUOTES, 'UTF-8', true);?>
"<?php if (!$_smarty_tpl->tpl_vars['menu_title']->value) {?> title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['children']['name'], ENT_QUOTES, 'UTF-8', true);?>
"<?php }?><?php if ($_smarty_tpl->tpl_vars['block']->value['nofollow']) {?> rel="nofollow"<?php }?> class="ma_level_1 ma_item"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['children']['name'], ENT_QUOTES, 'UTF-8', true);?>
<?php if ($_smarty_tpl->tpl_vars['block']->value['cate_label']) {?><span class="cate_label"><?php echo $_smarty_tpl->tpl_vars['block']->value['cate_label'];?>
</span><?php }?></a>
													<?php if ($_smarty_tpl->tpl_vars['block']->value['subtype']==1&&isset($_smarty_tpl->tpl_vars['block']->value['children']['children'])&&is_array($_smarty_tpl->tpl_vars['block']->value['children']['children'])&&count($_smarty_tpl->tpl_vars['block']->value['children']['children'])) {?>
    													<?php echo $_smarty_tpl->getSubTemplate ("./stmegamenu-category.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array('nofollow'=>$_smarty_tpl->tpl_vars['block']->value['nofollow'],'menus'=>$_smarty_tpl->tpl_vars['block']->value['children']['children'],'m_level'=>2), 0);?>

													<?php }?>
												</li>
											</ul>	
										</div>
									<?php }?>
								<?php } elseif ($_smarty_tpl->tpl_vars['block']->value['item_t']==2&&isset($_smarty_tpl->tpl_vars['block']->value['children'])&&count($_smarty_tpl->tpl_vars['block']->value['children'])) {?>
									<div id="st_menu_block_<?php echo $_smarty_tpl->tpl_vars['block']->value['id_st_mega_menu'];?>
" class="row">
									<?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['block']->value['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
?>
    									<div class="col-md-<?php echo smarty_modifier_replace(((12/$_smarty_tpl->tpl_vars['block']->value['items_md'])*10/10),'.','-');?>
">
    										<div class="pro_first_box">
    											<a class="product_img_link"	href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getProductLink($_smarty_tpl->tpl_vars['product']->value->id,$_smarty_tpl->tpl_vars['product']->value->link_rewrite,$_smarty_tpl->tpl_vars['product']->value->category), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value->name, ENT_QUOTES, 'UTF-8', true);?>
" itemprop="url"<?php if ($_smarty_tpl->tpl_vars['block']->value['nofollow']) {?> rel="nofollow"<?php }?>>
													<img class="replace-2x img-responsive" src="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getImageLink($_smarty_tpl->tpl_vars['product']->value->link_rewrite,$_smarty_tpl->tpl_vars['product']->value->id_image,'home_default'), ENT_QUOTES, 'UTF-8', true);?>
" alt="<?php if (!empty($_smarty_tpl->tpl_vars['product']->value->legend)) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value->legend, ENT_QUOTES, 'UTF-8', true);?>
<?php } else { ?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value->name, ENT_QUOTES, 'UTF-8', true);?>
<?php }?>" title="<?php if (!empty($_smarty_tpl->tpl_vars['product']->value->legend)) {?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value->legend, ENT_QUOTES, 'UTF-8', true);?>
<?php } else { ?><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value->name, ENT_QUOTES, 'UTF-8', true);?>
<?php }?>" <?php if (isset($_smarty_tpl->tpl_vars['homeSize']->value)) {?> width="<?php echo $_smarty_tpl->tpl_vars['homeSize']->value['width'];?>
" height="<?php echo $_smarty_tpl->tpl_vars['homeSize']->value['height'];?>
"<?php }?> itemprop="image" />
													<?php if ($_smarty_tpl->tpl_vars['new_sticker']->value!=2&&$_smarty_tpl->tpl_vars['product']->value->is_new) {?><span class="new"><i><?php echo smartyTranslate(array('s'=>'New','mod'=>'stmegamenu'),$_smarty_tpl);?>
</i></span><?php }?>
													<?php if ($_smarty_tpl->tpl_vars['sale_sticker']->value!=2&&!$_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value&&isset($_smarty_tpl->tpl_vars['product']->value->on_sale)&&$_smarty_tpl->tpl_vars['product']->value->on_sale&&isset($_smarty_tpl->tpl_vars['product']->value->show_price)&&$_smarty_tpl->tpl_vars['product']->value->show_price) {?><span class="on_sale"><i><?php echo smartyTranslate(array('s'=>'Sale','mod'=>'stmegamenu'),$_smarty_tpl);?>
</i></span><?php }?>
												</a>
    										</div>
    										<div class="pro_second_box">
												<p class="s_title_block">
												<a class="product-name" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['link']->value->getProductLink($_smarty_tpl->tpl_vars['product']->value->id,$_smarty_tpl->tpl_vars['product']->value->link_rewrite,$_smarty_tpl->tpl_vars['product']->value->category), ENT_QUOTES, 'UTF-8', true);?>
" title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value->name, ENT_QUOTES, 'UTF-8', true);?>
" itemprop="url"<?php if ($_smarty_tpl->tpl_vars['block']->value['nofollow']) {?> rel="nofollow"<?php }?>>
													<?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['truncate'][0][0]->smarty_modifier_truncate($_smarty_tpl->tpl_vars['product']->value->name,45,'...'), ENT_QUOTES, 'UTF-8', true);?>

												</a>
												</p>
												<div class="price_container" >
													<?php if (isset($_smarty_tpl->tpl_vars['product']->value->show_price)&&$_smarty_tpl->tpl_vars['product']->value->show_price&&!isset($_smarty_tpl->tpl_vars['restricted_country_mode']->value)&&!$_smarty_tpl->tpl_vars['PS_CATALOG_MODE']->value) {?><span class="price product-price"><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['convertPrice'][0][0]->convertPrice(array('price'=>$_smarty_tpl->tpl_vars['product']->value->displayed_price),$_smarty_tpl);?>
</span>
								                    <?php }?>
												</div>
    										</div>
    									</div>
									<?php } ?>
									</div>
								<?php } elseif ($_smarty_tpl->tpl_vars['block']->value['item_t']==3&&isset($_smarty_tpl->tpl_vars['block']->value['children'])&&count($_smarty_tpl->tpl_vars['block']->value['children'])) {?>
									<div id="st_menu_block_<?php echo $_smarty_tpl->tpl_vars['block']->value['id_st_mega_menu'];?>
" class="row">
									<?php  $_smarty_tpl->tpl_vars['brand'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['brand']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['block']->value['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['brand']->key => $_smarty_tpl->tpl_vars['brand']->value) {
$_smarty_tpl->tpl_vars['brand']->_loop = true;
?>
    									<div class="col-md-<?php echo smarty_modifier_replace(((12/$_smarty_tpl->tpl_vars['block']->value['items_md'])*10/10),'.','-');?>
">
											<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value->getmanufacturerLink($_smarty_tpl->tpl_vars['brand']->value['id_manufacturer'],$_smarty_tpl->tpl_vars['brand']->value['link_rewrite']);?>
"<?php if (!$_smarty_tpl->tpl_vars['menu_title']->value) {?> title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['brand']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
"<?php }?><?php if ($_smarty_tpl->tpl_vars['block']->value['nofollow']) {?> rel="nofollow"<?php }?> class="st_menu_brand">
							                    <img src="<?php echo $_smarty_tpl->tpl_vars['img_manu_dir']->value;?>
<?php echo mb_convert_encoding(htmlspecialchars($_smarty_tpl->tpl_vars['brand']->value['id_manufacturer'], ENT_QUOTES, 'UTF-8', true), "HTML-ENTITIES", 'UTF-8');?>
-manufacturer_default.jpg" alt="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['brand']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
" width="<?php echo $_smarty_tpl->tpl_vars['manufacturerSize']->value['width'];?>
" height="<?php echo $_smarty_tpl->tpl_vars['manufacturerSize']->value['height'];?>
" class="replace-2x img-responsive" />
							                </a>
    									</div>
									<?php } ?>
									</div>
								<?php } elseif ($_smarty_tpl->tpl_vars['block']->value['item_t']==4) {?>
									<div id="st_menu_block_<?php echo $_smarty_tpl->tpl_vars['block']->value['id_st_mega_menu'];?>
">
										<ul class="mu_level_1">
											<li class="ml_level_1">
												<a id="st_ma_<?php echo $_smarty_tpl->tpl_vars['block']->value['id_st_mega_menu'];?>
" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['m_link'], ENT_QUOTES, 'UTF-8', true);?>
"<?php if (!$_smarty_tpl->tpl_vars['menu_title']->value) {?> title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['m_title'], ENT_QUOTES, 'UTF-8', true);?>
"<?php }?><?php if ($_smarty_tpl->tpl_vars['block']->value['nofollow']) {?> rel="nofollow"<?php }?> class="ma_level_1 ma_item"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['m_name'], ENT_QUOTES, 'UTF-8', true);?>
<?php if ($_smarty_tpl->tpl_vars['block']->value['cate_label']) {?><span class="cate_label"><?php echo $_smarty_tpl->tpl_vars['block']->value['cate_label'];?>
</span><?php }?></a>
												<?php if (isset($_smarty_tpl->tpl_vars['block']->value['children'])&&is_array($_smarty_tpl->tpl_vars['block']->value['children'])&&count($_smarty_tpl->tpl_vars['block']->value['children'])) {?>
													<ul class="mu_level_2">
    												<?php  $_smarty_tpl->tpl_vars['menu'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['menu']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['block']->value['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['menu']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['menu']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['menu']->key => $_smarty_tpl->tpl_vars['menu']->value) {
$_smarty_tpl->tpl_vars['menu']->_loop = true;
 $_smarty_tpl->tpl_vars['menu']->iteration++;
 $_smarty_tpl->tpl_vars['menu']->last = $_smarty_tpl->tpl_vars['menu']->iteration === $_smarty_tpl->tpl_vars['menu']->total;
?>
    													<?php echo $_smarty_tpl->getSubTemplate ("./stmegamenu-link.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array('nofollow'=>$_smarty_tpl->tpl_vars['block']->value['nofollow'],'menus'=>$_smarty_tpl->tpl_vars['menu']->value,'m_level'=>2), 0);?>

	    											<?php } ?>
													</ul>
												<?php }?>
											</li>
										</ul>	
									</div>
								<?php } elseif ($_smarty_tpl->tpl_vars['block']->value['item_t']==5&&$_smarty_tpl->tpl_vars['block']->value['html']) {?>
									<div id="st_menu_block_<?php echo $_smarty_tpl->tpl_vars['block']->value['id_st_mega_menu'];?>
" class="style_content">
										<?php echo $_smarty_tpl->tpl_vars['block']->value['html'];?>

									</div>
								<?php }?>
							<?php } ?>
						</div>
						<?php }?>
					<?php } ?>
					</div>
				</div>
				<?php } else { ?>
					<ul id="st_menu_multi_level_<?php echo $_smarty_tpl->tpl_vars['mm']->value['id_st_mega_menu'];?>
" class="stmenu_sub stmenu_multi_level">
					<?php  $_smarty_tpl->tpl_vars['column'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['column']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['mm']->value['column']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['column']->key => $_smarty_tpl->tpl_vars['column']->value) {
$_smarty_tpl->tpl_vars['column']->_loop = true;
?>
						<?php if (isset($_smarty_tpl->tpl_vars['column']->value['children'])&&count($_smarty_tpl->tpl_vars['column']->value['children'])) {?>
							<?php  $_smarty_tpl->tpl_vars['block'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['block']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['column']->value['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['block']->key => $_smarty_tpl->tpl_vars['block']->value) {
$_smarty_tpl->tpl_vars['block']->_loop = true;
?>
								<?php if ($_smarty_tpl->tpl_vars['block']->value['item_t']==1) {?>
									<?php if ($_smarty_tpl->tpl_vars['block']->value['subtype']==2&&isset($_smarty_tpl->tpl_vars['block']->value['children'])&&count($_smarty_tpl->tpl_vars['block']->value['children'])) {?>
										<?php if (isset($_smarty_tpl->tpl_vars['block']->value['children']['children'])&&is_array($_smarty_tpl->tpl_vars['block']->value['children']['children'])&&count($_smarty_tpl->tpl_vars['block']->value['children']['children'])) {?>
											<?php  $_smarty_tpl->tpl_vars['product'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['product']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['block']->value['children']['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['product']->key => $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->_loop = true;
?>
											<li class="ml_level_1"><a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['link'], ENT_QUOTES, 'UTF-8', true);?>
"<?php if (!$_smarty_tpl->tpl_vars['menu_title']->value) {?> title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
"<?php }?><?php if ($_smarty_tpl->tpl_vars['block']->value['nofollow']) {?> rel="nofollow"<?php }?> class="ma_level_1 ma_item"><?php echo htmlspecialchars($_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_MODIFIER]['truncate'][0][0]->smarty_modifier_truncate($_smarty_tpl->tpl_vars['product']->value['name'],30,'...'), ENT_QUOTES, 'UTF-8', true);?>
</a></li>
											<?php } ?>
										<?php }?>
									<?php } elseif ($_smarty_tpl->tpl_vars['block']->value['subtype']==0&&isset($_smarty_tpl->tpl_vars['block']->value['children']['children'])&&count($_smarty_tpl->tpl_vars['block']->value['children']['children'])) {?>
										<?php  $_smarty_tpl->tpl_vars['menu'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['menu']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['block']->value['children']['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['menu']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['menu']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['menu']->key => $_smarty_tpl->tpl_vars['menu']->value) {
$_smarty_tpl->tpl_vars['menu']->_loop = true;
 $_smarty_tpl->tpl_vars['menu']->iteration++;
 $_smarty_tpl->tpl_vars['menu']->last = $_smarty_tpl->tpl_vars['menu']->iteration === $_smarty_tpl->tpl_vars['menu']->total;
?> 
											<li class="ml_level_1">
												<?php $_smarty_tpl->tpl_vars['has_children'] = new Smarty_variable((isset($_smarty_tpl->tpl_vars['menu']->value['children'])&&is_array($_smarty_tpl->tpl_vars['menu']->value['children'])&&count($_smarty_tpl->tpl_vars['menu']->value['children'])), null, 0);?>
												<a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['menu']->value['link'], ENT_QUOTES, 'UTF-8', true);?>
"<?php if (!$_smarty_tpl->tpl_vars['menu_title']->value) {?> title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['menu']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
"<?php }?><?php if ($_smarty_tpl->tpl_vars['block']->value['nofollow']) {?> rel="nofollow"<?php }?> class="ma_level_1 ma_item <?php if ($_smarty_tpl->tpl_vars['has_children']->value) {?> has_children <?php }?>"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['menu']->value['name'], ENT_QUOTES, 'UTF-8', true);?>
<?php if ($_smarty_tpl->tpl_vars['has_children']->value) {?><span class="is_parent_icon"><b class="is_parent_icon_h"></b><b class="is_parent_icon_v"></b></span><?php }?></a>
												<?php if ($_smarty_tpl->tpl_vars['has_children']->value) {?>
													<?php echo $_smarty_tpl->getSubTemplate ("./stmegamenu-category.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array('nofollow'=>$_smarty_tpl->tpl_vars['block']->value['nofollow'],'menus'=>$_smarty_tpl->tpl_vars['menu']->value['children'],'m_level'=>2), 0);?>

												<?php }?>
											</li>
    									<?php } ?>
    								<?php } elseif ($_smarty_tpl->tpl_vars['block']->value['subtype']==1||$_smarty_tpl->tpl_vars['block']->value['subtype']==3) {?>
    									<li class="ml_level_1">
											<?php $_smarty_tpl->tpl_vars['has_children'] = new Smarty_variable((isset($_smarty_tpl->tpl_vars['block']->value['children']['children'])&&count($_smarty_tpl->tpl_vars['block']->value['children']['children'])), null, 0);?>
											<a id="st_ma_<?php echo $_smarty_tpl->tpl_vars['block']->value['id_st_mega_menu'];?>
" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['children']['link'], ENT_QUOTES, 'UTF-8', true);?>
"<?php if (!$_smarty_tpl->tpl_vars['menu_title']->value) {?> title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['children']['name'], ENT_QUOTES, 'UTF-8', true);?>
"<?php }?><?php if ($_smarty_tpl->tpl_vars['block']->value['nofollow']) {?> rel="nofollow"<?php }?> class="ma_level_1 ma_item <?php if ($_smarty_tpl->tpl_vars['has_children']->value) {?> has_children <?php }?>"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['children']['name'], ENT_QUOTES, 'UTF-8', true);?>
<?php if ($_smarty_tpl->tpl_vars['has_children']->value) {?><span class="is_parent_icon"><b class="is_parent_icon_h"></b><b class="is_parent_icon_v"></b></span><?php }?><?php if ($_smarty_tpl->tpl_vars['block']->value['cate_label']) {?><span class="cate_label"><?php echo $_smarty_tpl->tpl_vars['block']->value['cate_label'];?>
</span><?php }?></a>
	    									<?php if ($_smarty_tpl->tpl_vars['has_children']->value) {?>
												<?php echo $_smarty_tpl->getSubTemplate ("./stmegamenu-category.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array('nofollow'=>$_smarty_tpl->tpl_vars['block']->value['nofollow'],'menus'=>$_smarty_tpl->tpl_vars['block']->value['children']['children'],'m_level'=>2), 0);?>

    										<?php }?>
										</li>
									<?php }?>
								<?php } elseif ($_smarty_tpl->tpl_vars['block']->value['item_t']==4) {?>
									<li class="ml_level_1">
										<?php $_smarty_tpl->tpl_vars['has_children'] = new Smarty_variable((isset($_smarty_tpl->tpl_vars['block']->value['children'])&&is_array($_smarty_tpl->tpl_vars['block']->value['children'])&&count($_smarty_tpl->tpl_vars['block']->value['children'])), null, 0);?>
										<a id="st_ma_<?php echo $_smarty_tpl->tpl_vars['block']->value['id_st_mega_menu'];?>
" href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['m_link'], ENT_QUOTES, 'UTF-8', true);?>
"<?php if (!$_smarty_tpl->tpl_vars['menu_title']->value) {?> title="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['m_title'], ENT_QUOTES, 'UTF-8', true);?>
"<?php }?><?php if ($_smarty_tpl->tpl_vars['block']->value['nofollow']) {?> rel="nofollow"<?php }?> class="ma_level_1 ma_item <?php if ($_smarty_tpl->tpl_vars['has_children']->value) {?> has_children <?php }?>"><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['block']->value['m_name'], ENT_QUOTES, 'UTF-8', true);?>
<?php if ($_smarty_tpl->tpl_vars['has_children']->value) {?><span class="is_parent_icon"><b class="is_parent_icon_h"></b><b class="is_parent_icon_v"></b></span><?php }?><?php if ($_smarty_tpl->tpl_vars['block']->value['cate_label']) {?><span class="cate_label"><?php echo $_smarty_tpl->tpl_vars['block']->value['cate_label'];?>
</span><?php }?></a>
										<?php if ($_smarty_tpl->tpl_vars['has_children']->value) {?>
											<?php  $_smarty_tpl->tpl_vars['menu'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['menu']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['block']->value['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['menu']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['menu']->iteration=0;
foreach ($_from as $_smarty_tpl->tpl_vars['menu']->key => $_smarty_tpl->tpl_vars['menu']->value) {
$_smarty_tpl->tpl_vars['menu']->_loop = true;
 $_smarty_tpl->tpl_vars['menu']->iteration++;
 $_smarty_tpl->tpl_vars['menu']->last = $_smarty_tpl->tpl_vars['menu']->iteration === $_smarty_tpl->tpl_vars['menu']->total;
?>
												<ul class="mu_level_2">
												<?php echo $_smarty_tpl->getSubTemplate ("./stmegamenu-link.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array('nofollow'=>$_smarty_tpl->tpl_vars['block']->value['nofollow'],'menus'=>$_smarty_tpl->tpl_vars['menu']->value,'m_level'=>2), 0);?>

												</ul>
											<?php } ?>
										<?php }?>
									</li>
								<?php } elseif ($_smarty_tpl->tpl_vars['block']->value['item_t']==5&&$_smarty_tpl->tpl_vars['block']->value['html']) {?>
									<li class="ml_level_1">
    									<div id="st_menu_block_<?php echo $_smarty_tpl->tpl_vars['block']->value['id_st_mega_menu'];?>
" class="style_content">
    										<?php echo $_smarty_tpl->tpl_vars['block']->value['html'];?>

    									</div>
									</li>
								<?php } else { ?>
									
								<?php }?>
							<?php } ?>
						<?php }?>
					<?php } ?>
					</ul>
				<?php }?>
			<?php }?>
		</li>
	<?php } ?>
</ul><?php }} ?>
