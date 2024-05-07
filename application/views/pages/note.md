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
						<?php echo $data2['supplier']; ?>
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
				<p style="text-align: center;">SD.100.3001 / <?php echo $data2['id'] ?></p>
			
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
						$dataDaging = $this->db->query('select * from tbl_sub_daging where id_bahan_baku ='.$data2['id_bahan_baku'])->result_array(); 
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
		<p>Note: <?php echo $data2['note'] ?></p>
	</div>
</div>
<div class="modal-footer">
	<!-- <?php if($data2['status'] == 3) { ?>
	<a
		href="<?php echo base_url('main/approveSortirCoast/'.$data2['id_sortir']); ?>"
		class="btn btn-primary">Approve</a>
	<?php } ?> -->
	<button class="btn btn-primary" onclick="printDisini(<?php echo $data2['id'] ?>)">Print</button>

</div>
</div>
</div>
</div>
