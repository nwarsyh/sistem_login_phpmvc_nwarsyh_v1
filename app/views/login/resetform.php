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
<body class="bg-primary">
<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center mt-5">
                    <div class="col-lg-5 mt-5">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header"><h3 class="text-center font-weight-light my-1">Form Reset Password</h3></div>
                            <div class="card-body">
                                <form action="<?= BASEURL; ?>/Login/doReset" method="post" enctype="multipart/form-data">
                                    <div class="col-auto mb-3 mt-3">
                                        <label class="visually-hidden" for="username">Username</label>
                                        <div class="input-group">
                                            <div class="input-group-text"><i class="fa fa-user"></i></div>
                                            <input type="text" class="form-control form-control-sm" id="username" name="username" placeholder="Username....." required>
                                        </div>
                                    </div>
                                    <div class="col-auto mb-3 mt-3">
                                        <label class="visually-hidden" for="password">Password</label>
                                        <div class="input-group">
                                            <div class="input-group-text"><i class="fa fa-lock"></i></div>
                                            <input type="password" class="form-control form-control-sm" id="password" name="password" placeholder="Password....." required>
                                        </div>
                                    </div>
                                    <div class="col-auto mb-3 mt-3">
                                        <label class="visually-hidden" for="passwordconfirm">Ulangi Password</label>
                                        <div class="input-group">
                                            <div class="input-group-text"><i class="fa fa-lock"></i></div>
                                            <input type="password" class="form-control form-control-sm" id="passwordconfirm" name="passwordconfirm" placeholder="Ulangi Password....." required>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-end mt-4 mb-0">
                                        <a href="<?= BASEURL; ?>/login" class="btn btn-sm btn-danger me-2"><i class="fa-solid fa-ban mr-5"></i> Batal</a>
                                        <button type="submit" class="btn btn-sm btn-primary"><i class="fa-solid fa-floppy-disk"></i> Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <div id="layoutAuthentication_footer">
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <a href="https://github.com/nwarsyh" class="text-decoration-none text-dark" target="_blank">Copyright &copy; Anwarsyah/@nwarsyh 2026</a>
                </div>
            </div>
        </footer>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="<?= BASEURL;?>/public/js/scripts.js"></script>
</body>
</html>
