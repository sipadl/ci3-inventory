<!-- Modal -->
					<div class="modal fade" id="modelId-<?php echo $da['id_sortir_baru'] ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
						<div class="modal-dialog modal-xl modal-fullscreen" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title">Detail Laporan Supplier</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
								</div>
								<div class="modal-body">
								<table class="table table-bordered table-responsive" id="myTablePrintAble">
								<thead class="text-center">
								<tr>
								<th style="width: 40px;" rowspan="2">NO.</th>
								<!-- <th style="width: 40px;" rowspan="2">KD</th> -->
								<th style="width: 100px;" rowspan="2">SUPPLIER</th>
								<th style="width: 60px;" rowspan="2">FRESH</th>
								<th style="width: 80px;" rowspan="2">PHR / MHR</th>
								<th style="width: 60px;" rowspan="2">TOTAL</th>
								<th style="width: 60px;" rowspan="2">LOSS</th>
								<th style="width: 80px;" rowspan="2">QTTY BB</th>
								<th style="width: 80px;" rowspan="2">TOTAL NOTA</th>
								<th style="width: 120px;" rowspan="2">ROOT SBLM SUBSIDI</th>
								<th style="width: 100px;" rowspan="2">SUBSIDI NORMAL</th>
								<th style="width: 140px;" rowspan="2">TOTAL SUBSIDI NORMAL</th>
								<th style="width: 180px;" rowspan="2">TOTAL NOTA + SUBSIDI NORMAL</th>
								<th style="width: 160px;" rowspan="2">ROOT STLH SUBSIDI NORMAL</th>
								<th colspan="3" style="width: 360px;">SUBSIDI DIBAYAR</th>
								<th style="width: 80px;" rowspan="2">CAP/SHELL</th>
								<th style="width: 160px;" rowspan="2">TOTAL SUBSIDI DIBAYAR</th>
								<th style="width: 200px;" rowspan="2">TOTAL NOTA + SUBSIDI DIBAYAR</th>
								<th style="width: 180px;" rowspan="2">ROOT STLH SUBSIDI DIBAYAR</th>
								<th style="width: 100px;" rowspan="2">SUBSIDI TRANS</th>
								<th style="width: 160px;" rowspan="2">TOTAL SUBSIDI TRANS</th>
								<th style="width: 100px;" rowspan="2">UNTUNG / RUGI</th>
								<th style="width: 140px;" rowspan="2">ROOT RECEIVING</th>
								<th rowspan="2">JB %</th>
								<tr>
								<th style="width: 120px;" rowspan="1">awal</th>
								<th style="width: 120px;" rowspan="1">-/+</th>
								<th style="width: 120px;" rowspan="1">total</th>
								</tr>
							</thead>
							<tbody>
							
									<tr>
										<td><?php echo $no++ ?></td>
										<!-- <td><?php echo $da['kode_supplier'];?></td> -->
										<td><?php echo $da['nama_supplier'] ?></td>
										<td id="fresh"><?php echo $da['fresh']; 
										?></td>
										<td id="mhr">
										<?php echo $da['phrmhr'];
										?>
										</td>
										<td id="total"><?php echo $da['total']; 
										?></td>
										<td id="loss"><?php echo $da['sum_loss'];
										?>
										</td>
										<td id="qty_bb">
											<?php echo $da['qty'] ?>
										</td>
										<td id="total_nota">
											<?php 
											$col = $da['sum_col'] * floatval($price[0]['harga']);
											$jb = $da['sum_jb'] * floatval($price[1]['harga']);
											$jk = $da['sum_jk'] * floatval($price[2]['harga']);
											$bf = $da['sum_bf'] * floatval($price[6]['harga']);
											$spk = $da['sum_spk'] * floatval($price[7]['harga']);
											$sp = $da['sum_sp'] * floatval($price[8]['harga']);
											$mh = $da['sum_mh'] * floatval($price[12]['harga']);
											$cl = floatval($da['sp_cl']) * floatval($price[10]['harga']);
											$clf = floatval($da['sp_clf']) * floatval($price[11]['harga']);
											$total_nota = $col+ $jb+ $jk+ $bf+ $spk+ $sp+ $mh+ $cl+ $clf;
											// $subsidi_normal = floatval($da['subsidi_normal']);
											echo $total_nota;
											
											?>
										</td>
										<td id="root_sebelum_subsidi"><?php echo $root_sebelum_subsidi = ($total_nota / $da['fresh']) ?> </td>
										<!-- Manual -->
										<td class="subsidi_normal"><?php echo $subsidi_normal = $da['subsidi_normal']  ?> </td>
										<td class="sum_subsidi_normal"><?php echo $total_subsidi_normal = $subsidi_normal * $da['fresh'] ?></td>
										<td class="sum_total_plus_subsidi"><?php echo $total_nota_pls_subsidi_normal = $total_nota + $da['subsidi_normal'] ?></td>
										<td><?php echo  $root_setelah_subsidi_pls_nota = ($total_nota + $da['subsidi_normal']) / $da['fresh'] ?></td>
										<!-- Manual -->
										<td><?php echo $subsidi_bayar_1 = $da['subsidi_dibayar_1'] ?></td>
										<!-- Manual -->
										<td><?php echo $subsidi_bayar_2 = $da['subsidi_dibayar_2'] ?></td>
										<td class="total_subsidi"><?php echo $subsidi_bayar_3 = $subsidi_bayar_2 + $subsidi_bayar_1 ?></td>
										<td><?php echo $capshell = $da['cap_shell'] ?></td>
										<td class="total_subsidi_dibayar"><?php echo $total_subsidi_dibayar = $subsidi_bayar_3 * $da['fresh'] ?></td>
										<td class="total_subsidi2"><?php echo $root_setelah_subsidi_pls_nota = ($total_subsidi_dibayar + $total_nota ) ?></td>
										<td class="total_subsidi3"><?php echo $root_setelah_subsidi = $total_subsidi_dibayar / $da['fresh'] ?></td>
										<!-- Manual -->
										<td class="subsidi_trans"><?php echo $subsidi_trans = $da['subsidi_transport'] ?></td>
										<td class="total_subsidi_trans"><?php echo $total_subsidi_trans = $subsidi_trans * $da['total'] ?></td>
										<td class="total_laba"><?php echo $untung_rugi = (floatval($total_nota) + floatval($subsidi_normal)) - (floatval($root_setelah_subsidi_pls_nota) + floatval($total_subsidi_trans) + floatval($capshell)) ?></td>
										<td><?php $root = (floatval($total_nota) + floatval($total_subsidi_dibayar));
										if($root > 1 ) {
											echo $root_receiving = $total_nota / $da['qty'];
										} else {
											// $root_receiving += 0;
											echo 0;
										}
										?>
									</td>
									<td></td>
									<!-- <td>0</td> -->
									<!-- <td><?php echo ($jbpersen / $da['fresh']) ?> %</td> -->
									</tr>
								</tbody>
											
								</table>
								</div>
								<div class="modal-footer">
									<?php if($da['id_laporan']) { ?> 
									<a href="<?php echo base_url('main/approve_laporan_root/'.$da['id_laporan']); ?>" class="btn btn-primary">Approve</a>
									<?php } ?>
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								</div>
							</div>
						</div>
					</div>
					<!-- Modal -->
					<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title">Tambah Manual Data</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
								</div>
								<form action="<?php echo base_url('main/post_laporan_root/'.$da['id_sortir_baru']); ?>" method="post">
								<div class="modal-body">
										<input type="text" class="form-control my-2" name="subsidi_normal" id="" placeholder="subsidi normal">
										<input type="text" class="form-control my-2" name="subsidi_dibayar_1" id="" placeholder="subsidi dibayar (awal)">
										<input type="text" class="form-control my-2" name="subsidi_dibayar_2" id="" placeholder="subsidi dibayar (+)">
										<input type="text" class="form-control my-2" name="subsidi_dibayar_3" id="" placeholder="subsidi dibayar (-)">
										<input type="text" class="form-control my-2" name="cap_shell" id="" placeholder="cap/shell">
										<input type="text" class="form-control my-2" name="subsidi_transport" id="" placeholder="subsidi transport">
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										<button type="submit" class="btn btn-primary">Simpan</button>
									</div>
								</form>
							</div>
						</div>
					</div>
