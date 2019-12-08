<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Http\Resources\User as UserResource;
use Illuminate\Support\Str;

class AuthController extends Controller
{
	/**
	 * Login GET Route
	 *
	 * @return Response
	 */
    public function login()
    {
    	return response()->json([
    		'data' => [
    			'message' => 'You must authenticate using POST route'
    		]
    	]);
    }

    /**
     * Posts a login.
     *
     * @param      \Illuminate\Http\Request  $request  The request
     */
    public function postLogin(Request $request)
    {	
    	// needed params not passed in return back
    	if (!($request->has('username') && $request->has('password'))) {
			return response()->json([
    			'data' => [
    				'message' => 'username/password not part of request. Error'
    			]
    		]);
    	}

    	// only pull username and password since that what we need to Authenticate
    	$credentials = $request->only('username', 'password');

    	if (!Auth::attempt($credentials)) {
    		// failed authentication return response telling user that
    		return response()->json([
    			'data' => [
    				'message' => 'username/password not matching. Please try again'
    			]
    		]);
    	}

    	// otherwise we log them in. set an api_token and then return the user
    	$user = Auth::user();
    	
    	// we now insert a api_token and return resource
    	$token = Str::random(80);
    	$user->api_token = $token;
    	$user->save();

    	return new UserResource($user);

    }

    /**
     * Logout
     *
     * @return Json REsponse
     */
    public function logout()
    {
    	// first pull user
    	$user = request()->user();
	
    	// next null out api_token
    	$user->api_token = null;

    	// save
    	$user->save();

    	// return response
    	return response()->json([
    		'data' => [
    			'message' => 'User has been logged out. Current token will no longer work'
    		]
    	]);
    }
}
