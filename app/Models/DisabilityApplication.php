<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class DisabilityApplication extends BaseModel
{
    use HasFactory, SoftDeletes;

    protected $table = 'trans_disability_scheme';

    protected $fillable =
    [
        'application_no',
        'hayat_id',
        'ward_id',
        'ward_no',
        'full_name',
        'full_address',
        'gender',
        'age',
        'father_name',
        'father_address',
        'contact',
        'alternate_contact_no',
        'type_of_disability',
        'percentage',
        'bank_name',
        'branch_name',
        'account_no',
        'ifsc_code',
        'authority_name',
        'adhaar_no',
        'profession',
        'number_of_family',
        'agriculture',
        'personal_benefit',
        'received_year',
        'welfare_schemes',
        'govt_scheme',
        'poverty_number',
        'caste',
        'candidate_signature',
        'passport_size_photo',
        'category_id'

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

    public function wardss()
    {
        return $this->belongsTo(Ward::class, 'ward_id', 'id');
    }


    public function divyangSchemeDocuments()
    {
        return $this->hasMany(DivyangSchemeDocuments_model::class, 'divyang_id')->with('document');
    }
}