<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    {{--cropper--}}
    <script src="{{ asset('js/cropper.js') }}"></script><!-- jQuery is required -->
    <link href="{{ asset('css/cropper.css') }}" rel="stylesheet">
    {{--cropper--}}
    {{--    <script src="{{asset('js/jquery.js')}}"></script>--}}
    <title>Laravel</title>
    <link rel="stylesheet" href="{{asset('css/tailwind.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('js/axios/dist/axios.min.js')}}"></script>
    {{--    C:\Users\ertebatat sahar\Desktop\laravel\renderforest\node_modules\cropperjs--}}
</head>
<body>

    @php
        $post_type = explode('/',Request::path())[0];
        $post_id = explode('/',Request::path())[1];
        $post_slug = explode('/',Request::path())[2];
    @endphp
    {{--screen small--}}
{{--    <div class="block md:hidden h-full screen__small">--}}
{{--        --}}{{--nav of screen small--}}
{{--        <div class="bg-white w-full p-3 flex justify-between">--}}
{{--            --}}{{--logo--}}
{{--            <div class="w-14">--}}
{{--                <img class="w-full w-full rounded-pill" src="{{asset('img/logo.jpg')}}" alt="">--}}
{{--            </div>--}}
{{--            --}}{{--logo--}}
{{--            --}}{{--btn downlaod--}}
{{--            <div class="download mt-1">--}}
{{--                <button class="bg-sky-300 text-white py-2 px-3 rounded-2xl">--}}
{{--                    <span>بارگیری</span>--}}
{{--                    <i class="fas fa-download mr-3"></i>--}}
{{--                </button>--}}
{{--            </div>--}}
{{--            --}}{{--btn downlaod--}}
{{--        </div>--}}
{{--        --}}{{--nav of screen small--}}
{{--        --}}{{--image of screen small--}}
{{--        <div class="mt-10">--}}
{{--            --}}{{--image--}}
{{--            <div class="image flex justify-center items-center rounded-2xl">--}}
{{--                <img class="w-full h-full img-responsive object-contain rounded-2xl" style="width: 100%;--}}
{{--                                                                   max-width: 550px;" src="{{asset($post->thumbnail)}}"--}}
{{--                     alt="">--}}
{{--            </div>--}}
{{--            --}}{{--image--}}
{{--            --}}{{--btn mockup--}}
{{--            <div class="mt-1 text-end mr-2">--}}
{{--                <button class="bg-sky-300 text-white py-2 px-3 rounded-2xl">--}}
{{--                    <span>بیشتر ببین</span>--}}
{{--                </button>--}}
{{--            </div>--}}
{{--            --}}{{--btn mockup--}}
{{--            --}}{{--btns footer--}}
{{--            <div class="bg-white mt-2">--}}
{{--                <button class="w-full text-blue-400 py-4 text-lg bg-blue-100">--}}
{{--                    <i class="fas fa-image mr-3"></i>--}}
{{--                    <span>تصاویر</span>--}}
{{--                </button>--}}
{{--                <button class="w-full text-blue-500 border-b-4 py-4 border-blue-500 text-lg">تابلو تبلیغاتی</button>--}}
{{--                --}}{{--dropup--}}
{{--                <div class="dropup py-2 text-center mt-2">--}}
{{--                    <button class="text-blue-700 px-3 text-3xl-center" data-bs-toggle="dropdown">--}}
{{--                        <span>آپلود</span>--}}
{{--                        <i class="fas fa-upload"></i>--}}
{{--                    </button>--}}
{{--                    <ul class="dropdown-menu text-end py-0 w-48">--}}
{{--                        <li class="w-full h-full hover:bg-sky-200 hover:text-stone-500">--}}
{{--                            <div>--}}
{{--                                <label class="text-stone-600 w-full h-full pr-2 py-3 hover:bg-sky-200 cursor-pointer"--}}
{{--                                       for="upload__image__label">--}}
{{--                                    <i class="fas fa-upload"></i>--}}
{{--                                    آپلود فایل--}}
{{--                                </label>--}}
{{--                                <input type="file" id="upload__image__label"--}}
{{--                                       data-section="{{ route("upload-image.create",['post_type'=>$post_type,'id'=>$post_id,'slug'=>$post_slug]) }}" class="btn__upload"/>--}}
{{--                            </div>--}}
{{--                        </li>--}}
{{--                        <li class="w-full h-full pr-2 py-3  hover:bg-sky-200 hover:text-stone-500">--}}
{{--                            <a--}}
{{--                                class="no-underline text-stone-600 w-full h-full hover:bg-sky-200" href="#">--}}
{{--                                <i class="fas fa-file-video mr-3"></i>--}}
{{--                                <span>فایل ها</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--                --}}{{--dropup--}}
{{--                --}}{{--image crop--}}
{{--                <div class="flex items-center py-2 h-auto justify-between ms-4 mb-2 mx-3 hidden box__image__crop">--}}
{{--                    <div style="width:70px;height: 3em ;margin-right: 5px;">--}}
{{--                        <img class="w-full box__image__crop--image h-full rounded-2xl" src="" alt="">--}}
{{--                    </div>--}}
{{--                    <div style="font-size: 13px;width: 5em;text-overflow:ellipsis;overflow:hidden;white-space: nowrap" class='text-start box__image__crop--name__image'></div>--}}
{{--                    <div class='w-24 relative text-end'>--}}
{{--                        <button class="box__icon btn__icon--pen relative">--}}
{{--                            <i class="fas fa-pen me-2 hover:shadow hover:shadow-stone-600 p-2"></i>--}}
{{--                            <span class="box__tooltip absolute top-1/2 box__icon--pen">تغییر</span>--}}
{{--                        </button>--}}
{{--                        <button class="box__icon btn__icon--trash relative" id="">--}}
{{--                            <i class="fas fa-trash hover:shadow hover:shadow-stone-600 p-2"></i>--}}
{{--                            <span class="box__tooltip absolute top-1/2 box__icon--trash">حذف</span>--}}
{{--                        </button>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                --}}{{--image crop--}}
{{--            </div>--}}
{{--            --}}{{--btns footer--}}
{{--        </div>--}}
{{--        --}}{{--image of screen small--}}
{{--    </div>--}}
    {{--screen small--}}
    {{--    sidebar--}}
    <div class="fixed sidebar hidden md:block transition-all top-0 right-0 h-full bg-white border-t">
        <div
            class="flex fixed top-0 sidebar__header transition-all bg-white w-64 right-0 text-center justify-center items-center h-14 border-b">
            <h5 class="text-sm font-bold">
                موکاپ دیگری را انتخاب کن
            </h5>
        </div>
        <div
            class="fixed sidebar__arrow justify-center cursor-pointer items-center -ml-7 hidden lg:flex rounded-tl-2xl rounded-bl-2xl w-7 top-64 h-14 bg-white">
            <i class="fas fa-angle-left"></i>
        </div>
        <div class="overflow-y-scroll h-full mt-14">
            <div class="px-7 items-center justify-center mb-20 gap-3 mt-3 sidebar__imgs grid">
                <div class="w-48 h-40 sidebar__img hover:cursor-pointer"><img
                        class="w-full h-full rounded-2xl img-responsive border-blue-700"
                        src="{{asset('img/post-slide-4.jpg')}}" alt="">
                </div>
                <div class="w-48 h-40 sidebar__img hover:cursor-pointer"><img
                        class="w-full h-full rounded-2xl img-responsive border-blue-700"
                        src="{{asset('img/post-portrait-4.jpg')}}" alt="">
                </div>
                <div class="w-48 h-40 sidebar__img hover:cursor-pointer"><img
                        class="w-full h-full rounded-2xl img-responsive border-blue-700"
                        src="{{asset('img/post-portrait-3.jpg')}}" alt="">
                </div>
                <div class="w-48 h-40 sidebar__img hover:cursor-pointer"><img
                        class="w-full h-full rounded-2xl img-responsive border-blue-700"
                        src="{{asset('img/post-sq-1.jpg')}}" alt="">
                </div>
                <div class="w-48 h-40 sidebar__img hover:cursor-pointer"><img
                        class="w-full h-full rounded-2xl img-responsive border-blue-700"
                        src="{{asset('img/post-sq-2.jpg')}}" alt="">
                </div>
                <div class="w-48 h-40 sidebar__img hover:cursor-pointer"><img
                        class="w-full h-full rounded-2xl img-responsive border-blue-700"
                        src="{{asset('img/post-sq-5.jpg')}}" alt="">
                </div>
                <div class="w-48 h-40 sidebar__img hover:cursor-pointer"><img
                        class="w-full h-full rounded-2xl img-responsive border-blue-700"
                        src="{{asset('img/post-sq-8.jpg')}}" alt="">
                </div>
                <div class="w-48 h-40 sidebar__img hover:cursor-pointer"><img
                        class="w-full h-full rounded-2xl img-responsive border-blue-700" src="{{asset('img/img.jpg')}}"
                        alt="">
                </div>
                <div class="w-48 h-40 sidebar__img hover:cursor-pointer"><img
                        class="w-full h-full rounded-2xl img-responsive border-blue-700" src="{{asset('img/logo.jpg')}}"
                        alt="">
                </div>
            </div>
        </div>
    </div>
    {{--    sidebar--}}
    <div class="h-0 md:h-full overflow-hidden hidden md:block main">
        {{--box--}}
        <div class="hidden md:block absolute w-64">
            <div class="bg-white pb-7">
                <div class="p-3 border-b border-stone-400 text-center">
                    <h2 class="text-2xl font-bold flex space-x-4">
                        <img class="max-w-12 rounded-full max-h-12" src="{{asset('img/logo.jpg')}}" alt="">
                        <span class="mt-2" style="font-size: 20px">VIDITOR.NET</span>
                    </h2>
                </div>
                @foreach($post->layers as $layer)
             <div class="layer__holder">
                <div class="text-left pr-2 text-end mb-4 mt-4 text-xl">
                    <span class="text-stone-400 text-sm">عکس</span>
                    <i class="fas fa-image"></i>
                </div>
                <div class="pe-2 text-sm-end text-stone-500">{{$layer->title}}</div>
                 <input type="hidden" class="layer__holder--input" value="{{$layer}}">

              {{--dropup--}}

                 <div class="dropup text-center mt-2">
                    <button class="text-blue-700 px-3 text-3xl-center" data-bs-toggle="dropdown">
                        <span>آپلود</span>
                        <i class="fas fa-upload"></i>
                    </button>
                    <ul class="dropdown-menu text-end w-48 py-0">
                        <li class="w-full h-full hover:bg-sky-200 hover:text-stone-500">
                            <div>
                                <label class="text-stone-600 w-full h-full pr-2 py-3 hover:bg-sky-200 cursor-pointer"
                                       for="upload__image__label">
                                    <i class="fas fa-upload"></i>
                                    آپلود فایل
                                </label>

                                <input type="file" id="upload__image__label"
{{--                                       ,'layer'=>$layers--}}
                                       data-section="{{route("upload-image.create",['post_type'=>$post_type,'id'=>$post_id,'slug'=>$post_slug]) }}" class="btn__upload"/>
                            </div>
                        </li>
                        <li class="w-full h-full pr-2 py-3  hover:bg-sky-200 hover:text-stone-500">
                            <a
                                class="no-underline text-stone-600 w-full h-full hover:bg-sky-200" href="#">
                                <i class="fas fa-file-video mr-3"></i>
                                <span>فایل ها</span>
                            </a>
                        </li>
                    </ul>
                  </div>
             </div>
           @endforeach

              {{--dropup--}}
              {{--image crop--}}
                    <div class="flex items-center h-auto justify-between ms-4 mb-2 mx-3 hidden box__image__crop">
                        <div style="width:70px;height: 3em ;margin-right: 5px;">
                            <img class="w-full box__image__crop--image h-full rounded-2xl" src="" alt="">
                        </div>
                        <div style="font-size: 13px;width: 5em;text-overflow:ellipsis;overflow:hidden;white-space: nowrap" class='text-start box__image__crop--name__image'></div>
                        <div class='w-24 relative text-end'>
                            <button class="box__icon btn__icon--pen relative">
                                <i class="fas fa-pen me-2 hover:shadow hover:shadow-stone-600 p-2"></i>
                                <span class="box__tooltip absolute top-1/2 box__icon--pen">تغییر</span>
                            </button>
                            <button class="box__icon btn__icon--trash relative" id="">
                                <i class="fas fa-trash hover:shadow hover:shadow-stone-600 p-2"></i>
                                <span class="box__tooltip absolute top-1/2 box__icon--trash">حذف</span>
                            </button>
                        </div>
                    </div>
             {{--image crop--}}
                </div>
        </div>
        {{--box--}}
        {{--main--}}
        <div class="relative h-full transition-all hidden md:block image__block ml-64">
            {{--account--}}
            <div class="absolute username pr-10">
                <div class="dropdown">
                    <button data-bs-toggle="dropdown">
                        <i class="fas fa-angle-down ml-1"></i>
                        <span>Reza Ramezanisani</span>
                        <i class="fas fa-user mr-3"></i>
                    </button>
                    <ul class="dropdown-menu w-48 text-end pr-3">
                        <li class="dropdown-item">پروژه های من</li>
                        <li class="dropdown-item">کمک</li>
                        <li class="dropdown-item">خروج</li>
                    </ul>
                </div>
            </div>
            {{--account--}}
            {{--image--}}
            <div class="pt-32 mx-auto flex justify-center items-center h-full image rounded-2xl">

                  <img class="w-full h-full object-contain rounded-2xl" style="width: 100%;
                                            max-width: 550px;" src="{{url($post->thumbnail)}}" alt="">

            </div>
            {{--image--}}
            {{--btn downlaod--}}
            <div class="absolute download" id="">
                <button class="bg-sky-300 text-white py-2 px-3 rounded-2xl btn__download" data-section="" id="{{$user_project->id}}">
                    <span>بارگیری</span>
                    <i class="fas fa-download mr-3"></i>
                </button>
            </div>
            {{--btn downlaod--}}
        </div>
        {{--main--}}
    </div>
    {{--    alert delete--}}
    <div class="alert__delete w-64 text-center bg-gray-600 p-4 hidden rounded-2 absolute top-1/2 right-1/2">
        <p class="text-white">عکس حذف شود؟</p>
        <button class="text-white bg-sky-400 rounded-2 px-3 py-1 alert__cancel">لغو</button>

        <button class="text-red-600 bg-red-200 rounded-2 px-3 py-1 alert__delete__image">حذف</button>
    </div>
    {{--    alert delete--}}
{{--alert--}}
    <div class="loader__layer fixed top-0 left-0 hidden w-full h-full bg-sky-200/50">
        <div class="loader w-12 h-12 absolute top-1/2 right-1/2 -translate-x-1/2 -translate-y-1/2">
        </div>
        <div class="loader__text w-72 text-center h-12 absolute pr-12 top-3/4 right-1/2 translate-x-1/2 -translate-y-1/2"></div>
    </div>
{{--alert--}}
    <div class="cropper hidden pt-8">
        {{--box croping--}}
        <div class="rounded-2 md:mx-auto md:w-1/2">
            <div class="max-h-64 w-full">
                <img id="image_crop" class="image_upload object-contain mx-auto md:mx-0  md:w-full h-full" src="" alt="">
            </div>
        </div>
        <div class="rounded-2 p-3 bg-white space-x-4 w-full md:w-1/2 md:mx-auto">
            <button class="rotate"><i class="fas fa-undo"></i></button>
            <input value="25" type="range" class="zoom float-end">
        </div>
        <div class="rounded-2 p-3 bg-white space-x-4 text-end w-full md:w-1/2 md:mx-auto">
            <button class="cancel">لغو</button>
            <button class="btn__crop--change p-2 bg-sky-500 hidden">تغییر</button>
            <button class="btn__crop p-2 bg-sky-500" id="{{$user_project->id}}">نمایش</button>
        </div>
        {{--box croping--}}
    </div>




<script>
    $(function () {
        let modelLayer = JSON.parse($('.layer__holder--input').val());
        let widthLayer = modelLayer.width;
        let heightLayer = modelLayer.height;
        let cropper = null;
        let cropperHas = false;

        function cropperInit(width,height) {

            let image = $('#image_crop')[0];
            //cropper
            if (cropperHas) {
                cropper.destroy();
                cropperHas = false;
            } else {
                // image.cropper('rotate',45);
                cropper = new Cropper(image, {
                    aspectRatio: width/height,
                    crop(event) {
                        // input.val(Math.round(event.detail.x));
                        // console.log(event.detail.x);
                        // console.log(event.detail.y);
                        // console.log(event.detail.width);
                        // console.log(event.detail.height);
                        // console.log(event.detail.rotate);
                        // console.log(event.detail.scaleX);
                        // console.log(event.detail.scaleY);
                        // event.detail.roate=50+'deg';
                    },
                     viewMode:0,
                    dragMode: 'crop',
                    // preview: '.preview',
                    background: true,
                    // minContainerWidth: 600,
                  //  viewMode: 2,
                    // ready:true,
                    cropped: true,
                    reloading: true,
                    replace: true,
                    responsive:true,
                    // preview:'.preview',
                    // cropmove:function () {
                    //     alert();
                    // }
                    // minCropBoxWidth:400,
                    // minCropBoxHeight:100,
                    // cropmove:function () {}

                });
                cropperHas = true;
            }
        }
        //methods cropper.js
        let beforeValue = 0;
        $('.zoom').change(function () {
            let currentValue = Number($(this).val()) / 100;
            if (currentValue > beforeValue) {
                cropper.zoomTo(currentValue);
                beforeValue = currentValue;
            } else {
                cropper.zoomTo(currentValue);
                beforeValue = currentValue;
            }
        });
        let degree = 0;
        $('.rotate').click(function () {
            degree++;
            cropper.rotateTo(degree);
        });
        //methods cropper.js
        //arrow sidebar
        $('.sidebar__arrow').click(function () {
            let angle = $(this).find('.fas');
            if(angle.hasClass('fa-angle-left')){
                angle.removeClass('fa-angle-left').addClass('fa-angle-right');
            }else{
                angle.removeClass('fa-angle-right').addClass('fa-angle-left');
            }
            $('.sidebar').toggleClass('wider');
            $('.image__block').toggleClass('margin--right');
            let sidebarImgs = $('.sidebar__imgs');
            if (!sidebarImgs.hasClass("wider")) {
                sidebarImgs.addClass("wider").css("gridTemplateColumns", "auto auto");
            } else {
                sidebarImgs.removeClass("wider").css("gridTemplateColumns", "auto");
            }
        });
        //arrow sidebar
        //image main
        $('.sidebar__img').click(function () {
            let sidebarImageSrc = $(this).find(".img-responsive").attr('src');
            let imageSrc = $('.image').find("img").attr('src', '');
            imageSrc.attr('src', sidebarImageSrc);
        });
        //image main
            //aspectRatio
            function gcd (a, b) {
              return (b == 0) ? a : gcd (b, a%b);
            }
            //aspectRatio
        // send image to another page
        $('.btn__upload').change(function () {
            let page_url = URL.createObjectURL($(this)[0].files[0]);
            $('.cropper').removeClass('hidden').addClass('block');
            $('.screen__small').removeClass('block').addClass('hidden');
            $('.sidebar').removeClass('md:block').addClass('md:hidden');
            $('.main').removeClass('md:block').addClass('md:hidden');
            $('#image_crop').attr('src', page_url);


            let r =gcd(widthLayer , heightLayer) ;
            let w = widthLayer/r;
            let h = heightLayer/r;
            cropperInit(widthLayer,heightLayer);
        });
        //btn crop image
        $('.btn__crop').click(function () {
            let user_project_id = $(this).attr('id');

            let canvas = cropper.getCroppedCanvas({width:widthLayer,height:heightLayer});
            console.log(widthLayer,heightLayer);
             let nameImage = $('.btn__upload')[0].files[0].name.split('.')[0];
            canvas.toBlob(function (blob) {
                //convert blob into base64
                var reader = new FileReader();
                reader.readAsDataURL(blob);
                reader.onloadend = function () {
                    var base64data = reader.result;
                    //convert blob into base64
                    let file = {
                        'size': blob.size,
                        'type': blob.type,
                        'blob': URL.createObjectURL(blob),
                        'base64': base64data,
                        'name_image': nameImage
                    };
                    let postId = location.href.split('/')[1];
                    // 'mockup-shop/upload-image/'

                    axios.post('/{{$post_type}}/{{$post_id}}/{{$post_slug}}/upload-image/',{
                        name: 'reza',
                        image: JSON.stringify(file),
                        headers: {"Content-Type": "multipart/form-data"},
                        user_project_id:user_project_id
                    }).then(function (res) {
                        $('.cropper').removeClass('block').addClass('hidden');
                        $('.screen__small').addClass('block').removeClass('hidden');
                        $('.sidebar').removeClass('md:hidden').addClass('md:block');
                        $('.main').removeClass('md:hidden').addClass('md:block');
                        $('.dropup').addClass('hidden');
                        $('.box__image__crop').addClass('block').removeClass('hidden');
                        $('.box__image__crop--image').attr('src', 'http://127.0.0.1:8000/' + res.data.image__path);
                        $('.box__image__crop--name__image').text(res.data.name_image);
                        $('.btn__icon--trash').attr('id', res.data.image_id);
                        $('.btn__icon--pen').attr('id', res.data.image_id);
                        $('.download').attr('id',res.data.user_project_layers.id);
                        // console.log(res.data);
                    }).catch(function (err) {
                        console.log(err);
                    })
                }
            });
        });
        //btn crop image
        //cancel cropper
        $('.cancel').click(function () {
            if (!cropper.replaced) {
                cropperInit();
            }
            $('#image_crop').attr('src', '');
            $('.sidebar').removeClass('md:hidden').addClass('md:block');
            $('.main').removeClass('md:hidden').addClass('md:block');
            $('.cropper').removeClass('block').addClass('hidden');
            $('.screen__small').addClass('block').removeClass('hidden');
        });
        //cancel cropper
        // send image to another page
        //delete image crop
        $('body').on('click', '.btn__icon--trash', function () {
            $('.alert__delete').removeClass('hidden').addClass('block');
        })
        $('.alert__cancel').on('click', function () {
            $('.alert__delete').removeClass('block').addClass('hidden');
        });
        $('.alert__delete__image').on('click', function () {
            let attachmentId = $('.btn__icon--trash').attr('id');
            let postId = location.href.split('/')[1];
            let userProjectLayerId = $('.download').attr('id');
            console.log(userProjectLayerId);
            axios.delete('/{{$post_type}}/{{$post_id}}/{{$post_slug}}/upload-image/'+attachmentId +'?user_project_layer_id='+userProjectLayerId).then(function (res) {
                // console.log(res.data)
                $('.alert__delete').addClass('hidden').removeClass('block');
                $('.dropup').addClass('block').removeClass('hidden');
                $('.box__image__crop').addClass('hidden').removeClass('block');
            }).catch(function (err) {
                console.log(err);
            }).then(function () {
                $('.alert__delete').removeClass('block').addClass('hidden');
                $('.btn__crop').removeClass('hidden');
                $('.btn__crop--change').addClass('hidden');
                $('.btn__crop--change').addClass('hidden');
            });
            cropper.destroy();
            cropperHas = false;
        });
        //delete image crop
        //edit image crop
        $('body').on('click', '.btn__icon--pen', function () {
            let imageCropSrc = $('.box__image__crop--image').attr('src');
            $('.cropper').removeClass('hidden').addClass('block');
            $('.sidebar').removeClass('md:block').addClass('md:hidden');
            $('.main').removeClass('md:block').addClass('md:hidden');
            $('.screen__small').addClass('hidden').removeClass('block');
            $('#image_crop').attr('src', imageCropSrc);
            cropper.replace($('#image_crop').attr('src'));
            let attachmentId = $('.btn__icon--trash').attr('id');
            $('.btn__crop').addClass('hidden');
            $('.btn__crop--change').removeClass('hidden');
        })
        $('.btn__crop--change').click(function () {
            let user_project_id = $(this).attr('id');
            let attachmentId = $('.btn__icon--pen').attr('id');
            let canvas = cropper.getCroppedCanvas();
            canvas.toBlob(function (blob) {
                //convert blob into base64
                var reader = new FileReader();
                reader.readAsDataURL(blob);
                reader.onloadend = function () {
                    var base64data = reader.result;
                    //convert blob into base64
                    console.log(blob);
                    let file = {
                        'type': blob.type,
                        'size': blob.size,
                        'blob': URL.createObjectURL(blob),
                        'base64': base64data,
                    };
                    let postId = location.href.split('/')[1];

                    axios.patch('/{{$post_type}}/{{$post_id}}/{{$post_slug}}/upload-image/'+attachmentId,{
                        // name: 'reza',
                        image: JSON.stringify(file),
                        headers: {"Content-Type": "multipart/form-data"},
                        user_project_id:user_project_id,
                        // user_project_layer_id:userProjectLayerId
                    }).then(function (res) {
                        $('.cropper').removeClass('block').addClass('hidden');
                        $('.screen__small').addClass('block').removeClass('hidden');
                        $('.sidebar').removeClass('md:hidden').addClass('md:block');
                        $('.main').removeClass('md:hidden').addClass('md:block');
                        $('.dropup').addClass('hidden');
                        $('.box__image__crop').addClass('block').removeClass('hidden');
                        $('.box__image__crop--image').attr('src', 'http://127.0.0.1:8000/' + res.data.image__path);
                        $('.box__image__crop--name__image').text(res.data.name_image);
                        // console.log(res.data);
                    }).catch(function (err) {
                        console.log(err);
                    });
                }
            });
        })
        //edit image crop
    });
    //json
    $('.btn__download').click(function () {
        let route = $(this).attr('data-section');
        let userProjectId = $(this).attr('id');
        let attachmentId = $('.btn__icon--pen').attr('id');
        let userProjectOutputId = $('.btn__download').attr('data-section');
        console.log(userProjectOutputId);
        axios.post('/{{$post_type}}/{{$post_id}}/{{$post_slug}}/user-project-output/',
            {user_project_id:userProjectId, attachment_id:attachmentId,user_project_output_id:userProjectOutputId}).then(function (res) {
            console.log(res.data);
            if(res.data.status === 'queue'){
                $('.loader__layer').removeClass('hidden');
                let requestLoop = setInterval(()=> {
                            axios.post('/{{$post_type}}/{{$post_id}}/{{$post_slug}}/check-status-render/').then(function (res) {
                                console.log(res.data);
                                let status = res.data.status;
                                switch (status){
                                    case 'queue':
                                        $('.loader__text').text('شما در صف '+res.data.count+'هستید');
                                        break

                                    case 'complete':

                                       $('.loader__text').text('در حال آماده سازی عکس...');
                                       $('.image img').attr('src','http://127.0.0.1:8000/storage/mockup/mockup.jpg');
                                       $('.loader__layer').addClass('hidden');
                                       clearInterval(requestLoop);
                                        break
                                    case 'render':
                                        $('.loader__text').text('...در حال رندر گرفتن');

                                }
                                // let splitResponse = res.data.split(' ');
                                // let queue = splitResponse[0];
                                //
                                // if(queue === ""){
                                //     $('.loader__text').text('...در حال رندر گرفتن');
                                //    // console.log(queue);
                                // }else{
                                //     let text_queue = (queue === 'queue')? 'شما در صف '+queue+'هستید' : '';
                                //    $('.loader__text').text(text_queue);
                                //     // console.log(render);
                                // }
                                // if (res.data === 'finish') {
                                //     console.log(res.data);
                                //     // $('.image img').attr('src','http://127.0.0.1:8000/'+splitResponse[0]);
                                //     $('.loader__layer').addClass('hidden');
                                //     clearInterval(requestLoop);
                                // }
                            }).catch(function (err) {
                                console.log(err);
                            });
                    }
                    ,1000);
                requestLoop();



            }

        }).catch(function (err) {
            console.log(err);
        });
    });

    //json


</script>
</body>
</html>
