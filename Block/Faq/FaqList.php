<?php

/**
 *
 * @category  Custom Development
 * @email     contactus@learningmagento.com
 * @author    Avesh Naik
 * @website   learningmagento.com
 * @Date      02-08-2024
 */

namespace Avesh\Faq\Block\Faq;

use Magento\Framework\View\Element\Template\Context;

/**
 * Class Delete Button
 * @package Avesh\Faq\Block\Faq
 */
class FaqList extends \Magento\Framework\View\Element\Template
{
    /**
     * @var \Magento\Framework\Api\SearchCriteriaBuilder
     */
    protected $_seachCriteriaBuilder;

    /**
     * @var \Avesh\Faq\Api\FaqRepositoryInterface
     */
    protected $_faqRepository;

    /**
     * @var \Magento\Cms\Model\Template\FilterProvider
     */
    protected $_filterProvider;

    /**
     *  FaqList constructor
     *
     * @param \Magento\Framework\Api\SearchCriteriaBuilder $searchCriteriaBuilder
     * @param \Avesh\Faq\Api\FaqRepositoryInterface $faqRepository
     * @param \Magento\Cms\Model\Template\FilterProvider $filterProvider
     * @param Context $context
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\Api\SearchCriteriaBuilder $searchCriteriaBuilder,
        \Avesh\Faq\Api\FaqRepositoryInterface $faqRepository,
        \Magento\Cms\Model\Template\FilterProvider $filterProvider,
        Context $context,
        array $data = []
    ) {
        $this->_seachCriteriaBuilder = $searchCriteriaBuilder;
        $this->_faqRepository = $faqRepository;
        $this->_filterProvider = $filterProvider;
        parent::__construct($context, $data);
    }

    /**
     * Get a list of Faq
     *
     * @return \Avesh\Faq\Api\Data\FaqSearchResultsInterface
     */
    public function getFaqList()
    {
        // Filters can be added in search Criteria for pagination and other things
        $searchCriteria = $this->_seachCriteriaBuilder
            ->addFilter('status', 1, 'eq')
            ->create();

        return $this->_faqRepository->getList($searchCriteria);
    }

    /**
     * Filter faq content
     *
     * @param string $string
     * @return string
     */
    public function filterOutputHtml($string)
    {
        return $this->_filterProvider->getPageFilter()->filter($string);
    }
}
