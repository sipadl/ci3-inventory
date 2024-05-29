<!-- Form untuk tambah user -->
<div class="row">
		<!-- Button trigger modal -->
		<button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#modelIdX">
		  Tambah Harga
		</button>
		
		<!-- Modal -->
		<div class="modal fade" id="modelIdX" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
			<div class="modal-dialog modal-lg modal-fullscreen" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Form Tambah Harga</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
					</div>
					<form method="post" action="<?php echo site_url('main/tambahHarga'); ?>" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="nama_produk">Nama Produk</label>
                                    <input class="form-control mb-2" type="text" id="nama_produk" name="nama_produk" placeholder="Nama Produk" required>
                                </div>
                                <div class="form-group">
                                    <label for="harga">Harga</label>
                                    <input class="form-control mb-2" type="number" id="harga" name="harga" placeholder="Harga" required>
                                </div>
								<div class="form-group">
                                    <label for="harga">Tanggal</label>
                                    <input class="form-control mb-2" type="date" id="harga" name="tanggal"  required>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label for="id_area">Area</label><br>
                                    </div>
                                    <select name="id_area" class="form-control col-md-12" id="basic-multiple">
                                        <option value="0">Pilih Area</option>
                                        <?php foreach($wilayah as $wil) : ?>
                                            <option value="<?php echo $wil['id_area'] ?>"><?php echo $wil['nama_area'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan Harga</button>
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
							<th scope="col">Nama Produk</th>
							<th scope="col">Harga</th>
							<th scope="col">Tanggal</th>
							<th scope="col">Area</th>
							<th scope="col">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1 ?>
						<?php foreach($price as $xx) : ?>
						<tr class="">
							<td scope="row"><?php echo $no++ ?></td>
							<td><?php echo $xx['nama_produk'] ?></td>
                            <td><?php echo $xx['harga'] ?></td>
							<td><?php echo $xx['tanggal'] ?></td>
                            <td>
                                <?php
                                    foreach($wilayah as $wil) {
                                        if($wil['id_area'] == $xx['id_area']) {
                                            echo $wil['nama_area'] ?? '-';
                                            break;
                                        }
                                    }
                                ?>
                            </td>
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
													<h5 class="modal-title">Form Ubah Harga</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
												</div>
												<form method="post" action="<?php echo site_url('main/updateHarga/'.$xx['id_price']); ?>" enctype="multipart/form-data" >
												<div class="modal-body">
												<div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="nama_produk">Nama Produk</label>
                                                        <input class="form-control mb-2" type="text" id="nama_produk" value="<?php echo $xx['nama_produk'] ?>" name="nama_produk" placeholder="Nama Produk" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="harga">Harga</label>
                                                        <input class="form-control mb-2" type="number" id="harga" value="<?php echo $xx['harga'] ?>" name="harga" placeholder="Harga" required>
                                                    </div>
													<div class="form-group">
                                                        <label for="harga">Tanggal</label>
                                                        <input class="form-control mb-2" type="date" id="harga" value="<?php echo $xx['tanggal'] ?>" name="tanggal"  required>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <label for="id_area">Area</label><br>
                                                        </div>
                                                        <select name="id_area" class="form-control col-md-12" id="basic-multiple">
                                                            <option value="0">Pilih Area</option>
                                                            <?php foreach($wilayah as $wil) : ?>
                                                                <option <?= ($wil['id_area'] == $xx['id_area'])? 'selected' : '' ?> value="<?php echo $wil['id_area'] ?>"><?php echo $wil['nama_area'] ?></option>
                                                            <?php endforeach ?>
                                                        </select>
                                                    </div>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
													<button type="submit" class="btn btn-primary">Simpan Harga</button>
												</div>
											</form>
											</div>
										</div>
									</div>
								</div>
								<div class="">
									<a href="<?php echo base_url('main/deleteHarga/'.$xx['id_price']); ?>" class="btn btn-sm btn-danger mx-1">Hapus </a>
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
