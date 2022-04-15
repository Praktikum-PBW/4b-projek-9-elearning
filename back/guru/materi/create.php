<?php
    include "koneksi.php";
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
    <div class="w-50 mx-auto border p-3 mt-3">
        <a href="index.php?page=materi">Kembali</a>
        <form action="" method="post">
            <label for="nomor">No</label>
            <input type="text" id="nomor" name="nomor" class="form-control" required>

            <label for="kategori">Kategori</label>
            <select name="kategori" id="kategori" class="form-select" required>
                <option>Pilih Kategori</option>"
                <option value="matematika">Matematika</option>
                <option value="indonesia">Bahasa Indonesia</option>
                <option value="biologi">Biologi</option>
            </select>

            <label for="judul">Judul</label>
            <input type="text" id="judul" name="judul" class="form-control" required>

            <label for="deskripsi">Deskripsi</label>
            <input type="text" id="deskripsi" name="deskripsi" class="form-control" required>

            <label for="judul">Thumbnail</label>
            <input type="text" id="thumbnail" name="thumbnail" class="form-control" required>

            <input class="btn btn-success mt-3" type="submit" name="tambah" value="Tambah Materi">
        </form>
    </div>

    <?php

    if(isset($_POST['tambah'])) {
        $nomor = $_POST['nomor'];
        $kategori = $_POST['kategori'];
        $judul = $_POST['judul'];
        $deskripsi = $_POST['deskripsi'];
        $thumbnail = $_POST['thumbnail'];

    $kategoriSelect = $_POST['kategori'];
      if ($kategoriSelect == 'matematika') {
            $kategori = 'Matematika';
    } if ($kategoriSelect == 'indonesia') {
            $kategori = 'Bahasa Indonesia';
    } if ($kategoriSelect == 'biologi') {
            $kategori = 'Biologi';
    }

        $sqlGet = "SELECT * FROM tb_materi WHERE nomor=$nomor";
        $queryGet = mysqli_query($koneksi, $sqlGet);
        $cek = mysqli_num_rows($queryGet);

        $sqlInsert = "INSERT INTO tb_materi (nomor, kategori, judul, deskripsi, thumbnail)
                      VALUES ('$nomor', '$kategori', '$judul', '$deskripsi', '$thumbnail')";

        $queryInsert = mysqli_query($koneksi, $sqlInsert);

        if (isset($sqlInsert) && $cek <= 0) {
            echo "
            <div class='alert alert-success'>Data berhasil ditambahkan <a href ='index.php'>Lihat data</a></div>
            ";
        }   else if ($cek > 0) {
            echo"
            <div class='alert alert-danger'>Data gagal ditambahkan <a href='index.php'>Lihat data</a></div>
            ";
        }
    }
        ?>
</body>

</html>