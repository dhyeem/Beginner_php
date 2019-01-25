<?php
require "../includes/init.php";

Auth::requireLogin();
$conn = require "../includes/db.php";



$articles = Article::getAll($conn);


 ?>
<?php require "../includes/header.php" ;?>


<?php if (Auth::isLogedIn()): ?>
  <p>Your are loged in!</p> <a href="logout.php">Log out</a>
  <p><a href= "new-article.php">New Article</a></p>

<?php else: ?>
  <p>you are not Loged in.</p> <a href="login.php">Log in</a>
<?php endif; ?>

<h2>Administration</h2>
<br>

       <?php if (empty($articles)): ?>
         <p>No articles found.</p>
       <?php else: ?>

      <table>
        <thead>
          <th>Title</th>
        </thead>

        <tbody>
        <?php foreach ($articles as $article): ?>
          <tr>
            <td>
              <a href="article.php?id=<?= $article['id'] ;?>">
              <?= htmlspecialchars($article['title']) ;?> </a>
              
            </td>
          </tr>
        <?php endforeach;?>
        </tbody>
      </table>
      <?php endif; ?>

<?php require "../includes/footer.php"; ?>
