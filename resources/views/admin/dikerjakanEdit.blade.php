@section('title', 'Perbarui Data Dikerjakan')
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
                        <h3 class="text-themecolor">Edit Dikerjakan</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('dikerjakan.index') }}">Dikerjakan</a></li>
                            <li class="breadcrumb-item active">Edit Dikerjakan</li>
                        </ol>
                    </div>
                </div>
                <div class="row justify-content-center mt-5">
                    <div class="col-lg-10 col-md-12">
                        <div class="card shadow-lg border-0">
                            <div class="card-header text-white text-center py-4 bg-gradient-custom">
                                <h3 class="mb-0">Form Perbaruhan Dikerjakan</h3>
                            </div>
                            <div class="card-body p-5">
                                <form class="row g-4" method="POST" action="{{ route('dikerjakan.update', $dikerjakan->id) }}" enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="col-md-6">
                                        <label for="namaPaket" class="form-label">Nama Paket Perkerjaan</label>
                                        <textarea class="form-control" id="namaPaket" name="nama_paket_perkerjaan" rows="3">{{ old('nama_paket_perkerjaan', $dikerjakan->nama_paket_perkerjaan) }}</textarea>
                                        <div class="text-danger mt-1">{{ $errors->first('nama_paket_perkerjaan') }}</div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="pejabatPembuatKomitmen" class="form-label">Pejabat Pembuat Komitmen</label>
                                        <textarea class="form-control" id="pejabatPembuatKomitmen" name="pejabat_pembuat_komitmen" rows="3">{{ old('pejabat_pembuat_komitmen', $dikerjakan->pejabat_pembuat_komitmen) }}</textarea>
                                        <div class="text-danger mt-1">{{ $errors->first('pejabat_pembuat_komitmen') }}</div>
                                    </div>
                                    <div class="col-12">
                                        <label for="hargaKontrak" class="form-label">Harga Kontrak</label>
                                        <textarea class="form-control" id="hargaKontrak" name="harga_kontrak" rows="3">{{ old('harga_kontrak', $dikerjakan->harga_kontrak) }}</textarea>
                                        <div class="text-danger mt-1">{{ $errors->first('harga_kontrak') }}</div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="lokasi" class="form-label">Lokasi</label>
                                        <input type="text" class="form-control" id="lokasi" name="lokasi" value="{{ old('lokasi', $dikerjakan->lokasi) }}">
                                        <div class="text-danger mt-1">{{ $errors->first('lokasi') }}</div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="tahun" class="form-label">Tahun</label>
                                        <input type="text" class="form-control" id="tahun" name="tahun" value="{{ old('tahun', $dikerjakan->tahun) }}">
                                        <div class="text-danger mt-1">{{ $errors->first('tahun') }}</div>
                                    </div>
                                    <div class="col-12 text-center mt-4">
                                        <button type="submit" class="btn btn-success px-4 py-2">Simpan Perubahan</button>
                                        <a href="{{ route('dikerjakan.index') }}" class="btn btn-secondary px-4 py-2 ms-2">Kembali</a>
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
