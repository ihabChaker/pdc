<?php
session_start();
require_once("./models/compte_apprenant_controller.php");

if (isset($_POST["submit"])) {
    $cap =  CompteApprenantController::getUniqueInstance();
    print_r($cap->connect($_POST["username"], $_POST["pwd"]));
    if (isset($_SESSION["username"])) {
        header("Location: apprenant_view.php");
    }
}
if (isset($_POST["disconnect"])) {
    session_unset();
}
if (isset($_SESSION["username"])) {
    header("Location: apprenant_view.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <center>
        <h2>Login Apprenant</h2>
        <form action="./login_apprenant_view.php" method="post">
            <label for="username">username</label>
            <input type="text" name="username" id="username" />
            <br>
            <label for="pwd">password</label>
            <input type="text" name="pwd" id="pwd" />
            <br>
            <input type="submit" name="submit" value="submit">
        </form>
    </center>
    <form action="./login_apprenant_view.php" method="post">
        <input type="submit" name="submit" value="disconnect">
    </form>
</body>

</html>