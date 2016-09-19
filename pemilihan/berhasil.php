<!-- Author : Waffi Fatur Rahman-->

<!DOCTYPE html>
<html lang="en">
	
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title>Profil Cakabem</title>

		<!-- Bootstrap -->
		<link href="./../assets/css/bootstrap.min.css" rel="stylesheet">
		<link href="./../assets/css/style.css" rel="stylesheet">

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
	<div class="jumbotron">
			<div class="container">
				<div class="row">
					<div class="col-lg-2 bg">
						<img class="left" src="./../img/logo-kema-polban.png"></img>
					</div>

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

?> 
					<div class="col-lg-7 bg">
						<h1>Pemilihan Berhasil</h1>						
						<p>Anda memilih nomor urut <?php echo $nomor; ?></p>						
					</div>
					<div class="col-lg-2 bg">
					<a class="btn-menu btn btn-primary btn-lg" style="background-color:red" href="./../index.php" >Log Out</a>
					</div>
				</div>
			</div>
		</div>
<?php
   }
	}else{
		?>  		<div class="col-lg-7 bg">
						<h1>ERROR</h1>											
					</div>
					<div class="col-lg-2 bg">
					<a class="btn-menu btn btn-primary btn-lg" style="background-color:red" href="./../index.php" > Log In</a>
					</div>
				</div>
			</div>
		</div><?php
   	}
   		?> 
<?php include("../php/footer-text.php"); ?>
		<!--countdown javascript-->
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="./../assets/js/jquery-2.1.4.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="./../assets/js/bootstrap.min.js"></script>
	</body>
	</html>