<?php
// Database connection
$conn = mysqli_connect('localhost', 'root', '', 'dbcobacoba');

// connection check
if (!$conn) {
    die("Connection failed : " . mysqli_connect_error());
}

// tambahData() function
function tambahData($data)
{
    // global variabel $conn
    global $conn;
    // ambil data dari form
    $nip = $data['nip'];
    $nama = $data['nama'];
    $kelamin = $data['kelamin'];
    $alamat = $data['alamat'];
    $agama = $data['agama'];


    // tanggal input
    date_default_timezone_set("Asia/jakarta");
    $timestamp = strtotime('now');
    $stringDate = date('d-M-Y H:i', $timestamp);

    // upload gambar
    $foto = upload();
    if (!$foto) {
        return false;
    }

    // query insert data ke database
    $query = mysqli_query($conn, "INSERT INTO pegawai(nip, nama, gender, alamat, agama, foto, createdAt)VALUES('$nip', '$nama', '$kelamin', '$alamat', '$agama', '$foto', '$stringDate')");

    return mysqli_affected_rows($conn);
}

// upload() fungtion
function upload()
{
    // put foto data
    $fileName = $_FILES['foto']['name'];
    $size = $_FILES['foto']['size'];
    $error = $_FILES['foto']['error'];
    $tmpName = $_FILES['foto']['tmp_name'];

    // pick photo check
    if ($error === 4) {
        echo "
        <script>
        alert('Mohon pilih foto')
        </script>";
        return false;
    }

    // file size check
    if ($size > 2000000) {
        echo "
        <script>
        alert('Ukuran foto lebih dari 2Mb')
        </script>";
        return false;
    }

    // file extention check
    $ekstensiFileValid = ['jpg', 'jpeg', 'png'];
    $ekstensiFile = explode('.', $fileName);
    $ekstensiFile = strtolower(end($ekstensiFile));
    if (!in_array($ekstensiFile, $ekstensiFileValid)) {
        echo "
        <script>
        alert('File yang anda pilih bukan file foto')
        </script>";
        return false;
    }

    // last, upload & move foto file
    // generate nama file baru
    $fileNamebaru = uniqid();
    $fileNamebaru .= '.';
    $fileNamebaru .= $ekstensiFile;
    move_uploaded_file($tmpName, '../img/uploaded_foto/' . $fileNamebaru);

    return $fileNamebaru;
}

// function updateData()
function updateData($data)
{
    global $conn;
    // ambil data dari form
    $id = $data['id'];
    $nip = $data['nip'];
    $nama = $data['nama'];
    $kelamin = $data['kelamin'];
    $alamat = $data['alamat'];
    $agama = $data['agama'];
    $fotoLama = $data['fotoLama'];

    // jika update data tanpa mengganti foto
    if ($_FILES['foto']['error'] === 4) {
        $foto = $fotoLama;
    } else {
        $foto = upload();
    }

    // query update
    $query = mysqli_query($conn, "UPDATE pegawai SET nip='$nip', nama = '$nama', gender = '$kelamin', agama = '$agama', alamat = '$alamat', agama = '$agama', foto = '$foto' WHERE id=$id");

    return mysqli_affected_rows($conn);
}
