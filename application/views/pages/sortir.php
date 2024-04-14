<div class="">
    <div class="row">
        <div class="col-md-12">
            <button
                type="button"
                class="btn btn-primary mb-2"
                data-toggle="modal"
                data-target="#myModal"
                onclick="hehe()">
                Tambah Sortir
            </button>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table" id="myTable">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kode Supplier</th>
                        <th scope="col">Tanggal SJ</th>
                        <th scope="col">Tanggal Rec</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
					$no = 1;
					 foreach ($sortir as $ss) : ?>
                    <tr>
                        <th scope="row"><?php echo $no++ ?></th>
                        <td><?php echo $ss['kode_supplier'] ?></td>
                        <td><?php echo $ss['tanggal_sj'] ?></td>
                        <td><?php echo $ss['tanggal_rec'] ?></td>
                        <td>
                            <button type="button" class="btn btn-light" data-toggle="modal" data-target="<?php echo '#modelId'.$ss['id'] ?>">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                            </button>
							<div class="modal fade" id="<?php echo 'modelId'.$ss['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
								<div class="modal-dialog modal-xl modal-fullscreen" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title">Detail Sortir</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
													<span aria-hidden="true">&times;</span>
												</button>
										</div>
										<div class="modal-body">
										<form action="<?php echo base_url('main/sortirUpdate/'.$ss['id'] ); ?>" method="post">
											<div class="modal-body">
												<div class="container">
													<div class="row" id="hehep">
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
																<label for="tanggal_kirim">Tanggal Kirim</label>
																<input
																	readonly
																	type="date"
																	class="form-control"
																	id="tanggal_kirim"
																	name="tanggal_sj"
																	value="<?php echo $ss['tanggal_sj']  ?>"
																	placeholder="01-01-2024">
															</div>
														</div>
														<div class="col-md-3">
															<div class="form-group">
																<label for="tanggal_rec">Tanggal Rec</label>
																<input
																	readonly
																	type="date"
																	class="form-control"
																	id="tanggal_rec"
																	name="tanggal_rec"
																	value=<?php echo $ss['tanggal_rec']  ?>
																	placeholder="01-01-2024">
															</div>
														</div>
														<div class="col-md-3">
															<div class="form-group">
																<label for="tanggal_rec">Tanggal Rec2</label>
																<input
																	readonly
																	type="date"
																	class="form-control"
																	id="tanggal_rec"
																	name="tanggal_rec"
																	value=<?php echo $ss['tanggal_rec2']  ?>
																	placeholder="01-01-2024">
															</div>
														</div>
														<div class="col-md-3">
															<div class="form-group">
																<label for="tanggal_rec">Tanggal Rec3</label>
																<input
																	readonly
																	type="date"
																	class="form-control"
																	id="tanggal_rec"
																	name="tanggal_rec"
																	value=<?php echo $ss['tanggal_rec3']  ?>
																	placeholder="01-01-2024">
															</div>
														</div>
														<div class="col-md-9">
															<div class="form-group">
																<label for="number">Number</label>
																<input
																	type="text"
																	class="form-control"
																	id="number"
																	name="number"
																	value="<?php echo $ss['number']  ?>"
																	min="0"
																	placeholder="0">
															</div>
														</div>
													</div>
													<div class="row" id="hehep">
														<div class="col-md-3">
															<div class="form-group">
																<label for="col">COL</label>
																<input type="text" class="form-control" id="col" name="col"
																value="<?php echo $ss['col']  ?>">
															</div>
														</div>
														<div class="col-md-3">
															<div class="form-group">
																<label for="bf">BF</label>
																<input type="text" class="form-control" id="bf" name="bf" value="<?php echo $ss['bf']  ?>">
															</div>
														</div>
														<div class="col-md-3">
															<div class="form-group">
																<label for="jb">JB</label>
																<input type="text" class="form-control" id="jb" name="jb" value="<?php echo $ss['jb']  ?>">
															</div>
														</div>
														<div class="col-md-3">
															<div class="form-group">
																<label for="jb_bf">JB BF</label>
																<input type="text" class="form-control" id="jb_bf" name="jb_bf" value="<?php echo $ss['jb_bf']  ?>">
															</div>
														</div>
														<div class="col-md-3">
															<div class="form-group">
																<label for="jb_bf">JBB JK</label>
																<input type="text" class="form-control" id="jbb_jk" name="jbb_jk" value="<?php echo $ss['jbb_jk']  ?>">
															</div>
														</div>
														<div class="col-md-3">
															<div class="form-group">
																<label for="jb_bf">JBB JF</label>
																<input type="text" class="form-control" id="jbb_jf" name="jbb_jf" value="<?php echo $ss['jbb_jf']  ?>">
															</div>
														</div>
														<div class="col-md-3">
															<div class="form-group">
																<label for="jb_bf">XLP</label>
																<input type="text" class="form-control" id="xlp" name="xlp" value=<?php echo $ss['xlp']  ?>>
															</div>
														</div>
														<div class="col-md-3">
															<div class="form-group">
																<label for="jb_bf">BF K3 COL</label>
																<input type="text" class="form-control" id="bf_k3_col" name="bf_k3_col" value=<?php echo $ss['bf_k3_col']  ?>>
															</div>
														</div>
														<div class="col-md-3">
															<div class="form-group">
																<label for="jb_bf">BF K3 JB</label>
																<input type="text" class="form-control" id="bf_k3_jb" name="bf_k3_jb" value=<?php echo $ss['bf_k3_jb']  ?> >
															</div>
														</div>
														<div class="col-md-3">
															<div class="form-group">
																<label for="jb_bf">BF K3 JK</label>
																<input type="text" class="form-control" id="bf_k3_jk" name="bf_k3_jk" value="<?php echo $ss['bf_k3_jk']  ?>">
															</div>
														</div>
														<div class="col-md-3">
															<div class="form-group">
																<label for="jb_bf">BF K3 JL</label>
																<input type="text" class="form-control" id="bf_k3_jl" name="bf_k3_jl" value="<?php echo $ss['bf_k3_jl']  ?>">
															</div>
														</div>
														<div class="col-md-3">
															<div class="form-group">
																<label for="jb_bf">BF JL</label>
																<input type="text" class="form-control" id="bf_jl" name="bf_jl" value="<?php echo $ss['bf_jl']  ?>">
															</div>
														</div>
														<div class="col-md-3">
															<div class="form-group">
																<label for="jb_bf">BF KJ</label>
																<input type="text" class="form-control" id="bf_kj" name="bf_kj" value="<?php echo $ss['bf_kj']  ?>">
															</div>
														</div>
														<div class="col-md-3">
															<div class="form-group">
																<label for="jb_bf">BF BF</label>
																<input type="text" class="form-control" id="bf_bf" name="bf_bf" value="<?php echo $ss['bf_bf']  ?>">
															</div>
														</div>
														<div class="col-md-3">
															<div class="form-group">
																<label for="jb_bf">BF LP SLB</label>
																<input type="text" class="form-control" id="bf_lp_slb" name="bf_lp_slb" value=<?php echo $ss['bf_lp_slb']  ?>>
															</div>
														</div>
														<div class="col-md-3">
															<div class="form-group">
																<label for="jb_bf">BF SP</label>
																<input type="text" class="form-control" id="bf_sp" name="bf_sp" value="<?php echo $ss['bf_sp']  ?>">
															</div>
														</div>

														<div class="col-md-3">
															<div class="form-group">
																<label for="">BF SPK XLP</label>
																<input type="text" class="form-control" id="BF SPK XLP" name="bf_spk_xlp" value="<?php echo $ss['bf_spk_xlp']  ?>">
															</div>
														</div>
														<div class="col-md-3">
															<div class="form-group">
																<label for="">BF SPK SP</label>
																<input type="text" class="form-control" id="BF SPK SP" name="bf_spk_sp" value="<?php echo $ss['bf_spk_sp']  ?>">
															</div>
														</div>
														<div class="col-md-3">
															<div class="form-group">
																<label for="">SPK SP JB</label>
																<input type="text" class="form-control" id="SPK SP JB" name="spk_sp_jb" value="<?php echo $ss['spk_sp_jb']  ?>">
															</div>
														</div>
														<div class="col-md-3">
															<div class="form-group">
																<label for="">SPK SP XLP</label>
																<input type="text" class="form-control" id="SPK SP XLP" name="spk_sp_xlp" value="<?php echo $ss['spk_sp_xlp']  ?>">
															</div>
														</div>
														<div class="col-md-3">
															<div class="form-group">
																<label for="">SPK SP BFP</label>
																<input type="text" class="form-control" id="SPK SP BFP" name="spk_sp_bfp" value="<?php echo $ss['spk_sp_bfp']  ?>">
															</div>
														</div>
														<div class="col-md-3">
															<div class="form-group">
																<label for="">SPK SP</label>
																<input type="text" class="form-control" id="SPK SP" name="spk_sp" value="<?php echo $ss['spk_sp']  ?>">
															</div>
														</div>
														<div class="col-md-3">
															<div class="form-group">
																<label for="">SP SPH</label>
																<input type="text" class="form-control" id="SP SPH" name="sp_sph" value="<?php echo $ss['sp_sph']  ?>">
															</div>
														</div>
														<div class="col-md-3">
															<div class="form-group">
																<label for="">SP CL</label>
																<input type="text" class="form-control" id="SP CL" name="sp_cl" value="<?php echo $ss['sp_cl'] ?>">
															</div>
														</div>
														<div class="col-md-3">
															<div class="form-group">
																<label for="">SP CLF</label>
																<input type="text" class="form-control" id="SP CLF" name="sp_clf" value="<?php echo $ss['sp_clf']  ?>">
															</div>
														</div>
														<div class="col-md-3">
															<div class="form-group">
																<label for="">MH</label>
																<input type="text" class="form-control" id="MH" name="mh" value="<?php echo $ss['mh']  ?>">
															</div>
														</div>
														<div class="col-md-3">
															<div class="form-group">
																<label for="">MH SLB</label>
																<input type="text" class="form-control" id="MH SLB" name="mh_slb" value="<?php echo $ss['mh_slb'] ?>">
															</div>
														</div>
														<div class="col-md-3">
															<div class="form-group">
																<label for="">PHR</label>
																<input type="text" class="form-control" id="PHR" name="phr" value="<?php echo $ss['phr']  ?>">
															</div>
														</div>
														<div class="col-md-3">
															<div class="form-group">
																<label for="">BASI COL</label>
																<input type="text" class="form-control" id="BASI COL" name="basi_col" value="<?php echo $ss['basi_col']  ?>">
															</div>
														</div>
														<div class="col-md-3">
															<div class="form-group">
																<label for="">BASI JB</label>
																<input type="text" class="form-control" id="BASI JB" name="basi_jb" value="<?php echo $ss['basi_jb'] ?>" >
															</div>
														</div>
														<div class="col-md-3">
															<div class="form-group">
																<label for="">BASI JK</label>
																<input type="text" class="form-control" id="BASI JK" name="basi_jk" value="<?php echo $ss['basi_jk']  ?>">
															</div>
														</div>
														<div class="col-md-3">
															<div class="form-group">
																<label for="">BASI XLP</label>
																<input type="text" class="form-control" id="BASI XLP" name="basi_xlp" value="<?php echo $ss['basi_xlp']  ?>">
															</div>
														</div>
														<div class="col-md-3">
															<div class="form-group">
																<label for="">BASI BF</label>
																<input type="text" class="form-control" id="BASI BF" name="basi_bf" value="<?php echo $ss['basi_bf']  ?>">
															</div>
														</div>
														<div class="col-md-3">
															<div class="form-group">
																<label for="">BASI SP</label>
																<input type="text" class="form-control" id="BASI SP" name="basi_sp" value="<?php echo $ss['basi_sp']  ?>">
															</div>
														</div>
														<div class="col-md-3">
															<div class="form-group">
																<label for="">MHR</label>
																<input type="text" class="form-control" id="MHR" name="mhr" value="<?php echo $ss['mhr']  ?>">
															</div>
														</div>
														<div class="col-md-3">
															<div class="form-group">
																<label for="">BASI CL</label>
																<input type="text" class="form-control" id="BASI CL" name="basi_cl" value="<?php echo $ss['basi_cl'] ?>">
															</div>
														</div>
														<div class="col-md-3">
															<div class="form-group">
																<label for="">BASI MH</label>
																<input type="text" class="form-control" id="BASI MH" name="basi_mh" value="<?php echo $ss['basi_mh']  ?>">
															</div>
														</div>
														<div class="col-md-3">
															<div class="form-group">
																<label for="">PHR</label>
																<input type="text" class="form-control" id="PHR" name="phr" value="<?php echo $ss['phr']  ?>">
															</div>
														</div>
														<div class="col-md-3">
															<div class="form-group">
																<label for="">AIR</label>
																<input type="text" class="form-control" id="AIR" name="air" value="<?php echo $ss['air']  ?>">
															</div>
														</div>
														<div class="col-md-3">
															<div class="form-group">
																<label for="">SHELL</label>
																<input type="text" class="form-control" id="SHELL" name="shell" value="<?php echo $ss['shell']  ?>">
															</div>
														</div>
														<div class="col-md-3">
															<div class="form-group">
																<label for="">LOSS</label>
																<input type="text" class="form-control" id="LOSS" name="loss" value="<?php echo $ss['loss']  ?>">
															</div>
														</div>
														<div class="col-md-3">
															<div class="form-group">
																<label for="">TIMBANGAN KOTOR</label>
																<input
																	type="text"
																	class="form-control"
																	id="TIMBANGAN KOTOR"
																	value="<?php echo $ss['timbangan_kotor']  ?>"
																	name="timbangan_kotor">
															</div>
														</div>
														<div class="col-md-3">
															<div class="form-group">
																<label for="">TIMBANGAN BB</label>
																<input type="text" class="form-control" id="TIMBANGAN BB"
																value="<?php echo $ss['timbangan_bb']  ?>"
																name="timbangan_bb">
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
                                        <label for="tanggal_kirim">Tanggal Kirim</label>
                                        <input
                                            type="date"
                                            class="form-control"
                                            id="tanggal_kirim"
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
                                            type="text"
                                            class="form-control"
                                            id="number"
                                            name="number"
                                            min="0"
                                            placeholder="0">
                                    </div>
                                </div>
                            </div>
                            <div class="row" id="hehe">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="col">COL</label>
                                        <input type="text" class="form-control" id="col" name="col">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="bf">BF</label>
                                        <input type="text" class="form-control" id="bf" name="bf">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="jb">JB</label>
                                        <input type="text" class="form-control" id="jb" name="jb">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="jb_bf">JB BF</label>
                                        <input type="text" class="form-control" id="jb_bf" name="jb_bf">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="jb_bf">JBB JK</label>
                                        <input type="text" class="form-control" id="jbb_jk" name="jbb_jk">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="jb_bf">JBB JF</label>
                                        <input type="text" class="form-control" id="jbb_jf" name="jbb_jf">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="jb_bf">XLP</label>
                                        <input type="text" class="form-control" id="xlp" name="xlp">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="jb_bf">BF K3 COL</label>
                                        <input type="text" class="form-control" id="bf_k3_col" name="bf_k3_col">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="jb_bf">BF K3 JB</label>
                                        <input type="text" class="form-control" id="bf_k3_jb" name="bf_k3_jb">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="jb_bf">BF K3 JK</label>
                                        <input type="text" class="form-control" id="bf_k3_jk" name="bf_k3_jk">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="jb_bf">BF K3 JL</label>
                                        <input type="text" class="form-control" id="bf_k3_jl" name="bf_k3_jl">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="jb_bf">BF JL</label>
                                        <input type="text" class="form-control" id="bf_jl" name="bf_jl">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="jb_bf">BF KJ</label>
                                        <input type="text" class="form-control" id="bf_kj" name="bf_kj">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="jb_bf">BF BF</label>
                                        <input type="text" class="form-control" id="bf_bf" name="bf_bf">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="jb_bf">BF LP SLB</label>
                                        <input type="text" class="form-control" id="bf_lp_slb" name="bf_lp_slb">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="jb_bf">BF SP</label>
                                        <input type="text" class="form-control" id="bf_sp" name="bf_sp">
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">BF SPK XLP</label>
                                        <input type="text" class="form-control" id="BF SPK XLP" name="bf_spk xlp">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">BF SPK SP</label>
                                        <input type="text" class="form-control" id="BF SPK SP" name="bf_spk sp">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">SPK SP JB</label>
                                        <input type="text" class="form-control" id="SPK SP JB" name="spk_sp jb">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">SPK SP XLP</label>
                                        <input type="text" class="form-control" id="SPK SP XLP" name="spk_sp xlp">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">SPK SP BFP</label>
                                        <input type="text" class="form-control" id="SPK SP BFP" name="spk_sp bfp">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">SPK SP</label>
                                        <input type="text" class="form-control" id="SPK SP" name="spk_sp">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">SP SPH</label>
                                        <input type="text" class="form-control" id="SP SPH" name="sp_sph">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">SP CL</label>
                                        <input type="text" class="form-control" id="SP CL" name="sp_cl">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">SP CLF</label>
                                        <input type="text" class="form-control" id="SP CLF" name="sp_clf">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">MH</label>
                                        <input type="text" class="form-control" id="MH" name="mh">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">MH SLB</label>
                                        <input type="text" class="form-control" id="MH SLB" name="mh_slb">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">PHR</label>
                                        <input type="text" class="form-control" id="PHR" name="phr">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">BASI COL</label>
                                        <input type="text" class="form-control" id="BASI COL" name="basi_col">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">BASI JB</label>
                                        <input type="text" class="form-control" id="BASI JB" name="basi_jb">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">BASI JK</label>
                                        <input type="text" class="form-control" id="BASI JK" name="basi_jk">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">BASI XLP</label>
                                        <input type="text" class="form-control" id="BASI XLP" name="basi_xlp">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">BASI BF</label>
                                        <input type="text" class="form-control" id="BASI BF" name="basi_bf">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">BASI SP</label>
                                        <input type="text" class="form-control" id="BASI SP" name="basi_sp">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">MHR</label>
                                        <input type="text" class="form-control" id="MHR" name="mhr">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">BASI CL</label>
                                        <input type="text" class="form-control" id="BASI CL" name="basi_cl">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">BASI MH</label>
                                        <input type="text" class="form-control" id="BASI MH" name="basi_mh">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">PHR</label>
                                        <input type="text" class="form-control" id="PHR" name="phr">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">BASI COL</label>
                                        <input type="text" class="form-control" id="BASI COL" name="basi_col">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">BASI JB</label>
                                        <input type="text" class="form-control" id="BASI JB" name="basi_jb">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">BASI JK</label>
                                        <input type="text" class="form-control" id="BASI JK" name="basi_jk">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">BASI XLP</label>
                                        <input type="text" class="form-control" id="BASI XLP" name="basi_xlp">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">BASI BF</label>
                                        <input type="text" class="form-control" id="BASI BF" name="basi_bf">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">BASI SP</label>
                                        <input type="text" class="form-control" id="BASI SP" name="basi_sp">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">MHR</label>
                                        <input type="text" class="form-control" id="MHR" name="mhr">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">BASI CL</label>
                                        <input type="text" class="form-control" id="BASI CL" name="basi_cl">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">BASI MH</label>
                                        <input type="text" class="form-control" id="BASI MH" name="basi_mh">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">AIR</label>
                                        <input type="text" class="form-control" id="AIR" name="air">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">SHELL</label>
                                        <input type="text" class="form-control" id="SHELL" name="shell">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">LOSS</label>
                                        <input type="text" class="form-control" id="LOSS" name="loss">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">TIMBANGAN KOTOR</label>
                                        <input
                                            type="text"
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
