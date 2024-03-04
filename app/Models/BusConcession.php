<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;


class BusConcession extends BaseModel
{
    use HasFactory, SoftDeletes;

    protected $table = 'trans_bus_concession_scheme';

    protected $fillable =
    [
    'application_no',
    'full_name',
    'full_address',
    'dob',
    'age',
    'contact',
    'adhaar_no',
    'class_name',
    'school_name',
    'type_of_discount',
    'candidate_signature',
    'passport_size_photo',
    'is_bonafied_doc',
    'is_residental_doc',
    'is_divyang_doc'
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

    public function busConcessionSchemeDocuments()
    {
        return $this->hasMany(BusConcessionDocuments_model::class, 'bus_concession_id')->with('document');
    }

}
