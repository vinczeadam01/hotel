<?php 
    require_once("connect.php");

    $conn = kapcsolodas();

    $vendeg_vnev = $_POST['vvnev'];
    $vendeg_vknev = $_POST['vknev'];
    $vendeg_szuldatum =$_POST['vszuldatum'];
    $vendeg_email = $_POST['vemail'];
    $foglalas_erkezik = $_POST['ferkezik'];
    $foglalas_tavozik = $_POST['ftavozik'];
    $foglalas_szobaid = $_POST['fszobaid'];
    $foglalas_fizet = ($_POST['ffizet']);

    if(isset($_POST['fellatas'])) {
        $foglalas_ellatas = ($_POST['fellatas'] ? 1 : 0);
    }
    else {
        $foglalas_ellatas = 0;
    }
    
    
    
    if ( isset($vendeg_vnev) && isset($vendeg_vknev) && isset($vendeg_szuldatum) && 
         isset($vendeg_email) && isset($foglalas_erkezik) &&
         isset($foglalas_tavozik) && isset($foglalas_szobaid) &&
         isset($foglalas_ellatas) && isset($foglalas_fizet)) {
        

        ujra:    
        $sql =   "SELECT id FROM vendeg WHERE vnev='$vendeg_vnev' AND knev='$vendeg_vknev' AND szuldatum='$vendeg_szuldatum' AND email='$vendeg_email';";
        //$sql = "SELECT id FROM vendeg WHERE vnev='Vincze' AND knev='Ádám' AND szuldatum='2001-12-11' AND email='adam.vincze01@gmail.com';";
        $vendegek = mysqli_query($conn, $sql) or die("Hibás utasítás a vendegek lekerdezesenel");

        $vendeg_id=-1;
        while (($current_row = mysqli_fetch_assoc($vendegek))!= null) {
            $vendeg_id = $current_row['id'];
        }


        if($vendeg_id == -1) {
            vendeget_beszur($vendeg_vnev, $vendeg_vknev, $vendeg_szuldatum, $vendeg_email);
            goto ujra;
        }

    	// beszúrjuk az új rekordot az adatbázisba
    	$sikeres = foglalast_beszur($vendeg_id, $foglalas_szobaid, $foglalas_erkezik, $foglalas_tavozik, $foglalas_ellatas, $foglalas_fizet);
    	if ($sikeres == true) {
    	// visszatérünk az index.php-re
    		header("Location: foglalasok.php");
    	} else {
    		echo "Hiba volt a beszúrásnál";
    	}
    } else {
    	error_log("Nincs beállítva valamely érték");
    }


?>