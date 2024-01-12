<?php

namespace App\Model;

class Tag extends Model
{
    protected $table = 'tags';

    public function getCount(){
        return $this->selectRecords('COUNT(*) as COUNT');
    }
}
