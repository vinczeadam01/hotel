<?php include_once('connect.php');?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Foglalások - Hotel</title>
    <link rel="icon" type="image/png" sizes="255x322" href="assets/img/favicon.png">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
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
                    <li class="nav-item"><a class="nav-link" href="vendegek.php"><i class="fa fa-user"></i><span>Vendegek</span></a><a class="nav-link active" href="foglalasok.php"><i class="fas fa-table"></i><span>Foglalások</span></a><a class="nav-link" href="osszesites.php"><i class="fas fa-tachometer-alt"></i><span>Összesítés</span></a></li>
                    <li class="nav-item"></li>
                    <li class="nav-item"></li>
                    <li class="nav-item"><a class="nav-link" href="szobak.php" data-bs-target="szobak.php"><i class="fa fa-key"></i><span>Szobák</span></a></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <div class="container-fluid" style="padding-top: 20px;">
                    <h3 class="text-dark mb-4">Foglalások kezelése</h3>
                    <div class="card shadow">
                        <div class="card-header py-3" style="text-align: right;">
                            <p class="text-primary m-0 fw-bold"></p><button class="btn btn-primary" type="button" style="font-size: 14px;" data-bs-target="#add" data-bs-toggle="modal">Új foglalás</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <table class="table my-0" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Vendég</th>
                                            <th>Szobaszám</th>
                                            <th>Érkezés</th>
                                            <th>Távozás</th>
                                            <th>Reggeli</th>
                                            <th>Fizet</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                       <?php foglalas_lekerdezes();?>
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
    </div>
    <div class="modal fade" role="dialog" tabindex="-1" id="add">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Foglalás hozzáadása</h4><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="padding-bottom: 0;">
                    <form method="POST" action="manipulation.php?method=add&table=foglalas" accept-charset="utf-8">
                        <div class="input-group" style="margin-bottom: 5px;"><span class="input-group-text" style="width: 85px;text-align: left;padding-left: 17px;">Vendég</span>
                            <select class="form-select" required="" name="vid">
                                <optgroup label="Vendégek listája">
                                    <?php vendegek_listazas(); ?>
                                </optgroup>
                            </select></div>
                        <div class="input-group" style="margin-bottom: 5px;"><span class="input-group-text" style="width: 85px;text-align: left;padding-left: 17px;">Szoba</span>
                            <select id="szobaid" name="szid" class="form-select" required="">
                                <optgroup label="Szobák listája">
                                    <?php szobak_listazas(); ?>
                                </optgroup>
                            </select></div>
                        <div class="input-group" style="margin-bottom: 5px;"><span class="input-group-text" style="width: 85px;padding-left: 18px;">Érkezés</span><input id="erkezik" class="form-control" type="date" required="" name="erkezes" value="<?php echo date("Y-m-d"); ?>"></div>
                        <div class="input-group" style="margin-bottom: 5px;"><span class="input-group-text" style="width: 85px;">Távozás</span><input id="tavozik" class="form-control" type="date" required="" name="tavozas"  value="<?php echo date("Y-m-d"); ?>"></div>
                        <div class="input-group" style="margin-bottom: 5px;"><span class="input-group-text" style="width: 85px;padding-left: 16px;">Reggeli</span>
                            <div class="form-control" style="margin-left: -1px;background: rgb(255,255,255);"><input id="ellatas" type="checkbox" style="width: 12.6667px;" name="ellatas"></div>
                        </div>
                        <div class="input-group" style="margin-bottom: 5px;"><span class="input-group-text" style="width: 85px;padding-left: 24px;">Fizet</span><input  id="fizet" name="fizet" class="form-control" type="number" required="" style="margin-bottom: 0px;"></div>
                        <div class="modal-footer" style="margin-top: 11px;margin-left: -12px;margin-right: -12px;"><button class="btn btn-light" type="button" data-bs-dismiss="modal">Bezár</button><button class="btn btn-primary" type="submit">Hozzáad</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <script>

        function getNumberOfDays(start, end) {
            const date1 = new Date(start);
            const date2 = new Date(end);

            // One day in milliseconds
            const oneDay = 1000 * 60 * 60 * 24;

            // Calculating the time difference between two dates
            const diffInTime = date2.getTime() - date1.getTime();

            // Calculating the no. of days between two dates
            const diffInDays = Math.round(diffInTime / oneDay);

            return diffInDays;
        }

        let fizet_form = document.getElementById("fizet");
        let ellatas_form = document.getElementById("ellatas");
        let erkezes_form = document.getElementById("erkezik");
        let tavozas_form = document.getElementById("tavozik");
        let szobaid_form = document.getElementById("szobaid");
    
        
        function kiir() {
            let szobaid = szobaid_form.value;
            let ar = document.getElementById("ar"+szobaid).innerText;
            let ferohely = document.getElementById("ferohely"+szobaid).innerText;
            
        
            let erkezes = erkezes_form.value;
            let tavozas = tavozas_form.value;
            let napokSzama = getNumberOfDays(erkezes, tavozas);
            let osszeg = parseInt(ar) * napokSzama;
            if(ellatas_form.checked) {                
                osszeg += parseInt(ferohely)*2000*napokSzama;
                //console.log(erkezes_form);
            }
            
            
            fizet_form.value=osszeg;
            console.log(osszeg);
        
        }

        fizet_form.onclick = kiir;  
        szobaid_form.onchange = kiir;                          
        erkezes_form.onchange = kiir;                          
        tavozas_form.onchange = kiir;                          
        ellatas_form.onchange = kiir;                          
    </script>
    

    <div id="szobaarak_div" style="display: none">
        <table id="szobaarak_table">
            <?php szobaarak(); ?>
        </table>
    </div>
    
    
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/6.4.8/swiper-bundle.min.js"></script>
    <script src="assets/js/Simple-Slider.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

</html>