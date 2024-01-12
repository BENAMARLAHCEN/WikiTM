<?php

namespace App\Controller;

use App\Controller;
use App\Model\Category;
use App\Model\Tag;
use App\Model\Wiki;

class HomeController extends Controller
{
    function index()
    {
        $wikis = new Wiki();
        $wikis = $wikis->selectRecords(' wiki.*,category.name,user.username ', 'archived = 0', ' wiki.create_date limit 4 ', null, ' INNER JOIN user on user.id = wiki.author_id INNER JOIN category on category.id = wiki.category ');
        $tags = new Tag();
        $tags = $tags->selectRecords('*', null, 'create_date DESC');
        $category = new Category();
        $category = $category->selectRecords('*', null, 'create_date DESC');
        $this->view('home', compact('wikis','tags', 'category'), 'main');
    }

    function wikiDetail()
    {
        if (isset($_GET['wk']) && !empty($_GET['wk'])) {
            $id = $_GET['wk'];
            $wikis = new Wiki();
            $wiki = $wikis->selectRecords(' wiki.*,category.name,user.username,user.about,user.image,user.Job ', 'wiki.id = ' . $id, null, null, ' INNER JOIN user on user.id = wiki.author_id INNER JOIN category on category.id = wiki.category ');
            if (count($wiki) != 0) {
            $this->view('wiki', compact('wiki'), 'main');
            }else {
                $this->view('wiki', compact('wiki'), 'main');
            }
        }
    }
}
