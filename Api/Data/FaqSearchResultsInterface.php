<?php

/**
 *
 * @category  Custom Development
 * @email     contactus@learningmagento.com
 * @author    Avesh Naik
 * @website   learningmagento.com
 * @Date      29-07-2024
 */

namespace Avesh\Faq\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

/**
 * Interface FaqSearchResultsInterface
 * @package Avesh\Faq\Api\Data
 */
interface FaqSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Get Items
     * @return \Avesh\Faq\Api\Data\FaqInterface[]
     */
    public function getItems();

    /**
     * Set Items
     * @param \Avesh\Faq\Api\Data\FaqInterface[] $items
     * @return void
     */
    public function setItems(array $items);
}
