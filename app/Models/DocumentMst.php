<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;


class DocumentMst extends BaseModel
{
    use HasFactory, SoftDeletes;

    protected $table = 'document_type_msts';
    protected $fillable = ['document_name', 'document_initial', 'is_required','scheme_id'];



    public function scheme()
    {
        return $this->belongsTo(SchemeMst::class, 'scheme_id', 'id');
    }

}