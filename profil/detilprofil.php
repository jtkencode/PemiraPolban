<!DOCTYPE html>
<?php
include("./../php/credentials.php");

if(isset($_GET['no'])){
	$db = new PDO(DB_DSN, DB_USER, DB_PASS);
	$id_no = $_GET['no'];
	$datapasangan = $db->query("SELECT * FROM no_pasangan WHERE id_nomor=$id_no")->fetch();
	$cakabem = $db->query("SELECT * FROM calon c,prodi p,jurusan j WHERE c.id_nomor=$id_no and id_keterangan=1 and c.id_prodi = p.id_prodi and p.id_jurusan = j.id_jurusan")->fetch();
	$pendidikan_cakabem = $db->query("SELECT r.* FROM riwayat_pendidikan r WHERE r.id_calon = $cakabem[id_calon]")->fetchALL();
	$organisasi_cakabem = $db->query("SELECT r.* FROM riwayat_organisasi r WHERE r.id_calon = $cakabem[id_calon]")->fetchALL();
	$prestasi_cakabem = $db->query("SELECT r.* FROM riwayat_prestasi r WHERE r.id_calon = $cakabem[id_calon]")->fetchALL();
	$cawakabem = $db->query("SELECT * FROM calon c,prodi p,jurusan j WHERE c.id_nomor=$id_no and id_keterangan=2 and c.id_prodi = p.id_prodi and p.id_jurusan = j.id_jurusan")->fetch();
	$pendidikan_cawakabem = $db->query("SELECT r.* FROM riwayat_pendidikan r WHERE r.id_calon = $cawakabem[id_calon]")->fetchALL();
	$organisasi_cawakabem = $db->query("SELECT r.* FROM riwayat_organisasi r WHERE r.id_calon = $cawakabem[id_calon]")->fetchALL();
	$prestasi_cawakabem = $db->query("SELECT r.* FROM riwayat_prestasi r WHERE r.id_calon = $cawakabem[id_calon]")->fetchALL();
	 
}
else{
	echo ("Data not found");
}

