<?php

namespace App\Model;

class Wiki extends Model
{
    protected $table = 'wiki';

    public function addView($id){
        $oldview = $this->selectRecords('*',"id = ".$id)[0]->views + 1;
        $this->updateRecord(['views'=>$oldview],$id);
    }
    public function getCount(){
        return $this->selectRecords('COUNT(*) as COUNT');
    }
}
