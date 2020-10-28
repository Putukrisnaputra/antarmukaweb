<?php
session_start();

if( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}

require 'functions.php';
if( isset($_POST["submit"]) ) {

   if( tambah($_POST) > 0 ) {
       echo "
           <script>
               alert('data berhasil ditambahkan!');
               document.location.href = 'index.php';
           </script>
       ";
   } else {
       echo "
             <script>
               alert('data gagal ditambahkan!');
               document.location.href = 'index.php';
           </script> 
       ";
   }

}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah data pasien</title>
</head>
<body>
<div class="container">  
    <h1>Tambah data pasien</h1>

    <form action="" method="post">
        <ul>
            <li>
            <label for="nama">Nama :</label>
            <input type="text" name="nama" id="nama" 
            required>
            </li>
            <li>
            <label for="email">Email :</label>
            <input type="text" name="email" id="email">
            </li>
            <li>
            <label for="alamat">Alamat :</label>
            <input type="text" name="alamat" id="alamat">
            </li>
            <li>
            <button type="submit" name="submit">Tambah Data</button>
            </li>
        </ul>

    
    </form>



</body>
</html>