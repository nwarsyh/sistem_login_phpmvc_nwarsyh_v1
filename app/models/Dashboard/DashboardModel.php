<?php

class DashboardModel{
    private $TitleLaman = 'Selamat Datang Diaplikasi Sistem Login MVC PHP';
    private $TableLogin = 'tabel_login';
    private $Database;
    public function __construct()
    {
        $this->Database = new DatabaseLogin();
    }
    public function GetDashboard()
    {
        return $this->TitleLaman;
    }
    public function loginUsers($loginUsers)
    {
        $this->Database->query('SELECT * FROM ' . $this->TableLogin . ' WHERE username=:username');
        $this->Database->bind('username', $loginUsers);
        return $this->Database->single();
    }
    public function FotoProfil()
    {
        $NamaFotoProfil = $_FILES['fotoprofil']['name'];
        $UkuranFotoProfil = $_FILES['fotoprofil']['size'];
        $ErrorUploadFotoProfil = $_FILES['fotoprofil']['error'];
        $TempatSimpanFotoProfil = $_FILES['fotoprofil']['tmp_name'];
        if( $UkuranFotoProfil > 1000000 ) {
            echo "<script>
				alert('Mohon Maaf, Max Size Foto = 1 MB');
			  </script>";
            return false;
        }
        if( $ErrorUploadFotoProfil === 4 ) {
            echo "<script>
				alert('Mohon Maaf, Silahkan Pilih Photo Profil Anda');
			  </script>";
            return false;
        }
        $EkstensiValidFotoProfil = ['jpg', 'jpeg', 'png'];
        $EkstensiFotoProfil = explode('.', $NamaFotoProfil);
        $EkstensiFotoProfil = strtolower(end($EkstensiFotoProfil));
        if( !in_array($EkstensiFotoProfil, $EkstensiValidFotoProfil) ) {
            echo "<script>
				alert('Mohon Maaf, Format Yang Diizinkan Berupa (jpg,jpeg,png)');
			  </script>";
            return false;
        }
        $NamaFileSimpanFotoProfil = uniqid();
        $NamaFileSimpanFotoProfil .= '.';
        $NamaFileSimpanFotoProfil .= $EkstensiFotoProfil;
        move_uploaded_file($TempatSimpanFotoProfil, 'public/assets/img/' . $NamaFileSimpanFotoProfil);
        return $NamaFileSimpanFotoProfil;
    }
    public function UbahData($ubahData)
    {
        $this->Database->query("UPDATE {$this->TableLogin} SET
        nama_depan =:namadepan,
        nama_belakang =:namabelakang,
        username =:username,
        password =:password,
        foto_profil =:fotoprofil
        WHERE id_login =:id_login");
        $passwordHash = password_hash($ubahData['password'], PASSWORD_DEFAULT);
        $this->Database->bind('namadepan', $ubahData['namadepan']);
        $this->Database->bind('namabelakang', $ubahData['namabelakang']);
        $this->Database->bind('username', $ubahData['username']);
        $this->Database->bind('password', $passwordHash);
        $this->Database->bind('fotoprofil', $ubahData['fotoprofil']);
        $this->Database->bind('id_login', $ubahData['id_login']);
        $this->Database->execute();
        return $this->Database->rowCount();
    }
}