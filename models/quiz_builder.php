<?php
require_once("Iquiz_builder.php");
require_once("quiz_model.php");
require_once("QCM_model.php");
require_once("QCU_model.php");
require_once("QO_model.php");

class QuizBuilder
{
    private static $quiz;
    public static function  startCreation()
    {
        QuizBuilder::$quiz = new Quiz();
        QuizBuilder::generateNumQuiz();
    }
    public static function getQuiz()
    {
        return QuizBuilder::$quiz;
    }
    public static function generateNumQuiz()
    {
        QuizBuilder::$quiz->num = rand(1, pow(10, 8));
    }
    public function createQcm($question, $propositions, $reponses)
    {
        $qcm = new QcmModel($question, $propositions, $reponses);
        $qcm->saveQcm();
    }
    public function createQcu($question, $propositions, $reponse)
    {
        $qcu = new QcuModel($question, $propositions, $reponse);
        $qcu->saveQcu();
    }
    public function createQo($question, $propositions)
    {

        $qo = new QoModel($question, $propositions);
        QuizBuilder::$quiz->addQo($qo);
        $qo->saveQo();
    }
}
