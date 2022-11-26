<?php
require_once('../config/koneksi_db.php');

$myArray = array();
    if(isset($_GET['id'])){
    $id=$_GET['id'];

        if($result = mysqli_query($conn, "SELECT * FROM produk WHERE id=$id")){
            while ($row = $result->fetch_array(MYSQLI_ASSOC)){
                $myArray[] = $row;
            }
        mysqli_close($conn);
        echo json_encode($myArray);
        }
    }  
?>
