<table class="table table-hover table-bordered">
    <thead>
        <th scope="col">#</th>
        <th scope="col">Nama</th>
        <th scope="col">Prodi</th>
        <th scope="col">Angkatan</th>
        <th scope="col">Departemen</th>
        <th scope="col">Action</th>
    </thead>

    <tbody>
        <?php
        $counter = 1;
        if (count($data['Anggota']) > 0) {
            foreach ($data['Anggota'] as $Anggota) { ?>
                <tr>
                    <th scope="row"><?= $counter ?></th>
                    <td><?= $Anggota['nama_anggota'] ?></td>
                    <td><?= $Anggota['prodi_anggota'] ?></td>
                    <td><?= $Anggota['angkatan_anggota'] ?></td>
                    <td><?= $Anggota['departemen_anggota'] ?></td>
                    <td><a href="" class="btn btn-danger">Hapus</a></td>
                </tr>
            <?php
                $counter++;
            }
        } else { ?>
            <td colspan="6">Data Tidak Ditemukan!!</td>
        <?php
        }
        ?>
    </tbody>
</table>