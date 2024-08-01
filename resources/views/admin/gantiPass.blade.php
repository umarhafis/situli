@section('title', 'Ganti Password')
@include('partials.head') <!-- Jika ada partial untuk head -->
<body class="fix-header fix-sidebar card-no-border">
    @include('partials.preloader')
    <div id="main-wrapper">
        @include('partials.navbar')
        @include('partials.sidebar')
        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor">Ganti Password</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Ganti Password</li>
                        </ol>
                    </div>
                </div>
                <div class="row justify-content-center mt-5">
                    <div class="col-lg-10 col-md-12">
                        <div class="card shadow-lg border-0">
                            <div class="card-header text-white text-center py-4 bg-gradient-custom">
                                <h3 class="mb-0">Form Ganti Password</h3>
                            </div>
                            <div class="card-body p-5">
                                <form method="POST" action="{{ route('password.update') }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label for="current_password" class="form-label">Password Saat Ini</label>
                                        <input type="password" class="form-control" name="current_password" placeholder="Masukkan kata sandi lama Anda" required>
                                    </div>
                                
                                    <div class="mb-3">
                                        <label for="new_password" class="form-label">Password Baru</label>
                                        <input type="password" class="form-control" name="new_password" placeholder="Masukkan kata sandi baru" required>
                                    </div>
                                
                                    <div class="mb-3">
                                        <label for="new_password_confirmation" class="form-label">Konfirmasi Password Baru</label>
                                        <input type="password" class="form-control" name="new_password_confirmation" placeholder="Konfirmasi kata sandi baru" required>
                                    </div>
                                
                                    <div class="col-12 mt-4">
                                        <button type="submit" class="btn btn-success px-4 py-2">Ganti Password</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             @include('partials.footer')
        </div>
    </div>
  @include('partials.scripts') <!-- Menyertakan partial untuk skrip -->
</body>
</html>
