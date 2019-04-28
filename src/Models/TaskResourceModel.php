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
		return parent::showAll($table);
	}
	public function createTask($table, $model)
	{
		parent::create($table, $model);
	}
	public function delete($table, $id)
	{
		parent::delete($table, $id);
	}
	public function showTask($table, $id)
	{
        return parent::show($table, $id);
	}
	public function editTask($table, $model, $id)
	{
        parent::edit($table, $model, $id);
	}
}