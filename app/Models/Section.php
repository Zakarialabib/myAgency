<?php

declare(strict_types=1);

namespace App\Models;

use App\Support\HasAdvancedFilter;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasAdvancedFilter;

    public const HOME_PAGE = 1;
    public const ABOUT_PAGE = 2;
    public const TEAM_PAGE = 3;
    public const BLOG_PAGE = 4;
    public const SERVICE_PAGE = 5;
    public const PORTFOLIO_PAGE = 6;

    public $table = 'sections';

    public const ATTRIBUTES = [
        'id',
        'title',
        'status',
    ];

    public $orderable = self::ATTRIBUTES;
    public $filterable = self::ATTRIBUTES;

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

     /**
     * Scope a query to only include active products.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     *
     * @return void
     */
    public function scopeActive($query)
    {
        $query->where('status', 1);
    }
    
    public function language()
    {
        return $this->belongsTo(Language::class);
    }

    public function page()
    {
        return $this->belongsTo(Page::class);
    }
}
