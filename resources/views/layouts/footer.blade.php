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
<script src="{{ asset('admin/assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/Chart.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/dynamic-pie-chart.js') }}"></script>
<script src="{{ asset('admin/assets/js/moment.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/fullcalendar.js') }}"></script>
<script src="{{ asset('admin/assets/js/jvectormap.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/world-merc.js') }}"></script>
<script src="{{ asset('admin/assets/js/polyfill.js') }}"></script>
<script src="{{ asset('admin/assets/js/main.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script src="https://cdn.datatables.net/1.13.8/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.8/js/dataTables.bootstrap5.min.js"></script>

<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.bootstrap5.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>

<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
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
