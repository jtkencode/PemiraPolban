<!-- Author : Waffi Fatur Rahman-->

<?php
session_start();
if(isset($_SESSION['login_user'])){
	if(isset($_GET['no'])){

	include("./../php/credentials.php");
	$db = new PDO(DB_DSN, DB_USER, DB_PASS);

	$nomor = $_GET['no'];

	$username = $_SESSION['login_user'];
	
	$currentTime = gmdate("Y-m-d H:i:s", time()+60*60*7);
		$statement = $db->prepare("UPDATE `pemilih` SET `id_nomor` = '$nomor', `waktu_pemilihan` = '$currentTime'  WHERE nim='$username'");
		$update = $statement->execute();
		header("location: finnish.php");
   }
	}else{
		header("location: ../index.php");
   	}
?> 
