<?php
namespace OmniPro\Prueba\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;
use Magento\MediaGalleryApi\Api\SearchAssetsInterface;

interface BlogSearchResultInterface extends SearchResultsInterface
{
    /**
     * @return \OmniPro\Blog\Api\Data\BlogInterface[]
     */
    public function getItems();
 
    /**
     * @param \OmniPro\Blog\Api\Data\BlogInterface[] $items
     * @return void
     */
    public function setItems(array $items);
}
