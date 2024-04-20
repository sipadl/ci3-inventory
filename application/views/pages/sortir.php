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
            <table class="table" id="myTable">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kode Supplier</th>
                        <th scope="col">Tanggal Input</th>
                        <th scope="col">Status</th>
                        <th scope="col">Id Bahan Baku</th>
                        <th scope="col">Spesifikasi</th>
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
                        <td><?php echo $ss['spesifikasi'] ?></td>
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
                                                                <td><?php echo $ss['spesifikasi'] ?></td>
                                                                <td><?php echo $ss['qty'] ?></td>
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
																	$dagingPutih = json_decode($ss['daging_putih'], true); // Jika ingin dalam bentuk array asosiatif, tambahkan parameter kedua 'true'
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
																	$dagingPutihx = json_decode($ss['daging_merah'], true); // Jika ingin dalam bentuk array asosiatif, tambahkan parameter kedua 'true'
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
                                        data-target="<?php echo '#modelId'.$ss['id'] ?>">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                        Detail Sortir
                                    </button>
                                    <?php } ?>
                                    <?php if($ss['id_bb'] == null ) { ?>
                                    <button
                                        type="button"
                                        class="btn btn-primary mx-1"
                                        data-toggle="modal"
                                        data-target="#myModal"
                                        onclick="isiId(<?php echo $ss['id_bahan_baku'] ?>)">
                                        Tambah Sortir
                                    </button>
                                    <?php } ?>
                                    <?php if($ss['id_bb'] != null && $ss['tanggal_rec3'] == null && $ss['status'] == 0 ) { ?>
                                    <button
                                        type="button"
                                        class="btn btn-warning mx-1"
                                        data-toggle="modal"
                                        data-target="#myModalUbah-<?php echo $ss['id_bb'] ?>">
                                        Ubah Data
                                    </button>

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
												<form
                                                    id="sortiresUpdate"
                                                    method="post"
                                                    >
                                                    <div class="modal-body">
                                                        <div class="container">
                                                            <input type="hidden" name="id_bb" id="getId" value="">
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="kode_supplier">Kode Supplier</label>
                                                                        <input
                                                                            type="text"
                                                                            name="kode_supplier"
                                                                            class="form-control"
                                                                            readonly="readonly"
                                                                            value="<?php echo $ss['kode_supplier'] ?>">
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
                                                                        <input type="text" min="0" value="<?php echo $ss['col'] ?>" class="form-control" id="col" name="col">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="bf">BF</label>
                                                                        <input type="text" min="0" class="form-control" value="<?php echo $ss['bf'] ?>" id="bf" 
																		value="<?php echo $ss['bf'] ?>"
																		name="bf"
																		>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="jb">JB</label>
                                                                        <input type="text" min="0" class="form-control" id="jb" 
																		value="<?php echo $ss['jb'] ?>"
																		name="jb"
																		>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="jb_bf">JB BF</label>
                                                                        <input type="text" min="0" class="form-control" id="jb_bf" 
																		value="<?php echo $ss['jb_bf'] ?>"
																		name="jb_bf"
																		>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="jb_bf">JBB JK</label>
                                                                        <input type="text" min="0" class="form-control" id="jbb_jk" 
																		value="<?php echo $ss['jbb_jk'] ?>"
																		name="jbb_jk"
																		>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="jb_bf">JBB JF</label>
                                                                        <input type="text" min="0" class="form-control" id="jbb_jf" 
																		value="<?php echo $ss['jbb_jf'] ?>"
																		name="jbb_jf"
																		>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="jb_bf">XLP</label>
                                                                        <input type="text" min="0" class="form-control" id="xlp" 
																		value="<?php echo $ss['xlp'] ?>"
																		name="xlp"
																		>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="jb_bf">BF K3 COL</label>
                                                                        <input type="text" min="0" class="form-control" id="bf_k3_col" 
																		value="<?php echo $ss['bf_k3_col'] ?>"
																		name="bf_k3_col"
																		>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="jb_bf">BF K3 JB</label>
                                                                        <input type="text" min="0" class="form-control" id="bf_k3_jb" 
																		value="<?php echo $ss['bf_k3_jb'] ?>"
																		name="bf_k3_jb"
																		>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="jb_bf">BF K3 JK</label>
                                                                        <input type="text" min="0" class="form-control" id="bf_k3_jk" 
																		value="<?php echo $ss['bf_k3_jk'] ?>"
																		name="bf_k3_jk"
																		>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="jb_bf">BF K3 JL</label>
                                                                        <input type="text" min="0" class="form-control" id="bf_k3_jl" 
																		value="<?php echo $ss['bf_k3_jl'] ?>"
																		name="bf_k3_jl"
																		>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="jb_bf">BF JL</label>
                                                                        <input type="text" min="0" class="form-control" id="bf_jl" 
																		value="<?php echo $ss['bf_jl'] ?>"
																		name="bf_jl"
																		>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="jb_bf">BF KJ</label>
                                                                        <input type="text" min="0" class="form-control" id="bf_kj" 
																		value="<?php echo $ss['bf_kj'] ?>"
																		name="bf_kj"
																		>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="jb_bf">BF BF</label>
                                                                        <input type="text" min="0" class="form-control" id="bf_bf" 
																		value="<?php echo $ss['bf_bf'] ?>"
																		name="bf_bf"
																		>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="jb_bf">BF LP SLB</label>
                                                                        <input type="text" min="0" class="form-control" id="bf_lp_slb" 
																		value="<?php echo $ss['bf_lp_slb'] ?>"
																		name="bf_lp_slb"
																		>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="jb_bf">BF SP</label>
                                                                        <input type="text" min="0" class="form-control" id="bf_sp" 
																		value="<?php echo $ss['bf_sp'] ?>"
																		name="bf_sp"
																		>
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
                                                                        <input type="text" min="0" class="form-control" id="BF SPK SP" 
																		value="<?php echo $ss['bf_spk_sp'] ?>"
																		name="bf_spk sp">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="">SPK SP JB</label>
                                                                        <input type="text" min="0" class="form-control" id="SPK SP JB" 
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
                                                                        <input type="text" min="0" class="form-control" id="SPK SP" 
																		value="<?php echo $ss['spk_sp'] ?>"
																		name="spk_sp"
																		>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="">SP SPH</label>
                                                                        <input type="text" min="0" class="form-control" id="SP SPH" 
																		value="<?php echo $ss['sp_sph'] ?>"
																		name="sp_sph"
																		>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="">SP CL</label>
                                                                        <input type="text" min="0" class="form-control" id="SP CL" 
																		value="<?php echo $ss['sp_cl'] ?>"
																		name="sp_cl"
																		>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="">SP CLF</label>
                                                                        <input type="text" min="0" class="form-control" id="SP CLF" 
																		value="<?php echo $ss['sp_clf'] ?>"
																		name="sp_clf"
																		>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="">MH</label>
                                                                        <input type="text" min="0" class="form-control" id="MH" 
																		value="<?php echo $ss['mh'] ?>"
																		name="mh"
																		>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="">MH SLB</label>
                                                                        <input type="text" min="0" class="form-control" id="MH SLB" 
																		value="<?php echo $ss['mh_slb'] ?>"
																		name="mh_slb"
																		>
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
                                                                        <input type="text" min="0" class="form-control" id="BASI COL" 
																		value="<?php echo $ss['basi_col'] ?>"
																		name="basi_col"
																		>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="">BASI JB</label>
                                                                        <input type="text" min="0" class="form-control" id="BASI JB" 
																		value="<?php echo $ss['basi_jb'] ?>"
																		name="basi_jb"
																		>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="">BASI JK</label>
                                                                        <input type="text" min="0" class="form-control" id="BASI JK" 
																		value="<?php echo $ss['basi_jk'] ?>"
																		name="basi_jk"
																		>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="">BASI XLP</label>
                                                                        <input type="text" min="0" class="form-control" id="BASI XLP" 
																		value="<?php echo $ss['basi_xlp'] ?>"
																		name="basi_xlp"
																		>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="">BASI BF</label>
                                                                        <input type="text" min="0" class="form-control" id="BASI BF" 
																		value="<?php echo $ss['basi_bf'] ?>"
																		name="basi_bf"
																		>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="">BASI SP</label>
                                                                        <input type="text" min="0" class="form-control" id="BASI SP" 
																		value="<?php echo $ss['basi_sp'] ?>"
																		name="basi_sp"
																		>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="">BASI CL</label>
                                                                        <input type="text" min="0" class="form-control" id="BASI CL" 
																		value="<?php echo $ss['basi_cl'] ?>"
																		name="basi_cl"
																		>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="">BASI MH</label>
                                                                        <input type="text" min="0" class="form-control" id="BASI MH" 
																		value="<?php echo $ss['basi_mh'] ?>"
																		name="basi_mh"
																		>
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
                                                                        <input type="text" min="0" class="form-control" id="BASI COL" 
																		value="<?php echo $ss['basi_col'] ?>"
																		name="basi_col"
																		>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="">BASI JB</label>
                                                                        <input type="text" min="0" class="form-control" id="BASI JB" 
																		value="<?php echo $ss['basi_jb'] ?>"
																		name="basi_jb"
																		>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="">BASI JK</label>
                                                                        <input type="text" min="0" class="form-control" id="BASI JK" 
																		value="<?php echo $ss['basi_jk'] ?>"
																		name="basi_jk"
																		>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="">BASI XLP</label>
                                                                        <input type="text" min="0" class="form-control" id="BASI XLP" 
																		value="<?php echo $ss['basi_xlp'] ?>"
																		name="basi_xlp"
																		>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="">BASI BF</label>
                                                                        <input type="text" min="0" class="form-control" id="BASI BF" 
																		value="<?php echo $ss['basi_bf'] ?>"
																		name="basi_bf"
																		>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="">BASI SP</label>
                                                                        <input type="text" min="0" class="form-control" id="BASI SP" 
																		value="<?php echo $ss['basi_sp'] ?>"
																		name="basi_sp"
																		>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="">BASI CL</label>
                                                                        <input type="text" min="0" class="form-control" id="BASI CL" 
																		value="<?php echo $ss['basi_cl'] ?>"
																		name="basi_cl"
																		>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="">BASI MH</label>
                                                                        <input type="text" min="0" class="form-control" id="BASI MH" 
																		value="<?php echo $ss['basi_mh'] ?>"
																		name="basi_mh"
																		>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="">AIR</label>
                                                                        <input type="text" min="0" class="form-control" id="AIR" 
																		value="<?php echo $ss['air'] ?>"
																		name="air"
																		>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="">SHELL</label>
                                                                        <input type="text" min="0" class="form-control" id="SHELL" 
																		value="<?php echo $ss['shell'] ?>"
																		name="shell"
																		>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="">LOSS</label>
                                                                        <input type="text" min="0" class="form-control" id="LOSS" 
																		value="<?php echo $ss['loss'] ?>"
																		name="loss"
																		>
                                                                    </div>
                                                                </div>
                                                            </div>
															</div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button
                                                            type="button"
                                                            onclick="SimpanSortirUpdate(event ,true, <?php echo $ss['id_bb'] ?>)"
                                                            class="btn btn-primary">Simpan</button>
                                                        <button
                                                            type="button"
                                                            onclick="SimpanSortirUpdate(event, false, <?php echo $ss['id_bb'] ?>)"
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
                                                <div class="row justify-content-between">
                                                    <div class="col-md-3">
                                                        <div class="d-flex justify-content-between border px-2">
                                                            <div class="">Supplier</div>
                                                            <div class="">
                                                                <?php echo $ss['kode_supplier']; ?>
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
                                                        <p>No. Sortir :
                                                            <?php echo $ss['id'] ?></p>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <form
                                                            action="<?php echo base_url('main/updateMiniSortir/'.$ss['id_sortir']) ?>"
                                                            method="post">

                                                            <div class="d-flex justify-content-between  border px-2">
                                                                <div class="">Cap</div>
                                                                <div class="">
                                                                    <?php if($ss['cap'] == null ) { ?>
                                                                    <input type="radio" name="cap" value="Ya" class="mx-1" id="">Ya /
                                                                    <input type="radio" name="cap" value="Tidak" class="mx-1" id="">Tidak
                                                                <?php } else { ?>
                                                                    <?php echo $ss['cap'] ?>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex justify-content-between  border px-2">
                                                                <div class="mt-2">Potong</div>
                                                                <div class="ml-2 py-2">
                                                                    <?php if($ss['potong'] == null ) { ?>
                                                                    <input type="text" name="potong" class="form-control" id="">
                                                                <?php } else { ?>
                                                                    <?php echo $ss['potong'] ?>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                            <?php if($ss['cap'] == null) { ?>
                                                            <div class="d-flex justify-content-end">
                                                                <button type="submit" class="btn btn-sm  mt-2 btn-primary">Simpan</button>
                                                            </div>
                                                            <?php } ?>
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
                                                                    <th colspan="" width="10%"><?php echo $ss['tanggal_rec'] ?></th>
                                                                    <th colspan=""><?php echo $ss['tanggal_rec2'] ?></th>
                                                                    <th colspan="" width="10%"><?php echo $ss['tanggal_rec3'] ?></th>
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
                                                                    <td><?php $sum = floatval($ss['col']) + floatval($ss['bf']);
																	if($sum > 0) {
																		echo $sum;
																	} else {
																		echo '';
																	} ?></td>
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
                                                                    <td><?php $sum = floatval($ss['jb_bf']) + floatval($ss['jb']);
																	if($sum > 0) {
																		echo $sum;
																	} else {
																		echo '';
																	} ?></td>
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
                                                                    <td><?php $sum = floatval($ss['basi_sp']) + floatval($ss['basi_bf']) + floatval($ss['basi_xlp']) + floatval($ss['basi_jk']) + floatval($ss['basi_col']);
																	if($sum > 0) {
																		echo $sum;
																	} else {
																		echo '';
																	} ?></td>
                                                                    <td class="bg-light" style="background-color: gray"></td>
                                                                    <td class="bg-light" style="background-color: gray"></td>
                                                                    <td class="bg-light" style="background-color: gray"></td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="2">Total JK</td>
                                                                    <td><?php $sum = floatval($ss['jbb_jf']) + floatval($ss['jbb_jk']);
																	if($sum > 0) {
																		echo $sum;
																	} else {
																		echo '';
																	} ?></td>
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
                                                                    <td><?php $sum = floatval($ss['basi_mh']) + floatval($ss['basi_cl']);
																	if($sum > 0) {
																		echo $sum;
																	} else {
																		echo '';
																	} ?></td>
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
                                                                    <td><?php 
																	$sum = floatval($ss['bf_k3_col']) + floatval($ss['bf_k3_jb']) + floatval($ss['bf_k3_jl']) + floatval($ss['bf_k3_jk']) + floatval($ss['bf_bf']) + floatval($ss['bf_lp_slb']) + floatval($ss['bf_sp']);
																		if($sum > 0) {
																			echo $sum;
																		} else {
																			echo '';
																		}
																	?></td>
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
                                                                    <td><?php
																	$sum = floatval($ss['basi_sp']) + floatval($ss['basi_bf']) + floatval($ss['basi_xlp']) + floatval($ss['basi_jk']) + floatval($ss['basi_col']);
																	if($sum > 0) {
																		echo $sum;
																	} else {
																		echo '';
																	}
																	?></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="2">Total SPK</td>
                                                                    <td><?php $sum = floatval($ss['bf_spk_xlp']) + floatval($ss['bf_spk_sp']);
																	if($sum > 0) {
																		echo $sum;
																	} else {
																		echo '';
																	}
																	?></td>
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
                                                                    <td><?php $sum = floatval($ss['basi_mh']) + floatval($ss['basi_cl']);
																	if($sum > 0) {
																		echo $sum;
																	} else {
																		echo '';
																	} ?></td>

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
                                                                    <td><?php $sum = floatval($ss['spk_sp_jb']) + floatval($ss['spk_sp_xlp']) + floatval($ss['spk_sp_bfp']) + floatval($ss['spk_sp_sph']);
																	if($sum > 0) {
																		echo $sum;
																	} else {
																		echo '';
																	}
																	?></td>
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
                                                                    <td><?php
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
                                                                    <td><?php $sum = floatval($ss['mh']) + floatval($ss['mh_slb']);
																	if($sum > 0) {
																		echo $sum;
																	} else {
																		echo '';
																	} ?></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td colspan="2"></td>
                                                                    <td colspan="2">Timb. BB</td>
                                                                    <?php 
														$qty = 0;
														$dataMerah = json_decode($ss['daging_merah']);
														$dataPutih = json_decode($ss['daging_putih']);

														foreach($dataMerah as $dag) {
															$qty += $dag->tkotor + $dag->tbersih;
														}
														foreach($dataPutih as $dag) {
															$qty += $dag->tkotor + $dag->tbersih;
														}
															?>
                                                                    <td><?php echo $qty ?></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="2">Total</td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td colspan="2"></td>
                                                                    <td colspan="2">Grand Total</td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>

                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>

                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <!-- <?php if($ss['approved_by'] == null) { ?> <a href="<?php echo
                                                base_url('main/approveSortir/'.$ss['id_sortir']); ?>" class="btn
                                                btn-primary">Approve</a> <?php } ?> -->
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
                                                            <input type="hidden" name="id_bb" id="getId" value="">
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="kode_supplier">Kode Supplier</label>
                                                                        <input
                                                                            type="text"
                                                                            name="kode_supplier"
                                                                            class="form-control"
                                                                            readonly="readonly"
                                                                            value="<?php echo $ss['kode_supplier'] ?>">
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
                                                                            value="<?php echo $ss['id'] ?>"
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
                                        <input type="hidden" name="id_bb" id="getId" value="">
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
