<table class="table table-hover table-bordered">
    <thead>
        <th scope="col">#</th>
        <th scope="col">Deskripsi</th>
        <th scope="col">Prodi / Organisasi</th>
        <th scope="col">Pembayaran</th>
        <th scope="col">Hutang</th>
        <th scope="col">Status</th>
        <th scope="col">Waktu Transaksi</th>
        <th scope="col" colspan="2">Action</th>
    </thead>

    <tbody>
        <?php
        $counter = 1;
        if (count($data['Kas']) > 0) {
            foreach ($data['Kas'] as $Kas) { ?>
                <tr>
                    <th scope="col"><?= $counter ?></th>
                    <td><?= $Kas['deskripsi'] ?></td>
                    <td><?= $Kas['prodi'] ?></td>
                    <td>Rp. <?= $Kas['pembayaran'] ?></td>
                    <td>Rp. <?= $Kas['sisa'] ?></td>
                    <td><?= $Kas['status'] ?></td>
                    <td><?= $Kas['waktu_transaksi'] ?></td>
                    <td><a href="#" data-toggle="modal" data-target="#staticBackdrop-update" data-id="<?= $Kas['id_transaksi'] ?>" class="btn btn-info UpdateKas">Update</a></td>
                    <td><a href="<?= BASEURL ?>Home/HapusKas/<?= $Kas['id_transaksi'] ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin?')">Hapus</a></td>
                </tr>
            <?php
                $counter++;
            }
        } else { ?>
            <td colspan="9">Data Tidak Ditemukan!</td>
        <?php
        }
        ?>
    </tbody>
</table>

<div class="modal fade" id="staticBackdrop-update" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Update Kas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL ?>Home/UpdateTransaksi" method="post">
                    <input type="hidden" name="id_transaksi" id="A" class="form-control">
                    <input type="hidden" name="total" id="B" class="form-control">
                    <div class="row form-group">
                        <div class="col-md-8">
                            <label for="pembayaran"><b>Update Value</b></label>
                            <input type="text" name="pembayaran" id="C" class="form-control" placeholder="Masukkan Pembayaran Baru">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.UpdateKas').on('click', function() {
            const id = $(this).data('id');
            console.log(id);
            $.ajax({
                url: "http://localhost/KM%20IT%20DEL/Home/UpdateTransaksiId",
                data: {
                    id: id
                },
                method: "POST",
                dataType: "json",
                success: function(data) {
                    $("#A").val(data.id_transaksi);
                    $("#B").val(data.total_pembayaran);
                    $("#C").val(data.pembayaran);
                }
            });
        });
    });
</script>