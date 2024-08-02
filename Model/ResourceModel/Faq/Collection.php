<?php

/**
 *
 * @category  Custom Development
 * @email     contactus@learningmagento.com
 * @author    Avesh Naik
 * @website   learningmagento.com
 * @Date      29-07-2024
 */

namespace Avesh\Faq\Model\ResourceModel\Faq;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

/**
 * Class Collection
 * @package Avesh\Faq\Model\ResourceModel\Faq
 */

class Collection extends AbstractCollection
{
    /**
     * Collection Mapping of module and resource model
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function _construct()
    {
        $this->_init(\Avesh\Faq\Model\Faq::class, \Avesh\Faq\Model\ResourceModel\Faq::class);
        $this->_setIdFieldName($this->getResource()->getIdFieldName());
    }
}
