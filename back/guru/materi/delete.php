<?php
    include "koneksi.php";

    $nomor = $_GET['nomor'];
    $sqlDelete = "DELETE FROM tb_materi WHERE nomor='$nomor'";
    mysqli_query($koneksi, $sqlDelete);

    header("location: index.php");
    ?>