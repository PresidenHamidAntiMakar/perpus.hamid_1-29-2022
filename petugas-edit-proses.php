<!-- Proses Update -->
<?php
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $jabatan = $_POST['jabatan'];
    $no_telp = $_POST['no_telp'];
    $alamat = $_POST['alamat'];
    $username = $_POST['username'];
    $password = $_POST['password'];


    $query_update = mysqli_query($koneksi,"UPDATE petugas SET nama = '$nama',
                                                            jabatan = '$jabatan', 
                                                            no_telp = '$no_telp', 
                                                            alamat = '$alamat',
                                                            username = '$username',
                                                            password = '$password'
                                                            WHERE id_petugas = '$id'");

if($query_update)
    {
        ?>
            <div class="alert alert-success">
                Data Berhasil Diupdate !!!
            </div>
        <?php
        //header('refresh:2; URL=http://localhost/perpus.hamid/admin.php?page=petugas');
    }
    else
    {
        ?>
            <div class="alert alert-danger">
                Data GAGAL Diupdate !!!!!!!!!
            </div>
        <?php
    }

////End of proses delete data/////////////////////////////////////////////////////////////////////////

?>