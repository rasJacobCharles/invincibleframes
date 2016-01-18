<?php
require_once 'vendor/autoload.php';
require_once 'Classes/autoload.php';
use Classes\Display as PageSetup;
$setting = new PageSetup\Settings("process");
$page = new PageSetup\Page($setting);



