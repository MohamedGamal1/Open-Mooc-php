<?php

class coursesLessonsCommentsModel extends model
{
    protected $table = 'courses_lessons_comments';

    public function addComment(commentLessonsEntity $comments)
    {
        $data = [
                    'comment'    => $comments->getComment(),
                    'created_by' => $comments->getCreatedBy(),
                    'lesson_id'  => $comments->getLessonId()
        ];
        return $this->Insert($data);
    }

    /**
     * update comment by id
     * @param commentLessonsEntity $comments
     * @return bool
     */

    public function updateComment(commentLessonsEntity $comments)
    {

        $data = [
            'comment'    => $comments->getComment(),
            'created_by' => $comments->getCreatedBy(),
            'lesson_id'  => $comments->getLessonId()
        ];
        return $this->Update($data, "WHERE `comment_id`=".$comments->getCommentId());
    }

    /**
     * delete comment by id
     */
    public function deleteComment($id)
    {
        return $this->Delete("WHERE `comment_id`=$id");
    }

    public function getCommentsByUserId($id)
    {
        $this->Execute("SELECT  `{$this->table}`.`comment` ,`users`.`username` FROM 
                                        `{$this->table}` LEFT JOIN `users` 
                                        ON `{$this->table}`.`created_by`=`users`.`id` WHERE `users`.`id`=$id");
        return $this->GetRows();
    }

    public function getCommentsByLessonId($id)
    {
        $this->Execute("SELECT  `{$this->table}`.`comment` ,`courses_lessons`.`lesson_title` FROM 
                                        `{$this->table}` LEFT JOIN `courses_lessons` 
                                        ON `{$this->table}`.`lesson_id`=`courses_lessons`.`lesson_id` WHERE `courses_lessons`.`lesson_id`=$id");
        return $this->GetRows();
    }
}