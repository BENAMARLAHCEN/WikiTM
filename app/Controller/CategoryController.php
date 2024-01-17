<?php

namespace App\Controller;

use App\Controller;
use App\core\Validation;
use App\Model\Category;

class CategoryController extends Controller
{
    function index()
    {
        $category = new Category();
        $category = $category->getAllCategory();
        $this->view('admin/Category', compact('category'));
    }

    function insert()
    {
        $name = $_POST['name'];
        $category = new Category();
        if (Validation::verfyName($name)) {
            if ($category->insertCategory($name)) {
                $_SESSION["valid"] = "The category is inserted successfully";
            } else {
                $_SESSION["errors"] =  "The category is not inserted";
            }
        } else {
            $_SESSION["errors"] = "Insert valid name";
        }
        header('location:/WikiTM/Category');
    }
    function update()
    {
        $name = $_POST['name'];
        $id = $_POST['id'];
        $category = new Category();
        if (Validation::verfyName($name)) {

            if ($category->updateCategory($name, $id)) {
                $_SESSION["valid"] = "The category is updated successfully";
            } else {
                $_SESSION["errors"] = "The category is not updated";
            }
        } else {
            $_SESSION["errors"] = "Insert valid name";
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
