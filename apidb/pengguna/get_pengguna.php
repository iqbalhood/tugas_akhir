<?php
/*
 * kode untuk tampilak semua fakultas, pada halaman fakultass
 */
$response = array();

// include db connect class
require_once '../../config/db_connect.php';
$nip = $_GET['nip'];
// ckonekin ke db
$db = new DB_CONNECT();
	 
	//  get by event
	$result = mysql_query("SELECT nama, level,foto FROM pengguna where nip='$nip' ") or die(mysql_error());
		// cek
		if (mysql_num_rows($result) > 0) {
		    // looping hasil
		    // event node
            $response["event"] = array();
      
	     while ($row = mysql_fetch_array($result)) {
			

			$event 							= array();			
			$event["nama"] 				    = $row["nama"];
			$event["level"] 			    = $row["level"];
			$event["foto"] 			    	= $row["foto"];
            
			
			array_push($response["event"], $event);
		 }
		    // sukses
		    $response["success"] = 1;

		    // echo JSON response
		    echo json_encode($response);
		} else {
            
            $response["success"] = 0;
		    $response["message"] = "Tidak ada data yang ditemukan";

		    echo json_encode($response);
        }
