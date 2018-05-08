<?php

class coursesRateModel extends model
{
    protected $table ='courses_rate';

    /**
     * add rate
     * @param rateEntity $rate
     * @return mixed
     */
    public function addRate(rateEntity $rate)
    {
        $data = [
                'student_id'   => $rate->getStudentId(),
                'course_id'    => $rate->getCourseId(),
                'rate'         => $rate->getRate(),
                'rate_comment' => $rate->getRateComment()
        ];
        return $this->Insert($data);
    }

    /**
     * update Rate by id
     */
    public function updateRate(rateEntity $rate)
    {

        $data = [
            'student_id'   => $rate->getStudentId(),
            'course_id'    => $rate->getCourseId(),
            'rate'         => $rate->getRate(),
            'rate_comment' => $rate->getRateComment()
        ];
        return $this->Update($data, "WHERE `rate_id`=".$rate->getRateId());
    }

    /**
     * delete rate by id
     */
    public function deleteRate($id)
    {
        return $this->Delete("WHERE `rate_id`=$id");
    }

    /**
     * get rate by course id
     */
    public function getRateByCourseId($courseId)
    {
        $this->Execute("SELECT  `{$this->table}`.`rate_comment` , `users`.`username`,`courses`.`course_name` ,`{$this->table}`.`rate`FROM `{$this->table}` 
                                JOIN `users` ON `{$this->table}`.`student_id`=`users`.`id`
                                JOIN `courses` ON `{$this->table}`.`course_id`=`courses`.`course_id` WHERE `courses`.`course_id`=$courseId");
        return $this->GetRows();
    }

    /**
     * get average by course id
     */
    public function getAVGRateByCourseId($courseId)
    {
        //aggregation to select avg rate
        $this->Execute("SELECT  `{$this->table}`.`rate_comment` , `users`.`username`,`courses`.`course_name`, AVG(`{$this->table}`.`rate`) AS 'average_rate' FROM `{$this->table}` 
                                JOIN `users` ON `{$this->table}`.`student_id`=`users`.`id`
                                JOIN `courses` ON `{$this->table}`.`course_id`=`courses`.`course_id` 
                                WHERE `courses`.`course_id`=$courseId");
        return $this->GetRows();
    }

}