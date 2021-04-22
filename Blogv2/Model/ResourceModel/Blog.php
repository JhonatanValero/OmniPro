<?php
namespace OmniPro\Blogv2\Model\ResourceModel;

class blog extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    public function __construct(
        \Magento\Framework\Model\ResourceModel\Db\Context $context
    )
    {
        parent::__construct($context);
    }

    protected function _construct()
    {
        $this->_init('omnipro_blog03', 'omniproBlog_id');
    }
}
