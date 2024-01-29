<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class VehicleScheme extends BaseModel
{
    use HasFactory, SoftDeletes;

    protected $table = 'vehicle_schemes';

    protected $fillable =
    [
       'application_no',
       'full_name',
       'full_address',
       'dob',
       'age',
       'contact',
       'adhaar_no',
       'duration_of_residence',
       'details',
       'four_wheeler',
       'receipt_no',
    ];

    public static function booted()
    {
        static::created(function (self $user)
        {
            if(Auth::check())
            {
                self::where('id', $user->id)->update([
                    'created_by'=> Auth::user()->id,
                ]);
            }
        });
        static::updated(function (self $user)
        {
            if(Auth::check())
            {
                self::where('id', $user->id)->update([
                    'updated_by'=> Auth::user()->id,
                ]);
            }
        });
        static::deleting(function (self $user)
        {
            if(Auth::check())
            {
                self::where('id', $user->id)->update([
                    'deleted_by'=> Auth::user()->id,
                ]);
            }
        });
    }


}