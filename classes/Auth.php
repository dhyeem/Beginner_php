<?php 

/**
 * Authintication 
 * 
 * Login and Logout
 */

class Auth 
{
    /**
     * return user authentication status
     *
     * @return boolean Ture if user is log in, false otherwise 
     */
    public static function isLogedIn()
    {
        return isset($_SESSION['is_loged_in']) && $_SESSION['is_loged_in'];
    }

    /**
     * Require the user to login, stoping with unthorized message if not
     *
     * @return void
     */
    public static function requireLogin()
    {
        if ( ! static::isLogedIn()) {
            die("unthorized");
          }
    }

    /**
     * login using the session
     *
     * @return void
     */
    public static function login()
    {
        session_create_id(ture);
        $_SESSION['is_loged_in'] = true;
    }

    /**
     * Logout using the session
     *
     * @return void
     */
    public static function logout()
    {
        $_SESSION = [];

        if (ini_get("session.use_cookies")){
            $params = session_get_cookie_params();
            setcookie(
                session_name(), '', 
                 time(), - 42000,
                    $params["path"], 
                    $params["domain"],
                    $params["secure"], 
                    $params["httponly"]
                    );
        }
        session_destroy();
    }
}