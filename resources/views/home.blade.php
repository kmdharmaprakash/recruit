@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
@section('head')
    <meta name="csrf_token" content="{{csrf_token()}}">
    <script src="{{asset('js/custom.js')}}"></script>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    {{--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">--}}
     <script src="https://kit.fontawesome.com/acf7ad4302.js" crossorigin="anonymous"></script>
@show


<div class="py-4 container-fluid">
  <div id="sidebar" class="sidebar float-left">
  <center>  @if(!empty($profile))
                 <img src="{{ $profile -> profilepic}}" class="avatar" alt="" >
                 @else
                 <img src="{{url('images/avatar.png')}}" class="avatar" alt="">
                @endif()  </center>
    <h2> <center>{{Auth::user()->name}}</center></h2>
  
  <div class="items-container">
    <a href="/home">
      <h6 class="menu-item"><i class="fad fa-tachometer-slowest"></i>Home</h6>
    </a>
    <a href="/questioncategory">
      <h6 class="menu-item"><i class="fas fa-keyboard"></i>Question category</h6>
    </a>
    <a href="#">
      <h6 class="menu-item"><i class="fas fa-keyboard"></i>Test</h6>
    </a>
    <a href="/results">
      <h6 class="menu-item"><i class="fad fa-poll"></i>Results</h6>
    </a>  
    <a href="/profile">
      <h6 class="menu-item"><i class="fas fa-user-edit"></i>EditProfile</h6>
    </a>
    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                       {{-- {{ __('Logout') }}>--}}
      
     <h6 class="menu-item">Logout</h6>
    </a>
   
  </div>
  </div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboards</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                @if(!empty($profile))
                 <img src="{{ $profile -> profilepic}}" class="avatar" alt="" ><br><br>
                 @else
                 <img src="{{url('images/Avatar.png')}}" class="avatar" alt=""><br><br>
                @endif()

                 @if(!empty($profile))
                <label class="label-dash">Name:</label><p class="lead">{{ $profile -> name}}</p>
                 @else
                Name:<p></p>
                @endif()


                 @if(!empty($profile))
                 <label  class="label-dash">Designation:</label><p class="lead">{{ $profile -> designation}}</p>
                 @else
                <p></p>
                @endif()

                @if(!empty($profile))
               <label class="label-dash">Companyname:</label><p class="lead">{{ $profile -> companyname}}</p>
                 @else
                <p></p>
                @endif()
        
                <div class="col-md-4">
                   
                 </div>
   
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    Welcome {{Auth::user()->name}}<br>

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
