<?php
  require 'includes/database.php';

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {


  if ($_POST['title'] == '') {
    $errors[]= "Title is required";
  }
  if ($_POST['content'] == '') {
    $errors[]= "Content is required";
  }
  if ($_POST['published_at'] == '') {
    $errors[]= "Date is required";
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
    mysqli_stmt_bind_param($stmt, "sss", $_POST['title'], $_POST['content'], $_POST['published_at']);

    if (mysqli_stmt_execute($stmt)){

      $id = mysqli_insert_id($conn);
      echo "Inserted recorded with the ID: $id" ;
    }
      else {
        echo mysqli_stmt_error($stmt);
      }


        }

      }
}

/*$inserQuery = "INSERT INTO article
                values (200,"Title here" ,"content here" , "publish_at" )"
$Quere = "INSERT INTO article (title,content) values ("title here", "Content here")" */
?>
<?php   require "includes/header.php";?>
<nav>
  <a href="/phpfb">Home</a>
</nav>
<h2>New Article</h2>
<?php var_dump($errors);  ?>
<form class="" action="" method="post">
  <div class="">
    <label for="title">Title</label>
    <input type="text" name="title" id="title" placeholder="Article Title" value="">
  </div>
  <div class="">
    <label for="content">Content</label>
    <textarea name="content"  id="content" rows="8" cols="80"></textarea>
  </div>
  <div class="">
    <label for="publish_at">Publish Date and Time</label>
    <input type="datetime-local" name="published_at" value="" id="published_at">
  </div>
  <div class="">
    <button>Add</button>
  </div>

</form>

<?php   require "includes/footer.php";?>
