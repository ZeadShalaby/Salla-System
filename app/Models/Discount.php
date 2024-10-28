<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Discount extends Model
{

    use HasFactory;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'discount',
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
    ];


    /**
     * Automatically hash the password when setting it.
     */
    //? format data to day & month &year
    public function getCreationDateFormattedAttribute()
    {
        return $this->expire_at->format('Y-m-d'); // Format as day-month
    }

}
