<table class="table table-hover table-bordered">
    <thead>
        <th scope="col">#</th>
        <th scope="col">Username</th>
        <th scope="col">Password</th>
        <th scope="col">Nama Kadep</th>
        <th scope="col">Prodi</th>
        <th scope="col">Departemen</th>
        <th scope="col">Action</th>
    </thead>

    <tbody>
        <?php
        $counter = 1;
        if (count($data['Kadep']) > 0) {
            foreach ($data['Kadep'] as $Kadep) { ?>
                <tr>
                    <th scope="col"><?= $counter ?></th>
                    <td><?= $Kadep['username'] ?></td>
                    <td><?= $Kadep['password'] ?></td>
                    <td><?= $Kadep['nama_kadep'] ?></td>
                    <td><?= $Kadep['prodi_kadep'] ?></td>
                    <td><?= $Kadep['departemen'] ?></td>
                    <td><a href="<?= BASEURL ?>Home/HapusKadep/<?= $Kadep['username'] ?>" class="btn btn-danger" onclick="return confirm('Yakin ingin Menghapus data ini?')">Hapus</a></td>
                </tr>
            <?php
                $counter++;
            }
        } else { ?>
            <td colspan="7">Data Tidak Ditemukan!</td>
        <?php
        }
        ?>
    </tbody>
</table>