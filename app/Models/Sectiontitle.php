<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Support\HasAdvancedFilter;

class Sectiontitle extends Model
{
    use HasAdvancedFilter;

    public $table = 'sectiontitles';
 
    const HOME_PAGE    = 1;
    const ABOUT_PAGE    = 2;
    const TEAM_PAGE = 3;
    const BLOG_PAGE = 4;
    const SERVICE_PAGE  = 5;
    const PORTFOLIO_PAGE  = 6;

    public $orderable = [
        'id',
        'language_id',
        'page',
        'title',
        'subtitle',
        'text',
        'button',
        'link',
        'content',
        'video',
        'image',
        'status',
    ];

    public $filterable = [
        'id',
        'language_id',
        'page',
        'title',
        'subtitle',
        'text',
        'button',
        'link',
        'content',
        'video',
        'image',
        'status',
    ];

    protected $fillable = [
        'language_id',
        'page',
        'title',
        'subtitle',
        'text',
        'button',
        'link',
        'content',
        'video',
        'image',
        'status',
    ];

    
    public function language() {
        return $this->belongsTo('App\Models\Language');
    }
}
