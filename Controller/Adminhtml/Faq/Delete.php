<?php

/**
 *
 * @category  Custom Development
 * @email     contactus@learningmagento.com
 * @author    Avesh Naik
 * @website   learningmagento.com
 * @Date      02-08-2024
 */

namespace Avesh\Faq\Controller\Adminhtml\Faq;

use Magento\Backend\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Exception\LocalizedException;

/**
 * Class Delete
 * @package Avesh\Faq\Controller\Adminhtml\Faq
 */
class Delete extends \Magento\Backend\App\Action
{

    /**
     * @var \Avesh\Faq\Api\FaqRepositoryInterface
     */
    protected $_faqRepository;

    /**
     * Delete Controller constructor.
     *
     * @param \Avesh\Faq\Api\FaqRepositoryInterface $faqRepository
     * @param Context $context
     */
    public function __construct(
        \Avesh\Faq\Api\FaqRepositoryInterface $faqRepository,
        Context $context
    ) {
        $this->_faqRepository = $faqRepository;
        parent::__construct($context);
    }

    /**
     * Execute action based on request and return result
     *
     * @return \Magento\Framework\Controller\ResultInterface|ResponseInterface
     * @throws \Magento\Framework\Exception\NotFoundException
     */
    public function execute()
    {
        try {
            $params = $this->getRequest()->getParams();
            if(isset($params["id"]) && $params["id"]){
                $this->_faqRepository->deleteById($params["id"]);
            }
            else {
                throw new LocalizedException(__("Id of Faq is missing"));
            }
            $this->messageManager->addSuccessMessage(__("Faq saved Successfully"));
        }
        catch (\Exception $exception) {
            $this->messageManager->addErrorMessage(__("Something went wrong while saving it"));
        }
        $redirect = $this->resultRedirectFactory->create();
        return $redirect->setPath('*/*/index');
    }
}
