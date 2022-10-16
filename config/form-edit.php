<?php
require 'function.php';

// jika id tidak ditemukan
if (!isset($_GET['id'])) {
    header('location: informasi.php');
}

// ambil data id dari query
$id = $_GET['id'];

// query
$query = mysqli_query($conn, "SELECT * FROM pegawai WHERE id=$id");
$data = mysqli_fetch_assoc($query);

// jika id tidak ditemukan
if (mysqli_num_rows($query) < 1) {
    header('location: informasi.php');
}

if (isset($_POST['update'])) {
    if (updateData($_POST) > 0) {

        echo "
        <script>
        alert('Data berhasil diperbarui :)')
        </script>";
        header('location: informasi.php?statusupdate=sukses');
    } else {

        echo "
        <script>
        alert('Data gagal diperbarui :(')
        </script>";
        header('location: informasi.php?statusupdate=gagal');
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Form</title>
</head>

<body>
    <div style="width: 800px; margin: auto; background-color:lightblue ;" class="container">
        <header>
            <h2>Edit Informasi</h2>
        </header>
        <div style="display: block; margin-top: 20px;">

            <form action="" method="POST" enctype="multipart/form-data">
                <div style="margin-bottom: 10px;">
                    <label style="display: block;" for="nip">nip</label>

                    <input type="text" name="nip" id="nip" placeholder="NIP Pegawai" required value="<?php echo $data['nip'] ?>">
                    <input type="text" name="id" id="id" value="<?php echo $data['id'] ?>" hidden>
                    <input type="text" name="fotoLama" id="fotoLama" value="<?php echo $data['foto'] ?>" hidden>
                </div>
                <div style="margin-bottom: 10px;">
                    <label style="display: block;" for="nama">nama</label>
                    <input type="text" name="nama" id="nama" placeholder="nama Pegawai" required value="<?php echo $data['nama'] ?>">
                </div>
                <div style="margin-bottom: 10px;">
                    <label style="display: block;" for="kelamin">kelamin</label>
                    <?php $jk = $data['gender'] ?>
                    <label for=""><input type="radio" name="kelamin" value="laki-laki" <?php echo ($jk == 'laki-laki') ? "checked" : ""; ?>>Laki-laki</label>
                    <label for=""><input type="radio" name="kelamin" value="perempuan" <?php echo ($jk == 'perempuan') ? "checked" : ""; ?>>Perempuan</label>
                </div>
                <div style="margin-bottom: 10px;">
                    <label style="display: block;" for="alamat">Alamat</label>
                    <textarea required name="alamat" id="alamat" cols="30" rows="10"><?php echo $data['alamat'] ?></textarea>
                </div>
                <div style="margin-bottom: 10px;">
                    <label style="display: block;" for="agama">Agama</label>
                    <?php $agama = $data['agama']; ?>
                    <select name="agama" id="agama">
                        <option <?php echo ($agama == 'Budha') ? "selected" : ""; ?>>Budha</option>
                        <option <?php echo ($agama == 'Hindu') ? "selected" : ""; ?>>Hindu</option>
                        <option <?php echo ($agama == 'Islam') ? "selected" : ""; ?>>Islam</option>
                        <option <?php echo ($agama == 'Katholik') ? "selected" : ""; ?>>Katholik</option>
                        <option <?php echo ($agama == 'Konghuchu') ? "selected" : ""; ?>>Konghucu</option>
                        <option <?php echo ($agama == 'Kristen') ? "selected" : ""; ?>>Kristen</option>
                    </select>
                </div>
                <div style="margin-bottom: 10px;">
                    <label style="display: block;" for="foto">Foto</label>
                    <img src="../img/uploaded_foto/<?= $data['foto']; ?>" alt="">
                    <input type="file" name="foto" id="foto">
                </div>
                <div style="margin-bottom: 10px;">
                    <input type="submit" name="update" value="Update">
                </div>

            </form>
        </div>
    </div>
</body>

</html>