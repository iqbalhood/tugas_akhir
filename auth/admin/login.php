<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "perpustakaan";
$pass = md5($_POST['user_password']);

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT nip, password from pengguna WHERE nip='".$_POST['user_username']."' && password='".$pass."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
	echo "correct";
} else {
    echo "wrong";
}
$conn->close();
?>



