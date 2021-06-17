<?php
try {
	$conn = new mysqli('localhost', 'root', '', 'penjualan');
} catch (Exception $e) {
	echo $e->getMessage();
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Membuat Kode Barang Otomatis</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>


	<div class="container">
		<h1>Membuat Kode Barang Otomatis</h1>
		<div class="nav">
			<ul>
				<li>
					<a href="data-barang">Data Barang</a>
				</li>
				<li> | </li>
				<li>
					<a href="jenis">Jenis</a>
				</li>
			</ul>
		</div>
		
		<div class="content">
			
			<?php
			if(isset($_GET['p'])) {
				if ($_GET['p'] == 'jenis') {
					require_once 'jenis.php';
				} else {
					require_once 'data-barang.php';
				}
			}
			?>			

		</div>
	</div>

</body>
</html>