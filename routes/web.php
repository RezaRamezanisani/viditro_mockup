<?php

use App\Http\Controllers\UserProjectController;
use App\Http\Controllers\UserProjectOutputController;
use App\Models\Post;
use App\Models\UserProjectOutput;
use Illuminate\Support\Facades\Route;
use App\Models\Attachments;
use App\Models\User;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AttachmentsController;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/curl',function (){
//    $image_mockup = Storage::get('public/mockup/3.jpg');
//    return $image_mockup;
//    $mockup_image = Image::make('C:\viditor\mockup\mockup.jpg');
//    if($mockup_image){
//        echo 'yes';
////        return $mockup_image;
//        $mockup_image->save(storage_path("app//public//mockup//mockup.jpg"),100);
////                    $mockup_image->save(storage_path("app/public/mockup/".$mockup_image),100);
//    }
//          return dd(Storage::exists('public/mockup/mockup.jpg'));
//    $url = "http://127.0.0.1:8000/".json_decode($json)->objects[0]->imageSrc;
//    Storage::download('storage/mockup/1661672732.png');
//      return dd(Storage::exists('public/mockup/1661672784.png'));
//       return Storage::download('public/mockup/1661672784.png');
//        return Storage::put('mockup',"C://viditor//mockup///mockup.jpg");
//    return Storage::files('public/mockup');
//    Storage::disk('public')->download('storage/mockup/1661672732.png');
//    return storage_path();
//    return view('welcome');
});
Route::get('/', [PostController::class,'index']);
Route::get('/{post_type}/{id}/{slug}',[PostController::class,'create'])->name('mockup');
Route::post('rendering',[UserProjectOutputController::class,'rendering']);
Route::post('render-complete',[UserProjectOutputController::class,'renderComplete']);



Route::group(['prefix'=>'/{post_type}/{id}/{slug}'],function(){

    Route::resource('upload-image',AttachmentsController::class);
    Route::resource('post',PostController::class)->except('create');
    Route::resource('user-projects',UserProjectController::class);
    Route::resource('user-project-output',UserProjectOutputController::class);
    Route::post('check-status-render',[UserProjectOutputController::class,'checkStatusRender']);
//    curl

});

