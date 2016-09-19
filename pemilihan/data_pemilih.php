<?php
session_start();
	include("./../php/credentials.php");
	$db = new PDO(DB_DSN, DB_USER, DB_PASS);
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title>Data Pemilih</title>

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
					<div class="col-lg-7 bg">
						<h1>Pemira Polban 2016</h1>
						
					</div>
					<?php if(isset($_SESSION['login_user'])):?>
					<div class="col-lg-2 bg">
					<a class="btn-menu btn btn-primary btn-lg" style="background-color:red" href="./logout.php" >Log Out</a>
					</div>
					<?php endif;?>
					<div class="col-lg-9 bg">
						<p>Pemilu Raya Politeknik Negeri Bandung, Pemilihan Ketua BEM Kema Polban 2016</p>
						
					</div>
					
				</div>
			</div>
		</div>

		<?php
			$username = $_SESSION['login_user'];
			// $result = $db->query("SELECT * FROM pemilih WHERE nim='$username'")->fetch();
			$result = $db->query("SELECT * FROM pemilih a, jurusan b, prodi c WHERE a.nim='$username' AND SUBSTRING(a.nim,3,2) = b.id_jurusan AND SUBSTRING(a.nim,3,4) = c.id_prodi")->fetch();
			 if(isset($_SESSION['login_user'])){
		?>
			<center>
			<h1>Selamat datang di Pemira Polban 2016</h1>	
			</center>

		<div class="container">	
			<div class="col-md-offset-4 col-md-4" >
                    <div class="panel panel-default">

                        <div class="panel-heading">
                        	<center
                            	<i class="fa fa-bell fa-fw"></i> Data Pemilih
                            </center>
                        </div>
                        <!-- /.panel-heading -->
                        <table class="table table-bordered">	
                            <tr>                          	
								<th> 
									Nama
								</th>
								<td>
									<?php echo $result['nama_pemilih'];?>
								</td>
							</tr>
                            <tr>
								<th>
									NIM
								</th>
								<td>	
									<?php echo $result['nim'];?>
                                </td>
							</tr>
                            <tr>
								<th>	
									Jurusan
                                </th>
								<td>
									<?php echo $result['nama_jurusan'];?>
								</td>
							</tr>
                            <tr>
								<th>
									Prodi
                                </th>
								<td>
									<?php echo $result['nama_prodi'];?>
								</td>
							</tr>
                            <tr>
								<th>
									Status
								</th>
								<td>
									<?php if(isset($result['id_nomor'])) {echo "Memilih no "; echo $result['id_nomor'];} else{echo "Belum memilih";}?>
								</td>s
							</tr>
                             
                        </table>
                        <!-- /.panel-body -->
                    </div>
                </div>
            </div>

			<center>
			<?php if (empty($result['id_nomor'])){ ?>
		<a class="btn-menu btn btn-primary btn-lg" style="background-color:green" href="./pemilihan.php" >Mulai Memilih</a>	
			<?php }?>
			</center>
		<?php }else{
			header("location: ../index.php");
		}
		?>

		<div class="menu">
			<p>Informasi Lebih Lanjut:</p>
			<a class="btn-menu btn btn-primary btn-lg" style="background-color:blue" href="./../profil/">Profil Cakabem</a>
			<a class="btn-menu btn btn-primary btn-lg" style="background-color:#ffa500" href="./../tatacara/">Cara Pemilihan</a>
		</div>
		

	<!-- Modal -->
		<div class="modal fade" id="myModal" role="dialog">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Selamat datang <?php echo $result['nama_pemilih'];?></h4>
					</div>

					<div class="modal-body">
						"Aturan pengantar / ringkas"
					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
					</div>
				</div>
			</div>
		</div>

		<?php include("../php/footer-text.php"); ?>
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="./../assets/js/jquery-2.1.4.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="./../assets/js/bootstrap.min.js"></script>
		<script> $('#myModal').modal('show');</script>
	</body>
</html>

