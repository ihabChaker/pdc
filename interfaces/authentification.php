<?php
interface Authentification
{
    public function connect($username, $pwd);
    public function disconnect();
}
