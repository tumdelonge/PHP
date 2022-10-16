<?php
require 'function.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Informasi</title>
</head>
<style>
    .foto-tabel {
        width: 150px;
        height: 150px;
    }
</style>

<body>
    <div class="container" style="width: 80%; margin: auto;">
        <header>
            <h2>Data Informasi</h2>
        </header>
        <div><a href="../index.php">back</a></div>
        <section id="table">
            <table border="1">
                <tr>
                    <th>No</th>
                    <th>NIP</th>
                    <th>Nama</th>
                    <th>Kelamin</th>
                    <th>alamat</th>
                    <th>Agama</th>
                    <th>Foto</th>
                    <th>Option</th>

                </tr>

                <?php
                // query tampil data
                $query = mysqli_query($conn, "SELECT * FROM pegawai");
                $i = 0;
                while ($data = mysqli_fetch_array($query)) {
                    $i++;
                    echo "<tr>";
                    echo "<td>" . $i . "</td>";
                    echo "<td>" . $data['nip'] . "</td>";
                    echo "<td>" . $data['nama'] . "</td>";
                    echo "<td>" . $data['gender'] . "</td>";
                    echo "<td>" . $data['alamat'] . "</td>";
                    echo "<td>" . $data['agama'] . "</td>";
                    echo "<td><img  class='foto-tabel' src='../img/uploaded_foto/$data[foto]'></td>";

                    echo "<td>";
                    echo "<a href='form-edit.php?id=" . $data['id'] . "'>edit</a> | ";
                    echo "<a href='hapusdata.php?id=" . $data['id'] . "'>hapus </a>";
                    echo "</td>";

                    echo "</tr>";
                }
                ?>
            </table>
            <?php echo mysqli_num_rows($query) ?>
        </section>
    </div>
</body>

</html>