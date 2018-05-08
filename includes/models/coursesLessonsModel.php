<?php

class coursesLessonsModel extends model
{
    protected $table = 'courses_lessons';

    /**
     * add lesson
     * @param lessonEntity $lesson
     */

    public function addLesson(lessonEntity $lesson)
    {
        $data = [
            'lesson_title'        => $lesson->getLessonTitle(),
            'lesson_course'       => $lesson->getLessonCourse(),
            'lesson_instructor'   => $lesson->getLessonInstructor(),
            'lesson_description'  => $lesson->getLessonDescription(),
            'lesson_video'        => $lesson->getLessonVideo()
        ];

        //insert
        return $this->Insert($data);
    }

    /**
     * update lesson by id
     * @param lessonEntity $lesson
     */

    public function updateLesson(lessonEntity $lesson)
    {
        $data = [
            'lesson_title'        => $lesson->getLessonTitle(),
            'lesson_course'       => $lesson->getLessonCourse(),
            'lesson_instructor'   => $lesson->getLessonInstructor(),
            'lesson_description'  => $lesson->getLessonDescription(),
            'lesson_video'        => $lesson->getLessonVideo()
        ];

        //update
        return $this->Update($data, "WHERE `lesson_id`=" .$lesson->getId());
    }

    /**
     * delete lession bu id
     * @param $lessonId
     */
    public function deleteLesson($lessonId)
    {
        return $this->Delete(" WHERE `lesson_id`=$lessonId ");
    }

    /**
     * get lesson by course id
     */
    public function getLessonsByCourseId($id)
    {
        $this->Execute("SELECT {$this->table}.`lesson_title` , `courses`.`course_name`
                                FROM {$this->table} LEFT JOIN `courses` 
                                ON {$this->table}.`lesson_course`=`courses`.`course_id`
                                WHERE `courses`.`course_id`= $id");
        return $this->GetRows();
    }

    /**
     * get lesson by instructor
     */

    public function getLessonsByInstructorId($id)
    {
        $this->Execute("SELECT {$this->table}.`lesson_title` , `users`.`username`
                                FROM {$this->table} LEFT JOIN `users` 
                                ON {$this->table}.`lesson_instructor`=`users`.`id`
                                WHERE `users`.`id`= $id");
        return $this->GetRows();

    }

}