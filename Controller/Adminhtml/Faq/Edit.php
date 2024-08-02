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

use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

/**
 * Class Edit
 * @package Avesh\Faq\Controller\Adminhtml\Faq
 */
class Edit extends \Magento\Backend\App\Action
{
    /**
     * @var PageFactory
     */
    protected $_resultPageFactory;

    /**
     * @var \Avesh\Faq\Api\FaqRepositoryInterface
     */
    protected $_faqRepository;


    /**
     * Edit constructor.
     *
     * @param Context $context
     * @param PageFactory $resultPageFactory
     * @param \Avesh\Faq\Api\FaqRepositoryInterface $faqRepository
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        \Avesh\Faq\Api\FaqRepositoryInterface $faqRepository
    ) {
        parent::__construct($context);
        $this->_resultPageFactory = $resultPageFactory;
        $this->_faqRepository = $faqRepository;
    }


    /**
     * Execute action based on request or forwared and return result
     *
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface|\Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        try {
            $resultPage = $this->_resultPageFactory->create();
            $resultPage->setActiveMenu('Avesh_Faq::faq');

            $id = $this->getRequest()->getParam('id');
            if (isset($id) and !empty($id)) {
                $faq = $this->_faqRepository->getById($id);
                if($faq->hasData()) {
                    $resultPage->getConfig()->getTitle()->prepend(__('Edit Faq'));
                }
                else {
                    $resultPage->getConfig()->getTitle()->prepend(__('New Faq'));
                }
            }
            else {
                $resultPage->getConfig()->getTitle()->prepend(__('New Faq'));
            }
            return $resultPage;
        }
        catch (\Exception $exception) {
            $this->messageManager->addErrorMessage(__($exception->getMessage()));
        }
        return $this->_redirect('*/*/index');
    }
}
