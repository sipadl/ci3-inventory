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
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr class="text-center">
                    <th>No</th>
                    <th>Speck Bahan</th>
                    <th>Tanggal</th>
                    <th>Suplier</th>
                    <th >Daging Putih</th>
                    <th >Daging Merah</th>
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
                    <td>
                        <table class="table-border">
                            <thead>
                                <tr>
                                    <th>Spek</th>
                                    <th>Bungkus</th>
                                    <th>T.Kotor</th>
                                    <th>T.Bersih</th>
                                </tr>
                            </thead>
                            <?php 
                                $dagingPutih = json_decode($data['daging_putih'], true); // Jika ingin dalam bentuk array asosiatif, tambahkan parameter kedua 'true'
                                ?>
                            <tbody>
                            <?php foreach ($dagingPutih as $dp) : ?>
                                <tr>
                                    <td><?php echo $dp['spek']; ?></td>
                                    <td><?php echo $dp['bungkus']; ?></td>
                                    <td><?php echo $dp['tkotor']; ?></td>
                                    <td><?php echo $dp['tbersih']; ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </td>
                    <td>
                        <table class="table-border">
                            <thead>
                                <tr>
                                    <th>Spek</th>
                                    <th>Bungkus</th>
                                    <th>T.Kotor</th>
                                    <th>T.Bersih</th>
                                </tr>
                            </thead>
                            <?php 
                                $dagingPutihx = json_decode($data['daging_merah'], true); // Jika ingin dalam bentuk array asosiatif, tambahkan parameter kedua 'true'
                                ?>
                            <tbody>
                            <?php foreach ($dagingPutihx as $dp) : ?>
                                <tr>
                                    <td><?php echo $dp['spek']; ?></td>
                                    <td><?php echo $dp['bungkus']; ?></td>
                                    <td><?php echo $dp['tkotor']; ?></td>
                                    <td><?php echo $dp['tbersih']; ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </td>
					<td>
						<div class="d-flex">
							<a href="" class="btn btn-sm btn-primary mx-1">Aprrove </a>
							<a href="" class="btn btn-sm btn-danger mx-1">Reject </a>
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
											<option value="<?php echo $sup['nama_supplier'] ?>"><?php echo $sup['nama_supplier'] ?></option>
										<?php endforeach; ?>
									</select>
								</div>
                                </div>
                                <div class="col-md-3 col-sm-12">
                                    <div class="form-group">
                                        <label for="dagingMerah">Spesifikasi Bahan:</label>
                                        <input type="text" class="form-control" id="spesifikasi"></div>
                                    </div>
                                    <div class="col-md-3 col-sm-12">
                                        <div class="form-group">
                                            <label for="qty">Qty:</label>
                                            <input type="number" min="0" class="form-control" id="qty"></div>
                                        </div>
                                    </div>
                                    <div class="isi">
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
