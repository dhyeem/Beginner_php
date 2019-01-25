<?php 

/**
 * Initialisation 
 * 
 * Register an autoloader, start or resuem session etc. 
 */
spl_autoload_register(function ($class){
    require dirname(__DIR__) . "/classes/{$class}.php";
});

session_start();