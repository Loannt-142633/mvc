<?php
namespace MVC\Models;

use MVC\Core\Model;
use MVC\Config\Database;


class Task extends Model
{
    protected $id;
    protected $title;
    protected $description;
    protected $created_at;
    protected $updated_at;

    public function getID()
    {
        return $this->id;
    }
    public function setID($id)
    {
        $this->id = $id;
    }
    public function getTitle()
    {
        return $this->title;
    }
    public function setTitle($title)
    {
        $this->title = $title;
    }
    public function getDescription()
    {
        return $this->description;
    }
    public function setDescription($description)
    {
        $this->description = $description;
    }
    public function getCreateAt()
    {
        return $this->created_at;
    }
    public function setCreateAt($created_at)
    {
        $this->created_at = $created_at;
    }
    public function getUpdateAt()
    {
        return $this->updated_at;
    }
    public function setUpdateAt($updated_at)
    {
        $this->updated_at = $updated_at;
    }
    public function getpro()
    {
        return get_object_vars($this);
    }
}
?>