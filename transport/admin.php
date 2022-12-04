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
    $alert_msg = ($msg == "add") ? "Dodano nowy przejazd" : (($msg == "del") ? "Przejazd zostal pomyslnie usuniety!" : "Przejazd zostal zmodyfikowany!");
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
                <th scope="col">ID</th>
                <th scope="col">Poczatek</th>
                <th scope="col">Koniec</th>
                <th scope="col">Godzina</th>
                <th scope="col">Srodek transportu</th>
                <th scope="col">Czas</th>
                <th scope="col">cena</th>


                </tr>
            </thead>
            <tbody>
                <?php
if (!empty($records)) {
    while ($row = mysqli_fetch_assoc($results)) {
        ?>
                                <tr>
                                    <th scope="row"><?php echo $row['id']; ?></th>
                                    <td><?php echo $row['poczatek']?></td>
                                    <td><?php echo $row['koniec']; ?></td>
                                    <td><?php echo $row['godzina']; ?></td>
                                    <td><?php echo $row['srodek_transportu']; ?></td>
                                    <td><?php echo $row['czas']; ?></td>
                                    <td><?php echo $row['cena']; ?></td>
                                    <td>
                                        <a href="/transport/edit.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Edytuj</a>
                                        <a href="/transport/delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger" onClick="javascript:return confirm('Czy na pewno chcesz usunąć polaczenie?');" >Usun</a>
                                    </td>
                                </tr>

                            <?php
}
}
?>

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