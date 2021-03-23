<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login_apprenant_view.php");
}
if (isset($_POST["disconnect"])) {
    session_unset();

    header("Location: login_apprenant_view.php");
}

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Vous etes Connectées <?php echo $_SESSION["username"] ?></h1>

    <form action="./apprenant_view.php" method="post">
        <input type="submit" name="disconnect" value="disconnect">
    </form>
</body>

</html>