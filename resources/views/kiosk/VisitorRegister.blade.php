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
	<meta name="csrf-token" content="{{ csrf_token() }}">

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


				<h5><strong>Silahkan mengisi Formulir registrasi berikut untuk meregistrasi karyawan anda.</strong></h5><br><br>
				<input type="hidden" class="form-control" name="id" id="id">
				<div class="mb-3 row">
					<label for="Company name" class="col-sm-3 col-form-label">
						<h5>Nama Perusahaan &nbsp;<span class="text-danger">*</span></h5>
					</label>
					<div class="col-sm-7">
						<select class="form-select" aria-label="Default select example" name="nameVendor" id="nameVendor">
							<option disable selected></option>
							<option value=""></option>
						</select>
					</div>
				</div>

				<div class="mb-3 row">
					<label for="Company name" class="col-sm-3 col-form-label">
						<h5>Asal Perusahaan &nbsp;<span class="text-danger">*</span></h5>
					</label>
					<div class="col-sm-7">
						<select class="form-select" aria-label="Default select example" name="asalVendor" id="asalVendor">
							<option value="Batam">Batam</option>
							<option value="Jakarta">Jakarta</option>
							<option value="Singapore">Singapore</option>
						</select>
					</div>
				</div>

				<div class="mb-3 row">
					<label for="Anggota" class="col-sm-3 col-form-label">
						<h5>Email Anda &nbsp;<span class="text-danger">*</span></h5>
					</label>
					<div class="col-sm-7">
						<input type="text" class="form-control" name="email" id="email" required>
					</div>
				</div>

				<div class="mb-3 row">
					<label for="Anggota" class="col-sm-3 col-form-label">
						<h5>Nama Pengunjung &nbsp;<span class="text-danger">*</span></h5>
					</label>
					<div class="col-sm-7">
						<input type="text" class="form-control" name="namaVisitor" id="namaVisitor" required>
					</div>
				</div>

				<div class="mb-3 row">
					<label for="Anggota" class="col-sm-3 col-form-label">
						<h5>NIK &nbsp;<span class="text-danger">*</span></h5>
					</label>
					<div class="col-sm-7">
						<input type="text" class="form-control" name="nik" id="nik" required>
					</div>
				</div>

				<div class="mb-3 row">
					<label for="Company name" class="col-sm-3 col-form-label">
						<h5>Gender</h5>
					</label>
					<div class="col-sm-7">
						<select class="form-select" aria-label="Default select example" name="gender" id="gender">
							<option value="Laki-Laki">Laki-Laki</option>
							<option value="Perempuan">Perempuan</option>
						</select>
					</div>
				</div>

				<div class="mb-3 row">
					<label for="Anggota" class="col-sm-3 col-form-label">
						<h5>Jabatan &nbsp;<span class="text-danger">*</span></h5>
					</label>
					<div class="col-sm-7">
						<input type="text" class="form-control" name="jabatan" id="jabatan" required>
					</div>
				</div>

				 <div class="mb-3 row">
					<label for="Anggota" class="col-sm-3 col-form-label">
						<h5>Take Photo</h5>
					</label>
					<div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
					<img id="photo" name="photo" src="" width="480" height="300" /><br><br>

					<div id="my_camera"></div>
					<button type=submit id="btnOpenCamera" class="btn btn-primary">Take Photo</button>
				
				</div>
				</div>
			 
			<br>
			<!--  <div class="d-grid gap-2 d-md-flex center-content-md-end">  				 
					  <a class="btn btn-primary btn-lg" href="Covid" role="button">Next Page</a>
					  </div> -->

			<h5><strong>Demi kesehatan dan keselamatan bersama di tempat kerja, Anda harus JUJUR dalam menjawab pertanyaan-pertanyaan di bawah ini.
					<br>Dalam 14 hari terakhir, apakah Anda pernah mengalami hal hal berikut:</strong></h5><br><br>
			<fieldset class="row mb-3">
				<legend class="col-form-label col-sm-4 pt-0">
					<h5>1. Apakah pernah keluar rumah/ tempat umum(pasar,fasyankes, kerumunan orang, dan lain lain)?  &nbsp;<span class="text-danger">*</span></h5>
				</legend>
				<div class="col-sm-8">
					<div class="">
						<input class="form-check-input" type="radio" name="q1" id="q1" value="YA">
						<label class="form-check-label" for="gridRadios1">
							YA
						</label>
					</div>
					<div class="">
						<input class="form-check-input" type="radio" name="q1" id="q1" value="TIDAK">
						<label class="form-check-label" for="gridRadios2">
							TIDAK
						</label>
					</div>
				</div>
			</fieldset>
			<fieldset class="row mb-3">
				<legend class="col-form-label col-sm-4 pt-0">
					<h5>2. Apakah pernah menggunakan transportasi umum?  &nbsp;<span class="text-danger">*</span></h5>
				</legend>
				<div class="col-sm-8">
					<div class="">
						<input class="form-check-input" type="radio" name="q2" value="YA">
						<label class="form-check-label" for="flexRadioDefault1">
							YA
						</label>
					</div>
					<div class="">
						<input class="form-check-input" type="radio" name="q2" value="TIDAK">
						<label class="form-check-label" for="flexRadioDefault2">
							TIDAK
						</label>
					</div>
				</div>
			</fieldset>
			<fieldset class="row mb-3">
				<legend class="col-form-label col-sm-4 pt-0">
					<h5>3. Apakah pernah melakukan perjalanan keluar kota/internasional dalam 14 hari terakhir? (wilayah yang terjangkit/zona merah)*Wajib melampirkan copy hasil Rapid Tes/RT-PCR  &nbsp;<span class="text-danger">*</span></h5>
				</legend>
				<div class="col-sm-8">
					<div class="">
						<input class="form-check-input" type="radio" name="q3" value="YA">
						<label class="form-check-label" for="gridRadios1">
							YA
						</label>
					</div>
					<div class="">
						<input class="form-check-input" type="radio" name="q3" value="TIDAK">
						<label class="form-check-label" for="gridRadios2">
							TIDAK
						</label>
					</div>
				</div>
			</fieldset>
			<fieldset class="row mb-3">
				<legend class="col-form-label col-sm-4 pt-0">
					<h5>4. Apakah anda mengikuti kegiatan yang melibatkan orang banyak?  &nbsp;<span class="text-danger">*</span></h5>
				</legend>
				<div class="col-sm-8">
					<div class="form-check">
						<input class="form-check-input" type="radio" name="q4" value="YA">
						<label class="form-check-label" for="flexRadioDefault1">
							YA
						</label>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="radio" name="q4" value="TIDAK">
						<label class="form-check-label" for="flexRadioDefault2">
							TIDAK
						</label>
					</div>
				</div>
			</fieldset>
			<fieldset class="row mb-3">
				<legend class="col-form-label col-sm-4 pt-0">
					<h5>5. Apakah memiliki Riwayat kontak erat dengan orang yang dinyatakan suspek, probable atau terkonfirmasi COVID-19 (berjabat tangan, berbicara, berada dalam satu ruangan/satu rumah)  &nbsp;<span class="text-danger">*</span></h5>
				</legend>
				<div class="col-sm-8">
					<div class="form-check">
						<input class="form-check-input" type="radio" name="q5" value="YA">
						<label class="form-check-label" for="flexRadioDefault1">
							YA
						</label>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="radio" name="q5" value="TIDAK">
						<label class="form-check-label" for="flexRadioDefault2">
							TIDAK
						</label>
					</div>
			</fieldset>
			<fieldset class="row mb-3">
				<legend class="col-form-label col-sm-4 pt-0">
					<h5>6. Apakah pernah mengalami demam/batuk/pilek/sakit tenggorokan/sesak dalam 14 hari terakhir?  &nbsp;<span class="text-danger">*</span></h5>
				</legend>
				<div class="col-sm-8">
					<div class="form-check">
						<input class="form-check-input" type="radio" name="q6" value="YA">
						<label class="form-check-label" for="flexRadioDefault1">
							YA
						</label>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="radio" name="q6" value="TIDAK">
						<label class="form-check-label" for="flexRadioDefault2">
							TIDAK
						</label>
					</div>
			</fieldset>
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
	</div>
	</div>
	</div>
	</div>
	</div>
	</div>
	</div>

	<div class="modal fade" id="cameraModal" tabindex="-2" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 id="exampleModalLabel">Camera</h5>
				</div>

				<div class="modal-body">
					<video id="video" width="480" height="300" autoplay></video>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="button" id="btnCaptureCamera" class="btn btn-primary">Capture</button>
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




		function add_row(btn) {

			let total_row = $("#table_data tr").length
			total_row = total_row + 1
			let html = `
                    <tr>
                    <td>
                    <input type="text" class="form-control" name="namaVisitor">
                    </td>

                    <td>
                        <input type="text" class="form-control" name="nik">
                    </td>
                    
                    <td>
                        <button onclick="delete_row(this)" type="button" class="btn btn-danger btn-sm">Delete</i>
                        </button>
                    </td>

                    </tr>
                    `

			$("#table_data").append(html)
		}

		function delete_row(btn) {
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
			if (x == 0) document.getElementById("mycode").style.display = "block";
			else document.getElementById("mycode").style.display = "none";
			return;
		}

		var loadFile = function(event) {
	        $("#photo").attr("src", URL.createObjectURL(event.target.files[0]));
        };

        function getBase64Image(img) {
        var canvas = document.createElement("canvas");
        canvas.width = img.naturalWidth;
        canvas.height = img.naturalHeight;
        var ctx = canvas.getContext("2d");
        ctx.drawImage(img, 0, 0);
        var dataURL = canvas.toDataURL("image/png");
        return dataURL;
         }

		// Save Record
		$("#btnSave").click(function(e) {
			e.preventDefault();
			var base64 = getBase64Image(document.getElementById("photo"));
        	console.log(base64);
			var formData = {
				id: $('#id').val(),
				nameVendor: $('#nameVendor').val(),
				asalVendor: $('#asalVendor').val(),
				email: $('#email').val(),
				namaVisitor: $('#namaVisitor').val(),
				nik: $('#nik').val(),
				gender: $('#gender').val(),
				jabatan: $('#jabatan').val(),
				photo: base64,
				q1: $('#q1').val(),
				q2: $('#q2').val(),
				q3: $('#q3').val(),
				q4: $('#q4').val(),
				q5: $('#q5').val(),
				q6: $('#q6').val(),

			};
			$.ajax({
				type: "PUT",
				url: "VisitorRegister/store",
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
					/*  console.log(data);
					table.clear();
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

		// Event Click Take Photo
		jQuery('body').on('click', '#btnTake', function() {
			// var link_id = $(this).val();
			console.log("OK", $(this).val());
			var id = $(this).val();
			$("#id").val(id);
			$("#changePhotoModal").modal('show');

		});


		const convertBase64 = (file) => {
    return new Promise((resolve, reject) => {
        const fileReader = new FileReader();
        fileReader.readAsDataURL(file);

        fileReader.onload = () => {
            resolve(fileReader.result);
        };

        fileReader.onerror = (error) => {
            reject(error);
        };
            });
        };

		$("#btnOpenCamera").click(async function(e) {
			e.preventDefault();
			//$("#changePhotoModal").modal('hide');
			$("#cameraModal").modal('show');

			// Get access to the camera!
			if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
				// Not adding `{ audio: true }` since we only want video now
				navigator.mediaDevices.getUserMedia({
					video: true
				}).then(function(stream) {
					//video.src = window.URL.createObjectURL(stream);
					video.srcObject = stream;
					video.play();
				});
			}
		});

		$("#btnCaptureCamera").click(function(e) {
			e.preventDefault();
			//let canvas = document.querySelector("#canvas");
			var canvas = document.createElement("canvas");
			canvas.getContext('2d').drawImage(video, 0, 0, 300, 180);
			let image_data_url = canvas.toDataURL('image/jpeg');
			$("#photo").attr("src", image_data_url);
			$("#cameraModal").modal('hide');
			$("#changePhotoModal").modal('show');

		})
	</script>
</body>

</html>