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
        return view('portal.index');
    }

    public function nama() {
        return view("portal.namasaya");
    }
}
