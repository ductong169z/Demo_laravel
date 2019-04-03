@extends('layouts.app')
@section('content')
    <title>Thêm bài viết</title>
    {!! Form::open(['route'=>'create','method'=>'POST',"class" => "form",'enctype'=>'multipart/form-data']) !!}
    <div class="form-group">

<h1>{!! Form::label('title','Thêm bài viết') !!}</h1>
        <p></p>
        {!! Form::label('title','Tiêu đề') !!}
        {!! Form::textarea('title', '', ['class' => 'form-control','placeholder'=>'Tiêu đề bài viết','rows'=>'1']) !!}

        </div>
    <p></p>
    {!! Form::label('body','Nội dung') !!}
    {!! Form::textarea('body', '', ['id'=>'summary-ckeditor','class' => 'form-control','placeholder'=>'Nội dung bài viết','rows'=>'15']) !!}
<div class='form-group'>
    {{Form::file('cover')}}
</div>
    {!! Form::label('drop','Thể loại') !!}

    {!! Form::select('cate', $cate, null, ['class' => 'form-control']) !!}
    <br>
    {!! Form::textarea('linkxem', '', ['class' => 'form-control','placeholder'=>'Embed Code ','rows'=>'1']) !!}
<br>
    {!! Form::textarea('linkdown', '', ['class' => 'form-control','placeholder'=>'Link download','rows'=>'1']) !!}
    <br>

    {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}
@endsection
