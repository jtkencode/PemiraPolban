<!-- Author : Waffi Fatur Rahman-->

<!DOCTYPE html>
<html>
<head>
<title>Quick Count</title>
<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript" src="highcharts.js"></script>
		<link href="./../assets/css/bootstrap.min.css" rel="stylesheet">
		<link href="./../assets/css/style.css" rel="stylesheet">
				<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>
	<div class="jumbotron">
			<div class="container">
				<div class="row">
					<div class="col-lg-2 bg">
						<img class="left" src="./../img/logo-kema-polban.png"></img>
					</div>
<div class="col-lg-7 bg">
						<h1>Quick Count</h1>											
					</div>
					<?php
					session_start();	
					if (isset($_SESSION['login_user'])) {?>
					<div class="col-lg-2 bg">
					<a class="btn-menu btn btn-primary btn-lg" style="background-color:red" href="./../pemilihan/logout.php" >Log Out</a>
					</div>
					<?php }else{
						header("location: ../index.php");
					}?>
					<div class="col-lg-9 bg">
						<p>Pemilu Raya Politeknik Negeri Bandung, Pemilihan Ketua BEM Kema Polban 2016</p>
						
					</div>
				</div>
			</div>
		</div>
<div class="container">
<div class="col-md-offset-1 col-md-10" >
<?php
	$host = 'localhost';
	$user = 'root';
	$pass = '';
	$db = 'db_pemira';

	$conn = mysql_connect($host, $user, $pass);
	mysql_select_db($db, $conn);

	$categories = array('Calon KaBEM dan W.KaBEM');

	// data series
	$sql = 'SELECT COUNT(*) AS result FROM no_pasangan';
	$rs = mysql_query($sql);
	$row = mysql_fetch_array($rs);
	$result = $row['result'];
	if($result = 2){
		$data_series = array('No urut 1', 'No urut 2');	
	}else if($result = 3){
		$data_series = array('No urut 1', 'No urut 2', 'No urut 3');	
	}else if($result = 4){
		$data_series = array('No urut 1', 'No urut 2', 'No urut 3', 'No urut 4');	
	}
	
	// set sereis
	$series = array();

	// set series
	foreach ($data_series as $key=>$val) {
		array_push($series, array(
			'name'=>$val,
			'data'=>array()
		));
	}
	$i=1;

	// set data value per series
	foreach ($data_series as $key=>$val) {
		$sql = 'SELECT COUNT(*) AS result FROM pemilih where id_nomor =' .$i;
		$rs = mysql_query($sql);
		$row = mysql_fetch_array($rs);
		$result = $row['result'];

		array_push($series[$key]['data'], (int) $result );
		$i=$i+1;
	}
?>
<div id="contoh" style="width: 100%; height: 500px"></div>
</div>
</div>
<script type="text/javascript">
$('#contoh').highcharts({
	chart: {
		type: 'column'
	},
	title: {
		text: 'Quick Count PEMIRA Polban 2016'
	},
	xAxis: {
		categories: <?php echo json_encode($categories); ?>,
		labels: {
			rotation: 0,
			align: 'center'
		}
	},
	series: <?php echo json_encode($series); ?>
});
</script>
<?php
	$sql = 'SELECT COUNT(*) AS result FROM pemilih';
	$rs = mysql_query($sql);
	$row = mysql_fetch_array($rs);
	$total = $row['result'];

	$sql = 'SELECT COUNT(*) AS result FROM pemilih where id_nomor IS NOT NULL';
	$rs = mysql_query($sql);
	$row = mysql_fetch_array($rs);
	$sudah = $row['result'];
?>
<center>
<p>
Total Mahasiswa :<?php echo $total; ?> - Sudah memilih : <?php echo $sudah; ?> - Belum memilih : <?php echo $total - $sudah; ?></p></center>

<?php include("../php/footer-text.php"); ?>
		<!--countdown javascript-->
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="./../assets/js/jquery-2.1.4.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="./../assets/js/bootstrap.min.js"></script>

</body>
</html>