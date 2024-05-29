<div class="row">
    <div class="col-md-12">
        <!-- Button trigger modal -->
        <button
            type="button"
            class="btn btn-primary btn-sm my-2"
            data-toggle="modal"
            data-target="#modelId">
            Tambah Pengajuan DP
        </button>
        <button
            type="button"
            class="btn btn-primary btn-sm my-2"
            data-toggle="modal"
            data-target="#modelIdLaporan">
            Laporan
        </button>
        <!-- Modal -->
        <div
            class="modal fade"
            id="modelIdLaporan"
            tabindex="-1"
            role="dialog"
            aria-labelledby="modelTitleId"
            aria-hidden="true">
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
                            <table
                                class="responsive table table-responsive table-bordered"
                                id="myTablePrintAble">
                                <thead>
                                    <tr>
                                        <th colspan="16" style="text-align:center;">
                                            PT. Fresh On Time Seafood
                                            <br>Rekapitulasi Pembayaran DP supplier
                                        </th>
                                    </tr>
                                    <tr>
                                        <!-- <th colspan="16" style="text-align:center;">Tanggal: <?= date('Y-m-d')
                                        ?></th> -->
                                    </tr>
									
                                    <tr>
                                        <th rowspan="2">No.</th>
                                        <th rowspan="2">Nama Supplier</th>
                                        <th rowspan="2">Area</th>
                                        <th rowspan="2">QTTY(KG)</th>
                                        <th rowspan="2">DP 100%</th>
                                        <th rowspan="2">DP 60%</th>
                                        <th rowspan="2">DP yang di minta supplier</th>
                                        <th rowspan="2">Potongan</th>
                                        <th rowspan="2">Total Bayar</th>

                                        <th rowspan="2">Bank</th>
                                        <th rowspan="2">No.Rek.</th>
                                        <th rowspan="2">Tanggal</th>
                                        <th rowspan="2">Ket</th>
                                    </tr>
									</thead>
                                    <tbody>
                                        <?php
									$no = 1; 
									$status = null;
									foreach($data as $dd ) :
										$status = $dd['status'];
										?>
                                        <tr>
                                            <th scope="row"><?php echo $no++ ?></th>
                                            <td><?php echo $dd['nama_supplier'] ?></td>
                                            <td><?php echo $dd['area'] ?></td>
                                            <td><?php echo $dd['bahan_masuk'] ?></td>
                                            <td><?php echo $dd['dp_100'] ?></td>
                                            <td><?php echo $dd['dp_60'] ?></td>
                                            <td><?php echo $dd['request_dp'] ?></td>
                                            <td></td>
                                            <td><?php echo $dd['total_bayar'] ?></td>
                                            <td><?php echo $dd['bank'] ?></td>
                                            <td><?php echo $dd['no_rek'] ?></td>
                                            <td></td>
                                        </tr>
                                        <?php endforeach; ?>
									</tbody>
								</table>
							</div>
						</div>
						<div class="modal-footer">
							<div class="d-flex justify-content-between w-100">
							<?php if($status == 2) { 
							$gm = $this->db->query('select * from tbl_user where role = 2')->row_array();	
							$audit = $this->db->query('select * from tbl_user where role = 12')->row_array();	
							?> 
									<div class="mx-4">
										<?php if (!empty($gm) && !empty($gm['sign'])): ?>
											<img width="80" height="80" src="<?php echo base_url('upload/images/'.$gm['sign']) ?>" />
										<?php endif; ?>
										
										<?php if (!empty($audit) && !empty($audit['sign'])): ?>
											<img width="80" height="80" src="<?php echo base_url('upload/images/'.$audit['sign']) ?>" />
										<?php endif; ?>
									</div>

									<?php } else { ?>
										<div class=""></div>
									<?php } ?>
									<div class="">
	
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										<button type="button" onclick="exportToExcel2()" class="btn btn-primary">Print</button>
									</div>
								</div>
                                <!-- <button type="button" class="btn btn-primary">Save</button> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="modal fade"
                    id="modelId"
                    tabindex="-1"
                    role="dialog"
                    aria-labelledby="modelTitleId"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-fullscreen" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Form Pengajuan DP</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form
                                    action="<?php echo base_url('main/post_pengajuan_dp'); ?>"
                                    method="post"
                                    enctype="multipart/form-data">
                                    <div class="form-group row">
                                        <label for="" class="form-control-label col-12">Supplier</label>
                                        <div class="col-md-12">
                                            <select
                                                name="supplier"
                                                id="basic-multiple"
                                                class="form-control generateId"
                                                required="required">
                                                readonly<option value="">
                                                    Pilih Supplier</option >
                                                <?php foreach ($supplier as $ass) { ?>
                                                <option value="<?php echo $ass['kode_supplier'] ?>"><?php echo $ass['kode_supplier'].' - '.$ass['nama_supplier'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group row">
                                                <label for="" class="form-control-label col-md-12 col-sm-12">Area</label>
                                                <div class="col-md-12 col-sm-12">
                                                    <input
                                                        type="text"
                                                        class="form-control"
                                                        readonly="readonly"
                                                        id="supp_area"
                                                        name="area"
                                                        placeholder="area">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group row">
                                                <label for="" class="form-control-label col-md-12 col-sm-12">Perk.Bahan Masuk (KG)</label>
                                                <div class="col-md-12 col-sm-12">
                                                    <input
                                                        type="text"
                                                        class="form-control"
                                                        name="bahan_masuk"
                                                        placeholder="Perk.Bahan Masuk (KG)">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group row">
                                                <label for="" class="form-control-label col-md-12 col-sm-12">QTTY(KG)</label>
                                                <div class="col-md-12 col-sm-12">
                                                    <input type="text" class="form-control" name="qty_kg" placeholder="QTTY(KG)">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group row">
                                                <label for="" class="form-control-label col-md-12 col-sm-12">Upload Gambar</label>
                                                <div class="col-md-12 col-sm-12">
                                                    <input
                                                        type="file"
                                                        class="form-control"
                                                        name="upload_images"
                                                        placeholder="Perk.Bahan Masuk (KG)">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group row">
                                                <label for="" class="form-control-label col-md-12 col-sm-12">DP 100% as</label>
                                                <div class="col-md-12 col-sm-12">
                                                    <input
                                                        type="text"
                                                        id="dengan-rupiah"
                                                        class="form-control"
                                                        name="dp_100"
                                                        placeholder="DP 100%">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group row">
                                                <label for="" class="form-control-label col-md-12 col-sm-12">DP 60%</label>
                                                <div class="col-md-12 col-sm-12">
                                                    <input
                                                        type="text"
                                                        id="dengan-rupiah_satu"
                                                        class="form-control"
                                                        name="dp_60"
                                                        placeholder="DP 60%">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group row">
                                                <label for="" class="form-control-label col-md-12 col-sm-12">DP Diminta</label>
                                                <div class="col-md-12 col-sm-12">
                                                    <input
                                                        type="text"
                                                        id="dengan-rupiah_dua"
                                                        class="form-control"
                                                        name="request_dp"
                                                        placeholder="DP yang diminta">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group row">
                                                <label for="" class="form-control-label col-md-12 col-sm-12">Total Bayar</label>
                                                <div class="col-md-12 col-sm-12">
                                                    <input
                                                        type="text"
                                                        id="dengan-rupiah_tiga"
                                                        class="form-control"
                                                        name="total_bayar"
                                                        placeholder="Total Bayar">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group row">
                                                <label for="" class="form-control-label col-md-12 col-sm-12">Bank</label>
                                                <div class="col-md-12 col-sm-12">
                                                    <input
                                                        type="text"
                                                        class="form-control"
                                                        id="supp_bank"
                                                        readonly="readonly"
                                                        name="bank"
                                                        placeholder="Bank">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group row">
                                                <label for="" class="form-control-label col-md-12 col-sm-12">No Rekening</label>
                                                <div class="col-md-12 col-sm-12">
                                                    <input
                                                        type="text"
                                                        class="form-control"
                                                        readonly="readonly"
                                                        id="supp_no_rek"
                                                        name="no_rek"
                                                        placeholder="No Rekening">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-12">
                                            <div class="form-group row">
                                                <label for="" class="form-control-label col-md-12 col-sm-12">Tanggal</label>
                                                <div class="col-md-12 col-sm-12">
                                                    <input
                                                        type="date"
                                                        class="form-control"
                                                        required="required"
                                                        name="tanggal_transaksi"
                                                        placeholder="Tanggal">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group row">
                                                <label for="" class="form-control-label col-md-12 col-sm-12">Keterangan</label>
                                                <div class="col-md-12 col-sm-12">
                                                    <textarea name="keterangan" id="" cols="" rows="5" class="form-control"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div>Tanpa Rupiah:</div> <input type="text" id="tanpa-rupiah"/> <div>Dengan
                                    Rp:</div> <input type="text" /> </div> -->
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Simpan
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="my-2">
                    <?php 
			// Check if flash data exists
			if ($this->session->flashdata('success')) {
			// If it does, display a success message
			echo '<div class="alert alert-success my-2">' . $this->session->flashdata('success') . '</div>';
			}
			?>
                </div>
                <table class="responsive table" id="myTable4">
                    <thead>
                        <th>No.</th>
                        <th>Supplier</th>
                        <th>Area</th>
                        <th>Perk. Bahan Masuk</th>
                        <th>DP yang diminta</th>
                        <th>Total Bayar</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        <?php
			$no = 1; 
			foreach($data as $dd) : ?>
                        <tr>
                            <th scope="row"><?php echo $no++ ?></th>
                            <td><?php echo $dd['supplier'] ?></td>
                            <td><?php echo $dd['area'] ?></td>
                            <td><?php echo $dd['bahan_masuk'] ?></td>
                            <td><?php echo $dd['request_dp'] ?></td>
                            <td><?php echo $dd['total_bayar'] ?></td>

                            <td><?php echo $dd['tanggal_transaksi'] ?></td>
                            <td>
                            <?php 
						$status = $dd['status'];
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
                                <!-- Button trigger modal -->
                                <button
                                    type="button"
                                    class="btn btn-light btn-sm"
                                    data-toggle="modal"
                                    data-target="#modelId-<?php echo $dd['id'] ?>">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </button>

                                <!-- Modal -->
                                <div
                                    class="modal fade"
                                    id="modelId-<?php echo $dd['id'] ?>"
                                    tabindex="-1"
                                    role="dialog"
                                    aria-labelledby="modelTitleId"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Modal title</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group row">
                                                    <label for="" class="form-control-label col-12">Supplier</label>
                                                    <div class="col-md-12">
                                                        <input
                                                            type="text"
                                                            name="area"
                                                            class="form-control"
                                                            placeholder=""
                                                            readonly="readonly"
                                                            value="<?php echo $dd['supplier'] ?>"
                                                            id="">
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4 col-sm-12">
                                                        <div class="form-group row">
                                                            <label for="" class="form-control-label col-md-12 col-sm-12">Area</label>
                                                            <div class="col-md-12 col-sm-12">
                                                                <input
                                                                    type="text"
                                                                    class="form-control"
                                                                    readonly="readonly"
                                                                    id="supp_area"
                                                                    value="<?php echo $dd['area'] ?>"
                                                                    name="area"
                                                                    placeholder="area">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-sm-12">
                                                        <div class="form-group row">
                                                            <label for="" class="form-control-label col-md-12 col-sm-12">Perk.Bahan Masuk (KG)</label>
                                                            <div class="col-md-12 col-sm-12">
                                                                <input
                                                                    type="text"
                                                                    class="form-control"
                                                                    name="bahan_masuk"
                                                                    readonly="readonly"
                                                                    value="<?php echo $dd['bahan_masuk'] ?>"
                                                                    placeholder="Perk.Bahan Masuk (KG)">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-sm-12">
                                                        <div class="form-group row">
                                                            <label for="" class="form-control-label col-md-12 col-sm-12">Upload Gambar</label>
                                                            <div class="col-md-12 col-sm-12">
                                                                <img
                                                                    height="50"
                                                                    width="50"
                                                                    src="<?php echo base_url('upload/images/'.$dd['upload_images']); ?>"
                                                                    alt="...">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-sm-12">
                                                        <div class="form-group row">
                                                            <label for="" class="form-control-label col-md-12 col-sm-12">DP 60%</label>
                                                            <div class="col-md-12 col-sm-12">
                                                                <input
                                                                    type="text"
                                                                    class="form-control"
                                                                    name="dp_60"
                                                                    readonly="readonly"
                                                                    value="<?php echo $dd['dp_60'] ?>"
                                                                    placeholder="DP 60%">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-sm-12">
                                                        <div class="form-group row">
                                                            <label for="" class="form-control-label col-md-12 col-sm-12">DP Diminta</label>
                                                            <div class="col-md-12 col-sm-12">
                                                                <input
                                                                    type="text"
                                                                    class="form-control"
                                                                    name="request_dp"
                                                                    readonly="readonly"
                                                                    value="<?php echo $dd['request_dp'] ?>"
                                                                    placeholder="DP yang diminta">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-sm-12">
                                                        <div class="form-group row">
                                                            <label for="" class="form-control-label col-md-12 col-sm-12">Total Bayar</label>
                                                            <div class="col-md-12 col-sm-12">
                                                                <input
                                                                    type="text"
                                                                    class="form-control"
                                                                    required="required"
                                                                    name="total_bayar"
                                                                    readonly="readonly"
                                                                    value="<?php echo $dd['total_bayar'] ?>
												"
                                                                    placeholder="Total Bayar">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-sm-12">
                                                        <div class="form-group row">
                                                            <label for="" class="form-control-label col-md-12 col-sm-12">Bank</label>
                                                            <div class="col-md-12 col-sm-12">
                                                                <input
                                                                    type="text"
                                                                    class="form-control"
                                                                    id="supp_bank"
                                                                    readonly="readonly"
                                                                    value="<?php echo $dd['bank'] ?>"
                                                                    name="bank"
                                                                    placeholder="Bank">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-sm-12">
                                                        <div class="form-group row">
                                                            <label for="" class="form-control-label col-md-12 col-sm-12">No Rekening</label>
                                                            <div class="col-md-12 col-sm-12">
                                                                <input
                                                                    type="text"
                                                                    class="form-control"
                                                                    readonly="readonly"
                                                                    id="supp_no_rek"
                                                                    name="no_rek"
                                                                    <?php echo $dd['no_rek'] ?>
                                                                    placeholder="No Rekening">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 col-sm-12">
                                                        <div class="form-group row">
                                                            <label for="" class="form-control-label col-md-12 col-sm-12">Tanggal</label>
                                                            <div class="col-md-12 col-sm-12">
                                                                <input
                                                                    type="date"
                                                                    class="form-control"
                                                                    required="required"
                                                                    name="tanggal_transaksi"
                                                                    readonly="readonly"
                                                                    value="<?php echo $dd['tanggal_transaksi'] ?>"
                                                                    placeholder="Tanggal">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-sm-12">
                                                        <div class="form-group row">
                                                            <label for="" class="form-control-label col-md-12 col-sm-12">Keterangan</label>
                                                            <div class="col-md-12 col-sm-12">
                                                                <textarea
                                                                    name="keterangan"
                                                                    readonly="readonly"
                                                                    id=""
                                                                    cols=""
                                                                    rows="5"
                                                                    class="form-control">
                                                                    <?php echo $dd['keterangan'] ?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <script type="text/javascript">

                /* Tanpa Rupiah */

                /* Dengan Rupiah */
                var dengan_rupiah = document.getElementById('dengan-rupiah');
                dengan_rupiah.addEventListener('keyup', function (e) {
                    dengan_rupiah.value = formatRupiah(this.value, 'Rp. ');
                });
                var dengan_rupiah_satu = document.getElementById('dengan-rupiah_satu');
                dengan_rupiah_satu.addEventListener('keyup', function (e) {
                    dengan_rupiah_satu.value = formatRupiah(this.value, 'Rp. ');
                });
                var dengan_rupiah_dua = document.getElementById('dengan-rupiah_dua');
                dengan_rupiah_dua.addEventListener('keyup', function (e) {
                    dengan_rupiah_dua.value = formatRupiah(this.value, 'Rp. ');
                });
                var dengan_rupiah_tiga = document.getElementById('dengan-rupiah_tiga');
                dengan_rupiah_tiga.addEventListener('keyup', function (e) {
                    dengan_rupiah_tiga.value = formatRupiah(this.value, 'Rp. ');
                });
                /* Fungsi */
                function formatRupiah(angka, prefix) {
                    var number_string = angka
                            .replace(/[^,\d]/g, '')
                            .toString(),
                        split = number_string.split(','),
                        sisa = split[0].length % 3,
                        rupiah = split[0].substr(0, sisa),
                        ribuan = split[0]
                            .substr(sisa)
                            .match(/\d{3}/gi);

                    if (ribuan) {
                        separator = sisa
                            ? '.'
                            : '';
                        rupiah += separator + ribuan.join('.');
                    }

                    rupiah = split[1] != undefined
                        ? rupiah + ',' + split[1]
                        : rupiah;
                    return prefix == undefined
                        ? rupiah
                        : (
                            rupiah
                                ? 'Rp. ' + rupiah
                                : ''
                        );
                }
            </script>
