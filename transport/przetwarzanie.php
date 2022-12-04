
<?php
    require_once 'includes/db.php';
    

    $nazwa = $_POST['uzytkownik'];
    $haslo = $_POST['haslo'];

    $nazwa = stripcslashes($nazwa);
    $haslo = stripcslashes($haslo);

    // SELECT * from login where nazwa = '$nazwa' and haslo = '$haslo'
   
    $query = "SELECT * from zaloguj where nazwa = '$nazwa' and haslo = '$haslo'";

    $result = mysqli_query($conn, $query);

    // ($row['uzytkownik'] == $nazwa && $row['haslo'] == $haslo)
    // (isset($_POST['uzytkownik']) == $row[1] && (isset($_POST['haslo']) == $row[2]))
    $row = mysqli_fetch_array($result);


    if(isset($_POST['uzytkownik']) == $row[1] && (isset($_POST['haslo']) == $row[2])){
        echo "Zalogowano, witaj ".$row['nazwa']; 

    }
    else {
        echo "Logowanie nieudane ";
    }


?>

<!-- <a href="index.php">Strona główna</a> -->

<?php

require_once 'includes/db.php';
$query = "SELECT * FROM `transport`";
$results = mysqli_query($conn, $query);
$records = mysqli_num_rows($results);
$msg = "";
if (!empty($_GET['msg'])) {
    $msg = $_GET['msg'];
    $alert_msg = ($msg == "add") ? "Polaczenie zostało zmodyfikowane" : (($msg == "del") ? "Polaczenie usuniete!" : "Polacznie zmodyfikowane!");
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
                <th scope="col">Nazwa</th>
                <th scope="col">Plec</th>
                <th scope="col">Stanowisko</th>
                <th scope="col">Dzial</th>
                <th scope="col">Nowy</th>


                </tr>
            </thead>
            <tbody>
                <?php
if (!empty($records)) {
    while ($row = mysqli_fetch_assoc($results)) {
        ?>
                                <tr>
                                    <th scope="row"><?php echo $row['id']; ?></th>
                                    <td><?php echo $row['nazwa']?></td>
                                    <td><?php echo $row['plec']; ?></td>
                                    <td><?php echo $row['stanowisko']; ?></td>
                                    <td><?php echo $row['dzial']; ?></td>
                                    <td><?php echo $row['nowy']; ?></td>
                                    <td>
                                        <a href="/transport/add.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Edytuj</a>
                                        <a href="/transport/delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger" onClick="javascript:return confirm('Czy na pewno chcesz usunąć pracownika?');" >Usun</a>
                                    </td>
                                </tr>

                            <?php
}
}
?>






            </tbody>
        </table>
    </div>
</body>
</html>