?>
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
		<?php include("./../php/header-text.php") ?>
		<div class="container">
				<h1 style="text-align:center; background-color:black; padding:10px; color:white"><b>Pasangan Calon Nomor Urut <?php echo $datapasangan['id_nomor'] ?></b></h1>
		</div>
		<br><br><br>
		<div class="container">
			<ul class="nav nav-pills">
			<li class="active"><a href="#visimisi" data-toggle="tab"><h4>Visi & Misi</h4></a></li>
			<li><a href="#cakabem" data-toggle="tab"><h4>Cakabem</h4></a></li>
			<li><a href="#cawakabem" data-toggle="tab"><h4>Cawakabem</h4></a></li>
			<li><a href="#paper" data-toggle="tab"><h4>Paper</h4></a></li>
			</ul>
		</div>
		<div class="tab-content">
		<div class="container tab-pane fade active in" id="visimisi">
			<table class="panel panel-default">
				<div class="panel-heading" style="background-color:#337ab7">
					<h2 style="color:white; text-align:center"><b>Visi</b></h2>
				</div>
				<div class="panel-body" style="border-style:solid; border-width:10px; border-color:#337ab7; background-color:white">
					<h3 style="text-align:center"><?php echo $datapasangan['visi']?></h3>
				</div>
			</table>
			<table class="panel panel-default">
				<div class="panel-heading" style="background-color:#3EA99F">
					<h2 style="color:white; text-align:center"><b>Misi</b></h2>
				</div>
				<div class="panel-body" style="border-style:solid; border-width:10px; border-color:#3EA99F; background-color:white">
					<pre class="h3" style="text-align:center; background-color:white; border-style:none; line-height:50px; padding:0px"><?php echo $datapasangan['misi']?></pre>
				</div>
			</table>
		</div>
		<div class="container tab-pane fade" id="cakabem">
			<div class="row">
				<div class="col-sm-12">
					<div class="panel panel-default">
						<div class="panel-heading">
								<h3 class="panel-title"></h3>
						</div>
						<div class="row">
						<div class="col-sm-4">
							<div class="panel-body">
								<div class="thumbnail">
									<img src="../img/<?php echo $cakabem['foto'];?>"></img>
								</div>
							</div>
						</div>
						<div class="col-sm-7">		
								<br>
								<h3>Identitas</h3>
								<table class="table table-bordered" style="margin-top:15px">
									<tr>
										<th>NIM</th>
										<td><?php echo $cakabem['nim_calon'];?></td>
									</tr>
									<tr>
										<th>Nama</th>
										<td><?php echo $cakabem['nama_calon'];?></td>
									</tr>
									<tr>
										<th>Jurusan</th>
										<td><?php echo $cakabem['nama_jurusan'];?></td>
									</tr>
									<tr>
										<th>Prodi</th>
										<td><?php echo $cakabem['nama_prodi'];?></td>
									</tr>
									<tr>
										<th>TTL</th>
										<td><?php echo ($cakabem['tempat_lahir'].', '.$cakabem['tanggal_lahir']);?></td>
									</tr>
								</table>
								<h3>Riwayat Pendidikan</h3>
								<table class="table table-bordered" style="margin-top:15px">
									<tr>
										<th>No</th>
										<th>Jenjang Pendidikan</th>
										<th>Nama Sekolah</th>
										<th>Kota</th>
										<th>Tahun Lulus</th>
									</tr>
									<?php $no = 0; ?>
									<?php foreach($pendidikan_cakabem as $key => $row): ?>
									<?php $no++; ?>
									<tr>
										<td><?php echo $no;?></td>
										<td><?php echo $row['jenjang_pendidikan'];?></td>
										<td><?php echo $row['nama_sekolah'];?></td>
										<td><?php echo $row['kota'];?></td>
										<td><?php echo $row['tahun_lulus'];?></td>
									</tr>
									<?php endforeach ?>
								</table>
								<h3>Riwayat Organisasi</h3>
								<table class="table table-bordered" style="margin-top:15px">
									<tr>
										<th>No</th>
										<th>Nama Organisasi</th>
										<th>Periode Menjabat</th>
										<th>Tingkat</th>
									</tr>
									<?php $no = 0; ?>
									<?php foreach($organisasi_cakabem as $key => $row): ?>
									<?php $no++; ?>
									<tr>
										<td><?php echo $no;?></td>
										<td><?php echo $row['nama_organisasi'];?></td>
										<td><?php echo $row['mulai_menjabat']." - ".$row['selesai_menjabat'];?></td>
										<td><?php echo $row['nama_tingkatan'];?></td>
									<?php endforeach ?>
								</table>
								<h3>Riwayat Prestasi</h3>
								<table class="table table-bordered" style="margin-top:15px">
									<tr>
										<th>No</th>
										<th>Prestasi</th>
										<th>Tahun</th>
										<th>Tingkat</th>
									</tr>
									<?php $no = 0; ?>
									<?php foreach($prestasi_cakabem as $key => $row): ?>
									<?php $no++; ?>
									<tr>
										<td><?php echo $no;?></td>
										<td><?php echo $row['prestasi'];?></td>
										<td><?php echo $row['waktu_prestasi'];?></td>
										<td><?php echo $row['nama_tingkatan'];?></td>
									</tr>
									<?php endforeach ?>
								</table>
						</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container tab-pane fade" id="cawakabem">
			<div class="row">
				<div class="col-sm-12">
					<div class="panel panel-default">
						<div class="panel-heading">
								<h3 class="panel-title"></h3>
						</div>
						<div class="row">
						<div class="col-sm-4">
							<div class="panel-body">
								<div class="thumbnail">
									<img src="../img/<?php echo $cawakabem['foto'];?>"></img>
								</div>
							</div>
						</div>
						<div class="col-sm-7">		
								<br>
								<h3>Identitas</h3>
								<table class="table table-bordered" style="margin-top:15px">
									<tr>
										<th>NIM</th>
										<td><?php echo $cawakabem['nim_calon'];?></td>
									</tr>
									<tr>
										<th>Nama</th>
										<td><?php echo $cawakabem['nama_calon'];?></td>
									</tr>
									<tr>
										<th>Jurusan</th>
										<td><?php echo $cawakabem['nama_jurusan'];?></td>
									</tr>
									<tr>
										<th>Prodi</th>
										<td><?php echo $cawakabem['nama_prodi'];?></td>
									</tr>
									<tr>
										<th>TTL</th>
										<td><?php echo ($cawakabem['tempat_lahir'].', '.$cawakabem['tanggal_lahir']);?></td>
									</tr>
								</table>
								<h3>Riwayat Pendidikan</h3>
								<table class="table table-bordered" style="margin-top:15px">
									<tr>
										<th>No</th>
										<th>Jenjang Pendidikan</th>
										<th>Nama Sekolah</th>
										<th>Kota</th>
										<th>Tahun Lulus</th>
									</tr>
									<?php $no = 0; ?>
									<?php foreach($pendidikan_cawakabem as $key => $row): ?>
									<?php $no++; ?>
									<tr>
										<td><?php echo $no;?></td>
										<td><?php echo $row['jenjang_pendidikan'];?></td>
										<td><?php echo $row['nama_sekolah'];?></td>
										<td><?php echo $row['kota'];?></td>
										<td><?php echo $row['tahun_lulus'];?></td>
									</tr>
									<?php endforeach ?>
								</table>
								<h3>Riwayat Organisasi</h3>
								<table class="table table-bordered" style="margin-top:15px">
									<tr>
										<th>No</th>
										<th>Nama Organisasi</th>
										<th>Periode Menjabat</th>
										<th>Tingkat</th>
									</tr>
									<?php $no = 0; ?>
									<?php foreach($organisasi_cawakabem as $key => $row): ?>
									<?php $no++; ?>
									<tr>
										<td><?php echo $no;?></td>
										<td><?php echo $row['nama_organisasi'];?></td>
										<td><?php echo $row['mulai_menjabat']." - ".$row['selesai_menjabat'];?></td>
										<td><?php echo $row['nama_tingkatan'];?></td>
									<?php endforeach ?>
								</table>
								<h3>Riwayat Prestasi</h3>
								<table class="table table-bordered" style="margin-top:15px">
									<tr>
										<th>No</th>
										<th>Prestasi</th>
										<th>Tahun</th>
										<th>Tingkat</th>
									</tr>
									<?php $no = 0; ?>
									<?php foreach($prestasi_cawakabem as $key => $row): ?>
									<?php $no++; ?>
									<tr>
										<td><?php echo $no;?></td>
										<td><?php echo $row['prestasi'];?></td>
										<td><?php echo $row['waktu_prestasi'];?></td>
										<td><?php echo $row['nama_tingkatan'];?></td>
									</tr>
									<?php endforeach ?>
								</table>
						</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container  fade tab-pane" id="paper">
			<iframe src="./../paper/<?php echo $datapasangan['paper'] ?>" style="width:100%; height:590px; frameborder=0; margin-top:10px"></iframe>
		</div>
		<?php include("./../php/footer-text.php"); ?>
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="./../assets/js/jquery-2.1.4.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="./../assets/js/bootstrap.min.js"></script>
	</body>
</html>