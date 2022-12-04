<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="style.css">
    <title>Logowanie</title>
</head>
<body>
<?php include 'partial/head.php';?>
   <?php include 'partial/nav.php';?>
    <div class="st">
        <form action="admin.php" method="post">
            <p>
                <label>Nazwa:</label>

            <input type="text" id="uzytkownik" name="uzytkownik">
            <!-- <select name="uzytkownik" id="user"> -->
                <!-- <option value="uzytkownik">Admin</option> -->
            <!-- </select> -->
            </p>
            <p>
                <label>Haslo:</label>
                <input type="password" id="haslo" name="haslo">
            </p>
            <p>
                
                <input type="submit" id="zaloguj" name="zaloguj">
            </p>
        </form>
    </div>
    
</body>
</html>


