<?php

namespace App\Controller;

use App\Controller;
use App\Model\Category;
use App\Model\Tag;
use App\Model\Wiki;
use App\Model\WikiCategory;
use App\Model\WikiTag;

class WikiController extends Controller
{
    function index()
    {
        $wikis = new Wiki();
        $wikis = $wikis->selectRecords('*', null, 'create_date DESC');
        $this->view('admin/wiki', compact('wikis'));
    }

    function archive()
    {
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
            $wikis = new Wiki();
            $wiki = $wikis->selectRecords('*', 'id = ' . $id);
            if ($wiki != null) {
                if ($wikis->updateRecord(['archived' => 1], $id)) {
                    echo "The wiki is archived successfully";
                } else {
                    echo "The wiki is not find";
                }
            }
        } else {
            echo "The wiki is not archived";
        }
    }
    function public()
    {
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
            $wikis = new Wiki();
            $wiki = $wikis->selectRecords('*', 'id = ' . $id);
            if ($wiki != null) {
                if ($wikis->updateRecord(['archived' => 0], $id)) {
                    echo "The wiki is public successfully";
                } else {
                    echo "The wiki is not find";
                }
            }
        } else {
            echo "The wiki is not publicing we have some errors in the system";
        }
    }

    function authorWiki()
    {
        $wikis = new Wiki();
        $wikis = $wikis->selectRecords('*', 'author_id =' . $_SESSION['userId'], 'create_date DESC');
        $this->view('user/Wiki', compact('wikis'));
    }

    function addform()
    {
        $tags = new Tag();
        $tags = $tags->selectRecords();
        $category = new Category();
        $category = $category->selectRecords();
        $this->view('user/addWiki', compact('tags', 'category'));
    }

    function Editform()
    {
        $id = $_GET['id'];
        $wikis = new Wiki();
        $wiki = $wikis->selectRecords('*', 'id =' . $id);
        if (count($wiki) == 0) {
            header('location:MyWiki');
            exit();
        }
        if ($wiki[0]->author_id != $_SESSION['userID']) {
            header('location:MyWiki');
            exit();
        }
        $wtag = new WikiTag();
        $wtag = $wtag->selectRecords('*', 'wiki_id =' . $id);
        $wcategory = new WikiCategory();
        $wcategory = $wcategory->selectRecords('*', 'wiki_id =' . $id);
        $tags = new Tag();
        $tags = $tags->selectRecords();
        $category = new Category();
        $category = $category->selectRecords();
        $this->view('user/editWiki', compact('wiki', 'tags', 'category','wcategory','wtag'));
    }



    function insert()
    {
        $name = $_POST['name'];
        $wiki = new Wiki();
        if ($wiki->insertRecord(['name' => $name])) {
            echo "The wiki is inserted successfully";
        } else {
            echo "The wiki is not inserted";
        }
    }

    function update()
    {
        $name = $_POST['name'];
        $id = $_POST['id'];
        $wiki = new Wiki();
        $currentDate = date('Y-m-d H:i:s');
        if ($wiki->updateRecord(['name' => $name, 'update_date' => $currentDate], $id)) {
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
