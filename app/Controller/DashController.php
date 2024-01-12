<?php
namespace App\Controller;
use App\Controller;
use App\Model\Category;
use App\Model\Tag;
use App\Model\User;
use App\Model\Wiki;

class DashController extends Controller{
    function index(){
        $wikis = new Wiki();
        $wikis = $wikis->selectRecords('*','archived = 0','views DESC limit 5');
        $tagCount = (new Tag())->getCount()[0]->COUNT;
        $wikiCount = (new Wiki())->getCount()[0]->COUNT;
        $catCount = (new Category())->getCount()[0]->COUNT;
        $authors = (new User())->getCount()[0]->COUNT;

        $this->view('admin.Statistic',compact('wikis','tagCount','wikiCount','catCount','authors'));
    }
}