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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Bootstrap -->
<script src="<?php echo base_url('plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<!-- AdminLTE -->
<script src="<?php echo base_url('dist/js/adminlte.js') ?>"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="<?php echo base_url('plugins/chart.js/Chart.min.js') ?>"></script>
<script src="<?php echo base_url('dist/js/demo.js') ?>"></script>
<script src="<?php echo base_url('dist/js/pages/dashboard3.js') ?>"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>


<script>
function SimpanSortir(event, val) {
    var form = $('#sortires'); // Assuming #sortires is the ID of your form
    if (val === true) {
        form.attr('action', '<?php echo base_url('main/fullsortirPost') ?>');
    } else {
        form.attr('action', '<?php echo base_url('main/sortirPost') ?>');
    }
    form.submit(); // Submit the form
}

function isiId(val){
	$('#getId').html('');
	$('#getId').val(val);
}
function printDisini(val) {
    var prtContent = document.getElementById(`modal-print-${val}`);
    console.log(prtContent);
    var WinPrint = window.open('', '', 'left=0,top=10,width=800,height=800,toolbar=0,scrollbars=0,status=0');
    WinPrint.document.write('<html><head><title>Print</title>');
    // Tambahkan referensi ke file CSS Bootstrap di sini
    WinPrint.document.write('<link rel="stylesheet" href="<?php echo base_url('dist/css/adminlte.min.css') ?>">');
    WinPrint.document.write('</head><body><div class="container mt-4">')
    WinPrint.document.write(prtContent.innerHTML);
    WinPrint.document.write('</div></body></html>');
    WinPrint.document.close();
    WinPrint.focus();
    WinPrint.print();
    WinPrint.close();
}


  $(document).ready(function () {
    $('#myTable').DataTable();
    $('#myTable2').DataTable();
    $('#myTable3').DataTable();
  });

  $(document).ready(function() {
	const detailSortir = $('#hehep');
	const x = detailSortir.children();
	console.log(x)
  $('#basic-multiple').select2({
	width:'100%'
  });
  $('#basic-multiple1').select2({
	width:'100%'
  });
  $('#basic-multiple2').select2({
	width:'100%'
  });
});
</script>
<script>
	$('.isiWilayah').change(function() {
		console.log($(this).val());
	})
	$('.kodeWilayah').change(function() {
		const url = "<?php echo base_url() ?>";
		const id = $(this).val();
		$.get(`${url}main/getWilayahById/${id}` , {},
			function (data, textStatus, jqXHR) {
				if(data.length > 0){
					$('.innerDropdown').html();
					$('.innerDropdown').append(`
						<div class="form-group">
							<div class="col-md-12">
								<label for="area">Pilih Area</label><br>
							</div>
							<select name="wilayah[]" class="form-control col-md-12 isiWilayah" multiple="multiple" id="basic-multiple1">
								<option value="0">Pilih Area</option>
								${data.map(val => `
									<option value="${val.id_kota}">${val.nama_kota}</option>
								`).join('')}
							</select>
						</div>
					`);
				}
				$('#basic-multiple1').select2({
					width:'100%'
				});
			},
			"json"
		);
	})

	function addDaging() {
		const dagingCountP = $('.daging-putih').length;
		const dagingCountM = $('.daging-putih').length;
		const idP = `dagingPutih${dagingCountP}`;
    	const idM = `dagingMerah${dagingCountM}`;

		const dagingCount = $('.dagings').length;

		if (dagingCount > 0) {
        $('.remove-daging-btn').show();
    	}

	
		$('.isi').append(`
		<div class="dagings" id="${dagingCount}">
		
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
		</div>
		<div class="d-flex justify-content-end">
		<button type="button" class="remove-daging-btn btn btn-sm mx-2 px-2 btn-danger text-right" onclick="removeDaging(${dagingCount})" style="display: none;">X</button>
		</div>
        </div>
		`)
	}

	function removeDaging(id) {
    $('#' + id).remove();
	}

	function kirimData() {
    var tanggal = document.getElementById("tanggal").value;
    var supplier = document.getElementById("supplier").value;
    var spesifikasi = document.getElementById("spesifikasi").value;
    var qty = 0;

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
			// if(jqXHR == 200){
				console.log(res);
				window.location.reload(true);

			// }
		},
		"json"
	);
	window.location.reload()
}

</script>
</body>
</html>
