<div class="row">
	<div class="col-md-12">
		<!-- Button trigger modal -->
		<button type="button" class="btn btn-primary btn-sm my-4" data-toggle="modal" data-target="#modelIdx">
		  Lihat Laporan
		</button>
		
		<!-- Modal -->
		<div class="modal fade" id="modelIdx" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
			<div class="modal-dialog modal-xl modal-fullscreen" role="document">
				<div class="modal-content ">
					<div class="modal-header">
						<h5 class="modal-title">Modal title</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
					</div>
					<div class="modal-body">
					<table class="table table-bordered table-responsive">
					<thead class="text-center">
					<tr>
					<th style="width: 40px;" rowspan="2">NO.</th>
					<th style="width: 40px;" rowspan="2">KD</th>
					<th style="width: 100px;" rowspan="2">SUPPLIER</th>
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
					<tr>
					<th style="width: 120px;" rowspan="1">awal</th>
					<th style="width: 120px;" rowspan="1">-/+</th>
					<th style="width: 120px;" rowspan="1">total</th>
					</tr>
				</thead>
					<tbody>
						<?php 
						$no = 1;
						foreach ($supplier as $da) : ?>
						<tr>
							<td><?php echo $no++ ?></td>
							<td><?php echo $da['kode_supplier'] ?></td>
							<td><?php echo $da['nama_supplier'] ?></td>
							<td id="fresh"><?php $fresh = floatval($da['col']) + floatval($da['bf']) + floatval($da['jb']) + floatval($da['jbb_jf']) + floatval($da['jbb_jk'])
								+ floatval($da['jbb_bf']) + floatval($da['xlp']) + floatval($da['bf_k3_col']) + floatval($da['bf_k3_jb']) + floatval($da['bf_k3_jk'])
								+ floatval($da['bf_k3_jl']) + floatval($da['bf_jl']) + floatval($da['bf_bf']) + floatval($da['bf_bf']) + floatval($da['bf_kj']) + 
								floatval($da['bf_spk_xlp']) + floatval($da['bf_spk_sp']) + floatval($da['spk_sp_jb']) +  floatval($da['spk_sp_bfp']) + floatval($da['spk_sp_sph']) + 
								floatval($da['sp_cl']) + floatval($da['sp_clf']) + floatval($da['mh']) + floatval($da['mh_slb']);
								echo $fresh; 
							?></td>
							<td id="mhr">
							<?php $sum = floatval($da['phr']) + floatval($da['basi_col']) + floatval($da['basi_jb']) + floatval($da['basi_sp']) + floatval($da['mhr']) + 
							floatval($da['basi_cl']) + floatval($da['basi_mh']);

							echo $sum;
							?>
							</td>
							<td id="total"><?php $total = floatval($da['col']) + floatval($da['bf']) + floatval($da['jb']) + floatval($da['jbb_jf']) + floatval($da['jbb_jk'])
								+ floatval($da['jbb_bf']) + floatval($da['xlp']) + floatval($da['bf_k3_col']) + floatval($da['bf_k3_jb']) + floatval($da['bf_k3_jk'])
								+ floatval($da['bf_k3_jl']) + floatval($da['bf_jl']) + floatval($da['bf_bf']) + floatval($da['bf_bf']) + floatval($da['bf_kj']) + 
								floatval($da['bf_spk_xlp']) + floatval($da['bf_spk_sp']) + floatval($da['spk_sp_jb']) +  floatval($da['spk_sp_bfp']) + floatval($da['spk_sp_sph']) + 
								floatval($da['sp_cl']) + floatval($da['sp_clf']) + floatval($da['mh']) + floatval($da['mh_slb']) + floatval($da['phr']) + floatval($da['basi_col']) + floatval($da['basi_jb']) + floatval($da['basi_sp']) + floatval($da['mhr']) + 
								floatval($da['basi_cl']) + floatval($da['basi_mh']);
								echo $total; 
							?></td>
							<td id="loss"><?php $sum = floatval($da['air']) + floatval($da['shell']) + floatval($da['loss']);
								echo $sum;
							?>
							</td>
							<td id="qty_bb">
								<?php echo $da['timbangan_bb'] ?>
							</td>
							<td id="total_nota">
								<?php 
								$col = (floatval($da['col']) + floatval($da['bf'])) * floatval($price[0]['harga']);
								$jb = (floatval($da['jb']) + floatval($da['jbb_jf'])) * floatval($price[1]['harga']);
								$jk = (floatval($da['jbb_jk']) + floatval($da['jbb_bf'])) * floatval($price[2]['harga']);
								$bf = (floatval($da['bf_k3_col']) + floatval($da['bf_k3_jb']) + floatval($da['bf_k3_jk'])
								+ floatval($da['bf_k3_jl']) + floatval($da['bf_jl']) + floatval($da['bf_bf']) + floatval($da['bf_bf']) + floatval($da['bf_kj'])) * floatval($price[6]['harga']);
								$spk = (floatval($da['spk_sp_jb']) +  floatval($da['spk_sp_bfp']) + floatval($da['spk_sp_sph'])) * floatval($price[7]['harga']);
								$sp = (floatval($da['bf_spk_xlp']) + floatval($da['bf_spk_sp'])) * floatval($price[8]['harga']);
								$mh = (floatval($da['mh']) + floatval($da['mh_slb'])) * floatval($price[12]['harga']);
								$cl = floatval($da['sp_cl']) * floatval($price[10]['harga']);
								$clf = floatval($da['sp_clf']) * floatval($price[11]['harga']);
								$total_nota = $col+ $jb+ $jk+ $bf+ $spk+ $sp+ $mh+ $cl+ $clf;


								$colX = (floatval($da['col']) + floatval($da['bf']));
								$jbX = (floatval($da['jb']) + floatval($da['jbb_jf']));
								$jkX = (floatval($da['jbb_jk']) + floatval($da['jbb_bf']));
								$bfX = (floatval($da['bf_k3_col']) + floatval($da['bf_k3_jb']) + floatval($da['bf_k3_jk'])
								+ floatval($da['bf_k3_jl']) + floatval($da['bf_jl']) + floatval($da['bf_bf']) + floatval($da['bf_bf']) + floatval($da['bf_kj']));
								$spkX = (floatval($da['spk_sp_jb']) +  floatval($da['spk_sp_bfp']) + floatval($da['spk_sp_sph']));
								$spX = (floatval($da['bf_spk_xlp']) + floatval($da['bf_spk_sp']));
								$mhX = (floatval($da['mh']) + floatval($da['mh_slb']));
								$clX = floatval($da['sp_cl']);
								$clfX = floatval($da['sp_clf']);
								$sumXX = $colX + $jbX + $jkX + $bfX + $spkX + $spX + $mhX + $clX + $clfX;
									echo number_format($total_nota, 2);
								?>
							</td>
							<td id="root_sebelum_subsidi"><?php echo number_format(($total_nota / $sumXX),2 ) ?> </td>
							<!-- Manual -->
							<td><?php echo $subsidi_normal = floatval(10000)  ?> </td>
							<td><?php echo $sum ?></td>
							<td><?php echo number_format($total_nota + $subsidi_normal,2) ?></td>
							<td><?php echo number_format(($total_nota + $subsidi_normal) / $sumXX, 2) ?></td>
							<!-- Manual -->
							<td><?php echo $subsidi_dibayar_awal = 100000 ?></td>
							<!-- Manual -->
							<td><?php echo $subsidi_dibayar_kedua = 100000 ?></td>
							<td><?php echo number_format($subsidi_dibayar_kedua + $subsidi_dibayar_awal, 2)?></td>
							<td><?php echo $cap_shell = 10 ?></td>
							<td><?php echo $total_subsidi_dibayar = ($subsidi_dibayar_kedua + $subsidi_dibayar_awal) * $fresh ?></td>
							<td><?php echo $total_nota_subsidi_bayar = ($total_subsidi_dibayar + $total_nota ) ?></td>
							<td><?php echo $root_setelah_subsidi = number_format($total_nota_subsidi_bayar / $sumXX,2) ?></td>
							<!-- Manual -->
							<td><?php echo $subsidi_transport = 100000 ?></td>
							<td><?php echo number_format($subsidi_transport * $total,2) ?></td>
							<td><?php echo number_format($total_nota + $subsidi_normal - $cap_shell - $total_nota + $total_subsidi_dibayar - $subsidi_transport, 2) ?></td>
							<td><?php echo $receiving = number_format(($total_nota + $total_subsidi_dibayar) / $da['timbangan_bb'],2) ?></td>
						</tr>
						<?php endforeach; ?>
					</tbody>
					<tfoot>
						<td colspan="3"><h5>Total</h5></td>
						<td id="hasil_total_fresh"></td>
						<td id="hasil_total_phr_mhr"></td>
						<td id="hasil_total_total"></td>
						<td id="hasil_total_qty"></td>
						<td id="hasil_total_nota"></td>
						<td colspan="3"></td>
						<td colspan="7"></td>
						<td id="hasil_total_subsidi_bayar"></td>
						<td id="hasil_total_subsidi_bayar_plus_nota"></td>
						<td id="hasil_total_subsidi_bayar_plus_nota"></td>
						<td></td>
						<td id="hasil_total_subsidi_trans"></td>
					</tfoot>
					</table>

					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary">Save</button>
					</div>
				</div>
			</div>
		</div>
		<table class="table" id="myTable4">
			<thead>
				<tr>
					<th>No.</th>
					<th>Kode Supplier</th>
					<th>Tanggal Input</th>
					<th>Approved By</th>
					<th>Status</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				$no = 1;
				foreach ($supplier as $da) : ?>
				<tr>
					<td><?php echo $no ++ ?></td>
					<td><?php echo $da['kode_supplier'] ++ ?></td>
					<td><?php echo $da['tanggal'] ?></td>
					<td><?php echo $da['approved_by'] ?></td>
					<td><?php echo $da['status'] ?></td>
					<!-- <td>
					<button type="button" class="btn btn-light btn-sm" data-toggle="modal" data-target="#modelId">
					  <i class="fa fa-eye" aria-hidden="true"></i>
					</button>
					
					<div class="modal fade" id="modelId1" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
						<div class="modal-dialog modal-xl modal-fullscreen" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title">Modal title</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
								</div>
								<div class="modal-body">
								<table class="table-borderd">
									<thead>
										<tr>
										<th>NO.</th>
										<th>KD</th>
										<th>SUPPLIER</th>
										<th>FRESH</th>
										<th>PHR / MHR</th>
										<th>TOTAL</th>
										<th>LOSS</th>
										<th>QTTY BB</th>
										<th>TOTAL NOTA</th>
										<th>ROOT SBLM SUBSIDI</th>
										<th>SUBSIDI NORMAL</th>
										<th>TOTAL SUBSIDI NORMAL</th>
										<th>TOTAL NOTA + SUBSIDI NORMAL</th>
										<th>ROOT STLH SUBSIDI NORMAL</th>
										<th>SUBSIDI DIBAYAR</th>
										<th>CAP/SHELL</th>
										<th>TOTAL SUBSIDI DIBAYAR</th>
										<th>TOTAL NOTA + SUBSIDI DIBAYAR</th>
										<th>ROOT STLH SUBSIDI DIBAYAR</th>
										<th>SUBSIDI TRANS</th>
										<th>TOTAL SUBSIDI TRANS</th>
										<th>UNTUNG / RUGI</th>
										<th>ROOT RECEIVING</th>
										<th>% JB</th>
										</tr>
									</thead>
									<tbody>
									</tbody>
									</table>

								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									<button type="button" class="btn btn-primary">Save</button>
								</div>
							</div>
						</div>
					</div>
					</td> -->
				</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</div>
