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

    public function searchByTagCat($search){
        return $this->selectRecords(' DISTINCT wiki.*,category.name,user.username ', "archived = 0 and (wiki.title LIKE ('%$search%') OR tags.name LIKE ('%$search%'))", ' wiki.create_date  ', null, ' INNER JOIN user on user.id = wiki.author_id INNER JOIN category on category.id = wiki.category LEFT JOIN wikitags on wikitags.wiki_id = wiki.id LEFT JOIN tags ON tags.id = wikitags.tag_id');
    }
    public function getByCategory($categoryId){
        return $this->selectRecords(' wiki.*,category.name,user.username ', 'archived = 0 and category.id = '.$categoryId, ' wiki.create_date', null, ' INNER JOIN user on user.id = wiki.author_id INNER JOIN category on category.id = wiki.category ');
    }
}
