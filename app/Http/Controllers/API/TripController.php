<?php
namespace App\Http\Controllers\API;

use App\Trip;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
        $validator = Validator::make($request->all(), [
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
        $input = $request->all();
        $trip = Trip::create($input);
        return response()->json(['success' => $trip], $this->successStatus);
    }
}
