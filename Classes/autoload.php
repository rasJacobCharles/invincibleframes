<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function autoload($class)
{
    $className = ltrim($class, '\\');
    $fileName  = '';
    $namespace = '';
    $lastNsPos = strrpos($className, '\\');
    if ($lastNsPos) {
        $namespace = substr($className, 0, $lastNsPos);
        $className = substr($className, $lastNsPos + 1);
        $fileName  = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
    }
    $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';
    
    require $fileName;
}
spl_autoload_register('autoload');

define ("ROOT_DIR", dirname(__DIR__));