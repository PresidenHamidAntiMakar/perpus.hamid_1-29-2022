<?php //koding ini digunakan untuk menghubungkan database dengan halaman admin

$server   ="localhost";
$username ="root";
$password ="";
$db  ="01_perpustakaan_12rpl2"; // untuk menghubungkan ke database

$koneksi = mysqli_connect($server, $username, $password, $db); //db = database

//if($koneksi) {
//   echo ("koneksi berhasil");
//}
//else{
//    echo "Koneksi gagal";
//}

?>
