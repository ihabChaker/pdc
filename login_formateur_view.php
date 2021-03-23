<?php
session_start();
require_once("./models/compte_formateur_controller.php");
if (isset($_SESSION["usernameF"])) {
    echo $_SESSION["usernameF"];
}
if (isset($_POST["submit"])) {
    $cap =  CompteFormateurController::getUniqueInstance();
    print_r($cap->connect($_POST["username"], $_POST["pwd"]));
    if (isset($_SESSION["usernameF"])) {
        header("Location: formateur_view.php");
    }
}
if (isset($_POST["disconnect"])) {
    session_unset();
}
if (isset($_SESSION["usernameF"])) {
    header("Location: formateur_view.php");
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
        <h2>Login Formateur</h2>
        <form action="./login_formateur_view.php" method="post">
            <label for="username">username</label>
            <input type="text" name="username" id="username" />
            <br>
            <label for="pwd">password</label>
            <input type="text" name="pwd" id="pwd" />
            <br>
            <input type="submit" name="submit" value="submit">
        </form>
    </center>

</body>

</html>