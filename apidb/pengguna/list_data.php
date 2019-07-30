<?php
/*
 * kode untuk tampilak semua fakultas, pada halaman fakultass
 */
require '../connect.php';
$response = array();
$connect = connect();
	 
	//  get by event
	$sql = "SELECT * FROM pengguna ORDER BY nip ";
	$result = mysqli_query($connect,$sql);
		// cek
		if (mysqli_num_rows($result) > 0) {
		    // looping hasil
		    // event node
            $response["event"] = array();
      
	     while ($row = mysqli_fetch_array($result)) {
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
