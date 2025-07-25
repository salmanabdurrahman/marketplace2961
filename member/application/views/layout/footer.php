<footer class="footer mt-auto py-4 text-white" style="background-color: var(--green-dark);">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 text-center text-md-start mb-2 mb-md-0">
                <span class="small">&copy; 2025 TokoKita. Dibuat dengan <i class="bi bi-heart-fill text-danger"></i>
                    oleh Salman Abdurrahman.</span>
            </div>
            <div class="col-md-6 text-center text-md-end">
                <a href="#" class="text-white me-3"><i class="bi bi-facebook"></i></a>
                <a href="#" class="text-white me-3"><i class="bi bi-instagram"></i></a>
                <a href="#" class="text-white"><i class="bi bi-twitter-x"></i></a>
            </div>
        </div>
    </div>
</footer>
<!-- Login Modal -->
<section class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="loginModalLabel">Login Akun</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url('login'); ?>" method="post">
                    <div class="form-group mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" name="email_member" autofocus
                            value="<?php echo set_value("email_member"); ?>">
                        <div class="text-danger small"><?php echo form_error("email_member"); ?></div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password_member"
                            value="<?php echo set_value("password_member"); ?>">
                        <div class="text-danger small"><?php echo form_error("password_member"); ?></div>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Login</button>
                </form>
                <div class="text-center mt-3">
                    <small>Belum punya akun? <a href="<?php echo base_url('register'); ?>"
                            style="color: var(--green-accent);">Daftar disini</a></small>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Scripts -->
<script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Custom Scripts -->
<script>
    // Inisialisasi DataTable
    if (document.getElementById('myTable')) {
        new DataTable('#myTable');
    }

    // Efek scroll untuk Navbar
    const nav = document.querySelector('.navbar');
    if (nav) {
        function handleScroll() {
            if (window.scrollY > 10) {
                nav.classList.add('navbar-scrolled');
            } else {
                nav.classList.remove('navbar-scrolled');
            }
        }
        window.addEventListener('scroll', handleScroll);
        // Panggil sekali saat load untuk cek posisi awal
        handleScroll();
    }
</script>
<?php
if ($this->session->flashdata("pesan_sukses")) {
    echo "
        <script>
        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: 'success',
            title: '" . $this->session->flashdata("pesan_sukses") . "',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true
        })
        </script>
        ";
}

if ($this->session->flashdata("pesan_error")) {
    echo "
        <script>
        Swal.fire({
            toast: true,
            position: 'top-end',
            icon: 'error',
            title: '" . $this->session->flashdata("pesan_error") . "',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true
        })
        </script>
        ";
}
?>
</body>

</html>