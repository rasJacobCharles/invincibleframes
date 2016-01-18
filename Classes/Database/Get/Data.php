<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Classes\Database\Get;

/**
 * Description of Data
 *
 * @author Jacob
 */
class Data
{
    private $mysqliObj;
    public $pageID;
    public $projectID;

    public function __construct(\mysqli $pdo)
    {
        $this->mysqliObj = $pdo;
    }
    public function fetchMetaData(&$metaData)
    {
        $query = "SELECT title, description
           FROM pages
           WHERE pageID= '$this->pageID'
           ";
       $result = $this->selectRecord($query);
       $metaData['title'] = $result['title'];
       $metaData['description'] = $result['description'];
       
    }
    public function fetchPageOptions()
    {

    }
    public function fetchKeyWords()
    {

    }
    public function fetchProjects(&$projects,$limit = 6)
    {
        $query = "SELECT title, subtitle, thumb, projectID
           FROM project
           ";
       $query .= (is_int($limit) && $limit > 0)? "LIMIT 0,$limit" : "";
       $projects = $this->selectRecords($query);
       
    }
    public function fetchProjectType(&$types)
    {
        $query = "SELECT *
           FROM skills
           ";
       $types = $this->selectRecords($query);
    }
    public function fetchProjectImages(&$gallery)
    {
        $query = "SELECT *
           FROM project_images
           ";
       $gallery = $this->selectRecords($query);
    }
    public function fetchProjectMedia(&$media)
    {
        $query = "SELECT *
           FROM project_media
           ";
       $media = $this->selectRecords($query);
    }

    public function selectPageID($pageName)
    {
       $query = "SELECT pageID
           FROM pages
           WHERE pagename= '$pageName'
           ";
       $this->pageID  = $this->returnResults("pageID", $query);
       return $this->pageID;
    }
    public function selectProjectID($projectName)
    {
       $query = "SELECT projectID
           FROM project
           WHERE title= '$projectName'
           ";
       $this->projectID = $this->returnResults("projectID", $query);
       return $this->projectID;
       

    }
    public function selectProjectField($type, $id)
    {
       $query = "SELECT $type
           FROM project
           WHERE projectID= $id
           ";
       return $this->returnResults($type, $query);


    }
    private function returnResults($type, $query)
    {
       $result = $this->selectRecord($query);
       return (isset( $result[$type]))? $result[$type]: FALSE;
    }
    private function selectRecords($query)
    {
        $results = $this->mysqliObj->query($query, MYSQLI_USE_RESULT);
       
        $resultArray = array();
        
        // output data of each row
        while($row = $results->fetch_assoc()) {
            $resultArray[] = $row;
        }
        
        return $resultArray;
        
    }
    private function selectRecord($query)
    {
     $result = $this->mysqliObj->query($query);
     
        $resultArray = $result->fetch_assoc();
        
        return $resultArray;
    }
    private function close()
    {
        $this->mysqliObj->close();
    }
}