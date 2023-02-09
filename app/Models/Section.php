<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Support\HasAdvancedFilter;

class Section extends Model
{
    use HasAdvancedFilter;

    public $table = 'sections';
 
    const HOME_PAGE    = 1;
    const ABOUT_PAGE    = 2;
    const TEAM_PAGE = 3;
    const BLOG_PAGE = 4;
    const SERVICE_PAGE  = 5;
    const PORTFOLIO_PAGE  = 6;

    public $orderable = [
        'id',
        'language_id',
        'page_id',
        'title',
        'featured_title',
        'subtitle',
        'text',
        'main_color',
        'button',
        'position',
        'label',
        'link',
        'description',
        'embeded_video',
        'status',
    ];

    public $filterable = [
        'id',
       'language_id',
        'page_id',
        'title',
        'featured_title',
        'subtitle',
        'text',
        'main_color',
        'button',
        'position',
        'label',
        'link',
        'description',
        'embeded_video',
        'status',
    ];

    protected $fillable = [
       'language_id',
        'page_id',
        'title',
        'featured_title',
        'subtitle',
        'text',
        'main_color',
        'button',
        'position',
        'label',
        'link',
        'description',
        'embeded_video',
        'status',
    ];

    
    public function language() {
        return $this->belongsTo('App\Models\Language');
    }
}
