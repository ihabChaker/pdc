<?php
class QcmModel
{
    public $question;
    public $propositions;
    public $reponses;
    public $numQuiz;
    private $pdo;
    private function connectToDb()
    {
        $this->pdo = new PDO("mysql:dbname=pdc;host=127.0.0.1;", "root", "");
    }
    private function disconnectFromDb()
    {
        $this->pdo = null;
    }
    public function __construct($question, $propositions, $reponses)
    {
        $this->question = $question;
        $this->propositions = $propositions;
        $this->reponses = $reponses;
        $this->numQuiz = -1;
    }
    public function saveQcm()
    {
        $this->connectToDb();
        $query = "INSERT INTO qcm (question,propositions,reponses,num_quiz) VALUES ('$this->question','$this->propositions' ,'$this->reponses',$this->numQuiz )";
        $stt = $this->pdo->prepare($query);
        $stt->execute();
        print_r($stt->errorInfo());
        $this->disconnectFromDb();
    }
}
