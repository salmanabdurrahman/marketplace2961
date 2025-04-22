<?php
if ($this->session->flashdata("pesan_sukses")) {
    echo "
    <div class='alert alert-success container' role='alert'>
        " . $this->session->flashdata("pesan_sukses") . "
    </div>
    ";
}

if ($this->session->flashdata("pesan_error")) {
    echo "
    <div class='alert alert-danger container' role='alert'>
        " . $this->session->flashdata("pesan_error") . "
    </div>
    ";
}
?>