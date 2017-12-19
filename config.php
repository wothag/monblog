<?php
/**
 * Created by PhpStorm.
 * User: drcha
 * Date: 18/12/2017
 * Time: 18:42
 */

define('ROOT',$_SERVER['DOCUMENT_ROOT'].'/');
define('MODEL', ROOT."model/");
define('VIEW', ROOT."view/");
define('CONTROLLER', ROOT."controller/");

function loadClass()

{
	require 'model/BdManager.php';
	require 'model/Chapter.php';
	require 'model/ChapterManager.php';
}

spl_autoload('loadClass');

include (CONTROLLER.'functions.php');