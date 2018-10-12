<?php 

/**
 * return user authentication status
 *
 * @return boolean Ture if user is log in, false otherwise 
 */
function isLogedIn()
{
    return isset($_SESSION['is_loged_in']) && $_SESSION['is_loged_in'];
}

?>