<?php 

/**
 * Database class to connect to the Database 
 */
class Database 
{

    /**
     * Get the Database Connection 
     *
     * @return PDO object connection to the database server 
     */
    public function getConn()
    {
        // Database connection:
        $db_host = 'localhost';
        $db_name = 'cms';
        $db_user = 'cms_www';
        $db_pass = 'fODVvNd7WrZ46fzT';

        $dsn = 'mysql:host=' . $db_host . ';dbname=' . $db_name . ';charset=utf8';
        
        try {
            $db = new PDO($dsn, $db_user, $db_pass);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

            return $db ; 
        } catch (PDOException $e){
            echo $e->getMessage();
            exit ; 
        }


    }

}