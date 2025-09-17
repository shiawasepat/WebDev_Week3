<?php
// cek apakah data ada di $_GET
if( !isset($_GET["nama"]) || 
    !isset($_GET["nim"]) || 
    !isset($_GET["jurusan"]) || 
    !isset($_GET["email"]) || 
    !isset($_GET["foto"]) ) {
    // redirect
    header("Location: data.php");
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_GET["nama"] . "- Detail Mahasiswa"; ?></title>
</head>
<body>
    <!-- Data Mahasiswa dengan GET -->
    <ul>
        <img src="media/<?php echo $_GET["foto"]; ?>" alt="<?php echo $_GET["nama"];?>" width="200"></li>
        <li>Nama : <?php echo $_GET["nama"]; ?></li>
        <li>NIM : <?php echo $_GET["nim"]; ?></li>
        <li>Jurusan : <?php echo $_GET["jurusan"]; ?></li>
        <li>Email : <?php echo $_GET["email"]; ?></li>
    </ul>

    <a href="data.php">Kembali ke daftar mahasiswa</a>

</body>
</html>