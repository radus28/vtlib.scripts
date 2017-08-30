<?php

$Vtiger_Utils_Log = true;
ini_set('error_reporting', E_ALL);
ini_set('display_errors', '1');
include_once('../../config.inc.php');
set_include_path($root_directory);
include_once('vtlib/Vtiger/Module.php');
include_once('vtlib/Vtiger/Block.php');

$moduleInstance = Vtiger_Module::getInstance("Contacts");
$blockInstance = Vtiger_Block::getInstance("LBL_PERSONAL_INFORMATION",$moduleInstance);
// add a new block
if($blockInstance === false) {
   $blockInstance = new Vtiger_Block();
    // Block Name
    // U Can Change the Name in Language File
   $blockInstance->label = 'LBL_PERSONAL_INFORMATION';
   $moduleInstance->addBlock($blockInstance);
}

// Add a field in the same New Block

$fieldInstance = Vtiger_Field::getInstance("name", $moduleInstance);
        if ($fieldInstance === false) {
$fieldInstance = new Vtiger_Field();
$fieldInstance->name = 'name';
$fieldInstance->label = 'LBL_NAME';
$fieldInstance->table = 'vtiger_contactdetails';
$fieldInstance->column = 'name';
$fieldInstance->columntype = 'varchar(100)';
$fieldInstance->uitype = 1;
$fieldInstance->typeofdata = 'V~O';
$blockInstance->addField($fieldInstance);
}

echo 'fields done';
