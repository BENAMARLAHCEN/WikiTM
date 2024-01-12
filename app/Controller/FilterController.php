<?php

namespace App\Controller;

use App\Controller;
use App\Model\Category;
use App\Model\Tag;
use App\Model\Wiki;

class FilterController extends Controller
{
    function FilterByCategory()
    {
        $id = $_POST['category'];
        $wikis = new Wiki();
        $wikis = $wikis->selectRecords(' wiki.*,category.name,user.username ', 'archived = 0 and category.id = '.$id, ' wiki.create_date', null, ' INNER JOIN user on user.id = wiki.author_id INNER JOIN category on category.id = wiki.category ');
        $this->render('partials/search', compact('wikis'));
    }

    function search()
    {
        $search = $_POST['search'];
        $wikis = new Wiki();
        $wikis = $wikis->selectRecords(' DISTINCT wiki.*,category.name,user.username ', "archived = 0 and (wiki.title LIKE ('%$search%') OR tags.name LIKE ('%$search%'))", ' wiki.create_date  ', null, ' INNER JOIN user on user.id = wiki.author_id INNER JOIN category on category.id = wiki.category LEFT JOIN wikitags on wikitags.wiki_id = wiki.id LEFT JOIN tags ON tags.id = wikitags.tag_id');
        $this->render('partials/search', compact('wikis'));
    }
}
