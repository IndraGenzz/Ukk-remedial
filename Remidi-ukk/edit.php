<?php
include 'koneksi.php';
$id = $_GET['id'];
$row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM alumni WHERE id_alumni=$id"));
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Alumni</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Edit Data Alumni</h2>
    <form method="POST">
        

    Nama Lengkap:
    <input type="text" name="Nama_Lengkap" value="<?= $row['Nama_Lengkap'] ?>" required>
    Tahun Lulus:
    <input type="number" name="Tahun_lulus" value="<?= $row['Tahun_lulus'] ?>" required>
        <select name="Jurusan" required>
            <option value="">Pilih Jurusan</option>
            <option value="RPL" <?= $row['Jurusan'] == 'RPL' ? 'selected' : '' ?>>RPL</option>
            <option value="TKJ" <?= $row['Jurusan'] == 'TKJ' ? 'selected' : '' ?>>TKJ</option>
            <option value="TJAT" <?= $row['Jurusan'] == 'TJAT' ? 'selected' : '' ?>>TJAT</option>
            <option value="ANIMASI" <?= $row['Jurusan'] == 'ANIMASI' ? 'selected' : '' ?>>ANIMASI</option>
        </select>
        <label>Pekerjaan Saat Ini</label>
        <input type="text" name="Pekerjaan_Saat_Ini" value="<?= $row['Pekerjaan_Saat_Ini'] ?>" required>
        <label>Nomor Telepon</label>
        <input type="text" name="Nomor_Telepon" value="<?= $row['Nomor_Telepon'] ?>" required>
        <label>Email</label>
        <input type="email" name="Email" value="<?= $row['Email'] ?>" required>
        <label>Alamat</label>
        <textarea name="Alamat" required><?= $row['Alamat'] ?></textarea>
        <button type="submit" name="update">Update Data</button>
        <a href="index.php" style="margin-left: 10px;">Batal</a>
    </form>
    <?php
    if (isset($_POST['update'])) {
        $nama = mysqli_real_escape_string($conn, $_POST['Nama_Lengkap']);
        $tahun = mysqli_real_escape_string($conn, $_POST['Tahun_lulus']);
        $jurusan = mysqli_real_escape_string($conn, $_POST['Jurusan']);
        $pekerjaan = mysqli_real_escape_string($conn, $_POST['Pekerjaan_Saat_Ini']);
        $telepon = mysqli_real_escape_string($conn, $_POST['Nomor_Telepon']);
        $email = mysqli_real_escape_string($conn, $_POST['Email']);
        $alamat = mysqli_real_escape_string($conn, $_POST['Alamat']);
        
        $sql = "UPDATE alumni SET
            Nama_Lengkap='$nama',
            Tahun_lulus='$tahun',
            Jurusan='$jurusan',
            Pekerjaan_Saat_Ini='$pekerjaan',
            Nomor_Telepon='$telepon',
            Email='$email',
            Alamat='$alamat'
            WHERE id_alumni=$id";
        
        if(mysqli_query($conn, $sql)) {
            echo "<p style='color: green;'>Data berhasil diupdate! <a href='index.php'>Kembali</a></p>";
        } else {
            echo "<p style='color: red;'>Error: " . mysqli_error($conn) . "</p>";
        }
    }
    ?>
</body>
</html>
