<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class MarriageScheme extends BaseModel
{
    use HasFactory, SoftDeletes;

    protected $table = 'trans_marriage_scheme';

    protected $fillable =
    [
          'application_no',
           'ward_no',
           'ward_id',
           'full_name',
           'full_address',
           'gender',
           'age',
           'father_name',
           'father_address',
           'contact',
           'bank_name',
           'branch_name',
           'account_no',
           'ifsc_code',
           'adhaar_no',
           'profession',
           'agriculture',
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

    public function marriageSchemeDocuments()
    {
        return $this->hasMany(MarriageSchemeDocuments_model::class, 'marriage_id')->with('document');
    }
}