<?php
namespace MVC\Controllers;

use MVC\Core\Controller;
use MVC\Models\Task;
use MVC\Models\TaskRepository;
use MVC\Models\TaskResourceModel;

class tasksController extends Controller
{
    private $taskRepository;

    function __construct()
    {
        $this->taskRepository = new TaskRepository();
    }
    public function index()
    {

        $d['tasks'] = $this->taskRepository->showAll();
        $this->set($d);
        $this->render("index");
    }

    public function create()
    {
        if (isset($_POST['title'])) {
            $tasks = new Task();
            $tasks->setTitle($_POST['title']);
            $tasks->setDescription($_POST['description']);
            $tasks->setCreateAt(date('Y-m-d H:i:s'));
            $tasks->setUpdateAt(date('Y-m-d H:i:s'));

            $this->taskRepository->createTask($tasks);
            header("Location: " . WEBROOT . "tasks/index");
        }
        $this->render("create");
    }
    public function edit($id)
    {
        $d["task"] = $this->taskRepository->showTask($id);
        if (isset($_POST["title"]))
        {
            $task = new Task();
            $task->setID($id);
            $task->setTitle($_POST['title']);
            $task->setDescription($_POST['description']);
            $task->setCreateAt(date('Y-m-d H:i:s'));
            $task->setUpdateAt(date('Y-m-d H:i:s'));

            $this->taskRepository->edit($id, $task);
            header("Location: " . WEBROOT . "tasks/index");
                        
        }
        $this->set($d);
        $this->render("edit");
    }

    public function delete($id)
    {
        $this->taskRepository->delete($id);
        header("Location: " . WEBROOT . "tasks/index");
    }
}
?>