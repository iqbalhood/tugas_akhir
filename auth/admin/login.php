<?php
// include db connect class
require_once '../../config/db_connect.php';

$pass = md5($_POST['user_password']);

// ckonekin ke db
$db = new DB_CONNECT();
	 
	//  get by event
	$result = mysql_query("SELECT nip, password from pengguna WHERE nip='".$_POST['user_username']."' && password='".$pass."'") or die(mysql_error());
		// cek
		if (mysql_num_rows($result) > 0) {
            echo "correct";
		}else { 
            echo 'wrong';
		}


?>
