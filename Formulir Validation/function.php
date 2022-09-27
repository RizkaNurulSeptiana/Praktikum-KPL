<?php

//koneksi
$koneksi = mysqli_connect('localhost','root','','formulir');

//submit
if(isset($_POST['submit'])){
    //jika tombol submit diklik
    $name = $_POST['name'];
    $birth_date = $_POST['birth_date'];
    $gender = $_POST['gender'];
    $phone_number = $_POST['phone_number'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $country = $_POST['country'];
    $city = $_POST['city'];

    //insert to db
    $insert = mysqli_query($koneksi,"INSERT INTO user (name,birth_date,gender,phone_number,password,email,country,city) values ('$name','$birth_date','$gender','$phone_number','$password','$email','$country','$city')");

    if($insert){
        //jika berhasil
        header('location:home.php'); //redirect ke halaman home

    } else {
        //jika gagal
        echo '
        <script>
            alert("Registrasi gagal");
            window.location.href="index.php";
        </script>
        ';
    }
}


?>