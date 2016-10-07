<!-- Author : Fadhlan Ridhwanallah-->

<?php
session_start();
	include("./php/credentials.php");
	$db = new PDO(DB_DSN, DB_USER, DB_PASS);
	$error=''; // Variabel untuk menyimpan pesan error
	if (isset($_POST['submit'])) {
		if (empty($_POST['username']) || empty($_POST['password'])) {
		$error = "Username or Password is invalid";
		}
		else
		{
		// Variabel username dan password
		$username=$_POST['username'];
		$password=$_POST['password'];
		// SQL query untuk memeriksa apakah pemilih terdapat di database?
		$result = $db->query("SELECT * FROM pemilih WHERE password='$password' AND nim='$username'")->fetch();

		if ($username == $result['nim']) {
		$_SESSION['login_user']=$username; // Membuat Sesi/session
		header("location: pemilihan/data_pemilih.php");
		} else {
		$error = "Username atau Password belum terdaftar";
		}
		}
	}
//-------------------------------------------------------------------------------------------------------------------------------------
$filename = './waktu_pemilihan.txt';
if (file_exists($filename)) {
	$fp = fopen($filename, 'r');
	if ($fp) {
		$chooseTimePlain = fgets($fp);
		$chooseTime = strtotime($chooseTimePlain);
		$currentTime = strtotime(gmdate("Y-m-d H:i:s", time()+60*60*7));
		
		
		$selisih =  $chooseTime - $currentTime;
		//echo "$chooseTime $currentTime $selisih";	
	}
	fclose($fp);
}

$allowed = false;
if (isset($chooseTime) && isset($currentTime)) {
	if ($selisih <= 0) {
		$allowed = true;
	}
}?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title>Pemira Polban 2016</title>

		<!-- Bootstrap -->
		<link href="./assets/css/bootstrap.min.css" rel="stylesheet">
		<link href="./assets/css/style.css" rel="stylesheet">

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

	</head>
	<body>
		<p align = "center"> THIS WEBSITE HAS BEEN HACKED BY MAULANA KAHFI</p>
	</body>
</html>

