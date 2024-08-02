<?php

/**
 *
 * @category  Custom Development
 * @email     contactus@learningmagento.com
 * @author    Avesh Naik
 * @website   learningmagento.com
 * @Date      30-07-2024
 */

namespace Avesh\Faq\Model\Source\Faq;

/**
 * Class Status
 * @package Avesh\Faq\Model\Source\Faq
 */
class Status extends \Magento\Eav\Model\Entity\Attribute\Source\AbstractSource
{

    /**
     * Retrieve All options
     *
     * @return array
     */
    public function getAllOptions()
    {
        return [
            [
                'value' => 1,
                'label' => __('Enabled'),
            ],
            [
                'value' => 0,
                'label' => __('Disabled'),
            ]
        ];
    }
}
