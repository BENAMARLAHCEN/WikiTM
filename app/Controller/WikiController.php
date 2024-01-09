<?php
namespace App\Controller;
use App\Controller;
use App\Model\Wiki;

class WikiController extends Controller{
    function index(){
        $wikis = new Wiki();
        $wikis = $wikis->selectRecords('*',null,'create_date DESC');
        $this->view('admin/wiki',compact('wiki'));
    }
    function insert()
    {
        $name = $_POST['name'];
        $wiki = new Wiki();
        if ($wiki->insertRecord(['name' => $name])) {
            echo "The wiki is inserted successfully";
        }else {
            echo "The wiki is not inserted";
        }
    }

    function update()
    {
        $name = $_POST['name'];
        $id = $_POST['id'];
        $wiki = new Wiki();
        $currentDate = date('Y-m-d H:i:s');
        if ($wiki->updateRecord(['name' => $name, 'update_date' => $currentDate],$id)) {
            echo "The wiki is updated successfully";
        } else {
            echo "The wiki is not updated";
        }
    }

    function delete()
    {
        $id = $_POST['id'];
        $wiki = new Wiki();
        if ($wiki->deleteRecord($id)) {
            echo "The tag is deleted successfully";
        } else {
            echo "The tag is not deleted";
        }
    }
}