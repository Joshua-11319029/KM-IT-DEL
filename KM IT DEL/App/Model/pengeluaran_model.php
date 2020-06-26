<?php

if (!isset($_SESSION)) {
    session_start();
}

class pengeluaran_model
{
    private $tabel = array(
        'Pengeluaran' => 'pengeluaran'
    );
    private $database;

    public function __construct()
    {
        $this->database = new Database;
    }

    public function TambahPengeluaran()
    {
        $id_transaksi = uniqid();
        $query = "INSERT INTO " . $this->tabel['Pengeluaran'] . "(id_transaksi,deskripsi,pengeluaran) VALUES(:id_transaksi,:deskripsi,:pengeluaran)";
        $this->database->query($query);
        $this->database->bind('id_transaksi', $id_transaksi);
        $this->database->bind('deskripsi', $_POST['deskripsi']);
        $this->database->bind('pengeluaran', $_POST['pengeluaran']);
        $this->database->execute();

        return $this->database->hitungBaris();
    }

    public function ambilData()
    {
        $keyword = '';
        if (isset($_POST['keyword'])) {
            $keyword = $_POST['keyword'];
        } else {
            $keyword = '';
        }
        $query = "SELECT * FROM " . $this->tabel['Pengeluaran'] . " WHERE deskripsi LIKE :keyword ORDER BY waktu_transaksi DESC";
        $this->database->query($query);
        $this->database->bind('keyword', "%$keyword%");
        return $this->database->resultSet();
    }

    public function HapusPengeluaran($ID)
    {
        $query = "DELETE FROM " . $this->tabel['Pengeluaran'] . " WHERE id_transaksi = :id_tranksaksi";
        $this->database->query($query);
        $this->database->bind('id_transaksi', $ID);
        $this->database->execute();

        return $this->database->hitungBaris();
    }
}
