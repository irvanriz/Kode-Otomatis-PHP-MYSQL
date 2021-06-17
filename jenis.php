<?php

if (isset($_POST['submit'])) {
	$kd_jenis = strtoupper($_POST['kd_jenis']);
	$jenis = ucwords($_POST['jenis']);

	// cek kode jenis
	$sql = "SELECT * FROM tb_jenis WHERE kd_jenis = '$kd_jenis' OR jenis = '$jenis'";
	$q = $conn->query($sql);

	if ($q->num_rows > 0) {
		echo "<script>alert('Jenis sudah ada'); window.location.href='?p=jenis';</script>";
	} else {
		$sql = "INSERT INTO tb_jenis VALUES ('$kd_jenis', '$jenis')";
		$q = $conn->query($sql);

		if ($q) {
			echo "<script>alert('Jenis ditambahkan'); window.location.href='?p=jenis';</script>";
		} else {
			echo "<script>alert('Jenis gagal ditambahkan'); window.location.href='?p=jenis';</script>";
		}
	}
}

$sql = "SELECT * FROM tb_jenis";
$q = $conn->query($sql);
?>

<h3>Jenis</h3>

<div class="form-input">
	<form method="POST" action="">
		<label>Kode Jenis</label>
		<input type="text" name="kd_jenis" placeholder="Contoh. MKN" required>
		<label>Jenis</label>
		<input type="text" name="jenis" placeholder="Contoh. Makanan" required>
		<button class="btn-submit" type="submit" name="submit">Simpan</button>
	</form>
</div>

<br/>

<table>
	<tr>
		<th>#</th>
		<th>Kode Jenis</th>
		<th>Jenis</th>
	</tr>

	<?php 
	$no = 1;
	while ($row = $q->fetch_assoc()) : 
	?>
		
	<tr>
		<td><?= $no++; ?></td>
		<td><?= $row['kd_jenis']; ?></td>
		<td><?= $row['jenis']; ?></td>
	</tr>

	<?php endwhile; ?>

</table>