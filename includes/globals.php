<?php

/**
 * define path constants
 */
define('DS',DIRECTORY_SEPARATOR);
define('ROOT',dirname(__FILE__).DS.'..');
define('INCLUDES',ROOT.'/includes');
define('CONTROLLERS',ROOT.'/includes/controllers');
define('MODELS',ROOT.'/includes/models');
define('VIEWS',ROOT.'/includes/views');

/**
 * define special constant for project
 */
define('IN_APP_INCLUDE',true);
require INCLUDES.'/config.php';
require INCLUDES.'/models/model.php';