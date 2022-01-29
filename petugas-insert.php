<div class="container">
<?php
// Proses Insert Tambah Data
if(isset($_POST['simpanpetugas']))
{
  echo $nama                 = $_POST['nama'];
   $jabatan              = $_POST['jabatan'];
   $no_telp              = $_POST['no_telp'];
   $alamat               = $_POST['alamat'];
   $username             = $_POST['username'];
   $password             = $_POST['password'];
   $options = [
        'cost' => 12,
    ];
    $password_encrypt = password_hash($password, PASSWORD_BCRYPT, $options);
    $query_insert = mysqli_query($koneksi, "INSERT INTO petugas VALUES('','$nama','$jabatan','$no_telp','$alamat','$username','$password_encrypt')");

    if($query_insert) 
    {
        ?> 
            <div class="alert alert-success">
                Data Berhasil Disimpan !!!
            </div>
        <?php
        header('Refresh:2; URL=http://localhost/perpus.hamid/admin.php?page=petugas');
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