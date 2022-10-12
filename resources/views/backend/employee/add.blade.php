<?php

use App\User;

$users = User::where('type', 'employee')->orderBy('id', 'desc')->get();
?>
@extends('backend.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header h5">{{ __('All Employees') }}</div>

            <div class="card-body">
                <a class="btn btn-dark" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i></a>
                <!-- add-modal -->
                <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog  modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-dark text-white">
                                <h5 class="modal-title" id="exampleModalLabel">Add Employee</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="card">

                                    <div class="card-body">
                                        <form method="POST" action="{{route('store.employee')}}">
                                            @csrf
                                            <div class="form-group row">
                                                <label for="department" class="col-md-4 col-form-label text-md-right">{{ __('Department') }}</label>

                                                <div class="col-md-6">
                                                    <input id="department" type="text" class="form-control @error('department') is-invalid @enderror" name="department" value="{{ old('department') }}" required autocomplete="name" autofocus>

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
                                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                                    @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                                <div class="col-md-6">
                                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password">

                                                    @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>


                                            <div class="form-group row mb-0">
                                                <div class="col-md-6 offset-md-4">
                                                    <button type="submit" class="btn btn-dark">
                                                        {{ __('Register') }}
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- endadd-modal -->
                <div class="col-sm-12">
                    <div class="white-box">
                        <div class="table-responsive">
                            <table class="table text-nowrap table table-striped table-bordered" id="myTable">
                                <thead>
                                    <tr>
                                        <th class="border-top-0">#</th>
                                        <th class="border-top-0">Created Date</th>
                                        <th class="border-top-0">Department</th>
                                        <th class="border-top-0">Name</th>
                                        <th class="border-top-0">Email</th>
                                        <th class="border-top-0">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    ?>
                                    @foreach($users as $user)
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>{{ date('d F Y', strtotime($user->created_at))}}</td>
                                        <td>{{$user->department}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>
                                            <a href="" class="m-1 btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModalCenter{{$user->id}}"><i class="fa fa-trash"></i></a>
                                            <a href="" class="m-1 btn btn-sm btn-success" data-toggle="modal" data-target="#exampleModa{{$user->id}}"><i class="fa fa-edit"></i></a>
                                        </td>
                                        <!-- delete model -->
                                        <div class="modal fade" id="exampleModalCenter{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h2 class="modal-title" id="exampleModalLongTitle">Are you Sure for the Delete?</h2>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="col-md-12">
                                                            <form action="{{route('delete.employee',$user->id)}}" method="post">
                                                                @csrf
                                                                @method('delete')
                                                                <button type="submit" class="btn btn-danger">Delete</button>

                                                            </form>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <!--end delete model -->

                                        <!-- edit model -->
                                        <div class="modal fade" id="exampleModa{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Update Employee</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="card">

                                                            <div class="card-body">
                                                                <form method="POST" action="{{route('update.profile.employee',$user->id)}}">
                                                                    @csrf
                                                                    @method('patch')
                                                                    <div class="form-group row">
                                                                        <label for="department" class="col-md-4 col-form-label text-md-right">{{ __('Department') }}</label>

                                                                        <div class="col-md-6">
                                                                            <input id="department" type="text" class="form-control @error('department') is-invalid @enderror" name="department" value="{{$user->department}}" required autocomplete="name" autofocus>

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
                                                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$user->name}}" required autocomplete="name" autofocus>

                                                                            @error('name')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                            @enderror
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group row">
                                                                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                                                        <div class="col-md-6">
                                                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$user->email}}" required autocomplete="email">

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
                                                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" value="{{null}}" name="password">

                                                                            @error('password')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                            @enderror
                                                                        </div>
                                                                    </div>


                                                                    <div class="form-group row mb-0">
                                                                        <div class="col-md-6 offset-md-4">
                                                                            <button type="submit" class="btn btn-dark">
                                                                                {{ __('Update') }}
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- end edit model -->
                                    </tr>
                                    <?php
                                    $i = $i + 1;
                                    ?>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection