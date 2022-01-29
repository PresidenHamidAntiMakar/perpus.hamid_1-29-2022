<center><h4 class="mt-4 mb-3">Data Anggota</h4></center>
<div class="container">
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Tambah Data
</button>
<!-- =========================================================================================== -->
<table class="table table-dark">
    <tr>
        <th>No</th>
        <th>NIS</th>
        <th>Nama</th>
        <th>Kelas</th>
        <th>Jurusan</th>
        <th>Tempat Lahir</th>
        <th>Tgl Lahir</th>
        <th>Tlp</td>
        <th>Alamat</th>
        <th>Gender</th>
        <th>--Action--</th>
    </tr>
    <?php
    //Query Join 3 tabel///////////////////////////////////
        $querybaru = mysqli_query($koneksi,"SELECT anggota.id_anggota, anggota.nis, anggota.nama, anggota.id_kelas, 
        anggota.id_jurusan, anggota.tempat_lahir, anggota.tgl_lahir, anggota.no_telp,
        anggota.alamat, anggota.jk, kelas.nama_kelas, jurusan.nama_jurusan
        FROM anggota
        JOIN kelas ON anggota.id_kelas = kelas.id_kelas
        JOIN jurusan ON anggota.id_jurusan = jurusan.id_jurusan");
        //End of query Join tabel//////////////////////////////////////////////////////
        //$query = mysqli_query($koneksi,"SELECT * FROM anggota");
        $no = 1;
        foreach ($querybaru as $row) {
    ?>
    <tr>
        <td align="center" valign="middle"><?php echo $no; ?></td>
        <td valign="middle"><?php echo $row['nis']; ?></td>
        <td valign="middle"><?php echo $row['nama']; ?></td>
        <td valign="middle"><?php echo $row['nama_kelas']; ?></td>
        <td valign="middle">
        <?php
                 // $idjurusan =  $row['id_jurusan'];
                // $query_jurusan = mysqli_query($konek,"SELECT * FROM jurusan WHERE id_jurusan = '$idjurusan'");
                // foreach ($query_jurusan as $jurusan) {
                //     echo $jurusan['nama_jurusan'];
                // }
        ?>
            <?php echo $row['nama_jurusan']; ?>
        </td>
        <td valign="middle"><?php echo $row['tempat_lahir']; ?></td>
        <td valign="middle"><?php echo $row['tgl_lahir']; ?></td>
        <td valign="middle"><?php echo $row['no_telp']; ?></td>
        <td valign="middle"><?php echo $row['alamat']; ?></td>
        <td align="center" valign="middle"><?php echo $row['jk']=="L"?"Laki-laki":"Perempuan"; ?></td>
        <td valign="middle">
        <a href="?page=anggota-delete&delete&id=<?php echo $row['id_anggota'];?>">
                <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
            </a>
        <a  href="?page=anggota-edit&edit&id=<?php echo $row['id_anggota'];?>">
            <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit-modal"><i class="fas fa-edit"></i></button>
           </a>
        </td>
    </tr>
    <?php
    $no++;
    }
    ?>
</table>
<!-- ============================================================================ -->


<!-- Modal Input Data -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Anggota</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <!-- Form Input Anggota ======================================================= -->
            <form action="?page=anggota-insert" method="post">
                <div class="form-group">
                    <input class="form-control" type="text" name="nis" placeholder="NIS" required>
                </div>
                <div class="form-group mt-2">
                    <input class="form-control" type="text" name="nama" placeholder="Nama Siswa" required>
                </div>
                <div class="form-group mt-2">
                    <select class="form-control" name="id_kelas" required="">
                        <option value="">---Pilih Kelas---</option>
                        <?php 
                         $query_kelas = mysqli_query($koneksi, "SELECT * FROM kelas");
                         foreach ($query_kelas as $kelas) {
                             ?>
                             <option value="<?php echo $kelas['id_kelas'] ?>"><?php echo $kelas['nama_kelas']?></option>
                             <?php
                         }
                        ?>
                    </select>
                </div>
                <div class="form-group mt-2">
                    <select class="form-control" name="id_jurusan" required="">
                        <option value="">---Pilih Jurusan---</option>
                        <?php 
                         $query_jurusan = mysqli_query($koneksi, "SELECT * FROM jurusan");
                         foreach ($query_jurusan as $jurusan) {
                             ?>
                             <option value="<?php echo $jurusan['id_jurusan'] ?>"><?php echo $jurusan['nama_jurusan']?></option>
                             <?php
                         }
                        ?>
                    </select>
                </div>
                <div class="form-group mt-2">
                    <input class="form-control" type="text" name="tempat_lahir" placeholder="tempat_lahir">
                </div>
                <div class="form-group mt-2">
                    <div class="input-group">
                        <span class="input-group-text" >Tanggal Lahir</span>
                        <input class="form-control" type="date" name="tgl_lahir">
                    </div>
                </div>
                <div class="form-group mt-2">
                    <input class="form-control" type="text" name="no_telp" placeholder="No Telepon">
                </div>
                <div class="form-group mt-2">
                    <textarea class="form-control" name="alamat" placeholder="Alamat Lengkap"></textarea>
                </div>
                <div class="form-group mt-2">
                    <select class="form-control" name="jk">
                        <option value="">--Pilih Gender--</option>
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>
        <!-- ====================================================================================== -->
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button class="btn btn-success mt-2" type="submit" name="simpan">Simpan</button>
        </div>
            <!-- tag tutup formnya pinda ke sini -->
            </form>
            <!-- ================================================================================= -->
        </div>
    </div>
</div>
<!-- End of modal input data -->


<!-- Modal Edit Data -->

