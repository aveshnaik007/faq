<?php

/**
 *
 * @category  Custom Development
 * @email     contactus@learningmagento.com
 * @author    Avesh Naik
 * @website   learningmagento.com
 * @Date      30-07-2024
 */

namespace Avesh\Faq\Ui\DataProvider\Faq;

use Magento\Ui\DataProvider\AbstractDataProvider;

/**
 * Class GridDataProvider
 * @package Avesh\Faq\Ui\DataProvider\Profile
 */
class GridDataProvider extends AbstractDataProvider
{

    /**
     * GridDataProvider constructor.
     *
     * @param string $name
     * @param string $primaryFieldName
     * @param string $requestFieldName
     * @param \Avesh\Faq\Model\ResourceModel\Faq\CollectionFactory $collectionFactory
     * @param array $addFieldStrategies
     * @param array $addFilterStrategies
     * @param array $meta
     * @param array $data
     */
    public function __construct(
        $name,
        $primaryFieldName,
        $requestFieldName,
        \Avesh\Faq\Model\ResourceModel\Faq\CollectionFactory $collectionFactory,
        array $addFieldStrategies = [],
        array $addFilterStrategies = [],
        array $meta = [],
        array $data = []
    ) {
        parent::__construct($name, $primaryFieldName, $requestFieldName, $meta, $data);
        $this->collection = $collectionFactory->create();
    }

    /**
     * Get data
     *
     * @return array
     */
    public function getData()
    {
        if (!$this->getCollection()->isLoaded()) {
            $this->getCollection()->load();
        }
        $items = $this->getCollection()->getData();
        foreach ($items as &$item) {
            $item['id_field_name'] = 'id';
        }
        return [
            'totalRecords' => $this->getCollection()->getSize(),
            'items' => array_values($items),
        ];
    }
}
