<?php

namespace Avesh\Faq\Block\Adminhtml\Faq\Edit\Button;

use Magento\Customer\Block\Adminhtml\Edit\GenericButton;
use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

/**
 * Class Delete Button
 * @package Avesh\Faq\Block\Adminhtml\Faq\Edit\Button
 */
class Save extends GenericButton implements ButtonProviderInterface
{
    /**
     * Retrieve button-specified settings
     *
     * @return array
     */
    public function getButtonData()
    {
        return [
            'label' => __('Save'),
            'class' => 'save primary',
            'data_attribute' => [
                'mage-init' => ['button' => ['event' => 'save']],
                'form-role' => 'save',
            ],
            'sort_order' => 90,
           // 'on_click' => sprintf("location.href = '%s';", $this->getSave())
        ];
    }

    /**
     * Get Save Url
     * @return string
     */
    public function getSave()
    {
        return $this->getUrl('managefaq/faq/save');
    }
}
