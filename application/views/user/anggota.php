<!-- Begin Page Content -->
<div class="container-fluid">

	<?= $this->session->flashdata('pesan'); ?>
	<div class="row">
		<div class="col-lg-3">
			<?php if (validation_errors()) { ?>
				<div class="alert alert-danger" role="alert">
					<?= validation_errors(); ?>
				</div>
			<?php } ?>
			<?= $this->session->flashdata('pesan'); ?>
			<table class="table table-hover">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Nama</th>
						<th scope="col">Email</th>
						<th scope="col">Foto</th>
						<th scope="col">Role</th>
						<th scope="col">Status</th>
						<th scope="col">Tanggal Daftar</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no = 1;

					foreach ($anggota as $row) {
						?>
						<tr>
							<td>
								<?= $no ?>
							</td>
							<td>
								<?= $row["name"] ?>
							</td>
							<td>
								<?= $row["email"] ?>
							</td>
							<td>
								<picture>
									<source srcset="" type="image/svg+xml">
									<img src="<?= base_url('assets/img/profile/') . $row['image']; ?>"
										class="img-fluid img-thumbnail" alt="...">
								</picture>
							</td>
							<td>
								<?php
								if ($row["role_id"] == 1) {
									echo "Administrator";
								} else {
									echo "Member";
								}
								?>
							</td>
							<td>
								<?php
								if ($row["is_active"] == 1) {
									echo "Aktif";
								} else {
									echo "Nonaktif";
								}
								?>
							</td>
							<td>
								<?= date('j F Y', $row["date_created"]); ?>
							</td>
							<td>
							</td>
						</tr>
						<?php
						$no++;
					}
					?>
				</tbody>
			</table>
		</div>
	</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->