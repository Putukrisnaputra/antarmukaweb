<?php
session_start();

if( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}

require 'functions.php';

$id = $_GET["id"];

$psn = query("SELECT * FROM pasien WHERE id = $id")[0];

if( isset($_POST["submit"]) ) {

   if( ubah($_POST) > 0 ) {
       echo "
           <script>
               alert('data berhasil diubah!');
               document.location.href = 'index.php';
           </script>
       ";
   } else {
       echo "
             <script>
               alert('data gagal diubah!');
               document.location.href = 'index.php';
           </script> 
       ";
   }

}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Ubah data pasien</title>
</head>
<body>
    <h1>Ubah data pasien</h1>

    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $psn["id"]; ?>">
        <ul>
            <li>
            <label for="nama">Nama :</label>
            <input type="text" name="nama" id="nama" 
            required value="<?= $psn["nama"]; ?>">
            </li>
            <li>
            <label for="email">Email :</label>
            <input type="text" name="email" id="email" value="<?= $psn["email"]; ?>">
            </li>
            <li>
            <label for="alamat">Alamat :</label>
            <input type="text" name="alamat" id="alamat" value="<?= $psn["alamat"]; ?>">
            </li>
            <li>
            <button type="submit" name="submit">Ubah Data</button>
            </li>
        </ul>

    
    </form>



</body>
</html>