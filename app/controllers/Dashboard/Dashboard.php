<?php

class Dashboard extends ControllerLogin
{
    public function __construct() {
        parent::__construct();
        $this->authRequired();
    }
    public function indexlogin() {
        $this->dashboard();
    }
    public function dashboard()
    {
        $getDataApp['titleweb'] = 'Dashboard | Login MVC v1';
        $getDataApp['subtitlewebDashboard'] = $this->model('DashboardModel')->GetDashboard();
        $this->view('dashboard/dashboard', $getDataApp);

    }
    public function UpdateData()
    {
        $Username = $_SESSION['username'];
        $Authentication = $this->model('DashboardModel')->loginUsers($Username);
        $PasswordLama = trim($_POST['passwordlama']);
        if(password_verify($PasswordLama, $Authentication['password']))
        {
            $Password = trim($_POST['password']);
            $KonfirmasiPassword  = trim($_POST['passwordconfirm']);
            if ($Password !== $KonfirmasiPassword) {
                echo "<script> 
                        alert('Mohon Maaf,, Konfirmasi Password Tidak Sama');
                        window.location.href='".BASEURL."/dashboard';</script>";
                exit;
            }
            $FotoProfilLama = $_POST['fotoprofillama'];
            if ($_FILES['fotoprofil']['error'] !== 4) {
                if (file_exists('public/image/profilimage/' . $FotoProfilLama)) {
                    $fileLama = 'public/image/profilimage/' . $FotoProfilLama;
                    if (!empty($FotoProfilLama) && file_exists($fileLama)) {
                        unlink($fileLama);
                    }
                }
                $FotoProfil = $this->model('DashboardModel')->FotoProfil();
            } else{
                $FotoProfil = $FotoProfilLama;
            }
            $_POST['fotoprofil'] = $FotoProfil;
            $UpdateData = $this->model('DashboardModel')->UbahData($_POST);
            if ($UpdateData !== false) {
                // JIKA PASSWORD DIUBAH
                if(!empty($Password))
                {
                    session_destroy();
                    echo "<script>alert('Password Berhasil Diubah Silahkan Login Kembali');
                                window.location.href = '".BASEURL."/login/loginform';
                                </script>";
                    exit;
                }
                // JIKA HANYA UBAH PROFIL
                echo "<script>
                    alert('Data Anda Berhasil Diubah');
                    window.location.href = '".BASEURL."/dashboard'; </script>";
                exit;
            } else if($UpdateData === 0) {
                echo "Tidak ada perubahan data";
            }else{
                echo "<script>
                    alert('Mohon Maaf, Data Anda Gagal Diubah');
                    window.location.href = '".BASEURL."/dashboard';
                    </script>";
                exit;
            }
        }
        else
        {
            echo "<script>
                    alert('Mohon Maaf, Password Lama Tidak Sama');
                    window.location.href = '".BASEURL."/dashboard'; </script>";
            exit;
        }
    }

}