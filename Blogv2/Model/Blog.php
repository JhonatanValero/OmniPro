<?php
namespace OmniPro\Blogv2\Model;

/**
*   IMPLEMENTAR INTERFACE CORRESPONDIENTE (implements)
 */

class Blog extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface, \OmniPro\Blogv2\Api\Data\BlogInterface
{
    const CACHE_TAG = 'omnipro_blogv2_blog';

    const ID = 'omniproBlog_id';
    const TITLE = 'omniproBlog_titulo';
    const EMAIL = 'omniproBlog_emailAutor';
    const CONTENT = 'omniproBlog_contenido';
    const IMG = 'omniproBlog_urlimagen';

    /**
     * Model cache tag for clear cache in after save and after delete
     *
     * @var string
     */
    protected $_cacheTag = self::CACHE_TAG;

    /**
     * Prefix of model events names
     *
     * @var string
     */
    protected $_eventPrefix = 'blog';

    /**
     * @param \Magento\Framework\Model\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param \Magento\Framework\Model\ResourceModel\AbstractResource $resource
     * @param \Magento\Framework\Data\Collection\AbstractDb $resourceCollection
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\Model\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Model\ResourceModel\AbstractResource $resource = null,
        \Magento\Framework\Data\Collection\AbstractDb $resourceCollection = null,
        array $data = []
    ) {
        parent::__construct($context, $registry, $resource, $resourceCollection, $data);
    }

    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        // $this->_init('OmniPro\Blogv2\Model\ResourceModel\Blog');
        $this->_init(\OmniPro\Blogv2\Model\ResourceModel\Blog::class); // Constante que simboliza la ruta en string, como si fuera el namespace
    }

    /**
     * Return a unique id for the model.
     *
     * @return array
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function getId()
    {
        return $this->getData(self::ID);
    }

    public function getTitle()
    {
        return $this->getData(self::TITLE);
    }

    public function setTitle($title)
    {
        $this->setData(self::TITLE, $title);
    }

    public function getContent()
    {
        return $this->getData(self::CONTENT);
    }

    public function setContent($content)
    {
        $this->setData(self::CONTENT , $content);
    }

    public function getEmail()
    {
        return $this->getData(self::EMAIL);
    }

    public function setEmail($email)
    {
        $this->setData(self::EMAIL , $email);
    }

    public function getImg()
    {
        return $this->getData(self::IMG);
    }

    public function setImg($img)
    {
        $this->setData(self::IMG , $img);
    }
}