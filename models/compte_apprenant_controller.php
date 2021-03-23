<?php
require_once("compte_apprenant_model.php");
class CompteApprenantController
{
    private $apprenant;

    private static $uniqueInstance;
    private function __construct()
    {
    }
    public static function getUniqueInstance()
    {
        if (CompteApprenantController::$uniqueInstance == null) {
            CompteApprenantController::$uniqueInstance = new CompteApprenantController();
        }
        return CompteApprenantController::$uniqueInstance;
    }
    public function connect($username, $pwd)
    {
        if ($this->apprenant == null) {
            $this->apprenant = new CompteApprenantModel();
        }
        $exist = $this->apprenant->connect($username, $pwd);
        if ($exist) {
            print_r($exist);
            $_SESSION["username"] = $username;
        } else {
            $_SESSION["erreur"] = "Wrong username / password";
        }
    }
    public function disconnect()
    {
        session_unset();
    }
    public function getListQuiz()
    {
        if (isset($_SESSION["username"])) {
            return $this->apprenant->getListQuiz();
        }
    }
}
