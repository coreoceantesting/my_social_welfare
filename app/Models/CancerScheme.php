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
       'account_no',
       'bank_name',
       'branch_name',
       'account_holder_name',
       'ifsc_code',
       'candidate_signature',
       'passport_size_photo',
       'is_income_doc',
       'is_medical_doc',
       'relation_name',
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

    public function cancerSchemeDocuments()
    {
        return $this->hasMany(CancerSchemeDocuments_model::class, 'cancer_id')->with('document');
    }
}
