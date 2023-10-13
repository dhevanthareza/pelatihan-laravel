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
        $data = Category::find($id); // select * from category where id = 1 limit 1;
        return view('admin.category.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $d = Category::find($id);
        if ($d == null) { // pengecekan apakah data ada di dalam database
            return redirect('admin/category')->with('status', 'Data tidak ditemukan !');
        }

        $req = $request->all(); // Mengambil semua inputan

        if ($request->hasFile('image')) { // jika ada file, maka file image di update
            if ($d->image !== null) { // jika kolom image sudah ada data teks path file
                File::delete("$d->image"); // menghapus file lama
            }
            $category = Str::random("20") . "-" . $request->image->getClientOriginalName();
            $request->file('image')->move("file/category/", $category);
            $req['image'] = "file/category/" . $category;
        }


        $data = Category::find($id)->update($req); // update category set param = value where id = ?
        if ($data) {
            // jika update berhasil, redirect index category status berhasil
            return redirect('admin/category')->with('status', 'Category berhasil diedit !');
        }
        // jika update gagal, redirect index category status gagal
        return redirect('admin/category')->with('status', 'Gagal edit category !');

    }

    public function delete($id)
    {
        $data = Category::find($id); // ambil data
        if ($data == null) { // jika data tidak ada, maka kembali ke index
            return redirect('admin/category')->with('status', 'Data tidak ditemukan !');
        }
        if ($data->image !== null || $data->image !== "") { // jika kolom image sudah ada data teks path file
            File::delete("$data->image"); // maka file image dihapus
        }
        $delete = $data->delete(); // menghapus dari database
        if ($delete) {
            return redirect('admin/category')->with('status', 'Berhasil hapus category !');
        }
        return redirect('admin/category')->with('status', 'Gagal hapus category !');
    }

}
