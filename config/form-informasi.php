<?php
require 'function.php';

// jika tambah diklik
if (isset($_POST['tambah'])) {
    // jika fungsi tambahData brejalan
    if (tambahData($_POST) > 0) {
        echo "
        <script>
        alert('Data berhasil ditambahkan :)')
        </script>";
    } else {
        echo "
        <script>
        alert('Data gagal ditambahkan :(')
        </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD PHP | Input Informasi</title>
</head>

<body>
    <div style="width: 800px; margin: auto; background-color:lightblue ;" class="container">
        <header>
            <h2>Input Informasi</h2>
        </header>
        <div><a href="../index.php">Home</a></div>
        <div style="display: block; margin-top: 20px;">
            <form action="" method="POST" enctype="multipart/form-data">
                <div style="margin-bottom: 10px;">
                    <label style="display: block;" for="nip">nip</label>
                    <input type="text" name="nip" id="nip" placeholder="NIP Pegawai" required>
                </div>
                <div style="margin-bottom: 10px;">
                    <label style="display: block;" for="nama">nama</label>
                    <input type="text" name="nama" id="nama" placeholder="nama Pegawai" required>
                </div>
                <div style="margin-bottom: 10px;">
                    <label style="display: block;" for="kelamin">kelamin</label>
                    <label for=""><input type="radio" name="kelamin" value="laki-laki">Laki-laki</label>
                    <label for=""><input type="radio" name="kelamin" value="perempuan">Perempuan</label>
                </div>
                <div style="margin-bottom: 10px;">
                    <label style="display: block;" for="alamat">Alamat</label>
                    <textarea required name="alamat" id="alamat" cols="30" rows="10"></textarea>
                </div>
                <div style="margin-bottom: 10px;">
                    <label style="display: block;" for="agama">Agama</label>
                    <select name="agama" id="agama">
                        <option selected disabled hidden value="">Pilih Agama</option>
                        <option>Budha</option>
                        <option>Hindu</option>
                        <option>Islam</option>
                        <option>Katholik</option>
                        <option>Konghucu</option>
                        <option>Kristen</option>
                    </select>
                </div>
                <div style="margin-bottom: 10px;">
                    <label style="display: block;" for="foto">Foto</label>
                    <input type="file" name="foto" id="foto">
                </div>
                <div style="margin-bottom: 10px;">
                    <input type="submit" name="tambah" value="Tambah">
                </div>

            </form>
        </div>
    </div>
</body>

</html>