<?php
// config file
require_once 'config/constants.php';
// helpers
require_once 'helpers/url_helper.php';
// start session
session_start();

// Auto Load libraries
spl_autoload_register(function ($className){
  require_once 'libraries/'.$className.'.php';
});
