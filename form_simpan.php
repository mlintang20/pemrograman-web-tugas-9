<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulir Pendaftaran Siswa Baru</title>

  <!-- CDN Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">

  <style>
    header {
      color: #19CD54;
    }
    fieldset {
      box-shadow: 4px -4px 8px green, -4px 4px 8px green, 4px 4px 8px green, -4px -4px 8px green;
      color: #19CD54;
    }
    input, textarea {
      border-radius: 15px;
    }
  </style>
</head>
<body class="bg-dark text-light">
  <header>
    <h1 class="text-center my-3">Tambah Data Siswa</h1>
  </header>

  <form method="POST" action="proses_simpan.php" enctype="multipart/form-data" class="d-flex justify-content-center mt-5">
    <fieldset class="p-4 rounded"> 
      <table cellpadding="10">
        <tr>
          <td>NIS</td>
          <td><input type="text" name="nis"></td>
        </tr>
        <tr>
          <td>Nama</td>
          <td><input type="text" name="nama"></td>
        </tr>
        <tr>
          <td>Jenis Kelamin</td>
          <td>
          <input type="radio" name="jenis_kelamin" value="Laki-laki">Laki-laki
          <input type="radio" name="jenis_kelamin" value="Perempuan">Perempuan
          </td>
        </tr>
        <tr>
          <td>Telepon</td>
          <td><input type="text" name="telp"></td>
        </tr>
        <tr>
          <td>Alamat</td>
          <td><textarea name="alamat"></textarea></td>
        </tr>
        <tr>
          <td>Foto</td>
          <td><input type="file" name="foto"></td>
        </tr>
      </table>
      
      <div class="mt-3 d-flex justify-content-center">
        <input type="submit" value="Simpan" class="bg-success text-light">
        <a href="index.php"><input type="button" value="Batal" class="bg-danger text-light"></a>
      </div>
    </fieldset>
  </form>
</body>
</html>