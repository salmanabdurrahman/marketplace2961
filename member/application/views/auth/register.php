<style>
    body {
        background-color: #f7f7f7;
    }

    .form-signup-card {
        border-radius: 1rem;
    }
</style>

<main class="container">
    <div class="row justify-content-center align-items-center py-5">
        <div class="col-md-8 col-lg-7 col-xl-6">
            <div class="card border-0 shadow-lg form-signup-card">
                <div class="card-body p-4 p-sm-5">
                    <div class="text-center mb-4">
                        <h3 class="fw-bold">Buat Akun Baru</h3>
                        <p class="text-muted">Isi data di bawah untuk menjadi member TokoKita.</p>
                    </div>
                    <form action="<?php echo base_url('register'); ?>" method="post">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama" name="nama_member"
                                value="<?php echo set_value("nama_member"); ?>">
                            <div class="text-danger small mt-1"><?php echo form_error("nama_member"); ?></div>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email_member" autofocus
                                value="<?php echo set_value("email_member"); ?>">
                            <div class="text-danger small mt-1"><?php echo form_error("email_member"); ?></div>
                        </div>
                        <div class="mb-3">
                            <label for="wa" class="form-label">WhatsApp</label>
                            <input type="text" class="form-control" id="wa" name="wa_member"
                                value="<?php echo set_value("wa_member"); ?>">
                            <div class="text-danger small mt-1"><?php echo form_error("wa_member"); ?></div>
                        </div>
                        <div class="mb-3">
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
                        <div class="mb-3">
                            <label for="kode_distrik_member" class="form-label">Pilih Lokasi</label>
                            <select name="kode_distrik_member" id="kode_distrik_member" class="form-select" disabled>
                                <option value="">Cari lokasi terlebih dahulu</option>
                            </select>
                            <div class="text-danger small mt-1"><?php echo form_error("kode_distrik_member"); ?></div>
                        </div>
                        <div class="mb-3">
                            <label for="alamat_member" class="form-label">Detail Alamat</label>
                            <textarea name="alamat_member" id="alamat_member" class="form-control" rows="2"
                                placeholder="Contoh: Jl. Merdeka No. 12, RT 03/RW 05"><?php echo set_value("alamat_member"); ?></textarea>
                            <div class="text-danger small mt-1"><?php echo form_error("alamat_member"); ?></div>
                        </div>
                        <input type="hidden" name="nama_distrik_member" id="nama_distrik_member">
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password_member"
                                value="<?php echo set_value("password_member"); ?>">
                            <div class="text-danger small mt-1"><?php echo form_error("password_member"); ?></div>
                        </div>
                        <div class="d-grid mt-4">
                            <button type="submit" class="btn btn-primary btn-lg">Register</button>
                        </div>
                    </form>
                    <div class="text-center mt-4">
                        <small>Sudah punya akun? <a href="<?php echo base_url('login'); ?>"
                                style="color: let(--green-accent);" class="fw-semibold">Login di sini</a></small>
                    </div>
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
                url: "<?php echo base_url('register/cari_lokasi_ajax'); ?>",
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
            $('#nama_distrik_member').val(namaLengkap);
            $('#kode_distrik_member').val(kodeDistrik);
        });
    });
</script>