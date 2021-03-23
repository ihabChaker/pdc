<?php

require_once("compte_formateur_model.php");

class CompteFormateurController
{
    private $formateur;
    private static $uniqueInstance;
    private function __construct()
    {
    }
    public static function getUniqueInstance()
    {
        if (CompteFormateurController::$uniqueInstance == null) {
            CompteFormateurController::$uniqueInstance = new CompteFormateurController();
        }
        return CompteFormateurController::$uniqueInstance;
    }
    public function connect($username, $pwd)
    {
        if ($this->formateur == null) {
            $this->formateur = new CompteFormateurModel();
        }
        $exist = $this->formateur->connect($username, $pwd);
        if ($exist) {
            print_r($exist);
            $_SESSION["usernameF"] = $username;
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
