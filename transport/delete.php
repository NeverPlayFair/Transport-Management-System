<?php
if (!empty($_GET['id'])) {

    require_once 'includes/db.php';

    $pracownik_id = $_GET['id'];
    $del_query = "DELETE FROM `polaczenia` WHERE id = '" . $pracownik_id . "'";
    $result = mysqli_query($conn, $del_query);
    if ($result) {
        header('location:/transport/index.php?msg=del');
    }
}
