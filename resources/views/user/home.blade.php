<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Beranda</title>
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

<body class="index-page">

  <header id="header" class="header sticky-top">

    <div class="topbar d-flex align-items-center">
      <div class="container d-flex justify-content-center justify-content-md-between">
        <div class="contact-info d-flex align-items-center">
          <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:arteuz100@gmail.com">arteuz100@gmail.com</a></i>
          <i class="bi bi-phone d-flex align-items-center ms-4"><a href="https://wa.me/6289508862423">+6289508862423</a></i>
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
            <li><a href="{{ route('homepage') }}" class="active">Beranda</a></li>
            <li class="dropdown"><a href="#"><span>Proyek</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
              <ul>
                <li><a href="{{ route('portofoliopage') }}">Portofolio</a></li>
                <li><a href="{{ route('dikerjakanpage') }}">Sedang Dikerjakan</a></li>
                </li>
              </ul>
            </li>
            <li><a href="{{ route('dokumentasi.view') }}">Dokumentasi</a></li>
            <li><a href="{{ route('layananpage') }}">Layanan Kami</a></li>
            <li><a href="{{ route('contactpage') }}">Kontak</a></li>
          </ul>
          <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

      </div>

    </div>

  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section">

      <div id="hero-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

        @foreach($sliders as $key => $slider)
        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
            <img src="{{ asset('storage/' . $slider->image) }}" alt="">
            <div class="carousel-container text-center">
                <h2>{{ $slider->title }}</h2>
                <p>{{ $slider->description }}</p>
            </div>
        </div>
    @endforeach

        <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>

      </div>

    </section><!-- /Hero Section -->

      <!-- About Section -->
      <section id="about" class="about section">

        <div class="container">
  
          <div class="row position-relative">
  
            <div class="col-lg-7 about-img" data-aos="zoom-out" data-aos-delay="200"><img src="{{ asset('img/kontruksi5.jpg') }}"></div>
  
            <div class="col-lg-7" data-aos="fade-up" data-aos-delay="100">
              <h2 class="inner-title">Perusahaan Kami ?</h2>
              <div class="our-story">
                <h3>CV Tujuh Enam Sarana</h3>
                <p>Selamat datang di Tujuh Enam Sarana, perusahaan yang berdedikasi dalam memberikan solusi konstruksi terbaik dan inovatif. Dengan pengalaman bertahun-tahun di industri ini, kami berkomitmen untuk memberikan layanan yang berkualitas tinggi, aman, dan efisien untuk memenuhi kebutuhan klien kami.</p>
                <ul>
                  <li><i class="bi bi-check2-all"></i> <span>Menyediakan layanan konstruksi yang berfokus pada kualitas, keamanan, dan keberlanjutan.</span></li>
                  <li><i class="bi bi-check2-all"></i> <span>Membangun hubungan jangka panjang dengan klien kami berdasarkan kepercayaan dan profesionalisme.</span></li>
                  <li><i class="bi bi-check2-all"></i> <span>Terus berinovasi dan mengadopsi teknologi terbaru untuk meningkatkan efisiensi dan efektivitas dalam setiap proyek.</span></li>
                </ul>
                <p>Kami percaya bahwa setiap proyek adalah peluang untuk menciptakan sesuatu yang luar biasa. Dengan tim profesional yang berpengalaman dan berdedikasi, kami siap untuk mewujudkan visi Anda menjadi kenyataan.</p>
  
              </div>
            </div>
  
          </div>
  
        </div>
  
      </section><!-- /About Section -->

 <!-- ======= Counts Section ======= -->
 <section id="counts" class="counts  section-bg">
  <div class="container" data-aos="fade-up" data-aos-delay="100"
  
  >

    <div class="row no-gutters">

      <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
        <div class="count-box">
          <i class="bi bi-journal-richtext"></i>
          <span data-purecounter-start="0" data-purecounter-end="{{ $portofolio }}" data-purecounter-duration="1" class="purecounter"></span>
          <p><strong>Jumlah Proyek selesai</strong></p>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
        <div class="count-box">
          <i class="bi bi-tools"></i>
          <span data-purecounter-start="0" data-purecounter-end="{{ $dikerjakanCount }}" data-purecounter-duration="2" class="purecounter"></span>
          <p><strong>Proyek Sedang Berjalan</strong></p>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
        <div class="count-box">
          <i class="bi bi-clock-history"></i>
          <span data-purecounter-start="0" data-purecounter-end="10" data-purecounter-duration="3" class="purecounter"></span>
          <p><strong>Tahun Pengalaman</strong></p>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
        <div class="count-box">
          <i class="bi bi-emoji-smile"></i>
          <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="4" class="purecounter"></span>
          <p><strong>Klien Puas</strong></p>
        </div>
      </div>

    </div>

  </div>
