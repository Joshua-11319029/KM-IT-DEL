<table class="table table-hover table-bordered">
    <thead>
        <th scope="col">#</th>
        <th scope="col">Deskripsi</th>
        <th scope="col">Total Pengeluaran</th>
        <th scope="col">Waktu Transaksi</th>
        <th scope="col">Action</th>
    </thead>

    <tbody>
        <?php
        $counter = 1;
        if (count($data['Pengeluaran']) > 0) {
            foreach ($data['Pengeluaran'] as $Pengeluaran) { ?>
                <tr>
                    <th scope="row"><?= $counter ?></th>
                    <td><?= $Pengeluaran['deskripsi'] ?></td>
                    <td>Rp. <?= $Pengeluaran['pengeluaran'] ?></td>
                    <td><?= $Pengeluaran['waktu_transaksi'] ?></td>
                    <td><a href="<?= BASEURL ?>Home/HapusPengeluaran/<?= $Pengeluaran['id_transaksi'] ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin??')">Hapus</a></td>
                </tr>
            <?php
                $counter++;
            }
        } else { ?>
            <td colspan="5">Data Tidak Ditemukan!</td>
        <?php
        }
        ?>
    </tbody>
</table>