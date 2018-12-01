<?php 

/**
 * User
 * 
 * A person or entity that can login to the site
 */
class User
{   
    /**
     *  Unique idintifier
     *
     * @var integer 
     */
    public $id;

    /**
     * unique username
     *
     * @var integer
     */
    public $username;

    /**
     * Password
     *
     * @var string
     */
    public $password;

    /**
     * Authenticate a user by username and password
     *@param object $conn Connection to the database
     * @param string $username Username
     * @param string $password Password
     * @return boolean True if the cridintianls are correct, Null otherwise
     */
    public static function authenticate($conn, $username, $password)
    {
        $sql = "SELECT * from user
                WHERE username = :username";
        
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':username', $username, PDO::PARAM_STR);

        $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');

        $stmt->execute();

        ;

        if($user = $user = $stmt->fetch()) {
            return password_verify($password, $user->password);

            
        }
    }
}