<?php
    require_once('../config/koneksi_db.php');
    $data = json_decode(file_get_contents("php://input"));

    if ($data->id!=null){
        $id             = $data->id;
        $Nama_Produk    = $data->Nama_Produk;
        $Harga          = $data->Harga;
        $Tipe_Produk    = $data->Tipe_Produk;
        $Stock          = $data->Stock;

        $sql = $conn->prepare("UPDATE produk SET Nama_Produk=?, Tipe_Produk=?, Harga=?, Stock=? WHERE id=?");
    //pada bind parameter ssdd berarti tipe data yang dikirimkan s= string, d=double, i=interfer.
        $sql->bind_param('ssddd', $id, $Nama_Produk, $Tipe_Produk, $Harga, $Stock);
        $sql->execute();
        if ($sql){
            echo json_encode(array('RESPONSE' => 'SUCCESS'));
        }else{
        echo json_encode(array('RESPONSE' => 'FAILED'));
    }
    }else {
        echo "GAGAL";
    }
?>
