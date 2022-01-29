<div class="row">
    <div class="col-3"></div>
    <div class="col-6">
        <center><h2>Edit Data Anggota</h2></center> 
<?php
$id = $_GET['id'];
     $query = mysqli_query($koneksi,"SELECT * FROM petugas WHERE id_petugas = '$id'");
    //$query = mysqli_query($koneksi,"SELECT anggota.id_anggota, anggota.nis, anggota.nama, anggota.jk, 
    //    anggota.tempat_lahir,anggota.tgl_lahir, anggota.id_kelas, anggota.id_jurusan, anggota.no_telp, 
    //    anggota.alamat, kelas.id_kelas, kelas.nama_kelas, jurusan.id_jurusan, jurusan.nama_jurusan
    //    FROM anggota
    //    JOIN kelas ON anggota.id_kelas = kelas.id_kelas
    //    JOIN jurusan ON anggota.id_jurusan = jurusan.id_jurusan
    //    WHERE id_anggota = '$id'");
    foreach ($query as $row) {

?>
        <form action="?page=petugas-edit-proses" method="POST">
            <!-- Menyisipkan data id untuk proses update -->
            <input type="hidden" name="id" value="<?php echo $row['id_petugas'] ?>">
            <!--  -->
            <div class="form-group mt-2">
                <label for="">Nama</label>
                <input value="<?php echo $row['nama'] ?>" class="form-control" type="text" name="nama" placeholder="Nama Lengkap" required>
            </div>
            <div class="form-group mt-2">
                <label for="">Jabatan</label>
                <select class="form-control" name="jabatan" required="">
                    <option value=""><?php echo $row['jabatan'] ?></option>
                    <option value="Kepala Perpustakaan">Kepala Perpustakaan</option>
                    <option value="Pustakawan">Pustakawan</option>
                </select>
            </div>
            <div class="form-group mt-2">
                <label for="">No Telepon</label>
                <input value="<?php echo $row['no_telp'] ?>" class="form-control" type="text" name="no_telp">
            </div>
                <div class="form-group mt-2">
                    <label for="">Alamat</label>
                    <textarea name="alamat" class="form-control" placeholder="Alamat Lengkap"><?php echo $row['alamat'] ?></textarea>
                </div>
            <div class="form-group mt-2">
                <label for="">Username</label>
                <input value="<?php echo $row['username'] ?>" class="form-control" type="text" name="username">
            </div>
            <div class="form-group mt-2">
                <label for="">Password</label>
                <input value="<?php echo $row['password'] ?>" class="form-control" type="password" name="password">
            </div>
                <div class="form-group mt-2">
                <center>              
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" name="save" class="btn btn-primary">Save changes</button>
                </center>
                </div>
        </form>  
<?php
    }
?>
</div>
<div class="col-3"></div>
</div>