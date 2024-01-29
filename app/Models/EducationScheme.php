<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class EducationScheme extends BaseModel
{
    use HasFactory, SoftDeletes;

    protected $table = 'education_scheme';

    protected $fillable =
    [
        'application_no',
        'full_name',
        'full_address',
        'dob',
        'age',
        'contact',
        'email',
        'family_name',
        'beneficiary_relationship',
        'total_family',
        // 'admission_certificate',
        // 'residence_proof',
        // 'income_certificate',
        // 'academic_certificate',
        // 'passbook_copy',
        'adhaar_no',
        // 'adhaar_copy',
        // 'recommendation_letter',
        // 'signature',
        // 'profile',
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
