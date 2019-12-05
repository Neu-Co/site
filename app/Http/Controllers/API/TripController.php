<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Trip;
use Illuminate\Http\Request;
use Validator;

class TripController extends Controller
{
    public $successStatus = 200;

    /**
     * Create a trip
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->json()->all(), [
            'departure' => 'required',
            'arrival' => 'required',
            'date' => 'required',
            'price' => 'required',
            'remaining_seats' => 'required',
            'driver_id' => 'required',
            'car_id' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        $input = $request->json()->all();
        $trip = Trip::create($input);
        return response()->json(['success' => $trip], $this->successStatus);
    }

    /**
     * trip collection api
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllTrips()
    {
        $trips = Trip::all();
        return response()->json(['trips' => $trips], $this->successStatus);
    }
}