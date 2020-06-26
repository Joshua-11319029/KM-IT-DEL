<?php

if (!isset($_SESSION)) {
    session_start();
}

class Home extends Controller
{
    // Rendering
    public function Index()
    {
        $data['title'] = 'Dashboard';
        $data['Kadep'] = $this->model('kadep_model')->ambilData();
        $data['Kas'] = $this->model('kas_model')->ambilData();
        $data['Pengeluaran'] = $this->model('pengeluaran_model')->ambilData();
        if (isset($_SESSION['role'])) {
            if ($_SESSION['role'] == 'kadep') {
                $data['detail_kadep'] = $this->model('kadep_model')->ambilDataByUsername();
                $data['jumlah_anggota'] = $this->model('kadep_model')->ambilJumlahByUsername();
            }
        }
        $this->view('Templates/Header', $data);
        $this->view('Home/Index', $data);
        $this->view('Templates/Footer');
    }

    public function Login()
    {
        $data['title'] = 'Login';
        $this->view('Templates/Login', $data);
        $this->view('Home/Login');
        $this->view('Templates/Footer');
    }

    public function DataKadep()
    {
        $data['title'] = 'Data Kadep';
        $this->view('Templates/Header', $data);
        $this->view('Templates/Sidebar');
        $this->view('Home/DataKadep');
        $this->view('Templates/Footer');
    }

    public function UangKas()
    {
        $data['title'] = 'Uang Kas';
        $this->view('Templates/Header', $data);
        $this->view('Templates/Sidebar');
        $this->view('Home/UangKas');
        $this->view('Templates/Footer');
    }

    public function Pengeluaran()
    {
        $data['title'] = 'Pengeluaran';
        $this->view('Templates/Header', $data);
        $this->view('Templates/Sidebar');
        $this->view('Home/Pengeluaran');
        $this->view('Templates/Footer');
    }

    public function Departemen()
    {
        $data['title'] = "Departemen";
        $this->view('Templates/Header', $data);
        $this->view('Templates/Sidebar');
        $this->view('Home/Departemen');
        $this->view('Templates/Footer');
    }

    // Table Query
    public function tabelKadep()
    {
        $data['Kadep'] = $this->model('kadep_model')->ambilData();
        $this->view('Home/TabelKadep', $data);
    }
    public function tabelKas()
    {
        $data['Kas'] = $this->model('kas_model')->ambilData();
        $this->view('Home/TabelKas', $data);
    }
    public function tabelPengeluaran()
    {
        $data['Pengeluaran'] = $this->model('pengeluaran_model')->ambilData();
        $this->view('Home/TabelPengeluaran', $data);
    }
    public function tabelAnggota()
    {
        $data['Anggota'] = $this->model('kadep_model')->ambilDataAnggota();
        $this->view('Home/TabelAnggota', $data);
    }

    // Function
    public function ValidasiLogin()
    {
        $data['Akun'] = $this->model('login_model')->ambilData();
        $found = 0;
        $role = false;

        foreach ($data['Akun'] as $Akun) {
            if ($Akun['username'] == $_POST['username'] && $Akun['password'] == $_POST['password']) {
                $_SESSION['nama'] = $Akun['username'];
                $_SESSION['role'] = $Akun['role'];
                $_SESSION['seed'] = rand(100, 123);
                $_SESSION['LoginSuccess'] = true;
                $found = 1;
                break;
            } else {
                $found = 0;
            }
        }

        if ($found == 1) {
            redirect('Home/Index');
        } else {
            $_SESSION['LoginFailure'] = true;
            redirect('Home/Login');
        }
    }

    public function Logout()
    {
        $data['title'] = 'Login';
        $data['LogoutSuccess'] = true;
        $this->view('Templates/Login', $data);
        $this->view('Home/Login', $data);
        $this->view('Templates/Footer');
    }

    public function TambahKadep()
    {
        if ($this->model('kadep_model')->TambahKadep() > 0) {
            $_SESSION['AddSuccess'] = true;
            redirect('Home/DataKadep');
        } else {
            $_SESSION['AddFailure'] = true;
            redirect('Home/DataKadep');
        }
    }

    public function HapusKas($_id)
    {
        if ($this->model('kas_model')->HapusKas($_id)) {
            $_SESSION['DeleteSuccess'] = true;
            redirect('Home/UangKas');
        }
    }

    public function TambahPengeluaran()
    {
        if ($this->model('pengeluaran_model')->TambahPengeluaran() > 0) {
            $_SESSION['AddSuccess'] = true;
            redirect('Home/Pengeluaran');
        }
    }

    public function HapusPengeluaran($_id)
    {
        if ($this->model('pengeluaran_model')->HapusPengeluaran($_id) > 0) {
            $_SESSION['DeleteSuccess'] = true;
            redirect('Home/Pengeluaran');
        }
    }

    public function TambahKas()
    {
        if ($this->model('kas_model')->TambahKas() > 0) {
            $_SESSION['AddSuccess'] = true;
            redirect('Home/UangKas');
        } else {
            $_SESSION['AddFailure'] = true;
            redirect('Home/UangKas');
        }
    }

    public function TambahAnggota()
    {
        if ($this->model('kadep_model')->TambahAnggota() > 0) {
            $_SESSION['AddSuccess'] = true;
            redirect('Home/Departemen');
        } else {
            $_SESSION['AddFailure'] = true;
            redirect('Home/Departemen');
        }
    }

    public function HapusKadep($username)
    {
        if ($this->model('kadep_model')->HapusKadep($username) > 0) {
            $_SESSION['DeleteSuccess'] = true;
            redirect('Home/DataKadep');
        }
    }

    public function UpdateTransaksiId()
    {
        echo json_encode($this->model('kas_model')->ambilId());
    }

    public function UpdateTransaksi()
    {
        if ($this->model('kas_model')->UpdateTransaksi() > 0) {
            $_SESSION['UpdateSuccess'] = true;
            redirect('Home/UangKas');
        }
    }
}
