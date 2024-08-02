<?php

/**
 *
 * @category  Custom Development
 * @email     contactus@learningmagento.com
 * @author    Avesh Naik
 * @website   learningmagento.com
 * @Date      30-07-2024
 */

namespace Avesh\Faq\Controller\Adminhtml\Faq;

use Magento\Framework\App\ResponseInterface;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

/**
 * Class Index
 * @package Avesh\Faq\Controller\Adminhtml\Faq
 */
class Index extends \Magento\Backend\App\Action
{

    /**
     * @var PageFactory
     */
    protected $_resultPageFactory;

    /**
     * Index constructor.
     *
     * @param Context     $context
     * @param PageFactory $resultPageFactory
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory
    ) {
        parent::__construct($context);
        $this->_resultPageFactory = $resultPageFactory;
    }

    /**
     * Execute action based on request and return result
     *
     * @return \Magento\Framework\Controller\ResultInterface|ResponseInterface
     * @throws \Magento\Framework\Exception\NotFoundException
     */
    public function execute()
    {
        $resultPage = $this->_resultPageFactory->create();
        $resultPage->setActiveMenu('Avesh_Faq::faq');
        $resultPage->getConfig()->getTitle()->prepend(__('Faq List'));
        return $resultPage;
    }
}
