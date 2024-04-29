<div class="col-md-12">
    <button
        type="button"
        class="btn btn-primary"
        data-toggle="modal"
		onclick="addDaging()"
        data-target="#exampleModal">
        Tambah Data
    </button>
	<div class="col-md-12 mt-2 p-0 mx-0">
<?php
// Check if flash data exists
if ($this->session->flashdata('success')) {
// If it does, display a success message
echo '<div class="alert alert-success my-2">' . $this->session->flashdata('success') . '</div>';
}
?>
    <div class="table-responsive">
        <table class="table table-bordered" id="myTable">
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
                <?php foreach ($daging as $data ) : ?>
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
							echo "Waiting";
						} elseif ($status == 2) {
							echo "Accepted";
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
												<div class="d-flex justify-content-between my-2">
													<div class="">Kode Supplier : <?php echo $data['supplier'] ?></div>
													<div class="">Tanggal : <?php echo $data['tanggal'] ?></div>
												</div>
												<?php 
												$dataDaging = $this->db->query("SELECT * FROM tbl_sub_daging 
												WHERE id_bahan_baku = ".$data['id'].' order by spek desc')->result_array(); // Jika ingin dalam bentuk array asosiatif, tambahkan parameter kedua 'true'
												?>
												<table class="table-bordered w-100">
													<thead class="text-center">
														<tr class="text-center">
															<tr>
																<!-- <th rowspan="2" class="w-50">Speck Bahan</th> -->
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
														<?php foreach($dataDaging as $dd) { 
															 ?>
															<tr>
																<!-- <td><?php echo $dd['spesifikasi_bahan'] ?></td> -->
																<?php if($dd['tipe'] == 0 ) { ?> 
																<td><?php echo $dd['qty'] ?></td>
																<td><?php echo $dd['spek'] ?></td>
																<td><?php echo $dd['bungkus'] ?></td>
																<td><?php echo $dd['tkotor'] ?></td>
																<td><?php echo $dd['tbersih'] ?></td>
																<?php } else { ?>
																	<td></td>
																	<td></td>
																	<td></td>
																	<td></td>
																	<td></td>
																<?php }?>
																	 <?php if($dd['tipe'] == 1 ) { ?> 
																	<td><?php echo $dd['spek'] ?></td>
																	<td><?php echo $dd['bungkus'] ?></td>
																	<td><?php echo $dd['tkotor'] ?></td>
																	<td><?php echo $dd['tbersih'] ?></td>
																<?php } else { ?>
																	<td></td>
																	<td></td>
																	<td></td>
																	<td></td>
																<?php }?>
															</tr>
														<?php } ?>

														<tr>
															<td colspan="3" height="90px" class="text-center">Dibuat</td>
															<td colspan="3" height="90px" class="text-center">Diperiksa</td>
															<td colspan="3" height="90px" class="text-center">Disetujui</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
										<div class="modal-footer">
											<!-- <a href="<?php echo base_url('main/mainApprove/').$data['id']; ?>" class="btn btn-primary">Aprove</a>
											<a href="<?php echo base_url('main/mainReject/').$data['id']; ?>" class="btn btn-danger">Reject</a> -->
											<button type="button" onclick="printDisini(<?php echo $data['id'] ?>)" class="btn btn-primary">Print</a>
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										</div>
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

    <!-- List Group -->
</div>
<!-- Modal -->
<div
    class="modal fade"
    id="exampleModal"
    tabindex="-1"
    role="dialog"
    aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div
        class="modal-dialog modal-lg modal-dialog-scrollable modal-fullscreen"
        role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">FORM NOTA TIMBANG BAHAN BAKU RAJUNGAN (SD.100.1002)</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
			<form id="dataForm" method="post">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label for="tanggal">Tanggal:</label>
                                <input type="date" class="form-control" id="tanggal"></div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="supplier">Supplier:</label>
                                    <select class="form-control" id="supplier" name="supplier">
										<?php
										foreach ($supplier as $sup) : ?>
											<option value="<?php echo $sup['kode_supplier'] ?>"><?php echo $sup['kode_supplier'] ?></option>
										<?php endforeach; ?>
									</select>
								</div>
                                </div>
                                <div class="col-md-12 col-sm-12">
								</div>
                                    <div class="isi p-2">
									</div>
									<div>
										<button class="btn btn-sm btn-warning mx-1" onclick="addDaging(false, 0)" type="button">Tambah Daging Putih</button>
										<button class="btn btn-sm btn-warning mx-1" onclick="addDaging(true, 1)" type="button">Tambah Daging Merah</button>
									</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
										<!-- <button type="button" class="btn btn-warning" onclick="addDaging()">Tambah Data</button> -->
										<button type="button" onclick="kirimData()" class="btn btn-primary">Simpan</button>
									</div>
								</div>
							</div>
						</div>
						</div>
