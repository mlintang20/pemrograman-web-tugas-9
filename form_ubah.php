<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulir Edit Data Siswa</title>

  <!-- CDN Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">

  <style>
    header {
      color: #FFC107;
    }
    fieldset {
      box-shadow: 4px -4px 8px #FFC107, -4px 4px 8px #FFC107, 4px 4px 8px #FFC107, -4px -4px 8px #FFC107;
      color: #FFC107;
    }
    input, textarea {
      border-radius: 15px;
    }
  </style>
</head>
<body class="bg-dark text-light">
  <header>
    <h1 class="text-center my-3">Ubah Data Siswa</h1>
  </header>

  <?php
    // Load file connect.php
    include "connect.php";
    
    // Ambil data id yang dikirim oleh index.php melalui URL
    $id = $_GET['id'];

    // Query untuk menampilkan data siswa berdasarkan ID yang dikirim
    $sql = $pdo->prepare("SELECT * FROM siswa WHERE id=:id");
    $sql->bindParam(':id', $id);
    $sql->execute(); // Eksekusi query insert
    $data = $sql->fetch(); // Ambil semua data dari hasil eksekusi $sql
  ?>

  <form method="POST" action="proses_ubah.php?id=<?php echo $id; ?>" enctype="multipart/form-data" class="d-flex justify-content-center mt-5">
    <fieldset class="p-4 rounded">
      <table cellpadding="10">
        <tr>
          <td>NIS</td>
          <td><input type="text" name="nis" value="<?php echo $data['nis']; ?>"></td>
        </tr>
        <tr>
          <td>Nama</td>
          <td><input type="text" name="nama" value="<?php echo $data['nama']; ?>"></td>
        </tr>
        <tr>
          <td>Jenis Kelamin</td>
          <td>
          <?php
          if($data['jenis_kelamin'] == "Laki-laki"){
            echo "<input type='radio' name='jenis_kelamin' value='Laki-laki' checked='checked'>Laki-laki";
            echo "<input type='radio' name='jenis_kelamin' value='Perempuan'>Perempuan";
          } else {
            echo "<input type='radio' name='jenis_kelamin' value='Laki-laki'>Laki-laki";
            echo "<input type='radio' name='jenis_kelamin' value='Perempuan' checked='checked'>Perempuan";
          }
          ?>
          </td>
        </tr>
        <tr>
          <td>Telepon</td>
          <td><input type="text" name="telp" value="<?php echo $data['telp']; ?>"></td>
        </tr>
        <tr>
          <td>Alamat</td>
          <td><textarea name="alamat"><?php echo $data['alamat']; ?></textarea></td>
        </tr>
        <tr>
          <td>Foto</td>
          <td>
            <input type="file" name="foto">
          </td>
        </tr>
      </table>

      <div class="mt-3 d-flex justify-content-center">
        <input type="submit" value="Edit" class="bg-warning text-dark">
        <a href="index.php"><input type="button" value="Batal" class="bg-danger text-light"></a>
      </div>
    </fieldset>
  </form>
</body>
</html>