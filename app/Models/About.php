<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Support\HasAdvancedFilter;

class About extends Model
{
    use HasAdvancedFilter;

    public $orderable = [
        'id',
        'title',
        'image',
        'content',
        'block_title',
        'block_content',
        'language_id',
        'status'
    ];

    public $filterable = [
        'id',
        'title',
        'image',
        'content',
        'block_title',
        'block_content',
        'language_id',
        'status'
    ];

    protected $fillable = [
        'title',
        'image',
        'content',
        'block_title',
        'block_content',
        'language_id',
        'slug',
        'status'
    ];

   
    public function language() {
        return $this->belongsTo('App\Models\Language');
    }
}
