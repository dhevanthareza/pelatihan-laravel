<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use App\Models\Slider;
use App\Models\User;
use App\Models\Comment;
use App\Models\Mainmenu;

class PortalController extends Controller
{
    public function index()
    {
        $data['sliders']        = Slider::where('status', 1)->get();
        $data['posts']          = Post::where('status', 1)->get();
        $data['latestposts']    = Post::where('status', 1)->limit(5)->get();
        $data['headline']       = Post::where('status', 1)->where('is_headline', 1)->get();
        $data['user']           = User::first();
        $data['category']       = Category::get();

        return view('portal.index', compact('data'));
    }
}
