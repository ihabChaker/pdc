<?php
class Quiz
{
    public $listQcu;
    public $listQo;
    public $listQcm;
    public $nomQuiz;
    public $num;
    public function __construct()
    {
        $this->listQcu = array();
        $this->listQo = array();
        $this->listQcm = array();
        $this->num = -1;
    }
    public function addQcu($qcu)
    {
        array_push($this->listQcu, $qcu);
    }
    public function addQcm($qcm)
    {
        array_push($this->listQcm, $qcm);
    }
    public function addQo($qo)
    {
        array_push($this->listQo, $qo);
    }
}
