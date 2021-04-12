<?php
namespace OmniPro\Blog\ViewModel;

use function JmesPath\search;

class BlogViewModel implements \Magento\Framework\View\Element\Block\ArgumentInterface
{
    /**
     * @param  \OmniPro\Blog\Api\BlogRepositoryInterface
     */
    private $blogRepository;

    /**
     * @param \Magento\Framework\Api\SearchCriteriaBuilder
     */
    private $searchCriteriaBuilder;

    public function __construct(
        \OmniPro\Blog\Api\BlogRepositoryInterface $blogReposotory,
        \Magento\Framework\Api\SearchCriteriaBuilder $searchCriteriaBuilder
    )
    {
        $this->blogRepository = $blogReposotory;
        $this->searchCriteriaBuilder = $searchCriteriaBuilder;
    }

    public function getPost()
    {
        $searchCriteria = $this->searchCriteriaBuilder->create();
        $post = $this->blogRepository->getList($searchCriteria)->getItems();
        return $post;
    }

    public function getInfo()
    {
     $info = "A totally false statement";
     return $info;
    }
}
