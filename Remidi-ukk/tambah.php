<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h2>Tambah alumni</h2>
    <form method="POST">
        <input type="text" name="Nama_Lengkap" placeholder="Nama" required>
        <input type="number" name="Tahun_Lulus" placeholder="Tahun lulus" required>
        <input type="text" name="Jurusan" placeholder="jurusan" required>
        <input type="text" name="Pekerjaan_Saat_Ini" placeholder="Pekerjaan Saat Ini" required>
        <input type="number" name="Nomor_Telepon" placeholder="no telpon" required>
        <input type="text" name="Email" placeholder="email" required>
        <textarea name="Alamat" placeholder="Alamat" required></textarea>
        <button type="submit" name="submit">Simpan</button
        </form>

        <?php
        if (isset($_POST['submit'])) {
            $sql = "INSERT INTO alumni (Nama_Lengkap,Tahun_Lulus,Jurusan,Pekerjaan_Saat_Ini,Nomor_Telepon,Email,Alamat)
    VALUES ('$_POST[Nama_Lengkap]','$_POST[Tahun_Lulus]','$_POST[Jurusan]','$_POST[Pekerjaan_Saat_Ini]','$_POST[Nomor_Telepon]','$_POST[Email]','$_POST[Alamat]')";
            mysqli_query($conn, $sql);
            echo "<p>Data berhasil disimpan! <a href='index.php'>Kembali</a></p>";
        }
        ?>
</body>

</html>
