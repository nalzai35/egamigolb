<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/dashboard');
    }

    public function post()
    {
        return view('admin.post');
    }

    public function category()
    {
        return view('admin.category');
    }

    public function users()
    {
        return view('admin.user');
    }

    public function userDelete($id)
    {
        return User::findOrFail($id)->delete();
    }

    public function keyword()
    {
        return view('admin.keyword');
    }

    public function keywordInsert(Request $request)
    {
        $kw = explode("\r\n", $request->keyword);
        foreach ($kw as $key => $data) {
            Keyword::firstOrCreate(['keyword' => $data ]);
        }
        return redirect()->back()->with('status', 'Keyword Inserted!');
    }

    public function campign()
    {
        return view('admin.campign');
    }

    public function template()
    {
        return view('admin.template');
    }
}
