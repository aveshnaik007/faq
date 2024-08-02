<?php

/**
 *
 * @category  Custom Development
 * @email     contactus@learningmagento.com
 * @author    Avesh Naik
 * @website   learningmagento.com
 * @Date      30-07-2024
 */

namespace Avesh\Faq\Ui\DataProvider\Faq\Form;

use Magento\Ui\DataProvider\AbstractDataProvider;
use Avesh\Faq\Model\ResourceModel\Faq\Collection;

/**
 * Class DataProvider
 * @package Avesh\Faq\Ui\DataProvider\Faq\Form
 */
class DataProvider extends AbstractDataProvider
{
    /**
     * @var array
     */
    protected $_loadedData;

    /**
     * @var \Avesh\Faq\Model\ResourceModel\Faq\Collection
     */
    protected $collection;

    /**
     * Dataprovider Constructor
     *
     * @param string $name
     * @param string $primaryFieldName
     * @param string $requestFieldName
     * @param \Avesh\Faq\Model\ResourceModel\Faq\Collection $faqCollection
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        Collection $faqCollection
    ) {
        parent::__construct($name, $primaryFieldName, $requestFieldName);
        $this->collection = $faqCollection;
    }
    /**
     * Get data
     *
     * @return array
     */
    public function getData()
    {
        if (isset($this->_loadedData)) {
            return $this->_loadedData;
        }
        $items = $this->collection->getItems();
        foreach ($items as $faq) {
            $this->_loadedData[$faq->getId()] = $faq->getData();
        }
        return $this->_loadedData;
    }
}
