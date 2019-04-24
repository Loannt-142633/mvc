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
}