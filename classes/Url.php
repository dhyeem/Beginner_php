<?php 


/**
 * URL
 * response mentod
 */
class Url 
{

    /**
     * Redirect to another URL on the same site.
     * 
     * @param string $path the path to redirect to 
     * @return void 
     * 
     */

    public static function redirect($path) {

        define('ROOT_DIR','/phpfb');

        
        if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') {
            $protocol = 'https';
        } else {
            $protocol = 'http';
        }

        header("Location: $protocol://" . $_SERVER['HTTP_HOST'] .ROOT_DIR . $path);
        exit ; 

    }

}