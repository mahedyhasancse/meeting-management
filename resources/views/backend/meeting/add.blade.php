<?php

use App\Meeting;

$meetings = Meeting::where('user_id', auth()->user()->id)->orderBy('id', 'desc')->get();
?>
@extends('backend.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header h5">{{ __('Your Meetings') }}</div>

            <div class="card-body">
                <a class="btn btn-dark" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i></a>
                <!-- add-modal -->
                <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog  modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-dark text-white">
                                <h5 class="modal-title" id="exampleModalLabel">Add a meeting</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="card">

                                    <div class="card-body">
                                        <form method="POST" action="{{route('store.meeting')}}">
                                            @csrf
                                            <div class="form-group row">
                                                <label for="client_name" class="col-md-4 col-form-label text-md-right">{{ __('Clients Name') }}</label>

                                                <div class="col-md-6">
                                                    <input id="client_name" type="text" class="form-control @error('client_name') is-invalid @enderror" name="client_name" value="{{ old('client_name') }}" required autocomplete="name" autofocus>

                                                    @error('client_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="company_name" class="col-md-4 col-form-label text-md-right">{{ __('Company') }}</label>
                                                <div class="col-md-6">
                                                    <select name="company_name" id="" class="form-control @error('company_name') is-invalid @enderror">
                                                        <option value="">Choose One</option>
                                                        <option value="PEC">PEC</option>
                                                        <option value="Tamakan">Tamakan</option>
                                                        <option value="Sahwa">Sahwa</option>
                                                        <option value="4space">4space</option>
                                                    </select>

                                                    @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="room_id" class="col-md-4 col-form-label text-md-right">{{ __('Room') }}</label>
                                                <div class="col-md-6">
                                                    <select name="room_id" id="room_id" class="form-control @error('room_id') is-invalid @enderror">
                                                        <option value="">Choose One</option>
                                                        @foreach(\App\Room::all() as $room)
                                                        <option value="{{$room->id}}">{{$room->room_name}}</option>
                                                        @endforeach
                                                    </select>

                                                    @error('room_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('Date') }}</label>

                                                <div class="col-md-6">
                                                    <input id="date" type="date" class="form-control @error('date') is-invalid @enderror" name="date" value="{{ old('date') }}" required autocomplete="date">

                                                    @error('date')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('Start-End Time') }}</label>

                                                <div class="col-md-6">
                                                    <center>
                                                        <small>Meeting time max 3 hours</small>

                                                    </center>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <input id="start_time" type="time" class="form-control @error('start_time') is-invalid @enderror" name="start_time" value="{{ old('start_time') }}" required autocomplete="start_time">

                                                            @error('start_time')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input id="end_time" type="time" class="form-control @error('end_time') is-invalid @enderror" name="end_time" value="{{ old('end_time') }}" required autocomplete="end_time">

                                                            @error('end_time')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="client_name" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                                                <div class="col-md-6">
                                                    <textarea id="description" cols="30" rows="10" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required autocomplete="description" autofocus> </textarea>


                                                    @error('description')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row mb-0">
                                                <div class="col-md-6 offset-md-4">
                                                    <button type="submit" class="btn btn-dark">
                                                        {{ __('Add Meeting') }}
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
                                        <th class="border-top-0">Clients Name</th>
                                        <th class="border-top-0">Room</th>
                                        <th class="border-top-0">Company</th>
                                        <th class="border-top-0">Date</th>
                                        <th class="border-top-0">Start Time</th>
                                        <th class="border-top-0">End Time</th>
                                        <th class="border-top-0">Comment</th>
                                        <th class="border-top-0">Status</th>

                                        <th class="border-top-0">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    ?>
                                    @foreach($meetings as $meeting)
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>{{$meeting->client_name}}</td>
                                        <td>{{$meeting->room->room_name}}</td>
                                        <td>{{$meeting->company_name}}</td>
                                        <td>{{ date('d F Y', strtotime($meeting->date))}}</td>
                                        <td>{{date('h:i A', strtotime($meeting->start_time))}}</td>
                                        <td>{{date('h:i A', strtotime($meeting->end_time))}}</td>
                                        <td>{{$meeting->description}}</td>
                                        <td>
                                            <?php
                                            $currentDateTime = now()->format('H:i');
                                            $currentDate = now()->format('Y-m-d');
                                            $check1 = Meeting::where('id', '=', $meeting->id)->where('date', '<=', $currentDate)->where('end_time', '<', $currentDateTime)->exists();
                                            ?>
                                            <!-- $currentDate <= date('Y-m-d', strtotime($meeting->date)) && -->
                                            @if($check1)
                                            <p class="bg-danger text-white text-center">Expaired</p>
                                            @else
                                            <p class="bg-success text-white text-center">Incoming</p>
                                            @endif
                                        </td>
                                        <td>
                                            @if($check1)
                                            <a href="" class="m-1 btn btn-sm btn-success" data-toggle="modal" data-target="#exampleModalLon{{$meeting->id}}"><i class="fa fa-edit"></i></a>


                                            @else
                                            <a href="" class="m-1 btn btn-sm btn-success" data-toggle="modal" data-target="#exampleModalLon{{$meeting->id}}"><i class="fa fa-edit"></i></a>
                                            <a href="" class="m-1 btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModalLong{{$meeting->id}}"><i class="fa fa-trash"></i></a>
                                            @endif
                                        </td>
                                        <!-- delete model  -->
                                        <div class="modal fade" id="exampleModalLong{{$meeting->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h3 class="modal-title" id="exampleModalLongTitle">Are You Sure for Delete?</h3>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="col-md-12">
                                                            <form action="{{route('delete.meeting',$meeting->id)}}" method="post">
                                                                @csrf
                                                                @method('delete')
                                                                <button type="submit" class="btn btn-danger">Delete</button>
                                                            </form>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- end delete model  -->

                                        <!-- edit model  -->
                                        <div class="modal fade  bd-example-modal-lg" id="exampleModalLon{{$meeting->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Update Meeting</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form method="POST" action="{{route('update.meeting',$meeting->id)}}">
                                                            @csrf
                                                            @method('patch')
                                                            <div class="form-group row">
                                                                <label for="client_name" class="col-md-4 col-form-label text-md-right">{{ __('Clients Name') }}</label>

                                                                <div class="col-md-6">
                                                                    <input id="client_name" type="text" class="form-control @error('client_name') is-invalid @enderror" name="client_name" value="{{$meeting->client_name}}" required autocomplete="name" autofocus>

                                                                    @error('client_name')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="company_name" class="col-md-4 col-form-label text-md-right">{{ __('Company') }}</label>
                                                                <div class="col-md-6">
                                                                    <select name="company_name" id="company_name" class="form-control @error('company_name') is-invalid @enderror">
                                                                        <option value="">Choose One</option>
                                                                        <option value="PEC" {{$meeting->company_name=="PEC" ? 'selected' : ''}}>PEC</option>
                                                                        <option value="Tamakan" {{$meeting->company_name=="Tamakan" ? 'selected' : ''}}>Tamakan</option>
                                                                        <option value="Sahwa" {{$meeting->company_name=="Sahwa" ? 'selected' : ''}}>Sahwa</option>
                                                                        <option value="4space" {{$meeting->company_name=="4space" ? 'selected' : ''}}>4space</option>
                                                                    </select>

                                                                    @error('name')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label for="room_id" class="col-md-4 col-form-label text-md-right">{{ __('Room') }}</label>
                                                                <div class="col-md-6">
                                                                    <select name="room_id" id="room_id" class="form-control @error('room_id') is-invalid @enderror">
                                                                        <option value="">Choose One</option>
                                                                        @foreach(\App\Room::all() as $room)
                                                                        <option value="{{$room->id}}" {{$room->id == $meeting->room->id ? 'selected': ''}}>{{$room->room_name}}</option>
                                                                        @endforeach
                                                                    </select>

                                                                    @error('room_id')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('Date') }}</label>

                                                                <div class="col-md-6">
                                                                    <input id="date" type="date" class="form-control @error('date') is-invalid @enderror" name="date" value="{{$meeting->date }}" required autocomplete="date">

                                                                    @error('date')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('Start-End Time') }}</label>

                                                                <div class="col-md-6">
                                                                    <center>
                                                                        <small>Meeting time max 3 hours</small>

                                                                    </center>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <input id="start_time" type="time" class="form-control @error('start_time') is-invalid @enderror" name="start_time" value="{{$meeting->start_time }}" required autocomplete="start_time">

                                                                            @error('start_time')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                            @enderror
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <input id="end_time" type="time" class="form-control @error('end_time') is-invalid @enderror" name="end_time" value="{{$meeting->end_time }}" required autocomplete="end_time">

                                                                            @error('end_time')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label for="client_name" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                                                                <div class="col-md-6">
                                                                    <textarea id="description" cols="30" rows="10" class="form-control @error('description') is-invalid @enderror" name="description" value="{!!$meeting->description!!}" required autocomplete="description" autofocus>{!!$meeting->description!!} </textarea>


                                                                    @error('description')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="form-group row mb-0">
                                                                <div class="col-md-6 offset-md-4">
                                                                    <button type="submit" class="btn btn-dark">
                                                                        {{ __('Update Meeting') }}
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- end edit model  -->
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