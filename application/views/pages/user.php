<!-- Form untuk tambah user -->
<div class="row mb-4">
	<div class="col-md-6">
		<form method="post" action="<?php echo site_url('main/tambahUser'); ?>">
			<!-- Field untuk nama, email, password, dll. -->
			<input class="form-control mb-2" type="text" name="username" placeholder="Username" required>
			<input class="form-control mb-2" type="email" name="email" placeholder="Email" required>
			<input class="form-control mb-2" type="password" name="password" placeholder="Password" required>
			<!-- Dropdown untuk memilih peran -->
			<select name="role" class="form-control mb-2">
				<?php foreach ($role as $dd) : ?>
					<option value="<?php echo $dd['id_role'] ?>"><?php echo $dd['descriptiom'] ?></option>
					<?php endforeach; ?>
				</select>
				<button type="submit" class="btn btn-primary">Tambah User</button>
			</form>
		</div>
	</div>
	<h4>List User</h4>
	<div class="row">
		<div class="col-md-6">
			<div
				class="table-responsive"
			>
				<table
					class="table table-border"
				>
					<thead>
						<tr>
							<th>No.</th>
							<th scope="col">username</th>
							<th scope="col">role</th>
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
