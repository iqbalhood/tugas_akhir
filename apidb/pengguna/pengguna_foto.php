<?php
require '../connect.php';

$connect = connect();


// Add the new data to the database.
$postdata = file_get_contents("php://input");
if(isset($postdata) && !empty($postdata))
{
    $request  = json_decode($postdata);
  
        $id           = $request->id;    
        $url          = $request->url;
       

        $sql = "UPDATE pengguna SET    foto    ='$url'
                                WHERE   nip     ='$id'";


        mysqli_query($connect,$sql);
        echo $sql;

}

exit;

