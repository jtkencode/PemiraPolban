<!DOCTYPE html>
<?php if(isset($_GET['id']) && $_GET['id'] != 0 ): ?>
	<?php
		include("./../php/credentials.php");
		$db = new PDO(DB_DSN, DB_USER, DB_PASS);
		$id_kelas = $_GET['id'];
		$kelas = $db->query("SELECT p.* FROM pemilih p WHERE p.id_kelas = $id_kelas")->fetchALL();
	?>
	<tr>
		<th>No</th>
		<th>Nim</th>
		<th>Nama</th>
		<th>Tanggal Lahir</th>
	</tr>
	<?php $no=0;?>
	<?php foreach ($kelas as $key => $row): ?>
		<?php $no++; ?>
		<?php 	if(is_null($row['id_nomor'])){
					$color='red';
				}
				else{
					$color='#3700FF';
				}
		?>
		<tr>
			<td style="background-color:<?php echo $color?>; color:white"><?php echo $no?></td>
			<td style="background-color:<?php echo $color?>; color:white"><?php echo $row['nim']?></td>
			<td style="background-color:<?php echo $color?>; color:white"><?php echo $row['nama_pemilih']?></td>
			<td style="background-color:<?php echo $color?>; color:white"><?php echo $row['tanggal_lahir_pemilih']?></td>
		</tr>
	<?php endforeach ?>
	<?php $db=null;?>
<?php else: ?>
	<tr>
		<th>List Pemilih Akan Muncul Setelah Anda Memilih Jurusan, Prodi, dan Kelas</th>
	</tr>
<?php endif?>
