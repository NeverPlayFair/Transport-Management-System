

<?php

if (isset($_POST['submit']) && $_POST['submit'] != '') {

    require_once 'includes/db.php';

    $poczatek = (!empty($_POST['poczatek'])) ? $_POST['poczatek'] : '';
    $koniec = (!empty($_POST['koniec'])) ? $_POST['koniec'] : '';
    $godzina = (!empty($_POST['godzina'])) ? $_POST['godzina'] : '';
    $srodek_transportu = (!empty($_POST['srodek_transportu'])) ? $_POST['srodek_transportu'] : '';
    $czas = (!empty($_POST['czas'])) ? $_POST['czas'] : '';
    $cena = (!empty($_POST['cena'])) ? $_POST['cena'] : '';
    $id = (!empty($_POST['pracownik_id'])) ? $_POST['pracownik_id'] : '';

    if (!empty($id)) {

        $prac_query = "UPDATE `polaczenia` SET poczatek='" . $poczatek . "', koniec='" . $koniec . "',godzina='" . $godzina . "',srodek_transportu= '" . $srodek_transportu . "', czas='" . $czas . "', cena='" . $cena . "'  WHERE id ='" . $id . "'";
        $msg = "update";
    } else {

        $prac_query = "INSERT INTO `polaczenia` (poczatek, koniec, godzina,srodek_transportu, czas, cena) VALUES ('" . $poczatek . "', '" . $koniec . "', '" . $godzina . "', '" . $srodek_transportu . " ', '" . $czas . "', '" . $cena . "')";
        $msg = "add";
    }
    
    $result = mysqli_query($conn, $prac_query);

    if ($result) {
        header('location:/transport/index.php?msg=' . $msg);
    }

}

if (isset($_GET['id']) && $_GET['id'] != '') {

    require_once 'includes/db.php';

    $prac_id = $_GET['id'];
    $prac_query = "SELECT * FROM `polaczenia` WHERE id='" . $prac_id . "'";
    $prac_res = mysqli_query($conn, $prac_query);
    $results = mysqli_fetch_row($prac_res);
    $poczatek= $results[1];
    $koniec = $results[2];
    $godzina = $results[3];
    $srodek_transportu = $results[4];
    $czas = $results[5];
    $cena = $results[6];

} else {
    $poczatek = "";
    $koniec = "";
    $godzina = "";
    $srodek_transportu = "";
    $czas = "";
    $cena = "";
    $prac_id = "";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="style.css">    
</head>
<?php include 'partial/head.php';?>
<body>
   <?php include 'partial/nav.php';?>


 

    <div class="container">

        <form method="POST" action="">
        
        
        <div class="form-group row">
                <label for="poczatek" class="col-sm-3 col-form-label">Poczatek</label>
                <div class="col-sm-7">
                <input type="text" name="poczatek" class="form-control" id="poczatek" placeholder="Poczatek" value="<?php echo $poczatek; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="koniec" class="col-sm-3 col-form-label">Koniec</label>
                <div class="col-sm-7">
                <input type="text" name="koniec" class="form-control" id="koniec" placeholder="Plec" value="<?php echo $koniec; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="godzina" class="col-sm-3 col-form-label">Godzina</label>
                <div class="col-sm-7">
                <input type="text" name="godzina" class="form-control" id="godzina" placeholder="godzina" value="<?php echo $godzina; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="srodek_transportu" class="col-sm-3 col-form-label">Transport</label>
                <div class="col-sm-7">
                <input type="srodek_transportu" value="<?php echo $srodek_transportu; ?>" name="srodek_transportu" class="form-control" id="srodek_transportu" placeholder="transport">
                </div>
                </div>
            <div class="form-group row">
                <label for="czas" class="col-sm-3 col-form-label">Czas</label>
                <div class="col-sm-7">
                <input type="text" name="czas" class="form-control" id="czas" placeholder="Czas" value="<?php echo $czas; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="cena" class="col-sm-3 col-form-label">Cena</label>
                <div class="col-sm-7">
                <input type="text" name="cena" class="form-control" id="cena" placeholder="cena" value="<?php echo $cena; ?>">
                </div>
            </div>


                <input type="hidden" name="pracownik_id" value="<?php echo $prac_id; ?>">
                <input type="submit" name="submit" class="btn btn-success" value="Zmien" />
                </div>
            </div>
        </form>
    </div>
</div>

</body>
</html>