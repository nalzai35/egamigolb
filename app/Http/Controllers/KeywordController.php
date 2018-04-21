<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Keyword;

class KeywordController extends Controller
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

    public function index()
    {
        return view('admin.keyword');
    }

    public function insert(Request $request)
    {
        $kw = explode("\r\n", $request->keyword);
        foreach ($kw as $key => $data) {
            Keyword::firstOrCreate(['keyword' => $data ]);
        }
        return redirect()->back()->with('status', 'Keyword Inserted!');
    }
}
