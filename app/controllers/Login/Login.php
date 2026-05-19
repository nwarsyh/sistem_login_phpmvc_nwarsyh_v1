<?php

class Login extends ControllerLogin

{
    public function __construct() {
        parent::__construct();
    }
    public function indexlogin() {
        $this->loginform();
    }
    public function loginform() {
        $getDataApp['titleweb'] = 'PHPMVC | Login';
        $this->view('login/loginform', $getDataApp);
    }
    public function registerform() {
        $getDataApp['titleweb'] = 'PHPMVC | Register';
        $this->view('login/registerform', $getDataApp);
    }
    public function resetform() {
        $getDataApp['titleweb'] = 'PHPMVC | Reset Password';
        $this->view('login/resetform', $getDataApp);
    }
    public function doLogin() {
        $Username = $_POST['username'];
        $Password = $_POST['password'];
        $Authentication = $this->model('LoginModel')->loginUsers($Username);
        if ($Authentication && password_verify($Password, $Authentication['password'])) {
            session_regenerate_id(true);
            $_SESSION = [];
            $_SESSION['login'] = true;
            $_SESSION['id_login'] = $Authentication['id_login'];
            $_SESSION['username'] = $Authentication['username'];
            $_SESSION['nama_depan'] = $Authentication['nama_depan'];
            $_SESSION['nama_belakang'] = $Authentication['nama_belakang'];
            $_SESSION['foto_profil'] = $Authentication['foto_profil'];
            $namaLengkap = $_SESSION['nama_depan'] . " " . $_SESSION['nama_belakang'];
            echo "<script>
        alert('Selamat Datang " . addslashes($namaLengkap) . "');
        window.location.href = '" . BASEURL . "/dashboard';
      </script>";
            exit;
        } else {
            echo "<script>
                    alert('Mohon Maaf, Username Atau Password Tidak Sesuai');
                    window.location.href = '".BASEURL."/login/loginform'; </script>";
            exit;
        }
    }
    public function doRegister()
    {
        $Password     = $_POST['password'];
        $KonfirmasiPassword  = $_POST['passwordconfirm'];
        if ($Password !== $KonfirmasiPassword) {
            echo "<script>
            alert('Mohon Maaf,, Konfirmasi Password Tidak Sama');
            window.location.href='".BASEURL."/login/registerform';
        </script>";
            exit;
        }
        $FotoProfil = $this->model('LoginModel')->FotoProfil();
        if (!$FotoProfil) {
            return false;
        }
        $_POST['fotoprofil'] = $FotoProfil;

        if ( $this->model('LoginModel')->registrasiUsers($_POST) > 0) {
            echo "<script>
                    alert('Sukses, Registrasi Berhasil Silahkan Login');
                    window.location.href = '".BASEURL."/login/loginform'; </script>";
            exit;
        } else{
            echo "<script>
                    alert('Mohon Maaf, Registrasi Gagal Disimpan');
                    window.location.href = '".BASEURL."/login/registerform'; </script>";
            exit;
        }
    }
    public function doReset()
    {
        $Username = trim($_POST['username']);
        $Authentication = $this->model('LoginModel')->loginUsers($Username);
        if(!$Authentication)
        {
            echo "<script>
            alert('Mohon Maaf, Username Tidak ditemukan');
            window.location.href='".BASEURL."/login/resetpassword';
        </script>";
            exit;
        }
        $Password = trim($_POST['password']);
        $KonfirmasiPassword = trim($_POST['passwordconfirm']);
        if($Password !== $KonfirmasiPassword)
        {
            echo "<script>
            alert('Mohon Maaf, Konfirmasi Password Tidak Sama');
            window.location.href='".BASEURL."/login/lupapassword';
        </script>";
            exit;
        }
        $ResetPassword = $this->model('LoginModel')->ResetPassword($_POST);

        if($ResetPassword > 0)
        {
            echo "<script>
            alert('Password Berhasil Direset Silahkan Login Kembali');
            window.location.href='".BASEURL."/login/loginform';
        </script>";
            exit;
        }
        else
        {
            echo "<script>
            alert('Mohon Maaf, Password Gagal Direset');
            window.location.href='".BASEURL."/login/lupapassword';
        </script>";
            exit;
        }
    }
    public function doLogout()
    {
        session_destroy();
        header('Location: ' . BASEURL . '/login/loginform');
        exit;
    }
}