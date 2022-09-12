<?php

namespace App\Http\Controllers;

use App\Models\Attachments;
use App\Models\UserProject;
use App\Models\UserProjectOutput;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use MongoDB\Driver\Session;
use Intervention\Image\Facades\Image;

class UserProjectOutputController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$post_type,$post_id,$post_slug)
    {

        $user_project = UserProject::find($request->user_project_id);
        $attachment = Attachments::find($request->attachment_id);
//       return $request->user_project_output_id;
//        $request->validate([
//            'user_project_output_id'=>'exists:user_project_output,id'
//        ]);
//
        if($attachment){

            $new_name_export_src = time().'.'.$user_project->property;
            $json = array(
                "templateId"=> 5,
                "templateName"=> "business-card-name-card",
                "userProjectId"=> $request->user_project_id,
                "templateSrc"=>   "C://viditor//mockup//770.psd",
                "exportSrc"=> "C://viditor//mockup//mockup.jpg",
                "objects"=>array(
               array(
                        "type"=> "imageHolder",
                        "name"=> "imageHolder_01",
                        "layerIndex"=> 2,
                        "imageSrc"=>$attachment->path
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
          );

            $user_project_output = UserProjectOutput::create([
    //          'user_id'=>Auth::user()->id,
                'user_id'=>1,
                'user_project_id'=>$request->user_project_id,
                'output'=>$attachment->unique_name,
                'json'=>json_encode($json),
                'status'=>'queue'
            ]);
             $queues = UserProjectOutput::all()->last()->status;
             return response()->json(['status'=>$queues]);
//                return response()->json(['msg'=>'پروژه با موفقیت ثبت شد','user_project_output_id'=> $user_project_output->id]);
            }else{
               return response()->json(['status'=>'not cut']);
            }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserProjectOutput  $userProjectOutput
     * @return \Illuminate\Http\Response
     */
    public function show(UserProjectOutput $userProjectOutput)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserProjectOutput  $userProjectOutput
     * @return \Illuminate\Http\Response
     */
    public function edit(UserProjectOutput $userProjectOutput)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserProjectOutput  $userProjectOutput
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserProjectOutput $userProjectOutput)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserProjectOutput  $userProjectOutput
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserProjectOutput $userProjectOutput)
    {
        //
    }

    public function checkStatusRender()
    {
//        $statuses  = UserProjectOutput::where('user_id',Auth:user()->id)->pluck('status');
        $status = UserProjectOutput::where('user_id',1)->pluck('status')->last();
        $queues = UserProjectOutput::where('user_id',1)->where('status','queue')->get();

        if(count($queues) !== 0){
            return response()->json(['status'=>'queue','count'=>count($queues)]);
        }

        if($status === 'complete'){

            return response()->json(['status'=>'complete']);
//            $image_mockup = Storage::get('public/mockup/mockup.jpg');
//            echo $image_mockup;

        }else{

            return response()->json(['status'=>'render','row'=>$status]);
        }


    }

    public function rendering(Request $request)
    {
//        if($request->status === 'queue'){
           $user_project_output = UserProjectOutput::where('status','queue')->first();
           if($user_project_output){
               $user_project_output->update(array('status'=>'render'));
               $json = $user_project_output->json;
               return $user_project_output;
           }else{
               return 'failed';
           }

//        }
    }

    public function renderComplete(Request $request)
    {
//        if($request->status === 'render'){
            $user_project_output = UserProjectOutput::where('status','render')->first();
            if($user_project_output){
                $user_project_output->update(array('status'=>'complete'));

//                $get_ = json_decode($request->json);
                $mockup_image = Image::make('C:/viditor/mockup/'.$request->mockup_image);
                if($mockup_image){
//                    $extension = explode('.',$request->mockup_image)[1];
//                    $new_name_mockup = time().'.'.$extension;
                    $mockup_image->save(storage_path("app/public/mockup/".$request->mockup_image),100);
//                    UserProjectOutput::find();

//                    $mockup_image->save(storage_path("app/public/mockup/".$mockup_image),100);
                }
//                return $request->mockup_image;
                return ' complete Process';

            }else{
                return 'failed';
            }

        }
//    }
}
