<?php
  $host = "localhost"; 
  $user = "root";
  $pass = "";
  $database = "db_karyawan"; //nama database
  $koneksi = mysqli_connect($host,$user,$pass,$database);

  if(!$koneksi){
    die ("Koneksi dengan database gagal: ".mysql_connect_error()); //menampilkan error
  }
?>