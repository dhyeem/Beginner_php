<?php
require "includes/database.php" ;

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
<a href="/phpfb/new-article.php">New Article</a>
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
