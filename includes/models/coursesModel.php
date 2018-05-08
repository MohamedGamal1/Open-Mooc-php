<?php

class coursesModel extends model
{
    protected $table= 'courses';

    /**
     * add courses
     * @param courseEntity $course
     */

    public function addCourse(courseEntity $course)
    {
        //array of data
        $data = [
                    'course_name'       => $course->getCourseName(),
                    'course_category'   => $course->getCourseCategory(),
                    'course_instructor' => $course->getCourseInstructor(),
                    'course_description'=> $course->getCourseDescription(),
                    'course_cover'       => $course->getCourseCover(),
                    'is_active'         => $course->getisActive()
        ];

        //Insert() & return boolean
        return $this->Insert($data);
    }

    /**
     * update course by id
     * @param courseEntity $course
     */

    public function updateCourse(courseEntity $course)
    {
        //array of data
        $data = [
            'course_id'         => $course->getCourseId(),
            'course_name'       => $course->getCourseName(),
            'course_category'   => $course->getCourseCategory(),
            'course_instructor' => $course->getCourseInstructor(),
            'course_description'=> $course->getCourseDescription(),
            'course_cover'      => $course->getCourseCover(),
            'is_active'         => $course->getisActive()
        ];

        // update by id
        return $this->Update($data, "WHERE `course_id`=" . $course->getCourseId());
    }

    /**
     * active or unactive course By ID
     * @param courseEntity $course
     */
    public function updateCourseActiveStatus(courseEntity $course)
    {
        $data = [
            'course_id'  => $course->getCourseId(),
            'is_active'  => $course->getisActive()
        ];
        return $this->Update($data, "WHERE `course_id` =".$course->getCourseId());
    }

    /**
     * delete user by ID
     * @param $id
     */

    public function deleteCourse($id)
    {
        return $this->Delete("WHERE `course_id` = $id");
    }

    /**
     * Get All Courses
     */

    public function getCourses()
    {
        $this->Execute("SELECT `{$this->table}`.`course_name` , `courses_categories`.`category_name` AS 'category_name' , `users`.`username` AS 'course_instructor' FROM `{$this->table}`
                                JOIN `courses_categories` ON `{$this->table}`.`course_category` = `courses_categories`.`category_id`
                                JOIN `users` ON `{$this->table}`.`course_instructor`=`users`.`id`");
        return $this->GetRows();
    }

    /**
     * get courses by instructor[name]
     */
    public function getCoursesByInstructor($instructorId)
    {
        $this->Execute("SELECT `{$this->table}`.`course_name` , `users`.`username` AS 'course_instructor' FROM `{$this->table}`
                                
                                JOIN `users` ON `{$this->table}`.`course_instructor`=`users`.`id`
                                WHERE `{$this->table}`.`course_instructor` = $instructorId ");
        return $this->GetRows();
    }

    /**
     * return courses by category names
     */
    public function getCoursesByCategory($keyword)
    {
        $this->Execute("SELECT `{$this->table}`.`course_name`, `courses_categories`.`category_name` AS 'category_name' FROM `{$this->table}` 
                                JOIN `courses_categories` 
                                ON `{$this->table}`.`course_category`=`courses_categories`.`category_id` 
                                WHERE `courses_categories`.`category_name` LIKE '%$keyword%' ");
        return $this->GetRows();
    }

    /**
     * return courses by student id
     * @param $studentId
     */
    public function getCoursesByStudentId($studentId)
    {
         $this->Execute("SELECT `courses_students`.`student_id` , `users`.`username` ,`{$this->table}`.`course_name` FROM `courses_students` 
                                        JOIN `{$this->table}` ON `courses_students`.`course_id` =`{$this->table}`.`course_id`
                                        JOIN `users` ON `courses_students`.`student_id` =`users`.`id`
                                        WHERE `courses_students`.`student_id`=$studentId");
        return $this->GetRows();
    }

    /**
     * get all active corses
     */
    public function getCoursesByActiveStatus($isActive)
    {
        $this->Execute("SELECT `{$this->table}`.`course_name` FROM `{$this->table}` WHERE `is_active`= $isActive");
        return $this->GetRows();
    }

    /**
     * rwturn course by id
     * @param $id
     */
    public function getCourse($id)
    {
        $this->Execute("SELECT `{$this->table}`.`course_id` , `{$this->table}`.`course_name` , `courses_categories`.`category_name` , `users`.`username`,`{$this->table}`.`course_description`, `{$this->table}`.`course_cover` FROM `{$this->table}` 
                                JOIN `courses_categories` ON `{$this->table}`.`course_category`= `courses_categories`.`category_id`
                                JOIN `users` ON `{$this->table}`.`course_instructor`=`users`.`id`
                                WHERE `{$this->table}`.`course_id` = $id ");
        return $this->GetRow();
    }

    /**
     * search courses
     */
    public function searchCourses($keyword)
    {
        $this->Execute("SELECT  `{$this->table}`.`course_name` , `courses_categories`.`category_name` , `users`.`username`,`{$this->table}`.`course_description`, `{$this->table}`.`course_cover` FROM `{$this->table}` 
                                JOIN `courses_categories` ON `{$this->table}`.`course_category`= `courses_categories`.`category_id`
                                JOIN `users` ON `{$this->table}`.`course_instructor`=`users`.`id`
                                WHERE `course_name` LIKE '%$keyword%'");
        return $this->GetRows();
    }


}