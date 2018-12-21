<?php 

/**
 * Initialisation 
 * 
 * Register an autoloader, start or resuem session etc. 
 */
spl_autoload_register(function ($class){
    require "classes/{$class}.php";
});

session_start();