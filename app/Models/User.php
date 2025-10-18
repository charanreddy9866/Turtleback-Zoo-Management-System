<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

     /* users in the system */
     const ACCESS =['admin', 'wholesaler', 'retailer'];

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone_number',
        'access',
        'street',
        'city',
        'state',
        'zip'

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts(){
        return $this->hasMany('App\Models\Post');
    }
    public function products(){
        return $this->hasMany('App\Models\Products');
    }
    public function carts(){
        return $this->hasMany('App\Models\Cart');
    }
    public function payments(){
        return $this->hasMany('App\Models\Cart');
    }
    
    public function isAdmin()
    {
        return $this->email === 'admin@admin.com';
    }
    
}
