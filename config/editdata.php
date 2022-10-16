<?php
require 'function.php';

if (isset($_POST['update'])) {
    // ambil data dari form edit
    $id = $_POST['id'];
    $nip = $_POST['nip'];
    $nama = $_POST['nama'];
    $kelamin = $_POST['kelamin'];
    $alamat = $_POST['alamat'];
    $agama = $_POST['agama'];

    // upload foto
    $foto = upload1();
    if (!$foto) {
        return false;
    }

    // query update
    $query = mysqli_query($conn, "UPDATE pegawai SET nip='$nip', nama = '$nama', gender = '$kelamin', agama = '$agama', alamat = '$alamat', agama = '$agama', foto = '$foto'");

    return mysqli_affected_rows($conn);

    if ($query) {
        header('location: informasi.php?statusedit=sukses');
    } else {
        header('location: informasi.php?statusedit=gagal');
    }
}

// function upload()
function upload1()
{
    // ambil data file
    $fileName = $_FILES['foto']['name'];
    $size = $_FILES['foto']['size'];
    $error = $_FILES['foto']['error'];
    $tmpName = $_FILES['foto']['tmp_name'];

    // jika foto tidak dipilih
    if ($error === 4) {
        echo "
        <script>
        alert('Pilih foto terlebih dahulu')
        </script>";
        return false;
    }

    // jika size file lebih dari 2mb
    if ($size > 2000000) {
        echo "
        <script>
        alert('Ukuran foto terlalu besar');
        </script> ";
        return false;
    }

    // file extenntio check
    $ekstensiFileValid = ['jpg', 'jpeg', 'png'];
    $ekstensiFile = explode('.', $fileName);
    $ekstensiFile = strtolower(end($ekstensiFile));
    if (!in_array($ekstensiFile, $ekstensiFileValid)) {
        echo "
        <script>
        alert('file yang anda pilih bukan file foto')
        </script>";
        return false;
    }

    // upload & move foto
    $fileNamebaru = uniqid();
    $fileNamebaru .= '.';
    $fileNamebaru .= $ekstensiFile;
    move_uploaded_file($tmpName, '../img/uploaded_foto/' . $fileNamebaru);

    return $fileNamebaru;
}
