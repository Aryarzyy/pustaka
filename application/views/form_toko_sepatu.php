<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Form Pemesanan</title>
	<style>
		small {
			color: red;
		}
	</style>
</head>

<body>
	<center>
		<form action="<?= base_url("tokosepatu/pesan") ?>" method="post">
			<table>
				<tr>
					<th colspan="3">Form Toko Sepatu</th>
				</tr>
				<tr>
					<th colspan="3">
						<hr>
					</th>
				</tr>
				<tr>
					<th>Nama Pembeli</th>
					<td>:</td>
					<td><input type="text" name="nama"></td>
				</tr>
				<tr>
					<td align="center" colspan="3">
						<?= form_error("nama", "<small>", "</small>") ?>
					</td>
				</tr>
				<tr>
					<th>No. Telepon</th>
					<td>:</td>
					<td><input type="text" name="telepon"></td>
				</tr>
				<tr>
					<td align="center" colspan="3">
						<?= form_error("telepon", "<small>", "</small>") ?>
					</td>
				</tr>
				<tr>
					<th>Merk Sepatu</th>
					<td>:</td>
					<td>
						<select name="merk" id="">
							<option value="" selected disabled>Pilih Merk Sepatu</option>
							<option value="Nike - 375.000">Nike - 375.000</option>
							<option value="Adidas - 300.000">Adidas - 300.000</option>
							<option value="Kickers - 250.000">Kickers - 250.000</option>
							<option value="Eiger - 275.000">Eiger - 275.000</option>
							<option value="Bucherri - 400.000">Bucherri - 400.000</option>
						</select>
					</td>
				</tr>
				<tr>
					<td align="center" colspan="3">
						<?= form_error("merk", "<small>", "</small>") ?>
					</td>
				</tr>
				<tr>
					<th>Ukuran Sepatu</th>
					<td>:</td>
					<td>
						<select name="ukuran" id="">
							<option value="" selected disabled>Pilih Ukuran Sepatu</option>
							<?php
							for ($i = 32; $i <= 36; $i++) {
								?>
								<option value="<?= $i; ?> "><?= $i; ?></option>
								<?php
							}
							?>
						</select>
					</td>
				</tr>
				<tr>
					<td align="center" colspan="3">
						<?= form_error("ukuran", "<small>", "</small>") ?>
					</td>
				</tr>
				<tr>
					<td colspan="3">
						<center>
							<button type="submit" value="Submit">Submit</button>
						</center>
					</td>
				</tr>
			</table>
		</form>
	</center>
</body>

</html>