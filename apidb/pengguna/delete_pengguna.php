<?php
require '../connect.php';

$connect = connect();

// Delete record by id.
$postdata = file_get_contents("php://input");
if(isset($postdata) && !empty($postdata))
{
    $request = json_decode($postdata);

    $id                  = $request->nip;
    $userid              = $request->userid;
    $sql = "DELETE FROM `pengguna` WHERE `nip` = '$id' LIMIT 1";

    $dienkrip = base64_encode($sql);
    $sql2 = "INSERT INTO `log_admin` (`id`, `waktu`,`jam`, `userid`,`aktivitas`, `detail`) VALUES (NULL, NOW(),  NOW(), '$userid', 'HAPUS AKUN PENGGUNA', '$dienkrip');";
    

    mysqli_query($connect,$sql);
    mysqli_query($connect,$sql2);
}