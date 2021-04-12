<?php
namespace OmniPro\CustomAttribute\ViewModel;

class AttributeViewModel implements \Magento\Framework\View\Element\Block\ArgumentInterface
{
    public function __construct()
    {
        
    }

    public function getAttribute(){
        return "Attribute 2";
    }
}
