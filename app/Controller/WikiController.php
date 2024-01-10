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

        if ($wiki[0]->author_id != $_SESSION['userId']) {

            header('location:MyWiki');
            exit();
        }
        $wtag = new WikiTag();
        $wtag = $wtag->selectRecords('*', 'wiki_id =' . $id);
        $tags = new Tag();
        $tags = $tags->selectRecords();
        $category = new Category();
        $category = $category->selectRecords();
        $this->view('user/editWiki', compact('wiki', 'tags', 'category', 'wtag'));
    }



    function insert()
    {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $category = $_POST['category'];
        $tags = $_POST['tags'];
        $author_id = $_SESSION['userId'];
        $wiki = new Wiki();
        $wikitags = new WikiTag();
        if ($wiki->insertRecord(compact('title', 'content', 'category', 'author_id'))) {
            echo "The wiki is inserted successfully";
            $wiki = $wiki->getlastInsertedId();
            foreach ($tags as $tag) {
                if (!$wikitags->insertRecord(['wiki_id' => $wiki, 'tag_id' => $tag])) {
                    echo 'tag with id ' . $tag . ' not insert';
                }
            }
        } else {
            echo "The wiki is not inserted";
        }
    }

    function update()
    {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $category = $_POST['category'];
        $tags = $_POST['tags'];
        $id = $_POST['id'];
        $wiki = new Wiki();
        $wikitags = new WikiTag();
        $update_date = date('Y-m-d H:i:s');
        if (count($wiki->selectRecords('*', 'id = ' . $id . ' and author_id = ' . $_SESSION['userId']))) {
            if ($wiki->updateRecord(compact('title', 'content', 'category', 'update_date'), $id)) {
                echo "The wiki is updated successfully";
                $wikitags->deleteRecord($id);
                foreach ($tags as $tag) {
                    if (!$wikitags->insertRecord(['wiki_id' => $id, 'tag_id' => $tag])) {
                        echo 'tag with id ' . $tag . ' not insert';
                    }
                }
            } else {
                echo "The wiki is not updated";
            }
        } else {
            echo "You didn't have access to delete this wiki";
        }
    }

    function delete()
    {
        $id = $_POST['id'];

        $wiki = new Wiki();
        if (count($wiki->selectRecords('*', 'id = ' . $id . ' and author_id = ' . $_SESSION['userId']))) {
            if ($wiki->deleteRecord($id)) {
                echo "The wiki is deleted successfully";
            } else {
                echo "The wiki is not deleted";
            }
        } else {
            echo "You didn't have access to delete this wiki";
        }
    }
}
