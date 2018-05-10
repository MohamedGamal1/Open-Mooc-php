<?php

// require all files
require_once '../includes/globals.php';
//controllers
require_once CONTROLLERS.'/controller.php';
require_once CONTROLLERS.'/adminController.php';
require_once INCLUDES.'/views/header.html';


// all categories
$categoriesOB = new adminController();
$categoriesModel = new coursesCategoriesModel();
// updated category
if(count($_POST) > 0)
{
    $categoryEntity          = new coursersCategoryEntity();
    $categoryEntity->setId($_POST['category_id']);
    $categoryEntity->setCategoryName($_POST['category_name']);
    $categoryEntity->setIsActive($_POST['is_active']);
    $categoryEntity->setCreatedBy($_POST['created_by']);
    //update message
    if($categoriesModel->updateCategory($categoryEntity))
    {
        $status  = true;
        $message = ' this category is updated ';
    }
    else
    {
        $status  = false;
        $message = ' this category is not updated ';
    }
    require_once VIEWS.'/updateCategory-result.html';


}
else
{
    $id = isset($_GET['id']) ? (int)($_GET['id']) : 0;
    $categoryData = $categoriesOB->getCategoryById($id);
    if(count($categoryData) > 0)
    {
        require_once VIEWS.'/updateCategory.html';
    }
    else
    {
        $status  = false;
        $message = ' this category not updated ';
        require_once VIEWS.'/updateCategory-result.html';
    }
}
// include templates
require_once INCLUDES.'/views/footer.html';
