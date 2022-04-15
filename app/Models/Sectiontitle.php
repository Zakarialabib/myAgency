<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Support\HasAdvancedFilter;

class Sectiontitle extends Model
{
    use HasAdvancedFilter;

    public $table = 'sectiontitles';

    public $orderable = [
        'language_id',
        'page',
        'subtitle',
        'text',
        'button',
        'link',
        'content',
        'video',
        'image',
    ];

    public $filterable = [
        'language_id',
        'page',
        'subtitle',
        'text',
        'button',
        'link',
        'content',
        'video',
        'image',
    ];

    protected $fillable = [
        'language_id',
        'page',
        'subtitle',
        'text',
        'button',
        'link',
        'content',
        'video',
        'image',
    ];
    
    public function language() {
        return $this->belongsTo('App\Models\Language');
    }
}
