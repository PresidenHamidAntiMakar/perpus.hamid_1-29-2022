<div class="container">
<?php
// Proses Insert Tambah Data
if(isset($_POST['simpan']))
{
   $nis                = $_POST['nis'];
   $nama               = $_POST['nama'];
   $id_kelas           = $_POST['id_kelas'];
   $id_jurusan         = $_POST['id_jurusan'];
   $tempat_lahir       = $_POST['tempat_lahir'];
   $tgl_lahir          = $_POST['tgl_lahir'];
   $no_telp            = $_POST['no_telp'];
   $alamat             = $_POST['alamat'];
   $jk                 = $_POST['jk'];
     $query_insert = mysqli_query($koneksi, "INSERT INTO anggota VALUES('','$nis','$nama','$id_kelas','$id_jurusan','$tempat_lahir','$tgl_lahir','$no_telp','$alamat','$jk')");
    
    // Membuat notifikasi jika berhasil/tidak disimpn datany
    if($query_insert) 
    {
        ?> 
            <div class="alert alert-success">
                Data Berhasil Disimpan !!!
            </div>
        <?php
        header('Refresh:2; URL=http://localhost/perpus.hamid/admin.php?page=anggota');
    }
    else
    {
        ?>
            <div class="alert alert-danger">
                Data GAGAL Disimpan !!!
            </div>
        <?php 
       header('Refresh:2; URL=http://localhost/perpus.hamid/admin.php?page=anggota');
    }

}
?>
<div class="container">