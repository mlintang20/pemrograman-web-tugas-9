<?php

  // load file connect.php
  include "connect.php";

    // Ambil data ID yang dikirim oleh form_ubah.php melalui URL
    $id = $_GET['id'];

    $sql = $pdo->prepare("SELECT foto FROM siswa WHERE id=:id");
    $sql->bindParam(':id', $id);
    $sql->execute();
    $data = $sql->fetch();

    // Cek apakah file fotonya ada di folder images
    if(is_file("images/".$data['foto'])){
      unlink("images/".$data['foto']);
    }
    
    // hapus data siswa sesuai id nya
    $sql = $pdo->prepare("DELETE FROM siswa WHERE id=:id");
    $sql->bindParam(":id", $id);
    $execute = $sql->execute();

    // Cek apakah proses simpan ke database sukses atau tidak
    if($execute){
      header("location: index.php");
    } else {
      echo "Data gagal dihapus. <a href='index.php'>Kembali</a>";
    }


?>