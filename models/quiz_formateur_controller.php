<?php
require_once("quiz_builder.php");
class QuizFormateurController
{
    private $formateur;
    private static $uniqueInstance;
    private function __construct()
    {
    }
    public static function getUniqueInstance()
    {
        if (QuizFormateurController::$uniqueInstance == null) {
            QuizFormateurController::$uniqueInstance = new QuizFormateurController();
        }
        return QuizFormateurController::$uniqueInstance;
    }
}
