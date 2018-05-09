<?php

// require all files
require_once '../includes/globals.php';
//controllers
require_once CONTROLLERS.'/controller.php';
require_once CONTROLLERS.'/adminController.php';


$added = false;
$message = '';

// all categories
$categoriesController = new coursesCategoriesModel();
if(count($_POST) > 0)
{
    $categoryAdd          = new coursersCategoryEntity();
    $categoryAdd->setCategoryName($_POST['category_name']);
    $categoryAdd->setIsActive($_POST['is_active']);
    $categoryAdd->setCreatedBy($_POST['created_by']);

    if($categoriesController->addCategory($categoryAdd))
    {
        $added   = true ;
        $message = 'Category add successfully';
    }
    else
    {
        $added   = false ;
        $message = 'Error , Category  not add successfully';
    }

}
// include templates
require_once INCLUDES.'/views/header.html';
require_once INCLUDES.'/views/addCategory.html';
require_once INCLUDES.'/views/footer.html';
