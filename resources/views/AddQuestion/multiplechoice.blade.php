
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
                <div class="card-header">Multiple Choice</div>

                
    <form method="POST" action="{{ url('/addmultiplechoice') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="question" class="col-md-4 col-form-label text-md-right">{{ __('question') }}</label>

                            <div class="col-md-6">
                                <textarea id="question" type="text" class="form-control @error('question') is-invalid @enderror" name="question" value="{{ old('question') }}" required autocomplete="question" autofocus> </textarea>

                                @error('question')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="option_a" class="col-md-4 col-form-label text-md-right">{{ __('option A') }}</label>

                            <div class="col-md-6">
                                <input id="option_a" type="text" class="form-control @error('option_a') is-invalid @enderror" name="option_a" value="{{ old('option_a') }}" required autocomplete="option_a" autofocus>

                                @error('option_a')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="option_b" class="col-md-4 col-form-label text-md-right">{{ __('option B') }}</label>

                            <div class="col-md-6">
                                <input id="option_b" type="text" class="form-control @error('option_b') is-invalid @enderror" name="option_b" value="{{ old('option_b') }}" required autocomplete="option_a" autofocus>

                                @error('option_b')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="option_c" class="col-md-4 col-form-label text-md-right">{{ __('option C') }}</label>

                            <div class="col-md-6">
                                <input id="option_c" type="text" class="form-control @error('option_c') is-invalid @enderror" name="option_c" value="{{ old('option_c') }}" required autocomplete="option_a" autofocus>

                                @error('option_c')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                         <div class="form-group row">
                            <label for="option_d" class="col-md-4 col-form-label text-md-right">{{ __('option D') }}</label>

                            <div class="col-md-6">
                                <input id="option_d" type="text" class="form-control @error('option_d') is-invalid @enderror" name="option_d" value="{{ old('option_d') }}" required autocomplete="option_d" autofocus>

                                @error('option_d')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="select" class="col-md-4 col-form-label text-md-right">{{ __('Correct Option') }}</label>

                             <div class="col-md-6">
                            <select type="correctoption"  name="correctoption" class="" name="options">
                            <option name="A" value="A">A</option>
                            <option name="B" value="B">B</option>
                            <option name="C" value="C">C</option>
                            <option name="D"value="D">D</option>
                        </select>
                    </div>
                        </div>

                         <div class="form-group row">
                            <label for="select" class="col-md-4 col-form-label text-md-right">{{ __('Category under') }}</label>

                             <div class="col-md-6">
                            <select id="category" type="category" class="" name="category">
                @if(count($categories)>0)
                  @foreach($categories->all() as $category)
                    <option value="{{$category->category}}">{{$category->category}}</option>          
                  @endforeach
                @endif
                        </select>
                    </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary btn-lg">
                                    {{ __('Add Question') }}
                                </button>

                               
                            </div>
                        </div>
                    </form>
                  

  
@endsection


{{--@include('layouts.footer')--}}