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
        $wikis = $wikis->getByCategory($id);
        $this->render('partials/search', compact('wikis'));
    }

    function search()
    {
        $search = $_POST['search'];
        $wikis = new Wiki();
        $wikis = $wikis->searchByTagTitle($search);
        $this->render('partials/search', compact('wikis'));
    }
}
