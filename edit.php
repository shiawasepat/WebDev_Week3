<?php
include 'connect.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    echo "ID tidak ditemukan.";
    exit;
}

// Ambil data pengguna berdasarkan ID
$sql = "SELECT * FROM pengguna WHERE id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$user = mysqli_fetch_assoc($result);

if (!$user) {
    echo "Data tidak ditemukan.";
    exit;
}

// Proses update jika form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $jurusan = $_POST['jurusan'];
    $email = $_POST['email'];
    $foto = $user['foto']; // default foto lama

    if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
        $targetDir = "media/";
        $fileName = basename($_FILES["foto"]["name"]);
        $targetFile = $targetDir . $fileName;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
        if (in_array($imageFileType, $allowedTypes)) {
            if (move_uploaded_file($_FILES["foto"]["tmp_name"], $targetFile)) {
                $foto = $fileName;
            }
        }
    }

    $update = "UPDATE pengguna SET nama=?, nim=?, jurusan=?, email=?, foto=? WHERE id=?";
    $stmt = mysqli_prepare($conn, $update);
    mysqli_stmt_bind_param($stmt, "sssssi", $nama, $nim, $jurusan, $email, $foto, $id);
    mysqli_stmt_execute($stmt);

    if (mysqli_stmt_affected_rows($stmt) > 0) {
        echo "<script>alert('Data berhasil diupdate!');window.location='index.php';</script>";
    } else {
        echo "<script>alert('Tidak ada perubahan data.');window.location='index.php';</script>";
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mahasiswa</title>
</head>
<style>
    body {
        font-family: Inter, sans-serif;
        margin: 20px;
        padding: 20px;
        background-color: #f4f4f4;
    }
    img {
        margin-bottom: 10px;
        border-radius: 8px;
    }
    input[type="text"], input[type="email"], input[type="file"] {
        width: 300px;
        padding: 8px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }
    input[type="submit"] {
        display: inline-block;
        font-weight: bold;
        margin-bottom: 10px;
        padding: 10px 20px;
        background-color: #0066ffff;
        color: white;
        text-decoration: none;
        border-radius: 5px;
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
    <h2>Edit Data Mahasiswa</h2>
    <form method="post" enctype="multipart/form-data">
        <label>ID :</label><br>
        <input type="text" name="id" value="<?php echo htmlspecialchars($user['id']); ?>" readonly><br><br>
        <label>Nama :</label><br>
        <input type="text" name="nama" value="<?php echo htmlspecialchars($user['nama']); ?>" required><br><br>
        <label>NIM :</label><br>
        <input type="text" name="nim" value="<?php echo htmlspecialchars($user['nim']); ?>" required><br><br>
        <label>Jurusan :</label><br>
        <input type="text" name="jurusan" value="<?php echo htmlspecialchars($user['jurusan']); ?>" required><br><br>
        <label>Email :</label><br>
        <input type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required><br><br>
        <label>Foto saat ini:</label><br>
        <img src="media/<?php echo htmlspecialchars($user['foto']); ?>" alt="Foto Mahasiswa" width="120"><br>
        <label>Ganti Foto :</label><br>
        <input type="file" id="file" name="foto" accept="image/*"><br><br>
        <input type="submit" id="submit" value="Update">
        <a href="index.php" id="cancel">Batal</a>
    </form>
</body>
</html>