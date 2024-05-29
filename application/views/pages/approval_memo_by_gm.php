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
							<button type="button" class="btn btn-light btn-sm" data-toggle="modal" data-target="#modelId-<?php echo $ss['id'] ?>">
							  	Detail Subsidi
							</button>
							
							<!-- Modal -->
							<div class="modal fade" id="modelId-<?php echo $ss['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<form action="<?php echo base_url('main/input_memo_subdisi/'.$ss['ids']); ?>" method="post">
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
												<input type="hidden" name="id_sortir" value="<?php echo $ss['ids'] ?>">
												<input type="text" name="kode_supplier" readonly value="<?php echo $ss['kode_supplier'] ?>" class="form-control mb-1">
												<label for="">Tanggal Sortir</label>
												<input type="text" name="tanggal" readonly value="<?php echo $ss['tanggal_rec'] ?>" class="form-control mb-1">
												<label for="">Qty</label>
												<input type="text" name="qty" readonly value="<?php echo $total ?>" class="form-control mb-1">
												<label for="">Subsidi</label>
												<?php if(!$ss['subsidi']) { ?> 
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
													<?php if($ss['id_memo'] != null) { ?> 
														<a href="<?php echo base_url('main/approve_memo_subsidi/'.$ss['id_memo']); ?>"class="btn btn-primary">Approve</a>
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
	</div>
