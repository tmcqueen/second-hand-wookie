<?php

namespace App;

//use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use LaravelArdent\Ardent\Ardent;
use Spatie\Permission\Traits\HasRoles;

class User extends Ardent implements
    AuthenticatableContract,
    AuthorizableContract,
    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword, HasRoles;

    protected $fillable = [
        'name', 'email', 'password', 'username',
        'address1', 'address2', 'city', 'state', 'zip',
    ];

    public static $rules = [
      'name'        => 'required|between:3,80',
      'email'       => 'required|email|unique:users',
      'username'    => 'required|between:3,15|alpha_dot|unique:users',
      'password'    => 'required|min:6',
    ];

    public static $passwordAttributes = ['password'];
    public $autoHashPasswordAttributes = true;

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getRouteKeyName() {
        return 'username';
    }
}
