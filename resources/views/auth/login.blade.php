@extends('layouts.app')

@section('content')
<div class="flex justify-center" style="text-align: center;">
  <div class="w-8/12" style="width: 8/12;">
    @if(session('status'))
       <div style="background-color: red; padding:4px; color:white; text-align:center;"> 
       {{ session('status') }}
       </div>
    @endif


    <form action="{{ route('login.store') }}",  method="post">
        @csrf
        <div class="row">
            <div class="col-4 offset-4">
                <div class="row" style="text-align: center;">
                    <h1>Login</h1>
                </div>
                <div class="form-group">
                    <label for="email" class="col-md-2  col-form-label">Email</label>
                    <div class="col-md-12">
                        <input id="email" type="email"
                            class="form-control 
                            @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" 
                            autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div> 
                <div class="form-group">
                    <label for="password" class="col-md-2 col-form-label">Pssword</label>
                    <div class="col-md-12">
                        <input id="password" type="password"
                            class="form-control 
                            @error('password') is-invalid @enderror"
                            name="password" value="{{ old('password') }}" 
                            autocomplete="password" autofocus>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <br>

                <div class="row col-md-5 offset-2 mt-3">
                    <div>
                        <input type="checkbox" name="remember" id="remember">
                        <label form="remember">Remember me</label>
                    </div>
                 </div>
                <div class="row col-md-12 offset-8 p-4 m-1">
                    <button class="btn btn-primary">Submit</button>
                </div>
                
            </div>
            
        </div>
    </form>

  </div>

</div>
@endsection