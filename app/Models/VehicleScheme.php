<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class VehicleScheme extends BaseModel
{
    use HasFactory, SoftDeletes;

    protected $table = 'trans_vehicle_scheme';

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
       'candidate_signature',
       'passport_size_photo',
       'hod_remark',
        'ac_remark',
        'amc_remark',
        'dmc_remark'
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

    public function vehicleSchemeDocuments()
    {
        return $this->hasMany(VehicleSchemeDocuments_model::class, 'vehicle_id');
    }

}
