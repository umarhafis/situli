@section('title', 'Perbarui Data Slider')
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
                        <h3 class="text-themecolor">Edit Slider</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('slider.index') }}">Slider</a></li>
                            <li class="breadcrumb-item active">Edit Slider</li>
                        </ol>
                    </div>
                </div>
                <div class="row justify-content-center mt-5">
                    <div class="col-lg-10 col-md-12">
                        <div class="card shadow-lg border-0">
                            <div class="card-header text-white text-center py-4 bg-gradient-custom">
                                <h3 class="mb-0">Form Pembaruhan Slider</h3>
                            </div>
                            <div class="card-body p-5">
                                <form class="row g-3" method="POST" action="{{ route('slider.update', $slider->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="col-md-6">
                                        <label for="title" class="form-label">Judul</label>
                                        <input type="text" class="form-control" name="title" value="{{ old('title', $slider->title) }}" placeholder="Isi judul slider..." required>
                                        <div style="color:red">{{ $errors->first('title') }}</div>
                                    </div>
                
                                    <div class="col-md-6">
                                        <label for="description" class="form-label">Deskripsi</label>
                                        <input type="text" class="form-control" name="description" value="{{ old('description', $slider->description) }}" placeholder="Isi deskripsi slider..." required>
                                        <div style="color:red">{{ $errors->first('description') }}</div>
                                    </div>
                
                                    <div class="col-12">
                                        <label for="image" class="form-label">Gambar <span>(Kosongkan jika tidak mengganti foto)</span></label>
                                        <input type="file" class="form-control" name="image">
                                        <div style="color:red">{{ $errors->first('image') }}</div>
                                    </div>
                
                                    <div class="col-12 text-center mt-4">
                                        <button type="submit" class="btn btn-success px-4 py-2">Simpan Perubahan</button>
                                        <a href="{{ route('slider.index') }}" class="btn btn-secondary px-4 py-2 ms-2">Kembali</a>
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
