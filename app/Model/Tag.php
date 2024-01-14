<?php

namespace App\Model;

class Tag extends Model
{
    protected $table = 'tags';

    public function getCount()
    {
        return $this->selectRecords('COUNT(*) as COUNT');
    }
    public function getAllTag()
    {
        return $this->selectRecords('*', null, 'create_date DESC');
    }
    public function insertTag($name)
    {
        return $this->insertRecord(['name' => $name]);
    }
    public function updateTag($name, $id)
    {
        $currentDate = date('Y-m-d H:i:s');
        return $this->updateRecord(['name' => $name, 'update_date' => $currentDate], $id);
    }
    public function getWikiTag($wikiId)
    {
        return $this->selectRecords('*', " wikitags.wiki_id = $wikiId ", null, null, " INNER JOIN wikitags on wikitags.tag_id = tags.id");
    }
}
