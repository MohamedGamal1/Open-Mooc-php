<?php

class courseEntity
{
    private $course_id;
    private $course_name;
    private $course_category;
    private $course_instructor;
    private $course_description;
    private $course_cover;
    private $is_active;

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
    public function getCourseName()
    {
        return $this->course_name;
    }

    /**
     * @param mixed $course_name
     */
    public function setCourseName($course_name)
    {
        $this->course_name = $course_name;
    }

    /**
     * @return mixed
     */
    public function getCourseCategory()
    {
        return $this->course_category;
    }

    /**
     * @param mixed $course_category
     */
    public function setCourseCategory($course_category)
    {
        $this->course_category = $course_category;
    }

    /**
     * @return mixed
     */
    public function getCourseInstructor()
    {
        return $this->course_instructor;
    }

    /**
     * @param mixed $course_instructor
     */
    public function setCourseInstructor($course_instructor)
    {
        $this->course_instructor = $course_instructor;
    }

    /**
     * @return mixed
     */
    public function getCourseDescription()
    {
        return $this->course_description;
    }

    /**
     * @param mixed $course_description
     */
    public function setCourseDescription($course_description)
    {
        $this->course_description = $course_description;
    }

    /**
     * @return mixed
     */
    public function getCourseCover()
    {
        return $this->course_cover;
    }

    /**
     * @param mixed $course_cover
     */
    public function setCourseCover($course_cover)
    {
        $this->course_cover = $course_cover;
    }

    /**
     * @return mixed
     */
    public function getisActive()
    {
        return $this->is_active;
    }

    /**
     * @param mixed $is_active
     */
    public function setIsActive($is_active)
    {
        $this->is_active = $is_active;
    }

}