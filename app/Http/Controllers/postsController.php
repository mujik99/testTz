<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\postModel;
//use Illuminate\Support\Facades\URL;

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

//    public function getNewPosts()
//    {
//        $posts = $this->postsModel->getLastPosts();
//        $pathToAsset = URL::asset('img/');
//        return response()->json(['posts' => $posts, 'pathToAsset' => $pathToAsset]);
//    }

    public function createNewPost(Request $request)
    {
        $this->postsModel->post_title = $request['title'];
        $this->postsModel->description = $request['description'];
        $this->postsModel->author_name = $request['author'];
        $this->postsModel->img_path = '';
        $this->postsModel->save();

        broadcast(new \App\Events\GetNewPostsEvent);
    }
}
