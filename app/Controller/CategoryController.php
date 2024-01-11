<?php

namespace App\Controller;

use App\Controller;
use App\Model\Category;

class CategoryController extends Controller
{
    function index()
    {
        $category = new Category();
        $category = $category->selectRecords('*',null,'create_date DESC');
        $this->view('admin/Category', compact('category'));
    }

    function insert()
    {
        $name = $_POST['name'];
        $category = new Category();
        if ($category->insertRecord(['name' => $name])) {
            echo "The category is inserted successfully";
        } else {
            echo "The category is not inserted";
        }
    }
    function update()
    {
        $name = $_POST['name'];
        $id = $_POST['id'];
        $category = new Category();
        $currentDate = date('Y-m-d H:i:s');
        if ($category->updateRecord(['name' => $name, 'update_date' => $currentDate],$id)) {
            echo "The category is updated successfully";
        } else {
            echo "The category is not updated";
        }
    }
    function delete()
    {
        $id = $_POST['id'];
        $category = new Category();
        if ($category->deleteRecord($id)) {
            echo "The category is deleted successfully";
        } else {
            echo "The category is not deleted";
        }
    }
}
