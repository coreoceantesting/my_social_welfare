<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class EducationScheme extends BaseModel
{
    use HasFactory, SoftDeletes;

    protected $table = 'trans_education_scheme';

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
        'adhaar_no',
        'candidate_signature',
        'passport_size_photo',
        'is_residence_proof',
        'is_low_income_proof',
        'is_medical_admission_proof',
        'is_first_year_proof',
        'is_pass_book_doc',
        'is_recommendation_doc'
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

    public function educationSchemeDocuments()
    {
        return $this->hasMany(EducationSchemeDocuments_model::class, 'education_id')->with('document');
    }
}
