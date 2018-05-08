<?php

// require all files
require_once '../includes/globals.php';
//controllers
require_once CONTROLLERS.'/controller.php';
require_once CONTROLLERS.'/adminController.php';

$deleted = false;
$message  = '';

// include templates
require_once INCLUDES.'/views/header.html';
// use try and catch
try{
    $id = isset($_GET['id'])? (int)($_GET['id']) : 0;
    //  categories
    $categoriesController = new adminController();
    if($categories = $categoriesController->deleteCategory($id))
    {
        $deleted = true;
        $message = 'Message Deleted Successfully';
    }
    else
    {
        $deleted = false;
        $message = 'Error Deleting Message';
    }

}catch (Exception $e){
    $deleted = false;
    $message = $e->getMessage();
    echo ' Not Deleted ';
}

// include templates
require_once INCLUDES.'/views/deleteCategory.html';
require_once INCLUDES.'/views/footer.html';
