<?php
$mahasiswa = [
    [
        "nama" => "Aqua Hoshino",
        "nim" => "002411710001",
        "jurusan" => "IMT",
        "email" => "aqua02@yahoo.com",
        "foto" => "aqua.png"
    ],
    [
        "nama" => "Ruby Hoshino",
        "nim" => "005519880001",
        "jurusan" => "COM",
        "email" => "r_hoshino@example.com",
        "foto" => "ruby.png"
    ],
    [
        "nama" => "Kana Arima",
        "nim" => "002412710003",
        "jurusan" => "VCD",
        "email" => "rimakana@example.com",
        "foto" => "kana.png"
    ],    
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Associated - GET</title>
</head>
<body>
    <h1>Daftar Mahasiswa</h1>
    <ul>
        <!-- Tampung Data Mahasiswa -->
        <?php foreach($mahasiswa as $mhs) : ?>
            <li>
                <a href="detailmhs.php?nama=<?php echo $mhs["nama"]; ?>
                &nim=<?php echo $mhs["nim"]; ?>
                &jurusan=<?php echo $mhs["jurusan"]; ?>
                &email=<?php echo $mhs["email"]; ?>
                &foto=<?php echo $mhs["foto"]; ?>">
                    <?php echo $mhs["nama"]; ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
