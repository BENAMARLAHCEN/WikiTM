<?php

namespace App\Model;

class User extends Model
{
    protected $table = 'user';

    public function getCount()
    {
        return $this->selectRecords('COUNT(*) as COUNT', ' role = "author" ');
    }
    public function selectByemail($email)
    {
        return $this->selectRecords('*', "email = '$email'");
    }
}
