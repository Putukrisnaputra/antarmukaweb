<?php
//koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "phpdasar");

// ambil data dari tabel mahasiswa / query data pasien
$result = mysqli_query($conn, "SELECT * FROM pasien");

// ambil data (fetch) pasien dari object result
// mysqli_fetch_row() // mengembalikan array numerik
// mysqli_fetch_assoc() // mengembalikan arrray associative
// mysqli_fetch_array() // mengembalikan keduanya
// mysqli_fetch_object()

// while($psn = mysqli_fetch_assoc($result) ) {
//  var_dump($psn);
// }

?>
<!DOCTYPE html>
<html>
<head>
    <title>Halaman Admin</title>
</head>
<body>

<h1>Daftar Pasien</h1>

<table border="1" cellpadding="10" cellspacing="0">

<tr>
    <th>No.</th>
    <th>Aksi</th>
    <th>Nama</th>
    <th>Email</th>
    <th>Alamat</th>
</tr>

<?php $i = 1; ?>
<?php while( $row = mysqli_fetch_assoc($result) ) : ?>
<tr>
    <td><?= $i; ?></td>
    <td>
        <a href="">ubah</a> |
        <a href="">hapus</a>
    </td>
    <td><?= $row["nama"] ?></td>
    <td><?= $row["email"] ?></td>
    <td><?= $row["alamat"] ?></td>
</tr>
<?php $i++; ?>
<?php endwhile; ?>

</table>

</body>
</html>