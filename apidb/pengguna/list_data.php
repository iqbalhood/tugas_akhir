<?php
/*
 * kode untuk tampilak semua fakultas, pada halaman fakultass
 */
$response = array();

// include db connect class
require_once '../../config/db_connect.php';

// ckonekin ke db
$db = new DB_CONNECT();
	 
	//  get by event
	$result = mysql_query("SELECT * FROM pengguna ORDER BY nip ") or die(mysql_error());
		// cek
		if (mysql_num_rows($result) > 0) {
		    // looping hasil
		    // event node
            $response["event"] = array();
      
	     while ($row = mysql_fetch_array($result)) {
			$event 							    = array();			
			$event["nip"] 				        = $row["nip"];
			$event["nama"] 			            = $row["nama"];
			$event["password"] 			        = $row["password"];
			$event["alamat"] 			        = $row["alamat"];
			$event["telpon"] 			        = $row["telpon"];
			$event["jenis_kelamin"] 			= $row["jenis_kelamin"];
			$event["tempat_lahir"] 		        = $row["tempat_lahir"];
			$event["level"] 			        = $row["level"];
			$event["status"] 			        = $row["status"];
			$event["blokir"] 			        = $row["blokir"];
			$event["tanggal_lahir"] 			= $row["tanggal_lahir"];
			
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
