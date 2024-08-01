@section('title', 'Profil')
@include('partials.head')
<style>
    .card-body {
    background: #fff;
    padding: 30px;
    border-top: none;
    z-index: 2;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2) !important; /* Shadow di semua sisi */
    transition: box-shadow 0.3s ease-in-out !important;
    border-bottom-left-radius: 15px; /* Rounded corners for the top left */
    border-bottom-right-radius: 15px; /* Rounded corners for the top right */
}

.card-body:hover {
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.25) !important;
}
</style>
<body class="fix-header fix-sidebar card-no-border">
    @include('partials.preloader')
    <div id="main-wrapper">
        @include('partials.navbar')
        @include('partials.sidebar')
        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor">Profil</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Profil</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="card profile-card">
                        <div class="profile-header">
                            <div class="profile-pic-wrapper">
                                <img src="{{ Auth::user()->foto_profile }}" class="profile-php" alt="Profile Picture" />
                            </div>
                            <h4 class="profile-card-title mt-3">{{ Auth::user()->name }}</h4>
                            <h6 class="text-posisi">{{ Auth::user()->position }}</h6>
                        </div>
                        <div class="card-body p-5">
                            <form action="{{ route('update.profile') }}" class="row g-4" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-6">
                                    <label for="inputCity" class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control form-control-line modern-input" name="name" value="{{ old('name', Auth::user()->name) }}">
                                    <div style="color:red">{{ $errors->first('name') }}</div>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputCity" class="form-label">Email</label>
                                    <input type="email" class="form-control form-control-line modern-input" name="email" value="{{ old('email', Auth::user()->email) }}">
                                    <div style="color:red">{{ $errors->first('email') }}</div>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputCity" class="form-label">Posisi</label>
                                        <input type="text" class="form-control form-control-line modern-input" name="position" value="{{ old('position', Auth::user()->position) }}">
                                        <div style="color:red">{{ $errors->first('position') }}</div>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputCity" class="form-label">Nomor HP</label>
                                        <input type="number" class="form-control form-control-line modern-input" name="phone_number" value="{{ old('phone_number', Auth::user()->phone_number) }}">
                                        <div style="color:red">{{ $errors->first('phone_number') }}</div>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputCity" class="form-label">Foto</label>
                                        <input class="form-control modern-input" name="foto_profile" id="foto_profile" type="file">
                                </div>
                                <div class="col-md-6 mt-5">
                                    <button type="submit" class="btn btn-success px-4 py-2 form-control modern-input">Perbarui Profil</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @include('partials.footer')
            </div>
    @include('partials.scripts')
</body>
</html>
