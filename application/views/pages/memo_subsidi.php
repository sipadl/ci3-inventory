<div class="row">
	<div class="col-md-12">
		<?php
		// Check if	 flash data exists
		if ($this->session->flashdata('success')) {
		// If it does, display a success message
		echo '<div class="alert alert-success my-2">' . $this->session->flashdata('success') . '</div>';
		}
		?>
		<table class="table table-bordered" id="myTable">
			<thead>
				<tr>
					<th>No.</th>
					<th>Kode Supplier</th>
					<th>Tanggal Input</th>
					<th>Status</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				$no = 1;
				$total = 0;
				foreach ($sortir as $ss) : 
					$total = floatval($ss['col']) + floatval($ss['bf']) + floatval($ss['jb']) + floatval($ss['jbb_jf']) + floatval($ss['jbb_jk'])
					+ floatval($ss['jbb_bf']) + floatval($ss['xlp']) + floatval($ss['bf_k3_col']) + floatval($ss['bf_k3_jb']) + floatval($ss['bf_k3_jk'])
					+ floatval($ss['bf_k3_jl']) + floatval($ss['bf_jl']) + floatval($ss['bf_bf']) + floatval($ss['bf_bf']) + floatval($ss['bf_kj']) + 
					floatval($ss['bf_spk_xlp']) + floatval($ss['bf_spk_sp']) + floatval($ss['spk_sp_jb']) +  floatval($ss['spk_sp_bfp']) + floatval($ss['spk_sp_sph']) + 
					floatval($ss['sp_cl']) + floatval($ss['sp_clf']) + floatval($ss['mh']) + floatval($ss['mh_slb']) + floatval($ss['phr']) + floatval($ss['basi_col']) + floatval($ss['basi_jb']) + floatval($ss['basi_sp']) + floatval($ss['mhr']) + 
					floatval($ss['basi_cl']) + floatval($ss['basi_mh']);
				?>
					<tr>
						<td><?php echo $no++ ?></td>
						<td><?php echo $ss['kode'] ?></td>
						<td><?php echo $ss['tanggal_rec'] ?></td>
						<td>
						<?php 
						$status = $ss['status_memo'];
						if ($status == -1) {
							echo "Rejected";
						} elseif ($status == 0) {
							echo "Pending";
						} elseif ($status == 1) {
							echo "Accepted";
						} elseif ($status == 2) {
							echo "Accepted By TL Sortir";
						} elseif ($status == 3) {
							echo "Accepted By Bag. Produksi";
						} elseif ($status == 4) {
							echo "Accepted By Bag. Coasting";
						} elseif ($status == 5) {
							echo "Accepted By General Manager";
						} else {
							echo "Unknown"; 
						} ?>
                        </td>
						<td>
							<!-- Button trigger modal -->
							<button type="button" class="btn btn-light btn-sm" data-toggle="modal" data-target="#modelId-<?php echo $ss['id'] ?>">
							  	Detail Subsidi
							</button>
							
							<!-- Modal -->
							<div class="modal fade" id="modelId-<?php echo $ss['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<form action="<?php echo base_url('main/input_memo_subdisi/'.$ss['id_sortirs']); ?>" method="post">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title">Detail Subsidi</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
										</div>
										<div class="modal-body">
											<div class="">
												<label for="">Kode Supplier</label>
												<input type="hidden" name="id_sortir" value="<?php echo $ss['id_sortirs'] ?>">
												<input type="text" name="kode_supplier" readonly value="<?php echo $ss['kode'] ?>" class="form-control mb-1">
												<label for="">Tanggal Sortir</label>
												<input type="text" name="tanggal" readonly value="<?php echo $ss['tanggal_rec'] ?>" class="form-control mb-1">
												<label for="">Qty</label>
												<input type="text" name="qty" readonly value="<?php echo $total ?>" class="form-control mb-1">
												<label for="">Subsidi</label>
												<?php if($ss['subsidi'] == null) { ?> 
													<input type="text" name="subsidi" class="form-control mb-1" placeholder="Subsidi">
													<?php } else { ?>
														<input type="text" name="subsidi" readonly class="form-control mb-1" placeholder="Subsidi" value="<?php echo $ss['subsidi'] ?>">
														<?php }  ?>
													</div>
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
													<?php if($ss['subsidi'] == null) { ?> 
														<button type="submit" class="btn btn-primary">Simpan</button>
													<?php }  ?>
													<?php if($ss['memos'] != null) { ?> 
														<a href="<?php echo base_url('main/approve_memo_subsidi/'.$ss['memos']); ?>"class="btn btn-primary">Approve</a>
													<?php }  ?>
										</div>
									</div>
									</form>
								</div>
							</div>
						</td>
					</tr>
				<?php endforeach?>
			</tbody>
		</table>
	</div>
	<div class="col-md-12 mt-4">
		<h4>Penerimaan Data Basi</h4>
	<table class="table table-bordered" id="myTable2">
			<thead>
				<tr>
					<th>No.</th>
					<th>Kode Supplier</th>
					<th>Tanggal Input</th>
					<td>Berat Timbangan</td>
					<th>Status</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				$no = 1;
				$total = 0;
				foreach ($sortir as $ss) : 
					$total = floatval($ss['col']) + floatval($ss['bf']) + floatval($ss['jb']) + floatval($ss['jbb_jf']) + floatval($ss['jbb_jk'])
					+ floatval($ss['jbb_bf']) + floatval($ss['xlp']) + floatval($ss['bf_k3_col']) + floatval($ss['bf_k3_jb']) + floatval($ss['bf_k3_jk'])
					+ floatval($ss['bf_k3_jl']) + floatval($ss['bf_jl']) + floatval($ss['bf_bf']) + floatval($ss['bf_bf']) + floatval($ss['bf_kj']) + 
					floatval($ss['bf_spk_xlp']) + floatval($ss['bf_spk_sp']) + floatval($ss['spk_sp_jb']) +  floatval($ss['spk_sp_bfp']) + floatval($ss['spk_sp_sph']) + 
					floatval($ss['sp_cl']) + floatval($ss['sp_clf']) + floatval($ss['mh']) + floatval($ss['mh_slb']) + floatval($ss['phr']) + floatval($ss['basi_col']) + floatval($ss['basi_jb']) + floatval($ss['basi_sp']) + floatval($ss['mhr']) + 
					floatval($ss['basi_cl']) + floatval($ss['basi_mh']);
				?>
					<tr>
						<td><?php echo $no++ ?></td>
						<td><?php echo $ss['kode'] ?></td>
						<td><?php echo $ss['tanggal_rec'] ?></td>
						<td><?php echo $ss['timbangan_bb'] ?></td>
						<td>
						<?php 
						$status = $ss['status_memo'];
						if ($status == -1) {
							echo "Rejected";
						} elseif ($status == 0) {
							echo "Pending";
						} elseif ($status == 1) {
							echo "Accepted";
						} elseif ($status == 2) {
							echo "Accepted By TL Sortir";
						} elseif ($status == 3) {
							echo "Accepted By Bag. Produksi";
						} elseif ($status == 4) {
							echo "Accepted By Bag. Coasting";
						} elseif ($status == 5) {
							echo "Accepted By General Manager";
						} else {
							echo "Unknown"; 
						} ?>
                        </td>
						<td>
							<!-- Button trigger modal -->
							<button type="button" class="btn btn-light btn-sm" data-toggle="modal" data-target="#modelId-BB-<?php echo $ss['id'] ?>">
							Detail Penerimaan Bahan Baku Basi
							</button>
							
							<!-- Modal -->
							<div class="modal fade" id="modelId-BB-<?php echo $ss['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
								<div class="modal-dialog modal-xl modal-fullscreen" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title">Detail Penerimaan Basi</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
										</div>
										<div class="modal-body">
											<div class="my-2">
												<div class="">Kode Supplier : <?php echo $ss['kode_supplier'] ?></div>
												<div class="">No Nota : <?php echo mt_rand(10,9999) ?></div>
												<div class="">Tanggal : <?php echo $ss['tanggal_rec'] ?></div>
											</div>
											<table class="table table-bordered">
												<thead>
													<tr>
														<td>No.</td>
														<td width="20%">Jenis Bag.</td>
														<td width="50%">Keterangan</td>
														<td>Berat Bersih (Kg)</td>
														<td>Harga Satuan</td>
														<td>Jumlah Harga (Rp)</td>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>1</td>
														<td>PHR</td>
														<td></td>
														<td><?php echo $phr = floatval($ss['phr']) + floatval($ss['basi_col']) + floatval($ss['basi_jb']) + floatval($ss['basi_sp']) + floatval($ss['mhr']) + 
														floatval($ss['basi_cl']) + floatval($ss['basi_mh']); ?></td>
														<td><?php echo floatval($price[14]['harga']) ?></td>
														<td><?php echo $phr * floatval($price[14]['harga']) ?></td>
													</tr>
													<tr>
														<td>2</td>
														<td>MHR</td>
														<td></td>
														<td><?php echo (floatval($ss['mh']) + floatval($ss['mh_slb'])) ; ?></td>
														<td><?php echo floatval($price[12]['harga']) ?></td>
														<td><?php echo (floatval($ss['mh']) + floatval($ss['mh_slb'])) * floatval($price[12]['harga']) ?></td>
													</tr>
													<tr>
														<td>2</td>
														<td>Shell</td>
														<td></td>
														<td><?php echo (floatval($ss['shell'])); ?></td>
														<td><?php echo floatval($price[24]['harga']) ?></td>
														<td> <?php echo (floatval($ss['shell'])) * floatval($price[24]['harga']); ?></td>
													</tr>
													<tr>
														<td colspan="3">Jumlah</td>
														<td><?php echo $phr + (floatval($ss['mh']) + floatval($ss['mh_slb'])) + (floatval($ss['shell'])) ?></td>
														<td></td>
														<td><?php echo $phr * floatval($price[14]['harga']) + (floatval($ss['mh']) + floatval($ss['mh_slb'])) * floatval($price[12]['harga']) + (floatval($ss['shell'])) * floatval($price[24]['harga']); ?></td>
													</tr>
												</tbody>

											</table>
											<div class="modal-footer">
												<form action="<?php echo base_url('main/approve_penerimaan_bahan_baku'); ?>" method="post">
													<input type="tel" name="potongan_harga" class="form-control my-2" id="" placeholder="Keterangan">
												<input type="hidden" name="id_sortir" value="<?php echo $ss['id'] ?>">
												<input type="hidden" name="kode_supplier" value="<?php echo $ss['kode_supplier'] ?>">
												<input type="hidden" name="total" value="<?php echo $phr * floatval($price[14]['harga']) + (floatval($ss['mh']) + floatval($ss['mh_slb'])) * floatval($price[12]['harga']) + (floatval($ss['shell'])) * floatval($price[24]['harga']); ?>">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
												<button type="submit" class="btn btn-primary">Simpan & Approve</button>
											</form>
										</div>
									</div>
								</div>
							</div>
						</td>
					</tr>
				<?php endforeach?>
			</tbody>
		</table>
	</div>

	<div class="col-md-12 mt-4">
		<h4>Penerimaan Data Fresh</h4>
	<table class="table table-bordered" id="myTable3">
			<thead>
				<tr>
					<th>No.</th>
					<th>Kode Supplier</th>
					<th>Tanggal Input</th>
					<td>Berat Timbangan</td>
					<th>Status</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				$no = 1;
				$total = 0;
				foreach ($sortir as $ss) : 
					$total = floatval($ss['col']) + floatval($ss['bf']) + floatval($ss['jb']) + floatval($ss['jbb_jf']) + floatval($ss['jbb_jk'])
					+ floatval($ss['jbb_bf']) + floatval($ss['xlp']) + floatval($ss['bf_k3_col']) + floatval($ss['bf_k3_jb']) + floatval($ss['bf_k3_jk'])
					+ floatval($ss['bf_k3_jl']) + floatval($ss['bf_jl']) + floatval($ss['bf_bf']) + floatval($ss['bf_bf']) + floatval($ss['bf_kj']) + 
					floatval($ss['bf_spk_xlp']) + floatval($ss['bf_spk_sp']) + floatval($ss['spk_sp_jb']) +  floatval($ss['spk_sp_bfp']) + floatval($ss['spk_sp_sph']) + 
					floatval($ss['sp_cl']) + floatval($ss['sp_clf']) + floatval($ss['mh']) + floatval($ss['mh_slb']) + floatval($ss['phr']) + floatval($ss['basi_col']) + floatval($ss['basi_jb']) + floatval($ss['basi_sp']) + floatval($ss['mhr']) + 
					floatval($ss['basi_cl']) + floatval($ss['basi_mh']);
				?>
					<tr>
						<td><?php echo $no++ ?></td>
						<td><?php echo $ss['kode'] ?></td>
						<td><?php echo $ss['tanggal_rec'] ?></td>
						<td><?php echo $ss['timbangan_bb'] ?></td>
						<td>
						<?php 
						$status = $ss['status_memo'];
						if ($status == -1) {
							echo "Rejected";
						} elseif ($status == 0) {
							echo "Pending";
						} elseif ($status == 1) {
							echo "Accepted";
						} elseif ($status == 2) {
							echo "Accepted By TL Sortir";
						} elseif ($status == 3) {
							echo "Accepted By Bag. Produksi";
						} elseif ($status == 4) {
							echo "Accepted By Bag. Coasting";
						} elseif ($status == 5) {
							echo "Accepted By General Manager";
						} else {
							echo "Unknown"; 
						} ?>
                        </td>
						<td>
							<!-- Button trigger modal -->
							<button type="button" class="btn btn-light btn-sm" data-toggle="modal" data-target="#modelId-frsh-<?php echo $ss['id'] ?>">
							Detail Penerimaan Fresh
							</button>
							
							<!-- Modal -->
							<div class="modal fade" id="modelId-frsh-<?php echo $ss['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
								<div class="modal-dialog modal-xl modal-fullscreen" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title">Detail Penerimaan Basi</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
										</div>
										<div class="modal-body">
											<div class="my-2">
												<div class="">Kode Supplier : <?php echo $ss['kode_supplier'] ?></div>
												<div class="">No Nota : <?php echo mt_rand(10,9999) ?></div>
												<div class="">Tanggal : <?php echo $ss['tanggal_rec'] ?></div>
											</div>
											<table class="table table-bordered">
												<thead>
													<tr>
														<td>No.</td>
														<td width="20%">Jenis Bag.</td>
														<td width="50%">Keterangan</td>
														<td>Berat Bersih (Kg)</td>
														<td>Harga Satuan</td>
														<td>Jumlah Harga (Rp)</td>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>1</td>
														<td>JB COL</td>
														<td></td>
														<td><?php
														echo $col = (floatval($ss['col']) + floatval($ss['bf'])) ;
														
														?></td>
														<td><?php echo floatval($price[0]['harga']) ?></td>
														<td><?php echo $col * floatval($price[14]['harga']) ?></td>
													</tr>
													<tr>
														<td>2</td>
														<td>JB A</td>
														<td></td>
														<td><?php 
														echo $jb = (floatval($ss['jb']) + floatval($ss['jbb_jf']));
														?></td>
														<td><?php echo floatval($price[1]['harga']) ?></td>
														<td><?php echo $jb * floatval($price[1]['harga']) ?></td>
													</tr>
													<tr>
														<td>3</td>
														<td>JB B</td>
														<td></td>
														<td><?php
														echo $jk = (floatval($ss['jbb_jk']) + floatval($ss['jbb_bf'])) ;
														
														?></td>
														<td><?php echo floatval($price[2]['harga']) ?></td>
														<td> <?php echo $jk * floatval($price[2]['harga']); ?></td>
													</tr>
													<tr>
														<td>4</td>
														<td>XL</td>
														<td></td>
														<td><?php echo (floatval($ss['xlp'])); ?></td>
														<td><?php echo floatval($price[4]['harga']) ?></td>
														<td> <?php echo (floatval($ss['xlp'])) * floatval($price[4]['harga']); ?></td>
													</tr>
													<tr>
														<td>5</td>
														<td>BF</td>
														<td></td>
														<td><?php 
														echo $bf = (floatval($ss['bf_k3_col']) + floatval($ss['bf_k3_jb']) + floatval($ss['bf_k3_jk'])
														+ floatval($ss['bf_k3_jl']) + floatval($ss['bf_jl']) + floatval($ss['bf_bf']) + floatval($ss['bf_bf']) + floatval($ss['bf_kj']));
														
														?></td>
														<td><?php echo floatval($price[6]['harga']) ?></td>
														<td> <?php echo $bf * floatval($price[6]['harga']); ?></td>
													</tr>
													<tr>
														<td>6</td>
														<td>SPK</td>
														<td></td>
														<td><?php
															echo $spk = (floatval($ss['spk_sp_jb']) +  floatval($ss['spk_sp_bfp']) + floatval($ss['spk_sp_sph']));
														
														?></td>
														<td><?php echo floatval($price[7]['harga']) ?></td>
														<td> <?php echo $spk * floatval($price[7]['harga']); ?></td>
													</tr>
													<tr>
														<td>7</td>
														<td>SP</td>
														<td></td>
														<td><?php echo
														$sp = (floatval($ss['bf_spk_xlp']) + floatval($ss['bf_spk_sp']));
														
														?></td>
														<td><?php echo floatval($price[8]['harga']) ?></td>
														<td> <?php echo $sp * floatval($price[8]['harga']); ?></td>
													</tr>
													<tr>
														<td>8</td>
														<td>CL</td>
														<td></td>
														<td><?php echo
														 $cl = floatval($ss['sp_cl']);
														?></td>
														<td><?php echo floatval($price[10]['harga']) ?></td>
														<td> <?php echo $cl * floatval($price[10]['harga']); ?></td>
													</tr>
													<tr>
														<td>9</td>
														<td>MH</td>
														<td></td>
														<td><?php echo
														$mh = (floatval($ss['mh']) + floatval($ss['mh_slb']));
														
														?></td>
														<td><?php echo floatval($price[12]['harga']) ?></td>
														<td> <?php echo $mh * floatval($price[12]['harga']); ?></td>
													</tr>
													<tr>
														<td colspan="3">Jumlah</td>
														<td>
														<?php echo 
														$col 
														+ $mh
														+ $cl
														+ $sp
														+ $spk
														+ $bf
														+  (floatval($ss['xlp']))
														+ $jk
														+ $jb
														; ?>
														</td>
														<td></td>
														<td><?php echo 
														$col * floatval($price[14]['harga']) 
														+ $mh * floatval($price[12]['harga'])
														+ $cl * floatval($price[10]['harga'])
														+ $sp * floatval($price[8]['harga'])
														+ $spk * floatval($price[7]['harga'])
														+ $bf * floatval($price[6]['harga'])
														+  (floatval($ss['xlp'])) * floatval($price[4]['harga'])
														+ $jk * floatval($price[2]['harga'])
														+ $jb * floatval($price[1]['harga'])
														; ?></td>
													</tr>
												</tbody>

											</table>
											<div class="modal-footer">
												<form action="<?php echo base_url('main/approve_penerimaan_bahan_baku'); ?>" method="post">
													<input type="tel" name="potongan_harga" class="form-control my-2" id="" placeholder="Keterangan">
												<input type="hidden" name="id_sortir" value="<?php echo $ss['id'] ?>">
												<input type="hidden" name="kode_supplier" value="<?php echo $ss['kode_supplier'] ?>">
												<input type="hidden" name="total" value="<?php echo $phr * floatval($price[14]['harga']) + (floatval($ss['mh']) + floatval($ss['mh_slb'])) * floatval($price[12]['harga']) + (floatval($ss['shell'])) * floatval($price[24]['harga']); ?>">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
												<button type="submit" class="btn btn-primary">Simpan & Approve</button>
											</form>
										</div>
									</div>
								</div>
							</div>
						</td>
					</tr>
				<?php endforeach?>
			</tbody>
		</table>
	</div>
	<div class="col-md-12 mt-4">
		<h4>Form Bukti Pengeluaran</h4>
	<table class="table table-bordered" id="myTable4">
			<thead>
				<tr>
					<th>No.</th>
					<th>Kode Supplier</th>
					<th>Tanggal Input</th>
					<td>Berat Timbangan</td>
					<th>Status</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				$no = 1;
				$total = 0;
				foreach ($memo as $ss) : 
					$total = floatval($ss['col']) + floatval($ss['bf']) + floatval($ss['jb']) + floatval($ss['jbb_jf']) + floatval($ss['jbb_jk'])
					+ floatval($ss['jbb_bf']) + floatval($ss['xlp']) + floatval($ss['bf_k3_col']) + floatval($ss['bf_k3_jb']) + floatval($ss['bf_k3_jk'])
					+ floatval($ss['bf_k3_jl']) + floatval($ss['bf_jl']) + floatval($ss['bf_bf']) + floatval($ss['bf_bf']) + floatval($ss['bf_kj']) + 
					floatval($ss['bf_spk_xlp']) + floatval($ss['bf_spk_sp']) + floatval($ss['spk_sp_jb']) +  floatval($ss['spk_sp_bfp']) + floatval($ss['spk_sp_sph']) + 
					floatval($ss['sp_cl']) + floatval($ss['sp_clf']) + floatval($ss['mh']) + floatval($ss['mh_slb']) + floatval($ss['phr']) + floatval($ss['basi_col']) + floatval($ss['basi_jb']) + floatval($ss['basi_sp']) + floatval($ss['mhr']) + 
					floatval($ss['basi_cl']) + floatval($ss['basi_mh']);
				?>
					<tr>
						<td><?php echo $no++ ?></td>
						<td><?php echo $ss['kode_supplier'] ?></td>
						<td><?php echo $ss['tanggal_rec'] ?></td>
						<td><?php echo $ss['timbangan_bb'] ?></td>
						<td>
						<?php 
						$status = $ss['status'];
						if ($status == -1) {
							echo "Rejected";
						} elseif ($status == 0) {
							echo "Pending";
						} elseif ($status == 1) {
							echo "Accepted";
						} elseif ($status == 2) {
							echo "Accepted By TL Sortir";
						} elseif ($status == 3) {
							echo "Accepted By Bag. Produksi";
						} elseif ($status == 4) {
							echo "Accepted By Bag. Coasting";
						} elseif ($status == 5) {
							echo "Accepted By General Manager";
						} else {
							echo "Unknown"; 
						} ?>
                        </td>
						<td>
							<!-- Button trigger modal -->
							<button type="button" class="btn btn-light btn-sm" data-toggle="modal" data-target="#modelId-BB-<?php echo $ss['id'] ?>">
							Detail Penerimaan Bahan Baku Basi
							</button>
							
							<!-- Modal -->
							<div class="modal fade" id="modelId-BB-<?php echo $ss['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
								<div class="modal-dialog modal-xl modal-fullscreen" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title">Detail Penerimaan Basi</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
										</div>
										<div class="modal-body">
											<div class="my-2">
												<div class="">Kode Supplier : <?php echo $ss['kode_supplier'] ?></div>
												<div class="">No Nota : <?php echo mt_rand(10,9999) ?></div>
												<div class="">Tanggal : <?php echo $ss['tanggal_rec'] ?></div>
											</div>
											<table class="table table-bordered">
												<thead>
													<tr>
														<td>No.</td>
														<td width="50%">Keterangan</td>
														<td>Qty (kg)</td>
														<td>@Harga</td>
														<td>Jumlah (Rp)</td>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>1</td>
														<td>Subsidi Rajungan Fresh</td>
														<td><?php echo $ss['qty'] ?></td>
														<td><?php echo $total / $ss['qty'] ?></td>
														<td><?php echo $total ?></td>
													</tr>
													<tr>
														<td>2</td>
														<td>Tambahan</td>
														<td></td>
														<td></td>
														<td></td>
													</tr>
													<tr>
														<td>2</td>
														<td>Potongan</td>
														<td></td>
														<td></td>
														<td><?php echo (floatval($total)); ?></td>
													</tr>
													<tr>
														<td colspan="4">Jumlah</td>
														<td><?php echo $phr * floatval($price[14]['harga']) + (floatval($ss['mh']) + floatval($ss['mh_slb'])) * floatval($price[12]['harga']) + (floatval($ss['shell'])) * floatval($price[24]['harga']); ?></td>
													</tr>
												</tbody>

											</table>
											<div class="modal-footer">
												<form action="<?php echo base_url('main/approve_penerimaan_bahan_baku'); ?>" method="post">
													<input type="tel" name="potongan_harga" class="form-control my-2" id="" placeholder="Keterangan">
												<input type="hidden" name="id_sortir" value="<?php echo $ss['id'] ?>">
												<input type="hidden" name="kode_supplier" value="<?php echo $ss['kode_supplier'] ?>">
												<input type="hidden" name="total" value="<?php echo $phr * floatval($price[14]['harga']) + (floatval($ss['mh']) + floatval($ss['mh_slb'])) * floatval($price[12]['harga']) + (floatval($ss['shell'])) * floatval($price[24]['harga']); ?>">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
												<button type="submit" class="btn btn-primary">Simpan & Approve</button>
											</form>
										</div>
									</div>
								</div>
							</div>
						</td>
					</tr>
				<?php endforeach?>
			</tbody>
		</table>
	</div>

</div>
