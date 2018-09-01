<?php
  require 'includes/database.php';

$errors = [];
$title = '';
$content = '';
//$published_at = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $title = $_POST['title'];
  $content = $_POST['content'];
  $published_at = $_POST['published_at'];

  if ($title == '') {
      $errors[] = 'Title is required';
  }
  if ($content == '') {
      $errors[] = 'Content is required';
  }

  if ($published_at != '') {
      $date_time = date_create_from_format('Y-m-d H:i:s', $published_at);

      if ($date_time === false) {

          $errors[] = 'Invalid date and time';

      } else {

          $date_errors = date_get_last_errors();

          if ($date_errors['warning_count'] > 0) {
              $errors[] = 'Invalid date and time';
          }
      }
  }

if (empty($errors)) {



  $conn = getDB();

  $sql = "INSERT INTO article (title, content, published_at)
          VALUES (?,?,?)";


  $stmt = mysqli_prepare($conn, $sql) ;

  if ($stmt === false) {
    echo mysqli_error($conn);
  }
  else {

    if ($published_at == '') {
      $published_at = null ;
      }
    mysqli_stmt_bind_param($stmt, "sss", $title, $content, $published_at);

    if (mysqli_stmt_execute($stmt)){

      $id = mysqli_insert_id($conn);
        if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') {
          $protocol = 'https';
        } else {
          $protocol = 'http';
        }

      header("Location: $protocol://" . $_SERVER['HTTP_HOST'] . "/phpfb/article.php?id=$id");
      exit ; 
    }
      else {
        echo mysqli_stmt_error($stmt);
      }
   

      }
}}


?>
<?php   require "includes/header.php";?>
<nav>
  <a href="/phpfb">Home</a>
</nav>
<h2>New Article</h2>
    <?php if (!empty($errors)): ; ?>
      <ul>
      <?php foreach ($errors as $error) :?>
      <li><?= $error ?></li>
      <?php endforeach ;?>
    <?php endif ;?>
      </ul>
<form class="" action="" method="post">
  <div class="">
    <label for="title">Title</label>
    <input type="text" name="title" id="title" placeholder="Article Title" value="<?= htmlspecialchars($title) ;?>">
  </div>
  <div class="">
    <label for="content">Content</label>
    <textarea name="content"  id="content" rows="8" cols="80" placeholder='Article Conent' ><?= htmlspecialchars($content);?></textarea>
  </div>
  <div class="">
    <label for="published_at">Publish Date and Time</label>
    <input type="datetime-local" name="published_at" value="<?= htmlspecialchars($published_at) ;?>" id="published_at">
  </div>
  <div class="">
    <button>Add</button>
  </div>

</form>

<?php require 'includes/footer.php'; ?>