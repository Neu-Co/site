<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Place;
use Illuminate\Http\Request;
use Validator;

class PlaceController extends Controller
{
    public $successStatus = 200;

    /**
     * Create a place
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->json()->all(), [
            'place' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        $input = $request->json()->all();
        $place = Place::create($input);
        return response()->json(['success' => $place], $this->successStatus);
    }

    /**
     * place collection api
     *
     * @return \Illuminate\Http\Response
     */
    public function showAll()
    {
        $places = Place::all();
        return response()->json(['places' => $places], $this->successStatus);
    }
}
