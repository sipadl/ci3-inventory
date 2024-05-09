<div class="row">
	<div class="col-md-12">
		<!-- Button trigger modal -->
		<!-- Button trigger modal -->
		<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modelIdLaporan">
		  Laporan
		</button>
		
		<!-- Modal -->
		<div class="modal fade" id="modelIdLaporan" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
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
							<table class="table table-responsive table-bordered" id="myTablePrintAble">
								<thead>
									<tr>
										<th>No.</th>
										<th>Kode Supplier</th>
										<th>Nama Supplier</th>
										<th>Total COL</th>
										<th>Total JB</th>
										<th>Total JK</th>
										<th>XLP</th>
										<th>Total BF</th>
										<th>Total SPK</th>
										<th>Total SP</th>
										<th>Total MH</th>
										<th>Total MH SLB</th>
										<th>Total PHR Receiving</th>
										<th>Total MHR Receiving</th>
										<th>Total PHR Sortir</th>
										<th>Total MHR Sortir</th>
										<th>Total Air</th>
										<th>Total Shell</th>
										<th>Total Loss</th>
										<th>Total Timb. Kotor</th>
										<th>Total Timb. BB</th>
										<th>Total Grand Total</th>
										<th>Total Grand Total</th>
									</tr>
								</thead>
								<tbody>
								<?php 
								$number = 1;
								$total_col = 0;
								$total_jb = 0;
								$total_jk = 0;
								$total_xlp = 0;
								$total_bf = 0;
								$total_spk = 0;
								$total_sp = 0;
								$total_mh1 = 0;
								$total_mh2 = 0;
								$total_phr1 = 0;
								$total_mhr1 = 0;
								$total_phr2 = 0;
								$total_mhr2 = 0;
								$total_air = 0;
								$total_shell = 0;
								$total_loss = 0;
								$total_tmb_kotor = 0;
								$total_qty = 0;
								$total_grand_total = 0;

								foreach($bahanbaku as $ss ) :

										$data2 = $this->db->query('select * from tbl_sortir where id_bb ='. $ss['id_bb'].' and is_corection = 1')->row_array();
										$col = $ss['col'];
										$col_bf = $ss['bf'];
										$jb = $ss['jb'];
										$jb_bf = $ss['jb_bf'];
										$jk = $ss['jbb_jk'];
										$jk_bf = $ss['jbb_bf'];
										$xlp = $ss['xlp'];
										$bf_k3_col = $ss['bf_k3_col'];
										$bf_k3_jb = $ss['bf_k3_jb'];
										$bf_k3_jl = $ss['bf_k3_jl'];
										$bf_k3_jk = $ss['bf_k3_jk'];
										$bf_jl = $ss['bf_jl'];
										$bf_kj = $ss['bf_kj'];
										$bf_bf = $ss['bf_bf'];
										$bf_lp_slb = $ss['bf_lp_slb'];
										$bf_sp = $ss['bf_sp'];
										$spk_xlp = $ss['bf_spk_xlp'];
										$spk_sp = $ss['spk_sp'];
										$sp_jb = $ss['spk_sp_jb'];
										$sp_xlp = $ss['spk_sp_xlp'];
										$sp_bf = $ss['spk_sp_bfp'];
										$sp_sph = $ss['spk_sp_sph'];
										$sp_sp = $ss['sp_sph'];
										$cl = $ss['sp_cl'];
										$clf = $ss['sp_clf'];
										$mh = $ss['mh'];
										$mh2 = $ss['mh_slb'];
										$phr = $ss['phr'];
										$basi_col = $ss['basi_col'];
										$basi_jk = $ss['basi_jk'];
										$basi_jb = $ss['basi_jb'];
										$basi_xlp = $ss['basi_xlp'];
										$basi_bf = $ss['basi_bf'];
										$basi_sp = $ss['basi_sp'];
										$basi_col2 = $ss['basi_col2'];
										$basi_jk2 = $ss['basi_jk2'];
										$basi_jb2 = $ss['basi_jb2'];
										$basi_xlp2 = $ss['basi_xlp2'];
										$basi_bf2 = $ss['basi_bf2'];
										$basi_sp2 = $ss['basi_sp2'];
										$mhr = $ss['mhr'];
										$basi_cl = $ss['basi_cl'];
										$basi_mh = $ss['basi_mh'];
										$basi_cl2 = $ss['basi_cl2'];
										$basi_mh2 = $ss['basi_mh2'];
										$air = $ss['air'];
										$shell = $ss['shell'];
										$loss = $ss['loss'];
										$jbb_jf = $ss['jbb_jf'];
										$col_18 = $ss['bf_spk_sp'];


									$timbangan_kotor = floatval($col) + floatval($col_bf) + floatval($jb) + floatval($jb_bf) + floatval($jk) + floatval($jk_bf) +
									floatval($xlp) + floatval($bf_k3_col) + floatval($bf_k3_jb) + floatval($bf_k3_jl) + floatval($bf_k3_jk) +
									floatval($bf_jl) + floatval($bf_kj) + floatval($bf_bf) + floatval($bf_lp_slb) + floatval($bf_sp) +
									floatval($spk_xlp) + floatval($spk_sp) + floatval($sp_jb) + floatval($sp_xlp) + floatval($sp_bf) +
									floatval($sp_sph) + floatval($cl) + floatval($clf) + floatval($mh) + floatval($mh2) + floatval($phr) +
									floatval($basi_col) + floatval($basi_jk) + floatval($basi_xlp) + floatval($basi_bf) + floatval($basi_sp) +
									floatval($mhr) + floatval($basi_cl) + floatval($basi_mh) + floatval($air) + floatval($shell) +
									floatval($loss) + floatval($jbb_jf) + floatval($col_18);

									

									$colX = (floatval($col) + floatval($col_bf));
									$jbX = (floatval($jb) + floatval($jbb_jf));
									$jkX = (floatval($jk) + floatval($jk_bf));
									$bfX = (floatval($bf_k3_col) + floatval($bf_k3_jb) + floatval($bf_k3_jk) +
											floatval($bf_k3_jl) + floatval($bf_jl) + floatval($bf_bf) + floatval($bf_bf) +
											floatval($bf_k3_jk) + floatval($bf_kj));
									$spkX = (floatval($sp_bf) + floatval($sp_sph));
									$spX = (floatval($spk_xlp) + floatval($spk_sp));
									$mhX = (floatval($mh) + floatval($mh2));
									$clX = floatval($cl);
									$clfX = floatval($clf);
									$mhr = floatval($mh) + floatval($mh2);
									$phr = floatval($basi_sp) + floatval($basi_bf) + floatval($basi_xlp) + floatval($basi_jk) + floatval($basi_col);
									$sumXX = $colX + $jbX + $jkX + $bfX + $spkX + $spX + $mhX + $clX + $clfX;
									$grand_total = $sum = floatval($col) + floatval($col_bf) + floatval($jb) + floatval($jb_bf) + floatval($jk) + floatval($jk_bf) +
									floatval($xlp) + floatval($bf_k3_col) + floatval($bf_k3_jb) + floatval($bf_k3_jl) + floatval($bf_k3_jk) +
									floatval($bf_jl) + floatval($bf_kj) + floatval($bf_bf) + floatval($bf_lp_slb) + floatval($bf_sp) +
									floatval($spk_xlp) + floatval($spk_sp) + floatval($sp_jb) + floatval($sp_xlp) + floatval($sp_bf) +
									floatval($sp_sph) + floatval($sp_sp) + floatval($cl) + floatval($clf) + floatval($mh) + floatval($mh2);


									$data2 = $this->db->query('select * from tbl_sortir where id_bb ='.$ss['id_bb'].' and is_corection = 1')->row_array();


									$grand_totalX = 0;
									$total_grand_x_2 = 0;
									if($data2) {
									$colXX = (floatval($data2['col']) + floatval($data2['bf']));
									$jbXX = (floatval($data2['jb']) + floatval($data2['jbb_jf']));
									$jkXX = (floatval($data2['jbb_jk']) + floatval($data2['jbb_bf']));
									$bfXX = (floatval($data2['bf_k3_col']) + floatval($data2['bf_k3_jb']) + floatval($data2['bf_k3_jk'])
									+ floatval($data2['bf_k3_jl']) + floatval($data2['bf_jl']) + floatval($data2['bf_bf']) + floatval($data2['bf_bf']) + floatval($data2['bf_kj']));
									$spkXX = (floatval($data2['spk_sp_jb']) +  floatval($data2['spk_sp_bfp']) + floatval($data2['spk_sp_sph']));
									$spXX = (floatval($data2['bf_spk_xlp']) + floatval($data2['bf_spk_sp']));
									$mhXX = (floatval($data2['mh']) + floatval($data2['mh_slb']));
									$clXX = floatval($data2['sp_cl']);
									$clfXX = floatval($data2['sp_clf']);
									$mhrX = floatval($data2['mh']) + floatval($data2['mh_slb']);
									$phrX = floatval($data2['basi_sp']) + floatval($data2['basi_bf']) + floatval($data2['basi_xlp']) + floatval($data2['basi_jk']) + floatval($data2['basi_col']);
									$sumXXX = $colXX + $jbXX + $jkXX + $bfXX + $spkXX + $spXX + $mhXX + $clXX + $clfXX;
									$grand_totalX = $sumXXX + $phrX + $mhrX;

									$total_grand_x_2 += $grand_totalX;
									}
									$qty = 0;
									$dataDaging = $this->db->query('select * from tbl_sub_daging where id_bahan_baku ='.$ss['id_bahan_baku'])->result_array(); 
									foreach($dataDaging as $sdb) {
										$qty += floatval($sdb['tbersih']);
									}

									$nama_supplier = $this->db->query('select nama_supplier from tbl_supplier where kode_supplier = "'.$ss['kode_supplier'].'"' )->row_array();

									$total_col += $colX;
									$total_jb += $jbX;
									$total_jk += $jkX;
									$total_xlp += $xlp;
									$total_bf += $bfX;
									$total_spk += $spkX;
									$total_sp += $spX;
									$total_mh1 += $mh;
									$total_mh2 += $mh2;
									$total_phr1 += $phr;
									$total_mhr1 += $basi_cl + $basi_mh;
									$total_phr2 +=
												$basi_col2 +
												$basi_jk2 +
												$basi_jb2 +
												$basi_xlp2 +
												$basi_bf2 +
												$basi_sp2 ;
									$total_mhr2 += $basi_cl2 + $basi_mh2;
									$total_air += $air;
									$total_shell += $shell;
									$total_loss += $loss;
									$total_tmb_kotor += $timbangan_kotor;
									$total_qty += $qty;
									$total_grand_total += $grand_total;

									?>
									<tr>
										<td><?php echo $number++ ?></td>
										<td><?php echo $ss['kode_supplier'] ?></td>
										<td><?php echo $nama_supplier['nama_supplier'] ?></td>
										<td><?php echo $colX ?></td>
										<td><?php echo $jbX ?></td>
										<td><?php echo $jkX ?></td>
										<td><?php echo $xlp ?></td>
										<td><?php echo $bfX ?></td>
										<td><?php echo $spkX ?></td>
										<td><?php echo $spX ?></td>
										<td><?php echo $mh ?></td>
										<td><?php echo $mh2 ?></td>
										<td><?php echo $phr ?></td>
										<td><?php echo $basi_cl + $basi_mh ?></td>
										<td>
										<?php echo $basi_col2 +
											$basi_jk2 +
											$basi_jb2 +
											$basi_xlp2 +
											$basi_bf2 +
											$basi_sp2 
										?> 
										</td>
										<td><?php echo $basi_cl2 + $basi_mh2 ?></td>
										<td> <?php echo $air ?> </td>
										<td> <?php echo $shell ?> </td>
										<td> <?php echo $loss ?> </td>
										<td> <?php echo $timbangan_kotor ?> </td>
										<td> <?php echo $qty ?> </td>
										<td> <?php echo $grand_total ?> </td>
										<td> <?php echo $grand_totalX ?> </td>
									</tr>
									<?php endforeach ?>
								</tbody>
																<tfoot>
									<tr>
										<td></td>
										<td></td>
										<td>Total</td>
										<td><?php echo 
								$total_col
								?></td>
										<td><?php echo 
								$total_jb
								?></td>
										<td><?php echo 
								$total_jk
								?></td>
										<td><?php echo 
								$total_xlp
								?></td>
										<td><?php echo 
								$total_bf
								?></td>
										<td><?php echo 
								$total_spk
								?></td>
										<td><?php echo 
								$total_sp
								?></td>
										<td><?php echo 
								$total_mh1
								?></td>
										<td><?php echo 
								$total_mh2
								?></td>
										<td><?php echo 
								$total_phr1
								?></td>
										<td><?php echo 
								$total_mhr1
								?></td>
										<td><?php echo 
								$total_phr2
								?></td>
										<td><?php echo 
								$total_mhr2
								?></td>
										<td><?php echo 
								$total_air
								?></td>
										<td><?php echo 
								$total_shell
								?></td>
										<td><?php echo 
								$total_loss
								?></td>
										<td><?php echo 
								$total_tmb_kotor
								?></td>
										<td><?php echo 
								$total_qty
								?></td>
										<td><?php echo 
								$total_grand_total
								?></td>
								<td><?php echo $total_grand_x_2 ?></td>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="button" onclick="exportToExcel()" class="btn btn-primary">Print</button>
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
		<table class="table" id="myTable3">
			<thead>
				<tr>
					<th>No.</th>
					<th>Kode Supplier</th>
					<th>Tanggal Input</th>
					<th>Approved By</th>
					<th>Id Sortir</th>
					<th>Status</th>
					<!-- <th>Aksi</th> -->
				</tr>
			</thead>
			<tbody>
			<?php 
			$no = 1; // Inisialisasi nomor
			foreach ($datax as $das) : 
			?>
			<tr>
				<td><?php echo $no++ ?></td> <!-- Increment nomor -->
				<td><?php echo $das['kode_supplier'] ?></td>
				<td><?php echo $das['tanggal'] ?></td>
				<td>
					<?php 
					if($das['approved_by'] != null ) {
						$stmt = $this->db->prepare("SELECT username FROM tbl_user WHERE id = ?");
						$stmt->execute([$das['approved_by']]);
						$approved = $stmt->fetch(PDO::FETCH_ASSOC);
						echo $approved['username'];
					} else {
						echo '';
					}
					?>
				</td>
				<td><?php echo $das['id_sortir_baru'] ?></td>
				<td>
					<?php 
					$status = $das['status'];
					if ($status == -1) {
						echo "Rejected";
					} elseif ($status == 0) {
						echo "Pending";
					} elseif ($status == 1) {
						echo "Accepted";
					} 
					?>
				</td>
				<td>
					<?php if(!$das['id_laporan']) { ?> 
						<!-- <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#modelId-<?php echo $das['id_sortir_baru'] ?>">
							Tambah Manual Data
						</button> -->
						<div class="modal fade" id="modelId-<?php echo $das['id_sortir_baru'] ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title">Tambah Manual Data</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
								</div>
								<form action="<?php echo base_url('main/post_laporan_root/'.$das['id_sortir_baru']); ?>" method="post">
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
					<?php } ?>
					<!-- Detail -->
					<!-- <button type="button" class="btn btn-light btn-sm" data-toggle="modal" data-target="#modelIdBaru-<?php echo $das['id_sortir_baru'] ?>">
						<i class="fa fa-eye" aria-hidden="true"></i>
					</button> -->
					<!-- Button trigger modal -->
					<!-- Modal -->
					<div class="modal fade" id="modelIdBaru-<?php echo $das['id_sortir_baru'] ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
						<div class="modal-dialog modal-lg modal-fullscreen" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title">Modal title</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
								</div>
								<div class="modal-body">
								<table class="table table-bordered table-responsive" id="myTablePrintAble">
									<thead class="text-center">
									<tr>
									<!-- <th style="width: 40px;" rowspan="2">NO.</th> -->
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
										<?php 
										?>
										<!-- <td><?php echo $das['id_sortir_baru'];?></td> -->
										<td><?php echo $das['kode_supplier'];?></td>
										<td><?php echo $das['nama_supplier'] ?></td>
										<td id="fresh"><?php echo $das['fresh']; 
										?></td>
										<td id="mhr">
										<?php echo $das['phrmhr'];
										?>
										</td>
										<td id="total"><?php echo $das['total']; 
										?></td>
										<td id="loss"><?php echo $das['sum_loss'];
										?>
										</td>
										<td id="qty_bb">
											<?php echo $das['qty'] ?>
										</td>
										<td id="total_nota">
											<?php 
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
											// $subsidi_normal = floatval($da['subsidi_normal']);
											echo $total_nota;
											
											?>
											</td>
											<td id="root_sebelum_subsidi"><?php echo $das['fresh'] ? $root_sebelum_subsidi = ($total_nota / $das['fresh']) : 0 ?> </td>
											<!-- Manual -->
											<td class="subsidi_normal"><?php echo $subsidi_normal = $das['subsidi_normal']  ?> </td>
											<td class="sum_subsidi_normal"><?php echo $total_subsidi_normal = $subsidi_normal * $das['fresh'] ?></td>
											<td class="sum_total_plus_subsidi"><?php echo $total_nota_pls_subsidi_normal = $total_nota + $das['subsidi_normal'] ?></td>
											<td><?php echo $das['fresh'] ? $root_setelah_subsidi_pls_nota = ($total_nota + $das['subsidi_normal']) / $das['fresh'] : 0 ?></td>
											<!-- Manual -->
											<td><?php echo $subsidi_bayar_1 = $das['subsidi_dibayar_1'] ?></td>
											<!-- Manual -->
											<td><?php echo $subsidi_bayar_2 = $das['subsidi_dibayar_2'] ?></td>
											<td class="total_subsidi"><?php echo $subsidi_bayar_3 = $subsidi_bayar_2 + $subsidi_bayar_1 ?></td>
											<td><?php echo $capshell = $das['cap_shell'] ?></td>
											<td class="total_subsidi_dibayar"><?php echo $das['fresh'] ? $total_subsidi_dibayar = $subsidi_bayar_3 * $das['fresh'] : 0 ?></td>
											<td class="total_subsidi2"><?php echo $root_setelah_subsidi_pls_nota = ($total_subsidi_dibayar + $total_nota ) ?></td>
											<td class="total_subsidi3"><?php echo $das['fresh'] ? $root_setelah_subsidi = $total_subsidi_dibayar / $das['fresh'] : 0 ?></td>
											<!-- Manual -->
											<td class="subsidi_trans"><?php echo $subsidi_trans = $das['subsidi_transport'] ?></td>
											<td class="total_subsidi_trans"><?php echo $total_subsidi_trans = $subsidi_trans * $das['total'] ?></td>
											<td class="total_laba"><?php echo $untung_rugi = (floatval($total_nota) + floatval($subsidi_normal)) - (floatval($root_setelah_subsidi_pls_nota) + floatval($total_subsidi_trans) + floatval($capshell)) ?></td>
											<td><?php $root = (floatval($total_nota) + floatval($total_subsidi_dibayar));
											if($root > 1 ) {
												echo $root_receiving = $total_nota / $das['qty'];
											} else {
												// 0;
												echo 0;
											}
											?>
										</td>
										<td></td>
										<!-- <td>0</td> -->
										<!-- <td><?php echo $das['fresh'] ? ($jbpersen / $das['fresh']) : 0 ?> %</td> -->
										</tr>
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
				</td>
			</tr>
			<?php endforeach ?>
		</tbody>
					
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
