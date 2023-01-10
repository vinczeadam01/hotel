<?php 
    include 'connect.php';

    //ADD vendeg
    if(isset($_GET['method']) && isset($_GET['table'])) {
        if($_GET['method'] == 'add' && $_GET['table'] == 'vendeg') {
            $v_vnev = $_POST['vnev'];
            $v_knev = $_POST['knev'];
            $v_szuldatum =$_POST['szuldatum'];
            $v_email = $_POST['email'];
            
            if ( isset($v_vnev) && isset($v_knev) && 
                 isset($v_szuldatum) && isset($v_email) ) {
                
            	// beszúrjuk az új rekordot az adatbázisba
            	$sikeres = vendeget_beszur($v_vnev, $v_knev, $v_szuldatum, $v_email);
            	if ($sikeres == true) {
            	// visszatérünk az index.php-re
            		header("Location: vendegek.php");
            	} else {
            		echo "Hiba volt a beszúrásnál";
            	}
            } else {
            	error_log("Nincs beállítva valamely érték");
            }
            

        }
    }

    //ADD foglalas
    if(isset($_GET['method']) && isset($_GET['table'])) {
        if($_GET['method'] == 'add' && $_GET['table'] == 'foglalas') {
            $v_vid = $_POST['vid'];
            $v_szid = $_POST['szid'];
            $v_erkezes =$_POST['erkezes'];
            $v_tavozas = $_POST['tavozas'];
            $v_ellatas = ($_POST['ellatas'] ? 1 : 0);
            $v_fizet = $_POST['fizet'];
            
            if ( isset($v_vid) && isset($v_szid) && 
                 isset($v_erkezes) && isset($v_tavozas) &&
                 isset($v_ellatas) && isset($v_fizet)) {
                
            	// beszúrjuk az új rekordot az adatbázisba
            	$sikeres = foglalast_beszur($v_vid, $v_szid, $v_erkezes, $v_tavozas, $v_ellatas, $v_fizet);
            	if ($sikeres == true) {
            	// visszatérünk az index.php-re
            		header("Location: foglalasok.php");
            	} else {
            		echo "Hiba volt a beszúrásnál";
            	}
            } else {
            	error_log("Nincs beállítva valamely érték");
            }
            

        }
    }

    //ADD szoba
    if(isset($_GET['method']) && isset($_GET['table'])) {
        if($_GET['method'] == 'add' && $_GET['table'] == 'szoba') {
            $emelet = $_POST['emelet'];
            $szobatipus = $_POST['szobatipus'];
            
            if ( isset($emelet) && isset($szobatipus) ) {
                
            	// beszúrjuk az új rekordot az adatbázisba
            	$sikeres = szobat_beszur($emelet, $szobatipus);
            	if ($sikeres == true) {
            	// visszatérünk az index.php-re
            		header("Location: szobak.php");
            	} else {
            		echo "Hiba volt a beszúrásnál";
            	}
            } else {
            	error_log("Nincs beállítva valamely érték");
            }
            

        }
    }

    //ADD szoba
    if(isset($_GET['method']) && isset($_GET['table'])) {
        if($_GET['method'] == 'add' && $_GET['table'] == 'szobatipus') {
            $nev = $_POST['nev'];
            $ferohely = $_POST['ferohely'];
            $ar = $_POST['ar'];
            
            if ( isset($nev) && isset($ferohely) && isset($ar) ) {
                
            	// beszúrjuk az új rekordot az adatbázisba
            	$sikeres = szobatipus_beszur($nev, $ferohely, $ar);
            	if ($sikeres == true) {
            	// visszatérünk az index.php-re
            		header("Location: szobak.php");
            	} else {
            		echo "Hiba volt a beszúrásnál";
            	}
            } else {
            	error_log("Nincs beállítva valamely érték");
            }
            

        }
    }

    //DELETE vendeg
    if(isset($_GET['method']) && isset($_GET['table']) && isset($_GET['torles'])) {
        if($_GET['method'] == 'del' && $_GET['table'] == 'vendeg') {
            $v_torlendoid = $_GET['torles'];

            if ( isset($v_torlendoid)) {
            	$sikeres = vendeg_torles($v_torlendoid);
            	if ($sikeres == true) {
            	// visszatérünk az index.php-re
            		header("Location: vendegek.php");
            	} else {
            		echo "Hiba volt a torlesnel";
            	}
            } else {
            	error_log("Nincs beállítva valamely érték");
            }
            

        }
    }

    //DELETE foglalas
    if(isset($_GET['method']) && isset($_GET['table']) && isset($_GET['torles'])) {
        if($_GET['method'] == 'del' && $_GET['table'] == 'foglalas') {
            $v_torlendoid = $_GET['torles'];

            if ( isset($v_torlendoid)) {
            	$sikeres = foglalas_torles($v_torlendoid);
            	if ($sikeres == true) {
            	// visszatérünk az index.php-re
            		header("Location: foglalasok.php");
            	} else {
            		echo "Hiba volt a torlesnel";
            	}
            } else {
            	error_log("Nincs beállítva valamely érték");
            }
            

        }
    }

    //DELETE szoba
    if(isset($_GET['method']) && isset($_GET['table']) && isset($_GET['torles'])) {
        if($_GET['method'] == 'del' && $_GET['table'] == 'szoba') {
            $v_torlendoid = $_GET['torles'];

            if ( isset($v_torlendoid)) {
            	$sikeres = szoba_torles($v_torlendoid);
            	if ($sikeres == true) {
            	// visszatérünk az index.php-re
            		header("Location: szobak.php");
            	} else {
            		echo "Hiba volt a torlesnel";
            	}
            } else {
            	error_log("Nincs beállítva valamely érték");
            }
            

        }
    }

    //DELETE szobatipus
    if(isset($_GET['method']) && isset($_GET['table']) && isset($_GET['torles'])) {
        if($_GET['method'] == 'del' && $_GET['table'] == 'szobatipus') {
            $v_torlendoid = $_GET['torles'];

            if ( isset($v_torlendoid)) {
            	$sikeres = szobatipus_torles($v_torlendoid);
            	if ($sikeres == true) {
            	// visszatérünk az index.php-re
            		header("Location: szobak.php");
            	} else {
            		echo "Hiba volt a torlesnel";
            	}
            } else {
            	error_log("Nincs beállítva valamely érték");
            }
            

        }
    }

    //UPDATE vendeg
    if(isset($_GET['method']) && isset($_GET['table']) ) {
        if($_GET['method'] == 'update' && $_GET['table'] == 'vendeg') {
            $conn=kapcsolodas();

            $vendeg_id = $_POST['id'];
            $vnev = $_POST['vnev'];
            $knev = $_POST['knev'];
            $szuldatum = $_POST['szuldatum'];
            $email = $_POST['email'];
            

            $sql = "UPDATE vendeg SET vnev = '$vnev', knev = '$knev', szuldatum = '$szuldatum', email = '$email' WHERE id = " . $vendeg_id;
            mysqli_query($conn, $sql)or die("Nem sikerült a módosítás");
            
            mysqli_close($conn);

            header("location: vendegek.php");
            
        }
    }

    //UPDATE foglalas
    if(isset($_GET['method']) && isset($_GET['table']) ) {
        if($_GET['method'] == 'update' && $_GET['table'] == 'foglalas') {
            $conn=kapcsolodas();

            $foglalas_id = $_POST['id'];
            $vid = $_POST['vendegid'];
            $szid = $_POST['szobaid'];
            $erkezes =$_POST['erkezes'];
            $tavozas = $_POST['tavozas'];
            $ellatas = ($_POST['ellatas'] ? 1 : 0);
            $fizet = $_POST['fizet'];
            
            //var_dump($_POST);
            $sql = "UPDATE foglalas SET vendegid = '$vid', szobaszam = '$szid', erkezes = '$erkezes', tavozas = '$tavozas', ellatas='$ellatas', fizet = '$fizet' WHERE id = " . $foglalas_id;
            mysqli_query($conn, $sql)or die("Nem sikerült a módosítás");
            
            mysqli_close($conn);

            header("location: foglalasok.php");
            
        }
    }

    //UPDATE szobatipus
    if(isset($_GET['method']) && isset($_GET['table']) ) {
        if($_GET['method'] == 'update' && $_GET['table'] == 'szobatipus') {
            $conn=kapcsolodas();

            $szobatipus_id = $_POST['id'];
            $nev =$_POST['nev'];
            $ferohely = $_POST['ferohely'];
            $ar = $_POST['ar'];
            
            //var_dump($_POST);
            $sql = "UPDATE szobatipus SET nev = '$nev', ferohely = '$ferohely', ar='$ar' WHERE id = " . $szobatipus_id;
            mysqli_query($conn, $sql)or die("Nem sikerült a módosítás");
            
            mysqli_close($conn);

            header("location: szobak.php");
            
        }
    }

    //UPDATE szoba
     if(isset($_GET['method']) && isset($_GET['table']) ) {
        if($_GET['method'] == 'update' && $_GET['table'] == 'szoba') {
            $conn=kapcsolodas();

            $szoba_id = $_POST['szobaszam'];
            $emelet = $_POST['emelet'];
            $szobatipus_id = $_POST['szobatipus'];
            
            //var_dump($_POST);
            $sql = "UPDATE szoba SET emelet = '$emelet', szobatipus = '$szobatipus_id' WHERE szobaszam = " . $szoba_id;
            mysqli_query($conn, $sql)or die("Nem sikerült a módosítás");
            
            mysqli_close($conn);

            header("location: szobak.php");
            
        }
    }




    



    



    



?>