<!-- Author : Waffi Fatur Rahman-->
<!DOCTYPE html>
<html lang="en">
	
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title>Pemilihan</title>

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
include("./../php/credentials.php");
				
$db = new PDO(DB_DSN, DB_USER, DB_PASS);

$no = $db->query("SELECT * FROM no_pasangan")->fetchALL();



session_start();

if (isset($_SESSION['login_user'])) {

	$username= $_SESSION['login_user'];
	$result = $db->query("SELECT * FROM pemilih WHERE nim='$username'")->fetch();
	// echo $_SESSION['login_user'];
	if (!isset($result['id_nomor'])) {

?>					
					<div class="col-lg-7 bg">
						<h1>Profil Cakabem</h1>						
						<p>Profil Calon Ketua BEM Kema Polban 2016</p>						
					</div>
					<div class="col-lg-2 bg">
					<a class="btn-menu btn btn-primary btn-lg" style="background-color:red" href="./logout.php" >Log Out</a>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
		<?php foreach($no as $key => $row): ?>
			<?php				
				$nomor = $row['id_nomor'];
				$calon = $db->query("SELECT c.* FROM calon c WHERE c.id_nomor = $nomor")->fetchALL();
			?>
			<div class="calon">	
				<table class="table-bordered">
					<th colspan="2"><h1 class="number"><?php echo $row['id_nomor'];?></h1></th>
					<tr>
						<td class="calontext">Cakabem</td>
						<td class="calontext">Cawakabem</td>
					</tr>
					<tr>
						<?php foreach($calon as $key => $col): ?>
						<td><img src="../img/<?php echo $col['foto'];?>" class="calon"></img></td>
						<?php endforeach ?>
					</tr>
					<tr>
						<?php foreach($calon as $key => $col): ?>
						<td class="calontext"><?php echo $col['nama_calon'];?></td>
						<?php endforeach ?>
					</tr>
					<tr>
					<td colspan="2">
					<a class="btn-menu btn btn-primary btn-lg modalCall" data-a= "<?php echo $row['id_nomor']?>" style="background-color:blue"  data-toggle="modal" data-target="#myModal" >Pilih</a>
						
						<a class="btn-menu btn btn-primary btn-lg" style="background-color:orange" href="./../profil/detilprofil.php?no=<?php echo $row['id_nomor']?>">Detil Profil</a>
						</td>
					</tr>
				</table>
			</div>
		<?php endforeach ?>
		</div>
<?php

	}
	else{
		header("location: data_pemilih.php");
	}
}
else{
		header("location: ../index.php");
}
?>

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			
		</div>
	</div>
</div>

		<?php include("../php/footer-text.php"); ?>
		<!--countdown javascript-->
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="./../assets/js/jquery-2.1.4.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="./../assets/js/bootstrap.min.js"></script>
		<script>
	    $('.modalCall').click(function(){
	        var ID = $(this).attr('data-a');
	        $.ajax({url:"modal.php?no="+ID,cache:false,success:function(result){
	            $(".modal-content").html(result);
	        }});
	    });
		</script>
	</body>
</html>