<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Classes\Display;

/**
 * Description of Smarty
 *
 * @author Jacob
 */
class Smarty
{
    public $smartyObject;
    public static $staticSmartyObj;
    public function __construct(\Smarty $smarty)
    {
        $this->smartyObject = $smarty;
        $this->smartyObject->setTemplateDir(ROOT_DIR.'/templates');
        $this->smartyObject->setCompileDir(ROOT_DIR.'/templates_c');
        $this->smartyObject->setCacheDir(ROOT_DIR.'/cache');
        $this->smartyObject->setConfigDir(ROOT_DIR.'/configs');
    }
    public static function getSmartyObj()
    {
        static::$staticSmartyObj = new \Smarty();
        return static::$staticSmartyObj;
    }
    public function getSmarty()
    {
        if(!is_object($this->smartyObject)){
            throw new Exception ("Please assign a smarty object before"
        . " attempting to fetech on", 0);
        }
        return $this->smartyObject;
    }
}