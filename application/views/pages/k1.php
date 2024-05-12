<!-- Button trigger modal -->
<button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#uploadModal">
  Unggah File
</button>

<!-- Modal -->
<div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="uploadModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="uploadModalLabel">Unggah File dan Catatan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Form untuk unggah file dan catatan -->
        <form action="<?php echo base_url('main/upload_coastings'); ?>" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="file">Pilih File</label>
            <input type="file" class="form-control" id="file" name="file" required>
          </div>
          <div class="form-group">
            <label for="note">Catatan</label>
            <textarea class="form-control" id="note" name="note" rows="3"></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Unggah</button>
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
				<!-- <a class="btn btn-light btn-sm" href="<?php echo base_url('main/approval_upload/'.$files['id']); ?>">Approve</a>
				<a class="btn btn-light btn-sm" href="<?php echo base_url('main/reject_upload/'.$files['id']); ?>">Reject</a> -->
			</td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>