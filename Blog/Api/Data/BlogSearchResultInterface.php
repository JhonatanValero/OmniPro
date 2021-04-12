<?php
namespace OmniPro\Blog\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;
use Magento\MediaGalleryApi\Api\SearchAssetsInterface;

interface BlogSearchResultInterface extends SearchResultsInterface
{
    /**
     * get Items
     *
     * @return \OmniPro\Blog\Api\Data\BlogInterface[]
     */
    public function getItems();

    /**
     * set Items
     *
     * @param \OmniPro\Blog\Api\Data\BlogInterface[]
     * @return void
     */
    public function setItems(array $items);
}
