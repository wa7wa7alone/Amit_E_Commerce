<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'image',
        'price',
        'category_id',
    ];
    // protected static function booted()
    // {
    //     static::deleting(function ($product) {
    //         if ($product->image != 'users/avatar.png') \Storage::delete($product->image);
    //     });
    // }
    /**
     * The users that belong to the skill.
     */
    public function users()
    {
        return $this->belongsToMany(User::class , 'user_product');
    }

    public function categories()
    {
        return $this->belongsTo(Category::class);
    }
}
