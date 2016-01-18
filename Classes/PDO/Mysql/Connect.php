<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Classes\PDO\Mysql;

/**
 * Description of Connect
 *
 * @author Jacob
 */
class Connect
{
    protected $connectObj;

    //put your code here
    public function getMysqli()
    {
        $this->loadConnectFile();
        $mysqli = mysqli_connect($this->connectObj->host,
            $this->connectObj->username, $this->connectObj->password,
            $this->connectObj->database);
        if (mysqli_connect_error()) {
            die('Connect Error ('.mysqli_connect_errno().') '
                .mysqli_connect_error());
        }
        return $mysqli;
    }

    private function loadConnectFile()
    {

        $jsonString = file_get_contents(__DIR__.DIRECTORY_SEPARATOR."connect_local.json");

        $this->connectObj = json_decode($jsonString);
    }
}