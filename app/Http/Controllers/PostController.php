<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\UserProject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->get();

//        $attachments = Attachments::with('user')->latest()->take(1)->get();
        return view('home',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($post_type,$id,$slug)
    {

//        $post = Post::find($id)->with('layers')->get();
        $post = Post::with('layers')->find($id);
        $user_project =  UserProject::create([
//            'user_id'=>Auth::user()->id,
            'user_id'=>1,
            'post_id'=>$id,
            'status'=>'create',
            'aep'=>'uploads/mockups/2022/11/1_mockup-shop/770.psd',
        ]);

        return view('mockup',compact('post','user_project'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $post = Post::findOrFail($request->id);

        $json = json_encode(array(
            "templateId"=> $post->id,
            "templateName"=> $post->title,
            "userProjectId"=>$post->user_id,
            "templateSrc"=> $post->aep,
            "exportSrc"=> $post->thumbnail,
            "objects"=> array(
                array(
                    "type"=> "imageHolder",
                    "name"=> "imageHolder_01",
                    "layerIndex"=> 2,
                    "imageSrc"=>"F://Website//PhotoshopBase//Templates//1//LogoReplace.png"
                ),
                array(
                    "type"=> "textHolder",
                    "name"=> "textHolder_01",
                    "layerIndex"=> 5,
                    "fontName"=> "IRANSansWeb",
                    "fontSize"=> 131,
                    "sourceText"=>""

                ),
            ),
        ));

        $post->update([
            'renders'=>$json,
        ]);
        return response()->json(['status'=>200]);




    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
