<?php 

/**
 * Article 
 * A piece of writing for publication 
 */
class Article 
{
    /**
     * unique identifier
     *
     * @var integer
     */
    public $id ;
    /**
     * the article title
     *
     * @var string
     */
    public $title ; 
    /**
     * the article content
     *
     * @var string
     */
    public $content ; 
    /**
     * the publication date and time
     *
     * @var datetime
     */
    public $published_at ;

    /**
     * validation errors 
     *
     * @var array
     */
    public $errors = [];

    /**
     * Get all the articles
     *
     * @param object $conn connection to the database
     * @return array of an assosiative array of all the article record
     */
    public static function getAll($conn)
    {
        $sql = "SELECT *
                FROM article
                order by published_at;" ;

        $results = $conn->query($sql);

        
        return $results->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Get the article record based on the ID
     * 
     * @param  object $conn Connectoin to the database 
     * @param  integer $id the article ID
     * @param  string $columns Optinal list of columns for the select, default to *
     * 
     * @return mixed An object of this class or NULL if not found
     * 
     */
    public static function getById($conn, $id, $columns = '*')
    {

        $sql = "SELECT $columns 
                FROM article
                WHERE id = :id" ;
                
            
            $stmt = $conn->prepare($sql); 
            $stmt->bindValue(':id',$id, PDO::PARAM_INT);

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Article');

                if ($stmt->execute()) 
                {
                    return $stmt->fetch();
                } 
    }


    /**
     * update the article with it current property value
     *
     * @param object $conn connect to the database 
     * @return bolean True if the update was secsessful, false otherwise 
     */
    public function update($conn)
    {

        if($this->validate()){
        
        $sql = "UPDATE article 
        SET title = :title,
            content = :content,
            published_at = :published_at

        Where id = :id" ;

        $stmt = $conn->prepare($sql);

        $stmt->bindValue(':id', $this->id, PDO::PARAM_INT);
        $stmt->bindValue(':title', $this->title, PDO::PARAM_STR);
        $stmt->bindValue(':content', $this->content, PDO::PARAM_STR);

        if ($this->published_at == '')
        {
            $stmt->bindValue(':published_at', null, PDO::PARAM_NULL);
        }

        else 
        {
            $stmt->bindValue(':published_at', $this->published_at, PDO::PARAM_STR);
        }

            return $stmt->execute();
        } else {
            return false; 
        }
    }

        /**
     * Valudate the  properties, putting any validation error messages in the $errors Property
     *
     *@return boolean True if the current properties are valid, false otherwise
     */
    protected function validate()
{
  

    if ($this->title == '') {
        $this->errors[] = 'Title is required';
    }
    if ($this->content == '') {
        $this->errors[] = 'Content is required';
    }
  
    if ($this->published_at != '') {
        $date_time = date_create_from_format('Y-m-d H:i:s', $this->published_at);
  
        if ($date_time === false) {
  
          $this->errors[] = 'Invalid date and time';
  
        } else {
  
            $date_errors = date_get_last_errors();
  
            if ($date_errors['warning_count'] > 0) {
                $this->errors[] = 'Invalid date and time';
            }
        }
    }
    return empty($this->errors) ; 
    
  

}
    /**
     * Delete the current article
     *
     * @param object $conn Connection to the Database
     * @return boolean True if the delete was secsseful, false otherwise
     */
    public function delete($conn)
    {
        $sql = "DELETE FROM article 
                WHERE id = :id" ;

        $stmt = $conn->prepare($sql);

        $stmt->bindValue(':id', $this->id, PDO::PARAM_INT);
 

            return $stmt->execute();
    }

     /**
     * Insert a new article to the database 
     *
     * @param object $conn connect to the database 
     * @return bolean True if the update was secsessful, false otherwise 
     */
    public function create($conn)
    {

        if($this->validate()){
        
        $sql = "INSERT INTO article (title, content, published_at)
                VALUES (:title, :content, :published_at)";

       

        $stmt = $conn->prepare($sql);

        $stmt->bindValue(':title', $this->title, PDO::PARAM_STR);
        $stmt->bindValue(':content', $this->content, PDO::PARAM_STR);

        if ($this->published_at == '')
        {
            $stmt->bindValue(':published_at', null, PDO::PARAM_NULL);
        }

        else 
        {
            $stmt->bindValue(':published_at', $this->published_at, PDO::PARAM_STR);
        }

            if ($stmt->execute())
            {
                $this->id = $conn->lastInsertId();
                return true;
            };
                } else {
                  return false; 
                }
    }


    
    

}