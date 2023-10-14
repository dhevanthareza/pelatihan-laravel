<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\CobaEmail;
use Illuminate\Support\Facades\Mail;
use App\Models\User; // memanggil model User
use Illuminate\Support\Facades\Hash; // memanggil Helper Hash
use Illuminate\Support\Str; // memanggil Helper String / Str
use Illuminate\Support\Facades\Session; // memanggil Session

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function fungsi_viewform()
    {
        return view('admin.viewform');
    }

    public function fungsi_kirimdataform(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jabatan' => 'required'
        ]);

        return 'berhasil';
    }

    public function fungsi_kirimemail()
    {
        Mail::to('isaeeza@gmail.com')->send(new CobaEmail());
        return 'berhasil kirim email';
    }

    public function register()
    {
        return view('admin.register');
    }
    
    public function login()
    {
        return view('admin.login');
    }
    
    public function postRegister(Request $request)
    {
        $request->validate(User::$rules); // validasi registrasi user
        $requests = $request->all(); // mengambil request
        $requests['password'] = Hash::make($request->password); // enkripsi password
        $requests['image'] = ""; // set variable image

        // upload data image dan menyimpan di database
        if ($request->hasFile('image')) {
            $files = Str::random("20") . "-" . $request->image->getClientOriginalName();
            $request->file('image')->move("file/admin/", $files);
            $requests['image'] = "file/admin/" . $files;
        }

        $user = User::create($requests); // insert data user di database
        if($user){
            return redirect('register')->with('status', 'Berhasil mendaftar !');
        }

        return redirect('register')->with('status', 'Gagal Register Account !');

    }

    public function postLogin(Request $request)
    {
        $requests   = $request->all(); // mengambil request
        $data       = User::where('email', $requests['email'])->first(); // mengambil data user by email
        $cek        = Hash::check($requests['password'], $data->password); // pengecekan hash pada password yg dikirim
        if($cek){ // jika login berhasil
            Session::put('admin', $data->email); // menyimpan email pada session "admin"
            Session::put('admin_id', $data->id); // menyimpan id admin pada session "admin_id"
            return redirect('admin'); // diarahkan ke halaman admin
        }
        return redirect('login')->with('status', 'Gagal login Admin !');
    }

    public function logout()
    {
        Session::flush(); // menghapus session
        return redirect('login')->with('status', 'Berhasil Logout'); // diarahkan ke halaman login
    }
}
