<?php
namespace OmniPro\Blog\Block\Adminhtml\Blog\Edit;

class SaveButton implements \Magento\Framework\View\Element\UiComponent\Control\ButtonProviderFactory
{
    public function getButtonData()
    {
        return [
            'label' => __('Save Blog'),
            'class' => 'save primary',
            'data_attribute' => [
                'mage-init' => ['button' => ['event' => 'save']],
                'form-role' => 
            ]
        ]
    }
}
