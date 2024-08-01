<!doctype html>
<html lang="en">
  <head>
  	<title>Register</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

  <link rel="icon"  href="{{ asset('img/logo76.png') }}">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	
	<link rel="stylesheet" href="{{ asset('backend/loginform/css/style.css') }}">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="img" style="background-image: url(/img/login11.jpg);">
			      </div>
						<div class="login-wrap p-4 p-md-5">
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h1 class="mb-3 font-weight-bold">Pendaftaran</h1>
			      		</div>
								<div class="w-100">
									<p class="social-media d-flex justify-content-end">
										<img height="50px" src="{{ asset('img/logo76.png') }}" alt="">
									</p>
								</div>
			      	</div>	 
				<form action="{{ route('registerPost') }}" enctype="multipart/form-data" method="POST">
					@csrf
					<div class="form-group mb-3">
						<label class="label" for="name">Nama</label>
						<input type="text" class="form-control" name="name" placeholder="Name" required>
					</div>
					<div class="form-group mb-3">
						<label class="label" for="email">Email</label>
						<input type="email" class="form-control" name="email" placeholder="Email" required>
						<div style="color:red">{{ $errors->first('email') }}</div>
					</div>
					<div class="form-group mb-3">
						<label class="label" for="position">Posisi</label>
						<input type="text" class="form-control" name="position" placeholder="Position" required>
					</div>
					<div class="form-group mb-3">
						<label class="label" for="phone_number">Nomor HP</label>
						<input type="text" class="form-control" name="phone_number" placeholder="Phone Number" required>
					</div>
					<div class="form-group mb-3">
						<label class="label" for="password">Password</label>
						<input type="password" class="form-control" name="password" placeholder="Password" required>
					</div>
					<div class="form-group mb-3">
						<label for="foto_profile" class="label">Foto Profil</label>
						<input class="form-control" name="foto_profile" id="foto_profile" type="file">
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-danger btn-lg btn-block rounded submit px-3">Daftar</button>
					</div>
				</form>
				
              <p class="text-center">Sudah Menjadi Anggota ? <a style="color: red" href="{{ route('login') }}">Login</a></p>
		        </div>
		      </div>
				</div>
			</div>
		</div>
	</section>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
	<script src="{{ asset('backend/loginform/js/jquery.min.js') }}"></script>
  <script src="{{ asset('backend/loginform/js/popper.js') }}"></script>
  <script src="{{ asset('backend/loginform/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('backend/loginform/js/main.js') }}"></script>

	</body>
</html>

