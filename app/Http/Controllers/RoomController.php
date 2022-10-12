<?php

namespace App\Http\Controllers;

use App\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
   public function index(){
    return view('backend.room.add');
   }
   public function storeRoom(Request $request){
        Room::create([
            'room_name'=>$request->room_name
        ]);
        toastr()->success('Room Added');

        return redirect()->back();
   }
   public function delete(Room $room){
       $room->delete();
       toastr()->success('Deleted');

       return redirect()->back();
   }
   public function update(Request $request, Room $room){
     $room->update($request->all());
     toastr()->success('Updated');
     return redirect()->back();

   }
}
