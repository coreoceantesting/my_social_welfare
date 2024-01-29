<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class DisabilityApplication extends BaseModel
{
    use HasFactory, SoftDeletes;

    protected $table = 'disability_application';

    protected $fillable =
    [
        'application_no',
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

}
