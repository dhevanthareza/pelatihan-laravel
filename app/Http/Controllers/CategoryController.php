<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function index()
    {
        $data = Category::get();
        return view("admin.category.index", compact('data'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function insert(Request $request)
    {
        $request->validate(Category::$rules); // Validasi


        $requests = $request->all(); // Mengambil semua inputan

        $requests['image'] = ""; // Nyiapin varioabel untuk nampung data gambar


        if ($request->hasFile('image')) {

            $files = Str::random("20") . "-" . $request->image->getClientOriginalName(); // Mengatur nama file

            $request->file('image')->move("file/category/", $files); // Mengcopy file yang di upload user ke directory aplikasi

            $requests['image'] = "file/category/" . $files; // Mgisi variabel kosing yang tadi disiapkan
        }

        $cat = Category::create($requests); // Insert data ke databse
        if($cat){
            return redirect('admin/category')->with('status', 'Berhasil menambah data !');
        }

        return redirect('admin/category')->with('status', 'Gagal menambah data !');
    }

    public function edit($id)
    {
        // $data = Category::find($id);
        // return view('admin.category.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        // $d = Category::find($id);
        // if ($d == null) {
        //     return redirect('admin/category')->with('status', 'Data tidak ditemukan !');
        // }

        // $req = $request->all();

        // if ($request->hasFile('image')) {
        //     if ($d->image !== null) {
        //         File::delete("$d->image");
        //     }
        //     $category = Str::random("20") . "-" . $request->image->getClientOriginalName();
        //     $request->file('image')->move("file/category/", $category);
        //     $req['image'] = "file/category/" . $category;
        // }


        // $data = category::find($id)->update($req);
        // if ($data) {
        //     return redirect('admin/category')->with('status', 'Category berhasil diedit !');
        // }
        // return redirect('admin/category')->with('status', 'Gagal edit category !');

    }

    public function delete($id)
    {
        // $data = Category::find($id);
        // if ($data == null) {
        //     return redirect('admin/category')->with('status', 'Data tidak ditemukan !');
        // }
        // if ($data->image !== null || $data->image !== "") {
        //     File::delete("$data->image");
        // }
        // $delete = $data->delete();
        // if ($delete) {
        //     return redirect('admin/category')->with('status', 'Berhasil hapus category !');
        // }
        // return redirect('admin/category')->with('status', 'Gagal hapus category !');
    }

}
