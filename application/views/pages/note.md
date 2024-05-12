<<<<<<< HEAD
<button type="button" class="btn btn-primary btn-sm my-4" data-toggle="modal" data-target="#modelIdx">
		  Lihat Laporan
		</button>
		
		<!-- Modal -->
		<div class="modal fade" id="modelIdx" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
			<div class="modal-dialog modal-xl modal-fullscreen" role="document">
				<div class="modal-content ">
					<div class="modal-header">
						<h5 class="modal-title">Laporan Root</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
					</div>
					<div class="modal-body">
					<table class="responsive table table-bordered table-responsive" id="myTablePrintAble">
					<thead class="text-center">
					<tr>
					<th style="width: 40px;" rowspan="2">NO.</th>
					<th style="width: 40px;" rowspan="2">KD</th>
					<th style="width: auto;" rowspan="2">SUPPLIER</th>
					<th style="width: 60px;" rowspan="2">FRESH</th>
					<th style="width: 80px;" rowspan="2">PHR / MHR</th>
					<th style="width: 60px;" rowspan="2">TOTAL</th>
					<th style="width: 60px;" rowspan="2">LOSS</th>
					<th style="width: 80px;" rowspan="2">QTTY BB</th>
					<th style="width: 80px;" rowspan="2">TOTAL NOTA</th>
					<th style="width: 120px;" rowspan="2">ROOT SBLM SUBSIDI</th>
					<th style="width: 100px;" rowspan="2">SUBSIDI NORMAL</th>
					<th style="width: 140px;" rowspan="2">TOTAL SUBSIDI NORMAL</th>
					<th style="width: 180px;" rowspan="2">TOTAL NOTA + SUBSIDI NORMAL</th>
					<th style="width: 160px;" rowspan="2">ROOT STLH SUBSIDI NORMAL</th>
					<th colspan="3" style="width: 360px;">SUBSIDI DIBAYAR</th>
					<th style="width: 80px;" rowspan="2">CAP/SHELL</th>
					<th style="width: 160px;" rowspan="2">TOTAL SUBSIDI DIBAYAR</th>
					<th style="width: 200px;" rowspan="2">TOTAL NOTA + SUBSIDI DIBAYAR</th>
					<th style="width: 180px;" rowspan="2">ROOT STLH SUBSIDI DIBAYAR</th>
					<th style="width: 100px;" rowspan="2">SUBSIDI TRANS</th>
					<th style="width: 160px;" rowspan="2">TOTAL SUBSIDI TRANS</th>
					<th style="width: 100px;" rowspan="2">UNTUNG / RUGI</th>
					<th style="width: 140px;" rowspan="2">ROOT RECEIVING</th>
					<th style="width: 140px;" rowspan="2"> %JB </th>
					<tr>
					<th style="width: 120px;" rowspan="1">awal</th>
					<th style="width: 120px;" rowspan="1">-/+</th>
					<th style="width: 120px;" rowspan="1">total</th>
					</tr>
				</thead>
				<tbody>
						<?php 
						$nos = 1;
						$sum_total_nota = 0;
						$sum_total_subsidi_normal = 0;
						$sum_root_sblm_subsidi = 0;
						$sum_total_normal_plus_subsidi = 0;
						$sum_total_subsidi_trans = 0;
						$sum_total_total_subsidi_trans = 0;
						$sum_subsidi_dibayar = 0;
						$sum_capshell = 0;
						$sum_subsidi_normal = 0;
						$sum_total_nota_plus_subsidi_dibayar = 0;
						$sum_root_stlh_subsidi = 0;
						$sum_subsidi_1 = 0;
						$sum_subsidi_2 = 0;
						$root_stlh_subsidi = 0;
						$sum_untung_rugi = 0;
						$sum_root_rec = 0;
						foreach ($datax as $da) : 

						
						$sum_subsidi_1 += $da['subsidi_dibayar_1'];
						$sum_subsidi_2 += $da['subsidi_dibayar_2'];
						$root_stlh_subsidi += $da['fresh'] ? ($da['subsidi_dibayar_2'] + $da['subsidi_dibayar_1']) * $da['fresh'] / $da['fresh'] : 0 ;

						$col = $da['sum_col'] * floatval($price[0]['harga']);
						$jb = $da['sum_jb'] * floatval($price[1]['harga']);
						$jk = $da['sum_jk'] * floatval($price[2]['harga']);
						$bf = $da['sum_bf'] * floatval($price[6]['harga']);
						$spk = $da['sum_spk'] * floatval($price[7]['harga']);
						$sp = $da['sum_sp'] * floatval($price[8]['harga']);
						$mh = $da['sum_mh'] * floatval($price[12]['harga']);
						$cl = floatval($da['sp_cl']) * floatval($price[10]['harga']);
						$clf = floatval($da['sp_clf']) * floatval($price[11]['harga']);
						$total_nota = $col+ $jb+ $jk+ $bf+ $spk+ $sp+ $mh+ $cl+ $clf;
						
						$sum_subsidi_dibayar += $da['subsidi_dibayar_2'] + $da['subsidi_dibayar_1'];
						$sum_total_normal_plus_subsidi +=  $total_nota + $da['subsidi_normal'];
						$sum_total_subsidi_normal += $da['subsidi_normal'] * $da['fresh'] ?? 0;
						$sum_total_subsidi_trans += $da['subsidi_transport'];
						$sum_total_total_subsidi_trans += $da['subsidi_transport'] * $da['total'];
						$sum_capshell += $da['cap_shell'];
						$sum_total_nota_plus_subsidi_dibayar += ($da['subsidi_dibayar_2'] + $da['subsidi_dibayar_1']) * $da['fresh'] + $total_nota;
						$sum_root_sblm_subsidi += $da['fresh'] ? ($total_nota / $da['fresh']) : 0;
						$sum_subsidi_normal += $da['subsidi_normal'];
						$sum_root_stlh_subsidi += $da['fresh'] ? ($total_nota + $da['subsidi_normal']) / $da['fresh'] : 0;


						$a = $total_nota + $da['subsidi_normal'];
						$b = $da['cap_shell'];
						$c = $total_nota + ($da['subsidi_dibayar_1'] + $da['subsidi_dibayar_2']) + $b;
						
						$sum_untung_rugi += $c - $a;
						$sum_root_rec += $total_nota / $da['qty'];
						?>
						<tr>
							<td><?php echo $nos++ ?></td>
							<td><?php echo $da['kode_supplier'] ?></td>
							<td><?php echo $da['nama_supplier'] ?></td>
							<td id="fresh"><?php echo $da['fresh'] ? number_format($da['fresh'],2 ) : 0; 
							?></td>
							<td id="mhr">
							<?php echo $da['phrmhr'];
							?>
							</td>
							<td id="total"><?php echo $da['total'] ? number_format($da['total'],2) : 0; 
							?></td>
							<td id="loss"><?php echo $da['sum_loss'] ? number_format($da['sum_loss'],2 ) : 0;
							?>
							</td>
							<td id="qty_bb">
								<?php echo $da['qty'] ?>
							</td>
							<td id="total_nota">
								<?php 
								$sum_total_nota += $total_nota;
								echo number_format($total_nota,2);
								
								?>
							</td>
							<td id="root_sebelum_subsidi"><?php echo $da['fresh'] ? number_format($root_sebelum_subsidi = ($total_nota / $da['fresh']),2) : 0 ?> </td>
							<!-- Manual -->
							<td class="subsidi_normal"><?php echo $da['subsidi_normal'] ? number_format($subsidi_normal = $da['subsidi_normal'] ?? 0,2) : 0  ?> </td>
							<td class="sum_subsidi_normal"><?php echo number_format($total_subsidi_normal = $subsidi_normal * $da['fresh'],2 ) ?></td>
							<td class="sum_total_plus_subsidi"><?php echo number_format($total_nota_pls_subsidi_normal = $total_nota + $da['subsidi_normal'],2 ) ?></td>
							<td><?php echo  $root_setelah_subsidi_pls_nota = $da['fresh'] ? number_format(($total_nota + $da['subsidi_normal']) / $da['fresh'],2) : 0 ?></td>
							<!-- Manual -->
							<td><?php echo $subsidi_bayar_1 = number_format($da['subsidi_dibayar_1'] ?? 0,2) ?></td>
							<!-- Manual -->
							<td><?php echo $subsidi_bayar_2 = number_format($da['subsidi_dibayar_2'] ?? 0,2) ?></td>
							<td class="total_subsidi"><?php echo number_format($subsidi_bayar_3 = ($da['subsidi_dibayar_1'] + $da['subsidi_dibayar_2']) ,2 ) ?></td>
							<td><?php echo $capshell = number_format($da['cap_shell'] ?? 0,2) ?></td>
							<td class="total_subsidi_dibayar"><?php echo $total_subsidi_dibayar = number_format(($da['subsidi_dibayar_1'] + $da['subsidi_dibayar_2']) * $da['fresh'],2) ?></td>
							<td class="total_subsidi2"><?php echo number_format((($da['subsidi_dibayar_1'] + $da['subsidi_dibayar_2']) * $da['fresh'] )+ $total_nota,2) ?></td>
							<td class="total_subsidi3"><?php echo $root_setelah_subsidi =  $da['fresh'] ? number_format(($da['subsidi_dibayar_1'] + $da['subsidi_dibayar_2']) * $da['fresh'] / $da['fresh'],2 ) : 0 ?></td>
							<!-- Manual -->
							<td class="subsidi_trans"><?php echo $subsidi_trans = number_format($da['subsidi_transport'] ?? 0,2) ?></td>
							<td class="total_subsidi_trans"><?php echo number_format($total_subsidi_trans = $da['subsidi_transport'] * $da['total'],2) ?></td>
							<td class="">
							<?php
							$a = $total_nota + $da['subsidi_normal'];
							$b = $da['cap_shell'];
							$c = $total_nota + ($da['subsidi_dibayar_1'] + $da['subsidi_dibayar_2']) + $b;
							echo number_format($c - $a,2);
							?></td>
							<td>
							<?php
								echo number_format($total_nota / $da['qty'], 2);
							?>
						</td>
						<td>10%</td>
						<!-- <td><?php echo $da['fresh'] ? ($jbpersen / $da['fresh']) : 0 ?> %</td> -->
						</tr>
						<?php endforeach; ?>
					</tbody>
							<?php 
									$total = $this->db->query("select
									sum(fresh) as total_fresh,
									sum(phrmhr) as total_phrmhr,
									sum(sum_loss) as total_loss,
									sum(subsidi_normal) as total_subsidi_normal,
									sum(subsidi_transport) as total_subsidi_transport,
									sum(total_subsidi) as total_subsidi,
									sum(total) as total_semua,
									sum(qty) as total_qty,
									sum(cap_shell) as total_capshell
									from
									(
									select
										*,
										(fresh + phrmhr) as total,
										(
										select
											sum(qty)
										from
											tbl_sub_daging x
										where
											x.id_bahan_baku = b.id_bahan_baku
									) as qty
									from
										(
										select
											(sum_col + sum_jb + sum_jk + sum_bf + xlp + sum_spk + sum_sp + sum_mh + sp_clf + sp_cl + sp_sph) as fresh,
											(sum_basi_receiving + sum_basi_sortir + basi_mhr) as phrmhr,
											(air + loss + shell ) as sum_loss,
											subsidi_normal,
											subsidi_transport,
											(subsidi_normal + subsidi_dibayar_2 - subsidi_dibayar_3 ) as total_subsidi,
											id_bahan_baku,
											cap_shell
										from
											(
											select
												a.id as id_bahan_baku,
												c.id as id_laporan,
												b.tanggal_rec as tanggal,
												d.*,
												(b.col + bf) as sum_col,
												(b.jb + b.jb_bf) as sum_jb,
												(b.jbb_jk + b.jbb_bf) as sum_jk,
												(b.bf_k3_col + b.bf_k3_jb + b.bf_k3_jl + b.bf_k3_jk + b.bf_kj + b.bf_bf + b.bf_sp + b.bf_lp_slb) as sum_bf,
												b.xlp,
												(b.bf_spk_xlp + b.bf_spk_sp) as sum_spk,
												(b.spk_sp_jb + b.spk_sp_xlp + b.spk_sp_bfp + b.spk_sp) as sum_sp,
												b.sp_sph,
												(b.basi_col + b.basi_jk + b.basi_xlp + b.basi_bf + b.basi_sp) as sum_basi_receiving,
												(b.basi_col2 + b.basi_jb2 + b.basi_jk2 + b.basi_xlp2 + b.basi_bf2 + b.basi_sp2) as sum_basi_sortir,
												(b.basi_cl + b.basi_mh) as basi_mhr,
												(b.mh + b.mh_slb) as sum_mh,
												b.sp_cl,
												b.sp_clf,
												b.air,
												b.loss,
												b.shell,
												c.*
											from
												tbl_daging a
											left join tbl_sortir b on
												a.id = b.id_bb
											left join tbl_laporan c on
												c.id_sortir = b.id
											left join (
												select
													kode_supplier,
													nama_supplier
												from
													tbl_supplier) d on
												d.kode_supplier = a.supplier
											order by
												b.tanggal_rec desc
									) a
								) b ) c")->row_array();
							?>
					<tfoot>
						<tr>
							<td colspan="10"></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td colspan="">Total All</td>
							<td id="hasil_total_fresh">
								<?php 
								echo number_format($total['total_fresh'],2);
								?>
							</td>
							<td id="hasil_total_phr_mhr">
							<?php 
								echo $total['total_phrmhr']
								?>
							</td>
							<td id="hasil_total_total">
							<?php 
								echo number_format($total['total_semua'],2);
								?>
							</td>
							<td id="hasil_total_qty"><?php echo $total['total_loss'] ?></td>
							<td id="hasil_total_nota"><?php echo $total['total_qty'] ?></td>
							<td><?php echo number_format($sum_total_nota,2) ?></td>
							<td><?php echo number_format($sum_root_sblm_subsidi,2) ?></td>
							<td><?php echo number_format($sum_subsidi_normal,2) ?></td>
							<td><?php echo number_format($sum_total_subsidi_normal,2) ?></td>
							<td colspan="" id=""><?php echo number_format($sum_total_normal_plus_subsidi,2) ?></td>
							<td><?php echo number_format($sum_root_stlh_subsidi,2) ?></td>
							<td><?php echo number_format($sum_subsidi_1,2) ?></td>
							<td><?php echo number_format($sum_subsidi_2,2) ?></td>
							<td colspan="" id=""><?php echo number_format($sum_subsidi_dibayar,2) ?></td>
							<td id=""><?php echo number_format($sum_capshell,2) ?></td>
							<td id=""><?php echo number_format($sum_total_normal_plus_subsidi,2) ?></td>
							<td id=""><?php echo number_format($sum_total_nota_plus_subsidi_dibayar,2) ?></td>
							<td id=""><?php echo number_format($root_stlh_subsidi,2) ?></td>
							<td id=""><?php echo number_format($sum_total_subsidi_trans,2) ?></td>
							<td id=""><?php echo number_format($sum_total_total_subsidi_trans,2) ?></td>
							<td id=""><?php echo number_format($sum_untung_rugi,2) ?></td>
							<td id=""><?php echo number_format($sum_root_rec,2) ?></td>
							<td id=""></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<!-- <td><?php echo number_format($sum_total_nota,2) ?></td> -->
							<!-- <td>Subsidi Harian</td> -->
							<td></td>
							<td colspan="2">Subsidi Harian</td>
							<td><?php echo number_format($sum_total_subsidi_normal,2) ?></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td><?php echo number_format($sum_subsidi_dibayar,2) ?></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td id=""><?php 
							$x = $sum_total_total_subsidi_trans + $sum_subsidi_dibayar / $total['total_fresh'];
							echo number_format($x,2) ?></td>
							<td></td>
							<td id=""><?php echo number_format($x - $sum_total_subsidi_normal,2)?></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td colspan="">Cap + Shell</td>
							<td id="hasil_total_fresh">
								<?php 
								echo number_format($total['total_fresh'],2)
								?>
							</td>
							<td id="hasil_total_phr_mhr">
							<?php 
								echo number_format($total['total_phrmhr'],2)
								?>
							</td>
							<td id="hasil_total_total">
							<?php 
								echo number_format($total['total_semua'],2);
								?>
							</td>
							<td id="hasil_total_qty"><?php echo $total['total_loss'] ?></td>
							<td id="hasil_total_nota"><?php echo $total['total_qty'] ?></td>
							<td><?php echo number_format($sum_total_nota,2) ?></td>
							<td><?php echo number_format($sum_root_sblm_subsidi,2) ?></td>
							<td><?php echo number_format($sum_subsidi_normal,2) ?></td>
							<td><?php echo number_format($sum_total_subsidi_normal,2) ?></td>
							<td colspan="" id=""><?php echo number_format($sum_total_normal_plus_subsidi,2) ?></td>
							<td><?php echo number_format($sum_root_stlh_subsidi,2) ?></td>
							<td><?php echo number_format($sum_subsidi_1,2) ?></td>
							<td><?php echo number_format($sum_subsidi_2,2) ?></td>
							<td colspan="" id=""><?php echo number_format($sum_subsidi_dibayar,2) ?></td>
							<td id=""><?php echo number_format($sum_capshell,2) ?></td>
							<td id=""><?php echo number_format($sum_total_normal_plus_subsidi,2) ?></td>
							<td id=""><?php echo number_format($sum_total_nota_plus_subsidi_dibayar,2) ?></td>
							<td id=""><?php echo number_format($root_stlh_subsidi,2) ?></td>
							<td id=""><?php echo number_format($sum_total_subsidi_trans,2) ?></td>
							<td id=""><?php echo number_format($sum_total_total_subsidi_trans,2) ?></td>
							<td id=""><?php echo number_format($sum_untung_rugi,2) ?></td>
							<td id=""><?php echo number_format($sum_root_rec,2) ?></td>
							<td id=""></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<!-- <td><?php echo number_format($sum_total_nota,2) ?></td> -->
							<!-- <td>Subsidi Harian</td> -->
							<td></td>
							<td colspan="2">Subsidi Harian + Cap + Shell</td>
							<td><?php echo number_format($sum_total_subsidi_normal,2) ?></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td><?php echo number_format($sum_subsidi_dibayar,2) ?></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td><?php
							$x = $sum_total_total_subsidi_trans + $sum_subsidi_dibayar / $total['total_fresh'];
							echo number_format($x, 2) ?></td>
							<td></td>
							<td><?php echo number_format(($sum_total_subsidi_trans - $sum_subsidi_dibayar),2 ) ?></td>
							<td></td>
							<td></td>
						</tr>
						</tfoot>
					</table>
					
				</div>
					<div class="modal-footer">
						<!-- <a href="<?php echo base_url('main/approve_laporan/'.$id_bb) ?>" class="btn btn-primary">Approve</a> -->
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="button" onclick="exportToExcel()" class="btn btn-primary">Print</button>
					</div>
				</div>
			</div>
		</div>
=======
<?php 
									if($ss['id_bb']){
										$data2 = $this->db->query('select * from tbl_sortir where id_bb ='.$ss['id_bb'].' and is_corection = 1')->row_array();
									}  else {
										$data2 = false;
									}
									?>
									<?php if($data2 && $data2['is_corection'] == 1 ) { ?>
										<button
										type="button"
										class="btn btn-light mx-1"
										data-toggle="modal"
										data-target="<?php echo '#modelId'.$data2['id_bb'].'is-corectoion' ?>">
										<i class="fa fa-eye" aria-hidden="true"></i>
										Detail Sortir Koreksi
										</button>
										<div
										class="modal fade"
										id="<?php echo 'modelId'.$data2['id_bb'].'is-corectoion' ?>"
										tabindex="-1"
										role="dialog"
										aria-labelledby="modelTitleId"
										aria-hidden="true">
										<div class="modal-dialog modal-xl modal-fullscreen" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<h4 class="modal-title">Form Hasil Sortir</h4>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
											</div>
											<div class="modal-body" id="modal-print-<?php echo $data2['id'] ?>">
											<div class="row justify-content-between">
													<div class="col-md-3">
														<div class="d-flex justify-content-between border px-2">
															<div class="">Supplier</div>
															<div class="">
																<?php echo $ss['supplier']; ?>
															</div>
														</div>
														<div class="d-flex justify-content-between  border px-2">
															<div class="">TGL SJ</div>
															<div class="">
																<?php echo $data2['tanggal_sj']; ?>
															</div>
														</div>
														<div class="d-flex justify-content-between  border px-2">
															<div class="">TGL Rec</div>
															<div class="">
																<?php echo $data2['tanggal_rec']; ?>
															</div>
														</div>
													</div>
													<div class="col-md-3">
														<p style="text-align: center;">SD.100.3001 / <?php echo $data2['id'] ?></p>
													
													</div>
													<div class="col-md-3">
														<!-- <form action="<?php echo
														base_url('main/updateMiniSortir/'.$data2['id_sortir']) ?>" method="post"> -->

														<div class="d-flex justify-content-between  border px-2">
															<div class="">Cap</div>
															<div class="">
																<?php echo $data2['cap'] ?>
															</div>
														</div>
														<div class="d-flex justify-content-between  border px-2">
															<div class="mt-2">Potong</div>
															<div class="ml-2 py-2">
																<?php echo $data2['potong'] ?>
															</div>
														</div>
													</div>
													<div class="col-md-3">
														<!-- <form action="<?php echo
														base_url('main/updateMiniSortir/'.$data2['id_sortir']) ?>" method="post"> -->

														<div class="d-flex justify-content-between  border px-2">
															<div class="">SHELL</div>
															<div class="">PHR</div>
															<div class="">MHR</div>
														
														</div>
														<div class="d-flex justify-content-between  border px-2">
														<div class="">KERAS</div>
															<div class=""><?php echo $data2['shell_phr_keras'] ?></div>
															<div class=""><?php echo $data2['shell_mhr_keras'] ?></div>
														</div>
														<div class="d-flex justify-content-between  border px-2">
															<div class="">HALUS</div>
															<div class=""><?php echo $data2['shell_phr_halus'] ?></div>
															<div class=""><?php echo $data2['shell_mhr_halus'] ?></div>
														</div>
														<div class="d-flex justify-content-between  border px-2">
														<div class="">TOTAL</div>
															<div class=""><?php echo floatval($data2['shell_phr_keras']) + floatval($data2['shell_phr_halus']) ?></div>
															<div class=""><?php echo floatval($data2['shell_mhr_keras']) + floatval($data2['shell_mhr_halus']) ?></div>
														</div>
													</div>
												
												</form>
												<style>
													.tbl-spesial {
														border-collapse: collapse;
													}

													.tbl-spesial td,
													.tbl-spesial th {
														border: 2px solid #dee2e6;
														font-size: 14px;
														padding: 5px;
													}

													.tbl-spesial th {
														background-color: #f2f2f2;
													}
												</style>
												<div class="col-md-12">
													<table class="responsive table table-bordered mt-4 tbl-spesial">
														<thead class="text-center tbl-spesial">
															<tr>
																<th colspan="2" rowspan="2">Spec</th>
																<th colspan="3">Tanggal Sortir</th>
																<th colspan="2" rowspan="2">Total</th>
																<th colspan="2" rowspan="2">Spec</th>
																<th>Tanggal Rec</th>
																<th colspan="3">Tanggal Sortir</th>
																<th>Total</th>
															</tr>
															<tr>
																<th colspan=""><?php echo $data2['tanggal_rec'] ?></th>
																<th colspan=""><?php echo $data2['tanggal_rec2'] == '0000-00-00' ? '' : $data2['tanggal_rec2'] ?></th>
																<th colspan=""><?php echo $data2['tanggal_rec3']  == '0000-00-00' ? '' : $data2['tanggal_rec3'] ?></th>
																<th colspan="" width="10%"><?php echo $data2['tanggal_rec'] ?></th>
																<th colspan="" width="10%"><?php echo $data2['tanggal_rec2'] == '0000-00-00' ? '' : $data2['tanggal_rec3'] ?></th>
																<th colspan=""><?php echo $data2['tanggal_rec3']  == '0000-00-00' ? '' : $data2['tanggal_rec3'] ?></th>
																<th colspan="" width="10%"></th>
																<th colspan=""></th>
															</tr>
														</thead>
														<tbody>
															<!-- COL -->
															<tr>
																<td rowspan="2">COL</td>
																<td>COL</td>
																<td width="10%"><?php echo $data2['col'] ?></td>
																<td width="10%"></td>
																<td width="10%"></td>
																<td width="10%" colspan="2"></td>
																<td colspan="8" class="text-center">
																	<strong>
																		Receiving
																	</strong>
																</td>
															</tr>
															<tr>
																<td>BF</td>
																<td width="10%"><?php echo $data2['bf'] ?></td>
																<td width="10%"></td>
																<td width="10%"></td>
																<td width="10%" colspan="2"></td>
																<td colspan="2">PHR</td>
																<td><?php echo $data2['phr'] ?></td>
																<td class="bg-light" style="background-color: gray"></td>
																<td class="bg-light" style="background-color: gray"></td>
																<td class="bg-light" style="background-color: gray"></td>
																<td></td>
															</tr>
															<tr>
																<td colspan="2">Total COL</td>
																<td>
																<?php $sum = floatval($data2['col']) + floatval($data2['bf']);
																		if($sum > 0) {
																			echo $sum;
																		} else {
																			echo '';
																		} ?>
																</td>
																<td></td>
																<td></td>
																<td colspan="2"></td>
																<td rowspan="5">BASI</td>
																<td>COL</td>
																<td><?php echo $data2['basi_col'] ?></td>
																<td class="bg-light" style="background-color: gray"></td>
																<td class="bg-light" style="background-color: gray"></td>
																<td class="bg-light" style="background-color: gray"></td>
																<td></td>
															</tr>

															<!-- JB -->
															<tr>
																<td rowspan="2">JB</td>
																<td>JB</td>
																<td><?php echo $data2['jb'] ?></td>
																<td></td>
																<td></td>
																<td colspan="2"></td>
																<td>JK</td>
																<td><?php echo $data2['basi_jk'] ?></td>
																<td class="bg-light" style="background-color: gray"></td>
																<td class="bg-light" style="background-color: gray"></td>
																<td class="bg-light" style="background-color: gray"></td>
																<td></td>
															</tr>
															<tr>
																<td>BF</td>
																<td><?php echo $data2['jb_bf'] ?></td>
																<td></td>
																<td></td>
																<td colspan="2"></td>
																<td>XLP</td>
																<td><?php echo $data2['basi_xlp'] ?></td>
																<td class="bg-light" style="background-color: gray"></td>
																<td class="bg-light" style="background-color: gray"></td>
																<td class="bg-light" style="background-color: gray"></td>
																<td></td>
															</tr>
															<tr>
																<td colspan="2">Total JB</td>
																<td>
																<?php $sum = floatval($data2['jb_bf']) + floatval($data2['jb']);
																		if($sum > 0) {
																			echo $sum;
																		} else {
																			echo '';
																		} ?>
																</td>
																<td></td>
																<td></td>
																<td colspan="2"></td>
																<td>BF</td>
																<td><?php echo $data2['basi_bf'] ?></td>
																<td class="bg-light" style="background-color: gray"></td>
																<td class="bg-light" style="background-color: gray"></td>
																<td class="bg-light" style="background-color: gray"></td>
																<td></td>
															</tr>
															<!-- JK -->
															<tr>
																<td rowspan="2">JK</td>
																<td>JK</td>
																<td><?php echo $data2['jbb_jk'] ?></td>
																<td></td>
																<td></td>
																<td colspan="2"></td>
																<td>SP</td>
																<td><?php echo $data2['basi_sp'] ?></td>
																<td class="bg-light" style="background-color: gray"></td>
																<td class="bg-light" style="background-color: gray"></td>
																<td class="bg-light" style="background-color: gray"></td>
																<td></td>
															</tr>
															<tr>
																<td>BF</td>
																<td><?php echo $data2['jbb_jf'] ?></td>
																<td></td>
																<td></td>
																<td colspan="2"></td>
																<td colspan="2">Total PHR</td>
																<td>
																<?php $sum = floatval($data2['basi_sp']) + floatval($data2['basi_bf']) +  floatval($data2['basi_xlp']) + floatval($data2['basi_jk']) + floatval($data2['basi_col']);
																		if($sum > 0) {
																			echo $sum;
																		} else {
																			echo '';
																		} ?>
																</td>
																<td class="bg-light" style="background-color: gray"></td>
																<td class="bg-light" style="background-color: gray"></td>
																<td class="bg-light" style="background-color: gray"></td>
																<td></td>
															</tr>
															<tr>
																<td colspan="2">Total JK</td>
																<td>
																<?php $sum = floatval($data2['jbb_jf']) + floatval($data2['jbb_jk']);
																		if($sum > 0) {
																			echo $sum;
																		} else {
																			echo '';
																		} ?>
																</td>
																<td></td>
																<td></td>
																<td colspan="2"></td>
																<td colspan="1">MHR</td>
																<td><?php echo $data2['mhr'] ?></td>
																<td></td>
																<td class="bg-light" style="background-color: gray"></td>
																<td class="bg-light" style="background-color: gray"></td>
																<td class="bg-light" style="background-color: gray"></td>
																<td></td>
															</tr>
															<!-- XLP -->
															<tr>
																<td colspan="2">XLP</td>
																<td><?php echo $data2['xlp'] ?></td>
																<td></td>
																<td></td>
																<td colspan="2"></td>
																<td colspan="1" rowspan="2">BASI</td>
																<td>CL</td>
																<td><?php echo $data2['basi_cl'] ?></td>
																<td class="bg-light" style="background-color: gray"></td>
																<td class="bg-light" style="background-color: gray"></td>
																<td class="bg-light" style="background-color: gray"></td>
																<td></td>
															</tr>
															<!-- BF K3 -->
															<tr>
																<td rowspan="8">BF</td>
																<td>K3 COL</td>
																<td><?php echo $data2['bf_k3_col'] ?></td>
																<td></td>
																<td></td>
																<td colspan="2"></td>
																<td>MH</td>
																<td><?php echo $data2['basi_mh'] ?></td>
																<td class="bg-light" style="background-color: gray"></td>
																<td class="bg-light" style="background-color: gray"></td>
																<td class="bg-light" style="background-color: gray"></td>
																<td></td>
															</tr>
															<tr>
																<td>K3 JB</td>
																<td><?php echo $data2['bf_k3_jb'] ?></td>
																<td></td>
																<td></td>
																<td colspan="2"></td>
																<td colspan="2">TOTAL MHR</td>
																<td>
																<?php $sum = floatval($data2['basi_mh']) + floatval($data2['basi_cl']);
																		if($sum > 0) {
																			echo $sum;
																		} else {
																			echo '';
																		} ?>
																</td>
																<td class="bg-light" style="background-color: gray"></td>
																<td class="bg-light" style="background-color: gray"></td>
																<td class="bg-light" style="background-color: gray"></td>
																<td></td>
															</tr>
															<tr>
																<td>K3 JK</td>
																<td><?php echo $data2['bf_k3_jk'] ?></td>
																<td></td>
																<td></td>
																<td colspan="2"></td>
																<td colspan="7" class="text-center">
																	<strong>
																		Sortir
																	</strong>
																</td>

															</tr>
															<tr>
																<td>JL</td>
																<td><?php echo $data2['bf_jl'] ?></td>
																<td></td>
																<td></td>
																<td colspan="2"></td>
																<td>PHR</td>
																<td><?php echo $data2['phr'] ?></td>
																<td class="bg-light" style="background-color: gray"></td>
																<td></td>
																<td></td>
																<td></td>
																<td></td>
															</tr>
															<tr>
																<td>KJ</td>
																<td><?php echo $data2['bf_kj'] ?></td>
																<td></td>
																<td></td>
																<td colspan="2"></td>
																<td colspan="1" rowspan="6">BASI</td>
																<td>COL</td>
																<td class="bg-light" style="background-color: gray"></td>
																<td><?php echo $data2['basi_col'] ?></td>
																<td></td>
																<td></td>
																<td></td>
															</tr>
															<tr>
																<td>BF</td>
																<td><?php echo $data2['bf_bf'] ?></td>
																<td></td>
																<td></td>
																<td colspan="2"></td>
																<td>JB</td>
																<td class="bg-light" style="background-color: gray"></td>
																<td><?php echo $data2['basi_jb'] ?></td>
																<td></td>
																<td></td>
																<td></td>
															</tr>
															<tr>
																<td>LP SLB</td>
																<td><?php echo $data2['bf_lp_slb'] ?></td>
																<td></td>
																<td></td>
																<td colspan="2"></td>
																<td>JK</td>
																<td class="bg-light" style="background-color: gray"></td>

																<td><?php echo $data2['basi_jk'] ?></td>
																<td></td>
																<td></td>
																<td></td>
															</tr>
															<tr>
																<td>SP</td>
																<td><?php echo $data2['bf_sp'] ?></td>
																<td></td>
																<td></td>
																<td colspan="2"></td>
																<td>XLP</td>
																<td class="bg-light" style="background-color: gray"></td>

																<td><?php echo $data2['basi_xlp'] ?></td>
																<td></td>
																<td></td>
																<td></td>
															</tr>
															<tr>
																<td colspan="2">Total BF</td>
																<td>
																<?php 
																		$sum = floatval($data2['bf_k3_col']) + floatval($data2['bf_k3_jb']) + floatval($data2['bf_k3_jl']) + floatval($data2['bf_k3_jk']) + floatval($data2['bf_bf']) + floatval($data2['bf_lp_slb']) + floatval($data2['bf_sp']);
																			if($sum > 0) {
																				echo $sum;
																			} else {
																				echo '';
																			}
																		?>
																</td>
																<td></td>
																<td></td>
																<td colspan="2"></td>
																<td>BF</td>
																<td class="bg-light" style="background-color: gray"></td>

																<td><?php echo $data2['basi_bf'] ?></td>
																<td></td>
																<td></td>
																<td></td>
															</tr>
															<!-- SPK -->
															<tr>
																<td rowspan="2">SPK</td>
																<td>XLP</td>
																<td><?php echo $data2['bf_spk_xlp'] ?></td>
																<td></td>
																<td></td>
																<td colspan="2"></td>
																<td>SP</td>
																<td class="bg-light" style="background-color: gray"></td>

																<td><?php echo $data2['basi_sp'] ?></td>
																<td></td>
																<td></td>
																<td></td>
															</tr>
															<tr>
																<td>SP</td>
																<td><?php echo $data2['bf_spk_sp'] ?></td>
																<td></td>
																<td></td>
																<td colspan="2"></td>
																<td colspan="2">Total PHR</td>
																<td class="bg-light" style="background-color: gray"></td>
																<td>
																<?php
																		$sum = floatval($data2['basi_sp']) + floatval($data2['basi_bf']) + floatval($data2['basi_jb']) + floatval($data2['basi_xlp']) + floatval($data2['basi_jk']) + floatval($data2['basi_col']);
																		if($sum > 0) {
																			echo $sum;
																		} else {
																			echo '';
																		}
																		?>
																</td>
																<td></td>
																<td></td>
																<td></td>
															</tr>
															<tr>
																<td colspan="2">Total SPK</td>
																<td>
																<?php $sum = floatval($data2['bf_spk_xlp']) + floatval($data2['bf_spk_sp']);
																		if($sum > 0) {
																			echo $sum;
																		} else {
																			echo '';
																		}
																		?>
																</td>
																<td></td>
																<td></td>
																<td colspan="2"></td>
																<td>MHR</td>
																<td><?php echo $data2['mhr'] ?></td>
																<td class="bg-light" style="background-color: gray"></td>
																<td></td>
																<td></td>
																<td></td>
															</tr>
															<!-- SP -->
															<tr>
																<td rowspan="4">SP</td>
																<td>JB</td>
																<td><?php echo $data2['spk_sp_jb'] ?></td>
																<td></td>
																<td></td>
																<td colspan="2"></td>
																<td colspan="1" rowspan="2">BASI</td>
																<td>CL</td>
																<td class="bg-light" style="background-color: gray"></td>

																<td><?php echo $data2['basi_cl'] ?></td>
																<td></td>
																<td></td>
																<td></td>
															</tr>
															<tr>
																<td>XLP</td>
																<td><?php echo $data2['spk_sp_xlp'] ?></td>
																<td></td>
																<td></td>
																<td colspan="2"></td>
																<td>MH</td>
																<td class="bg-light" style="background-color: gray"></td>

																<td><?php echo $data2['basi_mh'] ?></td>
																<td></td>
																<td></td>
																<td></td>
															</tr>
															<tr>
																<td>BF</td>
																<td><?php echo $data2['spk_sp_bfp'] ?></td>
																<td></td>
																<td></td>
																<td colspan="2"></td>
																<td colspan="2">Total MHR</td>
																<td class="bg-light" style="background-color: gray"></td>
																<td>
																<?php $sum = floatval($data2['basi_mh']) + floatval($data2['basi_cl']);
																		if($sum > 0) {
																			echo $sum;
																		} else {
																			echo '';
																		} ?>
																</td>

																<td></td>
																<td></td>
																<td></td>
															</tr>
															<tr>
																<td>SP</td>
																<td><?php echo $data2['spk_sp_sph'] ?></td>
																<td></td>
																<td></td>
																<td colspan="2"></td>
																<td></td>
																<td></td>
																<td></td>
																<td></td>
																<td></td>
																<td></td>
																<td></td>
															</tr>
															<tr>
																<td colspan="2">Total SP</td>
																<td>
																<?php $sum = floatval($data2['spk_sp_jb']) + floatval($data2['spk_sp_xlp']) + floatval($data2['spk_sp_bfp']) + floatval($data2['spk_sp_sph']);
																		if($sum > 0) {
																			echo $sum;
																		} else {
																			echo '';
																		}
																		?>
																</td>
																<td></td>
																<td></td>
																<td colspan="2"></td>
																<td></td>
																<td></td>
																<td></td>
																<td></td>
																<td></td>
																<td></td>
																<td></td>
															</tr>
															<tr>
																<td colspan="2">SPH</td>
																<td><?php echo $data2['spk_sp_sph'] ?></td>
																<td></td>
																<td></td>
																<td colspan="2"></td>
																<td></td>
																<td></td>
																<td></td>
																<td></td>
																<td></td>
																<td></td>
																<td></td>
															</tr>
															<tr>
																<td colspan="2">CL</td>
																<td><?php echo $data2['sp_cl'] ?></td>
																<td></td>
																<td></td>
																<td colspan="2"></td>
																<td>AIR</td>
																<td><?php echo $data2['air'] ?></td>
																<td></td>
																<td></td>
																<td></td>
																<td></td>
																<td></td>
															</tr>
															<tr>
																<td colspan="2">CLF</td>
																<td><?php echo $data2['sp_clf'] ?></td>
																<td></td>
																<td></td>
																<td colspan="2"></td>
																<td>SHELL</td>
																<td><?php echo $data2['shell'] ?></td>
																<td></td>
																<td></td>
																<td></td>
																<td></td>
																<td></td>

															</tr>
															<tr>
																<td rowspan="2">MH</td>
																<td>MH</td>
																<td><?php echo $data2['mh'] ?></td>
																<td></td>
																<td></td>
																<td colspan="2"></td>
																<td>LOSS</td>
																<td><?php echo $data2['loss'] ?></td>
																<td></td>
																<td></td>
																<td></td>
																<td></td>
																<td></td>
															</tr>
															<tr>
																<td>MH</td>
																<td><?php echo $data2['mh_slb'] ?></td>
																<td></td>
																<td></td>
																<td colspan="2"></td>
																<td colspan="2">Timb. Kotor</td>
																<td>
																<?php
																		$sum = floatval($data2['col']) + floatval($data2['bf']) + floatval($data2['jb']) + floatval($data2['jb_bf']) + floatval($data2['jbb_jk']) + floatval($data2['jbb_bf']) +
																		floatval($data2['xlp']) + floatval($data2['bf_k3_col']) + floatval($data2['bf_k3_jb']) + floatval($data2['bf_k3_jk']) + floatval($data2['bf_k3_jl']) +
																		floatval($data2['bf_jl']) + floatval($data2['bf_kj']) + floatval($data2['bf_bf']) + floatval($data2['bf_lp_slb']) + floatval($data2['bf_sp']) +
																		floatval($data2['bf_spk_xlp']) + floatval($data2['bf_spk_sp']) + floatval($data2['spk_sp_jb']) + floatval($data2['spk_sp_xlp']) +
																		floatval($data2['spk_sp_bfp']) + floatval($data2['spk_sp_sph']) + floatval($data2['sp_cl']) + floatval($data2['sp_clf']) + floatval($data2['mh']) +
																		floatval($data2['mh_slb']) + floatval($data2['phr']) + floatval($data2['basi_col']) + floatval($data2['basi_jb']) + floatval($data2['basi_jk']) +
																		floatval($data2['basi_xlp']) + floatval($data2['basi_bf']) + floatval($data2['basi_sp']) + floatval($data2['mhr']) + floatval($data2['basi_cl']) +
																		floatval($data2['basi_mh']) +
																		floatval($data2['timbangan_bb']) + floatval($data2['jbb_jf']) + floatval($data2['spk_sp']) + floatval($data2['sp_sph']);
																		if($sum > 0) {
																			echo $sum;
																		} else {
																			echo '';
																		}
																		?>
																</td>
																<td></td>
																<td></td>
																<td></td>
																<td></td>
															</tr>
															<tr>
																<td colspan="2">Total MH</td>
																<td>
																<?php $sum = floatval($data2['mh']) + floatval($data2['mh_slb']);
																		if($sum > 0) {
																			echo $sum;
																		} else {
																			echo '';
																		} ?>
																</td>
																<td></td>
																<td></td>
																<td colspan="2"></td>
																<td colspan="2">Timb. BB</td>
																<?php 
																$colX = (floatval($data2['col']) + floatval($data2['bf']));
																$jbX = (floatval($data2['jb']) + floatval($data2['jbb_jf']));
																$jkX = (floatval($data2['jbb_jk']) + floatval($data2['jbb_bf']));
																$bfX = (floatval($data2['bf_k3_col']) + floatval($data2['bf_k3_jb']) + floatval($data2['bf_k3_jk'])
																+ floatval($data2['bf_k3_jl']) + floatval($data2['bf_jl']) + floatval($data2['bf_bf']) + floatval($data2['bf_bf']) + floatval($data2['bf_kj']));
																$spkX = (floatval($data2['spk_sp_jb']) +  floatval($data2['spk_sp_bfp']) + floatval($data2['spk_sp_sph']));
																$spX = (floatval($data2['bf_spk_xlp']) + floatval($data2['bf_spk_sp']));
																$mhX = (floatval($data2['mh']) + floatval($data2['mh_slb']));
																$clX = floatval($data2['sp_cl']);
																$clfX = floatval($data2['sp_clf']);
																$mhr = floatval($data2['mh']) + floatval($data2['mh_slb']);
																$phr = floatval($data2['basi_sp']) + floatval($data2['basi_bf']) + floatval($data2['basi_xlp']) + floatval($data2['basi_jk']) + floatval($data2['basi_col']);
																$sumXX = $colX + $jbX + $jkX + $bfX + $spkX + $spX + $mhX + $clX + $clfX;
																$grand_total = $sumXX + $phr + $mhr;

																$qty = 0;
																$dataDaging = $this->db->query('select * from tbl_sub_daging where id_bahan_baku ='.$ss['id_bahan_baku'])->result_array(); 
																foreach($dataDaging as $sdb) {
																	$qty += floatval($sdb['tbersih']);
																}

																?>
																<td><?php echo $qty ?></td>
																<td></td>
																<td></td>
																<td></td>
																<td></td>
															</tr>
															<tr>
																<td colspan="2">Grand Total</td>
																<td><?php echo $sumXX ?></td>
																<td></td>
																<td></td>
																<td colspan="2"></td>
																<td colspan="2">Grand Total</td>
																<td><?php echo $grand_total ?></td>
																<td></td>
																<td></td>
																<td></td>
																<td></td>

															</tr>
															
														</tbody>
													</table>
													<table class="responsive table table-bordered mt-3">
													<tr>
														<td colspan="3" height="90px" class="text-center">Dibuat</td>
														<td colspan="4" height="90px" class="text-center">Diperiksa</td>
														<td colspan="4" height="90px" class="text-center">Diketahui</td>
														<td colspan="3" height="90px" class="text-center">Disetujui</td>
													</tr>
													</table>
												</div>
												<p>Note: <?php echo $data2['note'] ?></p>
											</div>
										</div>
										<div class="modal-footer">
											<!-- <?php if($data2['status'] == 3) { ?>
											<a
												href="<?php echo base_url('main/approveSortirCoast/'.$data2['id_sortir']); ?>"
												class="btn btn-primary">Approve</a>
											<?php } ?> -->
											<button class="btn btn-primary" onclick="printDisini(<?php echo $data2['id'] ?>)">Print</button>

										</div>
										</div>
										</div>
										</div>

                                	<?php } ?>
>>>>>>> a3d89ae8c77b207bca98cc5a8474a9049848b5da
