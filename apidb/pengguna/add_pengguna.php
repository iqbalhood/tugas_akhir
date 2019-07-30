
<?php
require '../connect.php';

$connect = connect();
// Add the new data to the database.
$postdata = file_get_contents("php://input");
if(isset($postdata) && !empty($postdata))
{
    $request  = json_decode($postdata);
    
    $nip                 = $request->nip;
    $nama                = $request->nama;
    $password            = $request->password;
    $alamat              = $request->alamat;
    $telpon              = $request->telpon;
    $jenis_kelamin       = $request->jenis_kelamin;
    $tempat_lahir        = $request->tempat_lahir;
    $tanggal_lahir       = $request->tanggal_lahir;
    $level               = $request->level;
    $status              = $request->status;
    $blokir              =  $request->blokir;
    $userid              = $request->userid;

    $pass   =   md5($password);
    
    $sql    = "INSERT INTO `pengguna` 
                            (   `nip`, 
                                `nama`, 
                                `password`,
                                `alamat`, 
                                `telpon`, 
                                `jenis_kelamin`, 
                                `tempat_lahir`, 
                                `level`,
                                `status`,
                                `blokir`, 
                                `tanggal_lahir`) 
                               VALUES 
                            (   '$nip', 
                                '$nama',
                                '$pass',
                                '$alamat', 
                                '$telpon', 
                                '$jenis_kelamin', 
                                '$tempat_lahir',
                                '$level', 
                                '$status',
                                '$blokir',
                                '$tanggal_lahir')";


$dienkrip = base64_encode($sql);
    $sql2 = "INSERT INTO `log_admin` (`id`, `waktu`,`jam`, `userid`,`aktivitas`, `detail`) VALUES (NULL, NOW(),  NOW(), '$userid', 'ADD AKUN PENGGUNA', '$dienkrip');";
              

    mysqli_query($connect,$sql);
    mysqli_query($connect,$sql2);
}
exit;
