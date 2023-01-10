<?php require('connect.php'); ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Szobák - Hotel</title>
    <link rel="icon" type="image/png" sizes="255x322" href="assets/img/favicon.png">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.8/swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/css/Simple-Slider.css">
    <link rel="stylesheet" href="assets/css/untitled.css">
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon rotate-n-15"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-lamp-fill" style="transform: translate(4px) rotate(15deg);font-size: 26px;">
                            <path d="M2 3a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v4a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3zm5.5-2 .276-.553a.25.25 0 0 1 .448 0L8.5 1h-1zm-.615 8h2.23C9.968 10.595 11 12.69 11 13.5c0 1.38-1.343 2.5-3 2.5s-3-1.12-3-2.5c0-.81 1.032-2.905 1.885-4.5z"></path>
                        </svg></div>
                    <div class="sidebar-brand-text mx-3"><span style="font-size: 27px;">HOTEL</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item"><a class="nav-link" href="foglalas.php"><i class="fas fa-book"></i><span>Foglalás</span></a></li>
                    <li class="nav-item"></li>
                    <li class="nav-item"><a class="nav-link" href="vendegek.php"><i class="fa fa-user"></i><span>Vendegek</span></a><a class="nav-link" href="foglalasok.php"><i class="fas fa-table"></i><span>Foglalások</span></a><a class="nav-link" href="osszesites.php"><i class="fas fa-tachometer-alt"></i><span>Összesítés</span></a></li>
                    <li class="nav-item"></li>
                    <li class="nav-item"></li>
                    <li class="nav-item"><a class="nav-link active" href="szobak.php" data-bs-target="szobak.php"><i class="fa fa-key"></i><span>Szobák</span></a></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <div class="container-fluid" style="padding-top: 20px;">
                    <h3 class="text-dark mb-4">Szobák kezelése</h3>
                    <div class="card shadow">
                        <div class="card-header py-3" style="text-align: right;">
                            <div class="row">
                                <div class="col">
                                    <h3 class="text-start">Szobák</h3>
                                </div>
                                <div class="col"><button class="btn btn-primary" type="button" style="font-size: 14px;" data-bs-target="#add_szoba" data-bs-toggle="modal">Új szoba</button></div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <table class="table my-0" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>Szobaszám</th>
                                            <th>Emelet</th>
                                            <th>Szobatípus</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php szoba_lekerdezes(); ?>
                                    </tbody>
                                    <tfoot>
                                        <tr></tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow" style="margin-top: 21px;">
                        <div class="card-header py-3" style="text-align: right;">
                            <div class="row">
                                <div class="col">
                                    <h3 class="text-start">Szobatípusok</h3>
                                </div>
                                <div class="col"><button class="btn btn-primary" type="button" style="font-size: 14px;" data-bs-target="#add_szobatipus" data-bs-toggle="modal">Új szobatípus</button></div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive table mt-2" id="dataTable-1" role="grid" aria-describedby="dataTable_info">
                                <table class="table my-0" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Név</th>
                                            <th>Férőhely</th>
                                            <th>Ár</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php szobatipus_lekerdezes(); ?>
                                    </tbody>
                                    <tfoot>
                                        <tr></tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Vincze Ádám Adatbázisok kötelező feladat 2021</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
        
        <div class="modal fade" role="dialog" tabindex="-1" id="add_szoba">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Szoba hozzáadása</h4><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="manipulation.php?method=add&table=szoba">
        			        <div class="input-group" style="margin-bottom: 5px;"><span class="input-group-text" style="width: 130px;padding-left: 40px;">Emelet</span><input class="form-control" type="text" required="" name="emelet"></div>
        			        <div class="input-group" style="margin-bottom: 5px;"><span class="input-group-text" style="width: 130px;text-align: left;padding-left: 25px;">Szobatípus</span><select name="szobatipus" class="form-select" required="">
                                        <optgroup label="Szobák listája">
					        				<?php szobatipus_listazas(); ?>
                                        </optgroup>
                                    </select>
                                </div>

        			        <div class="modal-footer" style="margin-top: 11px;margin-right: -12px;padding-bottom: 0px;margin-left: -12px;">
					        	<button class="btn btn-light" type="button" data-bs-dismiss="modal">Bezár</button>
					        	<button name="update" class="btn btn-primary" type="submit">Mentés</button>
					        </div>
				        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" role="dialog" tabindex="-1" id="add_szobatipus">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Szobatípus hozzáadása</h4><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="manipulation.php?method=add&table=szobatipus">
                        <div class="input-group" style="margin-bottom: 5px;"><span class="input-group-text" style="width: 110px;padding-left: 40px;">Név</span><input class="form-control" type="text" required="" name="nev" ></div>
        			    <div class="input-group" style="margin-bottom: 5px;"><span class="input-group-text" style="width: 110px;padding-left: 25px;">Férőhely</span><input class="form-control" type="number" required="" name="ferohely" ></div>
        			    <div class="input-group" style="margin-bottom: 5px;"><span class="input-group-text" style="width: 110px;padding-left: 45px;">Ár</span><input class="form-control" type="number" min="10000" step="5000" required="" name="ar"></div>

        			        <div class="modal-footer" style="margin-top: 11px;margin-right: -12px;padding-bottom: 0px;margin-left: -12px;">
					        	<button class="btn btn-light" type="button" data-bs-dismiss="modal">Bezár</button>
					        	<button name="update" class="btn btn-primary" type="submit">Mentés</button>
					        </div>
				        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.8/swiper-bundle.min.js"></script>
    <script src="assets/js/Simple-Slider.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>