<?php
namespace MVC\Controllers;

use MVC\Core\Controller;
use MVC\Models\Task;
use MVC\Models\TaskRepository;
use MVC\Models\TaskResourceModel;

class tasksController extends Controller
{
    public function index()
    {
        // require(ROOT . 'Models/Task.php');

        $tasks = new TaskRepository();
        $d['tasks'] = $tasks->showAll();
        $this->set($d);
        $this->render("index");
    }

    public function create()
    {
        if (isset($_POST['title'])) {
            $task = new TaskRepository();
            $task->createTask($_POST['title'], $_POST['description']);
            header("Location: " . WEBROOT . "tasks/index");
        }
        $this->render("create");
    }
    public function edit($id)
    {
        // require(ROOT . 'Models/Task.php');
        $task= new TaskRepository();

        $d["task"] = $task->showTask($id);

        if (isset($_POST["title"]))
        {
            $task->edit($id, $_POST["title"], $_POST["description"]);
            header("Location: " . WEBROOT . "tasks/index");
        }
        $this->set($d);
        $this->render("edit");
    }

    public function delete($id)
    {
        // require(ROOT . 'Models/Task.php');

        $task = new TaskRepository();
        $task->delete($id);
        header("Location: " . WEBROOT . "tasks/index");
    }
}
?>