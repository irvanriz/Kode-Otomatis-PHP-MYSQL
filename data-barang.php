<?php

if (isset($_POST['submit'])) {
	$nm_barang = ucwords($_POST['nm_barang']);
	$kd_jenis = $_POST['jenis'];

	// cek kode barang
	$sql = "SELECT max(right(kd_barang, 4)) AS kode_barang FROM tb_barang WHERE kd_jenis = '$kd_jenis'";
	$q = $conn->query($sql);

	if ($q->num_rows > 0) {
		foreach ($q as $qq) {
			$no = ((int)$qq['kode_barang'])+1;
			$kd = sprintf("%04s", $no);
		}
	} else {
		$kd = "0001";
	}

	$kode = $kd_jenis.$kd;

	$sql = "INSERT INTO tb_barang VALUES ('$kode', '$nm_barang', '$kd_jenis')";
	$q = $conn->query($sql);

	if ($q) {
		echo "<script>alert('Data barang ditambahkan'; windows.location.href = '?p=data-barang';</script>";
	} else {
		echo "<script>alert('Data barang gagal ditambahkan'; windows.location.href = '?p=data-barang';</script>";
	}
}

?>

<h3>Data Barang</h3>

<div class="form-input">
	<form method="POST" action="">
		<!--<label>Nama Barang</label>
		<input type="text" name="nm_barang">-->
		<label>Jenis</label>
		<select name="jenis">
			
			<?php 
			$query = $conn->query("SELECT * FROM tb_jenis");
			while($row = $query->fetch_assoc()) :
			?>
				
			<option value="<?= $row['kd_jenis']; ?>"><?= $row['jenis']; ?></option>
			
			<?php endwhile; ?>

		</select>
		<button type="submit" name="submit">Simpan</button>
	</form>
</div>

<br/>

<table>
	<tr>
		<th>#</th>
		<th>Kode Barang</th>
		<!--<th>Nama Barang</th>-->
		<th>Jenis</th>
	</tr>

	<?php 
	$sql = "SELECT * FROM tb_barang LEFT JOIN tb_jenis ON tb_barang.kd_jenis = tb_jenis.kd_jenis";
	$q = $conn->query($sql);
	
	$no = 1;
	while ($data = $q->fetch_assoc()) : 
	?>

	<tr>
		<td><?= $no++; ?></td>
		<td><?= $data['kd_barang']; ?></td>
		<!--<td><?= $data['nm_barang']; ?></td>-->
		<td><?= $data['jenis']; ?></td>
	</tr>

	<?php endwhile; ?>

</table>