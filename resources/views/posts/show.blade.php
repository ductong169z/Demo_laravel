@extends('layouts.app')
@section('content')

    <title>
 {!! $posts->title !!}
    </title>
    {{--{{ dd($posts) }}--}}


    <div class="cke_tpl_title">
       <h3><a href="{{url('/')}}" style="color: blue">Home</a>/<a href="{{url('/cate/0')}}" style="color: blue">{{$cate->name}}</a>/{{$posts->title}}</h3>
        <h1> {!! $posts->title !!}
    </h1></div>



    <table style="width:100%">
        <td class="list-group-item"> {!! $posts->body !!}
        </td>
    </table>
    <center>
        <h1>
    <a href="/blog/loadfilm/{{$posts->id}}" class="btn btn-success btn-lg" role="button">Xem Online</a>

    <a href="{{$posts->linkdow}}" class="btn btn-warning btn-lg" role="button">Tải về</a></h1>
    </center>


    <p></p>
                <small>Writen on  {!! $posts->created_at!!}</small>

    @if(!Auth::guest())
    <a href="/blog/posts/{{$posts->id}}/edit">Sửa bài viết</a>
    {!! Form::open(['url'=>['del',$posts->id],'method'=>'POSTS',"class" => "pull-right"]) !!}
    {!! Form::submit('Xóa bài Viết', ['class' => 'btn btn-danger']) !!}

    {!! Form::close() !!}
    @endif
@endsection
