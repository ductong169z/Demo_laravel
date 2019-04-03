@extends('layouts.app')

@section('content')
    @include('inc.sidebar')

    <div class="container">

        <div class="row">

            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Categories</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <a href="/blog/posts/create" class="btn btn-primary">Thêm thể loại mới</a>
                        @if(count($cate)>0)






                            <table>

                                <td>
                                </td>
                                <div class="container">
                                    <h2>Thể loại</h2>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                            <tr>

                                                <th>Tên</th>
                                                <th></th>
                                                <th></th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($cate as $ca)
                                                <tr>

                                                    <td>{!! $ca->name !!}</td>
                                                  {{--  <td><a href="posts/{{$post->id}}/edit"
                                                           class="btn btn-default">Sửa</a></td>
                                                    <td> {!! Form::open(['url'=>['/del',$post->id],'method'=>'POST',"class" => "pull-right"]) !!}
                                                        {!! Form::submit('Xóa bài Viết', ['class' => 'btn btn-danger']) !!}

                                                        {!! Form::close() !!}</td>
--}}
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </table>
                        @else
                            <p>Chưa có bài viết nào !</p>
                        @endif


                    </div>

                </div>
            </div>
        </div>
    </div>
    <script>

    </script>
@endsection
