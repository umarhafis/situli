@section('title', 'Dikerjakan')
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
                        <h3 class="text-themecolor">Dikerjakan</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Dikerjakan</li>
                        </ol>
                    </div>
                </div>
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- Start Page Table Portofolio -->
                <div class="row">
                    <div class="col-12">
                        <div class="card shadow-lg border-light rounded-lg">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Dikerjakan</h4>
                                <div class="table-responsive" style="max-height: 500px; overflow-y: auto;">
                                    <table class="table table-hover table-striped table-bordered align-middle">
                                        <thead class="bg-primary text-white">
                                            <tr>
                                                <th class="text-center">No</th>
                                                <th>Nama Paket Perkerjaan</th>
                                                <th>Pejabat Pembuat Komitmen</th>
                                                <th>Harga Kontrak</th>
                                                <th>Lokasi</th>
                                                <th>Tahun</th>
                                                <th>Action</th>
                                            </tr> 
                                        </thead>
                                        <tbody>
                                            @foreach ($dikerjakan as $kerja)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td>{{ $kerja->nama_paket_perkerjaan }}</td>
                                                <td>{{ $kerja->pejabat_pembuat_komitmen }}</td>
                                                <td class="text-end"><em>Rp {{ $kerja->harga_kontrak }}</em></td>
                                                <td>{{ $kerja->lokasi }}</td>
                                                <td>{{ $kerja->tahun }}</td>
                                                <td class="text-center">
                                                    <a href="{{ route('dikerjakan.edit', $kerja->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                                    <button type="button" class="btn btn-danger btn-sm" onclick="confirmDeletion(event, {{ $kerja->id }})">Hapus</button>
                                                    <form id="delete-form-{{ $kerja->id }}" action="{{ route('dikerjakan.destroy', $kerja->id) }}" method="POST" style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <a href="{{ route('dikerjakan.create') }}" class="btn btn-success mt-3">Buat Dikerjakan Baru</a>
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
