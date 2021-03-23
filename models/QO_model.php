<?php
class QoModel
{
    public $question;
    public $proposotions;
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
    public function __construct($question, $proposotions)
    {
        $this->question = $question;
        $this->proposotions = $proposotions;
        $this->numQuiz = -1;
    }
    public function saveQo()
    {
        $this->connectToDb();
        $query = "INSERT INTO qo (question,propositions,num_quiz) VALUES ('$this->question','$this->proposotions',$this->numQuiz )";
        $stt = $this->pdo->prepare($query);
        $stt->execute();
        print_r($stt->errorInfo());
        $this->disconnectFromDb();
    }
}
