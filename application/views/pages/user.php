<!-- Form untuk tambah user -->
	<div class="row">
		<!-- Button trigger modal -->
		<button type="button" class="btn btn-primary mb-4" data-toggle="modal" data-target="#modelIdX">
		  Tambah User
		</button>
		
		<!-- Modal -->
		<div class="modal fade" id="modelIdX" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
			<div class="modal-dialog modal-lg modal-fullscreen" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Form Tambah User</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
					</div>
					<form method="post" action="<?php echo site_url('main/tambahUser'); ?>">
					<div class="modal-body">
					<div class="col-md-12">
						<!-- Field untuk nama, email, password, dll. -->
						<div class="form-group">
							<label for="username">Username</label>
							<input class="form-control mb-2" type="text" id="username" name="username" placeholder="Username" required>
						</div>

						<div class="form-group">
							<label for="email">Email</label>
							<input class="form-control mb-2" type="email" id="email" name="email" placeholder="Email" required>
						</div>

						<div class="form-group">
							<label for="password">Password</label>
							<input class="form-control mb-2" type="password" id="password" name="password" placeholder="Password" required>
						</div>
						<div class="form-group">
							<div class="col-md-12">
								<label for="area">Area</label><br>
							</div>
							<select name="wilayah" class="form-control col-md-12" id="basic-multiple" >
								<option value="0">Pilih Area</option>
								<?php foreach($wilayah as $wil) : ?>
									<option value="<?php echo $wil['kode_area'] ?>"><?php echo $wil['nama_area'] ?></option>
								<?php endforeach ?>
							</select>
						</div>
						<div class="innerDropdown"></div>
						<!-- Dropdown untuk memilih peran -->
						<div class="form-group">
							<div class="col-md-12">
								<label for="role">Role</label>
							</div>
							<select name="role" class="form-control w-100 mb-2 col-md-12" id="basic-multiple2">
								<?php foreach ($role as $dd) : ?>
									<option value="<?php echo $dd['id_role'] ?>"><?php echo $dd['descriptiom'] ?></option>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Simpan User</button>
					</div>
				</form>
				</div>
			</div>
		</div>
		<div class="col-md-12">
			<div
				class="table-responsive"
			>
				<table
					class="table table-border"
					id="myTable"
				>
					<thead>
						<tr>
							<th>No.</th>
							<th scope="col">username</th>
							<th scope="col">role</th>
							<th scope="col">tanggal dibuat</th>
							<th scope="col">area</th>
							<th scope="col">aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1 ?>
						<?php foreach($user as $xx) : ?>
						<tr class="">
							<td scope="row"><?php echo $no++ ?></td>
							<td><?php echo $xx['username'] ?></td>
							<?php 
							$this->db->select('descriptiom');
							$this->db->where('id_role', $xx['role']);
							$query = $this->db->get('tbl_role');
							$result = $query->row_array();
							$nameofrole = $result['descriptiom']
							;?>
							<td><?php echo $nameofrole ?></td>
							<td><?php echo $xx['tanggal'] ?></td>
							<td>
							<?php
							$datas = json_decode($xx['wilayah']);
							// Check if JSON decoding was successful
							if ($datas !== null) {
								foreach ($datas as $key => $wot) {
									$wilayah = $this->db->select('nama_kota')->where('id_kota', $wot)->get('tbl_kota')->row_array();
									if ($wilayah !== null) {
										if(count($wilayah) != $key ) {
											echo $wilayah['nama_kota'].', ';
										} else {
											echo $wilayah['nama_kota'].' ';
										}
									}
								}
							} else {
								echo "Error Data.";
							}
							?>
								</td>
							<td>
							<div class="d-flex">
								<a href="" class="btn btn-sm btn-primary mx-1">Ubah </a>
								<a href="" class="btn btn-sm btn-danger mx-1">Hapus </a>
							</div>
							</td>
						</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
			
		</div>
	</div>
