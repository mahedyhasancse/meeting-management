<?php

use Carbon\Carbon;
use Carbon\CarbonPeriod;
use App\Meeting;

$now = Carbon::now();
$yesterday = Carbon::yesterday();
$tomorrow = Carbon::tomorrow();
$meetings = Meeting::whereBetween('date', [$yesterday, $tomorrow])->orderBy('id', 'desc')->get();
?>
@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="col-md-12 text-right">
        <a href="{{route('login')}}" class="btn btn-dark"><strong>MY Account</strong></a>
    </div>
    <div class="col-md-12 mt-4">
        <div class="card">
            <div class="card-header h4 text-center text-dark"><strong>{{ __('All Meetings') }}</strong></div>

            <div class="card-body">
                <div class="col-lg-12">
                    <div class="white-box">
                        <div class="table-responsive">
                            <table class="table text-nowrap table table-striped table-bordered;font-size:25px" id="myTable">
                                <thead class="bg-dark text-white p-2">
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

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    ?>
                                    @foreach($meetings as $meeting)
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td class="text-capitalize">{{$meeting->client_name}}</td>
                                        <td class="text-capitalize">{{$meeting->user->name}}</td>
                                        <td class="text-capitalize"><strong>{{$meeting->room->room_name}}</strong></td>
                                        <td class="text-capitalize">{{$meeting->company_name}}</td>
                                        <td>{{ date('d F Y', strtotime($meeting->date))}}</td>
                                        <td><strong>{{date('h:i A', strtotime($meeting->start_time))}}</strong></td>
                                        <td><strong>{{date('h:i A', strtotime($meeting->end_time))}}</strong></td>
                                        <td class="text-capitalize">{{$meeting->description}}</td>
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
    <div class="col-md-12">
        <div class="card p-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 ">
                        <div class="col-md-12">
                            <div class="text-center">
                                <p class="h4 p-2"><strong>PEC</strong></p>
                                <a href="https://pec.com.sa/">pec.com.sa</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 ">
                        <div class="col-md-12">
                            <div class="text-center">
                                <p class="h4 p-2"><strong>Tamakan</strong></p>
                                <a href="https://tamakan.com.sa/">tamakan.com.sa</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="col-md-12">
                            <div class="text-center">
                                <p class="h4 p-2"><strong>Sahwa</strong></p>
                                <a href="https://sahwalaws.com/">sahwalaws.com.sa</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="col-md-12">
                            <div class="text-center">
                                <p class="h4 p-2"><strong>4Space</strong></p>
                                <a href="/">Up-Coming</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection