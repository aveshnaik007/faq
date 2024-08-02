<?php

/**
 *
 * @category  Custom Development
 * @email     contactus@learningmagento.com
 * @author    Avesh Naik
 * @website   learningmagento.com
 * @Date      30-07-2024
 */

namespace Avesh\Faq\Block\Adminhtml\Faq\Edit\Button;

use Magento\Customer\Block\Adminhtml\Edit\GenericButton;
use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

/**
 * Class Delete Button
 * @package Avesh\Faq\Block\Adminhtml\Faq\Edit\Button
 */
class Delete extends GenericButton implements ButtonProviderInterface
{

    /**
     * @var \Magento\Backend\Block\Widget\Context
     */
    protected $_context;

    /**
     * Delete constructor.
     *
     * @param \Magento\Backend\Block\Widget\Context $context
     * @param \Magento\Framework\Registry $registry
     */
    public function __construct(
        \Magento\Backend\Block\Widget\Context $context,
        \Magento\Framework\Registry $registry
    ) {
        $this->_context = $context;
        parent::__construct($context, $registry);
    }

    /**
     * Retrieve button-specified settings
     *
     * @return array
     */
    public function getButtonData()
    {
        $message = __('Are you sure you want to do this?');
        $id = $this->_context->getRequest()->getParam('id');
        if($id) {
            return [
                'label' => __('Delete'),
                'class' => 'secondary',
                'on_click' => "confirmSetLocation('{$message}', '{$this->getDeleteUrl($id)}')",
                'sort_order' => 10
            ];
        }
    }

    /**
     * Get delete url
     *
     * @return string
     */
    private function getDeleteUrl($id)
    {
        return $this->getUrl('managefaq/faq/delete', ['id' => $id]);
    }
}
