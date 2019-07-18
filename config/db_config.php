<?php

/*
 * properti untuk konek ke db
 */


define('DB_USER', "root"); // db user
define('DB_PASSWORD', ""); // db password
define('DB_DATABASE', "perpustakaan"); // nama db
define('DB_SERVER', "localhost"); // db server



function connect()
{
  $connect = mysqli_connect(DB_HOST ,DB_USER ,DB_PASS ,DB_NAME);

  if (mysqli_connect_errno($connect))
  {
    die("Failed to connect:" . mysqli_connect_error());
  }

  mysqli_set_charset($connect, "utf8");


  return $connect;
}


?>
