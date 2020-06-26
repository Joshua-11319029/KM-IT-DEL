<?php

if (isset($_SESSION['AddSuccess'])) {
    echo "<script>alert('Pengeluaran Berhasil Ditambahkan!')</script>";
    unset($_SESSION['AddSuccess']);
}

if (isset($_SESSION['DeleteSuccess'])) {
    echo "<script>alert('Berhasil Menghapus Data!')</script>";
    unset($_SESSION['DeleteSuccess']);
}

?>

<div class="col-md-10 bg-light">
    <div class="row mt-5">
        <div class="col-md-12 text-center">
            <h1 class="display-5">
                PENGELUARAN BEM
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
        <div class="tabel-pengeluaran col-md-10">

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
                <form action="<?= BASEURL ?>Home/TambahPengeluaran" method="post">
                    <div class="row form-group">
                        <div class="col-md-10">
                            <label for="deskripsi"><b>Deskripsi</b></label>
                            <input type="text" class="form-control" name="deskripsi" placeholder="Masukkan Deksripsi" autocomplete="off" required>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-6">
                            <label for="pengeluaran"><b>Pembayaran</b></label>
                            <input type="text" name="pengeluaran" class="form-control" placeholder="Masukkan Total Pengeluaran" autocomplete="off" required>
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