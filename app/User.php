<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\HasApiTokens;
use App\Store;


class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function hasRole($role_name)
    {
        foreach ($this->roles as $role) {
            if ($role_name == $role)
                return true;
        }
        return false;
    }

    public function stores()
    {
        return $this->hasMany('App\Store');
    }

    public static function getUserProducts($store_id)
    {
        //$userStores = Store::where('user_id', '=', Auth::id());
        if (Auth::id() == null) {
            return response()->json("Are you logged in?", 405);
        }

        $userStores = User::find(Auth::id())->stores;

        // Check if user has that store
        foreach ($userStores as $store) {
            if ($store->id == $store_id) {
                $products = Product::where('store_id', '=', $store_id)->get();
                return $products;
            }
        }
        //return $userStores;
    }

    // public function generateToken()
    // {
    //     $this->api_token = rand(1000000, 2000000);
    //     $this->save();

    //     return $this->api_token;
    // }
}
