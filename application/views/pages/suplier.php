<div class="">
    <div class="">
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModalSuplier">
    Tambah Baru
  	</button>
	<div class="modal fade" id="myModalSuplier">
    <div class="modal-dialog modal-lg modal-fullscreen">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Form Tambah Suplier Baru</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal Body -->
        <div class="modal-body container">
		<form method="post" action="<?php echo base_url('main/tambahSuplier'); ?>" enctype="multipart/form-data">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="id_supplier">Kode Supplier</label>
                    <input
						name="kode_supplier"
                        type="text"
                        class="form-control"
                        id="id_supplier"
                        placeholder="Kode Supplier">
                </div>
                <div class="form-group col-md-6">
                    <label for="nama_supplier">Nama Supplier</label>
                    <input
                        type="text"
                        class="form-control"
						name="nama_supplier"
                        id="nama_supplier"
                        placeholder="Nama Supplier">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="bank">Bank</label>
                    <input type="text" class="form-control" name="bank" id="bank" placeholder="Bank">
                </div>
                <div class="form-group col-md-6">
                    <label for="nomor">Nomor Handphone</label>
                    <input type="text" class="form-control" name="nomor" id="nomor" placeholder="Nomor">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="an">An</label>
                    <input type="text" class="form-control" name="an" id="an" placeholder="An">
                </div>
                <div class="form-group col-md-6">
                    <label for="npwp">NPWP</label>
                    <input type="file" class="form-control" name="npwp" id="npwp" placeholder="NPWP">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
					<label for="no_ktp">Upload KTP</label>
                    <input type="file" class="form-control" name="no_ktp" id="no_ktp" placeholder="Upload KTP">
                </div>
				<div class="form-group col-md-6">
					<label for="area">Kode Area</label><br>
					<select name="id_area" class="form-control col-md-12" id="basic-multiple" >
						<option value="0">Pilih Area</option>
						<?php foreach($wilayah as $wil) : ?>
							<option value="<?php echo $wil['kode_area'] ?>"><?php echo $wil['kode_area'].' - '. $wil['nama_area'] ?></option>
						<?php endforeach ?>
					</select>
				</div>
            </div>
			<div class="form-group col-md-12">
					<label for="no_ktp">Nomor Rekening</label>
                    <input type="text" class="form-control" name="no_rekening" id="no_ktp" placeholder="Nomor Rekening">
			</div>
			<div class="innerDropdown"></div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea
                    type="text"
                    class="form-control"
                    id="alamat"
                    placeholder="Alamat"
					name="alamat"
                    rows="5"></textarea>
            </div>
        </div>
        <!-- Modal Footer -->
        <div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			<button type="submit" class="btn btn-primary mb-2">Submit</button>
        </div>
	</form>
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
    <hr>
    <div class="mb-2">
        <table class="table" id="myTable">
            <thead>
                <tr>
					<th>No.</th>
                    <th>ID Supplier</th>
                    <th>Nama Supplier</th>
                    <th>Bank</th>
                    <th>Nomor</th>
                    <th>NPWP</th>
                    <th>Nomor KTP</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
				$no = 1;
				foreach ($suppliers as $supplier): ?>
                <tr>
					<td><?php echo $no++ ?></td>
                    <td><?php echo $supplier['kode_supplier']; ?></td>
                    <td><?php echo $supplier['nama_supplier']; ?></td>
                    <td><?php echo $supplier['bank']; ?></td>
                    <td><?php echo $supplier['nomor']; ?></td>
                    <td>
            		<!-- Display NPWP image -->
						<?php if ($supplier['npwp']): ?>
							<img width="50" height="50" src="<?php echo base_url('upload/images/' . $supplier['npwp']); ?>" alt="NPWP Image">
						<?php else: ?>
							No NPWP Image
						<?php endif; ?>
					</td>
					<td>
						<!-- Display KTP image -->
						<?php if ($supplier['no_ktp']): ?>
							<img width="50" height="50" src="<?php echo base_url('upload/images/' . $supplier['no_ktp']); ?>" alt="KTP Image">
						<?php else: ?>
							No KTP Image
						<?php endif; ?>
					</td>
                    <td><?php echo $supplier['alamat']; ?></td>
                    <td>
                        <div class="d-flex">
                            <a href="" class="btn btn-sm btn-primary mx-1">Ubah
                            </a>
                            <a href="" class="btn btn-sm btn-danger mx-1">Hapus
                            </a>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>
</div>
