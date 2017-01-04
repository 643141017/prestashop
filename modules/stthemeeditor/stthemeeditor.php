<?php
/*
* 2007-2014 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Academic Free License (AFL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/afl-3.0.php
* If you did not receive a copy of the license and are unable to
* obtain it through the world-wide-web, please send an email
* to license@prestashop.com so we can send you a copy immediately.
*
* DISCLAIMER
*
* Do not edit or add to this file if you wish to upgrade PrestaShop to newer
* versions in the future. If you wish to customize PrestaShop for your
* needs please refer to http://www.prestashop.com for more information.
*
*  @author PrestaShop SA <contact@prestashop.com>
*  @copyright  2007-2014 PrestaShop SA
*  @license    http://opensource.org/licenses/afl-3.0.php  Academic Free License (AFL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/

if (!defined('_PS_VERSION_'))
	exit;
        
class StThemeEditor extends Module
{	
    protected static $access_rights = 0775;
    public $imgtype = array('jpg', 'gif', 'jpeg', 'png');
    public $defaults;
    private $_html;
    private $_config_folder;
    private $_hooks;
    public $fields_form; 
    public $fields_value;
    public $validation_errors = array();
    private $systemFonts = array("Helvetica","Arial","Verdana","Georgia","Tahoma","Times New Roman","sans-serif");
    private $googleFonts;
    private $lang_array = array('welcome','welcome_logged','welcome_link','copyright_text');//,'search_label','newsletter_label'
    public static $position_right_panel = array(
		array('id' => '1_0', 'name' => 'At bottom of screen'),
		array('id' => '1_10', 'name' => 'Bottom 10%'),
		array('id' => '1_20', 'name' => 'Bottom 20%'),
		array('id' => '1_30', 'name' => 'Bottom 30%'),
		array('id' => '1_40', 'name' => 'Bottom 40%'),
		array('id' => '1_50', 'name' => 'Bottom 50%'),
		array('id' => '2_0', 'name' => 'At top of screen'),
		array('id' => '2_10', 'name' => 'Top 10%'),
		array('id' => '2_20', 'name' => 'Top 20%'),
		array('id' => '2_30', 'name' => 'Top 30%'),
		array('id' => '2_40', 'name' => 'Top 40%'),
		array('id' => '2_50', 'name' => 'Top 50%'),
    );
    public static $items = array(
		array('id' => 2, 'name' => '2'),
		array('id' => 3, 'name' => '3'),
		array('id' => 4, 'name' => '4'),
		array('id' => 5, 'name' => '5'),
		array('id' => 6, 'name' => '6'),
    );
    public static $textTransform = array(
		array('id' => 0, 'name' => 'none'),
		array('id' => 1, 'name' => 'uppercase'),
		array('id' => 2, 'name' => 'lowercase'),
		array('id' => 3, 'name' => 'capitalize'),
    );
    public static $tabs = array(
        array('id'  => '0,23', 'name' => 'General'),
        array('id'  => '1', 'name' => 'Category pages'),
        array('id'  => '16,35', 'name' => 'Product pages'),
        array('id'  => '2,31,32,33,34,20,36', 'name' => 'Color'),
        array('id'  => '3,27,29,28', 'name' => 'Font'),
        array('id'  => '15,24,25,26', 'name' => 'Stickers'),
        array('id'  => '30,4', 'name' => 'Header'),
        array('id'  => '37', 'name' => 'Sticky header/menu'),
        array('id'  => '5,21', 'name' => 'Menu'),
        array('id'  => '6', 'name' => 'Body'),
        array('id'  => '7,8,9,10', 'name' => 'Footer'),
        array('id'  => '11,12,13', 'name' => 'Slides'),
        array('id'  => '14', 'name' => 'Custom codes'),
        array('id'  => '17', 'name' => 'Module navigation'),
        array('id'  => '18', 'name' => 'Iphone/Ipad icons'),
    );
    public static $logo_width_map = array(
        array('id'=>1, 'name'=>'1/12'),
        array('id'=>2, 'name'=>'2/12'),
        array('id'=>3, 'name'=>'3/12'),
        array('id'=>5, 'name'=>'5/12'),
        array('id'=>6, 'name'=>'6/12'),
        array('id'=>7, 'name'=>'7/12'),
        array('id'=>8, 'name'=>'8/12'),
        array('id'=>9, 'name'=>'9/12'),
        array('id'=>10, 'name'=>'10/12'),
        array('id'=>11, 'name'=>'11/12'),
        array('id'=>12, 'name'=>'12/12'),
    );
    public static $border_style_map = array(
        array('id'=>0,  'name'=>'None'),
        array('id'=>11, 'name'=>'Full width, 1px height'),
        array('id'=>12, 'name'=>'Full width, 2px height'),
        array('id'=>13, 'name'=>'Full width, 3px height'),
        array('id'=>14, 'name'=>'Full width, 4px height'),
        array('id'=>15, 'name'=>'Full width, 5px height'),
        array('id'=>16, 'name'=>'Full width, 6px height'),
        array('id'=>17, 'name'=>'Full width, 7px height'),
        array('id'=>18, 'name'=>'Full width, 8px height'),
        array('id'=>19, 'name'=>'Full width, 9px height'),
        array('id'=>21, 'name'=>'Boxed width, 1px height'),
        array('id'=>22, 'name'=>'Boxed width, 2px height'),
        array('id'=>23, 'name'=>'Boxed width, 3px height'),
        array('id'=>24, 'name'=>'Boxed width, 4px height'),
        array('id'=>25, 'name'=>'Boxed width, 5px height'),
        array('id'=>26, 'name'=>'Boxed width, 6px height'),
        array('id'=>27, 'name'=>'Boxed width, 7px height'),
        array('id'=>28, 'name'=>'Boxed width, 8px height'),
        array('id'=>29, 'name'=>'Boxed width, 9px height'),
    );
	public function __construct()
	{
		$this->name = 'stthemeeditor';
		$this->tab = 'administration';
		$this->version = '1.1.2';
		$this->author = 'SUNNYTOO.COM';
		$this->need_instance = 0;
        $this->bootstrap = true;

        $this->bootstrap = true;
	 	parent::__construct();

		$this->displayName = $this->l('Theme editor');
		$this->description = $this->l('Allows to change theme design');

        $this->googleFonts = include_once(dirname(__FILE__).'/googlefonts.php');
        
        $this->_config_folder = _PS_MODULE_DIR_.$this->name.'/config/';

        $this->defaults = array(
            'responsive'                       => array('exp'=>1,'val'=>1),
            'responsive_max'                   => array('exp'=>1,'val'=>1),
            'boxstyle'                         => array('exp'=>1,'val'=>1),
            'version_switching'                => array('exp'=>0,'val'=>0),
            'welcome'                          => array('exp'=>0,'val'=>array('1'=>'Welcome')),
            'welcome_logged'                   => array('exp'=>0,'val'=>array('1'=>'Welcome')),
            'welcome_link'                     => array('exp'=>0,'val'=>''),
            'product_view'                     => array('exp'=>0,'val'=>'grid_view'),
            'copyright_text'                   => array('exp'=>0,'val'=>array(1=>'&copy; 2014 Powered by Presta Shop&trade;. All Rights Reserved')),
            /*'search_label'                   => array('exp'=>0,'val'=>array(1=>'Search here')),
            'newsletter_label'                 => array('exp'=>0,'val'=>array(1=>'Your e-mail')),*/
            'footer_img'                       => array('exp'=>0,'val'=>'img/payment-options.png'), 
            'icon_iphone_57'                   => array('exp'=>0,'val'=>'img/touch-icon-iphone-57.png'), 
            'icon_iphone_72'                   => array('exp'=>0,'val'=>'img/touch-icon-iphone-72.png'), 
            'icon_iphone_114'                  => array('exp'=>0,'val'=>'img/touch-icon-iphone-114.png'), 
            'icon_iphone_144'                  => array('exp'=>0,'val'=>'img/touch-icon-iphone-144.png'), 
            'custom_css'                       => array('exp'=>0,'val'=>''), 
            'custom_js'                        => array('exp'=>0,'val'=>''), 
            'tracking_code'                    => array('exp'=>0,'val'=>''), 
            'scroll_to_top'                    => array('exp'=>0,'val'=>1),
            'google_rich_snippets'             => array('exp'=>0,'val'=>1),
            'display_tax_label'                => array('exp'=>0,'val'=>0),
            'position_right_panel'             => array('exp'=>0,'val'=>'1_0'),
            'flyout_buttons'                   => array('exp'=>0,'val'=>0),
            'flyout_buttons_on_mobile'         => array('exp'=>0,'val'=>1),
            'length_of_product_name'           => array('exp'=>0,'val'=>0),
            'logo_position'                    => array('exp'=>0,'val'=>0),
            'logo_height'                      => array('exp'=>0,'val'=>0),
            'logo_width'                       => array('exp'=>0,'val'=>4),
            'megamenu_position'                => array('exp'=>0,'val'=>0),
            // 'animation'                     => array('exp'=>0,'val'=>0),
            'transparent_header'               => array('exp'=>0,'val'=>0),
            'block_spacing'                    => array('exp'=>0,'val'=>0),
            'sticky_option'                    => array('exp'=>0,'val'=>3),
            'sidebar_transition'               => array('exp'=>0,'val'=>0),
            //font
            "font_text"                        => array('exp'=>1,'val'=>''),
            "font_body_size"                   => array('exp'=>0,'val'=>0),
            "font_price"                       => array('exp'=>1,'val'=>''),
            "font_price_size"                  => array('exp'=>1,'val'=>0),
            "font_old_price_size"              => array('exp'=>1,'val'=>0),
            "font_heading"                     => array('exp'=>1,'val'=>'Vollkorn'),
            // "font_heading_weight"           => array('exp'=>0,'val'=>0),
            "font_heading_trans"               => array('exp'=>1,'val'=>1),
            "font_heading_size"                => array('exp'=>1,'val'=>0),
            "footer_heading_size"              => array('exp'=>1,'val'=>0),
            'heading_bottom_border'            => array('exp'=>1,'val'=>2),
            'heading_bottom_border_color'      => array('exp'=>1,'val'=>''),
            'heading_bottom_border_color_h'    => array('exp'=>1,'val'=>''),
            'heading_column_bottom_border'     => array('exp'=>1,'val'=>2),
            'heading_column_bg'                => array('exp'=>1,'val'=>''),
            /*
            "font_title"                       => array('exp'=>0,'val'=>'Vollkorn'),
            "font_title_weight"                => array('exp'=>0,'val'=>0),
            "font_title_trans"                 => array('exp'=>0,'val'=>1),
            "font_title_size"                  => array('exp'=>0,'val'=>''),
            */
            "font_menu"                        => array('exp'=>1,'val'=>'Vollkorn'),
            // "font_menu_weight"              => array('exp'=>0,'val'=>0),
            "font_menu_trans"                  => array('exp'=>1,'val'=>1),
            "font_menu_size"                   => array('exp'=>1,'val'=>0),
            "st_menu_height"                   => array('exp'=>1,'val'=>0),
            "font_cart_btn"                    => array('exp'=>1,'val'=>'Vollkorn'),
            "font_latin_support"               => array('exp'=>0,'val'=>0),
            "font_cyrillic_support"            => array('exp'=>0,'val'=>0),
            "font_vietnamese"                  => array('exp'=>0,'val'=>0),
            "font_greek_support"               => array('exp'=>0,'val'=>0),
            //style
            'display_comment_rating'           => array('exp'=>0,'val'=>1),
            'display_category_title'           => array('exp'=>0,'val'=>1),
            'display_category_desc'            => array('exp'=>0,'val'=>0),
            'display_category_image'           => array('exp'=>0,'val'=>0),
            'display_subcate'                  => array('exp'=>0,'val'=>1),
            'display_pro_attr'                 => array('exp'=>0,'val'=>0),
            'product_secondary'                => array('exp'=>0,'val'=>1),
            'product_big_image'                => array('exp'=>0,'val'=>0),
            'show_brand_logo'                  => array('exp'=>0,'val'=>2),
            'product_tabs'                     => array('exp'=>0,'val'=> 0),
            'display_cate_desc_full'           => array('exp'=>0,'val'=>0),
            'show_short_desc_on_grid'          => array('exp'=>0,'val'=>0),
            'display_color_list'               => array('exp'=>0,'val'=>0),
            'pro_list_display_brand_name'      => array('exp'=>0,'val'=>0),
            'display_pro_tags'                 => array('exp'=>0,'val'=>0),
            //footer
            'bottom_spacing'                   => array('exp'=>1,'val'=>0),
            'footer_border_color'              => array('exp'=>1,'val'=>''),
            'footer_border'                    => array('exp'=>1,'val'=>0),
            'second_footer_color'              => array('exp'=>1,'val'=>''),
            'footer_primary_color'             => array('exp'=>1,'val'=>''),
            'footer_color'                     => array('exp'=>1,'val'=>''),
            'footer_tertiary_color'            => array('exp'=>1,'val'=>''),
            'footer_link_primary_color'        => array('exp'=>1,'val'=>''),
            'footer_link_color'                => array('exp'=>1,'val'=>''),
            'footer_link_tertiary_color'       => array('exp'=>1,'val'=>''),
            'second_footer_link_color'         => array('exp'=>1,'val'=>''),
            'footer_link_primary_hover_color'  => array('exp'=>1,'val'=>''),
            'footer_link_hover_color'          => array('exp'=>1,'val'=>''),
            'footer_link_tertiary_hover_color' => array('exp'=>1,'val'=>''),
            'second_footer_link_hover_color'   => array('exp'=>1,'val'=>''),
            'footer_tertiary_border'           => array('exp'=>1,'val'=>0),
            'footer_tertiary_border_color'     => array('exp'=>1,'val'=>''),
            
            'footer_top_border_color'          => array('exp'=>1,'val'=>''),
            'footer_top_border'                => array('exp'=>1,'val'=>0),
            'footer_top_bg'                    => array('exp'=>1,'val'=>''),
            'footer_top_con_bg'                => array('exp'=>1,'val'=>''),
            "f_top_bg_img"                     => array('exp'=>0,'val'=>''),
            "f_top_bg_repeat"                  => array('exp'=>1,'val'=>0), 
            "f_top_bg_position"                => array('exp'=>1,'val'=>0), 
            "f_top_bg_pattern"                 => array('exp'=>1,'val'=>0), 
            'footer_bg_color'                  => array('exp'=>1,'val'=>'#F2F2F2'),
            'footer_con_bg_color'              => array('exp'=>1,'val'=>''),
            "footer_bg_img"                    => array('exp'=>0,'val'=>''),
            "footer_bg_repeat"                 => array('exp'=>1,'val'=>0), 
            "footer_bg_position"               => array('exp'=>1,'val'=>0), 
            "footer_bg_pattern"                => array('exp'=>1,'val'=>0), 
            'footer_secondary_bg'              => array('exp'=>1,'val'=>''),
            'footer_secondary_con_bg'          => array('exp'=>1,'val'=>''),
            "f_secondary_bg_img"               => array('exp'=>0,'val'=>''),
            "f_secondary_bg_repeat"            => array('exp'=>1,'val'=>0), 
            "f_secondary_bg_position"          => array('exp'=>1,'val'=>0), 
            "f_secondary_bg_pattern"           => array('exp'=>1,'val'=>0), 
            'footer_info_border_color'         => array('exp'=>1,'val'=>'#DADADA'),
            'footer_info_border'               => array('exp'=>1,'val'=>11),
            'footer_info_bg'                   => array('exp'=>1,'val'=>''),
            'footer_info_con_bg'               => array('exp'=>1,'val'=>''),
            "f_info_bg_img"                    => array('exp'=>0,'val'=>''),
            "f_info_bg_repeat"                 => array('exp'=>1,'val'=>0), 
            "f_info_bg_position"               => array('exp'=>1,'val'=>0), 
            "f_info_bg_pattern"                => array('exp'=>1,'val'=>0), 
            //header
            'top_spacing'                      => array('exp'=>1,'val'=>0),
            'header_bottom_spacing'            => array('exp'=>1,'val'=>12),
            'header_text_color'                => array('exp'=>1,'val'=>''),
            'topbar_text_color'                => array('exp'=>1,'val'=>''),
            'header_text_trans'                => array('exp'=>1,'val'=>1),
            'header_link_hover_color'          => array('exp'=>1,'val'=>''),
            'topbar_link_hover_color'          => array('exp'=>1,'val'=>''),
            'header_link_hover_bg'             => array('exp'=>1,'val'=>''),
            'dropdown_hover_color'             => array('exp'=>1,'val'=>''),
            'dropdown_bg_color'                => array('exp'=>1,'val'=>''),
            "header_topbar_bg"                 => array('exp'=>1,'val'=>''), 
            "topbar_b_border_color"            => array('exp'=>1,'val'=>''), 
            //"header_topbar_bc"               => array('exp'=>1,'val'=>''),
            "header_topbar_sep_type"           => array('exp'=>1,'val'=>'horizontal-s'),
            "header_topbar_sep"                => array('exp'=>1,'val'=>''),
            'header_bg_color'                  => array('exp'=>1,'val'=>''),
            'header_con_bg_color'              => array('exp'=>1,'val'=>''),
            "header_bg_img"                    => array('exp'=>0,'val'=>''),
            "header_bg_repeat"                 => array('exp'=>1,'val'=>0), 
            "header_bg_position"               => array('exp'=>1,'val'=>0), 
            "header_bg_pattern"                => array('exp'=>1,'val'=>0),  
            "topbar_height"                    => array('exp'=>1,'val'=>0),  
            //body
            "body_bg_color"                    => array('exp'=>1,'val'=>''),
            "body_con_bg_color"                => array('exp'=>1,'val'=>''),
            "body_bg_img"                      => array('exp'=>0,'val'=>''),
            "body_bg_repeat"                   => array('exp'=>1,'val'=>0), 
            "body_bg_position"                 => array('exp'=>1,'val'=>0), 
            "body_bg_fixed"                    => array('exp'=>1,'val'=>0),
            "body_bg_cover"                    => array('exp'=>0,'val'=>0),
            "body_bg_pattern"                  => array('exp'=>1,'val'=>0), 
            'main_con_bg_color'                => array('exp'=>1,'val'=>''),
            'base_border_color'                => array('exp'=>1,'val'=>''),
            'form_bg_color'                    => array('exp'=>1,'val'=>''),
            'pro_grid_hover_bg'                => array('exp'=>1,'val'=>'#f2f2f2'),
            //crossselling
            'cs_title'                         => array('exp'=>0,'val'=>0),
            'cs_direction_nav'                 => array('exp'=>0,'val'=>1),
            'cs_control_nav'                   => array('exp'=>0,'val'=>0),
            'cs_slideshow'                     => array('exp'=>0,'val'=>0),
            'cs_lazy'                          => array('exp'=>0,'val'=>0),
            'cs_s_speed'                       => array('exp'=>0,'val'=>7000),
            'cs_a_speed'                       => array('exp'=>0,'val'=>400),
            'cs_pause_on_hover'                => array('exp'=>0,'val'=>1),
            'cs_loop'                          => array('exp'=>0,'val'=>0),
            'cs_move'                          => array('exp'=>0,'val'=>0),
            'cs_per_xl'                        => array('exp'=>0,'val'=>6),
            'cs_per_lg'                        => array('exp'=>0,'val'=>5),
            'cs_per_md'                        => array('exp'=>0,'val'=>4),
            'cs_per_sm'                        => array('exp'=>0,'val'=>3),
            'cs_per_xs'                        => array('exp'=>0,'val'=>1),
            'cs_per_xxs'                       => array('exp'=>0,'val'=>1),
            //productcategory
            'pc_title'                         => array('exp'=>0,'val'=>0),
            'pc_direction_nav'                 => array('exp'=>0,'val'=>1),
            'pc_control_nav'                   => array('exp'=>0,'val'=>0),
            'pc_slideshow'                     => array('exp'=>0,'val'=>0),
            'pc_lazy'                          => array('exp'=>0,'val'=>0),
            'pc_s_speed'                       => array('exp'=>0,'val'=>7000),
            'pc_a_speed'                       => array('exp'=>0,'val'=>400),
            'pc_pause_on_hover'                => array('exp'=>0,'val'=>1),
            'pc_loop'                          => array('exp'=>0,'val'=>0),
            'pc_move'                          => array('exp'=>0,'val'=>0),
            'pc_per_xl'                        => array('exp'=>0,'val'=>6),
            'pc_per_lg'                        => array('exp'=>0,'val'=>5),
            'pc_per_md'                        => array('exp'=>0,'val'=>4),
            'pc_per_sm'                        => array('exp'=>0,'val'=>3),
            'pc_per_xs'                        => array('exp'=>0,'val'=>2),
            'pc_per_xxs'                       => array('exp'=>0,'val'=>1),
            //accessories
            'ac_title'                         => array('exp'=>0,'val'=>0),
            'ac_direction_nav'                 => array('exp'=>0,'val'=>1),
            'ac_control_nav'                   => array('exp'=>0,'val'=>0),
            'ac_slideshow'                     => array('exp'=>0,'val'=>0),
            'ac_lazy'                          => array('exp'=>0,'val'=>0),
            'ac_s_speed'                       => array('exp'=>0,'val'=>7000),
            'ac_a_speed'                       => array('exp'=>0,'val'=>400),
            'ac_pause_on_hover'                => array('exp'=>0,'val'=>1),
            'ac_loop'                          => array('exp'=>0,'val'=>0),
            'ac_move'                          => array('exp'=>0,'val'=>0),
            'ac_per_xl'                        => array('exp'=>0,'val'=>6),
            'ac_per_lg'                        => array('exp'=>0,'val'=>5),
            'ac_per_md'                        => array('exp'=>0,'val'=>4),
            'ac_per_sm'                        => array('exp'=>0,'val'=>3),
            'ac_per_xs'                        => array('exp'=>0,'val'=>2),
            'ac_per_xxs'                       => array('exp'=>0,'val'=>1),
            //color
            'text_color'                       => array('exp'=>1,'val'=>''),
            'link_color'                       => array('exp'=>1,'val'=>''),
            's_title_block_color'              => array('exp'=>1,'val'=>''),
            'link_hover_color'                 => array('exp'=>1,'val'=>''),
            'breadcrumb_color'                 => array('exp'=>1,'val'=>''),
            'breadcrumb_hover_color'           => array('exp'=>1,'val'=>''),
            'breadcrumb_bg'                    => array('exp'=>1,'val'=>'#f2f2f2'),
            'price_color'                      => array('exp'=>1,'val'=>''),
            'old_price_color'                  => array('exp'=>1,'val'=>''),
            'icon_color'                       => array('exp'=>1,'val'=>''),
            'icon_hover_color'                 => array('exp'=>1,'val'=>''),
            'icon_bg_color'                    => array('exp'=>1,'val'=>''),
            'icon_hover_bg_color'              => array('exp'=>1,'val'=>''),
            'icon_disabled_color'              => array('exp'=>1,'val'=>''),
            'right_panel_border'               => array('exp'=>1,'val'=>''),
            'starts_color'                     => array('exp'=>1,'val'=>''),
            'circle_number_color'              => array('exp'=>1,'val'=>''),
            'circle_number_bg'                 => array('exp'=>1,'val'=>''),
            'block_headings_color'             => array('exp'=>1,'val'=>''),
            'column_block_headings_color'      => array('exp'=>1,'val'=>''),
            'headings_color'                   => array('exp'=>1,'val'=>''),
            'f_top_h_color'                    => array('exp'=>1,'val'=>''),
            'footer_h_color'                   => array('exp'=>1,'val'=>''),
            'f_secondary_h_color'              => array('exp'=>1,'val'=>''),
            //button
            'btn_color'                        => array('exp'=>1,'val'=>''),
            'btn_hover_color'                  => array('exp'=>1,'val'=>''),
            'btn_bg_color'                     => array('exp'=>1,'val'=>''),
            'btn_hover_bg_color'               => array('exp'=>1,'val'=>''),
            'btn_border_color'                 => array('exp'=>1,'val'=>''),
            /*'p_btn_color'                    => array('exp'=>0,'val'=>''),
            'p_btn_hover_color'                => array('exp'=>0,'val'=>''),
            'p_btn_bg_color'                   => array('exp'=>0,'val'=>''),
            'p_btn_hover_bg_color'             => array('exp'=>0,'val'=>''),*/
            'btn_fill_animation'               => array('exp'=>1,'val'=>0),
            //menu
            'menu_color'                       => array('exp'=>1,'val'=>''),
            'menu_bg_color'                    => array('exp'=>1,'val'=>''),
            'menu_hover_color'                 => array('exp'=>1,'val'=>''),
            'menu_hover_bg'                    => array('exp'=>1,'val'=>''),
            'second_menu_color'                => array('exp'=>1,'val'=>''),
            'second_menu_hover_color'          => array('exp'=>1,'val'=>''),
            'third_menu_color'                 => array('exp'=>1,'val'=>''),
            'third_menu_hover_color'           => array('exp'=>1,'val'=>''),
            'menu_mob_color'                   => array('exp'=>1,'val'=>''),
            'menu_mob_bg'                      => array('exp'=>1,'val'=>''),
            'menu_mob_hover_color'             => array('exp'=>1,'val'=>''),
            'menu_mob_hover_bg'                => array('exp'=>1,'val'=>''),
            'menu_mob_items1_color'            => array('exp'=>1,'val'=>''),
            'menu_mob_items2_color'            => array('exp'=>1,'val'=>''),
            'menu_mob_items3_color'            => array('exp'=>1,'val'=>''),
            'menu_mob_items1_bg'               => array('exp'=>1,'val'=>''),
            'menu_mob_items2_bg'               => array('exp'=>1,'val'=>''),
            'menu_mob_items3_bg'               => array('exp'=>1,'val'=>''),
            'menu_bottom_border'               => array('exp'=>1,'val'=>2),
            'menu_bottom_border_color'         => array('exp'=>1,'val'=>''),
            'menu_bottom_border_hover_color'   => array('exp'=>1,'val'=>''),
            'c_menu_color'                     => array('exp'=>1,'val'=>''),
            'c_menu_bg_color'                  => array('exp'=>1,'val'=>''),
            'c_menu_hover_color'               => array('exp'=>1,'val'=>''),
            'c_menu_hover_bg'                  => array('exp'=>1,'val'=>''),
            'c_menu_border_color'              => array('exp'=>1,'val'=>''),
            'c_menu_border_hover_color'        => array('exp'=>1,'val'=>''),
            //sticker
            'new_color'                        => array('exp'=>1,'val'=>'#999999'),
            'new_style'                        => array('exp'=>1,'val'=>0),
            'new_border_color'                 => array('exp'=>1,'val'=>'#999999'),
            'new_bg_color'                     => array('exp'=>1,'val'=>'#ffffff'),
            'new_bg_img'                       => array('exp'=>0,'val'=>''),
            'new_stickers_width'               => array('exp'=>1,'val'=>''),
            'new_stickers_top'                 => array('exp'=>1,'val'=>10),
            'new_stickers_right'               => array('exp'=>1,'val'=>10),
            'sale_color'                       => array('exp'=>1,'val'=>'#E54D28'),
            'sale_style'                       => array('exp'=>1,'val'=>0),
            'sale_border_color'                => array('exp'=>1,'val'=>'#E54D28'),
            'sale_bg_color'                    => array('exp'=>1,'val'=>'#ffffff'),
            'sale_bg_img'                      => array('exp'=>0,'val'=>''),
            'sale_stickers_width'              => array('exp'=>1,'val'=>''),
            'sale_stickers_top'                => array('exp'=>1,'val'=>10),
            'sale_stickers_left'               => array('exp'=>1,'val'=>10),
            'discount_percentage'              => array('exp'=>1,'val'=>1),
            'price_drop_border_color'          => array('exp'=>1,'val'=>''),
            'price_drop_bg_color'              => array('exp'=>1,'val'=>''),
            'price_drop_color'                 => array('exp'=>1,'val'=>''),
            'price_drop_bottom'                => array('exp'=>1,'val'=>30),
            'price_drop_right'                 => array('exp'=>1,'val'=>0),
            'price_drop_width'                 => array('exp'=>1,'val'=>0),
            
            'sold_out'                         => array('exp'=>1,'val'=>0),
            'sold_out_color'                   => array('exp'=>1,'val'=>''),
            'sold_out_bg_color'                => array('exp'=>1,'val'=>''),
            'sold_out_bg_img'                  => array('exp'=>0,'val'=>''),
            //
            'cart_icon'                        => array('exp'=>1,'val'=>0),
            'wishlist_icon'                    => array('exp'=>1,'val'=>0),
            'compare_icon'                     => array('exp'=>1,'val'=>0),
            'quick_view_icon'                  => array('exp'=>1,'val'=>0),
            'view_icon'                        => array('exp'=>1,'val'=>0),
            //
            'pro_tab_color'                    => array('exp'=>1,'val'=>''),
            'pro_tab_active_color'             => array('exp'=>1,'val'=>''),
            'pro_tab_bg'                       => array('exp'=>1,'val'=>''),
            'pro_tab_hover_bg'                 => array('exp'=>1,'val'=>''),
            'pro_tab_active_bg'                => array('exp'=>1,'val'=>''),
            'pro_tab_content_bg'               => array('exp'=>1,'val'=>''),
            //
            'category_pro_per_xl_3'            => array('exp'=>0,'val'=>3),
            'category_pro_per_lg_3'            => array('exp'=>0,'val'=>3),
            'category_pro_per_md_3'            => array('exp'=>0,'val'=>3),
            'category_pro_per_sm_3'            => array('exp'=>0,'val'=>2),
            'category_pro_per_xs_3'            => array('exp'=>0,'val'=>2),
            'category_pro_per_xxs_3'           => array('exp'=>0,'val'=>1),
            
            'category_pro_per_xl_2'            => array('exp'=>0,'val'=>4),
            'category_pro_per_lg_2'            => array('exp'=>0,'val'=>4),
            'category_pro_per_md_2'            => array('exp'=>0,'val'=>4),
            'category_pro_per_sm_2'            => array('exp'=>0,'val'=>3),
            'category_pro_per_xs_2'            => array('exp'=>0,'val'=>2),
            'category_pro_per_xxs_2'           => array('exp'=>0,'val'=>1),
            
            'category_pro_per_xl_1'            => array('exp'=>0,'val'=>5),
            'category_pro_per_lg_1'            => array('exp'=>0,'val'=>5),
            'category_pro_per_md_1'            => array('exp'=>0,'val'=>5),
            'category_pro_per_sm_1'            => array('exp'=>0,'val'=>4),
            'category_pro_per_xs_1'            => array('exp'=>0,'val'=>3),
            'category_pro_per_xxs_1'           => array('exp'=>0,'val'=>2),
            
            'hometab_pro_per_xl'               => array('exp'=>0,'val'=>4),
            'hometab_pro_per_lg'               => array('exp'=>0,'val'=>4),
            'hometab_pro_per_md'               => array('exp'=>0,'val'=>4),
            'hometab_pro_per_sm'               => array('exp'=>0,'val'=>3),
            'hometab_pro_per_xs'               => array('exp'=>0,'val'=>2),
            'hometab_pro_per_xxs'              => array('exp'=>0,'val'=>1),
            
            'pro_thumnbs_per_xl'               => array('exp'=>0,'val'=>5),
            'pro_thumnbs_per_lg'               => array('exp'=>0,'val'=>4),
            'pro_thumnbs_per_md'               => array('exp'=>0,'val'=>3),
            'pro_thumnbs_per_sm'               => array('exp'=>0,'val'=>2),
            'pro_thumnbs_per_xs'               => array('exp'=>0,'val'=>4),
            'pro_thumnbs_per_xxs'              => array('exp'=>0,'val'=>3),
            
            'packitems_pro_per_xl'             => array('exp'=>0,'val'=>4),
            'packitems_pro_per_lg'             => array('exp'=>0,'val'=>4),
            'packitems_pro_per_md'             => array('exp'=>0,'val'=>4),
            'packitems_pro_per_sm'             => array('exp'=>0,'val'=>3),
            'packitems_pro_per_xs'             => array('exp'=>0,'val'=>2),
            'packitems_pro_per_xxs'            => array('exp'=>0,'val'=>1),
            
            'categories_per_xl'                => array('exp'=>0,'val'=>5),
            'categories_per_lg'                => array('exp'=>0,'val'=>5),
            'categories_per_md'                => array('exp'=>0,'val'=>5),
            'categories_per_sm'                => array('exp'=>0,'val'=>4),
            'categories_per_xs'                => array('exp'=>0,'val'=>3),
            'categories_per_xxs'               => array('exp'=>0,'val'=>2),
            //1.6
            'category_show_all_btn'            => array('exp'=>0,'val'=>0),
            'enable_zoom'                      => array('exp'=>0,'val'=>1),
            'enable_thickbox'                  => array('exp'=>0,'val'=>1),
            'thumbs_direction_nav'             => array('exp'=>0,'val'=>3),
            
            'breadcrumb_width'                 => array('exp'=>1,'val'=>0),
            'breadcrumb_bg_style'              => array('exp'=>1,'val'=>0),
            'megamenu_width'                   => array('exp'=>1,'val'=>1),
            //
            'flyout_buttons_color'             => array('exp'=>1,'val'=>''),
            'flyout_buttons_hover_color'       => array('exp'=>1,'val'=>''),
            'flyout_buttons_bg'                => array('exp'=>1,'val'=>''),
            'flyout_buttons_hover_bg'          => array('exp'=>1,'val'=>''),
            //
            'retina'                           => array('exp'=>0,'val'=>0),
            'yotpo_sart'                       => array('exp'=>0,'val'=>0),   
            'retina_logo'                      => array('exp'=>0,'val'=>''),  
            'navigation_pipe'                  => array('exp'=>0,'val'=>'>'),
            'big_next'                         => array('exp'=>1,'val'=>''),
            'big_next_color'                   => array('exp'=>1,'val'=>''),
            'big_next_hover_color'             => array('exp'=>1,'val'=>''),
            'big_next_bg'                      => array('exp'=>1,'val'=>''),
            'big_next_hover_bg'                => array('exp'=>1,'val'=>''),
            'display_add_to_cart'              => array('exp'=>0,'val'=>1),
            //
            'cart_icon_border_color'           => array('exp'=>1,'val'=>''),
            'cart_icon_bg_color'               => array('exp'=>1,'val'=>''),
            'cart_number_color'                => array('exp'=>1,'val'=>''),
            'cart_number_bg_color'             => array('exp'=>1,'val'=>''),
            'cart_number_border_color'         => array('exp'=>1,'val'=>''),
            
            'ps_tr_prev_next_color'            => array('exp'=>1,'val'=>''),
            'ps_tr_prev_next_color_hover'      => array('exp'=>1,'val'=>''),
            'ps_tr_prev_next_color_disabled'   => array('exp'=>1,'val'=>''),
            'ps_tr_prev_next_bg'               => array('exp'=>1,'val'=>''),
            'ps_tr_prev_next_bg_hover'         => array('exp'=>1,'val'=>''),
            'ps_tr_prev_next_bg_disabled'      => array('exp'=>1,'val'=>''),
            'ps_lr_prev_next_color'            => array('exp'=>1,'val'=>''),
            'ps_lr_prev_next_color_hover'      => array('exp'=>1,'val'=>''),
            'ps_lr_prev_next_color_disabled'   => array('exp'=>1,'val'=>''),
            'ps_lr_prev_next_bg'               => array('exp'=>1,'val'=>''),
            'ps_lr_prev_next_bg_hover'         => array('exp'=>1,'val'=>''),
            'ps_lr_prev_next_bg_disabled'      => array('exp'=>1,'val'=>''),
            'ps_pag_nav_bg'                    => array('exp'=>1,'val'=>''),
            'ps_pag_nav_bg_hover'              => array('exp'=>1,'val'=>''),
            
            'pagination_color'                 => array('exp'=>1,'val'=>''),
            'pagination_color_hover'           => array('exp'=>1,'val'=>''),
            'pagination_color_disabled'        => array('exp'=>1,'val'=>''),
            'pagination_bg'                    => array('exp'=>1,'val'=>''),
            'pagination_bg_hover'              => array('exp'=>1,'val'=>''),
            'pagination_bg_disabled'           => array('exp'=>1,'val'=>''),
            
            'display_pro_condition'            => array('exp'=>0,'val'=>''),
            'display_pro_reference'            => array('exp'=>0,'val'=>''),

            'pro_shadow_effect'                 => array('exp'=>1,'val'=>0),
            'pro_h_shadow'                      => array('exp'=>1,'val'=>0),
            'pro_v_shadow'                      => array('exp'=>1,'val'=>0),
            'pro_shadow_blur'                   => array('exp'=>1,'val'=>4),
            'pro_shadow_color'                  => array('exp'=>1,'val'=>'#000000'),
            'pro_shadow_opacity'                  => array('exp'=>1,'val'=>0.1),

            'menu_title'                  => array('exp'=>0,'val'=>0),
            'flyout_wishlist'                  => array('exp'=>1,'val'=>0),
            'flyout_quickview'                  => array('exp'=>1,'val'=>0),
            'flyout_comparison'                  => array('exp'=>1,'val'=>0),

            'sticky_bg'                  => array('exp'=>1,'val'=>''),
            'sticky_opacity'                  => array('exp'=>1,'val'=>0.95),
            'transparent_header_bg'                  => array('exp'=>1,'val'=>''),
            'transparent_header_opacity'                  => array('exp'=>1,'val'=>0.4),
        );
        
        $this->_hooks = array(
            array('displayAnywhere','displayAnywhere','Anything is possible with this hook',1),
            array('displayNavLeft','Navigation','Left side of navigation',1),
            array('displayCategoryFooter','displayCategoryFooter','Display some specific informations on the category page',1),
            array('displayCategoryHeader','displayCategoryHeader','Display some specific informations on the category page',1),
            array('displayMainMenu','displayMainMenu','MainMenu',1),
            array('displayProductSecondaryColumn','displayProductSecondaryColumn','Product secondary column',1),
            array('displayFooterPrimary','displayFooterPrimary','Footer primary',1),
            array('displayFooterTertiary','displayFooterTertiary','Footer tertiary',1),
            array('displayFooterBottomRight','displayFooterBottomRight','Footer bottom right',1),
            array('displayFooterBottomLeft','displayFooterBottomLeft','Footer bottom left',1),
            array('displayHomeSecondaryLeft','displayHomeSecondaryLeft','Home secondary left',1),
            array('displayHomeSecondaryRight','displayHomeSecondaryRight','Home secondary right',1),
            array('displayHomeTop','displayHomeTop','Home page top',1),
            array('displayHomeBottom','displayHomeBottom','Hom epage bottom',1),
            array('displayHeaderLeft','displayHeaderLeft','Left-hand side of the header',1),
            array('displayManufacturerHeader','displayManufacturerHeader','Display some specific informations on the manufacturer page',1),
            array('displayHomeTertiaryRight','displayHomeTertiaryRight','Home tertiary right',1),
            array('displayHomeTertiaryLeft','displayHomeTertiaryLeft','Home tertiary left',1),
            array('displayHeaderTopLeft','displayHeaderTopLeft','Header top left',1),
            array('displayRightBar','displayRightBar','Right bar',1),
            array('displayLeftBar','displayLeftBar','Left bar',1),
            array('displaySideBarRight','displaySideBarRight','Side bar right',1),
            array('displayBottomColumn','displayBottomColumn','Bottom column',1),
            array('displayFullWidthTop','displayFullWidthTop','Full width top',1),
            array('displayFullWidthBottom','displayFullWidthBottom','Full width bottom',1),
            array('displayHomeFirstQuarter','displayHomeFirstQuarter','Home page first quarter',1),
            array('displayHomeSecondQuarter','displayHomeSecondQuarter','Home page second quarter',1),
            array('displayHomeThirdQuarter','displayHomeThirdQuarter','Home page third quarter',1),
            array('displayHomeFourthQuarter','displayHomeFourthQuarter','Home page fourth quarter',1),
            array('displayHeaderBottom','displayHeaderBottom','Header bottom',1),
            array('displayMobileBar','displayMobileBar','Mobile bar',1),
            array('displayMobileBarLeft','displayMobileBarLeft','Mobile bar left',1),
            array('displayMobileBarRight','displayMobileBarRight','Mobile bar right',1),
            array('actionObjectStBlogClassAddAfter','actionObjectStBlogClassAddAfter','Blog add',1),
            array('actionObjectStBlogClassUpdateAfter','actionObjectStBlogClassUpdateAfter','Blog update',1),
            array('actionObjectStBlogClassDeleteAfter','actionObjectStBlogClassDeleteAfter','Blog delete',1),
            array('actionAdminStBlogFormModifier','actionAdminStBlogFormModifier','Blog form',1),
        );
	}
	
	public function install()
	{
	    $this->_preCheckTheme();
	    if ( $this->_addHook() &&
            parent::install() && 
            $this->registerHook('header') && 
            $this->registerHook('displayAnywhere') &&
            $this->registerHook('displayRightBar') &&
            $this->registerHook('actionShopDataDuplication') &&
            $this->registerHook('displayRightColumnProduct') &&
            $this->_useDefault()
        ){
            if ($id_hook = Hook::getIdByName('displayHeader'))
                $this->updatePosition($id_hook, 0, 1);
            return true;
        }
        return false;
	}
    
    private function _preCheckTheme()
    {
        foreach(Theme::getThemes() AS $theme)
        {
            if (strtolower($theme->name) == 'transformer' || strtolower($theme->directory) == 'transformer')
            {
                echo $this->displayError('Sorry, installation failed. You have installed my another theme called "Transformer", you can not install them at the same time, because they have several modules with the same name. Please send an email to helloleemj@gmail.com with your FTP access, I will help you solve the problem.');
                exit;
            }
        }
    }
	
    private function _addHook()
	{
        $res = true;
        foreach($this->_hooks as $v)
        {
            if(!$res)
                break;
            if (!Validate::isHookName($v[0]))
                continue;
                
            $id_hook = Hook::getIdByName($v[0]);
    		if (!$id_hook)
    		{
    			$new_hook = new Hook();
    			$new_hook->name = pSQL($v[0]);
    			$new_hook->title = pSQL($v[1]);
    			$new_hook->description = pSQL($v[2]);
    			$new_hook->position = pSQL($v[3]);
    			$new_hook->live_edit  = 0;
    			$new_hook->add();
    			$id_hook = $new_hook->id;
    			if (!$id_hook)
    				$res = false;
    		}
            else
            {
                Db::getInstance()->execute('UPDATE `'._DB_PREFIX_.'hook` set `title`="'.$v[1].'", `description`="'.$v[2].'", `position`="'.$v[3].'", `live_edit`=0 where `id_hook`='.$id_hook);
            }
        }
		return $res;
	}

	private function _removeHook()
	{
	    $sql = 'DELETE FROM `'._DB_PREFIX_.'hook` WHERE ';
        foreach($this->_hooks as $v)
            $sql .= ' `name` = "'.$v[0].'" OR';
		return Db::getInstance()->execute(rtrim($sql,'OR').';');
	}
    
	public function uninstall()
	{
	    if(!parent::uninstall() ||
            !$this->_deleteConfiguration()
        )
			return false;
		return true;
	}
    
    private function _deleteConfiguration()
    {
        $res = true;
        foreach($this->defaults as $k=>$v)
            $res &= Configuration::deleteByName('STSN_'.strtoupper($k));
        return $res;
    }
	
    private function _useDefault($html = false, $id_shop_group = null, $id_shop = null)
    {
        $res = true;
        foreach($this->defaults as $k=>$v)
		    $res &= Configuration::updateValue('STSN_'.strtoupper($k), $v['val'], $html, $id_shop_group, $id_shop);
        return $res;
    }
    private function _usePredefinedColor($color = '', $file = '')
    {
        $res = true;
        
        if(!$color && !$file)
            return false;
        
        if ($file)
            $config_file = $this->_config_folder.$file;
        else
            $config_file = $this->_config_folder.'predefined_'.$color.'.xml';
        if (!file_exists($config_file))
            return $this->displayError('"'.$config_file.'"'.$this->l(' file isn\'t exists.'));
        
        $xml = @simplexml_load_file($config_file);
        
        if ($xml === false)
            return $this->displayError($this->l('Fetch configuration file content failed'));
        
        $languages = Language::getLanguages(false);
                
        foreach($xml->children() as $k => $v)
        {
            if (!key_exists($k, $this->defaults))
                continue;
            if (in_array($k, $this->lang_array))
            {
                $text_lang = array();
                $default = '';
                foreach($xml->$k->children() AS $_k => $_v)
                {
                    $id_lang = str_replace('lang_', '', $_k);
                    $text_lang[$id_lang] = (string)$_v;
                    if (!$default)
                        $default = $text_lang[$id_lang];
                }
                foreach($languages AS $language)
                    if (!key_exists($language['id_lang'], $text_lang))
                        $text_lang[$language['id_lang']] = $default;
                
                Configuration::updateValue('STSN_'.strtoupper($k), $text_lang);
            }
            else
                $res &= Configuration::updateValue('STSN_'.strtoupper($k), (string)$v);
        }
        if($res)
        {
            $this->writeCss();
            Tools::clearSmartyCache();
            Media::clearCache();
        }
        return $res;
    }
    public function uploadCheckAndGetName($name)
    {
		$type = strtolower(substr(strrchr($name, '.'), 1));
        if(!in_array($type, $this->imgtype))
            return false;
        $filename = Tools::encrypt($name.sha1(microtime()));
		while (file_exists(_PS_UPLOAD_DIR_.$filename.'.'.$type)) {
            $filename .= rand(10, 99);
        } 
        return $filename.'.'.$type;
    }
    private function _checkImageDir($dir)
    {
        $result = '';
        if (!file_exists($dir))
        {
            $success = @mkdir($dir, self::$access_rights, true)
						|| @chmod($dir, self::$access_rights);
            if(!$success)
                $result = $this->displayError('"'.$dir.'" '.$this->l('An error occurred during new folder creation'));
        }

        if (!is_writable($dir))
            $result = $this->displayError('"'.$dir.'" '.$this->l('directory isn\'t writable.'));
        
        return $result;
    }
    	
	public function getContent()
	{
	    $this->initFieldsForm();
		$this->context->controller->addCSS(($this->_path).'views/css/admin.css');
        $this->context->controller->addJS(($this->_path).'views/js/admin.js');
        $this->_html .= '<script type="text/javascript">var stthemeeditor_base_uri = "'.__PS_BASE_URI__.'";var stthemeeditor_refer = "'.(int)Tools::getValue('ref').'";var systemFonts = \''.implode(',',$this->systemFonts).'\'; var googleFontsString=\''.Tools::jsonEncode($this->googleFonts).'\';</script>';
        if (Tools::isSubmit('resetstthemeeditor'))
        {
            $this->_useDefault();
            $this->writeCss();
            Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules'));
        }
        if (Tools::isSubmit('exportstthemeeditor'))
        {
            $this->_html .= $this->export();
        }
        if (Tools::isSubmit('downloadstthemeeditor'))
        {
            $file = Tools::getValue('file');
            if (file_exists($this->_config_folder.$file))
            {
                if (ob_get_length() > 0)
					ob_end_clean();

				ob_start();
				header('Pragma: public');
				header('Expires: 0');
				header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
				header('Cache-Control: public');
				header('Content-Description: File Transfer');
				header('Content-type:text/xml');
				header('Content-Disposition: attachment; filename="'.$file.'"');
				ob_end_flush();
				readfile($this->_config_folder.$file);
				exit;
            }
        }
        if (Tools::isSubmit('uploadstthemeeditor'))
        {
            if (isset($_FILES['xml_config_file_field']) && $_FILES['xml_config_file_field']['tmp_name'] && !$_FILES['xml_config_file_field']['error'])
            {
                $error = '';
                $folder = $this->_config_folder;
                if (!is_dir($folder))
                    $error = $this->displayError('"'.$folder.'" '.$this->l('directory isn\'t exists.'));
                elseif (!is_writable($folder))
                    $error = $this->displayError('"'.$folder.'" '.$this->l('directory isn\'t writable.'));
                
                $file = date('YmdHis').'_'.(int)Shop::getContextShopID().'.xml';
                if (!move_uploaded_file($_FILES['xml_config_file_field']['tmp_name'], $folder.$file))
                    $error = $this->displayError($this->l('Upload config file failed.'));
                else
                {
                    $res = $this->_usePredefinedColor('', $file);
                    if ($res !== 1)
                        $this->_html .= $res;
                    else
                        $this->_html .= $this->displayConfirmation($this->l('Settings updated.'));
                }   
            }
        }
        if (Tools::isSubmit('predefinedcolorstthemeeditor') && Tools::getValue('predefinedcolorstthemeeditor'))
        {
            $res = $this->_usePredefinedColor(Tools::getValue('predefinedcolorstthemeeditor'));
            if ($res !== 1)
                $this->_html .= $this->displayError($this->l('Error occurred while import configuration:')).$res;
            else
            {
                $this->writeCss();
                Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&conf=4&token='.Tools::getAdminTokenLite('AdminModules'));    
            }
        }
        if(Tools::getValue('act')=='delete_image' && $identi = Tools::getValue('identi'))
        {
            $identi = strtoupper($identi);
            $themeeditor = new StThemeEditor();
            /*20140920
            $image  = Configuration::get('STSN_'.$identi);
        	if (Configuration::get('STSN_'.$identi))
                if (file_exists(_PS_UPLOAD_DIR_.$image))
                    @unlink(_PS_UPLOAD_DIR_.$image);
                elseif(file_exists(_PS_MODULE_DIR_.'stthemeeditor/'.$image) && strpos($image, $identi) === false)
                    @unlink(_PS_MODULE_DIR_.'stthemeeditor/'.$image);
            */
        	Configuration::updateValue('STSN_'.$identi, '');
            $themeeditor->writeCss();
            $result['r'] = true;
            die(json_encode($result));
        }
        if(isset($_POST['savestthemeeditor']))
		{
            $res = true;
            foreach($this->fields_form as $form)
                foreach($form['form']['input'] as $field)
                    if(isset($field['validation']))
                    {
                        $ishtml = ($field['validation']=='isAnything') ? true : false;
                        $errors = array();       
                        $value = Tools::getValue($field['name']);
                        if (isset($field['required']) && $field['required'] && $value==false && (string)$value != '0')
        						$errors[] = sprintf(Tools::displayError('Field "%s" is required.'), $field['label']);
                        elseif($value)
                        {
        					if (!Validate::$field['validation']($value))
        						$errors[] = sprintf(Tools::displayError('Field "%s" is invalid.'), $field['label']);
                        }
        				// Set default value
        				if ($value === false && isset($field['default_value']))
        					$value = $field['default_value'];
                            
                        if(count($errors))
                        {
                            $this->validation_errors = array_merge($this->validation_errors, $errors);
                        }
                        elseif($value==false)
                        {
                            switch($field['validation'])
                            {
                                case 'isUnsignedId':
                                case 'isUnsignedInt':
                                case 'isInt':
                                case 'isBool':
                                    $value = 0;
                                break;
                                default:
                                    $value = '';
                                break;
                            }
                            Configuration::updateValue('STSN_'.strtoupper($field['name']), $value);
                        }
                        else
                            Configuration::updateValue('STSN_'.strtoupper($field['name']), $value, $ishtml);
                    }
            //
            if(Configuration::get('STSN_PRODUCT_BIG_IMAGE'))
                Configuration::updateValue('STSN_PRODUCT_SECONDARY', 0);
            if(Configuration::get('STSN_NAVIGATION_PIPE'))
                Configuration::updateValue('PS_NAVIGATION_PIPE', Configuration::get('STSN_NAVIGATION_PIPE'));

            $this->updateWelcome();
            $this->updateCopyright();
            /*$this->updateSearchLabel();
            $this->updateNewsletterLabel();*/
            $this->updateCatePerRow();
			$this->updateConfigurableModules();
            Configuration::updateValue('STSN_CART_ICON', Tools::getValue('cart_icon'));
            Configuration::updateValue('STSN_WISHLIST_ICON', Tools::getValue('wishlist_icon'));
            Configuration::updateValue('STSN_COMPARE_ICON', Tools::getValue('compare_icon'));
            Configuration::updateValue('STSN_QUICK_VIEW_ICON', Tools::getValue('quick_view_icon'));
            Configuration::updateValue('STSN_VIEW_ICON', Tools::getValue('view_icon'));
                
            $bg_array = array('body','header','f_top','footer','f_secondary','f_info','new','sale', 'sold_out');
            foreach($bg_array as $v)
            {
        			if (isset($_FILES[$v.'_bg_image_field']) && isset($_FILES[$v.'_bg_image_field']['tmp_name']) && !empty($_FILES[$v.'_bg_image_field']['tmp_name'])) 
                    {
        				if ($error = ImageManager::validateUpload($_FILES[$v.'_bg_image_field'], Tools::convertBytes(ini_get('upload_max_filesize'))))
    					   $this->validation_errors[] = Tools::displayError($error);
                        else 
                        {
                            $footer_image = $this->uploadCheckAndGetName($_FILES[$v.'_bg_image_field']['name']);
                            if(!$footer_image)
                                $this->validation_errors[] = Tools::displayError('Image format not recognized');
        					if (!move_uploaded_file($_FILES[$v.'_bg_image_field']['tmp_name'], $this->local_path.'img/'.$footer_image))
        						$this->validation_errors[] = Tools::displayError('Error move uploaded file');
                            else
                            {
        					   Configuration::updateValue('STSN_'.strtoupper($v).'_BG_IMG', 'img/'.$footer_image);
                            }
        				}
        			}
            }
            
            if (isset($_FILES['footer_image_field']) && isset($_FILES['footer_image_field']['tmp_name']) && !empty($_FILES['footer_image_field']['tmp_name'])) 
            {
                if ($error = ImageManager::validateUpload($_FILES['footer_image_field'], Tools::convertBytes(ini_get('upload_max_filesize'))))
                    $this->validation_errors[] = Tools::displayError($error);
                else 
                {
                    $footer_image = $this->uploadCheckAndGetName($_FILES['footer_image_field']['name']);
                    if(!$footer_image)
                        $this->validation_errors[] = Tools::displayError('Image format not recognized');
                    else if (!move_uploaded_file($_FILES['footer_image_field']['tmp_name'], _PS_UPLOAD_DIR_.$footer_image))
                        $this->validation_errors[] = Tools::displayError('Error move uploaded file');
                    else
                    {
                       Configuration::updateValue('STSN_FOOTER_IMG', $footer_image);
                    }
                }
            }
            if (isset($_FILES['retina_logo_image_field']) && isset($_FILES['retina_logo_image_field']['tmp_name']) && !empty($_FILES['retina_logo_image_field']['tmp_name'])) 
            {
                if ($error = ImageManager::validateUpload($_FILES['retina_logo_image_field'], Tools::convertBytes(ini_get('upload_max_filesize'))))
                    $this->validation_errors[] = Tools::displayError($error);
                else 
                {
                    $retina_logo = $this->uploadCheckAndGetName($_FILES['retina_logo_image_field']['name']);
                    if(!$retina_logo)
                        $this->validation_errors[] = Tools::displayError('Image format not recognized');
                    else if (!move_uploaded_file($_FILES['retina_logo_image_field']['tmp_name'], $this->local_path.'img/'.$retina_logo))
                        $this->validation_errors[] = Tools::displayError('Error move uploaded file');
                    else
                    {
                       Configuration::updateValue('STSN_RETINA_LOGO', 'img/'.$retina_logo);
                    }
                }
            }
            $iphone_icon_array = array('57','72','114','144');
            foreach($iphone_icon_array as $v)
            {
        			if (isset($_FILES['icon_iphone_'.$v.'_field']) && isset($_FILES['icon_iphone_'.$v.'_field']['tmp_name']) && !empty($_FILES['icon_iphone_'.$v.'_field']['tmp_name'])) 
                    {
                        $this->_checkImageDir(_PS_MODULE_DIR_.$this->name.'/img/'.$this->context->shop->id.'/');
        				if ($error = ImageManager::validateUpload($_FILES['icon_iphone_'.$v.'_field'], Tools::convertBytes(ini_get('upload_max_filesize'))))
    					   $this->validation_errors[] = Tools::displayError($error);
                        else 
                        {
        					if (!move_uploaded_file($_FILES['icon_iphone_'.$v.'_field']['tmp_name'], $this->local_path.'img/'.$this->context->shop->id.'/touch-icon-iphone-'.$v.'.png'))
        						$this->validation_errors[] = Tools::displayError('Error move uploaded file');
                            else
                            {
        					   Configuration::updateValue('STSN_ICON_IPHONE_'.strtoupper($v), 'img/'.$this->context->shop->id.'/touch-icon-iphone-'.$v.'.png');
                            }
        				}
        			}
            }   
            
            if(count($this->validation_errors))
                $this->_html .= $this->displayError(implode('<br/>',$this->validation_errors));
            else
            {
                $this->writeCss();
                $this->_html .= $this->displayConfirmation($this->l('Settings updated'));
            } 
        }
        
        if (Tools::isSubmit('deleteimagestthemeeditor'))
        {
            if($identi = Tools::getValue('identi'))
            {
                $identi = strtoupper($identi);
                $image  = Configuration::get('STSN_'.$identi);
            	if (Configuration::get('STSN_'.$identi))
                    if (file_exists(_PS_UPLOAD_DIR_.$image))
		                @unlink(_PS_UPLOAD_DIR_.$image);
                    elseif(file_exists($this->_path.$image))
                        @unlink($this->_path.$image);
            	Configuration::updateValue('STSN_'.$identi, '');
                Tools::redirectAdmin(AdminController::$currentIndex.'&configure='.$this->name.'&conf=7&ref='.(int)Tools::getValue('ref').'&token='.Tools::getAdminTokenLite('AdminModules'));  
             }else
                $this->_html .= $this->displayError($this->l('An error occurred while delete banner.'));
        }
        $this->initDropListGroup();
		$helper = $this->initForm();
        return $this->_html.$this->initToolbarBtn().'<div class="tabbable row stthemeeditor">'.$this->initTab().'<div id="stthemeeditor" class="col-xs-12 col-lg-10 tab-content">'.$helper->generateForm($this->fields_form).'</div></div>';
	}
    
    public function initDropListGroup()
    {
        $this->fields_form[0]['form']['input']['hometab_pro_per']['name'] = $this->BuildDropListGroup($this->findCateProPer(4));
        $this->fields_form[1]['form']['input']['categories_per']['name'] = $this->BuildDropListGroup($this->findCateProPer(6));
        $this->fields_form[1]['form']['input']['category_pro_per_1']['name'] = $this->BuildDropListGroup($this->findCateProPer(1));
        $this->fields_form[1]['form']['input']['category_pro_per_2']['name'] = $this->BuildDropListGroup($this->findCateProPer(2));
        $this->fields_form[1]['form']['input']['category_pro_per_3']['name'] = $this->BuildDropListGroup($this->findCateProPer(3));
        $this->fields_form[11]['form']['input']['cs_pro_per']['name'] = $this->BuildDropListGroup($this->findCateProPer(7));
        $this->fields_form[12]['form']['input']['pc_pro_per']['name'] = $this->BuildDropListGroup($this->findCateProPer(8));
        $this->fields_form[13]['form']['input']['ac_pro_per']['name'] = $this->BuildDropListGroup($this->findCateProPer(9));
        $this->fields_form[16]['form']['input']['packitems_pro_per']['name'] = $this->BuildDropListGroup($this->findCateProPer(5));
        $this->fields_form[16]['form']['input']['pro_thumnbs_per']['name'] = $this->BuildDropListGroup($this->findCateProPer(10));
    }
    
    public function updateWelcome() {
		$languages = Language::getLanguages(false);
		$welcome = $welcome_logged  = $welcome_link = array();
        $defaultLanguage = new Language((int)(Configuration::get('PS_LANG_DEFAULT')));
		foreach ($languages as $language)
		{
            $welcome[$language['id_lang']] = Tools::getValue('welcome_'.$language['id_lang']) ? Tools::getValue('welcome_'.$language['id_lang']) : Tools::getValue('welcome_'.$defaultLanguage->id);
			$welcome_logged[$language['id_lang']] = Tools::getValue('welcome_logged_'.$language['id_lang']) ? Tools::getValue('welcome_logged_'.$language['id_lang']) : Tools::getValue('welcome_logged_'.$defaultLanguage->id);
			$welcome_link[$language['id_lang']] = Tools::getValue('welcome_link_'.$language['id_lang']) ? Tools::getValue('welcome_link_'.$language['id_lang']) : Tools::getValue('welcome_link_'.$defaultLanguage->id);
		}
        Configuration::updateValue('STSN_WELCOME_LINK', $welcome_link);
        Configuration::updateValue('STSN_WELCOME', $welcome);
        Configuration::updateValue('STSN_WELCOME_LOGGED', $welcome_logged);
	}
    public function updateCopyright() {
		$languages = Language::getLanguages();
		$result = array();
        $defaultLanguage = new Language((int)(Configuration::get('PS_LANG_DEFAULT')));
		foreach ($languages as $language)
			$result[$language['id_lang']] = Tools::getValue('copyright_text_' . $language['id_lang']) ? Tools::getValue('copyright_text_'.$language['id_lang']) : Tools::getValue('copyright_text_'.$defaultLanguage->id);

        /*if(!$result[$defaultLanguage->id])
            $this->validation_errors[] = Tools::displayError('The field "Copyright text" is required at least in '.$defaultLanguage->name);
		else*/
            Configuration::updateValue('STSN_COPYRIGHT_TEXT', $result, true);
	}
    /*public function updateSearchLabel() {
		$languages = Language::getLanguages();
		$result = array();
        $defaultLanguage = new Language((int)(Configuration::get('PS_LANG_DEFAULT')));
		foreach ($languages as $language)
			$result[$language['id_lang']] = Tools::getValue('search_label_' . $language['id_lang']) ? Tools::getValue('search_label_' . $language['id_lang']) : Tools::getValue('search_label_'.$defaultLanguage->id);

        if(!$result[$defaultLanguage->id])
            $this->validation_errors[] = Tools::displayError('The field "Search label" is required at least in '.$defaultLanguage->name);
		else
            Configuration::updateValue('STSN_SEARCH_LABEL', $result);
	}        
    public function updateNewsletterLabel() {
        $languages = Language::getLanguages();
        $result = array();
        $defaultLanguage = new Language((int)(Configuration::get('PS_LANG_DEFAULT')));
        foreach ($languages as $language)
            $result[$language['id_lang']] = Tools::getValue('newsletter_label_' . $language['id_lang']) ? Tools::getValue('newsletter_label_' . $language['id_lang']) : Tools::getValue('newsletter_label_'.$defaultLanguage->id);

        if(!$result[$defaultLanguage->id])
            $this->validation_errors[] = Tools::displayError('The field "Newsletter label" is required at least in '.$defaultLanguage->name);
        else
            Configuration::updateValue('STSN_NEWSLETTER_LABEL', $result);
    }*/     
    public function updateCatePerRow() {
		$arr = $this->findCateProPer();
        foreach ($arr as $key => $value)
            foreach ($value as $v)
                if ($gv = Tools::getValue($v['id']))
                    Configuration::updateValue('STSN_'.strtoupper($v['id']), (int)$gv);
	}
    public function initFieldsForm()
    {
		$this->fields_form[0]['form'] = array(
			'input' => array(
                array(
                    'type' => 'html',
                    'id' => '',
                    'label' => $this->l('Predefined colors:'),
                    'name' => '<button type="button" id="import_export" class="btn btn-default"><i class="icon process-icon-new-module"></i> '.$this->l('Import/export').'</button>',
                ), 
                array(
                    'type' => 'switch',
                    'label' => $this->l('Enable responsive layout:'),
                    'name' => 'responsive',
                    'is_bool' => true,
                    'values' => array(
                        array(
                            'id' => 'responsive_on',
                            'value' => 1,
                            'label' => $this->l('Yes')),
                        array(
                            'id' => 'responsive_off',
                            'value' => 0,
                            'label' => $this->l('No')),
                    ),
                    'desc' => $this->l('Enable responsive design for mobile devices.'),
                    'validation' => 'isBool',
                ), 
                array(
					'type' => 'switch',
					'label' => $this->l('Display switch back to desktop version link on mobile devices:'),
					'name' => 'version_switching',
					'is_bool' => true,
					'values' => array(
						array(
							'id' => 'version_switching_on',
							'value' => 1,
							'label' => $this->l('Yes')),
						array(
							'id' => 'version_switching_off',
							'value' => 0,
							'label' => $this->l('No')),
					),
                    'desc' => $this->l('This option allows visitors to manually switch between mobile and desktop versions on mobile devices.'),
                    'validation' => 'isBool',
				), 
                array(
					'type' => 'radio',
					'label' => $this->l('Maximum Page Width:'),
					'name' => 'responsive_max',
					'values' => array(
						array(
							'id' => 'responsive_max_0',
							'value' => 0,
							'label' => $this->l('980')),
                        array(
                            'id' => 'responsive_max_1',
                            'value' => 1,
                            'label' => $this->l('1200')),
                        array(
                            'id' => 'responsive_max_2',
                            'value' => 2,
                            'label' => $this->l('1440')),
					),
                    'desc' => $this->l('Maximum width of the page'),
                    'validation' => 'isUnsignedInt',
				), 
                array(
					'type' => 'radio',
					'label' => $this->l('Box style:'),
					'name' => 'boxstyle',
					'values' => array(
						array(
							'id' => 'boxstyle_on',
							'value' => 1,
							'label' => $this->l('Stretched style')),
						array(
							'id' => 'boxstyle_off',
							'value' => 2,
							'label' => $this->l('Boxed style')),
					),
                    'validation' => 'isUnsignedInt',
				), 
                array(
                    'type' => 'radio',
                    'label' => $this->l('Sidebar transition:'),
                    'name' => 'sidebar_transition',
                    'values' => array(
                        array(
                            'id' => 'sidebar_transition_reveal',
                            'value' => 0,
                            'label' => $this->l('Reveal, default')),
                        array(
                            'id' => 'sidebar_transition_slide',
                            'value' => 1,
                            'label' => $this->l('Slide in on top')),
                    ),
                    'validation' => 'isUnsignedInt',
                ), 
                array(
                    'type' => 'text',
                    'label' => $this->l('Page top spacing:'),
                    'name' => 'top_spacing',
                    'validation' => 'isUnsignedInt',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Page bottom spacing:'),
                    'name' => 'bottom_spacing',
                    'validation' => 'isUnsignedInt',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Block spacing:'),
                    'name' => 'block_spacing',
                    'validation' => 'isUnsignedInt',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                ),
                'hometab_pro_per' => array(
                    'type' => 'html',
                    'id' => 'hometab_pro_per',
                    'label'=> $this->l('The number of columns for Homepage tab'),
                    'name' => '',
                ),

                /*array(
                    'type' => 'switch',
                    'label' => $this->l('Enable animation:'),
                    'name' => 'animation',
                    'is_bool' => true,
                    'values' => array(
                        array(
                            'id' => 'animation_on',
                            'value' => 1,
                            'label' => $this->l('Yes')),
                        array(
                            'id' => 'animation_off',
                            'value' => 0,
                            'label' => $this->l('No')),
                    ),
                    'validation' => 'isBool',
                ), */
                array(
					'type' => 'switch',
					'label' => $this->l('Show scroll to top button:'),
					'name' => 'scroll_to_top',
					'is_bool' => true,
					'values' => array(
						array(
							'id' => 'scroll_to_top_on',
							'value' => 1,
							'label' => $this->l('Yes')),
						array(
							'id' => 'scroll_to_top_off',
							'value' => 0,
							'label' => $this->l('NO')),
					),
                    'validation' => 'isBool',
				), 
                array(
                    'type' => 'fontello',
                    'label' => $this->l('Cart icon:'),
                    'name' => 'cart_icon',
                    'values' => $this->get_fontello(),
                ), 
                array(
                    'type' => 'fontello',
                    'label' => $this->l('Wishlist icon:'),
                    'name' => 'wishlist_icon',
                    'values' => $this->get_fontello(),
                ), 
                array(
                    'type' => 'fontello',
                    'label' => $this->l('Compare icon:'),
                    'name' => 'compare_icon',
                    'values' => $this->get_fontello(),
                ), 
                array(
                    'type' => 'fontello',
                    'label' => $this->l('Quick view icon:'),
                    'name' => 'quick_view_icon',
                    'values' => $this->get_fontello(),
                ), 
                array(
                    'type' => 'fontello',
                    'label' => $this->l('View icon:'),
                    'name' => 'view_icon',
                    'values' => $this->get_fontello(),
                ), 
                array(
    				'type' => 'select',
        			'label' => $this->l('Set the vertical right panel position on the screen:'),
        			'name' => 'position_right_panel',
                    'options' => array(
        				'query' => self::$position_right_panel,
        				'id' => 'id',
        				'name' => 'name',
        			),
                    'validation' => 'isGenericName',
    			),
                array(
					'type' => 'text',
					'label' => $this->l('Guest welcome msg:'),
					'name' => 'welcome',
                    'size' => 64,
                    'lang' => true,
				),
                array(
					'type' => 'text',
					'label' => $this->l('Logged welcome msg:'),
					'name' => 'welcome_logged',
                    'size' => 64,
                    'lang' => true,
				),
                array(
					'type' => 'text',
					'label' => $this->l('Add a link to welcome msg:'),
					'name' => 'welcome_link',
                    'size' => 64,
                    'lang' => true,
				),
                array(
					'type' => 'textarea',
					'label' => $this->l('Copyright text:'),
					'name' => 'copyright_text',
                    'lang' => true,
					'cols' => 60,
					'rows' => 2,
				),
                /*
                array(
					'type' => 'text',
					'label' => $this->l('Search label:'),
					'name' => 'search_label',
                    'lang' => true,
                    'required' => true,
				),
                array(
					'type' => 'text',
					'label' => $this->l('Newsletter label:'),
					'name' => 'newsletter_label',
                    'lang' => true,
                    'required' => true,
				),
                array(
					'type' => 'color',
					'label' => $this->l('Iframe background:'),
					'name' => 'lb_bg_color',
			        'size' => 33,
                    'desc' => $this->l('Set iframe background if transparency is not allowed.'),
				),
                */
                'payment_icon' => array(
                    'type' => 'file',
                    'label' => $this->l('Payment icon:'),
                    'name' => 'footer_image_field',
                    'desc' => '',
                ),
				array(
                    'type' => 'text',
                    'label' => $this->l('Navigation pipe:'),
                    'name' => 'navigation_pipe',
                    'class' => 'fixed-width-lg',
                    'desc' => $this->l('Used for the navigation path: Store Name > Category Name > Product Name.'),
                    'validation' => 'isAnything',
				),
			),
			'submit' => array(
				'title' => $this->l('   Save all   '),
			),
		);

        $this->fields_form[23]['form'] = array(
            'legend' => array(
                'title' => $this->l('Product information'),
            ),
            'input' => array( 
                array(
                    'type' => 'switch',
                    'label' => $this->l('Retina product image support:'),
                    'name' => 'retina',
                    'is_bool' => true,
                    'values' => array(
                        array(
                            'id' => 'retina_on',
                            'value' => 1,
                            'label' => $this->l('Yes')),
                        array(
                            'id' => 'retina_off',
                            'value' => 0,
                            'label' => $this->l('No')),
                    ),
                    'validation' => 'isBool',
                ), 
                array(
                    'type' => 'radio',
                    'label' => $this->l('Show comment rating:'),
                    'name' => 'display_comment_rating',
                    'values' => array(
                        array(
                            'id' => 'display_comment_rating_off',
                            'value' => 0,
                            'label' => $this->l('NO')),
                        array(
                            'id' => 'display_comment_rating_on',
                            'value' => 1,
                            'label' => $this->l('Yes')),
                        array(
                            'id' => 'display_comment_rating_on',
                            'value' => 3,
                            'label' => $this->l('Yes and show the number of ratings')),
                        array(
                            'id' => 'display_comment_rating_always',
                            'value' => 2,
                            'label' => $this->l('Show star even if no rating')),
                        array(
                            'id' => 'display_comment_rating_always',
                            'value' => 4,
                            'label' => $this->l('Show star even if no rating and show the number of ratings')),
                    ),
                    'validation' => 'isUnsignedInt',
                ), 
                array(
                    'type' => 'switch',
                    'label' => $this->l('Yotpo Star Rating:'),
                    'name' => 'yotpo_sart',
                    'is_bool' => true,
                    'values' => array(
                        array(
                            'id' => 'yotpo_sart_on',
                            'value' => 1,
                            'label' => $this->l('Yes')),
                        array(
                            'id' => 'yotpo_sart_off',
                            'value' => 0,
                            'label' => $this->l('No')),
                    ),
                    'validation' => 'isBool',
                ), 
                array(
                    'type' => 'radio',
                    'label' => $this->l('Length of product name:'),
                    'name' => 'length_of_product_name',
                    'values' => array(
                        array(
                            'id' => 'length_of_product_name_normal',
                            'value' => 0,
                            'label' => $this->l('Normal(one line)')),
                        array(
                            'id' => 'length_of_product_name_long',
                            'value' => 1,
                            'label' => $this->l('Long(70 characters)')),
                        array(
                            'id' => 'length_of_product_name_full',
                            'value' => 2,
                            'label' => $this->l('Full name')),
                    ),
                    'validation' => 'isUnsignedInt',
                ), 
                array(
                    'type' => 'radio',
                    'label' => $this->l('Show fly-out buttons:'),
                    'name' => 'flyout_buttons',
                    'values' => array(
                        array(
                            'id' => 'flyout_buttons_on',
                            'value' => 1,
                            'label' => $this->l('Always')),
                        array(
                            'id' => 'flyout_buttons_off',
                            'value' => 0,
                            'label' => $this->l('Hover')),
                    ),
                    'validation' => 'isBool',
                ), 
                array(
                    'type' => 'radio',
                    'label' => $this->l('Fly-out buttons on mobile devices:'),
                    'name' => 'flyout_buttons_on_mobile',
                    'values' => array(
                        array(
                            'id' => 'flyout_buttons_on_mobile_show',
                            'value' => 1,
                            'label' => $this->l('Show them all the time')),
                        array(
                            'id' => 'flyout_buttons_on_mobile_hide',
                            'value' => 0,
                            'label' => $this->l('Hide')),
                        array(
                            'id' => 'flyout_buttons_on_mobile_cart',
                            'value' => 2,
                            'label' => $this->l('Display "Add to cart" button only if it is in fly-out')),
                    ),
                    'validation' => 'isUnsignedInt',
                ), 
                
                array(
                    'type' => 'radio',
                    'label' => $this->l('"Add to cart" button:'),
                    'name' => 'display_add_to_cart',
                    'values' => array(
                        array(
                            'id' => 'display_add_to_cart_on',
                            'value' => 1,
                            'label' => $this->l('Display "add to cart" button under the product name when mouse hover over')),
                        array(
                            'id' => 'display_add_to_cart_always',
                            'value' => 2,
                            'label' => $this->l('Display "add to cart" button under the product name')),
                        array(
                            'id' => 'display_add_to_cart_fly_out',
                            'value' => 0,
                            'label' => $this->l('Display "add to cart" button in the fly-out buttons')),
                        array(
                            'id' => 'display_add_to_cart_off',
                            'value' => 3,
                            'label' => $this->l('Hide')),
                    ),
                    'validation' => 'isUnsignedInt',
                ), 
                array(
                    'type' => 'switch',
                    'label' => $this->l('Hide "Add to wishlist" in the fly-out buttons:'),
                    'name' => 'flyout_wishlist',
                    'default_value' => 1,
                    'is_bool' => true,
                    'values' => array(
                        array(
                            'id' => 'flyout_wishlist_on',
                            'value' => 1,
                            'label' => $this->l('Yes')),
                        array(
                            'id' => 'flyout_wishlist_off',
                            'value' => 0,
                            'label' => $this->l('No')),
                    ),
                    'validation' => 'isBool',
                ), 
                array(
                    'type' => 'switch',
                    'label' => $this->l('Hide "Quick view" in the fly-out buttons:'),
                    'name' => 'flyout_quickview',
                    'default_value' => 1,
                    'is_bool' => true,
                    'values' => array(
                        array(
                            'id' => 'flyout_quickview_on',
                            'value' => 1,
                            'label' => $this->l('Yes')),
                        array(
                            'id' => 'flyout_quickview_off',
                            'value' => 0,
                            'label' => $this->l('No')),
                    ),
                    'validation' => 'isBool',
                ), 
                array(
                    'type' => 'switch',
                    'label' => $this->l('Hide "Add to compare" in the fly-out buttons:'),
                    'name' => 'flyout_comparison',
                    'default_value' => 1,
                    'is_bool' => true,
                    'values' => array(
                        array(
                            'id' => 'flyout_comparison_on',
                            'value' => 1,
                            'label' => $this->l('Yes')),
                        array(
                            'id' => 'flyout_comparison_off',
                            'value' => 0,
                            'label' => $this->l('No')),
                    ),
                    'validation' => 'isBool',
                ), 
                array(
                    'type' => 'switch',
                    'label' => $this->l('Show a shadow effect on mouseover:'),
                    'name' => 'pro_shadow_effect',
                    'is_bool' => true,
                    'values' => array(
                        array(
                            'id' => 'pro_shadow_effect_on',
                            'value' => 1,
                            'label' => $this->l('Yes')),
                        array(
                            'id' => 'pro_shadow_effect_off',
                            'value' => 0,
                            'label' => $this->l('No')),
                    ),
                    'validation' => 'isBool',
                ), 
                array(
                    'type' => 'text',
                    'label' => $this->l('H-shadow:'),
                    'name' => 'pro_h_shadow',
                    'validation' => 'isInt',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                    'desc' => $this->l('The position of the horizontal shadow. Negative values are allowed.'),
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('V-shadow:'),
                    'name' => 'pro_v_shadow',
                    'validation' => 'isInt',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                    'desc' => $this->l('The position of the vertical shadow. Negative values are allowed.'),
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('The blur distance of shadow:'),
                    'name' => 'pro_shadow_blur',
                    'validation' => 'isUnsignedInt',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                ),
                array(
                    'type' => 'color',
                    'label' => $this->l('Shadow color:'),
                    'name' => 'pro_shadow_color',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Shadow opacity:'),
                    'name' => 'pro_shadow_opacity',
                    'validation' => 'isFloat',
                    'class' => 'fixed-width-lg',
                    'desc' => $this->l('From 0.0 (fully transparent) to 1.0 (fully opaque).'),
                ),
            ),
            'submit' => array(
                'title' => $this->l('   Save all   '),
            ),
        );

        
        $this->fields_form[1]['form'] = array(
			'input' => array(
                array(
					'type' => 'radio',
					'label' => $this->l('Default product listing:'),
					'name' => 'product_view',
					'values' => array(
						array(
							'id' => 'product_view_grid',
							'value' => 'grid_view',
							'label' => $this->l('Grid')),
						array(
							'id' => 'product_view_list',
							'value' => 'list_view',
							'label' => $this->l('List')),
					),
                    'validation' => 'isGenericName',
				),  
                array(
					'type' => 'switch',
					'label' => $this->l('Show category title on category page:'),
					'name' => 'display_category_title',
					'is_bool' => true,
					'values' => array(
						array(
							'id' => 'display_category_title_on',
							'value' => 1,
							'label' => $this->l('Yes')),
						array(
							'id' => 'display_category_title_off',
							'value' => 0,
							'label' => $this->l('NO')),
					),
                    'validation' => 'isBool',
				), 
                array(
					'type' => 'switch',
					'label' => $this->l('Show category description on category page:'),
					'name' => 'display_category_desc',
					'is_bool' => true,
					'values' => array(
						array(
							'id' => 'display_category_desc_on',
							'value' => 1,
							'label' => $this->l('Yes')),
						array(
							'id' => 'display_category_desc_off',
							'value' => 0,
							'label' => $this->l('NO')),
					),
                    'validation' => 'isBool',
				), 
                array(
                    'type' => 'switch',
                    'label' => $this->l('Show the full category description on category page:'),
                    'name' => 'display_cate_desc_full',
                    'is_bool' => true,
                    'values' => array(
                        array(
                            'id' => 'display_cate_desc_full_on',
                            'value' => 1,
                            'label' => $this->l('Yes')),
                        array(
                            'id' => 'display_cate_desc_full_off',
                            'value' => 0,
                            'label' => $this->l('NO')),
                    ),
                    'validation' => 'isBool',
                ), 
                array(
					'type' => 'switch',
					'label' => $this->l('Show category image on category page:'),
					'name' => 'display_category_image',
					'is_bool' => true,
					'values' => array(
						array(
							'id' => 'display_category_image_on',
							'value' => 1,
							'label' => $this->l('Yes')),
						array(
							'id' => 'display_category_image_off',
							'value' => 0,
							'label' => $this->l('NO')),
					),
                    'validation' => 'isBool',
				), 
                array(
					'type' => 'radio',
					'label' => $this->l('Show subcategories:'),
					'name' => 'display_subcate',
					'values' => array(
						array(
							'id' => 'display_subcate_off',
							'value' => 0,
							'label' => $this->l('NO')),
						array(
							'id' => 'display_subcate_gird',
							'value' => 1,
							'label' => $this->l('Grid view')),
						array(
							'id' => 'display_subcate_list',
							'value' => 2,
							'label' => $this->l('List view')),
					),
                    'validation' => 'isUnsignedInt',
				), 
                'categories_per' => array(
                    'type' => 'html',
                    'id' => 'categories_per',
                    'label'=> $this->l('Subcategories per row in grid view:'),
                    'name' => '',
                ),
                array(
					'type' => 'radio',
					'label' => $this->l('Show product attributes:'),
					'name' => 'display_pro_attr',
					'values' => array(
						array(
							'id' => 'display_pro_attr_off',
							'value' => 0,
							'label' => $this->l('NO')),
						array(
							'id' => 'display_pro_attr_all',
							'value' => 1,
							'label' => $this->l('All')),
						array(
							'id' => 'display_pro_attr_in_stock',
							'value' => 2,
							'label' => $this->l('In stock only')),
					),
                    'validation' => 'isUnsignedInt',
				), 
                array(
                    'type' => 'switch',
                    'label' => $this->l('Display each product short description in category grid view:'),
                    'name' => 'show_short_desc_on_grid',
                    'is_bool' => true,
                    'values' => array(
                        array(
                            'id' => 'show_short_desc_on_grid_on',
                            'value' => 1,
                            'label' => $this->l('Yes')),
                        array(
                            'id' => 'show_short_desc_on_grid_off',
                            'value' => 0,
                            'label' => $this->l('NO')),
                    ),
                    'validation' => 'isBool',
                ),
                array(
                    'type' => 'switch',
                    'label' => $this->l('Show color list:'),
                    'name' => 'display_color_list',
                    'is_bool' => true,
                    'values' => array(
                        array(
                            'id' => 'display_color_list_on',
                            'value' => 1,
                            'label' => $this->l('Yes')),
                        array(
                            'id' => 'display_color_list_off',
                            'value' => 0,
                            'label' => $this->l('NO')),
                    ),
                    'validation' => 'isBool',
                ),
                array(
                    'type' => 'switch',
                    'label' => $this->l('Show manufacturer/brand name:'),
                    'name' => 'pro_list_display_brand_name',
                    'is_bool' => true,
                    'values' => array(
                        array(
                            'id' => 'pro_list_display_brand_name_on',
                            'value' => 1,
                            'label' => $this->l('Yes')),
                        array(
                            'id' => 'pro_list_display_brand_name_off',
                            'value' => 0,
                            'label' => $this->l('NO')),
                    ),
                    'validation' => 'isBool',
                ),
                array(
					'type' => 'switch',
					'label' => $this->l('Display "Show all" button:'),
					'name' => 'category_show_all_btn',
					'is_bool' => true,
					'values' => array(
						array(
							'id' => 'category_show_all_btn_on',
							'value' => 1,
							'label' => $this->l('Yes')),
						array(
							'id' => 'category_show_all_btn_off',
							'value' => 0,
							'label' => $this->l('NO')),
					),
                    'validation' => 'isBool',
				),
                'category_pro_per_1' => array(
                    'type' => 'html',
                    'id' => 'category_pro_per_1',
                    'label'=> $this->l('1 column'),
                    'label'=> $this->l('The number of columns for one column products listing page'),
                    'name' => '',
                ),
                'category_pro_per_2' => array(
                    'type' => 'html',
                    'id' => 'category_pro_per_2',
                    'label'=> $this->l('The number of columns for two columns products listing page'),
                    'name' => '',
                ),
                'category_pro_per_3' => array(
                    'type' => 'html',
                    'id' => 'category_pro_per_3',
                    'label'=> $this->l('The number of columns for three columns products listing page'),
                    'name' => '',
                ),
                array(
                    'type' => 'switch',
                    'label' => $this->l('Enable big next button:'),
                    'name' => 'big_next',
                    'is_bool' => true,
                    'values' => array(
                        array(
                            'id' => 'big_next_on',
                            'value' => 1,
                            'label' => $this->l('Yes')),
                        array(
                            'id' => 'big_next_off',
                            'value' => 0,
                            'label' => $this->l('NO')),
                    ),
                    'validation' => 'isBool',
                ),
                array(
                    'type' => 'color',
                    'label' => $this->l('Big next button color:'),
                    'name' => 'big_next_color',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                array(
                    'type' => 'color',
                    'label' => $this->l('Big next button hover color:'),
                    'name' => 'big_next_hover_color',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                array(
                    'type' => 'color',
                    'label' => $this->l('Big next button background:'),
                    'name' => 'big_next_bg',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                array(
                    'type' => 'color',
                    'label' => $this->l('Big next button background hover color:'),
                    'name' => 'big_next_hover_bg',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
            ),
			'submit' => array(
				'title' => $this->l('   Save all   '),
			),
		);
        
        $this->fields_form[2]['form'] = array(
            'legend' => array(
                'title' => $this->l('Color general'),
                'icon' => 'icon-cogs'
            ),
			'input' => array(
				 array(
					'type' => 'color',
					'label' => $this->l('Body font color:'),
					'name' => 'text_color',
					'class' => 'color',
					'size' => 20,
                    'validation' => 'isColor',
			     ),
                 array(
                    'type' => 'color',
                    'label' => $this->l('General links color:'),
                    'name' => 'link_color',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
				 array(
					'type' => 'color',
					'label' => $this->l('Product name color:'),
					'name' => 's_title_block_color',
					'class' => 'color',
					'size' => 20,
                    'validation' => 'isColor',
			     ),
				 array(
					'type' => 'color',
					'label' => $this->l('General link hover color:'),
					'name' => 'link_hover_color',
					'class' => 'color',
					'size' => 20,
                    'validation' => 'isColor',
			     ),
                 array(
                    'type' => 'color',
                    'label' => $this->l('Price color:'),
                    'name' => 'price_color',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ), 
				 array(
					'type' => 'color',
					'label' => $this->l('Old price color:'),
					'name' => 'old_price_color',
					'class' => 'color',
					'size' => 20,
                    'validation' => 'isColor',
			     ), 
				 /*array(
					'type' => 'color',
					'label' => $this->l('Primary buttons text color:'),
					'name' => 'p_btn_color',
					'class' => 'color',
					'size' => 20,
                    'validation' => 'isColor',
			     ),
				 array(
					'type' => 'color',
					'label' => $this->l('Primary buttons text hover color:'),
					'name' => 'p_btn_hover_color',
					'class' => 'color',
					'size' => 20,
                    'validation' => 'isColor',
			     ),
                 
				 array(
					'type' => 'color',
					'label' => $this->l('Primary buttons background:'),
					'name' => 'p_btn_bg_color',
					'class' => 'color',
					'size' => 20,
                    'validation' => 'isColor',
			     ),
				 array(
					'type' => 'color',
					'label' => $this->l('Primary buttons background hover:'),
					'name' => 'p_btn_hover_bg_color',
					'class' => 'color',
					'size' => 20,
                    'validation' => 'isColor',
			     ),*/
                 array(
                    'type' => 'color',
                    'label' => $this->l('Base border color:'),
                    'name' => 'base_border_color',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                 array(
                    'type' => 'color',
                    'label' => $this->l('Form background color:'),
                    'name' => 'form_bg_color',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                 array(
                    'type' => 'color',
                    'label' => $this->l('Product grid hover background:'),
                    'name' => 'pro_grid_hover_bg',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                 array(
                    'type' => 'color',
                    'label' => $this->l('Starts color:'),
                    'name' => 'starts_color',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
            ),
			'submit' => array(
				'title' => $this->l('   Save all   '),
			),
        );

        $this->fields_form[31]['form'] = array(
            'legend' => array(
                'title' => $this->l('Cart'),
            ),
            'input' => array(    
                 array(
                    'type' => 'color',
                    'label' => $this->l('Cart icon border color:'),
                    'name' => 'cart_icon_border_color',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                 array(
                    'type' => 'color',
                    'label' => $this->l('Cart icon background color:'),
                    'name' => 'cart_icon_bg_color',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                 array(
                    'type' => 'color',
                    'label' => $this->l('Cart number text color:'),
                    'name' => 'cart_number_color',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                 array(
                    'type' => 'color',
                    'label' => $this->l('Cart number background color:'),
                    'name' => 'cart_number_bg_color',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                 array(
                    'type' => 'color',
                    'label' => $this->l('Cart number border color:'),
                    'name' => 'cart_number_border_color',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
            ),
            'submit' => array(
                'title' => $this->l('   Save all   '),
            ),
        );

        $this->fields_form[32]['form'] = array(
            'legend' => array(
                'title' => $this->l('Icons'),
            ),
            'input' => array( 
                 array(
                    'type' => 'color',
                    'label' => $this->l('Icon text color:'),
                    'name' => 'icon_color',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                 array(
                    'type' => 'color',
                    'label' => $this->l('Icon text hover color:'),
                    'name' => 'icon_hover_color',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                 array(
                    'type' => 'color',
                    'label' => $this->l('Icon background:'),
                    'name' => 'icon_bg_color',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                 array(
                    'type' => 'color',
                    'label' => $this->l('Icon hover background:'),
                    'name' => 'icon_hover_bg_color',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                 array(
                    'type' => 'color',
                    'label' => $this->l('Icon disabled text color:'),
                    'name' => 'icon_disabled_color',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                 array(
                    'type' => 'color',
                    'label' => $this->l('Circle number color:'),
                    'name' => 'circle_number_color',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),  
                 array(
                    'type' => 'color',
                    'label' => $this->l('Circle number background:'),
                    'name' => 'circle_number_bg',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),  
                 array(
                    'type' => 'color',
                    'label' => $this->l('Right vertical panel border color:'),
                    'name' => 'right_panel_border',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),    
            ),
            'submit' => array(
                'title' => $this->l('   Save all   '),
            ),
        );
        $this->fields_form[33]['form'] = array(
            'legend' => array(
                'title' => $this->l('Buttons'),
            ),
            'input' => array( 
                 array(
                    'type' => 'color',
                    'label' => $this->l('Buttons text color:'),
                    'name' => 'btn_color',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                 array(
                    'type' => 'color',
                    'label' => $this->l('Buttons text hover color:'),
                    'name' => 'btn_hover_color',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                 
                 array(
                    'type' => 'color',
                    'label' => $this->l('Buttons background:'),
                    'name' => 'btn_bg_color',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                 array(
                    'type' => 'color',
                    'label' => $this->l('Buttons border color:'),
                    'name' => 'btn_border_color',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                 array(
                    'type' => 'color',
                    'label' => $this->l('Buttons background & border color when mouse hover:'),
                    'name' => 'btn_hover_bg_color',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                array(
                    'type' => 'radio',
                    'label' => $this->l('Button fill animation:'),
                    'name' => 'btn_fill_animation',
                    'values' => array(
                        array(
                            'id' => 'btn_fill_animation_fade',
                            'value' => 0,
                            'label' => $this->l('Fade')),
                        array(
                            'id' => 'btn_fill_animation_tb',
                            'value' => 1,
                            'label' => $this->l('Top to bottom')),
                        array(
                            'id' => 'btn_fill_animation_bt',
                            'value' => 2,
                            'label' => $this->l('Bottom to top')),
                        array(
                            'id' => 'btn_fill_animation_tb',
                            'value' => 3,
                            'label' => $this->l('Left to right')),
                        array(
                            'id' => 'btn_fill_animation_tb',
                            'value' => 4,
                            'label' => $this->l('Right to left')),
                    ),
                    'validation' => 'isUnsignedInt',
                ),
                 array(
                    'type' => 'color',
                    'label' => $this->l('Flyout buttons color:'),
                    'name' => 'flyout_buttons_color',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                 array(
                    'type' => 'color',
                    'label' => $this->l('Flyout buttons hover color:'),
                    'name' => 'flyout_buttons_hover_color',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                 array(
                    'type' => 'color',
                    'label' => $this->l('Flyout buttons background:'),
                    'name' => 'flyout_buttons_bg',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                 array(
                    'type' => 'color',
                    'label' => $this->l('Flyout buttons hover background:'),
                    'name' => 'flyout_buttons_hover_bg',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
            ),
            'submit' => array(
                'title' => $this->l('   Save all   '),
            ),
        );
        $this->fields_form[34]['form'] = array(
            'legend' => array(
                'title' => $this->l('Breadcrumb'),
            ),
            'input' => array( 
                 array(
                    'type' => 'color',
                    'label' => $this->l('Breadcrumb font color:'),
                    'name' => 'breadcrumb_color',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                 array(
                    'type' => 'color',
                    'label' => $this->l('Breadcrumb link hover color:'),
                    'name' => 'breadcrumb_hover_color',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                array(
                    'type' => 'radio',
                    'label' => $this->l('Breadcrumb width:'),
                    'name' => 'breadcrumb_width',
                    'values' => array(
                        array(
                            'id' => 'breadcrumb_width_fullwidth',
                            'value' => 0,
                            'label' => $this->l('Full width')),
                        array(
                            'id' => 'breadcrumb_width_normal',
                            'value' => 1,
                            'label' => $this->l('Boxed')),
                    ),
                    'validation' => 'isUnsignedInt',
                ),
                array(
                    'type' => 'radio',
                    'label' => $this->l('Breadcrumb background:'),
                    'name' => 'breadcrumb_bg_style',
                    'values' => array(
                        array(
                            'id' => 'breadcrumb_bg_style_gradient',
                            'value' => 0,
                            'label' => $this->l('To body background gradient')),
                        array(
                            'id' => 'breadcrumb_bg_style_pure',
                            'value' => 1,
                            'label' => $this->l('Pure color')),
                    ),
                    'validation' => 'isUnsignedInt',
                ),
                 array(
                    'type' => 'color',
                    'label' => $this->l('Breadcrumb background:'),
                    'name' => 'breadcrumb_bg',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
            ),
            'submit' => array(
                'title' => $this->l('   Save all   '),
            ),
        );
        $this->fields_form[20]['form'] = array(
            'legend' => array(
                'title' => $this->l('Product sliders'),
                'icon' => 'icon-cogs'
            ),
            'input' => array(
                 array(
                    'type' => 'color',
                    'label' => $this->l('Top right side prev/next buttons color:'),
                    'name' => 'ps_tr_prev_next_color',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                 array(
                    'type' => 'color',
                    'label' => $this->l('Top right side prev/next buttons hover color:'),
                    'name' => 'ps_tr_prev_next_color_hover',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                 array(
                    'type' => 'color',
                    'label' => $this->l('Top right side prev/next buttons disabled color:'),
                    'name' => 'ps_tr_prev_next_color_disabled',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                 array(
                    'type' => 'color',
                    'label' => $this->l('Top right side prev/next buttons background:'),
                    'name' => 'ps_tr_prev_next_bg',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                 array(
                    'type' => 'color',
                    'label' => $this->l('Top right side prev/next buttons hover background:'),
                    'name' => 'ps_tr_prev_next_bg_hover',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),

                 array(
                    'type' => 'color',
                    'label' => $this->l('Top right side prev/next buttons disabled background:'),
                    'name' => 'ps_tr_prev_next_bg_disabled',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),

                 array(
                    'type' => 'color',
                    'label' => $this->l('Left right side prev/next buttons color:'),
                    'name' => 'ps_lr_prev_next_color',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                 array(
                    'type' => 'color',
                    'label' => $this->l('Left right side prev/next buttons hover color:'),
                    'name' => 'ps_lr_prev_next_color_hover',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                 array(
                    'type' => 'color',
                    'label' => $this->l('Left right side prev/next buttons disabled color:'),
                    'name' => 'ps_lr_prev_next_color_disabled',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                 array(
                    'type' => 'color',
                    'label' => $this->l('Left right side prev/next buttons background:'),
                    'name' => 'ps_lr_prev_next_bg',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                 array(
                    'type' => 'color',
                    'label' => $this->l('Left right side prev/next buttons hover background:'),
                    'name' => 'ps_lr_prev_next_bg_hover',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                array(
                    'type' => 'color',
                    'label' => $this->l('Left right side prev/next buttons disabled background:'),
                    'name' => 'ps_lr_prev_next_bg_disabled',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                array(
                    'type' => 'color',
                    'label' => $this->l('Navigation color:'),
                    'name' => 'ps_pag_nav_bg',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                array(
                    'type' => 'color',
                    'label' => $this->l('Navigation hover color:'),
                    'name' => 'ps_pag_nav_bg_hover',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                ),
            ),
            'submit' => array(
                'title' => $this->l('   Save all   '),
            ),
        );

        $this->fields_form[36]['form'] = array(
            'legend' => array(
                'title' => $this->l('Pagination'),
                'icon' => 'icon-cogs'
            ),
            'input' => array(
                 array(
                    'type' => 'color',
                    'label' => $this->l('Pagination color:'),
                    'name' => 'pagination_color',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                 array(
                    'type' => 'color',
                    'label' => $this->l('Pagination hover color:'),
                    'name' => 'pagination_color_hover',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                 array(
                    'type' => 'color',
                    'label' => $this->l('Pagination disabled color:'),
                    'name' => 'pagination_color_disabled',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                 array(
                    'type' => 'color',
                    'label' => $this->l('Pagination background:'),
                    'name' => 'pagination_bg',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                 array(
                    'type' => 'color',
                    'label' => $this->l('Pagination hover background:'),
                    'name' => 'pagination_bg_hover',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),

                 array(
                    'type' => 'color',
                    'label' => $this->l('Pagination disabled background:'),
                    'name' => 'pagination_bg_disabled',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
            ),
            'submit' => array(
                'title' => $this->l('   Save all   '),
            ),
        );


        $this->fields_form[3]['form'] = array(
			'input' => array(
                array(
					'type' => 'switch',
					'label' => $this->l('Latin extended support:'),
					'name' => 'font_latin_support',
					'is_bool' => true,
					'values' => array(
						array(
							'id' => 'font_latin_support_on',
							'value' => 1,
							'label' => $this->l('Yes')),
						array(
							'id' => 'font_latin_support_off',
							'value' => 0,
							'label' => $this->l('NO')),
					),
                    'desc' => $this->l('You have to check your selected font whether support Latin extended here').' :<a href="http://www.google.com/webfonts">www.google.com/webfonts</a>',
                    'validation' => 'isBool',
				), 
                array(
					'type' => 'switch',
					'label' => $this->l('Cyrylic support:'),
					'name' => 'font_cyrillic_support',
					'is_bool' => true,
					'values' => array(
						array(
							'id' => 'font_cyrillic_support_on',
							'value' => 1,
							'label' => $this->l('Yes')),
						array(
							'id' => 'font_cyrillic_support_off',
							'value' => 0,
							'label' => $this->l('NO')),
					),
                    'desc' => $this->l('You have to check your selected font whether support Cyrylic here').' :<a href="http://www.google.com/webfonts">www.google.com/webfonts</a>',
                    'validation' => 'isBool',
				),  
                array(
					'type' => 'switch',
					'label' => $this->l('Vietnamese support:'),
					'name' => 'font_vietnamese',
					'is_bool' => true,
					'values' => array(
						array(
							'id' => 'font_vietnamese_on',
							'value' => 1,
							'label' => $this->l('Yes')),
						array(
							'id' => 'font_vietnamese_off',
							'value' => 0,
							'label' => $this->l('NO')),
					),
                    'desc' => $this->l('You have to check your selected font whether support Vietnamese here').' :<a href="http://www.google.com/webfonts">www.google.com/webfonts</a>',
                    'validation' => 'isBool',
				),  
                array(
					'type' => 'switch',
					'label' => $this->l('Greek support:'),
					'name' => 'font_greek_support',
					'is_bool' => true,
					'values' => array(
						array(
							'id' => 'font_greek_support_on',
							'value' => 1,
							'label' => $this->l('Yes')),
						array(
							'id' => 'font_greek_support_off',
							'value' => 0,
							'label' => $this->l('NO')),
					),
                    'desc' => $this->l('You have to check your selected font whether support Greek here').' :<a href="http://www.google.com/webfonts">www.google.com/webfonts</a>',
                    'validation' => 'isBool',
				), 
                array(
                    'type' => 'select',
                    'label' => $this->l('Body font:'),
                    'name' => 'font_text_list',
                    'onchange' => 'handle_font_change(this);',
                    'options' => array(
                        'optiongroup' => array (
                            'query' => $this->fontOptions(),
                            'label' => 'name'
                        ),
                        'options' => array (
                            'query' => 'query',
                            'id' => 'id',
                            'name' => 'name'
                        ),
                        'default' => array(
                            'value' => 0,
                            'label' => $this->l('Use default')
                        ),
                    ),
                    'desc' => '<p id="font_text_list_example" class="fontshow">Home Fashion</p>',
                ),
                'font_text'=>array(
                    'type' => 'select',
                    'label' => $this->l('Body font weight:'),
                    'onchange' => 'handle_font_style(this);',
                    'class' => 'fontOptions',
                    'name' => 'font_text',
                    'options' => array(
                        'query' => array(),
                        'id' => 'id',
                        'name' => 'name',
                    ),
                    'validation' => 'isAnything',
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Body font size:'),
                    'name' => 'font_body_size',
                    'validation' => 'isUnsignedInt',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                ), 
            ),
			'submit' => array(
				'title' => $this->l('   Save all   '),
			),
        );
        $this->fields_form[27]['form'] = array(
            'legend' => array(
                'title' => $this->l('Headings'),
                'icon' => 'icon-cogs'
            ),
            'input' => array(
                array(
                    'type' => 'select',
                    'label' => $this->l('Heading font:'),
                    'name' => 'font_heading_list',
                    'onchange' => 'handle_font_change(this);',
                    'options' => array(
                        'optiongroup' => array (
                            'query' => $this->fontOptions(),
                            'label' => 'name'
                        ),
                        'options' => array (
                            'query' => 'query',
                            'id' => 'id',
                            'name' => 'name'
                        ),
                        'default' => array(
                            'value' => 0,
                            'label' => $this->l('Use default')
                        ),
                    ),
                    'desc' => '<p id="font_heading_list_example" class="fontshow">Sample heading</p>',
                ),
                'font_heading'=>array(
                    'type' => 'select',
                    'label' => $this->l('Heading font weight:'),
                    'onchange' => 'handle_font_style(this);',
                    'class' => 'fontOptions',
                    'name' => 'font_heading',
                    'options' => array(
                        'query' => array(),
                        'id' => 'id',
                        'name' => 'name',
                    ),
                    'validation' => 'isAnything',
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Heading font size:'),
                    'name' => 'font_heading_size',
                    'validation' => 'isUnsignedInt',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                ), 
                array(
                    'type' => 'text',
                    'label' => $this->l('Footer heading font size:'),
                    'name' => 'footer_heading_size',
                    'validation' => 'isUnsignedInt',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                ), 
                array(
                    'type' => 'select',
                    'label' => $this->l('Heading transform:'),
                    'name' => 'font_heading_trans',
                    'options' => array(
                        'query' => self::$textTransform,
                        'id' => 'id',
                        'name' => 'name',
                    ),
                    'validation' => 'isUnsignedInt',
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Heading bottom border height:'),
                    'name' => 'heading_bottom_border',
                    'validation' => 'isUnsignedInt',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                ),
                /*array(
                    'type' => 'color',
                    'label' => $this->l('Heading color:'),
                    'name' => 'headings_color',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                ),*/
                array(
                    'type' => 'color',
                    'label' => $this->l('Heading color:'),
                    'name' => 'block_headings_color',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                ),
                 array(
                    'type' => 'color',
                    'label' => $this->l('Heading border color:'),
                    'name' => 'heading_bottom_border_color',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                 array(
                    'type' => 'color',
                    'label' => $this->l('Heading border highlight color:'),
                    'name' => 'heading_bottom_border_color_h',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
            ),
            'submit' => array(
                'title' => $this->l('   Save all   '),
            ),
        );

        $this->fields_form[29]['form'] = array(
            'legend' => array(
                'title' => $this->l('Headings on left/right column '),
                'icon' => 'icon-cogs'
            ),
            'input' => array(
                array(
                    'type' => 'text',
                    'label' => $this->l('Heading bottom border height:'),
                    'name' => 'heading_column_bottom_border',
                    'validation' => 'isUnsignedInt',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                ),
                array(
                    'type' => 'color',
                    'label' => $this->l('Heading color:'),
                    'name' => 'column_block_headings_color',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                ),
                 array(
                    'type' => 'color',
                    'label' => $this->l('Heading background color:'),
                    'name' => 'heading_column_bg',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
            ),
            'submit' => array(
                'title' => $this->l('   Save all   '),
            ),
        );
        $this->fields_form[28]['form'] = array(
            'legend' => array(
                'title' => $this->l('Others'),
                'icon' => 'icon-cogs'
            ),
            'input' => array(
                array(
                    'type' => 'select',
                    'label' => $this->l('Price font:'),
                    'name' => 'font_price_list',
                    'onchange' => 'handle_font_change(this);',
                    'options' => array(
                        'optiongroup' => array (
                            'query' => $this->fontOptions(),
                            'label' => 'name'
                        ),
                        'options' => array (
                            'query' => 'query',
                            'id' => 'id',
                            'name' => 'name'
                        ),
                        'default' => array(
                            'value' => 0,
                            'label' => $this->l('Use default')
                        ),
                    ),
                    'desc' => '<p id="font_price_list_example" class="fontshow">$12345.67890</p>',
                ),
                'font_price'=>array(
                    'type' => 'select',
                    'label' => $this->l('Price font weight:'),
                    'onchange' => 'handle_font_style(this);',
                    'class' => 'fontOptions',
                    'name' => 'font_price',
                    'options' => array(
                        'query' => array(),
                        'id' => 'id',
                        'name' => 'name',
                    ),
                    'validation' => 'isAnything',
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Price font size:'),
                    'name' => 'font_price_size',
                    'validation' => 'isUnsignedInt',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Old price font size:'),
                    'name' => 'font_old_price_size',
                    'validation' => 'isUnsignedInt',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                ),
                array(
                    'type' => 'select',
                    'label' => $this->l('Add to cart button font:'),
                    'name' => 'font_cart_btn_list',
                    'onchange' => 'handle_font_change(this);',
                    'options' => array(
                        'optiongroup' => array (
                            'query' => $this->fontOptions(),
                            'label' => 'name'
                        ),
                        'options' => array (
                            'query' => 'query',
                            'id' => 'id',
                            'name' => 'name'
                        ),
                        'default' => array(
                            'value' => 0,
                            'label' => $this->l('Use default')
                        ),
                    ),
                    'desc' => '<p id="font_cart_btn_list_example" class="fontshow">Add to cart</p>',
                ),
                'font_cart_btn'=>array(
                    'type' => 'select',
                    'label' => $this->l('Add to cart button font weight:'),
                    'onchange' => 'handle_font_style(this);',
                    'class' => 'fontOptions',
                    'name' => 'font_cart_btn',
                    'options' => array(
                        'query' => array(),
                        'id' => 'id',
                        'name' => 'name',
                    ),
                    'validation' => 'isAnything',
                ),
            ),
            'submit' => array(
                'title' => $this->l('   Save all   '),
            ),
        );
        
        $this->fields_form[4]['form'] = array(
			'input' => array(
                array(
                    'type' => 'radio',
                    'label' => $this->l('Logo position:'),
                    'name' => 'logo_position',
                    'values' => array(
                        array(
                            'id' => 'logo_position_left',
                            'value' => 0,
                            'label' => $this->l('Left')),
                        array(
                            'id' => 'logo_position_center',
                            'value' => 1,
                            'label' => $this->l('Center')),
                    ),
                    'validation' => 'isUnsignedInt',
                ), 
                array(
                    'type' => 'select',
                    'label' => $this->l('Logo width:'),
                    'name' => 'logo_width',
                    'options' => array(
                        'query' => self::$logo_width_map,
                        'id' => 'id',
                        'name' => 'name',
                        'default' => array(
                            'value' => 4,
                            'label' => '4/12',
                        ),
                    ),
                    'validation' => 'isUnsignedInt',
                ),
                'retina_logo_image_field' => array(
                    'type' => 'file',
                    'label' => $this->l('Retina logo:'),
                    'name' => 'retina_logo_image_field',
                    'desc' => $this->l('If your logo is 200x100, upload a 400x200 version of that logo.'),
                ),
                'logo_height' => array(
                    'type' => 'text',
                    'label' => $this->l('Header height:'),
                    'name' => 'logo_height',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                    'desc' => array(
                        $this->l('This option makes it possible to change the height of header.'),
                        $this->l('If the height of your logo is bigger than 110px then you will need to fill out this filed.'),
                        $this->l('Please make sure the value is lagger than the height of your logo. Currently the logo height is ').Configuration::get('SHOP_LOGO_HEIGHT'),
                    ),
                    'validation' => 'isUnsignedInt',
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Bottom spacing:'),
                    'name' => 'header_bottom_spacing',
                    'validation' => 'isUnsignedInt',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                ),
				array(
					'type' => 'color',
					'label' => $this->l('Header text color:'),
					'name' => 'header_text_color',
					'class' => 'color',
					'size' => 20,
                    'validation' => 'isColor',
			    ),
				 array(
					'type' => 'color',
					'label' => $this->l('Link hover color:'),
					'name' => 'header_link_hover_color',
					'class' => 'color',
					'size' => 20,
                    'validation' => 'isColor',
			     ),
                array(
                    'type' => 'select',
                    'label' => $this->l('Header text transform:'),
                    'name' => 'header_text_trans',
                    'options' => array(
                        'query' => self::$textTransform,
                        'id' => 'id',
                        'name' => 'name',
                    ),
                    'validation' => 'isUnsignedInt',
                ),
                 array(
                    'type' => 'color',
                    'label' => $this->l('Dropdown text hover color:'),
                    'name' => 'dropdown_hover_color',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                 array(
                    'type' => 'color',
                    'label' => $this->l('Dropdown background hover:'),
                    'name' => 'dropdown_bg_color',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                 array(
					'type' => 'select',
        			'label' => $this->l('Select a pattern number:'),
        			'name' => 'header_bg_pattern',
                    'options' => array(
        				'query' => $this->getPatternsArray(),
        				'id' => 'id',
        				'name' => 'name',
    					'default' => array(
    						'value' => 0,
    						'label' => $this->l('None'),
    					),
        			),
                    'desc' => $this->getPatterns(),
                    'validation' => 'isUnsignedInt',
				),
				'header_bg_image_field' => array(
					'type' => 'file',
					'label' => $this->l('Upload your own pattern as background image:'),
					'name' => 'header_bg_image_field',
                    'desc' => '',
				),
                array(
					'type' => 'radio',
					'label' => $this->l('Repeat:'),
					'name' => 'header_bg_repeat',
					'values' => array(
						array(
							'id' => 'header_bg_repeat_xy',
							'value' => 0,
							'label' => $this->l('Repeat xy')),
						array(
							'id' => 'header_bg_repeat_x',
							'value' => 1,
							'label' => $this->l('Repeat x')),
						array(
							'id' => 'header_bg_repeat_y',
							'value' => 2,
							'label' => $this->l('Repeat y')),
						array(
							'id' => 'header_bg_repeat_no',
							'value' => 3,
							'label' => $this->l('No repeat')),
					),
                    'validation' => 'isUnsignedInt',
				), 
                array(
					'type' => 'radio',
					'label' => $this->l('Position:'),
					'name' => 'header_bg_position',
					'values' => array(
						array(
							'id' => 'header_bg_repeat_left',
							'value' => 0,
							'label' => $this->l('Left')),
						array(
							'id' => 'header_bg_repeat_center',
							'value' => 1,
							'label' => $this->l('Center')),
						array(
							'id' => 'header_bg_repeat_right',
							'value' => 2,
							'label' => $this->l('Right')),
					),
                    'validation' => 'isUnsignedInt',
				),
				 array(
					'type' => 'color',
					'label' => $this->l('Background color:'),
					'name' => 'header_bg_color',
					'class' => 'color',
					'size' => 20,
                    'validation' => 'isColor',
			     ),
                 array(
                    'type' => 'color',
                    'label' => $this->l('Container background color:'),
                    'name' => 'header_con_bg_color',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
            ),
			'submit' => array(
				'title' => $this->l('   Save all   '),
			),
        );
        
        $this->fields_form[30]['form'] = array(
            'legend' => array(
                'title' => $this->l('Top-bar'),
                'icon' => 'icon-cogs'
            ),
            'input' => array(

                array(
                    'type' => 'color',
                    'label' => $this->l('Topbar text color:'),
                    'name' => 'topbar_text_color',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                ),
                 array(
                    'type' => 'color',
                    'label' => $this->l('Topbar link hover color:'),
                    'name' => 'topbar_link_hover_color',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                 array(
                    'type' => 'color',
                    'label' => $this->l('Topbar link hover background:'),
                    'name' => 'header_link_hover_bg',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Topbar height:'),
                    'name' => 'topbar_height',
                    'validation' => 'isUnsignedInt',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                ),
                 array(
                    'type' => 'color',
                    'label' => $this->l('Top bar background:'),
                    'name' => 'header_topbar_bg',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                 array(
                    'type' => 'color',
                    'label' => $this->l('Top bar border color:'),
                    'name' => 'topbar_b_border_color',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                array(
                    'type' => 'radio',
                    'label' => $this->l('Top bar divider style:'),
                    'name' => 'header_topbar_sep_type',
                    'values' => array(
                        array(
                            'id' => 'header_topbar_sep_type_vertical',
                            'value' => 'vertical-s',
                            'label' => $this->l('Vertical')),
                        array(
                            'id' => 'header_topbar_sep_type_horizontal',
                            'value' => 'horizontal-s',
                            'label' => $this->l('Horizontal')),
                        array(
                            'id' => 'header_topbar_sep_type_horizontal_fullheight',
                            'value' => 'horizontal-s-fullheight',
                            'label' => $this->l('Horizontal full height')),
                        array(
                            'id' => 'header_topbar_sep_space',
                            'value' => 'space-s',
                            'label' => $this->l('None')),
                    ),
                    'validation' => 'isGenericName',
                ), 
                 array(
                    'type' => 'color',
                    'label' => $this->l('Top bar divider  color:'),
                    'name' => 'header_topbar_sep',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
            ),
            'submit' => array(
                'title' => $this->l('   Save all   '),
            ),
        );

        $this->fields_form[5]['form'] = array(
            'legend' => array(
                'title' => $this->l('Main menu'),
                'icon' => 'icon-cogs'
            ),
			'input' => array(
                array(
					'type' => 'radio',
					'label' => $this->l('Megamenu position:'),
					'name' => 'megamenu_position',
					'values' => array(
						array(
							'id' => 'megamenu_position_left',
							'value' => 0,
							'label' => $this->l('Left')),
						array(
							'id' => 'megamenu_position_center',
							'value' => 1,
							'label' => $this->l('Center')),
						array(
							'id' => 'megamenu_position_right',
							'value' => 2,
							'label' => $this->l('Right')),
					),
                    'validation' => 'isUnsignedInt',
				), 
                /*array(
                    'type' => 'switch',
                    'label' => $this->l('Automatically highlight current category in menu:'),
                    'name' => 'menu_highlight',
                    'is_bool' => true,
                    'default_value' => 0,
                    'values' => array(
                        array(
                            'id' => 'menu_highlight_on',
                            'value' => 1,
                            'label' => $this->l('Yes')),
                        array(
                            'id' => 'menu_highlight_off',
                            'value' => 0,
                            'label' => $this->l('No')),
                    ), 
                    'desc' => $this->l('Turning this setting on may slow your page load time.'),
                    'validation' => 'isBool',
                ),*/

                array(
                    'type' => 'switch',
                    'label' => $this->l('Hide the "title" text of menu items when mouse over:'),
                    'name' => 'menu_title',
                    'is_bool' => true,
                    'values' => array(
                        array(
                            'id' => 'menu_title_on',
                            'value' => 1,
                            'label' => $this->l('Yes')),
                        array(
                            'id' => 'menu_title_off',
                            'value' => 0,
                            'label' => $this->l('No')),
                    ),
                    'validation' => 'isBool',
                ), 
                array(
                    'type' => 'text',
                    'label' => $this->l('Menu height:'),
                    'name' => 'st_menu_height',
                    'validation' => 'isUnsignedInt',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                ),
				array(
					'type' => 'select',
					'label' => $this->l('Menu font:'),
					'name' => 'font_menu_list',
					'onchange' => 'handle_font_change(this);',
					'options' => array(
                        'optiongroup' => array (
							'query' => $this->fontOptions(),
							'label' => 'name'
						),
						'options' => array (
							'query' => 'query',
							'id' => 'id',
							'name' => 'name'
						),
						'default' => array(
							'value' => 0,
							'label' => $this->l('Use default')
						),
					),
                    'desc' => '<p id="font_menu_list_example" class="fontshow">Home Fashion</p>',
				),
                'font_menu'=>array(
                    'type' => 'select',
                    'label' => $this->l('Menu font weight:'),
                    'onchange' => 'handle_font_style(this);',
                    'class' => 'fontOptions',
                    'name' => 'font_menu',
                    'options' => array(
                        'query' => array(),
                        'id' => 'id',
                        'name' => 'name',
                    ),
                    'validation' => 'isAnything',
				),
                array(
                    'type' => 'text',
                    'label' => $this->l('Menu font size:'),
                    'name' => 'font_menu_size',
                    'validation' => 'isUnsignedInt',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                ),
                array(
					'type' => 'select',
        			'label' => $this->l('Menu text transform:'),
        			'name' => 'font_menu_trans',
                    'options' => array(
        				'query' => self::$textTransform,
        				'id' => 'id',
        				'name' => 'name',
        			),
                    'validation' => 'isUnsignedInt',
				),
                array(
                    'type' => 'radio',
                    'label' => $this->l('Megamenu width:'),
                    'name' => 'megamenu_width',
                    'values' => array(
                        array(
                            'id' => 'megamenu_width_normal',
                            'value' => 0,
                            'label' => $this->l('Boxed')),
                        array(
                            'id' => 'megamenu_width_fullwidth',
                            'value' => 1,
                            'label' => $this->l('Full width')),
                    ),
                    'validation' => 'isUnsignedInt',
                ),
				 array(
					'type' => 'color',
					'label' => $this->l('Menu background:'),
					'name' => 'menu_bg_color',
					'class' => 'color',
					'size' => 20,
                    'validation' => 'isColor',
			     ),
                array(
                    'type' => 'text',
                    'label' => $this->l('The height of menu bottom border:'),
                    'name' => 'menu_bottom_border',
                    'validation' => 'isUnsignedInt',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                ),
                 array(
                    'type' => 'color',
                    'label' => $this->l('Menu bottom border color:'),
                    'name' => 'menu_bottom_border_color',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                 array(
                    'type' => 'color',
                    'label' => $this->l('Menu bottom border color when mouse hovers over:'),
                    'name' => 'menu_bottom_border_hover_color',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
				 array(
					'type' => 'color',
					'label' => $this->l('Main menu color:'),
					'name' => 'menu_color',
					'class' => 'color',
					'size' => 20,
                    'validation' => 'isColor',
			     ),
				 array(
					'type' => 'color',
					'label' => $this->l('Main menu hover color:'),
					'name' => 'menu_hover_color',
					'class' => 'color',
					'size' => 20,
                    'validation' => 'isColor',
			     ),
				 array(
					'type' => 'color',
					'label' => $this->l('Main menu hover background:'),
					'name' => 'menu_hover_bg',
					'class' => 'color',
					'size' => 20,
                    'validation' => 'isColor',
			     ),
				 array(
					'type' => 'color',
					'label' => $this->l('2nd level color:'),
					'name' => 'second_menu_color',
					'class' => 'color',
					'size' => 20,
                    'validation' => 'isColor',
			     ),
				 array(
					'type' => 'color',
					'label' => $this->l('2nd level hover color:'),
					'name' => 'second_menu_hover_color',
					'class' => 'color',
					'size' => 20,
                    'validation' => 'isColor',
			     ),
				 array(
					'type' => 'color',
					'label' => $this->l('3rd level color:'),
					'name' => 'third_menu_color',
					'class' => 'color',
					'size' => 20,
                    'validation' => 'isColor',
			     ),
				 array(
					'type' => 'color',
					'label' => $this->l('3rd level hover color:'),
					'name' => 'third_menu_hover_color',
					'class' => 'color',
					'size' => 20,
                    'validation' => 'isColor',
			     ),
				 array(
					'type' => 'color',
					'label' => $this->l('Mobile menu button color:'),
					'name' => 'menu_mob_color',
					'class' => 'color',
					'size' => 20,
                    'validation' => 'isColor',
			     ),
				 array(
					'type' => 'color',
					'label' => $this->l('Mobile menu btton hover color:'),
					'name' => 'menu_mob_hover_color',
					'class' => 'color',
					'size' => 20,
                    'validation' => 'isColor',
			     ),
				 array(
					'type' => 'color',
					'label' => $this->l('Background color for the mobile menu button:'),
					'name' => 'menu_mob_bg',
					'class' => 'color',
					'size' => 20,
                    'validation' => 'isColor',
			     ),
				 array(
					'type' => 'color',
					'label' => $this->l('Hover background color for the mobile menu button:'),
					'name' => 'menu_mob_hover_bg',
					'class' => 'color',
					'size' => 20,
                    'validation' => 'isColor',
			     ),
				 array(
					'type' => 'color',
					'label' => $this->l('Links color on mobile version:'),
					'name' => 'menu_mob_items1_color',
					'class' => 'color',
					'size' => 20,
                    'validation' => 'isColor',
			     ),
				 array(
					'type' => 'color',
					'label' => $this->l('2nd level color on mobile version:'),
					'name' => 'menu_mob_items2_color',
					'class' => 'color',
					'size' => 20,
                    'validation' => 'isColor',
			     ),
				 array(
					'type' => 'color',
					'label' => $this->l('3rd level color on mobile version:'),
					'name' => 'menu_mob_items3_color',
					'class' => 'color',
					'size' => 20,
                    'validation' => 'isColor',
			     ),
				 array(
					'type' => 'color',
					'label' => $this->l('Background color on mobile version:'),
					'name' => 'menu_mob_items1_bg',
					'class' => 'color',
					'size' => 20,
                    'validation' => 'isColor',
			     ),
				 array(
					'type' => 'color',
					'label' => $this->l('2nd level background color on mobile version:'),
					'name' => 'menu_mob_items2_bg',
					'class' => 'color',
					'size' => 20,
                    'validation' => 'isColor',
			     ),
				 array(
					'type' => 'color',
					'label' => $this->l('3rd level background color on mobile version:'),
					'name' => 'menu_mob_items3_bg',
					'class' => 'color',
					'size' => 20,
                    'validation' => 'isColor',
			     ),
            ),
			'submit' => array(
				'title' => $this->l('   Save all   '),
			),
        );

        $this->fields_form[21]['form'] = array(
            'legend' => array(
                'title' => $this->l('Side menu'),
                'icon' => 'icon-cogs'
            ),
            'input' => array(
                array(
                    'type' => 'color',
                    'label' => $this->l('Menu color:'),
                    'name' => 'c_menu_color',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                ),
                array(
                    'type' => 'color',
                    'label' => $this->l('Menu hover color:'),
                    'name' => 'c_menu_hover_color',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                ),
                array(
                    'type' => 'color',
                    'label' => $this->l('Menu hover background:'),
                    'name' => 'c_menu_hover_bg',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                ),
                array(
                   'type' => 'color',
                   'label' => $this->l('Menu background:'),
                   'name' => 'c_menu_bg_color',
                   'class' => 'color',
                   'size' => 20,
                   'validation' => 'isColor',
                ),
                 array(
                    'type' => 'color',
                    'label' => $this->l('Menu left border color:'),
                    'name' => 'c_menu_border_color',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                 array(
                    'type' => 'color',
                    'label' => $this->l('Menu left border color when mouse hovers over:'),
                    'name' => 'c_menu_border_hover_color',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
            ),
            'submit' => array(
                'title' => $this->l('   Save all   '),
            ),
        );
        
        $this->fields_form[6]['form'] = array(
			'input' => array(
                array(
					'type' => 'select',
        			'label' => $this->l('Select a pattern number:'),
        			'name' => 'body_bg_pattern',
                    'options' => array(
        				'query' => $this->getPatternsArray(),
        				'id' => 'id',
        				'name' => 'name',
    					'default' => array(
    						'value' => 0,
    						'label' => $this->l('None'),
    					),
        			),
                    'desc' => $this->getPatterns(),
                    'validation' => 'isUnsignedInt',
				),
				'body_bg_image_field' => array(
					'type' => 'file',
					'label' => $this->l('Upload your own pattern as background image:'),
					'name' => 'body_bg_image_field',
                    'desc' => '',
				),
                array(
					'type' => 'radio',
					'label' => $this->l('Repeat:'),
					'name' => 'body_bg_repeat',
					'values' => array(
						array(
							'id' => 'body_bg_repeat_xy',
							'value' => 0,
							'label' => $this->l('Repeat xy')),
						array(
							'id' => 'body_bg_repeat_x',
							'value' => 1,
							'label' => $this->l('Repeat x')),
						array(
							'id' => 'body_bg_repeat_y',
							'value' => 2,
							'label' => $this->l('Repeat y')),
						array(
							'id' => 'body_bg_repeat_no',
							'value' => 3,
							'label' => $this->l('No repeat')),
					),
                    'validation' => 'isUnsignedInt',
				), 
                array(
					'type' => 'radio',
					'label' => $this->l('Position:'),
					'name' => 'body_bg_position',
					'values' => array(
						array(
							'id' => 'body_bg_repeat_left',
							'value' => 0,
							'label' => $this->l('Left')),
						array(
							'id' => 'body_bg_repeat_center',
							'value' => 1,
							'label' => $this->l('Center')),
						array(
							'id' => 'body_bg_repeat_right',
							'value' => 2,
							'label' => $this->l('Right')),
					),
                    'validation' => 'isUnsignedInt',
				),
                array(
                    'type' => 'switch',
                    'label' => $this->l('Fixed background:'),
                    'name' => 'body_bg_fixed',
                    'is_bool' => true,
                    'default_value' => 0,
                    'values' => array(
                        array(
                            'id' => 'body_bg_fixed_on',
                            'value' => 1,
                            'label' => $this->l('Yes')),
                        array(
                            'id' => 'body_bg_fixed_off',
                            'value' => 0,
                            'label' => $this->l('No')),
                    ),
                    'validation' => 'isBool',
                ),
                array(
					'type' => 'switch',
					'label' => $this->l('Scale the background image:'),
					'name' => 'body_bg_cover',
					'is_bool' => true,
                    'default_value' => 0,
					'values' => array(
						array(
							'id' => 'body_bg_cover_on',
							'value' => 1,
							'label' => $this->l('Yes')),
                        array(
                            'id' => 'body_bg_cover_off',
                            'value' => 0,
                            'label' => $this->l('No')),
					),
                    'desc' => $this->l('Scale the background image to be as large as possible so that the window is completely covered by the background image. Some parts of the background image may not be in view within the window.'),
                    'validation' => 'isBool',
				),
                array(
                    'type' => 'color',
                    'label' => $this->l('Body background color:'),
                    'name' => 'body_bg_color',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                array(
                    'type' => 'color',
                    'label' => $this->l('Content background color:'),
                    'name' => 'body_con_bg_color',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                    'desc' => $this->l('Actually only for boxed layout.'),
                 ),
				/*array(
					'type' => 'color',
					'label' => $this->l('Column container background color:'),
					'name' => 'main_con_bg_color',
					'class' => 'color',
					'size' => 20,
                    'validation' => 'isColor',
			     ),*/
			),
			'submit' => array(
				'title' => $this->l('   Save all   '),
			),
		);
        
        $this->fields_form[7]['form'] = array(
            'legend' => array(
                'title' => $this->l('Footer primary'),
                'icon' => 'icon-cogs'
            ),
			'input' => array(
                 array(
					'type' => 'select',
        			'label' => $this->l('Select a pattern number:'),
        			'name' => 'f_top_bg_pattern',
                    'options' => array(
        				'query' => $this->getPatternsArray(),
        				'id' => 'id',
        				'name' => 'name',
    					'default' => array(
    						'value' => 0,
    						'label' => $this->l('None'),
    					),
        			),
                    'desc' => $this->getPatterns(),
                    'validation' => 'isUnsignedInt',
				),
				'f_top_bg_image_field' => array(
					'type' => 'file',
					'label' => $this->l('Upload your own pattern as background image:'),
					'name' => 'f_top_bg_image_field',
                    'desc' => '',
				),
                array(
					'type' => 'radio',
					'label' => $this->l('Repeat:'),
					'name' => 'f_top_bg_repeat',
					'values' => array(
						array(
							'id' => 'f_top_bg_repeat_xy',
							'value' => 0,
							'label' => $this->l('Repeat xy')),
						array(
							'id' => 'f_top_bg_repeat_x',
							'value' => 1,
							'label' => $this->l('Repeat x')),
						array(
							'id' => 'f_top_bg_repeat_y',
							'value' => 2,
							'label' => $this->l('Repeat y')),
						array(
							'id' => 'f_top_bg_repeat_no',
							'value' => 3,
							'label' => $this->l('No repeat')),
					),
                    'validation' => 'isUnsignedInt',
				), 
                array(
					'type' => 'radio',
					'label' => $this->l('Position:'),
					'name' => 'f_top_bg_position',
					'values' => array(
						array(
							'id' => 'f_top_bg_repeat_left',
							'value' => 0,
							'label' => $this->l('Left')),
						array(
							'id' => 'f_top_bg_repeat_center',
							'value' => 1,
							'label' => $this->l('Center')),
						array(
							'id' => 'f_top_bg_repeat_right',
							'value' => 2,
							'label' => $this->l('Right')),
					),
                    'validation' => 'isUnsignedInt',
				),
                 array(
                    'type' => 'color',
                    'label' => $this->l('Text color:'),
                    'name' => 'footer_primary_color',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                 array(
                    'type' => 'color',
                    'label' => $this->l('Links color:'),
                    'name' => 'footer_link_primary_color',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                 array(
                    'type' => 'color',
                    'label' => $this->l('Links hover color:'),
                    'name' => 'footer_link_primary_hover_color',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
				array(
					'type' => 'color',
					'label' => $this->l('Headings color:'),
					'name' => 'f_top_h_color',
					'class' => 'color',
					'size' => 20,
                    'validation' => 'isColor',
			    ),
			    array(
					'type' => 'color',
					'label' => $this->l('Background color:'),
					'name' => 'footer_top_bg',
					'class' => 'color',
					'size' => 20,
                    'validation' => 'isColor',
			     ),
				array(
					'type' => 'color',
					'label' => $this->l('Container background color:'),
					'name' => 'footer_top_con_bg',
					'class' => 'color',
					'size' => 20,
                    'validation' => 'isColor',
			     ),
                array(
                    'type' => 'select',
                    'label' => $this->l('Border height:'),
                    'name' => 'footer_top_border',
                    'options' => array(
                        'query' => self::$border_style_map,
                        'id' => 'id',
                        'name' => 'name',
                        'defaul_value' => 0,
                    ),
                    'validation' => 'isUnsignedInt',
                ),
				array(
					'type' => 'color',
					'label' => $this->l('border color:'),
					'name' => 'footer_top_border_color',
					'class' => 'color',
					'size' => 20,
                    'validation' => 'isColor',
			     ),
            ),
			'submit' => array(
				'title' => $this->l('   Save all   '),
			),
        );
        
        $this->fields_form[8]['form'] = array(
            'legend' => array(
                'title' => $this->l('Footer secondary'),
                'icon' => 'icon-cogs'
            ),
			'input' => array(
                 array(
					'type' => 'select',
        			'label' => $this->l('Select a pattern number:'),
        			'name' => 'footer_bg_pattern',
                    'options' => array(
        				'query' => $this->getPatternsArray(),
        				'id' => 'id',
        				'name' => 'name',
    					'default' => array(
    						'value' => 0,
    						'label' => $this->l('None'),
    					),
        			),
                    'desc' => $this->getPatterns(),
                    'validation' => 'isUnsignedInt',
				),
				'footer_bg_image_field' => array(
					'type' => 'file',
					'label' => $this->l('Upload your own pattern as background image:'),
					'name' => 'footer_bg_image_field',
                    'desc' => '',
				),
                array(
					'type' => 'radio',
					'label' => $this->l('Repeat:'),
					'name' => 'footer_bg_repeat',
					'values' => array(
						array(
							'id' => 'footer_bg_repeat_xy',
							'value' => 0,
							'label' => $this->l('Repeat xy')),
						array(
							'id' => 'footer_bg_repeat_x',
							'value' => 1,
							'label' => $this->l('Repeat x')),
						array(
							'id' => 'footer_bg_repeat_y',
							'value' => 2,
							'label' => $this->l('Repeat y')),
						array(
							'id' => 'footer_bg_repeat_no',
							'value' => 3,
							'label' => $this->l('No repeat')),
					),
                    'validation' => 'isUnsignedInt',
				), 
                array(
					'type' => 'radio',
					'label' => $this->l('Position:'),
					'name' => 'footer_bg_position',
					'values' => array(
						array(
							'id' => 'footer_bg_repeat_left',
							'value' => 0,
							'label' => $this->l('Left')),
						array(
							'id' => 'footer_bg_repeat_center',
							'value' => 1,
							'label' => $this->l('Center')),
						array(
							'id' => 'footer_bg_repeat_right',
							'value' => 2,
							'label' => $this->l('Right')),
					),
                    'validation' => 'isUnsignedInt',
				),
                 array(
                    'type' => 'color',
                    'label' => $this->l('Text color:'),
                    'name' => 'footer_color',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                 array(
                    'type' => 'color',
                    'label' => $this->l('Links color:'),
                    'name' => 'footer_link_color',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                 array(
                    'type' => 'color',
                    'label' => $this->l('Links hover color:'),
                    'name' => 'footer_link_hover_color',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
				array(
					'type' => 'color',
					'label' => $this->l('Headings color:'),
					'name' => 'footer_h_color',
					'class' => 'color',
					'size' => 20,
                    'validation' => 'isColor',
			    ),
				 array(
					'type' => 'color',
					'label' => $this->l('Background color:'),
					'name' => 'footer_bg_color',
					'class' => 'color',
					'size' => 20,
                    'validation' => 'isColor',
			     ),
				 array(
					'type' => 'color',
					'label' => $this->l('Container background color:'),
					'name' => 'footer_con_bg_color',
					'class' => 'color',
					'size' => 20,
                    'validation' => 'isColor',
			     ),
                array(
                    'type' => 'select',
                    'label' => $this->l('Border height:'),
                    'name' => 'footer_border',
                    'options' => array(
                        'query' => self::$border_style_map,
                        'id' => 'id',
                        'name' => 'name',
                        'defaul_value' => 0,
                    ),
                    'validation' => 'isUnsignedInt',
                ),
				array(
					'type' => 'color',
					'label' => $this->l('Border color:'),
					'name' => 'footer_border_color',
					'class' => 'color',
					'size' => 20,
                    'validation' => 'isColor',
			     ),        
            ),
			'submit' => array(
				'title' => $this->l('   Save all   '),
			),
        );
        
        $this->fields_form[9]['form'] = array(
            'legend' => array(
                'title' => $this->l('Footer tertiary'),
                'icon' => 'icon-cogs'
            ),
			'input' => array(
                 array(
					'type' => 'select',
        			'label' => $this->l('Select a pattern number:'),
        			'name' => 'f_secondary_bg_pattern',
                    'options' => array(
        				'query' => $this->getPatternsArray(),
        				'id' => 'id',
        				'name' => 'name',
    					'default' => array(
    						'value' => 0,
    						'label' => $this->l('None'),
    					),
        			),
                    'desc' => $this->getPatterns(),
                    'validation' => 'isUnsignedInt',
				),
				'f_secondary_bg_image_field' => array(
					'type' => 'file',
					'label' => $this->l('Upload your own pattern as background image:'),
					'name' => 'f_secondary_bg_image_field',
                    'desc' => '',
				),
                array(
					'type' => 'radio',
					'label' => $this->l('Repeat:'),
					'name' => 'f_secondary_bg_repeat',
					'values' => array(
						array(
							'id' => 'f_secondary_bg_repeat_xy',
							'value' => 0,
							'label' => $this->l('Repeat xy')),
						array(
							'id' => 'f_secondary_bg_repeat_x',
							'value' => 1,
							'label' => $this->l('Repeat x')),
						array(
							'id' => 'f_secondary_bg_repeat_y',
							'value' => 2,
							'label' => $this->l('Repeat y')),
						array(
							'id' => 'f_secondary_bg_repeat_no',
							'value' => 3,
							'label' => $this->l('No repeat')),
					),
                    'validation' => 'isUnsignedInt',
				), 
                array(
					'type' => 'radio',
					'label' => $this->l('Position:'),
					'name' => 'f_secondary_bg_position',
					'values' => array(
						array(
							'id' => 'f_secondary_bg_repeat_left',
							'value' => 0,
							'label' => $this->l('Left')),
						array(
							'id' => 'f_secondary_bg_repeat_center',
							'value' => 1,
							'label' => $this->l('Center')),
						array(
							'id' => 'f_secondary_bg_repeat_right',
							'value' => 2,
							'label' => $this->l('Right')),
					),
                    'validation' => 'isUnsignedInt',
				),
                 array(
                    'type' => 'color',
                    'label' => $this->l('Text color:'),
                    'name' => 'footer_tertiary_color',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                 array(
                    'type' => 'color',
                    'label' => $this->l('Links color:'),
                    'name' => 'footer_link_tertiary_color',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                 array(
                    'type' => 'color',
                    'label' => $this->l('Links hover color:'),
                    'name' => 'footer_link_tertiary_hover_color',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
				array(
					'type' => 'color',
					'label' => $this->l('Headings color:'),
					'name' => 'f_secondary_h_color',
					'class' => 'color',
					'size' => 20,
                    'validation' => 'isColor',
			    ),
				 array(
					'type' => 'color',
					'label' => $this->l('Background color:'),
					'name' => 'footer_secondary_bg',
					'class' => 'color',
					'size' => 20,
                    'validation' => 'isColor',
			     ),
				 array(
					'type' => 'color',
					'label' => $this->l('Container background color:'),
					'name' => 'footer_secondary_con_bg',
					'class' => 'color',
					'size' => 20,
                    'validation' => 'isColor',
			     ),
                array(
                    'type' => 'select',
                    'label' => $this->l('Border height:'),
                    'name' => 'footer_tertiary_border',
                    'options' => array(
                        'query' => self::$border_style_map,
                        'id' => 'id',
                        'name' => 'name',
                        'defaul_value' => 0,
                    ),
                    'validation' => 'isUnsignedInt',
                ),
				array(
					'type' => 'color',
					'label' => $this->l('Border color:'),
					'name' => 'footer_tertiary_border_color',
					'class' => 'color',
					'size' => 20,
                    'validation' => 'isColor',
			     ), 
            ),
			'submit' => array(
				'title' => $this->l('   Save all   '),
			),
        );
        
        $this->fields_form[10]['form'] = array(
            'legend' => array(
                'title' => $this->l('Copyright'),
                'icon' => 'icon-cogs'
            ),
			'input' => array(
                 array(
					'type' => 'select',
        			'label' => $this->l('Select a pattern number:'),
        			'name' => 'f_info_bg_pattern',
                    'options' => array(
        				'query' => $this->getPatternsArray(),
        				'id' => 'id',
        				'name' => 'name',
    					'default' => array(
    						'value' => 0,
    						'label' => $this->l('None'),
    					),
        			),
                    'desc' => $this->getPatterns(),
                    'validation' => 'isUnsignedInt',
				),
				'f_info_bg_image_field' => array(
					'type' => 'file',
					'label' => $this->l('Upload your own pattern as background image:'),
					'name' => 'f_info_bg_image_field',
                    'desc' => '',
				),
                array(
					'type' => 'radio',
					'label' => $this->l('Repeat:'),
					'name' => 'f_info_bg_repeat',
					'values' => array(
						array(
							'id' => 'f_info_bg_repeat_xy',
							'value' => 0,
							'label' => $this->l('Repeat xy')),
						array(
							'id' => 'f_info_bg_repeat_x',
							'value' => 1,
							'label' => $this->l('Repeat x')),
						array(
							'id' => 'f_info_bg_repeat_y',
							'value' => 2,
							'label' => $this->l('Repeat y')),
						array(
							'id' => 'f_info_bg_repeat_no',
							'value' => 3,
							'label' => $this->l('No repeat')),
					),
                    'validation' => 'isUnsignedInt',
				), 
                array(
					'type' => 'radio',
					'label' => $this->l('Position:'),
					'name' => 'f_info_bg_position',
					'values' => array(
						array(
							'id' => 'f_info_bg_repeat_left',
							'value' => 0,
							'label' => $this->l('Left')),
						array(
							'id' => 'f_info_bg_repeat_center',
							'value' => 1,
							'label' => $this->l('Center')),
						array(
							'id' => 'f_info_bg_repeat_right',
							'value' => 2,
							'label' => $this->l('Right')),
					),
                    'validation' => 'isUnsignedInt',
				),
                 array(
                    'type' => 'color',
                    'label' => $this->l('Text color:'),
                    'name' => 'second_footer_color',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                 array(
                    'type' => 'color',
                    'label' => $this->l('Links color:'),
                    'name' => 'second_footer_link_color',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                 array(
                    'type' => 'color',
                    'label' => $this->l('Links hover color:'),
                    'name' => 'second_footer_link_hover_color',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
				 array(
					'type' => 'color',
					'label' => $this->l('Background color:'),
					'name' => 'footer_info_bg',
					'class' => 'color',
					'size' => 20,
                    'validation' => 'isColor',
			     ),
				 array(
					'type' => 'color',
					'label' => $this->l('Container background color:'),
					'name' => 'footer_info_con_bg',
					'class' => 'color',
					'size' => 20,
                    'validation' => 'isColor',
			     ),
                array(
                    'type' => 'select',
                    'label' => $this->l('Border height:'),
                    'name' => 'footer_info_border',
                    'options' => array(
                        'query' => self::$border_style_map,
                        'id' => 'id',
                        'name' => 'name',
                        'defaul_value' => 0,
                    ),
                    'validation' => 'isUnsignedInt',
                ),
                array(
                    'type' => 'color',
                    'label' => $this->l('Border color:'),
                    'name' => 'footer_info_border_color',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
            ),
			'submit' => array(
				'title' => $this->l('   Save all   '),
			),
        );
        
        $this->fields_form[11]['form'] = array(
			'legend' => array(
				'title' => $this->l('Cross selling'),
			),
			'input' => array(
                'cs_pro_per' => array(
                    'type' => 'html',
                    'id' => 'cs_pro_per',
                    'label'=> $this->l('The number of columns'),
                    'name' => '',
                ),
                array(
					'type' => 'switch',
					'label' => $this->l('Autoplay:'),
					'name' => 'cs_slideshow',
					'is_bool' => true,
                    'default_value' => 1,
					'values' => array(
						array(
							'id' => 'cs_slide_on',
							'value' => 1,
							'label' => $this->l('Yes')),
						array(
							'id' => 'cs_slide_off',
							'value' => 0,
							'label' => $this->l('No')),
					),
                    'validation' => 'isBool',
				), 
                array(
					'type' => 'text',
					'label' => $this->l('Time:'),
					'name' => 'cs_s_speed',
                    'desc' => $this->l('The period, in milliseconds, between the end of a transition effect and the start of the next one.'),
                    'validation' => 'isUnsignedInt',
                    'class' => 'fixed-width-sm'
				),
                array(
					'type' => 'text',
					'label' => $this->l('Transition period:'),
					'name' => 'cs_a_speed',
                    'desc' => $this->l('The period, in milliseconds, of the transition effect.'),
                    'validation' => 'isUnsignedInt',
                    'class' => 'fixed-width-sm'
				),
                array(
					'type' => 'switch',
					'label' => $this->l('Pause On Hover:'),
					'name' => 'cs_pause_on_hover',
                    'default_value' => 1,
					'is_bool' => true,
					'values' => array(
						array(
							'id' => 'cs_pause_on_hover_on',
							'value' => 1,
							'label' => $this->l('Yes')),
						array(
							'id' => 'cs_pause_on_hover_off',
							'value' => 0,
							'label' => $this->l('No')),
					),
                    'validation' => 'isBool',
				),
                array(
                    'type' => 'radio',
                    'label' => $this->l('Title text align:'),
                    'name' => 'cs_title',
                    'default_value' => 0,
                    'values' => array(
                        array(
                            'id' => 'cs_left',
                            'value' => 0,
                            'label' => $this->l('Left')),
                        array(
                            'id' => 'cs_center',
                            'value' => 1,
                            'label' => $this->l('Center')),
                    ),
                    'validation' => 'isBool',
                ),
                array(
                    'type' => 'radio',
                    'label' => $this->l('Display "next" and "prev" buttons:'),
                    'name' => 'cs_direction_nav',
                    'default_value' => 0,
                    'values' => array(
                        array(
                            'id' => 'cs_none',
                            'value' => 0,
                            'label' => $this->l('None')),
                        array(
                            'id' => 'cs_top-right',
                            'value' => 1,
                            'label' => $this->l('Top right-hand side')),
                        array(
                            'id' => 'cs_square',
                            'value' => 3,
                            'label' => $this->l('Square')),
                        array(
                            'id' => 'cs_circle',
                            'value' => 4,
                            'label' => $this->l('Circle')),
                    ),
                    'validation' => 'isUnsignedInt',
                ),
                array(
                    'type' => 'switch',
                    'label' => $this->l('Show pagination:'),
                    'name' => 'cs_control_nav',
                    'default_value' => 1,
                    'is_bool' => true,
                    'values' => array(
                        array(
                            'id' => 'cs_control_nav_on',
                            'value' => 1,
                            'label' => $this->l('Yes')),
                        array(
                            'id' => 'cs_control_nav_off',
                            'value' => 0,
                            'label' => $this->l('No')),
                    ),
                    'validation' => 'isBool',
                ),
                array(
					'type' => 'switch',
					'label' => $this->l('Rewind to first after the last slide:'),
					'name' => 'cs_loop',
                    'default_value' => 0,
					'is_bool' => true,
					'values' => array(
						array(
							'id' => 'cs_loop_on',
							'value' => 1,
							'label' => $this->l('Yes')),
						array(
							'id' => 'cs_loop_off',
							'value' => 0,
							'label' => $this->l('No')),
					),
                    'validation' => 'isBool',
				),
                array(
                    'type' => 'switch',
                    'label' => $this->l('Lazy load:'),
                    'name' => 'cs_lazy',
                    'default_value' => 0,
                    'is_bool' => true,
                    'values' => array(
                        array(
                            'id' => 'cs_lazy_on',
                            'value' => 1,
                            'label' => $this->l('Yes')),
                        array(
                            'id' => 'cs_lazy_off',
                            'value' => 0,
                            'label' => $this->l('No')),
                    ),
                    'desc' => $this->l('Delays loading of images. Images outside of viewport won\'t be loaded before user scrolls to them. Great for mobile devices to speed up page loadings.'),
                    'validation' => 'isBool',
                ),
                array(
					'type' => 'radio',
					'label' => $this->l('Move:'),
					'name' => 'cs_move',
                    'default_value' => 0,
					'values' => array(
						array(
							'id' => 'cs_move_on',
							'value' => 1,
							'label' => $this->l('1 item')),
						array(
							'id' => 'cs_move_off',
							'value' => 0,
							'label' => $this->l('All visible items')),
					),
                    'validation' => 'isBool',
				),
            ),
			'submit' => array(
				'title' => $this->l('   Save all   '),
			),
        );
        
        
        $this->fields_form[12]['form'] = array(
			'legend' => array(
				'title' => $this->l('Products category'),
			),
			'input' => array(
               'pc_pro_per' => array(
                    'type' => 'html',
                    'id' => 'pc_pro_per',
                    'label'=> $this->l('The number of columns'),
                    'name' => '',
                ),
                array(
					'type' => 'switch',
					'label' => $this->l('Autoplay:'),
					'name' => 'pc_slideshow',
					'is_bool' => true,
                    'default_value' => 1,
					'values' => array(
						array(
							'id' => 'pc_slide_on',
							'value' => 1,
							'label' => $this->l('Yes')),
						array(
							'id' => 'pc_slide_off',
							'value' => 0,
							'label' => $this->l('No')),
					),
                    'validation' => 'isBool',
				), 
                array(
					'type' => 'text',
					'label' => $this->l('Time:'),
					'name' => 'pc_s_speed',
                    'default_value' => 7000,
                    'desc' => $this->l('The period, in milliseconds, between the end of a transition effect and the start of the next one.'),
                    'validation' => 'isUnsignedInt',
                    'class' => 'fixed-width-sm'
				),
                array(
					'type' => 'text',
					'label' => $this->l('Transition period:'),
					'name' => 'pc_a_speed',
                    'default_value' => 400,
                    'desc' => $this->l('The period, in milliseconds, of the transition effect.'),
                    'validation' => 'isUnsignedInt',
                    'class' => 'fixed-width-sm'
				),
                array(
                    'type' => 'switch',
                    'label' => $this->l('Pause On Hover:'),
                    'name' => 'pc_pause_on_hover',
                    'default_value' => 1,
                    'is_bool' => true,
                    'values' => array(
                        array(
                            'id' => 'pc_pause_on_hover_on',
                            'value' => 1,
                            'label' => $this->l('Yes')),
                        array(
                            'id' => 'pc_pause_on_hover_off',
                            'value' => 0,
                            'label' => $this->l('No')),
                    ),
                    'validation' => 'isBool',
                ),
                array(
                    'type' => 'radio',
                    'label' => $this->l('Title text align:'),
                    'name' => 'pc_title',
                    'default_value' => 0,
                    'values' => array(
                        array(
                            'id' => 'pc_left',
                            'value' => 0,
                            'label' => $this->l('Left')),
                        array(
                            'id' => 'pc_center',
                            'value' => 1,
                            'label' => $this->l('Center')),
                    ),
                    'validation' => 'isBool',
                ),
                array(
                    'type' => 'radio',
                    'label' => $this->l('Display "next" and "prev" buttons:'),
                    'name' => 'pc_direction_nav',
                    'default_value' => 0,
                    'values' => array(
                        array(
                            'id' => 'pc_none',
                            'value' => 0,
                            'label' => $this->l('None')),
                        array(
                            'id' => 'pc_top-right',
                            'value' => 1,
                            'label' => $this->l('Top right-hand side')),
                        array(
                            'id' => 'pc_square',
                            'value' => 3,
                            'label' => $this->l('Square')),
                        array(
                            'id' => 'pc_circle',
                            'value' => 4,
                            'label' => $this->l('Circle')),
                    ),
                    'validation' => 'isUnsignedInt',
                ),
                array(
                    'type' => 'switch',
                    'label' => $this->l('Show pagination:'),
                    'name' => 'pc_control_nav',
                    'default_value' => 1,
                    'is_bool' => true,
                    'values' => array(
                        array(
                            'id' => 'pc_control_nav_on',
                            'value' => 1,
                            'label' => $this->l('Yes')),
                        array(
                            'id' => 'pc_control_nav_off',
                            'value' => 0,
                            'label' => $this->l('No')),
                    ),
                    'validation' => 'isBool',
                ),
                array(
                    'type' => 'switch',
                    'label' => $this->l('Rewind to first after the last slide:'),
                    'name' => 'pc_loop',
                    'default_value' => 0,
                    'is_bool' => true,
                    'values' => array(
                        array(
                            'id' => 'pc_loop_on',
                            'value' => 1,
                            'label' => $this->l('Yes')),
                        array(
                            'id' => 'pc_loop_off',
                            'value' => 0,
                            'label' => $this->l('No')),
                    ),
                    'validation' => 'isBool',
                ),
                array(
					'type' => 'switch',
					'label' => $this->l('Lazy load:'),
					'name' => 'pc_lazy',
                    'default_value' => 0,
					'is_bool' => true,
					'values' => array(
						array(
							'id' => 'pc_lazy_on',
							'value' => 1,
							'label' => $this->l('Yes')),
						array(
							'id' => 'pc_lazy_off',
							'value' => 0,
							'label' => $this->l('No')),
					),
                    'desc' => $this->l('Delays loading of images. Images outside of viewport won\'t be loaded before user scrolls to them. Great for mobile devices to speed up page loadings.'),
                    'validation' => 'isBool',
				),
                array(
					'type' => 'radio',
					'label' => $this->l('Move:'),
					'name' => 'pc_move',
                    'default_value' => 0,
					'values' => array(
						array(
							'id' => 'pc_move_on',
							'value' => 1,
							'label' => $this->l('1 item')),
						array(
							'id' => 'pc_move_off',
							'value' => 0,
							'label' => $this->l('All visible items')),
					),
                    'validation' => 'isBool',
				),
            ),
			'submit' => array(
				'title' => $this->l('   Save all   '),
			),
        );
        
        $this->fields_form[13]['form'] = array(
			'legend' => array(
				'title' => $this->l('Accessories'),
			),
			'input' => array(
                'ac_pro_per' => array(
                    'type' => 'html',
                    'id' => 'ac_pro_per',
                    'label'=> $this->l('The number of columns'),
                    'name' => '',
                ),
                array(
					'type' => 'switch',
					'label' => $this->l('Autoplay:'),
					'name' => 'ac_slideshow',
					'is_bool' => true,
                    'default_value' => 1,
					'values' => array(
						array(
							'id' => 'ac_slide_on',
							'value' => 1,
							'label' => $this->l('Yes')),
						array(
							'id' => 'ac_slide_off',
							'value' => 0,
							'label' => $this->l('No')),
					),
                    'validation' => 'isBool',
				), 
                array(
					'type' => 'text',
					'label' => $this->l('Time:'),
					'name' => 'ac_s_speed',
                    'default_value' => 7000,
                    'desc' => $this->l('The period, in milliseconds, between the end of a transition effect and the start of the next one.'),
                    'validation' => 'isUnsignedInt',
                    'class' => 'fixed-width-sm'
				),
                array(
					'type' => 'text',
					'label' => $this->l('Transition period:'),
					'name' => 'ac_a_speed',
                    'default_value' => 400,
                    'desc' => $this->l('The period, in milliseconds, of the transition effect.'),
                    'validation' => 'isUnsignedInt',
                    'class' => 'fixed-width-sm'
				),
                array(
					'type' => 'switch',
					'label' => $this->l('Pause On Hover:'),
					'name' => 'ac_pause_on_hover',
                    'default_value' => 1,
					'is_bool' => true,
					'values' => array(
						array(
							'id' => 'ac_pause_on_hover_on',
							'value' => 1,
							'label' => $this->l('Yes')),
						array(
							'id' => 'ac_pause_on_hover_off',
							'value' => 0,
							'label' => $this->l('No')),
					),
                    'validation' => 'isBool',
				),
                array(
                    'type' => 'radio',
                    'label' => $this->l('Title text align:'),
                    'name' => 'ac_title',
                    'default_value' => 0,
                    'values' => array(
                        array(
                            'id' => 'ac_left',
                            'value' => 0,
                            'label' => $this->l('Left')),
                        array(
                            'id' => 'ac_center',
                            'value' => 1,
                            'label' => $this->l('Center')),
                    ),
                    'validation' => 'isBool',
                ),
                array(
                    'type' => 'radio',
                    'label' => $this->l('Display "next" and "prev" buttons:'),
                    'name' => 'ac_direction_nav',
                    'default_value' => 0,
                    'values' => array(
                        array(
                            'id' => 'ac_none',
                            'value' => 0,
                            'label' => $this->l('None')),
                        array(
                            'id' => 'ac_top-right',
                            'value' => 1,
                            'label' => $this->l('Top right-hand side')),
                        array(
                            'id' => 'ac_square',
                            'value' => 3,
                            'label' => $this->l('Square')),
                        array(
                            'id' => 'ac_circle',
                            'value' => 4,
                            'label' => $this->l('Circle')),
                    ),
                    'validation' => 'isUnsignedInt',
                ),
                array(
                    'type' => 'switch',
                    'label' => $this->l('Show pagination:'),
                    'name' => 'ac_control_nav',
                    'default_value' => 1,
                    'is_bool' => true,
                    'values' => array(
                        array(
                            'id' => 'ac_control_nav_on',
                            'value' => 1,
                            'label' => $this->l('Yes')),
                        array(
                            'id' => 'ac_control_nav_off',
                            'value' => 0,
                            'label' => $this->l('No')),
                    ),
                    'validation' => 'isBool',
                ),
                array(
					'type' => 'switch',
					'label' => $this->l('Rewind to first after the last slide:'),
					'name' => 'ac_loop',
                    'default_value' => 0,
					'is_bool' => true,
					'values' => array(
						array(
							'id' => 'ac_loop_on',
							'value' => 1,
							'label' => $this->l('Yes')),
						array(
							'id' => 'ac_loop_off',
							'value' => 0,
							'label' => $this->l('No')),
					),
                    'validation' => 'isBool',
				),
                array(
                    'type' => 'switch',
                    'label' => $this->l('Lazy load:'),
                    'name' => 'ac_lazy',
                    'default_value' => 0,
                    'is_bool' => true,
                    'values' => array(
                        array(
                            'id' => 'ac_lazy_on',
                            'value' => 1,
                            'label' => $this->l('Yes')),
                        array(
                            'id' => 'ac_lazy_off',
                            'value' => 0,
                            'label' => $this->l('No')),
                    ),
                    'desc' => $this->l('Delays loading of images. Images outside of viewport won\'t be loaded before user scrolls to them. Great for mobile devices to speed up page loadings.'),
                    'validation' => 'isBool',
                ),
                array(
					'type' => 'radio',
					'label' => $this->l('Move:'),
					'name' => 'ac_move',
                    'default_value' => 0,
					'values' => array(
						array(
							'id' => 'ac_move_on',
							'value' => 1,
							'label' => $this->l('1 item')),
						array(
							'id' => 'ac_move_off',
							'value' => 0,
							'label' => $this->l('All visible items')),
					),
                    'validation' => 'isBool',
				),
            ),
			'submit' => array(
				'title' => $this->l('   Save all   '),
			),
        );
        
        $this->fields_form[14]['form'] = array(
			'input' => array(
                array(
					'type' => 'textarea',
					'label' => $this->l('Custom CSS Code:'),
					'name' => 'custom_css',
					'cols' => 80,
					'rows' => 20,
                    'desc' => $this->l('Override css with your custom code'),
                    'validation' => 'isAnything',
				),
                array(
					'type' => 'textarea',
					'label' => $this->l('Custom JAVASCRIPT Code:'),
					'name' => 'custom_js',
					'cols' => 80,
					'rows' => 20,
                    'desc' => $this->l('Override js with your custom code'),
                    'validation' => 'isAnything',
				),
                array(
					'type' => 'textarea',
					'label' => $this->l('Tracking code:'),
					'name' => 'tracking_code',
					'cols' => 80,
					'rows' => 20,
                    'validation' => 'isAnything',
				),
            ),
			'submit' => array(
				'title' => $this->l('   Save all   '),
			),
        );
        
        $this->fields_form[15]['form'] = array(
            'legend' => array(
                'title' => $this->l('New'),
            ),
			'input' => array(
                array(
					'type' => 'radio',
					'label' => $this->l('Display new stickers:'),
					'name' => 'new_style',
					'values' => array(
						array(
							'id' => 'new_style_flag',
							'value' => 0,
							'label' => $this->l('Rectangle')),
                        array(
                            'id' => 'new_style_circle',
                            'value' => 1,
                            'label' => $this->l('Circle')),
                        array(
                            'id' => 'new_style_none',
                            'value' => 2,
                            'label' => $this->l('NO')),
					),
                    'validation' => 'isUnsignedInt',
				), 
				 array(
					'type' => 'color',
					'label' => $this->l('New stickers color:'),
					'name' => 'new_color',
					'class' => 'color',
					'size' => 20,
                    'validation' => 'isColor',
			     ),
                 array(
                    'type' => 'color',
                    'label' => $this->l('New stickers background color:'),
                    'name' => 'new_bg_color',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                 array(
                    'type' => 'color',
                    'label' => $this->l('New stickers border color:'),
                    'name' => 'new_border_color',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
				'new_bg_image_field' => array(
					'type' => 'file',
					'label' => $this->l('New stickers background image(only for circle stickers):'),
					'name' => 'new_bg_image_field',
                    'desc' => '',
				),
                array(
					'type' => 'text',
					'label' => $this->l('New stickers width:'),
					'name' => 'new_stickers_width',
                    'validation' => 'isUnsignedInt',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
				),
                array(
					'type' => 'text',
					'label' => $this->l('New stickers top postion:'),
					'name' => 'new_stickers_top',
                    'validation' => 'isUnsignedInt',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
				),
                array(
					'type' => 'text',
					'label' => $this->l('New stickers right postion:'),
					'name' => 'new_stickers_right',
                    'validation' => 'isUnsignedInt',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
				),

            ),
			'submit' => array(
				'title' => $this->l('   Save all   '),
			),
        );
        
        $this->fields_form[24]['form'] = array(
            'legend' => array(
                'title' => $this->l('Sale'),
            ),
            'input' => array(
                array(
                    'type' => 'radio',
                    'label' => $this->l('Display sale stickers:'),
                    'name' => 'sale_style',
                    'values' => array(
                        array(
                            'id' => 'sale_style_flag',
                            'value' => 0,
                            'label' => $this->l('Rectangle')),
                        array(
                            'id' => 'sale_style_circle',
                            'value' => 1,
                            'label' => $this->l('Circle')),
                        array(
                            'id' => 'sale_style_none',
                            'value' => 2,
                            'label' => $this->l('NO')),
                    ),
                    'validation' => 'isUnsignedInt',
                ), 
                 array(
                    'type' => 'color',
                    'label' => $this->l('Sale stickers color:'),
                    'name' => 'sale_color',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                 array(
                    'type' => 'color',
                    'label' => $this->l('Sale stickers background color:'),
                    'name' => 'sale_bg_color',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),  
                 array(
                    'type' => 'color',
                    'label' => $this->l('Sale stickers border color:'),
                    'name' => 'sale_border_color',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),   
                'sale_bg_image_field' => array(
                    'type' => 'file',
                    'label' => $this->l('Sale stickers sticker image(only for circle stickers):'),
                    'name' => 'sale_bg_image_field',
                    'desc' => '',
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Sale stickers width:'),
                    'name' => 'sale_stickers_width',
                    'validation' => 'isUnsignedInt',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Sale stickers top postion:'),
                    'name' => 'sale_stickers_top',
                    'validation' => 'isUnsignedInt',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Sale stickers left postion:'),
                    'name' => 'sale_stickers_left',
                    'validation' => 'isUnsignedInt',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                ),
            ),
            'submit' => array(
                'title' => $this->l('   Save all   '),
            ),
        );
        $this->fields_form[25]['form'] = array(
            'legend' => array(
                'title' => $this->l('Price drop'),
            ),
            'input' => array(
                array(
                    'type' => 'radio',
                    'label' => $this->l('Show price drop percentage/amount:'),
                    'name' => 'discount_percentage',
                    'values' => array(
                        array(
                            'id' => 'discount_percentage_off',
                            'value' => 0,
                            'label' => $this->l('No')),
                        array(
                            'id' => 'discount_percentage_text',
                            'value' => 1,
                            'label' => $this->l('Text')),
                        array(
                            'id' => 'discount_percentage_circle',
                            'value' => 2,
                            'label' => $this->l('Circle')),
                        array(
                            'id' => 'discount_percentage_rectangle',
                            'value' => 3,
                            'label' => $this->l('Rectangle')),
                    ),
                    'validation' => 'isUnsignedInt',
                ), 
                 array(
                    'type' => 'color',
                    'label' => $this->l('Price drop stickers text color:'),
                    'name' => 'price_drop_color',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                 array(
                    'type' => 'color',
                    'label' => $this->l('Price drop stickers border color:'),
                    'name' => 'price_drop_border_color',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                 array(
                    'type' => 'color',
                    'label' => $this->l('Price drop stickers background color:'),
                    'name' => 'price_drop_bg_color',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Price drop stickers bottom postion:'),
                    'name' => 'price_drop_bottom',
                    'validation' => 'isUnsignedInt',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Price drop stickers left postion:'),
                    'name' => 'price_drop_right',
                    'validation' => 'isUnsignedInt',
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                ),  
                array(
                    'type' => 'text',
                    'label' => $this->l('Price drop stickers width:'),
                    'name' => 'price_drop_width',
                    'validation' => 'isUnsignedInt',
                    'desc' => $this->l('Number of width must be greater than 28'),
                    'prefix' => 'px',
                    'class' => 'fixed-width-lg',
                ),  
            ),
            'submit' => array(
                'title' => $this->l('   Save all   '),
            ),
        );
        $this->fields_form[26]['form'] = array(
            'legend' => array(
                'title' => $this->l('Sold out'),
            ),
            'input' => array(
                array(
                    'type' => 'radio',
                    'label' => $this->l('Sold out stickers on category page:'),
                    'name' => 'sold_out',
                    'values' => array(
                        array(
                            'id' => 'sold_out_off',
                            'value' => 0,
                            'label' => $this->l('Normal')),
                        array(
                            'id' => 'sold_out_text',
                            'value' => 1,
                            'label' => $this->l('Text')),
                        array(
                            'id' => 'sold_out_sticker',
                            'value' => 2,
                            'label' => $this->l('Image')),
                    ),
                    'validation' => 'isUnsignedInt',
                ), 
                array(
                    'type' => 'color',
                    'label' => $this->l('Sold out stickers text color:'),
                    'name' => 'sold_out_color',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                ),
                array(
                    'type' => 'color',
                    'label' => $this->l('Sold out stickers background color:'),
                    'name' => 'sold_out_bg_color',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                 ),
                'sold_out_bg_image_field' => array(
                    'type' => 'file',
                    'label' => $this->l('Sold out stickers sticker image:'),
                    'name' => 'sold_out_bg_image_field',
                    'desc' => '',
                ),
            ),
            'submit' => array(
                'title' => $this->l('   Save all   '),
            ),
        );
        
        $this->fields_form[16]['form'] = array(
			'input' => array(
                array(
                    'type' => 'switch',
                    'label' => $this->l('Enable big image:'),
                    'name' => 'product_big_image',
                    'is_bool' => true,
                    'values' => array(
                        array(
                            'id' => 'product_big_image_on',
                            'value' => 1,
                            'label' => $this->l('Enable')),
                        array(
                            'id' => 'product_big_image_off',
                            'value' => 0,
                            'label' => $this->l('Disabled')),
                    ),
                    'desc' => $this->l('If you set this option to YES, "Show product secondary column" option will be disabled automatically'),
                    'validation' => 'isBool',
                ), 
                array(
                    'type' => 'radio',
                    'label' => $this->l('Show product secondary column:'),
                    'name' => 'product_secondary',
                    'is_bool' => true,
                    'values' => array(
                        array(
                            'id' => 'product_secondary_off',
                            'value' => 0,
                            'label' => $this->l('No')),
                        array(
                            'id' => 'product_secondary_on',
                            'value' => 1,
                            'label' => $this->l('Yes')),
                        array(
                            'id' => 'product_secondary_hide',
                            'value' => 2,
                            'label' => $this->l('Yes, hide when screen >768px and <992px')),
                    ),
                    'validation' => 'isUnsignedInt',
                ), 
                array(
                    'type' => 'radio',
                    'label' => $this->l('Show brand logo on product page:'),
                    'name' => 'show_brand_logo',
                    'is_bool' => true,
                    'values' => array(
                        array(
                            'id' => 'show_brand_logo_off',
                            'value' => 0,
                            'label' => $this->l('No')),
                        array(
                            'id' => 'show_brand_logo_name',
                            'value' => 2,
                            'label' => $this->l('Display brand name.')),
                        array(
                            'id' => 'show_brand_logo_logo',
                            'value' => 3,
                            'label' => $this->l('Display brand logo.')),
                        array(
                            'id' => 'show_brand_logo_on_secondary_column',
                            'value' => 1,
                            'label' => $this->l('Display brand logo on the product secondary column.')),
                    ),
                    'desc' => $this->l('Brand logo on product secondary column'),
                    'validation' => 'isUnsignedInt',
                ), 
                array(
                    'type' => 'radio',
                    'label' => $this->l('Product tabs:'),
                    'name' => 'product_tabs',
                    'is_bool' => true,
                    'values' => array(
                        array(
                            'id' => 'product_tabs_normal',
                            'value' => 0,
                            'label' => $this->l('Under the product images.')),
                        array(
                            'id' => 'product_tabs_right',
                            'value' => 1,
                            'label' => $this->l('On the right side of the product images.')),
                    ),
                    'validation' => 'isUnsignedInt',
                ), 
                array(
                    'type' => 'switch',
                    'label' => $this->l('Display product condition:'),
                    'name' => 'display_pro_condition',
                    'is_bool' => true,
                    'values' => array(
                        array(
                            'id' => 'display_pro_condition_on',
                            'value' => 1,
                            'label' => $this->l('Enable')),
                        array(
                            'id' => 'display_pro_condition_off',
                            'value' => 0,
                            'label' => $this->l('Disabled')),
                    ),
                    'desc' => $this->l('New, used, refurbished'),
                    'validation' => 'isBool',
                ), 
                array(
                    'type' => 'switch',
                    'label' => $this->l('Display product reference code:'),
                    'name' => 'display_pro_reference',
                    'is_bool' => true,
                    'values' => array(
                        array(
                            'id' => 'display_pro_reference_on',
                            'value' => 1,
                            'label' => $this->l('Enable')),
                        array(
                            'id' => 'display_pro_reference_off',
                            'value' => 0,
                            'label' => $this->l('Disabled')),
                    ),
                    'validation' => 'isBool',
                ), 
                array(
                    'type' => 'radio',
                    'label' => $this->l('Display product tags:'),
                    'name' => 'display_pro_tags',
                    'default_value' => 0,
                    'values' => array(
                        array(
                            'id' => 'display_pro_tags_disable',
                            'value' => 0,
                            'label' => $this->l('No')),
                        array(
                            'id' => 'display_pro_tags_as_a_tab',
                            'value' => 1,
                            'label' => $this->l('Tags tab')),
                        array(
                            'id' => 'display_pro_tags_at_bottom_of_description',
                            'value' => 2,
                            'label' => $this->l('Under the product name.')),
                    ),
                    'validation' => 'isUnsignedInt',
                ),
                array(
                    'type' => 'radio',
                    'label' => $this->l('Zoom:'),
                    'name' => 'enable_zoom',
                    'default_value' => 1,
                    'values' => array(
                        array(
                            'id' => 'enable_zoom_disable',
                            'value' => 0,
                            'label' => $this->l('Disable')),
                        array(
                            'id' => 'enable_zoom_enable',
                            'value' => 1,
                            'label' => $this->l('Enable')),
                        array(
                            'id' => 'disable_zoom_on_mobile',
                            'value' => 2,
                            'label' => $this->l('Disable zoom when screen width less than 768px')),
                    ),
                    'validation' => 'isUnsignedInt',
                ),
                array(
                    'type' => 'switch',
                    'label' => $this->l('Enable Thickbox:'),
                    'name' => 'enable_thickbox',
                    'is_bool' => true,
                    'values' => array(
                        array(
                            'id' => 'enable_thickbox_on',
                            'value' => 1,
                            'label' => $this->l('Enable')),
                        array(
                            'id' => 'enable_thickbox_off',
                            'value' => 0,
                            'label' => $this->l('Disabled')),
                    ),
                    'validation' => 'isBool',
                ), 
                array(
					'type' => 'switch',
					'label' => $this->l('Display tax label:'),
					'name' => 'display_tax_label',
					'is_bool' => true,
					'values' => array(
						array(
							'id' => 'display_tax_label_on',
							'value' => 1,
							'label' => $this->l('Enable')),
						array(
							'id' => 'display_tax_label_off',
							'value' => 0,
							'label' => $this->l('Disabled')),
					),
                    'desc' => array(
                        $this->l('Set number of products in a row for default screen resolution(980px).'),
                        $this->l('On wide screens the number of columns will be automatically increased.'),
                    ),
                    'desc' => $this->l('In order to display the tax incl label, you need to activate taxes (Localization -> taxes -> Enable tax), make sure your country displays the label (Localization -> countries -> select your country -> display tax label) and to make sure the group of the customer is set to display price with taxes (BackOffice -> customers -> groups).'),
                    'validation' => 'isBool',
				), 
                array(
                    'type' => 'radio',
                    'label' => $this->l('"Next" and "prev" buttons for product thumbs:'),
                    'name' => 'thumbs_direction_nav',
                    'default_value' => 3,
                    'values' => array(
                        array(
                            'id' => 'thumbs_direction_nav_square',
                            'value' => 3,
                            'label' => $this->l('Square')),
                        array(
                            'id' => 'thumbs_direction_nav_circle',
                            'value' => 4,
                            'label' => $this->l('Circle')),
                    ),
                    'validation' => 'isUnsignedInt',
                ),
                array(
					'type' => 'radio',
					'label' => $this->l('Google rich snippets:'),
					'name' => 'google_rich_snippets',
                    'default_value' => 1,
					'values' => array(
						array(
							'id' => 'google_rich_snippets_disable',
							'value' => 0,
							'label' => $this->l('Disable')),
						array(
							'id' => 'google_rich_snippets_enable',
							'value' => 1,
							'label' => $this->l('Enable')),
						array(
							'id' => 'google_rich_snippets_except_for_review_aggregate',
							'value' => 2,
							'label' => $this->l('Enable except for Review-aggregate')),
					),
                    'validation' => 'isUnsignedInt',
				),
                'pro_thumnbs_per' => array(
                    'type' => 'html',
                    'id' => 'pro_thumnbs_per',
                    'label'=> $this->l('The number of columns for product thumbs'),
                    'name' => '',
                ),
                'packitems_pro_per' => array(
                    'type' => 'html',
                    'id' => 'packitems_pro_per',
                    'label'=> $this->l('The number of columns for Pack items'),
                    'name' => '',
                ),
			),
			'submit' => array(
				'title' => $this->l('   Save all   '),
			),
		);
        $this->fields_form[35]['form'] = array(
            'legend' => array(
                'title' => $this->l('Tab'),
            ),
            'input' => array(
                array(
                    'type' => 'color',
                    'label' => $this->l('Tab color:'),
                    'name' => 'pro_tab_color',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                ),
                array(
                    'type' => 'color',
                    'label' => $this->l('Active tab color:'),
                    'name' => 'pro_tab_active_color',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                ),
                array(
                    'type' => 'color',
                    'label' => $this->l('Tab background:'),
                    'name' => 'pro_tab_bg',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                ),
                array(
                    'type' => 'color',
                    'label' => $this->l('Tab hover background:'),
                    'name' => 'pro_tab_hover_bg',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                ),
                array(
                    'type' => 'color',
                    'label' => $this->l('Tab active background:'),
                    'name' => 'pro_tab_active_bg',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                ),
                array(
                    'type' => 'color',
                    'label' => $this->l('Tab content background:'),
                    'name' => 'pro_tab_content_bg',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                ),
            ),
            'submit' => array(
                'title' => $this->l('   Save all   '),
            ),
        );
        $this->fields_form[37]['form'] = array(
            'legend' => array(
                'title' => $this->l('Sticky header/menu'),
            ),
            'input' => array(
                array(
                    'type' => 'radio',
                    'label' => $this->l('Sticky:'),
                    'name' => 'sticky_option',
                    'values' => array(
                        array(
                            'id' => 'sticky_option_no',
                            'value' => 0,
                            'label' => $this->l('No')),
                        array(
                            'id' => 'sticky_option_menu',
                            'value' => 1,
                            'label' => $this->l('Sticky menu')),
                        array(
                            'id' => 'sticky_option_menu_animation',
                            'value' => 3,
                            'label' => $this->l('Sticky menu(with animation)')),
                        array(
                            'id' => 'sticky_option_header',
                            'value' => 2,
                            'label' => $this->l('Sticky header')),
                        array(
                            'id' => 'sticky_option_header_animation',
                            'value' => 4,
                            'label' => $this->l('Sticky header(with animation)')),
                    ),
                    'validation' => 'isUnsignedInt',
                ), 
                array(
                    'type' => 'color',
                    'label' => $this->l('Sticky header/menu background:'),
                    'name' => 'sticky_bg',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Sticky header/menu background opacity:'),
                    'name' => 'sticky_opacity',
                    'validation' => 'isFloat',
                    'class' => 'fixed-width-lg',
                    'desc' => $this->l('From 0.0 (fully transparent) to 1.0 (fully opaque).'),
                ),
                array(
                    'type' => 'switch',
                    'label' => $this->l('Transparent header:'),
                    'name' => 'transparent_header',
                    'is_bool' => true,
                    'values' => array(
                        array(
                            'id' => 'transparent_header_on',
                            'value' => 1,
                            'label' => $this->l('Yes')),
                        array(
                            'id' => 'transparent_header_off',
                            'value' => 0,
                            'label' => $this->l('No')),
                    ),
                    'validation' => 'isBool',
                ),  
                array(
                    'type' => 'color',
                    'label' => $this->l('Transparent header background:'),
                    'name' => 'transparent_header_bg',
                    'class' => 'color',
                    'size' => 20,
                    'validation' => 'isColor',
                ),
                array(
                    'type' => 'text',
                    'label' => $this->l('Transparent header background opacity:'),
                    'name' => 'transparent_header_opacity',
                    'validation' => 'isFloat',
                    'class' => 'fixed-width-lg',
                    'desc' => $this->l('From 0.0 (fully transparent) to 1.0 (fully opaque).'),
                ),
            ),
            'submit' => array(
                'title' => $this->l('   Save all   '),
            ),
        );
        
        $inputs = array();
		foreach ($this->getConfigurableModules() as $module)
		{
			$desc = '';
			if (isset($module['is_module']) && $module['is_module'])
			{
				$module_instance = Module::getInstanceByName($module['name']);
				if (Validate::isLoadedObject($module_instance) && method_exists($module_instance, 'getContent'))
					$desc = '<a class="btn btn-default" href="'.$this->context->link->getAdminLink('AdminModules', true).'&configure='.urlencode($module_instance->name).'&tab_module='.$module_instance->tab.'&module_name='.urlencode($module_instance->name).'">'.$this->l('Configure').' <i class="icon-external-link"></i></a>';
			}
			if (isset($module['desc']) && $module['desc'])
				$desc = $desc.'<p class="help-block">'.$module['desc'].'</p>';

			$inputs[] = array(
				'type' => 'switch',
				'label' => $module['label'],
				'name' => $module['name'],
				'desc' => $desc,
				'values' => array(
					array(
						'id' => 'active_on',
						'value' => 1,
						'label' => $this->l('Enabled')
					),
					array(
						'id' => 'active_off',
						'value' => 0,
						'label' => $this->l('Disabled')
					)
				),
			);
		}
        
        $this->fields_form[17]['form'] = array(
            'input' => $inputs,
			'submit' => array(
				'title' => $this->l('   Save all   '),
			),
        );
        
        $this->fields_form[18]['form'] = array(
            'input' => array(
                'icon_iphone_57_field' => array(
					'type' => 'file',
					'label' => $this->l('Iphone/iPad Favicons 57 (PNG):'),
					'name' => 'icon_iphone_57_field',
                    'desc' => '',
				),
				'icon_iphone_72_field' => array(
					'type' => 'file',
					'label' => $this->l('Iphone/iPad Favicons 72 (PNG):'),
					'name' => 'icon_iphone_72_field',
                    'desc' => '',
				),
				'icon_iphone_114_field' => array(
					'type' => 'file',
					'label' => $this->l('Iphone/iPad Favicons 114 (PNG):'),
					'name' => 'icon_iphone_114_field',
                    'desc' => '',
				),
				'icon_iphone_144_field' => array(
					'type' => 'file',
					'label' => $this->l('Iphone/iPad Favicons 144 (PNG):'),
					'name' => 'icon_iphone_144_field',
                    'desc' => '',
				),
            ),
			'submit' => array(
				'title' => $this->l('   Save all   '),
			),
        );
    }
	
    protected function initForm()
	{
        $footer_img = Configuration::get('STSN_FOOTER_IMG');
		if ($footer_img != "") {
		    $this->fields_form[0]['form']['input']['payment_icon']['image'] = $this->getImageHtml(($footer_img!=$this->defaults["footer_img"]['val'] ? _THEME_PROD_PIC_DIR_.$footer_img : $this->_path.$footer_img),'footer_img');
		}
        if (Configuration::get('STSN_RETINA_LOGO') != "") {
            $this->fields_form[4]['form']['input']['retina_logo_image_field']['image'] = $this->getImageHtml($this->_path.Configuration::get('STSN_RETINA_LOGO'),'retina_logo');
        }
		if (Configuration::get('STSN_ICON_IPHONE_57') != "") {
		    $this->fields_form[18]['form']['input']['icon_iphone_57_field']['image'] = $this->getImageHtml($this->_path.Configuration::get('STSN_ICON_IPHONE_57'),'icon_iphone_57');
		}
		if (Configuration::get('STSN_ICON_IPHONE_72') != "") {
		    $this->fields_form[18]['form']['input']['icon_iphone_72_field']['image'] = $this->getImageHtml($this->_path.Configuration::get('STSN_ICON_IPHONE_72'),'icon_iphone_72');
		}
		if (Configuration::get('STSN_ICON_IPHONE_114') != "") {
		    $this->fields_form[18]['form']['input']['icon_iphone_114_field']['image'] = $this->getImageHtml($this->_path.Configuration::get('STSN_ICON_IPHONE_114'),'icon_iphone_114');
		}
		if (Configuration::get('STSN_ICON_IPHONE_144') != "") {
		    $this->fields_form[18]['form']['input']['icon_iphone_144_field']['image'] = $this->getImageHtml($this->_path.Configuration::get('STSN_ICON_IPHONE_144'),'icon_iphone_144');
		}
        
		if (Configuration::get('STSN_HEADER_BG_IMG') != "") {
		    $this->fields_form[4]['form']['input']['header_bg_image_field']['image'] = $this->getImageHtml($this->_path.Configuration::get('STSN_HEADER_BG_IMG'), 'header_bg_img');
		}
		if (Configuration::get('STSN_BODY_BG_IMG') != "") {
		    $this->fields_form[6]['form']['input']['body_bg_image_field']['image'] = $this->getImageHtml($this->_path.Configuration::get('STSN_BODY_BG_IMG'),'body_bg_img');
		}
		if (Configuration::get('STSN_F_TOP_BG_IMG') != "") {
		    $this->fields_form[7]['form']['input']['f_top_bg_image_field']['image'] = $this->getImageHtml($this->_path.Configuration::get('STSN_F_TOP_BG_IMG'),'f_top_bg_img');
		}
		if (Configuration::get('STSN_FOOTER_BG_IMG') != "") {
		    $this->fields_form[8]['form']['input']['footer_bg_image_field']['image'] = $this->getImageHtml($this->_path.Configuration::get('STSN_FOOTER_BG_IMG'),'footer_bg_img');
		}
		if (Configuration::get('STSN_F_SECONDARY_BG_IMG') != "") {
		    $this->fields_form[9]['form']['input']['f_secondary_bg_image_field']['image'] = $this->getImageHtml($this->_path.Configuration::get('STSN_F_SECONDARY_BG_IMG'),'f_secondary_bg_img');
		}
		if (Configuration::get('STSN_F_INFO_BG_IMG') != "") {
		    $this->fields_form[10]['form']['input']['f_info_bg_image_field']['image'] = $this->getImageHtml($this->_path.Configuration::get('STSN_F_INFO_BG_IMG'),'f_info_bg_img');
		}
		if (Configuration::get('STSN_NEW_BG_IMG') != "") {
            $this->fields_form[15]['form']['input']['new_bg_image_field']['image'] = $this->getImageHtml($this->_path.Configuration::get('STSN_NEW_BG_IMG'),'new_bg_img');
        }
        if (Configuration::get('STSN_SALE_BG_IMG') != "") {
            $this->fields_form[24]['form']['input']['sale_bg_image_field']['image'] = $this->getImageHtml($this->_path.Configuration::get('STSN_SALE_BG_IMG'),'sale_bg_img');
        }
        if (Configuration::get('STSN_SOLD_OUT_BG_IMG') != "") {
            $this->fields_form[26]['form']['input']['sold_out_bg_image_field']['image'] = $this->getImageHtml($this->_path.Configuration::get('STSN_SOLD_OUT_BG_IMG'),'sold_out_bg_img');
        }      
        
        foreach (array('font_text'=>3, 'font_heading'=>27, 'font_price'=>28, 'font_menu'=>5, 'font_cart_btn'=>28) as $font=>$wf) {
            if ($font_menu_string = Configuration::get('STSN_'.strtoupper($font))) {
                $font_menu = explode(":", $font_menu_string);
                $font_menu = $font_menu[0];
                $font_menu_key = str_replace(' ', '_', $font_menu);
                if(array_key_exists($font_menu_key, $this->googleFonts))
                {
                    foreach ($this->googleFonts[$font_menu_key]['variants'] as $g) {
                        $this->fields_form[$wf]['form']['input'][$font]['options']['query'][] = array(
                                'id'=> $font_menu.':'.($g=='regular' ? '400' : $g),
                                'name'=> $g,
                            );
                    }
                }
                else
                {
                    $this->fields_form[$wf]['form']['input'][$font]['options']['query'] = array(
                        array('id'=> $font_menu,'name'=>'Normal'),
                        array('id'=> $font_menu.':700','name'=>'Bold'),
                        array('id'=> $font_menu.':italic','name'=>'Italic'),
                        array('id'=> $font_menu.':700italic','name'=>'Bold & Italic'),
                    );
                }
            }    
        }
        

		$helper = new HelperForm();
		$helper->show_toolbar = false;
		$helper->table =  $this->table;
        $helper->module = $this;
		$lang = new Language((int)Configuration::get('PS_LANG_DEFAULT'));
		$helper->default_form_language = $lang->id;
		$helper->allow_employee_form_lang = Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') ? Configuration::get('PS_BO_ALLOW_EMPLOYEE_FORM_LANG') : 0;

		$helper->identifier = $this->identifier;
		$helper->submit_action = 'savestthemeeditor';
		$helper->currentIndex = $this->context->link->getAdminLink('AdminModules', false).'&configure='.$this->name.'&tab_module='.$this->tab.'&module_name='.$this->name;
		$helper->token = Tools::getAdminTokenLite('AdminModules');
		$helper->tpl_vars = array(
			'fields_value' => $this->getConfigFieldsValues(),
			'languages' => $this->context->controller->getLanguages(),
			'id_language' => $this->context->language->id
		); 
        
		return $helper;
	}
    
    public function fontOptions() {
        $system = $google = array();
        foreach($this->systemFonts as $v)
            $system[] = array('id'=>$v,'name'=>$v);
        foreach($this->googleFonts as $v)
            $google[] = array('id'=>$v['family'],'name'=>$v['family']);
        $module = new StThemeEditor();
        return array(
            array('name'=>$module->l('System Web fonts'),'query'=>$system),
            array('name'=>$module->l('Google Web Fonts'),'query'=>$google),
        );
	}
    public function getPatterns()
    {
        $html = '';
        foreach(range(1,26) as $v)
            $html .= '<div class="parttern_wrap" style="background:url('.$this->_path.'patterns/'.$v.'.png);"><span>'.$v.'</span></div>';
        $html .= '<div>'.$this->l('Pattern credits').':<a href="http://subtlepatterns.com" target="_blank">subtlepatterns.com</a></div>';
        return $html;
    }
    public function getPatternsArray()
    {
        $arr = array();
        for($i=1;$i<=26;$i++)
            $arr[] = array('id'=>$i,'name'=>$i); 
        return $arr;   
    }
    public function writeCss()
    {
        $id_shop = (int)Shop::getContextShopID();
        $css = $res_css = '';

        $fontText = $fontHeading = $fontPrice = $fontMenu = $fontCartBtn = '';
        $fontTextWeight = $fontHeadingWeight = $fontPriceWeight = $fontMenuWeight = $fontCartBtnWeight = '';
        $fontTextStyle = $fontHeadingStyle = $fontPriceStyle = $fontMenuStyle = $fontCartBtnStyle = '';

        if($fontTextString = Configuration::get('STSN_FONT_TEXT'))
        {
            preg_match_all('/^([^:]+):?(\d*)([a-z]*)$/', $fontTextString, $fontTextArr);
            $fontText = $fontTextArr[1][0];
            $fontTextArr[2] && $fontTextWeight = 'font-weight:'.$fontTextArr[2][0].';';
            $fontTextArr[3] && $fontTextStyle = 'font-style:'.$fontTextArr[3][0].';';
        }
        if($fontHeadingString = Configuration::get('STSN_FONT_HEADING'))
        {
            preg_match_all('/^([^:]+):?(\d*)([a-z]*)$/', $fontHeadingString, $fontHeadingArr);
            $fontHeading = $fontHeadingArr[1][0];
            $fontHeadingArr[2] && $fontHeadingWeight = 'font-weight:'.$fontHeadingArr[2][0].';';
            $fontHeadingArr[3] && $fontHeadingStyle = 'font-style:'.$fontHeadingArr[3][0].';';
        }
        if($fontPriceString = Configuration::get('STSN_FONT_PRICE'))
        {

            preg_match_all('/^([^:]+):?(\d*)([a-z]*)$/', $fontPriceString, $fontPriceArr);
            $fontPrice = $fontPriceArr[1][0];
            $fontPriceArr[2] && $fontPriceWeight = 'font-weight:'.$fontPriceArr[2][0].';';
            $fontPriceArr[3] && $fontPriceStyle = 'font-style:'.$fontPriceArr[3][0].';';
        }
        if($fontMenuString = Configuration::get('STSN_FONT_MENU'))
        {
            preg_match_all('/^([^:]+):?(\d*)([a-z]*)$/', $fontMenuString, $fontMenuArr);
            $fontMenu = $fontMenuArr[1][0];
            $fontMenuArr[2] && $fontMenuWeight = 'font-weight:'.$fontMenuArr[2][0].';';
            $fontMenuArr[3] && $fontMenuStyle = 'font-style:'.$fontMenuArr[3][0].';';
        }
        if($fontCartBtnString = Configuration::get('STSN_FONT_CART_BTN'))
        {
            preg_match_all('/^([^:]+):?(\d*)([a-z]*)$/', $fontCartBtnString, $fontCartBtnArr);
            $fontCartBtn = $fontCartBtnArr[1][0];
            $fontCartBtnArr[2] && $fontCartBtnWeight = 'font-weight:'.$fontCartBtnArr[2][0].';';
            $fontCartBtnArr[3] && $fontCartBtnStyle = 'font-style:'.$fontCartBtnArr[3][0].';';
        }


        if($fontText)
    	   $css .='body{font-family:'.$fontText.', Tahoma, sans-serif, Arial;'.$fontTextWeight.$fontTextStyle.'}';
        if(Configuration::get('STSN_FONT_BODY_SIZE'))
            $css .='body{font-size: '.Configuration::get('STSN_FONT_BODY_SIZE').'px;}';  

    	if($fontPrice && $fontPrice != $fontText)
        	$css .='.price,#our_price_display,.old_price,.sale_percentage{font-family: "'.$fontPrice.'", Tahoma, sans-serif, Arial;'.$fontPriceWeight.$fontPriceStyle.'}';
        if($fontCartBtn && $fontCartBtn != $fontText)
            $css .='.product_list.list .ajax_add_to_cart_button, .product_list.list .view_button,#buy_block #add_to_cart .btn_primary,#create-account_form .submit .btn_primary, #login_form .submit .btn_primary, .camera_caption_box .btn_primary, .iosSlider_text .btn_primary{font-family: "'.$fontCartBtn.'", Tahoma, sans-serif, Arial;'.$fontCartBtnWeight.$fontCartBtnStyle.'}';
        // $css .= '.btn-default.btn_primary,.btn-small.btn_primary, .btn-medium.btn_primary, .btn-large.btn_primary{text-transform: '.self::$textTransform[(int)Configuration::get('STSN_FONT_HEADING_TRANS')]['name'].';}';
        
        $css_font_heading = $fontHeadingWeight.$fontHeadingStyle.'text-transform: '.self::$textTransform[(int)Configuration::get('STSN_FONT_HEADING_TRANS')]['name'].';'.($fontHeading != $fontText ? 'font-family: "'.$fontHeading.'";' : '');
        
        $css_font_heading_size = '';
        if(Configuration::get('STSN_FONT_HEADING_SIZE'))
            $css_font_heading_size .='font-size: '.Configuration::get('STSN_FONT_HEADING_SIZE').'px;';            
            
        $css_font_menu = $css_font_mobile_menu = 'text-transform: '.self::$textTransform[(int)Configuration::get('STSN_FONT_MENU_TRANS')]['name'].';';
        if($fontMenu && $fontMenu != $fontText)
        {
            $css_font_menu .= 'font-family: "'.$fontMenu.'";'.$fontMenuWeight.$fontMenuStyle;
            $css_font_mobile_menu .= 'font-family: "'.$fontMenu.'";';
            $css .= '.style_wide .ma_level_1{font-family: "'.$fontMenu.'";'.$fontMenuWeight.$fontMenuStyle.'}';
        }
        if(Configuration::get('STSN_FONT_MENU_SIZE'))
            $css_font_menu .='font-size: '.Configuration::get('STSN_FONT_MENU_SIZE').'px;';
        $menu_height = (int)Configuration::get('STSN_ST_MENU_HEIGHT');
        if($menu_height)
        {
            $ma_level_padding = ($menu_height-36)/2;
            if($menu_height>36){
                $css .='#st_mega_menu_wrap .ma_level_0{height: '.$menu_height.'px;padding-top: '.floor($ma_level_padding).'px;padding-bottom: '.ceil($ma_level_padding).'px;}';
                $css .= '#search_block_main_menu #search_block_top{top:'.floor(($menu_height-34)/2).'px;}';
            }
            elseif($menu_height<36){
                $css .='#st_mega_menu_wrap .ma_level_0{height: '.$menu_height.'px;line-height: '.$menu_height.'px;}';
                $css .= '#search_block_main_menu #search_block_top{height:'.($menu_height-2).'px;}';
            }
            $css .='#st_mega_menu_wrap .ma_level_0 .cate_label{top: '.(floor($ma_level_padding)-6).'px;}';
        }
            
        $css .= '.title_block, .title_block a, .title_block span, .idTabs a,.product_accordion_title,.heading,.page-heading,.page-subheading,.pc_slider_tabs a, #home-page-tabs li a, #home-page-tabs li span, .parallax_heading{'.$css_font_heading.$css_font_heading_size.'}';
        $css .= '.st-menu-title{'.$css_font_heading.'}';
        $css .= '.st_mega_menu .ma_level_0, .mobile_bar_tri_text{'.$css_font_menu.'}'; 
        $css .= '#st_mobile_menu .ma_level_0{'.$css_font_mobile_menu.'}'; 
        $css .= '.style_wide .ma_level_1{text-transform: '.self::$textTransform[(int)Configuration::get('STSN_FONT_MENU_TRANS')]['name'].';}'; 
        
        
        if(Configuration::get('STSN_FONT_PRICE_SIZE'))
            $css .='.price_container .price{font-size: '.Configuration::get('STSN_FONT_PRICE_SIZE').'px;}';  
        if(Configuration::get('STSN_FONT_OLD_PRICE_SIZE'))
            $css .='.price_container .old_price{font-size: '.Configuration::get('STSN_FONT_OLD_PRICE_SIZE').'px;}';     
            
        if(Configuration::get('STSN_FOOTER_HEADING_SIZE'))
            $css .='#footer .title_block, #footer .title_block a, #footer .title_block span{font-size: '.Configuration::get('STSN_FOOTER_HEADING_SIZE').'px;}';
            
        if(Configuration::get('STSN_BLOCK_HEADINGS_COLOR'))
            $css .='.title_block, a.title_block, .title_block a, #home-page-tabs li a, #home-page-tabs li span, .heading,.page-heading,.page-subheading, a.heading,a.page-heading,a.page-subheading{color: '.Configuration::get('STSN_BLOCK_HEADINGS_COLOR').';}';
        if(Configuration::get('STSN_COLUMN_BLOCK_HEADINGS_COLOR'))
            $css .='#left_column .title_block,#left_column a.title_block, #left_column .title_block a, #right_column .title_block,#right_column a.title_block, #right_column .title_block a{color: '.Configuration::get('STSN_COLUMN_BLOCK_HEADINGS_COLOR').';}';
        /*
        if(Configuration::get('STSN_HEADINGS_COLOR'))
            $css .='.heading,.page-heading,.page-subheading, a.heading,a.page-heading,a.page-subheading{color: '.Configuration::get('STSN_HEADINGS_COLOR').';}';
        */    
        $heading_bottom_border = (int)Configuration::get('STSN_HEADING_BOTTOM_BORDER');
        $heading_column_bottom_border = (int)Configuration::get('STSN_HEADING_COLUMN_BOTTOM_BORDER');
        $css .= '.title_block,.title_block a, .title_block span{border-bottom-width:'.$heading_bottom_border.'px;}.title_block a, .title_block span{margin-bottom:-'.(8+$heading_bottom_border).'px;}';
        $css .= '.owl-theme.owl-navigation-tr .owl-controls .owl-buttons{top:'.(-54-$heading_bottom_border).'px;}';
        $css .= '#left_column .owl-theme.owl-navigation-tr .owl-controls .owl-buttons, #right_column .owl-theme.owl-navigation-tr .owl-controls .owl-buttons{top:'.(-52-$heading_column_bottom_border).'px;}';
        $css .= '#left_column .title_block,#left_column .title_block a, #left_column .title_block span, #right_column .title_block,#right_column .title_block a, #right_column .title_block span{border-bottom-width:'.$heading_column_bottom_border.'px;}#left_column .title_block a, #left_column .title_block span, #right_column .title_block a, #right_column .title_block span{margin-bottom:-'.(8+$heading_column_bottom_border).'px;}';
        
        if(Configuration::get('STSN_HEADING_BOTTOM_BORDER_COLOR'))
            $css .='.title_block, .page-subheading, a.page-subheading{border-bottom-color: '.Configuration::get('STSN_HEADING_BOTTOM_BORDER_COLOR').';}';  
        if(Configuration::get('STSN_HEADING_BOTTOM_BORDER_COLOR_H'))
            $css .='.title_block a, .title_block span,.pc_slider_tabs.title_block a.selected, .pc_slider_tabs.title_block span.selected, #home-page-tabs.title_block a.selected, #home-page-tabs.title_block span.selected{border-bottom-color: '.Configuration::get('STSN_HEADING_BOTTOM_BORDER_COLOR_H').';}';  
        if(Configuration::get('STSN_HEADING_COLUMN_BG'))
            $css .='#left_column .title_block,#right_column .title_block{background-color: '.Configuration::get('STSN_HEADING_COLUMN_BG').';padding-top:8px;padding-left:6px;}';  


        if(Configuration::get('STSN_F_TOP_H_COLOR'))
            $css .='#footer-primary .block .title_block, #footer-primary .block a.title_block, #footer-primary .block .title_block a{color: '.Configuration::get('STSN_F_TOP_H_COLOR').';}';
        if(Configuration::get('STSN_FOOTER_H_COLOR'))
            $css .='#footer-secondary .block .title_block, #footer-secondary .block a.title_block, #footer-secondary .block .title_block a{color: '.Configuration::get('STSN_FOOTER_H_COLOR').';}';
        if(Configuration::get('STSN_F_SECONDARY_H_COLOR'))
            $css .='#footer-tertiary .block .title_block, #footer-tertiary .block a.title_block, #footer-tertiary .block .title_block a{color: '.Configuration::get('STSN_F_SECONDARY_H_COLOR').';}';
            
        //color
        if(Configuration::get('STSN_TEXT_COLOR'))
            $css .='body{color: '.Configuration::get('STSN_TEXT_COLOR').';}';
        if(Configuration::get('STSN_LINK_COLOR'))
            $css .='a,.show_all_products{color: '.Configuration::get('STSN_LINK_COLOR').';}';
        if(Configuration::get('STSN_S_TITLE_BLOCK_COLOR'))
            $css .='a.s_title_block, .s_title_block  a{color: '.Configuration::get('STSN_S_TITLE_BLOCK_COLOR').';}';

        if($link_hover_color = Configuration::get('STSN_LINK_HOVER_COLOR'))
        {
            $css .='a:active,a:hover,
            #layered_block_left ul li a:hover,
            #product_comments_block_extra a:hover,
            .breadcrumb a:hover,
            a.color_666:hover,
            .pc_slider_tabs a.selected,
            #footer-bottom a:hover,
            .blog_info a:hover,
            a.title_block:hover,
            .title_block a:hover,
            .title_block a.selected,
            .show_all_products,
            .content_sortPagiBar .display li.selected a, .content_sortPagiBar .display_m li.selected a,
            .content_sortPagiBar .display li a:hover, .content_sortPagiBar .display_m li a:hover,
            #home-page-tabs > li.active a, #home-page-tabs li a:hover,
            .fancybox-skin .fancybox-close:hover,
            .dropdown_wrap.open .dropdown_tri,.dropdown_wrap.open .dropdown_tri a,.dropdown_wrap.open .header_item a,
            #st_mega_menu_wrap .ml_level_0.current .ma_level_0, #st_mega_menu_wrap .ma_level_0:hover,
            #st_mega_menu_column_block .ml_level_0.current .ma_level_0, #st_mega_menu_column_block .ma_level_0:hover,
            .mobile_bar_tri:hover,
            #header_primary .top_bar_item:hover .header_item, 
            #header_primary .top_bar_item:hover a.header_item,
            #header_primary .dropdown_wrap.open .dropdown_tri,#header_primary .dropdown_wrap.open .dropdown_tri a,#header_primary .dropdown_wrap.open .header_item a,
            #top_bar .top_bar_item:hover .header_item,#top_bar .top_bar_item:hover a.header_item,
            #top_bar .dropdown_wrap.open .dropdown_tri,#top_bar .dropdown_wrap.open .dropdown_tri a,#top_bar .dropdown_wrap.open .header_item a,
            a.s_title_block:hover, .s_title_block  a:hover,
            #footer-primary a:hover,#footer-secondary a:hover,#footer-tertiay a:hover,
            .product_meta a:hover{color: '.$link_hover_color.';}';
            $css .= '#st_mega_menu_wrap .ml_level_0.current .ma_level_0,#st_mega_menu_wrap .ma_level_0:hover{border-bottom-color:'.$link_hover_color.';}';
        }

        if(Configuration::get('STSN_PRICE_COLOR'))
            $css .='.price, #our_price_display, .sale_percentage{color: '.Configuration::get('STSN_PRICE_COLOR').';}';
        if(Configuration::get('STSN_OLD_PRICE_COLOR'))
            $css .='.old_price,#old_price_display{color: '.Configuration::get('STSN_OLD_PRICE_COLOR').';}';
        if(Configuration::get('STSN_BREADCRUMB_COLOR'))
            $css .='.breadcrumb, .breadcrumb a{color: '.Configuration::get('STSN_BREADCRUMB_COLOR').';}';
        if(Configuration::get('STSN_BREADCRUMB_HOVER_COLOR'))
            $css .='.breadcrumb a:hover{color: '.Configuration::get('STSN_BREADCRUMB_HOVER_COLOR').';}';

        if($breadcrumb_bg_hex = Configuration::get('STSN_BREADCRUMB_BG'))
        {
            if(Configuration::get('STSN_BREADCRUMB_BG_STYLE'))
            {
                $css .='#breadcrumb_wrapper{padding: 1em 0; background: '.$breadcrumb_bg_hex.';}';
            }
            else{
                $breadcrumb_bg = self::hex2rgb($breadcrumb_bg_hex);
                if(is_array($breadcrumb_bg))
                {
                    $breadcrumb_bg_str = implode(',',$breadcrumb_bg);
                    $css .='#breadcrumb_wrapper{
                        padding: 1em 0; 
                        background: '.$breadcrumb_bg_hex.';
                        background: -webkit-linear-gradient(rgba('.$breadcrumb_bg_str.',0) 20%, rgb('.$breadcrumb_bg_str.'));
                        background: -moz-linear-gradient(rgba('.$breadcrumb_bg_str.',0) 20%, rgb('.$breadcrumb_bg_str.'));
                        background: -o-linear-gradient(rgba('.$breadcrumb_bg_str.',0) 20%, rgb('.$breadcrumb_bg_str.'));
                        background: linear-gradient(rgba('.$breadcrumb_bg_str.',0) 20%, rgb('.$breadcrumb_bg_str.'));
                    }';
                }
            }
        }

        
        if(Configuration::get('STSN_ICON_COLOR'))
            $css .='a.icon_wrap, .icon_wrap,#shopping_cart .ajax_cart_right,#rightbar .rightbar_wrap a.icon_wrap, #leftbar .rightbar_wrap a.icon_wrap{color: '.Configuration::get('STSN_ICON_COLOR').';}';
        if(Configuration::get('STSN_ICON_HOVER_COLOR'))
            $css .='a.icon_wrap.active,.icon_wrap.active,a.icon_wrap:hover,.icon_wrap:hover,#searchbox_inner.active #submit_searchbox.icon_wrap,.logo_center #searchbox_inner:hover #submit_searchbox.icon_wrap,#shopping_cart:hover .icon_wrap,#shopping_cart.active .icon_wrap,.myaccount-link-list a:hover .icon_wrap,#rightbar .rightbar_wrap a.icon_wrap:hover, #leftbar .rightbar_wrap a.icon_wrap:hover{color: '.Configuration::get('STSN_ICON_HOVER_COLOR').';}';
        if($icon_bg_color = Configuration::get('STSN_ICON_BG_COLOR'))
            $css .='a.icon_wrap, .icon_wrap,#shopping_cart .ajax_cart_right,#rightbar .rightbar_wrap a.icon_wrap, #leftbar .rightbar_wrap a.icon_wrap{background-color: '.$icon_bg_color.';}';    
        if($icon_hover_bg_color = Configuration::get('STSN_ICON_HOVER_BG_COLOR'))
        {
            $css .='a.icon_wrap.active,.icon_wrap.active,a.icon_wrap:hover,.icon_wrap:hover,#searchbox_inner.active #submit_searchbox.icon_wrap,.logo_center #searchbox_inner:hover #submit_searchbox.icon_wrap,#shopping_cart:hover .icon_wrap,#shopping_cart.active .icon_wrap,.myaccount-link-list a:hover .icon_wrap,#rightbar .rightbar_wrap a.icon_wrap:hover, #leftbar .rightbar_wrap a.icon_wrap:hover{background-color: '.$icon_hover_bg_color.';}';    
            $css .='#submit_searchbox:hover,#searchbox_inner.active #search_query_top,#searchbox_inner.active #submit_searchbox.icon_wrap,.logo_center #searchbox_inner:hover #submit_searchbox.icon_wrap,#shopping_cart.active .icon_wrap,#shopping_cart:hover .icon_wrap{border-color:'.$icon_hover_bg_color.';}';
        }
        if(Configuration::get('STSN_ICON_DISABLED_COLOR'))
            $css .='a.icon_wrap.disabled,.icon_wrap.disabled,#rightbar .rightbar_wrap a.icon_wrap.disabled, #leftbar .rightbar_wrap a.icon_wrap.disabled{color: '.Configuration::get('STSN_ICON_DISABLED_COLOR').';}';
        if(Configuration::get('STSN_RIGHT_PANEL_BORDER'))
            $css .='#rightbar{border: 1px solid '.Configuration::get('STSN_RIGHT_PANEL_BORDER').';}';
        if(Configuration::get('STSN_STARTS_COLOR'))
            $css .='div.star.star_on:after,div.star.star_hover:after,.rating_box i.light{color: '.Configuration::get('STSN_STARTS_COLOR').';}';
        if(Configuration::get('STSN_CIRCLE_NUMBER_COLOR'))
            $css .='.amount_circle{color: '.Configuration::get('STSN_CIRCLE_NUMBER_COLOR').';}';
        if(Configuration::get('STSN_CIRCLE_NUMBER_BG'))
            $css .='.amount_circle{background-color: '.Configuration::get('STSN_CIRCLE_NUMBER_BG').';}';
            
        if(Configuration::get('STSN_CART_ICON_BORDER_COLOR'))
            $css .='.header_item .ajax_cart_bag, .header_item .ajax_cart_bag .ajax_cart_bg_handle{border-color: '.Configuration::get('STSN_CART_ICON_BORDER_COLOR').';}';
        if(Configuration::get('STSN_CART_ICON_BG_COLOR'))
            $css .='.header_item .ajax_cart_bag{background-color: '.Configuration::get('STSN_CART_ICON_BG_COLOR').';}';
        if(Configuration::get('STSN_CART_NUMBER_COLOR'))
            $css .='.header_item .ajax_cart_bag .amount_circle{color: '.Configuration::get('STSN_CART_NUMBER_COLOR').';}';
        if(Configuration::get('STSN_CART_NUMBER_BG_COLOR'))
            $css .='.header_item .ajax_cart_bag .amount_circle{background-color: '.Configuration::get('STSN_CART_NUMBER_BG_COLOR').';}';
        if(Configuration::get('STSN_CART_NUMBER_BORDER_COLOR'))
            $css .='.header_item .ajax_cart_bag .amount_circle{border-color: '.Configuration::get('STSN_CART_NUMBER_BORDER_COLOR').';}';

        if($percent_of_screen = Configuration::get('STSN_POSITION_RIGHT_PANEL'))
        {
            $percent_of_screen_arr = explode('_',$percent_of_screen);
            $css .='#rightbar{top:'.($percent_of_screen_arr[0]==2 ? $percent_of_screen_arr[1].'%' : 'auto').'; bottom:'.($percent_of_screen_arr[0]==1 ? $percent_of_screen_arr[1].'%' : 'auto').';}';
        }
        //button  
        $button_css = $button_hover_css = $primary_button_css = $primary_button_hover_css = '';   
        if(Configuration::get('STSN_BTN_COLOR'))   
            $button_css .='color: '.Configuration::get('STSN_BTN_COLOR').';';
        if(Configuration::get('STSN_BTN_HOVER_COLOR'))   
            $button_hover_css .='color: '.Configuration::get('STSN_BTN_HOVER_COLOR').';';
        if(Configuration::get('STSN_BTN_BG_COLOR'))   
            $button_css .='background-color: '.Configuration::get('STSN_BTN_BG_COLOR').';';
        if(Configuration::get('STSN_BTN_BORDER_COLOR'))   
            $button_css .='border-color:'.Configuration::get('STSN_BTN_BORDER_COLOR').';';

        $btn_hover_bg_color = Configuration::get('STSN_BTN_HOVER_BG_COLOR');
        if(!$btn_hover_bg_color)
            $btn_hover_bg_color = '#444444';   
        
        $button_hover_css .='border-color:'.$btn_hover_bg_color.';';

        $btn_fill_animation = (int)Configuration::get('STSN_BTN_FILL_ANIMATION');
        $btn_white_hover = '';
        switch ($btn_fill_animation) {
            case 1:
                $button_hover_css .= '-webkit-box-shadow: inset 0 100px 0 0 '.$btn_hover_bg_color.'; box-shadow: inset 0 100px 0 0 '.$btn_hover_bg_color.';background-color:transparent;';
                $btn_white_hover .= '-webkit-box-shadow: inset 0 100px 0 0 #ffffff; box-shadow: inset 0 100px 0 0 #ffffff;background-color:transparent;';
                break;
            case 2:
                $button_hover_css .= '-webkit-box-shadow: inset 0 -100px 0 0 '.$btn_hover_bg_color.'; box-shadow: inset 0 -100px 0 0 '.$btn_hover_bg_color.';background-color:transparent;';
                $btn_white_hover .= '-webkit-box-shadow: inset 0 -100px 0 0 #ffffff; box-shadow: inset 0 -100px 0 0 #ffffff;background-color:transparent;';
                break;
            case 3:
                $button_hover_css .= '-webkit-box-shadow: inset 300px 0 0 0 '.$btn_hover_bg_color.'; box-shadow: inset 300px 0 0 0 '.$btn_hover_bg_color.';background-color:transparent;';
                $btn_white_hover .= '-webkit-box-shadow: inset 300px 0 0 0 #ffffff; box-shadow: inset 300px 0 0 0 #ffffff;background-color:transparent;';
                break;
            case 4:
                $button_hover_css .= '-webkit-box-shadow: inset -300px 0 0 0 '.$btn_hover_bg_color.'; box-shadow: inset -300px 0 0 0 '.$btn_hover_bg_color.';background-color:transparent;';
                $btn_white_hover .= '-webkit-box-shadow: inset -300px 0 0 0 #ffffff; box-shadow: inset -300px 0 0 0 #ffffff;background-color:transparent;';
                break;
            default:
                $button_hover_css .= '-webkit-box-shadow: none; box-shadow: none;background-color: '.$btn_hover_bg_color.';';
                $btn_white_hover .= '-webkit-box-shadow: none; box-shadow: none;background-color: #ffffff;color:#444444;';
                break;
        }
        
        /*
        if(Configuration::get('STSN_P_BTN_COLOR'))   
        {
            $primary_button_css .='color: '.Configuration::get('STSN_P_BTN_COLOR').';';
            $css .= '.hover_fly a,.hover_fly a:hover,.hover_fly a:first-child,.hover_fly a:first-child:hover{color:'.Configuration::get('STSN_P_BTN_COLOR').'!important;}';
        }
        if(Configuration::get('STSN_P_BTN_HOVER_COLOR'))   
            $primary_button_hover_css .='color: '.Configuration::get('STSN_P_BTN_HOVER_COLOR').';';
        if(Configuration::get('STSN_P_BTN_BG_COLOR'))   
        {
            $primary_button_css .='background-color: '.Configuration::get('STSN_P_BTN_BG_COLOR').';border-color:'.Configuration::get('STSN_P_BTN_BG_COLOR').';';
            $css .= '.hover_fly a:first-child{background-color: '.Configuration::get('STSN_P_BTN_BG_COLOR').';}.itemlist_action a{background-color: '.Configuration::get('STSN_P_BTN_BG_COLOR').';}.hover_fly a:hover{background-color: '.Configuration::get('STSN_P_BTN_BG_COLOR').'!important;}.itemlist_action a:hover{background-color: '.Configuration::get('STSN_P_BTN_BG_COLOR').';}';
        }
        if(Configuration::get('STSN_P_BTN_HOVER_BG_COLOR'))
            $primary_button_hover_css .='background-color: '.Configuration::get('STSN_P_BTN_HOVER_BG_COLOR').';border-color:'.Configuration::get('STSN_P_BTN_HOVER_BG_COLOR').';';
        */
        if($button_css)
            $css .= '.btn-default,.btn-small, .btn-medium, .btn-large,
                a.btn-default,a.btn-small, a.btn-medium, a.btn-large,
                input.button_mini,
                input.button_small,
                input.button,
                input.button_large,
                input.button_mini_disabled,
                input.button_small_disabled,
                input.button_disabled,
                input.button_large_disabled,
                input.exclusive_mini,
                input.exclusive_small,
                input.exclusive,
                input.exclusive_large,
                input.exclusive_mini_disabled,
                input.exclusive_small_disabled,
                input.exclusive_disabled,
                input.exclusive_large_disabled,
                a.button_mini,
                a.button_small,
                a.button,
                a.button_large,
                a.exclusive_mini,
                a.exclusive_small,
                a.exclusive,
                a.exclusive_large,
                span.button_mini,
                span.button_small,
                span.button,
                span.button_large,
                span.exclusive_mini,
                span.exclusive_small,
                span.exclusive,
                span.exclusive_large,
                span.exclusive_large_disabled{'.$button_css.'}';
        if($button_hover_css)
            $css .= '.btn-default:hover, .btn-default.active, 
                .btn-small:hover, .btn-small.active, 
                .btn-medium:hover, .btn-medium.active, 
                .btn-large:hover, .btn-large.active,
                a.btn-default:hover, a.btn-default.active, 
                a.btn-small:hover, a.btn-small.active, 
                a.btn-medium:hover, a.btn-medium.active, 
                a.btn-large:hover, a.btn-large.active,
                input.button_mini:hover,
                input.button_small:hover,
                input.button:hover,
                input.button_large:hover,
                input.exclusive_mini:hover,
                input.exclusive_small:hover,
                input.exclusive:hover,
                input.exclusive_large:hover,
                a.button_mini:hover,
                a.button_small:hover,
                a.button:hover,
                a.button_large:hover,
                a.exclusive_mini:hover,
                a.exclusive_small:hover,
                a.exclusive:hover,
                a.exclusive_large:hover,
                input.button_mini:active,
                input.button_small:active,
                input.button:active,
                input.button_large:active,
                input.exclusive_mini:active,
                input.exclusive_small:active,
                input.exclusive:active,
                input.exclusive_large:active,
                a.button_mini:active,
                a.button_small:active,
                a.button:active,
                a.button_large:active,
                a.exclusive_mini:active,
                a.exclusive_small:active,
                a.exclusive:active,
                a.exclusive_large:active{'.$button_hover_css.'}';

        $css .= '.btn-default.btn-white:hover, .btn-small.btn-white:hover, .btn-medium.btn-white:hover, .btn-large.btn-white:hover,
        a.btn-default.btn-white:hover, a.btn-small.btn-white:hover, a.btn-medium.btn-white:hover, a.btn-large.btn-white:hover,
        .easy_content a.btn-default.btn-white:hover, .easy_content a.btn-small.btn-white:hover, .easy_content a.btn-medium.btn-white:hover, .easy_content a.btn-large.btn-white:hover
        {border-color:#ffffff;'.$btn_white_hover.'}';
        
        /*
        if($primary_button_css)
            $css .= '.product_list.list .button.ajax_add_to_cart_button, .btn-default.btn_primary, .btn-medium.btn_primary, .btn-large.btn_primary {'.$primary_button_css.'}';
        
        if($primary_button_hover_css)
            $css .= '.product_list.list .button.ajax_add_to_cart_button:hover, .itemlist_action a.exclusive:hover,
                .btn-default.btn_primary:hover, .btn-default.btn_primary.active, 
                .btn-medium.btn_primary:hover, .btn-medium.btn_primary.active, 
                .btn-large.btn_primary:hover, .btn-large.btn_primary.active{'.$primary_button_hover_css.'}';
        */   
        if(Configuration::get('STSN_FLYOUT_BUTTONS_COLOR'))   
            $css .='.hover_fly a,.hover_fly:hover a:first-child{color: '.Configuration::get('STSN_FLYOUT_BUTTONS_COLOR').';}';
        if(Configuration::get('STSN_FLYOUT_BUTTONS_HOVER_COLOR'))   
        {
            $css .='.hover_fly a:first-child{color: '.Configuration::get('STSN_FLYOUT_BUTTONS_HOVER_COLOR').';}';
            $css .='.hover_fly a:hover{color: '.Configuration::get('STSN_FLYOUT_BUTTONS_HOVER_COLOR').'!important;}';
        }
        if(Configuration::get('STSN_FLYOUT_BUTTONS_BG'))   
            $css .='.hover_fly, .hover_fly a,.hover_fly:hover a:first-child{background-color: '.Configuration::get('STSN_FLYOUT_BUTTONS_BG').';}';
        if(Configuration::get('STSN_FLYOUT_BUTTONS_HOVER_BG'))   
        {
            $css .='.hover_fly a:first-child{background-color: '.Configuration::get('STSN_FLYOUT_BUTTONS_HOVER_BG').';}';
            $css .='.hover_fly a:hover{background-color: '.Configuration::get('STSN_FLYOUT_BUTTONS_HOVER_BG').'!important;}';
        }
        
        //header
        if($header_text_color = Configuration::get('STSN_HEADER_TEXT_COLOR'))
        {
            $css .= '#header_primary .header_item, #header_primary a.header_item, #header_primary .header_item a, #header_primary #search_block_top.quick_search_simple .button-search, a.mobile_bar_tri {color:'.Configuration::get('STSN_HEADER_TEXT_COLOR').';}';
            $css .= 'a.mobile_bar_tri .ajax_cart_bag, a.mobile_bar_tri .ajax_cart_bag .ajax_cart_bg_handle, a.mobile_bar_tri .ajax_cart_bag .amount_circle{border-color:'.$header_text_color.';}a.mobile_bar_tri .ajax_cart_bag .amount_circle{color:#ffffff;}';
        }
        
        if(Configuration::get('STSN_TOPBAR_TEXT_COLOR'))
            $css .='#top_bar .header_item, #top_bar a.header_item, #top_bar .header_item a{color:'.Configuration::get('STSN_TOPBAR_TEXT_COLOR').';}';

        if(Configuration::get('STSN_HEADER_TEXT_TRANS'))
            $css .='#header .header_item{text-transform: '.self::$textTransform[(int)Configuration::get('STSN_HEADER_TEXT_TRANS')]['name'].';}';
        if($header_link_hover_color = Configuration::get('STSN_HEADER_LINK_HOVER_COLOR'))
            $css .='#header_primary .top_bar_item:hover .header_item,#header_primary .top_bar_item:hover a.header_item,#header_primary .dropdown_wrap.open .dropdown_tri,#header_primary .dropdown_wrap.open a.header_item, a.mobile_bar_tri:hover{color:'.$header_link_hover_color.';}';
        if($topbar_link_hover_color = Configuration::get('STSN_TOPBAR_LINK_HOVER_COLOR'))
            $css .='#top_bar .top_bar_item:hover .header_item,#top_bar .top_bar_item:hover a.header_item,#top_bar .dropdown_wrap.open .dropdown_tri,#top_bar .dropdown_wrap.open a.header_item,#top_bar .dropdown_wrap.open .header_item a{color:'.$topbar_link_hover_color.';}';
        if(Configuration::get('STSN_HEADER_LINK_HOVER_BG'))
            $css .='#top_bar .top_bar_item:hover .header_item,#top_bar .top_bar_item:hover a.header_item, #top_bar .dropdown_wrap.open .dropdown_tri, #top_bar .dropdown_wrap.open a.header_item{background-color:'.Configuration::get('STSN_HEADER_LINK_HOVER_BG').';}';
        if(Configuration::get('STSN_DROPDOWN_HOVER_COLOR'))
            $css .='#header .dropdown_list li a:hover{color:'.Configuration::get('STSN_DROPDOWN_HOVER_COLOR').';}';   
        if(Configuration::get('STSN_DROPDOWN_BG_COLOR'))
            $css .='#header .dropdown_list li a:hover{background-color:'.Configuration::get('STSN_DROPDOWN_BG_COLOR').';}'; 
        if(Configuration::get('STSN_HEADER_TOPBAR_BG'))
            $css .='#top_bar{background-color:'.Configuration::get('STSN_HEADER_TOPBAR_BG').';}'; 
        if(Configuration::get('STSN_TOPBAR_B_BORDER_COLOR'))
            $css .='#header #top_bar{border-bottom-color:'.Configuration::get('STSN_TOPBAR_B_BORDER_COLOR').';}'; 
        if(Configuration::get('STSN_HEADER_TOPBAR_SEP'))
            $css .='.nav.vertical-s .top_bar_item:before,.nav.horizontal-s .top_bar_item:before,.nav.space-s .top_bar_item:before,.nav.horizontal-s-fullheight .top_bar_item:before{background-color:'.Configuration::get('STSN_HEADER_TOPBAR_SEP').';}'; 
        if($topbar_height = (int)Configuration::get('STSN_TOPBAR_HEIGHT'))
        {
            $css .='.nav .header_item{height:'.$topbar_height.'px;line-height:'.$topbar_height.'px;}.nav.horizontal-s-fullheight:before{height:'.$topbar_height.'px;}'; 
            $css .= '.nav.vertical-s .top_bar_item:before{margin-top:'.( $topbar_height/2-4 ).'px;}';
            $css .= '.nav.horizontal-s .top_bar_item:before{margin-top:'.( $topbar_height/2-1 ).'px;}';
            $css .= '#header #top_bar .cart_block{top:'.$topbar_height.'px;}';
        }
                    
        //menu
        if(Configuration::get('STSN_MENU_COLOR'))
            $css .='#st_mega_menu_wrap .ma_level_0{color:'.Configuration::get('STSN_MENU_COLOR').';}#search_block_main_menu #search_block_top.quick_search_simple .button-search{color:'.Configuration::get('STSN_MENU_COLOR').';}'; 
        if($menu_hover_color = Configuration::get('STSN_MENU_HOVER_COLOR'))
            $css .='#st_mega_menu_wrap .ml_level_0.current .ma_level_0,#st_mega_menu_wrap .ma_level_0:hover{color:'.$menu_hover_color.';border-bottom-color:'.$menu_hover_color.';}'; 
        if(Configuration::get('STSN_MENU_HOVER_BG'))
            $css .='#st_mega_menu_wrap .ml_level_0.current .ma_level_0{background-color:'.Configuration::get('STSN_MENU_HOVER_BG').';}'; 
        
        $sticky_opacity = (float)Configuration::get('STSN_STICKY_OPACITY');
        if($sticky_opacity<0 || $sticky_opacity>1)
            $sticky_opacity = 0.95;
        if($menu_bg_color = Configuration::get('STSN_MENU_BG_COLOR'))
        {
            if(Configuration::get('STSN_MEGAMENU_WIDTH'))
            {
                $css .='#st_mega_menu_container{background-color:'.$menu_bg_color.';}'; 
            }
            else
                $css .='#st_mega_menu_wrap .st_mega_menu{background-color:'.$menu_bg_color.';}'; 
           
            $megamenu_bg = self::hex2rgb($menu_bg_color );
            if(is_array($megamenu_bg))
                $css .='#st_mega_menu_container.sticky{background: '.$menu_bg_color .';background:rgba('.$megamenu_bg[0].','.$megamenu_bg[1].','.$megamenu_bg[2].','.$sticky_opacity.');}';
        }

        $menu_bottom_border = (int)Configuration::get('STSN_MENU_BOTTOM_BORDER');
        $css .='#st_mega_menu_wrap .stmenu_sub{border-top-width:'.$menu_bottom_border.'px;}#st_mega_menu_wrap .ma_level_0{margin-bottom:-'.$menu_bottom_border.'px;border-bottom-width:'.$menu_bottom_border.'px;}'; 
        if(Configuration::get('STSN_MEGAMENU_WIDTH'))
            $css .='#st_mega_menu_container{border-bottom-width:'.$menu_bottom_border.'px;}'; 
        else
            $css .='.boxed_megamenu #st_mega_menu_wrap{border-bottom-width:'.$menu_bottom_border.'px;}'; 

        if($menu_bottom_border_color = Configuration::get('STSN_MENU_BOTTOM_BORDER_COLOR'))
            $css .='#st_mega_menu_wrap .stmenu_sub{border-top-color:'.$menu_bottom_border_color.';}#st_mega_menu_container, .boxed_megamenu #st_mega_menu_wrap{border-bottom-color:'.$menu_bottom_border_color.';}'; 
        
        if($menu_bottom_border_hover_color = Configuration::get('STSN_MENU_BOTTOM_BORDER_HOVER_COLOR'))
            $css .='#st_mega_menu_wrap .ml_level_0.current .ma_level_0,#st_mega_menu_wrap .ma_level_0:hover{border-bottom-color:'.$menu_bottom_border_hover_color.';}'; 
        
        if(Configuration::get('STSN_SECOND_MENU_COLOR'))
            $css .='.ma_level_1{color:'.Configuration::get('STSN_SECOND_MENU_COLOR').';}'; 
        if(Configuration::get('STSN_SECOND_MENU_HOVER_COLOR'))
            $css .='.ma_level_1:hover{color:'.Configuration::get('STSN_SECOND_MENU_HOVER_COLOR').';}'; 
        if(Configuration::get('STSN_THIRD_MENU_COLOR'))
            $css .='.ma_level_2{color:'.Configuration::get('STSN_THIRD_MENU_COLOR').';}'; 
        if(Configuration::get('STSN_THIRD_MENU_HOVER_COLOR'))
            $css .='.ma_level_2:hover{color:'.Configuration::get('STSN_THIRD_MENU_HOVER_COLOR').';}'; 
        if(Configuration::get('STSN_MENU_MOB_COLOR'))
            $css .='#mobile_bar_menu_tri{color:'.Configuration::get('STSN_MENU_MOB_COLOR').';}'; 
        if(Configuration::get('STSN_MENU_MOB_HOVER_COLOR'))
            $css .='#mobile_bar_menu_tri:hover,#mobile_bar_menu_tri.active{color:'.Configuration::get('STSN_MENU_MOB_HOVER_COLOR').';}'; 
        if(Configuration::get('STSN_MENU_MOB_BG'))
            $css .='#mobile_bar_menu_tri{background-color:'.Configuration::get('STSN_MENU_MOB_BG').';}'; 
        if(Configuration::get('STSN_MENU_MOB_HOVER_BG'))
            $css .='#mobile_bar_menu_tri:hover,#mobile_bar_menu_tri.active{background-color:'.Configuration::get('STSN_MENU_MOB_HOVER_BG').';}';
        if(Configuration::get('STSN_MENU_MOB_ITEMS1_COLOR'))
            $css .='#st_mobile_menu .mo_ma_level_0,#st_mobile_menu a.mo_ma_level_0{color:'.Configuration::get('STSN_MENU_MOB_ITEMS1_COLOR').';}';
        if(Configuration::get('STSN_MENU_MOB_ITEMS2_COLOR'))
            $css .='#st_mobile_menu .mo_ma_level_1,#st_mobile_menu a.mo_ma_level_1{color:'.Configuration::get('STSN_MENU_MOB_ITEMS2_COLOR').';}';
        if(Configuration::get('STSN_MENU_MOB_ITEMS3_COLOR'))
            $css .='#st_mobile_menu .mo_ma_level_2,#st_mobile_menu a.mo_ma_level_2{color:'.Configuration::get('STSN_MENU_MOB_ITEMS3_COLOR').';}';
        if(Configuration::get('STSN_MENU_MOB_ITEMS1_BG'))
            $css .='#st_mobile_menu .mo_ml_level_0{background-color:'.Configuration::get('STSN_MENU_MOB_ITEMS1_BG').';}';
        if(Configuration::get('STSN_MENU_MOB_ITEMS2_BG'))
            $css .='#st_mobile_menu .mo_mu_level_1 > li{background-color:'.Configuration::get('STSN_MENU_MOB_ITEMS2_BG').';}';
        if(Configuration::get('STSN_MENU_MOB_ITEMS3_BG'))
            $css .='#st_mobile_menu .mo_mu_level_2 > li{background-color:'.Configuration::get('STSN_MENU_MOB_ITEMS3_BG').';}';

        //Side menu
        if(Configuration::get('STSN_C_MENU_COLOR'))
            $css .='#st_mega_menu_column_block .ma_level_0{color:'.Configuration::get('STSN_C_MENU_COLOR').';}'; 
        if($menu_hover_color = Configuration::get('STSN_C_MENU_HOVER_COLOR'))
            $css .='#st_mega_menu_column_block .ml_level_0.current .ma_level_0,#st_mega_menu_column_block .ma_level_0:hover{color:'.$menu_hover_color.';}'; 
        if(Configuration::get('STSN_C_MENU_HOVER_BG'))
            $css .='#st_mega_menu_column_block .ml_level_0.current .ma_level_0{background-color:'.Configuration::get('STSN_C_MENU_HOVER_BG').';}'; 
        if(Configuration::get('STSN_C_MENU_BG_COLOR'))
                $css .='#st_mega_menu_column_block{background-color:'.Configuration::get('STSN_C_MENU_BG_COLOR').';}'; 

        if($c_menu_border_color = Configuration::get('STSN_C_MENU_BORDER_COLOR'))
            $css .='#st_mega_menu_column_block .ma_level_0{border-left-color:'.$c_menu_border_color.';}'; 
        
        if(Configuration::get('STSN_C_MENU_BORDER_HOVER_COLOR'))
            $css .='#st_mega_menu_column_block .ml_level_0.current .ma_level_0,#st_mega_menu_column_block .ma_level_0:hover{border-left-color:'.Configuration::get('STSN_C_MENU_BORDER_HOVER_COLOR').';}'; 
        
        //footer
        if($footer_border = Configuration::get('STSN_FOOTER_BORDER'))
            $css .='#footer-secondary '.($footer_border>20 ? '.wide_container' : '').'{border-top-width:'.($footer_border%10).'px;border-top-style: solid;}';
        if(Configuration::get('STSN_FOOTER_BORDER_COLOR'))
            $css .='#footer-secondary{border-top-color:'.Configuration::get('STSN_FOOTER_BORDER_COLOR').';}';

        if(Configuration::get('STSN_FOOTER_PRIMARY_COLOR')) 
            $css .='#footer-primary, #footer-primary a, #footer-primary .price, #footer-primary .old_price{color:'.Configuration::get('STSN_FOOTER_PRIMARY_COLOR').';}'; 
        if(Configuration::get('STSN_FOOTER_COLOR')) 
            $css .='#footer-secondary, #footer-secondary a, #footer-secondary .price, #footer-secondary .old_price {color:'.Configuration::get('STSN_FOOTER_COLOR').';}'; 
        if(Configuration::get('STSN_FOOTER_TERTIARY_COLOR')) 
            $css .='#footer-tertiary, #footer-tertiary a, #footer-tertiary .price, #footer-tertiary .old_price{color:'.Configuration::get('STSN_FOOTER_TERTIARY_COLOR').';}'; 
        if(Configuration::get('STSN_FOOTER_LINK_PRIMARY_COLOR')) 
            $css .='#footer-primary a{color:'.Configuration::get('STSN_FOOTER_LINK_PRIMARY_COLOR').';}'; 
        if(Configuration::get('STSN_FOOTER_LINK_COLOR')) 
            $css .='#footer-secondary a{color:'.Configuration::get('STSN_FOOTER_LINK_COLOR').';}'; 
        if(Configuration::get('STSN_FOOTER_LINK_TERTIARY_COLOR')) 
            $css .='#footer-tertiary a{color:'.Configuration::get('STSN_FOOTER_LINK_TERTIARY_COLOR').';}'; 
        if(Configuration::get('STSN_FOOTER_LINK_PRIMARY_HOVER_COLOR')) 
            $css .='#footer-primary a:hover{color:'.Configuration::get('STSN_FOOTER_LINK_PRIMARY_HOVER_COLOR').';}';  
        if(Configuration::get('STSN_FOOTER_LINK_HOVER_COLOR')) 
            $css .='#footer-secondary a:hover{color:'.Configuration::get('STSN_FOOTER_LINK_HOVER_COLOR').';}';  
        if(Configuration::get('STSN_FOOTER_LINK_TERTIARY_HOVER_COLOR')) 
            $css .='#footer-tertiary a:hover{color:'.Configuration::get('STSN_FOOTER_LINK_TERTIARY_HOVER_COLOR').';}';  

        if(Configuration::get('STSN_SECOND_FOOTER_COLOR')) 
            $css .='#footer-bottom,#footer-bottom a{color:'.Configuration::get('STSN_SECOND_FOOTER_COLOR').';}'; 
        if(Configuration::get('STSN_SECOND_FOOTER_LINK_COLOR')) 
            $css .='#footer-bottom a{color:'.Configuration::get('STSN_SECOND_FOOTER_LINK_COLOR').';}';     
        if(Configuration::get('STSN_SECOND_FOOTER_LINK_HOVER_COLOR')) 
            $css .='#footer-bottom a:hover{color:'.Configuration::get('STSN_SECOND_FOOTER_LINK_HOVER_COLOR').';}';   
        
        
        if ($body_bg_color = Configuration::get('STSN_BODY_BG_COLOR'))
            $css .= '#body_wrapper,body.content_only{background-color:'.$body_bg_color.';}';
        if ($body_con_bg_color = Configuration::get('STSN_BODY_CON_BG_COLOR'))
			$css .= '#page_wrapper{background-color:'.$body_con_bg_color.';}';
        if($body_con_bg_color || $body_bg_color)
            $res_css .= '@media (max-width: 767px) {#left_column,#right_column{background-color:'.($body_con_bg_color ? $body_con_bg_color : $body_bg_color).';}}';
        
        /*if (Configuration::get('STSN_MAIN_CON_BG_COLOR'))
            $css .= '.columns-container{background-color:'.Configuration::get('STSN_MAIN_CON_BG_COLOR').';}';*/
        if (Configuration::get('STSN_BODY_BG_PATTERN') && (Configuration::get('STSN_BODY_BG_IMG')==""))
			$css .= '#body_wrapper{background-image: url(../../patterns/'.Configuration::get('STSN_BODY_BG_PATTERN').'.png);}';
        if (Configuration::get('STSN_BODY_BG_IMG'))
			$css .= '#body_wrapper{background-image:url(../../'.Configuration::get('STSN_BODY_BG_IMG').');}';
		if (Configuration::get('STSN_BODY_BG_REPEAT')) {
			switch(Configuration::get('STSN_BODY_BG_REPEAT')) {
				case 1 :
					$repeat_option = 'repeat-x';
					break;
				case 2 :
					$repeat_option = 'repeat-y';
					break;
				case 3 :
					$repeat_option = 'no-repeat';
					break;
				default :
					$repeat_option = 'repeat';
			}
			$css .= '#body_wrapper{background-repeat:'.$repeat_option.';}';
		}
		if (Configuration::get('STSN_BODY_BG_POSITION')) {
			switch(Configuration::get('STSN_BODY_BG_POSITION')) {
				case 1 :
					$position_option = 'center top';
					break;
				case 2 :
					$position_option = 'right top';
					break;
				default :
					$position_option = 'left top';
			}
			$css .= '#body_wrapper{background-position: '.$position_option.';}';
		}
        if (Configuration::get('STSN_BODY_BG_FIXED')) {
            $css .= '#body_wrapper{background-attachment: fixed;}';
        }
		if (Configuration::get('STSN_BODY_BG_COVER')) {
			$css .= '#body_wrapper{background-size: cover;}';
		}
        $header_bg_color = Configuration::get('STSN_HEADER_BG_COLOR');
        if ($header_bg_color)
		{
            $header_bg_color_hex = self::hex2rgb($header_bg_color);
            $css .= '.header-container #header{background-color:'.$header_bg_color.';}';
            $css .='#header #header_primary.sticky{background: '.$header_bg_color .';background:rgba('.$header_bg_color_hex[0].','.$header_bg_color_hex[1].','.$header_bg_color_hex[2].','.$sticky_opacity.');}';     
            $css .= 'body#index.mobile_device .header-container.transparent-header #header{background-color:'.$header_bg_color.';}';
        }

        if(Configuration::get('STSN_TRANSPARENT_HEADER'))
        {
            if($transparent_header_bg = Configuration::get('STSN_TRANSPARENT_HEADER_BG'))
            {
                $transparent_header_opacity = (float)Configuration::get('STSN_TRANSPARENT_HEADER_OPACITY');
                if($transparent_header_opacity<0 || $transparent_header_opacity>1)
                    $transparent_header_opacity = 0.4;

                $transparent_header_bg_hex = self::hex2rgb($transparent_header_bg);
                $css .= 'body#index .header-container.transparent-header #header{background:rgba('.$transparent_header_bg_hex[0].','.$transparent_header_bg_hex[1].','.$transparent_header_bg_hex[2].','.$transparent_header_opacity.');}';      
                $css .= 'body#index.mobile_device .header-container.transparent-header #header{background-color:'.$transparent_header_bg.';}';
            }
            else
                $css .= 'body#index .header-container.transparent-header #header{background:transparent;}';
        }

        if($sticky_bg = Configuration::get('STSN_STICKY_BG'))
        {
            $sticky_bg_arr = self::hex2rgb($sticky_bg );
            if(is_array($sticky_bg_arr))
                $css .='#st_mega_menu_container.sticky, #header #header_primary.sticky{background: '.$sticky_bg .';background:rgba('.$sticky_bg_arr[0].','.$sticky_bg_arr[1].','.$sticky_bg_arr[2].','.$sticky_opacity.');}';
        }


        if (Configuration::get('STSN_HEADER_CON_BG_COLOR'))
			$css .= '#header .wide_container,#top_extra .wide_container{background-color:'.Configuration::get('STSN_HEADER_CON_BG_COLOR').';}';
        if (Configuration::get('STSN_HEADER_BG_PATTERN') && (Configuration::get('STSN_HEADER_BG_IMG')==""))
			$css .= '.header-container #header{background-image: url(../../patterns/'.Configuration::get('STSN_HEADER_BG_PATTERN').'.png);}';
        if (Configuration::get('STSN_HEADER_BG_IMG'))
			$css .= '.header-container #header{background-image:url(../../'.Configuration::get('STSN_HEADER_BG_IMG').');}';
		if (Configuration::get('STSN_HEADER_BG_REPEAT')) {
			switch(Configuration::get('STSN_HEADER_BG_REPEAT')) {
				case 1 :
					$repeat_option = 'repeat-x';
					break;
				case 2 :
					$repeat_option = 'repeat-y';
					break;
				case 3 :
					$repeat_option = 'no-repeat';
					break;
				default :
					$repeat_option = 'repeat';
			}
			$css .= '.header-container #header{background-repeat:'.$repeat_option.';}';
		}
		if (Configuration::get('STSN_HEADER_BG_POSITION')) {
			switch(Configuration::get('STSN_HEADER_BG_POSITION')) {
				case 1 :
					$position_option = 'center top';
					break;
				case 2 :
					$position_option = 'right top';
					break;
				default :
					$position_option = 'left top';
			}
			$css .= '.header-container #header{background-position: '.$position_option.';}';
		}

        if (Configuration::get('STSN_F_TOP_BG_PATTERN') && (Configuration::get('STSN_F_TOP_BG_IMG')==""))
			$css .= '#footer-primary{background-image: url(../../patterns/'.Configuration::get('STSN_F_TOP_BG_PATTERN').'.png);}';
        if (Configuration::get('STSN_F_TOP_BG_IMG'))
			$css .= '#footer-primary{background-image:url(../../'.Configuration::get('STSN_F_TOP_BG_IMG').');}';
		if (Configuration::get('STSN_FOOTER_BG_REPEAT')) {
			switch(Configuration::get('STSN_FOOTER_BG_REPEAT')) {
				case 1 :
					$repeat_option = 'repeat-x';
					break;
				case 2 :
					$repeat_option = 'repeat-y';
					break;
				case 3 :
					$repeat_option = 'no-repeat';
					break;
				default :
					$repeat_option = 'repeat';
			}
			$css .= '#footer-primary{background-repeat:'.$repeat_option.';}';
		}
		if (Configuration::get('STSN_F_TOP_BG_PATTERN')) {
			switch(Configuration::get('STSN_F_TOP_BG_PATTERN')) {
				case 1 :
					$position_option = 'center top';
					break;
				case 2 :
					$position_option = 'right top';
					break;
				default :
					$position_option = 'left top';
			}
			$css .= '#footer-primary{background-position: '.$position_option.';}';
		}
        if($footer_top_border = Configuration::get('STSN_FOOTER_TOP_BORDER'))
            $css .='#footer-primary '.($footer_top_border>20 ? '.wide_container' : '').'{border-top-width:'.($footer_top_border%10).'px;border-top-style: solid;}';
        if (Configuration::get('STSN_FOOTER_TOP_BORDER_COLOR'))
			$css .= '#footer-primary{border-top-color:'.Configuration::get('STSN_FOOTER_TOP_BORDER_COLOR').';}';
        if (Configuration::get('STSN_FOOTER_TOP_BG'))
			$css .= '#footer-primary{background-color:'.Configuration::get('STSN_FOOTER_TOP_BG').';}';
        if (Configuration::get('STSN_FOOTER_TOP_CON_BG'))
			$css .= '#footer-primary .wide_container{background-color:'.Configuration::get('STSN_FOOTER_TOP_CON_BG').';}';
            
        if (Configuration::get('STSN_FOOTER_BG_PATTERN') && (Configuration::get('STSN_FOOTER_BG_IMG')==""))
			$css .= '#footer-secondary{background-image: url(../../patterns/'.Configuration::get('STSN_FOOTER_BG_PATTERN').'.png);}';
        if (Configuration::get('STSN_FOOTER_BG_IMG'))
			$css .= '#footer-secondary{background-image:url(../../'.Configuration::get('STSN_FOOTER_BG_IMG').');}';
		if (Configuration::get('STSN_FOOTER_BG_REPEAT')) {
			switch(Configuration::get('STSN_FOOTER_BG_REPEAT')) {
				case 1 :
					$repeat_option = 'repeat-x';
					break;
				case 2 :
					$repeat_option = 'repeat-y';
					break;
				case 3 :
					$repeat_option = 'no-repeat';
					break;
				default :
					$repeat_option = 'repeat';
			}
			$css .= '#footer-secondary{background-repeat:'.$repeat_option.';}';
		}
		if (Configuration::get('STSN_FOOTER_BG_POSITION')) {
			switch(Configuration::get('STSN_FOOTER_BG_POSITION')) {
				case 1 :
					$position_option = 'center top';
					break;
				case 2 :
					$position_option = 'right top';
					break;
				default :
					$position_option = 'left top';
			}
			$css .= '#footer-secondary{background-position: '.$position_option.';}';
		}
        if (Configuration::get('STSN_FOOTER_BG_COLOR'))
			$css .= '#footer-secondary{background-color:'.Configuration::get('STSN_FOOTER_BG_COLOR').';}';
        if (Configuration::get('STSN_FOOTER_CON_BG_COLOR'))
			$css .= '#footer-secondary .wide_container{background-color:'.Configuration::get('STSN_FOOTER_CON_BG_COLOR').';}';
            
        if (Configuration::get('STSN_F_SECONDARY_BG_PATTERN') && (Configuration::get('STSN_F_SECONDARY_BG_IMG')==""))
			$css .= '#footer-tertiary{background-image: url(../../patterns/'.Configuration::get('STSN_F_SECONDARY_BG_PATTERN').'.png);}';
        if (Configuration::get('STSN_F_SECONDARY_BG_IMG'))
			$css .= '#footer-tertiary{background-image:url(../../'.Configuration::get('STSN_F_SECONDARY_BG_IMG').');}';
		if (Configuration::get('STSN_F_SECONDARY_BG_REPEAT')) {
			switch(Configuration::get('STSN_F_SECONDARY_BG_REPEAT')) {
				case 1 :
					$repeat_option = 'repeat-x';
					break;
				case 2 :
					$repeat_option = 'repeat-y';
					break;
				case 3 :
					$repeat_option = 'no-repeat';
					break;
				default :
					$repeat_option = 'repeat';
			}
			$css .= '#footer-tertiary{background-repeat:'.$repeat_option.';}';
		}
		if (Configuration::get('STSN_F_SECONDARY_BG_POSITION')) {
			switch(Configuration::get('STSN_F_SECONDARY_BG_POSITION')) {
				case 1 :
					$position_option = 'center top';
					break;
				case 2 :
					$position_option = 'right top';
					break;
				default :
					$position_option = 'left top';
			}
			$css .= '#footer-tertiary{background-position: '.$position_option.';}';
		}
        if($footer_tertiary_border = Configuration::get('STSN_FOOTER_TERTIARY_BORDER'))
            $css .='#footer-tertiary '.($footer_tertiary_border>20 ? '.wide_container' : '').'{border-top-width:'.($footer_tertiary_border%10).'px;border-top-style: solid;}';
        if (Configuration::get('STSN_FOOTER_TERTIARY_BORDER_COLOR'))
            $css .= '#footer-tertiary{border-top-color:'.Configuration::get('STSN_FOOTER_TERTIARY_BORDER_COLOR').';}';
        if (Configuration::get('STSN_FOOTER_SECONDARY_BG'))
			$css .= '#footer-tertiary{background-color:'.Configuration::get('STSN_FOOTER_SECONDARY_BG').';}';
        if (Configuration::get('STSN_FOOTER_SECONDARY_CON_BG'))
			$css .= '#footer-tertiary .wide_container{background-color:'.Configuration::get('STSN_FOOTER_SECONDARY_CON_BG').';}';
            
                        
        if (Configuration::get('STSN_F_INFO_BG_PATTERN') && (Configuration::get('STSN_F_INFO_BG_IMG')==""))
			$css .= '#footer-bottom{background-image: url(../../patterns/'.Configuration::get('STSN_F_INFO_BG_PATTERN').'.png);}';
        if (Configuration::get('STSN_F_INFO_BG_IMG'))
			$css .= '#footer-bottom{background-image:url(../../'.Configuration::get('STSN_F_INFO_BG_IMG').');}';
		if (Configuration::get('STSN_F_INFO_BG_REPEAT')) {
			switch(Configuration::get('STSN_F_INFO_BG_REPEAT')) {
				case 1 :
					$repeat_option = 'repeat-x';
					break;
				case 2 :
					$repeat_option = 'repeat-y';
					break;
				case 3 :
					$repeat_option = 'no-repeat';
					break;
				default :
					$repeat_option = 'repeat';
			}
			$css .= '#footer-bottom{background-repeat:'.$repeat_option.';}';
		}
		if (Configuration::get('STSN_F_INFO_BG_POSITION')) {
			switch(Configuration::get('STSN_F_INFO_BG_POSITION')) {
				case 1 :
					$position_option = 'center top';
					break;
				case 2 :
					$position_option = 'right top';
					break;
				default :
					$position_option = 'left top';
			}
			$css .= '#footer-bottom{background-position: '.$position_option.';}';
		}
        if($footer_info_border = Configuration::get('STSN_FOOTER_INFO_BORDER'))
            $css .='#footer-bottom '.($footer_info_border>20 ? '.wide_container' : '').'{border-top-width:'.($footer_info_border%10).'px;border-top-style: solid;}';
        if (Configuration::get('STSN_FOOTER_INFO_BORDER_COLOR'))
            $css .= '#footer-bottom{border-top-color:'.Configuration::get('STSN_FOOTER_INFO_BORDER_COLOR').';}';
        if (Configuration::get('STSN_FOOTER_INFO_BG'))
            $css .= '#footer-bottom{background-color:'.Configuration::get('STSN_FOOTER_INFO_BG').';}';
        if (Configuration::get('STSN_FOOTER_INFO_CON_BG'))
			$css .= '#footer-bottom .wide_container{background-color:'.Configuration::get('STSN_FOOTER_INFO_CON_BG').';}';
        
        if(!Configuration::get('STSN_RESPONSIVE'))
        {
            $responsive_max = Configuration::get('STSN_RESPONSIVE_MAX');
            if($responsive_max==2)
                $css .= 'body{min-width:1440px;}';
            elseif($responsive_max==1)
                $css .= 'body{min-width:1200px;}';
            else
                $css .= 'body{min-width:992px;}';
        }
        
        $new_border_color = Configuration::get('STSN_NEW_BORDER_COLOR');
        if($new_border_color)
            $css .= 'span.new{border: 2px solid '.$new_border_color.';}';
        if(Configuration::get('STSN_NEW_COLOR'))
            $css .='span.new i{color: '.Configuration::get('STSN_NEW_COLOR').';}';
        $new_style = (int)Configuration::get('STSN_NEW_STYLE');
		if($new_style==1)
        {
            $css .= 'span.new{width:40px;height:40px;line-height:'.($new_border_color ? 36 : 40).'px;top:0;}span.new i{position:static;left:auto;}';
            if(!Configuration::get('STSN_NEW_BG_IMG'))
                $css .= 'span.new{-webkit-border-radius: 500px;-moz-border-radius: 500px;border-radius: 500px;}';
        } 
        elseif($new_border_color)
        {
            $css .= 'span.new{line-height:16px;}';
        }                 
        $new_bg_color = Configuration::get('STSN_NEW_BG_COLOR');
        if($new_bg_color)
            $css .= 'span.new{background-color:'.$new_bg_color.';}';

        if($new_stickers_width = (int)Configuration::get('STSN_NEW_STICKERS_WIDTH'))
        {
            if($new_style==1)
                $css .= 'span.new{width:'.$new_stickers_width.'px;height:'.$new_stickers_width.'px;line-height:'.($new_border_color ? ($new_stickers_width-4) : $new_stickers_width).'px;}';
            else
                $css .= 'span.new{width:'.$new_stickers_width.'px;}';
        }

		if(Configuration::get('STSN_NEW_STICKERS_TOP')!==false)
			$css .= 'span.new{top:'.(int)Configuration::get('STSN_NEW_STICKERS_TOP').'px;}';
		if(Configuration::get('STSN_NEW_STICKERS_RIGHT')!==false)
			$css .= 'span.new{right:'.(int)Configuration::get('STSN_NEW_STICKERS_RIGHT').'px;}.is_rtl span.new{right: auto;left: '.(int)Configuration::get('STSN_NEW_STICKERS_RIGHT').'px;}';
		if($new_style==1 && Configuration::get('STSN_NEW_BG_IMG'))
			$css .= 'span.new{background:url(../../'.Configuration::get('STSN_NEW_BG_IMG').') no-repeat center center transparent;}span.new i{display:none;}';
            
        $sale_border_color = Configuration::get('STSN_SALE_BORDER_COLOR');
        if($sale_border_color)
            $css .= 'span.on_sale{border: 2px solid '.$sale_border_color.';}';
        if(Configuration::get('STSN_SALE_COLOR'))
            $css .='span.on_sale i{color: '.Configuration::get('STSN_SALE_COLOR').';}';
        $sale_style = (int)Configuration::get('STSN_SALE_STYLE');
        if($sale_style==1)  
        {
            $css .= 'span.on_sale{width:40px;height:40px;line-height:'.($sale_border_color ? 36 : 40).'px;top:0;}span.on_sale i{position:static;left:auto;}';
            if(!Configuration::get('STSN_SALE_BG_IMG'))
                $css .= 'span.on_sale{-webkit-border-radius: 500px;-moz-border-radius: 500px;border-radius: 500px;}';
        } 
        elseif($sale_border_color)
        {
            $css .= 'span.on_sale{line-height:16px;}';
        }      
        $sale_bg_color = Configuration::get('STSN_SALE_BG_COLOR');
        if($sale_bg_color)
            $css .= 'span.on_sale{background-color:'.$sale_bg_color.';}';

		if($sale_stickers_width = (int)Configuration::get('STSN_SALE_STICKERS_WIDTH'))
        {
            if($sale_style==1)
                $css .= 'span.on_sale{width:'.$sale_stickers_width.'px;height:'.$sale_stickers_width.'px;line-height:'.($sale_border_color ? ($sale_stickers_width-4) : $sale_stickers_width).'px;}';
            else
    			$css .= 'span.on_sale{width:'.$sale_stickers_width.'px;}';
        }
		if(Configuration::get('STSN_SALE_STICKERS_TOP')!==false)
			$css .= 'span.on_sale{top:'.(int)Configuration::get('STSN_SALE_STICKERS_TOP').'px;}';
		if(Configuration::get('STSN_SALE_STICKERS_LEFT')!==false)
			$css .= 'span.on_sale{left:'.(int)Configuration::get('STSN_SALE_STICKERS_LEFT').'px;}.is_rtl span.on_sale{left: auto;right: '.(int)Configuration::get('STSN_SALE_STICKERS_LEFT').'px;}';
		if($sale_style==1 && Configuration::get('STSN_SALE_BG_IMG'))
			$css .= 'span.on_sale{background:url(../../'.Configuration::get('STSN_SALE_BG_IMG').') no-repeat center center transparent;}span.on_sale i{display:none;}';
             
        if(Configuration::get('STSN_PRICE_DROP_COLOR'))
    	    $css .= 'span.sale_percentage_sticker,.sale_percentage{color: '.Configuration::get('STSN_PRICE_DROP_COLOR').';}';
        if(Configuration::get('STSN_PRICE_DROP_BORDER_COLOR'))
    	    $css .= 'span.sale_percentage_sticker,.sale_percentage{border-color: '.Configuration::get('STSN_PRICE_DROP_BORDER_COLOR').';}';
        if(Configuration::get('STSN_PRICE_DROP_BG_COLOR'))
    	    $css .= 'span.sale_percentage_sticker,.sale_percentage{background-color: '.Configuration::get('STSN_PRICE_DROP_BG_COLOR').';}';
        if(Configuration::get('STSN_PRICE_DROP_BOTTOM')!==false)
    	    $css .= 'span.sale_percentage_sticker{bottom: '.(int)Configuration::get('STSN_PRICE_DROP_BOTTOM').'px;}';
        if(Configuration::get('STSN_PRICE_DROP_RIGHT')!==false)
    	    $css .= 'span.sale_percentage_sticker{left: '.(int)Configuration::get('STSN_PRICE_DROP_RIGHT').'px;}';
        if(Configuration::get('STSN_DISCOUNT_PERCENTAGE')==2)
        {
            $css .= 'span.sale_percentage_sticker{border-width:2px;padding: 6px 0; height: 48px; line-height: 14px; width: 48px;border-radius: 50%;}';
            $price_drop_width = (int)Configuration::get('STSN_PRICE_DROP_WIDTH');
            if($price_drop_width>28)
            {
                $price_drop_padding = round(($price_drop_width-28-4)/2,3);
                $css .= 'span.sale_percentage_sticker{width: '.$price_drop_width.'px;height: '.$price_drop_width.'px;padding:'.$price_drop_padding.'px 0;}';
            }
        }



        $css .= 'span.sold_out{font-family: "'.$fontHeading.'";}';
        if(Configuration::get('STSN_SOLD_OUT_COLOR'))
            $css .= 'span.sold_out{color: '.Configuration::get('STSN_SOLD_OUT_COLOR').';}';
        if(Configuration::get('STSN_SOLD_OUT_BG_COLOR'))
            $css .= 'span.sold_out{background-color: '.Configuration::get('STSN_SOLD_OUT_BG_COLOR').';}';
        if(Configuration::get('STSN_SOLD_OUT')==2 && Configuration::get('STSN_SOLD_OUT_BG_IMG'))
            $css .= 'span.sold_out{background:url(../../'.Configuration::get('STSN_SOLD_OUT_BG_IMG').') no-repeat center center transparent;top:0;padding:0;margin:0;height:100%;border:none;text-indent:-10000px;overflow:hidden;}';
             
        $logo_height = (int)Configuration::get('STSN_LOGO_HEIGHT');
        if($logo_height)
    	    $css .= 'header #header_primary_row{height: '.$logo_height.'px;}'; 

        if(!Configuration::get('STSN_TRANSPARENT_HEADER'))
        {
            $sticky_option = (int)Configuration::get('STSN_STICKY_OPTION');
            if($sticky_option==1 || $sticky_option==3)
                $css .= '.header-container.has_sticky{padding-bottom:'.($menu_height ? $menu_height : 36).'px;}';
            elseif($sticky_option==2 || $sticky_option==4)
                $css .= '.header-container.has_sticky{padding-bottom:'.($logo_height ? $logo_height : 110).'px;}';
        }
        
        if($megamenu_position = Configuration::get('STSN_MEGAMENU_POSITION'))
        {
    	    $css .= '#top_extra #st_mega_menu_wrap .st_mega_menu{text-align: '.($megamenu_position==1 ? 'center' : 'right').';}#top_extra #st_mega_menu_wrap .ml_level_0{float:none;display:inline-block;vertical-align:middle;}';   
            if($megamenu_position==2)
                $css .= '#header_bottom #st_mega_menu_container, #header_bottom #st_mega_menu_container.sticky #st_mega_menu_wrap{float:right;}';
        }
            
        if(Configuration::get('STSN_CART_ICON'))
            $css .= '.icon-glyph.icon_btn:before,.box-info-product .exclusive:before{ content: "\\'.dechex(Configuration::get('STSN_CART_ICON')).'"; }';
        if(Configuration::get('STSN_WISHLIST_ICON'))
            $css .= '.icon-heart-empty-1.icon_btn:before{ content: "\\'.dechex(Configuration::get('STSN_WISHLIST_ICON')).'"; }';
        if(Configuration::get('STSN_COMPARE_ICON'))
            $css .= '.icon-adjust.icon_btn:before{ content: "\\'.dechex(Configuration::get('STSN_COMPARE_ICON')).'"; }';
        if(Configuration::get('STSN_QUICK_VIEW_ICON'))
            $css .= '.icon-search-1.icon_btn:before{ content: "\\'.dechex(Configuration::get('STSN_QUICK_VIEW_ICON')).'"; }';
        if(Configuration::get('STSN_VIEW_ICON'))
            $css .= '.icon-eye-2.icon_btn:before{ content: "\\'.dechex(Configuration::get('STSN_VIEW_ICON')).'"; }';
            
        if(Configuration::get('STSN_PRO_TAB_COLOR'))  
            $css .= '#more_info_tabs a,#more_info_tabs a:hover{ color: '.Configuration::get('STSN_PRO_TAB_COLOR').'; }';
        if(Configuration::get('STSN_PRO_TAB_ACTIVE_COLOR'))  
            $css .= '#more_info_tabs a.selected,#more_info_tabs a:hover{ color: '.Configuration::get('STSN_PRO_TAB_ACTIVE_COLOR').'; }';
        if(Configuration::get('STSN_PRO_TAB_BG'))  
            $css .= '#more_info_tabs a{ background-color: '.Configuration::get('STSN_PRO_TAB_BG').'; }';
        if(Configuration::get('STSN_PRO_TAB_HOVER_BG'))  
            $css .= '#more_info_tabs a:hover{ background-color: '.Configuration::get('STSN_PRO_TAB_HOVER_BG').'; }';
        if(Configuration::get('STSN_PRO_TAB_ACTIVE_BG'))  
            $css .= '#more_info_tabs a.selected{ background-color: '.Configuration::get('STSN_PRO_TAB_ACTIVE_BG').'; }';
        if(Configuration::get('STSN_PRO_TAB_CONTENT_BG'))  
            $css .= '#more_info_sheets{ background-color: '.Configuration::get('STSN_PRO_TAB_CONTENT_BG').'; }';
        
        if(Configuration::get('STSN_BIG_NEXT_COLOR'))  
            $css .= '#big_page_next a{ color: '.Configuration::get('STSN_BIG_NEXT_COLOR').'; }';
        if(Configuration::get('STSN_BIG_NEXT_HOVER_COLOR'))  
            $css .= '#big_page_next a:hover{ color: '.Configuration::get('STSN_BIG_NEXT_HOVER_COLOR').'; }';
        if(Configuration::get('STSN_BIG_NEXT_BG'))  
            $css .= '#big_page_next a .text_table_wrap{ background-color: '.Configuration::get('STSN_BIG_NEXT_BG').'; }';
        if(Configuration::get('STSN_BIG_NEXT_HOVER_BG'))  
            $css .= '#big_page_next a:hover .text_table_wrap{ background-color: '.Configuration::get('STSN_BIG_NEXT_HOVER_BG').'; }';
        
        //Top and bottom spacing
        if(Configuration::get('STSN_TOP_SPACING'))  
        {
            $css .= '#body_wrapper{ padding-top: '.Configuration::get('STSN_TOP_SPACING').'px; }';
            $res_css .= '@media (max-width: 767px) {#body_wrapper{ padding-top: 0; }}';
        }
        $header_bottom_spacing = Configuration::get('STSN_HEADER_BOTTOM_SPACING');
            $css .= '.header-container { margin-bottom: '.$header_bottom_spacing.'px; }';
        if(Configuration::get('STSN_BOTTOM_SPACING'))  
        {
            $css .= '#body_wrapper{ padding-bottom: '.Configuration::get('STSN_BOTTOM_SPACING').'px; }';
            $res_css .= '@media (max-width: 767px) {#body_wrapper{ padding-bottom: 0; }}';
        }
        if($block_spacing = Configuration::get('STSN_BLOCK_SPACING'))  
            $css .= '.block, #breadcrumb_wrapper{ margin-bottom: '.$block_spacing.'px; }#footer, .columns-container{margin-top:'.$block_spacing.'px;}';
        //
        if($base_border_color = Configuration::get('STSN_BASE_BORDER_COLOR'))
        {
            $css .= '.pro_column_box, 
                    .box,
                    .categories_tree_block li,
                    .content_sortPagiBar .sortPagiBar,
                    ul.product_list.grid > li,ul.product_list.list > li,
                    .bottom-pagination-content,
                    .pb-center-column #buy_block .box-info-product,
                    .product_extra_info_wrap,
                    .box-cart-bottom .qt_cart_box,
                    .pro_column_list li, .pro_column_box,
                    #blog_list_large .block_blog, #blog_list_medium .block_blog,
                    #product_comments_block_tab div.comment,
                    .table-bordered > thead > tr > th, .table-bordered > thead > tr > td, .table-bordered > tbody > tr > th, .table-bordered > tbody > tr > td, .table-bordered > tfoot > tr > th, .table-bordered > tfoot > tr > td,
                    #create-account_form section, #login_form section,
                    ul.footer_links,
                    #product p#loyalty{ border-color: '.$base_border_color.'; }';
            $res_css .= '@media (max-width: 767px) {#footer .title_block,#footer .open .footer_block_content{ border-color: '.$base_border_color.'; }}';
        }  
        if($form_bg_color = Configuration::get('STSN_FORM_BG_COLOR'))
            $css .= '.box{background-color:'.$form_bg_color.';}';

        if(Configuration::get('STSN_PRO_GRID_HOVER_BG'))  
            $css .= '.products_slider .ajax_block_product:hover .pro_second_box,.product_list.grid .ajax_block_product:hover .pro_second_box{ background-color: '.Configuration::get('STSN_PRO_GRID_HOVER_BG').'; }';

        if(Configuration::get('STSN_PS_TR_PREV_NEXT_COLOR'))  
            $css .= '.products_slider .owl-theme.owl-navigation-tr .owl-controls .owl-buttons div{ color: '.Configuration::get('STSN_PS_TR_PREV_NEXT_COLOR').'; }';
        if(Configuration::get('STSN_PS_TR_PREV_NEXT_COLOR_DISABLED'))  
            $css .= '.products_slider .owl-theme.owl-navigation-tr .owl-controls .owl-buttons div.disabled,.products_slider .owl-theme.owl-navigation-tr .owl-controls .owl-buttons div.disabled:hover{ color: '.Configuration::get('STSN_PS_TR_PREV_NEXT_COLOR_DISABLED').'; }';
        if(Configuration::get('STSN_PS_TR_PREV_NEXT_COLOR_HOVER'))  
            $css .= '.products_slider .owl-theme.owl-navigation-tr .owl-controls .owl-buttons div:hover{ color: '.Configuration::get('STSN_PS_TR_PREV_NEXT_COLOR_HOVER').'; }';

        if(Configuration::get('STSN_PS_TR_PREV_NEXT_BG'))  
            $css .= '.products_slider .owl-theme.owl-navigation-tr .owl-controls .owl-buttons div{ background-color: '.Configuration::get('STSN_PS_TR_PREV_NEXT_BG').'; }';
        
        $css .= '.products_slider .owl-theme.owl-navigation-tr .owl-controls .owl-buttons div.disabled,.products_slider .owl-theme.owl-navigation-tr .owl-controls .owl-buttons div.disabled:hover{ background-color: '.(Configuration::get('STSN_PS_TR_PREV_NEXT_BG_DISABLED') ? Configuration::get('STSN_PS_TR_PREV_NEXT_BG_DISABLED') : 'transparent').'; }';

        if(Configuration::get('STSN_PS_TR_PREV_NEXT_BG_HOVER'))  
            $css .= '.products_slider .owl-theme.owl-navigation-tr .owl-controls .owl-buttons div:hover{ background-color: '.Configuration::get('STSN_PS_TR_PREV_NEXT_BG_HOVER').'; }';

        if(Configuration::get('STSN_PS_LR_PREV_NEXT_COLOR'))  
            $css .= '.products_slider .owl-theme.owl-navigation-lr .owl-controls .owl-buttons div{ color: '.Configuration::get('STSN_PS_LR_PREV_NEXT_COLOR').'; }';
        if(Configuration::get('STSN_PS_LR_PREV_NEXT_COLOR_DISABLED'))  
            $css .= '.products_slider .owl-theme.owl-navigation-lr .owl-controls .owl-buttons div.disabled,.products_slider .owl-theme.owl-navigation-lr .owl-controls .owl-buttons div.disabled:hover{ color: '.Configuration::get('STSN_PS_LR_PREV_NEXT_COLOR_DISABLED').'; }';
        if(Configuration::get('STSN_PS_LR_PREV_NEXT_COLOR_HOVER'))  
            $css .= '.products_slider .owl-theme.owl-navigation-lr .owl-controls .owl-buttons div:hover{ color: '.Configuration::get('STSN_PS_LR_PREV_NEXT_COLOR_HOVER').'; }';

        if($ps_lr_prev_next_bg = Configuration::get('STSN_PS_LR_PREV_NEXT_BG')) 
            $css .= '.products_slider .owl-theme.owl-navigation-lr .owl-controls .owl-buttons div{ background-color: '.$ps_lr_prev_next_bg.'; }';
        if($ps_lr_prev_next_bg_hover = Configuration::get('STSN_PS_LR_PREV_NEXT_BG_HOVER')) 
            $css .= '.products_slider .owl-theme.owl-navigation-lr .owl-controls .owl-buttons div:hover{ background-color: '.$ps_lr_prev_next_bg_hover.'; }';
        if($ps_lr_prev_next_bg_disabled = Configuration::get('STSN_PS_LR_PREV_NEXT_BG_DISABLED'))
            $css .= '.products_slider .owl-theme.owl-navigation-lr .owl-controls .owl-buttons div.disabled,.products_slider .owl-theme.owl-navigation-lr .owl-controls .owl-buttons div.disabled:hover{ background-color: '.$ps_lr_prev_next_bg_disabled.'; }';
            
        if(Configuration::get('STSN_PS_PAG_NAV_BG'))  
            $css .= '.products_slider .owl-theme .owl-controls .owl-page span{ background-color: '.Configuration::get('STSN_PS_PAG_NAV_BG').'; }';
        if(Configuration::get('STSN_PS_PAG_NAV_BG_HOVER'))  
            $css .= '.products_slider .owl-theme .owl-controls .owl-page.active span, .products_slider .owl-theme .owl-controls .owl-page:hover span{ background-color: '.Configuration::get('STSN_PAG_NAV_BG_HOVER').'; }';


        if(Configuration::get('STSN_PAGINATION_COLOR'))  
            $css .= 'ul.pagination > li > a, ul.pagination > li > span, div.pagination .showall .show_all_products { color: '.Configuration::get('STSN_PAGINATION_COLOR').'; }';
        if(Configuration::get('STSN_PAGINATION_COLOR_DISABLED'))  
            $css .= 'ul.pagination > li.disabled > a, ul.pagination > li.disabled > a:hover,ul.pagination > li.active > a, ul.pagination > li.active > a:hover, ul.pagination > li.disabled > span, ul.pagination > li.disabled > span:hover, ul.pagination > li.active > span, ul.pagination > li.active > span:hover{ color: '.Configuration::get('STSN_PAGINATION_COLOR_DISABLED').'; }';
        if(Configuration::get('STSN_PAGINATION_COLOR_HOVER'))  
            $css .= 'ul.pagination > li > a:hover, ul.pagination > li > span:hover, div.pagination .showall .show_all_products:hover{ color: '.Configuration::get('STSN_PAGINATION_COLOR_HOVER').'; }';

        if(Configuration::get('STSN_PAGINATION_BG'))  
            $css .= 'ul.pagination > li > a, ul.pagination > li > span, div.pagination .showall .show_all_products { background-color: '.Configuration::get('STSN_PAGINATION_BG').'; }';
        if(Configuration::get('STSN_PAGINATION_BG_DISABLED')) 
            $css .= 'ul.pagination > li.disabled > a, ul.pagination > li.disabled > a:hover,ul.pagination > li.active > a, ul.pagination > li.active > a:hover, ul.pagination > li.disabled > span, ul.pagination > li.disabled > span:hover, ul.pagination > li.active > span, ul.pagination > li.active > span:hover{ background-color: '.(Configuration::get('STSN_PAGINATION_BG_DISABLED') ? Configuration::get('STSN_PAGINATION_BG_DISABLED') : 'transparent').'; }';
        if(Configuration::get('STSN_PAGINATION_BG_HOVER'))  
            $css .= 'ul.pagination > li > a:hover, ul.pagination > li > span:hover, div.pagination .showall .show_all_products:hover{ background-color: '.Configuration::get('STSN_PAGINATION_BG_HOVER').'; }';
        //Shadow
        if(Configuration::get('STSN_PRO_SHADOW_EFFECT'))
        {
            $pro_shadow_color = Configuration::get('STSN_PRO_SHADOW_COLOR');
            if(!Validate::isColor($pro_shadow_color))
                $pro_shadow_color = '#000000';

            $pro_shadow_color_arr = self::hex2rgb($pro_shadow_color);
            if(is_array($pro_shadow_color_arr))
            {
                $pro_shadow_opacity = (float)Configuration::get('STSN_PRO_SHADOW_OPACITY');
                if($pro_shadow_opacity<0 || $pro_shadow_opacity>1)
                    $pro_shadow_opacity = 0.1;

                $pro_shadow_css = (int)Configuration::get('STSN_PRO_H_SHADOW').'px '.(int)Configuration::get('STSN_PRO_V_SHADOW').'px '.(int)Configuration::get('STSN_PRO_SHADOW_BLUR').'px rgba('.$pro_shadow_color_arr[0].','.$pro_shadow_color_arr[1].','.$pro_shadow_color_arr[2].','.$pro_shadow_opacity.')';
                $css .= '.products_slider .ajax_block_product:hover .pro_first_box, .products_slider .ajax_block_product:hover .pro_second_box, .product_list.grid .ajax_block_product:hover .pro_first_box, .product_list.grid .ajax_block_product:hover .pro_second_box, .product_list.list .ajax_block_product:hover{-webkit-box-shadow: '.$pro_shadow_css .'; -moz-box-shadow: '.$pro_shadow_css .'; box-shadow: '.$pro_shadow_css .'; }';
            }
        }

        //
        $css .= $res_css;
        if (Configuration::get('STSN_CUSTOM_CSS') != "")
			$css .= Configuration::get('STSN_CUSTOM_CSS');
        
        if (Shop::getContext() == Shop::CONTEXT_SHOP)
        {
            $cssFile = $this->local_path."views/css/customer-s".(int)$this->context->shop->getContextShopID().".css";
    		$write_fd = fopen($cssFile, 'w') or die('can\'t open file "'.$cssFile.'"');
    		fwrite($write_fd, $css);
    		fclose($write_fd);
        }
        if (Configuration::get('STSN_CUSTOM_JS') != "")
		{
		    $jsFile = $this->local_path."views/js/customer".$id_shop.".js";
    		$write_fd = fopen($jsFile, 'w') or die('can\'t open file "'.$jsFile.'"');
    		fwrite($write_fd, Configuration::get('STSN_CUSTOM_JS'));
    		fclose($write_fd);
		}
        else
            if(file_exists($this->local_path.'views/js/customer'.$id_shop.'.js'))
                unlink($this->local_path.'views/js/customer'.$id_shop.'.js');
    }
    
    public static function hex2rgb($hex) {
       $hex = str_replace("#", "", $hex);
    
       if(strlen($hex) == 3) {
          $r = hexdec(substr($hex,0,1).substr($hex,0,1));
          $g = hexdec(substr($hex,1,1).substr($hex,1,1));
          $b = hexdec(substr($hex,2,1).substr($hex,2,1));
       } else {
          $r = hexdec(substr($hex,0,2));
          $g = hexdec(substr($hex,2,2));
          $b = hexdec(substr($hex,4,2));
       }
       $rgb = array($r, $g, $b);
       return $rgb;
    }
    
	public function hookActionShopDataDuplication($params)
	{
	    $this->_useDefault(false,shop::getGroupFromShop($params['new_id_shop']),$params['new_id_shop']);
	}
    public function hookHeader($params)
	{
        $id_shop = (int)Shop::getContextShopID();
	    $theme_font = array();
    	$theme_font[] = Configuration::get('STSN_FONT_TEXT');
        $theme_font[] = Configuration::get('STSN_FONT_HEADING');
        $theme_font[] = Configuration::get('STSN_FONT_PRICE');
        $theme_font[] = Configuration::get('STSN_FONT_MENU');
    	$theme_font[] = Configuration::get('STSN_FONT_CART_BTN');
    	//$theme_font[] = Configuration::get('STSN_FONT_TITLE');
        
        $theme_font = array_unique($theme_font);
        $fonts = $this->systemFonts;
        $theme_font = array_diff($theme_font,$fonts);
        
        $font_latin_support = Configuration::get('STSN_FONT_LATIN_SUPPORT');
        $font_cyrillic_support = Configuration::get('STSN_FONT_CYRILLIC_SUPPORT');
        $font_vietnamese = Configuration::get('STSN_FONT_VIETNAMESE');
        $font_greek_support = Configuration::get('STSN_FONT_GREEK_SUPPORT');
        $font_support = ($font_latin_support || $font_cyrillic_support || $font_vietnamese || $font_greek_support) ? '&subset=' : '';
        $font_latin_support && $font_support .= 'latin,latin-ext,';
        $font_cyrillic_support && $font_support .= 'cyrillic,cyrillic-ext,';
        $font_vietnamese && $font_support .= 'vietnamese,';
        $font_greek_support && $font_support .= 'greek,greek-ext,';

        if(is_array($theme_font) && count($theme_font))
            foreach($theme_font as $v)
            {
                if(!$v)
                    continue;
                $this->context->controller->addCSS($this->context->link->protocol_content."fonts.googleapis.com/css?family=".str_replace(' ', '+', $v).($font_support ? rtrim($font_support,',') : ''), 'all');
            }
	    $footer_img_src = '';
	    if(Configuration::get('STSN_FOOTER_IMG') !='' )
	       $footer_img_src = (Configuration::get('STSN_FOOTER_IMG')==$this->defaults["footer_img"]['val'] ? _MODULE_DIR_.$this->name.'/' : _THEME_PROD_PIC_DIR_).Configuration::get('STSN_FOOTER_IMG');

        $mobile_detect = $this->context->getMobileDetect();
        $mobile_device = $mobile_detect->isMobile() || $mobile_detect->isTablet();
        
        $enabled_version_swithing = Configuration::get('STSN_VERSION_SWITCHING') && $mobile_device;
        $version_switching = $enabled_version_swithing && isset($this->context->cookie->version_switching) ? (int)$this->context->cookie->version_switching : 0;
        
        $is_responsive = (int)Configuration::get('STSN_RESPONSIVE');
	    $theme_settings = array(
            'theme_version' => $this->version,
            'boxstyle' => (int)Configuration::get('STSN_BOXSTYLE'),
            'footer_img_src' => $footer_img_src, 
            'copyright_text' => Configuration::get('STSN_COPYRIGHT_TEXT', $this->context->language->id),
            /*'search_label' => Configuration::get('STSN_SEARCH_LABEL', $this->context->language->id),
            'newsletter_label' => Configuration::get('STSN_NEWSLETTER_LABEL', $this->context->language->id),*/
            'icon_iphone_57' => Configuration::get('STSN_ICON_IPHONE_57') ? $this->_path.Configuration::get('STSN_ICON_IPHONE_57') : '',
            'icon_iphone_72' => Configuration::get('STSN_ICON_IPHONE_72') ? $this->_path.Configuration::get('STSN_ICON_IPHONE_72') : '',
            'icon_iphone_114' => Configuration::get('STSN_ICON_IPHONE_114') ? $this->_path.Configuration::get('STSN_ICON_IPHONE_114') : '',
            'icon_iphone_144' => Configuration::get('STSN_ICON_IPHONE_144') ? $this->_path.Configuration::get('STSN_ICON_IPHONE_144') : '',
            'retina_logo' => Configuration::get('STSN_RETINA_LOGO') ? Configuration::get('STSN_RETINA_LOGO') : '',
            'show_cate_header' => Configuration::get('STSN_SHOW_CATE_HEADER'),
            'responsive' => $is_responsive,
            'enabled_version_swithing' => $enabled_version_swithing,
            'version_switching' => $version_switching,
            'responsive_max' => (int)Configuration::get('STSN_RESPONSIVE_MAX'),
            'scroll_to_top' => Configuration::get('STSN_SCROLL_TO_TOP'),
            'google_rich_snippets' => Configuration::get('STSN_GOOGLE_RICH_SNIPPETS'),
            'display_tax_label' => Configuration::get('STSN_DISPLAY_TAX_LABEL'),
            'length_of_product_name' => Configuration::get('STSN_LENGTH_OF_PRODUCT_NAME'),
            'logo_position' => Configuration::get('STSN_LOGO_POSITION'),
            'body_has_background' => (Configuration::get('STSN_BODY_BG_COLOR') || Configuration::get('STSN_BODY_BG_PATTERN') || Configuration::get('STSN_BODY_BG_IMG')),
            'tracking_code' =>  Configuration::get('STSN_TRACKING_CODE'),
            'display_cate_desc_full' => Configuration::get('STSN_DISPLAY_CATE_DESC_FULL'), 
            'display_pro_tags' => Configuration::get('STSN_DISPLAY_PRO_TAGS'), 
            'is_rtl' => (int)$this->context->language->is_rtl, 
            'breadcrumb_width' => Configuration::get('STSN_BREADCRUMB_WIDTH'), 
            'welcome' => Configuration::get('STSN_WELCOME', $this->context->language->id),
            'welcome_logged' => Configuration::get('STSN_WELCOME_LOGGED', $this->context->language->id),
            'welcome_link' => Configuration::get('STSN_WELCOME_LINK', $this->context->language->id),
            'is_mobile_device' => $mobile_device,
            'customer_group_without_tax' => Group::getPriceDisplayMethod($this->context->customer->id_default_group),
            'retina' => (int)Configuration::get('STSN_RETINA'),
            // 'animation' => Configuration::get('STSN_ANIMATION'),
            'logo_width' => Configuration::get('STSN_LOGO_WIDTH'),
            'transparent_header' => Configuration::get('STSN_TRANSPARENT_HEADER'),
            //In case someone who forgot to disable moblie theme
            'st_logo_image_width' => Configuration::get('SHOP_LOGO_WIDTH'),
            'st_logo_image_height' => Configuration::get('SHOP_LOGO_HEIGHT'),
        );
        
        Media::addJsDef(array(
            'st_responsive' => $theme_settings['responsive'],
            'st_responsive_max' => $theme_settings['responsive_max'],
            'st_is_rtl' => $theme_settings['is_rtl'],
            'st_retina' => $theme_settings['retina'],
            'sticky_option' => (int)Configuration::get('STSN_STICKY_OPTION'),
            'st_is_mobile_device' => $mobile_device,
        ));

        // $this->context->controller->addJS($this->_path.'views/js/global.js');
        $this->context->controller->addJS($this->_path.'views/js/owl.carousel.js');
        $this->context->controller->addJS($this->_path.'views/js/easyzoom.js');
        // $this->context->controller->addJS($this->_path.'views/js/waypoints.min.js');
        $this->context->controller->addJS($this->_path.'views/js/perfect-scrollbar.js');
        if(file_exists($this->local_path.'views/js/customer'.$id_shop.'.js'))
		{
            $custom_js_path = $this->_path.'views/js/customer'.$this->context->shop->getContextShopID().'.js';
            $theme_settings['custom_js'] = context::getContext()->link->protocol_content.Tools::getMediaServer($custom_js_path).$custom_js_path;
        }
        
        $theme_settings['custom_css'] = array();
        
        $theme_settings['custom_css_media'] = 'all';

        $responsive_max = Configuration::get('STSN_RESPONSIVE_MAX');
		if($is_responsive && (!$enabled_version_swithing || $version_switching==0))
        {
            $this->context->controller->addCSS(_THEME_CSS_DIR_.'responsive.css', 'all');
            if ($this->context->language->is_rtl)
                $this->context->controller->addCSS(_THEME_CSS_DIR_.'rtl-responsive.css', 'all');
            
            if($responsive_max)
                $this->context->controller->addCSS(_THEME_CSS_DIR_.'responsive-md.css', 'all');
            else
                $this->context->controller->addCSS(_THEME_CSS_DIR_.'responsive-md-max.css', 'all');
        }else{
            $this->context->controller->addCSS(_THEME_CSS_DIR_.'responsiveness.css', 'all');
            if($responsive_max>=1)
                $this->context->controller->addCSS(_THEME_CSS_DIR_.'responsiveness-lg.css', 'all');
            if($responsive_max>=2)
                $this->context->controller->addCSS(_THEME_CSS_DIR_.'responsiveness-xl.css', 'all');
        }

        if($is_responsive && (!$enabled_version_swithing || $version_switching==0))
        {
            if($responsive_max>=1)
                $this->context->controller->addCSS(_THEME_CSS_DIR_.'responsive-lg.css', 'all');
            if($responsive_max==1)
                $this->context->controller->addCSS(_THEME_CSS_DIR_.'responsive-lg-max.css', 'all');

            if($responsive_max>=2)
            {
                $this->context->controller->addCSS(_THEME_CSS_DIR_.'responsive-lg-min.css', 'all');
                $this->context->controller->addCSS(_THEME_CSS_DIR_.'responsive-xl.css', 'all');
            }
        }
        if (Shop::getContext() == Shop::CONTEXT_SHOP)
        {
            if(!file_exists($this->local_path.'views/css/customer-s'.$this->context->shop->getContextShopID().'.css'))
                $this->writeCss();
            $custom_css_path = $this->_path.'views/css/customer-s'.$this->context->shop->getContextShopID().'.css';
            $theme_settings['custom_css'][] = context::getContext()->link->protocol_content.Tools::getMediaServer($custom_css_path).$custom_css_path;
        }
        //
        $this->context->controller->addCSS($this->_path.'views/css/animate.min.css', 'all');
        $this->context->controller->addJqueryPlugin('hoverIntent');
        $this->context->controller->addJqueryPlugin('fancybox');
        //Make sure ui slider css got loaded
        $ui_slider_path = Media::getJqueryUIPath('ui.slider', 'base', true);
        $this->context->controller->addCSS($ui_slider_path['css'], 'all', false);

		$this->context->smarty->assign('sttheme', $theme_settings);

		return $this->display(__FILE__, 'stthemeeditor-header.tpl');
	}
    
    public function getProductRatingAverage($id_product)
    {
        if(Configuration::get('STSN_DISPLAY_COMMENT_RATING') && Module::isInstalled('productcomments') && Module::isEnabled('productcomments'))
        {
            if (!file_exists(_PS_MODULE_DIR_.'productcomments/ProductComment.php'))
                return false;
            include_once(_PS_MODULE_DIR_.'productcomments/ProductComment.php');
            $averageGrade = ProductComment::getAverageGrade($id_product);

            $config_display = Configuration::get('STSN_DISPLAY_COMMENT_RATING');
            if(($config_display==1 || $config_display==3) && !$averageGrade['grade'])
                return ;

            if($config_display==3 || $config_display==4)
                $this->context->smarty->assign('commentNbr', ProductComment::getCommentNumber($id_product));
            $this->context->smarty->assign('ratingAverage', round($averageGrade['grade']));

            return $this->display(__FILE__, 'product_rating_average.tpl');
        }
        return false;
    }
    public function getProductAttributes($id_product)
    {
        if(!$show_pro_attr = Configuration::get('STSN_DISPLAY_PRO_ATTR'))
            return false;
        $product = new Product($id_product);
		if (!isset($product) || !Validate::isLoadedObject($product))
            return false;
		$groups = array();
		$attributes_groups = $product->getAttributesGroups($this->context->language->id);
        if (is_array($attributes_groups) && $attributes_groups)
		{
            foreach ($attributes_groups as $k => $row)
			{
			     if (!isset($groups[$row['id_attribute_group']]))
					$groups[$row['id_attribute_group']] = array(
						'name' => $row['public_group_name'],
						'group_type' => $row['group_type'],
						'default' => -1,
					);
                $groups[$row['id_attribute_group']]['attributes'][$row['id_attribute']] = $row['attribute_name'];
				if (!isset($groups[$row['id_attribute_group']]['attributes_quantity'][$row['id_attribute']]))
					$groups[$row['id_attribute_group']]['attributes_quantity'][$row['id_attribute']] = 0;
				$groups[$row['id_attribute_group']]['attributes_quantity'][$row['id_attribute']] += (int)$row['quantity'];
			}
            $this->context->smarty->assign(array(
				'st_groups' => $groups,
                'show_pro_attr' => $show_pro_attr,
            ));
            return $this->display(__FILE__, 'product_attributes.tpl');
        }
        return false;
    }
    public function getAddToWhishlistButton($id_product,$show_icon)
    {
        if(Module::isInstalled('blockwishlist') && Module::isEnabled('blockwishlist'))
        {
            $this->context->smarty->assign(array(
                'id_product' => $id_product,
                'show_icon' => $show_icon,
            ));
            return $this->display(__FILE__, 'product_add_to_wishlist.tpl');
        }
    }
    public function isInstalledWishlist()
    {
        return (Module::isInstalled('blockwishlist') && Module::isEnabled('blockwishlist')) ? true: false;
    }
    public function getYotpoDomain()
    {
        if(Module::isInstalled('yotpo') && Module::isEnabled('yotpo'))
            return Tools::getShopDomain(false,false);
        return '';
    }
    public function getYotpoLanguage()
    {
        if(Module::isInstalled('yotpo') && Module::isEnabled('yotpo'))
        {
            $language = Configuration::get('yotpo_language');
            if (Configuration::get('yotpo_language_as_site') == true) {
                if (isset($this->context->language) && isset($this->context->language->iso_code)) {
                    $language = $this->context->language->iso_code;
                }
                else {
                    $language = Language::getIsoById( (int)$this->context->cookie->id_lang );
                }   
            }  
            return $language;         
        }
        return '';

    }
    public function getManufacturerLink($id_manufacturer)
    {
	    if (!$this->isCached('manufacturer_link.tpl', $this->stGetCacheId($id_manufacturer,'manufacturer_link')))
        {
		  	$this->context->smarty->assign(array(
              'product_manufacturer' => new Manufacturer((int)$id_manufacturer, $this->context->language->id),
            ));
        }
         
        return $this->display(__FILE__, 'manufacturer_link.tpl',$this->stGetCacheId($id_manufacturer,'manufacturer_link'));
    }
    public function getCarouselJavascript($identify)
    {
        if (!$this->isCached('carousel_javascript.tpl', $this->stGetCacheId($identify)))
        {
            if($identify=='crossselling')
                $pre = 'STSN_CS';
            else if($identify=='accessories')
                $pre = 'STSN_AC';
            else if($identify=='productscategory')
                $pre = 'STSN_PC';
            if(!isset($pre))
                return false;
            $this->context->smarty->assign(array(
                'identify' => $identify,
                'direction_nav' => Configuration::get($pre.'_DIRECTION_NAV'),
                'control_nav' => Configuration::get($pre.'_CONTROL_NAV'),
                'slideshow' => Configuration::get($pre.'_SLIDESHOW'),
                'lazy_load' => Configuration::get($pre.'_LAZY'),
                's_speed' => Configuration::get($pre.'_S_SPEED'),
                'a_speed' => Configuration::get($pre.'_A_SPEED'),
                'pause_on_hover' => Configuration::get($pre.'_PAUSE_ON_HOVER'),
                'rewind_nav' => Configuration::get($pre.'_LOOP'),
                'move' => Configuration::get($pre.'_MOVE'),
                'pro_per_xl'       => (int)Configuration::get($pre.'_PER_XL'),
                'pro_per_lg'       => (int)Configuration::get($pre.'_PER_LG'),
                'pro_per_md'       => (int)Configuration::get($pre.'_PER_MD'),
                'pro_per_sm'       => (int)Configuration::get($pre.'_PER_SM'),
                'pro_per_xs'       => (int)Configuration::get($pre.'_PER_XS'),
                'pro_per_xxs'       => (int)Configuration::get($pre.'_PER_XXS'),
            ));
        }
        return $this->display(__FILE__, 'carousel_javascript.tpl',$this->stGetCacheId($identify));
    }
    
    public function getProThumbsItemsCustom()
    {
        $enabled_version_swithing = Configuration::get('STSN_VERSION_SWITCHING');
        $version_switching = $enabled_version_swithing && isset($this->context->cookie->version_switching) ? (int)$this->context->cookie->version_switching : 0;
        
        $this->context->smarty->assign(array(
            'responsive_max'       => (int)Configuration::get('STSN_RESPONSIVE_MAX'),
            'st_responsive'       => (int)Configuration::get('STSN_RESPONSIVE'),
            'st_version_switching'       => $version_switching,
            'pro_per_xl'       => (int)Configuration::get('STSN_PRO_THUMNBS_PER_XL'),
            'pro_per_lg'       => (int)Configuration::get('STSN_PRO_THUMNBS_PER_LG'),
            'pro_per_md'       => (int)Configuration::get('STSN_PRO_THUMNBS_PER_MD'),
            'pro_per_sm'       => (int)Configuration::get('STSN_PRO_THUMNBS_PER_SM'),
            'pro_per_xs'       => (int)Configuration::get('STSN_PRO_THUMNBS_PER_XS'),
            'pro_per_xxs'       => (int)Configuration::get('STSN_PRO_THUMNBS_PER_XXS'),
        ));
        return $this->display(__FILE__, 'pro_thumbs_items_custom.tpl');
    }
    
	protected function stGetCacheId($key,$name = null)
	{
		$cache_id = parent::getCacheId($name);
		return $cache_id.'_'.$key;
	}
    
    public function hookDisplayAnywhere($params)
    {
	    if(!isset($params['caller']) || $params['caller']!=$this->name)
            return false;
        if(isset($params['function']) && method_exists($this,$params['function']))
        {
            if($params['function']=='getProductRatingAverage')
                return call_user_func_array(array($this,$params['function']),array($params['id_product']));
            elseif($params['function']=='getAddToWhishlistButton')
                return call_user_func_array(array($this,$params['function']),array($params['id_product'],$params['show_icon']));
            elseif($params['function']=='getCarouselJavascript')
                return call_user_func_array(array($this,$params['function']),array($params['identify']));
            elseif($params['function']=='getProductAttributes')
                return call_user_func_array(array($this,$params['function']),array($params['id_product']));
            elseif($params['function']=='getManufacturerLink')
                return call_user_func_array(array($this,$params['function']),array($params['id_manufacturer']));
            elseif($params['function']=='getFlyoutButtonsClass')
                return call_user_func(array($this,$params['function']));
            elseif($params['function']=='getProductNameClass')
                return call_user_func(array($this,$params['function']));
            elseif($params['function']=='getProThumbsItemsCustom')
                return call_user_func(array($this,$params['function']));
            elseif($params['function']=='getSaleStyleFlag')
                return call_user_func_array(array($this,$params['function']),array($params['percentage_amount'],$params['reduction'],$params['price_without_reduction'],$params['price']));
            elseif($params['function']=='getSaleStyleCircle')
                return call_user_func_array(array($this,$params['function']),array($params['percentage_amount'],$params['reduction'],$params['price_without_reduction'],$params['price']));
            elseif($params['function']=='getLengthOfProductName')
                return call_user_func_array(array($this,$params['function']),array($params['product_name']));
            elseif($params['function']=='getProductsPerRow')
                return call_user_func_array(array($this,$params['function']),array($params['for_w'], $params['devices']));
            elseif($params['function']=='setColumnsNbr')
                return call_user_func_array(array($this,$params['function']),array($params['columns_nbr'], $params['page_name']));
            elseif($params['function']=='getShortDescOnGrid')
                return call_user_func(array($this,$params['function']));
            elseif($params['function']=='getDisplayColorList')
                return call_user_func(array($this,$params['function']));
            elseif($params['function']=='getCategoryDefaultView')
                return call_user_func(array($this,$params['function']));
            elseif($params['function']=='isInstalledWishlist')
                return call_user_func(array($this,$params['function']));
            elseif($params['function']=='getYotpoDomain')
                return call_user_func(array($this,$params['function']));
            elseif($params['function']=='getYotpoLanguage')
                return call_user_func(array($this,$params['function']));
            else
                return false;
        }
        return false;
    }
    public function hookDisplayRightColumnProduct($params)
    {        
	    if(!Module::isInstalled('blockviewed') || !Module::isEnabled('blockviewed'))
            return false;
            
		$id_product = (int)Tools::getValue('id_product');
        if(!$id_product)
            return false;
            
		$productsViewed = (isset($params['cookie']->viewed) && !empty($params['cookie']->viewed)) ? array_slice(array_reverse(explode(',', $params['cookie']->viewed)), 0, Configuration::get('PRODUCTS_VIEWED_NBR')) : array();

		if ($id_product && !in_array($id_product, $productsViewed))
		{
			if(isset($params['cookie']->viewed) && !empty($params['cookie']->viewed))
		  		$params['cookie']->viewed .= ',' . (int)$id_product;
			else
		  		$params['cookie']->viewed = (int)$id_product;
		}
        return false;
    }
    public function getFlyoutButtonsClass()
    {
        return Configuration::get('STSN_FLYOUT_BUTTONS') ? ' hover_fly_static ' : '';
    }
    
    public function getProductNameClass()
    {
        return Configuration::get('STSN_LENGTH_OF_PRODUCT_NAME') ? ' nohidden ' : '';
    }
    
    public function getSaleStyleFlag($percentage_amount,$reduction,$price_without_reduction,$price)
    {
        if(Configuration::get('STSN_DISCOUNT_PERCENTAGE')!=1)
            return false;
        $this->context->smarty->assign(array(
            'percentage_amount'  => $percentage_amount,
            'reduction'  => $reduction,
            'price_without_reduction'  => $price_without_reduction,
			'price' => $price,
        ));    
		return $this->display(__FILE__, 'sale_style_flag.tpl');
    }
    public function getSaleStyleCircle($percentage_amount,$reduction,$price_without_reduction,$price)
    {
        $discount_percentage = Configuration::get('STSN_DISCOUNT_PERCENTAGE');
        if($discount_percentage<2)
            return false;
        $this->context->smarty->assign(array(
            'percentage_amount'  => $percentage_amount,
            'reduction'  => $reduction,
            'price_without_reduction'  => $price_without_reduction,
            'price' => $price,
			'discount_percentage' => $discount_percentage,
        ));    
		return $this->display(__FILE__, 'sale_style_circle.tpl');
    }
    public function getLengthOfProductName($product_name)
    {
        $length_of_product_name = Configuration::get('STSN_LENGTH_OF_PRODUCT_NAME');
        $this->context->smarty->assign(array(
            'product_name_full' => $length_of_product_name==2,
            'length_of_product_name'  => ($length_of_product_name==1 ? 70 : 35),
			'product_name' => $product_name,
        ));    
		return $this->display(__FILE__, 'lenght_of_product_name.tpl');
    }
    public function initTab()
    {
        $html = '<div class="sidebar col-xs-12 col-lg-2"><ul class="nav nav-tabs">';
        foreach(self::$tabs AS $tab)
            $html .= '<li class="nav-item"><a href="javascript:;" title="'.$this->l($tab['name']).'" data-fieldset="'.$tab['id'].'">'.$this->l($tab['name']).'</a></li>';
        $html .= '</ul></div>';
        return $html;
    }
    public function initToolbarBtn()
    {
        $token = Tools::getAdminTokenLite('AdminModules');
        $toolbar_btn = array(
            'demo_1' => array(
                'desc' => $this->l('Demo 1'),
                'class' => 'icon-plus-sign',
                'js' => 'if (confirm(\''.$this->l('Importing demo 1 color, are your sure?').'\')){return true;}else{event.preventDefault();}',
                'href' => AdminController::$currentIndex.'&configure='.$this->name.'&predefinedcolor'.$this->name.'=demo_1&token='.$token,
            ),
            'demo_2' => array(
                'desc' => $this->l('Demo 2'),
                'class' => 'icon-plus-sign',
                'js' => 'if (confirm(\''.$this->l('Importing demo 2 color, are your sure?').'\')){return true;}else{event.preventDefault();}',
                'href' => AdminController::$currentIndex.'&configure='.$this->name.'&predefinedcolor'.$this->name.'=demo_2&token='.$token,
            ),
            'demo_3' => array(
                'desc' => $this->l('Demo 3'),
                'class' => 'icon-plus-sign',
                'js' => 'if (confirm(\''.$this->l('Importing demo 3 color, are your sure?').'\')){return true;}else{event.preventDefault();}',
                'href' => AdminController::$currentIndex.'&configure='.$this->name.'&predefinedcolor'.$this->name.'=demo_3&token='.$token,
            ),
            'demo_4' => array(
                'desc' => $this->l('Demo 4'),
                'class' => 'icon-plus-sign',
                'js' => 'if (confirm(\''.$this->l('Importing demo 4 color, are your sure?').'\')){return true;}else{event.preventDefault();}',
                'href' => AdminController::$currentIndex.'&configure='.$this->name.'&predefinedcolor'.$this->name.'=demo_4&token='.$token,
            ),
            'demo_5' => array(
                'desc' => $this->l('Demo 5'),
                'class' => 'icon-plus-sign',
                'js' => 'if (confirm(\''.$this->l('Importing demo 5 color, are your sure?').'\')){return true;}else{event.preventDefault();}',
                'href' => AdminController::$currentIndex.'&configure='.$this->name.'&predefinedcolor'.$this->name.'=demo_5&token='.$token,
            ),
            'demo_6' => array(
                'desc' => $this->l('Demo 6'),
                'class' => 'icon-plus-sign',
                'js' => 'if (confirm(\''.$this->l('Importing demo 6 color, are your sure?').'\')){return true;}else{event.preventDefault();}',
                'href' => AdminController::$currentIndex.'&configure='.$this->name.'&predefinedcolor'.$this->name.'=demo_6&token='.$token,
            ),
            'demo_7' => array(
                'desc' => $this->l('Demo 7'),
                'class' => 'icon-plus-sign',
                'js' => 'if (confirm(\''.$this->l('Importing demo 7 color, are your sure?').'\')){return true;}else{event.preventDefault();}',
                'href' => AdminController::$currentIndex.'&configure='.$this->name.'&predefinedcolor'.$this->name.'=demo_7&token='.$token,
            ),
            'demo_8' => array(
                'desc' => $this->l('Demo 8'),
                'class' => 'icon-plus-sign',
                'js' => 'if (confirm(\''.$this->l('Importing demo 8 color, are your sure?').'\')){return true;}else{event.preventDefault();}',
                'href' => AdminController::$currentIndex.'&configure='.$this->name.'&predefinedcolor'.$this->name.'=demo_8&token='.$token,
            ),
            'demo_9' => array(
                'desc' => $this->l('Demo 9'),
                'class' => 'icon-plus-sign',
                'js' => 'if (confirm(\''.$this->l('Importing demo 9 color, are your sure?').'\')){return true;}else{event.preventDefault();}',
                'href' => AdminController::$currentIndex.'&configure='.$this->name.'&predefinedcolor'.$this->name.'=demo_9&token='.$token,
            ),
            'demo_10' => array(
                'desc' => $this->l('Demo 10'),
                'class' => 'icon-plus-sign',
                'js' => 'if (confirm(\''.$this->l('Importing demo 10 color, are your sure?').'\')){return true;}else{event.preventDefault();}',
                'href' => AdminController::$currentIndex.'&configure='.$this->name.'&predefinedcolor'.$this->name.'=demo_10&token='.$token,
            ),
            'demo_11' => array(
                'desc' => $this->l('Demo 11'),
                'class' => 'icon-plus-sign',
                'js' => 'if (confirm(\''.$this->l('Importing demo 11 color, are your sure?').'\')){return true;}else{event.preventDefault();}',
                'href' => AdminController::$currentIndex.'&configure='.$this->name.'&predefinedcolor'.$this->name.'=demo_11&token='.$token,
            ),
            'export' => array(
                'desc' => $this->l('Export'),
                'class' => 'icon-share',
                'js' => '',
                'href' => AdminController::$currentIndex.'&configure='.$this->name.'&export'.$this->name.'&token='.$token,
            ),
        );
        $html = '<div class="panel st_toolbtn clearfix">';
        foreach($toolbar_btn AS $k => $btn)
        {
            $html .= '
            <a id="desc-configuration-'.$k.'" class="boolbtn-'.$k.' btn btn-default" onclick="'.$btn['js'].'" href="'.$btn['href'].'" title="'.$btn['desc'].'">
            <span>
            <i class="'.$btn['class'].'"></i> '.$btn['desc'].'</span></a>';
        }
        $html .= '<form class="defaultForm form-horizontal" action="'.AdminController::$currentIndex.'&configure='.$this->name.'&upload'.$this->name.'&token='.$token.'" method="post" enctype="multipart/form-data">
            <div class="form-group">
            <label class="control-label col-lg-2">'.$this->l('Upload a file:').'</label>
            <div class="col-lg-10">
            <div class="form-group">
            	<div class="col-sm-6">
            		<input id="xml_config_file_field" type="file" name="xml_config_file_field" class="hide">
            		<div class="dummyfile input-group">
            			<span class="input-group-addon"><i class="icon-file"></i></span>
            			<input id="xml_config_file_field-name" type="text" name="filename" readonly="">
            			<span class="input-group-btn">
            				<button id="xml_config_file_field-selectbutton" type="button" name="submitAddAttachments" class="btn btn-default">
            					<i class="icon-folder-open"></i> '.$this->l('Add file').'</button>
            			</span>
            		</div>
                    <button type="submit" value="1" name="uploadconfig" id="uploadconfig" class="btn btn-default" data="'.$this->l('Your current settings will be override, are your sure?').'"><i class="icon icon-upload"></i> '.$this->l('Upload').'</button>
            	</div>
            </div>
            </div>
            </div>
            </form>';
        $html .= '</div>';
        return $html;
    }
    private function getConfigFieldsValues()
    {
        $fields_values = array();
        foreach($this->defaults as $k=>$v)
            $fields_values[$k] = Configuration::get('STSN_'.strtoupper($k));
        
        $languages = Language::getLanguages(false);    
		foreach ($languages as $language)
        {
            $fields_values['welcome'][$language['id_lang']] = Configuration::get('STSN_WELCOME', $language['id_lang']);
            $fields_values['welcome_logged'][$language['id_lang']] = Configuration::get('STSN_WELCOME_LOGGED', $language['id_lang']);
            $fields_values['welcome_link'][$language['id_lang']] = Configuration::get('STSN_WELCOME_LINK', $language['id_lang']);
            $fields_values['copyright_text'][$language['id_lang']] = Configuration::get('STSN_COPYRIGHT_TEXT', $language['id_lang']);
            /*$fields_values['search_label'][$language['id_lang']] = Configuration::get('STSN_SEARCH_LABEL', $language['id_lang']);
            $fields_values['newsletter_label'][$language['id_lang']] = Configuration::get('STSN_NEWSLETTER_LABEL', $language['id_lang']);*/
        }
        
        foreach ($this->getConfigurableModules() as $module)
			$fields_values[$module['name']] = $module['value'];

        //
        $font_text_string = Configuration::get('STSN_FONT_TEXT');
        $font_text_string && $font_text_string = explode(":", $font_text_string);
        $fields_values['font_text_list'] = $font_text_string ? $font_text_string[0] : '';
        
        $font_heading_string = Configuration::get('STSN_FONT_HEADING');
        $font_heading_string && $font_heading_string = explode(":", $font_heading_string);
        $fields_values['font_heading_list'] = $font_heading_string ? $font_heading_string[0] : '';
        
        $font_price_string = Configuration::get('STSN_FONT_PRICE');
        $font_price_string && $font_price_string = explode(":", $font_price_string);
        $fields_values['font_price_list'] = $font_price_string ? $font_price_string[0] : '';
        
        $font_menu_string = Configuration::get('STSN_FONT_MENU');
        $font_menu_string && $font_menu_string = explode(":", $font_menu_string);
        $fields_values['font_menu_list'] = $font_menu_string ? $font_menu_string[0] : '';
        
        $font_cart_btn_string = Configuration::get('STSN_FONT_CART_BTN');
        $font_cart_btn_string && $font_cart_btn_string = explode(":", $font_cart_btn_string);
        $fields_values['font_cart_btn_list'] = $font_cart_btn_string ? $font_cart_btn_string[0] : '';
        
        return $fields_values;
    }

    public function getShortDescOnGrid()
    {  
        return Configuration::get('STSN_SHOW_SHORT_DESC_ON_GRID') ? 'display_sd' : '';
    }
    public function getDisplayColorList()
    {
        return Configuration::get('STSN_DISPLAY_COLOR_LIST') ? '' : 'hidden';
    }
    public function getCategoryDefaultView()
    {
        return Configuration::get('STSN_PRODUCT_VIEW')=='list_view' ? 'list' : 'grid';
    }
    public function getProductsPerRow($for_w, $devices)
    {
        switch ($for_w) {
            case 'category':
            case 'prices-drop':
            case 'best-sales':
            case 'manufacturer':
            case 'supplier':
            case 'new-products':
            case 'search':
                $columns_nbr = $this->context->cookie->st_category_columns_nbr;
                $nbr = Configuration::get('STSN_CATEGORY_PRO_PER_'.strtoupper($devices).'_'.$columns_nbr);
                break;  
            case 'hometab':
                $nbr = Configuration::get('STSN_'.strtoupper($for_w).'_PRO_PER_'.strtoupper($devices));
                break;           
            case 'packitems':
                $nbr = Configuration::get('STSN_'.strtoupper($for_w).'_PRO_PER_'.strtoupper($devices));
                break;       
            case 'homenew':
                $nbr = Configuration::get('STSN_'.strtoupper($for_w).'_PRO_PER_'.strtoupper($devices));
                break;  
            case 'featured':
                $nbr = Configuration::get('STSN_'.strtoupper($for_w).'_PRO_PER_'.strtoupper($devices));
                break;  
            case 'special':
                $nbr = Configuration::get('STSN_'.strtoupper($for_w).'_PRO_PER_'.strtoupper($devices));
                break;  
            case 'pro_cate':
                $nbr = Configuration::get('STSN_'.strtoupper($for_w).'_PRO_PER_'.strtoupper($devices));
                break; 
            case 'sellers':
                $nbr = Configuration::get('STSN_'.strtoupper($for_w).'_PRO_PER_'.strtoupper($devices));
                break;        
            default:
                $nbr = 3;
                break;
        }
        return $nbr ? $nbr : 3;
    }
    public function setColumnsNbr($columns_nbr, $page_name)
    {
        $this->context->cookie->st_category_columns_nbr = (int)$columns_nbr;
    }
    public function BuildDropListGroup($group)
    {
        if(!is_array($group) || !count($group))
            return false;

        $html = '<div class="row">';
        foreach($group AS $key => $k)
        {
             if($key==3)
                 $html .= '</div><div class="row">';

             $html .= '<div class="col-xs-4 col-sm-3"><label '.(isset($k['tooltip']) ? ' data-html="true" data-toggle="tooltip" class="label-tooltip" data-original-title="'.$k['tooltip'].'" ':'').'>'.$k['label'].'</label>'.
             '<select name="'.$k['id'].'" 
             id="'.$k['id'].'" 
             class="'.(isset($k['class']) ? $k['class'] : 'fixed-width-md').'"'.
             (isset($k['onchange']) ? ' onchange="'.$k['onchange'].'"':'').' >';
            
            for ($i=1; $i < 7; $i++){
                $html .= '<option value="'.$i.'" '.(Configuration::get('STSN_'.strtoupper($k['id'])) == $i ? ' selected="selected"':'').'>'.$i.'</option>';
            }
                                
            $html .= '</select></div>';
        }
        return $html.'</div>';
    }
    public function findCateProPer($k=null)
    {
        $proper = array(
            1 => array(
                array(
                    'id' => 'category_pro_per_xl_1',
                    'label' => $this->l('Extra large devices'),
                    'tooltip' => $this->l('Desktops (>1440px)'),
                ),
                array(
                    'id' => 'category_pro_per_lg_1',
                    'label' => $this->l('Large devices'),
                    'tooltip' => $this->l('Desktops (>1200px)'),
                ),
                array(
                    'id' => 'category_pro_per_md_1',
                    'label' => $this->l('Medium devices'),
                    'tooltip' => $this->l('Desktops (>992px)'),
                ),
                array(
                    'id' => 'category_pro_per_sm_1',
                    'label' => $this->l('Small devices'),
                    'tooltip' => $this->l('Tablets (>768px)'),
                ),
                array(
                    'id' => 'category_pro_per_xs_1',
                    'label' => $this->l('Extra small devices'),
                    'tooltip' => $this->l('Phones (>480px)'),
                ),
                array(
                    'id' => 'category_pro_per_xxs_1',
                    'label' => $this->l('Extremely small devices'),
                    'tooltip' => $this->l('Phones (<480px)'),
                ),
            ),
            2 => array(
                array(
                    'id' => 'category_pro_per_xl_2',
                    'label' => $this->l('Extra large devices'),
                    'tooltip' => $this->l('Desktops (>1440px)'),
                ),
                array(
                    'id' => 'category_pro_per_lg_2',
                    'label' => $this->l('Large devices'),
                    'tooltip' => $this->l('Desktops (>1200px)'),
                ),
                array(
                    'id' => 'category_pro_per_md_2',
                    'label' => $this->l('Medium devices'),
                    'tooltip' => $this->l('Desktops (>992px)'),
                ),
                array(
                    'id' => 'category_pro_per_sm_2',
                    'label' => $this->l('Small devices'),
                    'tooltip' => $this->l('Tablets (>768px)'),
                ),
                array(
                    'id' => 'category_pro_per_xs_2',
                    'label' => $this->l('Extra small devices'),
                    'tooltip' => $this->l('Phones (>480px)'),
                ),
                array(
                    'id' => 'category_pro_per_xxs_2',
                    'label' => $this->l('Extremely small devices'),
                    'tooltip' => $this->l('Phones (<480px)'),
                ),
            ),
            3 => array(
                array(
                    'id' => 'category_pro_per_xl_3',
                    'label' => $this->l('Extra large devices'),
                    'tooltip' => $this->l('Desktops (>1440px)'),
                ),
                array(
                    'id' => 'category_pro_per_lg_3',
                    'label' => $this->l('Large devices'),
                    'tooltip' => $this->l('Desktops (>1200px)'),
                ),
                array(
                    'id' => 'category_pro_per_md_3',
                    'label' => $this->l('Medium devices'),
                    'tooltip' => $this->l('Desktops (>992px)'),
                ),
                array(
                    'id' => 'category_pro_per_sm_3',
                    'label' => $this->l('Small devices'),
                    'tooltip' => $this->l('Tablets (>768px)'),
                ),
                array(
                    'id' => 'category_pro_per_xs_3',
                    'label' => $this->l('Extra small devices'),
                    'tooltip' => $this->l('Phones (>480px)'),
                ),
                array(
                    'id' => 'category_pro_per_xxs_3',
                    'label' => $this->l('Extremely small devices'),
                    'tooltip' => $this->l('Phones (<480px)'),
                ),
            ),
            4 => array(
                array(
                    'id' => 'hometab_pro_per_xl',
                    'label' => $this->l('Extra large devices'),
                    'tooltip' => $this->l('Desktops (>1440px)'),
                ),
                array(
                    'id' => 'hometab_pro_per_lg',
                    'label' => $this->l('Large devices'),
                    'tooltip' => $this->l('Desktops (>1200px)'),
                ),
                array(
                    'id' => 'hometab_pro_per_md',
                    'label' => $this->l('Medium devices'),
                    'tooltip' => $this->l('Desktops (>992px)'),
                ),
                array(
                    'id' => 'hometab_pro_per_sm',
                    'label' => $this->l('Small devices'),
                    'tooltip' => $this->l('Tablets (>768px)'),
                ),
                array(
                    'id' => 'hometab_pro_per_xs',
                    'label' => $this->l('Extra small devices'),
                    'tooltip' => $this->l('Phones (>480px)'),
                ),
                array(
                    'id' => 'hometab_pro_per_xxs',
                    'label' => $this->l('Extremely small devices'),
                    'tooltip' => $this->l('Phones (<480px)'),
                ),
            ),
            5 => array(
                array(
                    'id' => 'packitems_pro_per_xl',
                    'label' => $this->l('Extra large devices'),
                    'tooltip' => $this->l('Desktops (>1440px)'),
                ),
                array(
                    'id' => 'packitems_pro_per_lg',
                    'label' => $this->l('Large devices'),
                    'tooltip' => $this->l('Desktops (>1200px)'),
                ),
                array(
                    'id' => 'packitems_pro_per_md',
                    'label' => $this->l('Medium devices'),
                    'tooltip' => $this->l('Desktops (>992px)'),
                ),
                array(
                    'id' => 'packitems_pro_per_sm',
                    'label' => $this->l('Small devices'),
                    'tooltip' => $this->l('Tablets (>768px)'),
                ),
                array(
                    'id' => 'packitems_pro_per_xs',
                    'label' => $this->l('Extra small devices'),
                    'tooltip' => $this->l('Phones (<768px)'),
                ),
                array(
                    'id' => 'packitems_pro_per_xxs',
                    'label' => $this->l('Extremely small devices'),
                    'tooltip' => $this->l('Phones (>480px)'),
                ),
            ),
            6 => array(
                array(
                    'id' => 'categories_per_xl',
                    'label' => $this->l('Extra large devices'),
                    'tooltip' => $this->l('Desktops (>1440px)'),
                ),
                array(
                    'id' => 'categories_per_lg',
                    'label' => $this->l('Large devices'),
                    'tooltip' => $this->l('Desktops (>1200px)'),
                ),
                array(
                    'id' => 'categories_per_md',
                    'label' => $this->l('Medium devices'),
                    'tooltip' => $this->l('Desktops (>992px)'),
                ),
                array(
                    'id' => 'categories_per_sm',
                    'label' => $this->l('Small devices'),
                    'tooltip' => $this->l('Tablets (>768px)'),
                ),
                array(
                    'id' => 'categories_per_xs',
                    'label' => $this->l('Extra small devices'),
                    'tooltip' => $this->l('Phones (<768px)'),
                ),
                array(
                    'id' => 'categories_per_xxs',
                    'label' => $this->l('Extremely small devices'),
                    'tooltip' => $this->l('Phones (>480px)'),
                ),
            ),
            7 => array(
                array(
                    'id' => 'cs_per_xl',
                    'label' => $this->l('Extra large devices'),
                    'tooltip' => $this->l('Desktops (>1440px)'),
                ),
                array(
                    'id' => 'cs_per_lg',
                    'label' => $this->l('Large devices'),
                    'tooltip' => $this->l('Desktops (>1200px)'),
                ),
                array(
                    'id' => 'cs_per_md',
                    'label' => $this->l('Medium devices'),
                    'tooltip' => $this->l('Desktops (>992px)'),
                ),
                array(
                    'id' => 'cs_per_sm',
                    'label' => $this->l('Small devices'),
                    'tooltip' => $this->l('Tablets (>768px)'),
                ),
                array(
                    'id' => 'cs_per_xs',
                    'label' => $this->l('Extra small devices'),
                    'tooltip' => $this->l('Phones (<768px)'),
                ),
                array(
                    'id' => 'cs_per_xxs',
                    'label' => $this->l('Extremely small devices'),
                    'tooltip' => $this->l('Phones (>480px)'),
                ),
            ),
            8 => array(
                array(
                    'id' => 'pc_per_xl',
                    'label' => $this->l('Extra large devices'),
                    'tooltip' => $this->l('Desktops (>1440px)'),
                ),
                array(
                    'id' => 'pc_per_lg',
                    'label' => $this->l('Large devices'),
                    'tooltip' => $this->l('Desktops (>1200px)'),
                ),
                array(
                    'id' => 'pc_per_md',
                    'label' => $this->l('Medium devices'),
                    'tooltip' => $this->l('Desktops (>992px)'),
                ),
                array(
                    'id' => 'pc_per_sm',
                    'label' => $this->l('Small devices'),
                    'tooltip' => $this->l('Tablets (>768px)'),
                ),
                array(
                    'id' => 'pc_per_xs',
                    'label' => $this->l('Extra small devices'),
                    'tooltip' => $this->l('Phones (<768px)'),
                ),
                array(
                    'id' => 'pc_per_xxs',
                    'label' => $this->l('Extremely small devices'),
                    'tooltip' => $this->l('Phones (>480px)'),
                ),
            ),
            9 => array(
                array(
                    'id' => 'ac_per_xl',
                    'label' => $this->l('Extra large devices'),
                    'tooltip' => $this->l('Desktops (>1440px)'),
                ),
                array(
                    'id' => 'ac_per_lg',
                    'label' => $this->l('Large devices'),
                    'tooltip' => $this->l('Desktops (>1200px)'),
                ),
                array(
                    'id' => 'ac_per_md',
                    'label' => $this->l('Medium devices'),
                    'tooltip' => $this->l('Desktops (>992px)'),
                ),
                array(
                    'id' => 'ac_per_sm',
                    'label' => $this->l('Small devices'),
                    'tooltip' => $this->l('Tablets (>768px)'),
                ),
                array(
                    'id' => 'ac_per_xs',
                    'label' => $this->l('Extra small devices'),
                    'tooltip' => $this->l('Phones (<768px)'),
                ),
                array(
                    'id' => 'ac_per_xxs',
                    'label' => $this->l('Extremely small devices'),
                    'tooltip' => $this->l('Phones (>480px)'),
                ),
            ),
            10 => array(
                array(
                    'id' => 'pro_thumnbs_per_xl',
                    'label' => $this->l('Extra large devices'),
                    'tooltip' => $this->l('Desktops (>1440px)'),
                ),
                array(
                    'id' => 'pro_thumnbs_per_lg',
                    'label' => $this->l('Large devices'),
                    'tooltip' => $this->l('Desktops (>1200px)'),
                ),
                array(
                    'id' => 'pro_thumnbs_per_md',
                    'label' => $this->l('Medium devices'),
                    'tooltip' => $this->l('Desktops (>992px)'),
                ),
                array(
                    'id' => 'pro_thumnbs_per_sm',
                    'label' => $this->l('Small devices'),
                    'tooltip' => $this->l('Tablets (>768px)'),
                ),
                array(
                    'id' => 'pro_thumnbs_per_xs',
                    'label' => $this->l('Extra small devices'),
                    'tooltip' => $this->l('Phones (<768px)'),
                ),
                array(
                    'id' => 'pro_thumnbs_per_xxs',
                    'label' => $this->l('Extremely small devices'),
                    'tooltip' => $this->l('Phones (>480px)'),
                ),
            ),
        );
        return ($k!==null && isset($proper[$k])) ? $proper[$k] : $proper;
    }
    
    protected function updateConfigurableModules()
    {
        foreach ($this->getConfigurableModules() as $module)
		{
			if (!isset($module['is_module']) || !$module['is_module'] || !Validate::isModuleName($module['name']) || !Tools::isSubmit($module['name']))
				continue;

			$module_instance = Module::getInstanceByName($module['name']);
			if ($module_instance === false || !is_object($module_instance))
				continue;

			$is_installed = (int)Validate::isLoadedObject($module_instance);
			if ($is_installed)
			{
				if (($active = (int)Tools::getValue($module['name'])) == $module_instance->active)
					continue;

				if ($active)
					$module_instance->enable();
				else
					$module_instance->disable();
			}
			else
				if ((int)Tools::getValue($module['name']))
					$module_instance->install();
            Cache::clean('Module::isEnabled'.$module['name']);  
		}   
        Configuration::updateValue('PS_QUICK_VIEW', (int)Tools::getValue('quick_view'));
    }
    
    protected function getConfigurableModules()
	{
		return array(
            array(
                'label' => $this->l('Hover image'),
                'name' => 'sthoverimage',
                'value' => (int)Module::isEnabled('sthoverimage'),
                'is_module' => true,
                'desc' => $this->l('Display second product image on mouse hover.') 
            ),
			array(
				'label' => $this->l('Add this button'),
				'name' => 'staddthisbutton',
				'value' => (int)Module::isEnabled('staddthisbutton'),
				'is_module' => true,
                'desc' => $this->l('Display add this button on product page, article page.')
			),
            array(
                'label' => $this->l('Enable quick view'),
                'name' => 'quick_view',
                'value' => (int)Tools::getValue('PS_QUICK_VIEW', Configuration::get('PS_QUICK_VIEW'))
            ),
            array(
                'label' => $this->l('Products Comparison'),
                'name' => 'stcompare',
                'value' => (int)Module::isEnabled('stcompare'),
                'is_module' => true,
                'desc' => $this->l('Display products comparison button on right bar')
            ),
			array(
				'label' => $this->l('Facebook Like Box'),
				'name' => 'stfblikebox',
				'value' => (int)Module::isEnabled('stfblikebox'),
				'is_module' => true,
                'desc' => $this->l('Display facebook like box on page footer') 
			),
            array(
                'label' => $this->l('Twitter Embedded Timelines'),
                'name' => 'sttwitterembeddedtimelines',
                'value' => (int)Module::isEnabled('sttwitterembeddedtimelines'),
                'is_module' => true,
                'desc' => $this->l('Enable twitter embedded timelines')
            ),
			/*array(
				'label' => $this->l('Cart block mod'),
				'name' => 'strightbarcart',
				'value' => (int)Module::isEnabled('blockcart_mod'),
				'is_module' => true,
                'desc' => $this->l('Manage shopping cart icon and behaviors.')
			),*/
			array(
				'label' => $this->l('Social networking block'),
				'name' => 'stsocial',
				'value' => (int)Module::isEnabled('stsocial'),
				'is_module' => true,
                'desc' => 'Display links to your store\'s social accounts (Twitter, Facebook, etc.)'
			),
            array(
				'label' => $this->l('Display social sharing buttons on the products page'),
				'name' => 'socialsharing',
				'value' => (int)Module::isEnabled('socialsharing'),
				'is_module' => true,
			),
			array(
				'label' => $this->l('Enable top banner'),
				'name' => 'blockbanner',
				'value' => (int)Module::isEnabled('blockbanner'),
				'is_module' => true,
			),
			array(
				'label' => $this->l('Display your product payment logos'),
				'name' => 'productpaymentlogos',
				'value' => (int)Module::isEnabled('productpaymentlogos'),
				'is_module' => true,
			),
            array(
                'label' => $this->l('Next and previous links on product'),
                'name' => 'stproductlinknav',
                'value' => (int)Module::isEnabled('stproductlinknav'),
                'is_module' => true,
                'desc' => $this->l('Display next and previous links on product page') 
            ),
            array(
                'label' => $this->l('Next and previous links on blog'),
                'name' => 'stbloglinknav',
                'value' => (int)Module::isEnabled('stbloglinknav'),
                'is_module' => true,
                'desc' => $this->l('Display next and previous links on blog article page') 
            ),
            array(
                'label' => $this->l('Currency block mod'),
                'name' => 'blockcurrencies_mod',
                'value' => (int)Module::isEnabled('blockcurrencies_mod'),
                'is_module' => true,
                'desc' => $this->l('Display currency block on header and footer') 
            ),
            array(
                'label' => $this->l('Language block mod'),
                'name' => 'blocklanguages_mod',
                'value' => (int)Module::isEnabled('blocklanguages_mod'),
                'is_module' => true,
                'desc' => $this->l('Display language block on header and footer') 
            ),
            array(
                'label' => $this->l('QR code'),
                'name' => 'stqrcode',
                'value' => (int)Module::isEnabled('stqrcode'),
                'is_module' => true,
                'desc' => $this->l('Display QR code on sidebar') 
            ),
            /*array(
                'label' => $this->l('Quick search block mod'),
                'name' => 'blocksearch_mod',
                'value' => (int)Module::isEnabled('blocksearch_mod'),
                'is_module' => true,
                'desc' => $this->l('Display quick search block mod on header and footer') 
            ),
            array(
                'label' => $this->l('User info block mod'),
                'name' => 'blockuserinfo_mod',
                'value' => (int)Module::isEnabled('blockuserinfo_mod'),
                'is_module' => true,
                'desc' => $this->l('Display user info  block mod on header and footer') 
            ),
            */
		);
	}
    
    public function getImageHtml($src, $id)
    {
        $html = '';
        if ($src && $id)
            $html .= '
			<img src="'.$src.'" class="img_preview">
            <p>
                <a id="'.$id.'" href="javascript:;" class="btn btn-default st_delete_image"><i class="icon-trash"></i> Delete</a>
			</p>
            ';
        return $html;    
    }
    
    public function hookDisplayRightBar($params)
    {
        if(Configuration::get('STSN_SCROLL_TO_TOP'))
            return $this->display(__FILE__, 'to_top.tpl');
        else
            return false;
    }

    public function get_fontello()
    {
        $res= array(
            'css' => '',
            'theme_name' => '',
            'module_name' => $this->_path,
            'classes' => array(),
        );

        $theme_path = _PS_THEME_DIR_;

        $shop = new Shop((int)Context::getContext()->shop->id);
        $theme_name = $shop->getTheme();
        $res['theme_name'] = $theme_name;

        if (_THEME_NAME_ != $theme_name)
            $theme_path = _PS_ROOT_DIR_.'/themes/'.$theme_name.'/';

        if (file_exists($theme_path.'font/config.json'))
        {
            $icons = Tools::jsonDecode(Tools::file_get_contents($theme_path.'font/config.json'));
            if($icons && is_array($icons->glyphs))
                foreach ($icons->glyphs as $icon) {
                    $res['classes'][$icon->code] = 'icon-'.$icon->css;
                }
        }
        if (file_exists($theme_path.'sass/font-fontello/_icons.scss'))
        {
            $res['css'] .= Tools::file_get_contents($theme_path.'sass/font-fontello/_icons.scss');
        }

        return $res;
    }
    
    public function export()
    {
        $result = '';
        $exports = array();
        
        if (Shop::isFeatureActive() && Shop::getContext() != Shop::CONTEXT_SHOP)
            return $this->displayError($this->l('Please select a store to export configurations.'));
        
        $folder = $this->_config_folder;
        if (!is_dir($folder))
            return $this->displayError('"'.$folder.'" '.$this->l('directory isn\'t exists.'));
        elseif (!is_writable($folder))
            return $this->displayError('"'.$folder.'" '.$this->l('directory isn\'t writable.'));
        
        $file = date('YmdH').'_'.(int)Shop::getContextShopID().'.xml';
        
        foreach($this->defaults AS $k => $value)
            if (is_array($value) && isset($value['exp']) && $value['exp'] == 1)
                $exports[$k] = Configuration::get('STSN_'.strtoupper($k));
        
        $languages = Language::getLanguages(false);
        foreach($this->lang_array AS $value)
            if (key_exists($value, $exports))
                foreach ($languages as $language)
                    $exports[$value][$language['id_lang']] = Configuration::get('STSN_'.strtoupper($value), $language['id_lang']);
        
        $editor = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><!-- Copyright Sunnytoo.com --><stthemeeditor></stthemeeditor>');
        foreach($exports AS $key => $value)
        {
            if (in_array($key, $this->lang_array) && is_array($value))
            {
                $lang_text = $editor->addChild($key);
                foreach($value AS $id_lang => $v)
                    $lang_text->addChild('lang_'.$id_lang, Tools::htmlentitiesUTF8($v));
            }
            else
                $editor->addChild($key, $value);
        }
        
        $content = $editor->asXML();
        if (!file_put_contents($folder.$file, $content))
            return $this->displayError($this->l('Create config file failed.'));
        else
        {
            $link = '<a href="'.AdminController::$currentIndex.'&configure='.$this->name.'&token='.Tools::getAdminTokenLite('AdminModules').'&download'.$this->name.'&file='.$file.'">'._MODULE_DIR_.$this->name.'/config/'.$file.'</a>';
            return $this->displayConfirmation($this->l('Generate config file successfully, Click the link to download : ').$link);
        }   
    }
}
