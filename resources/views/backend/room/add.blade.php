<?php

use App\Room;

$rooms = Room::orderBy('id', 'desc')->get();
?>
@extends('backend.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header h5">{{ __('All Room') }}</div>

            <div class="card-body">
                <a class="btn btn-dark" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i></a>
                <!-- add-modal -->
                <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog  modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-dark text-white">
                                <h5 class="modal-title" id="exampleModalLabel">Add Rooms</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="card">

                                    <div class="card-body">
                                        <form method="POST" action="{{route('store.room')}}">
                                            @csrf
                                            <div class="form-group row">
                                                <label for="room_name" class="col-md-4 col-form-label text-md-right">{{ __('Room name') }}</label>

                                                <div class="col-md-6">
                                                    <input id="room_name" type="text" class="form-control @error('room_name') is-invalid @enderror" name="room_name" value="{{ old('room_name') }}" required autocomplete="name" autofocus>

                                                    @error('room_name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                            </div>



                                            <div class="form-group row mb-0">
                                                <div class="col-md-6 offset-md-4">
                                                    <button type="submit" class="btn btn-dark">
                                                        {{ __('Store Room') }}
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
                                        <th class="border-top-0">Room Name</th>

                                        <th class="border-top-0">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    ?>
                                    @foreach($rooms as $room)
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>{{$room->room_name}}</td>
                                        <td>
                                            <a href="" class="btn btn-danger btn-sm m-1" data-toggle="modal" data-target="#exampleModalCenter{{$room->id}}"><i class="fa fa-trash "></i></a>
                                            <a href="" class="btn btn-success btn-sm m-1" data-toggle="modal" data-target="#exampleModa{{$room->id}}"><i class="fa fa-edit "></i></a>
                                        </td>
                                        <!-- Delete model  -->
                                        <div class="modal fade" id="exampleModalCenter{{$room->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                                            <form action="{{route('delete.room',$room->id)}}" method="post">
                                                                @csrf
                                                                @method('delete')
                                                                <button type="submit" class="btn btn-danger">Delete</button>

                                                            </form>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <!-- Delete model  -->
                                              <!-- edit-model  -->
                <div class="modal fade" id="exampleModa{{$room->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Update Room</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="card">

                                    <div class="card-body">
                                        <form method="POST" action="{{route('update.room',$room->id)}}">
                                            @csrf
                                            @method('patch')
                                            <div class="form-group row">
                                                <label for="room_name" class="col-md-4 col-form-label text-md-right">{{ __('Room Name') }}</label>

                                                <div class="col-md-6">
                                                    <input id="room_name" type="text" class="form-control @error('room_name') is-invalid @enderror" name="room_name" value="{{$room->room_name}}" required autocomplete="name" autofocus>

                                                    @error('room_name')
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
                <!-- end edit-model  -->
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