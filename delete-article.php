<?php 
require 'classes/Database.php' ;
require 'classes/Article.php' ;
require 'includes/url.php';

$db = new Database; 
$conn = $db->getConn() ;

if (isset($_GET['id'])) 
{

    $article = Article::getById($conn, $_GET['id']);

    if (! $article) 
    {
        die("article not found");
    }

} else {

    die("id not supplied, article not found");
}   

// Delete Statment 

// first check that it's a post method

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
    if ($article->delete($conn))
    {
        redirect("/index.php");
    }
} 

?>

<?php require 'includes/header.php'; ?>

<h2>Delete Article</h2>

    <form method="post">
    <p>Are you sure?</p>
    <button>Delete</button>
    <a href="article.php?id=<?= $article->id;?> ">Cancel</a>
    </form>

<?PHP require 'includes/footer.php'; ?>