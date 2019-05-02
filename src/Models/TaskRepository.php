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

	function __construct()
	{
		$this->taskResourceModel = new TaskResourceModel();
	}
	public function showAll()
	{
        return $this->taskResourceModel->showAll('tasks');
	}
	public function createTask(Task $task)
	{
		$this->taskResourceModel->createTask('tasks', $task);
	}
	public function delete($id)
	{
        $this->taskResourceModel->deleteTask('tasks', $id);
	}
	public function showTask($id)
	{
        return $this->taskResourceModel->showTask('tasks', $id);
	}
	public function edit($id, Task $task)
	{
		$this->taskResourceModel->editTask('tasks', $task);
	}

}