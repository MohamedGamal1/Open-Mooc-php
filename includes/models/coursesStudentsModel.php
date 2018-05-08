<?php

class coursesStudentsModel extends model
{
    protected $table = 'courses_students';

    /**
     * add student
     * @param studentsEntity $student
     * @return bool
     */
    public function addStudentToCourse(studentsEntity $student)
    {
        $data = [
                'student_id'   => $student->getStudentId(),
                'course_id'    => $student->getCourseId(),
                'is_approved'  => $student->getisApproved()
        ];

        return $this->Insert($data);
    }

    /**
     * approve or not approve subscription
     * @param $subId
     * @param int $approved
     */
    public function approveSubscription(studentsEntity $student)
    {
        $data = [
            'is_approved'  => $student->getisApproved()
        ];

        return $this->Update($data,"WHERE `id`=".$student->getId());
    }

    /**
     * delete subscription by id
     * @param $subId
     */
    public function deleteSubscription($subId)
    {
        return $this->Delete("WHERE `id`=$subId");
    }

    /**
     * check subscription
     * @param $studentId
     * @param $courseId
     */
    public function checkSubscription($studentId,$courseId)
    {
        $this->Execute("SELECT `{$this->table}`.`is_approved` , `courses`.`course_name`,`users`.`username` FROM `{$this->table}`
                                JOIN `courses` ON `{$this->table}`.`course_id`= `courses`.`course_id` 
                                JOIN `users` ON `{$this->table}`.`student_id` =`users`.`id`
                                WHERE `{$this->table}`.`is_approved` = 1");
        return $this->GetRows();
    }


}