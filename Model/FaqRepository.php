<?php

/**
 *
 * @category  Custom Development
 * @email     contactus@learningmagento.com
 * @author    Avesh Naik
 * @website   learningmagento.com
 * @Date      29-07-2024
 */

namespace Avesh\Faq\Model;

use Avesh\Faq\Api\Data\FaqInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NotFoundException;

/**
 * Class FaqRepository
 * @package Avesh\Faq\Model
 */
class FaqRepository implements \Avesh\Faq\Api\FaqRepositoryInterface
{
    /**
     * @var ResourceModel\Faq
     */
    protected $faqResource;

    /**
     * @var \Avesh\Faq\Api\Data\FaqInterfaceFactory
     */
    protected $faqInterfaceFactory;

    /**
     * @var CollectionProcessorInterface
     */
    protected $collectionProcessor;

    /**
     * @var \Avesh\Faq\Api\Data\FaqSearchResultsInterfaceFactory
     */
    protected $searchResultsFactory;

    /**
     * @var ResourceModel\Faq\CollectionFactory
     */
    protected $faqCollection;

    /**
     * FaqRepository Constructor
     *
     * @param \Avesh\Faq\Api\Data\FaqInterfaceFactory $faqInterfaceFactory
     * @param ResourceModel\Faq $faqResource
     * @param CollectionProcessorInterface $collectionProcessor
     * @param \Avesh\Faq\Api\Data\FaqSearchResultsInterfaceFactory $searchResultsFactory
     * @param ResourceModel\Faq\CollectionFactory $faqCollection
     */
    public function __construct(
        \Avesh\Faq\Api\Data\FaqInterfaceFactory $faqInterfaceFactory,
        \Avesh\Faq\Model\ResourceModel\Faq $faqResource,
        CollectionProcessorInterface $collectionProcessor,
        \Avesh\Faq\Api\Data\FaqSearchResultsInterfaceFactory $searchResultsFactory,
        \Avesh\Faq\Model\ResourceModel\Faq\CollectionFactory $faqCollection,
    )
    {
        $this->faqInterfaceFactory = $faqInterfaceFactory;
        $this->faqResource = $faqResource;
        $this->collectionProcessor = $collectionProcessor;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->faqCollection = $faqCollection;
    }

    /**
     * Get Faq by Id
     * @param int $id
     * @return \Avesh\Faq\Api\Data\FaqInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getById($id)
    {
        $faq = $this->faqInterfaceFactory->create();
        $this->faqResource->load($faq, $id);
        if(!$faq->getId()){
            throw new NotFoundException(__("Requested data does not exist."));
        }
        return $faq;
    }

    /**
     * Save Faq object
     * @param \Avesh\Faq\Api\Data\FaqInterface $faq
     * @return \Avesh\Faq\Api\Data\FaqInterface
     * @throws \Magento\Framework\Exception\CouldNotSaveException
     */
    public function save(\Avesh\Faq\Api\Data\FaqInterface $faq)
    {
        try{
            $this->faqResource->save($faq);
        }
        catch (\Exception $exception) {
            throw new CouldNotSaveException(__("Could not save the Faq"));
        }
        return $faq;
    }

    /**
     * Delete the faq from database
     * @param \Avesh\Faq\Api\Data\FaqInterface $faq
     * @return void
     * @throws \Magento\Framework\Exception\CouldNotDeleteException
     */
    public function delete(\Avesh\Faq\Api\Data\FaqInterface $faq)
    {
        try {
            $this->faqResource->delete($faq);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__("Something went wrong while deleting the Faq"));
        }
    }

    /**
     * Get a list of faq objects
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Avesh\Faq\Api\Data\FaqSearchResultsInterface
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $searchCriteria)
    {
        $collection = $this->faqCollection->create();
        $this->collectionProcessor->process($searchCriteria, $collection);

        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($searchCriteria);
        $searchResults->setItems($collection->getItems());
        $searchResults->setTotalCount($collection->getSize());
        return $searchResults;
    }

    /**
     * Delete Faq using the ID
     *
     * @param int $faqId
     *
     * @return boolean
     * @throws \Magento\Framework\Exception\CouldNotDeleteException
     */
    public function deleteById($faqId)
    {
        try {
            $this->delete($this->getById($faqId));
            return true;
        }
        catch (\Exception $exception) {
            throw new CouldNotDeleteException(__("Something went wrong while deleting the Faq"));
        }
    }
}
