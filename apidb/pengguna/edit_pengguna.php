
<?php
require '../connect.php';

$connect = connect();


// Add the new data to the database.
$postdata = file_get_contents("php://input");
if(isset($postdata) && !empty($postdata))
{
    $request  = json_decode($postdata);
    if(isset($request->password)){
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
        $blokir              = $request->blokir;
        $pass                = md5($password);
        $userid              = $request->userid;
        $sql = "UPDATE pengguna SET nama        ='$nama',
                                 password       ='$pass',
                                 alamat         ='$alamat',
                                 telpon         ='$telpon',
                                 jenis_kelamin  ='$jenis_kelamin',
                                 tempat_lahir   ='$tempat_lahir',
                                 tanggal_lahir  ='$tanggal_lahir',
                                 level          ='$level',
                                 status         ='$status',
                                 blokir         ='$blokir'
                        WHERE nip               ='$nip'";


        $dienkrip = base64_encode($sql);
        $sql2 = "INSERT INTO `log_admin` (`id`, `waktu`,`jam`, `userid`,`aktivitas`, `detail`) VALUES (NULL, NOW(),  NOW(), '$userid', 'EDIT AKUN PENGGUNA', '$dienkrip');";


        mysqli_query($connect,$sql);
        mysqli_query($connect,$sql2);

        echo $sql;

    }else{
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
        $blokir              = $request->blokir;
        $userid              = $request->userid;
        $sql = "UPDATE pengguna SET nama        ='$nama',
                                 alamat         ='$alamat',
                                 telpon         ='$telpon',
                                 jenis_kelamin  ='$jenis_kelamin',
                                 tempat_lahir   ='$tempat_lahir',
                                 tanggal_lahir  ='$tanggal_lahir',
                                 level          ='$level',
                                 status         ='$status',
                                 blokir         ='$blokir'
                        WHERE nip               ='$nip'";

        $dienkrip = base64_encode($sql);
        $sql2 = "INSERT INTO `log_admin` (`id`, `waktu`,`jam`, `userid`,`aktivitas`, `detail`) VALUES (NULL, NOW(),  NOW(), '$userid', 'EDIT AKUN PENGGUNA', '$dienkrip');";

        mysqli_query($connect,$sql);
        mysqli_query($connect,$sql2);
        echo $sql;
    }
}
exit;

