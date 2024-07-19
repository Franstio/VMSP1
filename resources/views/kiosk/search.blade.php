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

		<H2>
			<center>Silahkan masukkan NIK/Nomor passport anda pada kolom berikut</center>
		</H2>
		<div class="search_wrap search_wrap_1">
			<div class="search_box">
				<input type="text" class="input" name="nik" id="nik" placeholder="cari...">
				<button class="btn btn_common " onclick="search_data(this, event)">
					<i class="fas fa-search"></i>
				</button>
			</div>
			<br><br>
	

		</div>
		<script>
			// Ajax Setup Auth
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});

			function search_data(btn, e) {
				console.log(nik);
				var formData = {
					nik: document.getElementById("nik").value
				}

				$.ajax({
					type: "POST",
					url: "/search/searchNIK",
					data: formData,
					dataType: 'json',
					success: function(data) {

						if (data.success) {
							Swal.fire({
								title: "Success!",
								text: "Anda Telah Terdaftar Sebagai Visitor Silahkan Ajukan izin Berkunjung",
								icon: "success",
								button: "OK",	
							}).then(function(){
								window.location.href = "VisitorPermittion";
							});										
							setTimeout(() => {
								location.reload()
							}, 3000);
						} else {
							Swal.fire({
								title: "Error!",
								text: "Anda Belum Terdaftar Sebagai Visitor Silahkan Register",
								icon: "error",
								button: "OK",
							}).then(function(){
								window.location.href = "VisitorRegister";
							});	
						}

						$(`input[type="text"]`).val('').removeAttr('checked')

					},
					error: function(data) {
						console.log(data);
					}
				});


			}
		</script>
</body>

</html>