<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class HayatFormModel extends BaseModel
{
    use SoftDeletes ,HasFactory;
    protected $primaryKey = 'h_id';
    protected $table = 'hayticha_form';

    protected $fillable = ['user_id', 'house_no','area', 'landmark','pincode', 'city','state', 'contact','alternate_contact_no', 'bank_name','account_no', 'ifsc_code','signature', 'status','created_by', 'updated_by','deleted_by'];

    public static function booted()
    {
        static::created(function (self $user)
        {
            if(Auth::check())
            {
                self::where('h_id', $user->id)->update([
                    'created_by'=> Auth::user()->id,
                ]);
            }
        });
        static::updated(function (self $user)
        {
            if(Auth::check())
            {
                self::where('h_id', $user->id)->update([
                    'updated_by'=> Auth::user()->id,
                ]);
            }
        });
        static::deleting(function (self $user)
        {
            if(Auth::check())
            {
                self::where('h_id', $user->id)->update([
                    'deleted_by'=> Auth::user()->id,
                ]);
            }
        });
    }
}
