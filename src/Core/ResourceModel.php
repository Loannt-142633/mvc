<?php
namespace MVC\Core;

use MVC\Config\Database;

require_once('F:\xampp\htdocs\mvc\src\Config\db.php');
/**
 * 
 */
class ResourceModel
{
	
	private $model;
	private $table;
    
 	public function showAll($table)
	{
        $sql = "SELECT * FROM $table";
        $req = Database::getBdd()->prepare($sql);
        $req->execute();
        return $req->fetchAll();
	}
	public function create($table, $model)
	{
		
		$column = $model->getpro();
		print_r($column);
		$column_name = '';
		$column_value = '';
		foreach ($column as $key => $value) {
			$column_name .= $key.', ';
			$column_value .= ':'.$key.',';
		}
		$sql = "INSERT INTO $table (".substr($column_name, 0, -2).") VALUES (".substr($column_value, 0, -1).")";
		$req = Database::getBdd()->prepare($sql);
		$req->execute($column);
	}
	public function delete($table, $id)
	{
		$sql = "DELETE FROM $table WHERE id = ?";
		$req = Database::getBdd()->prepare($sql);
		$req->execute([$id]);
	}
	public function show($table, $id)
	{
		$sql = "SELECT * FROM $table WHERE id = $id";
		$req = Database::getBdd()->prepare($sql);
		$req->execute();
        return $req->fetch();
	}
	public function edit($table, $model)
	{
		$str = '';
		$column = $model->getpro();
		$columnsql = $model->getpro();
		unset($columnsql['created_at']);
		unset($columnsql['id']);
		foreach ($columnsql as $key => $value) {
			$str .= $key.' = :'.$key.', ';
		}
        $sql = "UPDATE $table SET ".substr($str, 0, -2)." WHERE id = :id";
		$req = Database::getBdd()->prepare($sql);
		unset($column['created_at']);
		$req->execute($column);
	}
}