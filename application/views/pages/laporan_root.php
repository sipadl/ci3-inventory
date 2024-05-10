<div class="row">
    <div class="col-md-12">
        <!-- Button trigger modal -->
        <!-- Button trigger modal -->
        <div class="d-flex">
            <form action="<?php base_url('main/laporan_root'); ?>" method="post">
                <div class="d-flex mx-2">
                    <div class="form-group mx-2">
                        <label for="">Mulai</label>
                        <input
                            type="date"
                            name="start"
                            class="form-control mx-1"
                            value="<?php echo $start ?>"/>
                    </div>
                    <div class="form-group mx-2">
                        <label for="">Sampai</label>
                        <input
                            type="date"
                            name="end"
                            class="form-control mx-1"
                            value="<?php echo $end ?>"/>
                    </div>
                    <div class="align-self-center mt-3">
                        <button class="btn-sm btn btn-light" type="submit">Filter Laporan</button>
                    </div>
                </div>
            </form>
            <div class="d-flex justify-content-center align-self-center mt-3">
                <button
                    type="button"
                    class="btn btn-primary btn-sm"
                    data-toggle="modal"
                    data-target="#modelIdLaporan">
                    Laporan
                </button>
            </div>
        </div>

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
                            <table class="table table-responsive table-bordered" id="myTablePrintAble">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Kode Supplier</th>
                                        <th>Nama Supplier</th>
                                        <th>Total COL</th>
                                        <th>Total JB</th>
                                        <th>Total JK</th>
                                        <th>XLP</th>
                                        <th>Total BF</th>
                                        <th>Total SPK</th>
                                        <th>Total SP</th>
                                        <th>Total MH</th>
                                        <th>Total MH SLB</th>
                                        <th>Total PHR Receiving</th>
                                        <th>Total MHR Receiving</th>
                                        <th>Total PHR Sortir</th>
                                        <th>Total MHR Sortir</th>
                                        <th>Total Air</th>
                                        <th>Total Shell</th>
                                        <th>Total Loss</th>
                                        <th>Total Timb. Kotor</th>
                                        <th>Total Timb. BB</th>
                                        <th>Total Grand Before</th>
                                        <th>Total Grand After</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
								$number = 1;
								$total_col = 0;
								$total_jb = 0;
								$total_jk = 0;
								$total_xlp = 0;
								$total_bf = 0;
								$total_spk = 0;
								$total_sp = 0;
								$total_mh1 = 0;
								$total_mh2 = 0;
								$total_phr1 = 0;
								$total_mhr1 = 0;
								$total_phr2 = 0;
								$total_mhr2 = 0;
								$total_air = 0;
								$total_shell = 0;
								$total_loss = 0;
								$total_tmb_kotor = 0;
								$total_qty = 0;
								$total_grand_total = 0;

								foreach($bahanbaku as $das ) :

										$data2 = $this->db->query('select * from tbl_sortir where id_bb ='. $das['id_bb'].' and is_corection = 1')->row_array();
										$col = $das['col'];
										$col_bf = $das['bf'];
										$jb = $das['jb'];
										$jb_bf = $das['jb_bf'];
										$jk = $das['jbb_jk'];
										$jk_bf = $das['jbb_bf'];
										$xlp = $das['xlp'];
										$bf_k3_col = $das['bf_k3_col'];
										$bf_k3_jb = $das['bf_k3_jb'];
										$bf_k3_jl = $das['bf_k3_jl'];
										$bf_k3_jk = $das['bf_k3_jk'];
										$bf_jl = $das['bf_jl'];
										$bf_kj = $das['bf_kj'];
										$bf_bf = $das['bf_bf'];
										$bf_lp_slb = $das['bf_lp_slb'];
										$bf_sp = $das['bf_sp'];
										$spk_xlp = $das['bf_spk_xlp'];
										$spk_sp = $das['spk_sp'];
										$sp_jb = $das['spk_sp_jb'];
										$sp_xlp = $das['spk_sp_xlp'];
										$sp_bf = $das['spk_sp_bfp'];
										$sp_sph = $das['spk_sp_sph'];
										$sp_sp = $das['sp_sph'];
										$cl = $das['sp_cl'];
										$clf = $das['sp_clf'];
										$mh = $das['mh'];
										$mh2 = $das['mh_slb'];
										$phr = $das['phr'];
										$basi_col = $das['basi_col'];
										$basi_jk = $das['basi_jk'];
										$basi_jb = $das['basi_jb'];
										$basi_xlp = $das['basi_xlp'];
										$basi_bf = $das['basi_bf'];
										$basi_sp = $das['basi_sp'];
										$basi_col2 = $das['basi_col2'];
										$basi_jk2 = $das['basi_jk2'];
										$basi_jb2 = $das['basi_jb2'];
										$basi_xlp2 = $das['basi_xlp2'];
										$basi_bf2 = $das['basi_bf2'];
										$basi_sp2 = $das['basi_sp2'];
										$mhr = $das['mhr'];
										$basi_cl = $das['basi_cl'];
										$basi_mh = $das['basi_mh'];
										$basi_cl2 = $das['basi_cl2'];
										$basi_mh2 = $das['basi_mh2'];
										$air = $das['air'];
										$shell = $das['shell'];
										$loss = $das['loss'];
										$jbb_jf = $das['jbb_jf'];
										$col_18 = $das['bf_spk_sp'];


									$timbangan_kotor = floatval($col) + floatval($col_bf) + floatval($jb) + floatval($jb_bf) + floatval($jk) + floatval($jk_bf) +
									floatval($xlp) + floatval($bf_k3_col) + floatval($bf_k3_jb) + floatval($bf_k3_jl) + floatval($bf_k3_jk) +
									floatval($bf_jl) + floatval($bf_kj) + floatval($bf_bf) + floatval($bf_lp_slb) + floatval($bf_sp) +
									floatval($spk_xlp) + floatval($spk_sp) + floatval($sp_jb) + floatval($sp_xlp) + floatval($sp_bf) +
									floatval($sp_sph) + floatval($cl) + floatval($clf) + floatval($mh) + floatval($mh2) + floatval($phr) +
									floatval($basi_col) + floatval($basi_jk) + floatval($basi_xlp) + floatval($basi_bf) + floatval($basi_sp) +
									floatval($mhr) + floatval($basi_cl) + floatval($basi_mh) + floatval($air) + floatval($shell) +
									floatval($loss) + floatval($jbb_jf) + floatval($col_18);

									

									$colX = (floatval($col) + floatval($col_bf));
									$jbX = (floatval($jb) + floatval($jbb_jf));
									$jkX = (floatval($jk) + floatval($jk_bf));
									$bfX = (floatval($bf_k3_col) + floatval($bf_k3_jb) + floatval($bf_k3_jk) +
											floatval($bf_k3_jl) + floatval($bf_jl) + floatval($bf_bf) + floatval($bf_bf) +
											floatval($bf_k3_jk) + floatval($bf_kj));
									$spkX = (floatval($sp_bf) + floatval($sp_sph));
									$spX = (floatval($spk_xlp) + floatval($spk_sp));
									$mhX = (floatval($mh) + floatval($mh2));
									$clX = floatval($cl);
									$clfX = floatval($clf);
									$mhr = floatval($mh) + floatval($mh2);
									$phr = floatval($basi_sp) + floatval($basi_bf) + floatval($basi_xlp) + floatval($basi_jk) + floatval($basi_col);
									$sumXX = $colX + $jbX + $jkX + $bfX + $spkX + $spX + $mhX + $clX + $clfX;
									$grand_total = $sum = floatval($col) + floatval($col_bf) + floatval($jb) + floatval($jb_bf) + floatval($jk) + floatval($jk_bf) +
									floatval($xlp) + floatval($bf_k3_col) + floatval($bf_k3_jb) + floatval($bf_k3_jl) + floatval($bf_k3_jk) +
									floatval($bf_jl) + floatval($bf_kj) + floatval($bf_bf) + floatval($bf_lp_slb) + floatval($bf_sp) +
									floatval($spk_xlp) + floatval($spk_sp) + floatval($sp_jb) + floatval($sp_xlp) + floatval($sp_bf) +
									floatval($sp_sph) + floatval($sp_sp) + floatval($cl) + floatval($clf) + floatval($mh) + floatval($mh2);


									$data2 = $this->db->query('select * from tbl_sortir where id_bb ='.$das['id_bb'].' and is_corection = 1')->row_array();


									$grand_totalX = 0;
									if ($data2) {
										$total_grand_x_2 = 0; // Initializing total_grand_x_2 to 0
										// Calculation of $total_grand_x_2
										$colXX = (floatval($data2['col']) + floatval($data2['bf']));
										$jbXX = (floatval($data2['jb']) + floatval($data2['jbb_jf']));
										$jkXX = (floatval($data2['jbb_jk']) + floatval($data2['jbb_bf']));
										$bfXX = (floatval($data2['bf_k3_col']) + floatval($data2['bf_k3_jb']) + floatval($data2['bf_k3_jk'])
												+ floatval($data2['bf_k3_jl']) + floatval($data2['bf_jl']) + floatval($data2['bf_bf']) + floatval($data2['bf_bf']) + floatval($data2['bf_kj']));
										$spkXX = (floatval($data2['spk_sp_jb']) +  floatval($data2['spk_sp_bfp']) + floatval($data2['spk_sp_sph']));
										$spXX = (floatval($data2['bf_spk_xlp']) + floatval($data2['bf_spk_sp']));
										$mhXX = (floatval($data2['mh']) + floatval($data2['mh_slb']));
										$clXX = floatval($data2['sp_cl']);
										$clfXX = floatval($data2['sp_clf']);
										$mhrX = floatval($data2['mh']) + floatval($data2['mh_slb']);
										$phrX = floatval($data2['basi_sp']) + floatval($data2['basi_bf']) + floatval($data2['basi_xlp']) + floatval($data2['basi_jk']) + floatval($data2['basi_col']);
										$sumXXX = $colXX + $jbXX + $jkXX + $bfXX + $spkXX + $spXX + $mhXX + $clXX + $clfXX;
										$grand_totalX = $sumXXX + $phrX + $mhrX;
										$total_grand_x_2 += $grand_totalX;
										
									}

									$qty = 0;
									$dataDaging = $this->db->query('select * from tbl_sub_daging where id_bahan_baku ='.$das['id_bahan_baku'])->result_array(); 
									foreach($dataDaging as $sdb) {
										$qty += floatval($sdb['tbersih']);
									}

									$nama_supplier = $this->db->query('select nama_supplier from tbl_supplier where kode_supplier = "'.$das['kode_supplier'].'"' )->row_array();

									$total_col += floatval($colX);
									$total_jb += floatval($jbX);
									$total_jk += floatval($jkX);
									$total_xlp += floatval($xlp);
									$total_bf += floatval($bfX);
									$total_spk += floatval($spkX);
									$total_sp += floatval($spX);
									$total_mh1 += floatval($mh);
									$total_mh2 += floatval($mh2);
									$total_phr1 += floatval($phr);
									$total_mhr1 += floatval($basi_cl) + floatval($basi_mh);
									$total_phr2 +=
												floatval($basi_col2) +
												floatval($basi_jk2) +
												floatval($basi_jb2) +
												floatval($basi_xlp2) +
												floatval($basi_bf2) +
												floatval($basi_sp2) ;
									$total_mhr2 += floatval($basi_cl2) + floatval($basi_mh2);
									$total_air += floatval($air);
									$total_shell += floatval($shell);
									$total_loss += floatval($loss);
									$total_tmb_kotor += floatval($timbangan_kotor);
									$total_qty += floatval($qty);
									$total_grand_total += floatval($grand_total);

									?>
                                    <tr>
                                        <td><?php echo $number++ ?></td>
                                        <td><?php echo $das['kode_supplier'] ?></td>
                                        <td><?php echo $nama_supplier['nama_supplier'] ?></td>
                                        <td><?php echo $colX ?></td>
                                        <td><?php echo $jbX ?></td>
                                        <td><?php echo $jkX ?></td>
                                        <td><?php echo $xlp ?></td>
                                        <td><?php echo $bfX ?></td>
                                        <td><?php echo $spkX ?></td>
                                        <td><?php echo $spX ?></td>
                                        <td><?php echo $mh ?></td>
                                        <td><?php echo $mh2 ?></td>
                                        <td><?php echo $phr ?></td>
                                        <td><?php echo floatval($basi_cl) + floatval($basi_mh) ?></td>
                                        <td>
                                            <?php echo floatval($basi_col2) +
											floatval($basi_jk2) +
											floatval($basi_jb2) +
											floatval($basi_xlp2) +
											floatval($basi_bf2) +
											floatval($basi_sp2) 
										?>
                                        </td>
                                        <td><?php echo floatval($basi_cl2) + floatval($basi_mh2) ?></td>
                                        <td>
                                            <?php echo $air ?>
                                        </td>
                                        <td>
                                            <?php echo $shell ?>
                                        </td>
                                        <td>
                                            <?php echo $loss ?>
                                        </td>
                                        <td>
                                            <?php echo $timbangan_kotor ?>
                                        </td>
                                        <td>
                                            <?php echo $qty ?>
                                        </td>
                                        <td>
                                            <?php echo $grand_total ?>
                                        </td>
                                        <td>
                                            <?php echo $grand_totalX ?>
                                        </td>
                                    </tr>
                                    <?php endforeach ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td>Total</td>
                                        <td><?php echo 
								$total_col ?? 0 
								?></td>
                                        <td><?php echo 
								$total_jb ?? 0
								?></td>
                                        <td><?php echo 
								$total_jk ?? 0
								?></td>
                                        <td><?php echo 
								$total_xlp ?? 0
								?></td>
                                        <td><?php echo 
								$total_bf ?? 0
								?></td>
                                        <td><?php echo 
								$total_spk ?? 0
								?></td>
                                        <td><?php echo 
								$total_sp ?? 0
								?></td>
                                        <td><?php echo 
								$total_mh1 ?? 0
								?></td>
                                        <td><?php echo 
								$total_mh2 ?? 0
								?></td>
                                        <td><?php echo 
								$total_phr1 ?? 0
								?></td>
                                        <td><?php echo 
								$total_mhr1 ?? 0
								?></td>
                                        <td><?php echo 
								$total_phr2 ?? 0
								?></td>
                                        <td><?php echo 
								$total_mhr2 ?? 0
								?></td>
                                        <td><?php echo 
								$total_air ?? 0
								?></td>
                                        <td><?php echo 
								$total_shell ?? 0
								?></td>
                                        <td><?php echo 
								$total_loss ?? 0
								?></td>
                                        <td><?php echo 
								$total_tmb_kotor ?? 0
								?></td>
                                        <td><?php echo 
								$total_qty ?? 0
								?></td>
                                        <td><?php echo 
								$total_grand_total ?? 0
								?></td>
                                        <td><?php echo $total_grand_x_2 ?? 0 ?></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" onclick="exportToExcel()" class="btn btn-primary">Print</button>
                        <!-- <button type="button" class="btn btn-primary">Save</button> -->
                    </div>
                </div>
            </div>
        </div>
        <?php
		if ($this->session->flashdata('success')) {
		echo '<div class="alert alert-success my-2">' . $this->session->flashdata('success') . '</div>';
		}
		?>
        <table class="table" id="myTable3">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Kode Supplier</th>
                    <th>Tanggal Input</th>
                    <th>Approved By</th>
                    <th>Id Sortir</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php 
			$no = 1; // Inisialisasi nomor
			foreach ($bahanbaku as $das) : 
			?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <!-- Increment nomor -->
                    <td><?php echo $das['kode_supplier'] ?></td>
                    <td><?php echo $das['tanggal_rec'] ?></td>
                    <td>
                    <?php 
					if($das['approved_by'] != null ) {
						$approved = $this->db->query("SELECT username FROM tbl_user WHERE id = ?", [$das['approved_by']])->row_array();
						echo $approved['username'];
					} else {
						echo '';
					}
					?>
                    </td>
                    <td><?php echo $das['id_sortir'] ?></td>
                    <td>
                    <?php 
						$status = $das['status_sortir'];

						// Check the status code and display corresponding text
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
							echo "Unknown"; // Handle any other status code
						} ?>
                    </td>
                    <td>
                        <!-- Button trigger modal -->
                        <button
                            type="button"
                            class="btn btn-light btn-sm"
                            data-toggle="modal"
                            data-target="#modelIdBahanBaku-<?php echo $das['id_bahan_baku'] ?>">
                            <i class="fa fa-eye mt-1" aria-hidden="true"></i>
                            Detail Bahan Baku
                        </button>
                        <!-- Modal Bahan Baku -->
                        <div
                            class="modal fade"
                            id="modelIdBahanBaku-<?php echo $das['id_bahan_baku'] ?>"
                            tabindex="-1"
                            role="dialog"
                            aria-labelledby="modelTitleId"
                            aria-hidden="true">
                            <div class="modal-dialog modal-xl modal-fullscreen" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Detail Bahan Baku</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body" id="<?php echo 'modal-print-'.$das['id'] ?>">
                                        <div class="container-fluid">
                                            <div class="text-center">
                                                <h4>Nota Timbang Bahan Baku Rajungan</h4>
                                            </div>
                                            <div class="d-flex justify-content-between my-2">
                                                <div class="">Kode Supplier :
                                                    <?php echo $das['kode_supplier'] ?></div>
                                                <div class="">(SD.100.1002)</div>
                                                <div class="">Tanggal :
                                                    <?php echo $das['tanggal'] ?></div>
                                            </div>
                                            <?php 
												$dataDaging = $this->db->query("SELECT * FROM tbl_sub_daging 
												WHERE id_bahan_baku = ".$das['id_bahan_baku'].' order by spek desc')->result_array(); // Jika ingin dalam bentuk array asosiatif, tambahkan parameter kedua 'true'
												?>
                                            <table class="table-bordered w-100">
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
                                                        <td><?php echo $dd['qty'] ?></td>
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
                                                        <td><?php echo $dd['qty'] ?></td>
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
                                    <div class="modal-footer">
                                        <!-- <a href="<?php echo base_url('main/mainApprove/').$das['id']; ?>"
                                        class="btn btn-primary">Aprove</a> <a href="<?php echo
                                        base_url('main/mainReject/').$das['id']; ?>" class="btn btn-danger">Reject</a>
                                        -->
                                        <!-- <button type="button" onclick="printDisini(<?php echo $das['id'] ?>)"
                                        class="btn btn-primary">Print</a> -->
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <button
                        type="button"
                        class="btn btn-light btn-sm"
                        data-toggle="modal"
                        data-target="#modelIdDetailBefore-<?php echo $das['id_sortir'] ?>">
                        <i class="fa fa-eye mt-1" aria-hidden="true"></i>
                        Detail Sortir
                    </button>

                    <!-- Modal Sortir -->
                    <div
                        class="modal fade"
                        id="modelIdDetailBefore-<?php echo $das['id_sortir'] ?>"
                        tabindex="-1"
                        role="dialog"
                        aria-labelledby="modelTitleIdDetailBefore"
                        aria-hidden="true">
                        <div class="modal-dialog modal-xl" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Form Hasil Sortir</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body" id="modal-print-<?php echo $das['id'] ?>">
                                    <div class="row justify-content-between">
                                        <div class="col-md-3">
                                            <div class="d-flex justify-content-between border px-2">
                                                <div class="">Supplier</div>
                                                <div class="">
                                                    <?php echo $das['supplier']; ?>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between  border px-2">
                                                <div class="">TGL SJ</div>
                                                <div class="">
                                                    <?php echo $das['tanggal_sj']; ?>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between  border px-2">
                                                <div class="">TGL Rec</div>
                                                <div class="">
                                                    <?php echo $das['tanggal_rec']; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <p style="text-align: center;">SD.100.3001 /
                                                <?php echo $das['id'] ?></p>

                                        </div>
                                        <div class="col-md-3">
                                            <!-- <form action="<?php echo
                                            base_url('main/updateMiniSortir/'.$das['id_sortir']) ?>" method="post"> -->

                                            <div class="d-flex justify-content-between  border px-2">
                                                <div class="">Cap</div>
                                                <div class="">
                                                    <?php echo $das['cap'] ?>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-between  border px-2">
                                                <div class="mt-2">Potong</div>
                                                <div class="ml-2 py-2">
                                                    <?php echo $das['potong'] ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <!-- <form action="<?php echo
                                            base_url('main/updateMiniSortir/'.$das['id_sortir']) ?>" method="post"> -->

                                            <div class="d-flex justify-content-between  border px-2">
                                                <div class="">SHELL</div>
                                                <div class="">PHR</div>
                                                <div class="">MHR</div>

                                            </div>
                                            <div class="d-flex justify-content-between  border px-2">
                                                <div class="">KERAS</div>
                                                <div class=""><?php echo $das['shell_phr_keras'] ?></div>
                                                <div class=""><?php echo $das['shell_mhr_keras'] ?></div>
                                            </div>
                                            <div class="d-flex justify-content-between  border px-2">
                                                <div class="">HALUS</div>
                                                <div class=""><?php echo $das['shell_phr_halus'] ?></div>
                                                <div class=""><?php echo $das['shell_mhr_halus'] ?></div>
                                            </div>
                                            <div class="d-flex justify-content-between  border px-2">
                                                <div class="">TOTAL</div>
                                                <div class=""><?php echo floatval($das['shell_phr_keras']) + floatval($das['shell_phr_halus']) ?></div>
                                                <div class=""><?php echo floatval($das['shell_mhr_keras']) + floatval($das['shell_mhr_halus']) ?></div>
                                            </div>
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
                                                    <th colspan=""><?php echo $das['tanggal_rec'] ?></th>
                                                    <th colspan=""><?php echo $das['tanggal_rec2'] == '0000-00-00' ? '' : $das['tanggal_rec2'] ?></th>
                                                    <th colspan=""><?php echo $das['tanggal_rec3']  == '0000-00-00' ? '' : $das['tanggal_rec3'] ?></th>
                                                    <th colspan="" width="10%"><?php echo $das['tanggal_rec'] ?></th>
                                                    <th colspan="" width="10%"><?php echo $das['tanggal_rec2'] == '0000-00-00' ? '' : $das['tanggal_rec3'] ?></th>
                                                    <th colspan=""><?php echo $das['tanggal_rec3']  == '0000-00-00' ? '' : $das['tanggal_rec3'] ?></th>
                                                    <th colspan="" width="10%"></th>
                                                    <th colspan=""></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- COL -->
                                                <tr>
                                                    <td rowspan="2">COL</td>
                                                    <td>COL</td>
                                                    <td width="10%"><?php echo $das['col'] ?></td>
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
                                                    <td width="10%"><?php echo $das['bf'] ?></td>
                                                    <td width="10%"></td>
                                                    <td width="10%"></td>
                                                    <td width="10%" colspan="2"></td>
                                                    <td colspan="2">PHR</td>
                                                    <td><?php echo $das['phr'] ?></td>
                                                    <td class="bg-light" style="background-color: gray"></td>
                                                    <td class="bg-light" style="background-color: gray"></td>
                                                    <td class="bg-light" style="background-color: gray"></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">Total COL</td>
                                                    <td>
                                                    <?php $sum = floatval($das['col']) + floatval($das['bf']);
																		if($sum > 0) {
																			echo $sum;
																		} else {
																			echo '';
																		} ?>
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td colspan="2"></td>
                                                    <td rowspan="5">BASI</td>
                                                    <td>COL</td>
                                                    <td><?php echo $das['basi_col'] ?></td>
                                                    <td class="bg-light" style="background-color: gray"></td>
                                                    <td class="bg-light" style="background-color: gray"></td>
                                                    <td class="bg-light" style="background-color: gray"></td>
                                                    <td></td>
                                                </tr>

                                                <!-- JB -->
                                                <tr>
                                                    <td rowspan="2">JB</td>
                                                    <td>JB</td>
                                                    <td><?php echo $das['jb'] ?></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td colspan="2"></td>
                                                    <td>JK</td>
                                                    <td><?php echo $das['basi_jk'] ?></td>
                                                    <td class="bg-light" style="background-color: gray"></td>
                                                    <td class="bg-light" style="background-color: gray"></td>
                                                    <td class="bg-light" style="background-color: gray"></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>BF</td>
                                                    <td><?php echo $das['jb_bf'] ?></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td colspan="2"></td>
                                                    <td>XLP</td>
                                                    <td><?php echo $das['basi_xlp'] ?></td>
                                                    <td class="bg-light" style="background-color: gray"></td>
                                                    <td class="bg-light" style="background-color: gray"></td>
                                                    <td class="bg-light" style="background-color: gray"></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">Total JB</td>
                                                    <td>
                                                    <?php $sum = floatval($das['jb_bf']) + floatval($das['jb']);
																		if($sum > 0) {
																			echo $sum;
																		} else {
																			echo '';
																		} ?>
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td colspan="2"></td>
                                                    <td>BF</td>
                                                    <td><?php echo $das['basi_bf'] ?></td>
                                                    <td class="bg-light" style="background-color: gray"></td>
                                                    <td class="bg-light" style="background-color: gray"></td>
                                                    <td class="bg-light" style="background-color: gray"></td>
                                                    <td></td>
                                                </tr>
                                                <!-- JK -->
                                                <tr>
                                                    <td rowspan="2">JK</td>
                                                    <td>JK</td>
                                                    <td><?php echo $das['jbb_jk'] ?></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td colspan="2"></td>
                                                    <td>SP</td>
                                                    <td><?php echo $das['basi_sp'] ?></td>
                                                    <td class="bg-light" style="background-color: gray"></td>
                                                    <td class="bg-light" style="background-color: gray"></td>
                                                    <td class="bg-light" style="background-color: gray"></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>BF</td>
                                                    <td><?php echo $das['jbb_jf'] ?></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td colspan="2"></td>
                                                    <td colspan="2">Total PHR</td>
                                                    <td>
                                                    <?php $sum = floatval($das['basi_sp']) + floatval($das['basi_bf']) +  floatval($das['basi_xlp']) + floatval($das['basi_jk']) + floatval($das['basi_col']);
																		if($sum > 0) {
																			echo $sum;
																		} else {
																			echo '';
																		} ?>
                                                    </td>
                                                    <td class="bg-light" style="background-color: gray"></td>
                                                    <td class="bg-light" style="background-color: gray"></td>
                                                    <td class="bg-light" style="background-color: gray"></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">Total JK</td>
                                                    <td>
                                                    <?php $sum = floatval($das['jbb_jf']) + floatval($das['jbb_jk']);
																		if($sum > 0) {
																			echo $sum;
																		} else {
																			echo '';
																		} ?>
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td colspan="2"></td>
                                                    <td colspan="1">MHR</td>
                                                    <td><?php echo $das['mhr'] ?></td>
                                                    <td></td>
                                                    <td class="bg-light" style="background-color: gray"></td>
                                                    <td class="bg-light" style="background-color: gray"></td>
                                                    <td class="bg-light" style="background-color: gray"></td>
                                                    <td></td>
                                                </tr>
                                                <!-- XLP -->
                                                <tr>
                                                    <td colspan="2">XLP</td>
                                                    <td><?php echo $das['xlp'] ?></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td colspan="2"></td>
                                                    <td colspan="1" rowspan="2">BASI</td>
                                                    <td>CL</td>
                                                    <td><?php echo $das['basi_cl'] ?></td>
                                                    <td class="bg-light" style="background-color: gray"></td>
                                                    <td class="bg-light" style="background-color: gray"></td>
                                                    <td class="bg-light" style="background-color: gray"></td>
                                                    <td></td>
                                                </tr>
                                                <!-- BF K3 -->
                                                <tr>
                                                    <td rowspan="8">BF</td>
                                                    <td>K3 COL</td>
                                                    <td><?php echo $das['bf_k3_col'] ?></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td colspan="2"></td>
                                                    <td>MH</td>
                                                    <td><?php echo $das['basi_mh'] ?></td>
                                                    <td class="bg-light" style="background-color: gray"></td>
                                                    <td class="bg-light" style="background-color: gray"></td>
                                                    <td class="bg-light" style="background-color: gray"></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>K3 JB</td>
                                                    <td><?php echo $das['bf_k3_jb'] ?></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td colspan="2"></td>
                                                    <td colspan="2">TOTAL MHR</td>
                                                    <td>
                                                    <?php $sum = floatval($das['basi_mh']) + floatval($das['basi_cl']);
																		if($sum > 0) {
																			echo $sum;
																		} else {
																			echo '';
																		} ?>
                                                    </td>
                                                    <td class="bg-light" style="background-color: gray"></td>
                                                    <td class="bg-light" style="background-color: gray"></td>
                                                    <td class="bg-light" style="background-color: gray"></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>K3 JK</td>
                                                    <td><?php echo $das['bf_k3_jk'] ?></td>
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
                                                    <td><?php echo $das['bf_jl'] ?></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td colspan="2"></td>
                                                    <td>PHR</td>
                                                    <td><?php echo $das['phr'] ?></td>
                                                    <td class="bg-light" style="background-color: gray"></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>KJ</td>
                                                    <td><?php echo $das['bf_kj'] ?></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td colspan="2"></td>
                                                    <td colspan="1" rowspan="6">BASI</td>
                                                    <td>COL</td>
                                                    <td class="bg-light" style="background-color: gray"></td>
                                                    <td><?php echo $das['basi_col'] ?></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>BF</td>
                                                    <td><?php echo $das['bf_bf'] ?></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td colspan="2"></td>
                                                    <td>JB</td>
                                                    <td class="bg-light" style="background-color: gray"></td>
                                                    <td><?php echo $das['basi_jb'] ?></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>LP SLB</td>
                                                    <td><?php echo $das['bf_lp_slb'] ?></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td colspan="2"></td>
                                                    <td>JK</td>
                                                    <td class="bg-light" style="background-color: gray"></td>

                                                    <td><?php echo $das['basi_jk'] ?></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>SP</td>
                                                    <td><?php echo $das['bf_sp'] ?></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td colspan="2"></td>
                                                    <td>XLP</td>
                                                    <td class="bg-light" style="background-color: gray"></td>

                                                    <td><?php echo $das['basi_xlp'] ?></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">Total BF</td>
                                                    <td>
                                                    <?php 
																		$sum = floatval($das['bf_k3_col']) + floatval($das['bf_k3_jb']) + floatval($das['bf_k3_jl']) + floatval($das['bf_k3_jk']) + floatval($das['bf_bf']) + floatval($das['bf_lp_slb']) + floatval($das['bf_sp']);
																			if($sum > 0) {
																				echo $sum;
																			} else {
																				echo '';
																			}
																		?>
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td colspan="2"></td>
                                                    <td>BF</td>
                                                    <td class="bg-light" style="background-color: gray"></td>

                                                    <td><?php echo $das['basi_bf'] ?></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <!-- SPK -->
                                                <tr>
                                                    <td rowspan="2">SPK</td>
                                                    <td>XLP</td>
                                                    <td><?php echo $das['bf_spk_xlp'] ?></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td colspan="2"></td>
                                                    <td>SP</td>
                                                    <td class="bg-light" style="background-color: gray"></td>

                                                    <td><?php echo $das['basi_sp'] ?></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>SP</td>
                                                    <td><?php echo $das['bf_spk_sp'] ?></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td colspan="2"></td>
                                                    <td colspan="2">Total PHR</td>
                                                    <td class="bg-light" style="background-color: gray"></td>
                                                    <td>
                                                    <?php
																		$sum = floatval($das['basi_sp']) + floatval($das['basi_bf']) + floatval($das['basi_jb']) + floatval($das['basi_xlp']) + floatval($das['basi_jk']) + floatval($das['basi_col']);
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
                                                </tr>
                                                <tr>
                                                    <td colspan="2">Total SPK</td>
                                                    <td>
                                                    <?php $sum = floatval($das['bf_spk_xlp']) + floatval($das['bf_spk_sp']);
																		if($sum > 0) {
																			echo $sum;
																		} else {
																			echo '';
																		}
																		?>
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td colspan="2"></td>
                                                    <td>MHR</td>
                                                    <td><?php echo $das['mhr'] ?></td>
                                                    <td class="bg-light" style="background-color: gray"></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <!-- SP -->
                                                <tr>
                                                    <td rowspan="4">SP</td>
                                                    <td>JB</td>
                                                    <td><?php echo $das['spk_sp_jb'] ?></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td colspan="2"></td>
                                                    <td colspan="1" rowspan="2">BASI</td>
                                                    <td>CL</td>
                                                    <td class="bg-light" style="background-color: gray"></td>

                                                    <td><?php echo $das['basi_cl'] ?></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>XLP</td>
                                                    <td><?php echo $das['spk_sp_xlp'] ?></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td colspan="2"></td>
                                                    <td>MH</td>
                                                    <td class="bg-light" style="background-color: gray"></td>

                                                    <td><?php echo $das['basi_mh'] ?></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>BF</td>
                                                    <td><?php echo $das['spk_sp_bfp'] ?></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td colspan="2"></td>
                                                    <td colspan="2">Total MHR</td>
                                                    <td class="bg-light" style="background-color: gray"></td>
                                                    <td>
                                                    <?php $sum = floatval($das['basi_mh']) + floatval($das['basi_cl']);
																		if($sum > 0) {
																			echo $sum;
																		} else {
																			echo '';
																		} ?>
                                                    </td>

                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>SP</td>
                                                    <td><?php echo $das['spk_sp_sph'] ?></td>
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
                                                    <td>
                                                    <?php $sum = floatval($das['spk_sp_jb']) + floatval($das['spk_sp_xlp']) + floatval($das['spk_sp_bfp']) + floatval($das['spk_sp_sph']);
																		if($sum > 0) {
																			echo $sum;
																		} else {
																			echo '';
																		}
																		?>
                                                    </td>
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
                                                    <td><?php echo $das['spk_sp_sph'] ?></td>
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
                                                    <td><?php echo $das['sp_cl'] ?></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td colspan="2"></td>
                                                    <td>AIR</td>
                                                    <td><?php echo $das['air'] ?></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">CLF</td>
                                                    <td><?php echo $das['sp_clf'] ?></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td colspan="2"></td>
                                                    <td>SHELL</td>
                                                    <td><?php echo $das['shell'] ?></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>

                                                </tr>
                                                <tr>
                                                    <td rowspan="2">MH</td>
                                                    <td>MH</td>
                                                    <td><?php echo $das['mh'] ?></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td colspan="2"></td>
                                                    <td>LOSS</td>
                                                    <td><?php echo $das['loss'] ?></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td>MH</td>
                                                    <td><?php echo $das['mh_slb'] ?></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td colspan="2"></td>
                                                    <td colspan="2">Timb. Kotor</td>
                                                    <td>
                                                    <?php
																		$sum = floatval($das['col']) + floatval($das['bf']) + floatval($das['jb']) + floatval($das['jb_bf']) + floatval($das['jbb_jk']) + floatval($das['jbb_bf']) +
																		floatval($das['xlp']) + floatval($das['bf_k3_col']) + floatval($das['bf_k3_jb']) + floatval($das['bf_k3_jk']) + floatval($das['bf_k3_jl']) +
																		floatval($das['bf_jl']) + floatval($das['bf_kj']) + floatval($das['bf_bf']) + floatval($das['bf_lp_slb']) + floatval($das['bf_sp']) +
																		floatval($das['bf_spk_xlp']) + floatval($das['bf_spk_sp']) + floatval($das['spk_sp_jb']) + floatval($das['spk_sp_xlp']) +
																		floatval($das['spk_sp_bfp']) + floatval($das['spk_sp_sph']) + floatval($das['sp_cl']) + floatval($das['sp_clf']) + floatval($das['mh']) +
																		floatval($das['mh_slb']) + floatval($das['phr']) + floatval($das['basi_col']) + floatval($das['basi_jb']) + floatval($das['basi_jk']) +
																		floatval($das['basi_xlp']) + floatval($das['basi_bf']) + floatval($das['basi_sp']) + floatval($das['mhr']) + floatval($das['basi_cl']) +
																		floatval($das['basi_mh']) +
																		floatval($das['timbangan_bb']) + floatval($das['jbb_jf']) + floatval($das['spk_sp']) + floatval($das['sp_sph']);
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
                                                    <td>
                                                    <?php $sum = floatval($das['mh']) + floatval($das['mh_slb']);
																		if($sum > 0) {
																			echo $sum;
																		} else {
																			echo '';
																		} ?>
                                                    </td>
                                                    <td></td>
                                                    <td></td>
                                                    <td colspan="2"></td>
                                                    <td colspan="2">Timb. BB</td>
                                                    <?php 
																$colX = (floatval($das['col']) + floatval($das['bf']));
																$jbX = (floatval($das['jb']) + floatval($das['jbb_jf']));
																$jkX = (floatval($das['jbb_jk']) + floatval($das['jbb_bf']));
																$bfX = (floatval($das['bf_k3_col']) + floatval($das['bf_k3_jb']) + floatval($das['bf_k3_jk'])
																+ floatval($das['bf_k3_jl']) + floatval($das['bf_jl']) + floatval($das['bf_bf']) + floatval($das['bf_bf']) + floatval($das['bf_kj']));
																$spkX = (floatval($das['spk_sp_jb']) +  floatval($das['spk_sp_bfp']) + floatval($das['spk_sp_sph']));
																$spX = (floatval($das['bf_spk_xlp']) + floatval($das['bf_spk_sp']));
																$mhX = (floatval($das['mh']) + floatval($das['mh_slb']));
																$clX = floatval($das['sp_cl']);
																$clfX = floatval($das['sp_clf']);
																$mhr = floatval($das['mh']) + floatval($das['mh_slb']);
																$phr = floatval($das['basi_sp']) + floatval($das['basi_bf']) + floatval($das['basi_xlp']) + floatval($das['basi_jk']) + floatval($das['basi_col']);
																$sumXX = $colX + $jbX + $jkX + $bfX + $spkX + $spX + $mhX + $clX + $clfX;
																$grand_total = $sumXX + $phr + $mhr;

																$qty = 0;
																$dataDaging = $this->db->query('select * from tbl_sub_daging where id_bahan_baku ='.$das['id_bahan_baku'])->result_array(); 
																foreach($dataDaging as $sdb) {
																	$qty += floatval($sdb['tbersih']);
																}

																?>
                                                    <td><?php echo $qty ?></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">Grand Total</td>
                                                    <td><?php echo $sumXX ?></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td colspan="2"></td>
                                                    <td colspan="2">Grand Total</td>
                                                    <td><?php echo $grand_total ?></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>

                                                </tr>

                                            </tbody>
                                        </table>
                                        <table class="table table-bordered mt-3">
                                            <tr>
                                                <td colspan="3" height="90px" class="text-center">Dibuat</td>
                                                <td colspan="4" height="90px" class="text-center">Diperiksa</td>
                                                <td colspan="4" height="90px" class="text-center">Diketahui</td>
                                                <td colspan="3" height="90px" class="text-center">Disetujui</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <p>Note:
                                        <?php echo $das['note'] ?></p>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php 
					$data2 = $this->db->query('select * from tbl_sortir where id_bb ='. $das['id_bahan_baku'].' and is_corection = 1')->row_array();
					?>
                <?php if($data2 && $data2['is_corection'] == 1 ) { ?>
                <button
                    type="button"
                    class="btn btn-light mx-1"
                    data-toggle="modal"
                    data-target="<?php echo '#modelId'.$data2['id_bb'].'is-corectoion' ?>">
                    <i class="fa fa-eye" aria-hidden="true"></i>
                    Detail Sortir Koreksi
                </button>
                <div
                    class="modal fade"
                    id="<?php echo 'modelId'.$data2['id_bb'].'is-corectoion' ?>"
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
                            <div class="modal-body" id="modal-print-<?php echo $data2['id'] ?>">
                                <div class="row justify-content-between">
                                    <div class="col-md-3">
                                        <div class="d-flex justify-content-between border px-2">
                                            <div class="">Supplier</div>
                                            <div class="">
                                                <?php echo $data2['kode_supplier']; ?>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between  border px-2">
                                            <div class="">TGL SJ</div>
                                            <div class="">
                                                <?php echo $data2['tanggal_sj']; ?>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between  border px-2">
                                            <div class="">TGL Rec</div>
                                            <div class="">
                                                <?php echo $data2['tanggal_rec']; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <p style="text-align: center;">SD.100.3001 /
                                            <?php echo $data2['id'] ?></p>

                                    </div>
                                    <div class="col-md-3">
                                        <!-- <form action="<?php echo
                                        base_url('main/updateMiniSortir/'.$data2['id_sortir']) ?>" method="post"> -->

                                        <div class="d-flex justify-content-between  border px-2">
                                            <div class="">Cap</div>
                                            <div class="">
                                                <?php echo $data2['cap'] ?>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between  border px-2">
                                            <div class="mt-2">Potong</div>
                                            <div class="ml-2 py-2">
                                                <?php echo $data2['potong'] ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <!-- <form action="<?php echo
                                        base_url('main/updateMiniSortir/'.$data2['id_sortir']) ?>" method="post"> -->

                                        <div class="d-flex justify-content-between  border px-2">
                                            <div class="">SHELL</div>
                                            <div class="">PHR</div>
                                            <div class="">MHR</div>

                                        </div>
                                        <div class="d-flex justify-content-between  border px-2">
                                            <div class="">KERAS</div>
                                            <div class=""><?php echo $data2['shell_phr_keras'] ?></div>
                                            <div class=""><?php echo $data2['shell_mhr_keras'] ?></div>
                                        </div>
                                        <div class="d-flex justify-content-between  border px-2">
                                            <div class="">HALUS</div>
                                            <div class=""><?php echo $data2['shell_phr_halus'] ?></div>
                                            <div class=""><?php echo $data2['shell_mhr_halus'] ?></div>
                                        </div>
                                        <div class="d-flex justify-content-between  border px-2">
                                            <div class="">TOTAL</div>
                                            <div class=""><?php echo floatval($data2['shell_phr_keras']) + floatval($data2['shell_phr_halus']) ?></div>
                                            <div class=""><?php echo floatval($data2['shell_mhr_keras']) + floatval($data2['shell_mhr_halus']) ?></div>
                                        </div>
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
                                                <th colspan=""><?php echo $data2['tanggal_rec'] ?></th>
                                                <th colspan=""><?php echo $data2['tanggal_rec2'] == '0000-00-00' ? '' : $data2['tanggal_rec2'] ?></th>
                                                <th colspan=""><?php echo $data2['tanggal_rec3']  == '0000-00-00' ? '' : $data2['tanggal_rec3'] ?></th>
                                                <th colspan="" width="10%"><?php echo $data2['tanggal_rec'] ?></th>
                                                <th colspan="" width="10%"><?php echo $data2['tanggal_rec2'] == '0000-00-00' ? '' : $data2['tanggal_rec3'] ?></th>
                                                <th colspan=""><?php echo $data2['tanggal_rec3']  == '0000-00-00' ? '' : $data2['tanggal_rec3'] ?></th>
                                                <th colspan="" width="10%"></th>
                                                <th colspan=""></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- COL -->
                                            <tr>
                                                <td rowspan="2">COL</td>
                                                <td>COL</td>
                                                <td width="10%"><?php echo $data2['col'] ?></td>
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
                                                <td width="10%"><?php echo $data2['bf'] ?></td>
                                                <td width="10%"></td>
                                                <td width="10%"></td>
                                                <td width="10%" colspan="2"></td>
                                                <td colspan="2">PHR</td>
                                                <td><?php echo $data2['phr'] ?></td>
                                                <td class="bg-light" style="background-color: gray"></td>
                                                <td class="bg-light" style="background-color: gray"></td>
                                                <td class="bg-light" style="background-color: gray"></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">Total COL</td>
                                                <td>
                                                <?php $sum = floatval($data2['col']) + floatval($data2['bf']);
																		if($sum > 0) {
																			echo $sum;
																		} else {
																			echo '';
																		} ?>
                                                </td>
                                                <td></td>
                                                <td></td>
                                                <td colspan="2"></td>
                                                <td rowspan="5">BASI</td>
                                                <td>COL</td>
                                                <td><?php echo $data2['basi_col'] ?></td>
                                                <td class="bg-light" style="background-color: gray"></td>
                                                <td class="bg-light" style="background-color: gray"></td>
                                                <td class="bg-light" style="background-color: gray"></td>
                                                <td></td>
                                            </tr>

                                            <!-- JB -->
                                            <tr>
                                                <td rowspan="2">JB</td>
                                                <td>JB</td>
                                                <td><?php echo $data2['jb'] ?></td>
                                                <td></td>
                                                <td></td>
                                                <td colspan="2"></td>
                                                <td>JK</td>
                                                <td><?php echo $data2['basi_jk'] ?></td>
                                                <td class="bg-light" style="background-color: gray"></td>
                                                <td class="bg-light" style="background-color: gray"></td>
                                                <td class="bg-light" style="background-color: gray"></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>BF</td>
                                                <td><?php echo $data2['jb_bf'] ?></td>
                                                <td></td>
                                                <td></td>
                                                <td colspan="2"></td>
                                                <td>XLP</td>
                                                <td><?php echo $data2['basi_xlp'] ?></td>
                                                <td class="bg-light" style="background-color: gray"></td>
                                                <td class="bg-light" style="background-color: gray"></td>
                                                <td class="bg-light" style="background-color: gray"></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">Total JB</td>
                                                <td>
                                                <?php $sum = floatval($data2['jb_bf']) + floatval($data2['jb']);
																		if($sum > 0) {
																			echo $sum;
																		} else {
																			echo '';
																		} ?>
                                                </td>
                                                <td></td>
                                                <td></td>
                                                <td colspan="2"></td>
                                                <td>BF</td>
                                                <td><?php echo $data2['basi_bf'] ?></td>
                                                <td class="bg-light" style="background-color: gray"></td>
                                                <td class="bg-light" style="background-color: gray"></td>
                                                <td class="bg-light" style="background-color: gray"></td>
                                                <td></td>
                                            </tr>
                                            <!-- JK -->
                                            <tr>
                                                <td rowspan="2">JK</td>
                                                <td>JK</td>
                                                <td><?php echo $data2['jbb_jk'] ?></td>
                                                <td></td>
                                                <td></td>
                                                <td colspan="2"></td>
                                                <td>SP</td>
                                                <td><?php echo $data2['basi_sp'] ?></td>
                                                <td class="bg-light" style="background-color: gray"></td>
                                                <td class="bg-light" style="background-color: gray"></td>
                                                <td class="bg-light" style="background-color: gray"></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>BF</td>
                                                <td><?php echo $data2['jbb_jf'] ?></td>
                                                <td></td>
                                                <td></td>
                                                <td colspan="2"></td>
                                                <td colspan="2">Total PHR</td>
                                                <td>
                                                <?php $sum = floatval($data2['basi_sp']) + floatval($data2['basi_bf']) +  floatval($data2['basi_xlp']) + floatval($data2['basi_jk']) + floatval($data2['basi_col']);
																		if($sum > 0) {
																			echo $sum;
																		} else {
																			echo '';
																		} ?>
                                                </td>
                                                <td class="bg-light" style="background-color: gray"></td>
                                                <td class="bg-light" style="background-color: gray"></td>
                                                <td class="bg-light" style="background-color: gray"></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">Total JK</td>
                                                <td>
                                                <?php $sum = floatval($data2['jbb_jf']) + floatval($data2['jbb_jk']);
																		if($sum > 0) {
																			echo $sum;
																		} else {
																			echo '';
																		} ?>
                                                </td>
                                                <td></td>
                                                <td></td>
                                                <td colspan="2"></td>
                                                <td colspan="1">MHR</td>
                                                <td><?php echo $data2['mhr'] ?></td>
                                                <td></td>
                                                <td class="bg-light" style="background-color: gray"></td>
                                                <td class="bg-light" style="background-color: gray"></td>
                                                <td class="bg-light" style="background-color: gray"></td>
                                                <td></td>
                                            </tr>
                                            <!-- XLP -->
                                            <tr>
                                                <td colspan="2">XLP</td>
                                                <td><?php echo $data2['xlp'] ?></td>
                                                <td></td>
                                                <td></td>
                                                <td colspan="2"></td>
                                                <td colspan="1" rowspan="2">BASI</td>
                                                <td>CL</td>
                                                <td><?php echo $data2['basi_cl'] ?></td>
                                                <td class="bg-light" style="background-color: gray"></td>
                                                <td class="bg-light" style="background-color: gray"></td>
                                                <td class="bg-light" style="background-color: gray"></td>
                                                <td></td>
                                            </tr>
                                            <!-- BF K3 -->
                                            <tr>
                                                <td rowspan="8">BF</td>
                                                <td>K3 COL</td>
                                                <td><?php echo $data2['bf_k3_col'] ?></td>
                                                <td></td>
                                                <td></td>
                                                <td colspan="2"></td>
                                                <td>MH</td>
                                                <td><?php echo $data2['basi_mh'] ?></td>
                                                <td class="bg-light" style="background-color: gray"></td>
                                                <td class="bg-light" style="background-color: gray"></td>
                                                <td class="bg-light" style="background-color: gray"></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>K3 JB</td>
                                                <td><?php echo $data2['bf_k3_jb'] ?></td>
                                                <td></td>
                                                <td></td>
                                                <td colspan="2"></td>
                                                <td colspan="2">TOTAL MHR</td>
                                                <td>
                                                <?php $sum = floatval($data2['basi_mh']) + floatval($data2['basi_cl']);
																		if($sum > 0) {
																			echo $sum;
																		} else {
																			echo '';
																		} ?>
                                                </td>
                                                <td class="bg-light" style="background-color: gray"></td>
                                                <td class="bg-light" style="background-color: gray"></td>
                                                <td class="bg-light" style="background-color: gray"></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>K3 JK</td>
                                                <td><?php echo $data2['bf_k3_jk'] ?></td>
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
                                                <td><?php echo $data2['bf_jl'] ?></td>
                                                <td></td>
                                                <td></td>
                                                <td colspan="2"></td>
                                                <td>PHR</td>
                                                <td><?php echo $data2['phr'] ?></td>
                                                <td class="bg-light" style="background-color: gray"></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>KJ</td>
                                                <td><?php echo $data2['bf_kj'] ?></td>
                                                <td></td>
                                                <td></td>
                                                <td colspan="2"></td>
                                                <td colspan="1" rowspan="6">BASI</td>
                                                <td>COL</td>
                                                <td class="bg-light" style="background-color: gray"></td>
                                                <td><?php echo $data2['basi_col'] ?></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>BF</td>
                                                <td><?php echo $data2['bf_bf'] ?></td>
                                                <td></td>
                                                <td></td>
                                                <td colspan="2"></td>
                                                <td>JB</td>
                                                <td class="bg-light" style="background-color: gray"></td>
                                                <td><?php echo $data2['basi_jb'] ?></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>LP SLB</td>
                                                <td><?php echo $data2['bf_lp_slb'] ?></td>
                                                <td></td>
                                                <td></td>
                                                <td colspan="2"></td>
                                                <td>JK</td>
                                                <td class="bg-light" style="background-color: gray"></td>

                                                <td><?php echo $data2['basi_jk'] ?></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>SP</td>
                                                <td><?php echo $data2['bf_sp'] ?></td>
                                                <td></td>
                                                <td></td>
                                                <td colspan="2"></td>
                                                <td>XLP</td>
                                                <td class="bg-light" style="background-color: gray"></td>

                                                <td><?php echo $data2['basi_xlp'] ?></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">Total BF</td>
                                                <td>
                                                <?php 
																		$sum = floatval($data2['bf_k3_col']) + floatval($data2['bf_k3_jb']) + floatval($data2['bf_k3_jl']) + floatval($data2['bf_k3_jk']) + floatval($data2['bf_bf']) + floatval($data2['bf_lp_slb']) + floatval($data2['bf_sp']);
																			if($sum > 0) {
																				echo $sum;
																			} else {
																				echo '';
																			}
																		?>
                                                </td>
                                                <td></td>
                                                <td></td>
                                                <td colspan="2"></td>
                                                <td>BF</td>
                                                <td class="bg-light" style="background-color: gray"></td>

                                                <td><?php echo $data2['basi_bf'] ?></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <!-- SPK -->
                                            <tr>
                                                <td rowspan="2">SPK</td>
                                                <td>XLP</td>
                                                <td><?php echo $data2['bf_spk_xlp'] ?></td>
                                                <td></td>
                                                <td></td>
                                                <td colspan="2"></td>
                                                <td>SP</td>
                                                <td class="bg-light" style="background-color: gray"></td>

                                                <td><?php echo $data2['basi_sp'] ?></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>SP</td>
                                                <td><?php echo $data2['bf_spk_sp'] ?></td>
                                                <td></td>
                                                <td></td>
                                                <td colspan="2"></td>
                                                <td colspan="2">Total PHR</td>
                                                <td class="bg-light" style="background-color: gray"></td>
                                                <td>
                                                <?php
																		$sum = floatval($data2['basi_sp']) + floatval($data2['basi_bf']) + floatval($data2['basi_jb']) + floatval($data2['basi_xlp']) + floatval($data2['basi_jk']) + floatval($data2['basi_col']);
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
                                            </tr>
                                            <tr>
                                                <td colspan="2">Total SPK</td>
                                                <td>
                                                <?php $sum = floatval($data2['bf_spk_xlp']) + floatval($data2['bf_spk_sp']);
																		if($sum > 0) {
																			echo $sum;
																		} else {
																			echo '';
																		}
																		?>
                                                </td>
                                                <td></td>
                                                <td></td>
                                                <td colspan="2"></td>
                                                <td>MHR</td>
                                                <td><?php echo $data2['mhr'] ?></td>
                                                <td class="bg-light" style="background-color: gray"></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <!-- SP -->
                                            <tr>
                                                <td rowspan="4">SP</td>
                                                <td>JB</td>
                                                <td><?php echo $data2['spk_sp_jb'] ?></td>
                                                <td></td>
                                                <td></td>
                                                <td colspan="2"></td>
                                                <td colspan="1" rowspan="2">BASI</td>
                                                <td>CL</td>
                                                <td class="bg-light" style="background-color: gray"></td>

                                                <td><?php echo $data2['basi_cl'] ?></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>XLP</td>
                                                <td><?php echo $data2['spk_sp_xlp'] ?></td>
                                                <td></td>
                                                <td></td>
                                                <td colspan="2"></td>
                                                <td>MH</td>
                                                <td class="bg-light" style="background-color: gray"></td>

                                                <td><?php echo $data2['basi_mh'] ?></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>BF</td>
                                                <td><?php echo $data2['spk_sp_bfp'] ?></td>
                                                <td></td>
                                                <td></td>
                                                <td colspan="2"></td>
                                                <td colspan="2">Total MHR</td>
                                                <td class="bg-light" style="background-color: gray"></td>
                                                <td>
                                                <?php $sum = floatval($data2['basi_mh']) + floatval($data2['basi_cl']);
																		if($sum > 0) {
																			echo $sum;
																		} else {
																			echo '';
																		} ?>
                                                </td>

                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>SP</td>
                                                <td><?php echo $data2['spk_sp_sph'] ?></td>
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
                                                <td>
                                                <?php $sum = floatval($data2['spk_sp_jb']) + floatval($data2['spk_sp_xlp']) + floatval($data2['spk_sp_bfp']) + floatval($data2['spk_sp_sph']);
																		if($sum > 0) {
																			echo $sum;
																		} else {
																			echo '';
																		}
																		?>
                                                </td>
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
                                                <td><?php echo $data2['spk_sp_sph'] ?></td>
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
                                                <td><?php echo $data2['sp_cl'] ?></td>
                                                <td></td>
                                                <td></td>
                                                <td colspan="2"></td>
                                                <td>AIR</td>
                                                <td><?php echo $data2['air'] ?></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">CLF</td>
                                                <td><?php echo $data2['sp_clf'] ?></td>
                                                <td></td>
                                                <td></td>
                                                <td colspan="2"></td>
                                                <td>SHELL</td>
                                                <td><?php echo $data2['shell'] ?></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>

                                            </tr>
                                            <tr>
                                                <td rowspan="2">MH</td>
                                                <td>MH</td>
                                                <td><?php echo $data2['mh'] ?></td>
                                                <td></td>
                                                <td></td>
                                                <td colspan="2"></td>
                                                <td>LOSS</td>
                                                <td><?php echo $data2['loss'] ?></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>MH</td>
                                                <td><?php echo $data2['mh_slb'] ?></td>
                                                <td></td>
                                                <td></td>
                                                <td colspan="2"></td>
                                                <td colspan="2">Timb. Kotor</td>
                                                <td>
                                                <?php
																		$sum = floatval($data2['col']) + floatval($data2['bf']) + floatval($data2['jb']) + floatval($data2['jb_bf']) + floatval($data2['jbb_jk']) + floatval($data2['jbb_bf']) +
																		floatval($data2['xlp']) + floatval($data2['bf_k3_col']) + floatval($data2['bf_k3_jb']) + floatval($data2['bf_k3_jk']) + floatval($data2['bf_k3_jl']) +
																		floatval($data2['bf_jl']) + floatval($data2['bf_kj']) + floatval($data2['bf_bf']) + floatval($data2['bf_lp_slb']) + floatval($data2['bf_sp']) +
																		floatval($data2['bf_spk_xlp']) + floatval($data2['bf_spk_sp']) + floatval($data2['spk_sp_jb']) + floatval($data2['spk_sp_xlp']) +
																		floatval($data2['spk_sp_bfp']) + floatval($data2['spk_sp_sph']) + floatval($data2['sp_cl']) + floatval($data2['sp_clf']) + floatval($data2['mh']) +
																		floatval($data2['mh_slb']) + floatval($data2['phr']) + floatval($data2['basi_col']) + floatval($data2['basi_jb']) + floatval($data2['basi_jk']) +
																		floatval($data2['basi_xlp']) + floatval($data2['basi_bf']) + floatval($data2['basi_sp']) + floatval($data2['mhr']) + floatval($data2['basi_cl']) +
																		floatval($data2['basi_mh']) +
																		floatval($data2['timbangan_bb']) + floatval($data2['jbb_jf']) + floatval($data2['spk_sp']) + floatval($data2['sp_sph']);
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
                                                <td>
                                                <?php $sum = floatval($data2['mh']) + floatval($data2['mh_slb']);
																		if($sum > 0) {
																			echo $sum;
																		} else {
																			echo '';
																		} ?>
                                                </td>
                                                <td></td>
                                                <td></td>
                                                <td colspan="2"></td>
                                                <td colspan="2">Timb. BB</td>
                                                <?php 
																$colX = (floatval($data2['col']) + floatval($data2['bf']));
																$jbX = (floatval($data2['jb']) + floatval($data2['jbb_jf']));
																$jkX = (floatval($data2['jbb_jk']) + floatval($data2['jbb_bf']));
																$bfX = (floatval($data2['bf_k3_col']) + floatval($data2['bf_k3_jb']) + floatval($data2['bf_k3_jk'])
																+ floatval($data2['bf_k3_jl']) + floatval($data2['bf_jl']) + floatval($data2['bf_bf']) + floatval($data2['bf_bf']) + floatval($data2['bf_kj']));
																$spkX = (floatval($data2['spk_sp_jb']) +  floatval($data2['spk_sp_bfp']) + floatval($data2['spk_sp_sph']));
																$spX = (floatval($data2['bf_spk_xlp']) + floatval($data2['bf_spk_sp']));
																$mhX = (floatval($data2['mh']) + floatval($data2['mh_slb']));
																$clX = floatval($data2['sp_cl']);
																$clfX = floatval($data2['sp_clf']);
																$mhr = floatval($data2['mh']) + floatval($data2['mh_slb']);
																$phr = floatval($data2['basi_sp']) + floatval($data2['basi_bf']) + floatval($data2['basi_xlp']) + floatval($data2['basi_jk']) + floatval($data2['basi_col']);
																$sumXX = $colX + $jbX + $jkX + $bfX + $spkX + $spX + $mhX + $clX + $clfX;
																$grand_total = $sumXX + $phr + $mhr;

																$qty = 0;
																$dataDaging = $this->db->query('select * from tbl_sub_daging where id_bahan_baku ='.$data2['id_bb'])->result_array(); 
																foreach($dataDaging as $sdb) {
																	$qty += floatval($sdb['tbersih']);
																}

																?>
                                                <td><?php echo $qty ?></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">Grand Total</td>
                                                <td><?php echo $sumXX ?></td>
                                                <td></td>
                                                <td></td>
                                                <td colspan="2"></td>
                                                <td colspan="2">Grand Total</td>
                                                <td><?php echo $grand_total ?></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>

                                            </tr>

                                        </tbody>
                                    </table>
                                    <table class="table table-bordered mt-3">
                                        <tr>
                                            <td colspan="3" height="90px" class="text-center">Dibuat</td>
                                            <td colspan="4" height="90px" class="text-center">Diperiksa</td>
                                            <td colspan="4" height="90px" class="text-center">Diketahui</td>
                                            <td colspan="3" height="90px" class="text-center">Disetujui</td>
                                        </tr>
                                    </table>
                                </div>
                                <p>Note:
                                    <?php echo $data2['note'] ?></p>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <!-- <?php if($data2['status'] == 3) { ?> <a href="<?php echo
                            base_url('main/approveSortirCoast/'.$data2['id_sortir']); ?>" class="btn
                            btn-primary">Approve</a> <?php } ?> -->
                            <button class="btn btn-primary" onclick="printDisini(<?php echo $data2['id'] ?>)">Print</button>

                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </td>
    </tr>
    <?php endforeach ?>
</tbody>

</td>
</tr>
</tbody>
</table>
</div>
</div>
