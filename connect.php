<?php
  $host = "localhost";
  $username = "root";
  $password = "";
  $database = "pweb_upload_image";
  
  // Koneksi ke MySQL dengan PDO
  $pdo = new PDO('mysql:host='.$host.';dbname='.$database, $username, $password);
?>