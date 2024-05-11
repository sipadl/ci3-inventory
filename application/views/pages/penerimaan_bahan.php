<div class="row">
	<div class="col-md-12 mt-4">
		<!-- <h4>Penerimaan</h4> -->
	<table class="table table-bordered" id="myTable3">
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
						<td><?php echo $ss['id'] ?></td>
						<td><?php echo $ss['tanggal_rec'] ?></td>
						<td>
						<?php 
						$status = $ss['status_memo'];
						if ($status == -1) {
							echo "Rejected";
						} elseif ($status == 0) {
							echo "Pending";
						} elseif ($status > 1) {
							echo "Accepted";
						} ?>
                        </td>
						<td>
							<!-- Button trigger modal -->
							<button type="button" class="btn btn-light btn-sm" data-toggle="modal" data-target="#modelId-frsh-<?php echo $ss['id'] ?>">
							Detail Penerimaan Fresh
							</button>
							<button type="button" class="btn btn-light btn-sm" data-toggle="modal" data-target="#modelIdX-<?php echo $ss['id'] ?>">
							  	Tambah Subsidi
							</button>
							
							<!-- Modal -->
							<div class="modal fade" id="modelId-frsh-<?php echo $ss['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
								<div class="modal-dialog modal-xl modal-fullscreen" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title">Detail Penerimaan</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
										</div>
										<div class="modal-body">
											<div class="my-2">
												<h3>Penerimaan Data Fresh</h3>
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
														$col = (floatval($ss['col']) + floatval($ss['bf']));
														$jb = (floatval($ss['jb']) + floatval($ss['jbb_jf']));
														$jk = (floatval($ss['jbb_jk']) + floatval($ss['jbb_bf']));
														$xlp = floatval($ss['xlp']);
														$bf = (floatval($ss['bf_k3_col']) + floatval($ss['bf_k3_jb']) + floatval($ss['bf_k3_jk']) + floatval($ss['bf_lp_slb'])
														+ floatval($ss['bf_k3_jl']) + floatval($ss['bf_jl']) + floatval($ss['bf_bf']) + floatval($ss['bf_kj']) + floatval($ss['bf_sp']));
														$spk = floatval($ss['bf_spk_sp']) + floatval($ss['bf_spk_xlp']);
														$sp = floatval($ss['spk_sp_jb']) + floatval($ss['spk_sp_xlp']) + floatval($ss['spk_sp_bfp']) + floatval($ss['spk_sp']) + floatval($ss['sp_sph']);
														$cl = floatval($ss['sp_cl']) + floatval($ss['sp_clf']);
														$mh = floatval($ss['mh']) + floatval($ss['mhr']);

														$total_mh = $mh * floatval($price[14]['harga']);
														$total_col = $col * floatval($price[0]['harga']);
														$total_jb = $jb * floatval($price[1]['harga']);
														$total_jk = $jk * floatval($price[2]['harga']);
														$total_xlp = $xlp * floatval($price[4]['harga']);
														$total_bf = $bf * floatval($price[6]['harga']);
														$total_spk = $spk * floatval($price[9]['harga']);
														$total_sp = $sp * floatval($price[10]['harga']);
														$total_cl = $cl * floatval($price[12]['harga']);

														$grand_total = $total_mh + $total_col + $total_jb
														+ $total_jk + $total_xlp + $total_bf + $total_spk
														+ $total_sp + $total_cl;

														echo $col; 
														?></td>
														<td><?php echo number_format(floatval($price[0]['harga'])) ?></td>
														<td><?php echo number_format($total_col) ?></td>
													</tr>
													<tr>
														<td>2</td>
														<td>JB A</td>
														<td></td>
														<td><?php 
														echo $jb;
														?></td>
														<td><?php echo number_format(floatval($price[1]['harga'])) ?></td>
														<td><?php echo number_format($total_jb) ?></td>
													</tr>
													<tr>
														<td>3</td>
														<td>JB B</td>
														<td></td>
														<td><?php
														echo $jk;
														
														?></td>
														<td><?php echo number_format(floatval($price[2]['harga'])) ?></td>
														<td> <?php echo number_format($jk * floatval($price[2]['harga'])); ?></td>
													</tr>
													<tr>
														<td>4</td>
														<td>XLP</td>
														<td></td>
														<td><?php echo $xlp; ?></td>
														<td><?php echo number_format(floatval($price[4]['harga'])) ?></td>
														<td> <?php echo number_format((floatval($ss['xlp'])) * floatval($price[4]['harga'])); ?></td>
													</tr>
													<tr>
														<td>5</td>
														<td>BF</td>
														<td></td>
														<td><?php 
														
														echo $bf;
														?></td>
														<td><?php echo number_format(floatval($price[6]['harga'])) ?></td>
														<td> <?php echo number_format($total_bf); ?></td>
													</tr>
													<tr>
														<td>6</td>
														<td>SPK</td>
														<td></td>
														<td><?php
															echo $spk;
														
														?></td>
														<td><?php echo number_format(floatval($price[7]['harga'])) ?></td>
														<td> <?php echo number_format($spk * floatval($price[7]['harga'])); ?></td>
													</tr>
													<tr>
														<td>7</td>
														<td>SP</td>
														<td></td>
														<td><?php echo $sp;
														?></td>
														<td><?php echo number_format(floatval($price[8]['harga'])) ?></td>
														<td> <?php echo number_format($sp * floatval($price[8]['harga'])); ?></td>
													</tr>
													<tr>
														<td>8</td>
														<td>CL</td>
														<td></td>
														<td><?php echo $cl
														?></td>
														<td><?php echo number_format(floatval($price[12]['harga'])) ?></td>
														<td> <?php echo number_format($total_cl); ?></td>
													</tr>
													<tr>
														<td>9</td>
														<td>MH</td>
														<td></td>
														<td><?php echo
														$mh;
														
														?></td>
														<td><?php echo number_format(floatval($price[14]['harga'])) ?></td>
														<td> <?php echo number_format($total_mh); ?></td>
													</tr>
													<tr>
														<td colspan="3">Jumlah</td>
														<td>
														<?php echo 
														number_format($col 
														+ $mh
														+ $cl
														+ $sp
														+ $spk
														+ $bf
														+  $xlp
														+ $jk
														+ $jb)
														; ?>
														</td>
														<td></td>
														<td><?php echo number_format($grand_total); ?></td>
													</tr>
												</tbody>
											</table>

											<div class="my-2">
												<h3>Penerimaan Data Basi</h3>
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
														<td><?php 
														$total_mhrx = floatval($ss['basi_mh2']) + floatval($ss['basi_cl2']) + floatval($ss['basi_mh']) + floatval($ss['basi_cl']); 
														$total_phrx =  floatval($ss['basi_col2']) + floatval($ss['basi_jb2']) + floatval($ss['basi_jk2']) + floatval($ss['basi_xlp2']) + floatval($ss['basi_bf2']) + floatval($ss['basi_sp2'])
														+ floatval($ss['basi_col']) + floatval($ss['basi_jb']) + floatval($ss['basi_jk']) + floatval($ss['basi_xlp']) + floatval($ss['basi_bf']) + floatval($ss['basi_sp']);
														echo $total_phrx ?></td>
														<td><?php echo floatval($price[14]['harga']) ?></td>
														<td><?php echo $total_phrx * floatval($price[14]['harga']) ?></td>
													</tr>
													<tr>
														<td>2</td>
														<td>MHR</td>
														<td></td>
														<td><?php echo $total_mhrx; ?></td>
														<td><?php echo number_format(floatval($price[12]['harga'])) ?></td>
														<td><?php echo number_format( $total_mhrx * $price[12]['harga'] )?></td>
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
														<td><?php echo $total_phrx + $total_mhrx + (floatval($ss['shell'])) ?></td>
														<td></td>
														<td><?php echo number_format(($total_phrx * floatval($price[14]['harga'])) + ($total_mhrx * floatval($price[12]['harga'])) + (floatval($ss['shell'])) * floatval($price[24]['harga'])); ?></td>
													</tr>
												</tbody>
											</table>
											<div class="my-2">
												<h3>Form Bukti Pengeluaran</h3>
												<div class="">Kode Supplier : <?php echo $ss['kode_supplier'] ?></div>
												<div class="">No Nota : <?php echo mt_rand(10,9999) ?></div>
												<div class="">Tanggal : <?php echo $ss['tanggal_rec'] ?></div>
											</div>
											<table class="table table-bordered">
												<thead>
													<tr>
														<th>No.</th>
														<th width="50%">Keterangan</th>
														<th>Qty (kg)</th>
														<th>@Harga</th>
														<th>Jumlah (Rp)</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>1</td>
														<td>
															Subsidi Rajungan Fresh
														</td>
														<td><?php 
														$tot = $col 
														+ $mh
														+ $cl
														+ $sp
														+ $spk
														+ $bf
														+  $xlp
														+ $jk
														+ $jb;
														echo 
														number_format($tot) ?>
														</td>
														<td><?php echo number_format($ss['subsidi']) ?></td>
														<td><?php echo number_format($tot * $ss['subsidi']) ?></td>
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
														<td></td>
													</tr>
													<tr>
														<td colspan="4">Jumlah</td>
														<td><?php echo 
														number_format($tot * $ss['subsidi'])  ?></td>
													</tr>
												</tbody>
											</table>
											<div class="modal-footer">
												<form action="<?php echo base_url('main/approve_penerimaan_bahan_baku'); ?>" method="post">
													<input type="tel" name="potongan_harga" class="form-control my-2" id="" placeholder="Keterangan">
												<input type="hidden" name="id_sortir" value="<?php echo $ss['id'] ?>">
												<input type="hidden" name="kode_supplier" value="<?php echo $ss['kode_supplier'] ?>">
												<input type="hidden" name="total" value="<?php echo $total_phrx + $total_mhrx ?>">
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
												<button type="submit" class="btn btn-primary">Simpan & Approve</button>
											</form>
										</div>
									</div>
								</div>
								</div>
							</div>
							
							<!-- Modal -->
							<div class="modal fade" id="modelIdX-<?php echo $ss['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
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
