
<?php
include("../php/credentials.php");
	$db = new PDO(DB_DSN, DB_USER, DB_PASS);

	$jurusan = $db->query("SELECT * FROM jurusan")->fetchALL();

?>
			<div class="panel-body">
				<table style="margin-top:15px;margin-left:7%">
					<tr>
						<th style="padding-right:30px"><h4><b>Jurusan</b></h4><th>
						<td>
							<form method="GET" onclick="getSomething('getprodi.php','#jurusan','prodi'), getSomething('getkelas.php','#prodi','kelas')">
								<select class="btn-success" name="jurusan" id="jurusan" style="width:100%; padding:10px; border-color:black; border-style:solid">
									<option value="0">Pilih Jurusan...</option>
											<?php foreach ($jurusan as $key => $row): ?>
												<option value="<?php echo $row['id_jurusan']?>"><?php echo $row['nama_jurusan']?></option>
											<?php endforeach ?>
								</select>
							</form>
						</td>
					</tr>
					<tr>
						<th style="padding-right:30px"><h4><b>Prodi</b></h4><th>
						<td>
							<form method="GET" onclick="getSomething('getkelas.php','#prodi','kelas')">
								<select class="btn-success" name="prodi" id='prodi' style="width:100%; padding:10px; border-color:black; border-style:solid">
									<?php include("./getprodi.php"); ?>
								</select>
							</form>
						</td>
					</tr>
					<tr>
						<th style="padding-right:30px"><h4><b>Kelas</b></h4><th>
						<td>
							<form method="GET" onclick="getSomething('getsiswa.php','#kelas','')">
								<select class="btn-success" name="kelas" id='kelas' style="width:100%; padding:10px; border-color:black; border-style:solid">
									<?php include("./getkelas.php"); ?>
								</select>
							</form>
						</td>
					</tr>
				</table>
				<br><br>
				<div class="col-sm-7">
					<button type="button" class="btn btn-primary" onclick="classStatus('1')">Izinkan Pemilihan</button>
					<button type="button" class="btn btn-danger" onclick="classStatus('0')">Hentikan Pemilihan</button>
				</div>
				</div>
