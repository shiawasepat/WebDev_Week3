<?php 
include "connect.php";

if (isset($_POST["submit"])) {
    $id = $_POST["id"];
    $nama = $_POST["nama"];
    $nim = $_POST["nim"];
    $jurusan = $_POST["jurusan"];
    $email = $_POST["email"];
    // Ambil informasi file
    $foto = $_FILES["foto"]["name"];
    $tmp = $_FILES["foto"]["tmp_name"];

    $folder = "media/";

    // Check if ID already exists
    $check = "SELECT id FROM pengguna WHERE id = ?";
    $stmt = mysqli_prepare($conn, $check);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
    echo "<div style='color: red; font-weight: bold;'>ID sudah digunakan, silakan gunakan ID lain!</div>";
    } else {
        if (move_uploaded_file($tmp, $folder . $foto)) {
            // Lanjutkan proses insert
            $sql = "INSERT INTO pengguna (id, nama, nim, jurusan, email, foto) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($stmt, "isssss", $id, $nama, $nim, $jurusan, $email, $foto);
            mysqli_stmt_execute($stmt);
            echo "Data Berhasil Ditambahkan! <a href='index.php'>Lihat Data</a>";
        } else {
            echo "Error: " . $sql . mysqli_error($conn);
        }
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mahasiswa</title>
</head>
<style>
    body {
        font-family: Inter, sans-serif;
        margin: 20px;
        padding: 20px;
        background-color: #f4f4f4;
    }
    input
    {
        width: 300px;
        padding: 8px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }
    #submit {
        display: inline-block;
        font-weight: bold;
        margin-bottom: 10px;
        padding: 10px 20px;
        background-color: #0066ffff;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        box-shadow: none;
        outline: none;
    }
    #cancel {
        display: inline-block;
        font-weight: bold;
        margin-bottom: 10px;
        padding: 10px 20px;
        background-color: #f44336;
        color: white;
        text-decoration: none;
        border-radius: 5px;
    }
</style>
<body>
    <h2>Tambah Data Mahasiswa</h2>

    <form method="post" enctype="multipart/form-data">
        ID : <br><input type="text" name="id" required><br><br>
        Nama : <br><input type="text" name="nama" required><br><br>
        NIM : <br><input type="text" name="nim" required><br><br>
        Jurusan : <br><input type="text" name="jurusan" required><br><br>
        Email : <br><input type="email" name="email" required><br><br>
        Foto : <br><input type="file" name="foto" required><br><br>
    <input type="submit" name="submit" id="submit" value="Tambah">
    <a href="index.php" id="cancel">Batal</a>
    </form>
</body>
</html>