<?php

//models
require_once MODELS.'/coursersCategoryEntity.php';
require_once MODELS.'/coursesCategoriesModel.php';
require_once MODELS.'/courseEntity.php';
require_once MODELS.'/coursesModel.php';


class adminController extends  controller
{

    //                                     categories
    /**
     * return all categories
     */
    public function allCategories()
    {
        $categoriesRepo = new coursesCategoriesModel();
        $categories     = $categoriesRepo->getCategories();
        if(count($categories) > 0)
            return $categories;

        throw new Exception('error when you deleting category');
    }



    /**
     * delete caregory by id
     */
    public function deleteCategory($id)
    {
        $categoryRepo  = new coursesCategoriesModel();
        $category      = $categoryRepo->deleteCategory($id);
        if($category)
            return $category;

        throw new Exception('error when you deleting category');
    }

    /**
     * get un active caategory
     */
    public function getCategoriesByStatus($isActive)
    {
        $categorryRepo = new coursesCategoriesModel();
        $categories    = $categorryRepo->getCategoriesByStatus($isActive);
        if($categories)
            return $categories;

        throw new Exception('error when you geting un publish category');

    }

    /**
     * get category by id
     */
    public function getCategoryById($categoryId)
    {
        $categoryRepo = new coursesCategoriesModel();
        $category     = $categoryRepo->getCategory($categoryId);
        if ($category)
            return $category;

        throw  new Exception('error when you retrieving category');
    }

    ////////////////////////////////////////////////////////////////
    //===========================================================//
    ///////////////////////// courses /////////////////////////////
    //===========================================================//
    ///////////////////////////////////////////////////////////////


    /**
     * return all courses
     */
    public function  getCourses()
    {
        $coursesRepo = new coursesModel();
        $courses     = $coursesRepo->getCourses();
        if($courses)
            return $courses;

        throw new  Exception("error when you return all courses ");
    }


}