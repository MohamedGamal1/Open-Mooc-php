<?php

class coursesCategoriesModel extends  model
{
    protected $table = 'courses_categories';


    /**
     * add category
     */
    public function addCategory(coursersCategoryEntity $category)
    {
        return $this->Insert(['category_name' => $category->getCategoryName(),
                                'created_by'  => $category->getCreatedBy(),
                                'is_active'   => $category->getIsActive()
        ]);
    }

    /**
     * Update Category By ID
     */
    public function updateCategory(coursersCategoryEntity $category)
    {
        return $this->Update(['category_name' => $category->getCategoryName(),
                                'created_by'  => $category->getCreatedBy(),
                                 'is_active'   =>$category->getIsActive()
                                ] , "WHERE `category_id` = " . $category->getId()
        );
    }

    /**
     * Delete Category By Id
     * @param $categoryId
     * @return bool
     */
    public function deleteCategory($categoryId)
    {
        return $this->Delete("WHERE `category_id` = $categoryId");
    }


    /**
     * Get Category By Id
     */
    public function getCategory($categoryId)
    {
        $this->Execute("SELECT * FROM `{$this->table}` WHERE `category_id` = '$categoryId'");
        return $this->GetRow();
    }

    /**
     * Get All Courses
     */
    public function getCategories()
    {
        $this->Execute("SELECT `{$this->table}`.*  , `users`.`name` AS 'created_by' FROM `{$this->table}` LEFT JOIN `users` ON `{$this->table}`.`created_by`= `users`.`id` ");
        return $this->GetRows();
    }

    /**
     * Get Categories By Active OR Not Active
     * @param $isActive
     */

    public function getCategoriesByStatus($isActive)
    {
        $this->Execute("SELECT `{$this->table}`.* FROM `{$this->table}` WHERE `is_active`= $isActive");
        return $this->GetRows();
    }

    /**
     * Get Categories By Creator
     * @param $creatorId
     * @return array
     */
    public function getCategoriesByCreatorId($creatorId)
    {

        $this->Execute("SELECT `{$this->table}`.`category_id` , `{$this->table}`.`category_name`  , `users`.`username` AS 'Instructor Name' FROM `{$this->table}` LEFT JOIN `users` ON `{$this->table}`.`created_by`= `users`.`id` WHERE  `users`.`id`= $creatorId");
        return $this->GetRows();
    }

}
