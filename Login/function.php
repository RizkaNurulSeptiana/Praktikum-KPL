<?php


//koneksi
$koneksi = mysqli_connect('localhost','root','','login');

//daftar atau registrasi
if(isset($_POST['register'])){
    //jika tombol register diklik

    $username = $_POST['username'];
    $password = $_POST['password']; 
    $email = $_POST ['email']; //pure input user --belom dienkripsi


    //fungsi enkripsi
    $epassword = password_hash($password, PASSWORD_DEFAULT);

    //insert to db
    $insert = mysqli_query($koneksi,"INSERT INTO user (username,password,email) values ('$username','$epassword','$email')");

    if($insert){
        //jika berhasil
        header('location:index.php'); //redirect ke halaman login

    } else {
        //jika gagal
        echo '
        <script>
            alert("Registrasi gagal");
            window.location.href="register.php";
        </script>
        ';
    }
}

//login
if(isset($_POST['login'])){
    //jika tombol login diklik

    $username = $_POST['username'];
    $password = $_POST['password']; 
    $email = $_POST ['email']; //pure input user --belom dienkripsi


    //insert to db
    $cekdb = mysqli_query($koneksi,"SELECT * FROM user where username= '$username'");
    $hitung = mysqli_num_rows($cekdb);
    $pw = mysqli_fetch_array($cekdb);
    $passwordsekarang = $pw['password'];

    if($hitung>0){
        //jika ada
        //verify password
        if(password_verify($password,$passwordsekarang)){
            //jika password nya benar
            header('location:home.php'); //redirect ke halaman home
        } else {
            //jika password salah
        echo '
        <script>
            alert("Password salah");
            window.location.href="register.php";
        </script>
        ';

        }
    } else {
        //jika gagal
        echo '
        <script>
            alert("Login gagal");
            window.location.href="register.php";
        </script>
        ';
    }
}

?>