<div class="">
    <div class="">
        <form method="post" action="<?php echo base_url('main/tambahSuplier'); ?>">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="id_supplier">ID Supplier</label>
                    <input
                        type="text"
                        class="form-control"
                        id="id_supplier"
                        placeholder="ID Supplier">
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
                    <label for="nomor">Nomor</label>
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
                    <input type="text" class="form-control" name="npwp" id="npwp" placeholder="NPWP">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="id_area">ID Area</label>
                    <input type="text" class="form-control" name="id_area" id="id_area" placeholder="ID Area">
                </div>
                <div class="form-group col-md-6">
                    <label for="no_ktp">Nomor KTP</label>
                    <input type="text" class="form-control" name="no_ktp" id="no_ktp" placeholder="Nomor KTP">
                </div>
            </div>
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
            <button type="submit" class="btn btn-primary mb-2">Submit</button>
        </form>
    </div>
    <hr>
    <div class="mb-2">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID Supplier</th>
                    <th>Nama Supplier</th>
                    <th>Bank</th>
                    <th>Nomor</th>
                    <th>An</th>
                    <th>NPWP</th>
                    <th>ID Area</th>
                    <th>Nomor KTP</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($suppliers as $supplier): ?>
                <tr>
                    <td><?php echo $supplier['id_supplier']; ?></td>
                    <td><?php echo $supplier['nama_supplier']; ?></td>
                    <td><?php echo $supplier['bank']; ?></td>
                    <td><?php echo $supplier['nomor']; ?></td>
                    <td><?php echo $supplier['an']; ?></td>
                    <td><?php echo $supplier['npwp']; ?></td>
                    <td><?php echo $supplier['id_area']; ?></td>
                    <td><?php echo $supplier['no_ktp']; ?></td>
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
