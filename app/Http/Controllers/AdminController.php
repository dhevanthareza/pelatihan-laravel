<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\CobaEmail;
use Illuminate\Support\Facades\Mail;

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
}
