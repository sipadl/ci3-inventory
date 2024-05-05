<div class="">
    <div class="row">
        <div class="col-md-12">
		<!-- Modal -->
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
					<th style="width: 140px;" rowspan="2"> %JB </th>
					<tr>
					<th style="width: 120px;" rowspan="1">awal</th>
					<th style="width: 120px;" rowspan="1">-/+</th>
					<th style="width: 120px;" rowspan="1">total</th>
					</tr>
				</thead>
				<tbody>
						<?php 
						$no = 1;
						$sum_total_nota = 0;
						$sum_total_subsidi_normal = 0;
						$sum_total_normal_plus_subsidi = 0;
						$sum_total_subsidi_trans = 0;
						$sum_total_total_subsidi_trans = 0;
						$sum_subsidi_dibayar = 0;
						$sum_capshell = 0;
						$sum_total_nota_plus_subsidi_dibayar = 0;
						foreach ($datax as $da) : 

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
						$sum_total_subsidi_normal += $da['subsidi_normal'] * $da['fresh'];
						$sum_total_subsidi_trans += $da['subsidi_transport'];
						$sum_total_total_subsidi_trans += $da['subsidi_transport'] * $da['total'];
						$sum_capshell += $da['cap_shell'];
						$sum_total_nota_plus_subsidi_dibayar += ($da['subsidi_dibayar_2'] + $da['subsidi_dibayar_1']) * $da['fresh'] + $total_nota;
						?>
						<tr>
							<td><?php echo $no++ ?></td>
							<td><?php echo $da['kode_supplier'] ?></td>
							<td><?php echo $da['nama_supplier'] ?></td>
							<td id="fresh"><?php echo $da['fresh']; 
							?></td>
							<td id="mhr">
							<?php echo $da['phrmhr'];
							?>
							</td>
							<td id="total"><?php echo $da['total']; 
							?></td>
							<td id="loss"><?php echo $da['sum_loss'];
							?>
							</td>
							<td id="qty_bb">
								<?php echo $da['qty'] ?>
							</td>
							<td id="total_nota">
								<?php 
								$sum_total_nota += $total_nota;
								echo $total_nota;
								
								?>
							</td>
							<td id="root_sebelum_subsidi"><?php echo $root_sebelum_subsidi = ($total_nota / $da['fresh']) ?> </td>
							<!-- Manual -->
							<td class="subsidi_normal"><?php echo $subsidi_normal = $da['subsidi_normal']  ?> </td>
							<td class="sum_subsidi_normal"><?php echo $total_subsidi_normal = $subsidi_normal * $da['fresh'] ?></td>
							<td class="sum_total_plus_subsidi"><?php echo $total_nota_pls_subsidi_normal = $total_nota + $da['subsidi_normal'] ?></td>
							<td><?php echo  $root_setelah_subsidi_pls_nota = ($total_nota + $da['subsidi_normal']) / $da['fresh'] ?></td>
							<!-- Manual -->
							<td><?php echo $subsidi_bayar_1 = $da['subsidi_dibayar_1'] ?></td>
							<!-- Manual -->
							<td><?php echo $subsidi_bayar_2 = $da['subsidi_dibayar_2'] ?></td>
							<td class="total_subsidi"><?php echo $subsidi_bayar_3 = $subsidi_bayar_2 + $subsidi_bayar_1 ?></td>
							<td><?php echo $capshell = $da['cap_shell'] ?></td>
							<td class="total_subsidi_dibayar"><?php echo $total_subsidi_dibayar = $subsidi_bayar_3 * $da['fresh'] ?></td>
							<td class="total_subsidi2"><?php echo $root_setelah_subsidi_pls_nota = ($total_subsidi_dibayar + $total_nota ) ?></td>
							<td class="total_subsidi3"><?php echo $root_setelah_subsidi = $total_subsidi_dibayar / $da['fresh'] ?></td>
							<!-- Manual -->
							<td class="subsidi_trans"><?php echo $subsidi_trans = $da['subsidi_transport'] ?></td>
							<td class="total_subsidi_trans"><?php echo $total_subsidi_trans = $subsidi_trans * $da['total'] ?></td>
							<td class="total_laba"><?php echo $untung_rugi = (floatval($total_nota) + floatval($subsidi_normal)) - (floatval($root_setelah_subsidi_pls_nota) + floatval($total_subsidi_trans) + floatval($capshell)) ?></td>
							<td><?php $root = (floatval($total_nota) + floatval($total_subsidi_dibayar));
							if($root > 1 ) {
								echo $root_receiving = $total_nota / $da['qty'];
							} else {
								// $root_receiving += 0;
								echo 0;
							}
							?>
						</td>
						<td></td>
						<!-- <td>0</td> -->
						<!-- <td><?php echo ($jbpersen / $da['fresh']) ?> %</td> -->
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
							<td></td>
							<td></td>
							<td colspan="">Total All</td>
							<td id="hasil_total_fresh">
								<?php 
								echo $total['total_fresh']
								?>
							</td>
							<td id="hasil_total_phr_mhr">
							<?php 
								echo $total['total_phrmhr']
								?>
							</td>
							<td id="hasil_total_total">
							<?php 
								echo $total['total_semua'];
								?>
							</td>
							<td id="hasil_total_qty"><?php echo $total['total_loss'] ?></td>
							<td id="hasil_total_nota"><?php echo $total['total_qty'] ?></td>
							<td><?php echo $sum_total_nota ?></td>
							<td></td>
							<td></td>
							<td><?php echo $sum_total_subsidi_normal ?></td>
							<td colspan="" id=""><?php echo $sum_total_normal_plus_subsidi ?></td>
							<td colspan=""></td>
							<td colspan=""></td>
							<td colspan=""></td>
							<td colspan="" id=""><?php echo '' ?></td>
							<td id=""><?php echo $sum_capshell ?></td>
							<td id=""><?php echo $sum_total_normal_plus_subsidi ?></td>
							<td id=""><?php echo $sum_total_nota_plus_subsidi_dibayar ?></td>
							<td id=""></td>
							<td id=""><?php echo ''?></td>
							<td id=""><?php echo $sum_total_total_subsidi_trans ?></td>
							<td id="total_laba">0</td>
							<td id=""></td>
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
							<!-- <td><?php echo $sum_total_nota ?></td> -->
							<!-- <td>Subsidi Harian</td> -->
							<td></td>
							<td colspan="2">Subsidi Harian</td>
							<td></td>
							<td><?php echo $sum_total_subsidi_normal ?></td>
							<td></td>
							<td></td>
							<td></td>
							<td><?php echo $sum_subsidi_dibayar ?></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td><?php echo $sum_total_subsidi_trans ?></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
							<td colspan="">Total All</td>
							<td id="hasil_total_fresh">
								<?php 
								echo $total['total_fresh']
								?>
							</td>
							<td id="hasil_total_phr_mhr">
							<?php 
								echo $total['total_phrmhr']
								?>
							</td>
							<td id="hasil_total_total">
							<?php 
								echo $total['total_semua'];
								?>
							</td>
							<td id="hasil_total_qty"><?php echo $total['total_loss'] ?></td>
							<td id="hasil_total_nota"><?php echo $total['total_qty'] ?></td>
							<td><?php echo $sum_total_nota ?></td>
							<td></td>
							<td></td>
							<td><?php echo $sum_total_subsidi_normal ?></td>
							<td colspan="" id=""><?php echo $sum_total_normal_plus_subsidi ?></td>
							<td colspan=""></td>
							<td colspan=""></td>
							<td colspan=""></td>
							<td colspan="" id=""><?php echo '' ?></td>
							<td id=""><?php echo $sum_capshell ?></td>
							<td id=""><?php echo $sum_total_normal_plus_subsidi ?></td>
							<td id=""><?php echo $sum_total_nota_plus_subsidi_dibayar ?></td>
							<td id=""></td>
							<td id=""><?php echo ''?></td>
							<td id=""><?php echo $sum_total_total_subsidi_trans ?></td>
							<td id="total_laba">0</td>
							<td id=""></td>
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
							<!-- <td><?php echo $sum_total_nota ?></td> -->
							<!-- <td>Subsidi Harian</td> -->
							<td></td>
							<td colspan="2">Subsidi Harian</td>
							<td></td>
							<td><?php echo $sum_total_subsidi_normal ?></td>
							<td></td>
							<td></td>
							<td></td>
							<td><?php echo $sum_subsidi_dibayar ?></td>
							<td></td>
							<td></td>
							<td></td>
							<td></td>
							<td><?php echo $sum_total_subsidi_trans ?></td>
							<td></td>
							<td></td>
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
<?php
// Check if flash data exists
if ($this->session->flashdata('success')) {
// If it does, display a success message
echo '<div class="alert alert-success my-2">' . $this->session->flashdata('success') . '</div>';
}
?>
            <table class="table" id="myTable">
                <thead>
                    <tr>
                        <th scope="col">No</th>
						<th>Id</th>
                        <th scope="col">Kode Supplier</th>
                        <th scope="col">Tanggal Input</th>
                        <th scope="col">Status</th>
                        <th scope="col">Id Bahan Baku</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
					$no = 1;
					 foreach ($bahanbaku as $ss) : 
					 ?>

                    <tr>
                        <th scope="row"><?php echo $no++ ?></th>
						<td><?php echo $ss['id_bb'] ?></td>
                        <td><?php echo $ss['supplier'] ?></td>
                        <td><?php echo $ss['tanggal'] ?></td>
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
                        <td><?php echo $ss['id_bahan_baku'] ?></td>
                        <td>
                            <div class="d-flex justify-content-">
                                <button
                                    type="button"
                                    class="btn btn-light mx-1"
                                    data-toggle="modal"
                                    data-target="<?php echo '#modelIdBB'.$ss['id'] ?>">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                    Detail Bahan Baku
                                </button>
                                <div
                                    class="modal fade"
                                    id="<?php echo 'modelIdBB'.$ss['id'] ?>"
                                    tabindex="-1"
                                    role="dialog"
                                    aria-labelledby="<?php echo '#modelIdBB'.$ss['id'] ?>"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-fullscreen modal-xl" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Form Timbang Bahan Baku</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body" id="<?php echo 'modal-print-'.$ss['id'] ?>">
                                                <div class="container-fluid">
												<div class="text-center">
													<h4>Nota Timbang Bahan Baku Rajungan</h4>
												</div>
												<div class="d-flex justify-content-between my-2">
													<div class="">Kode Supplier : <?php echo $ss['supplier'] ?></div>
													<div class="">(SD.100.1002)</div>
													<div class="">Tanggal : <?php echo $ss['tanggal'] ?></div>
												</div>
												<?php 
												$dataDaging = $this->db->query("SELECT * FROM tbl_sub_daging 
												WHERE id_bahan_baku = ".$ss['id_bahan_baku'].' order by spek desc')->result_array(); // Jika ingin dalam bentuk array asosiatif, tambahkan parameter kedua 'true'
												?>
												<table class="table-bordered w-100">
													<thead class="text-center">
														<tr class="text-center">
															<tr>
																<th rowspan="2" class="w-50">Speck Bahan</th>
																<th rowspan="2">Quantity</th>
																<th colspan="4">Daging Putih</th>
																<th colspan="4">Daging Merah</th>
															</tr>
															<tr>
																<th>Speck</th>
																<th>Bungkus</th>
																<th>T.Kotor</th>
																<th>T.Bersih</th>
																<th>Speck</th>
																<th>Bungkus</th>
																<th>T.Kotor</th>
																<th>T.Bersih</th>
															</tr>
														</tr>
													</thead>
													<tbody>
														<?php 
														$qtys = 0;
														foreach($dataDaging as $dd) { 
														$qtys += $dd['qty'];	 
														?>
															<tr>
																<!-- <td><?php echo $dd['spesifikasi_bahan'] ?></td> -->
																<td><?php echo $dd['spek'] ?></td>
																<?php if($dd['tipe'] == 0 ) { ?> 
																<td><?php echo $dd['qty'] ?></td>
																<td><?php echo $dd['spek'] ?></td>
																<td><?php echo $dd['bungkus'] ?></td>
																<td><?php echo $dd['tkotor'] ?></td>
																<td><?php echo $dd['tbersih'] ?></td>
																<td><?php echo $dd['spek2'] ?></td>
																<td><?php echo $dd['bungkus2'] ?></td>
																<td><?php echo $dd['tkotor2'] ?></td>
																<td><?php echo $dd['tbersih2'] ?></td>
																<?php }?>
																<?php if($dd['tipe'] == 1  && !$dd['spek2'] ) { ?> 
																	<td><?php echo $dd['qty'] ?></td>
																	<td></td>
																	<td></td>
																	<td></td>
																	<td></td>
																	<td><?php echo $dd['spek'] ?></td>
																	<td><?php echo $dd['bungkus'] ?></td>
																	<td><?php echo $dd['tkotor'] ?></td>
																	<td><?php echo $dd['tbersih'] ?></td>
																<?php }?>
															</tr>
														<?php } ?>
														<tr>
															<td>Total</td>
															<td colspan="9"><?php echo $qtys ?></td>
														</tr>
														<tr>
															<td colspan="2" height="90px" class="text-center">Dibuat</td>
															<td colspan="4" height="90px" class="text-center">Diperiksa</td>
															<td colspan="4" height="90px" class="text-center">Disetujui</td>
														</tr>
													</tbody>
												</table>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <!-- <a href="<?php echo base_url('main/mainApprove/').$ss['id']; ?>" class="btn
                                                    btn-primary">Aprove</a> <a href="<?php echo
                                                    base_url('main/mainReject/').$ss['id']; ?>" class="btn btn-danger">Reject</a>
                                                    -->
                                                    <!-- <button type="button" onclick="printDisini(<?php echo $ss['id'] ?>)"
                                                    class="btn btn-primary">Print</a> -->
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php if($ss['id_bb'] != null ) { ?>
                                    <button
                                        type="button"
                                        class="btn btn-light mx-1"
                                        data-toggle="modal"
                                        data-target="<?php echo '#modelId'.$ss['id_bb'] ?>">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                        Detail Sortir
                                    </button>
                                    <?php } ?>
									<a href="<?php echo '' ?>" class="btn btn-warning mx-1">
									Approve</a>
                                    <!-- <?php if($ss['id_bb'] == null ) { ?>
                                    <button
                                        type="button"
                                        class="btn btn-primary mx-1"
                                        data-toggle="modal"
                                        data-target="#myModal"
                                        onclick="isiId(<?php echo $ss['id_bahan_baku'] ?>)">
                                        Tambah Sortir
                                    </button>
                                    <?php } ?> -->
                                    <?php if($ss['id_bb'] != null && $ss['tanggal_rec3'] == null && $ss['status'] == 0 ) { ?>
                                    <!-- <button
                                        type="button"
                                        class="btn btn-warning mx-1"
                                        data-toggle="modal"
                                        data-target="#myModalUbah-<?php echo $ss['id_bb'] ?>">
                                        Ubah Data
                                    </button> -->

                                    <!-- Modal Ubah -->
                                    <div
                                        class="modal fade"
                                        id="myModalUbah-<?php echo $ss['id_bb'] ?>"
                                        tabindex="-1"
                                        role="dialog"
                                        aria-labelledby="modelTitleId"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-xl modal-fullscreen" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Modal Ubah Form Sortir</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form id="sortiresUpdate" method="post">
                                                        <div class="modal-body">
                                                            <div class="container">
                                                                <div class="row">
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label for="kode_supplier">Kode Supplier</label>
                                                                            <input
                                                                                type="text"
                                                                                name="kode_supplier"
                                                                                class="form-control"
                                                                                readonly="readonly"
                                                                                value="<?php

																			echo $ss['supplier'] ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label for="tanggal_kirim">Tanggal SJ</label>
                                                                            <input
                                                                                type="date"
                                                                                class="form-control"
                                                                                id="tanggal_sj"
                                                                                name="tanggal_sj"
                                                                                value="<?php echo $ss['tanggal_sj'] ?>"
                                                                                placeholder="01-01-2024">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label for="tanggal_rec">Tanggal Rec</label>
                                                                            <input
                                                                                type="date"
                                                                                class="form-control"
                                                                                id="tanggal_rec"
                                                                                name="tanggal_rec"
                                                                                value="<?php echo $ss['tanggal_rec'] ?>"
                                                                                placeholder="01-01-2024">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label for="number">Number</label>
                                                                            <input
                                                                                type="number"
                                                                                class="form-control"
                                                                                id="number"
                                                                                readonly="readonly"
                                                                                name="number"
                                                                                min="0"
                                                                                value="<?php echo $ss['id'] ?>"
                                                                                placeholder="0">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row" id="hehe">
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label for="col">COL</label>
                                                                            <input
                                                                                type="text"
                                                                                min="0"
                                                                                value="<?php echo $ss['col'] ?>"
                                                                                class="form-control"
                                                                                id="col"
                                                                                name="col">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label for="bf">BF</label>
                                                                            <input
                                                                                type="text"
                                                                                min="0"
                                                                                class="form-control"
                                                                                value="<?php echo $ss['bf'] ?>"
                                                                                id="bf"
                                                                                name="bf">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label for="jb">JB</label>
                                                                            <input
                                                                                type="text"
                                                                                min="0"
                                                                                class="form-control"
                                                                                id="jb"
                                                                                value="<?php echo $ss['jb'] ?>"
                                                                                name="jb">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label for="jb_bf">JB BF</label>
                                                                            <input
                                                                                type="text"
                                                                                min="0"
                                                                                class="form-control"
                                                                                id="jb_bf"
                                                                                value="<?php echo $ss['jb_bf'] ?>"
                                                                                name="jb_bf">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label for="jb_bf">JBB JK</label>
                                                                            <input
                                                                                type="text"
                                                                                min="0"
                                                                                class="form-control"
                                                                                id="jbb_jk"
                                                                                value="<?php echo $ss['jbb_jk'] ?>"
                                                                                name="jbb_jk">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label for="jb_bf">JBB JF</label>
                                                                            <input
                                                                                type="text"
                                                                                min="0"
                                                                                class="form-control"
                                                                                id="jbb_jf"
                                                                                value="<?php echo $ss['jbb_jf'] ?>"
                                                                                name="jbb_jf">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label for="jb_bf">XLP</label>
                                                                            <input
                                                                                type="text"
                                                                                min="0"
                                                                                class="form-control"
                                                                                id="xlp"
                                                                                value="<?php echo $ss['xlp'] ?>"
                                                                                name="xlp">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label for="jb_bf">BF K3 COL</label>
                                                                            <input
                                                                                type="text"
                                                                                min="0"
                                                                                class="form-control"
                                                                                id="bf_k3_col"
                                                                                value="<?php echo $ss['bf_k3_col'] ?>"
                                                                                name="bf_k3_col">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label for="jb_bf">BF K3 JB</label>
                                                                            <input
                                                                                type="text"
                                                                                min="0"
                                                                                class="form-control"
                                                                                id="bf_k3_jb"
                                                                                value="<?php echo $ss['bf_k3_jb'] ?>"
                                                                                name="bf_k3_jb">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label for="jb_bf">BF K3 JK</label>
                                                                            <input
                                                                                type="text"
                                                                                min="0"
                                                                                class="form-control"
                                                                                id="bf_k3_jk"
                                                                                value="<?php echo $ss['bf_k3_jk'] ?>"
                                                                                name="bf_k3_jk">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label for="jb_bf">BF K3 JL</label>
                                                                            <input
                                                                                type="text"
                                                                                min="0"
                                                                                class="form-control"
                                                                                id="bf_k3_jl"
                                                                                value="<?php echo $ss['bf_k3_jl'] ?>"
                                                                                name="bf_k3_jl">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label for="jb_bf">BF JL</label>
                                                                            <input
                                                                                type="text"
                                                                                min="0"
                                                                                class="form-control"
                                                                                id="bf_jl"
                                                                                value="<?php echo $ss['bf_jl'] ?>"
                                                                                name="bf_jl">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label for="jb_bf">BF KJ</label>
                                                                            <input
                                                                                type="text"
                                                                                min="0"
                                                                                class="form-control"
                                                                                id="bf_kj"
                                                                                value="<?php echo $ss['bf_kj'] ?>"
                                                                                name="bf_kj">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label for="jb_bf">BF BF</label>
                                                                            <input
                                                                                type="text"
                                                                                min="0"
                                                                                class="form-control"
                                                                                id="bf_bf"
                                                                                value="<?php echo $ss['bf_bf'] ?>"
                                                                                name="bf_bf">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label for="jb_bf">BF LP SLB</label>
                                                                            <input
                                                                                type="text"
                                                                                min="0"
                                                                                class="form-control"
                                                                                id="bf_lp_slb"
                                                                                value="<?php echo $ss['bf_lp_slb'] ?>"
                                                                                name="bf_lp_slb">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label for="jb_bf">BF SP</label>
                                                                            <input
                                                                                type="text"
                                                                                min="0"
                                                                                class="form-control"
                                                                                id="bf_sp"
                                                                                value="<?php echo $ss['bf_sp'] ?>"
                                                                                name="bf_sp">
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label for="">BF SPK XLP</label>
                                                                            <input
                                                                                type="text"
                                                                                min="0"
                                                                                class="form-control"
                                                                                id="BF SPK XLP"
                                                                                value="<?php echo $ss['bf_spk_xlp'] ?>"
                                                                                name="bf_spk xlp">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label for="">BF SPK SP</label>
                                                                            <input
                                                                                type="text"
                                                                                min="0"
                                                                                class="form-control"
                                                                                id="BF SPK SP"
                                                                                value="<?php echo $ss['bf_spk_sp'] ?>"
                                                                                name="bf_spk sp">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label for="">SPK SP JB</label>
                                                                            <input
                                                                                type="text"
                                                                                min="0"
                                                                                class="form-control"
                                                                                id="SPK SP JB"
                                                                                value="<?php echo $ss['spk_sp'] ?>"
                                                                                name="spk_sp jb">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label for="">SPK SP XLP</label>
                                                                            <input
                                                                                type="text"
                                                                                min="0"
                                                                                class="form-control"
                                                                                id="SPK SP XLP"
                                                                                value="<?php echo $ss['spk_sp'] ?>"
                                                                                name="spk_sp xlp">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label for="">SPK SP BFP</label>
                                                                            <input
                                                                                type="text"
                                                                                min="0"
                                                                                class="form-control"
                                                                                id="SPK SP BFP"
                                                                                value="<?php echo $ss['spk_sp'] ?>"
                                                                                name="spk_sp bfp">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label for="">SPK SP</label>
                                                                            <input
                                                                                type="text"
                                                                                min="0"
                                                                                class="form-control"
                                                                                id="SPK SP"
                                                                                value="<?php echo $ss['spk_sp'] ?>"
                                                                                name="spk_sp">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label for="">SP SPH</label>
                                                                            <input
                                                                                type="text"
                                                                                min="0"
                                                                                class="form-control"
                                                                                id="SP SPH"
                                                                                value="<?php echo $ss['sp_sph'] ?>"
                                                                                name="sp_sph">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label for="">SP CL</label>
                                                                            <input
                                                                                type="text"
                                                                                min="0"
                                                                                class="form-control"
                                                                                id="SP CL"
                                                                                value="<?php echo $ss['sp_cl'] ?>"
                                                                                name="sp_cl">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label for="">SP CLF</label>
                                                                            <input
                                                                                type="text"
                                                                                min="0"
                                                                                class="form-control"
                                                                                id="SP CLF"
                                                                                value="<?php echo $ss['sp_clf'] ?>"
                                                                                name="sp_clf">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label for="">MH</label>
                                                                            <input
                                                                                type="text"
                                                                                min="0"
                                                                                class="form-control"
                                                                                id="MH"
                                                                                value="<?php echo $ss['mh'] ?>"
                                                                                name="mh">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label for="">MH SLB</label>
                                                                            <input
                                                                                type="text"
                                                                                min="0"
                                                                                class="form-control"
                                                                                id="MH SLB"
                                                                                value="<?php echo $ss['mh_slb'] ?>"
                                                                                name="mh_slb">
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <h5>Receiving</h5>
                                                                            <hr>
                                                                        </div>
                                                                        <div class="col-md-3">

                                                                            <div class="form-group">
                                                                                <label for="">BASI COL</label>
                                                                                <input
                                                                                    type="text"
                                                                                    min="0"
                                                                                    class="form-control"
                                                                                    id="BASI COL"
                                                                                    value="<?php echo $ss['basi_col'] ?>"
                                                                                    name="basi_col">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <div class="form-group">
                                                                                <label for="">BASI JB</label>
                                                                                <input
                                                                                    type="text"
                                                                                    min="0"
                                                                                    class="form-control"
                                                                                    id="BASI JB"
                                                                                    value="<?php echo $ss['basi_jb'] ?>"
                                                                                    name="basi_jb">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <div class="form-group">
                                                                                <label for="">BASI JK</label>
                                                                                <input
                                                                                    type="text"
                                                                                    min="0"
                                                                                    class="form-control"
                                                                                    id="BASI JK"
                                                                                    value="<?php echo $ss['basi_jk'] ?>"
                                                                                    name="basi_jk">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <div class="form-group">
                                                                                <label for="">BASI XLP</label>
                                                                                <input
                                                                                    type="text"
                                                                                    min="0"
                                                                                    class="form-control"
                                                                                    id="BASI XLP"
                                                                                    value="<?php echo $ss['basi_xlp'] ?>"
                                                                                    name="basi_xlp">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <div class="form-group">
                                                                                <label for="">BASI BF</label>
                                                                                <input
                                                                                    type="text"
                                                                                    min="0"
                                                                                    class="form-control"
                                                                                    id="BASI BF"
                                                                                    value="<?php echo $ss['basi_bf'] ?>"
                                                                                    name="basi_bf">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <div class="form-group">
                                                                                <label for="">BASI SP</label>
                                                                                <input
                                                                                    type="text"
                                                                                    min="0"
                                                                                    class="form-control"
                                                                                    id="BASI SP"
                                                                                    value="<?php echo $ss['basi_sp'] ?>"
                                                                                    name="basi_sp">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <div class="form-group">
                                                                                <label for="">BASI CL</label>
                                                                                <input
                                                                                    type="text"
                                                                                    min="0"
                                                                                    class="form-control"
                                                                                    id="BASI CL"
                                                                                    value="<?php echo $ss['basi_cl'] ?>"
                                                                                    name="basi_cl">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <div class="form-group">
                                                                                <label for="">BASI MH</label>
                                                                                <input
                                                                                    type="text"
                                                                                    min="0"
                                                                                    class="form-control"
                                                                                    id="BASI MH"
                                                                                    value="<?php echo $ss['basi_mh'] ?>"
                                                                                    name="basi_mh">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <h5>Sortir</h5>
                                                                            <hr>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <div class="form-group">
                                                                                <label for="">BASI COL</label>
                                                                                <input
                                                                                    type="text"
                                                                                    min="0"
                                                                                    class="form-control"
                                                                                    id="BASI COL"
                                                                                    value="<?php echo $ss['basi_col'] ?>"
                                                                                    name="basi_col">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <div class="form-group">
                                                                                <label for="">BASI JB</label>
                                                                                <input
                                                                                    type="text"
                                                                                    min="0"
                                                                                    class="form-control"
                                                                                    id="BASI JB"
                                                                                    value="<?php echo $ss['basi_jb'] ?>"
                                                                                    name="basi_jb">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <div class="form-group">
                                                                                <label for="">BASI JK</label>
                                                                                <input
                                                                                    type="text"
                                                                                    min="0"
                                                                                    class="form-control"
                                                                                    id="BASI JK"
                                                                                    value="<?php echo $ss['basi_jk'] ?>"
                                                                                    name="basi_jk">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <div class="form-group">
                                                                                <label for="">BASI XLP</label>
                                                                                <input
                                                                                    type="text"
                                                                                    min="0"
                                                                                    class="form-control"
                                                                                    id="BASI XLP"
                                                                                    value="<?php echo $ss['basi_xlp'] ?>"
                                                                                    name="basi_xlp">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <div class="form-group">
                                                                                <label for="">BASI BF</label>
                                                                                <input
                                                                                    type="text"
                                                                                    min="0"
                                                                                    class="form-control"
                                                                                    id="BASI BF"
                                                                                    value="<?php echo $ss['basi_bf'] ?>"
                                                                                    name="basi_bf">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <div class="form-group">
                                                                                <label for="">BASI SP</label>
                                                                                <input
                                                                                    type="text"
                                                                                    min="0"
                                                                                    class="form-control"
                                                                                    id="BASI SP"
                                                                                    value="<?php echo $ss['basi_sp'] ?>"
                                                                                    name="basi_sp">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <div class="form-group">
                                                                                <label for="">BASI CL</label>
                                                                                <input
                                                                                    type="text"
                                                                                    min="0"
                                                                                    class="form-control"
                                                                                    id="BASI CL"
                                                                                    value="<?php echo $ss['basi_cl'] ?>"
                                                                                    name="basi_cl">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <div class="form-group">
                                                                                <label for="">BASI MH</label>
                                                                                <input
                                                                                    type="text"
                                                                                    min="0"
                                                                                    class="form-control"
                                                                                    id="BASI MH"
                                                                                    value="<?php echo $ss['basi_mh'] ?>"
                                                                                    name="basi_mh">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <div class="form-group">
                                                                                <label for="">AIR</label>
                                                                                <input
                                                                                    type="text"
                                                                                    min="0"
                                                                                    class="form-control"
                                                                                    id="AIR"
                                                                                    value="<?php echo $ss['air'] ?>"
                                                                                    name="air">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <div class="form-group">
                                                                                <label for="">SHELL</label>
                                                                                <input
                                                                                    type="text"
                                                                                    min="0"
                                                                                    class="form-control"
                                                                                    id="SHELL"
                                                                                    value="<?php echo $ss['shell'] ?>"
                                                                                    name="shell">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <div class="form-group">
                                                                                <label for="">LOSS</label>
                                                                                <input
                                                                                    type="text"
                                                                                    min="0"
                                                                                    class="form-control"
                                                                                    id="LOSS"
                                                                                    value="<?php echo $ss['loss'] ?>"
                                                                                    name="loss">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
																			<label for="">Cap</label>
																			<select type="text" min="0" class="form-control" id="SHELL" name="cap">
																				<option value="ya">Ya</option>
																				<option value="Tidak">Tidak</option>
																			</select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="">Potong</label>
                                                                                <input
                                                                                    type="text"
                                                                                    min="0"
                                                                                    class="form-control"
                                                                                    id="LOSS"
                                                                                    value="<?php echo $ss['potong'] ?>"
                                                                                    name="potong">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button
                                                            type="button"
                                                            onclick="SimpanSortirUpdate(event ,true, <?php echo $ss['id_sortir'] ?>)"
                                                            class="btn btn-primary">Simpan</button>
                                                        <button
                                                            type="button"
                                                            onclick="SimpanSortirUpdate(event, false, <?php echo $ss['id_sortir'] ?>)"
                                                            class="btn btn-primary">Simpan Sementara</button>
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                            <!-- Modal Detail -->
                            <div
                                class="modal fade"
                                id="<?php echo 'modelId'.$ss['id_bb'] ?>"
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
                                        <div class="modal-body" id="modal-print-<?php echo $ss['id'] ?>">
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
                                                            <?php echo $ss['tanggal_sj']; ?>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-between  border px-2">
                                                        <div class="">TGL Rec</div>
                                                        <div class="">
                                                            <?php echo $ss['tanggal_rec']; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <p style="text-align: center;">SD.100.3001 / <?php echo $ss['id'] ?></p>
                                                  
                                                </div>
                                                <div class="col-md-3">
                                                    <!-- <form action="<?php echo
                                                    base_url('main/updateMiniSortir/'.$ss['id_sortir']) ?>" method="post"> -->

                                                    <div class="d-flex justify-content-between  border px-2">
                                                        <div class="">Cap</div>
                                                        <div class="">
                                                            <?php echo $ss['cap'] ?>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex justify-content-between  border px-2">
                                                        <div class="mt-2">Potong</div>
                                                        <div class="ml-2 py-2">
                                                            <?php echo $ss['potong'] ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <!-- <form action="<?php echo
                                                    base_url('main/updateMiniSortir/'.$ss['id_sortir']) ?>" method="post"> -->

                                                    <div class="d-flex justify-content-between  border px-2">
                                                        <div class="">SHELL</div>
                                                        <div class="">PHR</div>
                                                        <div class="">MHR</div>
                                                     
                                                    </div>
                                                    <div class="d-flex justify-content-between  border px-2">
                                                    <div class="">KERAS</div>
                                                        <div class=""><?php echo $ss['shell_phr_keras'] ?></div>
                                                        <div class=""><?php echo $ss['shell_mhr_keras'] ?></div>
                                                    </div>
                                                    <div class="d-flex justify-content-between  border px-2">
														<div class="">HALUS</div>
														<div class=""><?php echo $ss['shell_phr_halus'] ?></div>
														<div class=""><?php echo $ss['shell_mhr_halus'] ?></div>
                                                    </div>
                                                    <div class="d-flex justify-content-between  border px-2">
                                                    <div class="">TOTAL</div>
                                                        <div class=""><?php echo floatval($ss['shell_phr_keras']) + floatval($ss['shell_phr_halus']) ?></div>
                                                        <div class=""><?php echo floatval($ss['shell_mhr_keras']) + floatval($ss['shell_mhr_halus']) ?></div>
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
                                                <table class="table table-bordered mt-4 tbl-spesial">
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
                                                            <th colspan=""><?php echo $ss['tanggal_rec'] ?></th>
                                                            <th colspan=""><?php echo $ss['tanggal_rec2'] ?></th>
                                                            <th colspan=""><?php echo $ss['tanggal_rec3'] ?></th>
                                                            <th colspan="" width="10%"><?php echo $ss['tanggal_rec'] ?></th>
                                                            <th colspan="" width="10%"><?php echo $ss['tanggal_rec2'] ?></th>
                                                            <th colspan=""><?php echo $ss['tanggal_rec3'] ?></th>
                                                            <th colspan="" width="10%"></th>
                                                            <th colspan=""></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <!-- COL -->
                                                        <tr>
                                                            <td rowspan="2">COL</td>
                                                            <td>COL</td>
                                                            <td width="10%"><?php echo $ss['col'] ?></td>
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
                                                            <td width="10%"><?php echo $ss['bf'] ?></td>
                                                            <td width="10%"></td>
                                                            <td width="10%"></td>
                                                            <td width="10%" colspan="2"></td>
                                                            <td colspan="2">PHR</td>
                                                            <td><?php echo $ss['phr'] ?></td>
                                                            <td class="bg-light" style="background-color: gray"></td>
                                                            <td class="bg-light" style="background-color: gray"></td>
                                                            <td class="bg-light" style="background-color: gray"></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2">Total COL</td>
                                                            <td>
                                                            <?php $sum = floatval($ss['col']) + floatval($ss['bf']);
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
                                                            <td><?php echo $ss['basi_col'] ?></td>
                                                            <td class="bg-light" style="background-color: gray"></td>
                                                            <td class="bg-light" style="background-color: gray"></td>
                                                            <td class="bg-light" style="background-color: gray"></td>
                                                            <td></td>
                                                        </tr>

                                                        <!-- JB -->
                                                        <tr>
                                                            <td rowspan="2">JB</td>
                                                            <td>JB</td>
                                                            <td><?php echo $ss['jb'] ?></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td colspan="2"></td>
                                                            <td>JK</td>
                                                            <td><?php echo $ss['basi_jk'] ?></td>
                                                            <td class="bg-light" style="background-color: gray"></td>
                                                            <td class="bg-light" style="background-color: gray"></td>
                                                            <td class="bg-light" style="background-color: gray"></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td>BF</td>
                                                            <td><?php echo $ss['jb_bf'] ?></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td colspan="2"></td>
                                                            <td>XLP</td>
                                                            <td><?php echo $ss['basi_xlp'] ?></td>
                                                            <td class="bg-light" style="background-color: gray"></td>
                                                            <td class="bg-light" style="background-color: gray"></td>
                                                            <td class="bg-light" style="background-color: gray"></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2">Total JB</td>
                                                            <td>
                                                            <?php $sum = floatval($ss['jb_bf']) + floatval($ss['jb']);
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
                                                            <td><?php echo $ss['basi_bf'] ?></td>
                                                            <td class="bg-light" style="background-color: gray"></td>
                                                            <td class="bg-light" style="background-color: gray"></td>
                                                            <td class="bg-light" style="background-color: gray"></td>
                                                            <td></td>
                                                        </tr>
                                                        <!-- JK -->
                                                        <tr>
                                                            <td rowspan="2">JK</td>
                                                            <td>JK</td>
                                                            <td><?php echo $ss['jbb_jk'] ?></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td colspan="2"></td>
                                                            <td>SP</td>
                                                            <td><?php echo $ss['basi_sp'] ?></td>
                                                            <td class="bg-light" style="background-color: gray"></td>
                                                            <td class="bg-light" style="background-color: gray"></td>
                                                            <td class="bg-light" style="background-color: gray"></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td>BF</td>
                                                            <td><?php echo $ss['jbb_jf'] ?></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td colspan="2"></td>
                                                            <td colspan="2">Total PHR</td>
                                                            <td>
                                                            <?php $sum = floatval($ss['basi_sp']) + floatval($ss['basi_bf']) +  floatval($ss['basi_xlp']) + floatval($ss['basi_jk']) + floatval($ss['basi_col']);
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
                                                            <?php $sum = floatval($ss['jbb_jf']) + floatval($ss['jbb_jk']);
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
                                                            <td><?php echo $ss['mhr'] ?></td>
                                                            <td></td>
                                                            <td class="bg-light" style="background-color: gray"></td>
                                                            <td class="bg-light" style="background-color: gray"></td>
                                                            <td class="bg-light" style="background-color: gray"></td>
                                                            <td></td>
                                                        </tr>
                                                        <!-- XLP -->
                                                        <tr>
                                                            <td colspan="2">XLP</td>
                                                            <td><?php echo $ss['xlp'] ?></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td colspan="2"></td>
                                                            <td colspan="1" rowspan="2">BASI</td>
                                                            <td>CL</td>
                                                            <td><?php echo $ss['basi_cl'] ?></td>
                                                            <td class="bg-light" style="background-color: gray"></td>
                                                            <td class="bg-light" style="background-color: gray"></td>
                                                            <td class="bg-light" style="background-color: gray"></td>
                                                            <td></td>
                                                        </tr>
                                                        <!-- BF K3 -->
                                                        <tr>
                                                            <td rowspan="8">BF</td>
                                                            <td>K3 COL</td>
                                                            <td><?php echo $ss['bf_k3_col'] ?></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td colspan="2"></td>
                                                            <td>MH</td>
                                                            <td><?php echo $ss['basi_mh'] ?></td>
                                                            <td class="bg-light" style="background-color: gray"></td>
                                                            <td class="bg-light" style="background-color: gray"></td>
                                                            <td class="bg-light" style="background-color: gray"></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td>K3 JB</td>
                                                            <td><?php echo $ss['bf_k3_jb'] ?></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td colspan="2"></td>
                                                            <td colspan="2">TOTAL MHR</td>
                                                            <td>
                                                            <?php $sum = floatval($ss['basi_mh']) + floatval($ss['basi_cl']);
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
                                                            <td><?php echo $ss['bf_k3_jk'] ?></td>
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
                                                            <td><?php echo $ss['bf_jl'] ?></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td colspan="2"></td>
                                                            <td>PHR</td>
                                                            <td><?php echo $ss['phr'] ?></td>
                                                            <td class="bg-light" style="background-color: gray"></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td>KJ</td>
                                                            <td><?php echo $ss['bf_kj'] ?></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td colspan="2"></td>
                                                            <td colspan="1" rowspan="6">BASI</td>
                                                            <td>COL</td>
                                                            <td class="bg-light" style="background-color: gray"></td>
                                                            <td><?php echo $ss['basi_col'] ?></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td>BF</td>
                                                            <td><?php echo $ss['bf_bf'] ?></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td colspan="2"></td>
                                                            <td>JB</td>
                                                            <td class="bg-light" style="background-color: gray"></td>
                                                            <td><?php echo $ss['basi_jb'] ?></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td>LP SLB</td>
                                                            <td><?php echo $ss['bf_lp_slb'] ?></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td colspan="2"></td>
                                                            <td>JK</td>
                                                            <td class="bg-light" style="background-color: gray"></td>

                                                            <td><?php echo $ss['basi_jk'] ?></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td>SP</td>
                                                            <td><?php echo $ss['bf_sp'] ?></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td colspan="2"></td>
                                                            <td>XLP</td>
                                                            <td class="bg-light" style="background-color: gray"></td>

                                                            <td><?php echo $ss['basi_xlp'] ?></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2">Total BF</td>
                                                            <td>
                                                            <?php 
																	$sum = floatval($ss['bf_k3_col']) + floatval($ss['bf_k3_jb']) + floatval($ss['bf_k3_jl']) + floatval($ss['bf_k3_jk']) + floatval($ss['bf_bf']) + floatval($ss['bf_lp_slb']) + floatval($ss['bf_sp']);
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

                                                            <td><?php echo $ss['basi_bf'] ?></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <!-- SPK -->
                                                        <tr>
                                                            <td rowspan="2">SPK</td>
                                                            <td>XLP</td>
                                                            <td><?php echo $ss['bf_spk_xlp'] ?></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td colspan="2"></td>
                                                            <td>SP</td>
                                                            <td class="bg-light" style="background-color: gray"></td>

                                                            <td><?php echo $ss['basi_sp'] ?></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td>SP</td>
                                                            <td><?php echo $ss['bf_spk_sp'] ?></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td colspan="2"></td>
                                                            <td colspan="2">Total PHR</td>
                                                            <td class="bg-light" style="background-color: gray"></td>
                                                            <td>
                                                            <?php
																	$sum = floatval($ss['basi_sp']) + floatval($ss['basi_bf']) + floatval($ss['basi_jb']) + floatval($ss['basi_xlp']) + floatval($ss['basi_jk']) + floatval($ss['basi_col']);
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
                                                            <?php $sum = floatval($ss['bf_spk_xlp']) + floatval($ss['bf_spk_sp']);
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
                                                            <td><?php echo $ss['mhr'] ?></td>
                                                            <td class="bg-light" style="background-color: gray"></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <!-- SP -->
                                                        <tr>
                                                            <td rowspan="4">SP</td>
                                                            <td>JB</td>
                                                            <td><?php echo $ss['spk_sp_jb'] ?></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td colspan="2"></td>
                                                            <td colspan="1" rowspan="2">BASI</td>
                                                            <td>CL</td>
                                                            <td class="bg-light" style="background-color: gray"></td>

                                                            <td><?php echo $ss['basi_cl'] ?></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td>XLP</td>
                                                            <td><?php echo $ss['spk_sp_xlp'] ?></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td colspan="2"></td>
                                                            <td>MH</td>
                                                            <td class="bg-light" style="background-color: gray"></td>

                                                            <td><?php echo $ss['basi_mh'] ?></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td>BF</td>
                                                            <td><?php echo $ss['spk_sp_bfp'] ?></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td colspan="2"></td>
                                                            <td colspan="2">Total MHR</td>
                                                            <td class="bg-light" style="background-color: gray"></td>
                                                            <td>
                                                            <?php $sum = floatval($ss['basi_mh']) + floatval($ss['basi_cl']);
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
                                                            <td><?php echo $ss['spk_sp_sph'] ?></td>
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
                                                            <?php $sum = floatval($ss['spk_sp_jb']) + floatval($ss['spk_sp_xlp']) + floatval($ss['spk_sp_bfp']) + floatval($ss['spk_sp_sph']);
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
                                                            <td><?php echo $ss['spk_sp_sph'] ?></td>
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
                                                            <td><?php echo $ss['sp_cl'] ?></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td colspan="2"></td>
                                                            <td>AIR</td>
                                                            <td><?php echo $ss['air'] ?></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2">CLF</td>
                                                            <td><?php echo $ss['sp_clf'] ?></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td colspan="2"></td>
                                                            <td>SHELL</td>
                                                            <td><?php echo $ss['shell'] ?></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>

                                                        </tr>
                                                        <tr>
                                                            <td rowspan="2">MH</td>
                                                            <td>MH</td>
                                                            <td><?php echo $ss['mh'] ?></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td colspan="2"></td>
                                                            <td>LOSS</td>
                                                            <td><?php echo $ss['loss'] ?></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td>MH</td>
                                                            <td><?php echo $ss['mh_slb'] ?></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td colspan="2"></td>
                                                            <td colspan="2">Timb. Kotor</td>
                                                            <td>
                                                            <?php
																	$sum = floatval($ss['col']) + floatval($ss['bf']) + floatval($ss['jb']) + floatval($ss['jb_bf']) + floatval($ss['jbb_jk']) + floatval($ss['jbb_bf']) +
																	floatval($ss['xlp']) + floatval($ss['bf_k3_col']) + floatval($ss['bf_k3_jb']) + floatval($ss['bf_k3_jk']) + floatval($ss['bf_k3_jl']) +
																	floatval($ss['bf_jl']) + floatval($ss['bf_kj']) + floatval($ss['bf_bf']) + floatval($ss['bf_lp_slb']) + floatval($ss['bf_sp']) +
																	floatval($ss['bf_spk_xlp']) + floatval($ss['bf_spk_sp']) + floatval($ss['spk_sp_jb']) + floatval($ss['spk_sp_xlp']) +
																	floatval($ss['spk_sp_bfp']) + floatval($ss['spk_sp_sph']) + floatval($ss['sp_cl']) + floatval($ss['sp_clf']) + floatval($ss['mh']) +
																	floatval($ss['mh_slb']) + floatval($ss['phr']) + floatval($ss['basi_col']) + floatval($ss['basi_jb']) + floatval($ss['basi_jk']) +
																	floatval($ss['basi_xlp']) + floatval($ss['basi_bf']) + floatval($ss['basi_sp']) + floatval($ss['mhr']) + floatval($ss['basi_cl']) +
																	floatval($ss['basi_mh']) +
																	floatval($ss['timbangan_bb']) + floatval($ss['jbb_jf']) + floatval($ss['spk_sp']) + floatval($ss['sp_sph']);
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
                                                            <?php $sum = floatval($ss['mh']) + floatval($ss['mh_slb']);
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
															$colX = (floatval($ss['col']) + floatval($ss['bf']));
															$jbX = (floatval($ss['jb']) + floatval($ss['jbb_jf']));
															$jkX = (floatval($ss['jbb_jk']) + floatval($ss['jbb_bf']));
															$bfX = (floatval($ss['bf_k3_col']) + floatval($ss['bf_k3_jb']) + floatval($ss['bf_k3_jk'])
															+ floatval($ss['bf_k3_jl']) + floatval($ss['bf_jl']) + floatval($ss['bf_bf']) + floatval($ss['bf_bf']) + floatval($ss['bf_kj']));
															$spkX = (floatval($ss['spk_sp_jb']) +  floatval($ss['spk_sp_bfp']) + floatval($ss['spk_sp_sph']));
															$spX = (floatval($ss['bf_spk_xlp']) + floatval($ss['bf_spk_sp']));
															$mhX = (floatval($ss['mh']) + floatval($ss['mh_slb']));
															$clX = floatval($ss['sp_cl']);
															$clfX = floatval($ss['sp_clf']);
															$mhr = floatval($ss['mh']) + floatval($ss['mh_slb']);
															$phr = floatval($ss['basi_sp']) + floatval($ss['basi_bf']) + floatval($ss['basi_xlp']) + floatval($ss['basi_jk']) + floatval($ss['basi_col']);
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
												<table class="table table-bordered mt-3">
												<tr>
													<td colspan="3" height="90px" class="text-center">Dibuat</td>
													<td colspan="4" height="90px" class="text-center">Diperiksa</td>
													<td colspan="4" height="90px" class="text-center">Diketahui</td>
													<td colspan="3" height="90px" class="text-center">Disetujui</td>
												</tr>
												</table>
                                            </div>
                                            <p>Note: <?php echo $ss['note'] ?></p>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
										<?php if($ss['status'] == 4) { ?>
										<a href="<?php echo
                                        base_url('main/approveSortirTL/'.$ss['id_sortir'].'/5'); ?>" class="btn
                                        btn-primary">Approve</a> <?php } ?>
                                        <button class="btn btn-primary" onclick="printDisini(<?php echo $ss['id'] ?>)">Print</button>

                                    </div>
                                </div>
                            </td>
                            <!-- Modal Tambah -->
                            <div class="modal fade" id="myModal">
                                <div class="modal-dialog modal-xl modal-fullscreen">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Form Sortir</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <form
                                            id="sortires"
                                            method="post"
                                            action="<?php echo base_url('main/fullsortirPost') ?>">
											
                                            <div class="modal-body">
                                                <div class="container">
                                                    <input type="hidden" name="id_bb" id="getId" value="<?php echo $ss['id_bahan_baku'] ?>">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="kode_supplier">Kode Supplier</label>
                                                                <input
                                                                    type="text"
                                                                    name="kode_supplier"
                                                                    class="form-control"
                                                                    readonly="readonly"
                                                                    value="<?php echo $ss['supplier'] ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="tanggal_kirim">Tanggal SJ</label>
                                                                <input
                                                                    type="date"
                                                                    class="form-control"
                                                                    id="tanggal_sj"
                                                                    name="tanggal_sj"
                                                                    placeholder="01-01-2024">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="tanggal_rec">Tanggal Rec</label>
                                                                <input
                                                                    type="date"
                                                                    class="form-control"
                                                                    id="tanggal_rec"
                                                                    name="tanggal_rec"
                                                                    placeholder="01-01-2024">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="number">Number</label>
                                                                <input
                                                                    type="number"
                                                                    class="form-control"
                                                                    id="number"
                                                                    readonly="readonly"
                                                                    name="number"
                                                                    min="0"
                                                                    value="<?php echo $ss['id_bahan_baku'] ?>"
                                                                    placeholder="0">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row" id="hehe">
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="col">COL</label>
                                                                <input type="text" min="0" class="form-control" id="col" name="col">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="bf">BF</label>
                                                                <input type="text" min="0" class="form-control" id="bf" name="bf">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="jb">JB</label>
                                                                <input type="text" min="0" class="form-control" id="jb" name="jb">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="jb_bf">JB BF</label>
                                                                <input type="text" min="0" class="form-control" id="jb_bf" name="jb_bf">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="jb_bf">JBB JK</label>
                                                                <input type="text" min="0" class="form-control" id="jbb_jk" name="jbb_jk">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="jb_bf">JBB JF</label>
                                                                <input type="text" min="0" class="form-control" id="jbb_jf" name="jbb_jf">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="jb_bf">XLP</label>
                                                                <input type="text" min="0" class="form-control" id="xlp" name="xlp">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="jb_bf">BF K3 COL</label>
                                                                <input type="text" min="0" class="form-control" id="bf_k3_col" name="bf_k3_col">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="jb_bf">BF K3 JB</label>
                                                                <input type="text" min="0" class="form-control" id="bf_k3_jb" name="bf_k3_jb">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="jb_bf">BF K3 JK</label>
                                                                <input type="text" min="0" class="form-control" id="bf_k3_jk" name="bf_k3_jk">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="jb_bf">BF K3 JL</label>
                                                                <input type="text" min="0" class="form-control" id="bf_k3_jl" name="bf_k3_jl">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="jb_bf">BF JL</label>
                                                                <input type="text" min="0" class="form-control" id="bf_jl" name="bf_jl">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="jb_bf">BF KJ</label>
                                                                <input type="text" min="0" class="form-control" id="bf_kj" name="bf_kj">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="jb_bf">BF BF</label>
                                                                <input type="text" min="0" class="form-control" id="bf_bf" name="bf_bf">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="jb_bf">BF LP SLB</label>
                                                                <input type="text" min="0" class="form-control" id="bf_lp_slb" name="bf_lp_slb">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="jb_bf">BF SP</label>
                                                                <input type="text" min="0" class="form-control" id="bf_sp" name="bf_sp">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="">BF SPK XLP</label>
                                                                <input
                                                                    type="text"
                                                                    min="0"
                                                                    class="form-control"
                                                                    id="BF SPK XLP"
                                                                    name="bf_spk xlp">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="">BF SPK SP</label>
                                                                <input type="text" min="0" class="form-control" id="BF SPK SP" name="bf_spk sp">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="">SPK SP JB</label>
                                                                <input type="text" min="0" class="form-control" id="SPK SP JB" name="spk_sp jb">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="">SPK SP XLP</label>
                                                                <input
                                                                    type="text"
                                                                    min="0"
                                                                    class="form-control"
                                                                    id="SPK SP XLP"
                                                                    name="spk_sp xlp">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="">SPK SP BFP</label>
                                                                <input
                                                                    type="text"
                                                                    min="0"
                                                                    class="form-control"
                                                                    id="SPK SP BFP"
                                                                    name="spk_sp bfp">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="">SPK SP</label>
                                                                <input type="text" min="0" class="form-control" id="SPK SP" name="spk_sp">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="">SP SPH</label>
                                                                <input type="text" min="0" class="form-control" id="SP SPH" name="sp_sph">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="">SP CL</label>
                                                                <input type="text" min="0" class="form-control" id="SP CL" name="sp_cl">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="">SP CLF</label>
                                                                <input type="text" min="0" class="form-control" id="SP CLF" name="sp_clf">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="">MH</label>
                                                                <input type="text" min="0" class="form-control" id="MH" name="mh">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="">MH SLB</label>
                                                                <input type="text" min="0" class="form-control" id="MH SLB" name="mh_slb">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <h5>Receiving</h5>
                                                                <hr>
                                                            </div>
                                                            <div class="col-md-3">

                                                                <div class="form-group">
                                                                    <label for="">BASI COL</label>
                                                                    <input type="text" min="0" class="form-control" id="BASI COL" name="basi_col">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label for="">BASI JB</label>
                                                                    <input type="text" min="0" class="form-control" id="BASI JB" name="basi_jb">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label for="">BASI JK</label>
                                                                    <input type="text" min="0" class="form-control" id="BASI JK" name="basi_jk">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label for="">BASI XLP</label>
                                                                    <input type="text" min="0" class="form-control" id="BASI XLP" name="basi_xlp">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label for="">BASI BF</label>
                                                                    <input type="text" min="0" class="form-control" id="BASI BF" name="basi_bf">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label for="">BASI SP</label>
                                                                    <input type="text" min="0" class="form-control" id="BASI SP" name="basi_sp">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label for="">BASI CL</label>
                                                                    <input type="text" min="0" class="form-control" id="BASI CL" name="basi_cl">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label for="">BASI MH</label>
                                                                    <input type="text" min="0" class="form-control" id="BASI MH" name="basi_mh">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <h5>Sortir</h5>
                                                                <hr>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label for="">BASI COL</label>
                                                                    <input type="text" min="0" class="form-control" id="BASI COL" name="basi_col">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label for="">BASI JB</label>
                                                                    <input type="text" min="0" class="form-control" id="BASI JB" name="basi_jb">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label for="">BASI JK</label>
                                                                    <input type="text" min="0" class="form-control" id="BASI JK" name="basi_jk">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label for="">BASI XLP</label>
                                                                    <input type="text" min="0" class="form-control" id="BASI XLP" name="basi_xlp">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label for="">BASI BF</label>
                                                                    <input type="text" min="0" class="form-control" id="BASI BF" name="basi_bf">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label for="">BASI SP</label>
                                                                    <input type="text" min="0" class="form-control" id="BASI SP" name="basi_sp">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label for="">BASI CL</label>
                                                                    <input type="text" min="0" class="form-control" id="BASI CL" name="basi_cl">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label for="">BASI MH</label>
                                                                    <input type="text" min="0" class="form-control" id="BASI MH" name="basi_mh">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label for="">AIR</label>
                                                                    <input type="text" min="0" class="form-control" id="AIR" name="air">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label for="">SHELL</label>
                                                                    <input type="text" min="0" class="form-control" id="SHELL" name="shell">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label for="">LOSS</label>
                                                                    <input type="text" min="0" class="form-control" id="LOSS" name="loss">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row col-md-12">
                                                            <hr>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="">Cap</label>
                                                                    <select type="text" min="0" class="form-control" id="SHELL" name="cap">
                                                                        <option value="ya">Ya</option>
                                                                        <option value="Tidak">Tidak</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="">Potong</label>
                                                                    <input type="text" min="0" class="form-control" id="SHELL" name="potong">
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button
                                                    type="button"
                                                    onclick="SimpanSortir(event ,true)"
                                                    class="btn btn-primary">Simpan</button>
                                                <button
                                                    type="button"
                                                    onclick="SimpanSortir(event, false)"
                                                    class="btn btn-primary">Simpan Sementara</button>
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="modal fade" id="myModal">
            <div class="modal-dialog modal-xl modal-fullscreen">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Form Sortir</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <form
                        id="sortires"
                        method="post"
                        action="<?php echo base_url('main/fullsortirPost') ?>">
                        <div class="modal-body">
                            <div class="container">
                                <!-- <input type="hidden" name="id_bb" id="getId" value=""> -->
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="kode_supplier">Kode Supplier</label>
                                            <input
                                                type="text"
                                                class="form-control"
                                                readonly="readonly"
                                                value="<?php $ss['supplier'] ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="tanggal_kirim">Tanggal SJ</label>
                                            <input
                                                type="date"
                                                class="form-control"
                                                id="tanggal_sj"
                                                name="tanggal_sj"
                                                placeholder="01-01-2024">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="tanggal_rec">Tanggal Rec</label>
                                            <input
                                                type="date"
                                                class="form-control"
                                                id="tanggal_rec"
                                                name="tanggal_rec"
                                                placeholder="01-01-2024">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="number">Number</label>
                                            <input
                                                type="number"
                                                class="form-control"
                                                id="number"
                                                readonly="readonly"
                                                name="number"
                                                min="0"
                                                value="<?php echo $ss['id_bahan_baku'] ?>"
                                                placeholder="0">
                                        </div>
                                    </div>
                                </div>
                                <div class="row" id="hehe">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="col">COL</label>
                                            <input type="text" min="0" class="form-control" id="col" name="col">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="bf">BF</label>
                                            <input type="text" min="0" class="form-control" id="bf" name="bf">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="jb">JB</label>
                                            <input type="text" min="0" class="form-control" id="jb" name="jb">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="jb_bf">JB BF</label>
                                            <input type="text" min="0" class="form-control" id="jb_bf" name="jb_bf">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="jb_bf">JBB JK</label>
                                            <input type="text" min="0" class="form-control" id="jbb_jk" name="jbb_jk">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="jb_bf">JBB JF</label>
                                            <input type="text" min="0" class="form-control" id="jbb_jf" name="jbb_jf">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="jb_bf">XLP</label>
                                            <input type="text" min="0" class="form-control" id="xlp" name="xlp">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="jb_bf">BF K3 COL</label>
                                            <input type="text" min="0" class="form-control" id="bf_k3_col" name="bf_k3_col">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="jb_bf">BF K3 JB</label>
                                            <input type="text" min="0" class="form-control" id="bf_k3_jb" name="bf_k3_jb">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="jb_bf">BF K3 JK</label>
                                            <input type="text" min="0" class="form-control" id="bf_k3_jk" name="bf_k3_jk">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="jb_bf">BF K3 JL</label>
                                            <input type="text" min="0" class="form-control" id="bf_k3_jl" name="bf_k3_jl">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="jb_bf">BF JL</label>
                                            <input type="text" min="0" class="form-control" id="bf_jl" name="bf_jl">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="jb_bf">BF KJ</label>
                                            <input type="text" min="0" class="form-control" id="bf_kj" name="bf_kj">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="jb_bf">BF BF</label>
                                            <input type="text" min="0" class="form-control" id="bf_bf" name="bf_bf">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="jb_bf">BF LP SLB</label>
                                            <input type="text" min="0" class="form-control" id="bf_lp_slb" name="bf_lp_slb">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="jb_bf">BF SP</label>
                                            <input type="text" min="0" class="form-control" id="bf_sp" name="bf_sp">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">BF SPK XLP</label>
                                            <input
                                                type="text"
                                                min="0"
                                                class="form-control"
                                                id="BF SPK XLP"
                                                name="bf_spk xlp">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">BF SPK SP</label>
                                            <input type="text" min="0" class="form-control" id="BF SPK SP" name="bf_spk sp">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">SPK SP JB</label>
                                            <input type="text" min="0" class="form-control" id="SPK SP JB" name="spk_sp jb">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">SPK SP XLP</label>
                                            <input
                                                type="text"
                                                min="0"
                                                class="form-control"
                                                id="SPK SP XLP"
                                                name="spk_sp xlp">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">SPK SP BFP</label>
                                            <input
                                                type="text"
                                                min="0"
                                                class="form-control"
                                                id="SPK SP BFP"
                                                name="spk_sp bfp">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">SPK SP</label>
                                            <input type="text" min="0" class="form-control" id="SPK SP" name="spk_sp">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">SP SPH</label>
                                            <input type="text" min="0" class="form-control" id="SP SPH" name="sp_sph">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">SP CL</label>
                                            <input type="text" min="0" class="form-control" id="SP CL" name="sp_cl">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">SP CLF</label>
                                            <input type="text" min="0" class="form-control" id="SP CLF" name="sp_clf">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">MH</label>
                                            <input type="text" min="0" class="form-control" id="MH" name="mh">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">MH SLB</label>
                                            <input type="text" min="0" class="form-control" id="MH SLB" name="mh_slb">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">BASI COL</label>
                                            <input type="text" min="0" class="form-control" id="BASI COL" name="basi_col">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">BASI JB</label>
                                            <input type="text" min="0" class="form-control" id="BASI JB" name="basi_jb">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">BASI JK</label>
                                            <input type="text" min="0" class="form-control" id="BASI JK" name="basi_jk">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">BASI XLP</label>
                                            <input type="text" min="0" class="form-control" id="BASI XLP" name="basi_xlp">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">BASI BF</label>
                                            <input type="text" min="0" class="form-control" id="BASI BF" name="basi_bf">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">BASI SP</label>
                                            <input type="text" min="0" class="form-control" id="BASI SP" name="basi_sp">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">BASI CL</label>
                                            <input type="text" min="0" class="form-control" id="BASI CL" name="basi_cl">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">BASI MH</label>
                                            <input type="text" min="0" class="form-control" id="BASI MH" name="basi_mh">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">BASI COL</label>
                                            <input type="text" min="0" class="form-control" id="BASI COL" name="basi_col">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">BASI JB</label>
                                            <input type="text" min="0" class="form-control" id="BASI JB" name="basi_jb">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">BASI JK</label>
                                            <input type="text" min="0" class="form-control" id="BASI JK" name="basi_jk">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">BASI XLP</label>
                                            <input type="text" min="0" class="form-control" id="BASI XLP" name="basi_xlp">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">BASI BF</label>
                                            <input type="text" min="0" class="form-control" id="BASI BF" name="basi_bf">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">BASI SP</label>
                                            <input type="text" min="0" class="form-control" id="BASI SP" name="basi_sp">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">BASI CL</label>
                                            <input type="text" min="0" class="form-control" id="BASI CL" name="basi_cl">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">BASI MH</label>
                                            <input type="text" min="0" class="form-control" id="BASI MH" name="basi_mh">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">AIR</label>
                                            <input type="text" min="0" class="form-control" id="AIR" name="air">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">SHELL</label>
                                            <input type="text" min="0" class="form-control" id="SHELL" name="shell">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">LOSS</label>
                                            <input type="text" min="0" class="form-control" id="LOSS" name="loss">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button
                                type="button"
                                onclick="SimpanSortir(event ,true)"
                                class="btn btn-primary">Simpan</button>
                            <button
                                type="button"
                                onclick="SimpanSortir(event, false)"
                                class="btn btn-primary">Simpan Sementara</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
