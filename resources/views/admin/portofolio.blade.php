@section('title', 'Portofolio')
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
                        <h3 class="text-themecolor">Portofolio</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Portofolio</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card shadow-lg border-light rounded-lg">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Portofolio</h4>
                                <div class="table-responsive" style="max-height: 500px; overflow-y: auto;">
                                    <table class="table table-hover table-striped table-bordered align-middle">
                                        <thead class="bg-primary text-white">
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Paket Perkerjaan</th>
                                                <th>Pejabat Pembuat Komitmen</th>
                                                <th>Harga Kontrak</th>
                                                <th>Lokasi</th>
                                                <th>Tahun</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($portofolios as $portofolio)
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td>{{ $portofolio->nama_paket_perkerjaan }}</td>
                                                <td>{{ $portofolio->pejabat_pembuat_komitmen }}</td>
                                                <td class="text-end"><em>Rp. {{ $portofolio->harga_kontrak }}</em></td>
                                                <td>{{ $portofolio->lokasi }}</td>
                                                <td>{{ $portofolio->tahun }}</td>
                                                <td class="text-center">
                                                    <a href="{{ route('portofolios.edit', $portofolio->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                                    <button type="button" class="btn btn-danger btn-sm" onclick="confirmDeletion(event, {{ $portofolio->id }})">Hapus</button>
                                                    <form id="delete-form-{{ $portofolio->id }}" action="{{ route('portofolios.destroy', $portofolio->id) }}" method="POST" style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <a href="{{ route('portofolios.create') }}" class="btn btn-success mt-3">Buat Portofolio Baru</a>
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
