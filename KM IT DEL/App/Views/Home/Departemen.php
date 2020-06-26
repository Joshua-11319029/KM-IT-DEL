<?php

if (isset($_SESSION['AddSuccess'])) {
    echo "<script>alert('Berhasil Menambahkan Data!')</script>";
    unset($_SESSION['AddSuccess']);
}

if (isset($_SESSION['AddFailure'])) {
    echo "<script>alert('Periksa Data Kembali!!')</script>";
    unset($_SESSION['AddFailure']);
}

?>


<div class="col-md-10 bg-light">
    <div class="row mt-5">
        <div class="col-md-12 text-center">
            <h1 class="display-5">
                Data Departemen
            </h1>
        </div>
    </div>

    <div class="row mt-5 ml-5">
        <div class="col-md-2">
            <button class="btn btn-success" data-toggle="modal" data-target="#staticBackdrop">Tambah Data</button>
        </div>

        <div class="col-md-6">
            <input type="text" id="keyword" class="form-control" placeholder="Masukkan Keyword" autocomplete="off">
        </div>
    </div>

    <div class="row mt-4 ml-5 justify-content-center">
        <div class="tabel-anggota col-md-10">

        </div>
    </div>
</div>

<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Tambah Anggota</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL ?>Home/TambahAnggota" method="post">
                    <div class="row form-group">
                        <div class="col-md-5">
                            <label for="nim"><b>NIM</b></label>
                            <input type="text" name="nim" class="form-control" placeholder="Masukkan NIM" autocomplete="off" required>
                        </div>
                        <div class="col-md-5">
                            <label for="nama"><b>Nama</b></label>
                            <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama" autocomplete="off" required>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-5">
                            <label for="prodi"><b>Prodi</b></label>
                            <select name="prodi" class="form-control" id="prodi">
                                <option value="0">Choose..</option>
                                <option value="D3 TI">D3 TI</option>
                                <option value="D3 TK">D3 TK</option>
                                <option value="D4 TRPL">D4 TRPL</option>
                                <option value="S1 IF">S1 IF</option>
                                <option value="S1 TE">S1 TE</option>
                                <option value="S1 SI">S1 SI</option>
                                <option value="S1 MR">S1 MR</option>
                                <option value="S1 BP">S1 BP</option>
                            </select>
                        </div>

                        <div class="col-md-5">
                            <label for="angkatan"><b>Angkatan</b></label>
                            <select name="angkatan" id="angkatan" class="form-control">
                                <option value="0">Choose...</option>
                                <option value="2018">2018</option>
                                <option value="2019">2019</option>
                            </select>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
                <button type="submit" class="btn btn-success">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>