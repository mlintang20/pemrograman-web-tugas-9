<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>List Siswa dengan Foto</title>

  <!-- CDN Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">

  <style>
    td, th {
      border: 1.0px solid #fff;
      padding: 8px;
    }
  </style>
</head>
<body class="bg-dark text-light">
  <h1 class="text-center mt-3">Data Siswa</h1>

  <div class="d-flex flex-column justify-content-center mx-5">

    <nav>
      <button type="button" class="btn btn-primary my-3">
        <a href="form_simpan.php" class="text-light text-decoration-none">Tambah Siswa</a>
      </button>
    </nav>
    
    <table>
      <tr>
        <th class="text-center">Foto</th>
        <th class="text-center">NIS</th>
        <th class="text-center">Nama</th>
        <th class="text-center">Jenis Kelamin</th>
        <th class="text-center">Telepon</th>
        <th class="text-center">Alamat</th>
        <th class="text-center" colspan="2">Aksi</th>
      </tr>

      <?php
        // Load file connect.php
        include "connect.php";

        // Query untuk menampilkan data siswa
        $sql = $pdo->prepare("SELECT * FROM siswa");
        $sql->execute();

        while($data = $sql->fetch()){
          echo "<tr>";
          echo "<td class='text-center'><div class='text-center'><img src='images/".$data['foto']."' width='100' height='100'></div></td>";
          echo "<td class='text-center'>".$data['nis']."</td>";
          echo "<td class='text-center'>".$data['nama']."</td>";
          echo "<td class='text-center'>".$data['jenis_kelamin']."</td>";
          echo "<td class='text-center'>".$data['telp']."</td>";
          echo "<td class='text-center'>".$data['alamat']."</td>";
          
          echo "<td class='text-center'>";
          echo "<div class='btn-group' role='group'>";
          echo "<button type='button' class='btn btn-warning'><a href='form_ubah.php?id=".$data['id']."' class='text-dark text-decoration-none'>Edit</a></button>";
          echo "<button type='button' class='btn btn-danger'><a onClick=\"javascript: return confirm('Hapus data ".$data['nama']."?');\" href='proses_hapus.php?id=".$data['id']."' class='text-light text-decoration-none'>Hapus</a></button>";
          echo "</div>";
          echo "</td>";
          
          echo "</tr>";
        }
      ?>
    </table>

  </div>
</body>
</html>