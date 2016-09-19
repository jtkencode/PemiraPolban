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
		<div class="jumbotron">
			<div class="container">
				<div class="row">
					<div class="col-lg-2 bg">
						<img class="left" src="./img/logo-kema-polban.png"></img>
					</div>
					<div class="col-lg-7 bg">
						<h1>Pemira Polban 2016</h1>
						
					</div>
					<?php if(isset($_SESSION['login_user'])):?>
					<div class="col-lg-2 bg">
					<a class="btn-menu btn btn-primary btn-lg" style="background-color:red" href="./pemilihan/logout.php" >Log Out</a>
					</div>
					<?php endif;?>
					<div class="col-lg-9 bg">
						<p>Pemilu Raya Politeknik Negeri Bandung, Pemilihan Ketua BEM Kema Polban 2016</p>
						
					</div>
					
				</div>
			</div>
		</div>

		<?php if (!$allowed) { ?>
		<div id="clockdiv">
			<h1>Hitung Mundur Menuju Pemilihan</h1>	
			<div>
				<span class="days"></span>
				<div class="smalltext">Days</div>
			</div>
			<div>
				<span class="hours"></span>
				<div class="smalltext">Hours</div>
			</div>
			<div>
				<span class="minutes"></span>
				<div class="smalltext">Minutes</div>
			</div>
			<div>
				<span class="seconds"></span>
				<div class="smalltext">Seconds</div>
			</div>
		</div>
		<?php }else if(!isset($_SESSION['login_user'])){ ?>
		 <div class="container">
		  <div class="col-md-offset-4 col-md-4" >
		  <form method="POST" action="" >
			<h2 class="form-signin-heading"><center>Login</center></h2>
			<input name="username" class="form-control" placeholder="Username" required autofocus>
			<input type="password" name="password" class="form-control" placeholder="Password" required>
			<button class="btn btn-lg btn-primary btn-block btn-login" name="submit" type="submit">Sign in</button>
		  </form>		  
		  </div>
		</div>
		<br>
		<?php

			}
		?>

		<div class="menu">
			<p>Informasi Lebih Lanjut:</p>
			<a class="btn-menu btn btn-primary btn-lg" style="background-color:blue" href="./profil/">Profil Cakabem</a>
			<a class="btn-menu btn btn-primary btn-lg" style="background-color:#ffa500" href="./tatacara/">Cara Pemilihan</a>
		</div>
		
		<?php include("php/footer-text.php"); ?>
		<!--countdown javascript-->
		<script src="./timer/time.js"></script>
		<script type="text/javascript">
			var tempTime = <?php echo $chooseTime*1000;?>;
			var chooseTime = new Date(tempTime);
			initializeClock("clockdiv", chooseTime);
		</script>
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="./assets/js/jquery-2.1.4.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="./assets/js/bootstrap.min.js"></script>
	</body>
</html>

