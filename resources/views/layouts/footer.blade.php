<!-- ========== footer start =========== -->
<footer class="footer py-5 mt-auto">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-6">
                <p class="mb-0 text-muted small">
                    © {{ date('Y') }}
                    <strong>Total Buah Segar</strong> —
                    Dibuat dengan ❤️ untuk sistem manajemen buah terbaik.
                </p>
            </div>
            <div class="col-md-6 text-md-end">
                <span class="text-muted small">
                    Version 1.0.0
                </span>
            </div>
        </div>
    </div>
</footer>
<!-- ========== footer end =========== -->
</main>
<!-- ======== main-wrapper end =========== -->

<!-- ========= All Javascript files linkup ======== -->
<!-- ========= All Javascript files linkup ======== -->
<script src="{{ asset('admin/assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/Chart.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/dynamic-pie-chart.js') }}"></script>
<script src="{{ asset('admin/assets/js/moment.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/fullcalendar.js') }}"></script>
<script src="{{ asset('admin/assets/js/jvectormap.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/world-merc.js') }}"></script>
<script src="{{ asset('admin/assets/js/polyfill.js') }}"></script>
<script src="{{ asset('admin/assets/js/main.js') }}"></script>
<!-- Stack untuk script halaman spesifik -->
<script>
    function toggleTheme() {
        const body = document.body;
        const moon = document.getElementById("iconMoon");
        const sun = document.getElementById("iconSun");

        body.classList.toggle("dark-mode");

        if (body.classList.contains("dark-mode")) {
            moon.style.display = "none";
            sun.style.display = "block";
            localStorage.setItem("theme", "dark");
        } else {
            moon.style.display = "block";
            sun.style.display = "none";
            localStorage.setItem("theme", "light");
        }
    }

    // load saat pertama buka
    window.onload = function() {
        const moon = document.getElementById("iconMoon");
        const sun = document.getElementById("iconSun");

        if (localStorage.getItem("theme") === "dark") {
            document.body.classList.add("dark-mode");
            moon.style.display = "none";
            sun.style.display = "block";
        }
    };
</script>
<script>
    function logoutUser() {
        if (!confirm('Apakah Anda yakin ingin keluar dari sistem?')) return;

        fetch("{{ route('logout') }}", {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json'
                }
            })
            .then(response => {
                if (response.ok) {
                    window.location.href = "{{ route('welcome') }}";
                } else {
                    alert('Gagal logout. Silakan coba lagi.');
                }
            })
            .catch(() => alert('Terjadi kesalahan.'));
    }
</script>

</body>

</html>
