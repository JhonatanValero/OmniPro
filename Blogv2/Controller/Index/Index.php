<?php
namespace OmniPro\Blogv2\Controller\Index;

use \Magento\Framework\Controller\ResultFactory;
class Index extends \Magento\Framework\App\Action\Action
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $_pageFactory;

    /**
     * @var \OmniPro\Blogv2\Api\Data\BlogInterfaceFactory
     */
    protected $_blogInterfaceFactory;

    /**
     * @param \Magento\Framework\App\Action\Context $context
     */
    public function __construct(
       \Magento\Framework\App\Action\Context $context,
       \Magento\Framework\View\Result\PageFactory $pageFactory,
       \OmniPro\Blogv2\Api\Data\BlogInterfaceFactory $blogInterfaceFactory
    )
    {
        $this->_pageFactory = $pageFactory;
        $this->_blogInterfaceFactory = $blogInterfaceFactory;
        return parent::__construct($context);
    }
    /**
     * View page action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $params = $this->_request->getParams();
        /**
         * @var \OmniPro\Blogv2\Api\Data\Blog
         */
        $blog = $this->_blogInterfaceFactory->create();
        $blog->setTitle($params['titulo']);
        $blog->setContent($params['contenido']);
        $blog->setEmail($params['email']);
        $blog->setImg($params['img']);
        //$blog->save();

        $result = $this->resultFactory->create(ResultFactory::TYPE_JSON);
        $result->setData([
            'error' => 'false',
            'id' => $blog->getId()
        ]);
        return $result;

        //return $this->_pageFactory->create();
    }
}
