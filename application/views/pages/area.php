<!-- Form untuk tambah user -->
<div class="row">
		<!-- Button trigger modal -->
		<button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#modelIdX">
		  Tambah Area
		</button>
		
		<!-- Modal -->
		<div class="modal fade" id="modelIdX" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
			<div class="modal-dialog modal-lg modal-fullscreen" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Form Tambah Area</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
					</div>
					<form method="post" action="<?php echo site_url('main/tambahArea'); ?>" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="nama_area">Nama Area</label>
                                    <input class="form-control mb-2" type="text" id="nama_area" name="nama_area" placeholder="Nama Area" required>
                                </div>
                                <div class="form-group">
                                    <label for="kode_area">Kode Area</label>
                                    <input class="form-control mb-2" type="text" id="kode_area" name="kode_area" placeholder="Kode Area" required>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan Area</button>
                        </div>
				    </form>
				</div>
			</div>
		</div>
		<div class="col-md-12">
			<?php 
			// Check if flash data exists
			if ($this->session->flashdata('success')) {
			// If it does, display a success message
			echo '<div class="alert alert-success my-2">' . $this->session->flashdata('success') . '</div>';
			}
			?>
			<div
				class="table-responsive"
			>
				<table
					class="table table-border"
					id="myTable"
				>
					<thead>
						<tr>
							<th>No.</th>
							<th scope="col">Nama Area</th>
							<th scope="col">Kode Area</th>
							<th scope="col">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1 ?>
						<?php foreach($area as $xx) : ?>
						<tr class="">
							<td scope="row"><?php echo $no++ ?></td>
							<td><?php echo $xx['nama_area'] ?></td>
                            <td><?php echo $xx['kode_area'] ?></td>
							<td>
							<div class="d-flex">
								<div class="">	
									<button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modelIdXUbah-<?php echo $no ?>">
										Ubah
									</button>
									<div class="modal fade" id="modelIdXUbah-<?php echo $no ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
										<div class="modal-dialog modal-lg modal-fullscreen" role="document">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title">Form Ubah Area</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
												</div>
												<form method="post" action="<?php echo site_url('main/updateArea/'.$xx['id_area']); ?>" enctype="multipart/form-data" >
												<div class="modal-body">
												<div class="col-md-12">
													<div class="form-group">
														<label for="nama_area">Nama Area</label>
														<input class="form-control mb-2" type="text" id="nama_area" value="<?php echo $xx['nama_area'] ?>" name="nama_area" placeholder="Nama Area" required>
													</div>
													<div class="form-group">
														<label for="kode_area">Kode Area</label>
														<input class="form-control mb-2" type="text" id="kode_area" value="<?php echo $xx['kode_area'] ?>" name="kode_area" placeholder="Kode Area" required>
													</div>
													</div>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
													<button type="submit" class="btn btn-primary">Simpan Area</button>
												</div>
											</form>
											</div>
										</div>
									</div>
								</div>
								<div class="">
									<a href="<?php echo base_url('main/deleteArea/'.$xx['id_area']); ?>" class="btn btn-sm btn-danger mx-1">Hapus </a>
								</div>
							</div>
					</td>
				</tr>
				
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
			
		</div>
	</div>
