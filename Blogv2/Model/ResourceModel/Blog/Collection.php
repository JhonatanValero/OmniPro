<?php
namespace OmniPro\Blogv2\Model\ResourceModel\Blog;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'omniproBlog_id';
	protected $_eventPrefix = 'omnipro_blogv2_blog_collection';
	protected $_eventObject = 'blog_collection';

    /**
     * Define the resource model & the model.
     *
     * @return void
     */
    protected function _construct()
    {
        //$this->_init('OmniPro\Blogv2\Model\blog', 'OmniPro\Blogv2\Model\ResourceModel\Blog');
        $this->_init(\OmniPro\Blogv2\Model\blog::class, \OmniPro\Blogv2\Model\ResourceModel\Blog::class); // -- Constante que simboliza la ruta del string, como si fuera el namespace
    }
}
