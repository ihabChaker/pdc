<?php
interface IQuizBuilder
{
    public function getQuiz();
    public function generateNumQuiz();
    public function createQo($arr);
    public function createQcm($arr);
    public function createQcu($arr);
}
