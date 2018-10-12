<?php
require "includes/database.php" ;
require 'includes/auth.php';

session_start();

$conn = getDB();

$sql = "SELECT *
        FROM article
        order by published_at;" ;
// quere the DB for articles

$result = mysqli_query($conn, $sql) ;


// check if theere is articles or not
if ($result === false) {
  echo mysqli_error($conn);
}
else {
  $articles = mysqli_fetch_all($result, MYSQLI_ASSOC);

}


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
