<?php
namespace MVC\Models;

use MVC\Core\ResourceModel;
/**
 * lop luu tru du lieu
 */
class TaskResourceModel extends ResourceModel
{
	private $table;
	private $column;
	private $id;

	function __construct()
	{
		$this->table = 'tasks';
	}
	public function showAll($table)
	{
		$sql= "SELECT * FROM $table";
		return parent::showAll($sql);
	}
	public function createTask($table, $column)
	{
		$column_name = '';
		$column_value = '';
		foreach ($column as $key => $value) {
			$column_name .= $key.', ';
			$column_value .= ':'.$key.',';
		}
		$sql = "INSERT INTO $table (".substr($column_name, 0, -2).") VALUES (".substr($column_value, 0, -1).")";
		parent::createTask($sql, $column);
	}
	public function delete($table, $id)
	{
		$sql = "DELETE FROM $table WHERE id = ?";
		parent::delete($sql, $id);
	}
	public function showTask($table, $id)
	{
        $sql = "SELECT * FROM $table WHERE id = $id";
        return parent::show($sql);
	}
	public function editTaskk($table, $column, $id)
	{
		$str = '';
		foreach ($column as $key => $value) {
			$str .= $key.' = :'.$key.', ';
		}
		$sql = "UPDATE $table SET ".substr($str, 0, -2)." WHERE id = :id";
		$add = array(
			'id' => $id
		);
		$columnn = $add + $column;
        parent::editTask($sql, $columnn);
	}
}