
@extends('layouts.app')
@section('content')



@section('head')
    <meta name="csrf_token" content="{{csrf_token()}}">
    <script src="{{asset('js/custom.js')}}"></script>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
     <script src="https://kit.fontawesome.com/acf7ad4302.js" crossorigin="anonymous"></script>
@show

@if(count($errors) > 0)
    @foreach($errors->all() as $error)
    <div class="alert alert-danger" {{$error}}>
    </div>
    @endforeach
@endif

@if(session('response'))
    <div class="alert alert-success">
{{session('response')}}
 </div>
@endif


<div class="py-4 container-fluid">
  <div id="sidebar" class="sidebar float-left">
  <center>@if(!empty($profile))
                 <img src="{{ $profile -> profilepic}}" class="avatar" alt="" >
                 @else
                 <img src="{{url('images/avatar.png')}}" class="avatar" alt="">
                @endif()
            </center>
    <h2> <center>{{Auth::user()->name}}</center></h2>
  
  <div class="items-container">
    <a href="/home">
      <h6 class="menu-item"><i class="fad fa-tachometer-slowest"></i>Home</h6>
    </a>
    <a href="/questioncategory">
      <h6 class="menu-item"><i class="fas fa-keyboard"></i>Question category</h6>
    <a href="#">
      <h6 class="menu-item"><i class="fas fa-keyboard"></i>Test</h6>
    </a>
    <a href="/results">
      <h6 class="menu-item"><i class="fad fa-poll"></i>Results</h6>
    </a>  
    <a href="/profile">
      <h6 class="menu-item"><i class="fas fa-user-edit"></i>EditProfile</h6>
    </a>
    <a href="/indexx">
      <h6 class="menu-item">Logout</h6>
    </a>
  </div>
  </div>
  <div class="content float-right">

  </div>





 <div id="main" class="row">
        <!-- sidebar content -->
        <div id="sidebar" class="col-md-4">    
        </div>

        <!-- main content -->
        <div id="content" class="col-md-8">
            @yield('content')
        </div>
    </div>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Questions</div>

                           <ul class="list-group">
                            <li class="list-group-item list-group-item-success"><a href="/seeallMultiple">Multiple Choice</a></li><br><br>

                                <li class="list-group-item list-group-item-success"><a href="/seealltorf">True or False </a></li><br><br>

                                 <li class="list-group-item list-group-item-success"><a href="/seealltextq">Text Question</a></li>
                                  </ul>
@endsection


{{--@include('layouts.footer')--}}