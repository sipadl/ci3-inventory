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
<script src="//cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js"></script>


<script>
function ApprovalPengajuan(val,status) {
	$('#form-approval').attr('action',  '<?php echo base_url('main/approve_memo_dp/'); ?>' + val + '/' + status);
    $('#form-approval').submit(); // Submit the form

}


$('.generateId').on('change', (event) => {
	console.log(event.target.value); // ini adalah nilai id yang dipilih
    $.get(`<?php echo base_url('/main/get_supplier/') ?>${event.target.value}`, {},
		function (data, textStatus, jqXHR) {
			$('#supp_area').val(data.nama_area);
			$('#supp_bank').val(data.bank);
			$('#supp_no_rek').val(data.no_rekening);
		},
		"json"
	);
});

function SimpanSortir(event, val) {
    var form = $('#sortires'); // Assuming #sortires is the ID of your form
    if (val === true) {
        form.attr('action', '<?php echo base_url('main/fullsortirPost') ?>');
    } else {
        form.attr('action', '<?php echo base_url('main/sortirPost') ?>');
    }
    form.submit(); // Submit the form
}

function SimpanSortirUpdateCoasting(event, val, id, status) {
    var form = $('#sortiresUpdate'); // Assuming #sortires is the ID of your form
    if (val === true) {
        form.attr('action', '<?php echo base_url('main/sortirUpdateSimpan/') ?>' + id + '/' + status);
    } else {
        form.attr('action', '<?php echo base_url('main/sortirUpdate/') ?>' + id + '/' + status);
    }
    form.submit(); // Submit the form
}


function exportToExcel() {
    $("#myTablePrintAble").table2excel({
    // exclude: ".excludeThisClass",
    name: "laporan_root",
    filename: "laporan_root.xls", // do include extension
    preserveColors: false // set to true if you want background colors and font colors preserved
});
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
    $('#myTable4').DataTable();
  });

  $(document).ready(function() {
	var totalSum = 0;
	$('.total_laba').each(function() {
		var value = parseFloat($(this).text().replaceAll(',' , '')); // Get the value of the cell and convert it to a float
		totalSum += value; // Add the value to the totalSum
	});
	$('#laba_rugi').html(totalSum);

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
  $('#basic-multipleEdit').select2({
	width:'100%'
  });
  $('#basic-multipleEdit2').select2({
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

	function addDaging(status, index = 0) {
    const dagingCount = $('.dagings').length;
    const id = `${dagingCount}`;
    const jenisDaging = index === 0 ? 'Daging Putih' : 'Daging Merah';

    if (dagingCount > 0) {
        $('.remove-daging-btn').show();
    }

    $('.isi').append(`
        <div class="dagings" id="${id}">
            <div class="daging-putih">
                <h5>${jenisDaging}</h5>
                <hr>
                <div class="row">
                    <input type="hidden" id="tipe${dagingCount}" value="${index}">
                    <div class="col-md-3 col-sm-12">
                        <div class="form-group">
                            <label for="speck">Speck:</label>
                            <input type="text" class="form-control" id="spek${id}">
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <div class="form-group">
                            <label for="bungkus">Bungkus:</label>
                            <input type="text" class="form-control" id="bungkus${id}">
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <div class="form-group">
                            <label for="tkotor">T.Kotor:</label>
                            <input type="text" class="form-control" id="tkotor${id}">
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <div class="form-group">
                            <label for="tbersih">T.Bersih:</label>
                            <input type="text" class="form-control" id="tbersih${id}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end">
                ${index !== 0 ? `
                    <button type="button" class="remove-daging-btn btn btn-sm mx-2 px-3 btn-danger text-right" onclick="removeDaging('${id}')" style="display: none;">X</button>
                ` : ''}
            </div>
        </div>
    `);
}

	function removeDaging(id) {
    $('#' + id).remove();
	}

	function kirimData() {
    var tanggal = document.getElementById("tanggal").value;
    var supplier = document.getElementById("supplier").value;
    var qty = 0;

    var dataDagingP = [];
    var dataDagingM = [];
	var spesifikasi_bahan = [];
    var dagingPElements = document.getElementsByClassName("daging-putih");
    var dagingMElements = document.getElementsByClassName("daging-merah");
    for (var i = 0; i < dagingPElements.length; i++) {
		console.log(dagingPElements)
		var spesifikasi_bahan = '';
		var spek = '';
		var bungkus = '';
		var tkotor = '';
		var tbersih = '';
		var tipe = '';

		if (document.getElementById("spec_bahan" + i)) {
			spesifikasi_bahan = document.getElementById("spec_bahan" + i).value || '';
		}
		if (document.getElementById("spek" + i)) {
			spek = document.getElementById("spek" + i).value || '';
		}
		if (document.getElementById("bungkus" + i)) {
			bungkus = document.getElementById("bungkus" + i).value || '';
		}
		if (document.getElementById("tkotor" + i)) {
			tkotor = document.getElementById("tkotor" + i).value || '';
		}
		if (document.getElementById("tbersih" + i)) {
			tbersih = document.getElementById("tbersih" + i).value || '';
		}
		if (document.getElementById("tipe" + i)) {
			tipe = document.getElementById("tipe" + i).value || '';
		}

        dataDagingP.push({
			spesifikasi_bahan: spesifikasi_bahan,
            spek: spek,
            bungkus: bungkus,
            tkotor: tkotor,
            tbersih: tbersih,
			tipe: tipe
        });
    }

    // Data lengkap yang akan dikirim
    var data = {
        tanggal: tanggal,
        supplier: supplier,
		spesifikasi: null,
        dagingPutih: JSON.stringify(dataDagingP),
        dagingMerah: JSON.stringify(dataDagingM),
        qty: qty,
    };

    // Kirim data menggunakan AJAX atau lakukan operasi lainnya di sini
	$.post("<?php echo base_url('/main/tambahDaging'); ?>", data,
		function (res, textStatus, jqXHR) {
			console.log(textStatus);
			if(textStatus == 'success'){
				window.location.reload();
			}

		},
		"json"
	);
}

function EditKocak ( url, selector ){
	var form = $(`#${selector}`); // Assuming #sortires is the ID of your form
	form.attr('action', url);
    form.submit(); // Submit the form
}

</script>
</body>
</html>
