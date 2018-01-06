<?php
/**
 * Created by PhpStorm.
 * User: drcha
 * Date: 18/12/2017
 * Time: 19:14
 */
namespace Model;

use \OCFram\Manager;

abstract class ChapterManager extends Manager
{
	abstract public function getList($debut=-1, $limite=-1);
}








