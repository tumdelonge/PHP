<?php
require 'function.php';

if (isset($_GET['id'])) {
    // ambil data id
    $id = $_GET['id'];

    // query delete
    $query = mysqli_query($conn, "DELETE FROM pegawai WHERE id=$id");

    if ($query) {
        header('location: informasi.php?statusdelete=sukses');
    } else {
        header('location: iformasi.php?statusdekete=gagal');
    }
}
