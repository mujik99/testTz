<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class postModel extends Model
{
    protected $table = 'posts';

    public function getAll()
    {
        return $this::all();
    }

    public function getLastPosts()
    {
        return $this::orderBy('created_at', 'desc')->take(5)->get();
    }
}
