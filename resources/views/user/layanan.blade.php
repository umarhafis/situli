<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Layanan Kami</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('img/logo76.png') }}" rel="icon">
  <link href="{{ asset('img/logo76.png') }}" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('frontend/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend/assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
  <link href="{{ asset('frontend/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/css/bootstrap.min.css" integrity="sha512-KyZXEAg3QhqLMpG8r+Knujsl5+5hb5gIoFNEp1K5J5zH/J8ne8LoGb6YIEm3Fu+NUEFJEXRSk0If54cxCb0Uw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Main CSS File -->
  <link href="{{ asset('frontend/assets/css/main.css') }}" rel="stylesheet">
</head>

<body class="contact-page">

    <header id="header" class="header sticky-top">

        <div class="topbar d-flex align-items-center">
          <div class="container d-flex justify-content-center justify-content-md-between">
            <div class="contact-info d-flex align-items-center">
              <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:arteuz100@gmail.com">arteuz100@gmail.com</a></i>
              <i class="bi bi-phone d-flex align-items-center ms-4"><span>089508862423</span></i>
            </div>
            <div class="social-links d-none d-md-flex align-items-center">
              <a href="https://x.com/76_sarana " class="twitter"><i class="bi bi-twitter-x"></i></a>
              <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="https://www.instagram.com/76_sarana?igsh=MWRnaXJpbGhzOGlmMw%3D%3D&utm_source=qr" class="instagram"><i class="bi bi-instagram"></i></a>
            </div>
          </div>
        </div><!-- End Top Bar -->
    
        <div class="branding">
    
          <div class="container position-relative d-flex align-items-center justify-content-between">
            <a class="navbar-brand" href="{{ route('homepage') }}">
                <!-- Logo icon --><b>
                    <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                    <!-- Dark Logo icon -->
                    <img height="50px" src="{{ asset('img/logo76.png') }}" alt="homepage" class="dark-logo" />
                    <!-- Light Logo icon -->
                </b>
                <!--End Logo icon -->
                <!-- Logo text --><span>
                    <!-- dark Logo text -->
                    <img height="30px" src="{{ asset('img/SARANA2.png') }}" alt="homepage" class="dark-logo" />
                    <!-- Light Logo text -->
            </a>
    
            <nav id="navmenu" class="navmenu">
            <ul>
                <li><a href="{{ route('homepage') }}">Beranda</a></li>
                <li class="dropdown"><a href="#"><span>Proyek</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                  <ul>
                    <li><a href="{{ route('portofoliopage') }}">Portofolio</a></li>
                    <li><a href="{{ route('dikerjakanpage') }}">Sedang Dikerjakan</a></li>
                    </li>
                  </ul>
                </li>
                <li><a href="{{ route('dokumentasi.view') }}">Dokumentasi</a></li>
                <li><a href="{{ route('layananpage') }}" class="active">Layanan Kami</a></li>
                <li><a href="{{ route('contactpage') }}">Kontak</a></li>
              </ul>
              <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>
    
          </div>
    
        </div>
    
      </header>

  <main class="main">

    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
      <div class="container">
        <nav class="breadcrumbs">
          <ol>
            <li><a href="{{ route('homepage') }}">Beranda</a></li>
            <li class="current">Layanan Kami</li>
          </ol>
        </nav>
        <h1>Layanan Kami</h1>
      </div>
    </div>

    <section class="our-services" data-aos="fade-up">
      <h2>Masa Depan Terwujud dalam Setiap Proyek</h2>
      <p>Di CV Tujuh Enam Sarana, kami berdedikasi untuk memberikan layanan konstruksi terbaik yang dapat memenuhi kebutuhan dan impian Anda. Dengan pengalaman bertahun-tahun dan tim ahli yang berdedikasi, kami siap untuk membawa visi Anda menjadi kenyataan.</p>
      <div class="service-container">
        <div class="service-card" data-aos="fade-up" data-aos-delay="100">
          <div class="icon">
              <i class="fa-solid fa-water"></i>
          </div>
          <h3>Saluran Air & Pelabuhan</h3>
          <p>Kami membangun infrastruktur sumber daya air dengan teknik mutakhir dan material berkualitas tinggi.</p>
      </div>
      <div class="service-card" data-aos="fade-up" data-aos-delay="200">
          <div class="icon">
              <i class="fa-solid fa-road"></i>
          </div>
          <h3>Jalan Raya & Rel Kereta</h3>
          <p>Solusi lengkap untuk konstruksi jalan raya, rel kereta api, dan landas pacu bandara.</p>
      </div>
      <div class="service-card" data-aos="fade-up" data-aos-delay="300">
          <div class="icon">
              <i class="fa-solid fa-faucet"></i>
          </div>
          <h3>Perpipaan Air Minum</h3>
          <p>Layanan konstruksi perpipaan air minum lokal yang handal dan berkelanjutan.</p>
      </div>
      <div class="service-card" data-aos="fade-up" data-aos-delay="400">
          <div class="icon">
              <i class="fa-solid fa-home"></i>
          </div>
          <h3>Gedung Hunian</h3>
          <p>Kami membangun gedung hunian yang nyaman dan aman dengan perhatian pada setiap detail.</p>
      </div>
      <div class="service-card" data-aos="fade-up" data-aos-delay="500">
          <div class="icon">
              <i class="fa-solid fa-industry"></i>
          </div>
          <h3>Gedung Industri</h3>
          <p>Membangun gedung industri yang efisien dan fungsional sesuai kebutuhan bisnis Anda.</p>
      </div>
      <div class="service-card" data-aos="fade-up" data-aos-delay="600">
          <div class="icon">
              <i class="fa-solid fa-futbol"></i>
          </div>
          <h3>Tempat Hiburan & Olahraga</h3>
          <p>Gedung hiburan dan olahraga yang nyaman dan aman dengan desain yang menarik.</p>
      </div>
      <div class="service-card" data-aos="fade-up" data-aos-delay="700">
          <div class="icon">
              <i class="fa-solid fa-hotel"></i>
          </div>
          <h3>Gedung Penginapan</h3>
          <p>Membangun gedung penginapan dengan kenyamanan dan estetika yang tinggi.</p>
      </div>
      </div>
  </section>
  <section class="why-choose-us" data-aos="fade-up">
    <h2>Mengapa Memilih Kami?</h2>
    <div class="why-choose-us-container">
        <div class="reason" data-aos="fade-right" data-aos-delay="100">
            <h3>Keahlian dan Pengalaman</h3>
            <p>Dengan pengalaman bertahun-tahun dalam industri konstruksi, kami memiliki keahlian yang diperlukan untuk menangani proyek apapun, dari yang sederhana hingga yang kompleks.</p>
        </div>
        <div class="reason" data-aos="fade-left" data-aos-delay="200">
            <h3>Kualitas dan Keandalan</h3>
            <p>Kami berkomitmen untuk memberikan hasil kerja yang berkualitas tinggi dan dapat diandalkan, menggunakan material terbaik dan teknik konstruksi terbaru.</p>
        </div>
        <div class="reason" data-aos="fade-right" data-aos-delay="300">
            <h3>Pendekatan Terpadu</h3>
            <p>Kami menawarkan solusi konstruksi yang terpadu, dari perencanaan hingga penyelesaian, memastikan setiap detail dipertimbangkan dan dieksekusi dengan sempurna.</p>
        </div>
        <div class="reason" data-aos="fade-left" data-aos-delay="400">
            <h3>Kepuasan Pelanggan</h3>
            <p>Kepuasan pelanggan adalah prioritas utama kami. Kami bekerja keras untuk memastikan setiap proyek memenuhi atau bahkan melampaui harapan pelanggan kami.</p>
        </div>
    </div>
</section>
<section class="contact-us" data-aos="fade-up" data-aos-delay="400">
  <p>Jika Anda mencari mitra konstruksi yang dapat diandalkan untuk proyek Anda berikutnya, jangan ragu untuk menghubungi kami. Tim kami siap membantu Anda mewujudkan visi dan kebutuhan konstruksi Anda.</p>
</section>
 
  </main>

  <footer class="footer">
    <div class="container">
      <div class="row">
        <!-- About Section -->
        <div class="col-md-3 me-5">
          <h5 class="footer-heading">Tentang Kami</h5>
          <p>Selamat datang di CV. Tujuh Enam Sarana, mitra terpercaya Anda dalam solusi konstruksi terintegrasi. Kami adalah perusahaan berlisensi dan berasuransi resmi, dengan tim ahli yang berpengalaman dalam mengelola proyek dari perencanaan hingga penyelesaian.</p>
        </div>
        <!-- Links Section -->
        <div class="col-md-2">
          <h5 class="footer-heading">Quick Links</h5>
          <ul class="list-unstyled">
            <li><a href="{{ route('homepage') }}">Home</a></li>
            <li><a href="{{ route('portofoliopage') }}">Portofolio</a></li>
            <li><a href="{{ route('dikerjakanpage') }}">Sedang Dikerjakan</a></li>
            <li><a href="{{ route('dokumentasi.view') }}">Dokumentasi</a></li>
            <li><a href="{{ route('layananpage') }}">Layanan Kami</a></li>
            <li><a href="{{ route('contactpage') }}">Kontak</a></li>
          </ul>
        </div>
        <!-- Contact Section -->
        <div class="col-md-3 ms-3">
          <h5 class="footer-heading">Contact Us</h5>
          <ul class="list-unstyled">
            <li>Email  : Arteuz100@gmail.com</li>
            <li>No Hp  : 089508862423</li>
            <li>Alamat : Jl. Wonobaru Komplek Marina Garden No. 2</li>
          </ul>
        </div>
        <!-- Social Media Section -->
        <div class="col-md-2 ms-5">
          <h5 class="footer-heading">Follow Us</h5>
          <div class="social-icons">
            <a href="#"><i class="bi bi-twitter-x"></i></a>
            <a href="#"><i class="bi bi-facebook"></i></a>
            <a href="#"><i class="bi bi-instagram"></i></a>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid footer-bottom text-center">
      <p>&copy; 2024 Tujuh Enam Sarana. All Rights Reserved.</p>
    </div>
  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{ asset('frontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('frontend/assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('frontend/assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('frontend/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('frontend/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{ asset('frontend/assets/vendor/waypoints/noframework.waypoints.js') }}"></script>
  <script src="{{ asset('frontend/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('frontend/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
  <script src="{{ asset('frontend/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="https://kit.fontawesome.com/eae00380fc.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

  <!-- Main JS File -->
  <script src="{{ asset('frontend/assets/js/main.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/js/bootstrap.bundle.min.js" integrity="sha512-JUQfBZaMCeR8OZZIhZop2TRxzE/jlIY8SShGB9rG1m7+tsl/ZJLOHBCTFe/ym2I51pPIFQd17Rax9WltfxdU9g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/66a5793f32dca6db2cb6a0dd/1i3r638g2';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
    <!--End of Tawk.to Script-->

    <!-- Script untuk mengatur posisi Tawk.to -->
    <script type="text/javascript">
    Tawk_API.onLoad = function() {
        // Mengatur posisi widget chat pada tampilan desktop
        function setTawkPosition() {
            var tawkChat = document.querySelector("iframe[title='chat widget']");
            if (tawkChat) {
                tawkChat.style.bottom = '40px'; // Atur jarak dari bawah
                tawkChat.style.right = '10px'; // Atur jarak dari kanan
            }
        }

        // Mengatur posisi widget chat pada tampilan mobile
        function setTawkPositionMobile() {
            var tawkChat = document.querySelector("iframe[title='chat widget']");
            if (tawkChat) {
                tawkChat.style.bottom = '40px'; // Atur jarak dari bawah
                tawkChat.style.right = '70px'; // Atur jarak dari kanan
            }
        }

        // Memanggil fungsi pengaturan posisi sesuai ukuran layar
        if (window.innerWidth <= 768) {
            setTawkPositionMobile();
        } else {
            setTawkPosition();
        }

        // Mengatur ulang posisi saat ukuran layar berubah
        window.addEventListener('resize', function() {
            if (window.innerWidth <= 768) {
                setTawkPositionMobile();
            } else {
                setTawkPosition();
            }
        });
    };
    </script>
</body>

</html>