<?php
namespace MVC\Controllers;

use MVC\Core\Controller;
use MVC\Models\Task;
use MVC\Models\TaskRepository;
use MVC\Models\TaskResourceModel;

class tasksController extends Controller
{
    function index()
    {
        // require(ROOT . 'Models/Task.php');

        $taskss = new TaskResourceModel();
        $tasks = new TaskRepository($taskss);
        $d['tasks'] = $tasks->showAll();
        $this->set($d);
        $this->render("index");
    }

    function create()
    {
        if (isset($_POST["title"]))
        {
            // require(ROOT . 'Models/Task.php');

            $task= new Task();

            if ($task->create($_POST["title"], $_POST["description"]))
            {
                header("Location: " . WEBROOT . "tasks/index");
            }
        }

        $this->render("create");
    }

    function edit($id)
    {
        // require(ROOT . 'Models/Task.php');
        $task= new Task();

        $d["task"] = $task->showTask($id);

        if (isset($_POST["title"]))
        {
            if ($task->edit($id, $_POST["title"], $_POST["description"]))
            {
                header("Location: " . WEBROOT . "tasks/index");
            }
        }
        $this->set($d);
        $this->render("edit");
    }

    function delete($id)
    {
        // require(ROOT . 'Models/Task.php');

        $task = new Task();
        if ($task->delete($id))
        {
            header("Location: " . WEBROOT . "tasks/index");
        }
    }
}
?>