</section><!-- End Counts Section -->

    <!-- Services Section -->
    <section id="services" class="section services">

      <div class="container">
        <h2 class="text-center mb-5">Kunggulan Perusahaan Kami</h2>
        <div class="row gy-4">
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item  position-relative">
              <div class="icon">
                <i class="fas fa-check-circle"></i>
              </div>
                <h3>Rekam Jejak Terbukti</h3>
              <p>Kami memiliki rekam jejak yang mengesankan dengan berbagai proyek sukses yang mencakup bangunan komersial,
                 perumahan, infrastruktur, dan renovasi. Keberhasilan ini adalah bukti dari dedikasi kami terhadap kualitas
                 dan kepuasan klien.</p>
            </div>
          </div><!-- End Service Item -->
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="fas fa-cogs"></i>
              </div>
                <h3>Teknologi Canggih</h3>
              <p>Kami memanfaatkan teknologi terkini dalam proses konstruksi, seperti Building Information Modeling (BIM) dan metode konstruksi prefabrikasi, untuk meningkatkan efisiensi,
                 akurasi, dan kualitas hasil akhir. Ini memungkinkan kami untuk menyelesaikan proyek dengan lebih cepat dan lebih efektif.</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="fas fa-award"></i>
              </div>
                <h3>Komitmen terhadap Kualitas</h3>
              <p>Kami berkomitmen untuk memberikan hasil berkualitas tinggi di setiap proyek. Dari pemilihan bahan hingga penyelesaian akhir,
                 kami memastikan setiap detail diperhatikan dengan seksama untuk menghasilkan karya yang memenuhi dan melebihi harapan klien.</p>
            </div>
          </div><!-- End Service Item -->


        <div class="col-lg-4 col-md-2" data-aos="fade-up" data-aos-delay="200">
          <div class="service-item position-relative">
            <div class="icon">
              <i class="fas fa-users"></i>
            </div>
              <h3>Tim Profesional yang Berpengalaman</h3>
            <p>Tim kami terdiri dari arsitek, insinyur, dan manajer proyek yang sangat berpengalaman dan terlatih.
               Mereka selalu siap menghadapi tantangan dan memberikan solusi inovatif untuk setiap proyek konstruksi.</p>
          </div>
        </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-2" data-aos="fade-up" data-aos-delay="500">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="fas fa-shield-alt"></i>
              </div>
                <h3>Keamanan dan Kepatuhan</h3>
              <p>Keselamatan kerja adalah prioritas utama kami. Kami menerapkan standar keselamatan yang ketat dan memastikan bahwa semua proyek kami
                 mematuhi peraturan dan regulasi yang berlaku. Kami berkomitmen untuk menciptakan lingkungan kerja yang aman bagi karyawan dan kontraktor kami.</p>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-2" data-aos="fade-up" data-aos-delay="600">
            <div class="service-item position-relative">
              <div class="icon">
                <i class="fas fa-headset"></i>
              </div>
                <h3>Layanan Pelanggan yang Luar Biasa</h3>
              <p>Kami percaya bahwa komunikasi yang baik adalah kunci kesuksesan setiap proyek. Kami selalu berkomunikasi dengan klien secara transparan dan terbuka,
                 memastikan bahwa mereka selalu mendapatkan informasi terkini tentang perkembangan proyek mereka. Kepuasan klien adalah tujuan utama kami.</p>
            </div>
          </div><!-- End Service Item -->

        </div>

      </div>

    </section><!-- /Services Section -->

    <section id="faq">
      <div class="container" data-aos="fade-up" data-aos-delay="100">
          <div class="section-header mb-5" data-aos="fade-up" data-aos-delay="200">
              <h2 class="text-center">Pertanyaan Yang Sering Diajukan</h2>
          </div>
          <ul class="faq-list">
              <!-- FAQ Item 1 -->
              <li>
                  <div class="question" href="#faq1" data-aos="fade-up" data-aos-delay="200">
                      Bagaimana cara mendapatkan penawaran untuk proyek saya?
                      <i class="bi bi-chevron-down icon-show"></i>
                      <i class="bi bi-chevron-up icon-close"></i>
                  </div>
                  <div id="faq1" class="collapse">
                      <p>Anda dapat menghubungi tim kami melalui formulir kontak di situs web kami atau langsung melalui email/telepon. Tim kami akan mengatur pertemuan untuk mendiskusikan rincian proyek Anda dan memberikan penawaran berdasarkan kebutuhan Anda.</p>
                  </div>
              </li>
              <!-- FAQ Item 2 -->
              <li>
                  <div class="question" href="#faq2" data-aos="fade-up" data-aos-delay="300">
                      Berapa lama waktu yang dibutuhkan untuk menyelesaikan proyek konstruksi?
                      <i class="bi bi-chevron-down icon-show"></i>
                      <i class="bi bi-chevron-up icon-close"></i>
                  </div>
                  <div id="faq2" class="collapse">
                      <p>Lama waktu penyelesaian proyek bervariasi tergantung pada skala dan kompleksitas proyek. Setelah evaluasi awal, kami akan memberikan estimasi waktu yang realistis untuk penyelesaian proyek Anda.</p>
                  </div>
              </li>
              <!-- FAQ Item 3 -->
              <li>
                  <div class="question" href="#faq3" data-aos="fade-up" data-aos-delay="400">
                      Apakah Anda menawarkan garansi untuk pekerjaan konstruksi?
                      <i class="bi bi-chevron-down icon-show"></i>
                      <i class="bi bi-chevron-up icon-close"></i>
                  </div>
                  <div id="faq3" class="collapse">
                      <p>Ya, kami memberikan garansi untuk semua pekerjaan konstruksi kami. Rincian garansi akan dibahas dan disepakati dalam kontrak proyek.</p>
                  </div>
              </li>
              <!-- FAQ Item 4 -->
              <li>
                  <div class="question" href="#faq4" data-aos="fade-up" data-aos-delay="500">
                      Bagaimana Anda memastikan kualitas dan keselamatan dalam proyek konstruksi?
                      <i class="bi bi-chevron-down icon-show"></i>
                      <i class="bi bi-chevron-up icon-close"></i>
                  </div>
                  <div id="faq4" class="collapse">
                      <p>Kami mematuhi standar industri tertinggi untuk kualitas dan keselamatan. Tim kami terdiri dari profesional berpengalaman, dan kami menggunakan bahan berkualitas tinggi serta peralatan terbaru untuk memastikan semua proyek selesai dengan baik.</p>
                  </div>
              </li>
              <!-- FAQ Item 5 -->
              <li>
                  <div class="question" href="#faq5" data-aos="fade-up" data-aos-delay="600">
                      Apakah Anda mengurus perizinan yang diperlukan untuk proyek konstruksi?
                      <i class="bi bi-chevron-down icon-show"></i>
                      <i class="bi bi-chevron-up icon-close"></i>
                  </div>
                  <div id="faq5" class="collapse">
                      <p>Ya, kami akan membantu mengurus semua perizinan yang diperlukan untuk proyek konstruksi Anda. Tim kami berpengalaman dalam menangani berbagai jenis perizinan dan regulasi lokal.</p>
                  </div>
              </li>
              <!-- FAQ Item 6 -->
              <li>
                  <div class="question" href="#faq6" data-aos="fade-up" data-aos-delay="700">
                      Bagaimana cara mengetahui kemajuan proyek saya?
                      <i class="bi bi-chevron-down icon-show"></i>
                      <i class="bi bi-chevron-up icon-close"></i>
                  </div>
                  <div id="faq6" class="collapse">
                      <p>Kami menyediakan laporan berkala dan update kepada klien kami mengenai kemajuan proyek. Anda juga dapat menghubungi manajer proyek Anda kapan saja untuk mendapatkan informasi terbaru.</p>
                  </div>
              </li>
          </ul>
      </div>
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
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="fa-solid fa-caret-up"></i></a>

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

    <script>
