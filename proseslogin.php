<?php 

 $koneksi = mysqli_connect('localhost','root','','login_alif');//mysqli_connect() digunakan untuk membuka koneksi baru ke server MySQL
 if (!$koneksi) {
 	echo "koneksi database gagal";
 }

 ?>