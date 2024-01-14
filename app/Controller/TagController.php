<?php

namespace App\Controller;

use App\Controller;
use App\Model\Tag;

class TagController extends Controller
{
    function index()
    {
        $tags = new Tag();
        $tags = $tags->getAllTag();
        $this->view('admin/Tags', compact('tags'));
    }
    function insert()
    {
        $name = $_POST['name'];
        $tag = new Tag();
        if ($tag->insertTag($name)) {
            $_SESSION["valid"] =  "The tag is inserted successfully";
        } else {
            $_SESSION["errors"] = "The tag is not inserted";
        }
        header('location:/WikiTM/Tags');
        
    }

    function update()
    {
        $name = $_POST['name'];
        $id = $_POST['id'];
        $tag = new Tag();
        $currentDate = date('Y-m-d H:i:s');
        if ($tag->updateTag($name, $id)) {
            $_SESSION["valid"] =  "The tag is updated successfully";
        } else {
            $_SESSION["errors"] = "The tag is not updated";
        }
        header('location:/WikiTM/Tags');
        
    }

    function delete()
    {
        $id = $_POST['delete'] ?? '';
        if (!empty($id)) {
            $tag = new Tag();

            if ($tag->deleteRecord($id)) {
                $_SESSION["valid"] =  "The tag is deleted successfully";
            } else {
                $_SESSION["errors"] = "The tag is not deleted";
            }
        }
        header('location:/WikiTM/Tags');
    }

    function getTag()
    {
        $id = $_POST['id'];
        $Tag = new Tag();
        $Tag = $Tag->selectRecords('*', ' id = ' . $id)[0];
        echo $Tag->name;
    }
}
