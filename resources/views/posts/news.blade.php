
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Demo Tin Tức</title>

    <!-- Styles -->
    <link href="{{ asset('public/css/all.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    @include('inc.navbar')
    <div class="container">
        @include('inc.message')
        <title>Demo Phim</title>

        @if (count($posts)>0)
           <div class="table">

                @foreach(App\Post::with('childs')->where('cate_id',0)->get() as $item)
                   <ul>
                       <div class="item film_item ">
                           <div class="film_item_inner">
                               <a href="posts/{{$post->id}}" class="">
                                   <span class="overlay"></span>
                                   <noscript><img class="thumb lazyload img-responsive" src="public/storage/cover/{{$post->cover}}" alt="{{$post->title}}" />
                                   </noscript>
                                   <img src="public/storage/cover/{{$post->cover}}" data-src="public/storage/cover/{{$post->cover}}" class="lazyload thumb img-responsive" alt="{{$post->title}}">
                               </a>
                               <div class="mode">


                                   <span class="y-q4-2018 year"><span>{{$post->created_at}}</span></span>
                               </div>
                               <div class="data">
                                   <h3 class="title"><a href="posts/{{$post->id}}" title="{{$post->title}}">{{$post->title}}</a></h3>
                               </div>
                               <div class="f-description hidden">
                                   <div class="noidung">
                                       <h3 class="tooltip_title">{{$post->title}}</h3>

                                   </div>
                               </div>
                           </div>
                       </div>
                   </ul>
                @endforeach
            </div>
        @else
            <p>No post found</p>
        @endif
    </div>
</div>

<!-- Scripts -->
<script src="{{ asset('/public/js/app.js') }}"></script>
<script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace( 'summary-ckeditor' );
</script>
</body>
</html>



