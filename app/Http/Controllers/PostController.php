<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        $data = Post::get();
        return view('admin.post.index', compact('data'));
    }

    public function create()
    {
        $category = Category::get();
        return view('admin.post.create', compact('category'));
    }

    public function insert(Request $request)
    {
        $request->validate(Post::$rules);
        $requests = $request->all();
        $requests['thumbnail'] = "";
        if ($request->hasFile('thumbnail')) {
            $files = Str::random("20") . "-" . $request->thumbnail->getClientOriginalName();
            $request->file('thumbnail')->move("file/post/", $files);
            $requests['thumbnail'] = "file/post/" . $files;
        }

        $cat = Post::create($requests);
        if($cat){
            return redirect('admin/post')->with('status', 'Berhasil menambah data !');
        }

        return redirect('admin/post')->with('status', 'Gagal menambah data !');
    }

    public function edit($id)
    {
        // $data       = Post::find($id);
        // $category   = Category::get();
        // return view('admin.post.edit', compact('data', 'category'));
    }

    public function update(Request $request, $id)
    {
        // $d = Post::find($id);
        // if ($d == null) {
        //     return redirect('admin/post')->with('status', 'Data tidak ditemukan !');
        // }

        // $req = $request->all();

        // if ($request->hasFile('thumbnail')) {
        //     if ($d->thumbnail !== null) {
        //         File::delete("$d->thumbnail");
        //     }
        //     $post = Str::random("20") . "-" . $request->thumbnail->getClientOriginalName();
        //     $request->file('thumbnail')->move("file/post/", $post);
        //     $req['thumbnail'] = "file/post/" . $post;
        // }

        // $data = Post::find($id)->update($req);
        // if ($data) {
        //     return redirect('admin/post')->with('status', 'Post berhasil diedit !');
        // }
        // return redirect('admin/post')->with('status', 'Gagal edit post !');

    }

    public function delete($id)
    {
        // $data = Post::find($id);
        // if ($data == null) {
        //     return redirect('admin/post')->with('status', 'Data tidak ditemukan !');
        // }
        // if ($data->image !== null || $data->image !== "") {
        //     File::delete("$data->image");
        // }
        // $delete = $data->delete();
        // if ($delete) {
        //     return redirect('admin/post')->with('status', 'Berhasil hapus post !');
        // }
        // return redirect('admin/post')->with('status', 'Gagal hapus category !');
    }
}
