<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="loginModalLabel">Login</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url('login'); ?>" method="post">
          <div class="form-group mb-3">
            <label for="email">Email</label>
            <input type="text" class="form-control" id="email" name="email_member" autofocus
              value="<?php echo set_value("email_member"); ?>">
            <div class="text-danger small"><?php echo form_error("email_member"); ?></div>
          </div>
          <div class="form-group mb-3">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password_member"
              value="<?php echo set_value("password_member"); ?>">
            <div class="text-danger small"><?php echo form_error("password_member"); ?></div>
          </div>
          <button type="submit" class="btn btn-primary">Login</button>
        </form>
      </div>
    </div>
  </div>
</div>
<footer class="bg-light text-center py-3 mt-5">
  <div>copyright &copy; 2025. Amikom</div>
</footer>
<!-- DataTable -->
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.js"></script>
<!-- Sweetalert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
  new DataTable('#myTable');
</script>
<?php
if ($this->session->flashdata("pesan_sukses")) {
  echo "
    <script>
      Swal.fire({
        icon: 'success',
        title: 'Sukses',
        text: '" . $this->session->flashdata("pesan_sukses") . "'
      })
    </script>
    ";
}

if ($this->session->flashdata("pesan_error")) {
  echo "
    <script>
      Swal.fire({
        icon: 'error',
        title: 'Gagal',
        text: '" . $this->session->flashdata("pesan_error") . "'
      })
    </script>
    ";
}
?>
</body>

</html>