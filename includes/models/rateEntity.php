<?php

class rateEntity
{
    private $rate_id;
    private $student_id;
    private $course_id;
    private $rate;
    private $rate_comment;
    /**
     * @return mixed
     */
    public function getRateId()
    {
        return $this->rate_id;
    }

    /**
     * @param mixed $rate_id
     */
    public function setRateId($rate_id)
    {
        $this->rate_id = $rate_id;
    }

    /**
     * @return mixed
     */
    public function getStudentId()
    {
        return $this->student_id;
    }

    /**
     * @param mixed $student_id
     */
    public function setStudentId($student_id)
    {
        $this->student_id = $student_id;
    }

    /**
     * @return mixed
     */
    public function getCourseId()
    {
        return $this->course_id;
    }

    /**
     * @param mixed $course_id
     */
    public function setCourseId($course_id)
    {
        $this->course_id = $course_id;
    }

    /**
     * @return mixed
     */
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * @param mixed $rate
     */
    public function setRate($rate)
    {
        $this->rate = $rate;
    }

    /**
     * @return mixed
     */
    public function getRateComment()
    {
        return $this->rate_comment;
    }

    /**
     * @param mixed $rate_comment
     */
    public function setRateComment($rate_comment)
    {
        $this->rate_comment = $rate_comment;
    }

}