
<?php
    // require_once 'includes/db.php';
    

    // $nazwa = $_POST['uzytkownik'];
    // $haslo = $_POST['haslo'];

    // $nazwa = stripcslashes($nazwa);
    // $haslo = stripcslashes($haslo);

    // // SELECT * from login where nazwa = '$nazwa' and haslo = '$haslo'
   
    // $query = "SELECT * from zaloguj where nazwa = '$nazwa' and haslo = '$haslo'";

    // $result = mysqli_query($conn, $query);

    // // ($row['uzytkownik'] == $nazwa && $row['haslo'] == $haslo)
    // // (isset($_POST['uzytkownik']) == $row[1] && (isset($_POST['haslo']) == $row[2]))
    // $row = mysqli_fetch_array($result);


    // if(isset($_POST['uzytkownik']) == $row[1] && (isset($_POST['haslo']) == $row[2])){
    //     echo "Zalogowano, witaj ".$row['nazwa']; 

    // }
    // else {
    //     echo "Logowanie nieudane ";
    // }


?>
<?php

require_once 'includes/db.php';
$query = "SELECT * FROM `polaczenia`";
$results = mysqli_query($conn, $query);
$records = mysqli_num_rows($results);
$msg = "";
if (!empty($_GET['msg'])) {
    $msg = $_GET['msg'];
    $alert_msg = ($msg == "add") ? "Polaczenie dodane" : (($msg == "del") ? "Polaczenie usuniete!" : "Polaczenie zmodyfikowane!");
} else {
    $alert_msg = "";
}

?>

<!DOCTYPE html>
<html lang="en">


<?php include 'partial/head.php';?>
<body>

   <?php include 'partial/nav.php';?>
    <div class="container">
<?php if (!empty($alert_msg)) {?>
        <div class="alert alert-sukces"><?php echo $alert_msg; ?></div>
<?php }?>
    <div class="info"></div>
        <table class="table">
            <thead>
                <tr>
                <!-- <th scope="col">ID</th> -->
                <th scope="col">Poczatek</th>
                <th scope="col">Koniec</th>
                <th scope="col">Godzina</th>
                <th scope="col">Srodek transportu</th>
                <th scope="col">Czas(min)</th>
                <th scope="col">Cena(zl)</th>


                </tr>
            </thead>
            <tbody>
                <?php
if (!empty($records)) {
    while ($row = mysqli_fetch_assoc($results)) {
        ?>
                                <tr>
                                  
                                    <td><?php echo $row['poczatek']?></td>
                                    <td><?php echo $row['koniec']; ?></td>
                                    <td><?php echo $row['godzina']; ?></td>
                                    <td><?php echo $row['srodek_transportu']; ?></td>
                                    <td><?php echo $row['czas']; ?></td>
                                    <td><?php echo $row['cena']; ?></td>
                                    <td>

                                    </td>
                                </tr>

                            <?php
}
}
?>

<div class="container">

<form method="POST" action="index.php">

<center>
Podaj przystanek początkowy:
<select name="poczatek" class="poczatek" >       

        <?php
        require_once 'includes/db.php';
        $pol_query="SELECT DISTINCT poczatek from polaczenia";
        $result=mysqli_query($conn,$pol_query);

        while($row=mysqli_fetch_array($result)){
        ?>
        <option value="<?php print $row[0] ?>"><?php print $row[0] ?></option>
        <?php
        }
        ?>
        </select>


        </div>
    </div>
    <center>
Podaj przystanek początkowy:
<select name="koniec" class="koniec">       

        <?php
        require_once 'includes/db.php';
        $pol_query="SELECT DISTINCT koniec from polaczenia";
        $result=mysqli_query($conn,$pol_query);

        while($row=mysqli_fetch_array($result)){
        ?>
        <option value="<?php print $row[0] ?>"><?php print $row[0] ?></option>
        <?php
        }
        ?>

<tr>
<!-- "SELECT * from polaczenia"; -->
<?php
if(isset($_POST['znajdz'])){
require_once 'includes/db.php';

// $poczatek = (!empty($_POST['poczatek'])) ? $_POST['poczatek'] : '';
// $koniec = (!empty($_POST['koniec'])) ? $_POST['koniec'] : '';
$poczatek=$_POST['poczatek'];
$koniec=$_POST['koniec'];
$query="SELECT * from polaczenia where poczatek='$poczatek' AND koniec='$koniec'";
$result=mysqli_query($conn,$query);

while($row1=mysqli_fetch_array($result)){
    print "$row1[1]
    $row1[2]
    $row1[3]
    $row1[4]
    $row1[5]
    $row1[6]
    ";

}
}

?>
<center>
<input type="submit" name="znajdz" value="Filtruj">
</center>
</tr>

        </select>

        </center>
        <center>
        <input type="hidden" name="pracownik_id" value="<?php echo $prac_id; ?>">


        <!-- <input type="submit" name="submit" class="btn btn-success" value="Filtruj"> -->
       
        
        </center>

<img src="f1.jpg" alt="" width="800px" height=350px>
<!-- <img src="logo.png" id="logo"> -->

<div class="logo">
<img src="flixbus.png" width="150px" height="100px" >
</div>

<style>
    body{
        background-color: #73d700;
    }
    .table{
        color:"#73d700"
    }
    .logo {
        position: relative;
    }
    .logo img {
        position: absolute;
        top: -450px;
        right: -215px;
    }
</style>

            </tbody>
        </table>
    </div>
</body>
</html>

