<?php
namespace App\Controller;
use App\Controller;
use App\Model\Tag;

class TagController extends Controller{
    function index(){
        $tags = new Tag();
        $tags = $tags->selectRecords('*',null,'create_date DESC');
        $this->view('admin/Tags',compact('tags'));
    }
    function insert()
    {
        $name = $_POST['name'];
        $tag = new Tag();
        if ($tag->insertRecord(['name' => $name])) {
            echo "The tag is inserted successfully";
        }else {
            echo "The tag is not inserted";
        }
    }

    function update()
    {
        $name = $_POST['name'];
        $id = $_POST['id'];
        $tag = new Tag();
        $currentDate = date('Y-m-d H:i:s');
        if ($tag->updateRecord(['name' => $name, 'update_date' => $currentDate],$id)) {
            echo "The tag is updated successfully";
        } else {
            echo "The tag is not updated";
        }
    }

    function delete()
    {
        $id = $_POST['id'];
        $tag = new Tag();
        if ($tag->deleteRecord($id)) {
            echo "The tag is deleted successfully";
        } else {
            echo "The tag is not deleted";
        }
    }
}