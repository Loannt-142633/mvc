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
	public function createTask($title, $description)
	{
		$column = array(
			'title' => $title,
            'description' => $description,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'));
        $this->taskResourceModel->createTask('tasks',$column);
	}
	public function delete($id)
	{
        $this->taskResourceModel->delete('tasks', $id);
	}
	public function showTask($id)
	{
        return $this->taskResourceModel->showTask('tasks', $id);
	}
	public function edit($id, $title, $description)
	{
		$column = array(
            'title' => $title,
            'description' => $description,
            'updated_at' => date('Y-m-d H:i:s'));
		$this->taskResourceModel->editTaskk('tasks', $column, $id);
	}

}