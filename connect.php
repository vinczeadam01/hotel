<?php 
    
    //Csatlakozás az adatbázis szerverhez 
    //return $conn;
    // mysqli_close($conn); : lezárjuk az adatbázis-kapcsolatot
    function kapcsolodas(){
        //Csatlakozás az adatbázishoz
        $conn = mysqli_connect('localhost', 'root','') or die("Hibás csatlakozás!");

        // a karakterek helyes megjelenítése miatt be kell állítani a karakterkódolást!
        //mysqli_query($conn, 'SET NAMES UTF-8');
        mysqli_query($conn, "SET character_set_results=utf8");
        mysqli_set_charset($conn, 'utf8');

        mysqli_select_db($conn, 'hotel');
        
        
        return $conn;
    }

    //A vendég hányszor foglalt szobát
    function vendeg_foglasok_szama($vendegid) {
        $conn = kapcsolodas();

        $sql = "SELECT count(id) as szam FROM foglalas WHERE vendegid='$vendegid'";
        $res = mysqli_query($conn, $sql) or die ('Hibás utasítás!');
        
        while ( ($current_row = mysqli_fetch_assoc($res))!= null) {    // most asszociatív tömbként kezeljük a sorokat
            $row = $current_row;
        }

        mysqli_close($conn);

        return $row['szam'];

    }

    //vendeg tábla kiirása táblázatba
    function vendeg_lekerdezes() {
        $conn = kapcsolodas();
        
        //id, vnev, knev, szuldatum, email
        $sql = "SELECT * FROM vendeg"; // ez csak egy string, még nem hajtódik végre
        $res = mysqli_query($conn, $sql) or die ('Hibás utasítás!'); // végrehajtjuk az SQL utasítást
          
        
        // a táblázat sorai
        while ( ($current_row = mysqli_fetch_assoc($res))!= null) {    // most asszociatív tömbként kezeljük a sorokat
            echo '<tr>';
            echo '<td>' . $current_row["id"] . '</td>';
            echo '<td>' . $current_row["vnev"] . '</td>';
            echo '<td>' . $current_row["knev"] . '</td>';
            echo '<td>' . $current_row["szuldatum"] . '</td>';
            echo '<td>' . $current_row["email"] . '</td>';
            echo '<td>' . vendeg_foglasok_szama($current_row["id"]) . '</td>';
            echo '<td style="padding-right: 0px;"><button name="szerkeszt" class="btn btn-primary" type="button" style="width: 29px;text-align: center;font-size: 17px;padding-right: 8px;padding-left: 6px;height: 29.3333px;padding-top: 3px;" data-bs-target="#update_modal'.$current_row['id'].'" data-bs-toggle="modal"><i class="fa fa-pencil-square-o"></i></button>
                <a href="manipulation.php?method=del&table=vendeg&torles='.$current_row["id"].'"><button class="btn btn-danger" type="button" style="width: 29px;text-align: center;font-size: 17px;padding-right: 8px;padding-left: 6px;height: 29.3333px;padding-top: 3px;margin-left: 8px;"><i class="far fa-trash-alt"></i></button></a></td>';
            
            include "update_vendeg.php";

            echo '</tr>';

        }
        //echo '</table>';
        
        mysqli_free_result($res);    // felszabadítjuk a lefoglalt memóriát
        mysqli_close($conn); // lezárjuk az adatbázis-kapcsolatot
    }

    //foglalas tábla kiirása táblázatba
    function foglalas_lekerdezes() {
        $conn = kapcsolodas();
        
        //id, vnev, knev, szuldatum, email
        $sql = "SELECT foglalas.id, vnev, knev, szobaszam, erkezes, tavozas, ellatas, fizet, vendegid FROM foglalas, vendeg WHERE foglalas.vendegid = vendeg.id ORDER BY foglalas.id;"; // ez csak egy string, még nem hajtódik végre
        $res = mysqli_query($conn, $sql) or die ('Hibás utasítás!'); // végrehajtjuk az SQL utasítást
          
        
        // a táblázat sorai
        
        while ( ($current_row = mysqli_fetch_assoc($res))!= null) {    // most asszociatív tömbként kezeljük a sorokat
            //var_dump($current_row);
            echo '<tr>';
            echo '<td>' . $current_row["id"] . '</td>';
            echo '<td>' . $current_row["vnev"] . " " . $current_row["knev"] . '</td>';
            echo '<td>' . $current_row["szobaszam"] . '</td>';
            echo '<td>' . $current_row["erkezes"] . '</td>';
            echo '<td>' . $current_row["tavozas"] . '</td>';
            //echo '<td>' . $current_row["ellatas"] . '</td>';
            echo '<td>' . '<input type="checkbox" disabled ' . ($current_row["ellatas"] == 1 ? "checked" : "") .  '></td>';
            echo '<td>' . $current_row["fizet"] . " Ft" . '</td>';
            echo '<td style="padding-right: 0px;"><button class="btn btn-primary" type="button" style="width: 29px;text-align: center;font-size: 17px;padding-right: 8px;padding-left: 6px;height: 29.3333px;padding-top: 3px;" data-bs-target="#update_modal'.$current_row['id'].'" data-bs-toggle="modal"><i class="fa fa-pencil-square-o"></i></button>
                <a href="manipulation.php?method=del&table=foglalas&torles='.$current_row["id"].'"><button class="btn btn-danger" type="button" style="width: 29px;text-align: center;font-size: 17px;padding-right: 8px;padding-left: 6px;height: 29.3333px;padding-top: 3px;margin-left: 8px;"><i class="far fa-trash-alt"></i></button></a></td>';
            
            include "update_foglalas.php";

            echo '</tr>';
        }
        echo '</table>';
        
        mysqli_free_result($res);    // felszabadítjuk a lefoglalt memóriát
        
        mysqli_close($conn); // lezárjuk az adatbázis-kapcsolatot
    }

    //szoba tábla kiirása táblázatba
    function szoba_lekerdezes() {
        $conn = kapcsolodas();
        
        //id, vnev, knev, szuldatum, email
        $sql = "SELECT * FROM szoba, szobatipus WHERE szobatipus = id ORDER BY szobaszam;"; // ez csak egy string, még nem hajtódik végre
        $res = mysqli_query($conn, $sql) or die ('Hibás utasítás!'); // végrehajtjuk az SQL utasítást
          
        
        // a táblázat sorai
        while ( ($current_row = mysqli_fetch_assoc($res))!= null) {    // most asszociatív tömbként kezeljük a sorokat
            echo '<tr>';
            echo '<td>' . $current_row["szobaszam"] . '</td>';
            echo '<td>' . $current_row["emelet"] . '</td>';
            echo '<td>' . $current_row["szobatipus"] . " - " . $current_row["nev"] . '</td>';
            
            echo '<td style="padding-right: 0px;"><button name="szerkeszt" class="btn btn-primary" type="button" style="width: 29px;text-align: center;font-size: 17px;padding-right: 8px;padding-left: 6px;height: 29.3333px;padding-top: 3px;" data-bs-target="#update_szoba_modal'.$current_row['szobaszam'].'" data-bs-toggle="modal"><i class="fa fa-pencil-square-o"></i></button>
                <a href="manipulation.php?method=del&table=szoba&torles='.$current_row["szobaszam"].'"><button class="btn btn-danger" type="button" style="width: 29px;text-align: center;font-size: 17px;padding-right: 8px;padding-left: 6px;height: 29.3333px;padding-top: 3px;margin-left: 8px;"><i class="far fa-trash-alt"></i></button></a></td>';
            
            include "update_szoba.php";

            echo '</tr>';

        }
        //echo '</table>';
        
        mysqli_free_result($res);    // felszabadítjuk a lefoglalt memóriát
        mysqli_close($conn); // lezárjuk az adatbázis-kapcsolatot
    }

    //szobatípus tábla kiirása táblázatba
    function szobatipus_lekerdezes() {
        $conn = kapcsolodas();
        
        //id, vnev, knev, szuldatum, email
        $sql = "SELECT * FROM szobatipus;"; // ez csak egy string, még nem hajtódik végre
        $res = mysqli_query($conn, $sql) or die ('Hibás utasítás!'); // végrehajtjuk az SQL utasítást
          
        
        // a táblázat sorai
        while ( ($current_row = mysqli_fetch_assoc($res))!= null) {    // most asszociatív tömbként kezeljük a sorokat
            echo '<tr>';
            echo '<td>' . $current_row["id"] . '</td>';
            echo '<td>' . $current_row["nev"] . '</td>';
            echo '<td>' . $current_row["ferohely"] . '</td>';
            echo '<td>' . $current_row["ar"] . " Ft" . '</td>';
            
            echo '<td style="padding-right: 0px;"><button name="szerkeszt" class="btn btn-primary" type="button" style="width: 29px;text-align: center;font-size: 17px;padding-right: 8px;padding-left: 6px;height: 29.3333px;padding-top: 3px;" data-bs-target="#update_szobatipus_modal'.$current_row['id'].'" data-bs-toggle="modal"><i class="fa fa-pencil-square-o"></i></button>
                <a href="manipulation.php?method=del&table=szobatipus&torles='.$current_row["id"].'"><button class="btn btn-danger" type="button" style="width: 29px;text-align: center;font-size: 17px;padding-right: 8px;padding-left: 6px;height: 29.3333px;padding-top: 3px;margin-left: 8px;"><i class="far fa-trash-alt"></i></button></a></td>';
            
            include "update_szobatipus.php";

            echo '</tr>';

        }
        //echo '</table>';
        
        mysqli_free_result($res);    // felszabadítjuk a lefoglalt memóriát
        mysqli_close($conn); // lezárjuk az adatbázis-kapcsolatot
    }
    
    //visszatér a vendégek számával
    function get_vendegek_szama() {
        $conn = kapcsolodas();
        
        $sql = "SELECT COUNT(*) FROM vendeg"; // ez csak egy string, még nem hajtódik végre
        $res = mysqli_query($conn, $sql) or die ('Hibás utasítás!'); // végrehajtjuk az SQL utasítást
        
        $values = mysqli_fetch_assoc($res);     //tömböt készítünk a lekérdezésből
        
        $db = $values["COUNT(*)"]; 
        
        mysqli_free_result($res);    // felszabadítjuk a lefoglalt memóriát

        mysqli_close($conn);
        return (int)$db;

    }

    //visszatér a foglalások számával
    function get_foglalasok_szama() {
        $conn = kapcsolodas();  

        $sql = "SELECT COUNT(*) FROM foglalas"; // ez csak egy string, még nem hajtódik végre
        $res = mysqli_query($conn, $sql) or die ('Hibás utasítás!'); // végrehajtjuk az SQL utasítást
        
        $values = mysqli_fetch_assoc($res);     //tömböt készítünk a lekérdezésből
        
        $db = $values["COUNT(*)"]; 
        
        mysqli_free_result($res);    // felszabadítjuk a lefoglalt memóriát

        mysqli_close($conn);
        return (int)$db;

    }

    //visszatér az összes foglalásból származó pénzzel
    function get_penzek_osszege() {
        $conn = kapcsolodas();
        
        $sql = "SELECT SUM(fizet) FROM foglalas"; // ez csak egy string, még nem hajtódik végre
        $res = mysqli_query($conn, $sql) or die ('Hibás utasítás!'); // végrehajtjuk az SQL utasítást
        
        $values = mysqli_fetch_assoc($res);     //tömböt készítünk a lekérdezésből
        
        $osszeg = $values["SUM(fizet)"]; 
        
        mysqli_free_result($res);    // felszabadítjuk a lefoglalt memóriát

        mysqli_close($conn);
        return number_format((int)$osszeg, 0, ',', ' ');
        //return (int)$osszeg;

    }

    function vendeget_beszur($vnev, $knev, $szuldatum, $email) {	
        $conn = kapcsolodas();
        
        $sql = "INSERT INTO vendeg(vnev, knev, szuldatum, email) VALUES ('$vnev', '$knev', '$szuldatum', '$email')";
        //$sql = "INSERT INTO vendeg(id, vnev, knev, szuldatum, email) VALUES (8, 'vnev', 'knev', '2001-12-11', 'hello@gmail.com')";
        $sikeres = mysqli_query($conn, $sql) or die ('Hibás utasítás!');
        
            
        mysqli_close($conn);
        return $sikeres;
        
    }

    function foglalast_beszur($vid, $szid, $erkezes, $tavozas, $ellatas, $fizet) {	
        $conn = kapcsolodas();
        
        $sql = "INSERT INTO foglalas(vendegid, szobaszam, erkezes, tavozas, ellatas, fizet) VALUES ('$vid', '$szid', '$erkezes', '$tavozas', '$ellatas', '$fizet')";
        //$sql = "INSERT INTO vendeg(id, vnev, knev, szuldatum, email) VALUES (8, 'vnev', 'knev', '2001-12-11', 'hello@gmail.com')";
        $sikeres = mysqli_query($conn, $sql) or die ('Hibás utasítás!');
        
            
        mysqli_close($conn);
        return $sikeres;
        

    }

    function szobat_beszur($emelet, $szobatipus) {	
        $conn = kapcsolodas();
        
        $sql = "INSERT INTO szoba(emelet, szobatipus) VALUES ('$emelet', '$szobatipus')";
        
        $sikeres = mysqli_query($conn, $sql) or die ('Hibás utasítás!');
        
            
        mysqli_close($conn);
        return $sikeres;
        
    }

    function szobatipus_beszur($nev, $ferohely, $ar) {	
        $conn = kapcsolodas();
        
        $sql = "INSERT INTO szobatipus(nev, ferohely, ar) VALUES ('$nev', '$ferohely', '$ar')";
        
        $sikeres = mysqli_query($conn, $sql) or die ('Hibás utasítás!');
        
            
        mysqli_close($conn);
        return $sikeres;
        
    }

    function vendegek_listazas($def = '-1'){
        $conn = kapcsolodas();
        
        $sql = "SELECT * FROM vendeg ORDER BY id"; // ez csak egy string, még nem hajtódik végre
        $res = mysqli_query($conn, $sql) or die ('Hibás utasítás!'); // végrehajtjuk az SQL utasítást
          
        
        // a lista sorai
        while ( ($current_row = mysqli_fetch_assoc($res))!= null) {    // most asszociatív tömbként kezeljük a sorokat
            if($current_row['id'] == $def) {
                $select = 'selected="selected"';
            }
            else {
                $select = '';
            }
            echo '<option '.$select.' value="'. $current_row['id'] .'">' .$current_row['id'] . " - " . $current_row['vnev'] . " " . $current_row['knev'] . '</option>';
        }
        
        
        mysqli_free_result($res);    // felszabadítjuk a lefoglalt memóriát
        mysqli_close($conn); // lezárjuk az adatbázis-kapcsolatot
    }

    function szobak_listazas($def = '-1'){
        $conn = kapcsolodas();
        
        $sql = "SELECT * FROM szoba, szobatipus WHERE szobatipus = id ORDER BY szobaszam;"; // ez csak egy string, még nem hajtódik végre
        $res = mysqli_query($conn, $sql) or die ('Hibás utasítás!'); // végrehajtjuk az SQL utasítást
          
        
        // a lista sorai
        while ( ($current_row = mysqli_fetch_assoc($res))!= null) {    // most asszociatív tömbként kezeljük a sorokat
            if($current_row['szobaszam'] == $def) {
                $select = 'selected="selected"';
            }
            else {
                $select = '';
            }
            echo '<option '.$select.' value="'. $current_row['szobaszam'] .'">' .$current_row['szobaszam'] . " - " . $current_row['nev'] . '</option>';
        }
        
        
        mysqli_free_result($res);    // felszabadítjuk a lefoglalt memóriát
        mysqli_close($conn); // lezárjuk az adatbázis-kapcsolatot
    }

    function szobatipus_listazas($def = '-1'){
        $conn = kapcsolodas();
        
        $sql = "SELECT * FROM szobatipus;"; // ez csak egy string, még nem hajtódik végre
        $res = mysqli_query($conn, $sql) or die ('Hibás utasítás!'); // végrehajtjuk az SQL utasítást
          
        
        // a lista sorai
        while ( ($current_row = mysqli_fetch_assoc($res))!= null) {    // most asszociatív tömbként kezeljük a sorokat
            if($current_row['id'] == $def) {
                $select = 'selected="selected"';
            }
            else {
                $select = '';
            }
            echo '<option '.$select.' value="'. $current_row['id'] .'">' . $current_row['id'] . " - " . $current_row['nev'] . '</option>';
        }
        
        
        mysqli_free_result($res);    // felszabadítjuk a lefoglalt memóriát
        mysqli_close($conn); // lezárjuk az adatbázis-kapcsolatot
    }

    function vendeg_torles($torlendoid) {
        $conn = kapcsolodas();
        $sql = "DELETE FROM vendeg WHERE id=" . $torlendoid;
        $res = mysqli_query($conn, $sql) or die ('Hibás utasítás!');
        
        mysqli_close($conn); // lezárjuk az adatbázis-kapcsolatot
        return $res;
    }

    function foglalas_torles($torlendoid) {
        $conn = kapcsolodas();
        $sql = "DELETE FROM foglalas WHERE id=" . $torlendoid;
        $res = mysqli_query($conn, $sql) or die ('Hibás utasítás!');
        
        mysqli_close($conn); // lezárjuk az adatbázis-kapcsolatot
        return $res;
    }

    function szoba_torles($torlendoid) {
        $conn = kapcsolodas();
        $sql = "DELETE FROM szoba WHERE szobaszam=" . $torlendoid;
        $res = mysqli_query($conn, $sql) or die ('Hibás utasítás!');
        
        mysqli_close($conn); // lezárjuk az adatbázis-kapcsolatot
        return $res;
    }

    function szobatipus_torles($torlendoid) {
        $conn = kapcsolodas();
        $sql = "DELETE FROM szobatipus WHERE id=" . $torlendoid;
        $res = mysqli_query($conn, $sql) or die ('Hibás utasítás!');
        
        mysqli_close($conn); // lezárjuk az adatbázis-kapcsolatot
        return $res;
    }

    function vendeg_tomb($idje) {
        $conn = kapcsolodas();
        $sql = "SELECT * FROM vendeg WHERE id=" . $idje;
        $res = mysqli_query($conn, $sql) or die ('Hibás utasítás!');
        
        while ( ($current_row = mysqli_fetch_assoc($res))!= null) {    // most asszociatív tömbként kezeljük a sorokat
            $row = $current_row;
        }

        mysqli_close($conn); // lezárjuk az adatbázis-kapcsolatot
        if(isset($row)) {
            return $row;
        }
        
    }

    function foglalas_tomb($idje) {
        $conn = kapcsolodas();
        $sql = "SELECT * FROM foglalas WHERE id=" . $idje;
        $res = mysqli_query($conn, $sql) or die ('Hibás utasítás!');
        
        while ( ($current_row = mysqli_fetch_assoc($res))!= null) {    // most asszociatív tömbként kezeljük a sorokat
            $row = $current_row;
        }

        mysqli_close($conn); // lezárjuk az adatbázis-kapcsolatot
        return $row;
    }

    function count_by_month() {
        $conn = kapcsolodas();

        $sql = "SELECT MONTH(erkezes) as month, COUNT(id) as count FROM `foglalas` GROUP BY MONTH(erkezes);";
        $res = mysqli_query($conn, $sql) or die ('Hibás utasítás!');

        $months = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

        while ( ($current_row = mysqli_fetch_assoc($res))!= null) {    // most asszociatív tömbként kezeljük a sorokat
            $row = $current_row;
            $months[(int)$row['month']-1] = (int)$row['count'];
        }
        //var_dump($months);
        mysqli_close($conn);

        return $months;
        
    }

    function szobaarak(){
        $conn = kapcsolodas();
        
        $sql = "SELECT szobaszam, ar, ferohely FROM szobatipus, szoba WHERE szobatipus=id;"; 
        $res = mysqli_query($conn, $sql) or die ('Hibás utasítás!'); // végrehajtjuk az SQL utasítást
          
        
        // a táblázat sorai
        while ( ($current_row = mysqli_fetch_assoc($res))!= null) {    // most asszociatív tömbként kezeljük a sorokat
            echo '<tr>';
            echo '<td id="ar'.$current_row["szobaszam"].'">' . $current_row["ar"] . '</td>';
            echo '<td id="ferohely'.$current_row["szobaszam"].'">' . $current_row["ferohely"] . '</td>';
            echo '</tr>';

        }
        //echo '</table>';
        
        mysqli_free_result($res);    // felszabadítjuk a lefoglalt memóriát
        mysqli_close($conn); // lezárjuk az adatbázis-kapcsolatot
    }

    function atlagnal_tobbet_foglaltak(){
        $conn = kapcsolodas();

        $sql = "SELECT * FROM 
        (SELECT vendeg.id, szuldatum, email, vnev, knev, count(foglalas.id) as szam FROM foglalas, vendeg WHERE vendegid=vendeg.id GROUP BY vendeg.id) as vendegek 
        WHERE szam > 
        (SELECT avg(szam) as atlag FROM (SELECT vendeg.id, szuldatum, email, vnev, knev, count(foglalas.id) as szam FROM foglalas, vendeg WHERE vendegid=vendeg.id GROUP BY vendeg.id) as vendegek);
        ";
        $res = mysqli_query($conn, $sql) or die ('Hibás utasítás!');

        while ( ($current_row = mysqli_fetch_assoc($res))!= null) {    // most asszociatív tömbként kezeljük a sorokat
            echo '<tr>';
            echo '<td>' . $current_row["id"] . '</td>';
            echo '<td>' . $current_row["vnev"] . " " . $current_row["knev"] . '</td>';
            echo '<td>' . $current_row["szuldatum"] . '</td>';
            echo '<td>' . $current_row["email"] . '</td>';
            echo '<td>' . $current_row["szam"] . '</td>';
            echo '</tr>';

        }


        mysqli_close($conn);


    }
   


    
 
    
?>