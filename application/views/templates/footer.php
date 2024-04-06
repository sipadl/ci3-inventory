			</div>
        <!-- /.row -->
		</div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.0.4
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?php echo base_url('plugins/jquery/jquery.min.js') ?>"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url('plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<!-- AdminLTE -->
<script src="<?php echo base_url('dist/js/adminlte.js') ?>"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="<?php echo base_url('plugins/chart.js/Chart.min.js') ?>"></script>
<script src="<?php echo base_url('dist/js/demo.js') ?>"></script>
<script src="<?php echo base_url('dist/js/pages/dashboard3.js') ?>"></script>
<script>
	function addDaging() {
		const dagingCountP = $('.daging-putih').length;
		const dagingCountM = $('.daging-putih').length;
		$('.isi').append(`
		<div class="daging-putih">
			<h5>Daging Putih</h5>
			<hr>
			<div class="row">
				<div class="col-md-3 col-sm-12">
					<div class="form-group">
					<label for="tanggal">Speck:</label>
					<input type="text" class="form-control" id="spekDagingPutih${dagingCountP}">
					</div>
				</div>
				<div class="col-md-3 col-sm-12">
					<div class="form-group">
						<label for="supplier">Bungkus:</label>
						<input type="text" class="form-control" id="bungkusDagingPutih${dagingCountP}">
					</div>
				</div>
				<div class="col-md-3 col-sm-12">
					<div class="form-group">
					<label for="dagingMerah">T.Kotor:</label>
					<input type="text" class="form-control" id="tkotorDagingPutih${dagingCountP}">
					</div>
				</div>
				<div class="col-md-3 col-sm-12">
					<div class="form-group">
					<label for="dagingMerah">T.Bersih:</label>
					<input type="text" class="form-control" id="tbersihDagingPutih${dagingCountP}">
					</div>
				</div>
			</div>
			</div>
			<div class="daging-merah">
			<h5>Daging Merah</h5>
			<hr>
			<div class="row">
				<div class="col-md-3 col-sm-12">
					<div class="form-group">
					<label for="">Speck:</label>
					<input type="text" class="form-control" id="spekDagingMerah${dagingCountM}">
					</div>
				</div>
				<div class="col-md-3 col-sm-12">
					<div class="form-group">
						<label for="supplier">Bungkus:</label>
						<input type="text" class="form-control" id="bungkusDagingMerah${dagingCountM}">
					</div>
				</div>
				<div class="col-md-3 col-sm-12">
					<div class="form-group">
					<label for="dagingMerah">T.Kotor:</label>
					<input type="text" class="form-control" id="tkotorDagingMerah${dagingCountM}">
					</div>
				</div>
				<div class="col-md-3 col-sm-12">
					<div class="form-group">
					<label for="dagingMerah">T.Bersih:</label>
					<input type="text" class="form-control" id="tbersihDagingMerah${dagingCountM}">
					</div>
				</div>
			</div>
		</div>`)
	}

	function kirimData() {
    var tanggal = document.getElementById("tanggal").value;
    var supplier = document.getElementById("supplier").value;
    var spesifikasi = document.getElementById("spesifikasi").value;
    var qty = document.getElementById("qty").value;

    var dataDagingP = [];
    var dataDagingM = [];
    var dagingPElements = document.getElementsByClassName("daging-putih");
    var dagingMElements = document.getElementsByClassName("daging-merah");
    for (var i = 0; i < dagingPElements.length; i++) {
        var spek = document.getElementById("spekDagingPutih" + i).value;
        var bungkus = document.getElementById("bungkusDagingPutih" + i).value;
        var tkotor = document.getElementById("tkotorDagingPutih" + i).value;
        var tbersih = document.getElementById("tbersihDagingPutih" + i).value;
        dataDagingP.push({
            spek: spek,
            bungkus: bungkus,
            tkotor: tkotor,
            tbersih: tbersih
        });
    }
    for (var i = 0; i < dagingMElements.length; i++) {
        var spek = document.getElementById("spekDagingMerah" + i).value;
        var bungkus = document.getElementById("bungkusDagingMerah" + i).value;
        var tkotor = document.getElementById("tkotorDagingMerah" + i).value;
        var tbersih = document.getElementById("tbersihDagingMerah" + i).value;
        dataDagingM.push({
            spek: spek,
            bungkus: bungkus,
            tkotor: tkotor,
            tbersih: tbersih
        });
    }

    // Data lengkap yang akan dikirim
    var data = {
        tanggal: tanggal,
        supplier: supplier,
		spesifikasi: spesifikasi,
        dagingPutih: JSON.stringify(dataDagingP),
        dagingMerah: JSON.stringify(dataDagingM),
        qty: qty,
    };

    // Kirim data menggunakan AJAX atau lakukan operasi lainnya di sini
	$.post("<?php echo base_url('/main/tambahDaging'); ?>", data,
		function (res, textStatus, jqXHR) {
			console.log(textStatus);
			if(jqXHR == 200){
				location.reload()
			}
		},
		"json"
	);
}
</script>
</body>
</html>
