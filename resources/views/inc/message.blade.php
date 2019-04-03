@if(count($errors)>0)
    @foreach($errors->all() as $error)
        <div class="alert-danger">
            {{$error}}
        </div>
        @endforeach
    @endif

@if(session('success'))
    <div class="alert-danger-success">
       <b> <span style="color:Green" >{{session('success')}}</span></b>
    </div>
    @endif
@if(session('error'))
    <div class="alert-danger-danger">
        <span style="background-color:Red" style="text-decoration-color: white"> {{session('error')}}</span>
    </div>
@endif