<?php
include 'connect.php';

$id = $_GET['id'] ?? null;
$confirm = $_GET['confirm'] ?? null;

if (!$id) {
    echo "<script>alert('ID tidak ditemukan!');window.location='dbmhs.php';</script>";
    exit;
}

if ($confirm !== 'yes') {
    // Show confirmation option
        // Show confirmation option with JS popup
        echo "<script>
            if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                window.location='delete.php?id=$id&confirm=yes';
            } else {
                window.location='index.php';
            }
        </script>";
    exit;
}

// Proses hapus jika sudah konfirmasi
$sql = "DELETE FROM pengguna WHERE id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);

if (mysqli_stmt_affected_rows($stmt) > 0) {
    echo "<script>alert('Data berhasil dihapus!');window.location='index.php';</script>";
} else {
    echo "<script>alert('Data gagal dihapus!');window.location='index.php';</script>";
}

mysqli_close($conn);
?>

