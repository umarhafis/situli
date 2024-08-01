@section('title', 'Kelola Admin')
@include('partials.head') <!-- Jika ada partial untuk head -->
<style>
    .modal-body .form-label {
        text-align: left !important; /* Gunakan !important jika ada style lain yang menimpa */
    }
</style>
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
                        <h3 class="text-themecolor">Kelola Admin</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Kelola Admin</li>
                        </ol>
                    </div>
                </div>
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- Start Page Table Portofolio -->
                @if(Auth::check() && Auth::user()->is_super_admin)               
 		<div class="row">
                    <div class="col-12">
                        <div class="card shadow-lg border-light rounded-lg">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Kelola Admin</h4>
                                <div class="table-responsive" style="max-height: 500px; overflow-y: auto;">
                                    <table class="table table-hover table-striped table-bordered align-middle">
                                        <thead class="bg-primary text-white">
                                            <tr>
                                                <th class="text-center">No</th>
                                                <th>Nama</th>
                                                <th>Email</th>
                                                <th>Posisi</th>
                                                <th>Nomor Hp</th>
                                                <th>Role</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                                 <tbody>
                                            @foreach ($users as $user)
                                            @csrf
                                            <tr>
                                                <td class="text-center">{{ $loop->iteration }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->position }}</td>
                                                <td>{{ $user->phone_number }}</td>
                                                <td>{{ $user->is_super_admin ? 'Super Admin' : 'Admin' }}</td>
                                                <td class="text-center">
                                                @if(!$user->is_super_admin)
                                                    <!-- Form untuk menghapus pengguna -->
                                                    <button type="button" class="btn btn-danger btn-sm" onclick="confirmDeletion(event, {{ $user->id }})">Hapus</button>
                                                    <form id="delete-form-{{ $user->id }}" action="{{ route('deleteUser', $user->id) }}" method="POST" style="display: none;">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                      <!-- Button untuk membuka modal edit password -->
                                                      <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editPasswordModal-{{ $user->id }}">
                                                        Edit Password
                                                    </button>

                                                    <div class="modal fade" id="editPasswordModal-{{ $user->id }}" tabindex="-1" aria-labelledby="editPasswordModalLabel-{{ $user->id }}" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="editPasswordModalLabel-{{ $user->id }}">Edit Password untuk {{ $user->name }}</h5>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <form action="{{ route('editPassword', $user->id) }}" method="POST">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <div class="modal-body d-block"> <!-- Menambahkan d-block untuk memastikan tidak ada efek flexbox -->
                                                                        <div class="mb-3">
                                                                            <label for="new-password-{{ $user->id }}" class="form-label">Password Baru</label>
                                                                            <input type="password" class="form-control" id="new-password-{{ $user->id }}" name="new_password" required>
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="confirm-password-{{ $user->id }}" class="form-label">Konfirmasi Password</label>
                                                                            <input type="password" class="form-control" id="confirm-password-{{ $user->id }}" name="confirm_password" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                                                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    @endif
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    @else
                                    <p>Anda tidak memiliki izin untuk mengakses halaman ini.</p>
                                @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>   
        <!-- End Container fluid -->
        <!-- footer -->
                @include('partials.footer')
        <!-- End footer -->
    </div>
    @include('partials.scripts') <!-- Menyertakan partial untuk skrip -->
</body>
</html>
