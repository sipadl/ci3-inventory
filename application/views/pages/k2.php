<?php 
// Check if flash data exists
if ($this->session->flashdata('success')) {
// If it does, display a success message
echo '<div class="alert alert-success my-2">' . $this->session->flashdata('success') . '</div>';
}
?>
<table class="table table-striped table-bordered table-hover" id="myTable6">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama File</th>
			<th>Note</th>
			<th>Status</th>
			<th>Tanggal</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($file as $key => $files): ?>
			<tr>
				<td><?php echo $key + 1; ?></td>
				<td><?php echo $files['file']; ?></td>
				<td><?php echo $files['note']; ?></td>
				<td><?php echo $files['status'] == 1 ? 'Accept' : ($files['status'] == -1 ? 'Reject' : 'Pending') ?></td>
				<td><?php echo $files['created_at']; ?></td>
				<td><a class="btn btn-light btn-sm" href="<?php echo base_url('main/download/'.$files['id']); ?>">Download</a>
				<a class="btn btn-primary btn-sm" href="<?php echo base_url('main/approval_upload/'.$files['id']); ?>">Approve</a>
				<a class="btn btn-danger btn-sm" href="<?php echo base_url('main/reject_upload/'.$files['id']); ?>">Reject</a>
			</td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>
