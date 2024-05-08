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
					<table class="table table-bordered table-responsive" id="myTablePrintAble">
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
