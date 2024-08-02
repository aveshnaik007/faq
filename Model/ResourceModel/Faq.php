<?php

/**
 *
 * @category  Custom Development
 * @email     contactus@learningmagento.com
 * @author    Avesh Naik
 * @website   learningmagento.com
 * @Date      29-07-2024
 */

namespace Avesh\Faq\Model\ResourceModel;

/**
 * Class Faq
 * @package Avesh\Faq\Model\ResourceModel
 */

class Faq extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{

    /**
     * Resource initialization
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('avesh_faq', 'id');
    }
}
