<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::deleting(function($user){
            if ($user->image != 'users/avatar.png') Storage::delete($user->image);
        });
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'gender',
        'age',
        'image',
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

    public static $rules = [
        'name' => 'required|regex:/^[a-zA-Z.\s]*$/',
        'email' => 'required|email:rfc,dns|unique:users',
        'password' => 'required|min:4|max:20|confirmed',
        'role' => 'required|in:moderator,user,admin',
        'gender' => 'required|in:m,f',
        'age' => 'required|integer',
        'image' => 'nullable|file|image|between:1,6000',
    ];
    public static $rules1 = [
        'name' => 'required|regex:/^[a-zA-Z.\s]*$/',
        'email' => 'required|email:rfc,dns|unique:users',
        'gender' => 'required|in:m,f',
        'age' => 'required|integer',
        'image' => 'nullable|file|image|between:1,6000',
    ];
    /**
     * Interact with the user's first name.
     *
     * @param  string  $value
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    // protected function password(): Attribute
    // {
    //     return Attribute::make(
    //         // get: fn ($value) => ucfirst($value),
    //         set: fn ($value) => \Hash::needsRehash($value) ? \Hash::make($value) : $value,
    //     );
    // }

    public function products(){
        return $this->belongsToMany(Product::class ,'user_product');
    }

}
