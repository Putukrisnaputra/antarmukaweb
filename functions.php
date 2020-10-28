<?php
//koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "phpdasar");


function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;
    }
    return $rows;
}


function tambah($data) {
    global $conn;

    $nama = $data["nama"];
    $email = $data["email"];
    $alamat = $data["alamat"];

     $query = "INSERT INTO pasien
                VALUES
              ('', '$nama', '$email', '$alamat')
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}

function hapus($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM pasien WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function ubah($data) {
    function tambah($data) {
        global $conn;

        $id = $data["id"];
        $nama = $data["nama"];
        $email = $data["email"];
        $alamat = $data["alamat"];
    
         $query = "UPDATE pasien SET
                     nama = '$nama',
                     email = '$email',
                     alamat = '$alamat'
                    WHERE id = $id
                  
                  ";
        mysqli_query($conn, $query);
    
        return mysqli_affected_rows($conn);    
}
}

function cari($keyword) {
    $query = "SELECT * FROM pasien
               WHERE
              nama LIKE '%$keyword%' OR
              email LIKE '%$keyword%' 
              ";
    return query($query);
}


function registrasi($data) {
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
    if( mysqli_fetch_assoc($result) ) {
        echo "<script>
                alert('username sudah terdaftar')
              </script>";
        return false;
    }

    if( $password !== $password2 ) {
        echo "<script>
                alert('konfirmasi password tidak sesuai!');
              </script>";
        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password')");

    return mysqli_affected_rows($conn);

}



















?>