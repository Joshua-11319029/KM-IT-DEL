<?php

if (!isset($_SESSION)) {
    session_start();
}

class kas_model
{
    private $tabel = array(
        'Kas' => 'uang_kas'
    );
    private $database;

    public function __construct()
    {
        $this->database = new Database;
    }

    public function TambahKas()
    {
        $id_transaksi = uniqid();
        $total_pembayaran = $_POST['anggota'] * $_POST['kas'];
        $sisa = $total_pembayaran - $_POST['pembayaran'];

        if ($sisa > 0) {
            $status = 'Belum Lunas';
        } else {
            $status = 'Lunas';
        }
        if ($_POST['prodi'] == '0') {
            return 0;
        } else {
            $query = "INSERT INTO " . $this->tabel['Kas'] . "(id_transaksi,deskripsi,prodi,total_pembayaran,pembayaran,sisa,status) VALUES(:id_transaksi,:deskripsi,:prodi,:total_pembayaran,:pembayaran,:sisa,:status)";
            $this->database->query($query);
            $this->database->bind('id_transaksi', $id_transaksi);
            $this->database->bind('deskripsi', $_POST['deskripsi']);
            $this->database->bind('prodi', $_POST['prodi']);
            $this->database->bind('total_pembayaran', $total_pembayaran);
            $this->database->bind('pembayaran', $_POST['pembayaran']);
            $this->database->bind('sisa', $sisa);
            $this->database->bind('status', $status);
            $this->database->execute();

            return $this->database->hitungBaris();
        }
    }

    public function ambilData()
    {
        $keyword = '';
        if (isset($_POST['keyword'])) {
            $keyword = $_POST['keyword'];
        } else {
            $keyword = '';
        }
        $query = "SELECT * FROM " . $this->tabel['Kas'] . " WHERE deskripsi LIKE :keyword OR status LIKE :keyword";
        $this->database->query($query);
        $this->database->bind('keyword', "%$keyword%");
        return $this->database->resultSet();
    }

    public function HapusKas($ID)
    {
        $query = "DELETE FROM " . $this->tabel['Kas'] . " WHERE id_transaksi = :id_transaksi";
        $this->database->query($query);
        $this->database->bind('id_transaksi', $ID);
        $this->database->execute();
        return $this->database->hitungBaris();
    }

    public function ambilId()
    {
        $query = "SELECT * FROM " . $this->tabel['Kas'] . " WHERE id_transaksi = :id_transaksi";
        $this->database->query($query);
        $this->database->bind('id_transaksi', $_POST['id']);
        return $this->database->single();
    }

    public function UpdateTransaksi()
    {
        $sisa = $_POST['total'] - $_POST['pembayaran'];
        if ($sisa <= 0) {
            $_POST['pembayaran'] = $_POST['pembayaran'] + $sisa;
            $sisa = 0;
        }
        $query = "UPDATE " . $this->tabel['Kas'] . " SET pembayaran = :pembayaran ,sisa = :sisa WHERE id_transaksi = :id_transaksi";
        $this->database->query($query);
        $this->database->bind('pembayaran', $_POST['pembayaran']);
        $this->database->bind('sisa', $sisa);
        $this->database->bind('id_transaksi', $_POST['id_transaksi']);
        $this->database->execute();

        return $this->database->hitungBaris();
    }
}
