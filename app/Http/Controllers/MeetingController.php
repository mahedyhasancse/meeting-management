<?php

namespace App\Http\Controllers;

use App\Meeting;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class MeetingController extends Controller
{
    public function index()
    {
        return view('backend.meeting.add');
    }
    public function store(Request $request)
    {



        $check = date('H:i', strtotime($request->start_time));
        $check2 = date('H:i', strtotime($request->end_time));
        $checkdate = date('Y-m-d', strtotime($request->date));
        // if (Meeting::where('date', '=', $checkdate)->whereHas('room', function ($query) use ($request) {
        //     $query->where('id', '=', $request->room_id);
        // })->exists() && Meeting::whereBetween('start_time', [$check, $check2])->orwhereBetween('end_time', [$check, $check2])->exists()) 
        if (Meeting::where('date', '=', $checkdate)->whereHas('room', function ($query) use ($request) {
            $query->where('id', '=', $request->room_id);
        })->where('start_time', '<=', $check2)->where('end_time', '>=', $check)->first() )
        {
            toastr()->warning('Room not available. Try Again later! ');
        } 
        
        else {
            $this->validate($request, [
                'room_id' => 'required',
                'client_name' => 'required',
                'company_name' => 'required',
                'date' => 'required',
                'start_time' => 'required',
                'end_time' => 'required',
                'description' => 'required',
            ]);
            Meeting::create([
                'user_id' => auth()->user()->id,
                'room_id' => $request->room_id,
                'client_name' => $request->client_name,
                'company_name' => $request->company_name,
                'date' => $checkdate,
                'start_time' =>$check,
                'end_time' => $check2,
                'description' => $request->description,
            ]);
            toastr()->success('Meeting add');
        }
        return redirect()->back();
    }

    public function ownMeetingDelete(Meeting $meeting)
    {
        $meeting->delete();
        toastr()->success('Meeting Delete');
        return redirect()->back();
    }

    public function update(Request $request, Meeting $meeting)
    {
        $check = date('H:i:s', strtotime($request->start_time));
        $check2 = date('H:i:s', strtotime($request->end_time));
        $checkdate = date('Y-m-d', strtotime($request->date));
        
        if ($checkdate == $meeting->date &&  $request->room_id== $meeting->room->id &&  $check==$meeting->start_time &&  $check2==$meeting->end_time) {
            $this->validate($request, [
                'room_id' => 'required',
                'client_name' => 'required',
                'company_name' => 'required',
                'date' => 'required',
                'start_time' => 'required',
                'end_time' => 'required',
                'description' => 'required',
            ]);
            $meeting->update([
                'user_id' => auth()->user()->id,
                'room_id' => $request->room_id,
                'client_name' => $request->client_name,
                'company_name' => $request->company_name,
                'date' => $request->date,
                'start_time' => $request->start_time,
                'end_time' => $request->end_time,
                'description' => $request->description,
            ]);
            toastr()->success('Meeting Updated');
        } 
        
        else {
            if (Meeting::where('date', '=', $checkdate)->whereHas('room', function ($query) use ($request) {
                $query->where('id', '=', $request->room_id);
            })->where('start_time', '<=', $check2)->where('end_time', '>=', $check)->first() ) {
                toastr()->warning('Room not available. Try Again later! ');
            } else {
                $this->validate($request, [
                    'room_id' => 'required',
                    'client_name' => 'required',
                    'company_name' => 'required',
                    'date' => 'required',
                    'start_time' => 'required',
                    'end_time' => 'required',
                    'description' => 'required',
                ]);
                $meeting->update([
                    'user_id' => auth()->user()->id,
                    'room_id' => $request->room_id,
                    'client_name' => $request->client_name,
                    'company_name' => $request->company_name,
                    'date' => $request->date,
                    'start_time' => $request->start_time,
                    'end_time' => $request->end_time,
                    'description' => $request->description,
                ]);
                toastr()->success('Meeting Updated');
            }
        }
        return redirect()->back();
    }
    public function adminmeetingDelete(Meeting $meeting){
       $meeting->delete();
       toastr()->success('Deleted');
       return redirect()->back();


    }
}
