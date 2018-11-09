<?php namespace App\Http\Controllers\Auth;

use JWTAuth;
use JWTFactory;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\Http\Controllers\Controller;
use Validator;

class JWTAuthController extends Controller
{
  
  public function auth()
  {
    $validator = Validator::make(request()->all(), [
      'email' => 'required|email',
      'password' => 'required|string',
    ]);

    if ($validator->fails()) {
      return $this->fail($validator->errors()->all());
    }

    $credentials = request()->only(['email', 'password']);

    try {
        // attempt to verify the credentials and create a token for the user
        if (! $token = JWTAuth::attempt($credentials)) {
            return $this->fail('invalid_credentials');
        }
    } catch (JWTException $e) {
        // something went wrong whilst attempting to encode the token
        return $this->fail('could_not_create_token');
    }

    // all good so return the token
    return response()->json(compact('token'));

  }

}