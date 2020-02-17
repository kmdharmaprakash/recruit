
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
                <div class="card-header">Edit Profile</div>

                
 <form method="POST" action="{{ url('/editprofile') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('email') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lastname" class="col-md-4 col-form-label text-md-right">{{ __('lastname') }}</label>

                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus>

                                @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


  <div class="form-group row">
                            <label for="designation" class="col-md-4 col-form-label text-md-right">{{ __('designation') }}</label>

                            <div class="col-md-6">
                                <input id="designation" type="text" class="form-control @error('designation') is-invalid @enderror" name="designation" value="{{ old('designation') }}" required autocomplete="designation" autofocus>

                                @error('designation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


  <div class="form-group row">
                            <label for="companyname" class="col-md-4 col-form-label text-md-right">{{ __('companyname') }}</label>

                            <div class="col-md-6">
                                <input id="companyname" type="text" class="form-control @error('companyname') is-invalid @enderror" name="companyname" value="{{ old('companyname') }}" required autocomplete="companyname" autofocus>

                                @error('companyname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="profilepic" class="col-md-4 col-form-label text-md-right">{{ __('choose profile pic') }}</label>

                            <div class="col-md-6">
                                <input id="profilepic" type="file" class="form-control @error('profilepic') is-invalid @enderror" name="profilepic" value="{{ old('profilepic') }}" required autocomplete="profilepic" autofocus>

                                @error('profilepic')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                      

                      

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    {{ __('Save Changes') }}
                                </button>

                               
                            </div>
                        </div>
                    </form>


@endsection


{{--@include('layouts.footer')--}}