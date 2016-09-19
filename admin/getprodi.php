<!DOCTYPE html>
<?php if(isset($_GET['id']) && $_GET['id'] != 0 ): ?>
	<?php
		include("./../php/credentials.php");
		$db = new PDO(DB_DSN, DB_USER, DB_PASS);
		$id_jurusan = $_GET['id'];
		$prodi = $db->query("SELECT p.* FROM prodi p WHERE p.id_jurusan = $id_jurusan")->fetchALL();
	?>
		<option value="0">Pilih Prodi...</option>
	<?php foreach ($prodi as $key => $row): ?>
		<option value="<?php echo $row['id_prodi']?>"><?php echo $row['nama_prodi']?></option>			
	<?php endforeach ?>
	<?php $db=null; ?>
<?php else: ?>
	<option value="0">Pilih Jurusan Dahulu, Pilih Prodi...</option>
<?php endif?>
