<?php
  include('db_config.php'); //agar index terhubung dengan database, maka koneksi sebagai penghubung harus di include
  
?>
<!DOCTYPE html>
<html>
  <head>
    <title>CRUD - Tambah Data Karyawan</title>
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
        border-radius: 15px;
        background: #F7C8E0;
      }
    </style>
  </head>
  <body>
      <center>
        <h1>Tambah Data Karyawan</h1>
      <center>
      <form method="POST" action="prosesCreate.php" enctype="multipart/form-data" >
      <section class="base">
        <div>
          <label>Nama</label>
          <input type="text" name="nama" autofocus="" required="" />
        </div>
        <div>
          <label>Alamat</label>
         <input type="text" name="alamat" />
        </div>
        <div>
          <label>Nomor Telepon</label>
         <input type="text" name="telepon" required="" />
        </div>
        <div>
          <label>Email</label>
         <input type="text" name="email" required="" />
        </div>
        <div>
          <label>Jabatan</label>
         <input type="text" name="jabatan" required="" />
        </div>
        <div>
          <label>Gaji</label>
         <input type="text" name="gaji" required="" />
        </div>
        <div>
          <label>Foto</label>
         <input type="file" name="foto" required="" />
        </div>
        <div>
         <button type="submit">Simpan Produk</button>
        </div>
        </section>
      </form>
  </body>
</html>