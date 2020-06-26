<?php

if (isset($_SESSION['LoginFailure'])) {
    echo "<script>alert('Account Tidak Valid !')</script>";
    unset($_SESSION['LoginFailure']);
}

if (isset($data['LogoutSuccess'])) {
    echo "<script>alert('Terimakasih Telah Berkunjung!')</script>";
    session_destroy();
    unset($data['LogoutSuccess']);
}

?>


<div class="tempat-dashboard">
    <div class="row mt-5 text-center text-white">
        <div class="col-md-12">
            <h1 class="display-3 font-weight-bold">
                LOGIN
            </h1>
        </div>
    </div>
    <form action="<?= BASEURL ?>Home/ValidasiLogin" method="post">
        <div class="row mt-5 text-center">
            <div class="col-md-12">
                <input type="text" class="form-control" name="username" placeholder="Masukkan Username.." autocomplete="off">
            </div>
        </div>
        <div class="row mt-2 text-center">
            <div class="col-md-12">
                <input type="password" class="form-control" name="password" placeholder="Masukkan Password.." autocomplete="off">
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-2">
                <a href="<?= BASEURL ?>Home/Index" class="btn btn-warning font-weight-bold">KEMBALI</a>
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-success font-weight-bold">LOGIN!</button>
            </div>
        </div>
    </form>
</div>
</div>