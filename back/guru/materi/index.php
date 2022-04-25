<?php
    include "materi/koneksi.php";
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Materi</title>
</head>

<body>
    <div class="container mt-3">
        <a href="index.php?page=materi_create" class="btn btn-primary btn-md mb-3">Tambah Data</a>

        <table class="table table-striped table-hover table-bordered">
            <thead class="table-success">
                <th>No</th>`
                <th>Kategori</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Thumbnail</th>
                <th>Aksi</th>
            </thead>
            <?php
        $sqlGet = "SELECT * FROM tb_materi";
        $query = mysqli_query($koneksi, $sqlGet);

        while($data = mysqli_fetch_array($query)) {
            echo "
       <tbody>
            <tr>
                <td>$data[nomor]</td>
                <td>$data[kategori]</td>
                <td>$data[judul]</td>
                <td>$data[deskripsi]</td>
                <td>$data[thumbnail]</td>
                <td>
                    <div class='row'>
                    <div class='col d-flex justify-content-center'>
                        <a href='index.php?page=$data[nomor]' class='btn btn-sm btn-warning'>Update</a>
                    </div>
                    <div class='col d-flex justify-content-center'>
                        <a href='index.php?page=$data[nomor]' class='btn btn-sm btn-danger'>Delete</a>
                    </div>
                    </div>
                </td>
            </tr>
       </tbody>
       ";
    }
    ?>
        </table>
    </div>
</body>

</html>