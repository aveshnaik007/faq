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

/**
 * Class Faq
 * @package Avesh\Faq\Model
 */
class Faq extends \Magento\Framework\Model\AbstractModel implements FaqInterface
{

    /**
     * Setting the resource model class
     */
    public function _construct()
    {
        $this->_init(\Avesh\Faq\Model\ResourceModel\Faq::class);
    }

    /**
     * Get unique Faq id
     *
     * @return int
     */
    public function getFaqId()
    {
        return $this->getData(self::FAQ_ID);
    }

    /**
     * Get the question
     *
     * @return string
     */
    public function getQuestion()
    {
        return $this->getData(self::QUESTION);
    }

    /**
     * Set the question for Faq
     *
     * @param string $question
     * @return $this
     */
    public function setQuestion($question)
    {
        return $this->setData(self::QUESTION, $question);
    }

    /**
     * Get the answer of question
     *
     * @return string
     */
    public function getAnswer()
    {
        return $this->getData(self::ANSWER);
    }

    /**
     * Set the Answer for Faq
     *
     * @param string $answer
     * @return $this
     */
    public function setAnswer($answer)
    {
        return $this->setData(self::ANSWER, $answer);
    }

    /**
     * Get the Faq status
     *
     * @return boolean
     */
    public function getStatus()
    {
        return $this->getData(self::STATUS);
    }

    /**
     * Set the status for Faq
     *
     * @param boolean $status
     * @return $this
     */
    public function setStatus($status)
    {
        return $this->setData(self::STATUS, $status);
    }
}
