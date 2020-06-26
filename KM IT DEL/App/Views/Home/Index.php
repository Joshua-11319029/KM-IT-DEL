<?php

if (isset($_SESSION['LoginSuccess'])) {
    echo "<script>alert('Selamat Datang di KM IT DEL!')</script>";
    unset($_SESSION['LoginSuccess']);
}

?>


<div class="tempat-dashboard">
    <div class="row mt-5 text-center text-white">
        <div class="col-md-12">
            <h1 class="display-3 font-weight-bold">
                <?php

                if (isset($_SESSION['nama'])) {
                    echo "SELAMAT DATANG" . "<br>" . $_SESSION['nama'] . "!";
                } else { ?>
                    SELAMAT DATANG<br>DI KM IT DEL!
                <?php
                }
                ?>
            </h1>
        </div>
    </div>
    <?php

    if (isset($_SESSION['role']) || isset($_SESSION['nama'])) { ?>
        <div class="row mt-5 text-center">
            <div class="col-md-12">
                <button class="btn btn-outline-dark font-weight-bold" data-toggle="modal" data-target="#staticBackdrop"><b>MENU</b></button>
            </div>
        </div>
    <?php
    }
    ?>
</div>


<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h5 class="modal-title font-weight-bold" id="staticBackdropLabel">MENU</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Card -->
                <?php
                if ($_SESSION['role'] == 'administrator') { ?>
                    <div class="card text-center mt-4">
                        <div class="card-header">
                            <h6 class="display-5 font-weight-bold">DATABASE</h6>
                        </div>
                        <div class="card-body">
                            <h1 class="card-title font-weight-bold">DATA KADEP</h1>
                            <h1 class="card-text font-weight-bold"><?= count($data['Kadep']) ?> Orang</h1>
                            <a href="<?= BASEURL ?>Home/DataKadep" class="btn btn-success font-weight-bold">Manage &raquo;</a>
                        </div>
                    </div>

                    <div class="card text-center mt-4">
                        <div class="card-header">
                            <h6 class="display-5 font-weight-bold">ADMINISTRASI</h6>
                        </div>
                        <div class="card-body">
                            <h1 class="card-title font-weight-bold">UANG KAS BEM</h1>
                            <h1 class="card-text font-weight-bold">
                                <?php
                                $total = 0;
                                if (count($data['Kas']) > 0) {
                                    foreach ($data['Kas'] as $Kas) {
                                        $total += $Kas['pembayaran'];
                                    }
                                    echo "Rp. " . $total;
                                } else {
                                    echo "Rp. 0";
                                }
                                ?>
                            </h1>
                            <a href="<?= BASEURL ?>Home/UangKas" class="btn btn-success font-weight-bold">Manage &raquo;</a>
                        </div>
                    </div>

                    <div class="card text-center mt-4">
                        <div class="card-header">
                            <h6 class="display-5 font-weight-bold">ADMINISTRASI</h6>
                        </div>
                        <div class="card-body">
                            <h1 class="card-title font-weight-bold">PENGELUARAN</h1>
                            <h1 class="card-text font-weight-bold">
                                <?php
                                $total2 = 0;
                                if (count($data['Pengeluaran']) > 0) {
                                    foreach ($data['Pengeluaran'] as $data) {
                                        $total2 += $data['pengeluaran'];
                                    }
                                    echo "Rp. " . $total2;
                                } else {
                                    echo "Rp. 0";
                                }
                                ?>
                            </h1>
                            <a href="<?= BASEURL ?>Home/Pengeluaran" class="btn btn-success font-weight-bold">Manage &raquo;</a>
                        </div>
                    </div>

                    <div class="card text-center mt-4">
                        <div class="card-header">
                            <h6 class="display-5 font-weight-bold">ADMINISTRASI</h6>
                        </div>
                        <div class="card-body">
                            <h1 class="card-title font-weight-bold">SISA UANG KAS</h1>
                            <h1 class="card-text font-weight-bold">
                                <?php
                                $sisa = $total - $total2;
                                echo "Rp. " . $sisa;
                                ?>
                            </h1>
                        </div>
                    </div>
                <?php
                } else if ($_SESSION['role'] == 'kadep') { ?>
                    <div class="card text-center mt-4">
                        <div class="card-header">
                            <h6 class="display-5 font-weight-bold">DATABASE</h6>
                        </div>
                        <div class="card-body">
                            <h1 class="card-title font-weight-bold">
                                <?php
                                foreach ($data['detail_kadep'] as $Detail) {
                                    echo $Detail['departemen'];
                                }
                                ?>
                            </h1>
                            <h1 class="card-text font-weight-bold"><?= count($data['jumlah_anggota']) ?> Orang</h1>
                            <a href="<?= BASEURL ?>Home/Departemen" class="btn btn-success font-weight-bold">Manage &raquo;</a>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>