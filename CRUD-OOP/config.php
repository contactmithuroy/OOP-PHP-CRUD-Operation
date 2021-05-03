<?php
class Database{
    public $host;
    public $username;
    public $password;
    public $database;
    protected function connect(){
        $this->host = 'localhost';
        $this->username = 'root';
        $this->password = '';
        $this->database = 'OOP-CRUD';
        $conn = new mysqli($this->host,$this->username,$this->password,$this->database);
        return $conn ; 
    }
}
