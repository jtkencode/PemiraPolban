<?php
$filename = '../waktu_pemilihan.txt';
if (file_exists($filename)) {
	$fp = fopen($filename, 'r');
	if ($fp) {
		$chooseTimePlain = fgets($fp);
		$chooseTime = strtotime($chooseTimePlain);
		$currentTime = strtotime(date('Y-m-d H:i:s'));
		echo date('Y-m-d H:i:s',$chooseTime);
	}
	fclose($fp);
}

$allowed = false;
if (isset($chooseTime) && isset($currentTime)) {
	if ($currentTime >= $chooseTime) {
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
		<title>Tes Time</title>
	
		<!-- Bootstrap -->
		<link href="../assets/css/bootstrap.min.css" rel="stylesheet">
		<link href="../assets/css/style.css" rel="stylesheet">
		
	</head>
	<body>
		<h1>Countdown Clock</h1>
		<div id="clockdiv">
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
		<script src="time.js"></script>
		<script type="text/javascript">
			var tempTime = <?php echo $chooseTime*1000;?>;
			var chooseTime = new Date(tempTime);
			document.write(chooseTime);
			document.write(new Date());
			initializeClock("clockdiv", chooseTime);
		</script>
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="../assets/js/jquery-2.1.4.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="../assets/js/bootstrap.min.js"></script>
	</body>
</html>