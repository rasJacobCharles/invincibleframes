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
class Projects extends Page
{
    public $pageSettingObj;
    public $projectID;
    public $meta = array();

    public function __construct(Settings $settingObj)
    {
        parent::__construct($settingObj);
    }

    public function display()
    {
        $this->getProjectID();
       
       $smarty = $this->pageSettingObj->smartyObject;
       $smarty->assign("projectID", $this->projectID);
       $smarty->assign("title", $this->getTitle());
       $smarty->assign("subtitle", $this->getSubtitle());
       $smarty->assign("info", $this->getProjectInfo());
       $smarty->assign("date", $this->getDate());
       $smarty->assign("client", $this->getClient());
       $smarty->assign("link", $this->getLink());
       $media = $this->getMedia();
       $smarty->assign("mediaArray", $this->getMediaData($media));
       switch ($media)
       {
           case "gallery":
               $smarty->display("gallery.tpl");
               break;
           case "video":
               $smarty->display("media.tpl");
               break;
           default :
               $smarty->display("basic.tpl");

       }
       

    }


    private function getTitle()
    {
        return $this->pageSettingObj->pageDataObject->
            selectProjectField("title", $this->pageSettingObj->pageDataObject->projectID);
    }
    private function getSubtitle()
    {
        return $this->pageSettingObj->pageDataObject->
            selectProjectField("subtitle", $this->pageSettingObj->pageDataObject->projectID);
    }
    private function getProjectInfo()
    {
        return $this->pageSettingObj->pageDataObject->
            selectProjectField("projectInfo", $this->pageSettingObj->pageDataObject->projectID);
    }
    private function getClient()
    {
        return $this->pageSettingObj->pageDataObject->
            selectProjectField("client", $this->pageSettingObj->pageDataObject->projectID);
    }
    private function getDate()
    {
        return $this->pageSettingObj->pageDataObject->
            selectProjectField("date", $this->pageSettingObj->pageDataObject->projectID);
    }
    private function getMedia()
    {
        return $this->pageSettingObj->pageDataObject->
            selectProjectField("media", $this->pageSettingObj->pageDataObject->projectID);
    }
    private function getMediaData($media)
    {
        $data = array();
        if($media == "video")
        {
           $this->pageSettingObj->pageDataObject->
            fetchProjectMedia($data);
        }
        else
        {
           $this->pageSettingObj->pageDataObject->
            fetchProjectImages($data);
        }
        return $data;

    }
    private function getLink()
    {
        return $this->pageSettingObj->pageDataObject->
            selectProjectField("link", $this->pageSettingObj->pageDataObject->projectID);
    }
    private function getProjectID()
    {
        $this->projectID = $this->pageSettingObj->pageDataObject->
            selectProjectID($this->pageSettingObj->pageName);
        
    }
   
}