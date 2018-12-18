<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\postModel;
use Illuminate\Support\Facades\URL;

class postsController extends Controller
{
    private $postsModel;

    public function __construct ()
    {
        $this->postsModel = new postModel();
    }

    public function index()
    {
        $posts = $this->postsModel->getLastPosts();
        return view('posts',compact('posts'));
    }

    public function getNewPosts()
    {
        $posts = $this->postsModel->getLastPosts();
        $pathToAsset = URL::asset('img/');
        return response()->json(['posts' => $posts, 'pathToAsset' => $pathToAsset]);
    }
}
