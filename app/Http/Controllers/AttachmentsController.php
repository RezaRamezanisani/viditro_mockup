<?php

namespace App\Http\Controllers;

use App\Models\Attachments;
use App\Models\UserProject;
use App\Models\UserProjectLayer;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class AttachmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        return view('main');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

       return view('upload-image');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $json_decode = json_decode($request->image);
         $post_id = explode('/',Url::current())[4];

         $img_crop = Image::make($json_decode->base64);
         date_default_timezone_set('Asia/Tehran');

         if($img_crop) {
             $validator = Validator::make(['img' => $img_crop ], ['img' => 'max:2000']);
             if($validator->fails()){
                 return response()->json(['status'=>$validator->messages()]);
             }else {
                 $img_type = explode('/',$json_decode->type);
                 $image_mime = $json_decode->type;
                 $image_extension = $img_type[1];
                 $image_size = $json_decode->size;
                 $new_image_name = time() . '.' . $image_extension;

                $attachment = Attachments::create([
//                    'user_id'=>Auth::user()->id,
                     'user_id' => 1,
                     'relation_type' => 'project',
                     'relation_id' => 1,
                     'title' => $json_decode->name_image,
                     'unique_name' => $new_image_name,
                     'description' => '',
                     'poster' => '',
                     'mime' => $image_mime,
                     'type' => 'image',
                     'extension' => $image_extension,
                     'size' => $image_size,
                     'duration' => 0,
                     'path' => 'storage/mockup/' . $new_image_name,
                     'parent' => 0,
                     'in' => 'public',
//                 'deleted_at' => date('Y-m-d H:i:s'),
                 ]);

               $user_project_layers = UserProjectLayer::create([
                    'user_project_id'=>$request->user_project_id,
                    'post_id'=>$post_id,
                    'type'=>'imageHolder',
                    'property'=> 'src',
                    'value'=>'uploads/mockups/2022/11/1_mockup-shop/'.$json_decode->name_image,
                ]);

                 $img_crop->save(storage_path("app/public/mockup/".$new_image_name),100);

                 $attachment_id = Attachments::all()->last()->id;
                 $attachment_original_name = Attachments::all()->last()->title;
                 $attachment_path = Attachments::all()->last()->path;
    //             'storage/mockup/' .$new_image_name
    //             $json_decode->name_image

                    return response()->json(['status'=>200,'image__path' =>$attachment_path ,'name_image'=>$attachment_original_name,'image_id'=>$attachment_id,'user_project_layers'=> $user_project_layers ]);
             }

            }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\attachments  $attachments
     * @return \Illuminate\Http\Response
     */
    public function show(attachments $attachments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\attachments  $attachments
     * @return \Illuminate\Http\Response
     */
    public function edit(attachments $attachments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\attachments  $attachments
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$post_type,$id,$slug,$upload_image)
    {
        $json_decode = json_decode($request->image);
        $img_crop = Image::make($json_decode->base64);
        date_default_timezone_set('Asia/Tehran');
        if($img_crop) {
            $validator = Validator::make(['img' => $img_crop ], ['img' => 'max:2000']);
            if($validator->fails()){
                return response()->json(['status'=>$validator->messages()]);
            }else {
                $img_type = explode('/',$json_decode->type);
                $image_extension = $img_type[1];
                $image_size = $json_decode->size;
                $new_image_name = time() . '.' . $image_extension;
                $attachment = Attachments::find($upload_image);
                if(Storage::exists('public/mockup/'.$attachment->unique_name)){
                   Storage::delete('public/mockup/'.$attachment->unique_name);
                   $img_crop->save(storage_path("app/public/mockup/".$new_image_name),100);
                }
                $attachment->update(['size'=>$image_size,'path'=>'storage/mockup/' . $new_image_name,'unique_name'=>$new_image_name]);

                $attachment_latest = Attachments::all()->last();
                $attachment_id =  $attachment_latest->id;
                $attachment_original_name =  $attachment_latest->title;
                $attachment_path =  $attachment_latest->path;
                $attachment_unique_name = $attachment_latest->unique_name;
                return response()->json(['status'=>200,'image__path' =>$attachment_path ,'name_image'=>$attachment_original_name,'image_id'=>$attachment_id]);


            }

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\attachments  $attachments
     * @return \Illuminate\Http\Response
     */
    public function destroy($post_type,$post_id,$post_slug,$id)
    {

        $attachment = Attachments::findOrFail($id);
        $user =UserProjectLayer::destroy(request()->user_project_layer_id);

        Attachments::destroy($id);
        if(Storage::exists('public/mockup/'.$attachment->unique_name)){
            Storage::delete('public/mockup/'.$attachment->unique_name);
        }
        return response()->json(['status'=>200]);

    }
}


