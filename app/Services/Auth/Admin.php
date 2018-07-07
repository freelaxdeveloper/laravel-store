<?php
// app/Services/Auth/JsonGuard.php
namespace App\Services\Auth;
 
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\UserProvider;
use GuzzleHttp\json_decode;
use phpDocumentor\Reflection\Types\Array_;
use Illuminate\Contracts\Auth\Authenticatable;
use App\User;

class Admin implements Guard
{
  protected $user;
 
  /**
   * Create a new authentication guard.
   *
   * @param  \Illuminate\Contracts\Auth\UserProvider  $provider
   * @param  \Illuminate\Http\Request  $request
   * @return void
   */
  public function __construct($user)
  {
    $this->user = $user;
  }
 
  /**
   * Determine if the current user is authenticated.
   *
   * @return bool
   */
  public function check()
  {
    if ($this->user()) {
      return $this->user->hasRole('admin');
    }
    
  }
 
  /**
   * Determine if the current user is a guest.
   *
   * @return bool
   */
  public function guest()
  {
    return ! $this->check();
  }
 
  /**
   * Get the currently authenticated user.
   *
   * @return \Illuminate\Contracts\Auth\Authenticatable|null
   */
  public function user()
  {
    if ( !is_null($this->user) ) {
      return $this->user;
    }
  }
     
  /**
   * Get the JSON params from the current request
   *
   * @return string
   */
  public function getJsonParams()
  {
    $jsondata = $this->request->query('jsondata');
 
    return (!empty($jsondata) ? json_decode($jsondata, TRUE) : NULL);
  }
 
  /**
   * Get the ID for the currently authenticated user.
   *
   * @return string|null
  */
  public function id()
  {
    if ($user = $this->user()) {
      return $this->user()->getAuthIdentifier();
    }
  }
 
  /**
   * Validate a user's credentials.
   *
   * @return bool
   */
  public function validate(Array $credentials=[])
  {
    if (empty($credentials['username']) || empty($credentials['password'])) {
      if (!$credentials=$this->getJsonParams()) {
        return false;
      }
    }
 
    $user = $this->provider->retrieveByCredentials($credentials);
       
    if (! is_null($user) && $this->provider->validateCredentials($user, $credentials)) {
      $this->setUser($user);
 
      return true;
    } else {
      return false;
    }
  }
 
  /**
   * Set the current user.
   *
   * @param  Array $user User info
   * @return void
   */
  public function setUser(Authenticatable $user)
  {
    $this->user = $user;
    return $this;
  }
}