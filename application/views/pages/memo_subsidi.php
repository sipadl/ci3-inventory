<div class="row">
	<div class="col-md-12">
		<?php
		// Check if	 flash data exists
		if ($this->session->flashdata('success')) {
		// If it does, display a success message
		echo '<div class="alert alert-success my-2">' . $this->session->flashdata('success') . '</div>';
		}
		?>
		<table class="responsive table table-bordered" id="myTable">
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
						<td><?php echo $ss['kode_supplier'] ?></td>
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
							echo "Accepted";
						} elseif ($status == 3) {
							echo "Accepted";
						} elseif ($status == 4) {
							echo "Accepted";
						} elseif ($status == 5) {
							echo "Accepted";
						} else {
							echo "Unknown"; 
						} ?>
                        </td>
						<td>
							<!-- Button trigger modal -->
							<!-- Button trigger modal -->
							<button type="button" class="btn btn-light btn-sm" data-toggle="modal" data-target="#modelIdMemo<?php echo $ss['id'] ?>">
							  Detail Memo
							</button>
							
							<!-- Modal -->
							<div class="modal fade" id="modelIdMemo<?php echo $ss['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title">Memo Subsidi</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
										</div>
										<div class="modal-body">
										<div class="text-center">
											<h4 class="modal-title mb-2">Memo Subsidi</h4>
											<p>Dengan Memberitahukan</p>
										</div>
											<table class="responsive table table-borderless w-100">
												<tbody>
													<tr>
														<td>Kode Supplier</td>
														<td><?php echo $ss['kode_supplier'] ?></td>
													</tr>
													<tr>
														<td>Tanggal Bahan Masuk</td>
														<td><?php echo $ss['tanggal'] ?></td>
													</tr>
													<tr>
														<td>Qty Sortir</td>
														<td><?php echo $total ?> Kg</td>
													</tr>
												</tbody>
											</table>
											<div class="d-flex justify-content-center">
												<strong>Diberikan : Penambahan / Pengurangan</strong>
											</div>
											<table class="responsive table table-borderless w-100">
												<tbody>
													<tr>
														<td>Subsidi</td>
														<td><?php echo $ss['subsidi'] ? $ss['subsidi'] : '-' ?></td>
													</tr>
														<tr >
															<td></td>
															<td class="text-right" height="90">Disetujui Oleh
																<br>
																General Manager
															</td>
														</tr>
												</tbody>

											</table>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											<!-- <button type="button" class="btn btn-primary">Save</button> -->
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
