<?php
/**
 * Created by PhpStorm.
 * User: drcha
 * Date: 18/12/2017
 * Time: 18:34
 */

require_once 'model/BdManager.php';
require_once 'App/Frontend/Modules/Chapters/Chapter.php';
require_once 'model/ChapterManager.php';


$Chapter=new Chapter();
$Bd=new BdManager();



echo'la valeur est'.(Chapter:getId()).;