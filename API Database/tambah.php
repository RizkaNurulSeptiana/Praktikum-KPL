<?php
require_once('../config/koneksi_db.php');
if (isset($_POST['Nama_Produk']) && isset($_POST['Tipe_Produk']) && isset($_POST['Harga']) && isset($_POST['Stock'])) {
        $Nama_Produk = $_POST['Nama_Produk'];
        $Tipe_Produk = $_POST['Tipe_Produk'];
        $sql = $conn->prepare("INSERT INTO produk (Nama_Produk, Tipe_Produk, Harga, Stock) VALUES (?, ?, ?, ?)");
        $Harga = $_POST['Harga'];
        $Stock = $_POST['Stock'];
        $sql->bind_param('ssdd', $Nama_Produk, $Tipe_Produk, $Harga, $Stock);
        $sql->execute();
        if ($sql) {
            //echo json_encode(array('RESPONSE' && 'FAILED'));
            echo json_encode(array('RESPONSE' => 'SUCCESS'));
            //header("location:../readapi/tampil.php");
        } else {
            echo "GAGAL";
        }
}
?>
