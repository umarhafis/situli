@section('title', 'Dashboard')
@include('partials.head')
 <!-- Jika ada partial untuk head -->
 <style>
    .card-body {
    background: #fff;
    padding: 30px;
    border-top: none;
    z-index: 2;
    position: relative;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2) !important; /* Shadow di semua sisi */
    transition: box-shadow 0.3s ease-in-out !important;
    border-bottom-left-radius: 15px; /* Rounded corners for the top left */
    border-bottom-right-radius: 15px; /* Rounded corners for the top right */
    border-top-left-radius: 15px; /* Rounded corners for the top left */
    border-top-right-radius: 15px; /* Rounded corners for the top right */
}

.card {
    margin-bottom: 10px;
    background: transparent;
}

.dropdown-menu {
    min-width: 145px;
    margin-top: 0.5rem;
    border-radius: 0.375rem;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    position: absolute; /* Position dropdown relative to card */
    top: 100%; /* Place dropdown below button */
    left: 0;
    z-index: 1050;
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
                        <h3 class="text-themecolor mb-2">Dashboard</h3>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- Three charts -->
                <!-- ============================================================== -->
                <div class="container mt-5">
                    <div class="row g-5 d-flex justify-content-center">
                        <div class="col-lg-4 col-md-6">
                            <div class="stat-card">
                                <i class="fa-solid fa-download"></i>
                                <h3 class="counter">{{ $count }}</h3>
                                <p>Klik Download</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="stat-card">
                                <i class="fa-solid fa-users"></i>
                                <h3 class="counter">{{ $userCount }}</h3>
                                <p>User Terdaftar</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="stat-card">
                                <i class="fa-solid fa-helmet-safety"></i>
                                <h3 class="counter">{{ $portofolio }}</h3>
                                <p>Proyek</p>
                            </div>
                        </div>
                    </div>
                </div>                
                <div class="container-fluid mt-5">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center mb-4">
                                        <h5 class="mb-0">Aktivitas Pengguna</h5>
                                        <div class="dropdown">
                                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                                                Pilih Periode
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <li><a class="dropdown-item" href="#" onclick="showActivities('today', event)">Hari Ini</a></li>
                                                <li><a class="dropdown-item" href="#" onclick="showActivities('week', event)">Minggu Ini</a></li>
                                                <li><a class="dropdown-item" href="#" onclick="showActivities('month', event)">Bulan Ini</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div id="activitiesToday" class="activity-list d-none">
                                        <h6>Hari Ini</h6>
                                        <ul class="feeds">
                                            @foreach($activitiesToday as $activity)
                                            <li>
                                                <div class="bg-light-info">
                                                    <img src="{{ $activity->user->foto_profile }}" alt="{{ $activity->user->name }}" class="user-photo">
                                                </div>
                                                <div class="activity-content">
                                                    <div class="activity-description">{{ $activity->activity }}</div>
                                                    <div class="activity-user">{{ $activity->user->name }}</div>
                                                    <div class="text-muted">{{ $activity->created_at->locale('id')->diffForHumans() }}</div>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div id="activitiesWeek" class="activity-list d-none">
                                        <h6>Minggu Ini</h6>
                                        <ul class="feeds">
                                            @foreach($activitiesThisWeek as $activity)
                                            <li>
                                                <div class="bg-light-info">
                                                    <img src="{{ $activity->user->foto_profile }}" alt="{{ $activity->user->name }}" class="user-photo">
                                                </div>
                                                <div class="activity-content">
                                                    <div class="activity-description">{{ $activity->activity }}</div>
                                                    <div class="activity-user">{{ $activity->user->name }}</div>
                                                    <div class="text-muted">{{ $activity->created_at->locale('id')->diffForHumans() }}</div>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div id="activitiesMonth" class="activity-list d-none">
                                        <h6>Bulan Ini</h6>
                                        <ul class="feeds">
                                            @foreach($activitiesThisMonth as $activity)
                                            <li>
                                                <div class="bg-light-info">
                                                    <img src="{{ $activity->user->foto_profile }}" alt="{{ $activity->user->name }}" class="user-photo">
                                                </div>
                                                <div class="activity-content">
                                                    <div class="activity-description">{{ $activity->activity }}</div>
                                                    <div class="activity-user">{{ $activity->user->name }}</div>
                                                    <div class="text-muted">{{ $activity->created_at->locale('id')->diffForHumans() }}</div>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
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
