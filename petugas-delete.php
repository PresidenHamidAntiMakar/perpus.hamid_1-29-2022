<div class="container">
<?php
// Proses Delete Data
if (isset($_GET['delete'])) {
    
    $id = $_GET['id'];
    $query_delete = mysqli_query($koneksi,"DELETE FROM petugas WHERE id_petugas = '$id'");

    //Jika query delete berhasil maka munculkan notifikasi dan refresh halaman
    if ($query_delete) {
        ?>
        <div class="alert alert-success">
            Data Berhasil DIHAPUS !!!!!!!!!!
        </div>
        <?php
        header('Refresh:2; URL=http://localhost/perpus.hamid/admin.php?page=petugas');
    }
}
// end of proses delete
?>
</div>