<?php
/**
 * Created by PhpStorm.
 * User: drcha
 * Date: 30/12/2017
 * Time: 13:53
 */

namespace OCFram;


class PDOFactory

{
	public static function getMysqlConnexion()
	{
		$db = new \PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
		$db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

		return $db;
	}
}
