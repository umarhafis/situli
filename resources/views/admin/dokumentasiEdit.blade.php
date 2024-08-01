@section('title', 'Perbarui Data Dokumentasi')
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
                        <h3 class="text-themecolor">Edit Dokumentasi</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dokumentasi.index') }}">Dokumentasi</a></li>
                            <li class="breadcrumb-item active">Edit Dokumentasi</li>
                        </ol>
                    </div>
                </div>
                <div class="row justify-content-center mt-5">
                    <div class="col-lg-10 col-md-12">
                        <div class="card shadow-lg border-0">
                            <div class="card-header text-white text-center py-4 bg-gradient-custom">
                                <h3 class="mb-0">Form Pembaruhan Dokumentasi</h3>
                            </div>
                            <div class="card-body p-5">
                                <form class="row g-4" method="POST" action="{{ route('dokumentasi.update', $dokumentasi->id) }}" enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="col-md-6">
                                        <label for="inputCity" class="form-label">Judul</label>
                                        <input type="text" class="form-control" name="judul" value="{{ old('judul', $dokumentasi->judul) }}">
                                        <div style="color:red">{{ $errors->first('judul') }}</div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputCity" class="form-label">Deskripsi</label>
                                        <input type="text" class="form-control" name="deskripsi" value="{{ old('deskripsi', $dokumentasi->deskripsi) }}">
                                        <div style="color:red">{{ $errors->first('deskripsi') }}</div>
                                    </div>
                                    <div class="col-12">
                                        <label for="inputCity" class="form-label">Foto <span>(Kosongkan jika tidak mengganti foto)</span></label>
                                        <input class="form-control" name="foto" id="foto" type="file">
                                        <div style="color:red">{{ $errors->first('foto') }}</div>
                                    </div>
                                    <div class="col-12 text-center mt-4">
                                        <button type="submit" class="btn btn-success px-4 py-2">Simpan Perubahan</button>
                                        <a href="{{ route('dokumentasi.index') }}" class="btn btn-secondary px-4 py-2 ms-2">Kembali</a>
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
