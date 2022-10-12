<?php

use App\Meeting;

$meetings = Meeting::orderBy('id', 'desc')->get();
?>
@extends('backend.app')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if(auth()->user()->type=="employee")
            <div class="col-md-12 text-center">
                <h2>You are login as {{auth()->user()->name}}</h2>
                <div class="card p-4">
                <span>For the add Meeting <a href="{{route('add.meeting')}}"> Click Here</a></span>
                </div>
            </div>

            @elseif(auth()->user()->type=="admin")
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('All Meetings') }}</div>

                    <div class="card-body">
                        <div class="col-lg-12">
                            <div class="white-box">
                                <div class="table-responsive">
                                    <table class="table text-nowrap table table-striped table-bordered" id="myTable">
                                        <thead>
                                            <tr>
                                                <th class="border-top-0">#</th>
                                                <th class="border-top-0">Clients Name</th>
                                                <th class="border-top-0">Employee Name</th>
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
                                                <td>{{$meeting->user->name}}</td>
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
                                                    <a href="" class="m-1 btn btn-sm btn-danger" data-toggle="modal" data-target="#exampleModalLong{{$meeting->id}}"><i class="fa fa-trash"></i></a>
                                                
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
                                                                    <form action="{{route('admin.delete.meeting',$meeting->id)}}" method="post">
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
            @endif

        </div>
    </div>
</div>
@endsection