<?php
namespace App\Http\Controllers\API;

use App\User;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public $successStatus = 200;

    /**
     * login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            $user = Auth::user();
            $success['token'] = $user->createToken('MyApp')->accessToken;
            return response()->json(['success' => $success], $this->successStatus);
        } else {
            return response()->json(['error' => 'Unauthorised'], 401);
        }
    }

    /**
     * register api
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] = $user->createToken('MyApp')->accessToken;
        $success['name'] = $user->name;
        return response()->json(['success' => $success], $this->successStatus);
    }

    /**
     * details api
     *
     * @return \Illuminate\Http\Response
     */
    public function myProfile()
    {
        $user = Auth::user();
        $reviews = $user->reviews;
        $cars = $user->cars;
        $tripsDriver = $user->tripsDriver;
        $tripsPassenger = $user->tripsPassenger;
        return response()->json(['user' => $user], $this->successStatus);
    }

    /**
     * details api
     *
     * @return \Illuminate\Http\Response
     */
    public function userProfile($id)
    {
        $user = DB::table('users')
        ->where('users.id', '=', $id)
        ->select('id', 'name', 'email', 'phone', 'driver', 'created_at as member_since');

        $profile = DB::table('profiles')
        ->where('profiles.user_id', '=', $id)
        ->select('cigarette', 'animals', 'music', 'total_passengers', 'total_trips');

        $cars = DB::table('cars_users_xref')
        ->where('cars_users_xref.driver_id', '=', $id)
        ->join('cars', 'cars.id', '=', 'cars_users_xref.car_id')
        ->select('cars.model', 'cars.valid_until');

        $reviews = DB::table('reviews')
        ->where('reviews.driver_id', '=', $id)
        ->join('users', 'reviews.author_id', '=', 'users.id')
        ->select('reviews.stars', 'reviews.body', 'reviews.created_at', 'users.name as author_name');

        
        
        return response()->json(['user' => $user->get(), 'profile' => $profile->get(), 'cars' => $cars->get(), 'reviews' => $reviews->get()], $this->successStatus);
    }
}
