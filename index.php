<?php
require "classes/Database.php" ;
require 'includes/auth.php';
require 'classes/Article.php';

session_start();

$db = new Database();
$conn = $db->getConn();

$articles = Article::getAll($conn);


 ?>
<?php require "includes/header.php" ;?>


<?php if (isLogedIn()): ?>
  <p>Your are loged in!</p> <a href="logout.php">Log out</a>
  <p><a href= "new-article.php">New Article</a></p>

<?php else: ?>
  <p>you are not Loged in.</p> <a href="login.php">Log in</a>
<?php endif; ?>

<br>

       <?php if (empty($articles)): ?>
         <p>No articles found.</p>
       <?php else: ?>

      <ul>
        <?php foreach ($articles as $article): ?>
          <li>


        <article class="">
          <h2><a href="article.php?id=<?= $article['id'] ;?>"><?= htmlspecialchars($article['title']) ;?> </a></h2>
          <p><?= htmlspecialchars($article['content']) ?> </p>
        </article>
          </li>
        <?php endforeach;?>

              </ul>
            <?php endif; ?>

<?php require "includes/footer.php"; ?>
