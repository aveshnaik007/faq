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

/**
 * Interface FaqInterface
 * @package Avesh\Faq\Api\Data
 */
interface FaqInterface
{
    /**
     * Unique Id of the table
     */
    const FAQ_ID = 'id';

    /**
     * Question for Faq
     */
    const QUESTION = 'question';

    /**
     * An anwser for Faq
     */
    const ANSWER = 'answer';

    /**
     * Status for a Faq
     */
    const STATUS = 'status';

    /**
     * Get unique Faq id
     *
     * @return int
     */
    public function getFaqId();

    /**
     * Get the question
     *
     * @return string
     */
    public function getQuestion();

    /**
     * Set the question for Faq
     *
     * @param string $question
     * @return $this
     */
    public function setQuestion($question);

    /**
     * Get the answer of question
     *
     * @return string
     */
    public function getAnswer();

    /**
     * Set the Answer for Faq
     *
     * @param string $answer
     * @return $this
     */
    public function setAnswer($answer);

    /**
     * Get the Faq status
     *
     * @return boolean
     */
    public function getStatus();

    /**
     * Set the status for Faq
     *
     * @param boolean $status
     * @return $this
     */
    public function setStatus($status);
}
