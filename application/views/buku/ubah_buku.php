<div class="container-fluid">
	<?= $this->session->flashdata('pesan'); ?>
	<div class="row">
		<div class="col-1g-6">
			<?php $this->session->flashdata('pesan'); ?>
			<?php foreach ($buku as $b) { ?>
				<form action=" <?php echo base_url("buku/ubahBuku/" . $b["id"]); ?>" method="post"
					enctype="multipart/form-data">
					<div class="form-group">
						<input type="hidden" name="id" id="id" value=" <?php echo $b['id']; ?>">
						<input type="text" class="form-control form-control-user" id="title" name="title"
							placeholder="Masukkan judul buku" value=" <?php echo $b['title']; ?>">

						<?= form_error(
							'title',
							'<small class="text-danger pl-3">',
							'</small>'
						); ?>
					</div>
					<div class="form-group">
						<select name="category_id" class="form-control form-control-user">
							<option value="<?= $id; ?>" selected="selected">
								<?= $k; ?>
							</option>
							<?php foreach ($kategori as $k) { ?>
								<option value="<?= $k['id']; ?>">
									<?= $k['category']; ?>
								</option>
							<?php } ?>
						</select>
						<?= form_error(
							'category_id',
							'<small class="text-danger pl-3">',
							'</small>'
						); ?>
					</div>
					<div class="form-group">
						<input type="text" class="form-control form-control-user" id="author" name="author"
							placeholder="Masukkan Nama Pengarang" value="<?= $b['author']; ?>">
						<?= form_error(
							'author',
							'<small class="text-danger pl-3">',
							'</small>'
						); ?>
					</div>
					<div class="form-group">
						<div class="form-group">
							<input type="text" class="form-control form-control-user" id="publisher" name="publisher"
								placeholder="Masukkan Nama Penerbit" value="<?= $b['publisher']; ?>">
							<?= form_error(
								'publisher',
								'<small class="text-danger pl-3">',
								'</small>'
							); ?>
						</div>
						<div class="form-group">
							<select name="publication_year" class="form-control form-control-user">
								<option value="<?php echo $b['publication_year']; ?>">
									<?php echo $b['publication_year']; ?>
								</option>
								<?php
								for ($i = date('Y'); $i > 2000; $i--) { ?>
									<option value=" <?= $i; ?>"> <?= $i; ?></option>
								<?php } ?>
							</select>
							<?= form_error(
								'publication_year',
								'<small class="text-danger pl-3">',
								'</small>'
							); ?>
						</div>
						<div class="form-group">
							<input type="text" class="form-control form-control-user" id="isbn" name="isbn"
								placeholder="Masukkan ISBN" value="<?= $b['isbn']; ?>">
							<?= form_error(
								'isbn',
								'<small class="text-danger pl-3">',
								'</small>'
							); ?>
						</div>
						<div class="form-group">
							<input type="text" class="form-control form-control-user" id="stock" name="stock"
								placeholder="Masukkan nominal stok" value="<?= $b['stock']; ?>">
							<?= form_error(
								'stock',
								'<small class="text-danger pl-3">',
								'</small>'
							); ?>
						</div>
						<div class="form-group">
							<input type="button" class="form-control form-control-user btn btn-dark col-1g-3 mt-3"
								value="Kembali" onclick="window.history.go(-1)">
							<input type="submit" class="form-control form-control-user btn btn-primary col-1g-3 mt-3"
								value="Update">
						</div>
					</div>
			</div>
			</form>
		<?php } ?>
	</div>
</div>
</div>
