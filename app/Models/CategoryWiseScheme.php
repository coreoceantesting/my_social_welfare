<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class CategoryWiseScheme extends BaseModel
{
    use HasFactory, SoftDeletes;


    protected $table = 'category_wise_scheme';

    protected $fillable = ['category_id', 'scheme_id'];

    public static function booted()
    {
        static::created(function (self $user) {
            if (Auth::check()) {
                self::where('id', $user->id)->update([
                    'created_by' => Auth::user()->id,
                ]);
            }
        });
        static::updated(function (self $user) {
            if (Auth::check()) {
                self::where('id', $user->id)->update([
                    'updated_by' => Auth::user()->id,
                ]);
            }
        });
        static::deleting(function (self $user) {
            if (Auth::check()) {
                self::where('id', $user->id)->update([
                    'deleted_by' => Auth::user()->id,
                ]);
            }
        });
    }


    public function schemes()
    {
        return $this->belongsTo(SchemeMst::class, 'scheme_id', 'id');
    }

    public function getCategoriesAttribute()
    {
        $categoryIds = explode(',', $this->attributes['category_id']);
        return CategoryMst::whereIn('id', $categoryIds)->get();
    }
}