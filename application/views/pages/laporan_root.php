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
						foreach ($supplier as $da) : 
						?>
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

								$subsidi_normal = floatval($da['subsidi_normal']);
									echo number_format($total_nota, 2);
								?>
							</td>
							<td id="root_sebelum_subsidi"><?php echo number_format(($total_nota / $sumXX),2 ) ?> </td>
							<!-- Manual -->
							<td><?php echo $subsidi_normal  ?> </td>
							<td><?php echo $sum ?></td>
							<td><?php echo number_format($total_nota + $subsidi_normal,2) ?></td>
							<td><?php echo number_format(($total_nota + $subsidi_normal) / $sumXX, 2) ?></td>
							<!-- Manual -->
							<td><?php echo $subsidi_dibayar_awal = $da['subsidi_dibayar_1'] ?></td>
							<!-- Manual -->
							<td><?php echo $subsidi_dibayar_kedua = $da['subsidi_dibayar_2'] ?></td>
							<td><?php echo number_format($subsidi_dibayar_kedua + $subsidi_dibayar_awal, 2)?></td>
							<td><?php echo $cap_shell = $da['cap_shell'] ?></td>
							<td><?php echo $total_subsidi_dibayar = ($subsidi_dibayar_kedua + $subsidi_dibayar_awal) * $fresh ?></td>
							<td><?php echo $total_nota_subsidi_bayar = ($total_subsidi_dibayar + $total_nota ) ?></td>
							<td><?php echo $root_setelah_subsidi = number_format($total_nota_subsidi_bayar / $sumXX,2) ?></td>
							<!-- Manual -->
							<td><?php echo $subsidi_transport = $da['subsidi_transport'] ?></td>
							<td><?php echo number_format($subsidi_transport * $total,2) ?></td>
							<td><?php echo number_format(floatval($total_nota) + floatval($subsidi_normal) - floatval($cap_shell) - floatval($total_nota) + floatval($total_subsidi_dibayar) - floatval($subsidi_transport), 2) ?></td>

							<td><?php $receiving = (floatval($total_nota) + floatval($total_subsidi_dibayar));
							if($receiving > 1 ) {
								// echo number_format($receiving / floatval($qty),2);
							} else {
								echo 0;
							}
							?>
						</td>
						</tr>
						<?php endforeach; ?>
					</tbody>
					<tfoot>
						<?php 
						$id_bb = $supplier[0]['id_bb'];
						$fresh = 0;
						$phr = 0;
						$total = 0;
						$loss = 0;
						$qty_bb = 0;
						$subsidi_bayar_1 = 0;
						$subsidi_bayar_2 = 0;
						$subsidi_bayar_3 = 0;
						foreach ($supplier as $da) : ?>
						
						<?php 

						$qty = 0;
						$dataDaging = $this->db->query('select * from tbl_sub_daging where id_bahan_baku ='.$da['id_bb'])->result_array(); 
						foreach($dataDaging as $sdb) {
							$qty = floatval($sdb['tkotor']) + floatval($sdb['tkotor2']) + floatval($sdb['tbersih']) + floatval($sdb['tbersih']);
						}

						$fresh += floatval($da['col']) + floatval($da['bf']) + floatval($da['jb']) + floatval($da['jbb_jf']) + floatval($da['jbb_jk'])
								+ floatval($da['jbb_bf']) + floatval($da['xlp']) + floatval($da['bf_k3_col']) + floatval($da['bf_k3_jb']) + floatval($da['bf_k3_jk'])
								+ floatval($da['bf_k3_jl']) + floatval($da['bf_jl']) + floatval($da['bf_bf']) + floatval($da['bf_bf']) + floatval($da['bf_kj']) + 
								floatval($da['bf_spk_xlp']) + floatval($da['bf_spk_sp']) + floatval($da['spk_sp_jb']) +  floatval($da['spk_sp_bfp']) + floatval($da['spk_sp_sph']) + 
								floatval($da['sp_cl']) + floatval($da['sp_clf']) + floatval($da['mh']) + floatval($da['mh_slb']);
								
						$phr += floatval($da['phr']) + floatval($da['basi_col']) + floatval($da['basi_jb']) + floatval($da['basi_sp']) + floatval($da['mhr']) + 
								floatval($da['basi_cl']) + floatval($da['basi_mh']);

						$total += floatval($da['col']) + floatval($da['bf']) + floatval($da['jb']) + floatval($da['jbb_jf']) + floatval($da['jbb_jk'])
								+ floatval($da['jbb_bf']) + floatval($da['xlp']) + floatval($da['bf_k3_col']) + floatval($da['bf_k3_jb']) + floatval($da['bf_k3_jk'])
								+ floatval($da['bf_k3_jl']) + floatval($da['bf_jl']) + floatval($da['bf_bf']) + floatval($da['bf_bf']) + floatval($da['bf_kj']) + 
								floatval($da['bf_spk_xlp']) + floatval($da['bf_spk_sp']) + floatval($da['spk_sp_jb']) +  floatval($da['spk_sp_bfp']) + floatval($da['spk_sp_sph']) + 
								floatval($da['sp_cl']) + floatval($da['sp_clf']) + floatval($da['mh']) + floatval($da['mh_slb']) + floatval($da['phr']) + floatval($da['basi_col']) + floatval($da['basi_jb']) + floatval($da['basi_sp']) + floatval($da['mhr']) + 
								floatval($da['basi_cl']) + floatval($da['basi_mh']);
						$loss += floatval($da['air']) + floatval($da['shell']) + floatval($da['loss']);
						$qty_bb += $da['timbangan_bb'];
						$total_notas = 0;
						$col += (floatval($da['col']) + floatval($da['bf'])) * floatval($price[0]['harga']);
						$jb += (floatval($da['jb']) + floatval($da['jbb_jf'])) * floatval($price[1]['harga']);
						$jk += (floatval($da['jbb_jk']) + floatval($da['jbb_bf'])) * floatval($price[2]['harga']);
						$bf += (floatval($da['bf_k3_col']) + floatval($da['bf_k3_jb']) + floatval($da['bf_k3_jk'])
						+ floatval($da['bf_k3_jl']) + floatval($da['bf_jl']) + floatval($da['bf_bf']) + floatval($da['bf_bf']) + floatval($da['bf_kj'])) * floatval($price[6]['harga']);
						$spk += (floatval($da['spk_sp_jb']) +  floatval($da['spk_sp_bfp']) + floatval($da['spk_sp_sph'])) * floatval($price[7]['harga']);
						$sp += (floatval($da['bf_spk_xlp']) + floatval($da['bf_spk_sp'])) * floatval($price[8]['harga']);
						$mh += (floatval($da['mh']) + floatval($da['mh_slb'])) * floatval($price[12]['harga']);
						$cl += floatval($da['sp_cl']) * floatval($price[10]['harga']);
						$clf += floatval($da['sp_clf']) * floatval($price[11]['harga']);
						$total_notas += $col+ $jb+ $jk+ $bf+ $spk+ $sp+ $mh+ $cl+ $clf;
						$subsidi_bayar_1 += $da['subsidi_dibayar_1'];
						$subsidi_bayar_2 += $da['subsidi_dibayar_2'];
						$subsidi_bayar_3 += $da['subsidi_transport'];
						
						?>
						<?php endforeach; ?>
						<td colspan="3"><h5>Total</h5></td>
						<td id="hasil_total_fresh">
						<?php echo $fresh ?>
						</td>
						<td id="hasil_total_phr_mhr">
							<?php echo $phr ?>
						</td>
						<td id="hasil_total_total">
							<?php echo $total ?>
						</td>
						<td id="hasil_total_qty"><?php echo $loss ?></td>
						<td id="hasil_total_nota"><?php echo $qty_bb ?></td>
						<td id="hasil_total_nota"><?php echo number_format($total_notas,2) ?></td>
						<td colspan=""></td>
						<td colspan=""></td>
						<td colspan=""></td>
						<td colspan=""></td>
						<td colspan=""></td>
						<td colspan="2"></td>
						<td colspan=""><?php echo $subsidi_bayar_1 ?></td>
						<td colspan=""><?php echo $subsidi_bayar_2 ?></td>
						<td id="hasil_total_subsidi_bayar_plus_nota"></td>
						<td id="hasil_total_subsidi_bayar_plus_nota"></td>
						<td></td>
						<td colspan=""><?php echo $subsidi_bayar_3 ?></td>
						<td id="hasil_total_subsidi_trans"></td>
					</tfoot>
					</table>

					</div>
					<div class="modal-footer">
						<a href="<?php echo base_url('main/approve_laporan/'.$id_bb) ?>" class="btn btn-primary">Approve</a>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="button" onclick="exportToExcel()" class="btn btn-primary">Print</button>
					</div>
				</div>
			</div>
		</div>
		<?php
		// Check if	 flash data exists
		if ($this->session->flashdata('success')) {
		// If it does, display a success message
		echo '<div class="alert alert-success my-2">' . $this->session->flashdata('success') . '</div>';
		}
		?>
		<table class="table" id="myTable3">
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
				foreach ($supplier as $da) : 
				$qty = 0;
				$dataDaging = $this->db->query('select * from tbl_sub_daging where id_bahan_baku ='.$da['id_bb'])->result_array(); 
				foreach($dataDaging as $sdb) {
					$qty = floatval($sdb['tkotor']) + floatval($sdb['tkotor2']) + floatval($sdb['tbersih']) + floatval($sdb['tbersih']);
				}
				?>
				<tr>
					<td><?php echo $no ++ ?></td>
					<td><?php echo $da['kode_supplier'] ++ ?></td>
					<td><?php echo $da['tanggal'] ?></td>
					<td>
					<?php if($da['approved_by'] != null ) {
							 $approved = $this->db->query("select username from tbl_user where id = ".$da['approved_by']."")->row_array();
							 echo $approved['username'];
							} else {
							echo '';
							}
						?>
					</td>
					<td><?php 
					$status = $da['status'];
					if ($status == -1) {
							echo "Rejected";
						} elseif ($status == 0) {
							echo "Pending";
						} elseif ($status == 1) {
							echo "Accepted";
							} ?></td>
					<td>
					<!-- Button trigger modal -->
					<?php if(!$da['id_laporan']) { ?> 
						<button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modelId">
							Tambah Manual Data
						</button>
					<?php } ?>
					<!-- Button trigger modal -->
					<button type="button" class="btn btn-light btn-sm" data-toggle="modal" data-target="#modelId-<?php echo $da['id'] ?>">
					  <i class="fa fa-eye" aria-hidden="true"></i>
					</button>
					
					<!-- Modal -->
					<div class="modal fade" id="modelId-<?php echo $da['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
						<div class="modal-dialog modal-xl modal-fullscreen" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title">Detail Laporan Supplier</h5>
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
								<th rowspan="2">JB %</th>
								<tr>
								<th style="width: 120px;" rowspan="1">awal</th>
								<th style="width: 120px;" rowspan="1">-/+</th>
								<th style="width: 120px;" rowspan="1">total</th>
								</tr>
							</thead>
								<tbody>
									<tr>
										<td>1</td>
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
											<?php echo $qty ?>
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

											$subsidi_normal = floatval($da['subsidi_normal']);
												echo number_format($total_nota, 2);
											?>
										</td>
										<td id="root_sebelum_subsidi"><?php echo number_format(($total_nota / $sumXX),2 ) ?> </td>
										<!-- Manual -->
										<td><?php echo $subsidi_normal  ?> </td>
										<td><?php echo $sum ?></td>
										<td><?php echo number_format($total_nota + $subsidi_normal,2) ?></td>
										<td><?php echo number_format(($total_nota + $subsidi_normal) / $sumXX, 2) ?></td>
										<!-- Manual -->
										<td><?php echo $subsidi_dibayar_awal = $da['subsidi_dibayar_1'] ?></td>
										<!-- Manual -->
										<td><?php echo $subsidi_dibayar_kedua = $da['subsidi_dibayar_2'] ?></td>
										<td><?php echo number_format($subsidi_dibayar_kedua + $subsidi_dibayar_awal, 2)?></td>
										<td><?php echo $cap_shell = $da['cap_shell'] ?></td>
										<td><?php echo $total_subsidi_dibayar = ($subsidi_dibayar_kedua + $subsidi_dibayar_awal - $da['subsidi_dibayar_3']) * $fresh ?></td>
										<td><?php echo $total_nota_subsidi_bayar = ($total_subsidi_dibayar + $total_nota ) ?></td>
										<td><?php echo $root_setelah_subsidi = number_format($total_nota_subsidi_bayar / $sumXX,2) ?></td>
										<!-- Manual -->
										<td><?php echo $subsidi_transport = $da['subsidi_transport'] ?></td>
										<td><?php echo number_format($subsidi_transport * $total,2) ?></td>
										<td><?php echo number_format(floatval($total_nota) + floatval($subsidi_normal) - floatval($cap_shell) - floatval($total_nota) + floatval($total_subsidi_dibayar) - floatval($subsidi_transport), 2) ?></td>

										<td><?php $receiving = (floatval($total_nota) + floatval($total_subsidi_dibayar));
										if($receiving > 1 && $qty ) {
											echo number_format($receiving / floatval($qty),2);
										} else {
											echo 0;
										}
										?>
									</td>
									<td>1</td>
									</tr>
								</tbody>
								
								</table>
								</div>
								<div class="modal-footer">
									<?php if($da['id_laporan']) { ?> 
									<a href="<?php echo base_url('main/approve_laporan_root/'.$da['id_laporan']); ?>" class="btn btn-primary">Approve</a>
									<?php } ?>
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								</div>
							</div>
						</div>
					</div>
					<!-- Modal -->
					<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title">Tambah Manual Data</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
								</div>
								<form action="<?php echo base_url('main/post_laporan_root/'.$da['id_bb']); ?>" method="post">
								<div class="modal-body">
										<input type="text" class="form-control my-2" name="subsidi_normal" id="" placeholder="subsidi normal">
										<input type="text" class="form-control my-2" name="subsidi_dibayar_1" id="" placeholder="subsidi dibayar (awal)">
										<input type="text" class="form-control my-2" name="subsidi_dibayar_2" id="" placeholder="subsidi dibayar (+)">
										<input type="text" class="form-control my-2" name="subsidi_dibayar_3" id="" placeholder="subsidi dibayar (-)">
										<input type="text" class="form-control my-2" name="cap_shell" id="" placeholder="cap/shell">
										<input type="text" class="form-control my-2" name="subsidi_transport" id="" placeholder="subsidi transport">
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										<button type="submit" class="btn btn-primary">Simpan</button>
									</div>
								</form>
							</div>
						</div>
					</div>
					</td>
				</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
</div>
