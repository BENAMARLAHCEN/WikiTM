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
        $wikis = $wikis->getWikiData();
        $tags = new Tag();
        $tags = $tags->getAllTag();
        $category = new Category();
        $category = $category->getAllCategory();
        $this->view('home', compact('wikis', 'tags', 'category'), 'main');
    }

    function wikiDetail()
    {
        if (isset($_GET['wk']) && !empty($_GET['wk'])) {
            $id = $_GET['wk'];
            $wikis = new Wiki();
            $wiki = $wikis->getWikiDetail($id);
            $wikiId = $wiki[0]->id;
            $tags = new Tag();
            $tags = $tags->getWikiTag($wikiId);

            if (count($wiki) != 0) {
                $wikis->addView($wikiId);
                $wiki = $wiki[0];
                $this->view('wiki', compact('wiki', 'tags'), 'main');
                exit;
            }
        }
        $this->view('wiki', compact('wiki'), 'main');
    }
}
