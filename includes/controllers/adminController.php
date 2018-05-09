<?php

//models
require_once MODELS.'/coursersCategoryEntity.php';
require_once MODELS.'/coursesCategoriesModel.php';


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

        throw new Exception('error when you geting un ppublish category');

    }

}