document.addEventListener("DOMContentLoaded", function() {
    var faqItems = document.querySelectorAll(".faq-list .question");

    faqItems.forEach(function(item) {
        item.addEventListener("click", function() {
            var targetId = item.getAttribute("href");
            var target = document.querySelector(targetId);

            if (!target) {
                console.error("Target not found for href:", targetId);
                return;
            }

            // Check if the clicked item is already expanded
            var isExpanded = !item.classList.contains("collapsed");

            // Collapse all other FAQ items
            faqItems.forEach(function(otherItem) {
                if (otherItem !== item) {
                    var otherTargetId = otherItem.getAttribute("href");
                    var otherTarget = document.querySelector(otherTargetId);

                    if (otherItem.classList.contains("collapsed") === false) {
                        otherItem.classList.add("collapsed");
                        var otherIconShow = otherItem.querySelector(".icon-show");
                        var otherIconClose = otherItem.querySelector(".icon-close");
                        if (otherIconShow) otherIconShow.style.display = "inline";
                        if (otherIconClose) otherIconClose.style.display = "none";
                        if (otherTarget) otherTarget.classList.add("collapse");
                    }
                }
            });

            // Toggle the clicked item
            item.classList.toggle("collapsed", isExpanded);
            var iconShow = item.querySelector(".icon-show");
            var iconClose = item.querySelector(".icon-close");
            if (iconShow) iconShow.style.display = isExpanded ? "inline" : "none";
            if (iconClose) iconClose.style.display = isExpanded ? "none" : "inline";
            if (target) {
                target.classList.toggle("collapse", isExpanded);
            }
        });
    });
});

    </script>
</body>

</html>