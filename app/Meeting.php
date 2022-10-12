<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Meeting extends Model
{
    protected $fillable=[
        'room_id','user_id','client_name','company_name','date','start_time','end_time','description'
    ];
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function room(){
        return $this->belongsTo(Room::class,'room_id');
    }
}
