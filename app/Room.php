<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable=[
        'room_name'
    ];
    public function rooms(){
        return $this->hasMany(Meeting::class,'room_id');
       }
}
