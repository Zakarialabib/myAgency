<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Support\HasAdvancedFilter;

class Blog extends Model
{
    use HasAdvancedFilter;
    
    public $table = 'blogs';

    public $orderable = [
        'id',
        'language_id',
        'bcategory_id',
        'title',
        'slug',
        'image',
        'content',
        'status',
        'meta_keywords',
        'meta_description',
    ];

    public $filterable = [
        'id',
        'language_id',
        'bcategory_id',
        'title',
        'slug',
        'image',
        'content',
        'status',
        'meta_keywords',
        'meta_description',
    ];

    protected $fillable = [
        'id',
        'language_id',
        'bcategory_id',
        'title',
        'slug',
        'image',
        'content',
        'status',
        'meta_keywords',
        'meta_description',
    ];

    public function bcategory()
    {
        return $this->belongsTo('App\Models\Bcategory');
    }

    public function language() {
        return $this->belongsTo('App\Models\Language');
    }
}
