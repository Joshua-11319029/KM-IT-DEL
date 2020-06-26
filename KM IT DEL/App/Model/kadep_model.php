<?php

if (!isset($_SESSION)) {
    session_start();
}

class kadep_model
{
    private $tabel = array(
        'Akun' => 'account',
        'Detail' => 'detail_kadep',
        'Anggota' => 'anggota'
    );
    private $database;

    public function __construct()
    {
        $this->database = new Database;
    }

    public function ambilData()
    {
        $keyword = '';
        if (isset($_POST['keyword'])) {
            $keyword = $_POST['keyword'];
        } else {
            $keyword = '';
        }

        $query = "SELECT * FROM " . $this->tabel['Akun'] . " INNER JOIN detail_kadep ON detail_kadep.username = account.username WHERE nama_kadep LIKE :keyword OR prodi_kadep LIKE :keyword OR departemen LIKE :keyword";
        $this->database->query($query);
        $this->database->bind('keyword', "%$keyword%");
        return $this->database->resultSet();
    }

    public function TambahKadep()
    {
        if ($_POST['prodi'] == '0' || $_POST['angkatan'] == '0' || $_POST['departemen'] == '0' || $_POST['masa_jabatan'] == '0') {
            return 0;
        } else {
            $role = 'kadep';
            $query = "INSERT INTO " . $this->tabel['Akun'] . " VALUES(:username,:password,:role)";
            $this->database->query($query);
            $this->database->bind('username', $_POST['username']);
            $this->database->bind('password', $_POST['password']);
            $this->database->bind('role', $role);
            $this->database->execute();

            $query = "INSERT INTO " . $this->tabel['Detail'] . " VALUES(:nim,:username,:nama,:prodi,:angkatan,:departemen,:masa_jabatan)";
            $this->database->query($query);
            $this->database->bind('nim', $_POST['nim']);
            $this->database->bind('username', $_POST['username']);
            $this->database->bind('nama', $_POST['nama']);
            $this->database->bind('prodi', $_POST['prodi']);
            $this->database->bind('angkatan', $_POST['angkatan']);
            $this->database->bind('departemen', $_POST['departemen']);
            $this->database->bind('masa_jabatan', $_POST['masa_jabatan']);
            $this->database->execute();

            return $this->database->hitungBaris();
        }
    }

    public function ambilDataByUsername()
    {
        $query = "SELECT * FROM " . $this->tabel['Detail'] . " WHERE username = :username";
        $this->database->query($query);
        $this->database->bind('username', $_SESSION['nama']);

        return $this->database->resultSet();
    }
    public function ambilJumlahByUsername()
    {
        $query = "SELECT * FROM " . $this->tabel['Detail'] . " INNER JOIN anggota ON anggota.departemen_anggota = detail_kadep.departemen WHERE username = :username";
        $this->database->query($query);
        $this->database->bind('username', $_SESSION['nama']);

        return $this->database->resultSet();
    }

    public function TambahAnggota()
    {
        $query = "SELECT * FROM " . $this->tabel['Detail'] . " WHERE username = :username";
        $this->database->query($query);
        $this->database->bind('username', $_SESSION['nama']);
        $data['detail'] = $this->database->resultSet();
        $departemen =  $data['detail'][0]['departemen'];

        if ($_POST['prodi'] == '0' || $_POST['angkatan'] == '0') {
            return 0;
        } else {
            $query = "INSERT INTO " . $this->tabel['Anggota'] . " VALUES(:nim,:nama,:prodi,:angkatan,:departemen)";
            $this->database->query($query);
            $this->database->bind('nim', $_POST['nim']);
            $this->database->bind('nama', $_POST['nama']);
            $this->database->bind('prodi', $_POST['prodi']);
            $this->database->bind('angkatan', $_POST['angkatan']);
            $this->database->bind('departemen', $departemen);
            $this->database->execute();

            return $this->database->hitungBaris();
        }
    }

    public function ambilDataAnggota()
    {
        $keyword = '';
        if (isset($_POST['keyword'])) {
            $keyword = $_POST['keyword'];
        } else {
            $keyword = '';
        }

        $query = "SELECT * FROM " . $this->tabel['Detail'] . " WHERE username = :username";
        $this->database->query($query);
        $this->database->bind('username', $_SESSION['nama']);
        $data['detail'] = $this->database->resultSet();
        $departemen =  $data['detail'][0]['departemen'];

        $query = "SELECT * FROM " . $this->tabel['Anggota'] . " WHERE departemen_anggota = :departemen AND (nama_anggota LIKE :keyword OR prodi_anggota LIKE :keyword OR angkatan_anggota LIKE :keyword)";
        $this->database->query($query);
        $this->database->bind('keyword', "%$keyword%");
        $this->database->bind('departemen', $departemen);
        return $this->database->resultSet();
    }

    public function HapusKadep($username)
    {
        $query = "DELETE FROM " . $this->tabel['Akun'] . " WHERE username = :username";
        $this->database->query($query);
        $this->database->bind('username', $username);
        $this->database->execute();

        return $this->database->hitungBaris();
    }
}
