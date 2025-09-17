<?php
include 'connect.php';
// Query SQL
$sql = "SELECT * FROM pengguna";
$result = mysqli_query($conn, $sql);

$mahasiswa = [];
if (($result)) {
    $mahasiswa = mysqli_fetch_all($result, MYSQLI_ASSOC);
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
</head>
<style>
    body {
        font-family: Inter, sans-serif;
        margin: 20px;
        padding: 20px;
        background-color: #f4f4f4;
    }
    #tambah {
        display: inline-block;
        font-weight: bold;
        margin-bottom: 10px;
        padding: 10px 20px;
        background-color: #0066ffff;
        color: white;
        text-decoration: none;
        border-radius: 5px;
    }
    #edit {
        display: inline-block;
        padding: 7px 14px;
        background-color: #4CAF50;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        margin-right: 8px;
    }
    #hapus {
        display: inline-block;
        padding: 7px 14px;
        background-color: #f44336;
        color: white;
        text-decoration: none;
        border-radius: 5px;
    }
</style>
<body>
    <h1>Daftar Mahasiswa
    <?php if (count($mahasiswa) > 0) : ?>
    </h1>
    <a href="add.php" id="tambah">Tambah Mahasiswa</a>
    <table border="1" cellpadding="10" cellspacing="0" align="center">
    <thead>
        <tr>
            <th>Nama</th>
            <th>NIM</th>
            <th>Jurusan</th>
            <th>Email</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        <?php foreach ($mahasiswa as $row) : ?>
            <tr>
                <td><?php echo $row["nama"]; ?></td>
                <td><?php echo $row["nim"]; ?></td>
                <td><?php echo $row["jurusan"]; ?></td>
                <td><?php echo $row["email"]; ?></td>
                <td><img src="media/<?php echo $row["foto"]; ?>" alt="<?php echo $row["nama"]; ?>" width="125" align="center"></td>
                <td><a href="edit.php?id=<?php echo $row["id"]; ?>" id="edit">Edit</a>
                <a href="delete.php?id=<?php echo $row["id"]; ?>" id="hapus">Hapus</a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
    </table>
    <?php else : ?>
        <p>Tidak ada data mahasiswa.</p>
    <?php endif; ?>
</body>
</html>