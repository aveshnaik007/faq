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
use Magento\Framework\App\ResponseInterface;

/**
 * Class Save
 * @package Avesh\Faq\Controller\Adminhtml\Faq
 */
class Save extends \Magento\Backend\App\Action
{

    /**
     * @var \Avesh\Faq\Api\FaqRepositoryInterface
     */
    protected $_faqRepository;

    /**
     * @var \Avesh\Faq\Api\Data\FaqInterfaceFactory
     */
    protected $_faqFactory;

    /**
     * Save Controller constructor.
     *
     * @param \Avesh\Faq\Api\FaqRepositoryInterface $faqRepository
     * @param \Avesh\Faq\Api\Data\FaqInterfaceFactory $faqFactory
     * @param Context $context
     */
    public function __construct(
        \Avesh\Faq\Api\FaqRepositoryInterface $faqRepository,
        \Avesh\Faq\Api\Data\FaqInterfaceFactory $faqFactory,
        Context $context
    ) {
        $this->_faqRepository = $faqRepository;
        $this->_faqFactory = $faqFactory;
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
            $faq = $this->_faqFactory->create();
            if(isset($params["id"]) && $params["id"]){
                $faq = $this->_faqRepository->getById($params["id"]);
            }
            $faq->setAnswer($params["answer"])
                ->setQuestion($params["question"])
                ->setStatus($params["status"]);
            $this->_faqRepository->save($faq);
            $this->messageManager->addSuccessMessage(__("Faq saved Successfully"));
        }
        catch (\Exception $exception) {
           // $this->messageManager->addErrorMessage(__("Something went wrong while saving it"));
            $this->messageManager->addErrorMessage($exception->getMessage());
        }
        $redirect = $this->resultRedirectFactory->create();
        return $redirect->setPath('*/*/index');
    }
}
