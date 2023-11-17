<?php
  include('db_config.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include
  
?>
<!DOCTYPE html>
<html>
  <head>
    <title>CRUD</title>
    <style type="text/css">
      * {
        font-family: "Trebuchet MS";
      }
      h1 {
        text-align: center;
        text-transform: uppercase;
        color: #03071E;
      }
      table {
        border: solid 1px #DDEEEE;
        border-collapse: collapse;
        width: 80%;
        margin: 20px auto 10px auto;
      }
      table thead th {
        background-color: #F7C8E0;
        border: solid 1px #DDEEEE;
        color: #000;
        padding: 10px;
        text-align: left;
        text-decoration: none;
        border-radius: 5px;
      }
      table tbody td {
        border: solid 1px #DDEEEE;
        color: #333;
        padding: 10px;
        text-shadow: 1px 1px 1px #fff;
      }
      .btn-primary {
        background-color: blue;
        color: white;
        padding: 12px;
        border-radius: 18px;
        text-decoration: none;
        font-size: 16px;
        margin-left: 150px;
        text-shadow: 1px 1px 1px #fff;
      }
      .btn-success {
        background-color: green;
        color: #fff;
        padding: 10px;
        border-radius: 15px;
        text-decoration: none;
        font-size: 12px;
      }
      .btn-danger {
        background-color: red;
        color: #fff;
        padding: 10px;
        border-radius: 15px;
        text-decoration: none;
        font-size: 12px;
      }
    </style>
  </head>
  <body>
    <h1>Data Gaji Karyawan</h1>
    <a class="btn-primary" href="create.php"> + &nbsp;Tambah Data </a>
    <br>
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Nama</th>
          <th>Alamat</th>
          <th>No.Telepon</th>
          <th>Email</th>
          <th>Jabatan</th>
          <th>Gaji</th>
          <th>Foto</th>
          <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
      <?php
      // jalankan query untuk menampilkan semua data diurutkan berdasarkan nim
      $query = "SELECT * FROM karyawan ORDER BY id ASC";
      $result = mysqli_query($koneksi, $query);
      //mengecek apakah ada error ketika menjalankan query
      if(!$result){
        die ("Query Error: ".mysqli_errno($koneksi).
           " - ".mysqli_error($koneksi));
      }

      //buat perulangan untuk element tabel dari data mahasiswa
      $no = 1; //variabel untuk membuat nomor urut
      // hasil query akan disimpan dalam variabel $data dalam bentuk array
      // kemudian dicetak dengan perulangan while
      while($row = mysqli_fetch_assoc($result))
      {
      ?>
       <tr>
          <td><?php echo $no; ?>.</td>
          <td><?php echo $row['nama']; ?></td>
          <td><?php echo $row['alamat']; ?></td>
          <td><?php echo $row['telepon']; ?></td>
          <td><?php echo $row['email']; ?></td>
          <td><?php echo $row['jabatan']; ?></td>
          <td>Rp. <?php echo number_format ($row['gaji'],0,',','.'); ?></td>
          <td style="text-align: center;"><img src="gambar/<?php echo $row['foto']; ?>" style="width: 120px;"></td>
          <td>
              <a class="btn-success" href="edit.php?id=<?php echo $row['id']; ?>">Edit</a>
              <a class="btn-danger" href="delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</a>
          </td>
      </tr>
         
      <?php
        $no++; //untuk nomor urut terus bertambah 1
      }
      ?>
    </tbody>
    </table>
  </body>
</html>