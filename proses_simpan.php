<?php

  // Load file connect.php
  include "connect.php";

  // Ambil Data yang dikirim dari form
  $nis = $_POST['nis'];
  $nama = $_POST['nama'];
  $jenis_kelamin = $_POST['jenis_kelamin'];
  $telp = $_POST['telp'];
  $alamat = $_POST['alamat'];
  $foto = $_FILES['foto']['name'];
  $tmp = $_FILES['foto']['tmp_name'];

  // Rename nama fotonya dengan menambahkan tanggal dan jam upload
  $fotobaru = date('dmYHis').$foto;
  // Set path folder tempat menyimpan fotonya
  $path = "images/".$fotobaru;

  // Proses upload
  if(move_uploaded_file($tmp, $path)){
    // Proses simpan ke Database
    $sql = $pdo->prepare("INSERT INTO siswa(nis, nama, jenis_kelamin, telp, alamat, foto) VALUES(:nis,:nama,:jk,:telp,:alamat,:foto)");
    $sql->bindParam(':nis', $nis);
    $sql->bindParam(':nama', $nama);
    $sql->bindParam(':jk', $jenis_kelamin);
    $sql->bindParam(':telp', $telp);
    $sql->bindParam(':alamat', $alamat);
    $sql->bindParam(':foto', $fotobaru);
    $sql->execute(); // Eksekusi query insert

    // cek proses penyimpanan ke database
    if($sql){
      header("location: index.php");
    } else{
      echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
      echo "<br><a href='form_simpan.php'>Kembali Ke Form</a>";
    }
  } else {
    echo "Maaf, Gambar gagal untuk diupload.";
    echo "<br><a href='form_simpan.php'>Kembali Ke Form</a>";
  }

?>