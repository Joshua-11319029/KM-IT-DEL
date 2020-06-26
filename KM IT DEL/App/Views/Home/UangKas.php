<?php

if (isset($_SESSION['AddSuccess'])) {
    echo "<script>alert('Data Kas Berhasil Ditambah!')</script>";
    unset($_SESSION['AddSuccess']);
}

if (isset($_SESSION['AddFailure'])) {
    echo "<script>alert('Prodi Belum Di Pilih! Periksa Data Kembali!')</script>";
    unset($_SESSION['AddFailure']);
}

if (isset($_SESSION['DeleteSuccess'])) {
    echo "<script>alert('Data Berhasil Di Hapus!')</script>";
    unset($_SESSION['DeleteSuccess']);
}

?>

<div class="col-md-10 bg-light">
    <div class="row mt-5">
        <div class="col-md-12 text-center">
            <h1 class="display-5">
                KAS BEM
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

    <div class="row mt-4 ml-2 justify-content-center">
        <div class="tabel-kas col-md-12">

        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Uang Kas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL ?>Home/TambahKas" method="post">
                    <div class="row form-group">
                        <div class="col-md-5">
                            <label for="deskripsi"><b>Deskripsi</b></label>
                            <input type="text" class="form-control" name="deskripsi" placeholder="Masukkan Deksripsi" autocomplete="off" required>
                        </div>

                        <div class="col-md-5">
                            <label for="prodi"><b>Prodi</b></label>
                            <select name="prodi" id="prodi" class="form-control">
                                <option value="0">Choose..</option>
                                <option value="BEM">BEM</option>
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
                    </div>

                    <div class="row form-group">
                        <div class="col-md-3">
                            <label for="anggota"><b>Jumlah Anggota</b></label>
                            <input type="text" name="anggota" class="form-control" placeholder="Jumlah Anggota" autocomplete="off" required>
                        </div>
                        <div class="col-md-6">
                            <label for="kas"><b>Kas / Orang</b></label>
                            <input type="text" name="kas" class="form-control" placeholder="CTH : 5000/Orang (Masukkan Angka Saja)" autocomplete="off" required>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-6">
                            <label for="pembayaran"><b>Pembayaran</b></label>
                            <input type="text" name="pembayaran" class="form-control" placeholder="Masukkan Total Pemasukan" autocomplete="off" required>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="reset" class="btn btn-danger">Reset</button>
                <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>