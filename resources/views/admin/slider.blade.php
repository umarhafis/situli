@section('title', 'Slider')
@include('partials.head') <!-- Jika ada partial untuk head -->
<body class="fix-header fix-sidebar card-no-border">
    @include('partials.preloader')
    <div id="main-wrapper">
        @include('partials.navbar')
        @include('partials.sidebar')
        <div class="page-wrapper">
            <!-- Container fluid -->
            <div class="container-fluid">
                <!-- Bread crumb and right sidebar toggle -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor">Slider</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Slider</li>
                        </ol>
                    </div>
                </div>
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- Start Page Table Portofolio -->
                <div class="row">
                    <div class="col-12">
                        <div class="card shadow-lg border-light rounded-lg">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Slider</h4>
                                <div class="table-responsive" style="max-height: 500px; overflow-y: auto;">
                                    <table class="table table-hover table-striped table-bordered align-middle">
                                        <thead class="bg-primary text-white">
                                            <tr>
                                                <th>Judul</th>
                                                <th>Deskripsi</th>
                                                <th>Gambar</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($sliders as $slider)
                                            @csrf 
                                            <tr>
                                                <td>{{ $slider->title }}</td>
                                                <td>{{ $slider->description }}</td>
                                                <td><img class="img-slider" src="{{ asset('storage/' . $slider->image) }}" alt="{{ $slider->title }}" style="width: 100px;"></td>
                                                <td class="text-center">
                                                    <a href="{{ route('slider.edit', $slider->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                                    <button type="button" class="btn btn-danger btn-sm" onclick="confirmDeletion(event, {{ $slider->id }})">Hapus</button>
                                                    <form id="delete-form-{{ $slider->id }}" action="{{ route('slider.destroy', $slider->id) }}" method="POST" style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <a href="{{ route('slider.create') }}" class="btn btn-success mt-3">Buat Slider Baru</a>
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
