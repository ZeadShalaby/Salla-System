<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Media;
use App\Models\Category;
use App\Models\Discount;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, SoftDeletes;



    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'user_id',
        'category_id',
        'discount_id',
        'quantity',
        'price',
        'expire_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];


    /**
     * Automatically hash the password when setting it.
     */
    //? format data to day & month &year
    public function getCreationDateFormattedAttribute()
    {
        return $this->expire_at->format('Y-m-d'); // Format as day-month
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function category()
    {
        return $this->belongsTo(Category::class);
    }


    public function discount()
    {
        return $this->belongsTo(Discount::class);
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    public function media()
    {
        return $this->morphMany(Media::class, 'mediaable');
    }


    public function media_one()
    {
        return $this->morphOne(Media::class, 'mediaable');
    }

}
