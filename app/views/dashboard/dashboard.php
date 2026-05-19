<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title><?= $getDataApp['titleweb']; ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="<?= BASEURL;?>/public/css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body class="sb-nav-fixed">
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="<?= BASEURL;?>/dashboard">Sistem Login<sup>V.1</sup>
        <i class="fa-regular fa-face-laugh-wink text-white" style="transform:rotate(-15deg); font-size: 2rem;"></i>
    </a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
</nav>
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav mt-3">
                    <a class="nav-link" href="<?= BASEURL;?>/dashboard">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                </div>
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4 mt-4">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        <?= $getDataApp['subtitlewebDashboard'];  ?>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3 mb-1">
                                <img src="<?= BASEURL;?>/public/assets/img/<?= $_SESSION['foto_profil'];?>" class="rounded-circle shadow" width="200">
                            </div>
                            <div class="col-md-9 mb-1">
                                <ul class="list-group">
                                    <li class="list-group-item list-group-item-action">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h6 class="mb-1">Nama Lengkap</h6>
                                        </div>
                                        <p class="mb-1"><?= $_SESSION['nama_depan']; ?> <?= $_SESSION['nama_belakang']; ?></p>
                                    </li>
                                    <li class="list-group-item list-group-item-action">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h6 class="mb-1">Username</h6>
                                        </div>
                                        <p class="mb-1"><?= $_SESSION['username']; ?></p>
                                    </li>
                                </ul>
                                <div class="col-md-12">
                                    <div class="d-flex align-items-center justify-content-end mt-4 mb-0">
                                        <a class="btn btn-primary btn-sm me-2" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                                            <i class="fa fa-pen"></i> Ubah Data
                                        </a>
                                        <a class="btn btn-danger btn-sm" href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">
                                            <i class="fas fa-sign-out-alt"></i>
                                            Logout
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="collapse mt-5" id="collapseExample">
                                <div class="card card-body">
                                    <form action="<?= BASEURL; ?>/Dashboard/UpdateData" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="mb-2">
                                                    <label for="namadepan" class="form-label">Nama Depan</label>
                                                    <input type="text" class="form-control form-control-sm" id="namadepan" name="namadepan" value="<?= $_SESSION['nama_depan']; ?>">
                                                    <input type="hidden" class="form-control form-control-sm" id="id_login" name="id_login" value="<?= $_SESSION['id_login']; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-2">
                                                    <label for="namabelakang" class="form-label">Nama Belakang</label>
                                                    <input type="text" class="form-control form-control-sm" id="namabelakang" name="namabelakang" value="<?= $_SESSION['nama_belakang']; ?>">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="mb-2">
                                                    <label for="username" class="form-label">Username</label>
                                                    <input type="text" class="form-control form-control-sm" id="username" name="username" value="<?= $_SESSION['username']; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-2">
                                                    <label for="passwordlama" class="form-label">Password Lama</label>
                                                    <input type="password" class="form-control form-control-sm" id="passwordlama" name="passwordlama" >
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-2">
                                                    <label for="password" class="form-label">Password Baru</label>
                                                    <input type="password" class="form-control form-control-sm" id="password" name="password">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="mb-2">
                                                    <label for="passwordconfirm" class="form-label">Ulangi Password baru</label>
                                                    <input type="password" class="form-control form-control-sm" id="passwordconfirm" name="passwordconfirm">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="mb-2">
                                                    <label for="fotoprofil" class="form-label">Foto Profil</label>
                                                    <input type="hidden" class="form-control" id="fotoprofillama" name="fotoprofillama" value="<?= $_SESSION['foto_profil']; ?>">
                                                    <input type="file" class="form-control form-control-sm" id="fotoprofil" name="fotoprofil">
                                                    <img src="<?= BASEURL;?>/public/assets/img/<?= $_SESSION['foto_profil']; ?>" width="100" class="mt-2 rounded-circle shadow">
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="reset" class="btn btn-danger btn-sm m-2"><i class="fa-solid fa-x"></i> Reset</button>
                                    <button type="submit" class="btn btn-success btn-sm"><i class="fa-solid fa-floppy-disk"></i> Simpan</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <a href="https://github.com/nwarsyh" class="text-decoration-none text-dark" target="_blank">Copyright &copy; Anwarsyah/@nwarsyh 2026</a>
                </div>
            </div>
        </footer>
    </div>
</div>



<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Apakah Yakin Logout ?</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">Silahkan Klik Tombol <b>Logout</b> Untuk Mengakhiri Sesi Anda</div>
            <div class="modal-footer">
                <button class="btn btn-danger btn-sm" type="button" data-bs-dismiss="modal"><i class="fa-solid fa-ban mr-5"></i> Cancel</button>
                <a class="btn btn-primary btn-sm" href="<?= BASEURL;?>/Login/doLogout"> <i class="fas fa-sign-out-alt"></i> Logout</a>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="<?= BASEURL;?>/public/js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="<?= BASEURL;?>/public/assets/demo/chart-area-demo.js"></script>
<script src="<?= BASEURL;?>/public/assets/demo/chart-bar-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
<script src="<?= BASEURL;?>/public/js/datatables-simple-demo.js"></script>
</body>
</html>
