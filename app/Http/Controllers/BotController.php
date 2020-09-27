<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Controllers\NodeController as Nodes;
use App\Chatbot;
use App\Gallery;
use App\Page;
use Illuminate\Support\Facades\DB;


class BotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bots = Chatbot::where(['createdby' => Auth::user()->id])->get();
        

        $pages = DB::table("pages")->select('*')->whereNotIn('id',function($query) {

           $query->select('pageid')->from('chatbots');

        })->get();

        return view('bot',compact('bots','pages'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createBot(Request $request)
    {
        Chatbot::create([
            'name' => $request->name,
            'accesstoken' => $request->accesstoken,
            'pageid' => $request->pageid,
            'createdby' => Auth::user()->id,
            'updatedby' => Auth::user()->id,
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s')
        ]);

        return back()->with('success','Bot created');
    }


    /**
     * Display a the generic template resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getGeneric(){
        return view('generic');
    }


    /**
     * Display a the generic button resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getButton($id){
        $nodes = (new Nodes)->getNodes($id);
        return view('button',compact('id','nodes'));
    }

    public function listener($id){
        $nodes = (new Nodes)->getNodes($id);
        return view('listener',compact('id','nodes'));
    }


    /**
     * Display a the generic media resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getMedia($id){
        $galleries = Gallery::where(['createdby' => Auth::user()->id])->get();
        $nodes = (new Nodes)->getNodes($id);
        return view('media',compact('id','nodes','galleries'));
    }


    /**
     * Display a the generic text resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getText($id){
        $nodes = (new Nodes)->getNodes($id);
        return view('text',compact('id','nodes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function configure($id){
        $nodes = (new Nodes)->getNodes($id);
        return view('createbot',compact('nodes','id'));
    }
}
