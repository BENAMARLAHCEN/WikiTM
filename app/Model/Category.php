<?php

namespace App\Model;

class Category extends Model
{
    protected $table = 'category';

    public function getCount(){
        return $this->selectRecords('COUNT(*) as COUNT');
    }
    public function getAllCategory()
    {
        return $this->selectRecords('*', null, 'create_date DESC');
    }
    public function insertCategory($name)
    {
        return $this->insertRecord(['name' => $name]);
    }
    public function updateCategory($name,$id)
    {
        $currentDate = date('Y-m-d H:i:s');
        return $this->updateRecord(['name' => $name, 'update_date' => $currentDate], $id);
    }
}
