<!-- Form untuk tambah user -->
<div class="row">
		<div class="col-md-12">
			<?php 
			// Check if flash data exists
			if ($this->session->flashdata('success')) {
			// If it does, display a success message
			echo '<div class="alert alert-success my-2">' . $this->session->flashdata('success') . '</div>';
			}
			?>
			
            Selamat datang, <?= user()['username'] ?>!
			
		</div>
	</div>
