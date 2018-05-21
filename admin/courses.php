<?php

// require all files
require_once '../includes/globals.php';
//controllers
require_once CONTROLLERS.'/controller.php';
require_once CONTROLLERS.'/adminController.php';

// all categories
$coursesController = new adminController();
$courses           = $coursesController->getCourses();

// include templates
require_once INCLUDES.'/views/header.html';
require_once INCLUDES.'/views/courses.html';
require_once INCLUDES.'/views/footer.html';
