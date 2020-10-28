<?php
require 'functions.php';
session_start();


if( isset($_SESSION["login"]) ) {
    header ("Location: index.php");
    exit;
}


if( isset($_POST["login"]) ) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

    if( mysqli_num_rows($result) === 1 ) {

        $row = mysqli_fetch_assoc($result);
        if( password_verify($password, $row["password"]) ) {

            $_SESSION["login"] = true;

            header("Location: index.php");
            exit;
        }
    }

    $error = true;

}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Halaman Login</title>
    <meta charsetset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>


<div class="container">  
<h4 class="text-center">Halaman Login Pasien</h4>
<hr>

<?php if( isset($error) ) : ?>
    <p style= "color: red; font-style; italic;">username / password salah</p>
<?php endif; ?>

<form action="" method="post">

    <ul>
        <div class="form-group">
        <label for="username">Username :</label>
       <input type="text" name="username" id="username">
       </div>            
        <div class="form-group">
        <label for="password">Password :</label>
       <input type="password" name="password" id="password">
       </div>     
        
            <button type="submit" name="login">login</button>
        
    </ul>
</form>

</body>
</html>