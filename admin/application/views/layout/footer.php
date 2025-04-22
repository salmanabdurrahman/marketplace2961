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