<h3><i class="fa fa-angle-right"></i> Pemilihan</h3>
<div class="row mt">
		<div class="col-md-9">
			<div class="nav-tabs-custom">
						<ul class="nav nav-tabs">
							<li class="active">
								<a href="#aturpemilihan" data-toggle="tab">
									Atur Pemilihan
								</a>
							<li>
								<a href="#cekpemilih" data-toggle="tab">
									Cek Pemilih
								</a>
							</li>
							</ul>
				</div>

				<div class="tab-content">
							<div class="active tab-pane" id="aturpemilihan">
								<div class="box-body">
										<?php include("./izinmemilih.php") ?>
								</div><!-- /.box-body -->
							</div>

							<div class="tab-pane" id="cekpemilih">
								<div class="box-body">
									<?php include("./cekpemilih.php") ?>
								</div><!-- /.box-body -->
							</div>
				</div>
		<script type='text/javascript'>
		function getSomething(url,from,to){
			var value=$(from).val();
			if (value == "") {
				document.getElementById(from).innerHTML = "";
				return;
			} else {
			if (window.XMLHttpRequest) {
				// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp = new XMLHttpRequest();
			} else {
				// code for IE6, IE5
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					document.getElementById(to).innerHTML = this.responseText;
				}
			};
			xmlhttp.open("GET",url+"?id="+value,true);
			xmlhttp.send();
			}
		}

		</script>

		<script type="text/javascript">
		function classStatus(status){
			var kelas=$('#kelas').val();

			if (window.XMLHttpRequest) {
				// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp = new XMLHttpRequest();
			} else {
				// code for IE6, IE5
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					document.getElementById('').innerHTML = this.responseText;
				}
			};

			xmlhttp.open("GET","./ubahstatuskelas.php"+"?kelas="+kelas+"&status="+status,true);
			xmlhttp.send();
		}
		</script>
