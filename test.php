<?php
session_start();
if (!isset($_SESSION["num"])) {
    $_SESSION["num"] = 0;
}
class Test
{
    public static $num;
    public static function addNum()
    {

        Test::$num = $_SESSION["num"] + 1;
        $_SESSION["num"] = Test::$num;
        echo Test::$num;
    }
}
if (isset($_POST["test"])) {
    Test::addNum();
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
    <form action="./test.php" method="POST">
        <input type="submit" value="show" name="test">
    </form>
</body>

</html>