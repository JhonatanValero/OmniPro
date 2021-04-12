<?php

namespace OmniPro\CategoryAttribute\ViewModel;

use Magento\Framework\Exception\LocalizedException;

class CategoryList implements \Magento\Framework\View\Element\Block\ArgumentInterface
{
    /**
     * @var \Magento\Catalog\Model\ResourceModel\Category\CollectionFactory
     */
    private $categoryFactory;
    /**
     * @var \Magento\Catalog\Model\Category
     */
    private $category;

    public function __construct(
        \Magento\Catalog\Model\ResourceModel\Category\CollectionFactory $categoryFactory,
        \Magento\Catalog\Model\Category $category
    ) {
        $this->categoryFactory = $categoryFactory;
        $this->category = $category;
    }

    /**
     * @return array
     */
    public function getList()
    {
        $collection = $this->categoryFactory->create();
        $items = [];
        $collection->addFieldToFilter('is_active', ['eq' => 1]);
        foreach ($collection as $key => $categoryData) {
            /** @var \Magento\Catalog\Model\Category $category */
            try {
                $category = $this->category->load($categoryData->getID());
                $items[$key]['image'] = $category->getImageUrl();
                $items[$key]['name'] = $category->getName();
            } catch (LocalizedException $e) {
            }
        }
        return $items;
    }
}
