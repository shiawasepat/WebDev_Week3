<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POST</title>
</head>
<body>
    <?php if(isset($_POST["submit"])) : ?>
        <h1>Halo, Selamat Datang <?php echo $_POST["nama"]; ?>
    <?php endif; ?></h1>

    <form action="" method="POST">
        Masukkan Nama : 
        <input type="text" name="nama" autofocus>
        <button type="submit" name="submit">Kirim</button>
    </form>
</body>
</html>