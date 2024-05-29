<div class="row">
	<div class="col-md-12">
		<!-- <h4>Penerimaan</h4> -->

        <div class="d-flex">
            <div class="d-flex justify-content-center align-self-center my-3">
                <button
                    type="button"
                    class="btn btn-primary btn-sm"
                    data-toggle="modal"
                    data-target="#modelIdLaporan">
                    Pelunasan
                </button>
            </div>
        </div>

        <!-- Modal -->
        <div
            class="modal fade"
            id="modelIdLaporan"
            tabindex="-1"
            role="dialog"
            aria-labelledby="modelTitleId"
            aria-hidden="true">
            <div class="modal-dialog modal-xl modal-fullscreen" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Laporan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <table class="responsive table table-responsive table-bordered" id="myTablePrintAble">
                                <thead>
									<tr>
										<th colspan="16" style="text-align:center;">
											PT. Fresh On Time Seafood
											<br>Rekapitulasi Pembelian Bahan Baku Fresh
										</th>
									</tr>
									<tr>
										<!-- <th colspan="16" style="text-align:center;">Tanggal: <?= date('Y-m-d') ?></th> -->
									</tr>
                                    <tr>
                                        <th rowspan="2">No.</th>
                                        <th rowspan="2">Nama Supplier</th>
                                        <th rowspan="2">No Nota</th>
                                        <th rowspan="2">Fresh (Kg)</th>
                                        <th rowspan="2">Total (Kg)</th>
                                        <th rowspan="2">Total Harga Nota</th>
                                        <th rowspan="2">Subsidi</th>
                                        <th rowspan="2">Grand Total Nota</th>
                                        <th rowspan="2">Selisih Pembulatan</th>
                                        <th colspan="4" style="text-align: center;">Potongan</th>
                                        <th rowspan="2">Total Terima</th>
                                        <th rowspan="2">Bank</th>
                                        <th rowspan="2">No.Rek.</th>
                                        <th rowspan="2">Atas Nama</th>
                                    </tr>
                                    <tr>
                                        <th>DP</th>
										<th>Pinjaman</th>
										<th>Faktur</th>
                                       
                                        <th>PPh 22</th>
                                    </tr>
                                </thead>
                                <tbody>
									<?php foreach($sortir as $no => $ss): 
										$nama_supplier = $this->db->query('select nama_supplier from tbl_supplier where kode_supplier = "'.$ss['kode_supplier'].'"' )->row_array();
										$price_history = $this->db->query('select * from tbl_price_tr where id_sortir = "'.$ss['ids'].'"' )->result_array();
									
									?>
										
									<tr>
										<td><?= $no + 1 ?></td>
										<td><?php echo $nama_supplier['nama_supplier'] ?></td>
										<td> <?php echo $ss['no_nota'] ?> </td>
										<td>
											
											<?php
												$col = (floatval($ss['col']) + floatval($ss['bf']));
												$jb = (floatval($ss['jb']) + floatval($ss['jb_bf']));
												$jk = (floatval($ss['jbb_jk']) + floatval($ss['jbb_bf']));
												$xlp = floatval($ss['xlp']);
												$bf = (floatval($ss['bf_k3_col']) + floatval($ss['bf_k3_jb']) + floatval($ss['bf_k3_jk']) + floatval($ss['bf_lp_slb'])
													+ floatval($ss['bf_k3_jl']) + floatval($ss['bf_jl']) + floatval($ss['bf_bf']) + floatval($ss['bf_kj']) + floatval($ss['bf_sp']));
												$spk = floatval($ss['bf_spk_sp']) + floatval($ss['bf_spk_xlp']);
												$sph = floatval($ss['sp_sph']);
												$sp = floatval($ss['spk_sp_jb']) + floatval($ss['spk_sp_xlp']) + floatval($ss['spk_sp_bfp']) + floatval($ss['spk_sp']);
												// floatval($sp_jb) + floatval($sp_xlp) + floatval($sp_bf) + floatval($spk_sp)
												$cl = floatval($ss['sp_cl']);
												$clf = floatval($ss['sp_clf']);
												$mh = floatval($ss['mh']) + floatval($ss['mh_slb']);

												$total_mh = $mh * floatval($price_history[12]['harga'] ?? $price[12]['harga']);
												$total_col = $col * floatval($price_history[0]['harga'] ?? $price[0]['harga']);
												$total_jb = $jb * floatval($price_history[1]['harga'] ?? $price[1]['harga']);
												$total_jk = $jk * floatval($price_history[2]['harga'] ?? $price[2]['harga']);
												$total_xlp = $xlp * floatval($price_history[4]['harga'] ?? $price[4]['harga']);
												$total_bf = $bf * floatval($price_history[6]['harga'] ?? $price[6]['harga']);
												$total_spk = $spk * floatval($price_history[7]['harga'] ?? $price[7]['harga']);
												$total_sp = $sp * floatval($price_history[8]['harga'] ?? $price[8]['harga']);
												$total_cl = $cl * floatval($price_history[10]['harga'] ?? $price[10]['harga']);
												$total_sph = $sph * floatval($price_history[9]['harga'] ?? $price[9]['harga']);
												$total_clf = $clf * floatval($price_history[11]['harga'] ?? $price[11]['harga']);

												$grand_total = $total_mh + $total_col + $total_jb
												+ $total_jk + $total_xlp + $total_bf + $total_spk
												+ $total_sp + $total_cl + $total_sph + $total_clf;

												$total_mhrx = floatval($ss['basi_mh2']) + floatval($ss['basi_cl2']) + floatval($ss['basi_mh']) + floatval($ss['basi_cl']); 
												$total_phrx =  floatval($ss['basi_col2']) + floatval($ss['basi_jb2']) + floatval($ss['basi_jk2']) + floatval($ss['basi_xlp2']) + floatval($ss['basi_bf2']) + floatval($ss['basi_sp2'])
												+ floatval($ss['basi_col']) + floatval($ss['basi_jb']) + floatval($ss['basi_jk']) + floatval($ss['basi_xlp']) + floatval($ss['basi_bf']) + floatval($ss['basi_sp']);

												echo $col + $mh + $cl + $sp + $spk + $bf + $xlp + $jk + $jb + $sph + $clf;
											?>
											

										</td>
										<td>
											</td>
										<td><?php echo number_format($grand_total + ($total_phrx * floatval($price_history[14]['harga'] ?? $price[14]['harga'])) + ($total_mhrx * ($price_history[13]['harga'] ?? $price[13]['harga']))); ?></td>
										<td><?php
												$col = (floatval($ss['col']) + floatval($ss['bf']));
												$jb = (floatval($ss['jb']) + floatval($ss['jb_bf']));
												$jk = (floatval($ss['jbb_jk']) + floatval($ss['jbb_bf']));
												$xlp = floatval($ss['xlp']);
												$bf = (floatval($ss['bf_k3_col']) + floatval($ss['bf_k3_jb']) + floatval($ss['bf_k3_jk']) + floatval($ss['bf_lp_slb'])
												+ floatval($ss['bf_k3_jl']) + floatval($ss['bf_jl']) + floatval($ss['bf_bf']) + floatval($ss['bf_kj']) + floatval($ss['bf_sp']));
												$spk = floatval($ss['bf_spk_sp']) + floatval($ss['bf_spk_xlp']);
												$sph = floatval($ss['sp_sph']);
												$sp = floatval($ss['spk_sp_jb']) + floatval($ss['spk_sp_xlp']) + floatval($ss['spk_sp_bfp']) + floatval($ss['spk_sp']);
												// floatval($sp_jb) + floatval($sp_xlp) + floatval($sp_bf) + floatval($spk_sp)
												$cl = floatval($ss['sp_cl']);
												$clf = floatval($ss['sp_clf']);
												$mh = floatval($ss['mh']) + floatval($ss['mh_slb']);

												$tot = $col + $mh + $cl + $clf + $sp + $spk + $bf +  $xlp + $jk + $jb;

												echo number_format($tot * $ss['subsidi']);
											?></td>
										<td>
											<?php
												echo number_format(($grand_total + $total_phrx * (floatval($price_history[14]['harga'] ?? $price[14]['harga']))) + ($total_mhrx * (floatval($price_history[13]['harga'] ?? $price[13]['harga']))) + (floatval($ss['shell'])) * (floatval($price_history[24]['harga'] ?? $price[24]['harga'])));
											?>
										</td>
										<td>
											<?php
												echo number_format( (floatval($ss['shell'])) * floatval($price_history[24]['harga'] ?? $price[24]['harga']));
											?>
										</td>
										<td><?php echo number_format($ss['dp']) ?></td>
										<td><?php echo number_format($ss['pinjaman']) ?></td>
										<td><?php echo number_format($ss['faktur']) ?></td>
										<td>
										<?php
											$supplier_data = $this->db->where('kode_supplier', $ss['kode_supplier'])->get('tbl_supplier')->row_array();
											if($supplier_data && $supplier_data['npwp']) {
												$total_potongan = round(
													$grand_total
													+ ($total_phrx * floatval($price_history[14]['harga'] ?? $price[14]['harga'])) + ($total_mhrx * floatval($price_history[13]['harga'] ?? $price[13]['harga'])) + (floatval($ss['shell'])) * floatval($price_history[24]['harga'] ?? $price[24]['harga'])
													+ ($tot * $ss['subsidi'] ?? 0)
												) * 0.0025; // dengan NPWP
											} else $total_potongan = 0; // tanpa NPWP
											echo number_format($total_potongan);
										?>
										</td>
										<?php ; ?>
										<td>
											<?= number_format( $grand_total - $ss['dp'] - $ss['pinjaman'] - $ss['faktur'] - $total_potongan ) ?>
										</td>
										<td><?= $ss['bank'] ?? '-'; ?></td>
										<td><?= $ss['nomor'] ?? '-'; ?></td>
										<td><?= $ss['an'] ?? '-'; ?></td>
										</tbody>
											
										</tr>
										<?php endforeach; ?>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" onclick="exportToExcel2()" class="btn btn-primary">Print</button>
                        <!-- <button type="button" class="btn btn-primary">Save</button> -->
                    </div>
                </div>
            </div>
        </div>
        <?php
		if ($this->session->flashdata('success')) {
		echo '<div class="alert alert-success my-2">' . $this->session->flashdata('success') . '</div>';
		}
		?>

		<table class="responsive table table-bordered" id="myTable3">
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

				/*
				foreach ($sortir as $ss) {
					$price_history = $this->db->query('select * from tbl_price_tr where id_sortir = "'.$ss['ids'].'"' )->result_array();
					print_r($price_history);
				}
				die();
				*/

				$no = 1;
				$total = 0;
				foreach ($sortir as $ss) : 
					$total = floatval($ss['col']) + floatval($ss['bf']) + floatval($ss['jb']) + floatval($ss['jbb_jf']) + floatval($ss['jbb_jk'])
					+ floatval($ss['jbb_bf']) + floatval($ss['xlp']) + floatval($ss['bf_k3_col']) + floatval($ss['bf_k3_jb']) + floatval($ss['bf_k3_jk'])
					+ floatval($ss['bf_k3_jl']) + floatval($ss['bf_jl']) + floatval($ss['bf_bf']) + floatval($ss['bf_bf']) + floatval($ss['bf_kj']) + 
					floatval($ss['bf_spk_xlp']) + floatval($ss['bf_spk_sp']) + floatval($ss['spk_sp_jb']) +  floatval($ss['spk_sp_bfp']) + floatval($ss['spk_sp_sph']) + 
					floatval($ss['sp_cl']) + floatval($ss['sp_clf']) + floatval($ss['mh']) + floatval($ss['mh_slb']) + floatval($ss['phr']) + floatval($ss['basi_col']) + floatval($ss['basi_jb']) + floatval($ss['basi_sp']) + floatval($ss['mhr']) + 
					floatval($ss['basi_cl']) + floatval($ss['basi_mh']);
					
					$price_history = $this->db->query('select * from tbl_price_tr where id_sortir = "'.$ss['ids'].'"' )->result_array();
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
							  	Input pelunasan
							</button>
							<button type="button" class="btn btn-light btn-sm" data-toggle="modal" data-target="#modelIdX-<?php echo $ss['id'] ?>">
							
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
										<div class="modal-body" id="modal-print-fresh-<?php echo $ss['id'] ?>">
											<div class="my-2">
												<h3>Penerimaan Data Fresh</h3>
												<div class="">Kode Supplier : <?php echo $ss['kode_supplier'] ?></div>
												<div class="">No Nota : <?php echo $ss['no_nota'] ?> </div>
												<div class="">Tanggal : <?php echo $ss['tanggal'] ?></div>
											</div>
											<table class="responsive table table-bordered">
												<thead>
													<tr>
														<td>No.</td>
														<td width="20%">Jenis Bag.</td>
														<td width="20%">Keterangan</td>
														<td>Berat Bersih (Kg)</td>
														<td>Harga Satuan</td>
														<td>Jumlah Harga (Rp)</td>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>1</td>
														<td>COL</td>
														<td></td>
														<td><?php
														$col = (floatval($ss['col']) + floatval($ss['bf']));
														$jb = (floatval($ss['jb']) + floatval($ss['jb_bf']));
														$jk = (floatval($ss['jbb_jk']) + floatval($ss['jbb_bf']));
														$xlp = floatval($ss['xlp']);
														$bf = (floatval($ss['bf_k3_col']) + floatval($ss['bf_k3_jb']) + floatval($ss['bf_k3_jk']) + floatval($ss['bf_lp_slb'])
														+ floatval($ss['bf_k3_jl']) + floatval($ss['bf_jl']) + floatval($ss['bf_bf']) + floatval($ss['bf_kj']) + floatval($ss['bf_sp']));
														$spk = floatval($ss['bf_spk_sp']) + floatval($ss['bf_spk_xlp']);
														$sph = floatval($ss['sp_sph']);
														$sp = floatval($ss['spk_sp_jb']) + floatval($ss['spk_sp_xlp']) + floatval($ss['spk_sp_bfp']) + floatval($ss['spk_sp']);
														// floatval($sp_jb) + floatval($sp_xlp) + floatval($sp_bf) + floatval($spk_sp)
														$cl = floatval($ss['sp_cl']);
														$clf = floatval($ss['sp_clf']);
														$mh = floatval($ss['mh']) + floatval($ss['mh_slb']);

														$total_mh = $mh * floatval($price_history[12]['harga'] ?? $price[12]['harga']);
														$total_col = $col * floatval($price_history[0]['harga'] ?? $price[0]['harga']);
														$total_jb = $jb * floatval($price_history[1]['harga'] ?? $price[1]['harga']);
														$total_jk = $jk * floatval($price_history[2]['harga'] ?? $price[2]['harga']);
														$total_xlp = $xlp * floatval($price_history[4]['harga'] ?? $price[4]['harga']);
														$total_bf = $bf * floatval($price_history[6]['harga'] ?? $price[6]['harga']);
														$total_spk = $spk * floatval($price_history[7]['harga'] ?? $price[7]['harga']);
														$total_sp = $sp * floatval($price_history[8]['harga'] ?? $price[8]['harga']);
														$total_cl = $cl * floatval($price_history[10]['harga'] ?? $price[10]['harga']);
														$total_sph = $sph * floatval($price_history[9]['harga'] ?? $price[9]['harga']);
														$total_clf = $clf * floatval($price_history[11]['harga'] ?? $price[11]['harga']);

														$grand_total = $total_mh + $total_col + $total_jb
														+ $total_jk + $total_xlp + $total_bf + $total_spk
														+ $total_sp + $total_cl + $total_sph + $total_clf;

														echo $col; 
														?></td>
														<td><?php echo number_format(floatval($price_history[0]['harga'] ?? $price[0]['harga'])) ?></td>
														<td><?php echo number_format($total_col) ?></td>
													</tr>
													<tr>
														<td>2</td>
														<td>JB</td>
														<td></td>
														<td><?php 
														echo $jb;
														?></td>
														<td><?php echo number_format(floatval($price_history[1]['harga'] ?? $price[1]['harga'])) ?></td>
														<td><?php echo number_format($total_jb) ?></td>
													</tr>
													<tr>
														<td>3</td>
														<td>JK</td>
														<td></td>
														<td><?php
														echo $jk;
														
														?></td>
														<td><?php echo number_format(floatval($price_history[2]['harga'] ?? $price[2]['harga'])) ?></td>
														<td> <?php echo number_format($jk * floatval($price_history[2]['harga'] ?? $price[2]['harga'])); ?></td>
													</tr>
													<tr>
														<td>4</td>
														<td>XLP</td>
														<td></td>
														<td><?php echo $xlp; ?></td>
														<td><?php echo number_format(floatval($price_history[4]['harga'] ?? $price[4]['harga'])) ?></td>
														<td> <?php echo number_format((floatval($ss['xlp'])) * floatval($price_history[4]['harga'] ?? $price[4]['harga'])); ?></td>
													</tr>
													<tr>
														<td>5</td>
														<td>BF</td>
														<td></td>
														<td><?php 
														
														echo $bf;
														?></td>
														<td><?php echo number_format(floatval($price_history[6]['harga'] ?? $price[6]['harga'])) ?></td>
														<td> <?php echo number_format($total_bf); ?></td>
													</tr>
													<tr>
														<td>6</td>
														<td>SPK</td>
														<td></td>
														<td><?php
															echo $spk;
														
														?></td>
														<td><?php echo number_format(floatval($price_history[7]['harga'] ?? $price[7]['harga'])) ?></td>
														<td> <?php echo number_format($spk * floatval($price_history[7]['harga'] ?? $price[7]['harga'])); ?></td>
													</tr>
													<tr>
														<td>7</td>
														<td>SPH</td>
														<td></td>
														<td><?php
															echo $sph;
														
														?></td>
														<td><?php echo number_format(floatval($price_history[9]['harga'] ?? $price[9]['harga'])) ?></td>
														<td> <?php echo number_format($sph * floatval($price_history[11]['harga'] ?? $price[11]['harga'])); ?></td>
													</tr>
													<tr>
														<td>8</td>
														<td>SP</td>
														<td></td>
														<td><?php echo $sp;
														?></td>
														<td><?php echo number_format(floatval($price_history[8]['harga'] ?? $price[8]['harga'])) ?></td>
														<td> <?php echo number_format($sp * floatval($price_history[8]['harga'] ?? $price[8]['harga']), 2); ?></td>
													</tr>
													<tr>
														<td>9</td>
														<td>CL</td>
														<td></td>
														<td><?php echo $cl
														?></td>
														<td><?php echo number_format(floatval($price_history[10]['harga'] ?? $price[10]['harga'])) ?></td>
														<td> <?php echo number_format($total_cl); ?></td>
													</tr>
													<tr>
														<td>10</td>
														<td>CLF</td>
														<td></td>
														<td><?php echo $clf
														?></td>
														<td><?php echo number_format(floatval($price_history[11]['harga'] ?? $price[11]['harga'])) ?></td>
														<td> <?php echo number_format($total_clf); ?></td>
													</tr>
													<tr>
														<td>11</td>
														<td>MH</td>
														<td></td>
														<td><?php echo
														$mh;
														
														?></td>
														<td><?php echo number_format(floatval($price_history[12]['harga'] ?? $price[12]['harga'])) ?></td>
														<td> <?php echo number_format($total_mh); ?></td>
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
														+  $xlp
														+ $jk
														+ $jb
														+ $sph
														+ $clf
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
												<div class="">No Nota :  <?php echo $ss['no_nota'] ?> </div>
												<div class="">Tanggal : <?php echo $ss['tanggal_rec'] ?></div>
											</div>
											<table class="responsive table table-bordered">
												<thead>
													<tr>
														<td>No.</td>
														<td width="20%">Jenis Bag.</td>
														<td width="20%">Keterangan</td>
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
														<td><?php echo number_format(floatval($price_history[14]['harga'] ?? $price[14]['harga'])) ?></td>
														<td><?php echo number_format($total_phrx * floatval($price_history[14]['harga'] ?? $price[14]['harga'])) ?></td>
													</tr>
													<tr>
														<td>2</td>
														<td>MHR</td>
														<td></td>
														<td><?php echo $total_mhrx; ?></td>
														<td><?php echo number_format(floatval($price_history[13]['harga'] ?? $price[13]['harga'])) ?></td>
														<td><?php echo number_format( $total_mhrx * ($price_history[13]['harga'] ?? $price[13]['harga']) )?></td>
													</tr>
													<tr>
														<td>3</td>
														<td>Shell</td>
														<td></td>
														<td><?php echo (floatval($ss['shell'])); ?></td>
														<td><?php echo floatval($price_history[24]['harga'] ?? $price[24]['harga']) ?></td>
														<td> <?php echo (floatval($ss['shell'])) * floatval($price_history[24]['harga'] ?? $price[24]['harga']); ?></td>
													</tr>
													<tr>
														<td colspan="3">Jumlah</td>
														<td><?php echo $total_phrx + $total_mhrx ?></td>
														<td></td>
														<td><?php echo number_format(($total_phrx * floatval($price_history[14]['harga'] ?? $price[14]['harga'])) + ($total_mhrx * floatval($price_history[13]['harga'] ?? $price[13]['harga']))); ?></td>
													</tr>
												</tbody>
											</table>
											<div class="my-2">
												<h3>Form Bukti Pengeluaran</h3>
												<div class="">Kode Supplier : <?php echo $ss['kode_supplier'] ?></div>
												<div class="">No Nota : <?php echo $ss['no_nota'] ?> </div>
												<div class="">Tanggal : <?php echo $ss['tanggal_rec'] ?></div>
											</div>
											<table class="responsive table table-bordered">
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
															$tot = $col + $mh + $cl + $clf + $sp + $spk + $bf +  $xlp + $jk + $jb;
															echo $tot; ?>
														</td>
														<td><?php echo number_format($ss['subsidi']) ?></td>
														<td><?php echo number_format($tot * $ss['subsidi']) ?></td>
													</tr>
													<tr>
														<td>2</td>
														<td>Tambahan</td>
														<td></td>
														<td><?php echo $ss['tambahan'] ?></td>
														<td></td>
													</tr>
													<tr>
														<td>3</td>
														<td>Potongan</td>
														<td></td>
														<td></td>
														<td>
														<?php
															$supplier_data = $this->db->where('kode_supplier', $ss['kode_supplier'])->get('tbl_supplier')->row_array();
															if($supplier_data && $supplier_data['npwp']) {
																$total_potongan = round(
																	$grand_total
																	+ ($total_phrx * floatval($price_history[14]['harga'] ?? $price[14]['harga'])) + ($total_mhrx * floatval($price_history[13]['harga'] ?? $price[13]['harga'])) + (floatval($ss['shell'])) * floatval($price_history[24]['harga'] ?? $price[24]['harga'])
																	+ ($tot * $ss['subsidi'] ?? 0)
																) * 0.0025; // dengan NPWP
															} else $total_potongan = 0; // tanpa NPWP
															echo number_format($total_potongan); ?>
														</td>
														<?php ; ?>
													</tr>
													<tr>
														<td colspan="4">Jumlah</td>
														<td><?php echo 
														number_format( (
															floatval($ss['tambahan'])
															- ( $tot * $ss['subsidi'] )
															- $total_potongan
														))  ?></td>
													</tr>
												</tbody>
											</table>
									</div>

									<div class="modal-footer">
										<button class="btn btn-primary" onclick="printDisiniDataFresh(<?php echo $ss['id'] ?>)">Print</button>
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									</div>

								</div>
								</div>
							</div>
							
							<!-- Modal -->
							<div class="modal fade" id="modelIdX-<?php echo $ss['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<form action="<?php echo base_url('main/input_tambahan/'.$ss['ids']); ?>" method="post">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title">Detail Tambahan</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											
											<div class="">
												<label for="">Tambahan</label>
												<input type="text" name="tambahan_new" class="form-control mb-1" placeholder="Tambahan">
											</div>
											<div class="">
												<label for="">No Nota</label>
												<input type="text" name="no_nota" class="form-control mb-1" placeholder="No Nota">
											</div>
											<div class="">
												<label for="">Potongan </label>
												<input type="text" name="dp" class="form-control mb-1" id="dengan-rupiah_satu" placeholder="Potongan DP">
											</div>
											<div class="">
												<label for="">Pinjaman</label>
												<input type="text" name="pinjaman" class="form-control mb-1" id="dengan-rupiah_dua" placeholder="Pinjaman">
											</div>
											<div class="">
												<label for="">Faktur</label>
												<input type="text" name="faktur" class="form-control mb-1" placeholder="Faktur">
											</div>
											
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											<button type="submit" class="btn btn-primary">Simpan</button>
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
<script type="text/javascript">

     /* Tanpa Rupiah */
   
    
    /* Dengan Rupiah */
    var dengan_rupiah = document.getElementById('dengan-rupiah');
    dengan_rupiah.addEventListener('keyup', function(e)
    {
        dengan_rupiah.value = formatRupiah(this.value, 'Rp. ');
    });
    var dengan_rupiah_satu = document.getElementById('dengan-rupiah_satu');
    dengan_rupiah_satu.addEventListener('keyup', function(e)
    {
        dengan_rupiah_satu.value = formatRupiah(this.value, 'Rp. ');
    });
    var dengan_rupiah_dua = document.getElementById('dengan-rupiah_dua');
    dengan_rupiah_dua.addEventListener('keyup', function(e)
    {
        dengan_rupiah_dua.value = formatRupiah(this.value, 'Rp. ');
    });
    var dengan_rupiah_tiga = document.getElementById('dengan-rupiah_tiga');
    dengan_rupiah_tiga.addEventListener('keyup', function(e)
    {
        dengan_rupiah_tiga.value = formatRupiah(this.value, 'Rp. ');
    });
    /* Fungsi */
    function formatRupiah(angka, prefix)
    {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split    = number_string.split(','),
            sisa     = split[0].length % 3,
            rupiah     = split[0].substr(0, sisa),
            ribuan     = split[0].substr(sisa).match(/\d{3}/gi);
            
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }
        
        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
</script>
