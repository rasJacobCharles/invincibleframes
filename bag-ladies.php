<?php
require_once 'vendor/autoload.php';
require_once 'Classes/autoload.php';
use Classes\Display as PageSetup;
$setting = new PageSetup\Settings("Bag Ladies");
$project = new PageSetup\Projects($setting);