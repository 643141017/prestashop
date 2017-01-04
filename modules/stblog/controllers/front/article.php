<?php
/*
* 2007-2014 PrestaShop
*
* NOTICE OF LICENSE
*
* This source file is subject to the Open Software License (OSL 3.0)
* that is bundled with this package in the file LICENSE.txt.
* It is also available through the world-wide-web at this URL:
* http://opensource.org/licenses/osl-3.0.php
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
*  @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
*  International Registered Trademark & Property of PrestaShop SA
*/

include_once(dirname(__FILE__).'/../../classes/controller/FrontController.php');

class StblogArticleModuleFrontController extends StblogModuleFrontController
{
	protected $blog;
	
    public function init()
	{
        parent::init();

		$id_blog = (int)Tools::getValue('id_blog');
        if (!$id_blog || !Validate::isUnsignedId($id_blog))
			Tools::redirect('index.php?controller=404');
            
		$this->blog = new StBlogClass($id_blog, $this->context->language->id, $this->context->shop->id);

        if (!Validate::isLoadedObject($this->blog) || !$this->blog->active || !$this->blog->isAssociatedToShop())
		{
			header('HTTP/1.1 404 Not Found');
			header('Status: 404 Not Found');
			$this->errors[] = Tools::displayError($this->l('Blog not found'));
		}
    }
	public function initContent()
	{
		parent::initContent();
        if(!$this->errors)
		{
		    if(Configuration::get('ST_BLOG_DISPLAY_VIEWCOUNT'))
                StBlogClass::setPageViewed($this->blog->id, $this->context->shop->id);
            
		    $id_lang = (int)$this->context->language->id;
    		// Datas
    		$categories = StBlogClass::getBlogCategories($this->blog->id, $id_lang);
            if($this->blog->type==1)
            {
                $cover = StBlogImageClass::getCoverImage($this->blog->id, $id_lang,1);
                if($cover)
                    $this->context->smarty->assign('cover',StBlogImageClass::getImageLinks($cover));
            }
            if($this->blog->type==2)
            {
                $cover = StBlogImageClass::getCoverImage($this->blog->id, $id_lang,2);
                if($cover)
                    $this->context->smarty->assign('cover',StBlogImageClass::getImageLinks($cover));
                
                $galleries = StBlogImageClass::getGalleries($this->blog->id, $id_lang);
                if($galleries)
                {
                    foreach($galleries as &$v)
                        $v = StBlogImageClass::getImageLinks($v);
                    $this->context->smarty->assign('galleries',$galleries);
                } 
            }
            if($this->blog->type==3)
            {
                $cover = StBlogImageClass::getCoverImage($this->blog->id, $id_lang,1);
                if($cover)
                    $this->context->smarty->assign('cover',StBlogImageClass::getImageLinks($cover));
            }
            
            $blog_tags = $this->blog->getBlogTags($id_lang);
            
            $related_products = $this->blog->getLinkProducts(true);
    		$this->context->smarty->assign(array(
				'blog' => $this->blog,
				'blog_tags' => $blog_tags,
				'related_products' => $related_products,
				'categories' => $categories,
                'imageSize' => StBlogImageClass::$imageTypeDef,
			    'path' => $this->getPath($this->blog->id_st_blog_category_default,$this->blog->name),
                'blogRelatedDisplayPrice' => Configuration::get('ST_BLOG_RELATED_DISPLAY_PRICE'),
                'slideshow' => Configuration::get('ST_BLOG_RELATED_SLIDESHOW'),
                's_speed' => Configuration::get('ST_BLOG_RELATED_S_SPEED'),
                'a_speed' => Configuration::get('ST_BLOG_RELATED_A_SPEED'),
                'pause_on_hover' => Configuration::get('ST_BLOG_RELATED_PAUSE'),
                'rewind_nav' => Configuration::get('ST_BLOG_RELATED_LOOP'),
                'move' => Configuration::get('ST_BLOG_RELATED_MOVE'),
                'lazy_load' => Configuration::get('ST_BLOG_RELATED_LAZY'),
                'title_position' => Configuration::get('ST_BLOG_RELATED_TITLE'),
                'direction_nav' => Configuration::get('ST_BLOG_RELATED_DIRECTION_NAV'),
                'control_nav' => Configuration::get('ST_BLOG_RELATED_CONTROL_NAV'),
			    'homeSize' => Image::getSize(ImageType::getFormatedName('home')),
    		    'HOOK_ST_BLOG_ARTICLE_FOOTER' => Hook::exec('displayStBlogArticleFooter'),
    		    'HOOK_ST_BLOG_ARTICLE_SECONDARY' => Hook::exec('displayStBlogArticleSecondary'),
                'display_viewcount' => Configuration::get('ST_BLOG_DISPLAY_VIEWCOUNT'),
                'pro_per_xl'       => (int)Configuration::get('STSN_BLOG_R_PRO_PER_XL_0'),
	            'pro_per_lg'       => (int)Configuration::get('STSN_BLOG_R_PRO_PER_LG_0'),
	            'pro_per_md'       => (int)Configuration::get('STSN_BLOG_R_PRO_PER_MD_0'),
	            'pro_per_sm'       => (int)Configuration::get('STSN_BLOG_R_PRO_PER_SM_0'),
	            'pro_per_xs'       => (int)Configuration::get('STSN_BLOG_R_PRO_PER_XS_0'),
	            'pro_per_xxs'       => (int)Configuration::get('STSN_BLOG_R_PRO_PER_XXS_0'),
    		));
        }
		$this->context->smarty->assign('errors', $this->errors);
		$this->setTemplate('article.tpl');
	}

}