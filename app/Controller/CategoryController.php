<?php

namespace App\Controller;

use App\Controller;
use App\Model\Category;

class CategoryController extends Controller
{
    function index()
    {
        $category = new Category();
        $category = $category->selectRecords('*', null, 'create_date DESC');
        $this->view('admin/Category', compact('category'));
    }

    function insert()
    {
        $name = $_POST['name'];
        $category = new Category();
        if ($category->insertRecord(['name' => $name])) {
            $_SESSION["valid"] = "The category is inserted successfully";
        } else {
            $_SESSION["errors"] =  "The category is not inserted";
        }
        header('location:/WikiTM/Category');
    }
    function update()
    {
        $name = $_POST['name'];
        $id = $_POST['id'];
        $category = new Category();
        $currentDate = date('Y-m-d H:i:s');
        if ($category->updateRecord(['name' => $name, 'update_date' => $currentDate], $id)) {
            $_SESSION["valid"] = "The category is updated successfully";
        } else {
            $_SESSION["errors"] = "The category is not updated";
        }
        header('location:/WikiTM/Category');
    }
    function delete()
    {
        $id = $_POST['delete'] ?? '';

        if (!empty($id)) {
            $category = new Category();
            if ($category->deleteRecord($id)) {
                $_SESSION["valid"] = "The category is deleted successfully";
            } else {
                $_SESSION["errors"] = "The category is not deleted";
            }
        }
        header('location:/WikiTM/Category');
    }

    function getCategory()
    {
        $id = $_POST['id'];
        $category = new Category();
        $category = $category->selectRecords('*', ' id = ' . $id)[0];
        echo $category->name;
    }
}
