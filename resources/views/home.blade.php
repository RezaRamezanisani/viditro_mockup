@extends('layouts.master')


    @php
        $post=$posts->first();
    @endphp
@section('content')
    @foreach($posts as $post)
    <a href="{{$post->href()}}">{{ $post->title }}</a>
    <img width="50px" height="60px" src="{{asset($post->thumbnail)}}" alt="">
    <br>
    @endforeach

@endsection
