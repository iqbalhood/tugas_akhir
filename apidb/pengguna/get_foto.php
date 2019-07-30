<?php
/*
 * kode untuk tampilak semua fakultas, pada halaman fakultass
 */
$response = array();

// include db connect class
require_once '../../config/db_connect.php';
$id = $_GET['id'];
$foto = "";
// ckonekin ke db
$db = new DB_CONNECT();
	 
	//  get by event
	$result = mysql_query("SELECT foto FROM pengguna where nip='$id' ") or die(mysql_error());
		// cek
		if (mysql_num_rows($result) > 0) {
		    // looping hasil
		    // event node
	     while ($row = mysql_fetch_array($result)) {
			$foto			    	= $row["foto"];
		 }
		    echo $foto;
		} 
