<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class SportsScheme extends BaseModel
{
    use HasFactory, SoftDeletes;

    protected $table = 'trans_sports_scheme';
    protected $fillable =
    [
    'application_no',
    'full_name',
    'full_address',
    'dob',
    'age',
    'contact',
    'financial_help',
    'email',
    'school_name',
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

    public function sportsSchemeDocuments()
    {
        return $this->hasMany(SportsSchemeDocuments_model::class, 'sports_id');
    }
}
