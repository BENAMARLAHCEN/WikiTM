<?php

namespace App\Model;

class Wiki extends Model
{
    protected $table = 'wiki';

    public function addView($id)
    {
        $oldview = $this->selectRecords('*', "id = " . $id)[0]->views + 1;
        $this->updateRecord(['views' => $oldview], $id);
    }
    public function getCount()
    {
        return $this->selectRecords('COUNT(*) as COUNT');
    }

    public function getById($id)
    {
        return $this->selectRecords('*', 'id =' . $id);
    }

    public function getAuthorWiki($id)
    {
        return $this->selectRecords('*', 'author_id =' . $id, 'create_date DESC');
    }

    public function WikiAuthor($id,$authorId){
        return $this->selectRecords('*', 'id = ' . $id . ' and author_id = ' . $authorId);
    }

    public function selectAll()
    {
        return $this->selectRecords('*', null, 'create_date DESC');
    }

    public function searchByTagTitle($search)
    {
        return $this->selectRecords(' DISTINCT wiki.*,category.name,user.username ', "archived = 0 and (wiki.title LIKE ('%$search%') OR tags.name LIKE ('%$search%'))", ' wiki.create_date DESC ', null, ' INNER JOIN user on user.id = wiki.author_id INNER JOIN category on category.id = wiki.category LEFT JOIN wikitags on wikitags.wiki_id = wiki.id LEFT JOIN tags ON tags.id = wikitags.tag_id');
    }

    public function getByCategory($categoryId)
    {
        return $this->selectRecords(' wiki.*,category.name,user.username ', 'archived = 0 and category.id = ' . $categoryId, ' wiki.create_date DESC ', null, ' INNER JOIN user on user.id = wiki.author_id INNER JOIN category on category.id = wiki.category ');
    }

    public function getWikiData()
    {
        return $this->selectRecords(' wiki.*,category.name,user.username ', 'archived = 0', ' wiki.create_date DESC limit 4 ', null, ' INNER JOIN user on user.id = wiki.author_id INNER JOIN category on category.id = wiki.category ');
    }

    public function getWikiDetail($id)
    {
        return $this->selectRecords(' wiki.*,category.name,user.username,user.about,user.image as imageUser,user.Job ', 'wiki.id = ' . $id, null, null, ' INNER JOIN user on user.id = wiki.author_id INNER JOIN category on category.id = wiki.category ');
    }

    public function changeStatus($status,$id){
        return $this->updateRecord(['archived' => $status], $id);
    }
}
