<!DOCTYPE html>
<?php if(isset($_GET['id']) && $_GET['id'] != 0 ): ?>
	<?php
		include("../php/credentials.php");
		$db = new PDO(DB_DSN, DB_USER, DB_PASS);
		$id_prodi = $_GET['id'];
		$prodi = $db->query("SELECT k.* FROM kelas k WHERE k.id_prodi = $id_prodi")->fetchALL();
	?>
		<option value="0">Pilih Kelas...</option>
	<?php foreach ($prodi as $key => $row): ?>
		<option value="<?php echo $row['id_kelas']?>"><?php echo $row['nama_kelas']?></option>
	<?php endforeach ?>
	<?php $db=null; ?>
<?php else: ?>
	<option value="0">Pilih Prodi Dahulu, Pilih Kelas...</option>
<?php endif?>
