<?php

if (!isset($_SESSION)) {
    session_start();
}

class login_model
{
    private $tabel = array(
        'Account' => 'account'
    );
    private $database;

    public function __construct()
    {
        $this->database = new Database;
    }

    public function ambilData()
    {
        $query = "SELECT * FROM " . $this->tabel['Account'];
        $this->database->query($query);
        return $this->database->resultSet();
    }
}
