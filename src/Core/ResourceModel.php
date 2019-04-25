<?php
namespace MVC\Core;

use MVC\Config\Database;

require_once('F:\xampp\htdocs\mvc\src\Config\db.php');
/**
 * 
 */
class ResourceModel
{
	
	private $table;

	public function showAll($sql)
	{
        $req = Database::getBdd()->prepare($sql);
        $req->execute();
        return $req->fetchAll();
	}
	public function createTask($sql, $table)
	{
		$req = Database::getBdd()->prepare($sql);
		$req->execute($table);
	}
	public function delete($sql,$table)
	{
		$req = Database::getBdd()->prepare($sql);
		$req->execute([$table]);
	}
	public function show($sql)
	{
		$req = Database::getBdd()->prepare($sql);
		$req->execute();
        return $req->fetch();
	}
	public function editTask($sql, $table)
	{
		$req = Database::getBdd()->prepare($sql);
		$req->execute($table);
	}
}