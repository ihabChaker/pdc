<?php
class CompteFormateurModel
{
    private $pdo;
    public function connect($username, $pwd)
    {
        $this->connectToDb();
        $query = "SELECT * FROM compte_formateur WHERE  username ='$username'  AND pwd='$pwd'";
        $stt = $this->pdo->prepare($query);
        $stt->execute();
        $this->disconnectFromDb();
        return $stt->fetchAll();
    }
    public function disconnect()
    {
    }
    private function connectToDb()
    {
        $this->pdo = new PDO("mysql:dbname=pdc;host=127.0.0.1;", "root", "");
    }
    private function disconnectFromDb()
    {
        $this->pdo = null;
    }
}
