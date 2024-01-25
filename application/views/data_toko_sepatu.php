<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tampil Pemesanan Sepatu</title>
</head>

<body>
	<center>
		<table>
			<tr>
				<th colspan="3">Data Pemesanan</th>
			</tr>
			<tr>
				<td colspan="3">
					<hr>
				</td>
			</tr>
			<tr>
				<td>Nama Pembeli</td>
				<td>:</td>
				<td>
					<?= $nama ?>
				</td>
			</tr>
			<tr>
				<td>No. Telepon</td>
				<td>:</td>
				<td>
					<?= $telepon ?>
				</td>
			</tr>
			<tr>
				<td>Merk Sepatu</td>
				<td>:</td>
				<td>
					<?= $merk ?>
				</td>
			</tr>
			<tr>
				<td>Ukuran</td>
				<td>:</td>
				<td>
					<?= $ukuran ?>
				</td>
			</tr>
			<tr>
				<td colspan="3" align="center">
					<a href="<?= base_url("tokosepatu") ?> ">Kembali</a>
				</td>
			</tr>
		</table>
	</center>
</body>

</html>