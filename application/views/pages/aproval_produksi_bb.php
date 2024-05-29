

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
                   
                        <th scope="col">Status</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
					$no = 1;
					 foreach ($daging as $ss) : 
					 ?>

                    <tr>
                        <th scope="row"><?php echo $no++ ?></th>
                        <td><?php echo $ss['supplier'] ?></td>
                        <td><?php echo $ss['tanggal'] ?></td>
                      
						<td class="text-center">
						<?php
						// Get the status code from $data['status']
						$status = $ss['status'];

						// Check the status code and display corresponding text
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
						} elseif ($status == -1) {
							echo "Rejected";
						} else {
							echo "Unknown"; // Handle any other status code
						}
						?>
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
												<style>
													.container-fluid, .container-lg, .container-md, .container-sm, .container-xl {
														width: 100%;
														padding-right: 7.5px;
														padding-left: 7.5px;
														margin-right: auto;
														margin-left: auto;
													}
													.text-center {
														text-align: center !important;
													}
													.h4, h4 {
														font-size: 1.5rem;
													}
													.h1, .h2, .h3, .h4, .h5, .h6, h1, h2, h3, h4, h5, h6 {
														margin-bottom: .5rem;
														font-family: inherit;
														font-weight: 500;
														line-height: 1.2;
														color: inherit;
													}
													.mb-2, .my-2 {
														margin-bottom: .5rem !important;
													}

													.mt-2, .my-2 {
														margin-top: .5rem !important;
													}
													.justify-content-between {
														-ms-flex-pack: justify !important;
														justify-content: space-between !important;
													}
													.d-flex {
														display: -ms-flexbox !important;
														display: flex !important;
													}
													div {
														display: block;
														unicode-bidi: isolate;
													}
													table {
														display: table;
														text-indent: initial;
														unicode-bidi: isolate;
														border-spacing: 2px;
														border-collapse: collapse;
													}
													.table-bordered {
														border: 1px solid #dee2e6;
													}
													.w-100 {
														width: 100% !important;
													}
													thead {
														display: table-header-group;
														vertical-align: middle;
														unicode-bidi: isolate;
														border-color: inherit;
													}
													td {
														border: 1px solid #dee2e6;
													}
												</style>
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
												WHERE id_bahan_baku = ".$ss['id'].' order by spek desc')->result_array(); // Jika ingin dalam bentuk array asosiatif, tambahkan parameter kedua 'true'
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
												<p class="mt-2">Keterangan : 
													<?php 
													echo $ss['keterangan'] ?>	
												</p>
												</div>
												</div>
												<form action="" method="post" enctype="multipart/form" id="edit_kocak<?= $ss['id'] ?>">
													<div class="modal-footer">
													 <?php
														if(!$ss['keterangan'] && $ss['status'] == 1) { ?>
														<input type="text" name="keterangan" class="form-control mx-2" placeholder="keterangan" id="">
														<button onclick="EditKocak('<?php echo base_url('main/mainApprove/').$ss['id']; ?>', 'edit_kocak<?= $ss['id'] ?>')" class="btn
														btn-primary">Approve</button>
														<button onclick="EditKocak('<?php echo base_url('main/mainReject/').$ss['id']; ?>', 'edit_kocak<?= $ss['id'] ?>')" class="btn
														btn-danger">Reject</button>
														<?php } ?> 
														<button
                                                        type="button"
                                                        onclick="printDisiniNoteTimbang(<?php echo $ss['id'] ?>)"
                                                        class="btn btn-primary">Print</a>
														<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
													</div>
												</form>
                                            </div>
                                        </div>
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

    <div class="modal fade" id="myModal">
        <div class="modal-dialog modal-xl modal-fullscreen">
          
        </div>
    </div>
</div>
