<?php
namespace MVC\Models;

use MVC\Models\TaskResourceModel;
use MVC\Models\Task;
/**
 * 
 */
class TaskRepository
{
	private $taskResourceModel;
	function __construct(TaskResourceModel $taskResourceModel)
	{
		$this->taskResourceModel = new TaskResourceModel();
	}
	public function showAll()
	{
        $re = taskResourceModel::showAll('tasks');
        print_r($re);
	}
}