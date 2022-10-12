<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Meeting;
use Illuminate\Http\Request;

    /**
     * @OA\Get(
     *     path="/api/meetings",
     *     tags={"meetings"},
     *     summary="Get All Meetings Data",
     *     operationId="index",

     *     @OA\Response(
     *         response=200,
     *         description="successful operation",
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid status value"
     *     ),
  
     * )
     */
class HomeController extends Controller
{
    public function index(){
        $meetings=Meeting::orderBy('id','desc')->get();
        return response()->json([
            'data'=>$meetings,
            'message'=>"successfully reached!"
        ]);
    }
}
