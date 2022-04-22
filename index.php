<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>MTS Manbaul - Official School Website</title>
	<link rel="stylesheet" href="css/reset.css" type="text/css">
	<link rel="stylesheet" href="css/grid.css" type="text/css">
	<link rel="stylesheet" href="css/styles.css" type="text/css">
	<link rel="stylesheet" href="css/menu.css" type="text/css"> 
	<link rel="stylesheet" href="css/paging.css" type="text/css"> 
	<link rel="stylesheet" href="css/base/jquery.ui.all.css" type="text/css">
	<link rel="shortcut icon" href="images/a.png" />
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/menu.js"></script>
	<script type='text/javascript' src='js/jquery-latest.js'></script>
	<script type='text/javascript' src='js/jquery.tablesorter.js'></script>
	<script type="text/javascript" src="js/jquery.ui.core.js"></script>  
	<script type="text/javascript" src="js/jquery.ui.datepicker.js"></script> 
	<script type="text/javascript" src="js/jquery.ui.widget.js"></script> 
	<script type="text/javascript" src="js/jquery.ui.datepicker-id.js"></script> 
	<meta http-equiv="Copyright" content="ORP">
	<meta name="Author" content="MTS. MANBA'UL KHAIR">
</head>
<body>
<div id="header">
	<div id="header-status">
			<div class="grid_8"><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="images/Header.png" width="880"></div>
				<div style="clear:both;"></div>
		</div>
		<div style="clear:both;"></div>
	</div>
	<div id="header-main">
		<div class="container_12">
			<div class="grid_12">
				<div id="logo">
					<div id="menu">
						<ul class="menu">
							<li><a href="index.php"><span>Home</span></a></li>
							<li><a href="#"><span>Master Data:</span></a>
								<ul>									
									<li><a href="?module=masterdata_siswa">- Entry Calon Siswa</a></li>
									<li><a href="?module=masterdata_kelas">- Entry Kelas</a></li>
									<li><a href="?module=masterdata_detailbiaya">- Entry Detail Biaya</a></li>
									<li><a href="?module=masterdata_gelombang">- Entry Gelombang</a></li>
								</ul>
							</li>
							<li><a href="#"><span>Transaksi:</span></a>
								<ul>
									<li><a href="?module=masterdata_transaksipendaftaran">- Transaksi Pendaftaran</a></li>
									<li><a href="?module=masterdata_transaksidaftarulang">- Transaksi Daftar Ulang</a></li>
									<li><a href="?module=masterdata_transaksipembagiankelas">- Transaksi Pembagian Kelas</a></li>
								</ul>
							</li>
							<li><a href="#"><span>Cetak Laporan:</span></a>
								<ul>
									<li><a href="?module=masterdata_cetaklaporanpendaftaran">- Cetak Laporan Pendaftaran</a></li>
									<li><a href="?module=masterdata_cetaklaporankeuangan">- Cetak Laporan Pembayaran</a></li>
									<li><a href="?module=masterdata_cetaklaporankelas">- Cetak Laporan Pembagian Kelas</a></li>
								</ul>
							</li>
							<li><a href="#"><span>Cetak Kwitansi:</span></a>
								<ul>
									<li><li><a href="?module=masterdata_cetakkwitansipendaftaran">- Cetak Kwitansi Pendaftaran</a></li>
									<li><li><a href="?module=masterdata_cetakkwitansidaftarulang">- Cetak Kwitansi Daftar Ulang</a></li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div style="clear: both;"></div>
		</div>
	</div>
	<div style="clear: both;"></div>
</div>
<div class="container_12">
		<!-- Example table -->
		<div class="module">
		<?php include "konten.php"; ?>
		</div> <!-- End .module -->
        <!-- Footer -->
        <div id="footer" class="container_12" align="center">
<!-- You can change the copyright line for your own -->
		&copy;Copyright MTS MANBA'UL KHAIR - 2018
        </div>
        </div> <!-- End #footer -->
	</body>
</html>