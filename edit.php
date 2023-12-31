<?php
  // memanggil file koneksi.php untuk membuat koneksi
include 'db_config.php';

  // mengecek apakah di url ada nilai GET id
  if (isset($_GET['id'])) {
    // ambil nilai id dari url dan disimpan dalam variabel $id
    $id = ($_GET["id"]);

    // menampilkan data dari database yang mempunyai id=$id
    $query = "SELECT * FROM karyawan WHERE id='$id'";
    $result = mysqli_query($koneksi, $query);
    // jika data gagal diambil maka akan tampil error berikut
    if(!$result){
      die ("Query Error: ".mysqli_errno($koneksi).
         " - ".mysqli_error($koneksi));
    }
    // mengambil data dari database
    $data = mysqli_fetch_assoc($result);
      // apabila data tidak ada pada database maka akan dijalankan perintah ini
       if (!count($data)) {
          echo "<script>alert('Data tidak ditemukan pada database');window.location='index.php';</script>";
       }
  } else {
    // apabila tidak ada data GET id pada akan di redirect ke index.php
    echo "<script>alert('Masukkan data id.');window.location='index.php';</script>";
  }         
  ?>
<!DOCTYPE html>
<html>
  <head>
    <title>CRUD - Edit</title>
    <style type="text/css">
      * {
        font-family: "Trebuchet MS";
      }
      h1 {
        text-transform: uppercase;
        color: #03071E;
      }
      button {
        background-color: #023E8A;
        color: #fff;
        padding: 10px;
        text-decoration: none;
        font-size: 12px;
        border-radius: 25px;
        margin-top: 20px;
      }
      label {
        margin-top: 10px;
        float: left;
        text-align: left;
        width: 100%;
      }
      input {
        padding: 6px;
        width: 100%;
        box-sizing: border-box;
        background: #f8f8f8;
        border: 2px solid #ccc;
        outline-color: #D77FA1;
        border-radius: 5px;
      }
      div {
        width: 100%;
        height: auto;
      }
      .base {
        width: 400px;
        height: auto;
        padding: 20px;
        margin-left: auto;
        margin-right: auto;
        background: #F7C8E0;
        border-radius: 15px;
      }
    </style>
  </head>
  <body>
      <center>
        <h1>Edit Data Karyawan <?php echo $data['nama']; ?></h1>
      <center>
      <form method="POST" action="prosesEdit.php" enctype="multipart/form-data" >
      <section class="base">
        <!-- menampung nilai id produk yang akan di edit -->
        <input name="id" value="<?php echo $data['id']; ?>"  hidden />
        <div>
          <label>Nama Karyawan</label>
          <input type="text" name="nama" value="<?php echo $data['nama']; ?>" autofocus="" required="" />
        </div>
        <div>
          <label>Alamat</label>
         <input type="text" name="alamat" value="<?php echo $data['alamat']; ?>" />
        </div>
        <div>
          <label>Nomor Telepon</label>
         <input type="text" name="telepon" required=""value="<?php echo $data['telepon']; ?>" />
        </div>
        <div>
          <label>Email</label>
         <input type="text" name="email" required="" value="<?php echo $data['email']; ?>"/>
        </div>
        <div>
          <label>Jabatan</label>
         <input type="text" name="jabatan" required=""value="<?php echo $data['jabatan']; ?>" />
        </div>
        <div>
          <label>Gaji</label>
         <input type="text" name="gaji" required="" value="<?php echo $data['gaji']; ?>"/>
        </div>
        <div>
          <label>Foto</label>
          <img src="gambar/<?php echo $data['foto']; ?>" style="width: 120px;float: left;margin-bottom: 5px;">
          <input type="file" name="foto" />
          <i style="float: left;font-size: 11px;color: red">Abaikan jika tidak merubah gambar produk</i>
        </div>
        <div>
         <button type="submit">Simpan Perubahan</button>
        </div>
        </section>
      </form>
  </body>
</html>