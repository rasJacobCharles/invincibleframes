<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Classes\Display;

/**
 * Description of Page
 *
 * @author Jacob
 */
class Page
{
    public $pageSettingObj;
    public $pageID;
    public $meta = array();

    public function __construct(Settings $settingObj)
    {
        $this->pageSettingObj = $settingObj;
        $this->display();
    }

    public function display()
    {
        $this->getPageID();
        $this->getMetaData();
        $linkString =  ($this->pageSettingObj->pageName != "home")?
            "index.php" : "";
       $smarty = $this->pageSettingObj->smartyObject;
       $smarty->assign("meta", $this->meta);
       $smarty->assign("siteLink", $linkString);
       switch ($this->pageSettingObj->pageName)
       {
           case "home":
               $this->displayHomePage($smarty);
               break;
           case "projects":
               $this->displayProjectPage($smarty);
               break;
           default :
                $this->displayHomePage($smarty);
               break;
       }

    }
    private function displayHomePage($smarty)
    {

       $smarty->display("header.tpl");
       $smarty->display("video.tpl");
       $smarty->display("about.tpl");
       $this->recentWork($smarty);
       $smarty->display("process.tpl");
       $smarty->display("team.tpl");
       $smarty->display("contact.tpl");
       $smarty->assign("page", "home");
       $smarty->display("footer.tpl");


    }
    private function displayProjectPage($smarty)
    {

       $smarty->display("header.tpl");
       $this->recentWork($smarty, 0);
       $smarty->assign("page", "project");
       $smarty->display("footer.tpl");


    }
    private function recentWork($smarty, $limit = 6)
    {
        $projects = array();
        $projectsSkills= array();
       $this->pageSettingObj->pageDataObject->
        fetchProjects($projects, $limit);
       $this->pageSettingObj->pageDataObject->
        fetchProjectType($projectsSkills);
       $smarty->assign("projects", $projects);
       $smarty->assign("limit", $limit);
       $smarty->assign("projectTags", $projectsSkills);
       $smarty->display("recentwork.tpl");
    }

    private function getPageID()
    {
        $this->pageID = $this->pageSettingObj->pageDataObject->
            selectPageID($this->pageSettingObj->pageName);
    }
    private function getMetaData()
    {
        $this->pageSettingObj->pageDataObject->
        fetchMetaData($this->meta);
     
    }

}