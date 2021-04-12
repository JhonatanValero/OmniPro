<?php
namespace OmniPro\CustomCategoryAttribute\Observer;

class TopMenuObserverBefore implements \Magento\Framework\Event\ObserverInterface
{
    public function __construct()
    {
    }

    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $menu = $observer->getData('menu');
        $block = $observer->getData('block');
        $request = $observer->getData('request');
    }
}