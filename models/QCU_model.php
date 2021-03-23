<?php
class QcuModel
{
    public $question;
    public $proposotions;
    public $reponse;
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
    public function __construct($question, $proposotions, $reponse)
    {
        $this->question = $question;
        $this->proposotions = $proposotions;
        $this->reponse = $reponse;
        $this->numQuiz = -1;
    }
    public function saveQcu()
    {
        $this->connectToDb();
        $query = "INSERT INTO qcu (question,propositions,reponse,num_quiz) VALUES ('$this->question','$this->proposotions' ,'$this->reponse','$this->numQuiz' )";
        $stt = $this->pdo->prepare($query);
        $stt->execute();
        print_r($stt->errorInfo());
        $this->disconnectFromDb();
    }
}
