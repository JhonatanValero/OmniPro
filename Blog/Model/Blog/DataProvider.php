<?php
namespace OmniPro\Blog\Model\Blog;

class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    protected $collection;
    protected $loadedData;
    
    /**
     * @param \Magento\Framework\App\Request\DataPersistorInterface
     */
    private $dataPersistor;

    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        \OmniPro\Blog\Model\ResourceModel\Blog\CollectionFactory $collection,
        \Magento\Framework\App\Request\DataPersistorInterface $dataPersistor,
        array $meta = [],
        array $data = []
    ) {
        $this->dataPersistor = $dataPersistor;
        $this->$collection = $collection->create();
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
    }

    public function getData()
    {
        if(isset($this->loadedData))
        {
            return $this->loadedData;
        }

        $items = $this->collection->getItems();

        foreach($items as $item)
        {
            $this->loaderData[$item->getId()] = $item->getData();
        }

        $data = $this->dataPersistor->get('omnipro_blog_blogitem');

        if(!empty($data))
        {
            $item = $this->collection->getNewEmptyItem();
            $item->setData($data);
            
        }

        return $this->loadedData;
    }
}
