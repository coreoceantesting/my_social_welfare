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


    public function marriageSchemeDocuments()
    {
        return $this->hasMany(MarriageSchemeDocuments_model::class, 'document_id', 'id');
    }

    public function divyangSchemeDocuments()
    {
        return $this->hasMany(DivyangSchemeDocuments_model::class, 'document_id', 'id');
    }

    public function busConcessionSchemeDocuments()
    {
        return $this->hasMany(BusConcessionDocuments_model::class, 'document_id', 'id');
    }

    public function educationSchemeDocuments()
    {
        return $this->hasMany(EducationSchemeDocuments_model::class, 'document_id', 'id');
    }

}
