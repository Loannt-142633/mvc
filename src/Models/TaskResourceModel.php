<?php
namespace MVC\Models;

use MVC\Core\ResourceModel;
/**
 * lop luu tru du lieu
 */
class TaskResourceModel extends ResourceModel
{
	private $table;

	function __construct()
	{
		$this->table = 'tasks';
	}
	public function showAll($table)
	{
		$sql= "SELECT * FROM $table";
		return ResourceModel::showAll($sql);
	}
}