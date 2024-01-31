<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class CancerScheme extends BaseModel
{
    use HasFactory, SoftDeletes;

    protected $table = 'trans_cancer_scheme';

    protected $fillable =
    [
       'application_no',
       'financial_help',
       'full_name',
       'full_address',
       'dob',
       'age',
       'contact',
       'adhaar_no',
       'duration_of_residence',
       'gender',
       'type_of_disease',
       'diagnosis_date',
       'hospital_name',
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
