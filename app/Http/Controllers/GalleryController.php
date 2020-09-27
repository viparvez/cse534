<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Validator;
use App\Gallery;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Gallery::where(['createdby' => Auth::user()->id])->get();
        return view('gallery',compact('images'));
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
        $validator = Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10480',
        ]);

        if ($validator->fails()) {
            return back()->with('error','Image Upload failed');
        }


        $image = $request->file('image');

        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

        $destinationPath = public_path('gallery');

        $image->move($destinationPath, $input['imagename']);

        $imageToFb = array(
            "message" => array(
                "attachment" => array(
                    "type" => "image",
                    "payload" => array(
                        "is_reusable" => true,
                        "url" => 'https://media1.s-nbcnews.com/j/newscms/2019_21/2870431/190524-classic-american-cheeseburger-ew-207p_d9270c5c545b30ea094084c7f2342eb4.fit-760w.jpg'
                    )
                )
            )
        );

        $image_url = url("/")."/public/gallery/".$input['imagename'];

        $uploadToFb = apiCurl("https://graph.facebook.com/v8.0/me/message_attachments?access_token=EAAILHSBzbqsBAKqrYQTUOgeMd39IDAJmomwhSP6YuYj1toamwUWZBoAJM2t6uZCyfIUFklG7YosYXJ0ZA18HoGwQK457axEZA9PWPI7VCmk6NRoSgeYZAw0NPJBNFFjQtSU6JFCDcdRcUgR4OZBMQBMQBY8LhitnY6asovt5TeJIajvWKSZBWCV", $imageToFb);

        $uploadToFb = json_decode($uploadToFb,true);

        $attachment_id = $uploadToFb['attachment_id'];
        
        Gallery::create([
            'image_url' => $image_url,
            'mediaid' => $attachment_id,
            'createdby' => Auth::user()->id,
            'updatedby' => Auth::user()->id,
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at'=> date('Y-m-d H:i:s')
        ]);

        return back()->with('success','Image Upload successful');
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
}
