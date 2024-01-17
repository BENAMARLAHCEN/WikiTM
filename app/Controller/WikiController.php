<?php

namespace App\Controller;

use App\Controller;
use App\core\Session;
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
        $wikis = $wikis->selectAll();
        $this->view('admin/wiki', compact('wikis'));
    }

    function archive()
    {
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
            $wikis = new Wiki();
            $wiki = $wikis->getById($id);
            if ($wiki != null) {
                if ($wikis->changeStatus(1, $id)) {
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
            $wiki = $wikis->getById($id);
            if ($wiki != null) {
                if ($wikis->changeStatus(0, $id)) {
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
        $wikis = $wikis->getAuthorWiki($_SESSION['userId']);
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
        $wiki = $wikis->getById($id);
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
        $tags = $_POST['tags'] ?? [];
        $author_id = $_SESSION['userId'];
        $image = $_FILES['image']['name'];
        // Additional validation checks if needed
        if (empty($title) || empty($content) || empty($category)) {
            $_SESSION["errors"] = "Title, content, and category are required fields.";
        } else {
            $wiki = new Wiki();
            $wikitags = new WikiTag();
            if ($wiki->insertRecord(compact('title', 'content', 'category', 'author_id'))) {
                $_SESSION["valid"] = "The wiki is inserted successfully";
                $wikiid = $wiki->getlastInsertedId();
                foreach ($tags as $tag) {
                    if (!$wikitags->insertRecord(['wiki_id' => $wikiid, 'tag_id' => $tag])) {
                        echo 'tag with id ' . $tag . ' not insert';
                    }
                }
                if (!empty($image)) {
                    $image_tmp_name = $_FILES['image']['tmp_name'];
                    $image_folder = __DIR__ . "\\..\\..\\public\\assets\\upload\\wiki\\" . $image;
                    if ($wiki->updateRecord(compact('image'), $wikiid)) {
                        move_uploaded_file($image_tmp_name, $image_folder);
                    }
                }
                header('location:/WikiTM/MyWiki');
                exit;
            } else {
                $_SESSION["errors"] = "The wiki is not inserted";
            }
        }
        $this->addform();
    }

    function update()
    {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $category = $_POST['category'];
        $tags = $_POST['tags'] ?? [];
        $id = $_POST['id'];
        $image = $_FILES['image']['name'];
        if (empty($title) || empty($content) || empty($category)) {
            $_SESSION["errors"] = "Title, content, and category are required fields.";
        } elseif (!is_numeric($category) || $category <= 0) {
            $_SESSION["errors"] = "Invalid category selected.";
        } elseif (!is_array($tags)) {
            $_SESSION["errors"] = "Invalid tags format.";
        } else {
            $wiki = new Wiki();
            $wikitags = new WikiTag();
            $update_date = date('Y-m-d H:i:s');
            if (count($wiki->WikiAuthor($id, Session::get('userId')))) {
                if ($wiki->updateRecord(compact('title', 'content', 'category', 'update_date'), $id)) {
                    $_SESSION["valid"] = "The wiki is updated successfully";
                    $wikitags->deleteRecord($id);
                    foreach ($tags as $tag) {

                        if (!$wikitags->insertRecord(['wiki_id' => $id, 'tag_id' => $tag])) {
                            echo 'tag with id ' . $tag . ' not insert';
                        }
                    }
                    if (!empty($image)) {
                        $image_tmp_name = $_FILES['image']['tmp_name'];
                        $image_folder = __DIR__ . "\\..\\..\\public\\assets\\upload\\wiki\\" . $image;
                        if ($wiki->updateRecord(compact('image'), $id)) {
                            move_uploaded_file($image_tmp_name, $image_folder);
                        }
                    }
                    header('location:/WikiTM/MyWiki');
                    exit;
                } else {
                    $_SESSION["errors"] = "The wiki is not updated";
                }
            } else {
                $_SESSION["errors"] = "You didn't have access to delete this wiki";
            }
        }
        $this->Editform();
    }

    function delete()
    {
        $errors = [];
        if (isset($_POST['delete'])) {

            $id = $_POST['delete'];

            $wiki = new Wiki();
            if (count($wiki->WikiAuthor($id, Session::get('userId')))) {
                if ($wiki->deleteRecord($id)) {
                    $_SESSION["valid"] = "The wiki is deleted successfully";
                } else {
                    $_SESSION["errors"] = "The wiki is not deleted";
                }
            } else {
                $_SESSION["errors"] = "You didn't have access to delete this wiki";
            }
        } else {
            $_SESSION["errors"] = "no sure what wiki you need to delete";
        }
        $this->authorWiki();
    }
}
