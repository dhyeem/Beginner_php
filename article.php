<?php
require "includes/database.php" ;



 // echo "Connecting to Db Secsses! ";
$conn = getDB();

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
$sql = "SELECT *
        FROM article
        where id = " . $_GET['id'];

$results = mysqli_query($conn, $sql) ;



if ($results === false) {
  echo mysqli_error($conn);
}
else {
  $article = mysqli_fetch_assoc($results);

}

}
else {
  $article = null ;
}

 ?>



 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>My Blog</title>
     <h1>My Blog</h1>
     <nav>
       <a href="/phpfb">Home</a>
     </nav>
  </head>
     <body>
     <main>
       <?php if ($article == null): ?>
         <p>Article not found.</p>
       <?php else: ?>
         <article class="">
        <h2>  <?= $article["title"]; ?> </h2>
        <p>   <?= $article["content"]; ?></p>
         </article>

            <?php endif; ?>
     </main>




   </body>
 </html>
