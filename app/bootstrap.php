<?php
// config file
require_once 'config/constants.php';
// Auto Load libraries
spl_autoload_register(function ($className){
  require_once 'libraries/'.$className.'.php';
});
