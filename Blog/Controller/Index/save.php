<?php
namespace OmniPro\Blog\Controller\Index;

use \Magento\Framework\Controller\ResultFactory;

class save extends \Magento\Framework\App\Action\Action
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $_pageFactory;

    /**
     * @var  \OmniPro\Blog\Api\Data\BlogInterfaceFactory
     */
    protected $_blogInterfaceFactory;

    /**
     * @var \OmniPro\Blog\Api\BlogRepositoryInterface
     */
    protected $_blogRepository;

    /**
     * @param \Magento\Framework\App\Action\Context $context
     */
    public function __construct(
       \Magento\Framework\App\Action\Context $context,
       \Magento\Framework\View\Result\PageFactory $pageFactory,
       \OmniPro\Blog\Api\Data\BlogInterfaceFactory $blogInterfaceFactory,
       \OmniPro\Blog\Api\BlogRepositoryInterface $blogRepository
    )
    {
        $this->_pageFactory = $pageFactory;
        $this->_blogRepository = $blogRepository;
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
         * @var \OmniPro\Blog\Model\Blog $blog
         */
        $blog = $this->_blogInterfaceFactory->create();
        $blog->setTitle($params['titulo'] ?? '');
        $blog->setEmail($params['email'] ?? '');
        $blog->setContent($params['contenido'] ?? '');
        $blog->setImg($params['img'] ?? '');
        $this->_blogRepository->save($blog);
        /**
         * @var \Magento\Framework\Controller\Result\Json $result
         */
        
        return $this->_redirect('*/*/index');
    }
}
