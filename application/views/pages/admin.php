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
                    <th>Speck Bahan</th>
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
                    <td><?php print $data['spesifikasi'] ?></td>
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
												<table class="table-bordered" id="myTable2">
													<thead class="text-center">
														<tr class="text-center">
															<th class="w-50">Speck Bahan</th>
															<th>Quantity</th>
															<th colspan="">Daging Putih</th>
															<th colspan="">Daging Merah</th>
														</tr>
													</thead>
													<tbody>
														<tr class="text-center">
															<td><?php echo $data['spesifikasi'] ?></td>
															<td><?php echo $data['qty'] ?></td>
														<td class="">
															<table class="table-bordered">
																<thead>
																	<tr>
																		<th class="hehes">Spek</th>
																		<th class="hehes">Bungkus</th>
																		<th class="hehes">T.Kotor</th>
																		<th class="hehes">T.Bersih</th>
																	</tr>
																</thead>
																<?php 
																	$dagingPutih = json_decode($data['daging_putih'], true); // Jika ingin dalam bentuk array asosiatif, tambahkan parameter kedua 'true'
																	?>
																<tbody>
																<?php foreach ($dagingPutih as $dp) : ?>
																	<tr>
																		<td class="hehes"><?php echo $dp['spek']; ?></td>
																		<td class="hehes"><?php echo $dp['bungkus']; ?></td>
																		<td class="hehes"><?php echo $dp['tkotor']; ?></td>
																		<td class="hehes"><?php echo $dp['tbersih']; ?></td>
																	</tr>
																	<?php endforeach; ?>
																</tbody>
															</table>
														</td>
														<td class="">
															<table class="table table-bordered">
																<thead>
																	<tr>
																		<th class="hehes">Spek</th>
																		<th class="hehes">Bungkus</th>
																		<th class="hehes">T.Kotor</th>
																		<th class="hehes">T.Bersih</th>
																	</tr>
																</thead>
																<?php 
																	$dagingPutihx = json_decode($data['daging_merah'], true); // Jika ingin dalam bentuk array asosiatif, tambahkan parameter kedua 'true'
																	?>
																<tbody>
																<?php foreach ($dagingPutihx as $dp) : ?>
																	<tr>
																		<td class="hehes"><?php echo $dp['spek']; ?></td>
																		<td class="hehes"><?php echo $dp['bungkus']; ?></td>
																		<td class="hehes"><?php echo $dp['tkotor']; ?></td>
																		<td class="hehes"><?php echo $dp['tbersih']; ?></td>
																	</tr>
																	<?php endforeach; ?>
																</tbody>
															</table>
													</td> 
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
                        <div class="col-md-3 col-sm-12">
                            <div class="form-group">
                                <label for="tanggal">Tanggal:</label>
                                <input type="date" class="form-control" id="tanggal"></div>
                            </div>
                            <div class="col-md-3 col-sm-12">
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
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <label for="dagingMerah">Spesifikasi Bahan:</label>
                                        <input type="text" class="form-control" id="spesifikasi"></div>
                                    </div>
                                    <!-- <div class="col-md-3 col-sm-12">
                                        <div class="form-group">
                                            <label for="qty">Qty:</label>
                                            <input type="text" min="0" class="form-control" id="qty"></div>
                                        </div>
                                    </div> -->
                                    <div class="isi p-2">
										</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
										<button type="button" class="btn btn-warning" onclick="addDaging()">Tambah Data</button>
										<button type="button" onclick="kirimData()" class="btn btn-primary">Simpan</button>
									</div>
								</div>
							</div>
						</div>
						</div>
