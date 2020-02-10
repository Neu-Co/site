<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Trip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;
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
    public function findTrips(Request $request)
    {
        $departure = $request->json('departure');
        $arrival = $request->json('arrival');
        $date = $request->json('date');
        $time = $request->json('time');

        $trips = DB::table('trips');

        if (isset($departure)) {
            $trips->where('departure', $departure);
        }
        if (isset($arrival)) {
            $trips->where('arrival', $arrival);
        }
        if (isset($date)) {
            $trips->whereDate('date', $date);
        }
        if (isset($time)) {
            $trips->whereTime('date', $time);
        }

        $trips->join('users', 'users.id', '=', 'trips.driver_id')
        ->join('places as d', 'd.id', '=', 'trips.departure')
        ->join('places as a', 'a.id', '=', 'trips.arrival')
        ->select('trips.*', 'users.name as driver_name', 'd.place as departure_name', 'a.place as arrival_name');

        return response()->json(['trips' => $trips->get()], $this->successStatus);
    }

}
