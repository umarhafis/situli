<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.3/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="{{ asset('backend/html/js/perfect-scrollbar.jquery.min.js') }}"></script>
<script src="{{ asset('backend/html/js/waves.js') }}"></script>
<script src="{{ asset('backend/html/js/sidebarmenu.js') }}"></script>
<script src="{{ asset('backend/html/js/custom.min.js') }}"></script>
<script src="{{ asset('backend/assets/node_modules/raphael/raphael-min.js') }}"></script>
<script src="{{ asset('backend/assets/node_modules/morrisjs/morris.min.js') }}"></script>
<script src="{{ asset('backend/assets/node_modules/d3/d3.min.js') }}"></script>
<script src="{{ asset('backend/assets/node_modules/c3-master/c3.min.js') }}"></script>
<script src="{{ asset('backend/html/js/dark-mode.js') }}"></script>
<script src="{{ asset('backend/html/js/dashboard1.js') }}"></script>
<script src="https://kit.fontawesome.com/eae00380fc.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function showActivities(period, event) { 
        event.preventDefault();
        document.getElementById('activitiesToday').classList.add('d-none');
        document.getElementById('activitiesWeek').classList.add('d-none');
        document.getElementById('activitiesMonth').classList.add('d-none');
        
        if (period === 'today') {
            document.getElementById('activitiesToday').classList.remove('d-none');
        } else if (period === 'week') {
            document.getElementById('activitiesWeek').classList.remove('d-none');
        } else if (period === 'month') {
            document.getElementById('activitiesMonth').classList.remove('d-none');
        }
    }
</script>
<script>
    function confirmDeletion(event, id) {
        event.preventDefault();
        
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Anda tidak akan dapat mengembalikan ini!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + id).submit();
                Swal.fire(
                    'Dihapus!',
                    'Data telah dihapus.',
                    'success'
                );
            }
        });
    }
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var navbar = document.querySelector('.topbar');
        window.addEventListener('scroll', function() {
            if (window.scrollY > 10) {
                navbar.classList.add('navbar-shadow');
            } else {
                navbar.classList.remove('navbar-shadow');
            }
        });
    });
</script>

<script>
    const texts = [
        "Selamat Datang Di Tujuh Enam Sarana",
        "Membangun masa depan dimulai dari pondasi yang kuat.",
        "Setiap tiang yang ditancapkan adalah langkah menuju pencapaian besar."
    ];
    const typingSpeed = 100; // Speed in milliseconds per character
    const delayBeforeRestart = 500; // Delay before starting the next text
    const delayAfterText = 2000; // Delay before clearing text
    let textIndex = 0;
    let charIndex = 0;
    const element = document.getElementById("typing-text");

    function type() {
        if (charIndex < texts[textIndex].length) {
            element.textContent += texts[textIndex].charAt(charIndex);
            charIndex++;
            setTimeout(type, typingSpeed);
        } else {
            setTimeout(() => {
                // Clear text after typing
                element.textContent = "";
                charIndex = 0; // Reset character index
                textIndex = (textIndex + 1) % texts.length; // Move to the next text
                setTimeout(type, delayBeforeRestart); // Start typing the next text
            }, delayAfterText); // Delay before clearing text
        }
    }

    type();
</script>

@if (session('welcome'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Login Berhasil!',
        text: '{{ session('welcome') }}',
        confirmButtonText: 'OK'
    });
</script>
@endif

@if ($errors->any())
<script>
    Swal.fire({
        icon: 'error',
        title: 'Error',
        text: '{{ $errors->first() }}',
    });
</script>
@endif

@if (session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: '{{ session('success') }}',
    });
</script>
@endif

@if (session('error'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Error',
        text: '{{ session('error') }}',
    });
</script>
@endif
@stack('scripts')
</body>
</html>
