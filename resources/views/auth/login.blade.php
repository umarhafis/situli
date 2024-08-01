<!doctype html>
<html lang="en">
<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="{{ asset('img/logo76.png') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.30/dist/sweetalert2.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('backend/loginform/css/style.css') }}">
</head>
<body>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="wrap d-md-flex">
                        <div class="img" style="background-image: url(/img/logo13.jpg);"></div>
                        <div class="login-wrap p-4 p-md-5">
                            <div class="d-flex">
                                <div class="w-100">
                                    <h1 class="mb-3 font-weight-bold">Login</h1>
                                </div>
                                <div class="w-100">
                                    <p class="social-media d-flex justify-content-end">
                                        <img height="50px" src="{{ asset('img/logo76.png') }}" alt="">
                                    </p>
                                </div>
                            </div>
                            <form action="" method="POST">
                                @csrf
                                <div class="form-group mb-3">
                                    <label class="label" for="email">Email</label>
                                    <input type="text" class="form-control" name="email" placeholder="Email" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="password">Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-danger btn-lg btn-block rounded submit px-3">Masuk</button>
                                </div>
                                <div class="form-group d-md-flex">
                                    <div class="w-50 text-left">
                                        <label class="checkbox-wrap checkbox-primary mb-0">Ingatkan Saya
                                            <input type="checkbox" checked name="remember">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="w-50 text-md-right">
                                        <a href="#" class="btn btn-link" id="forgotPasswordLink">Lupa Password</a>
                                    </div>
                                </div>
                            </form>
                            <p class="text-center">Belum Menjadi Anggota ? <a style="color: red" href="{{ route('register') }}">Daftar</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<script src="{{ asset('backend/loginform/css/bootstrap/script.js') }}"></script>
<script src="https://kit.fontawesome.com/eae00380fc.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.3/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmDeletion(event, id) {
        event.preventDefault();
        
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Anda tidak akan dapat mengembalikan ini!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + id).submit();
                Swal.fire(
                    'Dihapus!',
                    'Data telah dihapus.',
                    'success'
                );
            }
        });
    }
</script>

<script>
    document.getElementById('forgotPasswordLink').addEventListener('click', function(event) {
        event.preventDefault(); // Mencegah link untuk mengikuti href

        Swal.fire({
            icon: 'info', // Menggunakan ikon informasi
            title: 'Lupa Password',
            html: 'Hubungi admin jika anda lupa password.<br>Nomor WhatsApp: <a href="https://wa.me/6289508862423" target="_blank">0895-0886-2423</a>',
            confirmButtonText: 'Tutup',
            customClass: {
                confirmButton: 'btn btn-primary'
            },
            buttonsStyling: false // Untuk memastikan Bootstrap styling bekerja
        });
    });
</script>


@if (session('welcome'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Login Berhasil!',
        text: '{{ session('welcome') }}',
        confirmButtonText: 'OK'
    });
</script>
@endif

@if (session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: '{{ session('success') }}',
    });
</script>
@endif

@if (session('error'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Error',
        text: '{{ session('error') }}',
    });
</script>
@endif

</body>
</html>
