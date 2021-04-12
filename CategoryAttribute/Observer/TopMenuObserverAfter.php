<?php
namespace OmniPro\CustomCategoryAttribute\Observer;

class TopMenuObserverAfter implements \Magento\Framework\Event\ObserverInterface
{
    public function __construct()
    {
    }

    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $menu = $observer->getData('menu');
        $transportObject = $observer->getData('transportObject');
    }
}