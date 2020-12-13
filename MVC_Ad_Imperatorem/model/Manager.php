<?php



class Manager
{
    // connection to database
    // instantiate and send the associated PDO object
    protected function getDB(){
        $db = new PDO('mysql:host=localhost;dbname=ad_imperatorem;charset=utf8',
            'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        return $db;
    }
}
