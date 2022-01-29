<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN ADMIN</title>
    <link rel="stylesheet" href="bootstrap-5.1.3-dist/bootstrap-5.1.3-dist/css/bootstrap.min.css">
    <style>
        
        
    </style>
</head>
<body>
    <div class="container-fluid">
        <video width="100%" autoplay muted>
            <source src="bg.mp4" type="video/mp4">
        </video>
        <div class="row">
            <div class="col-7">
                <img src="title.png" width="100%" alt="">
            </div>
            <div class="col-4">
                <div class="kotak-luar">
                    <div class="kotak-login p-5">
                    <center><img src="7.png" width="50%" alt=""></center>
                        <center><h1 class="mt-5">Login Account</h1></center>
                        <form action="" method="post">
                            <div class="form-group mt-5 mb-5">
                                <!-- <label for="username">Username</label> -->
                                <input class="form-control" type="text" id="username" name="username" placeholder="username" required>
                            </div>
                            <div class="form-group mb-5">
                                <!-- <label for="password">Password</label> -->
                                <input class="form-control" type="password" id="password" name="password" placeholder="password" required>
                            </div>
                            <div class="form-group">
                                <center><button class="btn btn-primary" name="login" type="submit">LOGIN</button></center>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-1"></div>
        </div>
    </div>
    <?php
    include('koneksi.php');
        if (isset($_POST['login'])) { //ketika login di tekan akan mecinptakan index login
            $username = $_POST['username']; //data username yang di isi akan masuk ke variabel ini
            $password = $_POST['password'];
            
            $query = mysqli_query($koneksi,"SELECT * FROM petugas WHERE username = '$username'"); //lalu di proses apakah benar
            foreach ($query as $row) {
                $nama = $row['nama'];
                $jabatan = $row['jabatan'];
                $hash = $row['password'];
            }
           if (mysqli_num_rows($query)>0) {
               if (password_verify($password, $hash)) { //jika password benar maka jalankan
                session_start();
                $_SESSION['status']="login";
                $_SESSION['nama']=$nama;
                $_SESSION['jabatan']=$jabatan;
                 ?>
                 <script>
                 alert('Anda Berhasil Login')
                 window.location.href='http://localhost/perpus.hamid/admin.php';
                 </script>
                 <?php
               }
           }else{
               ?>
               <script>
                   alert('Username atau Password anda salah !!!!')
               </script>
               <?php
           }
        }
    ?>
</body>
</html>
<center>© 2022 Abdul Hamid, Inc.</center> 