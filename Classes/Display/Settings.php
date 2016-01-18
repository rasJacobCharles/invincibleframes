<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Classes\Display;

/**
 * Description of Settings
 *
 * @author Jacob
 */
use \Classes\PDO\Mysql as Connect;
use \Classes\Database\Get as Fetch;

class Settings
{
    public $pageName;
    public $pageDataObject;
    public $smartyObject;
    /**
     * The name of the page be created.
     * @param string $name
     */
    public function __construct($name)
    {
        $this->setPageName($name);
        $pdo = new Connect\Connect();
        $this->pageDataObject = new  Fetch\Data($pdo->getMysqli());
        $smarty = new Smarty(Smarty::getSmartyObj());
        $this->smartyObject =$smarty->getSmarty();
    }
    protected function setPageName($name)
    {
        if(!is_string($name))
        {
            throw new Exception("Page Name most be a string", 0);
        }
        $this->pageName = strtolower($name);
    }

}