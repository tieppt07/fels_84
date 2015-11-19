<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Auth;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password', 'avatar'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function is($id) 
    {
        return $this->id == $id;
    }

    public function isAdmin() 
    {
        return $this->is_admin == config('constant.is_admin.admin');
    }

    public function getRoleName()
    {
        if ($this->is_admin == config('constant.is_admin.admin')) {
            return 'ADMIN';
        } else {
            return 'USER';
        }
    }

    public function setPasswordAttribute($value)
    {
        return $this->attributes['password'] = bcrypt($value);
    }
    
    public function lessons()
    {
        return $this->hasMany(Lesson::class, 'user_id', 'id');
    }

    public function followers() 
    {
        return $this->belongsToMany(User::class, 'activities', 'followee_id', 'follower_id')->withTimestamps();
    }

    public function followees() 
    {
        return $this->belongsToMany(User::class, 'activities', 'follower_id', 'followee_id')->withTimestamps();
    }

    public function activities()
    {
        return $this->hasMany(Activity::class, 'follower_id');
    }
}
