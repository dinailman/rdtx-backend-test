<?php

namespace App;

use Illuminate\Auth\Authenticatable;
// use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
// use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;

class User extends Model
{
    //use Authenticatable, Authorizable, HasFactory;

    /**
     * Get the company record associated with the user.
     */
    public function company()
    {
        return $this->belongsTo('App\Company');
    }

    /**
     * Get the event record associated with the user.
     */
    public function events()
    {
        return $this->hasMany('App\Events');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'company_id',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];
}
