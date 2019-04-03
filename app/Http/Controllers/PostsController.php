<?php

namespace App\Http\Controllers;


use App\Attend;
use App\Post;
use App\Categories;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\Types\Integer;
use phpDocumentor\Reflection\Types\Mixed_;
use function Sodium\compare;

class Postscontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
//      public function __construct()
//{
//    $this->middleware('auth',['except'=>['index','show']]);
//
//}
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $id)
    {

//        $posts = Post::where('cate_id',$id)->orderBy('created_at','desc')->paginate(10);
//        $cate=Categories::where('id',$id)->get();
//        dd($cate);
        return view('posts.index',compact('posts','cate'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\R   esponse
     */
    public function create()
    {
        $cate = Categories::pluck('name', 'id');
        return view('posts.create')->with('cate',$cate);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'title'=>'required',
        'body'=>'required',
            'cover'=>'image|nullable|max:1999'

        ]);

        if ($request->hasFile('cover')){
            $filenameex=$request->file('cover')->getClientOriginalName();
            $filename=pathinfo($filenameex,PATHINFO_FILENAME);
            $extension=$request->file ('cover')->guessClientExtension();
            $fileNameToStore = time().'.'.$extension;
            $path=$request->file('cover')->storeAs('cover/',$fileNameToStore);
    }else{
            $fileNameToStore='noimage.jpg';
        }
        $post= new Post;

        $post->title=$request->input('title');
        $post->body=$request->input('body');
        $post->cover=$fileNameToStore;
$post->cate_id=$request->input('cate');
        $post->linkxem=$request->input('linkxem');
        $post->linkdow=$request->input('linkdown');
        $post->save();
        return redirect('/')->with('success','Đã đăng');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($cate_id,$nouse,$id)
    {

        $posts=Post::find($id);
        $cate=Categories::find($cate_id);
        return view('posts.show',compact('posts','cate'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)

    {
        $cate = Categories::pluck('name', 'id');

        $posts=Post::find($id);
        return view('posts.edit')->with('posts',$posts)->with('cate',$cate);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $file=$request->file('cover');
$this->validate($request,[
            'title'=>'required',
            'body'=>'required',
            'cover'=>'image|nullable|max:1999'

        ]);
        if ($request->hasFile('cover')){
            $filenameex=$request->file('cover')->getClientOriginalName();

            $filename=pathinfo($filenameex,PATHINFO_FILENAME);
            $extension=$request->file ('cover')->guessClientExtension();

            $fileNameToStore = time().'.'.$extension;

            $path=$request->file('cover')->storeAs('cover',$fileNameToStore);
        }else{
            $fileNameToStore='noimage.jpg';
        }
        $posts= Post::find($id);

        $posts->title=$request->input('title');
        $posts->body=$request->input('body');
        $posts->cate_id=$request->input('cate');

        $posts->linkxem=$request->input('linkxem');
        $posts->linkdow=$request->input('linkdown');



        if($request->hasFile('cover')){
    if($posts->cover!='noimage.jpg'){
    }
    $posts->cover=$fileNameToStore;

}



        $posts->save();
        return redirect('/')->with('posts','Đã Sửa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posts=Post::find($id);


        $posts->delete();

       Return redirect('/dashboard')->with('success','Đã Xóa');


    }
    public function multipledel(Request $request){

        $deli = $request->input('productsfordel');
        $posts = Post::whereIn('id', $deli);
        $posts->delete();
        return redirect('/dashboard')->with('success', 'Đã Xóa');
    }
    public function categories(){
        $posts = Post::all();
        return view('posts.index2')->with('posts',$posts);

    }
    /**
     * @param Request $request
     */
    public function news($id)
    {

        $posts = Post::where('cate_id',$id)->orderBy('created_at','desc')->paginate(10);
//              $cate=Categories::where('id',$id)->get();
        $cate=Categories::find($id);

        return view('posts.index',compact('posts','cate'));


    }
    public function api(Request $request)

    {

$a=array($request->param);
$user=explode(' ',$request->param);

        $b = ['thu2','thu3','thu4','thu5','thu6','thu7'];

$tz='Asia/Ho_Chi_Minh';

        $data=explode(',',$a[0]);

$time=Carbon::now($tz);
        $start = Carbon::createFromTime(7, 00, 00,$tz );
        $end = Carbon::createFromTime(12, 10, 00,$tz );


        $aten=new Attend;
$day=$time->format('Y-m-d');
$t="2018-12-26";
echo $time."\n";



if ($time->between($start,$end)==true  ){
    $atens = Attend::where('day',$day)->get();
    if(  count($atens)<=0) {
        echo 'điểm danh thành công';
        $aten->day = $day;
        $aten->status = true;
        $aten->save();
    }else{

        echo 'đã điểm danh rồi';
    }


}else{

    echo 'Đã quá thời gian điểm danh';
  //  echo $user[sizeof($user) - 1] . " có mặt nè";

}

    }
}
