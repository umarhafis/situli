@section('title', 'Perbarui Data Kontak')
@include('partials.head')
<body class="fix-header fix-sidebar card-no-border">
    @include('partials.preloader')
    <div id="main-wrapper">
        @include('partials.navbar')
        @include('partials.sidebar')
        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor">Edit Kontak</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('kontaks.index') }}">Kontak</a></li>
                            <li class="breadcrumb-item active">Edit Kontak</li>
                        </ol>
                    </div>
                </div>
                <div class="row justify-content-center mt-5">
                    <div class="col-lg-10 col-md-12">
                        <div class="card shadow-lg border-0">
                            <div class="card-header text-white text-center py-4 bg-gradient-custom">
                                <h3 class="mb-0">Form Perbaruhan Kontak</h3>
                            </div>
                            <div class="card-body p-5">
                                <form class="row g-4" method="POST" action="{{ route('kontaks.update', $kontak->id) }}" enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="col-md-6">
                                        <label for="inputCity" class="form-label">Nomor Hp</label>
                                        <input type="number" class="form-control" name="nomor" value="{{ old('nomor', $kontak->nomor) }}">
                                        <div style="color:red">{{ $errors->first('nomor') }}</div>
                                      </div>
                                      <div class="col-md-6">
                                          <label for="inputCity" class="form-label">Email</label>
                                          <input type="text" class="form-control" name="email" value="{{ old('email', $kontak->email) }}">
                                          <div style="color:red">{{ $errors->first('email') }}</div>
                                      </div>
                                      <div class="col-md-12">
                                          <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
                                          <textarea class="form-control" name="alamat" rows="2" required> {{ old('alamat', $kontak->alamat) }}</textarea>
                                          <div style="color:red">{{ $errors->first('alamat') }}</div>
                                      </div>
                                      <div class="col-12 text-center mt-4">
                                        <button type="submit" class="btn btn-success px-4 py-2">Simpan Perubahan</button>
                                        <a href="{{ route('kontaks.index') }}" class="btn btn-secondary px-4 py-2 ms-2">Kembali</a>
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
    @include('partials.scripts')
</body>
</html>
