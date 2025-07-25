<style>
    .form-control:focus,
    .form-select:focus {
        border-color: var(--green-accent);
        box-shadow: 0 0 0 0.25rem rgba(58, 90, 64, 0.25);
    }
</style>

<main class="container py-5">
    <div class="row">
        <div class="col-lg-3 mb-4 mb-lg-0">
            <?php require APPPATH . 'views/layout/customer-sidebar.php'; ?>
        </div>
        <div class="col-lg-9">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white py-3">
                    <h5 class="mb-0">Ubah Profil Akun</h5>
                </div>
                <div class="card-body p-4">
                    <form action="<?php echo base_url('akun'); ?>" method="post">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="nama_member" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama_member" name="nama_member"
                                    value="<?php echo set_value("nama_member", $this->session->userdata("nama_member")); ?>">
                                <div class="text-danger small mt-1"><?php echo form_error("nama_member"); ?></div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="email_member" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email_member" name="email_member"
                                    value="<?php echo set_value("email_member", $this->session->userdata("email_member")); ?>">
                                <div class="text-danger small mt-1"><?php echo form_error("email_member"); ?></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="wa_member" class="form-label">Nomor WhatsApp</label>
                                <input type="text" class="form-control" id="wa_member" name="wa_member"
                                    value="<?php echo set_value("wa_member", $this->session->userdata("wa_member")); ?>">
                                <div class="text-danger small mt-1"><?php echo form_error("wa_member"); ?></div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="search_lokasi" class="form-label">Cari Kecamatan / Kota</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="search_lokasi"
                                        placeholder="Contoh: Sleman, Jakarta Pusat, dll.">
                                    <button type="button" class="btn btn-primary" id="btn-search-lokasi">
                                        <span id="search-icon"><i class="bi bi-search"></i></span>
                                        <span id="loading-spinner" class="spinner-border spinner-border-sm d-none"
                                            role="status" aria-hidden="true"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="kode_distrik_member" class="form-label">Pilih Lokasi</label>
                                <select name="kode_distrik_member" id="kode_distrik_member" class="form-select">
                                    <option value="<?php echo $this->session->userdata("kode_distrik_member"); ?>"
                                        selected><?php echo $this->session->userdata("nama_distrik_member"); ?></option>
                                </select>
                                <div class="text-danger small mt-1"><?php echo form_error("kode_distrik_member"); ?>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3"><label for="alamat_member" class="form-label">Alamat
                                    Lengkap</label><textarea class="form-control" id="alamat_member"
                                    name="alamat_member"
                                    rows="3"><?php echo set_value("alamat_member", $this->session->userdata("alamat_member")); ?></textarea>
                                <div class="text-danger small mt-1"><?php echo form_error("alamat_member"); ?></div>
                            </div>
                        </div>
                        <input type="hidden" name="nama_distrik_member" id="nama_distrik_member">
                        <hr class="my-4">
                        <p class="fw-semibold">Ubah Password</p>
                        <div class="mb-3">
                            <label for="password_member" class="form-label">Password Baru</label>
                            <input type="password" class="form-control" id="password_member" name="password_member">
                            <div class="form-text">*Biarkan kosong jika tidak ingin mengubah password.</div>
                            <div class="text-danger small mt-1"><?php echo form_error("password_member"); ?></div>
                        </div>
                        <button type="submit" class="btn btn-primary px-4 mt-3">Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    $(document).ready(function () {
        function toggleLoading(isLoading) {
            if (isLoading) {
                $('#search-icon').addClass('d-none');
                $('#loading-spinner').removeClass('d-none');
                $('#btn-search-lokasi').prop('disabled', true);
            } else {
                $('#search-icon').removeClass('d-none');
                $('#loading-spinner').addClass('d-none');
                $('#btn-search-lokasi').prop('disabled', false);
            }
        }

        function handleSearch() {
            let keyword = $('#search_lokasi').val();
            if (keyword.length < 3) {
                alert('Masukkan minimal 3 huruf untuk pencarian.');
                return;
            }

            toggleLoading(true);
            $('#kode_distrik_member').html('<option>Mencari...</option>').prop('disabled', true);

            $.ajax({
                url: "<?php echo base_url('akun/cari_lokasi_ajax'); ?>",
                method: "POST",
                data: { keyword: keyword },
                dataType: "json",
                success: function (response) {
                    if (response.data && response.data.length > 0) {
                        let options = '<option value="" selected disabled>Silahkan Pilih Kota/Kabupaten</option>';
                        $.each(response.data, function (key, value) {
                            let displayName = value.subdistrict_name + ', ' + value.district_name + ', ' + value.city_name + ', ' + value.province_name;
                            options += '<option value="' + value.id + '" data-nama="' + displayName + '">' + displayName + '</option>';
                        });
                        $('#kode_distrik_member').html(options).prop('disabled', false);
                    } else {
                        $('#kode_distrik_member').html('<option>Lokasi tidak ditemukan</option>').prop('disabled', true);
                    }
                },
                error: function (jqXHR) {
                    let errorMessage = jqXHR.responseJSON ? jqXHR.responseJSON.message : 'Gagal terhubung ke server.';
                    $('#kode_distrik_member').html('<option>' + errorMessage + '</option>').prop('disabled', true);
                },
                complete: function () {
                    toggleLoading(false);
                }
            });
        }

        $('#btn-search-lokasi').click(handleSearch);

        $('#search_lokasi').on('keypress', function (e) {
            if (e.which === 13) {
                e.preventDefault();
                handleSearch();
            }
        });

        $('#kode_distrik_member').change(function () {
            let namaLengkap = $(this).find('option:selected').data('nama');
            let kodeDistrik = $(this).val();
            $('#nama_distrik_member').val(namaLengkap ?? '<?php echo $this->session->userdata("nama_distrik_member"); ?>');
            $('#kode_distrik_member').val(kodeDistrik ?? '<?php echo $this->session->userdata("kode_distrik_member"); ?>');
        });
    });
</script>