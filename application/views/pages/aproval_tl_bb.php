<div class="col-md-12">
    <!-- <button
        type="button"
        class="btn btn-primary"
        data-toggle="modal"
		onclick="addDaging()"
        data-target="#exampleModal">
        Tambah Data
    </button> -->
<div class="col-md-12 mt-2 p-0 mx-0">
<?php
// Check if flash data exists
if ($this->session->flashdata('success')) {
// If it does, display a success message
echo '<div class="alert alert-success my-2">' . $this->session->flashdata('success') . '</div>';
}
?>
    <div class="table-responsive">
        <table class="responsive table table-bordered" id="myTable">
            <thead>
                <tr class="text-center">
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Kode Suplier</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($daging as $data ) :
				?>
                <tr>
                    <td><?php print $no++ ?></td>
                    <!-- <td><?php print $data['spesifikasi'] ?></td> -->
                    <td><?php print $data['tanggal'] ?></td>
                    <td><?php print $data['supplier'] ?></td>
                    <td class="text-center">
						<?php
						// Get the status code from $data['status']
						$status = $data['status'];

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
						<div class="d-flex justify-content-center">
							<!-- <a href="" class="btn btn-sm btn-primary mx-1"> -->
								<!-- Button trigger modal -->
								<button type="button" class="btn btn-light btn-sm" data-toggle="modal" data-target="#modelId<?php echo $data['id']; ?>">
									<i class="fas fa-eye"></i>
							</button>
							
							<!-- Modal -->
							<div class="modal fade" id="modelId<?php echo $data['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
								<div class="modal-dialog modal-fullscreen modal-xl" role="document">
									<div class="modal-content">
											<div class="modal-header">
													<h5 class="modal-title">Form Timbang Bahan Baku</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
												</div>
										<div class="modal-body" id="<?php echo 'modal-print-'.$data['id'] ?>">
											<div class="container-fluid">
												<div class="text-center">
													<h4>Nota Timbang Bahan Baku Rajungan</h4>
												</div>
												<div class="d-flex justify-content-between my-2">
													<div class="">Kode Supplier : <?php echo $data['supplier'] ?></div>
													<div class="">(SD.100.1002)</div>
													<div class="">Tanggal : <?php echo $data['tanggal'] ?></div>
												</div>
												<?php 
												$dataDaging = $this->db->query("SELECT * FROM tbl_sub_daging 
												WHERE id_bahan_baku = ".$data['id'].' order by spek desc')->result_array(); // Jika ingin dalam bentuk array asosiatif, tambahkan parameter kedua 'true'
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
																<td><?php echo $dd['spesifikasi_bahan'] ?></td>
																<?php if($dd['tipe'] == 0 ) { ?> 
																	<?php if($dd['spek2']) { ?>
																		<td><?php echo $dd['tbersih'] >= 1 ? $dd['tbersih'] : '' ?></td>
																		<?php } else { ?>
																			<td><?php echo $dd['qty'] >= 1 ? $dd['qty'] : '' ?></td>
																		<?php } ?>
																<td><?php echo $dd['spek'] ?></td>
																<td><?php echo $dd['bungkus'] ?></td>
																<td><?php echo $dd['tkotor'] ?></td>
																<td><?php echo $dd['tbersih'] ?></td>
																<td><?php echo $dd['spek2'] ?></td>
																<td><?php echo $dd['bungkus2'] ?></td>
																<td><?php echo $dd['tkotor2'] ?></td>
																<td><?php echo $dd['tbersih2'] ?></td>
																<?php }?>
																<?php if($dd['tipe'] == 1 ) { ?> 
																<td><?php echo $dd['qty'] >= 1 ? $dd['qty'] : '' ?></td>
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
										<form action="" method="post" enctype="multipart/form" id="kocak">
											<!-- <div class="form-group container">
												<input type="text" name="keterangan" placeholder="keterangan" class="form-control px-4" id="">
											</div> -->
											<div class="modal-footer">
												<?php if($data['status'] != 1) { ?> 
													<button onclick="EditKocak('<?php echo base_url('main/mainApprove/').$data['id']; ?>','kocak')" type="button" class="btn btn-primary">Aprove</button>
													<!-- <button onclick="EditKocak('<?php echo base_url('main/mainReject/').$data['id']; ?>','kocak')" class="btn btn-danger">Reject</button> -->
													<!-- <button type="button" onclick="printDisini(<?php echo $data['id'] ?>)" class="btn btn-primary">Print</a> -->
												<?php } ?>
												<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
											</div>
										</form>
									</div>
								</div>
							</div>
							<!-- Lihat Detail</a> -->
						</div>
					</td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
</div>
