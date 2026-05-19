<?php

class LoginModel
{
    private $TableLogin = 'tabel_login';
    private $Database;
    public function __construct()
    {
        $this->Database = new DatabaseLogin();
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
    public function registrasiUsers($registrasiUsers)
    {
        $this->Database->query("INSERT INTO {$this->TableLogin} VALUES ('', :namadepan, :namabelakang, :username, :password, :fotoprofil)");
        $passwordHash = password_hash($registrasiUsers['password'], PASSWORD_DEFAULT);
        $this->Database->bind('namadepan', $registrasiUsers['namadepan']);
        $this->Database->bind('namabelakang', $registrasiUsers['namabelakang']);
        $this->Database->bind('username', $registrasiUsers['username']);
        $this->Database->bind('password', $passwordHash);
        $this->Database->bind('fotoprofil', $registrasiUsers['fotoprofil']);
        $this->Database->execute();
        return $this->Database->rowCount();
    }
    public function ResetPassword($resetPassword)
    {
        $this->Database->query("UPDATE {$this->TableLogin} SET
        password =:password
        WHERE username =:username");
        $passwordHash = password_hash($resetPassword['password'], PASSWORD_DEFAULT);
        $this->Database->bind('username', $resetPassword['username']);
        $this->Database->bind('password', $passwordHash);
        $this->Database->execute();
        return $this->Database->rowCount();
    }
}