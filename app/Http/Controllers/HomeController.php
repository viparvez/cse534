<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use Auth;
use App\Chatbot;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

     /* Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function pages()
    {

        $pages = Page::where(['createdby' => Auth::user()->id])->get();

        return view('pages',compact('pages'));
    }


    /* Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function instructions()
    {

        return view('instructions');
    }
}
