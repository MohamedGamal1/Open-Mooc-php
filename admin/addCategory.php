<?php

// require all files
require_once '../includes/globals.php';
//controllers
require_once CONTROLLERS.'/controller.php';
require_once CONTROLLERS.'/adminController.php';

// all categories
/*$categoriesController = new adminController();
$categories           = $categoriesController->addCategory();
*/
// include templates
require_once INCLUDES.'/views/header.html';
require_once INCLUDES.'/views/addCategory.html';
require_once INCLUDES.'/views/footer.html';
