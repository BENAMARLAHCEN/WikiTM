<?php
namespace App\Controller;
use App\Controller;
use App\Model\Wiki;

class DashController extends Controller{
    function index(){
        $wikis = new Wiki();
        $wikis = $wikis->selectRecords('*',null,'create_date DESC');
        $this->view('admin.Statistic',compact('wikis'));
    }
}