@section('title', 'Kontak')
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
                        <h3 class="text-themecolor">Kontak</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Kontak</li>
                        </ol>
                    </div>
                </div>
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- Start Page Table Portofolio -->
                <div class="row">
                    <div class="col-12">
                        <div class="card shadow-lg border-light rounded-lg">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Kontak</h4>
                                <div class="table-responsive" style="max-height: 500px; overflow-y: auto;">
                                    <table class="table table-hover table-striped table-bordered align-middle">
                                        <thead class="bg-primary text-white">
                                            <tr>
                                                <th>Alamat</th>
                                                <th>Nomor</th>
                                                <th>Email</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($kontak as $kontaks)
                                            @csrf
                                            <tr>
                                                <td>{{ $kontaks->alamat }}</td>
                                                <td>{{ $kontaks->nomor }}</td>
                                                <td>{{ $kontaks->email }}</td>
                                                <td class="text-center">
                                                    <a href="{{ route('kontaks.edit', $kontaks->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
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
