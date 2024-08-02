<?php

/**
 *
 * @category  Custom Development
 * @email     contactus@learningmagento.com
 * @author    Avesh Naik
 * @website   learningmagento.com
 * @Date      02-08-2024
 */

namespace Avesh\Faq\Controller\Faqlist;

use Magento\Framework\App\ResponseInterface;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\Controller\ResultFactory;
use Avesh\Faq\Helper\Config;

/**
 * Class Index
 * @package Avesh\Faq\Controller\Faqlist
 */
class Index implements \Magento\Framework\App\ActionInterface
{

    /**
     * @var PageFactory
     */
    protected $_resultPageFactory;

    /**
     * @var resultFactory
     */
    protected $_resultFactory;

    /**
     * @var Config
     */
    protected $_config;


    /**
     * Index Controller constructor.
     *
     * @param PageFactory $resultPageFactory
     * @param ResultFactory $resultFactory
     * @param Config $config
     */
    public function __construct(
        PageFactory $resultPageFactory,
        ResultFactory $resultFactory,
        Config $config
    ) {
        $this->_resultPageFactory = $resultPageFactory;
        $this->_resultFactory = $resultFactory;
        $this->_config = $config;
    }

    /**
     * Execute action based on request and return result
     *
     * @return \Magento\Framework\Controller\ResultInterface|ResponseInterface
     * @throws \Magento\Framework\Exception\NotFoundException
     */
    public function execute()
    {
        if ($this->_config->isEnable()) {
            $resultPage = $this->_resultPageFactory->create();
            $pageTitle = $this->_config->getGeneralConfig(Config::TITLE);
            $resultPage->getConfig()->getTitle()->set($pageTitle);
            return $resultPage;
        }
        else {
            $resultForward = $this->_resultFactory->create(ResultFactory::TYPE_FORWARD);
            $resultForward->forward('noroute');
            return $resultForward;
        }

    }
}
