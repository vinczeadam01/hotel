<?php require_once("connect.php"); ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Foglalás - Hotel</title>
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
                    <li class="nav-item"><a class="nav-link active" href="foglalas.php"><i class="fas fa-book"></i><span>Foglalás</span></a></li>
                    <li class="nav-item"></li>
                    <li class="nav-item"><a class="nav-link" href="vendegek.php"><i class="fa fa-user"></i><span>Vendegek</span></a><a class="nav-link" href="foglalasok.php"><i class="fas fa-table"></i><span>Foglalások</span></a><a class="nav-link" href="osszesites.php"><i class="fas fa-tachometer-alt"></i><span>Összesítés</span></a></li>
                    <li class="nav-item"></li>
                    <li class="nav-item"></li>
                    <li class="nav-item"><a class="nav-link" href="szobak.php" data-bs-target="szobak.php"><i class="fa fa-key"></i><span>Szobák</span></a></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content" style="padding-top: 20px;">
                <div class="container-fluid">
                    <h3 class="text-dark mb-4">Szoba foglalás</h3>
                    <div>
                        <form method="POST" onsubmit="return validateForm()" action="add_foglalas.php" style="width: 80%;">
                            <div class="card shadow mb-3">
                                <div class="card-header py-3">
                                    <p class="text-primary m-0 fw-bold">Személyes adatok</p>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3"><label class="form-label" for="username"><strong>Vezetéknév</strong></label><input name="vvnev" class="form-control" type="text" id="username" placeholder="Vezetéknév" required=""></div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3"><label class="form-label" for="email"><strong>E-mail cím</strong><br></label><input name="vemail" class="form-control" type="email" id="email" placeholder="user@example.com" inputmode="email" required=""></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3"><label class="form-label" for="first_name"><strong>Keresztnév</strong><br></label><input name="vknev" class="form-control" type="text" id="first_name" placeholder="Keresztnév"  required=""></div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3"><label class="form-label" for="last_name"><strong>Születési dátum</strong><br></label><input name="vszuldatum" class="form-control" type="date"></div>
                                        </div>
                                    </div>
                                    <div class="mb-3"></div>
                                </div>
                            </div>
                            <div class="card shadow">
                                <div class="card-header py-3">
                                    <p class="text-primary m-0 fw-bold">Foglalási adatok</p>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3"><label class="form-label" for="erkezes"><strong>Érkezés</strong></label><input id="ferkezik" name="ferkezik" class="form-control" type="date" value="<?php echo date("Y-m-d"); ?>"></div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3"><label class="form-label" for="tavozas"><strong>Távozás</strong><br></label><input id="ftavozik" name="ftavozik" class="form-control" type="date" value="<?php echo date("Y-m-d"); ?>"></div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3"><label class="form-label" for="city"><strong>Szoba típusa</strong></label>
                                                <select name="fszobaid" class="form-select">
                                                    <optgroup label="Szobák listája">
                                                        <option disabled selected value="-1"> -- Válassz egy szobát! -- </option>
									                    <?php szobak_listazas(); ?>
                                                    </optgroup>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3"></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="text-center mb-3"><img class="border rounded" src="assets/img/svedasztalos_reggeli.jpg" width="80%"></div>
                                        </div>
                                        <div class="col align-self-center">
                                            <div class="mb-3"></div>
                                            <div class="form-check"><input name="fellatas" class="form-check-input" type="checkbox" id="ellatas" ><label class="form-check-label" for="formCheck-2">Svédasztalos reggelit kérek! (2 000Ft/fő/éj)</label></div>
                                        </div>
                                    </div>
                                    <div class="mb-3"></div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body text-center">
                                    <div class="row">
                                        <div class="col">
                                            <input class="form-control" type="hidden" id="fizet" name="ffizet" required="" readonly >
                                            <input class="form-control" type="text" id="fizetkiir" name="ffizetkiir" required="" readonly>
                                        </div>
                                        <div class="col">
                                        <button class="btn btn-primary" id="foglalas" type="submit">Foglalás</button>
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
                                        let fizet_kiir = document.getElementById("fizetkiir");
                                        let ellatas_form = document.getElementById("ellatas");
                                        let erkezes_form = document.getElementById("ferkezik");
                                        let tavozas_form = document.getElementById("ftavozik");

                                    
                                        
                                        function kiir() {
                                            let szobaid = document.forms[0].fszobaid.value;
                                            let ar = document.getElementById("ar"+szobaid).innerText;
                                            let ferohely = document.getElementById("ferohely"+szobaid).innerText;
                                            
                                            

                                            let erkezes = erkezes_form.value;
                                            let tavozas = tavozas_form.value;
                                            let napokSzama = getNumberOfDays(erkezes, tavozas)

                                            let osszeg = parseInt(ar) * napokSzama;

                                            if(ellatas_form.checked) {                
                                                osszeg += parseInt(ferohely)*2000*napokSzama;
                                                //console.log(erkezes_form);
                                            }
                                                
                                            console.log(ellatas);
                                            
                                            
                                            
                                            fizet_kiir.value=napokSzama + " éj: " + osszeg.toLocaleString() + " Ft";
                                            fizet_form.value=osszeg;
                                        }

                                        document.forms[0].fszobaid.onchange = kiir;
                                        document.forms[0].ellatas.onchange = kiir;
                                        document.forms[0].ferkezik.onchange = kiir;
                                        document.forms[0].ftavozik.onchange = kiir;
                                        document.forms[0].fizetkiir.onclick = kiir;



                                        function validateForm() {
                                            if(document.forms[0].fszobaid.value == "-1") {
                                                alert("Nem adtál meg szobát!");
                                                return false;
                                            }
                                            let erkezes = erkezes_form.value;
                                            let tavozas = tavozas_form.value;
                                            let napokSzama = getNumberOfDays(erkezes, tavozas)
                                            if(napokSzama < 1) {
                                                alert("Kevesebb mint 1 éjszakát adtál meg!");
                                                return false;
                                            }
                                            
                                        }
                                        
                                        
                                    </script>
                                    
                                
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Vincze Ádám Adatbázisok kötelező feladat 2021</span></div>
                </div>
            </footer>
        </div>
        <a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
        
    </div>
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