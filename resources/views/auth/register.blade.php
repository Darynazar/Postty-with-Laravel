@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-5">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="col-md-12 d-flex p-5">
            <div class="container">
                <form action="{{ route('register.store') }}",  method="post">
                    @csrf
                    <div class="row">
                        <div class="col-4 offset-4">
                            <div class="row" style="text-align: center;">
                                <h1>Register</h1>
                            </div>
                            <div class="form-group">
                                <label for="name" class="col-md-4 col-form-label">Name</label>
                                <div class="col-md-12">
                                    <input id="name" type="text"
                                        class="form-control 
                                        @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name') }}" 
                                        autocomplete="name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-md-4 col-form-label">Email</label>
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
                                <label for="username" class="col-md-4 col-form-label">Username</label>
                                <div class="col-md-12">
                                    <input id="username" type="text"
                                        class="form-control 
                                        @error('username') is-invalid @enderror"
                                        name="username" value="{{ old('username') }}" 
                                        autocomplete="username" autofocus>
                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password" class="col-md-4 col-form-label">Pssword</label>
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
                            <div class="form-group">
                                <label for="password_confrimation" class="col-md-4 col-form-label">Confrim Password</label>
                                <div class="col-md-12">
                                    <input id="password_confrimation" type="password"
                                        class="form-control 
                                        @error('password_confrimation') is-invalid @enderror"
                                        name="password_confrimation" value="{{ old('password_confrimation') }}" 
                                        autocomplete="password_confrimation" autofocus>
                                    @error('password_confrimation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
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
    </div>
</div>
   
@endsection

