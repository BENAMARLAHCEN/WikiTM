<?php

namespace App\Model;

class Category extends Model
{
    protected $table = 'category';

    public function getCount(){
        return $this->selectRecords('COUNT(*) as COUNT');
    }
}
