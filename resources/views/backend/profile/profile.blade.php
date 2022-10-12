@extends('backend.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header h4">{{ __('Your Profile') }}</div>

                <div class="card-body justify-content-center">
                    <div class="row ">
                        <h3><strong>Department:</strong> {{auth()->user()->department}}</h3>
                        <h4><strong>Name:</strong> {{auth()->user()->name}}</h4>
                        <h5><strong>E-Mail:</strong> {{auth()->user()->email}}</h5>
                    </div>
                    <a class="btn btn-dark" data-toggle="modal" data-target="#exampleModal{{auth()->user()->id}}">Edit Information</a>
                    <div class="modal fade" id="exampleModal{{auth()->user()->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Update Profile</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body text-center">
                                    <div class="col-md-12">
                                        <form action="{{route('update.profile',auth()->user()->id)}}" method="POST">
                                            @csrf
                                            @method('patch')
                                            <div class="form-group row">
                                                <label for="department" class="col-md-4 col-form-label text-md-right">{{ __('Department') }}</label>

                                                <div class="col-md-6">
                                                    <input id="department" type="text" class="form-control @error('department') is-invalid @enderror" name="department" value="{{auth()->user()->department}}" required >

                                                    @error('department')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                                <div class="col-md-6">
                                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{auth()->user()->name}}" required autocomplete="name" autofocus>

                                                    @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail ') }}</label>

                                                <div class="col-md-6">
                                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{auth()->user()->email}}" required autocomplete="email">

                                                    @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                                <div class="col-md-6">
                                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{null}}"> 

                                                    @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <button type="submit" class="btn btn-dark">Update</button>
                                            </div>

                                    </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- edit -->

                <!-- endedit -->

            </div>
        </div>
    </div>
</div>
@endsection