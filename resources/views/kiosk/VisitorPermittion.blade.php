<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>VMS</title>
	<link rel="stylesheet" href="css/styles.css">
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	
@vite(['resources/js/app.js'])
</head>

<body>

	<div class="wrapper">
		<div class="header">
			<p>VISITOR MANAGEMENT SYSTEM E-KIOSK</p>
		</div>
		<br>
		<div class="container">
			<div class="col-md-9 mt-3">

				<div class="card-body">

					<h5><strong>Silahkan mengisi Form Terlampir untuk membuat permohonan izin masuk di Kawasan PT. Panasonic Industrial Device Batam</strong></h5><br><br>
					<input type="hidden" class="form-control" name="id" id="id">
					<div class="mb-3 row">
						<label for="Company name" class="col-sm-3 col-form-label">
							<h5><strong>Nama Perusahaan</strong></h5>
						</label>
						<div class="col-sm-7">
							<select class="form-select" aria-label="Default select example" name="nameVendor" id="nameVendor">
								<option disable selected></option>
								<option value=""></option>
							</select>
						</div>
					</div>

					<div class="mb-3 row">
						<label for="Purpose" class="col-sm-3 col-form-label">
							<h5><strong>Tujuan Berkunjung</strong></h5>
						</label>
						<div class="col-sm-7">
							<select class="form-select purpose " aria-label="Default select example" name="purpose" id="mySelect" onchange="myFunction(this)">
								<option value="WORKING">WORKING</option>
								<option value="MEETING">MEETING</option>
								<option value="SUPPLY">SUPPLY</option>
								<option value="RECRUITMENT PROCESS">RECRUITMENT PROCESS</option>
								<option value="VISIT">VISIT</option>
							</select>
						</div>
					</div>

					<div id="demo">
						<!-- <div class="mb-3 row">
						<label for="Purpose" class="col-sm-3 col-form-label">
							<h5><strong>Working Type</strong></h5>
						</label>
						<div class="col-sm-7">
							<select class="form-select purpose " aria-label="Default select example" name="purpose" id="mySelect" onchange="myFunction(this)">
								<option value="">Please Select</option>
								<option value="Working Without Permit">Working Without Permit</option>
								<option value="Working With Permit">Working With Permit</option>	
							</select>
						</div>
					</div> -->
						<div class="mb-3 row">
							<label for="Anggota" class="col-sm-3 col-form-label">
								<h5><strong>Permit No</strong></h5>
							</label>
							<div class="col-sm-7">
								<input type="text" class="form-control" name="permitNo" id="permitNo" value="Pekerjaan Tidak Memerlukan Permit (Service)">
							</div>
						</div>

						<div class="mb-3 row">
							<label for="Anggota" class="col-sm-3 col-form-label">
								<h5><strong>Deskripsi Pekerjaan</strong></h5>
							</label>
							<div class="col-sm-7">
								<textarea type="text" class="form-control" name="desk" id="desk">METHOD KERJA:</textarea>
							</div>
						</div>
					</div>



					<div class="mb-3 row">
						<div class="col-md-3">
							<label for="inputEmail4" class="form-label">
								<h5><strong>Time From</strong></h5>
							</label>
							<input type="time" class="form-control" value="{{ date('H:i') }}" id="startTime" name="startTime">
						</div>
						<div class="col-md-3">
							<label for="inputPassword4" class="form-label">
								<h5><strong>Time to</strong></h5>
							</label>
							<input type="time" class="form-control" value="{{ date('H:i') }}" id="endTime" name="endTime">
						</div>
					</div>
					<br>

					<div id="demo2" class="d-none">
					<div class="mb-3 row">
							<label for="Anggota" class="col-sm-3 col-form-label">
								<h5><strong>Location</strong></h5>
							</label>
							<div class="col-sm-7">
								<input type="text" class="form-control" name="nameLocation" id="nameLocation" value="LOGISTIC">
							</div>
						</div>
						<div class="card">
							<div class="card-body">
								<div class="row">
									<div class="col-md-12">
										<div class="table-responsive">
											<table class="table table-hover">
												<thead class="alert alert-secondary">
													<th>Item Description</th>
													<th>Quantity</th>
													<th>Unit</th>
													<th>Action</th>
												</thead>
												<tbody id="table_media">
													<tr>
														<td>
															<input type="text" class="form-control" name="itemDescription" id="itemDescription">
														</td>
														<td>
															<input type="number" name="quantity[]" class="form-control">
														</td>
														<td>
															<select name="unit[]" class="form-select form-select-md">
																<option value="PCS">PCS</option>
																<option value="UNIT">UNIT</option>
																<option value="SET">SET</option>
																<option value="KG">KG</option>
																<option value="MTR">MTR</option>
															</select>
														</td>

														<td>
															<button onclick="tambahmedia_row(this)" type="button" class="btn btn-success btn-sm">Tambah Item+</button>

														</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<br>

					<div class="card">
						<div class="card-body">
							<h4><strong>Masukkan Nama Pengunjung</h4></strong>
							<div class="row">
								<div class="col-md-12">
									<div class="table-responsive">
										<table class="table table-hover">
											<thead class="alert alert-secondary">
												<th>Nama</th>
												<th>Jabatan</th>
												<th>NIK</th>
												<th>Action</th>
											</thead>
											<tbody id="table_data1">
												<tr>
													<td>
														<input type="text" class="form-control" name="namaVisitor1" id="namaVisitor1">
													</td>
													<td>
														<input type="text" class="form-control" name="jabatan1" id="jabatan1">
													</td>
													<td>
														<input type="text" class="form-control" name="nik1" id="nik1">
													</td>
													<td>

														<button onclick="tambah_row(this)" type="button" class="btn btn-success btn-sm">Tambah Anggota+
														</button>
													</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div><br>

					<div class="mb-3 row">
						<label for="Anggota" class="col-sm-3 col-form-label">
							<h5><strong>Email Anda</strong></h5>
						</label>
						<div class="col-sm-7">
							<input type="text" class="form-control" name="email" id="email">
						</div>
					</div>

					<div class="mb-3 row">
						<label for="Host" class="col-sm-3 col-form-label">
							<h5><strong>Host Anda</strong></h5>
						</label>
						<div class="col-sm-7">
							<select class="form-select" aria-label="Default select example" name="name" id="name">
								<option selected>- Select one -</option>
							</select>
						</div>
					</div>


					<div class="mb-3 row">
						<label for="Purpose" class="col-sm-3 col-form-label">
							<strong>Recordable Media</strong>
						</label>
						<div class="col-sm-7">
							<select class="form-select bawaBarang " aria-label="Default select example" name="bawaBarang" id="Select" onchange="text(this)">
								<option value="YA">YA</option>
								<option value="TIDAK">TIDAK</option>
							</select>
						</div>
					</div>

					<div class="card" id="mycode">
						<div class="card-body">
							<div class="row">
								<div class="col-md-12">
									<div class="table-responsive">
										<table class="table table-hover">
											<thead class="alert alert-secondary">
												<th>Nama Pemilik</th>
												<th>NIK</th>
												<th>Serial Number</th>
												<th>Controlled Items</th>
												<th>Tujuan</th>
												<th>Action</th>
											</thead>
											<tbody id="table_data2">
												<tr>
													<td>
														<input type="text" class="form-control" name="namaPemilik1" id="namaPemilik1">
													</td>
													<td>
														<input type="text" class="form-control" name="nik1" id="nik1">
													</td>
													<td>
														<input type="text" class="form-control" name="SN1" id="SN1">
													</td>
													<td>
														<select class="form-select" aria-label="Default select example" name="jenisMedia1" id="jenisMedia1">
															<option value="Personal Computer / Laptop">Personal Computer / Laptop</option>
															<option value="Camera (Digital or analogue)">Camera (Digital or analogue) </option>
															<option value="Mobilephone with camera / video">Mobilephone with camera / video</option>
															<option value="Digital Video Recorder">Digital Video Recorder</option>
															<option value="Thumdrive / pendrive storage unit">Thumdrive / pendrive storage unit</option>
															<option value="Memory Cards (SD/CF/MMC .etc)">Memory Cards (SD/CF/MMC .etc)</option>
															<option value="Audio Tape Recorder">Audio Tape Recorder</option>
															<option value="CDRW / CDR / HDD">CDRW / CDR / HDD</option>
															<option value="Others (pls states)">Others (pls states)</option>
														</select>
													</td>
													<td>
														<input type="text" class="form-control" name="tujuan1" id="tujuan1">
													</td>
													<td>
														<button onclick="tambahhh_row(this)" type="button" class="btn btn-success btn-sm">Tambah Media+
														</button>
													</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<input type="hidden" class="form-control" name="status" id="status" value="waitingadmin">

				<div class="d-grid gap-2 d-md-flex justify-content-md-end">
					<a class="btn btn-primary btn-lg" href="search" role="button ">Back</a>
					<a class="btn btn-primary btn-lg" id="btnSave" role="button">Submit</a>
				</div>
				<br>
			</div>
		</div>
	</div>
	</div>
	</div>
	</div>
	</div>

	<script type="text/javascript">
		// Ajax Setup Auth
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});


		// Load Vendor
		$.ajax({
			url: "select/vendor",
			method: "GET",
			async: true,
			dataType: 'json',
			success: function(data) {
				var html = '';
				var i;
				for (i = 0; i < data.data.length; i++) {
					html += '<option value="' + data.data[i].nameVendor + '">' + data.data[i].nameVendor + '</option>';
				}
				$('#nameVendor').html(html);

			}
		})

		// Load Host
		$.ajax({
			url: "select/user",
			method: "GET",
			async: true,
			dataType: 'json',
			success: function(data) {
				var html = '';
				var i;
				for (i = 0; i < data.data.length; i++) {
					html += '<option value="' + data.data[i].name + '">' + data.data[i].name + '</option>';
				}
				$('#name').html(html);

			}
		})


		// Load Tipe
		$.ajax({
			url: "select/type",
			method: "GET",
			async: true,
			dataType: 'json',
			success: function(data) {
				var html = '';
				var i;
				for (i = 0; i < data.data.length; i++) {
					html += '<option value="' + data.data[i].nameType + '">' + data.data[i].nameType + '</option>';
				}
				$('#nameType').html(html);

			}
		})

		function tambah_row(btn) {

			let total_row = $("#table_data1 tr").length
			total_row = total_row + 1

			let html = '';
			html += '	<tr><td><input type="text" class="form-control" name="namaVisitor' + total_row + '" id="namaVisitor' + total_row + '"></td>';
			html += '	<td><input type="text" class="form-control" name="jabatan' + total_row + '" id="jabatan' + total_row + '"></td>';
			html += '	<td><input type="text" class="form-control" name="nik' + total_row + '" id="nik' + total_row + '"></td>';
			html += '	<td><button onclick="hapus_row(this)" type="button" class="btn btn-danger btn-sm">Hapus</i></button></td>';
			html += '	</tr>';

			$("#table_data1").append(html)
		}

		function hapus_row(btn) {
			$(btn).closest('tr').remove()
			let row_number = 0
			$('.no').each(function() {
				$(this).text(row_number + 1)
				row_number++
			})
		}

		function tambahhh_row(btn) {

			let total_row = $("#table_data2 tr").length
			total_row = total_row + 1

			let html = '';
			html += '<tr><td><input type="text" class="form-control" name="namaPemilik' + total_row + '" id="namaPemilik' + total_row + '"></td>';
			html += '<td><input type="text" class="form-control" name="nik' + total_row + '" id="nik ' + total_row + '"></td>';
			html += '<td><input type="text" class="form-control ' + total_row + '" name="SN" id="SN ' + total_row + '"></td>';
			html += '<td><select class="form-select" aria-label="Default select example" name="jenisMedia ' + total_row + '" id="jenisMedia ' + total_row + '">';
			html += '<option value="Personal Computer / Laptop">Personal Computer / Laptop</option>';
			html += '<option value="Camera (Digital or analogue)">Camera (Digital or analogue) </option>';
			html += '<option value="Mobilephone with camera / video">Mobilephone with camera / video</option>';
			html += '<option value="Digital Video Recorder">Digital Video Recorder</option>';
			html += '<option value="Thumdrive / pendrive storage unit">Thumdrive / pendrive storage unit</option>';
			html += '<option value="Memory Cards (SD/CF/MMC .etc)">Memory Cards (SD/CF/MMC .etc)</option>';
			html += '<option value="Audio Tape Recorder">Audio Tape Recorder</option>';
			html += '<option value="CDRW / CDR / HDD">CDRW / CDR / HDD</option>';
			html += '<option value="Others (pls states)">Others (pls states)</option></select></td>';
			html += '<td><input type="text" class="form-control" name="tujuan" id="tujuan ' + total_row + '"></td>';
			html += '	<td><button onclick="delete_row(this)" type="button" class="btn btn-danger btn-sm">Hapus</i></button></td>';
			html += '</tr>';

			console.log(html)
			$("#table_data2").append(html)
		}

		function tambahmedia_row(btn) {

			let total_row = $("#table_media tr").length
			total_row = total_row + 1
			let html = '';
			html += '<tr><td><input type="text" class="form-control" name="itemDescription ' + total_row + '" id="itemDescription ' + total_row + '"></td>';
			html += '<td><input type="number" name="quantity ' + total_row + '" id="quantity ' + total_row + '" class="form-control"></td>';
			html += '<td><select name="unit ' + total_row + '" id="unit ' + total_row + '" class="form-select form-select-md"><option value="PCS">PCS</option>';
			html += '<option value="UNIT">UNIT</option>';
			html += '<option value="SET">SET</option>';
			html += '<option value="KG">KG</option>';
			html += '<option value="MTR">MTR</option></select></td>';
			html += '<td><button onclick="deletee_row(this)" type="button" class="btn btn-danger btn-sm">Hapus</i></button></td></tr>';
			

			$("#table_media").append(html)
		}

		function deletee_row(btn) {
			$(btn).closest('tr').remove()
			let row_number = 0
			$('.no').each(function() {
				$(this).text(row_number + 1)
				row_number++
			})
		}

		function clear_input(btn) {
			$(btn).closest('tr').find('input, select').val('')
		}



		function text(x) {
			var x = document.getElementById("Select").value;
			if (x == "YA") document.getElementById("mycode").style.display = "block";
			else document.getElementById("mycode").style.display = "none";
			return;
		}

		// Save Record
		$("#btnSave").click(function(e) {
			e.preventDefault();
			let total_row = $("#table_data1 tr").length
			var arrAnggota = [];
			var i = 1;
			total_row
			while (i <= total_row) {
				arrAnggota.push({
					Nama: $("#namaVisitor" + i).val(),
					Jabatan: $("#jabatan" + i).val(),
					NIK: $("#nik" + i).val(),
				});
				i++;
			}

			let total2_row = $("#table_data tr").length
			var arrbarangBawaan = [];
			var i = 1;
			total_row
			while (i <= total_row) {
				arrbarangBawaan.push({
					NamaPemilik: $("#namaPemilik" + i).val(),
					NIK: $("#nik" + i).val(),
					SN: $("#SN" + i).val(),
					JenisMedia: $("#jenisMedia" + i).val(),
					Tujuan: $("#tujuan" + i).val(),

				});
				i++;
			}

			let total3_row = $("#table_media tr").length
			var arrsupplyBarang = [];
			var i = 1;
			total_row
			while (i <= total_row) {
				arrsupplyBarang.push({
					["Item Description"]: $("#itemDescription" + i).val(),
					Quantity: $("#quantity" + i).val(),
					Unit: $("#unit" + i).val(),

				});
				i++;
			}

			var formData = {
				id: $('#id').val(),
				nameVendor: $('#nameVendor').val(),
				nameType: $('#nameType').val(),
				supplyBarang: arrsupplyBarang,
				purpose: $('.purpose').val(),
				startTime: $('#startTime').val(),
				endTime: $('#endTime').val(),
				permitNo: $('#permitNo').val(),
				desk: $('#desk').val(),
				//namaVisitor: $('#namaVisitor').val(),
				//jabatan: $('#jabatan').val(),
				//nik: $('#nik').val(),
				email: $('#email').val(),
				name: $('#name').val(),
				bawaBarang: $('#bawaBarang').val(),
				barangBawaan: arrbarangBawaan,
				/* namaVisitor: $('#namaVisitor').val(),
				nik: $('#nik').val(),
				SN: $('#SN').val(),
				jenisMedia: $('#jenisMedia').val(),
				tujuan: $('#tujuan').val(), */
				anggota: arrAnggota

			};

			$.ajax({
				type: "PUT",
				url: "VisitorPermittion/storePermittion",
				data: formData,
				dataType: 'json',
				success: function(data) {
					Swal.fire({
						title: "Success!",
						text: "You clicked the button!",
						icon: "success",
						button: "OK!",
						timer: 3000
					});
					setTimeout(() => {
						location.reload()
					}, 2000);
					console.log(data);
					/* table.clear();
					table.ajax.reload();
					table.draw(); */
					$(`input[type="text"]`).val('')
					$(`select`).val('')
					$(`input[type="radio"]`).val('').removeAttr('checked')
				},
				error: function(data) {
					console.log(data);
				}
			});
		});

		function myFunction(x) {

			var x = document.getElementById("mySelect").value;



			if (x == "WORKING") {
				document.getElementById("demo").style.display = "block";
			} else if (x == "SUPPLY" || x == "MEETING" || x == "RECRUITMENT PROCESS" || x == "VISIT") {
				document.getElementById("demo").style.display = "none"; //show display
			} else if (x == "SUPPLY") {
				document.getElementById("demo2").style.display = "block";
			} else document.getElementById("demo2").style.display = "none";
			/* else if (x == "SUPPLY") document.getElementById("demo2").style.display = "block";
			else document.getElementById("demo2").style.display = "none"; */

			if (x === "SUPPLY") {
				$('#demo2').removeClass('d-none')
			} else {
				$('#demo2').addClass('d-none')
			}


			return;
		}
	</script>
</body>

</html>