<?php

/**
 *
 * @category  Custom Development
 * @email     contactus@learningmagento.com
 * @author    Avesh Naik
 * @website   learningmagento.com
 * @Date      29-07-2024
 */

namespace Avesh\Faq\Api;

interface FaqRepositoryInterface
{
    /**
     * Get Faq by Id
     * @param int $id
     * @return \Avesh\Faq\Api\Data\FaqInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getById($id);

    /**
     * Save Faq object
     * @param \Avesh\Faq\Api\Data\FaqInterface $faq
     * @throws \Magento\Framework\Exception\CouldNotSaveException
     * @return \Avesh\Faq\Api\Data\FaqInterface
     */
    public function save(\Avesh\Faq\Api\Data\FaqInterface $faq);

    /**
     * Delete the faq from database
     * @param \Avesh\Faq\Api\Data\FaqInterface $faq
     * @throws \Magento\Framework\Exception\CouldNotDeleteException
     * @return void
     */
    public function delete(\Avesh\Faq\Api\Data\FaqInterface $faq);

    /**
     * Get a list of faq objects
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Avesh\Faq\Api\Data\FaqSearchResultsInterface
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria);

    /**
     * Delete Faq using the ID
     *
     * @param int $faqId
     *
     * @return boolean
     * @throws \Magento\Framework\Exception\CouldNotDeleteException
     */
    public function deleteById($faqId);
}
