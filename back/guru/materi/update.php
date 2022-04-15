<?php
    include "koneksi.php";

    $nomor = $_GET['nomor'];
    $sqlGet = "SELECT * FROM tb_materi WHERE nomor='$nomor'";
    $queryGet = mysqli_query ($koneksi, $sqlGet);
    $data = mysqli_fetch_array($queryGet);
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Materi</title>
</head>
<body>
    <div class="w-50 mx-auto border p-3 mt-3">
        <a href="index.php">Kembali</a>
        <form action="update.php" method="post">
            <label for="nomor">No</label>
            <input type ="text" id="nomor" name="nomor" value="<?php echo "$data[nomor]";?>" class="form-control" readonly>

            <label for="kategori">Kategori</label>
            <select name="kategori" id="kategori" class="form-select" required>
                <option><?php echo "$data[kategori]";?></option>
                <option value="matematika">Matematika</option>
                <option value="indonesia">Bahasa Indonesia</option>
                <option value="biologi">Biologi</option>
            </select>

            <label for="judul">Judul</label>
            <input type ="text" id="judul" name="judul" value="<?php echo "$data[judul]";?>" class="form-control" required>

            <label for="deskripsi">Deskripsi</label>
            <input type ="text" id="deskripsi" name="deskripsi" value="<?php echo "$data[deskripsi]";?>" class="form-control" required>

            <label for="judul">Thumbnail</label>
            <input type ="text" id="thumbnail" name="thumbnail" value="<?php echo "$data[thumbnail]";?>"class="form-control" required>

            <input class="btn btn-success mt-3" type ="submit" name="tambah" value= "Tambah Materi">
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
        $sqlUpdate = "UPDATE tb_materi
                    SET kategori='$kategori', judul='$judul', deskripsi='$deskripsi', thumbnail='$thumbnail'
                    WHERE nomor='$nomor'";
        
        $queryUpdate = mysqli_query($koneksi, $sqlUpdate);

                    header("location: index.php");
    }
        ?>
</body>
</html>