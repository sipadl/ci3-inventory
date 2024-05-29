<div class="">
    <div class="row">
        <div class="col-md-12">
            <?php
// Check if flash data exists
if ($this->session->flashdata('success')) {
// If it does, display a success message
echo '<div class="alert alert-success my-2">' . $this->session->flashdata('success') . '</div>';
}
?>
            <table class="responsive table" id="myTable">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kode Supplier</th>
                        <th scope="col">Tanggal Input</th>
                         <th scope="col">Approved By</th>
                        <th scope="col">Status</th>
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
                        <td><?php echo $ss['supplier'] ?></td>
                        <td><?php echo $ss['tanggal'] ?></td>
                         <td>
                        <?php if($ss['approved_by'] != null ) {
							 $approved = $this->db->query("select username from tbl_user where id = ".$ss['approved_by']."")->row_array();
							 echo $approved['username'];
							} else {
							echo '';
							}
						?>
                        </td>
                        <td>
                        <?php 
						$status = $ss['status'];

						// Check the status code and display corresponding text
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
                                            <div class="modal-body" id="<?php echo 'modal-print-2-'.$ss['id'] ?>">
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
												<table class="responsive table-bordered w-100">
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
																<td><?php echo $dd['qty'] > 1 ? $dd['qty'] : '' ?></td>
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
																	<td><?php echo $dd['qty'] > 1 ? $dd['qty'] : '' ?></td>

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
                                                    <!-- <a
                                                        href="<?php echo base_url('main/mainApprove/').$ss['id']; ?>"
                                                        class="btn btn-primary">Aprove</a> -->
                                                    <!-- <a href="<?php echo base_url('main/mainReject/').$ss['id']; ?>" class="btn
                                                    btn-danger">Reject</a> -->
                                                    <!-- <button type="button" onclick="printDisini(<?php echo $ss['id'] ?>)"
                                                    class="btn btn-primary">Print</a> -->
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button
                                        type="button"
                                        class="btn btn-light mx-1"
                                        data-toggle="modal"
                                        data-target="<?php echo '#modelId'.$ss['id'] ?>">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                        Detail Sortir
                                    </button>

                                </div>
                                <div
                                    class="modal fade"
                                    id="<?php echo 'modelId'.$ss['id'] ?>"
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

                                        <style>
                                                    .row {
                                                        display: -ms-flexbox;
                                                        display: flex;
                                                        -ms-flex-wrap: wrap;
                                                        flex-wrap: wrap;
                                                        margin-right: -7.5px;
                                                        margin-left: -7.5px;
                                                    }
                                                    .col-md-3 {
                                                        flex: 0 0 25%;
                                                        max-width: 25%;
                                                    }
                                                    .px-2 {
                                                        padding-left: .5rem !important;
                                                        padding-right: .5rem !important;
                                                    }
                                                    .justify-content-between {
                                                        -ms-flex-pack: justify !important;
                                                        justify-content: space-between !important;
                                                    }
                                                    .d-flex {
                                                        display: -ms-flexbox !important;
                                                        display: flex !important;
                                                    }
                                                    .border {
                                                        border: 1px solid #dee2e6 !important;
                                                    }
                                                    .mt-2 {
                                                        margin-top: .5rem !important;
                                                    }
                                                    .ml-2 {
                                                        margin-left: .5rem !important;
                                                    }
                                                    .py-2 {
                                                        padding-bottom: .5rem !important;
                                                        padding-top: .5rem !important;
                                                    }
                                                </style>

                                            <div class="row justify-content-between" style="margin-bottom: 50px;">
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

                                                    <div class="d-flex justify-content-between  border ml-2 px-2">
                                                        <div class="">SHELL</div>
                                                        <div class="">PHR</div>
                                                        <div class="">MHR</div>
                                                     
                                                    </div>
                                                    <div class="d-flex justify-content-between  border ml-2 px-2">
                                                    <div class="">KERAS</div>
                                                        <div class=""><?php echo $ss['shell_phr_keras'] ?></div>
                                                        <div class=""><?php echo $ss['shell_mhr_keras'] ?></div>
                                                    </div>
                                                    <div class="d-flex justify-content-between  border ml-2 px-2">
														<div class="">HALUS</div>
														<div class=""><?php echo $ss['shell_phr_halus'] ?></div>
														<div class=""><?php echo $ss['shell_mhr_halus'] ?></div>
                                                    </div>
                                                    <div class="d-flex justify-content-between  border ml-2 px-2">
                                                        <div class="">TOTAL</div>
                                                        <div class=""><?php echo floatval($ss['shell_phr_keras']) + floatval($ss['shell_phr_halus']) ?></div>
                                                        <div class=""><?php echo floatval($ss['shell_mhr_keras']) + floatval($ss['shell_mhr_halus']) ?></div>
                                                    </div>
                                                </div>  
                                            </div>

											<div class="row justify-content-between">
												<div hidden class="col-md-3">
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
												<div hidden class="col-md-3">
													<p style="text-align: center;">SD.100.3001 / <?php echo $ss['id'] ?></p>
												</div>
												<div hidden class="col-md-3">
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
												<div hidden class="col-md-3">
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
												<table class="responsive table table-bordered mt-1 tbl-spesial">
													<thead class="text-center tbl-spesial">
														<tr>
															<th colspan="2" rowspan="2">Spec</th>
															<th colspan="3">Tanggal Sortir</th>
															<th colspan="2" rowspan="2">Total</th>
															<th colspan="2" rowspan="2">Spec</th>
															<th>Tanggal Rec</th>
															<th colspan="3">Tanggal Sortir</th>
															<th rowspan="2">Total</th>
														</tr>
														<tr>
															<th colspan=""><?php echo $ss['tanggal_rec1'] ?></th>
															<th colspan=""><?php echo $ss['tanggal_rec2'] == '0000-00-00' ? '' : $ss['tanggal_rec2'] ?></th>
															<th colspan=""><?php echo $ss['tanggal_rec3']  == '0000-00-00' ? '' : $ss['tanggal_rec3'] ?></th>
                                                            <th colspan="" width="10%">
																<?php
																	foreach($daging as $sup) {
																		if($sup['supplier'] == $ss['kode_supplier']) {
																			echo $sup['tanggal'];
																		}
																	}
																?>
															</th>
															<th colspan="" width="10%"><?php echo $ss['tanggal'] ?></th>
															<th colspan="" width="10%"><?php echo $ss['tanggal_rec2'] ?></th>
															<th colspan=""><?php echo $ss['tanggal_rec3']  == '0000-00-00' ? '' : $ss['tanggal_rec3'] ?></th>
														</tr>
													</thead>
													<tbody>
														<!-- COL -->
														<?php 
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
														floatval($basi_col2) + floatval($basi_jk2) + floatval($basi_xlp2) + floatval($basi_bf2) + floatval($basi_sp2) +
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

                                                        $col_2 = $ss['col_2'];
                                                        $col_bf_2 = $ss['bf_2'];
                                                        $jb_2 = $ss['jb_2'];
                                                        $jb_bf_2 = $ss['jb_bf_2'];
                                                        $jk_2 = $ss['jbb_jk_2'];
                                                        $jk_bf_2 = $ss['jbb_bf_2'];
                                                        $xlp_2 = $ss['xlp_2'];
                                                        $bf_k3_col_2 = $ss['bf_k3_col_2'];
                                                        $bf_k3_jb_2 = $ss['bf_k3_jb_2'];
                                                        $bf_k3_jl_2 = $ss['bf_k3_jl_2'];
                                                        $bf_k3_jk_2 = $ss['bf_k3_jk_2'];
                                                        $bf_jl_2 = $ss['bf_jl_2'];
                                                        $bf_kj_2 = $ss['bf_kj_2'];
                                                        $bf_bf_2 = $ss['bf_bf_2'];
                                                        $bf_lp_slb_2 = $ss['bf_lp_slb_2'];
                                                        $bf_sp_2 = $ss['bf_sp_2'];
                                                        $spk_xlp_2 = $ss['bf_spk_xlp_2'];
                                                        $spk_sp_2 = $ss['spk_sp_2'];
                                                        $sp_jb_2 = $ss['spk_sp_jb_2'];
                                                        $sp_xlp_2 = $ss['spk_sp_xlp_2'];
                                                        $sp_bf_2 = $ss['spk_sp_bfp_2'];
                                                        $sp_sph_2 = $ss['spk_sp_sph_2'] ?? 0;
                                                        $sp_sp_2 = $ss['sp_sph_2'];
                                                        $cl_2 = $ss['sp_cl_2'];
                                                        $clf_2 = $ss['sp_clf_2'];
                                                        $mh_2 = $ss['mh_2'];
                                                        $mh2_2 = $ss['mh_slb_2'];
                                                        $phr_2 = $ss['phr_2'] ?? 0;
                                                        $basi_col_2 = $ss['basi_col_2'];
                                                        $basi_jk_2 = $ss['basi_jk_2'];
                                                        $basi_jb_2 = $ss['basi_jb_2'];
                                                        $basi_xlp_2 = $ss['basi_xlp_2'];
                                                        $basi_bf_2 = $ss['basi_bf_2'];
                                                        $basi_sp_2 = $ss['basi_sp_2'];
                                                        $basi_col2_2 = $ss['basi_col2_2'];
                                                        $basi_jk2_2 = $ss['basi_jk2_2'];
                                                        $basi_jb2_2 = $ss['basi_jb2_2'];
                                                        $basi_xlp2_2 = $ss['basi_xlp2_2'];
                                                        $basi_bf2_2 = $ss['basi_bf2_2'];
                                                        $basi_sp2_2 = $ss['basi_sp2_2'];
                                                        $mhr_2 = $ss['mhr_2'] ?? 0;
                                                        $basi_cl_2 = $ss['basi_cl_2'];
                                                        $basi_mh_2 = $ss['basi_mh_2'];
                                                        $basi_cl2_2 = $ss['basi_cl2_2'];
                                                        $basi_mh2_2 = $ss['basi_mh2_2'];
                                                        $air_2 = $ss['air_2'];
                                                        $shell_2 = $ss['shell_2'];
                                                        $loss_2 = $ss['loss_2'];
                                                        $jbb_jf_2 = $ss['jbb_jf_2'] ?? 0;
                                                        $col_18_2 = $ss['bf_spk_sp_2'];

                                                        $timbangan_kotor_2 = floatval($col_2) + floatval($col_bf_2) + floatval($jb_2) + floatval($jb_bf_2) + floatval($jk_2) + floatval($jk_bf_2) +
                                                        floatval($xlp_2) + floatval($bf_k3_col_2) + floatval($bf_k3_jb_2) + floatval($bf_k3_jl_2) + floatval($bf_k3_jk_2) +
                                                        floatval($bf_jl_2) + floatval($bf_kj_2) + floatval($bf_bf_2) + floatval($bf_lp_slb_2) + floatval($bf_sp_2) +
                                                        floatval($spk_xlp_2) + floatval($spk_sp_2) + floatval($sp_jb_2) + floatval($sp_xlp_2) + floatval($sp_bf_2) +
                                                        floatval($sp_sph_2) + floatval($cl_2) + floatval($clf_2) + floatval($mh_2) + floatval($mh2_2) + floatval($phr_2) +
                                                        floatval($basi_col_2) + floatval($basi_jk_2) + floatval($basi_xlp_2) + floatval($basi_bf_2) + floatval($basi_sp_2) +
                                                        floatval($basi_col2_2) + floatval($basi_jk2_2) + floatval($basi_xlp2_2) + floatval($basi_bf2_2) + floatval($basi_sp2_2) +
                                                        floatval($mhr_2) + floatval($basi_cl_2) + floatval($basi_mh_2) + floatval($air_2) + floatval($shell_2) +
                                                        floatval($loss_2) + floatval($jbb_jf_2) + floatval($col_18_2);


                                                        $colX_2 = (floatval($col_2) + floatval($col_bf_2));
                                                        $jbX_2 = (floatval($jb_2) + floatval($jbb_jf_2));
                                                        $jkX_2 = (floatval($jk_2) + floatval($jk_bf_2));
                                                        $bfX_2 = (floatval($bf_k3_col_2) + floatval($bf_k3_jb_2) + floatval($bf_k3_jk_2) +
                                                                floatval($bf_k3_jl_2) + floatval($bf_jl_2) + floatval($bf_bf_2) + floatval($bf_bf_2) +
                                                                floatval($bf_k3_jk_2) + floatval($bf_kj_2));
                                                        $spkX_2 = (floatval($sp_bf_2) + floatval($sp_sph_2));
                                                        $spX_2 = (floatval($spk_xlp_2) + floatval($spk_sp_2));
                                                        $mhX_2 = (floatval($mh_2) + floatval($mh2_2));
                                                        $clX_2 = floatval($cl_2);
                                                        $clfX_2 = floatval($clf_2);
                                                        $mhr_2 = floatval($mh_2) + floatval($mh2_2);
                                                        $phr_2 = floatval($basi_sp_2) + floatval($basi_bf_2) + floatval($basi_xlp_2) + floatval($basi_jk_2) + floatval($basi_col_2);
                                                        $sumXX_2 = $colX_2 + $jbX_2 + $jkX_2 + $bfX_2 + $spkX_2 + $spX_2 + $mhX_2 + $clX_2 + $clfX_2;
                                                        $grand_total_2 = $sum_2 = floatval($col_2) + floatval($col_bf_2) + floatval($jb_2) + floatval($jb_bf_2) + floatval($jk_2) + floatval($jk_bf_2) +
                                                        floatval($xlp_2) + floatval($bf_k3_col_2) + floatval($bf_k3_jb_2) + floatval($bf_k3_jl_2) + floatval($bf_k3_jk_2) +
                                                        floatval($bf_jl_2) + floatval($bf_kj_2) + floatval($bf_bf_2) + floatval($bf_lp_slb_2) + floatval($bf_sp_2) +
                                                        floatval($spk_xlp_2) + floatval($spk_sp_2) + floatval($sp_jb_2) + floatval($sp_xlp_2) + floatval($sp_bf_2) +
                                                        floatval($sp_sph_2) + floatval($sp_sp_2) + floatval($cl_2) + floatval($clf_2) + floatval($mh_2) + floatval($mh2_2);

                                                        $col_3 = $ss['col_3'];
                                                        $col_bf_3 = $ss['bf_3'];
                                                        $jb_3 = $ss['jb_3'];
                                                        $jb_bf_3 = $ss['jb_bf_3'];
                                                        $jk_3 = $ss['jbb_jk_3'];
                                                        $jk_bf_3 = $ss['jbb_bf_3'];
                                                        $xlp_3 = $ss['xlp_3'];
                                                        $bf_k3_col_3 = $ss['bf_k3_col_3'];
                                                        $bf_k3_jb_3 = $ss['bf_k3_jb_3'];
                                                        $bf_k3_jl_3 = $ss['bf_k3_jl_3'];
                                                        $bf_k3_jk_3 = $ss['bf_k3_jk_3'];
                                                        $bf_jl_3 = $ss['bf_jl_3'];
                                                        $bf_kj_3 = $ss['bf_kj_3'];
                                                        $bf_bf_3 = $ss['bf_bf_3'];
                                                        $bf_lp_slb_3 = $ss['bf_lp_slb_3'];
                                                        $bf_sp_3 = $ss['bf_sp_3'];
                                                        $spk_xlp_3 = $ss['bf_spk_xlp_3'];
                                                        $spk_sp_3 = $ss['spk_sp_3'];
                                                        $sp_jb_3 = $ss['spk_sp_jb_3'];
                                                        $sp_xlp_3 = $ss['spk_sp_xlp_3'];
                                                        $sp_bf_3 = $ss['spk_sp_bfp_3'];
                                                        $sp_sph_3 = $ss['spk_sp_sph_3'] ?? 0;
                                                        $sp_sp_3 = $ss['sp_sph_3'];
                                                        $cl_3 = $ss['sp_cl_3'];
                                                        $clf_3 = $ss['sp_clf_3'];
                                                        $mh_3 = $ss['mh_3'];
                                                        $mh2_3 = $ss['mh_slb_3'];
                                                        $phr_3 = $ss['phr_3'] ?? 0;
                                                        $basi_col_3 = $ss['basi_col_3'];
                                                        $basi_jk_3 = $ss['basi_jk_3'];
                                                        $basi_jb_3 = $ss['basi_jb_3'];
                                                        $basi_xlp_3 = $ss['basi_xlp_3'];
                                                        $basi_bf_3 = $ss['basi_bf_3'];
                                                        $basi_sp_3 = $ss['basi_sp_3'];
                                                        $basi_col2_3 = $ss['basi_col2_3'];
                                                        $basi_jk2_3 = $ss['basi_jk2_3'];
                                                        $basi_jb2_3 = $ss['basi_jb2_3'];
                                                        $basi_xlp2_3 = $ss['basi_xlp2_3'];
                                                        $basi_bf2_3 = $ss['basi_bf2_3'];
                                                        $basi_sp2_3 = $ss['basi_sp2_3'];
                                                        $mhr_3 = $ss['mhr_3'] ?? 0;
                                                        $basi_cl_3 = $ss['basi_cl_3'];
                                                        $basi_mh_3 = $ss['basi_mh_3'];
                                                        $basi_cl2_3 = $ss['basi_cl2_3'];
                                                        $basi_mh2_3 = $ss['basi_mh2_3'];
                                                        $air_3 = $ss['air_3'];
                                                        $shell_3 = $ss['shell_3'];
                                                        $loss_3 = $ss['loss_3'];
                                                        $jbb_jf_3 = $ss['jbb_jf_3'] ?? 0;
                                                        $col_18_3 = $ss['bf_spk_sp_3'];


                                                        $timbangan_kotor_3 = floatval($col_3) + floatval($col_bf_3) + floatval($jb_3) + floatval($jb_bf_3) + floatval($jk_3) + floatval($jk_bf_3) +
                                                        floatval($xlp_3) + floatval($bf_k3_col_3) + floatval($bf_k3_jb_3) + floatval($bf_k3_jl_3) + floatval($bf_k3_jk_3) +
                                                        floatval($bf_jl_3) + floatval($bf_kj_3) + floatval($bf_bf_3) + floatval($bf_lp_slb_3) + floatval($bf_sp_3) +
                                                        floatval($spk_xlp_3) + floatval($spk_sp_3) + floatval($sp_jb_3) + floatval($sp_xlp_3) + floatval($sp_bf_3) +
                                                        floatval($sp_sph_3) + floatval($cl_3) + floatval($clf_3) + floatval($mh_3) + floatval($mh2_3) + floatval($phr_3) +
                                                        floatval($basi_col_3) + floatval($basi_jk_3) + floatval($basi_xlp_3) + floatval($basi_bf_3) + floatval($basi_sp_3) +
                                                        floatval($basi_col2_3) + floatval($basi_jk2_3) + floatval($basi_xlp2_3) + floatval($basi_bf2_3) + floatval($basi_sp2_3) +
                                                        floatval($mhr_3) + floatval($basi_cl_3) + floatval($basi_mh_3) + floatval($air_3) + floatval($shell_3) +
                                                        floatval($loss_3) + floatval($jbb_jf_3) + floatval($col_18_3);


                                                        $colX_3 = (floatval($col_3) + floatval($col_bf_3));
                                                        $jbX_3 = (floatval($jb_3) + floatval($jbb_jf_3));
                                                        $jkX_3 = (floatval($jk_3) + floatval($jk_bf_3));
                                                        $bfX_3 = (floatval($bf_k3_col_3) + floatval($bf_k3_jb_3) + floatval($bf_k3_jk_3) +
                                                                floatval($bf_k3_jl_3) + floatval($bf_jl_3) + floatval($bf_bf_3) + floatval($bf_bf_3) +
                                                                floatval($bf_k3_jk_3) + floatval($bf_kj_3));
                                                        $spkX_3 = (floatval($sp_bf_3) + floatval($sp_sph_3));
                                                        $spX_3 = (floatval($spk_xlp_3) + floatval($spk_sp_3));
                                                        $mhX_3 = (floatval($mh_3) + floatval($mh2_3));
                                                        $clX_3 = floatval($cl_3);
                                                        $clfX_3 = floatval($clf_3);
                                                        $mhr_3 = floatval($mh_3) + floatval($mh2_3);
                                                        $phr_3 = floatval($basi_sp_3) + floatval($basi_bf_3) + floatval($basi_xlp_3) + floatval($basi_jk_3) + floatval($basi_col_3);
                                                        $sumXX_3 = $colX_3 + $jbX_3 + $jkX_3 + $bfX_3 + $spkX_3 + $spX_3 + $mhX_3 + $clX_3 + $clfX_3;
                                                        $grand_total_3 = $sum_3 = floatval($col_3) + floatval($col_bf_3) + floatval($jb_3) + floatval($jb_bf_3) + floatval($jk_3) + floatval($jk_bf_3) +
                                                        floatval($xlp_3) + floatval($bf_k3_col_3) + floatval($bf_k3_jb_3) + floatval($bf_k3_jl_3) + floatval($bf_k3_jk_3) +
                                                        floatval($bf_jl_3) + floatval($bf_kj_3) + floatval($bf_bf_3) + floatval($bf_lp_slb_3) + floatval($bf_sp_3) +
                                                        floatval($spk_xlp_3) + floatval($spk_sp_3) + floatval($sp_jb_3) + floatval($sp_xlp_3) + floatval($sp_bf_3) +
                                                        floatval($sp_sph_3) + floatval($sp_sp_3) + floatval($cl_3) + floatval($clf_3) + floatval($mh_3) + floatval($mh2_3);

														$qty = 0;
														$dataDaging = $this->db->query('select * from tbl_sub_daging where id_bahan_baku ='.$ss['id_bahan_baku'])->result_array(); 
														foreach($dataDaging as $sdb) {
															$qty += floatval($sdb['tbersih']);
														}

														?>
														<tr>
															<td rowspan="2">COL</td>
															<td>COL</td>
															<td width="10%"><?php echo $col ?></td>
															<td width="10%"><?php echo $col_2 ?></td>
															<td width="10%"><?php echo $col_3 ?></td>
															<td width="10%" colspan="2"></td>
															<td colspan="8" class="text-center">
																<strong>
																	Receiving
																</strong>
															</td>
														</tr>
														<tr>
															<td>BF</td>
															<td width="10%"><?php echo $col_bf ?></td>
															<td width="10%"><?php echo $col_bf_2 ?></td>
															<td width="10%"><?php echo $col_bf_3 ?></td>
															<td width="10%" colspan="2"></td>
															<td colspan="2">PHR</td>
															<td></td>
															<td class="bg-light" style="background-color: gray"></td>
															<td class="bg-light" style="background-color: gray"></td>
															<td class="bg-light" style="background-color: gray"></td>
															<td></td>
														</tr>
														<tr>
															<td colspan="2">Total COL</td>
															<td>
															<?php $total_col = $sum = floatval($col) + floatval($col_bf);
																	if($sum > 0) {
																		echo $sum;
																	} else {
																		echo '';
																	} ?>
															</td>
															<td>
															<?php $total_col_2 = $sum = floatval($col_2) + floatval($col_bf_2);
																	if($sum > 0) {
																		echo $sum;
																	} else {
																		echo '';
																	} ?>
															</td>
															<td>
															<?php $total_col_3 = $sum = floatval($col_3) + floatval($col_bf_3);
																	if($sum > 0) {
																		echo $sum;
																	} else {
																		echo '';
																	} ?>
															</td>
															<td colspan="2">	<?php $total_col_all= $sum = floatval($col_3) + floatval($col_bf_3) + floatval($col_bf_2) + floatval($col_bf)
                                                            + floatval($col_2)+ floatval($col);
																	if($sum > 0) {
																		echo $sum;
																	} else {
																		echo '';
																	} ?></td>
															<td rowspan="6">BASI</td>
															<td>COL</td>
															<td><?php echo $basi_col ?></td>
															<td class="bg-light" style="background-color: gray"></td>
															<td class="bg-light" style="background-color: gray"></td>
															<td class="bg-light" style="background-color: gray"></td>
															<td></td>
														</tr>

														<!-- JB -->
														<tr>
															<td rowspan="2">JB</td>
															<td>JB</td>
															<td><?php echo $jb ?></td>
															<td><?php echo $jb_2 ?></td>
															<td><?php echo $jb_3 ?></td>
															<td colspan="2"></td>
															<td>JB</td>
															<td><?php echo $basi_jb ?></td>
															<td class="bg-light" style="background-color: gray"></td>
															<td class="bg-light" style="background-color: gray"></td>
															<td class="bg-light" style="background-color: gray"></td>
															<td></td>
														
														</tr>
														<tr>
															<td>BF</td>
															<td><?php echo $jb_bf ?></td>
															<td><?php echo $jb_bf_2 ?></td>
															<td><?php echo $jb_bf_3 ?></td>
															<td colspan="2"></td>
															<td>JK</td>
															<td><?php echo $basi_jk ?></td>
															<td class="bg-light" style="background-color: gray"></td>
															<td class="bg-light" style="background-color: gray"></td>
															<td class="bg-light" style="background-color: gray"></td>
															<td></td>
															
														</tr>
														<tr>
															<td colspan="2">Total JB</td>
															<td>
															<?php $total_jb = $sum = floatval($jb_bf) + floatval($jb);
																	if($sum > 0) {
																		echo $sum;
																	} else {
																		echo '';
																	} ?>
															</td>
															<td>
															<?php $total_jb_2 = $sum = floatval($jb_bf_2) + floatval($jb_2);
																	if($sum > 0) {
																		echo $sum;
																	} else {
																		echo '';
																	} ?>
															</td>
															<td>
															<?php $total_jb_3 = $sum = floatval($jb_bf_3) + floatval($jb_3);
																	if($sum > 0) {
																		echo $sum;
																	} else {
																		echo '';
																	} ?>
															</td>
															<td colspan="2"><?php $total_jb_all = $sum = floatval($jb_bf_3) + floatval($jb_3)+ floatval($jb_bf) + floatval($jb) + floatval($jb_bf_2)
                                                            + floatval($jb_2);
																	if($sum > 0) {
																		echo $sum;
																	} else {
																		echo '';
																	} ?></td>
															<td>XLP</td>
															<td><?php echo $basi_xlp ?></td>
															<td class="bg-light" style="background-color: gray"></td>
															<td class="bg-light" style="background-color: gray"></td>
															<td class="bg-light" style="background-color: gray"></td>
															<td></td>
														</tr>
														<!-- JK -->
														<tr>
															<td rowspan="2">JK</td>
															<td>JK</td>
															<td><?php echo $jk ?></td>
															<td><?php echo $jk_2 ?></td>
															<td><?php echo $jk_3 ?></td>
															<td colspan="2"></td>
															<td>BF</td>
															<td><?php echo $basi_bf ?></td>
															<td class="bg-light" style="background-color: gray"></td>
															<td class="bg-light" style="background-color: gray"></td>
															<td class="bg-light" style="background-color: gray"></td>
															<td></td>
															
														</tr>
														<tr>
															<td>BF</td>
															<td><?php echo $jk_bf ?></td>
															<td><?php echo $jk_bf_2 ?></td>
															<td><?php echo $jk_bf_3 ?></td>
															<td colspan="2"></td>
															<td>SP</td>
															<td><?php echo $basi_sp ?></td>
															<td class="bg-light" style="background-color: gray"></td>
															<td class="bg-light" style="background-color: gray"></td>
															<td class="bg-light" style="background-color: gray"></td>
															<td></td>
															
														</tr>
														<tr>
															<td colspan="2">Total JK</td>
															<td>
															<?php $total_jk = $sum = floatval($jk) + floatval($jk_bf);
																	if($sum > 0) {
																		echo $sum;
																	} else {
																		echo '';
																	} ?>
															</td>
															<td>
															<?php $total_jk_2 = $sum = floatval($jk_2) + floatval($jk_bf_2);
																	if($sum > 0) {
																		echo $sum;
																	} else {
																		echo '';
																	} ?>
															</td>
															<td>
															<?php $total_jk_3 = $sum = floatval($jk_3) + floatval($jk_bf_3);
																	if($sum > 0) {
																		echo $sum;
																	} else {
																		echo '';
																	} ?>
															</td>
															<td colspan="2">	<?php $total_jk_all = $sum = floatval($jk_3) + floatval($jk_bf_3) + floatval($jk_bf_2) + floatval($jk_2)+ floatval($jk) + floatval($jk_bf);
																	if($sum > 0) {
																		echo $sum;
																	} else {
																		echo '';
																	} ?></td>
															<td colspan="2">Total PHR</td>
															<td>
															    <?php $total_phr = $sum = floatval($basi_col) + floatval($basi_jk) + floatval($basi_jb) + floatval($basi_xlp) + floatval($basi_sp) + floatval($basi_bf);
																	if($sum > 0) {
																		echo $sum;
																	} else {
																		echo '';
																	}
                                                                ?>
															    <?php
                                                                    $total_phr_2 = floatval($basi_col_2) + floatval($basi_jk_2) + floatval($basi_jb_2) + floatval($basi_xlp_2) + floatval($basi_sp_2) + floatval($basi_bf_2);
                                                                    $total_phr_3 = floatval($basi_col_3) + floatval($basi_jk_3) + floatval($basi_jb_3) + floatval($basi_xlp_3) + floatval($basi_sp_3) + floatval($basi_bf_3);
                                                                ?>
															</td>
															<td class="bg-light" style="background-color: gray"></td>
															<td class="bg-light" style="background-color: gray"></td>
															<td class="bg-light" style="background-color: gray"></td>
															<td></td>
														</tr>
														<!-- XLP -->
														<tr>
															<td colspan="2">XLP</td>
															<td><?php echo $xlp ?></td>
															<td><?php echo $xlp_2 ?></td>
															<td><?php echo $xlp_3 ?></td>
															<td colspan="2">	<?php $total_xlp_2 = $sum = floatval($xlp) + floatval($xlp_2) + floatval($xlp_3);
																	if($sum > 0) {
																		echo $sum;
																	} else {
																		echo '';
																	} ?></td>
															<td colspan="1" rowspan="1">MHR</td>
															<td></td>
															<td></td>
															<td class="bg-light" style="background-color: gray"></td>
															<td class="bg-light" style="background-color: gray"></td>
															<td class="bg-light" style="background-color: gray"></td>
															<td></td>
														</tr>
														<!-- BF K3 -->
														<tr>
															<td rowspan="9">BF</td>
															<td>K3 COL</td>
															<td><?php echo $bf_k3_col ?></td>
															<td><?php echo $bf_k3_col_2 ?></td>
															<td><?php echo $bf_k3_col_3 ?></td>
															<td colspan="2"></td>
															<td colspan="1" rowspan="2">BASI</td>
															<td>CL</td>
															<td><?php echo $basi_cl ?></td>
															<td class="bg-light" style="background-color: gray"></td>
															<td class="bg-light" style="background-color: gray"></td>
															<td class="bg-light" style="background-color: gray"></td>
															<td></td>
														</tr>
														<tr>
															<td>K3 JB</td>
															<td><?php echo $bf_k3_jb ?></td>
															<td><?php echo $bf_k3_jb_2 ?></td>
															<td><?php echo $bf_k3_jb_3 ?></td>
															<td colspan="2"></td>
															
															<td>MH</td>
															<td><?php echo $basi_mh ?></td>
															<td class="bg-light" style="background-color: gray"></td>
															<td class="bg-light" style="background-color: gray"></td>
															<td class="bg-light" style="background-color: gray"></td>
															<td></td>
														</tr>
														<tr>
															<td>K3 JK</td>
															<td><?php echo $bf_k3_jk ?></td>
															<td><?php echo $bf_k3_jk_2 ?></td>
															<td><?php echo $bf_k3_jk_3 ?></td>
															<td colspan="2"></td>
															
															<td colspan="2"> TOTAL MHR</td>
															<td>
															<?php $total_mhr2 = $sum = floatval($basi_mh) + floatval($basi_cl);
																	if($sum > 0) {
																		echo $sum;
																	} else {
																		echo '';
																	} 
																	
																	$total_mhr = $sum;
																	?>
															</td>
															<td class="bg-light" style="background-color: gray"></td>
															<td class="bg-light" style="background-color: gray"></td>
															<td class="bg-light" style="background-color: gray"></td>
															<td></td>
														
														</tr>
													<tr>
															<td>K3 JL</td>
															<td><?php echo $bf_k3_jl ?></td>
															<td><?php echo $bf_k3_jl_2 ?></td>
															<td><?php echo $bf_k3_jl_3 ?></td>
															<td colspan="2"></td>
															<td colspan="7" class="text-center">
																<strong>
																	Sortir
																</strong>
															</td>
														</tr>
														<tr>
															<td>JL</td>
															<td><?php echo $bf_jl ?></td>
															<td><?php echo $bf_jl_2 ?></td>
															<td><?php echo $bf_jl_3 ?></td>
															<td colspan="2"></td>
															<td></td>
															<td></td>
															<td class="bg-light" style="background-color: gray"></td>
															<td></td>
															<td></td>
															<td></td>
															<td></td>
														</tr>
														<tr>
															<td>KJ</td>
															<td><?php echo $bf_kj ?></td>
															<td><?php echo $bf_kj_2 ?></td>
															<td><?php echo $bf_kj_3 ?></td>
															<td colspan="2"></td>
															<td colspan="1" rowspan="6">BASI</td>
															<td>COL</td>
															<td class="bg-light" style="background-color: gray"></td>
															<td><?php echo $basi_col2 ?></td>
															<td><?php echo $basi_col2_2 ?></td>
															<td><?php echo $basi_col2_3 ?></td>
															<td></td>
														</tr>
														<tr>
															<td>BF</td>
															<td><?php echo $bf_bf ?></td>
															<td><?php echo $bf_bf_2 ?></td>
															<td><?php echo $bf_bf_3 ?></td>
															<td colspan="2"></td>
															<td>JB</td>
															<td class="bg-light" style="background-color: gray"></td>
															<td><?php echo $basi_jb2 ?></td>
															<td><?php echo $basi_jb2_2 ?></td>
															<td><?php echo $basi_jb2_3 ?></td>
															<td></td>
														</tr>
														<tr>
															<td>LP SLB</td>
															<td><?php echo $bf_lp_slb ?></td>
															<td><?php echo $bf_lp_slb_2 ?></td>
															<td><?php echo $bf_lp_slb_3 ?></td>
															<td></td>
															<td colspan="2"></td>
															<td>JK</td>
															<td class="bg-light" style="background-color: gray"></td>
															<td><?php echo $basi_jk2 ?></td>
															<td><?php echo $basi_jk2_2 ?></td>
															<td><?php echo $basi_jk2_3 ?></td>
															<td></td>
														</tr>
													<tr>
															<td>SP</td>
															<td><?php echo $bf_sp ?></td>
															<td><?php echo $bf_sp_2 ?></td>
															<td><?php echo $bf_sp_3 ?></td>
															<td></td>
															<td colspan="2"></td>
															<td>XLP</td>
															<td class="bg-light" style="background-color: gray"></td>
															<td><?php echo $basi_xlp2 ?></td>
															<td><?php echo $basi_xlp2_2 ?></td>
															<td><?php echo $basi_xlp2_3 ?></td>
															<td></td>
														</tr>
														<tr>
														<td colspan="2">Total BF</td>
															<td>
																<!-- <?php echo $bf_k3_col.' '.$bf_k3_jb.' '.$bf_k3_jk.' '.$bf_k3_jl.' '.$bf_kj.' '.$bf_bf.' '.$bf_lp_slb.' '.$bf_sp ?> -->
                                                                <?php 
                                                                    $total_bf = $sum = floatval($bf_k3_col) + floatval($bf_k3_jb) + floatval($bf_k3_jk) + floatval($bf_k3_jl) + floatval($bf_jl) + floatval($bf_kj) + floatval($bf_bf) + floatval($bf_lp_slb) + floatval($bf_sp);
                                                                    if($sum > 0) {
                                                                            echo $sum;
                                                                        } else {
                                                                            echo '';
                                                                        }

                                                                    $total_bf = $sum;
                                                                ?>
															</td>
															<td>
                                                                <?php 
                                                                    $total_bf_2 = $sum = floatval($bf_k3_col_2) + floatval($bf_k3_jb_2) + floatval($bf_k3_jk_2) + floatval($bf_k3_jl_2) + floatval($bf_jl_2) + floatval($bf_kj_2) + floatval($bf_bf_2) + floatval($bf_lp_slb_2) + floatval($bf_sp_2);
                                                                    if($sum > 0) {
                                                                            echo $sum;
                                                                        } else {
                                                                            echo '';
                                                                        }

                                                                    $total_bf_2 = $sum;
                                                                ?>
															</td>
															<td>
                                                                <?php 
                                                                    $total_bf_3 = $sum = floatval($bf_k3_col_3) + floatval($bf_k3_jb_3) + floatval($bf_k3_jk_3) + floatval($bf_k3_jl_3) + floatval($bf_jl_3) + floatval($bf_kj_3) + floatval($bf_bf_3) + floatval($bf_lp_slb_3) + floatval($bf_sp_3);
                                                                    if($sum > 0) {
                                                                            echo $sum;
                                                                        } else {
                                                                            echo '';
                                                                        }

                                                                    $total_bf_3 = $sum;
                                                                ?>
															</td>
															<td colspan="2"><!-- <?php echo $bf_k3_col.' '.$bf_k3_jb.' '.$bf_k3_jk.' '.$bf_k3_jl.' '.$bf_kj.' '.$bf_bf.' '.$bf_lp_slb.' '.$bf_sp ?> -->
                                                                <?php 
                                                                    $total_bf_all = $sum = floatval($bf_k3_col) + floatval($bf_k3_jb) + floatval($bf_k3_jk) + floatval($bf_k3_jl) + floatval($bf_jl) + floatval($bf_kj) + floatval($bf_bf) + floatval($bf_lp_slb) + floatval($bf_sp)+
                                                                    floatval($bf_k3_col_2) + floatval($bf_k3_jb_2) + floatval($bf_k3_jk_2) + floatval($bf_k3_jl_2) + floatval($bf_jl_2) + floatval($bf_kj_2) + floatval($bf_bf_2) + floatval($bf_lp_slb_2) + floatval($bf_sp_2)+
                                                                    floatval($bf_k3_col_3) + floatval($bf_k3_jb_3) + floatval($bf_k3_jk_3) + floatval($bf_k3_jl_3) + floatval($bf_jl_3) + floatval($bf_kj_3) + floatval($bf_bf_3) + floatval($bf_lp_slb_3) + floatval($bf_sp_3);
                                                                    if($sum > 0) {
                                                                            echo $sum;
                                                                        } else {
                                                                            echo '';
                                                                        }

                                                                    $total_bf_all = $sum;
                                                                ?></td>
															<td>BF</td>
															<td class="bg-light" style="background-color: gray"></td>
															<td><?php echo $basi_bf2 ?></td>
															<td><?php echo $basi_bf2_2 ?></td>
															<td><?php echo $basi_bf2_3 ?></td>
															<td></td>
														</tr>
														<!-- SPK -->
														<tr>
															<td rowspan="2">SPK</td>
															<td>XLP</td>
															<td><?php echo $spk_xlp ?></td>
															<td><?php echo $spk_xlp_2 ?></td>
															<td><?php echo $spk_xlp_3 ?></td>
															<td colspan="2"></td>
															<td>SP</td>
															<td class="bg-light" style="background-color: gray"></td>
															<td><?php echo $basi_sp2 ?></td>
															<td><?php echo $basi_sp2_2 ?></td>
															<td><?php echo $basi_sp2_3 ?></td>
															<td></td>
														</tr>
														<tr>
															<td>SP</td>
															<td><?php echo $col_18 ?></td>
															<td><?php echo $col_18_2 ?></td>
															<td><?php echo $col_18_3 ?></td>
															<td colspan="2"></td>
															<td colspan="2">Total PHR</td>
															<td class="bg-light" style="background-color: gray"></td>
															<td>
															    <?php
																	$total_phr2 = $sum = floatval($basi_col2) + floatval($basi_jb2) + floatval($basi_jk2) + floatval($basi_xlp2) + floatval($basi_bf2) + floatval($basi_sp2);
																	if($sum > 0) {
																		echo $sum;
																	} else {
																		echo '';
																	}
																?>
															</td>
															<td>
															    <?php
																	$total_phr2_2 = $sum = floatval($basi_col2_2) + floatval($basi_jb2_2) + floatval($basi_jk2_2) + floatval($basi_xlp2_2) + floatval($basi_bf2_2) + floatval($basi_sp2_2);
																	if($sum > 0) {
																		echo $sum;
																	} else {
																		echo '';
																	}
																?>
															</td>
															<td>
															    <?php
																	$total_phr2_3 = $sum = floatval($basi_col2_3) + floatval($basi_jb2_3) + floatval($basi_jk2_3) + floatval($basi_xlp2_3) + floatval($basi_bf2_3) + floatval($basi_sp2_3);
																	if($sum > 0) {
																		echo $sum;
																	} else {
																		echo '';
																	}
																?>
															</td>
															<td>
                                                                <?php 
                                                                    $total_phr_right = $total_phr2 + $total_phr2_2 + $total_phr2_3;
                                                                    echo $total_phr_right;
                                                                ?>
                                                            </td>
														</tr>
														<tr>
															<td colspan="2">Total SPK</td>
															<td>
															    <?php $total_spk = $sum = floatval($col_18) + floatval($spk_xlp);
																	if($sum > 0) {
																		echo $sum;
																	} else {
																		echo '';
																	}
																?>
															</td>
															<td>
															    <?php $total_spk_2 = $sum = floatval($col_18_2) + floatval($spk_xlp_2);
																	if($sum > 0) {
																		echo $sum;
																	} else {
																		echo '';
																	}
																?>
															</td>
															<td>
															    <?php $total_spk_3 = $sum = floatval($col_18_3) + floatval($spk_xlp_3);
																	if($sum > 0) {
																		echo $sum;
																	} else {
																		echo '';
																	}
																?>
															</td>
															<td colspan="2">   <?php $total_spk_all = $sum = floatval($col_18) + floatval($spk_xlp)+ floatval($col_18_2) + floatval($spk_xlp_2) + floatval($col_18_3) + floatval($spk_xlp_3);
																	if($sum > 0) {
																		echo $sum;
																	} else {
																		echo '';
																	}
																?></td>
															<td>MHR</td>
															<td></td>
															<td class="bg-light" style="background-color: gray"></td>
															<td></td>
															<td></td>
															<td></td>
														</tr>
														<!-- SP -->
														<tr>
															<td rowspan="4">SP</td>
															<td>JB</td>
															<td><?php echo $sp_jb ?></td>
															<td><?php echo $sp_jb_2 ?></td>
															<td><?php echo $sp_jb_3 ?></td>
															<td colspan="2"> </td>
															<td colspan="1" rowspan="2">BASI</td>
															<td>CL</td>
															<td class="bg-light" style="background-color: gray"></td>
															<td><?php echo $basi_cl2 ?></td>
															<td><?php echo $basi_cl2_2 ?></td>
															<td><?php echo $basi_cl2_3 ?></td>
															<td></td>
														</tr>
														<tr>
															<td>XLP</td>
															<td><?php echo $sp_xlp ?></td>
															<td><?php echo $sp_xlp_2 ?></td>
															<td><?php echo $sp_xlp_3 ?></td>
															<td colspan="2"></td>
															<td>MH</td>
															<td class="bg-light" style="background-color: gray"></td>
															<td><?php echo $basi_mh2 ?></td>
															<td><?php echo $basi_mh2_2 ?></td>
															<td><?php echo $basi_mh2_3 ?></td>
															<td></td>
														</tr>
														<tr>
															<td>BF</td>
															<td><?php echo $sp_bf ?></td>
															<td><?php echo $sp_bf_2 ?></td>
															<td><?php echo $sp_bf_3 ?></td>
															<td colspan="2"></td>
															<td colspan="2">Total MHR</td>
															<td class="bg-light" style="background-color: gray"></td>
															<td>
															    <?php $total_mhr_1 = $sum = floatval($basi_mh2) + floatval($basi_cl2);
																	if($sum > 0) {
																		echo $sum;
																	} else {
																		echo '';
																	}
                                                                ?>
															</td>
															<td>
															    <?php $total_mhr_2 = $sum = floatval($basi_mh2_2) + floatval($basi_cl2_2);
																	if($sum > 0) {
																		echo $sum;
																	} else {
																		echo '';
																	}
                                                                ?>
															</td>
															<td>
															    <?php $total_mhr_3 = $sum = floatval($basi_mh2_3) + floatval($basi_cl2_3);
																	if($sum > 0) {
																		echo $sum;
																	} else {
																		echo '';
																	}
                                                                ?>
															</td>
															<td>
                                                                <?php
                                                                    $total_mhr_right = $total_mhr_1 + $total_mhr_2 + $total_mhr_3;
                                                                    echo $total_mhr_right;
                                                                ?>
                                                            </td>
														</tr>
														<tr>
															<td>SP</td>
															<td><?php echo $spk_sp ?></td>
															<td><?php echo $spk_sp_2 ?></td>
															<td><?php echo $spk_sp_3 ?></td>
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
															    <?php $total_sp = $sum = floatval($sp_jb) + floatval($sp_xlp) + floatval($sp_bf) + floatval($spk_sp);
																	if($sum > 0) {
																		echo $sum;
																	} else {
																		echo '';
																	}
																?>
															</td>
															<td>
															    <?php $total_sp_2 = $sum = floatval($sp_jb_2) + floatval($sp_xlp_2) + floatval($sp_bf_2) + floatval($spk_sp_2);
																	if($sum > 0) {
																		echo $sum;
																	} else {
																		echo '';
																	}
																?>
															</td>
															<td>
															    <?php $total_sp_3 = $sum = floatval($sp_jb_3) + floatval($sp_xlp_3) + floatval($sp_bf_3) + floatval($spk_sp_3);
																	if($sum > 0) {
																		echo $sum;
																	} else {
																		echo '';
																	}
																?>
															</td>
															<td colspan="2">  <?php $total_sp_all = $sum = floatval($sp_jb_2) + floatval($sp_xlp_2) + floatval($sp_bf_2) + floatval($spk_sp_2)+
                                                            floatval($sp_jb_3) + floatval($sp_xlp_3) + floatval($sp_bf_3) + floatval($spk_sp_3) +  floatval($sp_jb) + floatval($sp_xlp) + floatval($sp_bf) + floatval($spk_sp);
																	if($sum > 0) {
																		echo $sum;
																	} else {
																		echo '';
																	}
																?></td>
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
															<td><?php echo $sp_sp ?></td>
															<td><?php echo $sp_sp_2 ?></td>
															<td><?php echo $sp_sp_3 ?></td>
															<td colspan="2"> <?php $total_sph_all = $sum = floatval($sp_sp) + floatval($sp_sp_2) + floatval($sp_sp_3) ;
																	if($sum > 0) {
																		echo $sum;
																	} else {
																		echo '';
																	}
																?></td>
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
															<td><?php echo $cl ?></td>
															<td><?php echo $cl_2 ?></td>
															<td><?php echo $cl_3 ?></td>
															<td colspan="2"> <?php $total_cl_all = $sum = floatval($cl) + floatval($cl_2) + floatval($cl_3) ;
																	if($sum > 0) {
																		echo $sum;
																	} else {
																		echo '';
																	}
																?></td>
															<td>AIR</td>
															<td></td>
															<td></td>
															<td><?php echo $air ?></td>
															<td><?php echo $air_2 ?></td>
															<td><?php echo $air_3 ?></td>
															<td>
                                                                <?php
                                                                    $total_air_right = floatval($air) + floatval($air_2) + floatval($air_3);
                                                                    echo $total_air_right;
                                                                ?>
                                                            </td>
														</tr>
														<tr>
															<td colspan="2">CLF</td>
															<td><?php echo $clf ?></td>
															<td><?php echo $clf_2 ?></td>
															<td><?php echo $clf_3 ?></td>
															<td colspan="2"><?php $total_clf = $sum = floatval($clf) + floatval($clf_2) + floatval($clf_3) ;
																	if($sum > 0) {
																		echo $sum;
																	} else {
																		echo '';
																	}
																?></td>
															<td>SHELL</td>
															<td></td>
															<td></td>
															<td><?php echo $shell ?></td>
															<td><?php echo $shell_2 ?></td>
															<td><?php echo $shell_3 ?></td>
															<td>
                                                                <?php
                                                                    $total_shell_right = floatval($shell) + floatval($shell_2) + floatval($shell_3);
                                                                    echo $total_shell_right;
                                                                ?>
                                                            </td>

														</tr>
														<tr>
															<td rowspan="2">MH</td>
															<td>MH</td>
															<td><?php echo $mh ?></td>
															<td><?php echo $mh_2 ?></td>
															<td><?php echo $mh_3 ?></td>
															<td colspan="2"> <?php $total_mh2 = $sum = floatval($mh) + floatval($mh_2) + floatval($mh_3) ;
																	if($sum > 0) {
																		echo '';//$sum;
																	} else {
																		echo '';
																	}
																?> </td>
															<td>LOSS</td>
															<td></td>
															<td></td>
															<td><?php echo $loss ?></td>
															<td><?php echo $loss_2 ?></td>
															<td><?php echo $loss_3 ?></td>
															<td>
                                                                <?php
                                                                    $total_loss_right = floatval($loss) + floatval($loss_2) + floatval($loss_3);
                                                                    echo $total_loss_right;
                                                                ?>
                                                            </td>
														</tr>
														<tr>
															<td>MH</td>
															<td><?php echo $mh2 ?></td>
															<td><?php echo $mh2_2 ?></td>
															<td><?php echo $mh2_3 ?></td>
															<td colspan="2"><?php $total_mh3 = $sum = floatval($mh2) + floatval($mh2_2) + floatval($mh2_3) ;
																	if($sum > 0) {
																		echo ''; //$sum;
																	} else {
																		echo '';
																	}
																?></td>
															<td colspan="2">Timb. Kotor</td>
															<td></td>
															<td>
															    <?php
															        $timb =  $total_col + $total_jb + $total_jk + $total_bf + $total_spk + $total_sp + floatval($mh) + floatval($mh2) + floatval($xlp) + floatval($clf) + floatval($cl) + floatval($sp_sp) + $total_phr + floatval($basi_cl) + floatval($basi_mh) + floatval($basi_cl2) + floatval($basi_mh2) + $total_phr2 + floatval($air) + floatval($shell) + floatval($loss);
																	if($timb > 0) {
																		echo $timb;
																	} else {
																		echo '';
																	}
																?>
															</td>
															<td>
															    <?php
															        $timb_2 =  $total_col_2 + $total_jb_2 + $total_jk_2 + $total_bf_2 + $total_spk_2 + $total_sp_2 + floatval($mh_2) + floatval($mh2_2) + floatval($xlp_2) + floatval($clf_2) + floatval($cl_2) + floatval($sp_sp_2) + $total_phr_2 + floatval($basi_cl_2) + floatval($basi_mh_2) + floatval($basi_cl2_2) + floatval($basi_mh2_2) + $total_phr2_2 + floatval($air_2) + floatval($shell_2) + floatval($loss_2);
																	if($timb_2 > 0) {
																		echo $timb_2;
																	} else {
																		echo '';
																	}
																?>
															</td>
															<td>
															    <?php
															        $timb_3 =  $total_col_3 + $total_jb_3 + $total_jk_3 + $total_bf_3 + $total_spk_3 + $total_sp_3 + floatval($mh_3) + floatval($mh2_3) + floatval($xlp_3) + floatval($clf_3) + floatval($cl_3) + floatval($sp_sp_3) + $total_phr_3 + floatval($basi_cl_3) + floatval($basi_mh_3) + floatval($basi_cl2_3) + floatval($basi_mh2_3) + $total_phr2_3 + floatval($air_3) + floatval($shell_3) + floatval($loss_3);
																	if($timb_3 > 0) {
																		echo $timb_3;
																	} else {
																		echo '';
																	}
																?>
															<td>
                                                                <?php
                                                                    $total_timb_kotor = $timb + $timb_2 + $timb_3;
                                                                    echo $total_timb_kotor;
                                                                ?>
                                                            </td>
														</tr>
														<tr>
															<td colspan="2">Total MH</td>
															<td>
															    <?php $total_mh = $sum = floatval($mh) + floatval($mh2);
																	if($sum > 0) {
																		echo $sum;
																	} else {
																		echo '';
																	} 
																	$total_mh = $sum;
																?>
															</td>
															<td>
															    <?php $total_mh_2 = $sum = floatval($mh_2) + floatval($mh2_2);
																	if($sum > 0) {
																		echo $sum;
																	} else {
																		echo '';
																	} 
																	$total_mh_2 = $sum;
																?>
															</td>
															<td>
															    <?php $total_mh_3 = $sum = floatval($mh_3) + floatval($mh2_3);
																	if($sum > 0) {
																		echo $sum;
																	} else {
																		echo '';
																	} 
																	$total_mh_3 = $sum;
																?>
															</td>
															<td colspan="2"> <?php $total_mh_all = $sum = floatval($mh) +floatval($mh2_3)+floatval($mh2_2)+floatval($mh_2)+ floatval($mh_3)+ floatval($mh2);
																	if($sum > 0) {
																		echo $sum;
																	} else {
																		echo '';
																	} 
																	$total_mh_all = $sum;
																?></td>
															<td colspan="2">Timb. BB</td>
															<td></td>
															<td><?php echo $qty ?></td>
															<td></td>
															<td></td>
															<td>
                                                                <?php
                                                                    $total_timb_bersih = $qty;
                                                                    echo $total_timb_bersih;
                                                                ?>
                                                            </td>
														</tr>
														<tr>
															<td colspan="2">Grand Total</td>
															<td><?php echo $total_col + $total_jb + $total_jk + $total_bf + $total_spk + $total_sp + floatval($mh) + floatval($mh2) + floatval($xlp) + floatval($clf) + floatval($cl) + floatval($sp_sp)  ?></td>
															<td><?php echo $total_col_2 + $total_jb_2 + $total_jk_2 + $total_bf_2 + $total_spk_2 + $total_sp_2 + $total_mh_2 + floatval($xlp_2) + floatval($clf_2) + floatval($cl_2) + floatval($sp_sp_2)  ?></td>
															<td><?php echo $total_col_3 + $total_jb_3 + $total_jk_3 + $total_bf_3 + $total_spk_3 + $total_sp_3 + $total_mh_3 + floatval($xlp_3) + floatval($clf_3) + floatval($cl_3) + floatval($sp_sp_3)  ?></td>
															<td colspan="2"><?php echo
                                                                $total_col_all + $total_jb_all + $total_jk_all + $total_xlp_2 + $total_bf_all + $total_spk_all + $total_sp_all + $total_sph_all + $total_cl_all + $total_clf + $total_mh_all;
                                                            ?></td>
															<td colspan="2">Grand Total</td>
															<td></td>
															<td><?php echo 
															    $total_col + $total_jb + $total_jk + $total_bf + $total_spk + $total_sp + floatval($mh) + floatval($mh2) + floatval($xlp) + floatval($clf) + floatval($cl) + floatval($sp_sp) + $total_phr + floatval($basi_cl) + floatval($basi_mh) + floatval($basi_cl2) + floatval($basi_mh2) + $total_phr2;
															?></td>
															<td><?php echo 
															    $total_col_2 + $total_jb_2 + $total_jk_2 + $total_bf_2 + $total_spk_2 + $total_sp_2 + floatval($mh_2) + floatval($mh2_2) + floatval($xlp_2) + floatval($clf_2) + floatval($cl_2) + floatval($sp_sp_2) + $total_phr_2 + floatval($basi_cl_2) + floatval($basi_mh_2) + floatval($basi_cl2_2) + floatval($basi_mh2_2) + $total_phr2_2;
															?></td>
															<td><?php echo 
															    $total_col_3 + $total_jb_3 + $total_jk_3 + $total_bf_3 + $total_spk_3 + $total_sp_3 + floatval($mh_3) + floatval($mh2_3) + floatval($xlp_3) + floatval($clf_3) + floatval($cl_3) + floatval($sp_sp_3) + $total_phr_3 + floatval($basi_cl_3) + floatval($basi_mh_3) + floatval($basi_cl2_3) + floatval($basi_mh2_3) + $total_phr2_3;
															?></td>
															<td>
                                                                <?php
                                                                    echo $total_phr_right + $total_mhr_right + $total_air_right + $total_shell_right + $total_loss_right + $total_timb_kotor + $total_timb_bersih;
                                                                ?>
                                                            </td>
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
											<p>Note: <?php echo $ss['note'] ?></p>
										</div>
                                    </div>
                                            <div class="modal-footer">
                                                <?php if($ss['status'] == 0 || $ss['status'] == 1) { ?>
                                                <a
                                                    href="<?php echo base_url('main/approveSortirTL/'.$ss['id_sortir'].'/2'); ?>"
                                                    class="btn btn-primary">Approve</a>
                                                <?php } ?>
                                                <button class="btn btn-primary" onclick="printDisini(<?php echo $ss['id'] ?>)">Print</button>

                                            </div>
                                        </div>
                                    </td>
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
                            <form action="<?php echo base_url('main/sortirPost'); ?>" method="post">
                                <div class="modal-body">
                                    <div class="container">
                                        <input type="hidden" name="id_bb" id="getId" value="">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="kode_supplier">Kode Supplier</label>
                                                    <select id="kode_supplier" name="kode_supplier" class="form-control">
                                                        <option selected="selected">Pilih Salah satu</option>
                                                        <?php foreach($supplier as $sup) :?>
                                                        <option value="<?= $sup['kode_supplier']?>"><?= $sup['kode_supplier']?>
                                                            -
                                                            <?= $sup['nama_supplier']?></option>
                                                        <?php endforeach?>
                                                    </select>
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
                                                        value="1"
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
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">TIMBANGAN KOTOR</label>
                                                    <input
                                                        type="number"
                                                        min="0"
                                                        class="form-control"
                                                        id="TIMBANGAN KOTOR"
                                                        name="timbangan_kotor">
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">TIMBANGAN BB</label>
                                                    <input type="text" class="form-control" id="TIMBANGAN BB" name="timbangan_bb">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <button type="submit" class="btn btn-primary">Simpan Sementara</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
