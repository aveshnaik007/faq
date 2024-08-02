<?php

/**
 *
 * @category  Custom Development
 * @email     contactus@learningmagento.com
 * @author    Avesh Naik
 * @website   learningmagento.com
 * @Date      02-08-2024
 */

namespace Avesh\Faq\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\ScopeInterface;

/**
 * Class Config
 * @package Avesh\Faq\Helper
 */
class Config extends AbstractHelper
{
    /**
     * General settings path
     */
    const XML_PATH_PATH = 'faq_settings/general_settings/';

    /**
     * Title value
     */
    const TITLE = 'title';

    /**
     * Get value of configuration
     * @param $field
     * @param $storeId
     * @return mixed
     */
    private function getConfigValue($field, $storeId = null)
    {
        return $this->scopeConfig->getValue(
            $field, ScopeInterface::SCOPE_STORE, $storeId
        );
    }

    /**
     * Get value of configuration publicly accessable
     * @param $code
     * @param $storeId
     * @return mixed
     */
    public function getGeneralConfig($code, $storeId = null)
    {
        return $this->getConfigValue(self::XML_PATH_PATH. $code, $storeId);
    }

    /**
     * Check if module is enabled or disabled
     *
     * @param $storeId
     * @return boolean
     */
    public function isEnable($storeId = null)
    {
        return $this->getConfigValue(self::XML_PATH_PATH .'enabled', $storeId);
    }
}
