<?php

class commentLessonsEntity
{
    private $comment_id;

    /**
     * @return mixed
     */
    public function getCommentId()
    {
        return $this->comment_id;
    }

    /**
     * @param mixed $comment_id
     */
    public function setCommentId($comment_id)
    {
        $this->comment_id = $comment_id;
    }

    /**
     * @return mixed
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param mixed $comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    }

    /**
     * @return mixed
     */
    public function getCreatedBy()
    {
        return $this->created_by;
    }

    /**
     * @param mixed $created_by
     */
    public function setCreatedBy($created_by)
    {
        $this->created_by = $created_by;
    }

    /**
     * @return mixed
     */
    public function getLessonId()
    {
        return $this->lesson_id;
    }

    /**
     * @param mixed $lesson_id
     */
    public function setLessonId($lesson_id)
    {
        $this->lesson_id = $lesson_id;
    }
    private $comment;
    private $created_by;
    private $lesson_id;
}