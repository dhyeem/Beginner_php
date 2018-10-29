<?php 
require 'includes/url.php';
require 'classes/User.php';
require 'classes/Database.php';

session_start();

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $db = new Database();
    $conn = $db->getConn();
    
    if (User::authenticate($conn, $_POST['username'],$_POST['password'])){
        // to increase security and fix session attack
        session_create_id(ture);
        $_SESSION['is_loged_in'] = true;
        redirect('/');
    }
    else {
        $error = "login incorrect !" ;
    }
}

?>
<?php require 'includes/header.php'; ?>

<h2>Login</h2>

<?php if(!empty($error)):  ?>
    <p> <?= $error ?> </p>
<?php endif ;?>

<form method="post">
    <div>
    <label for="username">Username</label>
        <input type="text" name='username' id="username">
    </div>

    <div>
    <label for="password">Password</label>
        <input type="password" name='password' id="password">
    </div>

    <button>login</button>
</form>
  
<?php require 'includes/footer.php'; ?>

